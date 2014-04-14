<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
 
//AppController will inherit from Controller 
class AppController extends Controller {

	//create public property called component
	//which is assigned to an array
    public $components = array(
    	//set the component to Session
    	//to display the flash messages
    	//note I have implemented
    	//fully operational Debugger
        'Session','DebugKit.Toolbar',
        
        //and Auth, the value as an array
        'Auth' => array(
        	//set loginRedirect option to an array
        	//which is just an location our user should 
        	//redirected to
            'loginRedirect' => array(
                'controller' => 'posts',
                'action' => 'index'
            ),
            //the same for logoutRedirect
            'logoutRedirect' => array(
                'controller' => 'users',
                'action' => 'login'
            ),   
            
           //when users try to access page they are not authorize to access
           //this message will display instead
           'authError' => " ! You can't access this page ! ",
    
    		//authorization will occur in our controller
           'authorize' => array('Controller')
    )
);

	//isAuthorized function using user for argument
	public function isAuthorized($user) {
      
      if ( $this->name === 'Posts' ) {
          return true;
      }
    
	    // Admin can access every action
	    if (isset($user['role']) && $user['role'] === 'admin') {
	        return true;
	    }
		//Default deny
		return false;    
	}
    // for non loged in users access
    public function beforeFilter() {
    // Allow users to register and logout.
    $this->Auth->allow('index', 'view');
	$this->set('logged_in', $this->Auth->loggedIn());
	$this->set('current_user', $this->Auth->user());
	}
}