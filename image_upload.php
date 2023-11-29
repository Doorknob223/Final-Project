<?php
//Connor Gardner
//11-28-2023
//FINAL PROJECT

//this is where the actual image uploading takes place
//the image is stored locally on a folder called 'image'
//the file name is also stored in the 'image' table in the database

$dsn='mysql:host=localhost:8889;dbname=project';
$username_db="root";
$password_db="root";
session_start();
if($_SESSION["userName"] == ""){
    echo "Not Logged in";
    header('Location: login_page.php');
    die();
}else{
    $username = $_SESSION["userName"];
}

try{
    $pdo= new PDO($dsn,$username_db,$password_db);
}catch(PDOException $e){
    die("connection error".$e->getMessage());
}
        //gets the users id from the registration page
        //this is the value that is one-to-many linked to the image table
        $sql = "SELECT id FROM registration WHERE username='".$username."'";
        $stmt=$pdo->query($sql);

        $results=$stmt->fetchALL();
        foreach($results as $result){
            $id = $result['id'];
        }


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_FILES["image"]["error"] == UPLOAD_ERR_OK) {
        $filename = basename($_FILES["image"]["name"]);
        $tmp_name = $_FILES["image"]["tmp_name"];
        $folder = "image/" . $filename;

        $caption=$_POST['capt'];
        //adds info to the images table
        $sql = "INSERT INTO images(filename, userid, caption) VALUES ('$filename', '$id', '$caption')";
        $statement=$pdo->prepare($sql);

        if ($statement->execute()){
            echo "FILE SUCCESFULLY UPLOADED";
        }else {
            echo "<br>error in uploading file".$stmt->error;
        }
         //stores the image to the local image folder
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
