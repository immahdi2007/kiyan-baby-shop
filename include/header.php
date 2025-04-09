<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Style/index-style.css">
    <link rel="stylesheet" href="./css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <?php if (isset($page) && $page === "about"): ?>    
            <link rel="stylesheet" href="./Style/aboutus.css">
            <?php endif; ?>
            <link rel="shortcut icon" href="favicon.ico" type="../img">
    <title>kids clothes</title>
</head>
<body>
    <div class="bg-color-header"></div>
    
    <header>
        <div class="left-menu header-item">
            <nav>
                <?php
                if(isset($_SESSION['user'])){          
                echo  '<a class="left-link" href="./userInformation.php" >'.$_SESSION['user']."</a>"; 
                } else { ?>
                <a class="left-link" href="./login.php" >ورود یا ثبت نام</a>
                <?php 
                    } ?>
            </nav>
            <div class="search-box-div">
                <i class="fa-solid fa-magnifying-glass srch_i"></i>
                <input class="input-field" type="text" name="" id="home_search" required placeholder="جستجو">
            </div>
        </div>
        <h1 class="title header-item">پوشاک کیان</h1>
        <div class="right-menu header-item">
            <nav>
                <a id="home" href="index.php">صفحه اصلی</a>
                <a class="Product__categories" href="#">دسته بندی محصولات</a>
            </nav>   
            <a href="#" class="buy-cart">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 128 128" width="36" height="36">
                <path class="buy-cart-pic" d="M95.2 65l-54.6 8c-1.6.2-2.8 1.8-2.5 3.4.2 1.5 1.5 2.6 3 2.6.1 0 .3 0 .4 0l54.6-8c9.4-1.4 16.8-8.2 19-17.4l6.9-28.8c.2-.9 0-1.8-.6-2.6-.6-.7-1.4-1.1-2.4-1.1H21.5C18.8 8.7 11.3 2 11 1.7 9.7.7 7.8.8 6.8 2 5.7 3.3 5.8 5.2 7 6.2c.1.1 7.2 6.5 9 18.2l8.7 57.5c1 6.4 6.4 11.1 12.9 11.1H97c1.7 0 3-1.3 3-3s-1.3-3-3-3H37.6c-3.5 0-6.4-2.5-6.9-6l-8.2-54h92.7l-6 25.1C107.6 58.9 102.1 64 95.2 65zM31 114c0 7.2 5.8 13 13 13s13-5.8 13-13-5.8-13-13-13S31 106.8 31 114zM51 114c0 3.9-3.1 7-7 7s-7-3.1-7-7 3.1-7 7-7S51 110.1 51 114zM87 101c-7.2 0-13 5.8-13 13s5.8 13 13 13 13-5.8 13-13S94.2 101 87 101zM87 121c-3.9 0-7-3.1-7-7s3.1-7 7-7 7 3.1 7 7S90.9 121 87 121z" fill="#FFCBCB" />
            </svg>
            </a>
        </div>
    </header>
    <script>
const inputField = document.querySelector('.input-field');
const srchi = document.querySelector('.srch_i');
inputField.addEventListener('input' , function(){
    if(inputField.validity.valid){
        srchi.classList.add('valid');      
    }else{
        srchi.classList.remove('valid');
    }
})
    </script>