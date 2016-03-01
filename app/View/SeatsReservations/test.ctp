<?php


        echo "id ".$screen['Screen']['id']."</br>";
        echo "screening_date ".$screen['Screen']['screening_date']."</br>";
        echo "Halls_id ".$screen['Screen']['Halls_id']."</br>";
        echo "Movies_id ".$screen['Screen']['Movies_id']."</br>";
   
            
                    $rzedy = $hall['Hall']['count_rows'];
                    $miejsca = $hall['Hall']['count_seats'] +1;
             
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
.miejsce_zajete
{
    width: 20px;
    height: 20px;
    float: left;
    background: gray;
    margin: 0 1px;
}

      
</style>







<?php for($i = 1 ; $i <= $rzedy; $i++): ?>
    <div class="rzad">
        <div class= "nr-rzad">
            <span><?php echo $i;?></span>
        </div>
        <?php $numer = 1?>
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
                                    <span class="wartosc"><?php echo "" ;$numer++?></span>
                                </div>
                                <?php
                            }
                            else
                            {
                                ?>
                                <div class="miejsce" data-id="<?php echo $seat['Seat']['id']?>">
                                    <span class="wartosc"><?php echo $numer;$numer++?></span>
                                </div>
                                <?php
                            }
                        }
                    }
                    else
                    {
                        ?>
                        <div class="miejsce_puste" data-id="<?php echo $seat['Seat']['id']?>">
                            <span class="wartosc"></span>
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


<script>

    var tab =[];
    var idx = 0;
    var wybrane = 0;
    $('.can').click(function()
    {
        alert(tab[idx]);
        idx++;
    });

    $('.miejsce,.miejsce_wybrane').click(function()
    {
        if($(this).hasClass('miejsce'))
        {
            $(this).addClass('miejsce_wybrane').removeClass('miejsce');
            tab.push({id: $(this).data("id"),status: 0});
            idx++;
            wybrane++;
            var id = $(this).data("id");
            var rzad = 1;
            var miejsce = 1;
            document.getElementById("ilosc").innerHTML = wybrane;

                var ni = document.getElementById('bilet');

                var newdiv = document.createElement('div');

                newdiv.setAttribute('id',id);

                newdiv.innerHTML = 'Rzad:'+rzad+'/ Miejsce: '+id;

                ni.appendChild(newdiv);
        }
        else
        {
            $(this).addClass('miejsce').removeClass('miejsce_wybrane');
            //staus na 1
            tab.push({id: $(this).data("id"),status: 1});
            wybrane--;
            document.getElementById("ilosc").innerHTML = wybrane;
            var id = $(this).data("id");
            var d = document.getElementById('bilet');

            var olddiv = document.getElementById(id);

            d.removeChild(olddiv);


        }
    });
    $('.ref').click(function()
    {
        $.ajax({
            type:"POST",
            data:{"Seat":tab},
            url:"/halls/action/",
            success: function()
            {
                window.location.reload();
            }
        });
    });



</script>


<div id="bilet">
    <lable id="lab">Ilosc wybranych biletów : </lable>
    <h1 id="ilosc">0</h1>


</div>





    
