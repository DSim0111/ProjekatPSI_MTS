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
/**
 * author: Simona Denic 17/338 
 * 
 * @version 1.0      05.05.2020. 
 */
class BaseController extends Controller

{
       protected static $systemUserValidationRules=[
                 
            'username'=>'required|alpha_numeric|min_length[5]|max_length[40]', 
            'password'=>'required|min_length[10]|max_length[50]', 
            'confirmPassword'=>'required|min_length[10]|max_length[50]',
            'email'=>'required|valid_email',
            'name' => 'required|max_length[18]', 
            'surname'=> 'required|max_length[18]', 
            'phoneNum'=>'required|max_length[18]'
     ];
      protected static $userValidationRules= [
           'username'=>'required|alpha_numeric|min_length[5]|max_length[40]', 
            'password'=>'required|min_length[10]|max_length[50]', 
            'confirmPassword'=>'required|min_length[10]|max_length[50]',
            'email'=>'required|valid_email',
            'name' => 'required|max_length[18]', 
            'surname'=> 'required|max_length[18]', 
            'phoneNum'=>'required|max_length[18]', 
          'address'=>"required"
          
      ]; 
      protected static $shopValidationRules=[
          
            'username'=>'required|alpha_numeric|min_length[5]|max_length[40]', 
            'password'=>'required|min_length[10]|max_length[50]', 
            'confirmPassword'=>'required|min_length[10]|max_length[50]',
            'email'=>'required|valid_email',
            'name' => 'required|max_length[18]', 
            'surname'=> 'required|max_length[18]', 
            'phoneNum'=>'required|max_length[18]', 
             'address'=>"required", 
             'shopName'=>'required|min_length[5]', 
             'description'=>'required|min_length[10]|max_length[200]',
             
      ];

	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = ['form', 'url'];
   private function checkPasswords($password, $confirm){
            
            return strcmp($password, $confirm)==0;
        }
	 
        /**
        @param array $validationRules Validation rules for particular user defined in static arrays ( for example: BaseController::$userValidationRules)
         * @return array Returns array of errors or null if success
         * ["name" =>"Error message" ]
         */
        protected function validateRegisterData($validationRules){
             if( $this->validate($validationRules)){ // if validation is fine  check password match
                 
                   if(!$this->checkPasswords(
                        $this->request->getVar("password"), 
                        $this->request->getVar("confirmPassword"))){
                    
                    return ["password"=>"Passwords do not match", "confirmPassword"=>"Passwords do not match"];
                    
                }else{
                    
                    //SUCCESS !
                    return null; 
                }
                      
                    
                    
            }else{
                
                // validation failed 
                return $this->validator->getErrors(); 
            }
         
            
           
        }

        protected function showPage($page, $data=[]){
            
               echo  view("pages/".$page, $data); 
               
             
        }
        public function index(){
            
            echo view("pages/index_guest");
            
        }
        public function logout(){
            
             $this->session->destroy();
            return redirect()->to(base_url("Guest/login")); 
            
        }
	public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);
        
                 $this->session = \Config\Services::session();
              
	}

}
