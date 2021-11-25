<?php

session_start();
//connect to controller
require_once (dirname(__FILE__)).'/../controller/manager_controller.php';

$errors = array();
global $email;

if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $_SESSION['email'] = $email;
    if(empty($email)){
        array_push($errors, "email is requried");
    }

    if(empty($password)){
        array_push($errors, "password is requried");
    }

    $verify_email = verify_email_fxn($email);
    if ($verify_email) {
        array_push($errors, 'email not found');
    }

     // validate email with regex
    $regex = "/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix";
     // set an error if not a valid email address
    if(!preg_match($regex, $email)){
         array_push($errors, "enter a valid email address");
    }

    $verify_password = verify_password($email);
    if ($verify_password != $password) {
        array_push($errors, "password is incorrect");
    }



    if (count($errors) == 0 ) {

        echo "success";
        header("location: ../views/manager.php"); 


    }else{

        echo "failed";

        session_start();
        // store the errors inside session
        $_SESSION["errors"] = $errors;
        header("location: ../views/manager_login.php");
    }
}

?>