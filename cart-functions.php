<?php
require_once("resources/config.php");
if (isset($_GET['add'])) {
    $sql = "SELECT * FROM products JOIN categories ON product_category_id = cate_id WHERE product_id = " . escape_string($_GET['add']) . " ";
    $result = query($sql);
    confirm($result);
    while ($row = fetch_array($result)) {
        if ($row['product_stock'] != $_SESSION['product_' . $_GET['add']] && $row['product_stock'] >= $_GET['value'] ) {
            $_SESSION['product_' . $_GET['add']] += $_GET['value'];
            goback();
        } else {
            set_message("Xin lỗi, sản phẩm <span> <a style='color: #5fbd74' href='item.php?id={$row['product_id']}&loai={$row['product_category_id']}' > ".$row['product_title'] ."</a></span> này chúng tôi chỉ còn lại số lượng " . $row['product_stock'] . " ");
            goback();
        }
    }
}
if (isset($_GET['remove'])){
    $_SESSION['product_'. $_GET['remove']] --;
    if ($_SESSION['product_'.$_GET['remove']] < 1){
        goback();
    }else{
        goback();
    }
}
if (isset($_GET['delete'])){
    $_SESSION['product_'.$_GET['delete']] = '0';
    goback();
}


