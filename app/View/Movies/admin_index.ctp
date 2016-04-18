
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
		td > img
		{
			width: 250px;
			height: 250px;
		}
		td > p
		{
			width: 300px;
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
						Spis Sal
					</h1>
					<ol class="breadcrumb">
						<li>
							<i class="fa fa-dashboard"></i>  <a href="<?php  echo $this->Html->url(array('controller'=>'../Pages','action'=>'display'), true);?>">Dashboard</a>
						</li>
						<li class="active">
							<i class="fa fa-table"></i> Wszystkie sale
						</li>
					</ol>
				</div>
			</div>
			<!-- /.row -->
			<div class="col-lg-12">
				<div class="table-responsive">
					<table class="table table-bordered table-hover table-striped">
						<thead>
						<tr>
							<th>Id</th>
							<th>Tytuł</th>
							<th>Opis</th>
							<th>Czas Trwania</th>
							<th>Zdjęcie</th>
							<th>Kategoria</th>
							<th>Opcje</th>
						</tr>
						</thead>
						<tbody>
						<?php foreach ($movies as $movie): ?>
							<tr>
								<td><?php echo h($movie['Movie']['id']); ?></td>
								<td><?php echo h($movie['Movie']['title']); ?></td>
								<td><p><?php echo h($movie['Movie']['description']); ?></p></td>
								<td><?php echo h($movie['Movie']['movie_time']); ?></td>
								<td><?php echo $this->Html->image('../files/movie/filename/'.$movie['Movie']['id'].'/'.$movie['Movie']['filename']); ?></td>

								<?php foreach ($categories as $category): ?>
									<?php if($category['Category']['id'] == $movie['Movie']['Categories_id'])
									{
										?> <td> <?php echo $category['Category']['name'];?></td><?php
									}
									?>
								<?php endforeach; ?>
								<td>
									<?php echo $this->Html->link(__('Podgląd'), array('action' => 'view', $movie['Movie']['id']), array('class' => 'btn btn-success')); ?>
									<?php echo $this->Html->link(__('Edycja'), array('action' => 'edit', $movie['Movie']['id']),array('class' => 'btn btn-warning')); ?>
									<?php echo $this->Form->postLink(__('Usuń'), array('action' => 'delete', $movie['Movie']['id']),array('class' => 'btn btn-danger'), array('confirm' => __('Are you sure you want to delete # %s?', $movie['Movie']['id']))); ?>
								</td>
							</tr>
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



