<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Thêm thể loại</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Thêm loại sản phẩm</li>
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
                        <?php cate_add(); ?>
                        <div class="form-body">
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Tên thể loại</label>
                                        <input type="text" id="title" name="cate_title"  class="form-control" placeholder="" required onkeyup="ChangeToSlug();"> </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Tên slug</label>
                                        <input type="text" id="slug" name="cate_slug" class="form-control" placeholder="" readonly required> </div>
                                </div>
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


