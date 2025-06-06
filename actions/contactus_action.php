    <?php
    if (
        isset($_POST['email']) && !empty($_POST['email']) &&
        isset($_POST['realname']) && !empty($_POST['realname']) &&
        isset($_POST['message']) && !empty($_POST['message'])
    ) {
        $email = $_POST['email'];
        $realname = $_POST['realname'];
        $message = $_POST['message'];
    } else {
        ?>
        <script>
            setTimeout(() => {
                location.replace("index.php");
            }, 1000);
        </script>
        <?php
        exit("برخی از فیلد ها پر نشده");
    }
    if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
        ?><script>alert("ایمیل وارد شده صحیح نیست")
        location.replace("../ContactUs.php")</script><?php
        exit("<h3>پست الکترونیک وارد شده صحیح نیست</h3>");
    }
    include("../include/connection.php");

    $query = "INSERT INTO `contactus` (`id`, `email`, `name`, `message`) VALUES (NULL, '$email', '$realname', '$message');";
    if(mysqli_query($link , $query)){
        ?> <script>alert("پیام با موفقیت ارسال شد");
        location.replace("../index.php")</script> <?php
    }

    ?>