<?php

App::uses('AppController', 'Controller');
class ScreeningController extends AppController
{
   var $uses = array('Hall', 'Seat','Screen','Movie','Cinema');
   
   
    public function index() 
    {      
        $dane = $this->Screen->find('all');
        $this->set('movies',$this->Movie->find('all'));
        $this->set('halls',$this->Hall->find('all'));
        $this->set('cinemas',$this->Cinema->find('all'));
        $this->set('screening',$dane);
    }
    
        public function view($id = null)
    {
        $this->set('screen',$this->Screen->findByid($id));        
        $this->set('movies',$this->Movie->find('all'));
        $this->set('halls',$this->Hall->find('all'));
    }
    
    public function add() {
            $this->set('halls',$this->Hall->find('list'));
            $this->set('movies',$this->Movie->find('list'));
            $this->set('cinemas',$this->Cinema->find('list'));
 
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
        
	public function edit($id = null) {
                $dane = $this->Screen->findByid($id);
                $this->set('halls',$this->Hall->find('list'));
                $this->set('movies',$this->Movie->find('list'));
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
        
        public function delete($id = null) {
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

