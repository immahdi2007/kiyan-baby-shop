<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ورود</title>
    <link rel="stylesheet" href="./css/all.css">
    <link rel="stylesheet" href="./Style/login-style.css">
</head>

<body id="body">
    <div class="form-wraper">
        <form id="login-form" class="form-login form-container" action="actions/login_action.php" method="post">
            <div class="form-div">
                <a href="index.php" class="back-to-home">
                    <i class="fa-solid fa-house"></i>
                </a>
                <div class="title">ورود</div>
                <div class="inputs">
                    <div class="input-group">
                        <input type="text" name="email" class="inp" id="l_email" required
                            <?php if(isset($_SESSION['error']) && $_SESSION['error'] === "passwordError"){
                                echo "value={$_SESSION['email']}";
                            }
                            ?>
                        >
                        <label class="placeholder" for="plcuser">شماره تلفن ،ایمیل</label>
                        <i class="fa-solid fa-envelope inp-icon"></i>
                    </div>
                    <div class="input-group">
                        <input type="password" name="password" class="inp" id="l_pass" required>
                        <label class="placeholder" for="plcpass">رمز عبور</label>
                        <i class="fa-solid fa-key inp-icon"></i>
                    </div>
                    <input class="login-click" type="submit" value="ورود" name="" id="login_btn">
                    <div class="Links">
                        <button type="button" id="toggle-to-signup" class="btn-toggle">ثبت نام</button>
                        <p>یا</p>
                        <a class="btn-toggle" href="#">رمز را فراموش کردم</a>
                    </div>
                </div>
            </div>
        </form>

        <form id="signup-form" class="form-signup form-container" action="actions/signup_action.php" method="post">
            <div class="form-div">
                <a href="index.php" class="back-to-home">
                    <i class="fa-solid fa-house"></i>
                </a>
                <div class="title">ثبت نام</div>
                <div class="inputs">
                    <div class="input-group">
                        <input type="text" name="email" class="inp" id="s_email" autocomplete="new-email" required>
                        <label class="placeholder" for="plcpass">شماره تفلن، ایمیل</label>
                        <i class="fa-solid fa-envelope inp-icon"></i>
                    </div>
                    <div class="input-group">
                        <input type="username" name="realname" class="inp" id="l_nameF" autocomplete="off" required>
                        <label class="placeholder" for="plcpass">نام و نام خانوادگی</label>
                        <i class="fa-solid fa-circle-user inp-icon"></i>
                    </div>
                    <div class="input-group">
                        <input type="password" name="password" class="inp" id="s_pass" autocomplete="new-pass" readonly onfocus="this.removeAttribute('readonly');" required>
                        <label class="placeholder" for="plcpass">رمز عبور</label>
                        <i class="fa-solid fa-key inp-icon"></i>
                    </div>
                    <div class="input-group">
                        <input type="password" name="retypepass" class="inp" id="s_repass" autocomplete="new-pp" required>
                        <label class="placeholder" for="plcpass">تایید رمز عبور</label>
                        <i class="fa-solid fa-key inp-icon"></i>
                    </div>
                    <input class="login-click" type="submit" value="ثبت نام" name="" id="signup_btn">

                    <div class="Links">
                        <button type="button" id="toggle-to-login" class="btn-toggle">ورود</button>
                        <p>از قبل حساب داشتید؟</p>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script>
        const email_err = document.getElementById('s_email');
        const pass_err = document.getElementById('s_pass');
        const repass_err = document.getElementById('s_repass');
        const emailNotFound = document.getElementById('l_email');
        const passNotFound = document.getElementById('l_pass');
    </script>
    <?php
    // session_start();
    // echo $_SESSION['mahdi'];
    // echo $_SESSION['error'];
    if (isset($_SESSION['error']) && $_SESSION['error'] ===  'email_duplicate') {
        echo "
    <script>
    document.addEventListener('DOMContentLoaded',function(){
        document.getElementById('toggle-to-signup').click();
        const divError = document.createElement('div');
        divError.innerText = 'ایمیل وارد شده قبلا ثبت شده است';
        divError.classList.add('err__dupemail');
        email_err.classList.add('email_error');
        const signup_btn = document.getElementById('signup_btn');
        signup_btn.insertAdjacentElement('beforebegin', divError);
    })
    </script>";
        unset($_SESSION['error']);
    }
    if (isset($_SESSION['error']) && $_SESSION['error'] === 'pass_err') {
        echo "
    <script>
    document.addEventListener('DOMContentLoaded',function addErrorPass(){
        document.getElementById('toggle-to-signup').click();
        const divError = document.createElement('div');
        divError.innerText = 'رمز عبور و تکرار آن مشابه نیست';
        divError.classList.add('err__dupemail');
        pass_err.classList.add('email_error');
        repass_err.classList.add('email_error');
        const signup_btn = document.getElementById('signup_btn');
        signup_btn.insertAdjacentElement('beforebegin', divError);
    })
    </script>";
        unset($_SESSION['error']);
    }
    if (isset($_SESSION['error']) && $_SESSION['error'] === 'usernotfound') {
        echo "
    <script>
        document.addEventListener('DOMContentLoaded', function(){
        const divError = document.createElement('div');
        divError.innerText='ایمیل وارد شده صحیح نمی باشد';
        divError.classList.add('err__dupemail');
        document.body.appendChild(divError);
        const login_btn = document.getElementById('login_btn');
        login_btn.insertAdjacentElement('beforebegin', divError);
        emailNotFound.classList.add('email_error');
    });
    </script>";
        unset($_SESSION['error']);
    }
    
    if (isset($_SESSION['error']) && $_SESSION['error'] === 'passwordError') {
        echo "
    <script>
        document.addEventListener('DOMContentLoaded', function(){
        const divError = document.createElement('div');
        divError.innerText='پسورد شما صحیح نمی باشد';
        divError.classList.add('err__dupemail');
        document.body.appendChild(divError);
        const login_btn = document.getElementById('login_btn');
        login_btn.insertAdjacentElement('beforebegin', divError);
        passNotFound.classList.add('email_error');
    });
    </script>";
        unset($_SESSION['error']);
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/swalidjs@latest/dist/bundle.js"></script>
    <script>
        //for success password
        const pass = document.querySelector('#s_pass');
        const rePass = document.querySelector('#s_repass');
        const l_login = document.querySelector('.l_email');

        function checkpass_repass(event) {
            const divError2 = document.querySelector('.err__dupemail2');
            const signup_btn = document.getElementById('signup_btn');
            const pass_err = document.getElementById('s_pass');
            const repass_err = document.getElementById('s_repass');
            if (pass.value !== rePass.value) {
                if(!divError2){
                const divError2 = document.createElement('div')
                    divError2.innerText = 'رمز عبور و تکرار آن مشابه نیست';
                    divError2.classList.add('err__dupemail2');
                    signup_btn.insertAdjacentElement('beforebegin', divError2);
                } else {
                    divError2.style.display = "block";
                }
                    pass_err.classList.add('email_error2');
                    repass_err.classList.add('email_error2');
            } else {
                divError2.style.display = "none";
                pass_err.classList.remove('email_error2');
                repass_err.classList.remove('email_error2');
            }
        }   
        rePass.addEventListener('input', checkpass_repass);
        pass.addEventListener('input' , function(){
            if(pass.value.length >= 3 && rePass.value.length >= 7){
                checkpass_repass();
            }
        })
        
        const l_emailcheck = new Swalid("#l_email", {
            required: true,
            minLength: 5,
            maxLength: 65,
            emailValidation: true,
            onValidationError: (input) => {
                emailNotFound.classList.add('email_error');
            },
            onValidationSuccess: (input) => {
                input.classList.remove('email_error');
                console.log("email: success");
                const divError = document.querySelector('.err__dupemail');
                if (divError) {
                    divError.style.display = "none";
                }
            }
        });

        const l_passCheck = new Swalid("#l_pass", {
            required: true,
            minLength: 8,
            maxLength: 15,
            swalTimer: 10000,
            swalIconMinLength: "error",
            swalIconMaxLength: "error",
            swalTextMinLength: "رمز عبور باید حداقل 8 حرف باشد",
            swalTextMaxLength: "رمز عبور باید حداکثر 15 حرف باشد",
            onValidationError: (input) => {
                passNotFound.classList.add('email_error');
            },
            onValidationSuccess: (input) => {
                input.classList.remove('email_error');
                console.log("password: success");
                
                const divError = document.querySelector('.err__dupemail')
                if (divError) {
                    divError.style.display = "none";
                }
            }
        });

        const s_email = new Swalid("#s_email", {
            required: true,
            minLength: 5,
            maxLength: 65,
            emailValidation: true,
            onValidationError: (input) => {
                const email_err = document.getElementById('s_email');
                email_err.classList.add('email_error');
            },
            onValidationSuccess: (input) => {
                input.classList.remove('email_error');
                const divError = document.querySelector('.err__dupemail')
                if (divError) {
                    divError.style.display = "none";
                }
            }
        });
        const s_pass = new Swalid("#s_pass", {
            required: true,
            minLength: 8,
            maxLength: 15,
            swalTimer: 10000,
            swalIconMinLength: "error",
            swalIconMaxLength: "error",
            swalTextMinLength: "رمز عبور باید حداقل 8 حرف باشد",
            swalTextMaxLength: "رمز عبور باید حداکثر 15 حرف باشد",
            onValidationError: (input) => {
                const pass_err = document.getElementById('s_pass');
                pass_err.classList.add('email_error');
            },
            onValidationSuccess: (input) => {
                const repass_err = document.getElementById('s_repass');
                rePass.addEventListener('input', checkpass_repass);
                input.classList.remove('email_error');
                const divError = document.querySelector('.err__dupemail')
                if (divError) {
                    divError.style.display = "none";
                }
            }
        });
        const s_repass = new Swalid("#s_repass", {
            required: true,
            minLength: 8,
            maxLength: 15,
            swalTimer: 10000,
            swalIconMinLength: "error",
            swalIconMaxLength: "error",
            swalTextMinLength: "رمز عبور باید حداقل 8 حرف باشد",
            swalTextMaxLength: "رمز عبور باید حداکثر 15 حرف باشد",
            onValidationError: (input) => {
                const repass_err = document.getElementById('s_repass');
                repass_err.classList.add('email_error');
            },
            onValidationSuccess: (input) => {
                input.classList.remove('email_error');
                const divError = document.querySelector('.err__dupemail')
                if (divError) {
                    divError.style.display = "none";
                }
            }
        });
        
        const loginForm = document.getElementById('login-form');
        const signupForm = document.getElementById('signup-form');
        const toggleToSignup = document.getElementById('toggle-to-signup');
        const toggleToLogin = document.getElementById('toggle-to-login');
        const bodyalignitem = document.getElementById('body');
        toggleToSignup.addEventListener('click', () => {
            loginForm.classList.add('flip');
            signupForm.classList.add('flip');
            bodyalignitem.classList.add('remove-align');
        });

        toggleToLogin.addEventListener('click', () => {
            loginForm.classList.remove('flip');
            signupForm.classList.remove('flip');
            bodyalignitem.classList.remove('remove-align');

        });
    </script>
</body>

</html>