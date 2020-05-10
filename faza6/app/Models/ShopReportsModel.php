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
        protected $allowedFields=["idShop", "idUser", "description", "submitDate", "state"];
        private static $status=["A", "I"]; // A- active, I -inactive
        public function getReport($shopId, $userId){
            
            $this->builder()->select()->where("idShop", $shopId)->where("idUser", $userId); 
            return $this->builder()->get()->getRow(); 
            
            
            
        }
        public function getAllReportsWithStatus($status){
            if(!in_array($status, ShopReportsModel::$status)){
                return ["error"=>"invalid status"];
            }
            return $this->builder()->select()->where("status", $status)->get()->getResultObject(); 
            
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
                    $this->builder()->insert([
                        
                        "idShop"=>$shopId, 
                        "idUser"=>$userId, 
                        "description"=>$description, 
                        "submitDate"=>$date
                    ]);
                    $data=[
                        
                        "idShop"=>$shopId, 
                        "idUser"=>$userId, 
                        "description"=>$description, 
                        "submitDate"=>$date, 
                        "state"=>'A'
                    ];
                   
                    //echo $this->builder()->set($data)->getCompiledInsert('shopReport');
                  return   $this->builder()->select()->where("idShop", $shopId)->where("idUser", $userId)->get()->getFirstRow(); 
                }else{
                    
                    return ["error"=>"You have already reported this shop"]; 
                }
                            
                
            }
            
            
        }
}
