<div class="screening admin add">
 
    
    <?php echo $this->Form->create('Screen'); ?>
	<fieldset>
		<legend><?php echo __('Dodaj seans'); ?></legend>
	<?php
		echo $this->Form->input('Cinema',array('label' => 'Kino','empty'=>'Wybierz kino..'));
	    echo $this->Form->input('Halls_id',array('label' => 'Sala','empty'=>true));
	echo $this->Form->date('screening_date',array('label' => 'Data seansu'));
	?>
		<div id="rozklad">
				<div id="sala"></div>
				<div id="dzien"></div>
				<div id="pokazy"></div>

		</div>

		<?php
	echo $this->Form->time('time',array('label' => 'Godzina'));
		echo $this->Form->input('Movies_id',array('label' => 'Film'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Dodaj')); ?>

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

<script>
	var e = document.getElementById("ScreenCinema");
	var d = document.getElementById("ScreenScreeningDate");
	var hall = document.getElementById("ScreenHallsId");
	var today = new Date();
	var dd = today.getDate();
	var mm = today.getMonth()+1;
	var yyyy = today.getFullYear();
	var tab = <?php echo json_encode($screen)?>;
	var tabmovie = <?php echo json_encode($movie)?>;

	if(dd<10) {
		dd='0'+dd
	}

	if(mm<10) {
		mm='0'+mm
	}
	today = yyyy+'-'+mm+'-'+dd;
	window.onload = function()
	{

				if(e.options[e.selectedIndex].text == 'Wybierz kino..')
			{
				document.getElementById("ScreenHallsId").disabled =true;
				document.getElementById("ScreenScreeningDate").disabled = true;

			}
	};
	$('#ScreenCinema').on('change',function()
	{
		if(e.options[e.selectedIndex].text == 'Wybierz kino..')
		{
			document.getElementById("ScreenHallsId").disabled = true;
			document.getElementById("ScreenScreeningDate").disabled = true;
		}
		else
		{
			document.getElementById("ScreenHallsId").disabled = false;
			document.getElementById("ScreenScreeningDate").disabled = false;
			d.value = today;
		}
	});
	$('#ScreenScreeningDate').on('change',function()
	{
		var sala =hall.options[hall.selectedIndex].value;
				//document.getElementById('dzien').innerHTML = today;
				//document.getElementById('sala').innerHTML = hall.options[hall.selectedIndex].text;
		var movietime = 0;

				for(var i = 0;i<tab.length; i++) {
					if (tab[i]['Screen']['screening_date'] == d.value  && tab[i]['Screen']['Halls_id'] == sala)
					{
						for(var j = 0 ;j<tabmovie.length;j++)
						{
							if(tab[i]['Screen']['Movies_id'] == tabmovie[j]['Movie']['id'])
							{
								movietime = tabmovie[j]['Movie']['movie_time'];
							}
						}
						var ni = document.getElementById('pokazy');

						var newdiv = document.createElement('div');

						newdiv.setAttribute('id',1);

						var time = tab[i]['Screen']['time'];
						var zm =parseInt(movietime);
						var timenew = new Date();
						timenew.setHours(time.substr(0,2));
						timenew.setMinutes(time.substr(3,2));
						timenew.setMinutes(timenew.getMinutes()+zm);
						var endmovie = timenew.getHours()+':'+timenew.getMinutes()+':'+timenew.getSeconds();
						newdiv.innerHTML = ' Seans: '+tab[i]['Screen']['id']+ ' Data: '+tab[i]['Screen']['screening_date']+' godzina rozpoczecia: '
						+tab[i]['Screen']['time']+' godzina zakonczenia: '+endmovie+ 'i=: '+ movietime;
						movietime =0;

						ni.appendChild(newdiv);

					}
				}




	});

</script>

