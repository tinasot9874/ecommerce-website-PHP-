<?php
require_once ("resources/config.php");
include("resources/templates/frontend/header.php");
?>

    <div id="main">
        <div class="section section-bg-10 pt-11 pb-17">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h2 class="page-title text-center">Shop</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="section border-bottom pt-2 pb-2">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="breadcrumbs">
                            <li><a href="index.html">Home</a></li>
                            <li><a href="shortcodes.html">Shop</a></li>
                            <li>Product List</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="section pt-7 pb-7">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-md-push-3">
                        <div class="shop-filter">
                            <div class="col-md-6">
                                <p class="result-count"> Showing 1–12 of 23 results</p>
                            </div>
                            <div class="col-md-6">
                                <div class="shop-filter-right">
                                    <div class="switch-view">
                                        <a href="shop-list.html" class="switcher active" data-toggle="tooltip" data-placement="top" title="" data-original-title="List"><i class="ion-navicon"></i></a>
                                        <a href="shop.html" class="switcher" data-toggle="tooltip" data-placement="top" title="" data-original-title="Grid"><i class="ion-grid"></i></a>
                                    </div>
                                    <form class="commerce-ordering">
                                        <select name="orderby" class="orderby">
                                            <option value="">Sort by popularity</option>
                                            <option value="">Sort by average rating</option>
                                            <option value="" selected="selected">Sort by newness</option>
                                            <option value="">Sort by price: low to high</option>
                                            <option value="">Sort by price: high to low</option>
                                        </select>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="category-carousel-2 mb-3" data-auto-play="true" data-desktop="3" data-laptop="3" data-tablet="2" data-mobile="1">
                            <div class="cat-item">
                                <div class="cats-wrap" data-bg-color="#f8c9c2">
                                    <a href="#">
                                        <img src="images/category/cate_7.png" alt="" />
                                        <h2 class="category-title">
                                            Dried <mark class="count">(6)</mark>
                                        </h2>
                                    </a>
                                </div>
                            </div>
                            <div class="cat-item">
                                <div class="cats-wrap" data-bg-color="#ebd3c3">
                                    <a href="#">
                                        <img src="images/category/cate_5.png" alt="" />
                                        <h2 class="category-title">
                                            Fruiy <mark class="count">(5)</mark>
                                        </h2>
                                    </a>
                                </div>
                            </div>
                            <div class="cat-item">
                                <div class="cats-wrap" data-bg-color="#c6e6f6">
                                    <a href="#">
                                        <img src="images/category/cate_9.png" alt="" />
                                        <h2 class="category-title">
                                            Juice <mark class="count">(6)</mark>
                                        </h2>
                                    </a>
                                </div>
                            </div>
                            <div class="cat-item">
                                <div class="cats-wrap" data-bg-color="#e0d1a1">
                                    <a href="#">
                                        <img src="images/category/cate_6.png" alt="" />
                                        <h2 class="category-title">
                                            Vegetables <mark class="count">(6)</mark>
                                        </h2>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="product-list">
                            <div class="product-item">
                                <div class="col-md-4 pl-0">
                                    <div class="product-thumb">
                                        <a href="shop-detail.html">
                                            <div class="badges">
                                                <span class="hot">Hot</span>
                                                <span class="onsale">Sale!</span>
                                            </div>
                                            <img src="images/shop/shop_1.jpg" alt="" />
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="product-info">
                                        <a href="shop-detail.html">
                                            <h2 class="title">Orange Juice</h2>
                                            <span class="price">
														<del>$15.00</del>
														<ins>$12.00</ins>
													</span>
                                        </a>
                                        <div class="product-rating">
                                            <div class="star-rating">
                                                <span style="width:100%"></span>
                                            </div>
                                            <i>(2 customer reviews)</i>
                                        </div>
                                        <div class="product-desc">
                                            <p>Relish the goodness of hand-picked oranges from the finest orchards. Foster a healthy lifestyle with the benefits of oranges. 100 percent orange juice with no added sugar for a healthy you.</p>
                                        </div>
                                        <div class="product-action-list">
                                            <a class="organik-btn small" href="#"> ADD TO CART </a>
                                            <span class="wishlist">
														<a href="#" data-toggle="tooltip" data-placement="top" title="Add to wishlist"></a>
													</span>
                                            <span class="quickview">
														<a href="#" data-toggle="tooltip" data-placement="top" title="Quickview"></a>
													</span>
                                            <span class="compare">
														<a href="#" data-toggle="tooltip" data-placement="top" title="Compare"></a>
													</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-item">
                                <div class="col-md-4 pl-0">
                                    <div class="product-thumb">
                                        <a href="shop-detail.html">
                                            <div class="badges">
                                                <span class="hot">Hot</span>
                                            </div>
                                            <img src="images/shop/shop_2.jpg" alt="" />
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="product-info">
                                        <a href="shop-detail.html">
                                            <h2 class="title">Aurore Grape</h2>
                                            <span class="price">$9.00</span>
                                        </a>
                                        <div class="product-rating">
                                            <div class="star-rating">
                                                <span style="width:70%"></span>
                                            </div>
                                            <i>(5 customer reviews)</i>
                                        </div>
                                        <div class="product-desc">
                                            <p>Relish the goodness of hand-picked oranges from the finest orchards. Foster a healthy lifestyle with the benefits of oranges. 100 percent orange juice with no added sugar for a healthy you.</p>
                                        </div>
                                        <div class="product-action-list">
                                            <a class="organik-btn small" href="#"> ADD TO CART </a>
                                            <span class="wishlist">
														<a href="#" data-toggle="tooltip" data-placement="top" title="Add to wishlist"></a>
													</span>
                                            <span class="quickview">
														<a href="#" data-toggle="tooltip" data-placement="top" title="Quickview"></a>
													</span>
                                            <span class="compare">
														<a href="#" data-toggle="tooltip" data-placement="top" title="Compare"></a>
													</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-item">
                                <div class="col-md-4 pl-0">
                                    <div class="product-thumb">
                                        <a href="shop-detail.html">
                                            <div class="badges">
                                                <span class="hot">Hot</span>
                                            </div>
                                            <img src="images/shop/shop_3.jpg" alt="" />
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="product-info">
                                        <a href="shop-detail.html">
                                            <h2 class="title">Blueberry Jam</h2>
                                            <span class="price">$12.00</span>
                                        </a>
                                        <div class="product-rating">
                                            <div class="star-rating">
                                                <span style="width:80%"></span>
                                            </div>
                                            <i>(5 customer reviews)</i>
                                        </div>
                                        <div class="product-desc">
                                            <p>Relish the goodness of hand-picked oranges from the finest orchards. Foster a healthy lifestyle with the benefits of oranges. 100 percent orange juice with no added sugar for a healthy you.</p>
                                        </div>
                                        <div class="product-action-list">
                                            <a class="organik-btn small" href="#"> ADD TO CART </a>
                                            <span class="wishlist">
														<a href="#" data-toggle="tooltip" data-placement="top" title="Add to wishlist"></a>
													</span>
                                            <span class="quickview">
														<a href="#" data-toggle="tooltip" data-placement="top" title="Quickview"></a>
													</span>
                                            <span class="compare">
														<a href="#" data-toggle="tooltip" data-placement="top" title="Compare"></a>
													</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-item">
                                <div class="col-md-4 pl-0">
                                    <div class="product-thumb">
                                        <a href="shop-detail.html">
                                            <img src="images/shop/shop_4.jpg" alt="" />
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="product-info">
                                        <a href="shop-detail.html">
                                            <h2 class="title">Passionfruit</h2>
                                            <span class="price">$35.00</span>
                                        </a>
                                        <div class="product-rating">
                                            <div class="star-rating">
                                                <span style="width:50%"></span>
                                            </div>
                                            <i>(3 customer reviews)</i>
                                        </div>
                                        <div class="product-desc">
                                            <p>Relish the goodness of hand-picked oranges from the finest orchards. Foster a healthy lifestyle with the benefits of oranges. 100 percent orange juice with no added sugar for a healthy you.</p>
                                        </div>
                                        <div class="product-action-list">
                                            <a class="organik-btn small" href="#"> ADD TO CART </a>
                                            <span class="wishlist">
														<a href="#" data-toggle="tooltip" data-placement="top" title="Add to wishlist"></a>
													</span>
                                            <span class="quickview">
														<a href="#" data-toggle="tooltip" data-placement="top" title="Quickview"></a>
													</span>
                                            <span class="compare">
														<a href="#" data-toggle="tooltip" data-placement="top" title="Compare"></a>
													</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-item">
                                <div class="col-md-4 pl-0">
                                    <div class="product-thumb">
                                        <a href="shop-detail.html">
                                            <div class="badges">
                                                <span class="hot">Hot</span>
                                            </div>
                                            <img src="images/shop/shop_5.jpg" alt="" />
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="product-info">
                                        <a href="shop-detail.html">
                                            <h2 class="title">Carrot</h2>
                                            <span class="price">$12.00</span>
                                        </a>
                                        <div class="product-rating">
                                            <div class="star-rating">
                                                <span style="width:90%"></span>
                                            </div>
                                            <i>(3 customer reviews)</i>
                                        </div>
                                        <div class="product-desc">
                                            <p>Relish the goodness of hand-picked oranges from the finest orchards. Foster a healthy lifestyle with the benefits of oranges. 100 percent orange juice with no added sugar for a healthy you.</p>
                                        </div>
                                        <div class="product-action-list">
                                            <a class="organik-btn small" href="#"> ADD TO CART </a>
                                            <span class="wishlist">
														<a href="#" data-toggle="tooltip" data-placement="top" title="Add to wishlist"></a>
													</span>
                                            <span class="quickview">
														<a href="#" data-toggle="tooltip" data-placement="top" title="Quickview"></a>
													</span>
                                            <span class="compare">
														<a href="#" data-toggle="tooltip" data-placement="top" title="Compare"></a>
													</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-item">
                                <div class="col-md-4 pl-0">
                                    <div class="product-thumb">
                                        <a href="shop-detail.html">
                                            <span class="outofstock"><span>Out</span>of stock</span>
                                            <img src="images/shop/shop_6.jpg" alt="" />
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="product-info">
                                        <a href="shop-detail.html">
                                            <h2 class="title">Sprouting Broccoli</h2>
                                            <span class="price">$6.00</span>
                                        </a>
                                        <div class="product-rating">
                                            <div class="star-rating">
                                                <span style="width:90%"></span>
                                            </div>
                                            <i>(3 customer reviews)</i>
                                        </div>
                                        <div class="product-desc">
                                            <p>Relish the goodness of hand-picked oranges from the finest orchards. Foster a healthy lifestyle with the benefits of oranges. 100 percent orange juice with no added sugar for a healthy you.</p>
                                        </div>
                                        <div class="product-action-list">
                                            <a class="organik-btn small" href="#"> ADD TO CART </a>
                                            <span class="wishlist">
														<a href="#" data-toggle="tooltip" data-placement="top" title="Add to wishlist"></a>
													</span>
                                            <span class="quickview">
														<a href="#" data-toggle="tooltip" data-placement="top" title="Quickview"></a>
													</span>
                                            <span class="compare">
														<a href="#" data-toggle="tooltip" data-placement="top" title="Compare"></a>
													</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pagination">
                            <a class="prev page-numbers" href="#">Prev</a>
                            <a class="page-numbers" href="#">1</a>
                            <span class="page-numbers current">2</span>
                            <a class="page-numbers" href="#">3</a>
                            <a class="next page-numbers" href="#">Next</a>
                        </div>
                    </div>
                    <div class="col-md-3 col-md-pull-9">
                        <div class="sidebar">
                            <div class="widget widget-product-search">
                                <form class="form-search">
                                    <input type="text" class="search-field" placeholder="Search products…" value="" name="s" />
                                    <input type="submit" value="Search" />
                                </form>
                            </div>
                            <div class="widget widget-product-categories">
                                <h3 class="widget-title">Product Categories</h3>
                                <ul class="product-categories">
                                    <li><a href="#">Dried</a> <span class="count">6</span></li>
                                    <li><a href="#">Fruits</a> <span class="count">5</span></li>
                                    <li><a href="#">Juice</a> <span class="count">6</span></li>
                                    <li><a href="#">Vegetables</a> <span class="count">6</span></li>
                                </ul>
                            </div>
                            <div class="widget widget_price_filter">
                                <h3 class="widget-title">Filter by price</h3>
                                <div class="price_slider_wrapper">
                                    <div class="price_slider" style="display:none;"></div>
                                    <div class="price_slider_amount">
                                        <input type="text" id="min_price" name="min_price" value="" data-min="0" placeholder="Min price"/>
                                        <input type="text" id="max_price" name="max_price" value="" data-max="150" placeholder="Max price"/>
                                        <button type="submit" class="button">Filter</button>
                                        <div class="price_label" style="display:none;">
                                            Price: <span class="from"></span> &mdash; <span class="to"></span>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="widget widget-products">
                                <h3 class="widget-title">Products</h3>
                                <ul class="product-list-widget">
                                    <li>
                                        <a href="shop-detail.html">
                                            <img src="images/shop/thumb/shop_1.jpg" alt="" />
                                            <span class="product-title">Orange Juice</span>
                                        </a>
                                        <del>$15.00</del>
                                        <ins>$12.00</ins>
                                    </li>
                                    <li>
                                        <a href="shop-detail.html">
                                            <img src="images/shop/thumb/shop_2.jpg" alt="" />
                                            <span class="product-title">Aurore Grape</span>
                                        </a>
                                        <ins>$9.00</ins>
                                    </li>
                                    <li>
                                        <a href="shop-detail.html">
                                            <img src="images/shop/thumb/shop_3.jpg" alt="" />
                                            <span class="product-title">Blueberry Jam</span>
                                        </a>
                                        <ins>$15.00</ins>
                                    </li>
                                    <li>
                                        <a href="shop-detail.html">
                                            <img src="images/shop/thumb/shop_4.jpg" alt="" />
                                            <span class="product-title">Passionfruit</span>
                                        </a>
                                        <ins>$35.00</ins>
                                    </li>
                                    <li>
                                        <a href="shop-detail.html">
                                            <img src="images/shop/thumb/shop_5.jpg" alt="" />
                                            <span class="product-title">Carrot</span>
                                        </a>
                                        <ins>$12.00</ins>
                                    </li>
                                </ul>
                            </div>
                            <div class="widget widget-tags">
                                <h3 class="widget-title">Product Tags</h3>
                                <div class="tagcloud">
                                    <a href="#">bread</a> <a href="#">food</a> <a href="#">fruits</a> <a href="#">green</a> <a href="#">healthy</a> <a href="#">natural</a> <a href="#">organic store</a> <a href="#">vegatable</a>
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

