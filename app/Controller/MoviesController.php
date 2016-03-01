<?php
App::uses('AppController', 'Controller');
/**
 * Movies Controller
 *
 * @property Movie $Movie
 * @property PaginatorComponent $Paginator
 */
class MoviesController extends AppController {

     var $uses = array('Category','Movie');
/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
        public function index() {
              $dane = $this->Movie->find('all');
              $this->set('movies',$dane);
              $this->set('categories',$this->Category->find('all'));
           }   

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Movie->exists($id)) {
			throw new NotFoundException(__('Invalid cinema'));
		}
		$this->set('movie', $this->Movie->findByid($id));
                $this->set('categories',$this->Category->find('all'));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
            $this->set('categories',$this->Category->find('list'));
		if ($this->request->is('post')) {
			$this->Movie->create();
			if ($this->Movie->save($this->request->data)) {
				$this->Flash->success(__('The movie has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The movie could not be saved. Please, try again.'));
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
	public function edit($id = null) {
           $this->set('categories',$this->Category->find('list'));
                   $dane = $this->Movie->findByid($id);
                   if($this->request->is(array('post','put')))
                   {
                       $this->Movie->id = $id;
                       if($this->Movie->save($this->request->data))
                       {
                           $this->Flash->success('Film zedytowany.'); 
                           return $this->redirect(array('action' => 'index'));
                       }
                       else 
                           $this->Flash->error('Brak możliwości edycji filmu.');
                   }       
                   $this->request->data=$dane;// wypisane poprzednich danych 
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Movie->id = $id;
		if (!$this->Movie->exists()) {
			throw new NotFoundException(__('Invalid movie'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Movie->delete()) {
			$this->Flash->success(__('The movie has been deleted.'));
		} else {
			$this->Flash->error(__('The movie could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
