 <?php
 /*
  * MENU
  */
 ?>


    <ul>
        <?php if(AuthComponent::user('role') == 'admin'):?>
        <li><?php echo $this->HTML->link('Admin Page',array('controller'=>'admin/Cinemas'));?></li>
        <?php endif?>
    </ul>           
                            