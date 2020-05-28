<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models;

/**
 * Description of UserModel
 *
 * @author Simona
 */
class UserModel extends \CodeIgniter\Model{
   
    
    
     protected $table      = 'user';
    protected $primaryKey = 'id';



  
    protected $validationRules    =["address"=>'required'];
    protected $validationMessages = [];

        protected $allowedFields=['id' , 'address']; 
    
  
    public function insertUser($id, $address) {
      
        
       $this->insert([
           
           "id"=> $id, 
           "address" =>$address
           
       ], true); 
       return $id; 
       
       
       
    }
    /**
     * TODO - Validate $username as alnum string 
     *      */
    public function getUserByUsername($username){
        
        
        $this->builder()->select()->join("Systemuser s", "s.id=User.id")->where("username", $username); 
        return $this->builder()->get()->getFirstRow();
    }
    
    
}
