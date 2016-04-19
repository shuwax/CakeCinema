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


	echo $this->Html->css('bootstrap');
	echo $this->Html->css('bootstrap.min');
	echo $this->Html->css('modern-business');

	echo $this->Html->css('heroic-features');
	echo $this->Html->css('screeningview');
	echo $this->Html->css('seatreservations');
	echo $this->fetch('meta');
	echo $this->fetch('css');
	echo $this->fetch('script');
	?>
</head>
<body>



	<?php echo $this->Html->script('jquery-2.2.1');?>
	<?php echo $this->Element('menu');?>
		<?php echo $this->Flash->render(); ?>
		<?php echo $this->fetch('content'); ?>


<?php echo $this->Js->writeBuffer();?>
</body>
</html>
