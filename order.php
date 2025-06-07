<?php
ob_start();
include("include/connection.php");
include("include/header.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['delete_order_product'])){
        $prd_code_Delete = $_POST['delete_order_product'];
        if(isset($_SESSION['cart'][$prd_code_Delete])){
            unset($_SESSION['cart'][$prd_code_Delete]);
            $_SESSION["message_delete_cart"] = "محصول مورد نظر از سبد خرید حذف شد";
        }
        header("Location: order.php");
        exit();
    }

    if (isset($_POST['save_cart'])) {

        $amounts = $_POST['amounts'];

        foreach ($amounts as $prd_code => $new_amount) {
            $new_amount = intval($new_amount);
            if ($new_amount < 1) {
                $new_amount = 1;
            }
            if (isset($_SESSION['cart'][$prd_code])) {
                $_SESSION['cart'][$prd_code]['prd_amount'] = $new_amount;
            }
        }

        $_SESSION["message_save_cart"] = "سبد خرید با موفقیت به روزرسانی شد";
        header("Location: order.php");
        exit();
    }
}
$prd_code = 0;
if (isset($_SESSION["user_id"])) {
    // $prd_code = $_GET['id'];
} else {
    exit("<h1>لطفا ابتدا وارد سایت شوید</h1>");
}

if (isset($_GET['id'])) {
    $prd_code = $_GET['id'];

    $prd_amount = isset($_GET['prd_amount']) ? intval($_GET['prd_amount']) : 1;

    $query = "SELECT * FROM products WHERE prd_code = '$prd_code'";
    $result = mysqli_query($link, $query);
    if ($row = mysqli_fetch_array($result)) {
        $Product = [
            'prd_code' => $row['prd_code'],
            'prd_name' => $row['prd_name'],
            'prd_price' => $row['prd_price'],
            'prd_amount' => $prd_amount,
            'prd_image' => $row['prd_image'],
            'prd_stock' => $row['prd_stock']
        ];

        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        if (isset($_SESSION['cart'][$prd_code])) {
            $_SESSION['cart'][$prd_code]['prd_amount'] += $prd_amount;
        } else {
            $_SESSION['cart'][$prd_code] = $Product;
        }
        $_SESSION['message'] = "محصول با موفقیت در سبد خرید ذخیره شد";

        header("Location: order.php");
        exit();

    }
}
?>

