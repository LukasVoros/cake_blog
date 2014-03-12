<!-- File: /app/View/Posts/view.ctp -->

<h2><?php echo $post['Post']['title']; ?></h2>

<p><?php echo $post['Post']['body']; ?></p>

<p><small>Created on: <?php echo $post['Post']['created']; ?>

 Last modified on: <?php echo $post['Post']['modified']; ?></small></p>

<br />

<p><?php echo $this->Html->link('Back', array('action'=>'index')); ?></p>