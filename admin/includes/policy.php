<?php
if (isset($_POST['submit_policy'])){
    $content = $_POST['editor'];
    if (!empty($content)){
        $sql = "UPDATE policy SET content = '{$content}'";
        $result = query($sql);
        confirm($sql);
        if ($result){
            set_message("<button type='button' class='m-b-15 btn btn-lg btn-success text-center  btn-block' disabled> Lưu thành công </button>");
        }else{
            set_message("<button type='button' class='m-b-15 btn btn-lg btn-success text-center  btn-block' disabled> Lưu thất bại </button>");
        }
    }else{
        set_message("<button type='button' class='m-b-15 btn btn-lg btn-danger text-center  btn-block' disabled> Thêm nội dung trước khi đăng</button>");
    }
}
?>

<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Nội dung</h4>
        </div>
    </div>
    <?php
    display_message();
    ?>
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive m-t-30">
                        <?php
                        $sql = "SELECT * FROM policy";
                        $result = query($sql);
                        confirm($result);
                        while($row = fetch_array($result)):
                        ?>
                        <form action="" method="post">
                            <textarea style="max-width: 100%;" name="editor" id="editor" rows="20">
                                <?php echo $row['content']; ?>
                            </textarea>
                            <hr>
                            <div class="form-actions m-t-40">
                                <button name="submit_policy" type="submit" class="btn btn-success float-right"> <i class="fa fa-check"></i> Save</button>
                            </div>

                        </form>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>



</div>
<script type="text/javascript">
    CKEDITOR.replace('editor');
    CKEDITOR.config.extraPlugins = 'colorbutton';
</script>