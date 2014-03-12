<!-- File: /app/View/Users/edit.ctp -->


<div class="users form">

<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo('Edit User'); ?></legend>

<?php
echo $this->Form->input('id');
echo $this->Form->input('name');
echo $this->Form->input('email');
echo $this->Form->input('username');
echo $this->Form->input('password');
echo $this->Form->input('role', array(
    'options' => array('admin'=>'Admin','author'=>'Author')
    ));
?>
	</fieldset>
<?php echo $this->Form->end('Submit');?>
</div>


<div class="actions">
	<h3><?php echo('Actions'); ?></h3>
	
	<ul>
		<li><?php echo $this->Html->link('List Users', array('action' => 'index'));?></li>
		<li><?php echo $this->Form->postLink('Delete', array('action' => 'index'));?></li>
	</ul>
</div>
