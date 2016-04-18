	<!DOCTYPE html>
	<html lang="en">

	<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>SB Admin - Bootstrap Admin Template</title>

		<!-- Bootstrap Core CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">

		<!-- Custom CSS -->
		<link href="css/sb-admin.css" rel="stylesheet">

		<!-- Custom Fonts -->
		<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		<style>
			.submit > input
			{
				margin-right: 11px;
				color: #fff;
				background-color: #337ab7;
				padding: 10px 16px;
				font-size: 18px;
				line-height: 1.3333333;
				border-radius: 6px;
				display: block;
				width: 100%;
			}
		</style>
	</head>

	<body>

	<div id="wrapper">
		<!-- /.navbar-collapse -->
		</nav>

		<div id="page-wrapper">

			<div class="container-fluid">

				<!-- Page Heading -->
				<div class="row">
					<div class="col-lg-12">
						<h1 class="page-header">
							Dodaj seans
						</h1>
						<ol class="breadcrumb">
							<li>
								<i class="fa fa-dashboard"></i>  <a href="<?php  echo $this->Html->url(array('controller'=>'../Pages','action'=>'display'), true);?>">Dashboard</a>
							</li>
							<li class="active">
								<i class="fa fa-table"></i> Dodaj seans
							</li>
						</ol>
					</div>
				</div>
				<!-- /.row -->
				<div class="col-lg-12">
					<div class="table-responsive">
						<div class="col-lg-2">
						</div>
						<div class="col-lg-8">

							<?php echo $this->Form->create('Screen'); ?>
							<fieldset>
								<legend><?php echo __('Dodaj seans'); ?></legend>
								<?php
								echo $this->Form->input('Cinema',array('label' => 'Kino','empty'=>'Wybierz kino..','class' => 'form-control input-lg'));
								echo $this->Form->input('Halls_id',array('label' => 'Sala','empty'=>true,'class' => 'form-control input-lg'));
								echo "Data Seansu".$this->Form->date('screening_date',array('class' => 'form-control input-lg'));
								?>
								<div id="rozklad">
									<div id="sala"></div>
									<div id="dzien"></div>
									<div id="pokazy"></div>
								</div>

								<?php
								echo "Godzina seansu".$this->Form->time('time',array('class' => 'form-control input-lg'));
								echo $this->Form->input('Movies_id',array('label' => 'Film','empty'=>'Wybierz film..','class' => 'form-control input-lg'));
								echo $this->Form->input('price_norm',array('label' => 'Cena za bilet normalny','class' => 'form-control input-lg'));
								echo $this->Form->input('price_hp',array('label' => 'Cena za bilet ulgowy','class' => 'form-control input-lg'));
								?>
							</fieldset>
							<div id="GodzinyKonflikt">
								<div id="status">
								</div>
							</div>
							<?php echo $this->Form->end(__('Dodaj',array('id' => 'end'))); ?>

						</div>
						<div class="col-lg-2">

						</div>
					</div>
				</div>
			</div>
			<!-- /.row -->


		</div>
		<!-- /.container-fluid -->

	</div>
	<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

</body>

</html>

