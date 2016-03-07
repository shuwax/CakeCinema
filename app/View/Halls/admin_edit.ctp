<div class="hall edit form">
<?php echo $this->Form->create('Hall'); ?>
	<fieldset>
		<legend><?php echo __('Edycja Sali'); ?></legend>
	<?php
                echo $this->Form->input('Cinemas_id',array('label' => 'Kino'));
		echo $this->Form->input('name',array('label' => 'Nazwa'));
		echo $this->Form->input('count_rows',array('label' => 'Liczba rzędów'));
		echo $this->Form->input('count_seats',array('label' => 'Liczba siedzeń'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Edytuj sale')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
                <li><?php echo $this->Html->link(__('Kina'), array('controller' => 'cinemas','action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Sale'), array('controller' => 'halls', 'action' => 'index')); ?> </li>
                <li><?php echo $this->Html->link(__('Seanse'), array('controller' => 'screening', 'action' => 'index')); ?> </li>
                <li><?php echo $this->Html->link(__('Filmy'), array('controller' => 'movies', 'action' => 'index')); ?> </li>
                <li><?php echo $this->Html->link(__('Rezerwacje'), array('controller' => 'reservations', 'action' => 'index')); ?> </li>
                <li><?php echo $this->Html->link(__('Użytkownicy'), array('controller' => 'users', 'action' => 'index')); ?> </li>   </ul>
	</ul>
</div>
