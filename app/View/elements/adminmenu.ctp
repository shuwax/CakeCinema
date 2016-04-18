

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


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html">Admin Panel</a>
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">
            <!-- NAZWA UZWYTKOWNIKA -->
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo AuthComponent::user('username')?> <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="<?php  echo $this->Html->url(array('controller'=>'../Users','action'=>'logout'), true);?>"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                    </li>
                </ul>
            </li>
        </ul>



        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li>
                    <a href="<?php  echo $this->Html->url(array('controller'=>'../Pages','action'=>'display'), true);?>"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                </li>
                <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#cinema"> Kina <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="cinema" class="collapse">
                        <li>
                            <a href="<?php  echo $this->Html->url(array('controller'=>'Cinemas','action'=>'index'), true);?>">Wszystkie kina</a>
                        </li>
                        <li>
                            <a href="<?php  echo $this->Html->url(array('controller'=>'Cinemas','action'=>'add'), true);?>">Dodaj kino</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#hall"> Sale <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="hall" class="collapse">
                        <li>
                            <a href="<?php  echo $this->Html->url(array('controller'=>'Halls','action'=>'index'), true);?>">Wszystkie sale</a>
                        </li>
                        <li>
                            <a href="<?php  echo $this->Html->url(array('controller'=>'Halls','action'=>'add'), true);?>">Dodaj sale</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#movie"> Filmy <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="movie" class="collapse">
                        <li>
                            <a href="<?php  echo $this->Html->url(array('controller'=>'Movies','action'=>'index'), true);?>">Wszystkie filmy</a>
                        </li>
                        <li>
                            <a href="<?php  echo $this->Html->url(array('controller'=>'Movies','action'=>'add'), true);?>">Dodaj film</a>
                        </li>
                        <li>
                            <a href="<?php  echo $this->Html->url(array('controller'=>'Categories','action'=>'index'), true);?>">Wszystkie kategorie</a>
                        </li>
                        <li>
                            <a href="<?php  echo $this->Html->url(array('controller'=>'Categories','action'=>'add'), true);?>">Dodaj kategorie</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#screening"> Seanse <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="screening" class="collapse">
                        <li>
                            <a href="<?php  echo $this->Html->url(array('controller'=>'Screening','action'=>'index'), true);?>">Wszystkie seanse</a>
                        </li>
                        <li>
                            <a href="<?php  echo $this->Html->url(array('controller'=>'Screening','action'=>'add'), true);?>">Dodaj seans</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#reservation"> Rezerwacje <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="reservation" class="collapse">
                        <li>
                            <a href="<?php  echo $this->Html->url(array('controller'=>'Reservations','action'=>'index'), true);?>">Wszystkie rezerwacje</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#users"> Użytkownicy <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="users" class="collapse">
                        <li>
                            <a href="<?php  echo $this->Html->url(array('controller'=>'Users','action'=>'index'), true);?>">Wszyscy użytkownicy</a>
                        </li>
                        <li>
                            <a href="<?php  echo $this->Html->url(array('controller'=>'Users','action'=>'add'), true);?>">Dodaj użytkownika</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>




    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

</body>

</html>
