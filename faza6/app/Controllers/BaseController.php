<?php

namespace App\Controllers;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 *
 * @package CodeIgniter
 */
use CodeIgniter\Controller;
use App\Models\CommentsModel;
use App\Models\ProductModel;

/**
 * author: Simona Denic 17/338 
 * 
 * @version 1.0      05.05.2020. 
 */
class BaseController extends Controller {

    protected static $systemUserValidationRules = [
        'username' => 'required|alpha_numeric|min_length[5]|max_length[40]',
        'password' => 'required|min_length[10]|max_length[50]',
        'confirmPassword' => 'required|min_length[10]|max_length[50]',
        'email' => 'required|valid_email',
        'name' => 'required|max_length[18]',
        'surname' => 'required|max_length[18]',
        'phoneNum' => 'required|max_length[18]'
    ];
    protected static $userValidationRules = [
        'username' => 'required|alpha_numeric|min_length[5]|max_length[40]',
        'password' => 'required|min_length[10]|max_length[50]',
        'confirmPassword' => 'required|min_length[10]|max_length[50]',
        'email' => 'required|valid_email',
        'name' => 'required|max_length[18]',
        'surname' => 'required|max_length[18]',
        'phoneNum' => 'required|max_length[18]',
        'address' => "required"
    ];
    protected static $shopValidationRules = [
        'username' => 'required|alpha_numeric|min_length[5]|max_length[40]',
        'password' => 'required|min_length[10]|max_length[50]',
        'confirmPassword' => 'required|min_length[10]|max_length[50]',
        'email' => 'required|valid_email',
        'name' => 'required|max_length[18]',
        'surname' => 'required|max_length[18]',
        'phoneNum' => 'required|max_length[18]',
        'address' => "required",
        'shopName' => 'required|min_length[5]',
        'description' => 'required|min_length[10]|max_length[200]',
    ];

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = ['form', 'url'];

    private function checkPasswords($password, $confirm) {

        return strcmp($password, $confirm) == 0;
    }

    /**
      @param array $validationRules Validation rules for particular user defined in static arrays ( for example: BaseController::$userValidationRules)
     * @return array Returns array of errors or null if success
     * ["name" =>"Error message" ]
     */
    protected function validateRegisterData($validationRules) {
        if ($this->validate($validationRules)) { // if validation is fine  check password match
            if (!$this->checkPasswords(
                            $this->request->getVar("password"),
                            $this->request->getVar("confirmPassword"))) {

                return ["password" => "Passwords do not match", "confirmPassword" => "Passwords do not match"];
            } else {

                //SUCCESS !
                return null;
            }
        } else {

            // validation failed 
            return $this->validator->getErrors();
        }
    }

    protected function showPage($page, $data = []) {

        echo view("pages/" . $page, $data);
    }

    public function index() {

        echo view("pages/index_guest");
    }

    public function logout() {

        $this->session->destroy();
        return redirect()->to(base_url("Guest/login"));
    }

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger) {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        $this->session = \Config\Services::session();
    }

    // TO BE OVERRIDED 
    /*
      Lists all shops abailable in database

     */
    public function listShops() {

        $shopModel = new \App\Models\ShopModel();


        $r = $this->request;
        $search = $r->getVar("search");
        $sortColumn = $r->getVar("sortColumn");
        $sortOrder = $r->getVar("sortOrder");
        $sort = $r->getVar("sort");
        $sortDataArr = explode("_", $sort);
        if (count($sortDataArr) == 2) {
            $sortColumn = $sortDataArr[0];
            $sortOrder = $sortDataArr[1];
        }

        $categories = $r->getVar("categories");

        if (!isset($search)) {

            $search = ''; // will search all names in existing db
        }
        if (!isset($categories)) {

            $categories = []; // will return all shops no matter categories of product they sell 
        }

        if (!isset($sortColumn) || !isset($sortOrder)) {
            $sortOrder = 'desc';
            $sortColumn = 'rating';
        }


        $shops = $shopModel->getShops($search, $categories, $sortColumn, $sortOrder);
        $catModel = new \App\Models\CategoriesModel();
        $allCategories = $catModel->getAllCategories();
        $userRole = $this->session->get("logged_in_as");
        // echo var_dump($shops);
        return $this->showPage("shopList", ["shops" => $shops, "filters" => $allCategories, "controller" => $this->request->uri->getSegment(1), "userRole" => $userRole]);

        /* pagination 
          $model = new \App\Models\SystemUserModel();

          $model->builder()->select('*');
          $data = [
          'users' => $model->paginate(10, 'group', 1),
          'pager' => $model->pager
          ];

          echo view('pages/index_guest', $data); */
    }

    public function shopPage($data = []) {

        $id = $this->request->getVar("shopId");
        $sysUserModel = new \App\Models\SystemUserModel();
        if (!isset($id) || !$sysUserModel->existsAs("Shop", $id)) {

            return $this->showPage("basicErrorPage", ["error" => "Sorry, there has been an error while loading this page."]);
        }
        $shopModel = new \App\Models\ShopModel();
        $shop = $shopModel->getShop($id);
        $productModel = new ProductModel();
        $allProducts = $productModel->getAllProductsForShop($id);

        $commentsModel = new CommentsModel();
        $idShop = $this->request->getVar("shopId");
        $comments = $commentsModel->getAllCommentsForShop($idShop);
        $userRole = $this->session->get("logged_in_as");
        //   var_dump( $allProducts);
        return $this->showPage("shopPage", array_merge(["shop" => $shop, "userRole" => $userRole], $data, ["comments" => $comments], ['allProducts' => $allProducts]));
    }

}
