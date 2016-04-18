<?php /*
<ul>
    <li><?php echo $this->HTML->link('Home',array('controller'=>'Pages','action'=>'display'));?></li>
    <li><?php echo $this->HTML->link('Kina',array('controller'=>'Pages','action'=>'display'));?></li>
    <li><?php echo $this->HTML->link('Kategorie',array('controller'=>'Pages','action'=>'display'));?></li>
    <li><?php echo $this->HTML->link('Kontakt',array('controller'=>'Pages','action'=>'display'));?></li>
    <?php if(AuthComponent::user()) :?>
        <li><?php echo $this->HTML->link('Twoje rezerwacje',array('controller'=>'reservations','action'=>'indexuser'));?></li>
        <li><?php echo $this->HTML->link('Wyloguj',array('controller'=>'Users','action'=>'logout'));?></li>
    <?php endif?>
    <?php if(!AuthComponent::user()) :?>
        <li><?php echo $this->HTML->link('Zaloguj',array('controller'=>'Users','action'=>'login'));?></li>
    <?php endif?>
</ul>
*/?>


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

<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php  echo $this->Html->url(array('controller'=>'Pages','action'=>'display'), true);?>">Home</a>
    </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              
                <li>
                    <a href="#">Kontakt</a>
                </li>

                <?php if(AuthComponent::user()) :?>
                    <li>
                        <a href="#">Zalogowany jako: <?php echo AuthComponent::user('username')?></a>
                    </li>

                    <li>
                        <a href="<?php  echo $this->Html->url(array('controller'=>'reservations','action'=>'indexuser'), true);?>">Twoje rezerwacje</a>
                    </li>
                    <?php if(AuthComponent::user('role') == 'admin'):?>
                        <li>
                            <a href="<?php  echo $this->Html->url(array('controller'=>'admin/Cinemas'), true);?>">Admin Panel</a>
                        </li>
                    <?php endif?>

                    <li>
                        <a href="<?php  echo $this->Html->url(array('controller'=>'Users','action'=>'logout'), true);?>">Wyloguj się</a>
                    </li>
                <?php endif?>

                <?php if(!AuthComponent::user()) :?>
                    <li>
                        <a href="<?php  echo $this->Html->url(array('controller'=>'Users','action'=>'login'), true);?>">Zaloguj się</a>
                    </li>
                <?php endif?>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>