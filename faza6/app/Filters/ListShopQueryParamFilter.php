<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


namespace App\Filters;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
/**
 * Description of ListShopQueryParamFilter
 *
 * @author Simona
 */

/**
Sorting params must go together ( column + order) and they are submitted in page form 
 * 

 *  */
class ListShopQueryParamFilter implements FilterInterface{
    
    //put your code here
    private static $sortColumns=["rating", "shopName", "submitDate"];
    private static $sortOrders=["asc", "ascending", "desc", "descending"];
    
       public function before(RequestInterface $request)
    {
         
      $r=\Config\Services::request(); 
  
      $sortColumn=$r->getVar("sortColumn"); 
      $sortOrder=$r->getVar("sortOrder"); 
      
    
      $sortOk=false; 
   
      if(!isset($sortColumn) && !isset($sortOrder)){
          $sortOk=true; 
          
      }else if(isset($sortColumn)&& isset ($sortOrder)){
          
          if(in_array($sortColumn, ListShopQueryParamFilter::$sortColumns) && in_array($sortOrder, ListShopQueryParamFilter::$sortOrders)){
              $sortOk=true; 
              
          }
      }else{
          
          $sortOk=false; 
          //sort not ok xD 
      }
      if($sortOk==false){
        
    return redirect()->to(base_url("Guest/pageNotFound"));
         
          
      }
      
           
    }
        public function after(RequestInterface $request, ResponseInterface $response)
    {
     
      
    }

    
}
