<?php
require_once("resources/config.php");
if (isset($_POST['email'])) {
    $output = '';
    $email = escape_string($_POST['email']);
    $_SESSION['customer-trackorder'] = $email;
    $sql = "SELECT * FROM orders, order_status WHERE order_status = order_status_id AND order_email = '{$email}' ORDER BY order_date DESC ";
    $result = query($sql);
    if (mysqli_num_rows($result) > 0) {
        $output .= '
                    <div class="table-responsive m-t-30">
                            <table class="table product-overview">
                                <thead style="white-space: nowrap;">
                                <tr>
                                    <th>Khách hàng</th>
                                    <th>Mã hoá đơn</th>
                                    <th>Ngày đặt hàng</th>
                                    <th>Trạng thái</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody >
              ';

        while ($row = mysqli_fetch_assoc($result)) {
            $output .= '
                                    <tr>
                                        <td>' . $row['order_customer'] . '</td>
                                        <td>' . $row['order_code'] . '   </td>
                                        <td>' . $row['order_date'] . '   </td>
                                        <td><span class="label label-'.$row['order_status'].'">' . $row['order_status_title'] . '</span></td>
                                        <td><a href="invoicebill.php?code=' . $row['order_code'] . '" class="text-inverse p-r-10 tooltip-test" title="Xem chi tiết" title=""><i style="cursor: pointer;" class="fas fa-edit"></i></a>
</td>
                                    </tr>
                ';
        }
        $output .= '
                                </tbody>
                         </table>
                   </div>
    ';
        echo $output;
    } else {
        $output .= '<p style="color: red;"> *Không tìm thấy email đặt hàng của bạn! </p>';
        echo $output;
    }
}else{
    redirect("../");
}
