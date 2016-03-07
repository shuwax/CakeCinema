<?php

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())

?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
	echo $this->Html->meta('icon');

	echo $this->Html->css('cake.generic');

	echo $this->fetch('meta');
	echo $this->fetch('css');
	echo $this->fetch('script');
	?>
</head>
<body>
<div id="container">

	<div id="header">
		<?php echo $this->Element('menu');?>
	</div>
	<?php echo $this->Html->script('jquery-2.2.1');?>
	<div id="content">

		<?php echo $this->Flash->render(); ?>
		<?php echo $this->fetch('content'); ?>
	</div>



	<div id="footer">
		<?php echo $this->Element('footer');?>
	</div>
</div>
<?php echo $this->Js->writeBuffer();?>
</body>
</html>
