<div class="movies form">
<?php echo $this->Form->create('Movie'); ?>
	<fieldset>
		<legend><?php echo __('Edycja filmu'); ?></legend>
	<?php
		echo $this->Form->input('title',array('label' => 'Tytu'));
		echo $this->Form->input('description',array('label' => 'Opis filmu'));
		echo $this->Form->input('movie_time',array('label' => 'Czas trwania filmu(w minutach)'));
		echo $this->Form->input('picture',array('label' => 'Zdjęcie'));
		echo $this->Form->input('Categories_id',array('label' => 'Kategoria filmu'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Zapisz film')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
                <li><?php echo $this->Html->link(__('Kina'), array('controller' => 'cinemas','action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Sale'), array('controller' => 'halls', 'action' => 'index')); ?> </li>
                <li><?php echo $this->Html->link(__('Seanse'), array('controller' => 'screening', 'action' => 'index')); ?> </li>
                <li><?php echo $this->Html->link(__('Filmy'), array('controller' => 'movies', 'action' => 'index')); ?> </li>
                 <li><?php echo $this->Html->link(__('Rezerwacje'), array('reservations' => 'categories', 'action' => 'index')); ?> </li>
                <li><?php echo $this->Html->link(__('Użytkownicy'), array('controller' => 'users', 'action' => 'index')); ?> </li>
 
        </ul>
</div>
