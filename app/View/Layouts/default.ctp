<!- first page triggered when cake_blog executed -->
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>myBlog</title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css('bootstrap.min');
		echo $this->Html->css('myBlog');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
		<div id="header">
		</div>
		<div id="content" class="container ">

			<div class="user panel text-right">
			<?php 
			if (AuthComponent::user()):
        echo '<i class="glyphicon glyphicon-user"></i>&nbsp;';
			  // The user is logged in, show the logout link
			  echo $current_user['username'];
			  echo '&nbsp;';
			  echo $this->Html->link('Log out', array('controller' => 'users', 'action' => 'logout'));
			else:
			  // The user is not logged in, show login link
			  if ( $this->name !== 'Users' && $this->action !== 'login' ) {
				  echo $this->Html->link('Log in', array('controller' => 'users', 'action' => 'login'));
			  }
			  
			endif;
			
			
			?>
      </div>
      <div id="flashes">
			<?php echo $this->Session->flash(); ?>
      </div> 
			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">

		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
