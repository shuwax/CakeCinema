<h1>Edit Post</h1>
<?php
echo $this->Form->create('Event',array('type'=>'file'));
echo $this->Form->input('title');
echo $this->Form->input('filename',array('type'=>'file'));
echo $this->Form->input('organizer');
echo $this->Form->input('event_date');
echo $this->Form->input('city');
echo $this->Form->input('place_name');
echo $this->Form->input('street');
echo $this->Form->input('description');
echo $this->Form->input('category_id');
echo $this->Form->input('price_norm');
echo $this->Form->input('price_red');
echo $this->Form->input('max_by');
echo $this->Form->end('Save Event');
?>