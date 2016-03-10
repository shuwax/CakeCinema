<div class="categories admin add">
<?php echo $this->Form->create('Category'); ?>
	<fieldset>
		<legend><?php echo __('Dodawanie kategorii'); ?></legend>
	<?php
		echo $this->Form->input('name',array('label' => 'Nazwa'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Dodaj')); ?>
</div>
