<?php require_once("../resources/config.php");  ?>


<?php

if (isset($_GET['delete'])){

    $sql = "DELETE FROM orders WHERE order_id = ". escape_string($_GET['delete']) ." ";
    $result = query($sql);
    confirm($result);
    $sql2 = "DELETE FROM orderdetails WHERE order_detail_id = ". escape_string($_GET['delete']) ." ";
    $result2 = query($sql2);
    confirm($result2);
    set_message("<button type='button' class='m-b-15 btn btn-lg btn-success text-center  btn-block' disabled> Đơn hàng đã được xoá </button>");
    goback();

}else{
    goback();

}

