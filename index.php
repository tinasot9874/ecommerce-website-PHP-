<?php
require_once("resources/config.php");
include("resources/templates/frontend/header.php");
?>
<div id="main">
    <?php include("resources/templates/frontend/slider-index.php"); ?>
    <h4 class="text-center bg-warning"><?php echo display_message() ?></h4>
    <div class="section pt-12 pb-9">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="text-center mb-1 section-pretitle">Khám Phá Nào</div>
                    <div class="organik-seperator center">
                        <span class="sep-holder"><span class="sep-line"></span></span>
                        <div class="sep-icon"><i class="organik-flower"></i></div>
                        <span class="sep-holder"><span class="sep-line"></span></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 p-0">
                    <div class="text-center masonry-filter">
                        <div class="row" style="text-transform: uppercase;">
                            <span><a style='font-weight: 600; cursor: pointer;' data-filter="" class="active">Tất cả</a></span>
                        </div>
                        <ul class="">

                            <?php
                            $sql = "SELECT * FROM categories ORDER BY cate_id ASC";
                            $result = query($sql);

                            while ($row = fetch_array($result)) {
                                echo "<li class='col-2'><a style='font-weight: 600; cursor: pointer;' data-filter='.{$row['slug']}'>{$row['cate_title']}</a></li>";
                            }
                            ?>

                        </ul>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="shop-filter">
                    <div class="col-md-6">
                    </div>
                    <div class="col-md-6">
                        <div class="shop-filter-right">
                            <form class="commerce-ordering">
                                <select id="price-sort" name="orderby" class="orderby">
                                    <option value="" selected="selected">Sắp xếp giá:</option>
                                    <option data-sorttype="dec" value="price">Giá từ thấp đến cao</option>
                                    <option data-sorttype="ass" value="price">Giá từ cao đến thấp</option>
                                </select>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="product-grid masonry-grid-post">
                    <?php
                    $sql = "SELECT * FROM products JOIN categories ON product_category_id = cate_id ";
                    $result = query($sql);
                    confirm($result);
                    while ($row = fetch_array($result)):
                        ?>
                        <div class="col-md-3 col-sm-6 product-item masonry-item text-center <?php echo $row['slug'] ?>">
                            <form id="form_id" method="post"
                                  action="index.php?action=add$id=<?php echo $row['product_id']; ?>">
                                <div class="product-thumb">
                                    <a href="item.php?ten=<?php echo $row['product_slug']; ?>&loai=<?php echo $row['slug'] ?>">
                                        <?php if ($row['product_stock'] == 0)

                                            echo "<span class='outofstock'><span>Out</span>of stock</span>";
                                        ?>
                                        <div class="badges">
                                            <?php
                                            if ($row['product_status'] == 1){
                                                echo "<span class='hot'>Hot</span>";
                                            }
                                            ?>
                                            <?php
                                            if ($row['product_sale'] > 0)
                                                echo "<span class='onsale'>Sale!</span>";
                                            ?>
                                        </div>
                                        <?php
                                        $check = file_exists("resources/uploads/{$row['product_image']}");
                                        if ($check){
                                            echo "<img src='resources/uploads/{$row['product_image']}' alt='{$row['product_image']}'>";
                                        }else{
                                            echo "<img src='https://via.placeholder.com/300'>";
                                        }
                                        ?>
                                    </a>
                                    <div class="product-action">
                                    <span class="add-to-cart">
                                        <?php
                                        if ($row['product_stock'] == 0) {
                                            echo "<a href ='javascript:void(0)' style='cursor: default' data-toggle = 'tooltip' data-placement = 'top' title = '' data-original-title = 'Sản phẩm hết hàng' ></a >";
                                        } else {
                                            echo "<a href='cart-functions.php?add={$row['product_id']}&value=1' data-toggle = 'tooltip' data-placement = 'top' title = '' data-original-title = 'Thêm vào giỏ hàng' ></a >";

                                        }
                                        ?>
                                    </span>
                                    </div>
                                </div>
                                <div class="product-info">
                                <a href="item.php?ten=<?php echo $row['product_slug']; ?>&loai=<?php echo $row['slug'] ?>">
                                        <div style="width: 100%; height: 50px; ">
                                            <p class="title" style="margin: 20px 0 0 0!important;"><?php echo $row['product_title']; ?></p>

                                        </div>
                                        <p class="title" style="margin: 0!important;">MSP: <?php echo $row['product_code']; ?> </p>
                                        <span class="price">
                                               <?php
                                               if ($row['product_sale'] < $row['product_price'] && $row['product_sale'] > 0) {
                                                   echo "<del style='color: black'>".product_price($row['product_price'])." </del>&ensp;";
                                                   echo "<ins class='price-sort-product'>".product_price($row['product_sale'])."</ins> ";

                                               } else {
                                                   echo " <ins class='price-sort-product'>".product_price($row['product_price'])."</ins> ";
                                               }
                                               ?>
                                            </span>
                                    </a>
                                </div>
                            </form>
                        </div>

                    <?php endwhile; ?>

                </div>
            </div>
        </div>
    </div>
</div>

<?php
include("resources/templates/frontend/footer.php");
?>
