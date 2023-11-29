<?php
//Connor Gardner
//11-28-2023
//FINAL PROJECT

//This is the template that allows people to see more information about a post

$year = date('Y');
session_start();
if($_SESSION["userName"] == ""){
    echo "Not Logged in";
    header('Location: login_page.php');
    die();
}else{
}
$dsn='mysql:host=localhost:8889;dbname=project';
$username_db="root";
$password_db="root";

try{
    $pdo= new PDO($dsn,$username_db,$password_db);
}catch(PDOException $e){
    die("connection error".$e->getMessage());
}
// this takes the information from the clicked image and puts them into variable for use on this page
//special distincion between the user logged in (loggedUsername) and the username of the user who upload the photo (username)
$loggedUsername = $_SESSION["userName"];
$username=$_POST['username'];
$picture=$_POST['picture'];
$caption=$_POST['caption'];
$userid = $_POST['userid'];
$id=$_POST['id'];

    $sql = "SELECT registration.username, registration.id, images.filename FROM registration JOIN images ON registration.id = images.userid";
    $stmt=$pdo->query($sql);

    $results=$stmt->fetchALL();
    foreach ($results as $result){

    }
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <style>
        .center {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 50%;
        }
        div.desc {
            padding: 15px;
            border: 3px solid #000000;
            margin-left: auto;
            margin-right: auto;
            width: 952px;
            text-align: center;
            word-wrap: break-word;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <br><br>
    <title>IMAGE</title>
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
<div><?php
    //information that the user can see
    echo "<br>";
    echo "<img src='image/".$picture."' class='center' width = 600 height = 600></a>";
    echo "<div class='desc'>";
    echo "<i>'".$caption."'</i>";
    echo "<br>Uploaded by: ".$username;
    //echo "<br>User id: ".$userid;
    echo "<br>Image id: ".$id;
    echo "</div>";
?></div>

<div class="w3-margin-top w3-center">
    <?php
    //switch statment checks the username of the person logged in
    //If you are the uploader you are given the ability to edit or delete the photo and caption
    //if you are the admin, you can aldo edit and delete, as well as ban the user, removing all of their post from the site
    switch($loggedUsername){
        case 'Admin':
            echo "Admin Options";
            echo "<br>User id: ".$userid;
            echo "<form action ='edit.php' method='POST' >";
            echo "<input type='submit' value='Edit' class='w3-btn w3-black'>";
            echo "<input type='hidden' name='id' value='".$id."'>";
            echo "</form>";

            echo "<br>";

            echo "<form action ='delete.php' method='POST' >";
            echo "<input type='submit' value='Delete' class='w3-btn w3-black'>";
            echo "<input type='hidden' name='id' value='".$id."'>";
            echo "</form>";

            echo "<br>";

            echo "<form action ='ban_user.php' method='POST' >";
            echo "<input type='submit' value='BAN USER' class='w3-btn w3-black'>";
            echo "<input type='hidden' name='userid' value='".$userid."'>";
            echo "</form>";
            break;
        case $username:
            echo "User Options";
            echo "<form action ='edit.php' method='POST' >";
            echo "<input type='submit' value='Edit' class='w3-btn w3-black'>";
            echo "<input type='hidden' name='id' value='".$id."'>";
            echo "</form>";
    
            echo "<br>";
    
            echo "<form action ='delete.php' method='POST' >";
            echo "<input type='submit' value='Delete' class='w3-btn w3-black'>";
            echo "<input type='hidden' name='id' value='".$id."'>";
            echo "</form>";
            break;
        default:
            break;
            
    }

        //this allows any user to check and see the uploaders post history
    echo "<br>";
    echo "<form action ='user_history.php' method='POST' >";
    echo "<input type='submit' value='User History' class='w3-btn w3-black'>";
    echo "<input type='hidden' name='username' value='".$username."'>";
    echo "</form>";
?></div>
</body>
<footer class="w3-panel w3-center w3-text-gray w3-small">
    <p>Hello <?php echo $loggedUsername;?></p>
    &copy; <?php echo $year; ?> Connor Gardner
</footer>
</HTML>
<?php $pdo=null;?>

