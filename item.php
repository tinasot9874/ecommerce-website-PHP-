<?php
require_once("resources/config.php");
include("resources/templates/frontend/header.php");
?>
    <div id="main">
        <div class="section border-bottom pt-2 pb-2">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="breadcrumbs">
                            <li><a href="../">Home</a></li>
                            <li>Product Detail</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <h4 class="text-center bg-warning"><?php echo display_message() ?></h4>
        <div class="section pt-7 pb-7">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-md-push-3">
                        <div class="single-product">
                            <!--BEGIN Chi tiết sản phẩm -->
                            <?php
                            $result = query("SELECT * FROM products, categories WHERE product_category_id = cate_id AND product_id =" . escape_string($_GET['id']) . " ");
                            confirm($result);

                            while ($row = fetch_array($result)):

                                ?>
                                <div class="col-md-6">
                                    <div class="image-gallery">
                                        <div class="image-gallery-inner">
                                            <div>
                                                <div class="image-thumb">

                                                    <?php if ($row['product_stock'] == 0)

                                                        echo "<span class='outofstock'><span>Out</span>of stock</span>";
                                                    ?>
                                                    <img src="resources/uploads/<?php echo $row['product_image']; ?>" alt=""/>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="summary">
                                        <h1 class="product-title"><?php echo $row['product_title'] ?></h1>
                                        <h5 class="" style="margin-bottom: 10px;">MSP: <?php echo $row['product_code'] ?></h5>
                                        <div class="product-price">
                                            <?php
                                            if ($row['product_sale'] < $row['product_price'] && $row['product_sale'] > 0) {
                                                echo "<del style='color: black'>" . product_price($row['product_price'])."</del> <br>";
                                                echo " <ins>" . product_price($row['product_sale'])." </ins> ";
                                            } else {
                                                echo " <ins>" . product_price($row['product_price'])."</ins> ";
                                            }
                                            ?>
                                        </div>
                                        <div class="mb-3">
                                            <p><?php echo $row['product_description'] ?></p>
                                        </div>
                                        <form class="cart" action="cart-functions.php" method="GET">
                                            <input type="hidden" name="add" value="<?php echo $row['product_id']; ?>">
                                            <div class="quantity-chooser">
                                                <div class="quantity">
                                                    <span class="qty-minus" data-min="1"><i
                                                                class="ion-ios-minus-outline"></i></span>
                                                    <input type="text" name="value" value="1" title="Qty"
                                                           class="input-text qty text" size="4">
                                                    <span class="qty-plus" data-max=""><i
                                                                class="ion-ios-plus-outline"></i></span>
                                                </div>
                                            </div>
                                            <?php
                                            if ($row['product_stock'] == 0) {
                                                echo "<button type='submit' style='opacity: 0.3;' class='single-add-to-cart' disabled>Thêm vào giỏ</button>";
                                            } else {
                                                echo "<button type='submit' class='single-add-to-cart' >Thêm vào giỏ</button>";
                                            }

                                            ?>

                                        </form>
                                        <div class="product-meta">
                                            <table>
                                                <tbody>
                                                <tr>
                                                    <td class="label">Loại sản phẩm</td>
                                                    <td><a href="shop-list.php?loai=<?php echo $row['cate_id']; ?>"><?php echo $row['cate_title'] ?></a></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                            <!--END Chi tiết sản phẩm -->

                            <div class="col-md-12">
                                <div class="related" style="padding-top: 60px;">
                                    <div class="related-title">
                                        <div class="text-center mb-1 section-pretitle fz-34" style="font-family: Roboto">Các sản phẩm cùng loại</div>
                                    </div>
                                    <div class="product-carousel p-0" data-auto-play="true" data-desktop="3" data-laptop="2" data-tablet="2" data-mobile="1">
                                        <?php $sql = "SELECT * FROM products JOIN categories ON product_category_id = cate_id WHERE cate_id =".escape_string($_GET['loai'])." AND product_id NOT IN ( ".escape_string($_GET['id'])." ) ";

                                        $result = query($sql);

                                        confirm($result);
                                        while ($row = fetch_array($result)):
                                            ?>
                                            <div class="product-item text-center">
                                                <div class="product-thumb">
                                                    <a href="item.php?id=<?php echo $row['product_id']; ?>&loai=<?php echo $row['product_category_id'] ?>">
                                                        <?php if ( $row['product_stock'] == 0 )

                                                            echo "<span class='outofstock'><span>Out</span>of stock</span>";
                                                        ?>
                                                        <div class="badges">
                                                            <?php
                                                            if ($row['product_status'] == 1) {
                                                                echo "<span class='hot'>Hot</span>";
                                                            }

                                                            if ($row['product_sale'] > 0) {
                                                                echo "<span class='onsale'>Sale!</span>";
                                                            }
                                                            ?>
                                                        </div>
                                                        <img src="resources/uploads/<?php echo $row['product_image']; ?>" alt="" />
                                                    </a>
                                                </div>
                                                <div class="product-info">
                                                    <a href="item.php?id=<?php echo $row['product_id']; ?>&loai=<?php echo $row['product_category_id'] ?>">
                                                        <h2 class="title"><?php echo $row['product_title']; ?></h2>
                                                        <p class="">MSP: <?php echo $row['product_code']; ?></p>
                                                        <span class="price">
                                                        <?php
                                                        if ($row['product_sale'] < $row['product_price'] && $row['product_sale'] > 0) {
                                                            echo "<del style='color: black'>" . product_price($row['product_price'])."</del> <br>";
                                                            echo " <ins>" . product_price($row['product_sale'])."</ins> ";

                                                        }else{
                                                            echo " <ins>" . product_price($row['product_price'])."</ins> ";
                                                        }
                                                        ?>
                                                    </span>
                                                    </a>
                                                </div>
                                            </div>
                                        <?php endwhile; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!--BEGIN Sản phẩm khác -->

                    <div class="col-md-3 col-md-pull-9">
                        <div class="sidebar">
                            <div class="widget widget-products">
                                <h3 class="widget-title">Các sản phẩm khác</h3>
                                <ul class="product-list-widget">
                                    <?php $sql = "SELECT * FROM products WHERE product_id NOT IN (" . $_GET['id'] . ")  LIMIT 5 ";
                                    $result = query($sql);
                                    confirm($result);

                                    while ($row = fetch_array($result)):

                                        ?>
                                        <li>
                                            <a href="item.php?id=<?php echo $row['product_id']; ?>&loai=<?php echo $row['product_category_id'] ?>">
                                                <img src="resources/uploads/<?php echo $row['product_image']; ?>"
                                                     alt=""/>
                                                <span class="product-title"><?php echo $row['product_title'] ?></span>
                                            </a>
                                            <?php
                                            if ($row['product_sale'] < $row['product_price'] && $row['product_sale'] > 0) {
                                                echo "<del style='color: black'>" . product_price($row['product_price'])."</del> <br>";
                                                echo " <ins>" . product_price($row['product_sale'])."</ins> ";

                                            } else {
                                                echo " <ins>" . product_price($row['product_price'])."</ins> ";
                                            }
                                            ?>
                                        </li>
                                    <?php endwhile; ?>

                                </ul>
                            </div>
                        </div>
                    </div>

                    <!--END Sản phẩm khác -->

                </div>
            </div>
        </div>
    </div>
<?php
include("resources/templates/frontend/footer.php");
?>