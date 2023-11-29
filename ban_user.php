<?php
$userid = $_POST['userid'];
//Connor Gardner
//11-28-2023
//FINAL PROJECT

//this page allows an admin to ban a user, removing all of their previos post and refusing the let them log in

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

//creates 'banned' table

$sql="CREATE TABLE IF NOT EXISTS banned (
    id INT(7) NOT NULL AUTO_INCREMENT,
    username VARCHAR(100) NOT NULL,
    PRIMARY KEY(id)
)";

$stmt=$pdo->prepare($sql);

if ($stmt->execute()){
}else {
    echo "error in creating the table".$stmt->error;
}

//grabs the username from 'registration' to be put in the banned table

    $sql = "SELECT username FROM registration WHERE id='".$userid."'";
        $stmt=$pdo->query($sql);

        $results=$stmt->fetchALL();
        foreach ($results as $result){
            $username = $result['username'];
        }

        //inserts username into banned table

        echo "".$username;
        $sql = "INSERT INTO banned(username) VALUES ('$username')";
        $statement=$pdo->prepare($sql);

        if ($statement->execute()){
            echo "Added to table";
        }else {
            echo "<br>error in uploading file".$stmt->error;
        }

        //deletes and post from images with the users distinct ID

        $sql = "DELETE FROM images WHERE userid='".$userid."'";
        $statement=$pdo->prepare($sql);

        if ($statement->execute()){
            echo "<br>Post deleted";
        }else {
            echo "<br>error".$stmt->error;
        }

        //deletes the users from the registration table

        $sql = "DELETE FROM registration WHERE id='".$userid."'";
        $statement=$pdo->prepare($sql);

        if ($statement->execute()){
            echo "<br>user deleted";
        }else {
            echo "<br>error".$stmt->error;
        }
        $pdo = null;
        header('Location: index_home.php');
        die();
?>