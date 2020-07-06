<?php
require_once("resources/config.php");
include("resources/templates/frontend/header.php");
?>
    <div id="main">
        <div class="section pt-7 pb-7">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-md-push-3">
                        <div class="shop-filter">
                            <div class="col-md-6">
                                <!--                            <p class="result-count"> Showing 1–12 of 23 results</p>-->
                            </div>
                        </div>
                        <div class="product-grid">
                            <?php
                            if (isset($_GET['search'])){
                                $search = escape_string($_GET['search']);
                                $sql = "SELECT * FROM products 
                                        WHERE product_title 
                                        LIKE '%". $search . "%' ";
                                $result = query($sql);
                            confirm($result);
                            while ($row = fetch_array($result)):
                                ?>
                                <div class="col-md-4 col-sm-6 product-item text-center mb-3">
                                    <div class="product-thumb">
                                        <a href="item.php?id=<?php echo $row['product_id']; ?>&loai=<?php echo $row['product_category_id'] ?>">

                                            <div class="badges">
                                                <span class="hot">Hot</span>
                                                <?php
                                                if ($row['product_sale'] > 0)
                                                    echo "<span class='onsale'>Sale!</span>";
                                                ?>
                                            </div>
                                            <?php if ($row['product_stock'] == 0)

                                                echo "<span class='outofstock'><span>Out</span>of stock</span>";
                                            ?>
                                            <?php
                                            $check = file_exists("resources/uploads/{$row['product_image']}");
                                            if ($check){
                                                echo "<img src='resources/uploads/{$row['product_image']}'>";
                                            }else{
                                                echo "<img src='https://via.placeholder.com/300'>";
                                            }
                                            ?>
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <a href="item.php?id=<?php echo $row['product_id']; ?>&loai=<?php echo $row['product_category_id'] ?>">
                                            <h2 class="title"><?php echo $row['product_title']; ?></h2>
                                            <span class="price">
													<?php
                                                    if ($row['product_sale'] < $row['product_price'] && $row['product_sale'] > 0) {
                                                        echo "<del style='color: black'>" . product_price($row['product_price'])."</del>&ensp;";
                                                        echo "<ins>" . product_price($row['product_sale']) . "</ins> ";

                                                    } else {
                                                        echo " <ins>" . product_price($row['product_price']) . "</ins>";
                                                    }
                                                    ?>
												</span>
                                        </a>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                            <?php
                            }else{
                                redirect("index.php");
                            }


                            ?>
                        </div>
                    </div>
                    <div class="col-md-3 col-md-pull-9">
                        <div class="sidebar">
                            <div class="widget widget-product-categories">
                                <h3 class="widget-title">Các loại sản phẩm</h3>
                                <ul class="product-categories">
                                    <?php
                                    $sql = "SELECT * FROM categories  ";
                                    $result = query($sql);
                                    confirm($result);
                                    while ($rows = fetch_array($result)):
                                        ?>
                                        <li>
                                            <a href="shop-list.php?loai=<?php echo $rows['cate_id']; ?>"><?php echo $rows['cate_title']; ?></a>
                                        </li>
                                    <?php endwhile; ?>
                                </ul>
                            </div>
                            <div class="widget widget-products">
                                <h3 class="widget-title">Các sản phẩm khác</h3>
                                <ul class="product-list-widget">
                                    <?php
                                    $sql = "SELECT * FROM products ORDER BY RAND() LIMIT 5 ";
                                    $result = query($sql);
                                    confirm($result);
                                    while ($row = fetch_array($result)):
                                        ?>

                                        <li>
                                            <a href="item.php?id=<?php echo $row['product_id']; ?>&loai=<?php echo $row['product_category_id'] ?>">
                                                <?php if ($row['product_stock'] == 0)

                                                    echo "<span class='outofstock'><span>Out</span>of stock</span>";
                                                ?>
                                                <?php
                                                $check = file_exists("resources/uploads/thumbs/{$row['product_image']}");
                                                if ($check){
                                                    echo "<img src='resources/uploads/thumbs/{$row['product_image']}'>";
                                                }else{
                                                    echo "<img src='https://via.placeholder.com/300'>";
                                                }
                                                ?>
                                                <span class="product-title"><?php echo $row['product_title']; ?></span>
                                            </a>
                                            <?php
                                            if ($row['product_sale'] < $row['product_price'] && $row['product_sale'] > 0) {
                                                echo "<del style='color: black'>" . product_price($row['product_price'])."</del><br>";
                                                echo "<ins>" . product_price($row['product_sale']) . "</ins> ";

                                            } else {
                                                echo " <ins>" . product_price($row['product_price']) . "</ins>";
                                            }
                                            ?>
                                        </li>
                                    <?php endwhile; ?>
                                </ul>
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