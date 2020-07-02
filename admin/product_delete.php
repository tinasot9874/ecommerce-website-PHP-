<?php require_once("../resources/config.php");  ?>


<?php

if (isset($_GET['delete'])){
    $get_name = "SELECT product_image FROM products WHERE product_id = ". escape_string($_GET['delete']) ." ";
    $result2 = query($get_name);
    confirm($result2);
    while ($row = fetch_array($result2)){
        $product_image = $row['product_image'];
    }
    // delete image
    $path = "../resources/uploads/". $product_image;            // original image path
    $path_thumbs = "../resources/uploads/thumbs/". $product_image;     // thumb image path
    unlink($path);
    unlink($path_thumbs);


    $sql = "DELETE FROM products WHERE product_id = ". escape_string($_GET['delete']) ." ";
    $result = query($sql);
    confirm($result);

    set_message("<button type='button' class='m-b-15 btn btn-lg btn-success text-center  btn-block' disabled> Đã xoá sản phẩm </button>");
    goback();

}else{
    goback();

}