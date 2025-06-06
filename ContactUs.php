<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Style/contactus-style.css">
    <link rel="stylesheet" href="css/all.css">
</head>

<body>
    <form id="signup-form" class="form-signup form-container" action="actions/contactus_action.php" method="post">
        <div class="form-div">
            <a href="index.php" class="back-to-home">
                <i class="fa-solid fa-house"></i>
            </a>
            <div class="title">ارتباط با ما</div>
            <div class="inputs">
                <div class="input-group">
                    <input type="text" name="email" class="inp" id="s_email" autocomplete="new-email" required>
                    <label class="placeholder" for="plcpass">ایمیل</label>
                    <i class="fa-solid fa-envelope inp-icon"></i>
                </div>
                <div class="input-group">
                    <input type="username" name="realname" class="inp" id="l_nameF" autocomplete="off" required>
                    <label class="placeholder" for="plcpass">نام و نام خانوادگی</label>
                    <i class="fa-solid fa-circle-user inp-icon"></i>
                </div>
                <div class="input-group">
                    <textarea style="resize:none;" rows="4" cols="40" type="username" name="message" class="inp"
                        id="l_nameF" autocomplete="off" required></textarea>
                    <label class="placeholder" for="plcpass">پیام</label>
                    <i class="fa-solid fa-message inp-icon"></i>
                </div>
                <input class="login-click" type="submit" value="ارسال پیام" name="" id="signup_btn">
            </div>
        </div>
    </form>
</body>

</html>