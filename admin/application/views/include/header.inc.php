<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
	 <meta charset="utf-8" />
        <title>MIS</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <script src="<?=base_url()?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/bootstrap/css/bootstrap.min.css">
        <link href="<?=base_url()?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link rel="icon" href="<?=base_url()?>assets/img/log." type="image/ico">
        <link href="<?=base_url()?>assets/material/css/mdb.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>assets/global/plugins/bootstrap/css/bootstrap-rtl.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>assets/global/plugins/bootstrap-switch/css/bootstrap-switch-rtl.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap-rtl.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <link href="<?=base_url();?>assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>assets/global/plugins/icheck/skins/all.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>assets/global/css/components-md-rtl.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?=base_url()?>assets/global/css/plugins-md-rtl.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>assets/layouts/layout2/css/layout-rtl.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>assets/layouts/layout2/css/themes/blue-rtl.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="<?=base_url()?>assets/layouts/layout2/css/custom-rtl.min.css" rel="stylesheet" type="text/css" />
 </head>
<body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-md">
        <div class="page-header navbar navbar-fixed-top">
            <div class="page-header-inner ">
                <div class="page-logo">
                    <img src="<?php echo base_url()?>assets/img/jamiat_log.png" alt="" style="height: 67px; text-align: right; width: 195px; margin-right: -20px; margin-top: 0px;" class="logo-default"/>
                    <div class="menu-toggler sidebar-toggler">
                    </div>
                </div>
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
              
                <div class="page-actions">
                    <div class="btn-group">
                      <!--   <button type="button" class="btn btn-circle btn-outline red dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-plus"></i>&nbsp;
                            <span class="hidden-sm hidden-xs">جدید&nbsp;</span>&nbsp;
                            <i class="fa fa-angle-down"></i>
                        </button> -->
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="javascript:;">
                                    <i class="icon-docs"></i> پثت جدید </a>
                            </li>
                        
                        </ul>
                    </div>
                </div>
              
                <div class="page-top">
             
                    <form class="search-form search-form-expanded" action="" method="GET">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="جتسجو..." name="query">
                            <span class="input-group-btn">
                                <a href="javascript:;" class="btn submit">
                                    <i class="icon-magnifier"></i>
                                </a>
                            </span>
                        </div>
                    </form>
                
                    <div class="top-menu">
                        <ul class="nav navbar-nav pull-right">
                     
                            <li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <i class="icon-envelope-open"></i>
                                    <span class="badge badge-default"> 1 </span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="external">
                                        <h3>شما 
                                            <span class="bold">1 پیام</span> جدید دارید</h3>
                                        <a href="app_inbox.html">بیشتر</a>
                                    </li>
                                    <li>
                                        <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
                                            <li>
<!--                                                <a href="#">-->
<!--                                                    <span class=" img-circle">-->
<!--                                                        <img src="--><?//= base_url()?><!--assets/layouts/layout3/img/avatar2.jpg" class="img-circle" alt=""> </span>-->
<!--                                                    <span class="subject">-->
<!--                                                        <span class="from"> سارا </span>-->
<!--                                                        <span class="time">جدید </span>-->
<!--                                                    </span>-->
<!--                                                    <span class="message"> سلام چی حال دارن خوب هستین </span>-->
<!--                                                </a>-->
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown dropdown-user">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <img alt="" class="img-circle" style="width:40px ;" src="<?=base_url()?>assets/img/employee/female.jpg?>"/>
                                    <span class="username username-hide-on-mobile"><?=ucfirst($_SESSION['name'])." ".ucfirst($_SESSION['lname']);?></span>
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-default">
            
                                    <li>
                                        <a href="<?=base_url()?>index.php/logoutController/index">
                                            <i class="icon-key"></i> خروج </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
         </div>
        <div class="clearfix"> </div>
        <div class="page-container">
            <div class="page-sidebar-wrapper">
                <div class="page-sidebar navbar-collapse collapse">
                       <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-hover-submenu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">

                         <li class="nav-item <?php echo activate_menu('mainPageController');?>">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="fa fa-home"></i>
                                <span class="title">صفحه اصلی</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item start <?php echo activate_menu('mainPageController'); ?>">
                                    <a href="<?=base_url()?>index.php/mainPageController/index" class="nav-link nav-toggle">
                                        <span class="title">صقحه اصلی</span>
                                        <span class="arrow"></span>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <li class="nav-item <?php echo activate_menu('studentController');?>">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="fa fa-file-text-o"></i>
                                <span class="title">عرایض</span>

                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item start">
                                    <a href="<?=base_url()?>index.php/araizController/index" class="nav-link nav-toggle">
                                        <span class="title">عرایض موجود</span>

                                    </a>
                                </li>

                            </ul>
                        </li>
                         <li class="nav-item <?php echo activate_menu('makatebController');?>">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="fa fa-book"></i>
                                <span class="title">مکاتیب</span>

                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item ">
                                    <a href="<?=base_url()?>index.php/makatebController/index" class="nav-link nav-toggle">
                                        <span class="title">مکاتیب موجود</span>

                                    </a>
                                </li>

                              <li class="nav-item">
                                    <a href="<?=base_url()?>index.php/sadraController/index" class="nav-link nav-toggle">
                                        <span class="title">صادره</span>

                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?=base_url()?>index.php/wardaController/index" class="nav-link nav-toggle">
                                        <span class="title">وارده</span>

                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?=base_url()?>index.php/taqebiController/index" class="nav-link nav-toggle">
                                        <span class="title">تعقیبی</span>

                                    </a>
                                </li>

                            </ul>
                        </li>
                         <li class="nav-item <?php echo activate_menu('ahkamController');?>">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="fa fa-check"></i>
                                <span class="title">احکام و هدایات</span>
                                                            </a>
                                                            <ul class="sub-menu">
                                                                    <li class="nav-item start">
                                                                            <a href="<?=base_url()?>index.php/ahkamController/index" class="nav-link nav-toggle">
                                                                                    <span class="title">احکام</span>

                                                                            </a>
                                                                    </li>

                                                            </ul>
                                                    </li>






                        <?php if($_SESSION["privilege"] == "admin"):?>
                          <li class="nav-item <?php echo activate_menu('usersController'); ?>">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="fa fa-users"></i>
                                <span class="title">مدیریت استفاده کننده ها</span>

                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item">
                                    <a href="<?=base_url()?>index.php/usersController/index" class="nav-link nav-toggle">
                                        <span class="title">استفاده کنندها</span>

                                    </a>
                                </li>

                            </ul>
                        </li>
                        <?php endif?>
                     </ul>
                    <!-- END SIDEBAR MENU -->
                </div>
            </div>
            