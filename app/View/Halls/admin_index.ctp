<div class="hall index">
	<h2><?php echo __('Sale'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
                        <th><?php echo $this->Paginator->sort('Kino'); ?></th>
			<th><?php echo $this->Paginator->sort('Nazwa Sali'); ?></th>
			<th><?php echo $this->Paginator->sort('Liczba rzędów'); ?></th>
			<th><?php echo $this->Paginator->sort('Liczba siedzeń'); ?></th>
			<th class="actions"><?php echo __('Opcje'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($halls as $hall): ?>
	<tr>
		<td><?php echo h($hall['Hall']['id']); ?>&nbsp;</td>
                <?php foreach ($cinemas as $cinema): ?>
                <?php if($cinema['Cinema']['id'] == $hall['Hall']['Cinemas_id'])
                    {
                        ?> <td> <?php echo $cinema['Cinema']['name'];?></td><?php
                    }
                ?>
            <?php endforeach; ?>
		<td><?php echo h($hall['Hall']['name']); ?>&nbsp;</td>
		<td><?php echo h($hall['Hall']['count_rows']); ?>&nbsp;</td>
		<td><?php echo h($hall['Hall']['count_seats']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Pokaż układ siedzeń'), array('action' => 'setseats', $hall['Hall']['id'])); ?>
			<?php echo $this->Html->link(__('Edytuj'), array('action' => 'edit', $hall['Hall']['id'])); ?>
			<?php echo $this->Form->postLink(__('Usuń'), array('action' => 'delete', $hall['Hall']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $cinema['Cinema']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>

</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>    
                <li><?php echo $this->Html->link(__('Kina'), array('controller' => 'cinemas','action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Sale'), array('controller' => 'halls', 'action' => 'index')); ?> </li>
                <p><li><?php echo $this->Html->link(__('Dodaj Sale'), array('action' => 'add')); ?></li></p>
                <li><?php echo $this->Html->link(__('Seanse'), array('controller' => 'screening', 'action' => 'index')); ?> </li>
                <li><?php echo $this->Html->link(__('Filmy'), array('controller' => 'movies', 'action' => 'index')); ?> </li>
                <li><?php echo $this->Html->link(__('Rezerwacje'), array('controller' => 'reservations', 'action' => 'index')); ?> </li>
                <li><?php echo $this->Html->link(__('Użytkownicy'), array('controller' => 'users', 'action' => 'index')); ?> </li>
 
	</ul>
</div>
