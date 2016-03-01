
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
      
</style>
     <?php                 
    $i = 1;
    $enter = 1; 
    $stat = false;
 echo $this->Form->create('Seat', array('type' => 'put'));
            foreach($seats as $seat) {
                    if($seat['Seat']['status'] == 1)
                    {
                        foreach ($rezs as $rez)
                        {
                                if($seat['Seat']['id'] == $rez['SeatsReservation']['Seats_id'])
                                   {
                                       $stat = true;
                                       break;                                        
                                   }
                        }                                
                        if($enter == $miejsca)
                        {
                                if($stat == true)
                                {
                                    echo $this->Form->checkbox('SeatsReservation.'.$i.'.Seats_id',array('disabled'=>true));
                                }
                                else 
                                {
                                    echo $this->Form->checkbox('SeatsReservation.'.$i.'.Seats_id');
                                }
                            $enter=1;
                        }
                        else
                        {
                            if($stat == true)
                            {
                                    echo "<ul>".$this->Form->checkbox('SeatsReservation.'.$i.'.Seats_id',array('disabled'=>true))."</ul>";
                            }
                            else
                            {
                                echo "<ul>".$this->Form->checkbox('SeatsReservation.'.$i.'.Seats_id')."</ul>";
                            }
                        }
                        echo $this->Form->input('Seat.'.$i.'.id', array('value' => $seat['Seat']['id'],'hidden' => true));
                    }       
                    else
                    {
                        if($enter==$miejsca)
                        {
                            echo $this->Form->checkbox('SeatsReservation.'.$i.'.Seats_id', array("empty" => 0 , 'disabled'=>true))."</ul>";
                            $enter=1;
                        }
                        else
                            echo "<ul>".$this->Form->checkbox('SeatsReservation.'.$i.'..Seats_id', array("empty" => 0,'disabled'=>true))."</ul>";
                    }
                    $stat = false;
                    $i++;        
                    $enter++;
              };            
              
              
          ?>
<div id="bilet">
    <label id="lab">Ilosc wybranych biletów : </lable>
    <h1 id="ilosc">0</h1>
    </br><h1 id="value"></h1>
</div>
<div id="ilosc8"></div>


<?php 
//<input  class="btnSelectAll" title="Submit" type="button" value="Zaznacz wszystkie"/> 
?>

<script>
    $("input[type='checkbox']").click(function()
    {
        var total = $('input[type=checkbox]').filter(':checked').length;
        //var totalvalue = $('input[type=checkbox]').filter(':checked').attr('name');
        document.getElementById("ilosc").innerHTML = total;
       // document.getElementById("value").innerHTML = totalvalue;
    });
    
    
</script>




<script>
    /*
$(".btnSelectAll").click(function(){
    //Select All chackboxes having name as order_id[] And Tick it.
    if($(".btnSelectAll").val() == "Zaznacz wszystkie")
    {
        $("input[type='checkbox']").prop('checked', true);
        $(".btnSelectAll").prop('value', 'Odznacz');
    }
    else 
    {
        $("input[type='checkbox']").prop('checked', false);
        $(".btnSelectAll").prop('value', 'Zaznacz wszystkie');
    }
});
*/
</script>
<?php
    echo $this->Form->end('Dalej'); 
    ?>