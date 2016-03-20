<?php if($id['Reservation']['Users_id'] == AuthComponent::user('id')):?>
<div class="seans-widok">




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
        <p>Legenda dla miejsc:</p>

        <div class="zajete" >
            <span class="kwadrat" style="background: gray"></span>
            <span class="opisleg">Miejsce zajete</span>
        </div>

        <div class="dostepne">
            <span class="kwadrat" style="background: #99CC00"></span>
            <span class="opisleg">Miejsce dostępne</span>
        </div>

        <div class="wybrane">
            <span class="kwadrat" style="background: #0CE9DC"></span>
            <span class="opisleg"><strong>Twoje wybrane miejsca</strong></span>
        </div>
    </div>





    <div id="bilet">
        <h2>Podsumowanie rezerwacji</h2></label>
        <span id="ilosc"></span>
    </div>
    <div class="calosc">
        <span id="lab">Ilosc: </span><span id="iloscbi"></span>
        <span>Podsumowanie: </span><span id="cenaog">0</span><span>PLN</span>
    </div>


    <?php endif?>
    <script>
        var ownerseat = <?php echo json_encode($ownerseatId)?>;
        var ilosc = <?php echo json_encode($id)?>;
        var id = ilosc['Reservation']['id'];
        var cena_nor = <?php echo json_encode($screen['Screen']['price_norm'])?>;
        var cena_ulg = <?php echo json_encode($screen['Screen']['price_hp'])?>;
        window.onload = function()
        {
            var zmienna;
            for(var i = 0 ; i<ownerseat.length; i++)
            {

                zmienna = document.getElementById(ownerseat[i]['SeatsReservation']['Seats_id']);
                zmienna.style.background = '#0CE9DC';

                var ni = document.getElementById('bilet');
                var ticketarea = document.createElement('div');
                ticketarea.setAttribute('id',id);

                var hallname = document.createElement('div');
                hallname.setAttribute('id','hallname');
                hallname.innerHTML = "<span><?php echo $hall['Hall']['name']?></span>";


                var newdiv = document.createElement('div');
                newdiv.setAttribute('id','tickettext');
                newdiv.innerHTML = "<span id=podB>Rzad " +ownerseat[i]['SeatsReservation']['x']+"Miejsce "+
                    ownerseat[i]['SeatsReservation']['y']+"</span>";


                var ticket = document.createElement('div');
                ticket.setAttribute('id','ticket');

                if(ownerseat[i]['SeatsReservation']['type'] == "Norm")
                {
                    ticket.innerHTML ="<select id=ID"+id+" disabled = true>" +
                        "<option value="+cena_nor+">"+cena_nor+" PLN - Normalny</option>"+
                            "</select>";
                }
                else
                {
                    ticket.innerHTML ="<select id=ID"+id+" disabled = true>" +
                        "<option value="+cena_ulg+">"+cena_ulg+" PLN - Ulgowy</option>"+
                        "</select>";
                }

                ticket.style.float = "none";

                ni.appendChild(ticketarea);
                ticketarea.appendChild(hallname);
                ticketarea.appendChild(newdiv);
                ticketarea.appendChild(ticket);
      }

            document.getElementById("iloscbi").innerText = ilosc['Reservation']['count_seats_reserv'];
            document.getElementById("cenaog").innerText = ilosc['Reservation']['price'];
        }

    </script>





