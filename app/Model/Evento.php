<?php

class Evento extends Model {
	public $name = 'evento';
	public $useTable = 'evento';
    
    public $belongsTo = array(
        'User' => array(
            'className'  => 'User',
        ),
        'Categoria' => array(
            'className' => 'Categoria'
        )
    );

    public $hasMany = array(
        'Presenca' => array(
            'className'  => 'Presenca',
            'foreignkey' => 'id'
        )
    );

	 public $validate = array(
        'nome' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Nome obrigatório'
            )
        ),
        'categoria' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Categoria obrigatório'
            )
        ),
        'data' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Data obrigatória'
            )
        ),
        'local' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Local obrigatório'
            )
        ),
        'descricao' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Descrição obrigatória'
            )
        ),
        'vagas' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Numero de vagas obrigatória'
            )
        ),
    );
}