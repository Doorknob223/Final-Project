<?php
//Connor Gardner
//11-28-2023
//FINAL PROJECT

//verification page for logging in

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $username=$_POST['username'];
    $password=$_POST['password'];


    $dsn='mysql:host=localhost:8889;dbname=project';
    $username_db="root";
    $password_db="root";

    try{
        $pdo= new PDO($dsn,$username_db,$password_db);
    }catch(PDOException $e){
        die("connection error".$e->getMessage());
    }
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

}
//checks to see if the username and password match
function check_password($username,$password){
    global $pdo;

    $sql="SELECT password FROM registration WHERE username=?";
    $statement=$pdo->prepare($sql);
    $statement->execute([$username]);

    $info=$statement->fetch();

    if($info){
        $hashedPassword=$info['password'];

        if(password_verify($password,$hashedPassword))
        {
            return true;
        }else {return false;}
    }
}
//checks to see if the user exist
function check_user($username,$password){
    global $pdo;

    $sql="SELECT password FROM registration WHERE username=?";
    $stmt=$pdo->prepare($sql);
    $stmt->execute([$username]);

    $info=$stmt->fetch();

    if($info){
            return true;
        }else {return false;}
}
//checks to see if the user has been banned
function check_banned($username,$password){
    global $pdo;

    $sql="SELECT username FROM banned WHERE username=?";
    $stmt=$pdo->prepare($sql);
    $stmt->execute([$username]);

    $info=$stmt->fetch();

    if($info){
            return true;
        }else {return false;}
}
$check_exist_user=check_user($username,$password);
$check_password = check_password($username,$password);
$check_banned_user=check_banned($username,$password);
if($check_banned_user){
    echo "<br>USER HAS BEEN BANNED";
    echo "<br>GO AWAY";
}else if(!$check_exist_user){
    echo "<br>USER DOES NOT EXIST";
}else if(!$check_password){
    echo "<br>PASSWORD INCORRECT";
}else{
    echo "<br>Logged in";
    session_start();
    $_SESSION["userName"]=$username;
    echo "Go to Home Page";
    header('Location: index_home.php');
    die();
}
    $pdo=null;
?>