<?php include("includes/header.php"); ?>

<!-- End Topbar header -->

<!-- Left Sidebar - style you can find in sidebar.scss  -->
<?php include("includes/left-sidebar.php"); ?>
<!-- End Left Sidebar - style you can find in sidebar.scss  -->

<!-- .right-sidebar -->
<?php include("includes/right-sidebar.php"); ?>
<div class="page-wrapper">
    <?php
    if (isset($_GET['edit']))
    $sql = "SELECT * FROM categories WHERE cate_id = " . escape_string($_GET['edit']) ."  ";
    $result = query($sql);
    confirm($result);
    while ($row = fetch_array($result)):

    ?>


<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->

    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Sửa thể loại</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Sửa loại sản phẩm</li>
                </ol>
                <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</button>
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
                    <form action="" method="POST">
                        <div class="form-body">
                            <hr>
                            <div class="row">
                                <?php cate_update(); ?>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Tên thể loại</label>
                                        <input type="text" id="cate_title" name="cate_title"  class="form-control" value="<?php echo $row['cate_title'];  ?>" required onkeyup="ChangeToSlug();"> </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Tên slug</label>
                                        <input type="text" id="cate_slug" name="cate_slug" class="form-control" value="<?php echo $row['slug'];  ?>" readonly required> </div>
                                </div>
                                <input type="hidden" name="cate_id" value="<?php echo $row['cate_id']; ?>">
                            </div>
                            <!--/row-->
                            <hr>
                        </div>
                        <div class="form-actions m-t-40 float-right">
                            <button name="submit" type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Lưu</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>
</div>
<?php endwhile; ?>
</div>
<script language="javascript">
    function ChangeToSlug()
    {
        var title, slug;

        //Lấy text từ thẻ input title
        title = document.getElementById("cate_title").value;

        //Đổi chữ hoa thành chữ thường
        slug = title.toLowerCase();

        //Đổi ký tự có dấu thành không dấu
        slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
        slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
        slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
        slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
        slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
        slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
        slug = slug.replace(/đ/gi, 'd');
        //Xóa các ký tự đặt biệt
        slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
        //Đổi khoảng trắng thành ký tự gạch ngang
        slug = slug.replace(/ /gi, "-");
        //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
        //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
        slug = slug.replace(/\-\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-/gi, '-');
        slug = slug.replace(/\-\-/gi, '-');
        //Xóa các ký tự gạch ngang ở đầu và cuối
        slug = '@' + slug + '@';
        slug = slug.replace(/\@\-|\-\@|\@/gi, '');
        //In slug ra textbox có id “slug”
        document.getElementById('cate_slug').value = slug;
    }
</script>



    <!-- End Page wrapper  -->

    <!-- footer -->
<?php include("includes/footer.php"); ?>