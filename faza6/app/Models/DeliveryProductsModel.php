<?php

namespace App\Models;
use CodeIgniter\Model;

/**
 * Description of CategoriesModel
 *
 * @author Simona
 */
class DeliveryProductsModel extends Model{
    //put your code here
    protected $table      = 'deliveryproduct';
    protected $primaryKey = 'idDelProduct';

    protected $returnType     = 'object';

    protected $allowedFields=['quantity','idDelReq','idProduct'];
    
    public function ShowProductsForRequestWithID($id){
       
       return  $this->builder()->select()->where("idDelReq",$id)->join("product","product.idProduct=deliveryproduct.idProduct")->get()->getResultObject();
    }
   
}

