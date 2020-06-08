<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controllers;

use App\Models\AddOnModel;
use App\Models\CategoriesModel;
use App\Models\Shop_CategoryModel;
use App\Models\ShopModel;
use App\Models\ProductModel;
use App\Models\DeliveryRequestsModel;
use App\Models\DeliveryProductsModel;
use App\Models\DeliveryAddOnsModel;
use App\Models\CommentsModel;

/**
 * Description of Shop
 *
 * @author Tijana
 */
class Shop extends BaseController {

    //put your code here
    public function index() {

        return $this->showMyPage();
    }

    public function deleteProduct($id) {

        $productModel = new ProductModel();
         if($productModel->productBelongsToCurrShop($this->session->get("user_id"), $id)){
          $productModel->delete($id); 
         }
       
        return redirect()->to(base_url("Shop/showAllProducts"));
    }
    
    public function submitNewData() {
        $idShop = $this->session->get("user_id");
            $shopModel = new ShopModel();
            $shop = $shopModel->getShop($idShop);
        if (!$this->validate([
                    'password' => 'required|min_length[10]|max_length[255]',
                    'confirmPassword' => 'required|min_length[10]|max_length[255]',
                    'name' => 'required|max_length[18]',
                    'surname' => 'required|max_length[18]',
                    'phoneNum' => 'required|max_length[18]|numeric',
                    'address' => 'required|max_length[60]',
                    'shopName' => 'required|min_length[5]|max_length[40]',
                    'description' => 'required|min_length[10]'
                ])) {


            

            return $this->showPage("changeDataShop", array_merge($this->validator->getErrors(), ['shop' => $shop]));
        } else  {
            if (strcmp($this->request->getVar('password'), $this->request->getVar('confirmPassword')) == 0) {
                $newName = "newfileName";

                $file = $this->request->getFile("image");



                if ($file != null) {

                    if ($file->isValid()) {
                        $newName = $file->getRandomName();
                        $file->move('./uploads', $newName);
                    }
                }
                $shopModel = new ShopModel();

                $shopModel->updateDataShop($this->session->get("user_id"), $this->request->getVar('description'), $this->request->getVar('shopName'), $this->request->getVar('address'), $newName, $this->request->getVar('phoneNum'), $this->request->getVar('name'), $this->request->getVar('surname'), $this->request->getVar('password'));
            }else
                return $this->showPage("changeDataShop", array_merge(['confirmPassword'=>"Password and Confirm Password do not match"],['password'=>"Password and Confirm Password do not match"], ['shop' => $shop]));

        }
      //  return $this->changeData();
        $_SESSION["success"] = "You successfully changed your data!";
        return redirect()->to(base_url("Shop/changeData"));
        
    }

    public function addCategories() {
      $shop_catModel = new Shop_CategoryModel();
        $newTags = $this->request->getVar("selected");
        if (isset($newTags))
            foreach ($newTags as $elem) {
                if (!$shop_catModel->alreadyExists($elem, $this->session->get("user_id"))) {
                    $shop_catModel->insertNew($elem, $this->session->get("user_id"));
                }
            }
        $idShop = $this->session->get("user_id");
        $shopModel = new ShopModel();
        $shop = $shopModel->getShop($idShop);

        return $this->showMyCategories($shop);
    }

    public function showMyCategories($shop, $data = []) {
        $shop_catModel = new Shop_CategoryModel();
        $idShop = $this->session->get("user_id");


        return $this->showPage("changeDataShop", ['myCategories' => $shop_catModel->findMyCategories($idShop), 'shop' => $shop, 'allCategories' => $data]);
    }

    public function deleteCategory($id) {
        $shop_catModel = new Shop_CategoryModel();
        $shop_catModel->where("idC", $id)->where("idShop", $this->session->get("user_id"))->delete();
        return redirect()->to(base_url("Shop/changeData"));
    }

    public function deleteAddOn($id) {
        $addOnModel = new AddOnModel();
        if($addOnModel->AddOnBelongsToCurrShop($this->session->get("user_id"), $id)){
        $addOnModel->delete($id);
        }
        return redirect()->to(base_url("Shop/showAllProducts"));
    }

