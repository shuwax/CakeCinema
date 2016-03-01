<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ReservationsController extends AppController
{
   var $uses = array('Hall', 'Seat','Reservation');
    public function index() 
    {
          $dane = $this->Reservation->find('all');
          $this->set('reservations',$dane);
    }
    
        public function view($id = null)
    {
        $dane = $this->Reservation->findByid($id);
        $this->set('reservation',$dane);
    }
    
      public function add()
    {
        if($this->request->is('post'))
        {
            $this->Reservation->create();
            if($this->Reservation->save($this->request->data))
            {
                $this->Flash->success('Event dodana.'); 
                $this->redirect('index');
            }
            else 
            {
                $this->Flash->error('Brak możliwości stworzenia Event.');
            }            
        }
         //$this->set('dane',$this->request->data);
    }
    
    
    

    
}

