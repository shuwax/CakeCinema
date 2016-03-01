<h1>Add Event</h1>
<?php


echo $this->Form->create('Seat',array('type'=>'file'));
echo $this->Form->input('sala');
echo $this->Form->input('rown');
echo $this->Form->input('seat');
echo $this->Form->end('Zapisz');
?>
