<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class SeatsController extends AppController
{
   
    public function index() 
    {   
    }
    
        public function view($id = null)
    {
        $dane = $this->Seat->findBysala($id);
        $this->set('seats',$dane);
    }
    
    
    

    
}

