<?php
// start session so that the errors can be available in this file
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Forgot Password?</title>
 
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="login.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
</head>
<body>
  <body class = "body" id = "body">
    <div class = "body-top">
        <div class = "site-name">
          <h2><span>MyHostel</span></h2>
        </div>
    </div>
  </body>
    <div class="background">
    </div>
    <form method='POST' action='./function/forget_password.php' enctype="multipart/form-data" onsubmit="return validateForm(event);">
        <h3>Forgot Password?</h3>
        <label for="email">Email</label>
        <input type="text" placeholder="Enter your email" id="email" name='email'>

        <label for="password">Password</label>
        <input type="password" placeholder="Enter your new password" id="password" name='password'>

        <label for="confirmpassword">Confirm Password</label>
        <input type="password" placeholder="Confirm your new password" id="password" name='password2'>
        <button name='submit'>Reset Password</button>
    </form>
</body>
</html>
 