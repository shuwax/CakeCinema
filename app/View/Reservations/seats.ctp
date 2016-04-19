<?php if($id['Reservation']['Users_id'] == AuthComponent::user('id')):?>

<!DOCTYPE html>
<html lang="en">

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

<?php $data = $screen['Screen']['screening_date'];
$dat = date('N', strtotime($data));
$dni_tygodnia = array('Poniedziałek', 'Wtorek', 'Środa', 'Czwartek', 'Piątek', 'Sobota','Niedziela');
$dzien = date('d', strtotime($data));
?>

<!-- Page Content -->
<div class="container">
    <hr>
    <!-- /.row -->

    <!-- Page Features -->
    <div class="row event-box-main">

        <div class="row event-main">

            <div class="col-xs-12 event-box">
                <div class="event-image">
                    <div class="col-md-4">
                        <a href="http://localhost/CakeCinema/files/movie/filename/<?php echo $movie['Movie']['id'].'/'.$movie['Movie']['filename']?>" data-lightbox="image-1" title="">
                            <img src="/CakeCinema/img/../files/movie/filename/<?php echo $movie['Movie']['id'].'/'.$movie['Movie']['filename']?>" class="img-responsive" alt="Deco Ensemble – piękno Nuevo Tango " itemprop="image">
                        </a>
                    </div>
                </div>
                <div class="event-content">
                    <div class="col-md-8">
                        <div class="event-header">
                            <h1>
                                <span itemprop="name"><?php echo $movie['Movie']['title']?></span>
                            </h1>
                        </div>
                        <div class="event-dane col-xs-12">

                            <div class="event-dane-left col-xs-6">
                                <p class="event-txtheader">Organizator: <?php echo $cinema['Cinema']['name']?></p>
                                <p class="event-txtheader">Telefon: <?php echo $cinema['Cinema']['phone_number']?></p>
                                <p class="event-txtheader">E-mail: <?php echo $cinema['Cinema']['email']?></p>
                            </div>
                            <div class="event-date-right col-xs-2">

                                <span class="day"><?php echo $dni_tygodnia[$dat-1]?></span>
                                <span class="daynumber"><?php echo  $dzien?></span>
                                <?php
                                $dzien = date('m Y', strtotime($data));
                                $dzien2 = date('Y', strtotime($data));
                                $miesiac = array('Styczeń', 'Luty', 'Marzec', 'Kwiecień', 'Maj', 'Czerwiec','Lipiec','Sierpień','Wrzesień','Październik','Listopad','Grudzień');
                                ?>
                                <span class="month"><?php echo $miesiac[$dzien-1].' '.$dzien2;?></span>
                                <span class="godzina"><?php echo substr($screen['Screen']['time'],0,5)?></span>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row event-seats-head col-xs-12">
        <h2>Wybór miejsca: </h2>
    </div>
    <div class="row event-seats col-xs-12">
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



        <!-- /.row -->

        <hr>

        <!-- Footer
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
        </footer>
             -->
    </div>
    <!-- /.container -->

    <!-- jQuery -->


    <!-- Bootstrap Core JavaScript -->

</body>

</html>

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





