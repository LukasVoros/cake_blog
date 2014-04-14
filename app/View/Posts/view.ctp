<!-- File: /app/View/Posts/view.ctp -->
<?php echo $this->Html->link('<<', array('action' => 'index'), array('class'=>'btn btn-default mb', 'id'=>'back'));?>

<h2><?php echo $post['Post']['title']; ?></h2>

<p><?php echo $post['Post']['body']; ?></p>
<hr>
<p class="alert alert-success">
Created on: <?php echo date('d.m.Y h:i:s', strtotime($post['Post']['created'])); ?>
</p>
 <p class="alert alert-success">
Last modified on: <?php echo date('d.m.Y h:i:s', strtotime($post['Post']['modified'])); ?></p>
