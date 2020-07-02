<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Tổng quan</h4>
        </div>
    </div>
    <?php if (isset($_SESSION['message']))
        display_message();
    ?>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Info box Content -->
    <!-- ============================================================== -->
    <div class="row">
        <!-- Column -->
        <div class="col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Đơn hàng</h4>
                    <div class="text-right"><span class="text-muted">Đã nhận hôm nay</span>
                        <h1 class="font-light"><sup><i class="ti-arrow-up text-success"></i></sup> 12,000</h1>
                    </div>
                    <span class="text-success">20%</span>
                    <div class="progress">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 20%; height: 6px;"
                             aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Lượt truy cập trang web</h4>
                    <div class="text-right"><span class="text-muted">Monthly Deduction</span>
                        <h1 class="font-light"><sup><i class="ti-arrow-up text-primary"></i></sup> $5,000</h1>
                    </div>
                    <span class="text-primary">30%</span>
                    <div class="progress">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 30%; height: 6px;"
                             aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="row">
                <!-- Column -->
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">

                            <h5 class="card-title">Thống kê đơn hàng</h5>
                            <div id="morris-donut-chart" class="ecomm-donute"></div>
                            <ul class="list-inline m-t-30 text-center">
                                <li class="p-r-20">
                                    <h5 class="text-muted"><i class="fa fa-circle" style="color: #fb9678;"></i>
                                        Tất cả đơn hàng</h5>
                                    <h4 class="m-b-0">
                                        <?php
                                            $sql = "SELECT * FROM orders";
                                            $result = query($sql);
                                            confirm($sql);
                                            echo mysqli_num_rows($result);
                                        ?>

                                    </h4>
                                </li>
                                <li class="p-r-20">
                                    <h5 class="text-muted"><i class="fa fa-circle" style="color: #fec107;"></i>
                                        Đang chờ xử lý</h5>
                                    <h4 class="m-b-0">
                                        <?php
                                        $sql = "SELECT * FROM orders WHERE order_status = 1";
                                        $result = query($sql);
                                        confirm($sql);
                                        echo mysqli_num_rows($result);
                                        ?>

                                    </h4>
                                </li>
                                <li>
                                    <h5 class="text-muted"><i class="fa fa-circle" style="color: #00c292;"></i>
                                        Đã thanh toán</h5>
                                    <h4 class="m-b-0">
                                        <?php
                                        $sql = "SELECT * FROM orders WHERE order_status = 3";
                                        $result = query($sql);
                                        confirm($sql);
                                        echo mysqli_num_rows($result);
                                        ?>

                                    </h4>
                                </li>
                                <li>
                                    <h5 class="text-muted"><i class="fa fa-circle" style="color: #e46a76;"></i>
                                        Đơn hàng đã huỷ</h5>
                                    <h4 class="m-b-0">
                                        <?php
                                        $sql = "SELECT * FROM orders WHERE order_status = 4";
                                        $result = query($sql);
                                        confirm($sql);
                                        echo mysqli_num_rows($result);
                                        ?>

                                    </h4>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <!-- Column -->
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- charts -->
    <!-- ============================================================== -->
    <div class="row">
        <!-- Column -->

        <!-- Column -->

    </div>
    <!-- ============================================================== -->
    <!-- charts -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Danh sách đơn hàng</h5>
                    <input class="form-control" id="myInput" type="text" placeholder="Tìm kiếm">
                    <div class="table-responsive m-t-30">
                        <table class="table product-overview">
                            <thead>
                            <tr>
                                <th>Khách hàng</th>
                                <th>Mã hoá đơn</th>
                                <th>Ngày đặt hàng</th>
                                <th>Trạng thái</th>
                            </tr>
                            </thead>
                            <tbody id="myTable">
                            <?php
                                $sql = "SELECT * FROM orders, orderdetails, order_status WHERE order_code = order_detail_code AND order_status = order_status_id ORDER BY order_date DESC ";
                                $result = query($sql);
                                confirm($result);
                                while ($row = fetch_array($result)):
                            ?>
                            <tr>
                                <td><?php echo $row['order_customer']; ?></td>
                                <td><?php echo $row['order_code']; ?></td>
                                <td><?php echo $row['order_date']; ?></td>
                                <td><?php
                                        if ($row['order_status'] == 1)
                                        {
                                            echo "<span class='label label-warning'>{$row['order_status_title']}</span>";
                                        }
                                        if ($row['order_status'] == 2){
                                            echo "<span class='label label-info'>{$row['order_status_title']}</span>";
                                        }
                                        if ($row['order_status'] == 3){
                                            echo "<span class='label label-success'>{$row['order_status_title']}</span>";
                                        }
                                        if ($row['order_status'] == 4){
                                            echo "<span class='label label-danger'>{$row['order_status_title']}</span>";
                                        }
                                    ?>

                                </td>
                                <td>
                                    <a  href="orderdetails.php?code=<?php echo $row['order_code']; ?>" class="text-inverse p-r-10"
                                        data-toggle="tooltip"
                                        data-original-title="Xem chi tiết" title="" data-original-title="Xem chi tiết"><i
                                            class="ti-marker-alt"></i></a>
                                    <a id="<?php echo $row['order_id']; ?>" href="#" class="text-inverse delete_order" title="" data-toggle="tooltip" data-original-title="Xoá">
                                        <i class="ti-trash"></i>
                                    </a>
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
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
</div>