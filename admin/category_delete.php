<?php require_once("../resources/config.php");  ?>


<?php

if (isset($_GET['delete'])){

    $sql = "DELETE FROM categories WHERE cate_id = ". escape_string($_GET['delete']) ." ";
    $result = query($sql);
    confirm($result);
    set_message("<button type='button' class='m-b-15 btn btn-lg btn-success text-center  btn-block' disabled> Đã xoá thể thoại thành công </button>");
    goback();

}else{
    goback();

}

