<?php
// start session so that the errors can be available in this file
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking form</title>
    <link rel="stylesheet" href="bookroom.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <form class="form-group" method='POST' action='../function/book_room.php' enctype="multipart/form-data" onsubmit="return validateForm(event);">
            <?php
                    if(isset($_SESSION["errors"])){
                        $errors = $_SESSION["errors"];
                        // loop through errors and display them
                        foreach($errors as $error){
                            ?>
                                <small style="color: red"><?= $error."<br>"; ?></small>
                            <?php
                        }
                    }
                    // destroy session after displaying errors
                    $_SESSION["errors"] = null;
                ?>
            <div id="form">
                <h1 class="text-white text-center">Book Room Now</h1>

                <div id="first-column">
                    <div id="content">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <input type="text" id="input-group" placeholder="First name" name='fname'>
                    </div>

                    <div id="content">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                        <input type="number" id="input-group" placeholder="Phone number" name='contact'>
                    </div>

                    <div id="content">
                        <i class="fa fa-users" aria-hidden="true"></i>
                        <select name='gender' id="input-group" style="background-color: black;">
                            <option value="">Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Non-Binary">Non-Binary</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>

                </div>

                <div id="second-column">

                    <div id="content">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <input type="text" id="input-group" placeholder="Last name" name='lname'>
                    </div>

                    <div id="content">
                        <i class="fa fa-envelope-o" aria-hidden="true"></i>
                        <input type="email" id="input-group" placeholder="Email" name='email'>
                    </div>

                    <div id="content">
                        <i class="fa fa-bed" aria-hidden="true"></i>
                        <select id="input-group" style="background-color: black;" name='hostel'>
                            <option value="">Hostel</option>
                            <option value="Dufie">Dufie</option>
                            <option value="Masere">Masere</option>
                            <option value="Hosanna">Hosanna</option>
                            <option value="Tanko">Tanko</option>
                            <option value="Charlotte">Charlotte</option>
                        </select>
                    </div>

                    <div id="content">
                        <i class="fa fa-bed" aria-hidden="true"></i>
                        <select id="input-group" style="background-color: black;" name='room'>
                            <option value="">Room Type</option>
                            <option value="Single Occupancy">Single Occupancy</option>
                            <option value="Double Occupancy">Double Occupancy</option>
                            <option value="Triple Occupancy">Triple Occupancy</option>
                            <option value="Quadruple Occupancy">Quadruple Occupancy</option>
                        </select>
                    </div>

                </div>
                <button type="submit" value="Submit" id="submit-btn" name='submit'>Book Now</button>
            </div>
        </form>
    </div>
</body>
</html>