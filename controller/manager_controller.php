<?php
//connect to database class
require_once (dirname(__FILE__)).'/../classes/manager_class.php';


function verify_email_fxn($email){
    // create a new instance of user object
    $user = new Manager;

    // run the query
    $run_query = $user->verify_email($email);

    // if successful
    if($run_query){
        // fetch data from database
        $user_email = $user->db_fetch();
        if(empty($user_email)){
            // if empty means the email isn't in the database already
            return true;
        }else{
            return false;
        }
    }else{
        return false;
    }
}

function verify_password($email) {

    $user = new Manager;

    $run_query = $user->verify_password($email);
    if ($run_query) {

        $user_password = $user->db_fetch();
        return $user_password['password'];
    } else {
        return "";
    }
}


function getPosts($hostel){
    // Create new post object
    $manage = new Manager;

    // Run query
    $runQuery = $manage->getPosts($hostel);

    if($runQuery){
        $posts = array();
        while($record = $manage->db_fetch()){
            $posts[] = $record;
        }
        return $posts;
    }else{
        return false;
    }
}


function HostelId($email) {
    
    $manager = new Manager;

    $run_query = $manager->getHostelId($email);

    if ($run_query) {
        $h_id = $manager->db_fetch();
        return $h_id['h_id'];
    } else {
        return "";
    }
}

function Hostel($id) {
    $manager = new Manager;

    $run_query = $manager->getHostel($id);

    if ($run_query) {
        $hostel = $manager->db_fetch();
        return $hostel['hname'];
    } else {
        return "";
    }
}


function deleteBooking($id) {

    $manager = new Manager;

    $run_query = $manager->deleteBooking($id);
    if ($run_query) {
        return true;
    } else {
        return false;
    }
}