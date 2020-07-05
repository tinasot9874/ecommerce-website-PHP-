<?php
require_once ("resources/config.php");
$output = '';
if (isset($_GET['search'])){
    $search = escape_string($_GET['search']);
    $sql = "
            SELECT * FROM products 
            WHERE product_title LIKE '%". $search . "%' ";
    $result = query($sql);
    if (mysqli_num_rows($result) > 0){
        while ($row = mysqli_fetch_assoc($result)){
            $output .= "<li><a style='color: white;'  href='item.php?id=".$row['product_id']."&loai=".$row['product_category_id']."'>" .  $row['product_title'] . "</a></li>" ;
        }
    }
    echo $output;
}else{
    $output = '';
}



