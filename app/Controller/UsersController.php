<?php

App::uses('AppController', 'Controller');

/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow(array('login', 'logout', 'opauth_complete'));
        $this->Auth->authError = "Please log in";
    }

    public function logout() {
        $this->redirect($this->Auth->logout());
    }

    public function login() {
        
    }

    public function profile() {
        if ($this->request->is('post') || $this->request->is('put')) {
            $this->request->data['User']['id'] = AuthComponent::user('id');
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('Profile saved'));
                $this->Session->write('Auth', $this->User->read(null, AuthComponent::user('id')));
                $this->redirect(array('action' => 'profile'));
            } else {
                $this->Session->setFlash(__('The profile could not be saved. Please, try again.'));
            }
        }

        $this->request->data = $this->User->read(null, AuthComponent::user('id'));
    }

    public function opauth_complete() {
        // Start with an empty return msg
        $msg = "";

        // Check and display errors if any
        if (isset($this->data['error'])) {

            if (isset($this->data['error']['provider'])) {
                $msg.= "Error loggin in with {$this->data['error']['provider']}: <br/>";
            }
            if (isset($this->data['error']['raw']['error_msg'])) {
                $msg.= "<b>{$this->data['error']['raw']['error_msg']}</b>";
            } elseif (isset($this->data['error']['raw'])) {
                $msg.= "<b>{$this->data['error']['raw']}</b>";
            } elseif (isset($this->data['error']['message'])) {
                $msg.= "<b>{$this->data['error']['message']}</b>";
            } else {
                $msg = "Unknown error while logging in...";
            }
            $this->Session->setFlash($msg);
            $this->redirect('/');
        }



        // Load the Users OPauth connections
        $this->UsersOpauth = ClassRegistry::init('UsersOpauth');

        // Find the current record
        $options['conditions'] = array(
            'UsersOpauth.uid' => $this->data['auth']['uid'],
            'UsersOpauth.provider' => $this->data['auth']['provider'],
        );
        $account = $this->UsersOpauth->find('first', $options);

        // Create UsersOpauth if it does not exist
        if (!isset($account['UsersOpauth'])) {
            $types = array('provider', 'uid', 'info', 'credentials', 'raw');
            foreach ($types as $type) {
                if (is_array($this->data['auth'][$type])) {
                    $new_users_opauth[$type] = json_encode($this->data['auth'][$type]);
                } else {
                    $new_users_opauth[$type] = $this->data['auth'][$type];
                }
            }
            $this->UsersOpauth->create($new_users_opauth);
            if ($this->UsersOpauth->save($new_users_opauth)) {
                $usersOpauthId = $this->UsersOpauth->getInsertID();
                $account = $this->UsersOpauth->read(null, $usersOpauthId);
                $msg .= "Created remote account. ";
            } else {
                $msg .= "Something went wrong creating your remote account!";
            }
        }

        // Create local user if it does not exist
        if (isset($account['UsersOpauth']['id']) && !isset($account['User']['id'])) {

            // Get info from remote account
            $info = json_decode($account['UsersOpauth']['info']);

            if (isset($info->nickname)) {
                $new_user['username'] = $info->nickname;
            }
            if (isset($info->email)) {
                $new_user['email'] = $info->email;
            }
            $new_user['avatar'] = $info->image;
            $new_user['active'] = 1;
            $new_user['admin'] = 0;

            // Create and save local user
            $this->UsersOpauth->User->create($new_user);
            if ($this->UsersOpauth->User->save($new_user)) {

                // Get the UserID and connect it to the remote ID
                $userId = $this->UsersOpauth->User->getInsertID();
                $this->UsersOpauth->id = $account['UsersOpauth']['id'];
                $this->UsersOpauth->saveField('user_id', $userId);

                // Reread account information
                $account = $this->UsersOpauth->read(null, $account['UsersOpauth']['id']);
                $msg .= "Created local account. ";
            } else {
                $msg .= "Something went wrong creating your local account!";
            }
        }

        if (isset($account['UsersOpauth']['id']) && isset($account['User']['id'])) {
            if ($this->Auth->login($account['User'])) {
                $this->UsersOpauth->User->id = $this->Auth->user('id');
                $this->UsersOpauth->User->saveField('lastlogin', date(DATE_ATOM));
                $msg .= "Logged in!";
            } else {
                $msg .= "Something went wrong while logging you in!";
            }
        } else {
            $msg .= "Something went wrong before logging you in!";
        }
        $this->Session->setFlash($msg);
        $this->redirect('/');
    }

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->User->recursive = 0;
        $this->set('users', $this->Paginator->paginate());
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
        $this->set('user', $this->User->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        }
    }

    /**
     * admin_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
            $this->request->data = $this->User->find('first', $options);
        }
    }

    /**
     * admin_delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_delete($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->User->delete()) {
            $this->Session->setFlash(__('User deleted'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not deleted'));
        return $this->redirect(array('action' => 'index'));
    }

}

