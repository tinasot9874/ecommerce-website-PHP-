<?php
require_once("resources/config.php");
include("resources/templates/frontend/header.php");
?>

<div id="main">
    <div class="section border-bottom pt-2 pb-2">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="breadcrumbs">
                        <li><a href="index.php">Trang chủ</a></li>
                        <li>Theo dỗi đơn hàng</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="section pt-10 pb-10">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="col-md-4">
                        <div class="widget"><h3 class="widget-title">Nhập email</h3>
                            <hr>

                            <form class="newsletter">
                                <input type="email" name="EMAIL" placeholder="Điền email của bạn vào đây" required/>
                                <hr>
                                <button style="float: right;"><i class="fa fa-send"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="widget"><h3 class="widget-title">Xem hoá đơn</h3>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
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

                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
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
