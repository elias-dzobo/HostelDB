<?php
//connect to database class
require_once (dirname(__FILE__)).'/../settings/db_class.php';

class User extends db_connection{
    // register user
    public function register($username, $email, $password){
        $sql = "INSERT INTO `users`(`username`, `email`, `password`) VALUES ('$username', '$email', '$password')";

        return $this->db_query($sql);
    }

    // verify user email
    public function verify_email($email){
        $sql = "SELECT * FROM `users` WHERE `email`='$email'";
        return $this->db_query($sql);
    }

    public function verify_password($email) {
        $sql = "SELECT `password` FROM `users` WHERE `email` = '$email'";
        return $this->db_query($sql);
    }


}