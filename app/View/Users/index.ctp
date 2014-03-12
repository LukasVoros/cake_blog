<div class="users index">
	<h2>Users</h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th>name</th>
			<th>username</th>
			<th>email</th>
			<th class="actions">Actions</th>
	</tr>
	<?php
	$i = 0;
	foreach ($users as $posts):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $posts['User']['id']; ?>&nbsp;</td>
		<td><?php echo $posts['User']['name']; ?>&nbsp;</td>
		<td><?php echo $posts['User']['username']; ?>&nbsp;</td>
		<td><?php echo $posts['User']['email']; ?>&nbsp;</td>
		
		<td class="actions">
			<?php echo $this->Html->link('View', array(
				'action' => 'view', $posts['User']['id'])); 
				?>
				
			<?php echo $this->Html->link('Edit', array(
				'action' => 'edit', $posts['User']['id'])); 
				?>
				
			<?php echo $this->Form->postLink('Delete', array(
			'action' => 'delete', $posts['User']['id']), array(
			'confirm'=>'Are you sure you want to delete that user?')); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
</div>
<div class="actions">
	<h3>Actions</h3>
	<ul>
		<li><?php echo $this->Html->link('New User', array('action' => 'add')); ?></li>
	</ul>
</div>
 <h2>
