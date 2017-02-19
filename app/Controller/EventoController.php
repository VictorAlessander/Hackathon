<?php

class EventoController extends AppController {

    public function lista($id) {
		//$this->loadModel('Categoria');
		$this->loadModel('User');
		$this->loadModel('Evento');
		//$this->set('categorias', $this->Categoria->find('first', array('conditions' => array('Categoria.id' => $id))));
		$this->set('userss', $this->User->find('all'));
		$this->set('evento', $this->Evento->find('first', array('conditions' => array('Evento.id' => $id))));
	}

	public function participar($id) {
		$this->loadModel('User');
		$authUser = $this->User->find('first', array('conditions' => array('id' => $this->Auth->user()['id'])));
		$this->loadModel('Evento');
		$this->loadModel('Presenca');
		$evento = $this->Evento->find('first', array('conditions' => array('Evento.id' => $id)));

	   if(count($this->Presenca->find('first', array('conditions' => array('Presenca.user_id' => $authUser['User']['id'])))) > 0) {
			  $this->Session->setFlash(__('Você já está cadastrado.'));
		} else if($authUser['User']['carteira'] < $evento['Evento']['preco']) {
			  $this->Session->setFlash(__('Você não tem créditos suficientes.'));
		} else {
			$this->request->data['Presenca']['evento_id'] = $id;
			$this->request->data['Presenca']['user_id'] = $authUser['User']['id'];
			if($this->Presenca->save($this->request->data)) {
				$this->request->data['User']['id'] = $authUser['User']['id'];
				$this->request->data['User']['carteira'] = ($authUser['User']['carteira']- $evento['Evento']['preco']);
				if($this->User->save($this->request->data)) {
					$this->Session->setFlash(__('Cadastro efetuado com sucesso.'), 'flash', array('class' => 'success'));
				} else {
					$this->Session->setFlash(__('Erro! Tente novamente.'));
				}
			}
		}
		$this->redirect(array('controller' => 'evento', 'action' => 'lista', $id));
	}
	  
	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('lista');
	}

}