<?php

class User extends Model {
	public $name = 'user';
	public $useTable = 'user';

	public function beforeSave($options = array()) {
	    if (isset($this->data[$this->alias]['password'])) {
	        $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
	    }
	    return true;
	}

	 public $validate = array(
        'cpf' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'CPF valido obrigatório'
            )
        ),
        'username' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'E-mail obrigatório'
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Senha obrigatória'
            )
        ),
        'nome' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Nome obrigatório'
            )
        ),
    );
}