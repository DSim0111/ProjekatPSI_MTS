<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models;
use CodeIgniter\Model;

/**
 * Description of CategoriesModel
 *
 * @author Simona
 */
class CategoriesModel extends Model{
    //put your code here
    protected $table      = 'category';
    protected $primaryKey = 'idC';

    protected $returnType     = 'object';

    protected $allowedFields=['idC', 'name'];
    
    
    public function getAllCategories(){
        
        return $this->findAll(); 
    }
    public function getCategoryName($id){
        
        return $this->find($id);
        
    }
    public function search($src){
    
   return  $this->builder()->select("*")->like('name', "".$src)->get()->getResultObject();
        
    }
}
