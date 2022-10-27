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
                    <a href="<?=base_url()?>index.php/UsersController/index">شاگردان</a>
                    <i class="fa fa-angle-left"></i>
                </li>
                <li>
                    <b>معلومات شاگرد</b>
                </li>
            </ul>
        </div>
        <div class="portlet light ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-social-dribbble font-green"></i>
                    <span class="caption-subject font-green bold uppercase">معلومات عمومی شاگرد</span>
                </div>
                <div class="actions">
                    <a class="btn btn-circle green-meadow" href="<?=base_url()?>index.php/studentController/index" style="font-size: 16px;">
                        <i class="fa fa-share"></i>برگشت</a>
                    </a>
                </div>
            </div>
            <?php foreach ($fac as $facu) {} ?>
            <?php foreach ($dep as $depart) {} ?>
                <div class="portlet-body">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="table-scrollable">
                                <?php foreach($student as $row){?>
                                <table class="table table-hover">
                                    <tbody>
                                    <tr>
                                        <th>اسم</th>
                                        <td><?=ucfirst($row->name)?></td>
                                    </tr>
                                    <tr>
                                        <th>نام پدر</th>
                                        <td><?=ucfirst($row->f_name)?></td>
                                    </tr>
                                   <!--  <tr>
                                        <th>جنسیت</th>
                                        <td><?php if($row->gender == 'm') echo 'مرد'; elseif($row->gender == 'f') echo 'زن';?></td>
                                    </tr> -->
                                    <tr>
                                        <th>آی دی</th>
                                        <td><?=$row->id_no?></td>
                                    </tr>
                                    <tr>
                                        <th>تاریخ</th>
                                        <td><?=$row->date?></td>
                                    </tr>
                                    <tr>
                                        <th>آدرس فعلی</th>
                                        <td><?=$row->current_resident?></td>
                                    </tr>
                                    <tr>
                                        <th>آدرس اصلی</th>
                                        <td><?=$row->original_resident?></td>
                                    </tr>
                                    <tr>
                                        <th>شماره تماس</th>
                                        <td><?=$row->phone_no?></td>
                                    </tr>
                                     <tr>
                                        <th>ایمیل آدرس</th>
                                        <td><?=$row->email_address?></td>
                                    </tr>
                                     <tr>
                                        <th>پوهنخًی</th>
                                        <td><?=$facu->faculty_name?></td>
                                    </tr>
                                     <tr>
                                        <th>دیپارتمینت</th>
                                        <td><?=$depart->department_name?></td>
                                    </tr>
                                    <tr>
                                        <th>نوع شمولیت</th>
                                        <td><?=ucfirst($row->detail)?></td>
                                    </tr>
                                   

                                    </tbody>
                                </table>
                            </div>
                    </div>
                    <div class="col-md-3">
                        <br/>

                        <span class="thumbnail">
                            <img style="height: 300px;" src="<?php if(!empty($row->photo)){ echo base_url().$row->photo;} else{ if($row->detail=='m'){ echo base_url()."assets/img/users/male.jpg";} elseif($row->name=='f'){ echo base_url()."assets/img/users/female.jpg";}}?>" alt="<?=$row->name." photo"?>">
                        </span>
                    </div>
                </div>
            </div>
            <?php }?>
        </div>
    </div>
</div>







