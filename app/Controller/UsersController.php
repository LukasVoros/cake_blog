<?php
//all UsersControllers extend AppControllers classes
class UsersController extends AppController {
	//this function is specific to UsersControler
    public function beforeFilter() {
   		//parent is appController we call
        parent::beforeFilter();
        //use this componennt Auth and allow()
        $this->Auth->allow('add','logout');
        //after this function allowed, go on...
    }
    
///////////////////////////////////////////////////////////////////////////////////////////
//login user
public function login() {
	//if it is a post request (request type)
    if ($this->request->is('post')) {
      	//let him in to log in
        if ($this->Auth->login()) {
            $this->redirect( array('controller' => 'posts', 'action' => 'index') );
        } else {
        		$this->Session->setFlash('Invalid username or password, try again');
  		  }
  		}
	}
///////////////////////////////////////////////////////////////////////////////////////////
//logout the user
public function logout() {
//and redirect them to logout location
    return $this->redirect($this->Auth->logout());
  }
///////////////////////////////////////////////////////////////////////////////////////////
    public function index() {
    //the model that relates to this user
    //=0, look at the name of the table
        $this->User->recursive = 0;
        //pass results to the view(index.ctp-default)
        //paginate->next pages
        $this->set('users', $this->paginate());
    }

    public function view($id = null) {
    	//find the users id
        $this->User->id = $id;
        //
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('user', $this->User->read(null, $id));
    }

    public function add() {
    	//http post request using form
        if ($this->request->is('post')) {
            $this->User->create();
            //the request object
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                //redirect to index
                return $this->redirect(array('action' => 'index'));
            }//call session helper that will show the message
            $this->Session->setFlash(
                __('The user could not be saved. Please, try again.')
            );
        }
    }
    
    public function edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been updated'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(
                __('The user could not be saved. Please, try again.')
            );
        } else {
        //if its a get request
            $this->request->data = $this->User->read(null, $id);
            //take the password away
            unset($this->request->data['User']['password']);
        }
    }

    public function delete($id = null) {
        $this->request->onlyAllow('post');

        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('User deleted'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not deleted'));
        return $this->redirect(array('action' => 'index'));
    }
}
?>