<?php
//all controllers extend the appController classes
//provides phpcake functionality
class PostsController extends AppController {
    public $helpers = array('Html', 'Form', 'Session');
  	public $components = array('Session', 'Paginator');
	var $paginate = array(
	              'limit' => 4,
	              'order' => array(
	                'Post.product_id' => 'asc'
	                )
	              );               
    
    public function beforeFilter() {
		
		$this->set('current_user', $this->Auth->user());
		if( !is_array( $this->Auth->user() ) ) {
			
			return $this->redirect(array( 'controller' => 'Users', 'action' => 'login'));			
			
		}
		
  	}
	  	
  	//index function, when the user will go to posts and then go to the index, it will retrieve
  	//all of the posts from our posts table and display them to the browser
    public function index() {
    //finding all records in the post table and handing
    // the response index.ctp in view 
    	$posts = $this->paginate( 'Post' );
        $this->set('posts', $posts );
    }
    
    //function view with id value set with null in
    //case id is not provided
     public function view($id = NULL) {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $post = $this->Post->findById($id);
        if (!$post) {
            throw new NotFoundException(__('Invalid post'));
        }
        $this->set('post', $post);
    }
    
    // app/Controller/PostsController.php

    //This function will allow us to add to the posts database //
     public function add() {
    //refers to type of http(get &post request) post here refers to http
    //checking if this http "post" request//
    //not allow people get in the database// 
        if ($this->request->is('post')) {
        //prepare my model get ready (initialasing the post model) //
           // $this->Post->create(); 
            
            	//Added this line
      		  	$this->request->data['Post']['user_id'] = $this->Auth->user('id');
            
            //data that come through on the form. request object post data//hading the data from form to the model
            //post model job talk to the database. // save information,request obje ct send to model 
            //handing request object data to be saved by the post model
             
            if ($this->Post->save($this->request->data)) {
            
            //if this work set the flash and say that your post has been saved: confirmation message
               //i can type in any message when it set flash 
                $this->Session->setFlash(__('Your post has been saved.'),
            'default',
            array('class'=>'alert alert-success'));
                //redirect to the Posts index action//
                //list all the post 
               return $this->redirect(array('action' => 'index'));
            }
            
            //flash message saying we weren't able to do it. // 
            $this->Session->setFlash(__('Unable to add your post.'),
            'default',
            array('class'=>'alert alert-danger'));
        }
    } 
    
    // function will allow us to edit an existing post 
    public function edit($id = null) {
    if (!$id) {
        throw new NotFoundException(__('Invalid post'));
    }

    $post = $this->Post->findById($id);
    if (!$post) {
        throw new NotFoundException(__('Invalid post'));
    }

    if ($this->request->is(array('post', 'put'))) {
        $this->Post->id = $id;
        if ($this->Post->save($this->request->data)) {
            $this->Session->setFlash(__('Your post has been updated.'),
            'default',
            array('class'=>'alert alert-success'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Unable to update your post.'),
            'default',
            array('class'=>'alert alert-danger')
        );
    }

    if (!$this->request->data) {
        $this->request->data = $post;
    }
}

	public function delete($id) {
    if ($this->request->is('get')) {
        throw new MethodNotAllowedException();
    }

    if ($this->Post->delete($id)) {
        $this->Session->setFlash(
            __('The post with id: %s has been deleted.', h($id)),
            'default',
            array('class'=>'alert alert-success')
        );
        return $this->redirect(array('action' => 'index'));
    }
  }
  
  // app/Controller/PostsController.php

	public function isAuthorized($user) {

    // All registered users can add posts
    if ($this->action === 'add') {
        return true;
    }

    // The owner of a post can edit and delete it
    if (in_array($this->action, array('edit', 'delete'))) {
        $postId = $this->request->params['pass'][0];
        if ($this->Post->isOwnedBy($postId, $user['id'])) {
            return true;
        }
    }

    return parent::isAuthorized($user);
	}
}
?>