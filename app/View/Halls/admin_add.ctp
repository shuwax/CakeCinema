<div class="hall admin add">
<?php echo $this->Form->create('Hall'); ?>
	<fieldset>
		<legend><?php echo __('Dodawanie Sali'); ?></legend>
	<?php
                echo $this->Form->input('Cinemas_id',array('label' => 'Kino'));
		echo $this->Form->input('name',array('label' => 'Nazwa sali'));
		echo $this->Form->input('count_rows',array('label' => 'Liczba rzędów'));
		echo $this->Form->input('count_seats',array('label' => 'Liczba siedzeń'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Dodaj sale')); ?>
</div>