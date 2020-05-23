<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models;
use CodeIgniter\Model;
/**
 * Description of ShopReportsModel
 *
 * @author Simona
 */
class ShopReportsModel extends Model {
    //put your code here
        protected $table      = 'ShopReport';
        protected $primaryKey = ['idShop','idUser'];
        protected $returnType = 'object';
        protected $allowedFields=["idShop", "idUser", "description", "submitDate", "status"];
        private static $status=["A", "I"]; // A- active, I -inactive
        public function getReport($shopId, $userId){
            
            $this->builder()->select()->where("idShop", $shopId)->where("idUser", $userId); 
            return $this->builder()->get()->getRow(); 
            
            
            
        }
        public function getAllReportsWithStatus($status){
            if(isset($status)&&!in_array($status, ShopReportsModel::$status)){
                return ["error"=>"invalid status"];
            }
            $this->builder()->select(); 
            if(isset($status)){$this->builder()->where("status", $status);}
                    return $this->builder()->get()->getResultObject(); 
            
        }
        public function getAllReportsForShop($idShop){
            
            $shopModel=new ShopModel(); 
            $shop=$shopModel->find($idShop); 
            if($shop==null){
                
                return ["error"=>"Shop doesn't exist"];
            }
            
            return $this->builder()->select()->where("idShop", $idShop)->get()->getResultObject(); 
        }
        public function insertShopReport($shopId, $userId, $description){
            $date = date('Y-m-d H:i:s');
            // check if okay 
            
            $sysModel=new SystemUserModel(); 
             $shopOk=($sysModel->existsAs("Shop", $shopId)); 
         $userOk= ($sysModel->existsAs("User", $userId)); 
        
       
            if( $userOk==1 &&$shopOk ==1){
                   
                $var=$this->getReport($shopId, $userId);
                if(!isset($var)){
                      $data=[
                        
                        "idShop"=>$shopId, 
                        "idUser"=>$userId, 
                        "description"=>$description, 
                        "submitDate"=>$date, 
                        "status"=>'A'
                    ];
                    $this->builder()->insert($data);
                  
                   
                    //echo $this->builder()->set($data)->getCompiledInsert('shopReport');
                  return   $this->builder()->select()->
                          where("idShop", $shopId)->where("idUser", $userId)->get()->getFirstRow(); 
                }else{
                    
                    return ["error"=>"You have already reported this shop"]; 
                }
                            
                
            }
            
            
        }
        public function markAsRead($idUser, $idShop){
          return $this->builder()->where("idShop", $idShop)->where("idUser", $idUser)->update(["status"=>'I']);
          
        }
}
