<?php
// session_start();
include("include/header.php");
if (!(isset($_SESSION["user"]) && $_SESSION["userType"] == "admin")) {
    // echo $_SESSION['user']."  ".$_SESSION["userType"];
    header("Location: index.php");
}
?>
<div class="add_prd_adminPage_container">
    <form class="add_prd_adminPage" name="add_products" action="actions/admin_prd_action.php" method="post"
        enctype="multipart/form-data">
        <div class="input_container_prd">
            <label for="">نام کالا</label>
            <input class="input_product" type="text" name="prd_name">
        </div>
        <div class="input_container_prd">
            <label for="">موجودی کالا</label>
            <input class="input_product" type="text" name="prd_stock">
        </div>
        <div class="input_container_prd">
            <label for="">(تومان) قیمت کالا</label>
            <input class="input_product" type="text" name="prd_price">
        </div>
        <div class="input_container_prd">
            <label for="">دسته بندی کالا</label>
            <input class="input_product" type="text" name="prd_category">
        </div>
        <div class="input_container_prd">
            <label for="">آپلود تصویر کالا</label>
            <label class="input_product upload" for="prd_image">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 26 26">
                    <path
                        d="M12.96875 0.3125C12.425781 0.3125 11.882813 0.867188 10.78125 1.96875L4.21875 8.5625C3.011719 9.773438 3.414063 10 4.6875 10L8 10L8 18C8 19.65625 9.34375 21 11 21L15 21C16.65625 21 18 19.65625 18 18L18 10L21.25 10C22.660156 10 22.957031 9.773438 21.75 8.5625L15.15625 1.96875C14.054688 0.867188 13.511719 0.3125 12.96875 0.3125 Z M 0 19L0 23C0 24.65625 1.34375 26 3 26L23 26C24.65625 26 26 24.65625 26 23L26 19L24 19L24 23C24 23.550781 23.550781 24 23 24L3 24C2.449219 24 2 23.550781 2 23L2 19Z"
                        fill="#5B5B5B" />
                </svg>
            </label>
            <input id="prd_image" type="file" name="prd_image" style="display: none;">
        </div>
        <div class="input_container_prd">
            <label for="">توضیحات تکمیلی</label>
            <textarea class="input_product" style="resize: none" cols="45" rows="10" wrap="virtual"
                name="prd_detail"></textarea>
        </div>
        <div class="input_container_prd">
            <input class="login-click" type="submit" value="ذخیره">
        </div>
    </form>
</div>
<script>
    document.getElementById("prd_image").addEventListener("change", e => {
        const file_name = e.target.files[0]?.name ;
        const file_upload_llb = document.querySelector(".input_product.upload");
        if(file_name){
            file_upload_llb.innerHTML = file_name;
        } else {
            file_upload_llb.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 26 26">
                    <path
                        d="M12.96875 0.3125C12.425781 0.3125 11.882813 0.867188 10.78125 1.96875L4.21875 8.5625C3.011719 9.773438 3.414063 10 4.6875 10L8 10L8 18C8 19.65625 9.34375 21 11 21L15 21C16.65625 21 18 19.65625 18 18L18 10L21.25 10C22.660156 10 22.957031 9.773438 21.75 8.5625L15.15625 1.96875C14.054688 0.867188 13.511719 0.3125 12.96875 0.3125 Z M 0 19L0 23C0 24.65625 1.34375 26 3 26L23 26C24.65625 26 26 24.65625 26 23L26 19L24 19L24 23C24 23.550781 23.550781 24 23 24L3 24C2.449219 24 2 23.550781 2 23L2 19Z"
                        fill="#5B5B5B" />
                </svg>`;
        }
    });
</script>
<?php
include("include/footer.php");
?>