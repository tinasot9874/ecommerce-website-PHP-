<?php
require_once("resources/config.php");
include("resources/templates/frontend/header.php");
global $conn;
if (isset($_POST['submit'])){
    $first_name             = test_input($_POST['your-firstname']);
    $last_name              = test_input($_POST['your-lastname']);
    $address                = test_input($_POST['your-address']);
    $city                   = test_input($_POST['your-city']);
    $phone                  = test_input($_POST['your-phone']);
    $email                  = test_input($_POST['your-email']);
    $note                   = test_input($_POST['your-note']);
    $product                = test_input($_POST['order_product']);
    $qty_product            = test_input($_POST['order_product_qty']);
    $order_code             = test_input($_POST['order_code']);
    $order_total_price      = test_input($_POST['total_price']);

    $customer               = $first_name. " " .$last_name;

    $sql = "INSERT INTO orders (order_customer, order_code, order_price) VALUES ('{$customer}', '{$order_code}', '{$order_total_price}') ";
    $return = query($sql);
    confirm($return);


    $sql2 = "INSERT INTO orderdetails (order_detail_code, order_detail_customer , order_detail_address, order_detail_city, order_detail_phone, order_detail_email, order_detail_note, order_detail_product, order_detail_quantity, order_detail_total_price) VALUES ('{$order_code}', '{$customer}', '{$address}', '{$city}', '{$phone}', '{$email}', '{$note}', '{$product}','{$qty_product}','{$order_total_price}')";
    $return2 = query($sql2);
    confirm($return2);
    session_destroy();
}else{
    redirect("../");
}
?>
<div id="main">
    <div class="section section-bg-10 pt-3 pb-17">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title text-center" style="font-family: Roboto; color: #0b0b0b;">Cảm ơn bạn đã đặt hàng.</h3>
<!--                    <h6 class="text-center pt-10" style="font-weight: normal; font-size: 2rem;">Xem đơn hàng click vào <a style="color: #3c763d" href="trackorder.php">đây</a> </h6>-->
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 pt-10" style="font-family: Roboto; text-align: center" >
                    <a class="organik-btn" href="../">Quay lại trang chủ</a>
                </div>
            </div>
        </div>
    </div>

</div>

<?php
include("resources/templates/frontend/footer.php");
?>
