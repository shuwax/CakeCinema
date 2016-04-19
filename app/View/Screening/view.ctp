
<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Heroic Features - Start Bootstrap Template</title>

	<!-- Bootstrap Core CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<!-- Custom CSS -->
	<link href="css/heroic-features.css" rel="stylesheet">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
	<style>
		#innytermin
		{
			background-color: #009DD0;
			color: #FFFFFF;
			font-weight: bold;
			height: 46px;
			margin: 7px;
			padding: 10px 70px;
			text-align: center;
		}
		.container-kupbilet
		{
			margin-bottom: 10px;
		}
	</style>
</head>

<body>

<?php $data = $screen['Screen']['screening_date'];
$dat = date('N', strtotime($data));
$dni_tygodnia = array('Poniedziałek', 'Wtorek', 'Środa', 'Czwartek', 'Piątek', 'Sobota','Niedziela');
$dzien = date('d', strtotime($data));
?>

<!-- Page Content -->
<div class="container">
	<hr>
	<!-- /.row -->

	<!-- Page Features -->
	<div class="row event-box-main">

		<div class="row event-main">

			<div class="col-xs-12 event-box">
				<div class="event-image">
					<div class="col-md-4">
						<a href="http://localhost/CakeCinema/files/movie/filename/<?php echo $movie['Movie']['id'].'/'.$movie['Movie']['filename']?>" data-lightbox="image-1" title="">
							<img src="/CakeCinema/img/../files/movie/filename/<?php echo $movie['Movie']['id'].'/'.$movie['Movie']['filename']?>" class="img-responsive" alt="Deco Ensemble – piękno Nuevo Tango " itemprop="image">
						</a>
					</div>
				</div>
				<div class="event-content">
						<div class="col-md-8">
							<div class="event-header">
									<h1>
										<span itemprop="name"><?php echo $movie['Movie']['title']?></span>
									</h1>
							</div>
							<div class="event-dane col-xs-12">

								<div class="event-dane-left col-xs-6">
									<p class="event-txtheader">Organizator: <?php echo $cinema['Cinema']['name']?></p>
									<p class="event-txtheader">Telefon: <?php echo $cinema['Cinema']['phone_number']?></p>
									<p class="event-txtheader">E-mail: <?php echo $cinema['Cinema']['email']?></p>
								</div>
								<div class="event-date-right col-xs-2">

									<span class="day"><?php echo $dni_tygodnia[$dat-1]?></span>
									<span class="daynumber"><?php echo  $dzien?></span>
									<?php
									$dzien = date('m Y', strtotime($data));
									$dzien2 = date('Y', strtotime($data));
									$miesiac = array('Styczeń', 'Luty', 'Marzec', 'Kwiecień', 'Maj', 'Czerwiec','Lipiec','Sierpień','Wrzesień','Październik','Listopad','Grudzień');
									?>
									<span class="month"><?php echo $miesiac[$dzien-1].' '.$dzien2;?></span>
									<span class="godzina"><?php echo substr($screen['Screen']['time'],0,5)?></span>

								</div>
							</div>
						</div>
				</div>
			</div>
		</div>

		<?php

		$DData = date("Y-m-d");
		$DTime = date('H:i:s');
		if( date("Y-m-d") < $screen['Screen']['screening_date'] ):
		?>
		<div class="container-kupbilet col-xs-12">
				<div class="event-kupbilet-left col-xs-5 col-md 5">
					<div class="event-kupbilet-image">
						<img src="/CakeCinema/img/../files/movie/filename/<?php echo $movie['Movie']['id'].'/'.$movie['Movie']['filename']?>" alt="">
					</div>
					<div class="event-kupbilet-text">
						<span class="event-kupbilet-tittle" itemprop="name"><?php echo $movie['Movie']['title']?> </span></br>
						<span class="event-kupbilet-subtittle"><?php echo $cinema['Cinema']['name']?> </span>
					</div>
				</div>
				<div class="event-kupbilet-right col-xs-7 col-md 7">
					<div class="event-kupbilet-txt">
						<span class="event-but-txt-godz">
							<?php
							$dzien = date('N', strtotime($data));
							$dni_tygodnia = array('Poniedziałek', 'Wtorek', 'Środa', 'Czwartek', 'Piątek', 'Sobota','Niedziela');
							?>
							<span class="semibold"><?php echo date('Y-m-d', strtotime($data));?>,</span>
							godz. <span class="semibold"><?php echo $screen['Screen']['time']?> </span> (<?php echo $dni_tygodnia[$dzien-1]?>)
						</span></br>
						<span class="event-but-txt-places"><?php echo $cinema['Cinema']['city']?></span></br>
						<span class="event-but-txt-name"><?php echo $cinema['Cinema']['adress']?></span></br>
					</div>

						<div class="event-but-but">
							<span><?php echo $this->Html->link(__('Rezerwuj Bilet'), array('controller' => 'seatsreservations','action' => 'test',$screen['Screen']['id'])); ?></span>
					</div>
					</a>
				</div>
		</div>
	</div>
	<?php
	$dzien = date('N', strtotime($data));
	$dni_tygodnia = array('Poniedziałek', 'Wtorek', 'Środa', 'Czwartek', 'Piątek', 'Sobota','Niedziela');
	?>
	<?php endif?>

	<?php if( date("Y-m-d") == $screen['Screen']['screening_date'] ):
	?>
	<?php if($screen['Screen']['time'] >= date('H:i:s')):?>
	<div class="container-kupbilet col-xs-12">
		<div class="event-kupbilet-left col-xs-5 col-md 5">
			<div class="event-kupbilet-image">
				<img src="/CakeCinema/img/../files/movie/filename/<?php echo $movie['Movie']['id'].'/'.$movie['Movie']['filename']?>" alt="">
			</div>
			<div class="event-kupbilet-text">
				<span class="event-kupbilet-tittle" itemprop="name"><?php echo $movie['Movie']['title']?> </span></br>
				<span class="event-kupbilet-subtittle"><?php echo $cinema['Cinema']['name']?> </span>
			</div>
		</div>
		<div class="event-kupbilet-right col-xs-7 col-md 7">
			<div class="event-kupbilet-txt">
						<span class="event-but-txt-godz">
							<span class="semibold"><?php echo date('Y-m-d', strtotime($data));?>,</span>
							godz. 
							<span class="semibold"><?php echo $screen['Screen']['time']?> </span>
							(<?php echo $dni_tygodnia[$dzien-1]?>)
						</span></br>
				<span class="event-but-txt-places"><?php echo $cinema['Cinema']['city']?></span></br>
				<span class="event-but-txt-name"><?php echo $cinema['Cinema']['adress']?></span></br>
			</div>

			<div class="event-but-but">
				<span><?php echo $this->Html->link(__('Rezerwuj Bilet'), array('controller' => 'seatsreservations','action' => 'test',$screen['Screen']['id'])); ?></span>
			</div>
			</a>
		</div>
	</div>
