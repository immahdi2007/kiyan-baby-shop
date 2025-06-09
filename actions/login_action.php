<?php
session_start();
if(isset($_POST["email"]) && !empty($_POST["email"]) &&
isset($_POST[ "password"]) && !empty($_POST["password"])){
    $username= $_POST["email"];
    $password = $_POST["password"];
}else{
        ?>
    <script>
        setTimeout(() => {
            location.replace("../index.php");
        }, 1000);
    </script>
    <?php
    exit("برخی از فیلد ها پر نشده");
}

include("../include/connection.php");

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
    if($passCheck[0] === $password){
    $_SESSION['user'] = $row['realname'];
    $_SESSION["user_id"] = $row['id'];
    $_SESSION["email"] = $row['email'];
    if($row['type'] == 1){
        $_SESSION["userType"] = "admin";
    }elseif($row['type'] == 0){
        $_SESSION["userType"] = "public";
    }
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
