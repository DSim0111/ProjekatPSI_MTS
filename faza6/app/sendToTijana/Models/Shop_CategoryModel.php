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
    public function alreadyExists($id){
      
       
       return   $this->builder()->select('idC')->where('idC', $id)->get()->getFirstRow();
        
    }
    public function findMyCategories($idS){
        
        return  $this->builder()->select()->join("category as C",'C.idC=shopcat.idC')->where('idShop',$idS)->get()->getResult();
        
    }
         
        
}

