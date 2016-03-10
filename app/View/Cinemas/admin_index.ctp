<div class="cinema admin index">
	<h2><?php echo __('Spis kin:'); ?> </h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo 'Id' ?></th>
			<th><?php echo 'Nazwa'; ?></th>
			<th><?php echo 'Miasto'; ?></th>
			<th><?php echo 'Adres'; ?></th>
			<th><?php echo 'Numer kontaktowy'; ?></th>
			<th><?php echo 'E-mail'; ?></th>
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
		<td class="actions"><h4>
			<?php echo $this->Html->link(__('Podgląd'), array('action' => 'view', $cinema['Cinema']['id'])); ?>
			<?php echo $this->Html->link(__('Edytuj'), array('action' => 'edit', $cinema['Cinema']['id'])); ?>
			<?php echo $this->Form->postLink(__('Usuń'), array('action' => 'delete', $cinema['Cinema']['id']), array('confirm' => __('Usunięcie kina o id: '.$cinema['Cinema']['id'].'. Uwaga usunięcie kina'
                                . ' spowoduje kasacje wszystkich danych z nim powiązanych, '.'takich jak sale, rezerwacje czy seanse.'))); ?>
			</h4></td>
	</tr>
<?php endforeach; ?>
	</tbody>
		<thead>
		<tr>
			<th><?php echo 'id' ?></th>
			<th><?php echo 'Nazwa'; ?></th>
			<th><?php echo 'Miasto'; ?></th>
			<th><?php echo 'Adres'; ?></th>
			<th><?php echo 'Numer kontaktowy'; ?></th>
			<th><?php echo 'E-mail'; ?></th>
			<th class="actions"><?php echo __('Opcje'); ?></th>
			</tr>
		</thead>
	</table>

</div>
