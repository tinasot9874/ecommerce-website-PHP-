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
                            <li><a href="index.php">Home</a></li>
                            <li>Chính sách cửa hàng</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="section pt-10 pb-10">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">

                    <?php

                    $sql = "SELECT * FROM policy";
                    $result = query($sql);
                    confirm($result);
                    while ($row = fetch_array($result)){
                        echo $row['content'];
                    }
                    ?>








                    </div>
                </div>
            </div>
        </div>
    </div>







<?php
include("resources/templates/frontend/footer.php");
?>