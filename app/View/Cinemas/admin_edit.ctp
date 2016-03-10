<div class="cinema admin edit">
<?php echo $this->Form->create('Cinema'); ?>
	<fieldset>
		<legend><?php echo __('Edycja kina'); ?></legend>
	<?php
		echo $this->Form->input('name',array('label' => 'Nazwa'));
		echo $this->Form->input('city',array('label' => 'Miasto'));
		echo $this->Form->input('adress',array('label' => 'Adres'));
		echo $this->Form->input('phone_number',array('label' => 'Numer kontaktowy'));
		echo $this->Form->input('email',array('label' => 'E-mail'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Zapisz zmiany')); ?>
</div>