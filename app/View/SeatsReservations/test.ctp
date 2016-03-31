
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
                                <div class="miejsce_zajete" data-id="<?php echo $seat['Seat']['id']?>">
                                    <span class="wartosc"><?php echo "" ;$numer++;$wejsce = true;?></span>
                                </div>
                                <?php
                            }
                        }
                        
                        if($wejsce != true) {
                            ?>
                            <div class="miejsce" data-id="<?php echo $seat['Seat']['id'] ?>">
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
                        <div class="miejsce_puste" data-id="<?php echo $seat['Seat']['id']?>">
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
                    <span class="opisleg">Miejsce wybrane</span>
                </div>
        </div>





<div id="bilet">
    <h2>Podsumowanie rezerwacji</h2></label>
    <span id="ilosc"> NIE WYBRANO ŻADNYCH MIEJSC</span>
</div>
    <div class="calosc">
        <span id="lab">Ilosc: </span><span id="iloscbi"></span>
        <span>Podsumowanie: </span><span id="cenaog">0</span><span>PLN</span>
    </div>


    <div class="rezerwuj">
        <span class="Rbilet" style="color:white;position: relative;bottom: -17px;">Rezerwuj</span>
    </div>
<script>

    var dzien = new Date().toJSON().slice(0,10);
    var tab =[];
    var idx = 0;
    var wybrane = 0;
    var cena_nor = <?php echo json_encode($screen['Screen']['price_norm'])?>;
    var cena_ulg = <?php echo json_encode($screen['Screen']['price_hp'])?>;
    var cena_og = 0;
    var check = false; // zmienna do kontroli czy dany wpis jest juz w tablicy
    document.getElementById("iloscbi").innerHTML = 0;
    //alert(dzien);
    $('.can').click(function()
    {
        alert(tab[idx]);
        idx++;
    });

    $('.miejsce,.miejsce_wybrane').click(function()
    {
        var id = $(this).data("id");
        var obj = this;
        var rzad = $(this).parent().find(".nr-rzad","span").text();
        rzad = rzad.replace(/\s+/, "");
        var miejsce = $(this).text();
        miejsce = miejsce.replace(/\s+/, "");
        check = false;

        if($(this).hasClass('miejsce'))
        {
            $(this).addClass('miejsce_wybrane').removeClass('miejsce');
            for(var i = 0; i < tab.length ; i++)
            {
                if(tab[i].id == $(this).data("id"))
                {
                    tab.splice(i,1);
                    check = true;
                }
            }


            idx++;
            wybrane++;

            // Dynamiczne tworzenie miejsca na stornie(div)

            var ni = document.getElementById('bilet');
            var ticketarea = document.createElement('div');
            ticketarea.setAttribute('id',id);

            var hallname = document.createElement('div');
            hallname.setAttribute('id','hallname');
            hallname.innerHTML = "<span><?php echo $hall['Hall']['name']?></span>";


            var newdiv = document.createElement('div');
            newdiv.setAttribute('id','tickettext');
            newdiv.style.textAlign = 'center';
            newdiv.innerHTML = "<span id=podB>Rzad " +rzad+"Miejsce "+miejsce+"</span>";


            var ticket = document.createElement('div');
            ticket.setAttribute('id','ticket');
            ticket.innerHTML ="<select id=ID"+id+" onchange=getSelectionValue("+id+")>" +
                "<option value="+cena_nor+">"+cena_nor+" PLN - Normalny</option>" +
                "<option value="+cena_ulg+">"+cena_ulg+" PLN - Ulgowy</option>" +
                "</select>";


            var button = document.createElement('div');
            button.setAttribute('id',"button");

            var buttonid = document.createElement('div');
            buttonid.setAttribute('id',"button"+id)
            buttonid.setAttribute('onclick',"DeleteSelectedSeat("+id+")");
            buttonid.style.backgroundImage = "url('/CakeCinema/app/webroot/img/cancel.png')";
            buttonid.style.height = '24px';
            buttonid.style.cursor = "pointer";


            ni.appendChild(ticketarea);
            ticketarea.appendChild(hallname);
            ticketarea.appendChild(newdiv);
            ticketarea.appendChild(ticket);
            ticketarea.appendChild(button);
            button.appendChild(buttonid);

            var test = document.getElementById("ID"+id);
            //alert(test.value);
            cena_og = parseFloat(cena_og) + parseFloat(test.value);
            document.getElementById("iloscbi").innerHTML = wybrane;
            document.getElementById("ilosc").innerHTML =  "";
            document.getElementById("cenaog").innerHTML = cena_og;

            if(check == false) {
                tab.push({id: $(this).data("id"), x: rzad, y: miejsce, type: "Norm"}); // wpis do tablicy po click
                // default set tab by type => norm(first click on seat)
                   // alert(tab[0]['type']);

            }

        }
        else
        {
            $(this).addClass('miejsce').removeClass('miejsce_wybrane');
            for(var i = 0; i < tab.length ; i++)
            {
                if(tab[i].id == $(this).data("id"))
                {
                    tab.splice(i,1);
                    check = true;
                }
            }
            wybrane--;
            var min = document.getElementById("ID"+id);
            cena_og = parseFloat(cena_og) - parseFloat(min.value);
            if(wybrane == 0  && cena_og == 0) {
                document.getElementById("ilosc").innerHTML = "NIE WYBRANO ŻADNYCH MIEJSC ";
                document.getElementById("iloscbi").innerHTML = 0;
                document.getElementById("cenaog").innerHTML = 0;
            }
            else {
                document.getElementById("iloscbi").innerHTML = wybrane;
                document.getElementById("cenaog").innerHTML = cena_og;
            }
            var id = $(this).data("id");
            var d = document.getElementById('bilet');
            var olddiv = document.getElementById(id);

            d.removeChild(olddiv);
        }
    });
    function getSelectionValue(id)
    {
        var value = document.getElementById("ID"+id); // value - wartosc selecta z rodzajem biletu, gdzie id=ID+id;

        if(value.value == cena_ulg)
        {

            for(var i =0 ;i<tab.length;i++)
            {
                if(parseInt(tab[i]["id"]) == id)
                    tab[i]["type"] = "Half"; // zmiana typu biletu na ulgowy
            }
            cena_og = parseFloat(cena_og) - parseFloat(cena_nor);
            cena_og = parseFloat(cena_og) + parseFloat(cena_ulg);
            document.getElementById("cenaog").innerHTML = parseFloat(cena_og);

        }
        else
        {
            for(var i =0 ;i<tab.length;i++)
            {
                if(parseInt(tab[i]["id"]) == id)
                    tab[i]["type"] = "Norm"; // zmiana typu biletu na normalny
            }
            cena_og = parseFloat(cena_og) -  parseFloat(cena_ulg);
            cena_og = parseFloat(cena_og) + parseFloat(cena_nor);
            document.getElementById("cenaog").innerHTML = parseFloat(cena_og); // ustawianie ceny za all
        }
    };
    function DeleteSelectedSeat(id)
    {
        var ww = document.querySelectorAll(".miejsce_wybrane"); //ww miejsce na stronie do skasowania
        for(var i =0 ;i<ww.length;i++)
        {
            if(ww[i].getAttribute('data-id') == id)
            {
                ww[i].classList.remove('miejsce_wybrane');
                ww[i].classList.add('miejsce');

                for(var i = 0; i < tab.length ; i++)
                {
                    if(tab[i].id == id)
                    {
                        tab.splice(i,1);
                        check = true;
                    }
                }
                wybrane--;
                var min = document.getElementById("ID"+id);
                cena_og = parseFloat(cena_og) - parseFloat(min.value);
                if(wybrane == 0  && cena_og == 0) {
                    document.getElementById("ilosc").innerHTML = "NIE WYBRANO ŻADNYCH MIEJSC ";
                    document.getElementById("iloscbi").innerHTML = 0;
                    document.getElementById("cenaog").innerHTML = 0;
                }
                else {
                    document.getElementById("iloscbi").innerHTML = wybrane;
                    document.getElementById("cenaog").innerHTML = cena_og;
                }

                var d = document.getElementById('bilet');
                var olddiv = document.getElementById(id);
                d.removeChild(olddiv);
            }
        }

    };


    $('.rezerwuj').click(function()
    {
        if(tab.length == 0)
        {
            alert("Nie wybrano miejsc do rezerwacji");
        }
        else {
            $.ajax({
                type: "POST",
                data: {"Seat": tab, Screen_id:<?php echo $screen['Screen']['id']?>,Movie_id:<?php echo $screen['Screen']['Movies_id']?>,price:cena_og,
                count:wybrane},
                url: "/CakeCinema/Reservations/add/",
                success: function () {
                    window.location.href = '../../reservations/indexuser';
                }
            });
        }
    });



</script>






    
