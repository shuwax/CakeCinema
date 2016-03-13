<div  class="index">
    <?php $idpokazu;?>
    <h2><?php echo __('Rezerwacje'); ?></h2>
    <table cellpadding="0" cellspacing="0">
        <thead>
        <tr>
            <th><?php echo 'id' ?></th>
            <th><?php echo 'Ilosc zarezerwowanych miejsc' ?></th>
            <th><?php echo 'Status rezerwacji'; ?></th>
            <th><?php echo 'Seans'; ?></th>
            <th><?php echo 'Film'; ?></th>
            <th class="actions"><?php echo __('Opcje'); ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($reservations  as $reservation): ?>
            <tr>
                <td><?php echo h($reservation['Reservation']['id']); ?>&nbsp;</td>
                <td><?php echo h($reservation['Reservation']['count_seats_reserv']); ?>&nbsp;</td>
                <td><?php echo h($reservation['Reservation']['statusR']); ?>&nbsp;</td>
                <td><?php echo $this->Html->link(__('Pokaż seans'), array('controller'=>'../Screening','action' => 'view', $reservation['Reservation']['Screening_id']))?></td>



                <?php foreach ($movies as $movie): ?>
                    <?php if($movie['Movie']['id'] == $reservation['Reservation']['Movies_id'])
                    {
                        ?> <td> <?php echo $movie['Movie']['title'];?></td><?php
                    }
                    ?>
                <?php endforeach; ?>

                <?php foreach ($screening as $screen): ?>
                    <?php if($screen['Screen']['id'] == $reservation['Reservation']['Screening_id'])
                    {
                        $idpokazu = $screen['Screen']['id'];
                    }
                    ?>
                <?php endforeach; ?>

                <td class="actions">
                    <?php echo $this->Html->link(__('Pokaż układ zarezerwowanych miejsc'), array('controller'=>'/Reservations','action' => 'seats', $reservation['Reservation']['id']))?>
                    <?php echo $this->Html->link(__('Edytuj rezerwacje'), array('controller'=>'../Reservations','action' => 'edit', $reservation['Reservation']['id'])); ?>
                    <?php echo $this->Form->postLink(__('Usuń rezerwacje'), array('controller'=>'../Reservations','action' => 'delete', $reservation['Reservation']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $reservation['Reservation']['id']))); ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>


</div>


