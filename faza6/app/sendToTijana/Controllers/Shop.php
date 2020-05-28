<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controllers;

use App\Models\AddOnModel;
use App\Models\CategoryModel;
use App\Models\Shop_CategoryModel;

use App\Models\ProductModel;
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
           
           $this->showMyCategories();
        
           return $this->showPage('changeDataShop',$this->validator->getErrors());
         
        }
          
       
    }
     
   
    public function addCategories(){
        $shop_catModel=new Shop_CategoryModel();
        $newTags=$this->request->getVar("selected");
        if(isset($newTags))
       foreach($newTags as $elem){
           if(!$shop_catModel->alreadyExists($elem)){
            $shop_catModel->insertNew($elem);
          
           }
          
       }
       
       //OVDI MI TREBA ID SHOP-A
     return  $this->showMyCategories();
    //  return $this->prikaz("changeDataShop",['myCategories'=> $shop_catModel->findMyCategories(1)]);
    }
    public function showMyCategories(){
         $shop_catModel=new Shop_CategoryModel();
        // ID 
        return $this->showPage("changeDataShop",['myCategories'=> $shop_catModel->findMyCategories(1)]);
    }
    public function deleteCategory($id){
        $shop_catModel=new Shop_CategoryModel();
        //OVDI MI TREBA ID SHOP-A
        $shop_catModel->where("idC",$id)->where("idShop",'1')->delete();
        return redirect()->to(base_url("Shop/changeData"));
    }
    public function deleteAddOn($id){
         $addOnModel=new AddOnModel();
        $addOnModel->delete($id); 
        return redirect()->to(base_url("Shop/showAllProducts"));
        
    }
    public function filterSearch($tekst){
        $this->showMyCategories();
        $catModel=new CategoryModel();
        $result=$catModel->search($tekst);
      return $this->showPage("changeDataShop",['allCategories'=>$result]);
    }
   public function showCategories(){
       $this->showMyCategories();
        $catModel=new CategoryModel();
       $all=$catModel->findAll();
       return $this->showPage("changeDataShop",['allCategories'=>$all]);
   }
    public function changeData(){
       $this->showMyCategories();
        return $this->showPage("changeDataShop",[]);
        
    }
    public function showMyPage(){
          $productModel=new ProductModel();
          $idShop=$this->session->get("user_id");
       $allProducts=$productModel->getAllProductsForShop($idShop);
        return $this->showPage("shopPageShop",['allProducts'=>$allProducts]);
    }
    public function showAllProducts(){
         $idShop=$this->session->get("user_id");
        $productModel=new ProductModel();
       $allProducts=$productModel->getAllProductsForShop($idShop);
       
       $addOnModel=new AddOnModel();
       $allAddOns=$addOnModel->getAllAddOnsForShop($idShop);
     return   $this->showMyaddRemoveProductPage(['allProducts'=>$allProducts,'allAddOns'=>$allAddOns]);
        
    }
    public function addProduct(){
        
            return $this->showPage("addProduct" , []);
        
    }
    public function addAddOn(){
        return $this->showPage("addAddOn" , []);
    }
    public function showMyaddRemoveProductPage($data){
        
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
        
      
        
        $productModel=new ProductModel();
        $productModel->save([
            'name'=>$this->request->getVar('product_name'),
            'code'=>$this->request->getVar('product_code'),
            'price'=>$this->request->getVar('product_price'),
            'quantity'=>$this->request->getVar('product_quantity'),
            'description'=>$this->request->getVar('product_desc'),
              'image'=>$newName,
            'idShop'=>'1'
                
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
        $addOnModel=new AddOnModel();
        $addOnModel->save([
            'name'=>$this->request->getVar('addOn_name'),
           
            'price'=>$this->request->getVar('addOn_price'),
           'image'=>$newName,
            'idShop'=>'1'
                
        ]);
       
         return redirect()->to(base_url("Shop/showAllProducts"));
        
    
    }
    
    
    
    
}
