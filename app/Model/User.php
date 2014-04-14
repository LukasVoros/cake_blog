<?php

App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
//all users extend the appModel classes
class User extends AppModel {
	//validation rules
    public $validate = array( 
        'name' => array(
        	'Please enter your name'=>array(
                'rule' => 'notEmpty',
                'message' => 'Please enter your name'
            )
        ),
        'username'=>array(
        	'The username must be between 6 and 20 characters'=>array(
         		'rule' => array('between', 6, 20),
                'message' => 'The username must be between 6 and 20 characters'
        	),
        	'This username already exists'=>array(
        		'rule'=>'isUnique',
        		'message' => 'This username already exists'
        	)
        ),
        'email'=>array(
        	'rule'=> 'email',
        	'message'=>'Please enter a valid email address'
        	
        ),
        'password' => array(
        	'filled' => array(
	            'rule'=>'notEmpty',
	            'message' => 'Please enter your password'
           )
        ),
        'role' => array(
            'valid' => array(
                'rule' => array('inList', array('admin', 'author')),
                'message' => 'Please enter a valid role',
                'allowEmpty' => false
            )
        )  
    );
    
    public function beforeSave($options = array()) {
    if (isset($this->data[$this->alias]['password'])) {
        $passwordHasher = new SimplePasswordHasher();
        $this->data[$this->alias]['password'] = $passwordHasher->hash(
            $this->data[$this->alias]['password']
        );
    }
    return true;
	}
}
?>