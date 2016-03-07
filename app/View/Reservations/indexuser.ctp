<div  class="rezerwacje">
	<h2><?php echo __('Moje Rezerwacje'); ?></h2>
	<table cellpadding="0" cellspacing="0">
		<thead>
		<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('Ilosc zarezerwowanych miejsc'); ?></th>
			<th><?php echo $this->Paginator->sort('Status rezerwacji'); ?></th>
			<th><?php echo $this->Paginator->sort('Seans'); ?></th>
			<th><?php echo $this->Paginator->sort('Film'); ?></th>
			<th class="actions"><?php echo __('Opcje'); ?></th>
		</tr>
		</thead>
		<tbody>
		<?php foreach ($reservations  as $reservation): ?>

			<?php if($reservation['Reservation']['Users_id'] == AuthComponent::user('id')) :?>
			<tr>
				<td><?php echo h($reservation['Reservation']['id']); ?>&nbsp;</td>
				<td><?php echo h($reservation['Reservation']['count_seats_reserv']); ?>&nbsp;</td>
				<td><?php echo h($reservation['Reservation']['statusR']); ?>&nbsp;</td>
				<td><?php echo $this->Html->link(__('Pokaż seans'), array('controller'=>'Screening','action' => 'view', $reservation['Reservation']['Screening_id']))?></td>



				<?php foreach ($movies as $movie): ?>
					<?php if($movie['Movie']['id'] == $reservation['Reservation']['Movies_id'])
					{
						?> <td> <?php echo $movie['Movie']['title'];?></td><?php
					}
					?>
				<?php endforeach; ?>

				<td class="actions">
					<?php echo $this->Html->link(__('Pokaż układ zarezerwowanych miejsc'), array('action' => 'Setseats', $reservation['Reservation']['id']))?>
					<?php echo $this->Html->link(__('Edytuj rezerwacje'), array('action' => 'edit', $reservation['Reservation']['id'])); ?>
					<?php echo $this->Form->postLink(__('Usuń rezerwacje'), array('action' => 'delete', $reservation['Reservation']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $reservation['Reservation']['id']))); ?>
				</td>
			</tr>
			<?php endif;?>
		<?php endforeach; ?>
		</tbody>
	</table>
</div>

