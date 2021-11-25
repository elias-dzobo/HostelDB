<?php 

require_once (dirname(__FILE__)).'/../controller/booking_controller.php';

$errors = array();

if (isset($_POST['submit'])) {

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $hostel = $_POST['hostel'];
    $room = $_POST['room'];

    if(empty($fname)){
        array_push($errors, "first name is requried");
    }

    if(empty($lname)){
        array_push($errors, "last name is requried");
    }

    if(empty($contact)){
        array_push($errors, "contact is requried");
    }

    if(empty($email)){
        array_push($errors, "email type is requried");
    }

    if(empty($hostel)) {
        array_push($errors, "hostel is required");
    }

    if(empty($room)){
        array_push($errors, "room type is requried");
    }

    

    if (count($errors) == 0) {

        $book = BookRoom($fname, $lname, $contact, $email, $gender, $hostel, $room);
        if ($book) {
            echo "You have successfully booked a room";
            header('location: ../views/success_booking.html');
        } else {
            echo "Failed";
        }
        


    } else { 
        session_start();
        // store the errors inside session
        $_SESSION["errors"] = $errors;
        header("location: ../bookform/bookroom.php");  

    }


}


?>