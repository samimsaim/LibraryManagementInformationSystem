<!DOCTYPE html>
<html lang="en" dir="rtl">
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title>LIBRARY MANAGEMENT SYSTEM KPU</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
         <script src="<?= base_url()?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <link href="<?= base_url()?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url()?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url()?>assets/global/plugins/bootstrap/css/bootstrap-rtl.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url()?>assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?= base_url()?>assets/global/css/components-md-rtl.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="<?= base_url()?>assets/pages/css/login-4-rtl.min.css" rel="stylesheet" type="text/css" />
      <script type="text/javascript">
            $(document).ready(function () {
                $('[data-toggle="tooltip"]').tooltip('show');
            });
        </script>
        <style>
            .tooltip-inner{
                background-color: #ffffff !important;
            }
            .error{
                border-color: #ffffff;
            }
        </style>
 </head>
    <!-- END HEAD -->
    <body class="login" style="background:url(<?=base_url()?>assets/img/60.jpg) no-repeat top center fixed;background-size: cover;">
        <!-- BEGIN LOGO -->
        <div class="logo">
            <a href="<?=base_url()?>index.php/loginController/index">
                <img style="width:140px; margin-top:10px; margin-bottom:-20px" src="<?= base_url()?>assets/img/logo.png" alt="" /> </a>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN LOGIN -->
        <div class="content">
            <!-- BEGIN LOGIN FORM -->
           <?php 
           $this->load->helper('form');
           echo form_open('loginController/auth')?>
                <h3 class="form-title" style="text-align:center; ">ورود به سیستم</h3>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">نام کاربری</label>
                    <div class="input-icon">
                        <i class="fa fa-user"></i>
                        <input class="form-control placeholder-no-fix <?php if(!empty($Error['error_user'])) echo 'error';?>" type="text"  placeholder="نام کاربری" name="username"   value="<?php if(isset($Error) && empty($Error['error_user'])) echo $data['username']; else echo ''; ?>" data-toggle="tooltip" title="<?php echo (!empty($Error['error_user'])) ? $Error['error_user'] : ''; ?>" data-placement="top" /> </div>
                </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">رمز عبور</label>
                    <div class="input-icon">
                        <i class="fa fa-lock"></i>
                        <input class="form-control placeholder-no-fix <?php if(!empty($Error['error_pass'])) echo 'error';?>" type="password" autocomplete="off" placeholder="رمز عبور" name="password" data-toggle="tooltip" title="<?php echo (!empty($Error['error_pass'])) ? $Error['error_pass'] : ''; ?>" data-placement="top" /> </div>
                </div>
                <div class="form-actions">
                    <label class="checkbox">
                        <input type="checkbox" name="remember" value="1" />مرا به خاطر بسپار!</label>
                    <input type="submit" name="login" value="ورود" class="btn green pull-right">
                </div>
          <?php echo form_close();?>
            <!-- END REGISTRATION FORM -->
        </div>
        <!-- BEGIN CORE PLUGINS -->
        <script src="<?= base_url()?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?= base_url()?>assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?= base_url()?>assets/global/scripts/app.min.js" type="text/javascript"></script>
    </body>
</html>
<?php if (isset($error)) { ?>
    <div id="warning" class="modal fade " role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title" style="color:#ffbb33;">خطا !</h3>
                </div>
                <div class="modal-body error">
                    <p style="color: red; font-size:18px">اسم کاربری یا رمز عبور شما اشتباه است: </p>
                </div>
                <div class="modal-footer">
                    <a href="<?php echo base_url()?>index.php/login" data-dismiss="modal" aria-label="Close" class="btn btn-warning">کوشش دوباره</a>
                </div>
            </div>
        </div>
    </div>
    <!-- ======================================================== -->
    <script type="text/javascript">
        $(window).load(function () {
            $('#warning').modal('show');
        });
    </script>
<?php } ?>















