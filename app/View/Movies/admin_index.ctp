<div class="movie adminindex">
	<h2><?php echo __('Filmy: '); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo 'Id'; ?></th>
			<th><?php echo 'Tytuł'; ?></th>
			<th><?php echo 'Opis'; ?></th>
			<th><?php echo 'Czas Trwania'; ?></th>
			<th><?php echo 'Zdjęcie'; ?></th>
			<th><?php echo 'Kategoria'; ?></th>
			<th class="actions"><?php echo __('Opcje'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($movies as $movie): ?>
	<tr class="movie_tab">
		<td><?php echo h($movie['Movie']['id']); ?>&nbsp;</td>
		<td><?php echo h($movie['Movie']['title']); ?>&nbsp;</td>
		<td><?php echo h($movie['Movie']['description']); ?>&nbsp;</td>
		<td><?php echo h($movie['Movie']['movie_time']); ?>&nbsp;</td>
		<td><?php echo $this->Html->image('../files/movie/filename/'.$movie['Movie']['id'].'/'.$movie['Movie']['filename']); ?></td>
		
			<?php foreach ($categories as $category): ?>
                                <?php if($category['Category']['id'] == $movie['Movie']['Categories_id'])
                                    {
                                        ?> <td> <?php echo $category['Category']['name'];?></td><?php
                                    }
                         ?>
                
           <?php endforeach; ?>

		<td class="actions">
			<?php echo $this->Html->link(__('Podgląd'), array('action' => 'view', $movie['Movie']['id'])); ?>
			<?php echo $this->Html->link(__('Edycja'), array('action' => 'edit', $movie['Movie']['id'])); ?>
			<?php echo $this->Form->postLink(__('Usuń'), array('action' => 'delete', $movie['Movie']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $movie['Movie']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>

</div>

