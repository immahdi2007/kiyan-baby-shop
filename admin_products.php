<?php
session_start();
if(!(isset($_SESSION["user"]) && $_SESSION["userType"] == "admin")){
    // echo $_SESSION['user']."  ".$_SESSION["userType"];
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <form name="add_products" action="actions/admin_prd_action.php" method="post" enctype="multipart/form-data">
                <div class="input_container_prd">
                    <label for="">نام کالا</label>
                    <input type="text" name="prd_name">
                </div>
                <div class="input_container_prd">
                    <label for="">موجودی کالا</label>
                    <input type="text" name="prd_stock">
                </div>
                <div class="input_container_prd">
                    <label for="">قیمت کالا</label>
                    <input type="text" name="prd_price">
                </div>
                <div class="input_container_prd">
                    <label for="">دسته بندی کالا</label>
                    <input type="text" name="prd_category"> 
                </div>
                <div class="input_container_prd">
                    <label for="">آپلود تصویر کالا</label>
                    <input type="file" name="prd_image">
                </div>
                <div class="input_container_prd">
                    <label for="">توضیحات تکمیلی</label>
                    <textarea  cols="45" rows="10" wrap="virtual" name="prd_detail"></textarea>
                </div>
                <div class="input_container_prd">
                    <input type="submit"  value="ذخیره">
                </div>
        </form>
    </div>
</body>
</html>