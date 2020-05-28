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
use CodeIgniter\HTTP\IncomingRequest;
/**
 * Description of GuestFilter
 *
 * @author Simona
 */
class GuestFilter implements FilterInterface {
    //put your code here
    public function after(RequestInterface $request, ResponseInterface $response) {
        
    }

    public function before(RequestInterface $request) {
        $session= $session= \Config\Services::session();
        $user=$session->get("logged_in_as"); 
         $r = \Config\Services::request();
        if(isset($user)){
           $r->uri->setSegment(1, $user);
           if(!method_exists(App\Controllers\Guest::class, $r->uri->getSegment(2))){
           
         
               $r->uri->setSegment(2, "index"); 
               
           }
           return redirect()->to((string)($r->uri));
            
        }
    }

}
