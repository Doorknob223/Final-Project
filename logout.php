<?php
//Connor Gardner
//11-28-2023
//FINAL PROJECT

//This page destroys the session, 'loggin the user out'
//it also returns them to the loggin screen
session_start();
echo "<p>".$_SESSION["userName"]."  you are successfully logout of the system.</p>";

session_destroy();

    echo "Not Logged in";
    header('Location: login_page.php');
    die();

?>
