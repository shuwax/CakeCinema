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
	
	<!-- Custom Fonts -->

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body>

<div id="wrapper">
	<!-- /.navbar-collapse -->
	</nav>

	<div id="page-wrapper">

		<div class="container">

			<!-- Page Heading -->
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">
						Spis Twoich Rezerwacji
					</h1>
				</div>
			</div>
			<!-- /.row -->
			<div class="col-lg-12">
				<div class="table-responsive">
					<table class="table table-bordered table-hover table-striped">
						<thead>
						<tr>
							<th>Film</th>
							<th>Seans</th>
							<th>Ilosc zarezerwowanych miejsc</th>
							<th>Opcje</th>
						</tr>
						</thead>
						<tbody>
						<?php foreach ($reservations  as $reservation): ?>
							<?php if($reservation['Reservation']['Users_id'] == AuthComponent::user('id')):?>
							<tr>
								<?php foreach ($movies as $movie): ?>
									<?php if($movie['Movie']['id'] == $reservation['Reservation']['Movies_id'] )
									{
										?> <td> <?php echo $movie['Movie']['title'];?></td><?php
									}
									?>
								<?php endforeach; ?>

								<td><?php echo $this->Html->link(__('Pokaż seans'), array('controller'=>'/Screening','action' => 'view', $reservation['Reservation']['Screening_id']))?></td>

								<td><?php echo h($reservation['Reservation']['count_seats_reserv']); ?>&nbsp;</td>

								<?php foreach ($screening as $screen): ?>
									<?php if($screen['Screen']['id'] == $reservation['Reservation']['Screening_id'])
									{
										$idpokazu = $screen['Screen']['id'];
									}
									?>
								<?php endforeach; ?>

								<td class="actions">
									<?php echo $this->Html->link(__('Pokaż układ zarezerwowanych miejsc'), array('controller'=>'/Reservations','action' => 'seats', $reservation['Reservation']['id']), array('class' => 'btn btn-success'))?>
									<?php echo $this->Html->link(__('Edytuj rezerwacje'), array('controller'=>'/Reservations','action' => 'edit', $reservation['Reservation']['id']),array('class' => 'btn btn-warning')); ?>
									<?php echo $this->Form->postLink(__('Usuń rezerwacje'), array('controller'=>'/Reservations','action' => 'delete', $reservation['Reservation']['id']),array('class' => 'btn btn-danger'), array('confirm' => __('Are you sure you want to delete # %s?', $reservation['Reservation']['id']))); ?>
								</td>
							</tr>
						<?php endif?>
						<?php endforeach; ?>

						</tbody>
					</table>
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







