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
class FavShopModel extends \CodeIgniter\Model {

    protected $table = 'favshop';
    protected $primaryKey = ['idUser', 'idShop'];
    protected $validationMessages = [];
    protected $allowedFields = ['idUser', 'idShop'];
    protected $returnType = "object";

    public function add($idUser, $idShop) {
        $this->insert(["idUser" => $idUser, "idShop" => $idShop], true);
    }

    public function exists($idUser, $idShop) {
        $row = $this->builder()->select()->where('idShop', $idShop)->where("idUser", $idUser)->get()->getRow();
        if (isset($row) && $row != null) {
            return true;
        } else {
            return false;
        }
    }


}
