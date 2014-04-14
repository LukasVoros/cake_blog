<!-- File: /app/View/Posts/add.ctp -->
<?php echo $this->Html->link('<<', array('action' => 'index'), array('class'=>'btn btn-default mb', 'id'=>'back'));?>

<h1>Add Post</h1>
<?php
echo $this->Form->create('Post', array ('action'=>'add'));
echo $this->Form->input('title', array('class'=>'form-control'));
echo $this->Form->input('body', array('rows' => '3', 'class'=>'form-control'));
echo $this->Form->input('id', array('type' => 'hidden', 'class'=>'form-control'));
echo $this->Form->submit('Add Post', array('class'=>'btn btn-primary mt'));
?>