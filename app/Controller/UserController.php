<?php

class UserController extends AppController {

    public function index() {
		$this->loadModel('Categoria');
		$this->set('categorias', $this->Categoria->find('all'));
	}
	   public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add', 'logout');
    }

    public function view($id = null) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Usuario invalido.'));
        }
        $this->set('user', $this->User->findById($id));
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->User->create();
            $this->request->data['User']['carteira'] = 10;
            if ($this->User->save($this->request->data)) {

                $this->Session->setFlash(__('O usuario foi salvo.'), 'flash', array('class' => 'success'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Não foi possivel salvar, tente novamente.'));
            }
        }
        $this->loadModel('Categoria');
        $this->set('ctgs', $this->Categoria->find('list'));
    }

    public function edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Usuario invalido.'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {

                $this->Session->setFlash(__('O usuario foi salvo.'), 'flash', array('class' => 'success'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('O usuario não pode ser salvo, tente novamente.'));
            }
        } else {
            $this->request->data = $this->User->findById($id);
            unset($this->request->data['User']['password']);
        }
    }

	public function login() {
	    if ($this->Auth->login()) {
	        $this->redirect($this->Auth->redirect());
	    } else {
	    	if($this->request->is('post')) {
	        	$this->Session->setFlash(__('Email ou senha invalida.'));
	    	}
	    }
	}

	public function logout() {
	    $this->redirect($this->Auth->logout());
	}

    public function delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Usuario invalido'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('Usuario deletado'), 'flash', array('class' => 'success'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Usuario não foi deletado'));
        $this->redirect(array('action' => 'index'));
    }
}