<script>
	var e = document.getElementById("ScreenCinema");
	var d = document.getElementById("ScreenScreeningDate");
	var hall = document.getElementById("ScreenHallsId");
	var data = document.getElementById('ScreenScreeningDate');
	var film = document.getElementById('ScreenMoviesId');
	var today = new Date();
	var dd = today.getDate();
	var mm = today.getMonth()+1;
	var yyyy = today.getFullYear();
	var tab = <?php echo json_encode($screen)?>;
	var tabmovie = <?php echo json_encode($movie)?>;
	var tabcinemas = <?php echo json_encode($cinemas)?>;
	var tabhall = <?php echo json_encode($hall)?>;
	var click = 0;
	var tabczasroz = [];
	var tabczaszak = [];
	var konflikt = false;
	var czasfilmu = 0;
	var czas = document.getElementById('ScreenTime');

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
		var czas = document.getElementById('ScreenTime');
		if(czas.value.length == 0)
		{
			document.getElementById("ScreenMoviesId").disabled = true;
		}
	};
	$('#ScreenCinema').on('change',function()
	{
		if(e.options[e.selectedIndex].text == 'Wybierz kino..')
		{
			document.getElementById("ScreenHallsId").disabled = true;
			document.getElementById("ScreenScreeningDate").disabled = true;
			usunwpis();
		}
		else
		{
			document.getElementById("ScreenHallsId").disabled = false;

			document.getElementById("ScreenScreeningDate").disabled = false;
			usunwpis();
			var idC = e.options[e.selectedIndex].value;
			var ni = document.getElementById('ScreenHallsId');
			while(ni.firstChild)
			{
				ni.removeChild(ni.firstChild);
			}
			var firsttest=0;
			$('#ScreenHallsId').append($('<option>',{
				value: '',
				text: 'Wybierz sale'
			}));
			for(var i = 0 ;i<tabhall.length;i++)
			{
					if(tabhall[i]['Hall']['Cinemas_id'] == idC)
					{

						$('#ScreenHallsId').append($('<option>', {
							value: tabhall[i]['Hall']['id'],
							text: tabhall[i]['Hall']['name']
						}));
					}
			}
		}
	});
	function wpis() {
		var sala = hall.options[hall.selectedIndex].value;
		var movietime = 0;

		for (var i = 0; i < tab.length; i++) {
			if (tab[i]['Screen']['screening_date'] == d.value && tab[i]['Screen']['Halls_id'] == sala) {
				for (var j = 0; j < tabmovie.length; j++) {
					if (tab[i]['Screen']['Movies_id'] == tabmovie[j]['Movie']['id']) {
						movietime = tabmovie[j]['Movie']['movie_time'];
					}
				}


				var ni = document.getElementById('pokazy');
				var newdiv = document.createElement('div');

				newdiv.setAttribute('id', tab[i]['Screen']['id']);



				var time = tab[i]['Screen']['time'];
				var zm = parseInt(movietime);
				var timenew = new Date();
				timenew.setHours(time.substr(0, 2));
				timenew.setMinutes(time.substr(3, 2));
				timenew.setMinutes(timenew.getMinutes() + zm);
				var mm = timenew.getMinutes();
				var hh = timenew.getHours();
				if(mm < 10)
				{
					mm = '0'+mm;
				}
				if(hh < 10)
				{
					hh= '0'+hh;
				}

				var endmovie = hh + ':' + mm + ':' + '00';
				tabczasroz.push(tab[i]['Screen']['time']);
				tabczaszak.push(endmovie);
				newdiv.innerHTML = ' Seans: ' + tab[i]['Screen']['id'] + ' Data: ' + tab[i]['Screen']['screening_date'] + ' godzina rozpoczecia: '
					+ tab[i]['Screen']['time'] + ' godzina zakonczenia: ' + endmovie ;
				movietime = 0;

				ni.appendChild(newdiv);
			}
		}
	};
	function usunwpis()
	{
		var ni = document.getElementById('pokazy');
		while(ni.firstChild)
		{

			ni.removeChild(ni.firstElementChild);
		}
		tabczasroz = [];
		tabczaszak = [];
	}
	function dostepny()
	{
		konflikt = false;
		if(czas.value.length != 0 && data.value.length != 0 && film.value.length !=0)
		{
			for(var i = 0 ; i<tabczasroz.length;i++)
			{
				var godz = parseInt(tabczasroz[i].substring(0,2));
				var min =parseInt(tabczasroz[i].substring(3,5));
				var godzminROZP = godz*60+min;

				godz = parseInt(tabczaszak[i].substring(0,2));
				min = parseInt(tabczaszak[i].substring(3,5));
				var godzminZAK = godz*60+min;

				godz = parseInt(czas.value.substring(0,2));
				min = parseInt(czas.value.substring(3,5));
				var godzminINRoz = godz*60+min;
				var godzminINZak = godz*60+min+parseInt(czasfilmu);

				if(godzminINRoz >= godzminROZP && godzminINRoz <= godzminZAK)
				{
					konflikt = true;
				}
				if(godzminINZak  >= godzminROZP && godzminINZak <= godzminZAK)
				{
					konflikt = true;
				}

			}
			if(konflikt == true)
			{
				document.getElementById('status').innerText = 'KONFLIKT GODZIN';
				document.getElementById('GodzinyKonflikt').style.backgroundColor = 'red';
				document.getElementById('GodzinyKonflikt').style.left = '38';
				$('input[type="submit"]').prop('disabled', true);

			}
			else
			{
				document.getElementById('status').innerText = 'Godziny dobrane odpowiednio';
				document.getElementById('GodzinyKonflikt').style.backgroundColor = 'blue';
				$('input[type="submit"]').prop('disabled', false);
			}

		}

	}

	$('#ScreenScreeningDate').on('click',function()
	{
		if(click==0){
		d.value = today;
		wpis();
		dostepny();
		click ++;}
	});
	$('#ScreenScreeningDate').on('change',function()
	{

		if(czas.value.length != 0 && data.value.length != 0)
		{
			document.getElementById("ScreenMoviesId").disabled = false;
		}
		else
			document.getElementById("ScreenMoviesId").disabled = true;
		usunwpis();
		wpis();
		dostepny();
	});

	$('#ScreenHallsId').on('change',function()
	{
		usunwpis();
		wpis();
		dostepny();
	});
	$('#ScreenTime').on('change',function()
	{

		if(czas.value.length != 0 && data.value.length != 0)
		{
			document.getElementById("ScreenMoviesId").disabled = false;
			dostepny();
		}
		else
			document.getElementById("ScreenMoviesId").disabled = true;
	});
	$('#ScreenMoviesId').on('change',function()
	{
		var id = film.options[film.selectedIndex].value;
		for(var i =0 ;i<tabmovie.length;i++)
		{
			if(tabmovie[i]['Movie']['id'] == id)
			{
				czasfilmu = tabmovie[i]['Movie']['movie_time'];
			}
		}
		dostepny();

	});

</script>

