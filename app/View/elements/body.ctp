
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
    #myCarousel
    {
        top: -19px;
    }
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

 <!-- Header Carousel -->
 <header id="myCarousel" class="carousel slide">
     <!-- Indicators -->
     <?php $ilosc=0?>
     <?php $iloscs=1?>
     <ol class="carousel-indicators">
         <?php foreach ($screening as $screen):?>
             <?php foreach($movies as $movie): ?>
                 <?php if($screen['Screen']['Movies_id'] == $movie['Movie']['id'] ):?>
                     <li data-target="<?php echo "#myCarouse".$iloscs?>" data-slide-to="0" class="active"></li>
                     <?php $iloscs++?>
                 <?php endif?>
             <?php endforeach;?>
         <?php endforeach;?>
     </ol>
     <!-- Wrapper for slides -->
     <div class="carousel-inner">
         <?php foreach ($screening as $screen):?>
            <?php foreach($movies as $movie): ?>
                <?php if($screen['Screen']['Movies_id'] == $movie['Movie']['id'] ):?>

                    <?php if($ilosc == 0):?>
                         <div class="item active">
                             <div class="fill" style="background-image:url('/CakeCinema/img/../files/movie/filename/<?php echo $movie['Movie']['id'].'/'.$movie['Movie']['filename']?>');"></div>
                             <div class="carousel-caption">
                                 <h2><?php echo $movie['Movie']['title']?></h2>
                             </div>
                         </div>
                     <?php endif;?>

                     <?php if($ilosc !=0):?>
                         <div class="item">
                             <div class="fill" style="background-image:url('/CakeCinema/img/../files/movie/filename/<?php echo $movie['Movie']['id'].'/'.$movie['Movie']['filename']?>');"></div>
                             <div class="carousel-caption">
                                 <h2><?php echo $movie['Movie']['title']?></h2>
                             </div>
                         </div>
                     <?php endif;?>
                     <?php $ilosc++?>
                 <?php endif?>
             <?php endforeach;?>
         <?php endforeach;?>

     </div>

     <!-- Controls -->
     <a class="left carousel-control" href="#myCarousel" data-slide="prev">
         <span class="icon-prev"></span>
     </a>
     <a class="right carousel-control" href="#myCarousel" data-slide="next">
         <span class="icon-next"></span>
     </a>
 </header>



 <!-- Page Content -->
 <div class="container">

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

 <!-- Script to Activate the Carousel -->
 <script>
     $('.carousel').carousel({
         interval: 5000 //changes the speed
     })
 </script>

 </body>

 </html>

