
<?php
    foreach ($seat_reservations as $seat_reservation)
    {
        echo "id ".$seat_reservation['Seat_reservation']['date_reservation']."</br>";
        echo "count_seats_reserv ".$seat_reservation['Seat_reservation']['Seats_id']."</br>";
        echo "statusR ".$seat_reservation['Seat_reservation']['Reservations_id']."</br>";
        echo "Screening_id ".$seat_reservation['Seat_reservation']['Screening_id']."</br>";
        echo "Movies_id ".$reservation['Seat_reservation']['Screening_id']."</br>";
    }


