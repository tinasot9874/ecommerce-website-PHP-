<?php
require_once("resources/config.php");
include("resources/templates/frontend/header.php");
if ($_SESSION['count'] == 0 )
{
    redirect("index.php");
}
?>
<div id="main">
    <div class="section section-bg-10 pt-2 pb-2">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="page-title text-center">Thanh Toán</h2>

                </div>
            </div>
        </div>
    </div>
    <div class="section border-bottom pt-2 pb-2">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="breadcrumbs">
                        <li><a href="index.php">Trang chủ</a></li>
                        <li><a href="cart.php">Giỏ hàng</a></li>
                        <li>Thanh Toán</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="section section-checkout pt-7 pb-7">
        <div class="container">
            <form action="thankyou.php" method="post">
            <div class="row">
                <div class="col-md-6">
                    <h3 style="font-family: Roboto">Thông tin giao hàng </h3>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Tên<span class="required">*</span></label>
                                <div class="form-wrap">
                                    <input class="form-control" type="text" name="your-firstname" value="" size="40"
                                           required/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Họ <span class="required"></span></label>
                                <div class="form-wrap">
                                    <input class="form-control" type="text" name="your-lastname" value="" size="40"
                                           />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label>Địa chỉ giao hàng <span class="required">*</span></label>
                                <div class="form-wrap">
                                    <input class="form-control" type="text" name="your-address" value="" size="40"
                                           required/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label>Thành phố <span class="required">*</span></label>
                                <div class="form-wrap">
                                    <input class="form-control" type="text" name="your-city" value="" size="40"
                                           required/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Số điện thoại <span class="required">*</span></label>
                                <div class="form-wrap">
                                    <input class="form-control" type="text" name="your-phone" value="" size="40"
                                           required/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Email <span class="required">*</span></label>
                                <div class="form-wrap">
                                    <input class="form-control" type="email" name="your-email" value="" size="40"
                                           required/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label>Ghi chú:</label>
                                <div class="form-group">
                                    <textarea class="form-control" name="your-note" rows="5" cols="60" placeholder="Thông tin chi tiết hơn về địa chỉ giao hàng, thời gian,..."></textarea>
                                </div>
                            </div>
                        </div>

                    <p>Vui lòng điền thông tin chính xác để chúng tôi phục vụ bạn tốt nhất. Cảm ơn bạn</p>
                </div>
                <div class="col-md-6">
                    <h3 class="mt-3" style="font-family: Roboto">Đơn hàng của bạn</h3>
                    <div class="order-review">
                        <table class="checkout-review-order-table">
                            <thead>
                            <tr>
                                <th class="product-name">Sản phẩm</th>
                                <th>Giá</th>
                                <th class="text-center">Số lượng</th>
                                <th class="product-total text-center">Tổng</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php

                            $total = 0;
                            $item_dvt = 1;
                            $item_quantity = 0;
                            $item_name = 1;
                            $item_number =1;
                            $item_amount = 1;
                            $quantity = 1;
                            $code_day = date("Ymd");
                            $code_rand = mt_rand(1,99999999999);
                            $order_code = $code_day.$code_rand;
                            $id_product = array();
                            $qty_product_arr = array();
                            foreach ($_SESSION as $name => $value) {
                                if (substr($name, 0, 8) == "product_" && $value > 0) {
                                    $id = substr($name, 8);
                                    $sql = "SELECT * FROM products, categories, measures WHERE product_category_id = cate_id AND product_measure_id = measure_id AND product_id = " . escape_string($id) . " ";
                                    $result = query($sql);
                                    confirm($result);
                                    while ($row = fetch_array($result)):
                                        ?>
                                        <tr>
                                            <td class="product-name">
                                                <a name="product_name" style="color: #4cae4c;" href="item.php?ten=<?php echo $row['product_slug']; ?>&loai=<?php echo $row['slug']; ?>"><?php echo $row['product_title']; ?></a>&nbsp;

                                            </td>
                                            <td>
                                                <?php
                                                if ($row['product_sale'] > 0){
                                                    echo product_price($row['product_sale']);
                                                }else{
                                                    echo product_price($row['product_price']);
                                                }
                                                ?>
                                            </td>
                                            <td class="text-center">
                                                <strong class="product-quantity">× <?php echo $value; ?></strong>
                                            </td>
                                            <td class="product-total text-right">
                                                <?php if ($row['product_sale'] > 0) {
                                                    echo product_price($final_price = $row['product_sale'] * $value);
                                                } else {
                                                    echo product_price($final_price = $row['product_price'] * $value);
                                                } ?>
                                            </td>
                                        </tr>
                                    <?php
                                          array_push($id_product, "{$row['product_id']}");
                                          array_push($qty_product_arr, "{$value}");
                                        ?>

                                    <?php endwhile; ?>
                                    <?php

                                    $item_dvt++;
                                    $item_name++;
                                    $item_number++;
                                    $item_amount++;
                                    $quantity++;
                                }
                            }
                            ?>
                            </tbody>


                            <tfoot>
                            <tr>
                                <th>Phí giao hàng</th>
                                <td></td>
                                <td></td>
                                <td class="text-right">
                                    <ul id="shipping_method">
                                        <li>
                                            <?php if (isset($_SESSION['total_price'])) {
                                                if ($_SESSION['total_price'] > 500000) {
                                                    echo "Miễn phí";
                                                } else {
                                                    echo product_price(20000);
                                                }
                                            } ?>

                                        </li>
                                    </ul>
                                </td>
                            </tr>
                            <tr class="order-total">
                                <th>Tổng cộng</th>
                                <td></td>
                                <td></td>
                                <td class="text-right"><strong style="color: #4cae4c"><?php if (isset($_SESSION['final_price_ship']))
                                            echo product_price($_SESSION['final_price_ship']); ?></strong></td>
                            </tr>
                            <input type="hidden" name="total_price" value="<?php if (isset($_SESSION['final_price_ship']))
                                                                                 echo $_SESSION['final_price_ship'];
                                                                            ?>">
                            <input type="hidden" name="order_code" value="<?php echo $order_code; ?>">

                            <?php
                            $str_id_product = implode(",", $id_product);
                            $str_qty_product_arr = implode(",", $qty_product_arr);
                            ?>
                            <input type="hidden" name="order_product" value="<?php echo $str_id_product; ?>">
                            <input type="hidden" name="order_product_qty" value="<?php echo $str_qty_product_arr; ?>">
                            </tfoot>
                        </table>
                    </div>
                    <p>Hãy kiểm tra đơn hàng chính xác</p>
                    <div class="row">
                        <div class="col-md-6 text-left">
                            <a  class="organik-btn arrow " href="cart.php"> Quay lại giỏ hàng </a>
                        </div>
                        <div class="col-md-6 text-right">
                            <button type="submit" name="submit" class="organik-btn" href="thankyou.php"> Đặt hàng </button>
                        </div>
                    </div>


                </div>
            </div> 
            <div class="row">
                <div class="col-md-12">
                    <div class="checkout-payment">
                        <ul class="payment-method">
                            <li>
                                <input id="payment_method_cod" type="radio" class="input-radio" name="payment_method"
                                       value="cod" checked="checked" data-order_button_text="">
                                <span>COD</span>
                                <div class="payment-box">
                                    <p>Thanh toán bằng tiền mặt khi nhận hàng.</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
<?php
include("resources/templates/frontend/footer.php");
?>
