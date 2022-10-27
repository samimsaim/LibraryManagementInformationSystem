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
                    <b>ویرایش کردن  کتاب</b>
                </li>
            </ul>
        </div>
        <div class="portlet light ">
            <div class="portlet-title">
                <div class="caption font-green-haze">
                    <i class="icon-user font-green-haze"></i>
                    <span class="caption-subject bold uppercase">ویرایشکردن  کتاب</span>
                </div>
                <div class="actions">
                    <a class="btn btn-circle green-meadow" href="<?=base_url()?>index.php/bookController/index" style="font-size: 16px;">
                        <i class="fa fa-share"></i>برگشت</a>
                    </a>
                </div>
            </div>
            <?php foreach ($book as $key) { } ?>
            <div class="portlet-body form" style="margin-right: 20px;">
                <form class="form-horizontal" method="post" action="<?=base_url()?>index.php/bookController/checkEditBook" enctype="multipart/form-data">
                    <div class="form-body">
                    <div class="row">
                        <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_record_number)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold;">شماره ثبت*</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="recordNumber" value="<?=$key->record_id?>" placeholder="۴۳۳">
                                <div class="form-control-focus"></div>
                                <?php if(!empty($error_record_number)){?>
                                <span class="help-block-error" style="color:red;"><?=$error_record_number?></span>
                                <?php }?>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_date)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold">تاریخ ثبت*</label>
                            <div class="col-md-9">
                                <input type="date" style="text-align: right;" class="form-control" name="date" value="<?=$key->date?>" placeholder="۱۳۹۸/۳/۲">
                                <div class="form-control-focus"></div>
                                <?php if(!empty($error_date)){?>
                                <span class="help-block-error" style="color:red;"><?=$error_date?></span>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_title)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold">عنوان کتاب*</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="title" value="<?=$key->book_title?>" placeholder="ریاضیات">
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_title)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_title?></span>
                                <?php }?>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_edition)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold">ویرایش*</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="edition" value="<?=$key->edition?>" placeholder="ویرایش">
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_edition)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_edition?></span>
                                <?php }?>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_valuem)) echo 'has-error' ?>">
                                       <label class="col-md-3 control-label" style="font-weight: bold">موًلف*</label>
                                        <div class="col-md-9">
                                            <select id="select2_sample2" class="form-control select2" multiple name="author[]">
                                            <?php foreach ($author as $au) { ?>
                                                <option <?php if(!empty($Field_data['province']) && $Field_data['province'] == $tran->translator_id) echo ' selected '?> value="<?=$au->author_id?>"><?=$au->author_name?></option>
                                            <?php }?>
                                            </select>
                                            <div class="form-control-focus"> </div>
                                <?php if(!empty($error_translator)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_translator?></span>
                                <?php }?>
                                        </div>
                              </div>

                         <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_dis)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold">مترجم*</label>
                            <div class="col-md-9">
                                 <select class="form-control" name="translator" onchange="getDepartment()" id="fac">
                                    <option <?php if(!empty($Field_data['province']) && $Field_data['province'] == 0) echo ' selected '?> value="0">مترجم</option>
                                    <?php foreach ($translator as $tran) { ?>
                                    <option <?php if(!empty($Field_data['province']) && $Field_data['province'] == $tran->translator_id) echo ' selected '?> value="<?=$tran->translator_id?>"><?=$tran->translator_name?></option>
                                    <?php }?>
                                </select>
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_translator)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_translator?></span>
                                <?php }?>
                            </div>
                        </div>
                            </div>
                        <div class="row">
                        <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_publisher)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold">ناشر*</label>
                            <div class="col-md-9">
                                <select class="form-control" name="publisher" onchange="getDepartment()" id="fac">
                                    <?php
                                    $this->db->where('publisher_id',$key->publisher_id);
                                    $this->db->from('publisher');
                                    $data=$this->db->get()->result();
                                    foreach($data as $data) {}

                                     ?>
                                    }
                                    <option <?php if(!empty($Field_data['publisher']) && $Field_data['publisher'] == 0) echo ' selected '?> value="<?=$data->publisher_id?>"><?=$data->publisher_name?></option>
                                    <?php foreach ($publisher as $pub) { ?>
                                    <option <?php if(!empty($Field_data['publisher']) && $Field_data['publisher'] == $tran->translator_id) echo ' selected '?> value="<?=$pub->publisher_id?>"><?=$pub->publisher_name?></option>
                                    <?php }?>
                                </select>
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_publisher)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_publisher?></span>
                                <?php }?>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_valuem)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold">تعداد جلد*</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="valuemNumber" value="<?=$key->no_of_volume?>" placeholder="۷۸">
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_valuem)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_valuem?></span>
                                <?php }?>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_number_of_page)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold">تعداد صفخه*</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="page" value="<?=$key->no_of_pages?>" placeholder="۸۰">
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_number_of_page)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_number_of_page?></span>
                                <?php }?>
                            </div>
                        </div>
                       <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_percurement)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold">نوعیت خریداری*</label>
                            <div class="col-md-9">
                                <?php
                                    $this->db->where('procurement_id',$key->procurement_id);
                                    $this->db->from('procurement');
                                    $data=$this->db->get()->result();
                                    foreach($data as $data) {}
                                     ?>
                                 <select class="form-control" name="procurement" >
                                    <option <?php if(!empty($Field_data['procurement']) && $Field_data['procurement'] == 0) echo ' selected '?> value="<?=$data->procurement_id?>"><?=$data->procurement_name?></option>
                                    <?php foreach ($procurment as $pro) { ?>
                                    <option <?php if(!empty($Field_data['procurement']) && $Field_data['procurement'] == $tran->translator_id) echo ' selected '?> value="<?=$pro->procurement_id?>"><?=$pro->procurement_name?></option>
                                    <?php }?>
                                </select>
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_percurement)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_percurement?></span>
                                <?php }?>
                            </div>
                        </div>
                        </div>
                    <div class="row">
                       <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_procurement)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold">کتگوری*</label>
                            <div class="col-md-9">
                                 <?php
                                    $this->db->where('category_id',$key->category_id);
                                    $this->db->from('category');
                                    $data=$this->db->get()->result();
                                    foreach($data as $data) {}
                                     ?>
                               <select class="form-control" name="category">
                                    <option <?php if(!empty($Field_data['province']) && $Field_data['province'] == 0) echo ' selected '?> value="<?=$data->category_id?>"><?=$data->category_name?></option>
                                    <?php foreach ($category as $cat) { ?>
                                    <option <?php if(!empty($Field_data['category']) && $Field_data['category'] == $tran->translator_id) echo ' selected '?> value="<?=$cat->category_id?>"><?=$cat->category_name?></option>
                                    <?php }?>
                                </select>
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_category)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_category?></span>
                                <?php }?>
                            </div>
                        </div>
                      <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_price)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold">قیمت*</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="price" value="<?=$key->price?>" placeholder="۵۰۰">
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_price)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_price?></span>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                    </div>
                    <input type="hidden" name="id" value="<?=$key->book_id?>">
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-2 col-md-10">
                                <a href="<?=base_url()?>index.php/bookController/index" class="btn btn-circle yellow-gold">لغو</a>
                                <input type="submit" name="addBook" class="btn btn-circle green-meadow" value="ذخیره"/>
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