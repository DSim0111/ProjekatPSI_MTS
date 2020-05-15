<?php

namespace App\Models;

use CodeIgniter\Model;

class Shop_CategoryModel extends Model
{
        protected $table      = 'shopcat';
       
        protected $returnType = 'object';
        protected $allowedFields = ['idShop','idC'];
       
    public function insertNew($id, $idShop){
        //OVDI MI TREBA IDSHOP
        $this->builder()->insert(['idC'=>$id,'idShop'=>$idShop]);
        
    }
    public function alreadyExists($idC,$idS){
     //////////////////////////////////////////////////////////////// 
       
       return   $this->builder()->select('idC')->where('idShop', $idS)->where('idC',$idC)->get()->getFirstRow();
        
    }
    public function findMyCategories($idS){
        //  $this->builder()->select("systemuser.id, systemuser.password")->where("username", $username)->join($role." as role","role.id=systemuser.id" );
        return  $this->builder()->select("shopcat.idC,category.name")->where("idShop", $idS)->join("category","category.idC=shopcat.idC")->get()->getResultObject();
          
        
    } 
         
        
}

