<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models;


use CodeIgniter\Model;
/**
 * Description of ShopModel
 *
 * @author Simona
 */
class ShopModel extends Model {
    //put your code here

     protected $table      = 'shop';
    protected $primaryKey = 'id';

    protected $allowedFields=['id', 'shopName', 'description', 'state', 'address'];
  
    public function insertShop($id, $description, $shopName, $state, $address) {
        helper("date");
       $date= date("Y-m-d H:i", time()); 
        
        $this->insert(
                [
                    "id"=>$id, 
                    "description"=>$description, 
                    "state"=>$state, 
                    "submitDate" =>$date, 
                    "shopName"=>$shopName,
                    "address"=>$address
                    
                ]
                ); 
        
        
       return $id; 
       
    }
    
    
}

