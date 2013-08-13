<?php

App::uses('AppModel', 'Model');

class User extends AppModel {

    public $validate = array(
        'username' => array(
            'isUnique',
            'size' => array(
                'rule' => array('between', 5, 20),
                'message' => 'Username should be at least 5 chars long'
            )
        ),
        'email' => 'email',
    );
    public $displayField = 'username';
    public $hasMany = array(
        'UsersOpauth' => array(
            'className' => 'UsersOpauth',
            'foreignKey' => 'user_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

}
