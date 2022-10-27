

        </style>
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                    <!-- BEGIN THEME PANEL -->
                    <div class="theme-panel">



                    </div>

                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <i class="icon-home"></i>
                                <a href="index.html">صفحه اصلی</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <span>صفحه اصلی</span>
                            </li>
                        </ul>

                    </div>
                    <!-- END PAGE HEADER-->
                    <!-- BEGIN DASHBOARD STATS 1-->
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="dashboard-stat blue">
                                <div class="visual">
                                    <i class="fa fa-comments"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <?php
                                        $result=$this->db->query("SELECT * from makateb");
                                         ?>
                                        <span data-counter="counterup" data-value="1349"><?=$result->num_rows();?></span>
                                    </div>
                                    <div class="desc"> مکاتیب </div>
                                </div>
                                <a class="more" href="<?=base_url()?>index.php/makatebController/index"><h4> بیشتر
                                   </h4> <i class="m-icon-swapright m-icon-white"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="dashboard-stat red">
                                <div class="visual">
                                    <i class="fa fa-bar-chart-o"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <?php
                                        $result=$this->db->query("SELECT * from araiz");
                                         ?>
                                        <span data-counter="counterup" data-value="12,5"><?=$result->num_rows();?></span> </div>
                                    <div class="desc"><h4>عرایض</h4></div>
                                </div>
                                <a class="more" href="<?=base_url()?>index.php/studentController/index"> <h4>بیشتر
                                   </h4> <i class="m-icon-swapright m-icon-white"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="dashboard-stat green">
                                <div class="visual">
                                    <i class="fa fa-shopping-cart"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <?php
                                        $result=$this->db->query("SELECT * from ahkam_wa_hedayat");
                                         ?>
                                        <span data-counter="counterup" data-value="549"><?=$result->num_rows()?></span>
                                    </div>
                                    <div class="desc"><h4>احکام</h4></div>
                                </div>
                                <a class="more" href="<?=base_url()?>index.php/borrowController/index"><h4> بیشتر</h4>
                                    <i class="m-icon-swapright m-icon-white"></i>
                                </a>
                            </div>
                        </div>

                    </div>
                      <link href="<?=base_url()?>assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />


                    <div class="row">
                        <div class="col-md-12 col-sm-6">
                            <!-- BEGIN PORTLET-->
                            <div class="portlet light calendar ">
                                <div class="portlet-title ">
                                    <div class="caption">
                                        <i class="icon-calendar font-green-sharp"></i>
                                        <span class="caption-subject font-green-sharp bold uppercase">جنتری</span>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div id="calendar"> </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6 col-sm-6">

                        </div>
                    </div>
                </div>
                <!-- END CONTENT BODY -->
            </div>

        <script src="<?=base_url()?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?=base_url()?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

        <script src="<?=base_url()?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>

        <script src="<?=base_url()?>assets/global/plugins/moment.min.js" type="text/javascript"></script>

        <script src="<?=base_url()?>assets/global/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>

        <script src="<?=base_url()?>assets/global/scripts/app.min.js" type="text/javascript"></script>

        <script src="<?=base_url()?>assets/pages/scripts/dashboard.min.js" type="text/javascript"></script>

        <script src="<?=base_url()?>assets/layouts/layout2/scripts/layout.min.js" type="text/javascript"></script>
        <script src="<?=base_url()?>assets/layouts/layout2/scripts/demo.min.js" type="text/javascript"></script>
        <script src="<?=base_url()?>assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
