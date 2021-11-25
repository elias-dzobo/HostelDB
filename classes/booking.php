<?php

require_once (dirname(__FILE__)).'/../settings/db_class.php';

class booking extends db_connection {

    public function book($fname, $lname, $contact, $email, $gender, $hostel, $room) {

        $sql = "INSERT INTO `Booking` (`fname`, `lname`,`contact`, `email`, `gender`, `hostel`, `room`) VALUES ('$fname', '$lname',
        '$contact', '$email', '$gender', '$hostel', '$room')";

        return $this->db_query($sql);
    }

    
}

?>