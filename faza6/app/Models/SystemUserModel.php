<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GuestModel
 *
 * @author Simona
 */
 namespace App\Models;

use CodeIgniter\Model;

class SystemUserModel extends Model
{
   
        protected $table      = 'systemuser';
        protected $primaryKey = 'id';
        protected $returnType = 'object';
        protected $validationRules=[
            'username'=>'required|alpha_numeric|min_length[5]|max_length[40]|is_unique[systemuser.username]', 
            'password'=>'required|min_length[10]|max_length[50]', 
            'email'=>'required|valid_email|is_unique[systemuser.email]',
            'name' => 'required|max_length[18]', 
            'surname'=> 'required|max_length[18]', 
            'phoneNum'=>'required|max_length[18]'
            
            
            
            
            ]; 
        protected $validationMessages=[
            
            'username'=> [
                'is_unique'=>"Sorry, username has already been taken. Try another one.", 
                
            ], 
            'email'=> [
                
                
                'is_unique'=>"Sorry, email has already been taken. Please, choose another one or login. "
            ]
                
            
        ]; 
       
        
 

    protected $allowedFields=['id','username', 'password', 'name', 'surname', 'email', 'phoneNum'];


    public function checkValidLogin($username, $password, $role){
        
            $this->builder()->select("systemuser.id")->where("username", $username)->where("password", $password)->join($role." as role","role.id=systemuser.id" );
            return $this->builder()->get()->getRowObject(); 
    }
    private function insertSystemUser($username, $firstName, $lastName, $password,  $email, $phone, $image=null){
       
         return $this->insert([
                  
                "username"=> $username, 
                "password"=>$password, 
                "name"=>$firstName, 
                "surname"=>$lastName, 
                "email"=>$email, 
                "phoneNum"=>$phone, 
                  "image"=>$image
        ], true);
    }

    public function insertUser($username, $firstName, $lastName, $password, $email, $phone, $address){
        $id=$this->insertSystemUser($username, $firstName, $lastName, $password, $email, $phone); 
        if($id==false || $id==null){
            
            return $this->errors(); 
        }else{
            //TODO 
            // transakcija, ne ovako 
               $userModel= new UserModel(); 
               $ret=$userModel->insertUser($id, $address);
            if($ret==false || $ret==null){
                $this->delete($id); 
                return $userModel->errors(); 
            }
            return 0; //success
        }
        
        
    }
      public function insertShop($username, $firstName, $lastName, $password, $email, $phone, $address, $description, $shopName, $state, $image){
          
          //TODO : not finished - izmeniti unos na stranici za registraciju  :) 
        $id=$this->insertSystemUser($username, $firstName, $lastName, $password, $email, $phone, $image); 
        if($id==false || $id==null){
            
            return $this->errors(); 
        }else{
           
               $shopModel= new ShopModel(); 
               $ret=$shopModel->insertShop($id, $description, $shopName, $state, $address);
            if($ret==false || $ret==null){
                $this->delete($id); 
                return $shopModel->errors(); 
            }
            return 0; //success
        }
        
        
    }
    
    
     public function insertAdmin($username, $firstName, $lastName, $password, $email, $phone, $image){
          
          //TODO : not finished - izmeniti unos na stranici za registraciju  :) 
        $id=$this->insertSystemUser($username, $firstName, $lastName, $password, $email, $phone, $image); 
        if($id==false || $id==null){
            
            return $this->errors(); 
        }else{
           
             $adminModel=new AdministratorModel();  
             $ret=$adminModel->insertAdministrator($id); 
            if($ret==false || $ret==null){
                $this->delete($id); 
                return $adminModel->errors(); 
            }
            return 0; //success
        }
        
        
    }
}