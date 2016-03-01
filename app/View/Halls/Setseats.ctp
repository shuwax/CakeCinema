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
    
    <script>
    $('.miejsce').click(function()
    {   
        $(this).toggleClass('miejsce miejsce_puste');
            
          var id = $(this).data("id");
        //status na 0
        $.ajax({
             type:"POST",
             data:{"id":id,"status":0}, 
             url:"/halls/action/"
         });
    });
    $('.miejsce_puste').click(function()
    {   
        $(this).toggleClass('miejsce_puste miejsce');
        //staus 1
    });
    </script>
 
 
    
    <?php
     echo $this->Form->end('Zapisz');
 $i = 1;
 $enter = 1; 
 foreach($seats as $seat) {
                    if($seat['Seat']['status'] == 1)
                    {
                        if($enter == $miejsca)
                        {
                            echo $this->Form->checkbox('Seat.'.$i.'.status', array("checked" => "checked"), array("empty" => 0));
                            
                            $enter=1;
                        }
                        else  
                           
                            echo "<ul>".$this->Form->checkbox('Seat.'.$i.'.status', array("checked" => "checked"), array("empty" => 0))."</ul>";
                    }       
                    else
                    {
                        if($enter==$miejsca)
                        {
                            echo $this->Form->checkbox('Seat.'.$i.'.status', array("empty" => 0))."</ul>";
                            $enter=1;
                        }
                        else
                            echo "<ul>".$this->Form->checkbox('Seat.'.$i.'.status', array("empty" => 0))."</ul>";
                    }
                    echo $this->Form->input('Seat.'.$i.'.id', array('value' => $seat['Seat']['id'],'hidden' => true));
                    $i++;        
                    $enter++;
                    
              };  
    /*
    echo $this->Form->create('Seat', array('type' => 'put'));
            foreach($seats as $seat) {
                    if($seat['Seat']['status'] == 1)
                    {
                        if($enter == $miejsca)
                        {
                            echo $this->Form->checkbox('Seat.'.$i.'.status', array("checked" => "checked"), array("empty" => 0));
                            
                            $enter=1;
                        }
                        else  
                           
                            echo "<ul>".$this->Form->checkbox('Seat.'.$i.'.status', array("checked" => "checked"), array("empty" => 0))."</ul>";
                    }       
                    else
                    {
                        if($enter==$miejsca)
                        {
                            echo $this->Form->checkbox('Seat.'.$i.'.status', array("empty" => 0))."</ul>";
                            $enter=1;
                        }
                        else
                            echo "<ul>".$this->Form->checkbox('Seat.'.$i.'.status', array("empty" => 0))."</ul>";
                    }
                    echo $this->Form->input('Seat.'.$i.'.id', array('value' => $seat['Seat']['id'],'hidden' => true));
                    $i++;        
                    $enter++;
              };  
    echo $this->Form->end('Zapisz'); 
     * 
     */  
?>
 </div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>    
                <li><?php echo $this->Html->link(__('Kina'), array('controller' => 'cinemas','action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Sale'), array('controller' => 'halls', 'action' => 'index')); ?> </li>
                <li><?php echo $this->Html->link(__('Seanse'), array('controller' => 'screening', 'action' => 'index')); ?> </li>
                <li><?php echo $this->Html->link(__('Filmy'), array('controller' => 'movies', 'action' => 'index')); ?> </li>
                <li><?php echo $this->Html->link(__('Rezerwacje'), array('controller' => 'reservations', 'action' => 'index')); ?> </li>
                <li><?php echo $this->Html->link(__('Użytkownicy'), array('controller' => 'users', 'action' => 'index')); ?> </li>   </ul>
 
	</ul>
</div>
           