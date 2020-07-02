<?php

/** helper function **/

function redirect($location)
{
    header("Location: $location");
}
function goback()
{
    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit;
}

function query($sql)
{
    global $conn;
    return mysqli_query($conn, $sql);
}

function confirm($result)
{
    global $conn;
    if (!$result) {
        die("Truy vấn thất bại : " . mysqli_error($conn));
    }
}

function escape_string($string)
{
    global $conn;
    return mysqli_real_escape_string($conn, $string);
}
// check input
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function fetch_array($result)
{
    return mysqli_fetch_array($result);
}

function set_message($msg)
{
    if (!empty($msg)) {
        $_SESSION['message'] = $msg;
    } else {
        $msg = "";
    }
}

function display_message()
{
    if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
}

/*** function convert currency money****/
function product_price($priceFloat) {
    $symbol = 'VND';
    $symbol_thousand = ',';
    $decimal_place = 0;
    $price = number_format($priceFloat, $decimal_place, '', $symbol_thousand);
    return $price." ".$symbol;
}

/****************** FRONT-END FUNCTIONS ********************/
/***************Function Contact.php *******************/
function send_message()
{
    if (isset($_POST['submit-contact'])) {
        $to = "minhieu9874@gmail.com";
        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = "-----------FROM VISITER--------- \n\n";
        $message .= "Name: {$name}\n";
        $message .= "Email: {$email}\n";
        $message .= "Messages: {$_POST['message']}";
        $result = mail($to, $subject, $message);
        if ($result == true) {
            set_message("Your Message has been sent");
        } else {
            set_message("Sorry you coult not send mail! Try contact by our phone number!");
        }
    }
}




/****************** BACK-END FUNCTIONS ********************/

/***************Function Login.php *******************/
function login_user(){
    if (isset($_POST['submit'])){
        $username = escape_string($_POST['username']);
        $password = escape_string($_POST['password']);

        $sql = "SELECT * FROM users WHERE username = '{$username}' AND password = '{$password}' ";
        $return = query($sql);
        confirm($return);
        if (mysqli_num_rows($return) == 0 ){

            redirect("login.php");
            set_message("Tài khoản hoặc mật khẩu bị sai!");

        }else{
            $_SESSION['admin'] = $username;
            redirect("../admin");
        }
    }
}


/***************Function categories add *******************/
function cate_add(){
    if (isset($_POST['submit'])){

        $cate_title = escape_string($_POST['cate_title']);
        $cate_slug  = escape_string($_POST['cate_slug']);


        $sql = "INSERT INTO categories(cate_title, slug) VALUES ('{$cate_title}','{$cate_slug}')";
        $result = query($sql);
        confirm($result);
        set_message("<button type='button' class='m-b-15 btn btn-lg btn-success text-center  btn-block' disabled> Đã thêm thể loại mới </button>");
        display_message();
    }
}
/***************Function categories update *******************/
function cate_update(){
    if (isset($_POST['submit'])){
        $cate_id    = escape_string($_POST['cate_id']);
        $cate_title = escape_string($_POST['cate_title']);
        $cate_slug  = escape_string($_POST['cate_slug']);

        $sqls = "UPDATE categories SET cate_title = '{$cate_title}', slug = '{$cate_slug}' WHERE cate_id = '{$cate_id}'  ";
        $results = query($sqls);
        var_dump(confirm($results));
        goback();
        set_message("<button type='button' class='m-b-15 btn btn-lg btn-success text-center  btn-block' disabled> Cập nhật thể loại thành công </button>");
        display_message();

    }
}

/***************Function order_status update *******************/

function order_update(){
    if (isset($_POST['submit'])){
        $order_status = $_POST['order_status'];

        $sqls = "UPDATE orders SET order_status = '{$order_status}' WHERE order_code = ". escape_string($_POST['order_code'])."  ";
        $results = query($sqls);
        confirm($results);
        set_message("<button type='button' class='m-b-15 btn btn-lg btn-success text-center  btn-block' disabled> Cập nhật trạng thái hoá đơn thành công </button>");
        display_message();

    }
}

/***************Function Slide *******************/

function get_active(){

}


