<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models;

/**
 * Description of AdministratorModel
 *
 * @author Simona
 */ 
class AdministratorModel  extends \CodeIgniter\Model{
    //put your code here
     protected $table      = 'administrator';
    protected $primaryKey = 'id';
    protected $returnType="object";
    protected $allowedFields=['id'];
    
        public function insertAdministrator($id) {
      
        
            $this->insert([

                "id"=> $id, 


            ], true); 
            return $id; 



         }
}
