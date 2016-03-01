<div class="cinemas index">
	<h2><?php echo __('Kina'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('Nazwa'); ?></th>
			<th><?php echo $this->Paginator->sort('Miasto'); ?></th>
			<th><?php echo $this->Paginator->sort('Adres'); ?></th>
			<th><?php echo $this->Paginator->sort('Numer kontaktowy'); ?></th>
			<th><?php echo $this->Paginator->sort('E-mail'); ?></th>
			<th class="actions"><?php echo __('Opcje'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($cinemas as $cinema): ?>
	<tr>
		<td><?php echo h($cinema['Cinema']['id']); ?>&nbsp;</td>
		<td><?php echo h($cinema['Cinema']['name']); ?>&nbsp;</td>
		<td><?php echo h($cinema['Cinema']['city']); ?>&nbsp;</td>
		<td><?php echo h($cinema['Cinema']['adress']); ?>&nbsp;</td>
		<td><?php echo h($cinema['Cinema']['phone_number']); ?>&nbsp;</td>
		<td><?php echo h($cinema['Cinema']['email']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Podgląd'), array('action' => 'view', $cinema['Cinema']['id'])); ?>
			<?php echo $this->Html->link(__('Edytuj'), array('action' => 'edit', $cinema['Cinema']['id'])); ?>
			<?php echo $this->Form->postLink(__('Usuń'), array('action' => 'delete', $cinema['Cinema']['id']), array('confirm' => __('Usunięcie kina o id: '.$cinema['Cinema']['id'].'. Uwaga usunięcie kina'
                                . ' spowoduje kasacje wszystkich danych z nim powiązanych, '.'takich jak sale, rezerwacje czy seanse.'))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>

</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>    
                <li><?php echo $this->Html->link(__('wyloguj'), array('controller' => 'users','action' => 'logout')); ?></li>
                <li><?php echo $this->Html->link(__('Kina'), array('controller' => 'cinemas','action' => 'index')); ?></li>
                <p><li><?php echo $this->Html->link(__('Dodaj Kino'), array('action' => 'add')); ?></li></p>
		<li><?php echo $this->Html->link(__('Sale'), array('controller' => 'halls', 'action' => 'index')); ?> </li>
                <li><?php echo $this->Html->link(__('Seanse'), array('controller' => 'screening', 'action' => 'index')); ?> </li>
                <li><?php echo $this->Html->link(__('Filmy'), array('controller' => 'movies', 'action' => 'index')); ?> </li>
                <li><?php echo $this->Html->link(__('Rezerwacje'), array('controller' => 'reservations', 'action' => 'index')); ?> </li>
                <li><?php echo $this->Html->link(__('Użytkownicy'), array('controller' => 'users', 'action' => 'index')); ?> </li>
	</ul>
</div>
