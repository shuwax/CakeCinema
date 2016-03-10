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
			<?php echo $this->Html->image('../files/movie/filename/'.$movie['Movie']['id'].'/'.$movie['Movie']['filename']); ?></td>
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