<?php if (isset($_SESSION['message'])) {
    echo "<script>alert('{$_SESSION["message"]}')</script>";
    unset($_SESSION['message']);
} elseif (isset($_SESSION['message_save_cart'])) {
    echo "<script>alert('{$_SESSION["message_save_cart"]}')</script>";
    unset($_SESSION['message_save_cart']);
}elseif (isset($_SESSION['message_delete_cart'])) {
    echo "<script>alert('{$_SESSION["message_delete_cart"]}')</script>";
    unset($_SESSION['message_delete_cart']);
}
?>
<div class="order_detail__container">
    <div class="order_right__container">
        <form action="order.php" method="post">
            <button class="save_cart_btn" type="submit" name="save_cart">ذخیره تغییرات</button>
            <?php
            foreach ($_SESSION['cart'] as $item) {
                ?>
                <div class="prd_detail_img_container order" data-stock="<?= $item['prd_stock'] ?>">
                    <img src="img/products/<?= $item['prd_image'] ?>" alt="">
                    <h4 dir="rtl"><?= $item['prd_name'] ?></h4>
                    <span> قیمت کالا:
                        <span class="price_T prd_price"><?= $item['prd_price'] ?></span>
                    </span>
                    <label for="">:تعداد کالا</label>
                    <div class="product_amount">
                        <p class="plusNum">+</p>
                        <input class="prdStock" type="text" name="amounts[<?= $item['prd_code'] ?>]" id=""
                            value="<?= $item["prd_amount"] ?>">
                        <p class="MinusNum">-</p>
                    </div>
                    <div>
                        <span>مجموع قیمت:
                            <span class="price_T sumprice_prd"></span>
                        </span>
                    </div>
                    <button type="submit" name="delete_order_product" value="<?= $item['prd_code'] ?>"
                        class="delete_order_products">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                            <path
                                d="M8.71875 7.28125L7.28125 8.71875L14.5625 16L7.28125 23.28125L8.71875 24.71875L16 17.4375L23.28125 24.71875L24.71875 23.28125L17.4375 16L24.71875 8.71875L23.28125 7.28125L16 14.5625Z"
                                fill="#5B5B5B" />
                        </svg>
                    </button>
                </div>
            <?php } ?>
        </form>
    </div>

    <div class="order_addtocart__container">
        <div class="prd_att_addToCart">
            <form action="order.php" method="get">
                <div>
                    <input type="hidden" name="id" value="" id="">
                </div>
                <button href="" type="submit" class="product-add-to-cart_link detail">
                    <div class="product-add-to-cart">
                        <svg class="product-add-to-cart_svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30"
                            width="40" height="40">
                            <path class=""
                                d="M13 -0.01171875C12.15 -0.01171875 11.338484 0.35142188 10.771484 0.98242188L4.4550781 8L1 8C0.45 8 0 8.45 0 9L0 11C0 11.55 0.45 12 1 12L1.3300781 12L2.7207031 20.330078C2.8807031 21.290078 3.7194531 22 4.6894531 22L14.060547 22C14.300547 19.73 15.39 17.719297 17 16.279297L17 13C17 12.45 17.45 12 18 12C18.55 12 19 12.45 19 13L19 14.929688C20.21 14.329688 21.56 14 23 14C23.45 14 23.890312 14.029844 24.320312 14.089844L24.669922 12L25 12C25.55 12 26 11.55 26 11L26 9C26 8.45 25.55 8 25 8L21.544922 8L15.228516 0.98242188C14.661516 0.35242187 13.85 -0.01171875 13 -0.01171875 z M 13 1.9980469C13.275375 1.9980469 13.550188 2.1063125 13.742188 2.3203125L18.855469 8L7.1445312 8L12.257812 2.3203125C12.450312 2.1063125 12.724625 1.9980469 13 1.9980469 z M 8 12C8.55 12 9 12.45 9 13L9 18C9 18.55 8.55 19 8 19C7.45 19 7 18.55 7 18L7 13C7 12.45 7.45 12 8 12 z M 13 12C13.55 12 14 12.45 14 13L14 18C14 18.55 13.55 19 13 19C12.45 19 12 18.55 12 18L12 13C12 12.45 12.45 12 13 12 z M 23 16C21.51 16 20.13 16.459766 19 17.259766C18.39 17.679766 17.850156 18.200781 17.410156 18.800781C16.710156 19.720781 16.240078 20.81 16.080078 22C16.020078 22.32 16 22.66 16 23C16 26.87 19.13 30 23 30C26.87 30 30 26.87 30 23C30 19.47 27.390234 16.550078 23.990234 16.080078C23.670234 16.020078 23.34 16 23 16 z M 23 19C23.17 19 23.340469 19.040859 23.480469 19.130859C23.790469 19.290859 24 19.62 24 20L24 22L26 22C26.55 22 27 22.45 27 23C27 23.55 26.55 24 26 24L24 24L24 26C24 26.55 23.55 27 23 27C22.45 27 22 26.55 22 26L22 24L20 24C19.45 24 19 23.55 19 23C19 22.45 19.45 22 20 22L21.300781 22L22 22L22 21.869141L22 20C22 19.45 22.45 19 23 19 z"
                                fill="#FFCBCB" />
                        </svg>
                        <p>تکمیل خرید</p>
                    </div>
                </button>
            </form>
        </div>
    </div>
</div>
<?php
include("include/footer.php");
ob_end_flush();
?>