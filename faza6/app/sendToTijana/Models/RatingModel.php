<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models;
use CodeIgniter\Model; 
/**
 * Description of RatingModel
 *
 * @author Simona
 */
class RatingModel extends Model {
    //put your code here
   
    //put your code here
    protected $table=['rating']; 
    protected $primaryKey=['idShop, idSUser'];

    protected $allowedFields=['idShop', 'idUser', 'rating']; 
    protected $returnType='object'; 
    protected $validationRules=["rating"=>"required|in_list[1,2,3,4,5]"];
            
     public function exists($idUser, $idShop){
        
        $row=$this->builder()->select()->where('idShop', $idShop)->where("idUser", $idUser)->get()->getRow();
           
      
        if($row==null){
                
                return false;
            }else{
                return true; 
            }
        
     }
     
     
     public function getRating($idUser, $idShop){
          $row=$this->builder()->select()->where('idShop', $idShop)->where("idUser", $idUser)->get()->getResultObject();
            
          if(empty($row)){
              return null; 
          }
          return $row[0]; 
         
         
     }
            
     /**

      * Inserts new or updates existing
      * 
      *       */
    public function insertOrUpdateRating($idShop, $idUser, $rating){
        
            $sysModel= new SystemUserModel(); 
             
            if($sysModel->existsAs("Shop", $idShop) && $sysModel->existsAs("User", $idUser)){
                //ok
               
                    $bool=$this->validate(["rating"=>$rating]);
                   
                    if($bool==false){
                        
                        return ["errorRating"=>$this->validation->getError()];  
                        
                    }
                    $data=[ "idShop"=> $idShop, 
                        "idUser"=>$idUser, 
                        "rating"=> $rating];
                  
                    
                     if($this->exists($idUser, $idShop)){                 
                    
                          $this->builder()->where("idShop", $idShop)->where("idUser", $idUser)->update(["rating"=>$rating]); 
                    
                      }else{
                            $this->insert($data);
                      }
                    return ["rating"=>$this->getRating($idUser, $idShop)]; 
                    
                

                
            }else{

                
                return ["errorRating"=>"There has been an error."];
                
            }
        
    }
    
    
}
