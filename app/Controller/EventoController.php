<?php

class EventoController extends AppController {

    public function lista($id) {
		//$this->loadModel('Categoria');
		$this->loadModel('User');
		$this->loadModel('Evento');
		//$this->set('categorias', $this->Categoria->find('first', array('conditions' => array('Categoria.id' => $id))));
		$this->set('userss', $this->User->find('all'));
		$evt = $this->Evento->find('first', array('conditions' => array('Evento.id' => $id)));
		$this->set('evento', $evt);

		$this->set('dt', DateTime::createFromFormat('d/m/Y', $evt['Evento']['data']));
        $this->set('dt1', DateTime::createFromFormat('d/m/Y', date("d/m/Y")));
	}

	public function participar($id) {
		$this->loadModel('User');
		$authUser = $this->User->find('first', array('conditions' => array('id' => $this->Auth->user()['id'])));
		$this->loadModel('Evento');
		$this->loadModel('Presenca');
		$evento = $this->Evento->find('first', array('conditions' => array('Evento.id' => $id)));

	   if(count($this->Presenca->find('first', array('conditions' => array('Presenca.evento_id' => $id,'Presenca.user_id' => $authUser['User']['id'])))) > 0) {
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
	  
	public function cancela($id) {
		$this->loadModel('User');
		$this->loadModel('Evento');
		$this->loadModel('Presenca');
		$evt = $this->Evento->find('first', array('conditions' => array('Evento.id' => $id)));
		$psc = $this->Presenca->find('all', array('conditions' => array('Presenca.evento_id' => $id)));
		foreach($psc as $p) {
			$this->request->data['User']['id'] = $p['Presenca']['user_id'];
			$usuario = $this->User->find('first', array('conditions' => array('id' => $p['Presenca']['user_id'])));
			$this->request->data['User']['carteira'] = $usuario['User']['carteira']+$evt['Evento']['preco'];
			$this->User->save($this->request->data);
			$this->Presenca->delete($p['Presenca']['id']);
		}
		$this->request->data['Evento']['id'] = $id;
		if($this->Evento->delete($this->request->data['Evento']['id'])) {
			$this->Session->setFlash(__('Evento cancelado com sucesso.'), 'flash', array('class' => 'success'));
		}
		$this->redirect(array('controller' => 'pages', 'action' => 'home'));
	}

	public function finalizar($id) {
		$this->loadModel('User');
		$this->loadModel('Evento');
		$this->loadModel('Presenca');
		$contador = 0;
		$evt = $this->Evento->find('first', array('conditions' => array('Evento.id' => $id)));
		$psc = $this->Presenca->find('all', array('conditions' => array('Presenca.evento_id' => $id)));
		$user = $this->User->find('first', array('conditions' => array('User.id' => $evt['User']['id'])));
		foreach($psc as $p) {
			$contador += $evt['Evento']['preco'];
		} 
		$user['User']['carteira'] += $contador;
		if($this->User->save($user)) {
			$this->Evento->delete($id);
			$this->Session->setFlash(__('Evento finalizado com sucesso.'), 'flash', array('class' => 'success'));
		}
		$this->redirect(array('controller' => 'pages', 'action' => 'home'));

	}

	public function cadastrados(){
		$this->loadModel('Evento');
		$this->loadModel('Presenca');
		$psc = $this->Presenca->find('all', array('conditions' => array('Presenca.user_id' => $this->Auth->user()['id'])));
		$evt = $this->Evento->find('all');
		$this->set('psc', $psc);
		$this->set('evt', $evt); 
	}

	public function add($id) {
		$this->loadModel('Evento');
		$this->loadModel('Categoria');
		if($this->request->is('post')) {
			$this->Evento->create();
            if ($this->Evento->save($this->request->data)) {

                $this->Session->setFlash(__('O evento foi salvo.'), 'flash', array('class' => 'success'));
                $this->redirect(array('controller' => 'pages', 'action' => 'home'));
            } else {
                $this->Session->setFlash(__('Não foi possivel salvar, tente novamente.'));
            }
		}
		$lista = array();
		foreach($this->Categoria->find('all') as $k){
			$lista[$k['Categoria']['id']] = $k['Categoria']['nome'];
		}
		$this->set('ctgs', $lista);

	}

	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('lista');
	}

}
