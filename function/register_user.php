<?php
//connect to controller
require_once (dirname(__FILE__)).'/../controller/user_controller.php';

// keep track of errors
$errors = array();
// check if the button has been clicked
if(isset($_POST["submit"])){
    // grab form data
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["password2"];

    // validate data
    // check if fields are empty
    if(empty($username)){
        array_push($errors, "name is requried");
    }
    if(empty($email)){
        array_push($errors, "email is requried");
    }
    if(empty($password)){
        array_push($errors, "password is requried");
    }
    if(empty($confirm_password)){
        array_push($errors, "password 2 is requried");
    }

    // check if email already exists
    $verify_email = verify_email_fxn($email);
    if(!$verify_email){
        array_push($errors, "email already exists");
    }

    // check if fields are of appropriate length
    if(strlen($username) > 100){
        array_push($errors, "username must be shorter than 100 characters");
    }
    if(strlen($email) > 100){
        array_push($errors, "email must be shorter than 100 characters");
    }

    // check if passwords are the same
    if($password != $confirm_password){
        array_push($errors, "passwords need to match");
    }

    // validate email with regex
    $regex = "/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix";
    // set an error if not a valid email address
    if(!preg_match($regex, $email)){
        array_push($errors, "enter a valid email address");
    }

    



    // if form is fine
    if(count($errors) == 0){
        // if upload was a success
        // encrypt password
        $password = md5($password);

        // register the new user
        $register_user = register_new_user($username, $email, $password);

        // check if user is registered
        if($register_user){
            echo "success";
            // redirect
            header("location: ../home.html");
            
        }else{
            echo "failed";
        }
       
    }else{
        session_start();
        // store the errors inside session
        $_SESSION["errors"] = $errors;
        header("location: ../signup.php");
    }
    
}