<!-- app/View/Users/add.ctp -->
<?php echo $this->Html->link('<<', array('action' => 'index'), array('class'=>'btn btn-default mb', 'id'=>'back'));?>

<div class="users form">
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo('Add User'); ?></legend>
        <?php
echo '<div class="form-group">';
echo $this->Form->input('name', array('class'=>'form-control'));
echo '</div>';
echo '<div class="form-group">';
echo $this->Form->input('email', array('class'=>'form-control'));
echo '</div>';
echo '<div class="form-group">';
echo $this->Form->input('username', array('class'=>'form-control'));
echo '</div>';
echo '<div class="form-group">';
echo $this->Form->input('password', array('class'=>'form-control'));
echo '</div>';
echo '<div class="form-group">';
echo $this->Form->input('role', array(
    'options' => array('admin'=>'Admin','author'=>'Author'),
    'class'=>'form-control'
    ));
echo '</div>';
    ?>		
    </fieldset>
<?php echo $this->Form->submit('Add',array('class'=>'btn btn-success btn-lg pull-left'));?>

</div>