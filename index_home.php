<!DOCTYPE html>

<?php
//Connor Gardner
//11-28-2023
//FINAL PROJECT

//REMEMBER TO EXPORT AND DOWNLOAD DATABASE BEFORE SUBMITTING

$year = date('Y');
//this checks to see if the user is logged in, if they are not it boots them to the login screen, this is in most pages so I wont explain it every time
session_start();
if($_SESSION["userName"] == ""){
    echo "Not Logged in";
    header('Location: login_page.php');
    die();
}else{
    $username = $_SESSION["userName"];
}

//This connects the page to the data base, this is in most pages so I wont explain it every time.

$dsn='mysql:host=localhost:8889;dbname=project';
$username_db="root";
$password_db="root";

try{
    $pdo= new PDO($dsn,$username_db,$password_db);
}catch(PDOException $e){
    die("connection error".$e->getMessage());
}

//creates the 'images' table, if it does not already exist.
//I had to place it before oppening image_board.php because it gives an error if the table does not exist.
//looking back I probably could have just place it in image_board.php first, but whatever, it works.
//this is also where the one to many table is created

//the images table uses the registration tables id catagory to link to the table


$sql="CREATE TABLE IF NOT EXISTS images (
    id INT(7) NOT NULL AUTO_INCREMENT,
    filename VARCHAR(100) NOT NULL,
    userid INT NOT NULL,
    caption VARCHAR(500) NOT NULL,
    FOREIGN KEY(userid) REFERENCES registration(id),
    PRIMARY KEY(id)
)";

$stmt=$pdo->prepare($sql);

if ($stmt->execute()){
}else {
    echo "error in creating the table".$stmt->error;
}
?>
<html lang="en">
<head>
    <style>
        div.container {
            text-align: center;
        }

        ul.myUL {
            display: inline-block;
            text-align: left;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Home Page</title>
</head>
<body>
   <!--This is what puts the bar at the top of the webpage
        Each button allows the user to navigate the website
        'Image Board' takes them to the image board
        'Rules' takes them to the home page where they can read the rules
        and 'Logout' lets the user logout
        I also use this alot and am only going to explain it here
-->
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
<div class="w3-container" id="about">
  <div class="w3-content" style="max-width:700px">
    <h1 class="w3-center w3-padding-64"><span class="w3-tag w3-wide">Welcome to Connors Image Board</span></h1>
    <!--Brief description of the website-->
    <img src="digital_camera_photo-1080x675.jpg" style="width:100%;max-width:1000px" class="w3-margin-top">
    <p>This is an image board that allows users to upload an image of their chosing, and add a caption to that image in order to better explain the image.
        Users can create a unique account that allows them to upload their images, these images are linked to the users and show who uploaded what image.
        This image board has several rules that users must abide by, if users are found to have violated these rules, their post can be deleted.
    </p>
    <h2 class="w3-center w3-padding-64"><span class="w3-tag w3-wide">Rules</span></h2>
    <p>
    <div class="w3-margin-top w3-center">
        <b>The image boards rules are as follows</b>
</div>
        <div class="container">
            <!--Displays the rules of the site in an unorganized list thats centered-->
        <ul class="myUL">
            <li>No provocative imagery</li>
            <li>No violent imagery or threats of violence</li>
            <li>No post of illicit activivity / breaking the law</li>
            <li>No post of Harasment / Discrimination</li>
        </ul>
        </div>
    </p>
  </div>
</div>
</body>
<footer class="w3-panel w3-center w3-text-gray w3-small">
    <!--This is the footer it shows my name, a copywrite notice, as well as the name of the user that is currently logged in
    this footer is on most pages so I wont be going over it again
-->
    <p>Hello <?php echo $username;?></p>
    &copy; <?php echo $year; ?> Connor Gardner
</footer>
</html>
<?php $pdo=null;?>