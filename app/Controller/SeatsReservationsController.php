<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class SeatsReservationsController extends AppController
{
   var $uses = array('Hall', 'Seat','SeatsReservation','Screen',"Reservation");
    public function index() 
    {
          $dane = $this->SeatsReservation->find('all');
          $this->set('seat_reservations',$dane);
    }
    
        public function view($id = null)
    {
        $dane = $this->SeatsReservation->findByid($id);
        $this->set('seats_reservation',$dane);
    }
    
    
    
            public function test($id = null)
    {
                
        $dane = $this->Screen->findByid($id);
        $filmid = $dane["Screen"]["Movies_id"];        
        $this->set('screen',$dane);
       
         $hall_seat = $this->Seat->find('all', array(
         'conditions' => array('Seat.halls_id' => array($dane['Screen']['Halls_id']))));
         $this->set('seats',$hall_seat);
         
          $hall = $this->Hall->findByid($dane['Screen']['Halls_id']);
          $this->set('hall',$hall);
          
          $rez = $this->SeatsReservation->find('all', array(
         'conditions' => array('SeatsReservation.Screening_id' => array($id))));         
          $test2 = array();
          
          
          $rez2 = $this->SeatsReservation->find('all');                
          if($rez2 == NULL)
              $test2 = true;
          else 
              $test2 = false;
          
          $this->set('rezs',$rez);
          
          
          
             if($this->request->is(array('post','put')))
             {
                 $this->Reservation->create();
                 $tablicarez = array(array("id" => $idr,"count_seats_reserv" => $licznik,"statusR" => 0,"Screening_id" => $id,"Movies_id" => $filmid,"Users_id" => AuthComponent::user('id')));
                // CakeLog::write('debug', 'myArray22222'.print_r($tablicarez, true) ); 
                 $this->Reservation->saveAll($tablicarez);   
                 $this->redirect('/reservations/view/'.$idr);
             }
          
          
          
        if($this->request->is(array('post','put')))
        {         
            $this->SeatsReservation->create();
                $seatstat = $this->request->data('SeatsReservation');
                $seatid = $this->request->data('Seat');
               
                $seats = array_filter($seatstat, function($value)
                {
                   return $value == array('Seats_id' => 1);
                });
              
              $combinedArray = array();
              
              if($test2 == true)
                  $idr = 1;
              else
              {
                  $idr = end($rez2);
                  $idr = end($idr);
                  $idr = $idr["Reservations_id"]+1;
              }
              $licznik = 0;
              foreach ($seats as  $key => $value)
             {
                 if(array_key_exists($key, $seatid)) {
                      $combinedArray[] = array("Seats_id" => $seatid[$key]["id"],"Screening_id" => $id,"Reservations_id" => $idr);
                      $licznik++;
                    }
              }
              
            if($this->SeatsReservation->saveAll($combinedArray))
            {
                  
                $this->Reservation->create();
                $tablicarez = array(array("id" => $idr,"count_seats_reserv" => $licznik,"statusR" => 0,"Screening_id" => $id,"Movies_id" => $filmid,"Users_id" => AuthComponent::user('id')));
                // CakeLog::write('debug', 'myArray22222'.print_r($tablicarez, true) ); 
                 $this->Reservation->saveAll($tablicarez);   
                 $this->redirect('/reservations/view/'.$idr);
               
            }
        }  
        //CakeLog::write('debug', 'myArray'.print_r($combinedArray, true) );     
              
    
 }
    
    public function potwierdzenie($id)
    {
          
        if($this->request->is('post'))
        {
            $this->Seats_reservation->create();
            if($this->Seats_reservation->save($this->request->data))
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
    
    
    
      public function add()
    {
          
        if($this->request->is('post'))
        {
            $this->Seats_reservation->create();
            if($this->Seats_reservation->save($this->request->data))
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

