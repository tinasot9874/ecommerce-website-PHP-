<?php date_default_timezone_set("Asia/Ho_Chi_Minh"); ?>
<!doctype html>
<html lang="vi">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
    <meta name="Description"
          content="Đồ dùng văn phòng phẩm, Giấy A4, A5, A3, các loại,... Giao hàng tận nơi, khách hàng mua nhiều sẽ được hưởng chiết khấu ">
    <link rel="shortcut icon" href="images/favicon.ico"/>
    <title>Văn phòng phẩm Phạm Gia</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" media="all"/>
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" media="all"/>
    <link rel="stylesheet" href="css/ionicons.min.css" type="text/css" media="all"/>
    <link rel="stylesheet" href="css/owl.carousel.css" type="text/css" media="all"/>
    <link rel="stylesheet" href="css/owl.theme.css" type="text/css" media="all"/>
    <link rel='stylesheet' href='css/prettyPhoto.css' type='text/css' media='all'/>
    <link rel='stylesheet' href='css/slick.css' type='text/css' media='all'/>
    <link rel="stylesheet" href="css/settings.css" type="text/css" media="all"/>
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all"/>
    <link rel="stylesheet" href="css/custom.css" type="text/css" media="all"/>
    <link href="http://fonts.googleapis.com/css?family=Great+Vibes%7CLato:100,100i,300,300i,400,400i,700,700i,900,900i"
          rel="stylesheet"/>    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>    <![endif]-->
    <script src="https://kit.fontawesome.com/ce8f710565.js" crossorigin="anonymous"></script>
    <style>
        #topBtn {
            position: fixed;
            bottom: 40px;
            right: 40px;
            font-size: 22px;
            background: #3f3e3e;
            color: white;
            border: none;
            cursor: pointer;
            display: none;
            z-index: 999999;
        }
    </style>

</head>
<body>
<!--<div class="noo-spinner">-->
<!---->
<!--    <div class="spinner">-->
<!--        <div class="cube1"></div>-->
<!--        <div class="cube2"></div>-->
<!--    </div>-->
<!--</div>-->
<div id="menu-slideout" class="slideout-menu hidden-md-up">
    <!--    <div class="noo-spinner">-->
    <!--        <div class="spinner">-->
    <!--            <div class="cube1"></div>-->
    <!--            <div class="cube2"></div>-->
    <!--        </div>-->
    <!--    </div>-->
    <div class="mobile-menu">
        <ul id="mobile-menu" class="menu">
            <li><a href="../">Trang chủ</a></li>
            <li class="dropdown">
                <a href="#">Loại sản phẩm</a>
                <i class="sub-menu-toggle fa fa-angle-down"></i>
                <ul class="sub-menu">
                    <?php
                    $sql = "SELECT * FROM categories";
                    $result = query($sql);
                    confirm($result);
                    while ($row = fetch_array($result)):
                        ?>
                        <li>
                            <a href="shop-list.php?loai=<?php echo $row['slug']; ?>"><?php echo $row['cate_title']; ?></a>
                        </li>
                    <?php endwhile; ?>
                </ul>
            </li>
            <li>
                <form action="search.php" method="GET"><input type="text" id="search-mobile" name="search"
                                                              placeholder="Tìm kiếm sản phẩm..." required/>
                    <button class="search-mobile"><i class="ion-search"></i></button>
                </form>
            <div class="search-panel-mobile" id="result-mobile"></div>
            </li>
            <li class="track-order-mobile">
                <a data-toggle="modal" data-target="#exampleModalCenter" title="Theo dỗi đơn hàng">Kiểm tra đơn hàng<img src="images/order.png" alt="Tracking Order"></a>
            </li>
            <li><a href="contact.php">Liên hệ</a></li>
        </ul>
    </div>
