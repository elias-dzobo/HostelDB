<?php
// start session so that the errors can be available in this file
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
 
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="../login.css">
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
    <form method='POST' action='../function/manager_login.php' enctype="multipart/form-data" onsubmit="return validateForm(event);">
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
        <h3>Login Here</h3>
        <label for="username">Email</label>
        <input type="text" placeholder="Enter your email" id="email" name='email'>

        <label for="password">Password</label>
        <input type="password" placeholder="Enter your password" id="password" name='password'>
        <button name = 'login'>Log In</button>
        <p>
          <center><a href="#">Forgot Password?</a></center>
        </p>

    </form>
</body>
</html>

