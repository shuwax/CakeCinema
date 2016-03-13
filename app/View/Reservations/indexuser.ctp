<div class="rezerwacjeurzytkownika">
	<h2>Moje Rezerwacje</h2>
<?php
	$tytul;
	$data;
	$nazwasali="";
	$nazwakina;
	$miasto;
	$ulica;
	$czas;
?>
	<?php foreach ($reservations  as $reservation): ?>

	<?php if($reservation['Reservation']['Users_id'] == AuthComponent::user('id')) :?>
	<div class="informacje">
		<div class="informacje-gora">
			<div class="informacje-zdjecie">
				<?php foreach ($movies as $movie): ?>
					<?php if($movie['Movie']['id'] == $reservation['Reservation']['Movies_id'])
					{
						echo $this->Html->image('../files/movie/filename/'.$movie['Movie']['id'].'/'.$movie['Movie']['filename']);
						$tytul = $movie['Movie']['title'];
					}
					?>
				<?php endforeach; ?>
			</div>
			<div class="informacje-info">
				<span class="informacje-film">Film: <?php echo $tytul?> </span></br>

				<?php

				foreach($screening as $screen) {
					if($screen['Screen']['id'] == $reservation['Reservation']['Screening_id']) {
						$data = $screen['Screen']['screening_date'];
						$czas =  $screen['Screen']['time'];
						foreach ($halls as $hall) {
							if ($hall['Hall']['id'] == $screen['Screen']['Halls_id']) {
								$nazwasali = $hall['Hall']['name'];
								foreach ($cinemas as $cinema) {
									if ($cinema['Cinema']['id'] == $hall['Hall']['Cinemas_id']) {
										$miasto = $cinema['Cinema']['city'];
										$ulica = $cinema['Cinema']['adress'];
										$nazwakina = $cinema['Cinema']['name'];
									}
								}
							}
						}
					}
				}
				?>
				<span class="informacje-film">Data: <?php echo $data.' ,godz. '.$czas?> </span></br>
				<span class="informacje-film">Miasto: <?php echo $miasto?> </span></br>
				<span class="informacje-film">Ulica: <?php echo $ulica?> </span></br>
				<span class="informacje-film">Kino: <?php echo $nazwakina?> </span></br>
				<span class="informacje-film">Sala:  <?php echo $nazwasali?> </span></br>
				<span class="informacje-film">Ilosc miejsc: <?php echo $reservation['Reservation']['count_seats_reserv']?></span>
				<span class="informacje-film">Cena: <?php echo $reservation['Reservation']['price']. "PLN"?> </span></br>
			</div>
		</div>


		<div class="informacje-akcja">
			<div class="informacje-edycja"><?php echo $this->Html->link(__('Modyfikuj'), array('action' => 'edit', $screen['Screen']['id'])); ?></div>
			<div class="informacje-usun"><?php echo $this->Form->postLink(__('Usuń'), array('action' => 'delete', $reservation['Reservation']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $reservation['Reservation']['id']))); ?></div>
			<div class="informacje-pokaz"><?php echo $this->Html->link(__('Wykaz miejsc'), array('action' => 'seats', $reservation['Reservation']['id'])); ?></div>

		</div>
	</div>
		<?php endif?>
	<?php endforeach?>

</div>