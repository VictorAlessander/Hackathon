<?php

class EventoController extends AppController {

    public function lista($id) {
		//$this->loadModel('Categoria');
		$this->loadModel('Evento');
		//$this->set('categorias', $this->Categoria->find('first', array('conditions' => array('Categoria.id' => $id))));
		$this->set('evento', $this->Evento->find('first', array('conditions' => array('Evento.id' => $id))));
	}
	  
	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('lista');
	}

}