<!DOCTYPE html>

<?php
//Connor Gardner
//11-28-2023
//FINAL PROJECT

//front end of the registration page

$year = date('Y');
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Document</title>
</head>
<body>
    <div class="w3-container w3-light-grey w3-center" style="padding:328px 64px">
   <h1 class="w3-center">REGISTRATION INFORMATION</h1>
   <br>
    <form action ="registration_verify_page.php" method="POST" >
        <label for="user">Input Username:</label>
        <input type="text" id="user" name="username">
        <br>
        <label for="pass">Input Password:</label>
        <input type="password" id="pass" name="password">
        <br>
        <b>Password must be 8-20 characters and include 1 capital letter</b>
        <br>
        <input type="submit" value="Register" class='w3-btn w3-grey'>
</form>
</div>
<a href="login_page.php" class="w3-button w3-block w3-black">Login</a>
</body>
<footer class="w3-panel w3-center w3-text-gray w3-small">
             &copy; <?php echo $year; ?> Connor Gardner
        </footer>
</html>