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

/**
 * Description of Shop
 *
 * @author Tijana
 */
class Shop  extends BaseController{
    //put your code here
    
    
    public function deleteProduct($id){
      
        $productModel=new ProductModel();
        $productModel->delete($id); 
        return redirect()->to(base_url("Shop/showAllProducts"));
        
    }
  
    public function submitNewData(){
        
     if(!$this->validate([
            
        'password' => 'required|min_length[10]|max_length[50]',
        'confirmPassword' => 'required|min_length[10]|max_length[50]',
        'email' => 'required|valid_email',
        'name' => 'required|max_length[18]',
        'surname' => 'required|max_length[18]',
        'phone' => 'required|max_length[18]',
        'address' => "required",
       'shopName' => 'required|min_length[5]',  
        'description' => 'required|min_length[10]|max_length[200]'
       
         ])){
           
          $idShop=$this->session->get("user_id");
          $shopModel=new ShopModel();
          $shop=$shopModel->getShop($idShop);
     
        return  $this->showMyCategories($shop);
  
         
        }else{
            $shopModel=new ShopModel();
            $shopModel->insertShop($this->session->get("user_id"), $this->request->getVar("description"), $this->request->getVar("shopName"), $this->request->getVar("address"), $this->request->getFile("image"), $this->request->getVar("phone"),$this->request->getVar("email"),$this->request->getVar("name"),$this->request->getVar("surname"));
            
        }
          return $this->changeData();
       
    }
     
   
    public function addCategories(){
        //////////////////////////////////////
        $shop_catModel=new Shop_CategoryModel();
        $newTags=$this->request->getVar("selected");
        if(isset($newTags))
       foreach($newTags as $elem){
           if(!$shop_catModel->alreadyExists($elem,$this->session->get("user_id"))){
            $shop_catModel->insertNew($elem,$this->session->get("user_id"));
          
           }
          
       }
        $idShop=$this->session->get("user_id");
          $shopModel=new ShopModel();
      $shop=$shopModel->getShop($idShop);
     
     return  $this->showMyCategories($shop);
  
    }
    public function showMyCategories($shop,$data=[]){
         $shop_catModel=new Shop_CategoryModel();
          $idShop=$this->session->get("user_id");
         
         
          //==================================ovde sam dodala idShop==============================================
        return $this->showPage("changeDataShop",['myCategories'=> $shop_catModel->findMyCategories($idShop),'shop'=>$shop,'allCategories'=>$data]);
    }
    public function deleteCategory($id){
        $shop_catModel=new Shop_CategoryModel();
      
       //==================================ovde sam dodala idShop==============================================
        $shop_catModel->where("idC",$id)->where("idShop", $this->session->get("user_id"))->delete();
        return redirect()->to(base_url("Shop/changeData"));
    }
    public function deleteAddOn($id){
         $addOnModel=new AddOnModel();
        $addOnModel->delete($id); 
        return redirect()->to(base_url("Shop/showAllProducts"));
        
    }
    public function filterSearch($tekst){
        $this->showMyCategories();
        $catModel=new CategoriesModel();
        $result=$catModel->search($tekst);
      return $this->showPage("changeDataShop",['allCategories'=>$result]);
    }
   public function showCategories(){
         $idShop=$this->session->get("user_id");
          $shopModel=new ShopModel();
      $shop=$shopModel->getShop($idShop);
      
      
      $catModel=new CategoriesModel();
       $allCategories=$catModel->findAll();
       $this->showMyCategories($shop,$allCategories);
       // 
      //return $this->showPage("changeDataShop",['allCategories'=>$all]);
   }
    public function changeData(){
         $idShop=$this->session->get("user_id");
          $shopModel=new ShopModel();
      $shop=$shopModel->getShop($idShop);
      
   return   $this->showMyCategories($shop);
      
      
        
    }
    public function showMyPage(){
          $productModel=new ProductModel();
      
       //////////////////////////////////
       $idShop=$this->session->get("user_id");
        $allProducts=$productModel->getAllProductsForShop($idShop);
       $shopModel=new ShopModel();
      $shop=$shopModel->getShop($idShop);
       
        return $this->showPage("shopPageShop",array_merge(['allProducts'=>$allProducts],['shop'=>$shop]));
    }
    public function showAllProducts(){
        ////////////////////////////////
         $idShop=$this->session->get("user_id");
         $productModel=new ProductModel();
         $allProducts=$productModel->getAllProductsForShop($idShop);
       
         $shopModel=new ShopModel();
         $shop=$shopModel->getShop($idShop);
          
       $addOnModel=new AddOnModel();
       $allAddOns=$addOnModel->getAllAddOnsForShop($idShop);
     return   $this->showMyaddRemoveProductPage(['allProducts'=>$allProducts,'allAddOns'=>$allAddOns,'shop'=>$shop]);
        
    }
    public function addProduct(){
        
            return $this->showPage("addProduct" , []);
        
    }
    public function addAddOn(){
        return $this->showPage("addAddOn" , []);
    }
    protected function showMyaddRemoveProductPage($data){
        
       return  $this->showPage('addRemoveProductsShop', $data);
    }
    public function newProductSubmit(){
        
        
      if(!$this->validate(['product_name'=>'required|max_length[18]',
            'product_code'=>'required|max_length[12]',
           'product_desc'=>'max_length[200]',
            'product_quantity'=>'required|integer',
            'product_price'=>'required|decimal'])){
          
           return $this->showPage('addProduct',$this->validator->getErrors());
        }
           $newName="newfileName"; 
        $file= $this->request->getFile("image"); 
        
       
             
             if($file!=null){
                
                if($file->isValid()){
                    $newName = $file->getRandomName();
                     $file->move('./uploads', $newName);
                 }
         
             }
        
      ///////////////////////////////////////////////////////////////
        
        $productModel=new ProductModel();
        $productModel->save([
            'name'=>$this->request->getVar('product_name'),
            'code'=>$this->request->getVar('product_code'),
            'price'=>$this->request->getVar('product_price'),
            'quantity'=>$this->request->getVar('product_quantity'),
            'description'=>$this->request->getVar('product_desc'),
              'image'=>$newName,
            'idShop'=>$this->session->get("user_id")
                
        ]);
         return redirect()->to(base_url("Shop/showAllProducts"));
        
    
    }
     public function newAddOnSubmit(){
        
      if(!$this->validate(['addOn_name'=>'required|max_length[18]',
           
           
            'addOn_price'=>'required|decimal'])){
          
           return $this->showPage('addAddOn',$this->validator->getErrors());
        }
         
        
         
        
      
         $file= $this->request->getFile("image"); 
             if($file!=null){
                  
                $newName="newfileName"; 
                if($file->isValid()){
                    $newName = $file->getRandomName();
                     $file->move('./uploads', $newName);
                 }
         }
         /////////////////////////////////////////////////////////////
        $addOnModel=new AddOnModel();
        $addOnModel->save([
            'name'=>$this->request->getVar('addOn_name'),
           
            'price'=>$this->request->getVar('addOn_price'),
           'image'=>$newName,
            'idShop'=> $this->session->get("user_id")
                
        ]);
       
         return redirect()->to(base_url("Shop/showAllProducts"));
        
    
    }
    public function showDeliveryRequests(){
        $this->showUnhandledDeliveryRequests();
    }
    public function showHandledDeliveryRequests(){
         $DeliveryRequestsModel=new DeliveryRequestsModel();
         $DeliveryProductsModel=new DeliveryProductsModel();
         $DeliveryAddOnsModel=new DeliveryAddOnsModel();
        //dohvata sve iz deliveryrequest + info o useru koji porucuje(systemuser+user tabele)
         $requests = $DeliveryRequestsModel->handledRequestForShopWithID($this->session->get("user_id"));
        $requestedProducts=array();
      $requestedAddOns=array();
     foreach($requests as $request){
     //dohvata products za svaki request i dodatke
        
  
         $requestedProducts[$request->idDelReq]=$DeliveryProductsModel->ShowProductsForRequestWithID($request->idDelReq);
         $requestedAddOns[$request->idDelReq]=$DeliveryAddOnsModel->ShowAddOnsForRequestWithID($request->idDelReq);
      
       }
        return $this->showPage("showUserRequest",['requests'=>$requests,'requestedProducts'=>$requestedProducts,'requestedAddOns'=>$requestedAddOns,'unhandle'=>false]);
        
    }
    public function showUnhandledDeliveryRequests(){
        $DeliveryRequestsModel=new DeliveryRequestsModel();
         $DeliveryProductsModel=new DeliveryProductsModel();
         $DeliveryAddOnsModel=new DeliveryAddOnsModel();
        //dohvata sve iz deliveryrequest + info o useru koji porucuje(systemuser+user tabele)
         $requests = $DeliveryRequestsModel->unhandledRequestForShopWithID($this->session->get("user_id"));
        $requestedProducts=array();
      $requestedAddOns=array();
     foreach($requests as $request){
     //dohvata products za svaki request i dodatke
        
  
         $requestedProducts[$request->idDelReq]=$DeliveryProductsModel->ShowProductsForRequestWithID($request->idDelReq);
         $requestedAddOns[$request->idDelReq]=$DeliveryAddOnsModel->ShowAddOnsForRequestWithID($request->idDelReq);
      
     } 
    
     return $this->showPage("showUserRequest",['requests'=>$requests,'requestedProducts'=>$requestedProducts,'requestedAddOns'=>$requestedAddOns,'unhandled'=>true]);
        
    }
    public function changeStateToDelivered($id){
        
          $DeliveryRequestsModel=new DeliveryRequestsModel();
          
          if($DeliveryRequestsModel->existsRequestForShop($id, $this->session->get("user_id"))){
                $DeliveryRequestsModel->update($id,['state'=>'delivered']);
                return $this->showDeliveryRequests();
          }else{
              echo "There is no such request in your database.Please go back";
          }
    }
     public function changeStateToCancelled($id){
          $DeliveryRequestsModel=new DeliveryRequestsModel();
          
           if($DeliveryRequestsModel->existsRequestForShop($id, $this->session->get("user_id"))){
                 $DeliveryRequestsModel->update($id,['state'=>'cancelled']);
                 return $this->showDeliveryRequests();
           }else{
               echo "There is no such request in your database.Please go back";
           }
         
    }
    
    
}
