
<div class="seans-widok">
     <?php
    $rzedy = $hall['Hall']['count_rows'];
    $miejsca = $hall['Hall']['count_seats'];?>
    <div class="miejscaR">
        <div class="wybor-miejsca">
            <?php for($i = 1 ; $i <= $rzedy; $i++): ?>
                <div class="rzad">
                    <div class= "nr-rzad">
                        <span><?php echo $i;?></span>
                    </div>
                    <?php $numer = 1;
                    $wejsce = false;?>
                    <?php for($j = 1 ; $j <= $miejsca ; $j++): ?>

                        <?php foreach($seats as $seat)
                        {
                            if($seat['Seat']['num_rown'] == $i && $seat['Seat']['num_seat'] == $j)
                            {
                                if($seat['Seat']['status'] == 1)
                                {
                                    foreach($rezs as $rez)
                                    {

                                         if($seat['Seat']['id'] == $rez['SeatsReservation']['Seats_id'])
                                        {
                                            ?>
                                            <div class="miejsce_zajete" id="<?php echo $seat['Seat']['id']?>">
                                                <span class="wartosc"><?php echo "" ;$numer++;$wejsce = true;?></span>
                                            </div>
                                            <?php
                                        }


                                    }
                                    if($wejsce != true) {
                                        ?>
                                        <div class="miejsce" id="<?php echo $seat['Seat']['id'] ?>">
                                <span id="wartosc"><?php echo $numer;
                                    $numer++ ?></span>
                                        </div>
                                        <?php
                                    }
                                    $wejsce = false;

                                }
                                else
                                {
                                    ?>
                                    <div class="miejsce_puste" id="<?php echo $seat['Seat']['id']?>">
                                        <span id="wartosc"></span>
                                    </div>
                                    <?php
                                }
                                break;
                            }
                        }
                        ?>
                    <?php endfor;?>
                </div>
            <?php endfor;?>
        </div>
    </div>
    <div class="legenda">
        Legenda dla miejsc:</div>
    <div class="miejsce_zajete">
    </div>
    <p>Miejsce zajete</p>
    <div class="miejsce">
    </div>
    <p>Miejsce dostepne</p>
    <div class="miejsce_wybrane" >
    </div>
    <p>Miejsce wybrane</p>

    <div id="numery">

    </div>
    <script>
        var ownerseat = <?php echo json_encode($ownerseatId)?>;
        window.onload = function()
        {
            var zmienna;
            for(var i = 0 ; i<ownerseat.length; i++)
            {
                zmienna = document.getElementById(ownerseat[i]['SeatsReservation']['Seats_id']);
                zmienna.style.background = '#0CE9DC';
                document.getElementsByClassName('miejsca_wybrane');
                var ni = document.getElementById('numery');
                var newdiv = document.createElement('div');
                newdiv.innerHTML = 'Rząd: ' + ownerseat[i]['SeatsReservation']['x'] + 'Miejsce: ' + ownerseat[i]['SeatsReservation']['y'];
                ni.appendChild(newdiv);
            }
        }

    </script>





