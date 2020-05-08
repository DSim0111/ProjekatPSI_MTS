<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\Controllers;
use App\Models\UserModel; 
use App\Models\SystemUserModel; 


/**
 * Description of Guest
 *
 * @author Simona Denic  17/0338 
 * @version 1.0 05.05.2020. 
 */
class Guest extends BaseController {
    //put your code here
     private static $existingRoles=["User", "Administrator", "Shop"]; 
  
      
      
         public function index(){
            
            
            $this->showPage("index_guest");
        }
        public function login($data=[]){
            
            return $this->showPage("login_guest", $data);
        }
         public function loginSubmit(){
             
             if(! $this->validate([
                 
                 "username"=>"required", 
                 "password"=>"required"
             ])){
                 return $this->login(["error"=>"Username and password cannot be empty."]); 
             }
            // just to be sure :)) 
             $ok=false;
             $username= $this->request->getVar("username"); 
             $password=$this->request->getVar("password");
             $role=$this->request->getVar("role"); 
      
            foreach ( BaseController::$existingRoles as $value) {
                if(strcmp($value, $role)==0){
                    $ok=true; 
                    break; 
                }  
            }
            if($ok==false){
                return $this->login(["error"=>"Please, stop trying to hack us!"]); 
            }
        
             
             $sysUser= new SystemUserModel(); 
             
             $ret=$sysUser->checkValidLogin($username, $password, $role); 
             
             if(isset($ret)){
                 
                 $this->session->set("logged_in_as", $role); 
                 $this->session->set("user_id", $ret->id); 
                 $this->session->set("username", $username); 
                   
                 return redirect()->to(base_url("".$role."/index"));
             }else{
                 
                 
                 return $this->login(["error"=>"Username, password or role don't match!"]);
             }
             
         }
         
       public function logout(){
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();   
       }
        
        public function registerUser( $data=[]){
            $this->showPage("registerUser_guest", $data); 
        }
        public function registerShop($data=[]){
            
            
            $this->showPage("registerShop_guest", $data);
        }
     
        
        public function registerUserSubmit(){
                
               //validate input data 
            $retVal=$this->validateRegisterData(BaseController::$userValidationRules);
               if( $retVal!=null){
                   
                   
                   return $this->registerUser($retVal);
               }
                    

                $sysUser=new SystemUserModel ();
                $ret=$sysUser->insertUser(
                $this->request->getVar("username"), 
                $this->request->getVar("name"), 
                $this->request->getVar("surname"), 
                $this->request->getVar("password"), 
                $this->request->getVar("email"), 
                $this->request->getVar("phoneNum"), 
                 $this->request->getVar("address")); 
                     
                  if($ret===0){
                      //Success 
                          return $this->login();
                      
                  }else{
                      
                      // username exists, email exist..
                       return $this->registerUser($ret);     
                  }
            
        }
        
        
        public function registerShopSubmit(){
            
            
            $ret=$this->validateRegisterData(BaseController::$shopValidationRules) ; 
            if($ret==null){
                //successful validation 
                
                //get image 
                
                $file= $this->request->getFile("image"); 
                if($file==null){
                    return $this->registerShop(["error"=>"File is not uploaded"]);
                }
                if($file->isValid()){
                    $newName = $file->getRandomName();
                     $file->move('./uploads', $newName);
                 }else{
                    return $this->registerShop(["error"=>"File is not valid"]);
                }
                
                $sysUser=new SystemUserModel(); 
               $retVal= $sysUser->insertShop( 
                 $this->request->getVar("username"), 
                $this->request->getVar("name"), 
                $this->request->getVar("surname"), 
                $this->request->getVar("password"), 
                $this->request->getVar("email"), 
                $this->request->getVar("phoneNum"), 
                 $this->request->getVar("address"),

                $this->request->getVar("description"),
                $this->request->getVar("shopName"),
                  'I', // I - inactive state 
                $newName ); 
                if($retVal!=0){
                    
                    return $this->registerShop($retVal);
                    
                }else{
                    
                    return redirect()->to(base_url("Shop/index")); 
                }
           
         
        }else{ 
            //validation failed
            
            return $this->registerShop($ret);
            
        }
            
            
        
        }
    
}

