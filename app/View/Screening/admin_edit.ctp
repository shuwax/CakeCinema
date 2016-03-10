<div class="screening admin edit">


	<?php echo $this->Form->create('Screen'); ?>
	<fieldset>
		<legend><?php echo __('Edytuj seans'); ?></legend>
		<?php
		//echo 'Data seansu'.$this->Form->date('screening_date',array('label' => 'Data seansu'));
		echo $this->Form->input('Cinema',array('label' => 'Kino','empty'=>'Wybierz kino..'));
		echo $this->Form->input('Halls_id',array('label' => 'Sala','empty'=>true));
		echo $this->Form->input('Movies_id',array('label' => 'Film'));
		?>
	</fieldset>
	<?php echo $this->Form->end(__('Edytuj')); ?>

	<script>
		var e = document.getElementById("ScreenCinema");
		window.onload = function()
		{
			var e = document.getElementById("ScreenCinema");
			if(e.options[e.selectedIndex].text == 'Wybierz kino..')
			{
				document.getElementById("ScreenHallsId").disabled =true;

			}
		};
		$('#ScreenCinema').on('change',function()
		{
			document.getElementById("ScreenHallsId").disabled =false;
		});

	</script>
	<?php
	$this->Js->get('#ScreenCinema')->event('change',
		$this->Js->request(array(
			'controller'=>'../Halls',
			'action'=>'getByCinema'
		), array(
			'update'=>'#ScreenHallsId',
			'async' => true,
			'method' => 'post',
			'dataExpression'=>true,
			'data'=> $this->Js->serializeForm(array(
				'isForm' => true,
				'inline' => true
			))
		))
	);
	?>

