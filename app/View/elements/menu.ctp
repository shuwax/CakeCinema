<ul>
    <li><?php echo $this->HTML->link('Home',array('controller'=>'Pages','action'=>'display'));?></li>
    <li><?php echo $this->HTML->link('Kina',array('controller'=>'Pages','action'=>'display'));?></li>
    <li><?php echo $this->HTML->link('Kategorie',array('controller'=>'Pages','action'=>'display'));?></li>
    <li><?php echo $this->HTML->link('Kontakt',array('controller'=>'Pages','action'=>'display'));?></li>
    <?php if(AuthComponent::user()) :?>
        <li><?php echo $this->HTML->link(AuthComponent::user('username'),
            array('controller'=>'reservations','action'=>'indexuser'));?></li>
        <li><?php echo $this->HTML->link('Wyloguj',array('controller'=>'Users','action'=>'logout'));?></li>
    <?php endif?>
    <?php if(!AuthComponent::user()) :?>
        <li><?php echo $this->HTML->link('Zaloguj',array('controller'=>'Users','action'=>'login'));?></li>
    <?php endif?>
</ul>