<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ثبت نام</title>
    <link rel="stylesheet" href="./css/all.css">
    <link rel="stylesheet" href="./Style/signup_style.css">
</head>
<body>
    <form action="actions/signup_action.php" method="post">
    <div class="login-div">
        <a href="Index.php" class="back-to-home">
            <i class="fa-solid fa-house"></i>
        </a>
        <div class="title">ثبت نام</div>
        <div class="inputs">
        <div class="input-group">
                <input type="text" name="email" class="inp" id="plcpass" autocomplete="new-email" required>
                <label class="placeholder" for="plcpass">شماره تفلن، ایمیل</label>
                <i class="fa-solid fa-envelope inp-icon"></i>
            </div>
            <div class="input-group">
                <input type="username" name="realname" class="inp" id="plcpass" autocomplete="off" required>
                <label class="placeholder" for="plcpass">نام و نام خانوادگی</label>
                <i class="fa-solid fa-circle-user inp-icon" ></i>
            </div>
            <div class="input-group">
                <input type="username" name="username" class="inp" id="plcpass" autocomplete="new-password" readonly onfocus="this.removeAttribute('readonly');" required >
                <label class="placeholder" for="plcpass">نام کاربری</label>
                <i class="fa-solid fa-at inp-icon"></i>
            </div>
            <div class="input-group">
                <input type="password" name="password" class="inp" id="plcpass" autocomplete="new-pass" readonly onfocus="this.removeAttribute('readonly');" required>
                <label class="placeholder" for="plcpass">رمز عبور</label>
                <i class="fa-solid fa-key inp-icon" ></i>
            </div>
            <div class="input-group">
                <input type="password" name="retypepass" class="inp" id="plcpass" autocomplete="new-pp" required>
                <label class="placeholder" for="plcpass">تایید رمز عبور</label>
                <i class="fa-solid fa-key inp-icon" ></i>
            </div>
            <button class="login-click">ثبت نام</button>

            <div class="Links"> 
            <a href="login.php">ورود </a><p>از قبل حساب داشتید؟</p>
            </div>
        </div>
    </div>
    </form>
</body>
</html>