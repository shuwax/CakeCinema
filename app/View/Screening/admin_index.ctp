<div class="screening admin index">
	<h2><?php echo __('Seanse'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo 'id' ?></th>
            <th><?php echo 'Kino'; ?></th>
			<th><?php echo 'Nazwa Sali'; ?></th>
            <th><?php echo 'Film'; ?></th>
			<th><?php echo 'Data seansu'; ?></th>
			<th class="actions"><?php echo __('Opcje'); ?></th>
	</tr>
	</thead>
	<tbody>

	<?php foreach ($screening as $screen): ?>
	<tr>
		<td><?php echo h($screen['Screen']['id']); ?>&nbsp;</td>
                
                                            
                        <?php foreach ($halls as $hall): ?>
                                <?php if($hall['Hall']['id'] == $screen['Screen']['Halls_id'])
                                      {
                                            foreach ($cinemas as $cinema)
                                            {
                                                if($cinema['Cinema']['id'] == $hall['Hall']['Cinemas_id'])
                                                {
                                                    ?> <td> <?php echo $cinema['Cinema']['name'];?></td><?php
                                                }
                                            }
                                            ?> 
                                             <td> <?php echo $hall['Hall']['name'];?></td><?php
                                      }
                                ?>
                        <?php endforeach; ?>
                        
                        
                        <?php foreach ($movies as $movie): ?>            
                            <?php if($movie['Movie']['id'] == $screen['Screen']['Movies_id'])
                                {
                                     ?> <td> <?php echo $movie['Movie']['title'];?></td><?php
                                }
                         ?>
                        <?php endforeach; ?>
                <td><?php echo h($screen['Screen']['screening_date']); ?>&nbsp;</td>           
                       
		<td class="actions">
                    <?php echo $this->Html->link(__('Pokaż'), array('controller'=> '../screening','action' => 'view', $screen['Screen']['id'])); ?>
                    <?php echo $this->Html->link(__('Edytuj'), array('action' => 'edit', $screen['Screen']['id'])); ?>
		    <?php echo $this->Form->postLink(__('Usuń'), array('action' => 'delete', $screen['Screen']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $screen['Screen']['id']))); ?>
	    
                
                </td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>

</div>
