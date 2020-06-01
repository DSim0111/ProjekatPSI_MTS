<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\FavShopModel;
use App\Models\AddOnModel;

/**
 * Description of User
 *
 * @author Simona
 */
class User extends BaseController {

    protected static $orderValidationRules = [
        'name' => 'required|alpha_numeric|min_length[2]|max_length[40]',
        'surname' => 'required|alpha_numeric',
        'address' => 'required',
        'note' => 'required',
        'date' => 'required',
        'time' => 'required'
    ];

    //put your code here
    public function reportShop($data = []) {
        $shopModel = new \App\Models\ShopModel();
        $id = $this->request->getVar("shopId");
        $sysUserModel = new \App\Models\SystemUserModel();

        if (!isset($id) || !$sysUserModel->existsAs("Shop", $id)) {

            return redirect()->to(base_url("Guest/pageNotFound"));
        }


        $shop = $shopModel->getShop($id);

        $this->showPage("reportShop_user", array_merge(["shop" => $shop], $data));
    }

    public function reportShopSubmit() {
        $id = $this->request->getVar("shopId");
        if (!isset($id)) {

            return redirect()->to(base_url("Guest/pageNotFound"));
        }
        if (!$this->validate(["message" => 'required'], ["message" => ["required" => "Message is a required field. "]])) {
            return $this->reportShop(["error" => $this->validator->getError()]);
        } else {

            $shopReportModel = new \App\Models\ShopReportsModel();

            $obj = $shopReportModel->insertShopReport($id, $this->session->get("user_id"), $this->request->getVar("message"));
            if (!isset($obj) || !is_object($obj)) {

                return $this->reportShop($obj);
            }
            return $this->reportShop(["success" => "You successfully submited report for this shop. We will consider it as soon as possible."]);
        }
    }

    public function showPage($page, $data = array()) {

        parent::showPage($page, array_merge($data, ["header" => "templates/header_user"]));
    }

    public function shopPage($data = []) {

        $ratingModel = new \App\Models\RatingModel();
        $idShop = $this->request->getVar("shopId");
        $row = $ratingModel->getRating($this->session->get("user_id"), $idShop);

        if ($row != null) {

            $data = array_merge($data, ["rating" => $row]);
        }
        /**/
        parent::shopPage($data);
    }

    public function addCommentSubmit() {

        if (!$this->validate(["commentField" => 'required|max_length[200]'], ["commentField" => ['required' => "This field is required"]])) {

            return $this->shopPage($this->validator->getErrors());
        } else {
            $shopId = $this->request->getVar("shopId");
            $userId = $this->session->get("user_id");
            $commModel = new \App\Models\CommentsModel();

            $ret = $commModel->insertComment($userId, $shopId, $this->request->getVar("commentField"));

            if (is_int($ret)) {
                // success 
                //PRG
                return redirect()->to(base_url("User/shopPage?shopId=" . $shopId));
            }
            return $this->shopPage($ret);
        }
    }

    public function ratingSubmit() {


        $ratingModel = new \App\Models\RatingModel();
        $shop = $this->request->getVar("shopId");
        $user = $this->session->get("user_id");
        $rating = $this->request->getVar("rating");
        $obj = $ratingModel->insertOrUpdateRating($shop, $user, $rating);

        if (array_key_exists("errorRating", $obj)) {

            return $this->shopPage($obj);
        } else {
            //SUCCESS 
            // post redirect get 
            return redirect()->to(base_url("User/shopPage?shopId=" . $shop));
        }
    }

