<div class="Hall admin setseats">


        
                 <?php
                    $rzedy = $hall['Hall']['count_rows'];
                    $miejsca = $hall['Hall']['count_seats'];
                 ?> 
<h1>Wybierz ułożenie miejsc:</h1>
    <h2>Kino: <?php echo $cinema['Cinema']['name']?></h2>

        <h2>Nazwa sali: <?php echo $hall['Hall']['name']?></h2>
<div class="space">
 <?php for($i = 1 ; $i <= $rzedy; $i++): ?>
     <div class="rzad">
        <div class= "nr-rzad">
            <span><?php echo $i;?></span>
        </div>           
     <?php for($j = 1 ; $j <= $miejsca ; $j++): ?>   
         
            <?php foreach($seats as $seat)
            {
                if($seat['Seat']['num_rown'] == $i && $seat['Seat']['num_seat'] == $j)
                {
                    if($seat['Seat']['status'] == 1)
                    {
                        ?>
                            <div class="miejsce" data-id="<?php echo $seat['Seat']['id']?>">
                            <span class="wartosc"><?php echo $j;?></span>
                            </div>
                        <?php
                    }
                    else
                        {
                        ?>
                             <div class="miejsce_puste" data-id="<?php echo $seat['Seat']['id']?>">
                            <span class="wartosc"><?php echo $j;?></span>
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
    <input class ="ref" type="submit" value="Zapisz">
</div>

    <script>
        var tab =[];
        var idx = 0;
        var check = false;
        function  disableselect()
        {
            document.getElementsByClassName("rzad").disabled = true;
        }
        $('.can').click(function()
        {
            alert(tab[idx]);
            idx++;
        });

        $('.miejsce,.miejsce_puste').click(function()
        {
            check = false;
            if($(this).hasClass('miejsce'))
            {
                $(this).addClass('miejsce_puste').removeClass('miejsce');
                for(var i = 0; i < tab.length ; i++)
                {
                    if(tab[i].id == $(this).data("id"))
                    {
                        tab.splice(i,1);
                        check = true;
                    }
                }
                if(check == false)
                    tab.push({id: $(this).data("id"),status: 0});
            }
            else
            {
                $(this).addClass('miejsce').removeClass('miejsce_puste');
                //staus na 1
                for(var i = 0; i < tab.length ; i++)
                {
                    if(tab[i].id == $(this).data("id"))
                    {
                        tab.splice(i,1);
                        check = true;
                    }
                }
                if(check == false)
                    tab.push({id: $(this).data("id"),status: 1});
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
                    window.location.href = "../";
                }
            });
        });
    </script>
           