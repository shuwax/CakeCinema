<div class="cinemas view">
<h2><?php echo __('Kino'); ?></h2>
	<dl>
		<dt><?php echo __('Id:'); ?></dt>
		<dd>
			<?php echo h($cinema['Cinema']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nazwa:'); ?></dt>
		<dd>
			<?php echo h($cinema['Cinema']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Miasto:'); ?></dt>
		<dd>
			<?php echo h($cinema['Cinema']['city']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Adres:'); ?></dt>
		<dd>
			<?php echo h($cinema['Cinema']['adress']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Numer kontaktowy:'); ?></dt>
		<dd>
			<?php echo h($cinema['Cinema']['phone_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('E-mail:'); ?></dt>
		<dd>
			<?php echo h($cinema['Cinema']['email']); ?>
			&nbsp;
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
