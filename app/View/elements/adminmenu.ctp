

    <div class="adminwysokosc">
        <div class="adminmenupanel">
                <ul class="adminmenu">
                    <li><?php echo $this->HTML->link('Kokpit',array('controller'=>'../Pages','action'=>'display'));?></li>
                        <ul class="submenu">
                            <li><?php echo $this->HTML->link('Strona główna',array('controller'=>'../Pages','action'=>'display'));?></li>
                        </ul>

                    <li><?php echo $this->HTML->link('Kina',array('controller'=>'Cinemas','action'=>'index'));?></li>
                    <ul class="submenu">
                        <li><?php echo $this->HTML->link('Wszystkie kina',array('controller'=>'Cinemas','action'=>'index'));?></li>
                        <li><?php echo $this->HTML->link('Dodaj kino',array('controller'=>'Cinemas','action'=>'add'));?></li>
                    </ul>

                    <li><?php echo $this->HTML->link('Sale',array('controller'=>'Halls','action'=>'index'));?></li>
                    <ul class="submenu">
                        <li><?php echo $this->HTML->link('Wszystkie sale',array('controller'=>'Halls','action'=>'index'));?></li>
                        <li><?php echo $this->HTML->link('Dodaj sale',array('controller'=>'Halls','action'=>'add'));?></li>
                    </ul>

                    <li><?php echo $this->HTML->link('Filmy',array('controller'=>'Movies','action'=>'index'));?></li>
                    <ul class="submenu">
                        <li><?php echo $this->HTML->link('Wszystkie filmy',array('controller'=>'Movies','action'=>'index'));?></li>
                        <li><?php echo $this->HTML->link('Dodaj film',array('controller'=>'Movies','action'=>'add'));?></li>
                        <li><?php echo $this->HTML->link('Wszystkie kategorie',array('controller'=>'Categories','action'=>'index'));?></li>
                        <li><?php echo $this->HTML->link('Dodaj kategorie',array('controller'=>'Categories','action'=>'add'));?></li>
                    </ul>

                    <li><?php echo $this->HTML->link('Seanse',array('controller'=>'Screening','action'=>'index'));?></li>
                    <ul class="submenu">
                        <li><?php echo $this->HTML->link('Wszystkie seans',array('controller'=>'Screening','action'=>'index'));?></li>
                        <li><?php echo $this->HTML->link('Dodaj seans',array('controller'=>'Screening','action'=>'add'));?></li>
                    </ul>

                    <li><?php echo $this->HTML->link('Rezerwacje',array('controller'=>'Reservations','action'=>'index'));?></li>
                    <ul class="submenu">
                        <li><?php echo $this->HTML->link('Wszystkie rezerwacje',array('controller'=>'Reservations','action'=>'index'));?></li>
                        <li><?php echo $this->HTML->link('Twoje rezerwacje',array('controller'=>'Pages','action'=>'display'));?></li>

                    </ul>

                    <li><?php echo $this->HTML->link('Użytkownicy',array('controller'=>'Users','action'=>'index'));?></li>
                    <ul class="submenu">
                        <li><?php echo $this->HTML->link('Wszystcy użytkownicy',array('controller'=>'Users','action'=>'index'));?></li>
                        <li><?php echo $this->HTML->link('Dodaj nowego',array('controller'=>'Users','action'=>'add'));?></li>
                        <li><?php echo $this->HTML->link('Twój profil',array('controller'=>'Users','action'=>'view/'.AuthComponent::user('id')));?></li>

                    </ul>

                </ul>
        </div>
    </div>