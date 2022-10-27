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
                    <a href="<?=base_url()?>index.php/UsersController/index">مدیریت استفاده کننده ها</a>
                    <i class="fa fa-angle-left"></i>
                </li>
                <li>
                    <b>ویرایش کاربر</b>
                </li>
            </ul>
        </div>
        <div class="portlet light ">
            <div class="portlet-title">
                <div class="caption font-green-haze">
                    <i class="icon-user font-green-haze"></i>
                    <span class="caption-subject bold uppercase">ویرایش کاربر</span>
                </div>
                <div class="actions">
                    <a class="btn btn-circle green-meadow" href="<?=base_url()?>index.php/usersController" style="font-size: 16px;">
                        <i class="fa fa-share"></i>برگشت</a>
                    </a>
                </div>
            </div>
            <div class="portlet-body form">
                <form class="form-horizontal" method="post" action="<?=base_url()?>index.php/usersController/checkEditUser" enctype="multipart/form-data">
                    <?php foreach($user as $row){?>
                    <div class="form-body">
                        <div class="form-group form-md-line-input <?php if (!empty($error_name)) echo 'has-error' ?>">
                            <label class="col-md-2 control-label" style="font-weight: bold">اسم</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="name" value="<?=$row->name?>" placeholder="احمد">
                                <div class="form-control-focus"></div>
                                <?php if(!empty($error_name)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_name?></span>
                                <?php }?>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input <?php if (!empty($error_lname)) echo 'has-error' ?>">
                            <label class="col-md-2 control-label" style="font-weight: bold">تخلص</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="last_name" value="<?=$row->last_name?>" placeholder="احمدی">
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_lname)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_lname?></span>
                                <?php }?>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input <?php if (!empty($error_pos)) echo 'has-error' ?>">
                            <label class="col-md-2 control-label" style="font-weight: bold">مقام</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="position" value="<?=$row->position?>" placeholder="کارمند اداری">
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_pos)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_pos?></span>
                                <?php }?>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input <?php if (!empty($error_email)) echo 'has-error' ?>">
                            <label class="col-md-2 control-label" style="font-weight: bold">ایمل آدرس</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="email" value="<?=$row->email?>" placeholder="kpu@example.com">
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_email)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_email?></span>
                                <?php }?>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input <?php if (!empty($error_phone)) echo 'has-error' ?>">
                            <label class="col-md-2 control-label" style="font-weight: bold">شماره تیلفون</label>
                            <div class="col-md-8">
                                <input type="tel" class="form-control" name="phone_no" value="<?=$row->phone?>" placeholder="07xx xxx xxx">
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_phone)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_phone?></span>
                                <?php }?>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input <?php if (!empty($error_username)) echo 'has-error' ?>">
                            <label class="col-md-2 control-label" style="font-weight: bold">نام کاربری</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="username" value="<?=$row->username?>" placeholder="administrator">
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_username)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_username?></span>
                                <?php }?>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input <?php if (!empty($error_old_pass)) echo 'has-error' ?>">
                            <label class="col-md-2 control-label" style="font-weight: bold">رمز عبور قبلی</label>
                            <div class="col-md-8">
                                <input type="password" class="form-control" name="old_password" value="<?php if (!empty($Field_data['old_password'])) echo $Field_data['old_password']; ?>"  placeholder="رمز عبور قبلی">
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_old_pass)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_old_pass?></span>
                                <?php }?>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input <?php if (!empty($error_pass)) echo 'has-error' ?>">
                            <label class="col-md-2 control-label" style="font-weight: bold">رمز عبور</label>
                            <div class="col-md-8">
                                <input type="password" class="form-control" name="password" placeholder="رمز عبور">
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_pass)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_pass?></span>
                                <?php }?>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input <?php if (!empty($error_c_pass)) echo 'has-error' ?>">
                            <label class="col-md-2 control-label" style="font-weight: bold">تائید رمز عبور</label>
                            <div class="col-md-8">
                                <input type="password" class="form-control" name="confirm_password" placeholder="تائید رمز عبور">
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_c_pass)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_c_pass?></span>
                                <?php }?>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input <?php if (!empty($error_gender)) echo 'has-error' ?>">
                            <label class="col-md-2 control-label" style="font-weight: bold">جنسیت</label>
                            <div class="col-md-8">
                                <select class="form-control" name="gender">
                                    <option <?php if($row->gender == 0) echo ' selected '?> value="0">انتخاب جنسیت</option>
                                    <option <?php if($row->gender == 'm') echo ' selected '?> value="m">مرد</option>
                                    <option <?php if($row->gender == 'f') echo ' selected '?> value="f">زن</option>
                                </select>
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_gender)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_gender?></span>
                                <?php }?>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input <?php if (!empty($error_privilege)) echo 'has-error' ?>">
                            <label class="col-md-2 control-label" style="font-weight: bold">محدودیت</label>
                            <div class="col-md-8">
                                <select class="form-control" name="privilege">
                                    <option <?php if($row->privilege == 0) echo ' selected '?> value="0">انتخاب محدودیت</option>
                                    <option <?php if($row->privilege == 'admin') echo ' selected '?> value="admin">مدیر</option>
                                    <option <?php if($row->privilege == 'guest') echo ' selected '?> value="guest">کاربر</option>
                                </select>
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_privilege)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_privilege?></span>
                                <?php }?>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input">
                            <label class="col-md-2 control-label" style="font-weight: bold">عکس کاربر</label>
                            <div class="col-md-8">
                                <input type="file" class="form-control" name="photo" placeholder="عکس کاربر">
                                <div class="form-control-focus"> </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-2 col-md-10">
                                <input type="hidden" name="user_id" value="<?=$row->user_id?>"/>
                                <input type="hidden" name="photo_path" value="<?=$row->image?>"/>
                                <a href="<?=base_url()?>index.php/usersController/index" class="btn btn-circle yellow-gold">لغو</a>
                                <input type="submit" name="editUser" class="btn btn-circle green-meadow" value="ذخیره"/>
                            </div>
                        </div>
                    </div>
                </form>
                <?php } ?>
            </div>
        </div>
    </div>
</div>