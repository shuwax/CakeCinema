<div class="categories admin edit">
<?php echo $this->Form->create('Category'); ?>
	<fieldset>
		<legend><?php echo __('Edycja kategorii'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name',array('label' => 'Nazwa'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Zapisz')); ?>
</div>