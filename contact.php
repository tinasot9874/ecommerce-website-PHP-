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
                            <li>Liên hệ với chúng tôi</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="section pt-10 pb-10">
            <div class="container">
                <div class="row mb-3">
                    <div class="col-sm-12">
                        <div style="height: 500px; width: 100%;" id="map">

                        </div>
                    </div>
                </div>
<!--                <div class="row">-->
<!--                    <div class="col-sm-12">-->
<!--                        <div id="googleMap" class="mb-6" data-icon="images/icon_location.png" data-lat="37.789133" data-lon="-122.402158"></div>-->
<!--                    </div>-->
<!--                </div>-->
                <div class="row mt-3">
                    <div class="col-sm-3">
                        <div class="contact-info">
                            <div class="contact-icon">
                                <i class="fa fa-map-marker"></i>
                            </div>
                            <div class="contact-inner">
                                <h6 class="contact-title"> VPĐD</h6>
                                <div class="contact-content">
                                    49 Đường số 42, P. Hiệp Bình Chánh, Q. Thủ Đức, TP. HCM
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="contact-info">
                            <div class="contact-icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="contact-inner">
                                <h6 class="contact-title"> Hotline</h6>
                                <div class="contact-content">
                                    <p>0867.463.878 <span>–</span> Phong</p>
                                    <p>0397.149.769 <span>–</span> Cường</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="contact-info">
                            <div class="contact-icon">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <div class="contact-inner">
                                <h6 class="contact-title"> Liên hệ qua Email</h6>
                                <div class="contact-content">
                                    PhamgiaStationery@gmail.com
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="contact-info">
                            <div class="contact-icon">
                                <i class="fa fa-globe"></i>
                            </div>
                            <div class="contact-inner">
                                <h6 class="contact-title"> Website</h6>
                                <div class="contact-content">
                                    VppPhamgia.com
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>



<script>
    function initMap() {
        var location = {lat: 10.836990, lng: 106.729370};
        var map = new google.maps.Map(document.getElementById("map"), {
            zoom: 15,
            center: location
        });
        var marker = new google.maps.Marker({
            position: location,
            map: map
        });
    }
</script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAdugR6_EMDAylhBNNtGu2pUcudlzKiaBs&callback=initMap"
            type="text/javascript"></script>


<?php
include("resources/templates/frontend/footer.php");
?>