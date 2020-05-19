<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controllers;

use App\Models\ShopModel;
use App\Models\SystemUserModel;

/**
 * Description of Administrator
 *
 * @author Simona
 */
class Administrator extends BaseController {

    //put your code here
    //SIMONA
    public function registerAdmin($data = []) {



        $this->showPage("registerAdmin_admin", $data);
    }

    //SIMONA 
    //
    public function markAsRead($data = []) {
        $idShop = $this->request->getVar("idShop");
        $idUser = $this->request->getVar("idUser");
        if (isset($idShop) && isset($idUser)) {
            $reportModel = new \App\Models\ShopReportsModel();
            $reportModel->markAsRead($idUser, $idShop);
        }
        return redirect()->back();
    }

    //SIMONA
    public function registerAdminSubmit() {



        //validate input data 
        $retVal = $this->validateRegisterData(BaseController::$userValidationRules);
        if ($retVal != null) {


            return $this->registerAdmin($retVal);
        }


        $sysUser = new SystemUserModel ();
        $ret = $sysUser->insertAdmin(
                $this->request->getVar("username"),
                $this->request->getVar("name"),
                $this->request->getVar("surname"),
                $this->request->getVar("password"),
                $this->request->getVar("email"),
                $this->request->getVar("phoneNum"),
                "");

        if ($ret === 0) {
            //Success 
            return $this->registerAdmin(["message" => "Success!"]);
        } else {

            // username exists, email exist..
            return $this->registerAdmin($ret);
        }
    }

    //SIMONA
    public function shopReports() {
        $reportsModel = new \App\Models\ShopReportsModel();
        $unread = $this->request->getVar("unread");
        if (isset($unread) && $unread == "true") {
            $status = 'A';
        } else {
            $status = null;
        }
        $reports = $reportsModel->getAllReportsWithStatus($status);

        if (array_key_exists("error", $reports)) {
            //there has been an error

            return $this->showPage("shopReports_admin", $reports);
        } else {
            return $this->showPage("shopReports_admin", ["reports" => $reports]);
        }
    }

    //MILAN
    public function shopApproval() {
        $shopModel = new ShopModel();
        $shops = $shopModel->getAllInactiveShops();
        $this->showPage('shop_registration_approval', ['shops' => $shops]);
    }

    //MILAN
    public function accept() {
        $shopModel = new ShopModel();
        $id = $this->request->getVar('id');
        $data = ['state' => 'A'];
        if ($shopModel->existShop($id,'I')) {
            $shopModel->updateShopID($id, $data);
        } else {
            return $this->showPage('basicErrorPage',["error"=>"Shop doesn't exist or shop doesn't wait for approval!"]);
        }
        return redirect()->to(base_url("Administrator/shopApproval"));
    }

    //MILAN
    public function reject() {
        $shopModel = new ShopModel();
        $id = $this->request->getVar('id');
        $data = ['state' => 'B'];
        if ($shopModel->existShop($id,'I')) {
            $shopModel->updateShopID($id, $data);
        } else {
            return $this->showPage('basicErrorPage',["error"=>"Shop doesn't exist or shop doesn't wait for approval!"]);
        }
        return redirect()->to(base_url("Administrator/shopApproval"));
    }

    //MILAN
    public function removeShop() {
        $shopModel = new ShopModel();
        $id = $this->request->getVar('shopId');
        if (!isset($id)) {
            return redirect()->to(base_url("Guest/pageNotFound"));
        }
        $data = ["state" => "B"];
        if ($shopModel->existShop($id,'A')) {
            $shopModel->updateShopID($id, $data);
        } else {
            return $this->showPage('basicErrorPage',["error"=>"Shop doesn't exist or shop is not active!"]);
        }
        return redirect()->to(base_url("Administrator/listShops"));
    }

}
