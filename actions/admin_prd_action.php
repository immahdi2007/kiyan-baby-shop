<?php
session_start();
if(!(isset($_SESSION["user"]) && $_SESSION["userType"] == "admin")){
    // echo $_SESSION['user']."  ".$_SESSION["userType"];
    header("Location: ../index.php");
    die();
}
if(isset($_POST['prd_name']) && !empty($_POST['prd_name']) && 
isset($_POST['prd_stock']) && !empty($_POST['prd_stock']) &&
isset($_POST['prd_price']) && !empty($_POST['prd_price']) &&
isset($_POST['prd_category']) && !empty($_POST['prd_category']) &&
isset($_FILES['prd_image']) && $_FILES['prd_image']['error'] === 0 &&
isset($_POST['prd_detail']) && !empty($_POST['prd_detail'])){
    $prd_name = $_POST['prd_name'];
    $prd_stock = $_POST['prd_stock'];
    $prd_price = $_POST['prd_price'];
    $prd_category = $_POST['prd_category'];
    $prd_image = $_FILES['prd_image']['name'];
    $prd_detail = $_POST['prd_detail'];
}else{
    exit("برخی از فیلد ها پر نشده");
}
include("../include/connection.php");

$target_dir = "img/products/";
$target_file = $target_dir . $_FILES['prd_image']['name'];
$uploadOk = 1;
$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

$check = getimagesize($_FILES['prd_image']['tmp_name']);
if($check === false){
    echo "فایل انتخاب شده تصویر نیست";
    $uploadOk = 0;
}else{
    echo "پرونده انتخابی یک تصویر از نوع". $check['mime']."است";
    $uploadOk = 1;
}
if(file_exists($target_file)){
    echo "پرونده ای با همین نام در سرویس دهنده میزبان وجود دارد";
    $uploadOk = 0;
}
if($_FILES['prd_image']['size'] > (500*1024)){
    echo "اندازه فایل تصویری بیشتر از 500 کیلوبایت است";
    $uploadOk = 0;
}
$imageFileType != strtolower($imageFileType);
if($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'jpeg' && $imageFileType != 'webp'){
    echo "فرمت عکس مناسب نیست لطفا فقط از فرمت های: JPG, JPEG, PNG, WEBP استفاده نمایید";
    $uploadOk = 0;
}

if($uploadOk == 0){
    echo "پرونده انتخاب شده به سرویس دهنده هاست ارسال نشد";
}else{
    if(move_uploaded_file($_FILES['prd_image']['tmp_name'], $target_file)){
        echo "تصویر ". $_FILES['prd_image']['name']."با موفقیت به هاست اضافه شد";
    }else{
        echo "خطا در ارسال فایل به هاست";
    }
}

if($uploadOk == 1){
$query = "INSERT INTO products (prd_name, prd_stock, prd_price, prd_category, prd_image, prd_detail) VALUES (
$prd_name, $prd_stock, $prd_price, $prd_category, $prd_image, $prd_detail)";
    if(mysqli_query($link, $query) === true){
        echo "کالا با موفقیت به انبار اضافه شد";
    }else{
        echo "خطا در ثبت مشخصات کالا در انبار";
    }
}else{
    echo "خطا در ثبت مشخصات کالا در انبار";
}

mysqli_close($link);

?>