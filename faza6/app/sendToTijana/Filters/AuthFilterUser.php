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
 * Description of AuthFilterUser
 *
 * @author Simona
 */
class AuthFilterUser implements FilterInterface {
     public function before(RequestInterface $request)
    {
        
       $session= \Config\Services::session();
      
       
      if($session->get("logged_in_as")!=="User"){
                
                return redirect()->to(base_url("Guest/login")); 
       }
          
           
    }
       public function after(RequestInterface $request, ResponseInterface $response)
    {
     
      
    }
}
