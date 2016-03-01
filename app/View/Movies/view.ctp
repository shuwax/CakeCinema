<div class="movies view">
<h2><?php echo __('Movie'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($movie['Movie']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($movie['Movie']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($movie['Movie']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Movie Time'); ?></dt>
		<dd>
			<?php echo h($movie['Movie']['movie_time']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Picture'); ?></dt>
		<dd>
			<?php echo h($movie['Movie']['picture']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Categories'); ?></dt>
		<dd>
                    
                    <?php foreach ($categories as $category)
                                if($category['Category']['id'] == $movie['Movie']['Categories_id'])
                                    {
                                        echo $category['Category']['name'];
                                    }
                         ?>                
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
                <li><?php echo $this->Html->link(__('Rezerwacje'), array('reservations' => 'categories', 'action' => 'index')); ?> </li>
                <li><?php echo $this->Html->link(__('Użytkownicy'), array('controller' => 'users', 'action' => 'index')); ?> </li>
 
        </ul>
</div>
