<?php
require_once("resources/config.php");
include("resources/templates/frontend/header.php");
?>

<?php
$sql = "SELECT * FROM orderdetails, orders, order_status WHERE order_code = order_detail_code AND order_status = order_status_id AND order_detail_code = " . escape_string($_GET['code']) . " AND order_email = '{$_SESSION['customer-trackorder']}'  ";
$result = query($sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = fetch_array($result)):?>
        <div class="page-wrapper">
            <div class="container">
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-12 pt-5">
                        <div class="card">
                            <div class="card-body">
                                <form action="" method="POST">
                                    <?php order_update(); ?>
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <h4 class="control-label">Mã hoá
                                                    đơn: <?php echo $row['order_detail_code']; ?></h4>
                                                <input type="hidden" name="order_code"
                                                       value="<?php echo $row['order_detail_code']; ?>">
                                                <input type="hidden" name="order_status"
                                                       value="4">
                                            </div>
                                            <?php if ($row['order_status'] == 1 || $row['order_status'] == 2 ){
                                                $output = '
                                                <div class="col-md-4 ">
                                                    <div class="form-group">
                                                        <label>Bạn muốn huỷ đơn đặt hàng?</label>
                                                        <button class="btn btn-danger" type="submit" name="submit">Huỷ đơn</button>
                                                    </div>
                                                </div>
                                                        ';
                                                echo $output;
                                            }else if ($row['order_status'] == 3) {
                                                $output = '
                                                <div class="col-md-4 ">
                                                    <div class="form-group">
                                                        <span class="btn btn-success">Đơn hàng đã thanh toán</span>
                                                    </div>
                                                </div>
                                                ';
                                                echo $output;
                                            }else{
                                                $output = '
                                                <div class="col-md-4 ">
                                                    <div class="form-group">
                                                        <span class="btn btn-danger">Đơn hàng đã huỷ</span>
                                                    </div>
                                                </div>
                                                ';
                                                echo $output;
                                            }
                                            ?>



                                        </div>

                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <table class="table table-bordered">
                                                    <tbody>
                                                    <tr>
                                                        <td class="td-title">Tên khách hàng:</td>
                                                        <td>
                                                            <a href="#"> <?php echo $row['order_detail_customer']; ?> </a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="td-title">Địa chỉ giao hàng:</td>
                                                        <td><a href="#"><?php echo $row['order_detail_address']; ?></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="td-title">Thành phố:</td>
                                                        <td><a href="#"><?php echo $row['order_detail_city']; ?></a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="td-title">Số điện thoại liên lạc:</td>
                                                        <td><a href="#"><?php echo $row['order_detail_phone']; ?></a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="td-title">Email:</td>
                                                        <td><a href="#"><?php echo $row['order_detail_email']; ?></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="td-title">Ngày đặt hàng:</td>
                                                        <td><a href="#"><?php echo $row['order_date']; ?></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="td-title">Ghi chú:</td>
                                                        <td><a href="#"><?php echo $row['order_detail_note']; ?></a>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>

                                            </div>
                                            <div class="col-md-6">

                                                <table class="table table-bordered">
                                                    <tr>
                                                        <td class="text-center">Tên sản phẩm</td>
                                                        <td class="text-center">Số lượng</td>
                                                        <td class="text-center">Giá</td>
                                                        <td class="text-center">Tổng</td>
                                                    </tr>
                                                    <?php
                                                    $product_array = explode(',', $row['order_detail_product']);
                                                    $item_qty_arr = explode(',', $row['order_detail_quantity']);
                                                    $leng_product_arr = count($product_array);
                                                    for ($i = 0; $i < $leng_product_arr; $i++) {
                                                        $sql2 = "SELECT * FROM products WHERE product_id = " . $product_array[$i] . " ";
                                                        $result2 = query($sql2);
                                                        confirm($result2);
                                                        while ($rows = fetch_array($result2)) {
                                                            echo "<tr>";
                                                            echo "<td>" . $rows['product_title'] . "</td>";
                                                            echo "<td class='text-center'>$item_qty_arr[$i]</td>";
                                                            if ($rows['product_sale'] > 0) {
                                                                echo "<td class='text-center'>" . product_price($rows['product_sale']) . "</td>";
                                                                echo "<td class='text-center'>" . product_price($rows['product_sale'] * $item_qty_arr[$i]) . "</td>";
                                                            } else {
                                                                echo "<td class='text-center'>" . product_price($rows['product_price']) . "</td>";
                                                                echo "<td class='text-center'>" . product_price($rows['product_price'] * $item_qty_arr[$i]) . "</td>";
                                                            }

                                                            echo "</tr>";
                                                        }
                                                    }
                                                    ?>

                                                </table>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="cart-totals"
                                                     style="display: block; background: #5fbd74; padding: 20px 40px 30px; color: #FFF;">
                                                    <table style="border: none; width: 100%;">
                                                        <tbody>
                                                        <tr class="shipping">
                                                            <th style="font-family: Roboto; font-weight: 600; ">Phí
                                                                Shipping
                                                            </th>
                                                            <td><?php if ($row['order_detail_total_price'] >= 500000) {
                                                                    echo "Miễn phí";
                                                                } else {
                                                                    echo "Đã tính vào tổng giá";
                                                                } ?></td>
                                                        </tr>
                                                        <tr class="order-total" style="border-bottom: none;">
                                                            <th style="font-family: Roboto; font-weight: 600;">Tổng giá
                                                                đơn hàng
                                                            </th>
                                                            <td>
                                                                <strong><?php echo product_price($row['order_detail_total_price']); ?> </strong>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <h5 class="text-center pt-5"><a href="../">Về trang chủ</a></h5>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Column -->
            </div>
        </div>
        </div>
    <?php endwhile; ?>



<?php
} else { redirect("../"); }
?>





<?php
include("resources/templates/frontend/footer.php");
?>

