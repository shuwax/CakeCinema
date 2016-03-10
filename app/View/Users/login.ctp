


<div class="login">
    <?php echo $this->Form->create('User'); ?>
    <span><strong>Logowanie</strong></span>
    <fieldset>
        <?php echo $this->Form->input('username',array('label' => 'Nazwa uzytkownika'));
        echo $this->Form->input('password',array('label' => 'Hasło'));?>
    </fieldset>
    <div class="btnlog">
        <?php echo $this->Form->end(__('Zaloguj sie')); ?>
    </div>
</div>