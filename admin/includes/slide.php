<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Quản lý slide</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Thêm slide</li>
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
    <?php if (isset($_SESSION['message']))
        display_message();
    ?>
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive m-t-30">
                        <table class="table product-overview">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th>Danh sách slide</th>
                                <th>Xoá</th>
                            </tr>
                            </thead>
                            <tbody id="myTable">
                            <?php
                                $sql = "SELECT * FROM slide";
                                $result = query($sql);
                                confirm($result);
                                $count = mysqli_num_rows($result);
                                $i = 0;
                                while ($row = fetch_array($result)):
                            ?>
                            <tr>
                                <?php $i += 1; ?>
                                <th scope="row"><?php  echo $i; ?> </th>
                                <td><img class="img-responsive" style="width: 150px" src="../resources/uploads/slides/<?php echo $row['slide_image']; ?>" alt=""></td>
                                <td>
                                    <a id="<?php echo $row['slide_id'];?>" href="#" class="text-inverse delete_slide" title="" data-toggle="tooltip" data-original-title="Xoá"><i class="ti-trash"></i></a>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- Column -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="../resources/uploads.php" method="POST" enctype="multipart/form-data">
                        <div class="form-body">
                            <hr>
                            <div class="row">
                                <!--/span-->
                                <div class="col-md-5">
                                    <h5 class="card-title ">Đăng hình</h5>
                                    <div class="product-img">
                                        <form id="imagepicture" runat="server">
                                            <img style="width: auto; height: auto;" name="photo" class="img-responsive" id="previewimage">
                                        </form>
                                        <br/>
                                    </div>
                                    <div class="ml-4 mt-5 fileupload btn btn-info waves-effect waves-light"><span><i class="ion-upload m-r-5"></i>Chọn hình</span>
                                        <input type="file" class="upload" name="slide_image" id="fileToUpload" onchange="document.getElementById('previewimage').src = window.URL.createObjectURL(this.files[0])">
                                    </div>
                                </div>

                                <div class="col-md-7">
                                    <h5 class="card-title"> Lưu ý khi đăng hình</h5>
                                    <ul>
                                        <li>Hình phải được resize về <span style="font-weight: 700"> W × H:  1920 x 930</span>
                                            <ul><a href="https://www.photoresizer.com/" target="_blank">https://www.photoresizer.com/</a></ul>
                                        </li>

                                        <li>Tối ưu hoá hình ảnh trước khi upload
                                            <ul><a href="https://imagecompressor.com/" target="_blank">https://imagecompressor.com/</a></ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!--/row-->
                            <hr>
                            <div class="form-actions m-t-40 float-right">
                                <button name="submit_slide" type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Lưu</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>
</div>

