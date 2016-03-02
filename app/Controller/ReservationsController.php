<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ReservationsController extends AppController
{
   var $uses = array('Hall', 'Seat','Reservation','Screen','SeatsReservation');
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

    public function action(){
        if( $this->request->is('ajax') ) {
          //  CakeLog::write('debug', 'myArray22222'.print_r($this->request->data, true) );
            //if($this->Seat->saveAll($this->request->data['Seat']) || empty($this->request->data))
            //{
            //    $this->Flash->success('Miejsca zostały zmienione');
           // }
            //else
            //    $this->Flash->error('BLAD z miejscami');
            die();
        }
    }

    
      public function add()
    {
        if($this->request->is('ajax'))
        {

           $this->Reservation->create();
           $data = array(Screening_id => $this->request->data['Screen_id'],Users_id => AuthComponent::user('id'),Movies_id =>
                $this->request->data['Movie_id']);
            if($this->Reservation->save($data))
            {
                $combainarray = array();
                foreach($this->request->data['Seat'] as $seat)
                {
                    $combainarray[] = array(Seats_id => $seat['id'],Screening_id => $this->request->data['Screen_id']
                        ,Reservations_id => $this->Reservation->id);
                }
                CakeLog::write('debug', 'myArray22222'.print_r($combainarray, true) );
                $this->SeatsReservation->create();

                if($this->SeatsReservation->saveAll($combainarray))
                {
                    $this->Flash->success('WLLLO.');
                    //$this->redirect('index');
                }
                else
                {
                    $this->Flash->error('Brak możliwości stworzenia Event.');
                }
            }
            else
            {
               $this->Flash->error('Brak możliwości stworzenia Event.');
            }
            die();
        }
         //$this->set('dane',$this->request->data);
    }
    
    
    

    
}

