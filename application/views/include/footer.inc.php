       <!--Newsletter Area Start-->
            <div class="newsletter-area">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-7 col-md-7">
                            <div class="newsletter-form angle">

                                <div class="mailchimp-alerts text-centre fix pull-right">
                                    <div class="mailchimp-submitting"></div>
                                    <!-- mailchimp-submitting end -->
                                    <div class="mailchimp-success"></div>
                                    <!-- mailchimp-success end -->
                                    <div class="mailchimp-error"></div>
                                    <!-- mailchimp-error end -->
                                </div>
                                <!-- mailchimp-alerts end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End of Newsletter Area-->
            <!--Footer Widget Area Start-->
            <div class="footer-widget-area">
                <div class="container">
                    <div class="row">
                      
                        <?php
                                $this->db->from('address');
                                $data=$this->db->get()->result();
                                foreach($data as $row){}
                         ?>
                        <div class="col-lg-3 col-md-6">
                            <div class="single-footer-widget">
                                <h3>تماس با ما</h3>
                                <a href="tel:555-555-1212"><i class="fa fa-phone"></i><?=$row->phone?></a>
                                <span><i class="fa fa-envelope"></i><?=$row->email?></span>
                                <span><i class="fa fa-globe"></i>www.kpu.edu.af</span>
                                <span><i class="fa fa-map-marker"></i><?=$row->address?></span>
                            </div>
                        </div>
                         <?php
                                $this->db->from('time');
                                $data=$this->db->get()->result();

                         ?>
                        <div class="col-lg-3 col-md-6">
                            <div class="single-footer-widget">
                                <h3>اوقات کاری</h3>
                                <ul class="footer-list">
                                    <?php foreach($data as $key){ ?>
                                    <li><a href="#"><?=$key->day?>  , <?=$key->time?></a></li>
                                    <?php }?>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="single-footer-widget">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End of Footer Widget Area-->
            <!--Footer Area Start-->
            <footer class="footer-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-7 col-12">

                            <div class="social-icons">
                                <a href="#"><i class="zmdi zmdi-facebook"></i></a>
                                <a href="#"><i class="zmdi zmdi-rss"></i></a>
                                <a href="#"><i class="zmdi zmdi-google-plus"></i></a>
                                <a href="#"><i class="zmdi zmdi-pinterest"></i></a>
                                <a href="#"><i class="zmdi zmdi-instagram"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-5 col-12">

                        </div>
                    </div>
                </div>
            </footer>
            <!--End of Footer Area-->
        </div>
        <!--End of Bg White-->
    </div>
    <!--End of Main Wrapper Area-->

     <!-- Color Switcher -->
    <div class="ec-colorswitcher">
        <a class="ec-handle" href="#"><i class="zmdi zmdi-settings"></i></a>
        <h3>Style Switcher</h3>
        <div class="ec-switcherarea">
            <h6>Select Layout</h6>
            <div class="layout-btn">
                <a href="#" class="ec-boxed"><span>Boxed</span></a>
                <a href="#" class="ec-wide"><span>Wide</span></a>
            </div>
            <h6>Chose Color</h6>
            <ul class="ec-switcher">
                <li><a href="#" class="cs-color-1 styleswitch" data-rel="color-one"></a></li>
                <li><a href="#" class="cs-color-2 styleswitch" data-rel="color-two"></a></li>
                <li><a href="#" class="cs-color-3 styleswitch" data-rel="color-three"></a></li>
                <li><a href="#" class="cs-color-4 styleswitch" data-rel="color-four"></a></li>
                <li><a href="#" class="cs-color-5 styleswitch" data-rel="color-five"></a></li>
                <li><a href="#" class="cs-color-6 styleswitch" data-rel="color-six"></a></li>
                <li><a href="#" class="cs-color-7 styleswitch" data-rel="color-seven"></a></li>
                <li><a href="#" class="cs-color-8 styleswitch" data-rel="color-eight"></a></li>
                <li><a href="#" class="cs-color-9 styleswitch" data-rel="color-nine"></a></li>
                <li><a href="#" class="cs-color-10 styleswitch" data-rel="color-ten"></a></li>
            </ul>
            <div class="ec-pattren">
                <h6>Chose Pattren</h6>
                <div class="pattren-wrap">
                    <a href="#" data-rel="pattren1" class="styleswitch"><img src="<?=base_url()?>assets/img/ec-pattren/pattren1.jpg" alt=""></a>
                    <a href="#" data-rel="pattren2" class="styleswitch"><img src="<?=base_url()?>assets/img/ec-pattren/pattren2.jpg" alt=""></a>
                    <a href="#" data-rel="pattren3" class="styleswitch"><img src="<?=base_url()?>assets/img/ec-pattren/pattren3.jpg" alt=""></a>
                    <a href="#" data-rel="pattren4" class="styleswitch"><img src="<?=base_url()?>assets/img/ec-pattren/pattren4.jpg" alt=""></a>
                    <a href="#" data-rel="pattren5" class="styleswitch"><img src="<?=base_url()?>assets/img/ec-pattren/pattren5.jpg" alt=""></a>
                </div>
            </div>
            <div class="ec-background">
                <h6>Chose Background</h6>
                <div class="background-wrap">
                    <a href="#" data-rel="background1" class="styleswitch"><img src="<?=base_url()?>assets/img/ec-background/bg-1.jpg" alt=""></a>
                    <a href="#" data-rel="background2" class="styleswitch"><img src="<?=base_url()?>assets/img/ec-background/bg-2.jpg" alt=""></a>
                    <a href="#" data-rel="background3" class="styleswitch"><img src="<?=base_url()?>assets/img/ec-background/bg-3.jpg" alt=""></a>
                    <a href="#" data-rel="background4" class="styleswitch"><img src="<?=base_url()?>assets/img/ec-background/bg-4.jpg" alt=""></a>
                    <a href="#" data-rel="background5" class="styleswitch"><img src="<?=base_url()?>assets/img/ec-background/bg-5.jpg" alt=""></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Color Switcher end -->




    <!-- jquery
        ============================================ -->
    <script src="<?=base_url()?>assets/js/vendor/jquery-1.12.4.min.js"></script>

    <!-- popper JS
        ============================================ -->
    <script src="<?=base_url()?>assets/js/popper.min.js"></script>

    <!-- bootstrap JS
        ============================================ -->
    <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>

    <!-- AJax Mail JS
        ============================================ -->
    <script src="<?=base_url()?>assets/js/ajax-mail.js"></script>

    <!-- plugins JS
        ============================================ -->
    <script src="<?=base_url()?>assets/js/plugins.js"></script>

    <!-- StyleSwitch JS
        ============================================ -->
    <script src="<?=base_url()?>assets/js/styleswitch.js"></script>

    <!-- main JS
        ============================================ -->
    <script src="<?=base_url()?>assets/js/main.js"></script>
</body>

</html>