</div>
<div class="site">
    <div class="topbar">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="topbar-text">
                        <span class="color: white">Hotline </span>
                        <span class="color: white">0867.463.878 – Phong</span>
                        <span class="color: white">0397.149.769 – Cường</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <header id="header" class="header header-desktop header-2">
        <div class="container">
            <div class="row">
                <div class="col-md-3"><a href="../" id="logo"> <img style="width: 175px;" class="logo-image img-fluid"
                                                                    src="images/logo-bg.png"
                                                                    alt="Phạm Gia"/> </a></div>
                <div class="col-md-9">
                    <div class="header-right">
                        <nav class="menu">
                            <ul class="main-menu">
                                <li><a href="../">Trang chủ</a></li>
                                <li class="dropdown">
                                    <a href="#">Loại sản phẩm</a>
                                    <ul class="sub-menu">
                                        <?php $sql = "SELECT * FROM categories ORDER BY cate_id ASC";
                                              $result = query($sql);
                                              confirm($result);
                                              while ($row = fetch_array($result)):?>
                                        <li class="col-xs-4">
                                            <a href="shop-list.php?loai=<?php echo $row['slug']; ?>"><?php echo $row['cate_title']; ?></a>
                                        </li>

                                        <?php endwhile; ?>
                                    </ul>
                                </li>
                                <li><a href="policy.php">Chính sách</a></li>
                                <li><a href="contact.php">Liên hệ</a></li>
                            </ul>
                        </nav>
                        <div class="btn-wrap">
                            <div class="mini-cart-wrap">
                                <div class="widget-shopping-cart-content">
                                    <ul class="cart-list">
                                        <?php
                                        $count = 0;
                                        $total_price = 0;
                                        $final_price = 0;
                                        foreach ($_SESSION as $name => $value) {
                                            if (substr($name, 0, 8) == "product_" && $value > 0) {
                                                $count++;
                                                $id = substr($name, 8);
                                                $sql = "SELECT * FROM products, categories WHERE product_category_id = cate_id AND product_id = " . escape_string($id) . " ";
                                                $result = query($sql);

                                                while ($row = fetch_array($result)):

                                                    ?>
                                                    <li>
                                                        <a href="cart-functions.php?delete=<?php echo $row['product_id'] ?>"
                                                           class="remove">×</a> 
                                                           <a href="item.php?ten=<?php echo $row['product_slug']; ?>&loai=<?php echo $row['slug'] ?>">
                                                            <img class="img-responsive"
                                                                 src="resources/uploads/<?php echo $row['product_image']; ?>"
                                                                 alt="<?php echo $row['product_title']; ?>"/> <?php echo $row['product_title']; ?>
                                                            &nbsp;
                                                        </a>
                                                        <span class="quantity"><?php echo $value; ?> × <?php if ($row['product_sale'] > 0) {
                                                                $price = $row['product_sale'];
                                                                $final_price = $price * $value;
                                                                echo product_price($price);
                                                            } else {
                                                                $price = $row['product_price'];
                                                                $final_price = $price * $value;
                                                                echo product_price($price);
                                                            } ?>
                                                        </span>
                                                    </li>
                                                <?php endwhile; ?>
                                                <?php
                                                $total_price += $final_price;
                                                $_SESSION['total_price'] = $total_price;
                                                if ($total_price >= 500000) {
                                                    $final_price_ship = $total_price;
                                                } else {
                                                    $final_price_ship = $total_price + 20000;
                                                }
                                                $_SESSION['final_price_ship'] = $final_price_ship;
                                            }
                                        }
                                        $_SESSION['count'] = $count;
                                        if ($count == 0) {
                                            echo "Giỏ hàng rỗng! Vui lòng thêm sản phẩm vào giỏ.";
                                            unset($_SESSION['final_price_ship']);
                                            unset($_SESSION['total_price']);
                                        }
                                        ?>

                                    </ul>
                                    <p class="total" style="font-family: Roboto;"><strong>Tổng giá:</strong>
                                        <span class="amount"><?php echo product_price($total_price); ?></span>
                                    </p>
                                    <?php if ($total_price < 500000) {
                                        $freeship = 500000 - $total_price;
                                        $freeships = product_price($freeship);
                                        echo "<span style='font-size: 15.7px; font-weight: 700; font-family: Roboto; float: left;' class='freeship'>Mua thêm <span style='color: #5fbd74;'> {$freeships} </span> để được giao hàng miễn phí!";
                                    } else {
                                        echo "<span style='font-size: 21px; font-weight: 700; font-family: Roboto; float: left; padding-left: 39px; ' class='text-center'>Bạn đã được giao hàng miễn phí </span>";
                                    }
                                    ?></span>
                                    <p class="buttons">
                                        <a href="cart.php" class="view-cart">Giỏ hàng</a>
                                        <?php if ($count > 0)
                                            echo "<a href='checkout.php' class='checkout'>Thanh toán</a>";
                                        ?>
                                    </p>
                                </div>
                                <div class="mini-cart">
                                    <div class="mini-cart-icon" data-count="<?php echo $count; ?>"><i
                                                class="ion-bag"></i></div>
                                </div>

                            </div>
                            <div class="top-search-btn-wrap">
                                <div class="top-search-btn"><a href="javascript:void(0);"> <i class="ion-search"></i>
                                    </a></div>
                            </div>
                            <div class="track-order">
                                <a data-toggle="modal" data-target="#exampleModalCenter" title="Theo dỗi đơn hàng"><img style="width:25px;"
                                                                                        src="images/order.png"
                                                                                        alt="Tracking Order"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="top-search">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <form action="search.php" method="GET">
                            <input id="search-desktop" type="search" class="top-search-input" name="search"
                                   placeholder="Tìm tên sản phẩm,..."/>
                        </form>
                        <div class="search-panel-desktop">
                            <ul id="result-desktop">

                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </header>
    <header class="header header-mobile">
        <div class="container">
            <div class="row">
                <div class="col-xs-2">
                    <div class="header-left">
                        <div id="open-left"><i class="ion-navicon"></i></div>
                    </div>
                </div>
                <div class="col-xs-8">
                    <div class="header-center"><a href="../" id="logo-2"> <img class="logo-image"
                                                                               src="images/logo-bg.png"
                                                                               alt="PhamGia Logo"/> </a></div>
                </div>
                <div class="col-xs-2">
                    <div class="header-right">
                        <div class="mini-cart-wrap"><a href="cart.php">
                                <div class="mini-cart">
                                    <div class="mini-cart-icon" data-count="<?php echo $count; ?>"><i
                                                class="ion-bag"></i></div>
                                </div>
                            </a></div>
                    </div>
                </div>
            </div>
        </div>
    </header>