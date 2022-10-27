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
                    <b>قرض کرفتن</b>
                </li>
            </ul>
        </div>
        <div class="portlet light ">
            <div class="portlet-title">
                <div class="caption font-green-haze">
                    <i class="icon-user font-green-haze"></i>
                    <span class="caption-subject bold uppercase">قرض گرفتن</span>
                </div>
                <div class="actions">
                    <a class="btn btn-circle green-meadow" href="<?=base_url()?>index.php/borrowController/index" style="font-size: 16px;">
                        <i class="fa fa-share"></i>برگشت</a>
                    </a>
                </div>
            </div>
            <div class="portlet-body form" style="margin-right: 20px;">
                <form class="form-horizontal" method="post" action="<?=base_url()?>index.php/borrowController/checkAddBorrow" enctype="multipart/form-data">
                    <div class="form-body">
                    <div class="row">
                        <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_book)) echo 'has-error' ?>">
                                        <label class="control-label col-md-3">نام کتاب</label>
                                        <div class="col-md-9">
                                            <select class="form-control  select2me" data-placeholder="نام کتاب..." name="book">
                                                <option value=""></option>
                                                <?php foreach ($book as $row) { ?>
                                                <option value="<?=$row->book_id?>"><?=$row->book_title?></option>
                                            <?php }?>
                                            </select>
                                            <div class="form-control-focus"> </div>
                                      <?php if(!empty($error_book)){?>
                                      <span class="help-block-error" style="color:red;"><?=$error_book?></span>
                                      <?php }?>
                                        </div>
                                    </div>
                        <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_type)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold">نوعیت شاگرد*</label>
                            <div class="col-md-9">
                                 <select class="form-control" name="type" <?php if("['type']"==0){ ?> onchange="getDepartment()" <?php }elseif("name['type']"==1) {?>onchange="getDepartments()" <?php }?> id="student">
                                    <option <?php if(!empty($Field_data['type']) && $Field_data['type'] == 0) echo ' selected '?> value="0">نوعیت شاگرد</option>
                                    <option value="0" >شاگر داخلی</option>
                                    <option value="1" >شاگر  بیرونی</option>
                                    
                                </select>
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_type)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_type?></span>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                                  <div class="row">
                                   <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_student)) echo 'has-error' ?>">
                                        <label class="control-label col-md-3">نام شاگرد</label>
                                        <div class="col-md-9">
                                            <select class="form-control  select2me" data-placeholder="نام شاگرد..." id="dep" name="student">
                                                <option <?php if(!empty($Field_data['dis']) && $Field_data['dis'] == 0) echo ' selected '?> value="0">انتخاب شاگرد</option>
                                            </select>
                                           <div class="form-control-focus"> </div>
                                <?php if(!empty($error_type)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_type?></span>
                                <?php }?>
                                        </div>
                                    </div>
                        <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_checkin)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold">تاریخ گرفتن قض*</label>
                            <div class="col-md-9">
                                <input style="text-align: right;" type="date" class="form-control" name="checkin" value="<?php if (!empty($Field_data['edition'])) echo $Field_data['edition']; ?>" placeholder="ویرایش">
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_checkin)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_checkin?></span>
                                <?php }?>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                       <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_checkout)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold">تاریخ بزگشت*</label>
                            <div class="col-md-9">
                                <input style="text-align: right;" type="date" class="form-control" name="checkout" value="<?php if (!empty($Field_data['edition'])) echo $Field_data['edition']; ?>" placeholder="ویرایش">
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_checkout)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_checkout?></span>
                                <?php }?>
                            </div>
                        </div>

                        <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_collateral)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold">ضمانت*</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="collateral" value="<?php if (!empty($Field_data['collateral'])) echo $Field_data['collateral']; ?>" placeholder="ضمانت">
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_collateral)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_collateral?></span>
                                <?php }?>
                            </div>
                        </div>
                            </div>
                       
                   
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-2 col-md-10">
                                <a href="<?=base_url()?>index.php/borrowController/index" class="btn btn-circle yellow-gold">لغو</a>
                                <input type="submit" name="addBorrow" class="btn btn-circle green-meadow" value="ذخیره"/>
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
        var facId = $("#student").val();
        var department = document.getElementById("dep");
        $(department).empty();
        $(department).append('<option selected value='+0+'></option>');
        $.ajax({
            type: "POST",
            url: "<?=base_url();?>index.php/borrowController/getStudent",
            data: {facId:facId},
            dataType: "JSON",
            success: function(data) {
                for(var i = 0; i < data.length; i++){
                    $(department).append('<option value='+data[i]['student_id']+'>'+data[i]['name']+'</option>');
                }
            },
            error: function(err) {
            }
        });
    }
</script>
<script>
    function getDepartments(){
        var facId = $("#student").val();
        var department = document.getElementById("dep");
        $(department).empty();
        $(department).append('<option selected value='+0+'></option>');
        $.ajax({
            type: "POST",
            url: "<?=base_url();?>index.php/borrowController/getStudent",
            data: {facId:facId},
            dataType: "JSON",
            success: function(data) {
                for(var i = 0; i < data.length; i++){
                    $(department).append('<option value='+data[i]['om_id']+'>'+data[i]['name']+'</option>');
                }
            },
            error: function(err) {
            }
        });
    }
</script>