<?php include("includes/header.php"); ?>

    <!-- End Topbar header -->

    <!-- Left Sidebar - style you can find in sidebar.scss  -->
<?php include("includes/left-sidebar.php"); ?>
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->

    <!-- .right-sidebar -->
<?php include("includes/right-sidebar.php"); ?>
    <!-- ============================================================== -->
    <!-- End Right sidebar -->
    <!-- Page wrapper  -->

    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- =======================DASHBOARD PAGE============================= -->
        <?php if (basename($_SERVER['REQUEST_URI']) == "admin")
            include("includes/dashboard.php");

        ?>

        <?php
        if (isset($_GET['products'])) {
            include("includes/products.php");
        }
        ?>
        <?php
        if (isset($_GET['product_edit'])) {
            include("product_edit.php");
        }
        ?>
        <?php
        if (isset($_GET['product_add'])) {
            include("product_add.php");
        }
        ?>
        <?php
        if (isset($_GET['category'])) {
            include("includes/category.php");
        }
        ?>
        <?php
        if (isset($_GET['category_add'])) {
            include("category_add.php");
        }
        ?>

        <?php
        if (isset($_GET['category_edit'])) {
            include("category_edit.php");
        }
        ?>
        <?php
        if (isset($_GET['slide'])) {
            include("includes/slide.php");
        }
        ?>

        <?php
        if (isset($_GET['policy'])) {
            include("includes/policy.php");
        }
        ?>








        <!-- =======================DASHBOARD PAGE============================= -->

        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
    </div>


    <!-- End Page wrapper  -->

    <!-- footer -->
<?php include("includes/footer.php"); ?>