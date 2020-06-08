<?php

namespace App\Models;

use CodeIgniter\Model;

class AddOnModel extends Model {

    protected $table = 'addon';
    protected $primaryKey = 'idA';
    protected $returnType = 'object';
    protected $allowedFields = ['price', 'name', 'idShop', 'image'];

    public function getAllAddOnsForShop($idShop) {


        $sysUserModel = new SystemUserModel();
        if ($sysUserModel->existsAs("Shop", $idShop)) {


            return $this->builder()->select()->where("idShop", $idShop)->get()->getResultObject();
        } else {

            return ["error" => "This is not a shop. Please, stop hacking."];
        }
    }

    public function AddOnBelongsToCurrShop($idShop, $idA) {
        return $this->builder()->select()->where("idShop", $idShop)->where("idA", $idA)->get()->getResultObject();
    }

}
