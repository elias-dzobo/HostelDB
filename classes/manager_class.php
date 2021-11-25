<?php
//connect to database class
require_once (dirname(__FILE__)).'/../settings/db_class.php';

class Manager extends db_connection{

    // verify user email
    public function verify_email($email){
        $sql = "SELECT * FROM `Hostelmanager` WHERE `hm_email`='$email'";
        return $this->db_query($sql);
    }

    public function verify_password($email) {
        $sql = "SELECT `password` FROM `Hostelmanager` WHERE `hm_email` = '$email'";
        return $this->db_query($sql);
    }


    public function getHostelId($email){

        $sql = "SELECT `h_id` FROM `Hostelmanager` WHERE `hm_email` = '$email'";
        return $this->db_query($sql);
    }

    public function getHostel($id) {
        $sql = "SELECT `hname` FROM `Hostel` WHERE `h_id` = '$id'";
        return $this->db_query($sql);
    }

    public function getPosts($hostel){
        //sql query
        $sql = "SELECT * FROM `Booking` WHERE `hostel` = '$hostel'";

        //run query
        return $this->db_query($sql);
    }

    public function deleteBooking($id) {
        $sql = "DELETE FROM `Booking` WHERE `booking_id` = '$id'";
        return $this->db_query($sql);
    }


}