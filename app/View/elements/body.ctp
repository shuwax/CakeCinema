
<?php
   $screening = $this->requestAction(array('controller'=>'screening','action'=>'index'));
   $movies = $this->requestAction(array('controller'=>'movies','action'=>'index'));

   $cinemas = $this->requestAction(array('controller'=>'cinemas','action'=>'index'));
CakeLog::write('debug', 'myArray22222'.print_r( $cinemas, true) );
   $halls = $this->requestAction(array('controller'=>'halls','action'=>'index'));
   $categories = $this->requestAction(array('controller'=>'categories','action'=>'index'));
 ?>

 <!DOCTYPE html>
 <html lang="en">

<style>
    .thumbnail a>img, .thumbnail>img {
        width: 253px !important;
        height: 258px !important;
        margin-right: auto;
        margin-left: auto;
    }
</style>
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

 </head>

 <body>

 <!-- Page Content -->
 <div class="container">

     <!-- Jumbotron Header -->
     <header class="jumbotron hero-spacer">
         <h1>A Warm Welcome!</h1>
         <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa, ipsam, eligendi, in quo sunt possimus non incidunt odit vero aliquid similique quaerat nam nobis illo aspernatur vitae fugiat numquam repellat.</p>
         <p><a class="btn btn-primary btn-large">Call to action!</a>
         </p>
     </header>

     <hr>

     <!-- Title -->
     <div class="row">
         <div class="col-lg-12">
             <h3>Nowości</h3>
         </div>
     </div>
     <!-- /.row -->

     <!-- Page Features -->
     <div class="row text-center">


         <?php foreach ($screening as $screen):?>
             <?php foreach($movies as $movie): ?>
             <?php if($screen['Screen']['Movies_id'] == $movie['Movie']['id'] ):?>
                     <div class="col-md-3 col-sm-6 hero-feature">
                         <div class="thumbnail">
                             <img src="/CakeCinema/img/../files/movie/filename/<?php echo $movie['Movie']['id'].'/'.$movie['Movie']['filename']?>"alt="">
                             <div class="caption">
                                 <h3><?php echo $movie['Movie']['title']?></h3>

                                 <?php foreach($halls as $hall): ?>
                                     <?php if($screen['Screen']['Halls_id'] == $hall['Hall']['id'] ):?>
                                         <?php foreach($cinemas as $cinema): ?>
                                             <?php if($cinema['Cinema']['id'] == $hall['Hall']['Cinemas_id']):?>
                                                 <p><?php echo $cinema['Cinema']['city']?>
                                             <?php endif?>
                                         <?php endforeach;?>
                                     <?php endif; ?>
                                 <?php endforeach;?>
                                 <?php echo $screen['Screen']['screening_date']?></p>
                                 <p>
                                 <?php echo $this->HTML->link('Kup bilet',array('controller' => 'Screening', 'action' => 'view', $screen['Screen']['id']),array('class'=>'btn btn-primary')).$this->HTML->link('Więcej informacji',array('controller' => 'Screening', 'action' => 'view', $screen['Screen']['id']),array('class'=>'btn btn-default'));?>
                                </p>
                             </div>
                         </div>
                     </div>


         <?php endif?>
         <?php endforeach;?>
         <?php endforeach;?>







     </div>
     <!-- /.row -->

     <hr>

     <!-- Footer -->
     <footer>
         <div class="row">
             <div class="col-lg-12">
                 <p>Copyright &copy; Your Website 2014</p>
             </div>
         </div>
     </footer>

 </div>
 <!-- /.container -->

 <!-- jQuery -->
 <script src="js/jquery.js"></script>

 <!-- Bootstrap Core JavaScript -->
 <script src="js/bootstrap.min.js"></script>

 </body>

 </html>