    public function filterSearch() {
         $idShop=$this->session->get("user_id");
          $shopModel=new ShopModel();
      $shop=$shopModel->getShop($idShop);
      
     
        $catModel=new CategoriesModel();
        $tekst=$this->request->getVar('search_input');
        
        $result=$catModel->search($tekst);
        if (empty($result))$result="search";
        return  $this->showMyCategories($shop,$result);
    }

    public function showCategories() {
        $idShop = $this->session->get("user_id");
        $shopModel = new ShopModel();
        $shop = $shopModel->getShop($idShop);


        $catModel = new CategoriesModel();
        $allCategories = $catModel->findAll();
        $this->showMyCategories($shop, $allCategories);
       
        //return $this->showPage("changeDataShop",['allCategories'=>$all]);
    }

    public function changeData() {
        $idShop = $this->session->get("user_id");
        $shopModel = new ShopModel();
        $shop = $shopModel->getShop($idShop);

        return $this->showMyCategories($shop);
    }

    public function showMyPage() {
        $productModel = new ProductModel();

        //////////////////////////////////
        $idShop = $this->session->get("user_id");
        $allProducts = $productModel->getAllProductsForShop($idShop);
        $shopModel = new ShopModel();
        $shop = $shopModel->getShop($idShop);

        $commentsModel = new CommentsModel();
        $shop_catModel = new Shop_CategoryModel();
       
        $comments = $commentsModel->getAllCommentsForShop($idShop);

        $userRole = $this->session->get("logged_in_as");

        return $this->showPage("shopPageShop", array_merge(['allProducts' => $allProducts],['myCategories' => $shop_catModel->findMyCategories($idShop)], ['shop' => $shop], ['comments' => $comments], ['userRole' => $userRole]));
    }

    public function showAllProducts() {
        ////////////////////////////////
        $idShop = $this->session->get("user_id");
        $productModel = new ProductModel();
        $allProducts = $productModel->getAllProductsForShop($idShop);

        $shopModel = new ShopModel();
        $shop = $shopModel->getShop($idShop);

        $addOnModel = new AddOnModel();
        $allAddOns = $addOnModel->getAllAddOnsForShop($idShop);
        return $this->showMyaddRemoveProductPage(['allProducts' => $allProducts, 'allAddOns' => $allAddOns, 'shop' => $shop]);
    }

    public function addProduct() {

        return $this->showPage("addProduct", []);
    }

    public function addAddOn() {
        return $this->showPage("addAddOn", []);
    }

    protected function showMyaddRemoveProductPage($data) {

        return $this->showPage('addRemoveProductsShop', $data);
    }

    public function newProductSubmit() {
        $productModel = new ProductModel();
        $result = $productModel->alreadyExistsCode($this->session->get("user_id"), $this->request->getVar("product_code"));
        if (!$this->validate(['product_name' => 'required|max_length[40]',
                    'product_code' => 'required|max_length[12]',
                    'product_desc' => 'max_length[400]',
                    'product_price' => 'required|decimal'])) {

            if (!empty($result)) {
                return $this->showPage('addProduct', array_merge($this->validator->getErrors(), ['non_unique' => 'true']));
            } else {

                return $this->showPage('addProduct', $this->validator->getErrors());
            }
        }
        if (!empty($result)) {

            return $this->showPage('addProduct', array_merge($this->validator->getErrors(), ['non_unique' => 'true']));
        }
        $newName = "newfileName";
        $file = $this->request->getFile("image");



        if ($file != null) {

            if ($file->isValid()) {
                $newName = $file->getRandomName();
                $file->move('./uploads', $newName);
            }
        }

        ///////////////////////////////////////////////////////////////

        $productModel->save([
            'name' => $this->request->getVar('product_name'),
            'code' => $this->request->getVar('product_code'),
            'price' => $this->request->getVar('product_price'),
            'quantity' => $this->request->getVar('product_quantity'),
            'description' => $this->request->getVar('product_desc'),
            'image' => $newName,
            'idShop' => $this->session->get("user_id")
        ]);
        return redirect()->to(base_url("Shop/showAllProducts"));
    }

