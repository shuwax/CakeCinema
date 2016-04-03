<div class="seans-view">
	<div class="seans-gora">
				<div class="seans-zdjecie">
					<?php echo $this->Html->image('../files/movie/filename/'.$movie['Movie']['id'].'/'.$movie['Movie']['filename']);?>
				</div>
				<div class="seans-infoG">

					<div class="seans-head">
						<span><?php echo $movie['Movie']['title']?></span>
					</div>

					<div class="seans-kon">
						<?php echo "Organizator: " ?> </br>
						<?php echo $this->HTML->link($cinema['Cinema']['name'],array('controller'=>'Pages','action'=>'display'));?> </br>
						<?php echo "Dane kontaktowe: " ?> </br>
						<?php echo "Telefon: ".$cinema['Cinema']['phone_number']?> </br>
						<?php echo "Email: ".$cinema['Cinema']['email']?> </br>
					</div>

					<div class="data">
						<?php $data = $screen['Screen']['screening_date'];
						$dat = date('N', strtotime($data));
						$dni_tygodnia = array('Poniedziałek', 'Wtorek', 'Środa', 'Czwartek', 'Piątek', 'Sobota','Niedziela');
						$dzien = date('d', strtotime($data));
						?>
							<div class="tydzien"><?php echo $dni_tygodnia[$dat-1]?></div>
							<div class="dzien"><?php echo  $dzien?></div>
						<div class="Miesiacrok"><?php
							$dzien = date('m Y', strtotime($data));
							$dzien2 = date('Y', strtotime($data));
							$miesiac = array('Styczeń', 'Luty', 'Marzec', 'Kwiecień', 'Maj', 'Czerwiec','Lipiec','Sierpień','Wrzesień','Październik','Listopad','Grudzień');
							echo $miesiac[$dzien-1].' '.$dzien2;
							?></div>
						<div class="godzina"><?php echo substr($screen['Screen']['time'],0,5)?></div>
					</div>

				</div>
	</div>

<?php
	//echo date("H:i:s");
	//echo $screen['Screen']['screening_date'];
	//echo $screen['Screen']['screening_date'];
	$DData = date("Y-m-d");
	$DTime = date('H:i:s');
	if( date("Y-m-d") <= $screen['Screen']['screening_date'] ):
	?>
		<?php if($screen['Screen']['time']>= date('H:i:s')):?>
	<div class="seans-rezerwuj">
		<div class="rezerwuj-lewo">
			<div class="rez-zdejcie">

				<?php
				echo $this->Html->image('../files/movie/filename/'.$movie['Movie']['id'].'/'.$movie['Movie']['filename']);?>
			</div>
			<div class="rez-tytul">
				<span><?php echo $movie['Movie']['title']?></span></br>
				<span><?php echo $cinema['Cinema']['name']?></span>
			</div>
		</div>

		<div class="rezrwuj-prawo">
			<div class="info-prawo">
				<?php
				$dzien = date('N', strtotime($data));
				$dni_tygodnia = array('Poniedziałek', 'Wtorek', 'Środa', 'Czwartek', 'Piątek', 'Sobota','Niedziela');
				?>
				<span><?php echo $dzien = date('Y-m-d', strtotime($data)).', godz. '.$screen['Screen']['time']. ' ('.$dni_tygodnia[$dzien-1].')';?></span></br>


					<span><?php echo $cinema['Cinema']['city']?></span></br>
					<span><?php echo $cinema['Cinema']['adress']?></span>
			</div>
			<div class="rezerwuj">
				<span class="Rbilet"><?php echo "</br>".$this->Html->link(__('Rezerwuj Bilet'), array('controller' => 'seatsreservations','action' => 'test',$screen['Screen']['id'])); ?></span>
			</div>
				</div>

	</div>
		<?php endif?>
	<?php endif?>


	<div id="innytermin">
		<span id="terminText">sprawdź inne terminy</span>
	</div>


	<div class="opis">
			<h1>Opis: </h1>
		<span><?php echo $movie['Movie']['description']?></span></br>

	</div>
</div>


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
		var glowny = document.getElementsByClassName('seans-view');
		var terminy = document.createElement('div');
		var DData = <?php echo json_encode($DData)?>;
		var DTime = <?php echo json_encode($DTime)?>;


		terminy.className = terminy;
		var usun = document.getElementById('innytermin');
		var clasausun = document.getElementsByClassName('seans-rezerwuj');

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
						seansrezerwuj.className = "seans-rezerwuj";

						var rezerwujlewo = document.createElement('div');
						rezerwujlewo.className = "rezerwuj-lewo";


						var rezzdejcie = document.createElement('div');
						rezzdejcie.className = "rez-zdejcie";
						//POPRAW !!!
						rezzdejcie.innerHTML = '<img src="/CakeCinema/img/../files/movie/filename/' + filmid + '/' + zdjecie + '" alt="">';

						var reztytul = document.createElement('div');
						reztytul.className = "rez-tytul";
						reztytul.innerHTML = '<span>' + tytul + '</span><br><span>' + nazwakina + '</span>';


						var rezrwujprawo = document.createElement('div');
						rezrwujprawo.className = "rezrwuj-prawo";


						var infoprawo = document.createElement('div');
						infoprawo.className = "info-prawo";
						infoprawo.innerHTML = "<span>" + tablicasenasow[j]['Screen']['screening_date'] + ", godz. " + tablicasenasow[j]['Screen']['time'] + " (" + dzientygodnia(tablicasenasow[j]['Screen']['screening_date']) + ")</span><br><span>" + miasto + "</span><br><span>" + adress + "</span>";

						var rezerwuj = document.createElement('div');
						rezerwuj.className = "rezerwuj";

						var Rbilet = document.createElement('div');
						Rbilet.className = "Rbilet";
						Rbilet.innerHTML = '<br><a href="/CakeCinema/seatsreservations/test/' + tablicasenasow[j]['Screen']['id'] + '">Rezerwuj Bilet</a>';


						$(".seans-gora").after($(seansrezerwuj));
						seansrezerwuj.appendChild(rezerwujlewo);
						rezerwujlewo.appendChild(rezzdejcie);
						rezerwujlewo.appendChild(reztytul);
						seansrezerwuj.appendChild(rezrwujprawo);
						rezrwujprawo.appendChild(infoprawo);
						rezrwujprawo.appendChild(rezerwuj);
						rezerwuj.appendChild(Rbilet);
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
			$('.seans-gora').after($(komunikat));
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