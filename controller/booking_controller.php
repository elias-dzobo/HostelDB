<?php 

require_once (dirname(__FILE__)).'/../classes/booking.php';


function BookRoom($fname, $lname, $contact, $email, $gender, $hostel, $room) {

    $booking = new booking;

    $run_query = $booking->book($fname, $lname, $contact, $email, $gender, $hostel, $room);

    if ($run_query) {
        return $run_query;
    }  else {
        return false;
    }
}

?>