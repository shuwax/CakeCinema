<div class="movies index">
	<h2><?php echo __('Filmy'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('Tytuł'); ?></th>
			<th><?php echo $this->Paginator->sort('Opis'); ?></th>
			<th><?php echo $this->Paginator->sort('Czas Trwania'); ?></th>
			<th><?php echo $this->Paginator->sort('Zdjęcie'); ?></th>
			<th><?php echo $this->Paginator->sort('Kategoria'); ?></th>
			<th class="actions"><?php echo __('Opcje'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($movies as $movie): ?>
	<tr>
		<td><?php echo h($movie['Movie']['id']); ?>&nbsp;</td>
		<td><?php echo h($movie['Movie']['title']); ?>&nbsp;</td>
		<td><?php echo h($movie['Movie']['description']); ?>&nbsp;</td>
		<td><?php echo h($movie['Movie']['movie_time']); ?>&nbsp;</td>
		<td><?php echo h($movie['Movie']['picture']); ?>&nbsp;</td>
		
			<?php foreach ($categories as $category): ?>
                                <?php if($category['Category']['id'] == $movie['Movie']['Categories_id'])
                                    {
                                        ?> <td> <?php echo $category['Category']['name'];?></td><?php
                                    }
                         ?>
                
           <?php endforeach; ?>
		</td>
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
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
                        <li><?php echo $this->Html->link(__('Kina'), array('controller' => 'cinemas','action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Sale'), array('controller' => 'halls', 'action' => 'index')); ?> </li>
                <li><?php echo $this->Html->link(__('Seanse'), array('controller' => 'screening', 'action' => 'index')); ?> </li>
                <li><?php echo $this->Html->link(__('Filmy'), array('controller' => 'movies', 'action' => 'index')); ?> </li>
                                <p><li><?php echo $this->Html->link(__('Dodaj Film'), array('action' => 'add')); ?></li></p>
                                <p><li><?php echo $this->Html->link(__('Dodaj Kategorie'), array('controller' => 'categories','action' => 'add')); ?></li></p>
                                <p><li><?php echo $this->Html->link(__('Lista Kategorii'), array('controller' => 'categories','action' => 'index')); ?></li></p>
                <li><?php echo $this->Html->link(__('Rezerwacje'), array('controller' => 'reservations', 'action' => 'index')); ?> </li>
                <li><?php echo $this->Html->link(__('Użytkownicy'), array('controller' => 'users', 'action' => 'index')); ?> </li>
 
        
        
        </ul>
</div>
