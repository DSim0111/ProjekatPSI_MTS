<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthFilterAdmin implements FilterInterface
{
    public function before(RequestInterface $request)
    {
       
       $session= \Config\Services::session();
      
       
      if($session->get("logged_in_as")!=="Administrator"){
                
                return redirect()->to(base_url("Guest/login")); 
       }
          
           
    }
       public function after(RequestInterface $request, ResponseInterface $response)
    {
     
      
    }
    

    //--------------------------------------------------------------------

}