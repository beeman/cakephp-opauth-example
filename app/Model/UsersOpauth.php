<?php

App::uses('AppModel', 'Model');

class UsersOpauth extends AppModel {

    public $displayField = 'uid';
    public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

}
