<?php
session_start();
if(isset($_POST["email"]) && !empty($_POST["email"]) &&
isset($_POST[ "password"]) && !empty($_POST["password"])){
    $username= $_POST["email"];
    $password = $_POST["password"];
}else{
    exit("برخی از فیلد ها پر نشده");
}
$dbname = 'kids-shop-db';
$link = mysqli_connect("localhost","root","",$dbname);
if(!$link){
    exit("اتصال ناموفق" .mysqli_connect_error());
}

$login = "SELECT * FROM `users` WHERE email='$username'";
$result = mysqli_query($link,$login);
$row = mysqli_fetch_array($result);
// echo $row[1];

$passCheckQ= "SELECT password FROM `users` WHERE email='$username'";
$passCheckR = mysqli_query($link,$passCheckQ);
$passCheck = mysqli_fetch_array($passCheckR);
// echo $passCheck[0] ;
// echo 
 if(isset($row) && $row[1] === $username){
    if($passCheck[0 ] === $password){
    $_SESSION['user'] = $row['realname'];
    header("Location: ../index.php");
    }else{
        $_SESSION['error'] = 'passwordError';
        $_SESSION['email'] = $row['email'];
        header("Location: ../login.php");
        echo $_SESSION['error'];
    }
 }else{
    $_SESSION['error'] = 'usernotfound';
    header("Location: ../login.php");
    echo $_SESSION['error'];
 }
mysqli_close($link);
?>
