<?php
include("include/connection.php");
include("include/header.php");

$prd_code = 0;
if (isset($_GET['id'])) {
    $prd_code = $_GET['id'];
}
$query = "SELECT * FROM products WHERE prd_code ='$prd_code'";
$result = mysqli_query($link, $query);

if ($row = mysqli_fetch_array($result)) {
    ?>
    <div class="product_detail__container">
        <div class="prd_detail_img_container">
            <img src="img/products/<?= $row['prd_image'] ?>" alt="">
        </div>
        <div class="prd_detail_attributes_container">
            <nav>
                <a href="">خانه</a>
                <a href="">لباس</a>
            </nav>
            <div>
                <h1><?= $row['prd_name'] ?></h1>
                <!-- <label class="prd_size">سایز</label> -->
                <!-- <select name="" id="">
                    <option value="41">41</option>
                    <option value="42">42</option>
                    <option value="43">43</option>
                </select> -->
                <span>موجودی کالا: <?= $row['prd_stock'] ?></span>
                <br>
                <span>قیمت کالا: <?= $row['prd_price'] ?></span>
                <h4>جزئیات محصول</h4>
                <p dir="rtl"><?= $row['prd_detail'] ?></p>
            </div>
        </div>
    </div>
<?php

}


include("include/footer.php");
?>