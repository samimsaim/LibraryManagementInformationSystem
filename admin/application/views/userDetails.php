<div class="page-content-wrapper">
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
                    <b>نمایش کاربر</b>
                </li>
            </ul>
        </div>
        <div class="portlet light ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-social-dribbble font-green"></i>
                    <span class="caption-subject font-green bold uppercase">معلومات کاربر</span>
                </div>
                <div class="actions">
                    <a class="btn btn-circle green-meadow" href="<?=base_url()?>index.php/usersController" style="font-size: 16px;">
                        <i class="fa fa-share"></i>برگشت</a>
                    </a>
                </div>
            </div>
                <div class="portlet-body">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="table-scrollable">
                                <?php foreach($userDetails as $row){?>
                                <table class="table table-hover">
                                    <tbody>
                                    <tr>
                                        <th>اسم</th>
                                        <td><?=ucfirst($row->name)?></td>
                                    </tr>
                                    <tr>
                                        <th>تخلص</th>
                                        <td><?=ucfirst($row->last_name)?></td>
                                    </tr>
                                    <!-- <tr>
                                        <th>جنسیت</th>
                                        <td><?php if($row->gender == 'm') echo 'مرد'; else echo 'زن';?></td>
                                    </tr> -->
                                    <tr>
                                        <th>ایمل آدرس</th>
                                        <td><?=$row->email?></td>
                                    </tr>
                                    <tr>
                                        <th>شماره تماس</th>
                                        <td><?=$row->phone?></td>
                                    </tr>
                                    <tr>
                                        <th>نام کاربری</th>
                                        <td><?=ucfirst($row->username)?></td>
                                    </tr>
                                    <tr>
                                        <th>مقام</th>
                                        <td><?=ucfirst($row->position)?></td>
                                    </tr>
                                    <tr>
                                        <th>محدودیت</th>
                                        <td><?php if($row->privilege=='admin') echo 'مدیر'; else echo 'کاربر'?></td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                    </div>
                   <!--  <div class="col-md-3">
                        <br/>

                        <span class="thumbnail">
                            <img src="<?php if(!empty($row->image)){ echo base_url().$row->image;} else{ if($row->gender=='m'){ echo base_url()."assets/img/users/male.jpg";} elseif($row->gender=='f'){ echo base_url()."assets/img/users/female.jpg";}}?>" alt="<?=$row->name." photo"?>">
                        </span>
                    </div> -->
                </div>
            </div>
            <?php }?>
        </div>
    </div>
</div>
