<?php
require_once("resources/config.php");
include("resources/templates/frontend/header.php");
include("cart-functions.php");
?>
<div id="main">
    <div class="section border-bottom pt-2 pb-2">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="breadcrumbs">
                        <li><a href="../">Trang chủ</a></li>
                        <li>Giỏ hàng</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <h4 class="text-center bg-warning"><?php echo display_message() ?></h4>
    <div class="section pt-7 pb-7">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <table class="table shop-cart">
                        <tbody>
                        <tr>
                            <th></th>
                            <th>Tên sản phẩm</th>
                            <th style="text-align: center;">Số lượng</th>
                            <th></th>
                            <th class="text-center">Giá</th>
                            <th></th>
                        </tr>

                        <?php
                        $count = 0;
                        foreach ($_SESSION as $name => $value) {
                            if ( substr($name, 0, 8) == "product_"  && $value >0) {
                                    $count++;
                                    $id = substr($name, 8);
                                    $sql = "SELECT * FROM products, categories WHERE product_category_id = cate_id AND product_id = " . escape_string($id) . " ";
                                    $result = query($sql);
                                    confirm($result);
                                    while ($row = fetch_array($result)):
                                        ?>
                                        <tr class="cart_item">
                                            <td class="product-thumbnail">
                                                <a href="#">
                                                    <img class="img-responsive"
                                                         src="resources/uploads/<?php echo $row['product_image']; ?>" alt="">
                                                </a>
                                            </td>
                                            <td class="product-info">
                                                <a href="item.php?id=<?php echo $row['product_id']; ?>&loai=<?php echo $row['product_category_id'] ?>"><?php echo $row['product_title']; ?></a>
                                                <span class="amount"><?php
                                                    if ($row['product_sale'] < $row['product_price'] && $row['product_sale'] > 0) {
                                                        echo "<del style='color: black'>" . product_price($row['product_price']) . " </del> <br>";
                                                        echo "<ins style='font-size: 16px; font-weight: 700; color: #5fbd74; text-decoration: none;'>" .product_price($row['product_sale'])."</ins>";

                                                    } else {
                                                        echo "<ins style='font-size: 16px;font-weight: 700;color: #5fbd74;text-decoration: none;'>" .product_price($row['product_price']). "</ins>";
                                                    }
                                                    ?>
                                            </span>
                                            </td>

                                            <td class="product-quantity cart-quantity">
                                                <div class="quantity">
                                        <span class="qty-minus" data-min="1">
                                            <a href="cart-functions.php?remove=<?php echo $row['product_id']; ?>"><i
                                                        class="ion-ios-minus-outline"></i></a>
                                        </span>
                                                    <input type="text" name="quantity"
                                                           value="<?php echo $value; ?>"
                                                           title="Qty"
                                                           class="input-text qty text" size="4" disabled>
                                                    <span class="qty-plus" data-max="">
                                            <a href="cart-functions.php?add=<?php echo $row['product_id']; ?>&value=1"><i
                                                        class="ion-ios-plus-outline"></i></a>
                                        </span>
                                                </div>
                                            </td>
                                            <td class="product-info">
                                                <span style="font-weight: 700" class="sub-title"></span>
                                            </td>
                                            <td class="product-subtotal">
                                    <span class="amount"><?php if ($row['product_sale'] > 0) {
                                            echo product_price($final_price = $row['product_sale'] * $value);
                                        } else {
                                            echo product_price($final_price = $row['product_price'] * $value);
                                        } ?></span>
                                            </td>
                                            <td class="product-remove">
                                                <a href="cart-functions.php?delete=<?php echo $row['product_id'] ?>"
                                                   class="remove">×</a>
                                            </td>
                                        </tr>
                                    <?php endwhile; ?>
                                    <?php

                            }
                        }
                        ?>

                        <tr>
                            <td colspan="6" class="actions">
                                <a class="continue-shopping" href="../"> Continue Shopping</a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-4">
                    <div class="cart-totals">
                        <table>
                            <tbody>
                            <tr class="shipping">
                                <th style="font-family: Roboto;">Phí Shipping</th>
                                <td><?php if (isset($_SESSION['total_price'])) {
                                                if ($_SESSION['total_price'] > 500000){
                                                    echo "Miễn phí";
                                                }else {
                                                    echo product_price(20000);
                                                }
                                    }?>
                                </td>
                            </tr>
                            <tr class="order-total">
                                <th style="font-family: Roboto;">Tổng</th>
                                <td><strong><?php
                                                if (isset($_SESSION['final_price_ship']))
                                                    echo product_price($_SESSION['final_price_ship']);
                                             ?>
                                    </strong></td>
                            </tr>
                            </tbody>
                        </table>
                        <div style="font-family: Roboto; text-align: center;" class="proceed-to-checkout">
                            <?php
                                if ($_SESSION['count'] > 0) {
                                    echo "<a href='checkout.php'>Thanh toán</a>";
                                }else{
                                    echo "<button style='display: none' href='checkout.php'>Thanh toán</button>";
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include("resources/templates/frontend/footer.php");
?>
