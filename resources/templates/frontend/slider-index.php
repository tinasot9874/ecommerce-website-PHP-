<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 p-0">
                <div id="rev_slider" class="rev_slider fullscreenbanner">
                    <ul>
                        <?php $sql = "SELECT * FROM slide";
                            $result = query($sql);
                            confirm($result);
                            while ($row = fetch_array($result)):
                        ?>
                        <li data-transition="fade" data-slotamount="default" data-hideafterloop="0"
                            data-hideslideonmobile="off" data-easein="default" data-easeout="default"
                            data-masterspeed="300" data-rotate="0" data-saveperformance="off"
                            data-title="Slide">
                            <div  class="tp-caption rs-parallaxlevel-1"
                                 data-x="center" data-hoffset=""
                                 data-y="center" data-voffset="-120"
                                 data-width="['none','none','none','none']"
                                 data-height="['none','none','none','none']"
                                 data-type="image" data-responsive_offset="on"
                                 data-frames='[{"delay":0,"speed":1500,"frame":"0","from":"z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                                 data-textAlign="['inherit','inherit','inherit','inherit']"
                                 data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]"
                                 data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]">
                                <img class="img-fluid" src="resources/uploads/slides/<?php echo $row['slide_image']; ?>" alt=""/>
                            </div>
                        </li>
                        <?php endwhile; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

