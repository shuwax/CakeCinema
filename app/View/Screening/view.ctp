
        <div class="cinemas view">
<h2><?php echo __('Seans: '); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($screen['Screen']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Data seansu'); ?></dt>
		<dd>
			<?php echo h($screen['Screen']['screening_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nazwa sali'); ?></dt>
		<dd>
			<?php
                                foreach ($halls as $hall)
                                {
                                    if($hall['Hall']['id'] == $screen['Screen']['Halls_id'])
                                        echo $hall['Hall']['name'];
                                }
                        ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tytuł filmu'); ?></dt>
		<dd>
                    	<?php
                        foreach ($movies as $movie)
                        {
                            if($movie['Movie']['id'] == $screen['Screen']['Movies_id'])
                                echo $movie['Movie']['title'];
                        }
                        ?>
			&nbsp;
		</dd>
                <dd>
                    <?php echo "</br>".$this->Html->link(__('Rezerwuj Bilet'), array('controller' => 'seatsreservations','action' => 'test',$screen['Screen']['id'])); ?>
                </dd>
	</dl>
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
