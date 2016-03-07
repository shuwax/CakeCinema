<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class SeatsReservationsController extends AppController
{
   var $uses = array('Hall', 'Seat','SeatsReservation','Screen',"Reservation","Cinema","Movie");
    public function index() 
    {
          $dane = $this->SeatsReservation->find('all');
          $this->set('seat_reservations',$dane);
    }
    
        public function view($id = null)
    {
        $dane = $this->SeatsReservation->findByid($id);
        $this->set('seats_reservation',$dane);    }
    
    
    
            public function test($id = null)
    {

        $screen = $this->Screen->findByid($id);
        $hallid = $this->Hall->findByid($screen['Screen']['Halls_id']);
        $this->set('screen',$this->Screen->findByid($id));
        $this->set('hall',$this->Hall->findByid($screen['Screen']['Halls_id']));
        $this->set('movie',$this->Movie->findByid($screen['Screen']['Movies_id']));
        $this->set('cinema',$this->Cinema->findByid($hallid['Hall']['Cinemas_id']));






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
          
          $this->set('rezs',$rez);
 }
    
}

