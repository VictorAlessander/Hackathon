<?php

class Presenca extends Model {
	public $name = 'presenca';
	public $useTable = 'presenca';
	public $belongsTo = array(
        'User' => array(
            'className'  => 'User',
        )
    );
}