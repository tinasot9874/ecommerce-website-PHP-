<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 col-xs-6 align-self-center">
            <h4 class="text-themecolor">Các sản phẩm</h4>
        </div>
        <div class="col-md-7 col-xs-6 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center float-left">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Danh sách sản phẩm</li>
                </ol>
            </div>
            <div class="d-flex justify-content-end align-items-center float-right">
                <a href="index.php?product_add" type="button" class="btn btn-info d-lg-block m-l-15"><i class="fa fa-plus-circle"></i>
                    Thêm sản phẩm mới
                </a>
            </div>
        </div>
    </div>
    <?php if (isset($_SESSION['message']))
        display_message();
    ?>
    <div class="row">
        <div class="col-sm-12 p-0">
        <div class="text-center">
            <ul class="masonry-filter">
                <li><a href="#" data-filter="" class="active">Tất cả</a></li>
                <?php
                $sql = "SELECT * FROM categories";
                $result = query($sql);

                while ($row = fetch_array($result)) {
                    echo "<li><a href='#' data-filter='.{$row['slug']}'>{$row['cate_title']}</a></li>";
                }
                ?>
            </ul>
        </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Info box Content -->
    <!-- ============================================================== -->
    <div class="row product-grid masonry-grid-post">

        <?php
        $sql = "SELECT * FROM products, categories WHERE product_category_id = cate_id";
        $return = query($sql);
        confirm($return);
        while ($row = fetch_array($return)):
            ?>
            <div class="col-lg-3 col-md-6 masonry-item <?php echo $row['slug'] ?> ">
                <div class="card ">

                    <div class="card-body">

                        <div class="product-img">
                            <?php
                            if ($row['product_stock'] == 0) {
                                echo "<span class='outofstock'><span>Out</span>of stock</span>";
                            }
                            ?>
                            <div class="badges">
                                <?php
                                if ($row['product_status'] > 0)
                                    echo "<span class='hot'>Hot</span>";
                                ?>

                                <?php
                                if ($row['product_sale'] > 0)
                                    echo "<span class='onsale'>Sale!</span>";
                                ?>
                            </div>

                            <?php
                            $check = file_exists("../resources/uploads/{$row['product_image']}");
                                if ($check){
                                    echo "<img class='img-responsive' src='../resources/uploads/{$row['product_image']}'>";
                                }else{
                                    echo "<img class='img-responsive' src='https://via.placeholder.com/550'>";
                                }
                            ?>

                            <div class="pro-img-overlay">
                                <a href="product_edit.php?edit=<?php echo $row['product_id']; ?>" class="bg-info">
                                    <i class="ti-marker-alt"></i>
                                </a>
                                <a id="<?php echo $row['product_id']; ?>" href="#" class="bg-danger delete_product">
                                    <i class="ti-trash"></i>
                                </a>
                            </div>
                        </div>
                        <div class="product-text">
                            <div style="width: 100%; height: 50px; ">
                                <h5 class="card-title m-b-0 text-center"><?php echo $row['product_title']; ?> </h5>
                            </div>
                            <h5 class="text-center">
                                <span class="price">
                                               <?php
                                               if ($row['product_sale'] < $row['product_price'] && $row['product_sale'] > 0) {
                                                   echo "<del style='color: black'>".product_price($row['product_price'])." </del><br>";
                                                   echo "<ins>".product_price($row['product_sale'])."</ins> ";

                                               } else {
                                                   echo "<br> <ins>".product_price($row['product_price'])."</ins> ";
                                               }
                                               ?>
                                            </span>
                            </h5>
<!--                            <p class="text-muted db text-center" style="font-weight: bold">Loại: --><?php //echo $row['measure_title']; ?><!--</p>-->
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>


    </div>
    <!-- ============================================================== -->
    <!-- End PAge Content -->

</div>