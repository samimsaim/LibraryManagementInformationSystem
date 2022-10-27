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
                    <a href="<?=base_url()?>index.php/bookController/index">کتاب ها</a>
                    <i class="fa fa-angle-left"></i>
                </li>
                <li>
                    <b>اضافه کردن  کتاب</b>
                </li>
            </ul>
        </div>
        <div class="portlet light ">
            <div class="portlet-title">
                <div class="caption font-green-haze">
                    <i class="icon-user font-green-haze"></i>
                    <span class="caption-subject bold uppercase">اضافه کردن  کتاب</span>
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
                            <label class="col-md-3 control-label" style="font-weight: bold;">شماره ثبت*</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="name" value="<?php if (!empty($Field_data['name'])) echo $Field_data['name']; ?>" placeholder="۴۳۳">
                                <div class="form-control-focus"></div>
                                <?php if(!empty($error_name)){?>
                                <span class="help-block-error" style="color:red;"><?=$error_name?></span>
                                <?php }?>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_last_name)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold">تاریخ ثبت*</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="father_name" value="<?php if (!empty($Field_data['father_name'])) echo $Field_data['father_name']; ?>" placeholder="۱۳۹۸/۳/۲">
                                <div class="form-control-focus"></div>
                                <?php if(!empty($error_father_name)){?>
                                <span class="help-block-error" style="color:red;"><?=$error_father_name?></span>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_grand_father_name)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold">عنوان کتاب*</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="id" value="<?php if (!empty($Field_data['id'])) echo $Field_data['grand_father_name']; ?>" placeholder="ریاضیات">
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_id)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_id?></span>
                                <?php }?>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_area)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold">ویرایش*</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="area" value="<?php if (!empty($Field_data['area'])) echo $Field_data['area']; ?>" placeholder="ویرایش">
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_area)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_area?></span>
                                <?php }?>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                         <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_province)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold">موًلف*</label>
                            <div class="col-md-9">
                                <select class="form-control" name="faculty" onchange="getDepartment()" id="fac">
                                    <option <?php if(!empty($Field_data['province']) && $Field_data['province'] == 0) echo ' selected '?> value="0">موًلف</option>
                                    <?php foreach ($fac as $row) { ?>
                                    <option <?php if(!empty($Field_data['province']) && $Field_data['province'] == $row->prov_id) echo ' selected '?> value="<?=$row->prov_id?>"><?=$row->prove_name?></option>
                                    <?php }?>
                                </select>
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_province)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_province?></span>
                                <?php }?>
                            </div>
                        </div>
                         <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_dis)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold">مترجم*</label>
                            <div class="col-md-9">
                                <select class="form-control" name="dis" id="dep">
                                    <option <?php if(!empty($Field_data['dis']) && $Field_data['dis'] == 0) echo ' selected '?> value="0">مترجم</option>
                                </select>
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_dis)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_dis?></span>
                                <?php }?>
                            </div>
                        </div>
                            </div>
                        <div class="row">
                        <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_dis)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold">ناشر*</label>
                            <div class="col-md-9">
                                <select class="form-control" name="dis" id="dep">
                                    <option <?php if(!empty($Field_data['dis']) && $Field_data['dis'] == 0) echo ' selected '?> value="0">ناشر</option>
                                </select>
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_dis)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_dis?></span>
                                <?php }?>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_area)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold">تعداد جلد*</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="area" value="<?php if (!empty($Field_data['area'])) echo $Field_data['area']; ?>" placeholder="۷۸">
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_area)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_area?></span>
                                <?php }?>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_grand_father_name)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold">تعداد صفخه*</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="id" value="<?php if (!empty($Field_data['id'])) echo $Field_data['grand_father_name']; ?>" placeholder="۸۰">
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_id)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_id?></span>
                                <?php }?>
                            </div>
                        </div>
                       <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_dis)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold">نوعیت خریداری*</label>
                            <div class="col-md-9">
                                <select class="form-control" name="dis" id="dep">
                                    <option <?php if(!empty($Field_data['dis']) && $Field_data['dis'] == 0) echo ' selected '?> value="0">نوعیت خریداری</option>
                                </select>
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_dis)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_dis?></span>
                                <?php }?>
                            </div>
                        </div>
                        </div>
                    <div class="row">
                       <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_dis)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold">کتگوری*</label>
                            <div class="col-md-9">
                                <select class="form-control" name="dis" id="dep">
                                    <option <?php if(!empty($Field_data['dis']) && $Field_data['dis'] == 0) echo ' selected '?> value="0">کتگوری</option>
                                </select>
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_dis)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_dis?></span>
                                <?php }?>
                            </div>
                        </div>
                      <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_area)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold">قیمت*</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="area" value="<?php if (!empty($Field_data['area'])) echo $Field_data['area']; ?>" placeholder="۵۰۰">
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_area)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_area?></span>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-2 col-md-10">
                                <a href="<?=base_url()?>index.php/bookController/index" class="btn btn-circle yellow-gold">لغو</a>
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