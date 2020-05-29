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

    public function alreadyExistsCode($id, $code) {
        return $this->builder()->select()->where("code", $code)->where("idShop", $id)->get()->getResultObject();
    }
    
    public function getProductsById($ids) {
        $products = [];
        foreach ($ids as $id) {
            array_push($products,$this->find($id));
        }
        return $products;
    }

    public function getAllProductsForShop($idShop) {


        $this->builder()->select()->where("idShop", $idShop);
        return $this->builder()->get()->getResultObject();
    }

    public function exists($shopId, $product) {
        $products = $this->builder()->select()->where("idProduct", $product)->where("idShop", $shopId)->get()->getResultObject();
        if ($products == null)
            return false;
        else
            return true;
    }
    public function productBelongsToCurrShop($idShop,$idP){
            return $this->builder()->select()->where("idShop",$idShop)->where("idProduct",$idP)->get()->getResultObject();
    }

}