    public function index() {
        return parent::listShopsPaging();
    }

//MILAN
    public function checkCart() {
        $sysUserModel = new \App\Models\SystemUserModel();
        $productModel = new ProductModel();
        $ids = json_decode(stripslashes($this->request->getVar('products')));
        $numItems = json_decode(stripslashes($this->request->getVar('numItems')));
        $shopId = $this->request->getVar("shopId");
        if (!isset($shopId) || !$sysUserModel->existsAs("Shop", $shopId)) {
            return redirect()->to(base_url("Guest/pageNotFound"));
        }
        if (isset($ids) and count($ids) > 0 and $ids[0] != "") {
            $products = $productModel->getProductsByID($ids);
        } else {
            $products = null;
        }
        $this->showPage('cart', ['products' => $products, 'numItems' => $numItems, 'shopId' => $shopId]);
    }

//MILAN
    public function addToFav() {
        $sysUserModel = new \App\Models\SystemUserModel();
        $idUser = $this->session->get("user_id");
        $idShop = $this->request->getVar("shopId");
        //QUESTION[miki]:idUser is from session maybe there is no need for checking if he exists?
        if (!isset($idShop) || !isset($idUser) || !$sysUserModel->existsAs("Shop", $idShop) || !$sysUserModel->existsAs("User", $idUser)) {
            return redirect()->to(base_url("Guest/pageNotFound"));
        }
        $favShopModel = new FavShopModel();
        if (!($favShopModel->exists($idUser, $idShop))) {
            $favShopModel->add($idUser, $idShop);
        }
        return redirect()->to(base_url("/User/listShopsPaging"));
    }

//MILAN
    public function listFavShops($error = null) {

        $shopModel = new \App\Models\ShopModel();
        $r = $this->request;
        $search = $r->getVar("search");
        $sortColumn = $r->getVar("sortColumn");
        $sortOrder = $r->getVar("sortOrder");
        $categories = $r->getVar("categories");

        $input = file_get_contents('php://input');
        $jsonData = json_decode($input);


        if (!isset($jsonData) || $jsonData == null) {
            $page = 1;
        } else {
            $page = $jsonData->page;
        }

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

        $idUser = $this->session->get("user_id");
        $shops = $shopModel->getShopsFav($search, $categories, $sortColumn, $sortOrder, $idUser, $page);
        $s = "";

        echo $s;
        $catModel = new \App\Models\CategoriesModel();
        $allCategories = $catModel->getAllCategories();
        $userRole = $this->session->get("logged_in_as");
        $n = min([count($shops), 6]);
        $tmp = [];
        for ($i = 0; $i < $n; $i++) {
            if ((($page - 1) * 6 + $i) >= count($shops))
                break;
            array_push($tmp, $shops[($page - 1) * 6 + $i]);
        }
        $maxPage = intval(count($shops) / 6);
        if (count($shops) % 6 != 0)
            $maxPage += 1;
        $data = [
            "userRole" => $userRole,
            "controller" => $this->request->uri->getSegment(1),
            "shops" => $tmp,
            "maxPage" => $maxPage
        ];

        if (!isset($jsonData) || $jsonData == null)
            return $this->showPage("shopList", ["shops" => $tmp, "filters" => $allCategories, "controller" => $this->request->uri->getSegment(1), "userRole" => $userRole, "maxPage" => $maxPage, "fav"=>"true"]);
        else
            echo json_encode($data);
    }

    //MILAN
    public function pick_wrapper() {
        $addOnModel = new AddOnModel();
        $sysUserModel = new \App\Models\SystemUserModel();
        $shopId = $this->request->getVar("shopId");
        $numItems = $this->request->getVar("numCartItem");
        if ($numItems == 0) {
            return $this->showPage('cart', ["no_products" => "You didn't buy any products!", "shopId" => $shopId]);
        }
        if (!isset($shopId) || !$sysUserModel->existsAs("Shop", $shopId)) {
            return redirect()->to(base_url("Guest/pageNotFound"));
        }
        $addons = $addOnModel->getAllAddOnsForShop($shopId);
        return $this->showPage('pick_wrapper', ["addons" => $addons, "shopId" => $shopId]);
    }

    //MILAN
    public function payment_method() {
        $this->showPage('payment_method', []);
    }

    //MILAN
    public function order_gifts() {
        $this->showPage('order_gifts', []);
    }

    public function validDate($date) {
        $dateF = explode('-', $date);
        if (count($dateF) != 3)
            return false;
        if ($dateF[0] < 2020)
            return false;
        if ($dateF[1] < 0 || $dateF[1] > 12)
            return false;
        if ($dateF[2] < 0 || $dateF[2] > 31)
            return false;
        return true;
    }

