<?php

namespace App\Models;
use CodeIgniter\Model;

/**
 * Description of CategoriesModel
 *
 * @author Simona
 */
class DeliveryAddOnsModel extends Model{
    //put your code here
    protected $table      = 'deliveryaddon';
    protected $primaryKey = 'idDelAdd';

    protected $returnType     = 'object';

    protected $allowedFields=['idA','idDelReq'];
    
   /* public function ShowProductsForRequestWithID($id){
       
       return  $this->builder()->select()->where("idDelReq",$id)->join("product","product.idProduct=deliveryproduct.idProduct")->get()->getResultObject();
    }*/
    public function ShowAddOnsForRequestWithID($id){
        return $this->builder()->select()->where("idDelReq",$id)->join("addon","addon.idA=deliveryaddon.idA")->get()->getResultObject();
        
    }
   
}

