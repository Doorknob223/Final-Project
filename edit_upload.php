<?php
//Connor Gardner
//11-28-2023
//FINAL PROJECT

//where the actual editing of the database is done

$dsn='mysql:host=localhost:8889;dbname=project';
$username_db="root";
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



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_FILES["image"]["error"] == UPLOAD_ERR_OK) {
        $filename = basename($_FILES["image"]["name"]);
        $tmp_name = $_FILES["image"]["tmp_name"];
        $folder = "image/" . $filename;

        //changes the values of the images table from the old info to the new

        $caption=$_POST['capt'];
        $sql = "UPDATE images SET filename = '".$filename."', caption = '".$caption."' WHERE id = '".$id."'";
        $statement=$pdo->prepare($sql);

        if ($statement->execute()){
            echo "FILE SUCCESFULLY UPLOADED";
        }else {
            echo "<br>error in uploading file".$stmt->error;
        }

         //adds new file to the image folder
        if(move_uploaded_file($tmp_name, $folder)){
            header('Location: image_board.php');
            die();
        }else {
            echo "Upload Failed";
        }
    }
    else {
        echo "<p>Error uploading the image.</p>";
    }
 }

 $pdo=null;

 ?>