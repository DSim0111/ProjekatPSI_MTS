<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models;

/**
 * Description of ShopModel
 *
 * @author Simona
 */
class ShopModel extends Model {
    //put your code here

     protected $table      = 'user';
    protected $primaryKey = 'idUser';



  
    protected $validationRules    =["address"=>'required'];
    protected $validationMessages = [];

        protected $allowedFields=['idUser' , 'address']; 
    
  
    public function insertUser($id, $address) {
      
        
       $this->insert([
           
           "idUser"=> $id, 
           "address" =>$address
           
       ], true); 
       return $id; 
       
       
       
    }
    
    
}

