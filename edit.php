<!DOCTYPE HTML>
<?php
//Connor Gardner
//11-28-2023
//FINAL PROJECT

//allows users to edit their previous post with out making a new post
//they can alter the image and the caption, but the photo id remains the same

$dsn='mysql:host=localhost:8889;dbname=project';
$username_db="root";
$year = date('Y');
$password_db="root";
session_start();
if($_SESSION["userName"] == ""){
    echo "Not Logged in";
    header('Location: login_page.php');
    die();
}else{
    $loggedUsername = $_SESSION["userName"];
}
$id=$_POST['id'];

try{
    $pdo= new PDO($dsn,$username_db,$password_db);
}catch(PDOException $e){
    die("connection error".$e->getMessage());
}


?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <br><br>
    <title>EDIT IMAGE</title>
</head>
<body>
<div class="w3-top">
        <div class="w3-row w3-padding w3-black">
        <div class="w3-col s4">
            <a href="image_board.php" class="w3-button w3-block w3-black">Image Board</a>
        </div>
        <div class="w3-col s4">
            <a href="index_home.php" class="w3-button w3-block w3-black">Rules</a>
        </div>
        <div class="w3-col s4">
            <a href="logout.php" class="w3-button w3-block w3-black">Logout</a>
        </div>
        
    
  </div>
</div>
<div class="w3-margin-top w3-center">

   <h1>EDIT IMAGE</h1>
</div>
   <br>
   <div class="w3-margin-top w3-center">
    <!--grabs new info for POST method-->
   <form action ="edit_upload.php" method="POST" enctype="multipart/form-data">
        <label for="upload">Upload new image: </label>
        <input type="file" id="upload" name="image">
        <br>
        <label for="caption">Updated Caption:</label>
        <input type="text" id="caption" name="capt" ><?php
        echo "<input type='hidden' name='id' value='".$id."'>";
        ?>
        <br>
        <input type="submit" value="Update" class='w3-btn w3-light-grey'>
    </form>
    </div>
</body>
<footer class="w3-panel w3-center w3-text-gray w3-small">
    <p>Hello <?php echo $loggedUsername;?></p>
    &copy; <?php echo $year; ?> Connor Gardner
</footer>
</HTML>
<?php $pdo=null; ?>
