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
                    <a href="<?=base_url()?>index.php/studentController/index">شاگردان</a>
                    <i class="fa fa-angle-left"></i>
                </li>
                <li>
                    <b>اضافه کردن  شاگرد</b>
                </li>
            </ul>
        </div>
        <div class="portlet light ">
            <div class="portlet-title">
                <div class="caption font-green-haze">
                    <i class="icon-user font-green-haze"></i>
                    <span class="caption-subject bold uppercase">اضافه کردن  شاگرد</span>
                </div>
                <div class="actions">
                    <a class="btn btn-circle btn-green green-meadow" href="<?=base_url()?>index.php/studentController" style="font-size: 16px;">
                        <i class="fa fa-share"></i>برگشت</a>
                    </a>
                </div>
            </div>
            <div class="portlet-body form" style="margin-right: 20px;">
                <form class="form-horizontal" method="post" action="<?=base_url()?>index.php/studentController/checkAddStudent" enctype="multipart/form-data">
                    <div class="form-body">
                    <div class="row">
                        <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_name)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold;">اسم*</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="name" value="<?php if (!empty($Field_data['name'])) echo $Field_data['name']; ?>" placeholder="محمود">
                                <div class="form-control-focus"></div>
                                <?php if(!empty($error_name)){?>
                                <span class="help-block-error" style="color:red;"><?=$error_name?></span>
                                <?php }?>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_father_name)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold">نام پدر*</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="fatherName" value="<?php if (!empty($Field_data['father_name'])) echo $Field_data['father_name']; ?>" placeholder="احمد">
                                <div class="form-control-focus"></div>
                                <?php if(!empty($error_father_name)){?>
                                <span class="help-block-error" style="color:red;"><?=$error_father_name?></span>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_id)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold">آی دی*</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="id" value="<?php if (!empty($Field_data['id'])) echo $Field_data['id']; ?>" placeholder="۸۹۸۷۶">
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_id)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_id?></span>
                                <?php }?>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_date)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold">تاریخ عضویت*</label>
                            <div class="col-md-9">
                                <input type="date" class="form-control" name="date" value="<?php if (!empty($Field_data['date'])) echo $Field_data['date']; ?>" placeholder="۱۳۹۳/۳/۶">
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_date)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_date?></span>
                                <?php }?>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                         <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_faculty_name)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold">پوهنخی*</label>
                            <div class="col-md-9">
                                <select class="form-control" name="faculty" onchange="getDepartment()" id="fac">
                                    <option <?php if(!empty($Field_data['faculty']) && $Field_data['faculty'] == 0) echo ' selected '?> value="0">انتخاب  پوهنخی</option>
                                    <?php foreach ($fac as $row) { ?>
                                    <option <?php if(!empty($Field_data['faculty']) && $Field_data['faculty'] == $row->prov_id) echo ' selected '?> value="<?=$row->faculty_id?>"><?=$row->faculty_name?></option>
                                    <?php }?>
                                </select>
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_faculty_name)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_faculty_name?></span>
                                <?php }?>
                            </div>
                        </div>
                         <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_department)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold">دیپارتمینت*</label>
                            <div class="col-md-9">
                                <select class="form-control" name="department" id="dep">
                                    <option <?php if(!empty($Field_data['dis']) && $Field_data['dis'] == 0) echo ' selected '?> value="0">انتخاب پیبارتمینت</option>
                                </select>
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_department)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_department?></span>
                                <?php }?>
                            </div>
                        </div>
                            </div>
                        <div class="row">
                        <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_current_resident)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold">سکونت اصلی*</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="currentResident" value="<?php if (!empty($Field_data['currentResident'])) echo $Field_data['currentResident']; ?>" placeholder="کاپیسا">
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_current_resident)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_current_resident?></span>
                                <?php }?>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_original_resident)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold">سکونت قعلی*</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="originalResident" value="<?php if (!empty($Field_data['area'])) echo $Field_data['area']; ?>" placeholder="کوهستان">
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_original_resident)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_original_resident?></span>
                                <?php }?>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_phone)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold">شماره تماس*</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="phone" value="<?php if (!empty($Field_data['phone'])) echo $Field_data['phone']; ?>" placeholder="۰۷۸۹۵۶۸۹۴۷">
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_phone)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_phone?></span>
                                <?php }?>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_email)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold">ایمیل آدرس*</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="email" value="<?php if (!empty($Field_data['email'])) echo $Field_data['email']; ?>" placeholder="kpu@gmail.com">
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_email)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_email?></span>
                                <?php }?>
                            </div>
                        </div>
                        </div>
                    <div class="row">
                        <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_area)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold">نوع شمولیت*</label>
                            <div class="col-md-9">
                               <div class="md-radio">
                              <input type="radio" id="checkbox2_6" name="detail" class="md-radiobtn" value="چهارده پاس">
                              <label for="checkbox2_6">
                             <span></span>
                             <span class="check"></span>
                             <span class="box"></span> چهارده پاس</label>
                             <div class="md-radio">
                              <input type="radio" id="checkbox2_7" name="detail" class="md-radiobtn" checked="" value="کانکور">
                            <label for="checkbox2_7">
                            <span></span>
                            <span class="check"></span>
                            <span class="box"></span> کانکور</label>
                            </div>
                        </div>
                            </div>
                             
                        </div>
                        <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_photo)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold">عکس شاگرد</label>
                            <div class="col-md-9">
                                <input type="file" class="form-control" name="photo" placeholder="عکس کاربر">
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_photo)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_photo?></span>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-2 col-md-10">
                                <a href="<?=base_url()?>index.php/studentController/index" class="btn btn-circle yellow-gold">لغو</a>
                                <input type="submit" name="addStudent" class="btn btn-circle green-meadow" value="ذخیره"/>
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
                    $(department).append('<option value='+data[i]['department_id']+'>'+data[i]['department_name']+'</option>');
                }
            },
            error: function(err) {
            }
        });
    }
</script>