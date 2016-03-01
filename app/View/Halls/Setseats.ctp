<div class="setseats index">
	<h2><?php echo __('Sale'); ?></h2> 
        
                 <?php
                    $rzedy = $hall['Hall']['count_rows'];
                    $miejsca = $hall['Hall']['count_seats'] +1;
                    
                 ?> 
<h1>Wybierz ułożenie miejsc:</h1>
                 
<style type="text/css">
    ul{
        float:left;
        margin:0;
        list-style:none;
        padding:0;
      }      
</style>

    <style>
.miejsce{
    width: 20px;
    height: 20px;
    background: #99CC00!important;
    border-color:#99CC00;
    float: left;
    margin: 0 1px;
}
.miejsce_puste{
    width: 20px;
    height: 20px;
    float: left;
    background: green;
    margin: 0 1px;
}
.miejsce span{
    width: 100%;
    text-align: center;
    font-size: 11px;
    font-weight: 700;
    display: inline-block;
    /* position: absolute; */
    line-height: 20px;
    top: -1px;
    color:white;
    cursor:pointer;
    
}
.miejsce_puste span{
    width: 100%;
    text-align: center;
    font-size: 11px;
    font-weight: 700;
    display: inline-block;
    /* position: absolute; */
    line-height: 20px;
    top: -1px;
    cursor:pointer;
    
}
.rzad
{
    display: block;
    margin-bottom: 4px;
    overflow: hidden;
    height: 20px;
    width: 100%;
}
.nr-rzad
{
    width: 20px;
    height: 20px;
    float: left;
    margin: 0 1px;
    background-color: #979797;
    position: relative;
    color: #FFF;
}
.nr-rzad span
{
    width: 100%;
    text-align: center;
    font-size: 11px;
    font-weight: 700;
    display: inline-block;
    /* position: absolute; */
    line-height: 20px;
    top: -1px;
}
.miejsce_wybrane {
     color: black!important;
     background-color: #0CE9DC;;
     
}
.miejsce_puste {
     color: black!important;
     background-color: white;
     
}
    </style>


       
    
    
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

    <button class ="ref">Zapisz</button>
    <button class="can">Anuluj</button>

    <script>
        var tab =[];
        var idx = 0;
        $('.can').click(function()
        {
            alert(tab[idx]);
            idx++;
        });

        $('.miejsce,.miejsce_puste').click(function()
        {
            if($(this).hasClass('miejsce'))
            {
                $(this).addClass('miejsce_puste').removeClass('miejsce');
                 tab.push({id: $(this).data("id"),status: 0});
                idx++;
                //status na 0

            }
            else
            {
                $(this).addClass('miejsce').removeClass('miejsce_puste');
                //staus na 1
                tab.push({id: $(this).data("id"),status: 1});

            }
        });
        $('.ref').click(function()
        {
                $.ajax({
                type:"POST",
                data:{"Seat":tab},
                url:"/halls/action/"
            });
        });



    </script>
           