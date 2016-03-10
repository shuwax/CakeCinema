<div class="cinema admin add">
<?php echo $this->Form->create('Cinema'); ?>
	<fieldset>
		<legend style="text-align: center"><?php echo __('Dodawanie Kina'); ?></legend>
	<?php
		echo $this->Form->input('name',array('label' => 'Nazwa kina'));
		echo $this->Form->input('city',array('label' => 'Miasto'));
		echo $this->Form->input('adress',array('label' => 'Adres'));
		echo $this->Form->input('phone_number',array('label' => 'Numer kontaktowy'));
		echo $this->Form->input('email',array('label' => 'E-mail'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Dodaj kino')); ?>
