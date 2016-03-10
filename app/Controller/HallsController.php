<?php
App::uses('AppController', 'Controller');

class HallsController extends AppController {
    
    var $uses = array('Hall', 'Seat','Cinema');
    
    
    

    function makehall($hallid,$rowns,$seats) {
        $this->Seat->create();   
        $data = array();//Tablica do przechowywnia danych, które mają zostać zapisne w db.
            for($i = 1 ; $i <= $rowns ; $i++)
            {              
                for($j = 1 ; $j <= $seats ; $j++)
                {  
                    $data[] = array("status" =>1,"num_rown" => $i,"num_seat" => $j,"Halls_id" => $hallid);                  
                }
            }
            if($this->Seat->saveAll($data))
            {
                return true;
            }
            else
                return false;                                
    }
    
    public function getByCinema() {
                $cinema_id = $this->request->data['Screen']['Cinema'];
                $halls = $this->Hall->find('list',array(
                    'conditions' => array('Hall.Cinemas_id' => $cinema_id),
                    'recursive' => -1
                    ));
               CakeLog::write('debug', 'myArray22222'.print_r($this->request->data, true) );
                $this->set('subcategories',$halls);
                $this->layout = 'ajax';
    }
    
    
    public function action(){
    if( $this->request->is('ajax') ) {
        if($this->Seat->saveAll($this->request->data['Seat']) || empty($this->request->data))
        {
           $this->Flash->success('Miejsca zostały zmienione');
        }
        else
            $this->Flash->error('BLAD z miejscami');
      die();
    }
   }

/**
 * index method
 * 
 * @return void
 */
    public function index() {
       $dane = $this->Hall->find('all');
       $this->set('halls',$dane);
       $this->set('cinemas',$this->Cinema->find('all'));
        return $dane;
    }

    public function admin_index() {
        $dane = $this->Hall->find('all',array(
            'order' => 'Hall.id DESC'
        ));
        $this->set('halls',$dane);
        $this->set('cinemas',$this->Cinema->find('all'));
        return $dane;
    }
    /**
 * add method
 * 
 * @return void
 */
     public function admin_add()
    {   
         $this->set('cinemas',$this->Cinema->find('list'));
            if($this->request->is('post'))
            {      
                $this->Hall->create();
                    if($this->Hall->save($this->request->data))
                    {
                        $id = $this->Hall->id;         
                                if($this->makehall($id,$this->request->data('Hall.count_rows'),
                                        $this->request->data('Hall.count_seats')))
                                {
                                    $this->Flash->success('Dodano Sale i Miejsca'); 
                                    $this->redirect('setseats/'.$id);
                                }
                                else
                                {
                                    $this->Flash->error('Problem z dodaniem miejsc');
                                }
                    }
                    else
                    {
                         $this->Flash->success('Problem z dodaniem Sali');
                    }
            }
    }
    
 /**
 * SetSeats method
 @param string $id
 * @return void
 */
    public function admin_setseats($id = null) {
            $hall = $this->Hall->findByid($id);
            $cinema = $this->Cinema->findByid($hall['Hall']['Cinemas_id']);
            $hall_seat = $this->Seat->find('all', array(
           'conditions' => array('Seat.halls_id' => array($id))));
            $this->set('cinema',$cinema);
            $this->set('hall',$hall);
            $this->set('seats',$hall_seat);
        $this->set('zmiana',0);
        if($this->request->is(array('put')))
        {   
            if(!empty($this->data))
            {    
                if($this->Seat->saveAll($this->data['Seat']))
                {
                    $this->Flash->success('Mielsca w sali ustawione.'); 
                    $this->redirect('index/');
                }
                else 
                {
                    $this->Flash->error('Problem z ustawieniem miejsc.'); 
                }
            }
        }      
    }    
 /**
 * edit method
 @param string $id
 * @return void
 */
    public function admin_edit($id) {
        
        $this->set('cinemas',$this->Cinema->find('list'));
        $dane = $this->Hall->findByid($id);
        if($this->request->is(array('post','put')))
        {
            $this->Hall->id = $id;            
            if($this->Hall->save($this->request->data))
            {
               $this->Seat->deleteAll(['Seat.halls_id' => $id]);//usunięcie poprzednich miejsc i stworzenie nowych
               if($this->makehall($id,$this->request->data('Hall.count_rows'),$this->request->data('Hall.count_seats')))
               {
                            $this->Flash->success('Sala zedytowana.'); 
                            $this->redirect('setseats/'.$id);
               }
               else 
                   $this->Flash->error('Problem z tworzeniem miejsc na sali.');
            }
            else 
                $this->Flash->error('Brak możliwości edycji sali.');
        }       
        $this->request->data=$dane;// wypisane poprzednich danych 
    }
 /**
 * delete method
 @param string $id
 * @return void
 */
    public function admin_delete($id){
        $this->Hall->id = $id;
        if($this->request->is(array('put','post')))
        {
            if($this->Hall->delete() && $this->Seat->deleteAll(['Seat.halls_id' => $id]))
            {
                $this->Flash->success('Sala usunięta.'); 
                $this->redirect('index');
            }
        }
        else 
             $this->Flash->error('Brak możliwości usunięcia sali.');        
    }
    
    
    
}
