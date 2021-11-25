<?php

//connect to controller
require_once (dirname(__FILE__)).'/../controller/user_controller.php';

$errors = array();

if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['password2'];

    if ($password != $confirm_password) {
        array_push($errors, "Passwords must match");

    }

    $verify_email = verify_email_fxn($email);
    if ($verify_email) {
        array_push($errors, "Signup required!");
        header('location: ./signup.php');
    }

    if (count($errors) == 0) {
        $password = md5($password);
        $update = update_password($email, $password);

        if($update) {
            echo "successfully updated password";
            header('location: ../login.php');
        } else {
            echo "Failed to update password";
            header('location: ../signup.php');
        }
    }

}


?>