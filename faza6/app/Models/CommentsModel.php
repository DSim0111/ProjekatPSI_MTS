<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models;
use CodeIgniter\Model;

/**
 * Description of CommentsModel
 *
 * @author Simona
 */
class CommentsModel extends Model {
    //put your code here
    protected $table=['comment']; 
    protected $primaryKey=['idComment'];

    protected $allowedFields=['idComment', 'idUser', 'idShop', 'commentField', 'submitDate']; 
    protected $returnType='object'; 
    
    protected $validationRules=["commentField"=>'required']; 
    protected $validationMessages=['commentField'=>[
        'required'=>"Comment cannot be empty"
    ]]; 
    /**
@return type <b>Success</b> - inserted id <br>
     *      <b>Failure </b>- <br>
     *          &nbsp; &nbsp; &nbsp; insert failed => array of errors ( default model method is called - $this->errors())<br>
                &nbsp; &nbsp; &nbsp; shop or user dont exist in the database => ["commentError", "There has been an error"]<br>
     *      */
    
    public function insertComment($idUser, $idShop, $comment){
        
        
        $sysModel=new SystemUserModel(); 
        if($sysModel->existsAs("User", $idUser) && $sysModel->existsAs("Shop", $idShop)){
           $date = date('Y-m-d H:i:s');
            $ret= $this->insert([
                
                "idUser"=>$idUser, 
                "idShop"=>$idShop, 
                  "commentField"=>$comment, 
              "submitDate"=>$date
                
            ], true);
               if($ret==false || $ret==null){
                   
                   return $this->errors(); 
               } else{
                   
                   return $ret;
               }
                
        }else{
            
            return ["commentError", "There has been an error"];
        }
    }
    
    
    /**

     * @return Returns all comments with necessary user data 
     *<br> 
     * if $idShop doesn't exist returns ["commentError", $errMsg]
     * If $idShop exists returns ["comments"=> $retrievedData]
     * $retrievedData is an array of object retrieved from database ( comments for particular shop or empty array if there is none) 
     * 
     *      */
    public function getAllCommentsForShop($idShop){
        
            $sysModel=new SystemUserModel(); 
            if($sysModel->existsAs("Shop", $idShop)){
                
                
                    $this->builder()->
                            select("S.username as username, commentField, submitDate")->
                            join("Systemuser as S", "S.id=Comment.idUser")->
                            where("idShop", $idShop)->
                            orderBy("submitDate ","DESC"); 
                    
                     return ["comments"=>$this->builder()->get()->getResultObject()];
                
                
                
            }else{
                
                return ["error"=>"There has been an error."]; //hack ! xD 
            }
        
    }
    
}
