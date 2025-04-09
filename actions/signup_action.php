<?php
session_start();
if (
    isset($_POST["email"]) && !empty($_POST["email"]) &&
    isset($_POST["realname"]) && !empty($_POST["realname"]) &&
    isset($_POST["password"]) && !empty($_POST["password"]) &&
    isset($_POST["retypepass"]) && !empty($_POST["retypepass"])
) {
    $email = $_POST["email"];
    $realname = $_POST["realname"];
    $password = $_POST["password"];
    $retypepass = $_POST["retypepass"];
} else {
    exit("برخی از فیلد ها مقدار دهی نشده");
}
if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
    exit("پست الکترونیک وارد شده صحیح نیست");
}


//database
$dbname = "kids-shop-db";
$link = mysqli_connect("localhost", "root", "", $dbname);
if (!$link) {
    exit("اتصال ناموفق" . mysqli_connect_error());
}

$login = "SELECT * FROM `users` WHERE email='$email'";
$result = mysqli_query($link, $login);
$row = mysqli_fetch_array($result);
if ($row && $email === $row['email']) {
    // session_start();
    $_SESSION['error'] = 'email_duplicate';

    header("Location: ../login.php");
    exit("ایمیل تکراری");
} 
if ($password != $retypepass) {
    // session_start();
    $_SESSION['error'] = 'pass_err';

    header("Location: ../login.php");
    exit("کلمه عبور و تکرار آن مشابه نیست");
}
$adduserQuery = "INSERT INTO users (id, email, realname, password, type) VALUES (NULL,'$email','$realname','$password',1)";
if (mysqli_query($link, $adduserQuery) === true) {
    $_SESSION['user'] = $realname;
    echo "<h1> کاربری شما با موفقیت ثبت گردید </h1>";
    echo "<h2> درحال بازگشت به صفحه قبل</h1>"
?>
    <script>
        setTimeout(function() {
            location.replace("../Index.php");
        }, 1000);
    </script>
<?php
} else {
    echo "<h1>عضویت شما انجام نشد دوباره تلاش کنید</h1>";
}
mysqli_close($link);
?>