    public function newAddOnSubmit() {

        if (!$this->validate(['addOn_name' => 'required|max_length[40]',
                    'addOn_price' => 'required|decimal'])) {

            return $this->showPage('addAddOn', $this->validator->getErrors());
        }





        $file = $this->request->getFile("image");
        if ($file != null) {

            $newName = "newfileName";
            if ($file->isValid()) {
                $newName = $file->getRandomName();
                $file->move('./uploads', $newName);
            }
        }
        /////////////////////////////////////////////////////////////
        $addOnModel = new AddOnModel();
        $addOnModel->save([
            'name' => $this->request->getVar('addOn_name'),
            'price' => $this->request->getVar('addOn_price'),
            'image' => $newName,
            'idShop' => $this->session->get("user_id")
        ]);

        return redirect()->to(base_url("Shop/showAllProducts"));
    }

    public function showDeliveryRequests() {
        $this->showUnhandledDeliveryRequests();
    }

    public function showHandledDeliveryRequests() {
        $DeliveryRequestsModel = new DeliveryRequestsModel();
        $DeliveryProductsModel = new DeliveryProductsModel();
        $DeliveryAddOnsModel = new DeliveryAddOnsModel();
        //dohvata sve iz deliveryrequest + info o useru koji porucuje(systemuser+user tabele)
        $requests = $DeliveryRequestsModel->handledRequestForShopWithID($this->session->get("user_id"));
        $requestedProducts = array();
        $requestedAddOns = array();
        foreach ($requests as $request) {
            //dohvata products za svaki request i dodatke


            $requestedProducts[$request->idDelReq] = $DeliveryProductsModel->ShowProductsForRequestWithID($request->idDelReq);
            $requestedAddOns[$request->idDelReq] = $DeliveryAddOnsModel->ShowAddOnsForRequestWithID($request->idDelReq);
        }
        return $this->showPage("showUserRequest", ['requests' => $requests, 'requestedProducts' => $requestedProducts, 'requestedAddOns' => $requestedAddOns, 'unhandled' => false]);
    }

    public function showUnhandledDeliveryRequests() {
        $DeliveryRequestsModel = new DeliveryRequestsModel();
        $DeliveryProductsModel = new DeliveryProductsModel();
        $DeliveryAddOnsModel = new DeliveryAddOnsModel();
        //dohvata sve iz deliveryrequest + info o useru koji porucuje(systemuser+user tabele)
        $requests = $DeliveryRequestsModel->unhandledRequestForShopWithID($this->session->get("user_id"));
        $requestedProducts = array();
        $requestedAddOns = array();
        foreach ($requests as $request) {
            //dohvata products za svaki request i dodatke


            $requestedProducts[$request->idDelReq] = $DeliveryProductsModel->ShowProductsForRequestWithID($request->idDelReq);
            $requestedAddOns[$request->idDelReq] = $DeliveryAddOnsModel->ShowAddOnsForRequestWithID($request->idDelReq);
        }

        return $this->showPage("showUserRequest", ['requests' => $requests, 'requestedProducts' => $requestedProducts, 'requestedAddOns' => $requestedAddOns, 'unhandled' => true]);
    }

    public function changeStateToDelivered($id) {

        $DeliveryRequestsModel = new DeliveryRequestsModel();

        if ($DeliveryRequestsModel->existsRequestForShop($id, $this->session->get("user_id"))) {
            $DeliveryRequestsModel->update($id, ['state' => 'delivered']);
            return $this->showDeliveryRequests();
        } else {
            echo "There is no such request in your database.Please go back";
        }
    }

    public function changeStateToCancelled($id) {
        $DeliveryRequestsModel = new DeliveryRequestsModel();

        if ($DeliveryRequestsModel->existsRequestForShop($id, $this->session->get("user_id"))) {
            $DeliveryRequestsModel->update($id, ['state' => 'cancelled']);
            return $this->showDeliveryRequests();
        } else {
            echo "There is no such request in your database.Please go back";
        }
    }

    public function showPage($page, $data = array()) {

        parent::showPage($page, array_merge($data, ["header" => "templates/header_shop"]));
    }

}
