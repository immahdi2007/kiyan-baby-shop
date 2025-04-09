<?php
session_start();
session_destroy(); 
echo "شما از حساب خود خارج شدید";
header("Location: ../index.php");
?>