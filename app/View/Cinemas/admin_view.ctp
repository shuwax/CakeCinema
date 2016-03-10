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
