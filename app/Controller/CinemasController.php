<?php
App::uses('AppController', 'Controller');


class CinemasController extends AppController {




	public function index() {
		$this->set('cinemas',$this->Cinema->find('all'));
		return $this->Cinema->find('all');
	}

        public function admin_index() {
		$this->set('cinemas',$this->Cinema->find('all'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Cinema->exists($id)) {
			throw new NotFoundException(__('Nierozpoznane Kino'));
		}
		$this->set('cinema', $this->Cinema->findByid($id));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Cinema->create();
			if ($this->Cinema->save($this->request->data)) {
				$this->Flash->success(__('Kino zostało zapisane'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('Kino nie zostało zapisane. Spróbuj ponownie'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
            	if (!$this->Cinema->exists($id)) {
			throw new NotFoundException(__('Nierozpoznane kino'));
		}
                $data = $this->Cinema->findByid($id);//zapisanie danych przed edycją
                if($this->request->is(array('post','put')))
                {
                    $this->Cinema->id = $id;
                    if($this->Cinema->save($this->request->data))
                    {
                        $this->Flash->success('Kino zedytowane.'); 
                        $this->redirect('index');
                    }
                    else 
                        $this->Flash->error('Brak możliwości zedycji kina.');
                }       
                $this->request->data=$data;// wypisane poprzednich danych 
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Cinema->id = $id;
		if (!$this->Cinema->exists()) {
			throw new NotFoundException(__('Nierozpoznane kino'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Cinema->delete()) {
			$this->Flash->success(__('Kino zostało usunięte'));
		} else {
			$this->Flash->error(__('Kino nie zostało usunięte. Spróbuj ponownie'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
