<div class="users form">
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend>
            <?php echo __('Please enter your username and password'); ?>
        </legend>
<div class="form-group">
        	<?php echo $this->Form->input('username', array('class'=>'form-control')); ?>
</div>
<div class="form-group">
        		  <?php echo $this->Form->input('password', array('class'=>'form-control'));     ?>
</div>
    </fieldset>
<?php echo $this->Form->submit(__('Login'), array('class'=>'btn btn-success')); ?>
</div>
