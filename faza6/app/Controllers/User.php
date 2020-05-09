<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controllers;

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
}
