
<div id="screen_id" value="<?php echo $screen['Screen']['id']?>">


</div>
<?php
        echo "id ".$screen['Screen']['id']."</br>";
        echo "screening_date ".$screen['Screen']['screening_date']."</br>";
        echo "Halls_id ".$screen['Screen']['Halls_id']."</br>";
        echo "Movies_id ".$screen['Screen']['Movies_id']."</br>";
        echo $hall['Hall']['count_rows'];
        echo $hall['Hall']['count_seats'];
$rzedy = $hall['Hall']['count_rows'];
$miejsca = $hall['Hall']['count_seats'];
             
       ?>             
     <style type="text/css">
    ul{
        float:left;
        margin:0;
        list-style:none;
        padding:0;
      }
      #lab
      {
          float:left;
          display: -webkit-box;
      }


      
</style>







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

<div class="legenda">
Legenda dla miejsc:</div>
<div class="miejsce_zajete">
</div>
    <p>Miejsce zajete</p>
<div class="miejsce">
</div>
    <p>Miejsce dostepne</p>
<div class="miejsce_wybrane">
</div>
    <p>Miejsce wybrane</p>






<div id="bilet">
    <lable id="lab">Ilosc wybranych biletów : </lable>
    <h1 id="ilosc"> NIE WYBRANO ŻADNYCH MIEJSC</h1>
</div>

<button class ="rezerwuj">Rezerwuj</button>
<button class="anuluj">Anuluj</button>
<script>

    var tab =[];
    var idx = 0;
    var wybrane = 0;
    var check = false; // zmienna do kontroli czy dany wpis jest juz w tablicy
    $('.can').click(function()
    {
        alert(tab[idx]);
        idx++;
    });

    $('.miejsce,.miejsce_wybrane').click(function()
    {
        var id = $(this).data("id");
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
            if(check == false)
                tab.push({id: $(this).data("id"),x:rzad,y:miejsce});

            idx++;
            wybrane++;
            document.getElementById("ilosc").innerHTML = wybrane;

                var ni = document.getElementById('bilet');

                var newdiv = document.createElement('div');

                newdiv.setAttribute('id',id);

                newdiv.innerHTML = 'Rzad:'+rzad+'/ Miejsce: '+miejsce;

                ni.appendChild(newdiv);

        }
        else
        {
            $(this).addClass('miejsce').removeClass('NIE WYBRANO ŻADNYCH MIEJSC');
            for(var i = 0; i < tab.length ; i++)
            {
                if(tab[i].id == $(this).data("id"))
                {
                    tab.splice(i,1);
                    check = true;
                }
            }
            if(check == false)
                tab.push({id: $(this).data("id"),x: rzad,y: miejsce});

            wybrane--;
            if(wybrane == 0 )
            document.getElementById("ilosc").innerHTML = " Nie wybrano miejsca";
            else
                document.getElementById("ilosc").innerHTML = wybrane;
            var id = $(this).data("id");
            var d = document.getElementById('bilet');
            var olddiv = document.getElementById(id);

            d.removeChild(olddiv);
        }
    });
    $('.rezerwuj').click(function()
    {
        if(tab.length == 0)
        {
            alert("Pusto");
        }
        else {
            $.ajax({
                type: "POST",
                data: {"Seat": tab, Screen_id:<?php echo $screen['Screen']['id']?>,Movie_id:<?php echo $screen['Screen']['Movies_id']?>},
                url: "/Reservations/add/",
                success: function () {
                    window.location.reload();
                }
            });
        }
    });



</script>






    
