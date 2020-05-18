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
class ProductModel extends \CodeIgniter\Model {

    protected $table = 'product';
    protected $primaryKey = 'idProduct';
    protected $returnType = "object";
    protected $allowedFields = ['idProduct', 'code', 'name', 'description', 'price', 'idShop', 'image'];
   public function alreadyExistsCode($id,$code){
      return $this->builder()->select()->where("code",$code)->where("idShop",$id)->get()->getResultObject();
    }
    //TODO[miki]: ERROR handling if there is no product with given id
    // find returns null if no row is matched 
    public function getProductsById($ids) {


        $this->builder()->select();
        foreach ($ids as $id) {
            $this->builder()->orWhere("idProduct", $id);
        }

        return $this->builder()->get()->getResultObject();
    }

    public function getAllProductsForShop($idShop) {

       
            $this->builder()->select()->where("idShop", $idShop);
            return $this->builder()->get()->getResultObject();
     
    }

}
