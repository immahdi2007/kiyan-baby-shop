<?php
$dbname = 'mehdi1_kiyan-shop-db';
$link = mysqli_connect("localhost","root","",$dbname);
if(!$link){
    die("اتصال ناموفق" .mysqli_connect_error());
}
?>