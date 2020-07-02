
<footer class="footer">
    © 2020 Admin by <a href="https://www.facebook.com/minhieu9874" target="_blank">Minh Hieu <i class="ti-facebook"></i></a>
</footer>

<!-- End footer -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="assets/node_modules/jquery/jquery-3.2.1.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="assets/node_modules/popper/popper.min.js"></script>
<script src="assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="dist/js/perfect-scrollbar.jquery.min.js"></script>
<!--Wave Effects -->
<script src="dist/js/waves.js"></script>
<!--Menu sidebar -->
<script src="dist/js/sidebarmenu.js"></script>
<!--stickey kit -->
<script src="assets/node_modules/sticky-kit-master/dist/sticky-kit.min.js"></script>
<script src="assets/node_modules/sparkline/jquery.sparkline.min.js"></script>
<!--Custom JavaScript -->
<script src="dist/js/custom.min.js"></script>
<script src="assets/node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>
<!-- ============================================================== -->
<!-- This page plugins -->
<!-- ============================================================== -->
<!--morris JavaScript -->
<script src="assets/node_modules/raphael/raphael-min.js"></script>
<script src="assets/node_modules/morrisjs/morris.min.js"></script>
<!--Custom JavaScript -->
<script src="dist/js/ecom-dashboard.js"></script>
<script src="dist/js/imagesloaded.pkgd.min.js" ></script>
<script src="dist/js/isotope.pkgd.min.js" ></script>
<script src="dist/js/jquery.isotope.init.js"></script>
<script src='https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.min.js'></script>
<!-- Optional: include a polyfill for ES6 Promises for IE11 -->
<script>



    $(document).ready(function(){
        $(function () {
            "use strict";
            //This is for the Notification top right


            // Morris donut chart
            Morris.Donut({
                element: 'morris-donut-chart',
                data: [{
                    label: "Đơn hàng",
                    value: <?php
                    $sql = "SELECT * FROM orders";
                    $result = query($sql);
                    confirm($sql);
                    echo mysqli_num_rows($result);
                    ?>,

                }, {
                    label: "Đang chờ xử lý",
                    value: <?php
                    $sql = "SELECT * FROM orders WHERE order_status = 1";
                    $result = query($sql);
                    confirm($sql);
                    echo mysqli_num_rows($result);
                    ?>,
                }, {
                    label: "Đã thanh toán",
                    value: <?php
                    $sql = "SELECT * FROM orders WHERE order_status = 3";
                    $result = query($sql);
                    confirm($sql);
                    echo mysqli_num_rows($result);
                    ?>
                },{
                    label: "Đơn hàng đã huỷ",
                    value: <?php
                    $sql = "SELECT * FROM orders WHERE order_status = 4";
                    $result = query($sql);
                    confirm($sql);
                    echo mysqli_num_rows($result);
                    ?>
                }],
                resize: true,
                colors:['#fb9678', '#fec107', '#00c292','#e46a76']
            });



        });
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });

        $('.delete_cate').click(function () {
            var id = $(this).attr("id");
            var hide = $(this);
            swal({
                    title: "Bạn chắc chứ",
                    text: "Sau khi xoá sẽ không thể phục hồi",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: '#DD6B55',
                    confirmButtonText: 'Xoá',
                    cancelButtonText: 'Huỷ',
                    closeOnConfirm: false,
                    //closeOnCancel: true
                },
                function(){
                    $.ajax({
                        url:'category_delete.php',
                        type:'get',
                        data: {delete:id},
                        success: function (data) {
                            hide.parents('tr').hide();
                        }
                    })
                    swal("Đã xoá!", "", "success");
                });
        });
        $('.delete_product').click(function () {
            var id = $(this).attr("id");
            var hide = $(this);
            swal({
                    title: "Bạn chắc chứ",
                    text: "Sau khi xoá sẽ không thể phục hồi",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: '#DD6B55',
                    confirmButtonText: 'Xoá',
                    cancelButtonText: 'Huỷ',
                    closeOnConfirm: false,
                    //closeOnCancel: true
                },
                function(){
                    $.ajax({
                        url:'product_delete.php',
                        type:'get',
                        data: {delete:id},
                        success: function (data) {
                            location.reload();
                        }
                    })
                    swal("Đã xoá!", "", "success");
                });
        });
        $('.delete_order').click(function () {
            var id = $(this).attr("id");
            var hide = $(this);
            swal({
                    title: "Bạn chắc chứ",
                    text: "Sau khi xoá sẽ không thể phục hồi",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: '#DD6B55',
                    confirmButtonText: 'Xoá',
                    cancelButtonText: 'Huỷ',
                    closeOnConfirm: false,
                    //closeOnCancel: true
                },
                function(){
                    $.ajax({
                        url:'order_delete.php',
                        type:'get',
                        data: {delete:id},
                        success: function (data) {
                            hide.parents('tr').hide();
                        }
                    })
                    swal("Đã xoá!", "", "success");
                });
        });
        $('.delete_slide').click(function () {
            var id = $(this).attr("id");
            var hide = $(this);
            swal({
                    title: "Bạn chắc chứ",
                    text: "Sau khi xoá sẽ không thể phục hồi",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: '#DD6B55',
                    confirmButtonText: 'Xoá',
                    cancelButtonText: 'Huỷ',
                    closeOnConfirm: false,
                    //closeOnCancel: true
                },
                function(){
                    $.ajax({
                        url:'slide_delete.php',
                        type:'get',
                        data: {delete:id},
                        success: function (data) {
                            hide.parents('tr').hide();
                        }
                    })
                    swal("Đã xoá!", "", "success");
                });
        });
    });

    /* function change text to slug for category and product image*/
    function ChangeToSlug()
    {
        var title, slug;

        //Lấy text từ thẻ input title
        title = document.getElementById("title").value;

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
        document.getElementById('slug').value = slug;
    }
    ChangeToSlug();


    /* function preview image product before upload */
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#fileToUpload").change(function () {
        readURL(this);
    });



</script>


</body>
</html>
