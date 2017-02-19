<?php

class CategoriaController extends AppController {

    public function lista($id) {
		$this->loadModel('Categoria');
		$this->loadModel('Evento');
		$this->set('categorias', $this->Categoria->find('first', array('conditions' => array('Categoria.id' => $id))));
		$this->set('eventos', $this->Evento->find('all', array('conditions' => array('Evento.categoria_id' => $id))));
	}
	  
	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('lista');
	}

}