<!DOCTYPE html>

<?php
//Connor Gardner
//11-28-2023
//FINAL PROJECT

//Front end of the login page

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
        <h1 class="w3-center"> LOGIN INFORMATION</h1>
        <br>
        <div class="w3-margin-top w3-center">
        <form action ="login_verify.php" method="POST" >
        <label for="user">Input Username:</label>
        <input type="text" id="user" name="username">
        <br>
        <label for="pass">Input Password:</label>
        <input type="password" id="pass" name="password">
        <br>
        <input type="submit" value="Login" class='w3-btn w3-grey'>
        </div>
        </form>
</div>
<a href="registration_page.php" class="w3-button w3-block w3-black">Register</a>
</body>
<footer class="w3-panel w3-center w3-text-gray w3-small">
             &copy; <?php echo $year; ?> Connor Gardner
        </footer>
</html>