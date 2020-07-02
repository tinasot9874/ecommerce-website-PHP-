<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Các thể loại sản phẩm</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center float-left">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Danh sách loại sản phẩm</li>
                </ol>
            </div>
            <div class="row float-right">
                <a href="index.php?category_add" type="button" class="btn btn-info d-lg-block m-l-15"><i class="fa fa-plus-circle"></i>
                    Thêm thể loại sản phẩm mới
                </a>
            </div>
        </div>

    </div>
    <?php if (isset($_SESSION['message']))
        display_message();
    ?>
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-body">
                    <input class="form-control" id="myInput" type="text" placeholder="Tìm kiếm">
                    <div class="table-responsive m-t-30">
                        <table class="table product-overview">
                            <thead>
                            <tr>
                                <th>Tên thể loại</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody id="myTable">
                            <?php
                            $sql = "SELECT * FROM categories";
                            $result = query($sql);
                            confirm($result);
                            while ($row = fetch_array($result)):
                                ?>
                                <tr>
                                    <td><?php echo $row['cate_title']; ?></td>
                                    <td><a href="category_edit.php?edit=<?php echo $row['cate_id']; ?>" class="text-inverse p-r-10"
                                           data-toggle="tooltip" title="" data-original-title="Sửa"><i
                                                class="ti-marker-alt"></i></a>
                                        <a id="<?php echo $row['cate_id'];?>" href="#" class="text-inverse delete_cate" title="" data-toggle="tooltip" data-original-title="Xoá"><i
                                                class="ti-trash"></i></a>
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



</div>