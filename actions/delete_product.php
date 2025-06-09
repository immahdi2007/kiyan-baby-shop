<?php
session_start();
if (!isset($_SESSION['userType']) && $_SESSION['userType'] !== "admin") {
    header("Location: ../index.php");
    exit();
}

if (isset($_GET['id'])) {
    $prd_code = $_GET['id'];
    include("../include/connection.php");


    $select_query = "SELECT prd_image FROM products WHERE prd_code = '$prd_code'";
    $result = mysqli_query($link, $select_query);
    $row = mysqli_fetch_array($result);
    if (isset($row)) {
        $image_file = $row['prd_image'];
        $path_file = "../img/products/" . $image_file;
        if (file_exists($path_file)) {
            unlink($path_file);
        }
        $query = "DELETE FROM products WHERE prd_code = '$prd_code'";
        if (mysqli_query($link, $query)) {
            $_SESSION["succ_message"] = "محصول با موفقیت حذف شد";
            header("Location: ../index.php#product_lists");
            exit();
        } else {
            exit("خطا در حذف مصحول");
        }
    }        else {
        exit("محصولی با این کد پیدا نشد");
    }

} else {
    exit("محصولی انتخاب نشده");
}
?>