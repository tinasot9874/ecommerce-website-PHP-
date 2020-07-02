<?php require_once("../resources/config.php");  ?>


<?php

if (isset($_GET['delete'])){
    $get_name = "SELECT slide_image FROM slide WHERE slide_id = ". escape_string($_GET['delete']) ." ";
    $result2 = query($get_name);
    confirm($result2);
    while ($row = fetch_array($result2)){
        $slide_image = $row['slide_image'];
    }
    $path = "../resources/uploads/slides/". $slide_image;
    unlink($path);

    $sql = "DELETE FROM slide WHERE slide_id = ". escape_string($_GET['delete']) ." ";
    $result = query($sql);
    confirm($result);
    goback();
}

