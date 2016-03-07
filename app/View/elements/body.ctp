 <?php
 /*
  * BOyd
  */
 ?>
<?php 
   $screening = $this->requestAction(array('controller'=>'screening','action'=>'index'));
   $movies = $this->requestAction(array('controller'=>'movies','action'=>'index'));

   $cinemas = $this->requestAction(array('controller'=>'cinemas','action'=>'index'));
CakeLog::write('debug', 'myArray22222'.print_r( $cinemas, true) );
   $halls = $this->requestAction(array('controller'=>'halls','action'=>'index'));
   $categories = $this->requestAction(array('controller'=>'categories','action'=>'index'));
 ?>

<div class="kolumna1">
 <?php foreach ($screening as $screen):?>
<div class='seans'>
     <div>
          <?php foreach($movies as $movie): ?>
                <?php if($screen['Screen']['Movies_id'] == $movie['Movie']['id'] ):?>

                       <div class="seans-zdjecie">
                                   <?php echo $this->Html->image('../files/movie/filename/'.$movie['Movie']['id'].'/'.$movie['Movie']['filename'],array(
                                   'url' => array('controller' => 'Screening', 'action' => 'view', $screen['Screen']['id'])));?>
                       </div>
                            <div class = "seans-kategoria">
                                     <?php foreach($categories as $category): ?>
                                         <?php if($movie['Movie']['Categories_id'] == $category['Category']['id'] ):?>
                                             <span><?php echo $category['Category']['name']?></span>
                                         <?php endif; ?>
                                     <?php endforeach;?>
                            </div>
                  <div class="seans-tytul">
                      <span class="tytul"><?php echo $movie['Movie']['title']?></span>
                       <div class = "seans-miejsce">
                           <?php foreach($halls as $hall): ?>
                                <?php if($screen['Screen']['Halls_id'] == $hall['Hall']['id'] ):?>
                                        <?php foreach($cinemas as $cinema): ?>
                                            <?php if($cinema['Cinema']['id'] == $hall['Hall']['Cinemas_id']):?>
                                                   <?php echo $cinema['Cinema']['city']?>
                                            <?php endif?>
                                        <?php endforeach;?>
                                <?php endif; ?>
                           <?php endforeach;?>
                        <?php echo $screen['Screen']['screening_date']?>
                           <div class="bilet">
                           <?php echo "Zarezerwuj bilet"?>
                               </div>
                       </div>
                  </div>
           <?php endif; ?>
          <?php endforeach;?>




     </div>
</div>
<?php endforeach;?>
 </div>
