<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    @font-face {
        font-family: "modam-regular";
        src: url(../fonts/Modam/Modam-Regular.ttf);
        font-weight: 400;
    }
    :root{
        --bgcolor: #FFF9F0;
        --secondary-color: #5A7D9A; 
        }
    * {
        font-family: "modam-regular";
    }

    body {
        width: 99vw;
        height: 97vh;
        display: flex;
        justify-content: center;
        align-items: center;
        background: var(--bgcolor);
    }

    h3 {
        font-size: 4vw;
        color: #da0000;
    }
    h2{
        font-size: 4vw;
        color: var(--secondary-color); 
        margin: 0;
    }
    .error_icon{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: -1;
        width: 50vw;
        opacity: .1;
    }
    .complete_div{
        display: flex;
        flex-direction: column-reverse;
        justify-content: center;
        align-items: center;
        gap: 1rem;
    }
    .complete_icon{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        /* z-index: -1; */
        width: 50vw;
        opacity: .1;
    }
</style>

<body>
    <?php
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
    
        exit('<h3>برخی از فیلد ها مقدار دهی نشده</h3>
            <svg class="error_icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 80 80">
            <path fill="#f78f8f" d="M40,77.5C19.322,77.5,2.5,60.678,2.5,40S19.322,2.5,40,2.5S77.5,19.322,77.5,40S60.678,77.5,40,77.5 z" />
            <path fill="#c74343" d="M40,3c20.402,0,37,16.598,37,37S60.402,77,40,77S3,60.402,3,40S19.598,3,40,3 M40,2 C19.013,2,2,19.013,2,40s17.013,38,38,38s38-17.013,38-38S60.987,2,40,2L40,2z" />
            <path fill="#fff" d="M37 20H43V60H37z" transform="rotate(-134.999 40 40)" />
            <path fill="#fff" d="M37 20H43V60H37z" transform="rotate(-45.001 40 40)" />
        </svg>');
    }
    if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
        exit("<h3>پست الکترونیک وارد شده صحیح نیست</h3>");
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
        echo '<div class="complete_div">
                <video autoplay loop muted playsinline width="100px" height="100px">
                    <source src="../icons/loginloeader.webm" type="video/webm">
                </video>
                <h2>درحال بازگشت به صفحه قبل</h2>
                <h2>کاربری شما با موفقیت ثبت گردید</h2>
            </div>';
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
</body>
</html>