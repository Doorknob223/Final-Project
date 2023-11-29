<!DOCTYPE html>

<?php
//Connor Gardner
//11-28-2023
//FINAL PROJECT

//this is a sub-image-board that allows users to see the post of just one user

$year = date('Y');
session_start();
if($_SESSION["userName"] == ""){
    echo "Not Logged in";
    header('Location: login_page.php');
    die();
}else{
    $username = $_SESSION["userName"];
}
$dsn='mysql:host=localhost:8889;dbname=project';
$username_db="root";
$password_db="root";

try{
    $pdo= new PDO($dsn,$username_db,$password_db);
}catch(PDOException $e){
    die("connection error".$e->getMessage());
}
$username=$_POST['username'];
?>
<html lang="en">
<head>
    <style>
    
    div.gallery {
        margin: 5px;
        border: 1px solid #000000;
        float: left;
        width: 465px;
    }
    div.desc {
        padding: 15px;
        text-align: center;
        word-wrap: break-word;
    }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <br><br>
    <title>IMAGE BOARD</title>
</head>
<body>
<div class="w3-top">
        <div class="w3-row w3-padding w3-dark-grey">
        <div class="w3-col s4">
            <a href="image_board.php" class="w3-button w3-block w3-dark-grey">Image Board</a>
        </div>
        <div class="w3-col s4">
            <a href="index_home.php" class="w3-button w3-block w3-dark-grey">Rules</a>
        </div>
        <div class="w3-col s4">
            <a href="logout.php" class="w3-button w3-block w3-dark-grey">Logout</a>
        </div>
        
    
  </div>
</div>
<div class="w3-margin-top w3-center">

   <h1><?php echo $username;?>'s Uploads</h1>
</div>
   <br>
   
        <?php
        //gets the info from the two linked tables and puts them into clickable images
        $sql = "SELECT registration.username, images.filename, images.id, images.userid, images.caption FROM registration  JOIN images ON registration.id = images.userid WHERE registration.username = '".$username."' ORDER BY id DESC";
        $stmt=$pdo->query($sql);

        $results=$stmt->fetchALL();
        foreach ($results as $result){
            echo "<div class='gallery'>";
            echo "<form action ='template.php' method='POST'>";
            echo "<input type='image' src='image/".$result['filename']."' alt='Submit' width='463' height='300'> ";
            echo "<input type='hidden' name='username' value='".$result['username']."'>";
            echo "<input type='hidden' name='picture' value='".$result['filename']."'>";
            echo "<input type='hidden' name='caption' value='".$result['caption']."'>";
            echo "<input type='hidden' name='userid' value='".$result['userid']."'>";
            echo "<input type='hidden' name='id' value='".$result['id']."'>";
            echo "<div class='desc'>'".$result['caption']."'</div>";
            echo "</div>";
            echo "</form>";
        }
        ?>
</body>
<footer class="w3-panel w3-center w3-text-gray w3-small">
    <p>Hello <?php echo $username;?></p>
    &copy; <?php echo $year; ?> Connor Gardner
</footer>
</html>
<?php  $pdo=null;?>