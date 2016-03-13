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

	<div class="seans-rezerwuj">
		<div class="rezerwuj-lewo">
			<div class="rez-zdejcie">
				<?php echo $this->Html->image('../files/movie/filename/'.$movie['Movie']['id'].'/'.$movie['Movie']['filename']);?>
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
				<span><?php echo $dzien = date('Y-m-d', strtotime($data)).', godz. '.date('H:i', strtotime($data)). ' ('.$dni_tygodnia[$dzien-1].')';?></span></br>


					<span><?php echo $cinema['Cinema']['city']?></span></br>
					<span><?php echo $cinema['Cinema']['adress']?></span>
			</div>
			<div class="rezerwuj">
				<span class="Rbilet"><?php echo "</br>".$this->Html->link(__('Rezerwuj Bilet'), array('controller' => 'seatsreservations','action' => 'test',$screen['Screen']['id'])); ?></span>
			</div>
				</div>

	</div>

	<div class="opis">
			<h1>Opis: </h1>
		<span><?php echo $movie['Movie']['description']?></span></br>

	</div>

</div>