<?php

class UsersController extends AppController {
    public $helpers = array('Html', 'Form', 'Session');
    public $components = array('Session');


public function index() {
        $this->set('users', $this->User->find('all'));
    }

public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid user'));
        }

        $user = $this->User->findById($id);
        if (!$user) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('user', $user);
    } 


public function add() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('User has been saved.'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Unable to add User.'));
            }
        }
    }


public function edit($id = null) {
    if (!$id) {
        throw new NotFoundException(__('Invalid user'));
    }

    $user = $this->User->findById($id);
    if (!$user) {
        throw new NotFoundException(__('Invalid user'));
    }

    if ($this->request->is('post') || $this->request->is('put')) {
        $this->User->id = $id;
        if ($this->User->save($this->request->data)) {
            $this->Session->setFlash(__('User has been updated.'));
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Session->setFlash(__('Unable to update User.'));
        }
    }

    if (!$this->request->data) {
        $this->request->data = $user;
    }
}


public function delete($id) {
    if ($this->request->is('get')) {
        throw new MethodNotAllowedException();
    }

    if ($this->User->delete($id)) {
        $this->Session->setFlash(__('The user having id: %s has been deleted.', $id));
        $this->redirect(array('action' => 'index'));
    }
}





}


?>