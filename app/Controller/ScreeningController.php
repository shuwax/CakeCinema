<?php

App::uses('AppController', 'Controller');
class ScreeningController extends AppController
{
   var $uses = array('Hall', 'Seat','Screen','Movie','Cinema');
   
   
    public function index() 
    {      
        $dane = $this->Screen->find('all',array(
            'order' => 'Screen.id DESC'
        ));
        $this->set('movies',$this->Movie->find('all'));
        $this->set('halls',$this->Hall->find('all'));
        $this->set('cinemas',$this->Cinema->find('all'));
        $this->set('screening',$dane);
        return $dane;
    }
    public function admin_index()
    {
        $dane = $this->Screen->find('all',array(
            'order' => 'Screen.id DESC'
        ));
        $this->set('movies',$this->Movie->find('all'));
        $this->set('halls',$this->Hall->find('all'));
        $this->set('cinemas',$this->Cinema->find('all'));
        $this->set('screening',$dane);
        return $dane;
    }
    
        public function view($id = null)
    {
        $screen = $this->Screen->findByid($id);
        $hallid = $this->Hall->findByid($screen['Screen']['Halls_id']);
        $this->set('screen',$this->Screen->findByid($id));
        $this->set('hall',$this->Hall->findByid($screen['Screen']['Halls_id']));
        $this->set('movie',$this->Movie->findByid($screen['Screen']['Movies_id']));
        $this->set('cinema',$this->Cinema->findByid($hallid['Hall']['Cinemas_id']));
    }


    public function tabtime()
    {
        $tab = array();
        $godz = 0;
        $min = 0;
        for($i =1 ;$i<=144; $i++)
        {
           // array_push($tab,)
        }
    }

    public function admin_add() {
            $this->set('screen',$this->Screen->find('all'));
            $this->set('movie',$this->Movie->find('all'));
            $this->set('hall',$this->Hall->find('all'));
            $this->set('halls',$this->Hall->find('list'));
            $this->set('movies',$this->Movie->find('list'));
            $this->set('cinemas',$this->Cinema->find('list'));
        CakeLog::write('debug', 'myArray22222'.print_r($this->Hall->find('all'), true));
 
		if ($this->request->is('post')) {
			$this->Screen->create();                        
			if ($this->Screen->save($this->request->data)) {
				$this->Flash->success(__('Seans został dodany.'));
				return $this->redirect(array('action' => 'index'));
			} 
                        else {
				$this->Flash->error(__('Seans nie został zapisany. Spróbuj ponownie.'));
			}
		}
		
	}
        
	public function admin_edit($id = null) {
        $dane = $this->Screen->findByid($id);
        $this->set('editid',$id);
        $this->set('screen',$this->Screen->find('all'));
        $this->set('movie',$this->Movie->find('all'));
        $this->set('hall',$this->Hall->find('all'));
        $this->set('halls',$this->Hall->find('list'));
        $this->set('movies',$this->Movie->find('list'));
        $this->set('cinemas',$this->Cinema->find('list'));
                if($this->request->is(array('post','put')))
                {
                    $this->Screen->id = $id;
                    if($this->Screen->save($this->request->data))
                    {
                        $this->Flash->success('Seans zedytowany.'); 
                        $this->redirect('index');
                    }
                    else 
                        $this->Flash->error('Brak możliwości edycji seansu.');
                }       
                $this->request->data=$dane;// wypisane poprzednich danych 
	}
        
        public function admin_delete($id = null) {
		$this->Screen->id = $id;
		if (!$this->Screen->exists()) {
			throw new NotFoundException(__('Niepoprawny seans.'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Screen->delete()) {
			$this->Flash->success(__('Seans został usunięty.'));
		} else {
			$this->Flash->error(__('Seans nie został usunięty. Spróbuj ponownie'));
		}
		return $this->redirect(array('action' => 'index'));
	}

    
}

