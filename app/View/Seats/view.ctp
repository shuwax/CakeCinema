
                 <?php echo $seats['Seat']['rown'];
                    $rzedy = $seats['Seat']['rown'];
                 ?></br>
                 <?php echo $seats['Seat']['seat'];
                 $miejsca = $seats['Seat']['seat'];
                 ?></br>
                 <?php echo $seats['Seat']['sala'];
                       
                 
                 ?></br>
                 
                 
                 
                
                 
                 
                 
<style type="text/css">
    ul{
        float:left;
        margin:0;
        list-style:none;
        padding:0;
      }
</style>

    <?php
    
            for($i = 1 ; $i <= $rzedy ; $i++)
            {  
              echo '<ul>';
                for($j = 1 ; $j <= $miejsca ; $j++)
                {
                    echo '<li><input type="checkbox"  checked="checked" ></li>' ;
                }
             echo '</ul>';    
            }
         