</div>
<?php endif?>
<?php endif?>


<div class="col-xs-12">
	<div class="col-xs-3"></div>
	<div class="col-xs-6">
		<div id="innytermin">
			<span id="terminText">sprawdź inne terminy</span>
		</div>
	</div>
	<div class="col-xs-3"></div>

</div>

	<div class="event-box-opis col-xs-12">
		<div class="event-box-opis-txt col-xs-12">
			<h2>Opis wydarzenia:</h2>
				<?php echo $movie['Movie']['description']?>
		</div>
	</div>
	<!-- /.row -->

	<hr>

	<!-- Footer
	<footer>
		<div class="row">
			<div class="col-lg-12">
				<p>Copyright &copy; Your Website 2014</p>
			</div>
		</div>
	</footer>
		 -->
</div>
<!-- /.container -->

<!-- jQuery -->


<!-- Bootstrap Core JavaScript -->

</body>

</html>

<script>
	var tablicasall = <?php echo json_encode($halls)?>;
	var tablicasenasow = <?php echo json_encode($screening)?>;
	var filmid = <?php echo json_encode($movie_id)?>;
	var tytul = <?php echo json_encode($movie['Movie']['title'])?>;
	var nazwakina = <?php echo json_encode($cinema['Cinema']['name'])?>;
	var miasto = <?php echo json_encode($cinema['Cinema']['city'])?>;
	var adress = <?php echo json_encode($cinema['Cinema']['adress'])?>;
	var data = <?php echo json_encode($screen['Screen']['screening_date'])?>;
	var godzina = <?php echo json_encode($screen['Screen']['time'])?>;
	var zdjecie = <?php echo json_encode($movie['Movie']['filename'])?>;

	$('#innytermin').click(function() {
		var ndiv = document.getElementById('innytermin');
		var glowny = document.getElementsByClassName('row event-main');
		var terminy = document.createElement('div');
		var DData = <?php echo json_encode($DData)?>;
		var DTime = <?php echo json_encode($DTime)?>;


		terminy.className = terminy;
		var usun = document.getElementById('innytermin');
		var clasausun = document.getElementsByClassName('container-kupbilet col-xs-12');

		if(clasausun[0] != undefined)
			clasausun[0].remove();
		usun.remove();
		var wejscie = 0;
		for(var i =0 ;i<tablicasall.length;i++)
		{

			for(var j=0;j<tablicasenasow.length;j++)
			{
				if(tablicasenasow[j]['Screen']['Halls_id'] == tablicasall[i]['Hall']['id'] &&
					tablicasenasow[j]['Screen']['Movies_id'] == filmid)
				{
					if(tablicasenasow[j]['Screen']['screening_date'] >= DData) {
						if(tablicasenasow[j]['Screen']['screening_date'] >= DTime) {

							wejscie++;
							var seansrezerwuj = document.createElement('div');
							seansrezerwuj.className = "container-kupbilet col-xs-12";

							var rezerwujlewo = document.createElement('div');
							rezerwujlewo.className = "event-kupbilet-left col-xs-5 col-md 5";


							var rezzdejcie = document.createElement('div');
							rezzdejcie.className = "event-kupbilet-image";
							//POPRAW !!!
							rezzdejcie.innerHTML = '<img src="/CakeCinema/img/../files/movie/filename/' + filmid + '/' + zdjecie + '" alt="">';

							var reztytul = document.createElement('div');
							reztytul.className = "event-kupbilet-text";

							reztytul.innerHTML = '<span class="event-kupbilet-tittle" itemprop="name">' + tytul + '</span><br>' +
								'<span class="event-kupbilet-subtittle">' + nazwakina + '</span>';



							var rezrwujprawo = document.createElement('div');
							rezrwujprawo.className = "event-kupbilet-right col-xs-7 col-md 7";


							var infoprawo = document.createElement('div');
							infoprawo.className = "event-kupbilet-txt";
							infoprawo.innerHTML = '<span class="event-but-txt-godz">' + tablicasenasow[j]['Screen']['screening_date']
								+'</span>'+", godz. "+
							'<span class="semibold">'+ tablicasenasow[j]['Screen']['time'] +'</span>'+ " (" + dzientygodnia(tablicasenasow[j]['Screen']['screening_date']) +
								')</span><br><span class="event-but-txt-places">' + miasto + '</span><br><span class="event-but-txt-name">' + adress + "</span>";


							var rezerwuj = document.createElement('div');
							rezerwuj.className = "event-but-but";
							rezerwuj.innerHTML = '<span><a href="/CakeCinema/seatsreservations/test/' + tablicasenasow[j]['Screen']['id'] + '">Rezerwuj Bilet</a></span>';



							$(glowny).after($(seansrezerwuj));
							seansrezerwuj.appendChild(rezerwujlewo);
							rezerwujlewo.appendChild(rezzdejcie);
							rezerwujlewo.appendChild(reztytul);
							seansrezerwuj.appendChild(rezrwujprawo);
							rezrwujprawo.appendChild(infoprawo);
							rezrwujprawo.appendChild(rezerwuj);
						}
					}
				}
			}
		}
		if(wejscie == 0 )
		{
			var komunikat =  document.createElement('div');
			komunikat.className = 'Komunikat';
			komunikat.innerHTML ='<span id="terminText">Brak dostepnych terminow</span>';
			$(glowny).after($(komunikat));
		}
	});
	function dzientygodnia (data) {
		var d = new Date(data);
		//d = data;
		var dni = ['Poniedziałek', 'Wtorek', 'Środa', 'Czwartek', 'Piątek', 'Sobota','Niedziela'];
		var liczba = d.getDay()-1;
		return(dni[liczba]);
	}

</script>

