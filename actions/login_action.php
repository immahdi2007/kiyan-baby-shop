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

$login = "SELECT * FROM `users` WHERE email='$username' AND password='$password'";
$result = mysqli_query($link,$login);
$row = mysqli_fetch_array($result);
 if($row){
    $_SESSION['user'] = $row['realname'];
    header("Location: ../index.php");
 }
    else{
        // session_start();
        $_SESSION['error'] = 'usernotfound';
        header("Location: ../login.php");
        exit("کاربر پیدا نشد");
        }
mysqli_close($link);
?>
