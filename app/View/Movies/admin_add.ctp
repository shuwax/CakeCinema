<div class="movie admin add">
<?php echo $this->Form->create('Movie',['type' => 'file']); ?>
	<fieldset>
		<legend><?php echo __('Dodaj film'); ?></legend>
	<?php
		echo $this->Form->input('title',array('label' => 'Tytuł'));
		echo $this->Form->input('description',array('label' => 'Opis filmu'));
		echo $this->Form->input('movie_time',array('label' => 'Czas trwania filmu(w minutach)'));
	    echo $this->Form->input('filename',array('type'=>'file','label' => 'Zdjęcie'));
		echo $this->Form->input('dir', array('type' => 'hidden'));
		echo $this->Form->input('Categories_id',array('label' => 'Kategoria filmu'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Zapisz film')); ?>
</div>

