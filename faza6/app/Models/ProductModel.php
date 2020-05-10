<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models;

/**
 * Description of AdministratorModel
 *
 * @author Milan
 */ 
class ProductModel  extends \CodeIgniter\Model{
    protected $table      = 'product';
    protected $primaryKey = 'idProduct';
    protected $returnType="object";
    protected $allowedFields=['idProduct', 'code', 'name', 'description', 'price', 'idShop','image'];
    //TODO[miki]: ERROR handling if there is no product with given id
    public function getProductsById($ids){
        $products = Array();
        foreach($ids as $id){
            array_push($products,$this->find($id));
        }
        return $products;
    }

}


