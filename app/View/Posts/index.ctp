<!-- File: /app/View/Posts/index.ctp -->

<h1>Blog posts</h1>
<p><?php echo $this->Html->link('Add Post', array('action' => 'add'),  array('class' => 'btn btn-success')); ?></p>
<table class="table table-striped table-hover">
    <tr>
		<th><?php echo $this->Paginator->sort('id'); ?></th>
		<th><?php echo $this->Paginator->sort('Title'); ?></th>
		<th><?php echo $this->Paginator->sort('Actions'); ?></th>
		<th><?php echo $this->Paginator->sort('Created'); ?></th>
    </tr>

<!-- Here's where we loop through our $posts array, printing out post info -->

    <?php foreach ($posts as $post): ?>
    <tr>
        <td><?php echo $post['Post']['id']; ?></td>
        <td>
            <?php
                echo $this->Html->link(
                    $post['Post']['title'],
                    array('action' => 'view', $post['Post']['id'])
                );
            ?>
        </td>
        <td>
            <?php
                echo $this->Html->link(
                    'Edit', array('action' => 'edit', $post['Post']['id']),
                    array('class' => 'btn btn-info btn-xs')
                );
            ?>
            <?php
                echo $this->Form->postLink(
                    'Delete',
                    array('action' => 'delete', $post['Post']['id']),
                    array('confirm' => 'Are you sure?', 'class'=>'btn btn-danger btn-xs')
                );
            ?>
        </td>
        <td>
            <?php echo date('d.m.Y h:i:s', strtotime($post['Post']['created'])); ?>
        </td>
    </tr>
    <?php endforeach; 
    
    ?>

</table>
