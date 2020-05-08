<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controllers;

/**
 * Description of Shop
 *
 * @author Simona
 */
class Shop  extends BaseController{
    //put your code here
    
      public function _remap($method, ...$params)
        {
            if($this->session->get("logged_in_as")!=="Shop"){
                
                return redirect()->to(base_url("Guest/login")); 
            }
            else
            {
                return $this->$method(...$params);
            }
        } 
}
