<div class="cinemas add form">
<?php echo $this->Form->create('Cinema'); ?>
	<fieldset>
		<legend><?php echo __('Dodawanie Kina'); ?></legend>
	<?php
		echo $this->Form->input('name',array('label' => 'Nazwa'));
		echo $this->Form->input('city',array('label' => 'Miasto'));
		echo $this->Form->input('adress',array('label' => 'Adres'));
		echo $this->Form->input('phone_number',array('label' => 'Numer kontaktowy'));
		echo $this->Form->input('email',array('label' => 'E-mail'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Utwórz kino')); ?>
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
