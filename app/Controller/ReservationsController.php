<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ReservationsController extends AppController
{
   var $uses = array('Hall', 'Seat','Reservation','Screen','SeatsReservation','Movie','Cinema');

    public function index() 
    {
          $dane = $this->Reservation->find('all');
          $movies = $this->Movie->find('all');
          $this->set('movies',$movies);
          $this->set('reservations',$dane);
    }
    public function admin_index()
    {
        $dane = $this->Reservation->find('all');
        $movies = $this->Movie->find('all');
        $this->set('movies',$movies);
        $this->set('reservations',$dane);
        $screening = $this->Screen->find('all');
        $this->set('screening',$screening);
    }
    public function indexuser()
    {
        $dane = $this->Reservation->find('all',array('order' => 'Reservation.id DESC'));
        $movies = $this->Movie->find('all');
        $halls = $this->Hall->find('all');
        $cinemas = $this->Cinema->find('all');
        $screening = $this->Screen->find('all');
        $this->set('movies',$movies);
        $this->set('reservations',$dane);
        $this->set('halls',$halls);
        $this->set('cinemas',$cinemas);
        $this->set('screening',$screening);
    }

        public function admin_view($id = null)
    {
        $dane = $this->Reservation->findByid($id);
        $this->set('reservation',$dane);
    }

      public function add()
    {
        if($this->request->is('ajax'))
        {
            $this->Reservation->create();
            $data = array(Screening_id => $this->request->data['Screen_id'],Users_id => AuthComponent::user('id'),Movies_id =>
                $this->request->data['Movie_id'],price => $this->request->data['price'],count_seats_reserv =>$this->request->data['count'] );
            CakeLog::write('debug', 'myArray22222'.print_r( $data, true) );
            if($this->Reservation->save($data))
            {
                $combainarray = array();
                foreach($this->request->data['Seat'] as $seat)
                {
                    $combainarray[] = array(Seats_id => $seat['id'],Screening_id => $this->request->data['Screen_id']
                        ,Reservations_id => $this->Reservation->id,x =>$seat['x'] ,y =>$seat['y'],type =>$seat['type'] );
                }
                CakeLog::write('debug', 'myArray22222'.print_r($combainarray, true) );
                $this->SeatsReservation->create();

                if($this->SeatsReservation->saveAll($combainarray))
                {
                    $this->Flash->success('Dodano rezerwacje');
                    $this->redirect('reservations/indexuser');
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

    public function delete($id = null) {
        $this->Reservation->id = $id;
        if (!$this->Reservation->exists()) {
            throw new NotFoundException(__('Nierozpoznana rezerwacja'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Reservation->delete()) {
            $this->Flash->success(__('Rezerwacje usunieta'));
        } else {
            $this->Flash->error(__('Problem z usunieciem rezerwacji. Spróbuj ponownie'));
        }
        return $this->redirect(array('action' => 'indexuser'));
    }


    public function admin_seats($id = null) {
        $seatrezervation = $this->SeatsReservation->findByReservations_id($id);

        $screenid =  $seatrezervation['SeatsReservation']['Screening_id'];
        $screen = $this->Screen->findByid($screenid);
        $this->set('hall',$this->Hall->findByid($screen['Screen']['Halls_id']));
        $dane = $this->Screen->findByid($screenid);
        $this->set('screen',$dane);

        $hall_seat = $this->Seat->find('all', array(
            'conditions' => array('Seat.halls_id' => array($dane['Screen']['Halls_id']))));
        $this->set('seats',$hall_seat);


        $rez = $this->SeatsReservation->find('all', array(// miejsca zajete
            'conditions' => array('SeatsReservation.Screening_id' => array($screenid))));

        $this->set('rezs',$rez);

        $ownerseatId = $this->SeatsReservation->find('all', array(//
            'conditions' => array('SeatsReservation.Reservations_id' => array($id))));

        $this->set('ownerseatId',$ownerseatId);
    }

    public function seats($id = null)
    {
        $seatrezervation = $this->SeatsReservation->findByReservations_id($id);

        $this->set('id',$this->Reservation->findByid($id));
        //CakeLog::write('debug', 'myArray22222'.print_r( $this->Reservation->findByid($id), true) );

        $screenid =  $seatrezervation['SeatsReservation']['Screening_id'];
        $screen = $this->Screen->findByid($screenid);

        $this->set('movie',$this->Movie->findByid($screen['Screen']['Movies_id']));
        $this->set('hall',$this->Hall->findByid($screen['Screen']['Halls_id']));
        $hallid = $this->Hall->findByid($screen['Screen']['Halls_id']);
        $this->set('cinema',$this->Cinema->findByid($hallid['Hall']['Cinemas_id']));
        $dane = $this->Screen->findByid($screenid);
        $this->set('screen',$dane);
        $hall_seat = $this->Seat->find('all', array(
            'conditions' => array('Seat.halls_id' => array($dane['Screen']['Halls_id']))));
        $this->set('seats',$hall_seat);

        $rez = $this->SeatsReservation->find('all', array(// miejsca zajete
            'conditions' => array('SeatsReservation.Screening_id' => array($screenid))));

        $this->set('rezs',$rez);

        $ownerseatId = $this->SeatsReservation->find('all', array(//
            'conditions' => array('SeatsReservation.Reservations_id' => array($id))));
        $this->set('ownerseatId',$ownerseatId);
    }

}

