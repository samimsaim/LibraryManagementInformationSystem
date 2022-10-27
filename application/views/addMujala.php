<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="<?=base_url()?>index.php/mainPageController/index">صفحه اصلی</a>
                    <i class="fa fa-angle-left"></i>
                </li>
                <li>
                    <a href="<?=base_url()?>index.php/mujalaController/index">مجلات</a>
                    <i class="fa fa-angle-left"></i>
                </li>
                <li>
                    <b>اضافه کردن  مجله</b>
                </li>
            </ul>
        </div>
        <div class="portlet light ">
            <div class="portlet-title">
                <div class="caption font-green-haze">
                    <i class="icon-user font-green-haze"></i>
                    <span class="caption-subject bold uppercase">اضافه کردن  مجله</span>
                </div>
                <div class="actions">
                    <a class="btn btn-circle green-meadow" href="<?=base_url()?>index.php/bookController/index" style="font-size: 16px;">
                        <i class="fa fa-share"></i>برگشت</a>
                    </a>
                </div>
            </div>
            <div class="portlet-body form" style="margin-right: 20px;">
                <form class="form-horizontal" method="post" action="<?=base_url()?>index.php/studentController/checkAddStudent" enctype="multipart/form-data">
                    <div class="form-body">
                    <div class="row">
                        <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_student_id)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold;">شماره مجله*</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="name" value="<?php if (!empty($Field_data['name'])) echo $Field_data['name']; ?>" placeholder="۴۳۳">
                                <div class="form-control-focus"></div>
                                <?php if(!empty($error_name)){?>
                                <span class="help-block-error" style="color:red;"><?=$error_name?></span>
                                <?php }?>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_last_name)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold">نام استاد*</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="father_name" value="<?php if (!empty($Field_data['father_name'])) echo $Field_data['father_name']; ?>" placeholder="احمد">
                                <div class="form-control-focus"></div>
                                <?php if(!empty($error_father_name)){?>
                                <span class="help-block-error" style="color:red;"><?=$error_father_name?></span>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                    
                        
                        <div class="row">
                        <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_dis)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold">پوهخی*</label>
                            <div class="col-md-9">
                                <select class="form-control" name="dis" id="dep">
                                    <option <?php if(!empty($Field_data['dis']) && $Field_data['dis'] == 0) echo ' selected '?> value="0">پوهخی</option>
                                </select>
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_dis)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_dis?></span>
                                <?php }?>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_area)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold">سال طبع*</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="area" value="<?php if (!empty($Field_data['area'])) echo $Field_data['area']; ?>" placeholder="۱۳۹۷/۶/۶">
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_area)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_area?></span>
                                <?php }?>
                            </div>
                        </div>
                        </div>
                        
                    
                        <div class="row">
                            <div class="col-md-offset-2 col-md-10">
                                <a href="<?=base_url()?>index.php/mujalaController/index" class="btn btn-circle yellow-gold">لغو</a>
                                <input type="submit" name="addStu" class="btn btn-circle green-meadow" value="ذخیره"/>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url();?>assets/global/plugins/angularjs/angular.min.js"></script>

<script>
    function getDepartment(){
        var facId = $("#fac").val();
        var department = document.getElementById("dep");
        $(department).empty();
        $(department).append('<option selected value='+0+'></option>');
        $.ajax({
            type: "POST",
            url: "<?=base_url();?>index.php/studentController/getDepartments",
            data: {facId:facId},
            dataType: "JSON",
            success: function(data) {
                for(var i = 0; i < data.length; i++){
                    $(department).append('<option value='+data[i]['dis_id']+'>'+data[i]['dis_name']+'</option>');
                }
            },
            error: function(err) {
            }
        });
    }
</script>