<!-- File: /app/View/Posts/index.ctp -->

<h1>Blog posts</h1>
<p><?php echo $this->Html->link('Add Post', array('action' => 'add')); ?></p>
<table>
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
                echo $this->Form->postLink(
                    'Delete',
                    array('action' => 'delete', $post['Post']['id']),
                    array('confirm' => 'Are you sure?')
                );
            ?>
            <?php
                echo $this->Html->link(
                    'Edit', array('action' => 'edit', $post['Post']['id'])
                );
            ?>
        </td>
        <td>
            <?php echo $post['Post']['created']; ?>
        </td>
    </tr>
    <?php endforeach; 
    
    ?>

</table>


<?php

echo $this->Paginator->counter(
    'Page {:page} of {:pages}, showing {:current} records out of
     {:count} total, starting on record {:start}, ending on {:end}'
);
?>
<?php
	echo $this->Html->div(
  null,
  $this->Paginator->prev(
    '<< Previous', 
    array(
      'class' => 'PrevPg'
    ), 
    null, 
    array(
      'class' => 'PrevPg DisabledPgLk'
    )
  ).
  $this->Paginator->numbers().
  $this->Paginator->next(
    'Next >>', 
    array(
      'class' => 'NextPg'
    ), 
    null, 
    array(
      'class' => 'NextPg DisabledPgLk'
    )
  ),
  array(
    'style' => 'width: 100%;'
  )
);  

?>