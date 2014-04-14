<!-- File: /app/View/Users/view.ctp -->
<div class="users view">
  <h2>User's detail</h2>
  <table class="table table-striped">
    <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Username</th>
      <th>Email</th>
    </tr>
    <tr>
      <td><?php echo $user['User']['id']; ?></td>
      <td><?php echo $user['User']['name']; ?></td>
      <td><?php echo $user['User']['username']; ?></td>
      <td><?php echo $user['User']['email']; ?></td>
    </tr>
  </table>
  <div class="row jumbotron">
    <div class="col-md-3">
		<?php echo $this->Html->link('List Users', array('action' => 'index'), array('class'=>'btn btn-info btn-block')); ?> 
    </div>
    <div class="col-md-3">
		<?php echo $this->Html->link('Edit User', array('action' => 'edit', $user['User']['id']), array('class'=>'btn btn-primary btn-block')); ?> 
    </div>
    <div class="col-md-3">
		<?php echo $this->Form->postLink('Delete User', array('action' => 'delete', $user['User']['id']), array('confirm'=>'Are you sure you want to delete that user?', 'class'=>'btn btn-danger btn-block')); ?> 
    </div>
    <div class="col-md-3">
		<?php echo $this->Html->link('New User', array('action' => 'add'), array('class'=>'btn btn-success btn-block')); ?>
    </div>
  </div>
</div>
<div class="users index">
