<div class="container-fluid">


    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Thêm sản phẩm</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Thêm sản phẩm mới</li>
                </ol>
            </div>
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
                            <h5 class="card-title">Nhập thông tin sản phẩm mới</h5>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Tên sản phẩm</label>
                                        <input type="text" id="title" name="product_title" class="form-control"
                                               placeholder="" required onkeyup="ChangeToSlug();" ></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Tên hình ảnh slug</label>
                                        <input type="text" id="slug" name="image-slug" class="form-control" placeholder="" readonly required> </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">Mã sản phẩm</label>
                                        <input type="text" name="product_code" class="form-control" required></div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">Số lượng sản phẩm</label>
                                        <input type="number" name="product_stock" class="form-control" placeholder=""
                                               required></div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">Chọn thể loại cho sản phẩm</label>
                                        <select class="form-control" name="product_category_id"
                                                data-placeholder="Danh mục" tabindex="1">
                                            <option value="" disabled selected></option>
                                            <?php
                                            $sql = "SELECT * FROM categories";
                                            $result = query($sql);
                                            confirm($result);
                                            while ($row = fetch_array($result)):
                                                ?>
                                                <option value="<?php echo $row['cate_id'] ?>"><?php echo $row['cate_title']; ?></option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">Trạng thái sản phẩm: </label>
                                        <div class="custom-control custom-radio" style="text-align: center; margin-top: 10px;">
                                            <input type="checkbox" id="customRadioInline2" name="product_status"
                                                   class="custom-control-input" value="1">
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
                                            <input id="" name="product_price" type="number" class="form-control"
                                                   aria-label="price" aria-describedby="basic-addon1">

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
                                            <input type="text" name="product_sale" value="0" class="form-control"
                                                   placeholder="Giá giảm" aria-label="Discount"
                                                   aria-describedby="basic-addon2">
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <h5 class="card-title m-t-40">Mô tả sản phẩm</h5>
                            <div class="row">
                                <div class="col-md-12 ">
                                    <div class="form-group">
                                        <textarea name="product_description" class="form-control" rows="4"></textarea>
                                    </div>
                                </div>
                            </div>
                            <!--/row-->
                            <div class="row">
                                <!--/span-->
                                <div class="col-md-5">
                                    <h5 class="card-title ">Đăng hình sản phẩm</h5>
                                    <div class="product-img">
                                        <form id="imagepicture" runat="server">
                                            <img name="photo" class="img-responsive" id="previewimage">
                                        </form>
                                        <br/>
                                    </div>
                                    <div class="ml-4 mt-5 fileupload btn btn-info waves-effect waves-light"><span><i
                                                    class="ion-upload m-r-5"></i>Chọn hình</span>
                                        <input type="file" class="upload" name="product_image" id="fileToUpload"
                                               onchange="document.getElementById('previewimage').src = window.URL.createObjectURL(this.files[0])">
                                    </div>
                                </div>

                                <div class="col-md-7">
                                    <h5 class="card-title"> Lưu ý khi đăng hình</h5>
                                    <ul>
                                        <li>Hình phải được resize về W × H: 550x550 hoặc W × H: 300x300
                                            <ul><a href="https://www.photoresizer.com/" target="_blank">https://www.photoresizer.com/</a>
                                            </ul>
                                        </li>

                                        <li>Tối ưu hoá hình ảnh trước khi upload
                                            <ul><a href="https://imagecompressor.com/" target="_blank">https://imagecompressor.com/</a>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <hr>
                            <div class="form-actions m-t-40">
                                <button name="submit" type="submit" class="btn btn-success float-right"><i
                                            class="fa fa-check"></i> Tạo
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>
</div>

