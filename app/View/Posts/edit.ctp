<!-- File: /app/View/Posts/edit.ctp -->
<?php echo $this->Html->link('<<', array('action' => 'index'), array('class'=>'btn btn-default mb', 'id'=>'back'));?>

<h1>Edit Post</h1>
<?php
echo $this->Form->create('Post');
echo $this->Form->input('title', array('class'=>'form-control'));
echo $this->Form->input('body', array('rows' => '3', 'class'=>'form-control'));
echo $this->Form->submit('Save Post', array('class'=>'btn btn-primary mt'));
?>