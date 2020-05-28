<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controllers;
use App\Models\ProductModel;



/**
 * Description of User
 *
 * @author Simona
 */
class User  extends BaseController{
    //put your code here
     public function reportShop($data=[]){
          $shopModel=new \App\Models\ShopModel(); 
            $id=$this->request->getVar("shopId"); 
            if(!isset($id)){
                
                return redirect()->to( base_url("Guest/pageNotFound")); 
            }
            
           
            $shop=$shopModel->getShop($id);
         
            $this->showPage("reportShop_user",array_merge(["shop"=>$shop], $data));
         
     }
     public function reportShopSubmit(){
                 $id=$this->request->getVar("shopId"); 
                if(!isset($id)){

                    return redirect()->to( base_url("Guest/pageNotFound")); 
                }
                if(!$this->validate(["message"=>'required'], ["message"=>["required"=>"Message is a required field. "]])){
                    return $this->reportShop(["error"=>$this->validator->getError()]); 
                 } else{
                     
                     $shopReportModel=new \App\Models\ShopReportsModel(); 
                     
                   $obj= $shopReportModel->insertShopReport($id, $this->session->get("user_id"), $this->request->getVar("message")); 
                    if(!isset($obj)|| !is_object($obj)){
                        
                        return $this->reportShop($obj);
                    }
                     return $this->reportShop(["success"=>"You successfully submited report for this shop. We will consider it as soon as possible."]);
                 }
               
         
     }
     
     
     public function shopPage($data=[]){
       
         $ratingModel= new \App\Models\RatingModel(); 
          $idShop=$this->request->getVar("shopId");
         $row=$ratingModel->getRating($this->session->get("user_id"), $idShop);
         
            if($row!=null){
              
                $data=array_merge($data, ["rating"=> $row]); 
                
            }
         /**/
         parent::shopPage( $data ); 
     }
     public function addCommentSubmit(){
         
         if(!$this->validate(["commentField"=>'required|max_length[200]'], ["commentField"=>['required'=>"This field is required"]])){
             
             return $this->shopPage($this->validator->getErrors()); 
             
         } else{
             $shopId=$this->request->getVar("shopId"); 
             $userId=$this->session->get("user_id"); 
             $commModel=new \App\Models\CommentsModel(); 
             
             $ret=$commModel->insertComment($userId, $shopId, $this->request->getVar("commentField")); 
             
             if(is_int($ret)){
                 // success 
                 
                 //PRG
                 return redirect()->to(base_url("User/shopPage?shopId=".$shopId));  
             }
             return $this->shopPage($ret); 
              
             
         }
         
     }
     
     public function ratingSubmit(){
         
         
         $ratingModel= new \App\Models\RatingModel(); 
         $shop= $this->request->getVar("shopId"); 
         $user=$this->session->get("user_id");
         $rating=$this->request->getVar("rating");
         $obj=$ratingModel->insertOrUpdateRating($shop, $user, $rating);
         
         if(array_key_exists("errorRating", $obj)){
             
           return $this->shopPage($obj);
         }else{
             //SUCCESS 
             // post redirect get 
             return redirect()->to(base_url("User/shopPage?shopId=".$shop));
         }
     }


  //TODO[miki]: dump is just temporary
    public function index() {
        $this->showPage('dump', []);
    }

//MILAN
 public function checkCart() {
;
        $productModel = new ProductModel();
        $ids = json_decode(stripslashes($this->request->getVar('products')));
        $numItems = json_decode(stripslashes($this->request->getVar('numItems')));
        //TODO[miki]: better ERROR handling 
        if (isset($ids) and count($ids) > 0 and $ids[0] != "")
            $products = $productModel->getProductsByID($ids);
        else
            $products = null;
        $this->showPage('cart', ['products' => $products, 'numItems' => $numItems]);
    }

}
