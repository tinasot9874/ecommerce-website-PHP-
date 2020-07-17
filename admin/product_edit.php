<?php include("includes/header.php"); ?>

<!-- End Topbar header -->

<!-- Left Sidebar - style you can find in sidebar.scss  -->
<?php include("includes/left-sidebar.php"); ?>
<!-- End Left Sidebar - style you can find in sidebar.scss  -->

<!-- .right-sidebar -->
<?php include("includes/right-sidebar.php"); ?>
<!-- ============================================================== -->
<!-- End Right sidebar -->
<!-- Page wrapper  -->

<div class="page-wrapper">
    <?php
    if (isset($_GET['edit']))
    $result = query("SELECT * FROM products, categories WHERE product_category_id = cate_id  AND product_id =" . escape_string($_GET['edit']) . " ");
    confirm($result);
    while ($row = fetch_array($result)):
    ?>
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5">
                <h4 class="text-themecolor">Chỉnh sửa sản phẩm: <span style="color: orange; font-weight: bold;"><?php echo $row['product_title']; ?></span></h4>

            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Info box Content -->
        <!-- ============================================================== -->
        <div class="row">
            <!-- Column -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="../resources/uploads.php" method="post" enctype="multipart/form-data">
                            <div class="form-body">
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Tên sản phẩm</label>
                                            <input type="text" id="title" name="product_title" class="form-control"
                                                   placeholder="" required onkeyup="ChangeToSlug();" value="<?php echo $row['product_title']; ?>" ></div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Tên sản phẩm slug</label>
                                            <input type="text" id="product-slug" name="product_slug" class="form-control" placeholder="" readonly>
                                            <input type="text" id="image-slug" name="image-slug" class="form-control" placeholder="" hidden > 
                                        </div>

                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label">Mã sản phẩm</label>
                                            <input type="text" name="product_code" class="form-control" value="<?php echo $row['product_code']; ?>" required> </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label">Số lượng sản phẩm</label>
                                            <input type="number" name="product_stock" class="form-control" value="<?php echo $row['product_stock']; ?>" required> </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label">Chọn thể loại cho sản phẩm</label>
                                            <select class="form-control" name="product_category_id" data-placeholder="Danh mục" tabindex="1">
                                                <option value="<?php echo $row['cate_id']; ?>"><?php echo $row['cate_title']; ?></option>

                                                <?php
                                                $sql2 = "SELECT * FROM categories WHERE cate_id NOT IN (" . $row['cate_id'] . ") ";
                                                $result2 = query($sql2);
                                                confirm($result2);
                                                while ($row2 = fetch_array($result2)):
                                                    ?>
                                                    <option value="<?php echo $row2['cate_id'] ?>"><?php echo $row2['cate_title']; ?></option>
                                                <?php endwhile; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="hidden" name="product_id" value="<?php echo $row['product_id'] ?>">
                                        <div class="form-group">
                                            <label class="control-label">Trạng thái sản phẩm: </label>
                                            <div class="custom-control custom-radio" style="text-align: center; margin-top: 10px;">
                                                <input type="checkbox" id="customRadioInline2" name="product_status" class="custom-control-input" <?php if ($row['product_status'] == 1){echo "checked value='1' " ;}else{ echo "value='1' ";} ?>>
                                                <label class="custom-control-label" for="customRadioInline2">Hot</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/row-->
                                <!--/row-->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Giá sản phẩm</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">VND</span>
                                                </div>
                                                <input id="money_format" name="product_price" type="number" class="form-control" value="<?php echo $row['product_price']; ?>" aria-label="price" aria-describedby="basic-addon1">
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Giá sau khi giảm</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon2"><i class="ti-cut"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="product_sale" value="<?php echo $row['product_sale']; ?>" aria-label="Discount" aria-describedby="basic-addon2">
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <h5 class="card-title m-t-40">Mô tả sản phẩm</h5>
                                <div class="row">
                                    <div class="col-md-12 ">
                                        <div class="form-group">
                                            <textarea class="form-control" name="product_description"  rows="7"><?php echo $row['product_description']; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <!--/row-->
                                <div class="row">
                                    <!--/span-->
                                    <div class="col-md-5">
                                        <h5 class="card-title ">Đăng hình sản phẩm</h5>
                                        <div class="product-imgs">
                                            <form id="imagepicture" runat="server">
                                                <img src="../resources/uploads/<?php echo $row['product_image']; ?>" name="photo" class="img-responsive" id="previewimage">
                                            </form>
                                            <br/>
                                        </div>
                                        <div class="ml-4 mt-5 fileupload btn btn-info waves-effect waves-light"><span><i class="ion-upload m-r-5"></i>Chọn hình</span>
                                            <input type="file" class="upload" name="product_image" id="fileToUpload" onchange="document.getElementById('previewimage').src = window.URL.createObjectURL(this.files[0])">
                                        </div>
                                    </div>

                                    <div class="col-md-7">
                                        <h5 class="card-title"> Lưu ý khi đăng hình</h5>
                                        <ul>
                                            <li>B1 : Hình phải được resize về W × H: 550x550 hoặc W × H: 300x300
                                                <ul><a href="https://www.photoresizer.com/" target="_blank">https://www.photoresizer.com/</a></ul>
                                            </li>

                                            <li>B2 : Tối ưu hoá hình ảnh trước khi upload
                                                <ul><a href="https://imagecompressor.com/" target="_blank">https://imagecompressor.com/</a></ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-actions m-t-40">
                                    <button name="update" type="submit" class="btn btn-success float-right"> <i class="fa fa-check"></i> Save</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <!-- Column -->
        </div>
    </div>

    <?php endwhile; ?>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#fileToUpload").change(function(){
            readURL(this);
        });
    </script>



</div>


<!-- End Page wrapper  -->

<!-- footer -->
<?php include("includes/footer.php"); ?>
