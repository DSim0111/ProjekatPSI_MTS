<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * Description of CategoriesModel
 *
 * @author Simona
 */
class DeliveryRequestsModel extends Model {

    //put your code here
    protected $table = 'deliveryrequest';
    protected $primaryKey = 'idDelReq';
    protected $returnType = 'object';
    protected $allowedFields = ['idUser', 'idProduct', 'idShop', 'state', 'submitDate', 'payment', 'notes', 'address', 'submitTime', 'receiverName', 'receiverSurname', 'deliverDate', 'deliverTime'];

    public function handledRequestForShopWithID($idShop) {
        return $this->builder()->select("*,  DeliveryRequest.address as dAddress, User.address as UserAddress")->where("idShop", $idShop)->where("state!=", "A")->join("user", "user.id=deliveryrequest.idUser")->join("systemuser", "systemuser.id=deliveryrequest.idUser")->get()->getResultObject();
    }

    public function unhandledRequestForShopWithID($idShop) {
        return $this->builder()->select("*, DeliveryRequest.address as dAddress, User.address as UserAddress")->where("idShop", $idShop)->where("state", "A")->join("user", "user.id=deliveryrequest.idUser")->join("systemuser", "systemuser.id=deliveryrequest.idUser")->get()->getResultObject();
    }

    public function existsRequestForShop($idReq, $idShop) {

        $obj = $this->builder()->select()->where("idDelReq", $idReq)->where("idShop", $idShop)->where("state", "A")->get()->getRow();
        if ($obj != null)
            return true;
        else
            return false;
    }

    public function insertData($data) {
        return $this->insert($data);
    }

}
