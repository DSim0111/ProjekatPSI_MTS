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
     private static $existingRoles=["User", "Admininstrator", "Shop"]; 
        private function showPage($page, $data=[]){
            
                
            
              //  echo view("templates/header_guest", $data); 
               echo  view("pages/".$page, $data); 
               //echo view("templates/footer", $data); 
        }
        
        
        public function index(){
            
            
            $this->showPage("index_guest");
        }
        
        
        public function login($data=[]){
            
            return $this->showPage("login_guest", $data);
        }
         public function submitLogin(){
             
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
      
            foreach ( Guest::$existingRoles as $value) {
                if(strcmp($value, $role)==0){
                    $ok=true; 
                    break; 
                }  
            }
            if($ok==false){
                return $this-login(["error"=>"Please, stop trying to hack us!"]); 
            }
        
             
             $sysUser= new SystemUserModel(); 
             
             $ret=$sysUser->checkValidLogin($username, $password, $role); 
             
             if(isset($ret)){
                 
                 $this->session->set("logged_in_as", $role); 
                 $this->session->set("user_id", $ret->id); 
                 $this->session->set("username", $username); 
                 return redirect()->to(base_url("".$role."/index"));
             }else{
                 
                 
                 return $this->login(["error"=>"Failed login"]);
             }
             
             
             
             
             
             
         }
        
        public function registerUser( $data=[]){
            $this->showPage("registerUser_guest", $data); 
        }
        private function checkPasswords($password, $confirm){
            
            return strcmp($password, $confirm)==0;
        }
        
        public function registerUserSubmit(){
                
                //check passwords 
                if(!$this->checkPasswords(
                        $this->request->getVar("password"), 
                        $this->request->getVar("confirmPassword"))){
                    
                    return $this->registerUser(["password"=>"Passwords do not match", "confirmPassword"=>"Passwords do not match"]);
                    
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
                       return $this->registerUser($ret);     
                  }
            
        }
        
    
}

