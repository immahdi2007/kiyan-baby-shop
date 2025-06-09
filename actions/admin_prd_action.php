<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
if (!(isset($_SESSION["user"]) && $_SESSION["userType"] == "admin")) {
    // echo $_SESSION['user']."  ".$_SESSION["userType"];
    header("Location: ../index.php");
    die();
}
if (
    isset($_POST['prd_name']) && !empty($_POST['prd_name']) &&
    isset($_POST['prd_stock']) && !empty($_POST['prd_stock']) &&
    isset($_POST['prd_price']) && !empty($_POST['prd_price']) &&
    isset($_POST['prd_category']) && !empty($_POST['prd_category']) &&
    isset($_POST['prd_detail']) && !empty($_POST['prd_detail'])
) {
    $prd_name = $_POST['prd_name'];
    $prd_stock = (int)$_POST['prd_stock'];
    $prd_price = (int)$_POST['prd_price'];
    $prd_category = $_POST['prd_category'];
    $prd_image = $_FILES['prd_image']['name'];
    $prd_detail = $_POST['prd_detail'];
} else {
    exit("برخی از فیلد ها پر نشده");
}
include("../include/connection.php");

$target_dir = "../img/products/";
$target_file = $target_dir . $_FILES['prd_image']['name'];
$uploadOk = 1;
$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
if (isset($_FILES['prd_image']) && ($_FILES['prd_image']['error'] === 0)) {
    $check = getimagesize($_FILES['prd_image']['tmp_name']);
    if($check === false){
        exit("فایل انتخاب شده تصویر نیست");
    }
    $width = $check[0];
    $height = $check[1];
    $ratio = $width / $height;
    $expected_ratio = 1 / 1;
    if(abs($ratio - $expected_ratio) > 0.01){
        exit("نسبت تصویر باید 1:1 باشد.\n 
        تصویر فعلی نسبت{$width}:{$height} دارد.");
    }
    if ($check[0] < 400 && $check[1] < 400 ) {
        exit( "اندازه تصویر خیلی کوچک است لطفا تصویری با حداقل 
        400*400
        آپلود کنید");
        $uploadOk = 0;
    } else {
        echo " پرونده انتخابی یک تصویر از نوع " . $check['mime'] . " است"."<br>";
        $uploadOk = 1;
    }
}
if (file_exists($target_file)) {
    exit("پرونده ای با همین نام در سرویس دهنده میزبان وجود دارد"."<br>");
    $uploadOk = 0;
}
if ($_FILES['prd_image']['size'] > (2 * 1024 * 1024)) {
    exit( "اندازه فایل تصویری بیشتر از 2 مگابایت است"."<br>");
    $uploadOk = 0;
}

$imageFileType = strtolower($imageFileType);
if ($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'jpeg' && $imageFileType != 'webp') {
    exit( "فرمت عکس مناسب نیست لطفا فقط از فرمت های: JPG, JPEG, PNG, WEBP استفاده نمایید"."<br>");
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    echo "پرونده انتخاب شده به سرویس دهنده هاست ارسال نشد"."<br>";
} else {    
    if (move_uploaded_file($_FILES['prd_image']['tmp_name'], $target_file)) {
        echo "با موفقیت به هاست اضافه شد ".$_FILES['prd_image']['name']." تصویر "  ."<br>";    
    } else {
        exit( "خطا در ارسال فایل به هاست"."<br>");
    }
}

if ($uploadOk == 1) {
    $stmt = mysqli_prepare($link, "INSERT INTO products (prd_name, prd_stock, prd_price, prd_category, prd_image, prd_detail) 
    VALUES (?, ?, ?, ?, ?, ?)");
    if(!$stmt){
        die(" آماده سازی کوئری ناموفق بود"."<br>". mysqli_error($link));
    }
    mysqli_stmt_bind_param($stmt, "siisss",$prd_name, $prd_stock, $prd_price, $prd_category, $prd_image, $prd_detail);
    if(mysqli_stmt_execute($stmt)){
        echo "کالا با موفقیت اضافه شد"."<br>";
        ?>
            <a href="../index.php">صفحه اصلی</a>
            <a href="../admin_products.php">افزودن محصول جدید</a>
        <?php
    }else{
        exit( "خطا در اضافه شدن کالا ". mysqli_stmt_error($stmt)); 
    }
    // $query = "INSERT INTO `products` (`prd_code`, `prd_name`, `prd_stock`, `prd_price`, `prd_category`, `prd_image`, `prd_detail`) VALUES
    //  (NULL, '$prd_name', '$prd_stock', '$prd_price', '$prd_category', '$prd_image', '$prd_detail');";
    // if (mysqli_query($link, $query) === true) {
    //     echo "کالا با موفقیت به انبار اضافه شد";
    // } else {
    //     echo "خطا در ثبت مشخصات کالا در انبار";
    // }
    mysqli_stmt_close($stmt);
} else {
    echo "خطا در ثبت مشخصات کالا در انبار"."<br>";
}
mysqli_close($link);

?>
</body>
</html>