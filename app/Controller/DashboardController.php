<?php

class DashboardController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow(array('router'));
    }

    public function router() {
        if (AuthComponent::user('id')) {
            if (AuthComponent::user('username') && AuthComponent::user('email')) {
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Please update your profile');
                $this->redirect(array('controller' => 'users', 'action' => 'profile'));
            }
        } else {
            $this->redirect($this->Auth->loginAction);
        }
    }

    public function index() {
        
    }

}