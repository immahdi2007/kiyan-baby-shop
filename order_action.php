<?php
ob_start();
include("include/connection.php");
include("include/header.php");
?><div style="width: 100vw; height: 100vh; padding: 100px;"> <?php
if (!isset($_SESSION['user_id'])) {
    ?>
    <div style="width: 100vw; height: 100vh; display: flex; justify-content: center; align-items: center;">
        <a style="background-color: white; color:black; border-radius: 10px; padding: 20px;" href="login.php">لطفا ابتدا
            وارد شوید</a>
    </div>
    <?php
    exit();
}

if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    ?>
    <div style="width: 100vw; height: 100vh; display: flex; justify-content: center; align-items: center;">
        <a style="background-color: white; color:black; border-radius: 10px; padding: 20px;"
            href="index.php#product_lists">سبد خرید خالی است</a>
    </div>
    <?php
    exit();
}

if (empty($_POST['order_mobile']) || empty($_POST['order_address'])) {
    ?>
    <div style="width: 100vw; height: 100vh; display: flex; justify-content: center; align-items: center;">
        <a style="background-color: white; color:black; border-radius: 10px; padding: 20px;"
            href="order.php">لطفا شماره موبایل و تلفن را صحیح وارد کنید</a>
    </div>
    <?php
    exit();
}

$user_id = $_SESSION['user_id'];
$email = $_SESSION['email'];
$mobile = $_POST['order_mobile'];
$address = $_POST['order_address'];
$order_date = date("Y-m-d H:i:s");
$track_code = uniqid("TRK" , true);
$total_price = 0;
$state = 0;

foreach($_SESSION['cart'] as $item){
    $total_price += (int)$item['prd_price'] * (int)$item['prd_amount'];
}
$query = "INSERT INTO orders (user_id, email, order_date, total_price, address, mobile, track_code, state) VALUES 
(?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($link, $query);
if(!$stmt){
    die("خطا در آماده سازی کوئری".mysqli_error($link)); 
}

mysqli_stmt_bind_param($stmt, "issdsssi", $user_id, $email, $order_date, $total_price, $address, $mobile, $track_code, $state);
mysqli_stmt_execute($stmt);


$order_id = mysqli_insert_id($link);

$query_item = "INSERT INTO order_items (order_id, prd_code, prd_price, prd_amount) VALUES (?, ?, ?, ?)";
$stmt_item = mysqli_prepare($link,$query_item);
if(!$stmt_item){
    die("خطا در آماده سازی کوئری".mysqli_error($link)); 
}

foreach($_SESSION['cart'] as $item){
    $prd_code = $item['prd_code'];
    $prd_price = $item['prd_price'];
    $prd_amount = $item['prd_amount'];
    mysqli_stmt_bind_param($stmt_item, "iidi", $order_id, $prd_code, $prd_price, $prd_amount);
    mysqli_stmt_execute($stmt_item);
}

unset($_SESSION['cart']);

$_SESSION['message_order'] = "سفارش شما با موفقیت ثبت شد. کد پیگیری: $track_code"; 

header("Location: order_success.php");
exit();


include("include/footer.php");
ob_end_flush(); 
?>