    public function validTime($time) {
        $timeF = explode(':', $time);
        if (count($timeF) != 2)
            return false;
        if ($timeF[0] < 0 || $timeF[0] > 24)
            return false;
        if ($timeF[1] < 0 || $timeF[1] > 59)
            return false;
        return true;
    }

    //TODO[miki]:date time?
    public function order() {
        $retVal = $this->validate(User::$orderValidationRules);
        if (!$retVal != null) {
            return $this->showPage('order_gifts', $this->validator->getErrors());
        }
        $sysUserModel = new \App\Models\SystemUserModel();
        $name = $this->request->getVar('name');
        $surname = $this->request->getVar('surname');
        $address = $this->request->getVar('address');
        $note = $this->request->getVar('note');
        $date = $this->request->getVar('date');
        $time = $this->request->getVar('time');
        $products = json_decode(stripslashes($this->request->getVar('products')));
        $numItems = json_decode(stripslashes($this->request->getVar('quantity')));
        $addOns = json_decode(stripslashes($this->request->getVar('addOns')));
        $payment = $this->request->getVar('payment');
        $shopId = $this->request->getVar("shopId");

        if (!$this->validDate($date)) {

            return $this->showPage('order_gifts', array_merge($this->validator->getErrors(), ['bad_date' => 'Date is not valid!']));
        }

        if (!$this->validTime($time)) {

            return $this->showPage('order_gifts', array_merge($this->validator->getErrors(), ['bad_time' => 'Time should be in hh:mm format!']));
        }
        date_default_timezone_set('Europe/Belgrade');
        $today = date('Y-m-d');
        if ($today > $date) {
            return $this->showPage('order_gifts', array_merge($this->validator->getErrors(), ['bad_date' => 'We cannot deliver in past!']));
        }
        // If products exists and they belong to shopId shop
        // if $shopId exists
        if ($products == null) {
            return $this->showPage('order_gifts', array_merge($this->validator->getErrors(), ['no_products' => 'ERROR: There is no products!']));
        }
        if (!isset($shopId) || !$sysUserModel->existsAs("Shop", $shopId)) {
            return redirect()->to(base_url("Guest/pageNotFound"));
        }
        $idUser = $this->session->get("user_id");
        $deliveryRequestModel = new \App\Models\DeliveryRequestsModel;
        $deliveryProductsModel = new \App\Models\DeliveryProductsModel;
        $deliveryAddOn = new \App\Models\DeliveryAddOnsModel;


        $productModel = new ProductModel();
        $addOnModel = new AddOnModel();
        foreach ($products as $product) {
            if (!$productModel->exists($shopId, $product)) {
                return $this->listShops("ERROR: products and shop missmatch!");
            }
        }
        if ($addOns != null && $addOns != "" && $addOns[0] != "") {
            foreach ($addOns as $addOn) {
                if (!$addOnModel->AddOnBelongsToCurrShop($shopId, $addOn)) {
                    return $this->listShops("ERROR: add ons and shop missmatch!");
                }
            }
        }
        $data = ['idUser' => $idUser, 'idShop' => $shopId,
            'state' => 'A', 'payment' => $payment, 'notes' => $note, 'address' => $address, 'receiverName' => $name,
            'receiverSurname' => $surname, 'deliverDate' => $date, 'deliverTime' => $time, 'submitDate'=> $today , 'submitTime'=>date('H:i:s')];
        $id = $deliveryRequestModel->insertData($data);
        $i = 0;
        echo "$id ";
        foreach ($products as $product) {
            $deliveryProductsModel->save(['idDelReq' => $id, 'idProduct' => $product, 'quantity' => $numItems[$i]]);
            $i++;
        }
        if ($addOns != null && $addOns != "" && $addOns[0] != "") {
            foreach ($addOns as $addOn) {
                $deliveryAddOn->insertData(['idDelReq' => $id, 'idA' => $addOn]);
            }
        }
        return redirect()->to(base_url("/User/listShopsPaging")); //$this->listShops("Your order is sent!");
    }

}
