<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ReservationsController extends AppController
{
   var $uses = array('Hall', 'Seat','Reservation','Screen','SeatsReservation','Movie');

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
    }
    public function indexuser()
    {
        $dane = $this->Reservation->find('all');
        $movies = $this->Movie->find('all');
        $this->set('movies',$movies);
        $this->set('reservations',$dane);
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
                $this->request->data['Movie_id']);
            CakeLog::write('debug', 'myArray22222'.print_r( $this->request->data, true) );
            if($this->Reservation->save($data))
            {
                $combainarray = array();
                foreach($this->request->data['Seat'] as $seat)
                {
                    $combainarray[] = array(Seats_id => $seat['id'],Screening_id => $this->request->data['Screen_id']
                        ,Reservations_id => $this->Reservation->id,x =>$seat['x'] ,y =>$seat['y'] );
                }
               // CakeLog::write('debug', 'myArray22222'.print_r($combainarray, true) );
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
    
    

    
}

