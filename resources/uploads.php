<?php
require_once("config.php");
require_once ("ResizeImage.php");


// UPLOAD PRODUCT
if (isset($_POST['submit'])) {
    $product_title = escape_string($_POST['product_title']);
    $product_category_id = escape_string($_POST['product_category_id']);
    $product_price = escape_string($_POST['product_price']);
    $product_stock = escape_string($_POST['product_stock']);
    $product_code  = escape_string($_POST['product_code']);
    $product_slug  = escape_string($_POST['product_slug']);
    if (isset($_POST['product_status'])) {
        $product_status = escape_string($_POST['product_status']);
    } else {
        $product_status = 0;
    }
    $product_sale = escape_string($_POST['product_sale']);
    $product_description = escape_string($_POST['product_description']);

//    $image_temp_location = escape_string($_FILES['product_image']['tmp_name']);
//    move_uploaded_file($image_temp_location, $target_dir . $product_image);

    $uploads_dir = 'uploads';
    $tmp_name = $_FILES["product_image"]["tmp_name"];

    // basename() may prevent filesystem traversal attacks;
    // further validation/sanitation of the filename may be appropriate

    // get name type image
    $file_extension_arr = explode('.',basename($_FILES["product_image"]["name"]));
    $file_extension_string = strtolower($file_extension_arr[count($file_extension_arr)-1]);


    $name = $_POST['image-slug'].".".$file_extension_string;
    $product_image = $name;

    // original image path
    $target_path = $uploads_dir.DS.$name;
    $target_path_string = strval($target_path);

    // thumb image path
    $target_thumbs_path = $uploads_dir.DS."thumbs".DS.$name;
    $target_thumbs_path_string = strval($target_thumbs_path);

    if (move_uploaded_file($tmp_name, $target_path)){

        // resize image products
        $resize = new ResizeImage($target_path_string);
        $resize->resizeTo(300, 300, 'exact');
        $resize->saveImage($target_path_string, 70);


        // move resize image to thumbnail dir
        $resize_thumbs = new ResizeImage($target_path_string);
        $resize_thumbs->resizeTo(180, 180, 'exact');
        $resize_thumbs->saveImage($target_thumbs_path_string, 70);

    }else{
        die("Không thể upload hình ảnh sản phẩm, liên hệ admin");
    }


    $sql = "INSERT INTO products(product_title, product_slug,product_code,product_category_id,product_price,product_stock ,product_status,product_sale,product_description, product_image) VALUES('{$product_title}','{$product_slug}','{$product_code}','{$product_category_id}','{$product_price}','{$product_stock }','{$product_status}','{$product_sale}','{$product_description}','{$product_image}') ";
    $result = query($sql);
    confirm($result);
    set_message("<button type='button' class='m-b-15 btn btn-lg btn-success text-center  btn-block' disabled> Đã thêm sản phẩm mới </button>");
    redirect("../admin/index.php?products");

}


// UPDATE PRODUCT
if (isset($_POST['update'])) {
    $product_id     = escape_string($_POST['product_id']);
    $product_title = escape_string($_POST['product_title']);
    $product_category_id = escape_string($_POST['product_category_id']);
    $product_price = escape_string($_POST['product_price']);
    $product_stock = escape_string($_POST['product_stock']);
    $product_code = escape_string($_POST['product_code']);
    $product_slug  = escape_string($_POST['product_slug']);
    if (isset($_POST['product_status'])) {
        $product_status = escape_string($_POST['product_status']);
    } else {
        $product_status = 0;
    }
    $product_sale = escape_string($_POST['product_sale']);
    $product_description = escape_string($_POST['product_description']);


    $uploads_dir = 'uploads';
    $tmp_name = $_FILES["product_image"]["tmp_name"];

    // basename() may prevent filesystem traversal attacks;
    // further validation/sanitation of the filename may be appropriate
    // get name type image
    $file_extension_arr = explode('.',basename($_FILES["product_image"]["name"]));
    $file_extension_string = strtolower($file_extension_arr[count($file_extension_arr)-1]);


    $name = $_POST['image-slug'].".".$file_extension_string;
    $product_image = $name;

    // original image path
    $target_path = $uploads_dir.DS.$name;
    $target_path_string = strval($target_path);

    // thumb image path
    $target_thumbs_path = $uploads_dir.DS."thumbs".DS.$name;
    $target_thumbs_path_string = strval($target_thumbs_path);

    if (!empty($product_image)){
        $get_pic = query("SELECT product_image FROM products WHERE product_id = '{$product_id}' ");
        confirm($get_pic);
        while ($pic = fetch_array($get_pic)){
            $product_image = $pic['product_image'];
        }
    }else if (move_uploaded_file($tmp_name, $target_path)){

        //  resize image
        $resize = new ResizeImage($target_path_string);
        $resize->resizeTo(300, 300, 'exact');
        $resize->saveImage($target_path_string, 70);

        // move resize image to thumbnail dir
        $resize_thumbs = new ResizeImage($target_path_string);
        $resize_thumbs->resizeTo(180, 180, 'exact');
        $resize_thumbs->saveImage($target_thumbs_path_string, 70);

    }else{
        die("Không thể upload hình ảnh sản phẩm, liên hệ admin");
    }
    


    $sql = "UPDATE products SET product_title = '{$product_title}', product_slug = '{$product_slug}', product_category_id = '{$product_category_id}', product_code = '{$product_code}', product_price = '{$product_price}', product_stock = '{$product_stock}', product_status = '{$product_status}', product_sale = '{$product_sale}', product_description = '{$product_description}', product_image = '{$product_image}' WHERE product_id = '{$product_id}' ";
    $result = query($sql);
    confirm($result);
    set_message("<button type='button' class='m-b-15 btn btn-lg btn-success text-center  btn-block' disabled> Đã sửa sản phẩm thành công </button>");
    redirect("../admin/index.php?products");
}

// UPLOAD SLIDE
if (isset($_POST['submit_slide'])){
    $slide_image = escape_string($_FILES['slide_image']['name']);
//    $image_temp_location = escape_string($_FILES['product_image']['tmp_name']);
//    move_uploaded_file($image_temp_location, $target_dir . $product_image);
    $uploads_dir = 'uploads/slides/';
    $tmp_name = $_FILES["slide_image"]["tmp_name"];
    // basename() may prevent filesystem traversal attacks;
    // further validation/sanitation of the filename may be appropriate
    $name = basename($_FILES["slide_image"]["name"]);

    $target_path = $uploads_dir.DS.$name;
    $target_path_string = strval($target_path);
    if (move_uploaded_file($tmp_name, $target_path)){
        // move resize image to thumbnail dir
        $resize = new ResizeImage($target_path_string);
        $resize->resizeTo(1280 , 700, 'maxwidth');
        $resize->saveImage($target_path_string, 50);
    }else{
        die("Không thể upload hình ảnh slide, liên hệ admin");
    }

    $sql = "INSERT INTO slide(slide_image) VALUES('{$slide_image}')";
    $result = query($sql);
    confirm($result);
    redirect("../admin/index.php?slide");
}
?>
