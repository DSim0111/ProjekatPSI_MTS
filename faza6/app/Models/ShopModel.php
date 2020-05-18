<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models;

use CodeIgniter\Model;
use App\Models\SystemUserModel;

/**
 * Description of ShopModel
 *
 * @author Simona
 */
class ShopModel extends Model {

    //put your code here

    protected $table = 'shop';
    protected $primaryKey = 'id';
    protected $returnType = "object";
    protected $allowedFields = ['id', 'shopName', 'description', 'state', 'address'];

    public function insertShop($id, $description, $shopName, $state, $address) {
        helper("date");

        // TODO 
        // wtf is this 
        $date = date("Y-m-d H:i", time());

        $this->insert(
                [
                    "id" => $id,
                    "description" => $description,
                    "state" => $state,
                    "submitDate" => $date,
                    "shopName" => $shopName,
                    "address" => $address
                ]
        );


        return $id;
    }

    //metoda za update podataka kad Shop zeli da izmeni podatke
    public function updateDataShop($idShop, $description, $shopName, $address, $image, $phoneNum, $name, $surname, $password) {



        $this->update($idShop,
                [
                    'shopName' => $shopName,
                    'address' => $address,
                    'description' => $description,
                ]
        );

        $systemUserModel = new SystemUserModel();
        if ($password != "**********") {
            $systemUserModel->update($idShop, ['name' => $name, 'surname' => $surname, 'phoneNum' => $phoneNum, 'image' => $image, 'password' => $password]);
        } else
            $systemUserModel->update($idShop, ['name' => $name, 'surname' => $surname, 'phoneNum' => $phoneNum, 'image' => $image]);
    }

    /**
     * @return Array of objects containing all Shop data except password, submitDate and state */
    public function getAllShops() {

        $this->builder()->select("Shop.id as id, description, shopName, address,S.username, S.name , S.surname , S.email , S.phoneNum , S.image ")->join("Systemuser as S", "S.id=Shop.id");
        return $this->builder()->get()->getResultObject();
    }

    /**
     * @return Array of objects containing all Shop data except password */
    public function getAllInactiveShops() {
        $this->builder()->select("Shop.id as id, description, shopName, address,S.username, S.name , S.surname , S.email , S.phoneNum , S.image, state, submitDate ")->where("state", 'I')->join("Systemuser as S", "S.id=Shop.id");
        return $this->builder()->get()->getResultObject();
    }

    public function getShops($search, $categories, $sortColumn, $sortOrder) {

        $this->builder()->select("*, AVG(coalesce(rating, 0)) as rating")->
                join("systemuser as S", "S.id=Shop.id")->
                join("rating as r", "r.idShop=S.id", 'left')->like('shopName', $search);
        if (!empty($categories)) {
            $this->builder()->join("ShopCat as C", "C.idShop=S.id");
            $this->builder()->groupStart();
            foreach ($categories as $cat) {

                $this->builder()->orWhere("idC", $cat);
            }
            $this->builder()->groupEnd();
        }
        $this->builder()->groupBy("shop.id");
        $this->builder()->orderBy($sortColumn, $sortOrder);

        $res = $this->builder()->get()->getResultObject();
        //print_r($this->db->getLastQuery());
        return $res;
    }

    public function getShopsFav($search, $categories, $sortColumn, $sortOrder, $idUser) {

        $this->builder()->select("*, AVG(coalesce(rating, 0)) as rating")->
                join("systemuser as S", "S.id=Shop.id")->
                join("rating as r", "r.idShop=S.id", 'left')->join("favshop as f", "f.idUser=$idUser and f.idShop=S.id")->like('shopName', $search);
        if (!empty($categories)) {
            $this->builder()->join("ShopCat as C", "C.idShop=S.id");
            $this->builder()->groupStart();
            foreach ($categories as $cat) {

                $this->builder()->orWhere("idC", $cat);
            }
            $this->builder()->groupEnd();
        }
        $this->builder()->groupBy("shop.id");
        $this->builder()->orderBy($sortColumn, $sortOrder);

        $res = $this->builder()->get()->getResultObject();
        //print_r($this->db->getLastQuery());
        return $res;
    }

    public function getShop($id) {


        $this->builder()->select()->join("systemuser as s", "Shop.id=s.id")->where("S.id", $id);
        return $this->builder()->get()->getFirstRow();
    }

    //MILAN
    //TODO[miki]: ERROR handling if there is no shop with given id
    public function updateShopID($id, $data) {
        $this->update(['id' => $id], $data);
    }

    //MILAN
    public function getShopsByIds($idUser) {
        $this->builder()->select("Shop.id as id, description, shopName, address,S.username, S.name , S.surname , S.email , S.phoneNum , S.image, state, submitDate ")->where("state", 'A')->join("Systemuser as S", "S.id=Shop.id");
        return $this->builder()->get()->getResultObject();
    }

}
