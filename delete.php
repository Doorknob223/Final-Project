<?php
//Connor Gardner
//11-28-2023
//FINAL PROJECT

//this page alows users to delte their unwanted post from the site

$dsn='mysql:host=localhost:8889;dbname=project';
$username_db="root";
$password_db="root";
session_start();
if($_SESSION["userName"] == ""){
    echo "Not Logged in";
    header('Location: login_page.php');
    die();
}else{
    echo "Hello ".$_SESSION["userName"];
    $username = $_SESSION["userName"];
}

try{
    $pdo= new PDO($dsn,$username_db,$password_db);
}catch(PDOException $e){
    die("connection error".$e->getMessage());
}
//grabs the post id from the delete POST method on the template page then uses it to remove from the images table
$id = $_POST['id'];
echo $id;
$sql = "DELETE FROM images WHERE id=?";
$stmt=$pdo->prepare($sql);

if ($stmt->execute([$id])){
    echo "File Deleted";
    header('Location: image_board.php');
    die();
}else {
    echo "error in creating the table".$stmt->error;
}
?>