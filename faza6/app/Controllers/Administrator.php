<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controllers;
use App\Models\SystemUserModel; 
/**
 * Description of Administrator
 *
 * @author Simona
 */
class Administrator extends BaseController {
    //put your code here

    
    public function registerAdmin($data=[]){
        
        
            
        $this->showPage("registerAdmin_admin", $data );
        
        
    }
    public function registerAdminSubmit(){
        
        
        
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
                          return $this->registerAdmin(["message"=>"Success!"]);
                      
                  }else{
                      
                      // username exists, email exist..
                       return $this->registerAdmin($ret);     
                  }
            
    }
}
