<?php
//Connor Gardner
//11-28-2023
//FINAL PROJECT

//Registration page that alows users to create accounts

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
//creates the 'Banned' table so it can check to see if there are any banned users
//people cannot take a previously banned username
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

//creates registration table
//stores username and hashed passwords of users, as well as their unique 'id' / userid that is used throughout the site

$sql="CREATE TABLE IF NOT EXISTS registration (
    id INT(7) NOT NULL AUTO_INCREMENT,
    username VARCHAR(100) NOT NULL,
    password VARCHAR(100) NOT NULL,
    PRIMARY KEY(id)
)";

$stmt=$pdo->prepare($sql);

if ($stmt->execute()){
}else {
    echo "error in creating the table".$stmt->error;
}
}

//check to see if the password meets the requirements
//paswords must be 8-20 letters long and include at least one capitol letter
function check_password($password){
    if(strlen($password) >= 8 && strlen($password) <= 20 && strtolower($password) != $password){
        return false;
    }else{return true;}
}
//checks to see if the username is already taken
//if taken it tells them it is taken and to pick a new one
function user_exist($username,$password){
    global $pdo;

    $sql="SELECT password FROM registration WHERE username=?";
    $statement=$pdo->prepare($sql);
    $statement->execute([$username]);

    $info=$statement->fetch();

    if($info){
            return true;
        }
        else {return false;}
}
//similar to the user_exist function but checks the 'banned' table instead
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
//checks to see if conditions are met, if they are they can create an account
//if their not, they will told whats wrong and can fix it
$user_exist_bool=user_exist($username,$password);
$check_password=check_password($password);
$check_banned_user=check_banned($username,$password);
if($user_exist_bool || $check_banned_user){
    echo "USER ALREADY EXIST";
}else if($check_password){
    echo "<br>PASSWORD NOT SUFFICIENT";
    echo "<br>8-20 CHARACTERS AND 1 CAPITOL LETTER";
}else{
    $sql="INSERT INTO registration(username,password) VALUES(:username,:password)";
    $statement=$pdo->prepare($sql);
    
    $hashedPassword=password_hash($password,PASSWORD_BCRYPT);
    
    $statement->bindParam(':username',$username);
    $statement->bindParam(':password',$hashedPassword);
    
    if ($statement->execute()){
        echo "<br>user created successfully";
        session_start();
        $_SESSION["userName"]=$username;
        echo "Go to Home Page";
        header('Location: index_home.php');
        die();
    }else {
        echo "<br>error in creating user".$stmt->error;
    }
}
$pdo=null;

?>
