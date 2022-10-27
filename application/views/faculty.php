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
                     <b>لیست پوهنحًی ها</b>
                </li>
            </ul>
        </div>
        <div class="portlet light portlet-fit ">
            <div class="portlet-title">
                <div class="table-toolbar">
                    <div class="row">
                         <div class="col-md-6" style=" margin-bottom: -8px;">
                                <div class="btn-toolbar">
                                                                    <div class="btn-group">
                                                                        <a class="btn btn-circle green-meadow" href="javascript:;" data-toggle="dropdown">
                                                                            <i class="fa fa-plus"></i> اضاقفه نمودن
                                                                            <i class="fa fa-angle-down"></i>
                                                                        </a>
                                                                        <ul class="dropdown-menu">
                                                                            <li>
                                                                                <a href="javascript:;"data-toggle="modal" data-target="#myModal">
                                                                                    <i class="fa fa-plus"></i>پوهنخًی</a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="javascript:;"data-toggle="modal" data-target="#myModale">
                                                                                    <i class="fa fa-plus"></i>دیپارتینت</a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <div class="portlet-body">
                <div class="mt-element-list">
                    <div class="mt-list-head list-simple ext-1 font-white bg-blue-chambray">
                        <div class="list-head-title-container">
                            <h3 class="list-title">لیست پوهنحْی ها</h3>
                        </div>
                    </div>
                    <?php
                    $i=0;
                     foreach ($fac as $value) {?>
                    <div class="mt-list-container list-simple ext-1 group">
                        <a class="list-toggle-container" data-toggle="collapse" href="#<?='col_id'.$i?>" aria-expanded="false">
                            <div class="list-toggle <?php if($i%2==0) echo 'done';?> uppercase">
                                <span><?=$value->faculty_name?></span>
                                <span class="badge badge-default bg-white font-green bold pull-right"><?php $j=$i; echo ++$j;?></span>
                                <form action="<?=base_url()?>index.php/facultyController/deleteFaculty" method="post" class="pull-right" style="margin-top: -8px; margin-left: 15px;">
                                    <input type="hidden" name="fac_id" value="<?=$value->faculty_id;?>"/>
                                    <button type="submit" name="deleteFac" class="btn btn-circle btn-icon-only btn-danger" ><span class="fa fa-trash-o"></button>
                                </form>
                            </div>
                        </a>
                        <div class="panel-collapse collapse" id="<?='col_id'.$i?>">
                            <ul>
                                <?php foreach ($dep as $row) {
                                    if($row->faculty_id == $value->faculty_id){?>
                                    <li class="mt-list-item done">
                                        <div class="list-icon-container">
                                            <i class="icon-check"></i>
                                        </div>
                                        <div class="list-item-content">
                                            <h3 class="uppercase">
                                                <a href="javascript:;"><?php echo $row->department_name;?></a>
                                              
                                                     <a style="margin-top: -8px;"class="btn btn-circle btn-icon-only btn-danger pull-right" href="javascript:void(0);" onclick="delete_record(<?=$row->department_id?>);" data-toggle="tooltip" data-placement="top" title="حذف"><span class="fa fa-trash-o"></a>
                                                        
                                            </h3>
                                        </div>
                                    </li>
                                <?php }}?>
                            </ul>
                        </div>
                        <?php $i++;}?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
if (isset($Message) && isset($Type)) {
    ?>
    <div id="success" class="modal fade " role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismis="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" style="color:<?php if(isset($Type) && $Type == 'success')echo 'green';else echo 'red';?>;font-weight: bold"><?php if(isset($Type) && $Type == 'success') echo 'موفقانه!';elseif(isset($Type) && $Type =='failed') echo 'متاسفانه!'?></h4>
                </div>
                <div class="modal-body">
                    <p style="color:<?php if(isset($Type) && $Type == 'success')echo 'green';else echo 'red';?>;font-size: 20px"><?=$Message?></p>
                </div>
                <div class="modal-footer">
                    <a href="<?php echo base_url()?>index.php/facultyController/index" class="btn btn-primary">بستن</a>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(window).load(function () {
            // this code prevent closing when the user clicking to out of modal area
            $('#success').modal({backdrop: 'static', keyboard: false});
            $('#success').modal('show');
        });
    </script>
<?php } ?>

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" align="right" data-dismiss="modal" >&times;</button>
                <h4 class="modal-title">اضافه  نمودن پوهنخًی</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="<?=base_url()?>index.php/facultyController/addFaculty">
                    <div class="form-group">
                        <div class="form-group form-md-line-input col-md-4 has-success">
                            <input  type="text" name="name" class="form-control" id="form_control_1" placeholder="نام پوهنحًی"  required>
                            <label for="form_control_1">نام پوهنخًی</label>
                        </div>
                        <br><br>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-circle yellow-gold" align="right" data-dismiss="modal">لغو</button>
                <input type="submit" name="add_roll" class="btn btn-circle green-meadow" value="ثبت" >
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="myModale" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" align="right" data-dismiss="modal" >&times;</button>
                <h4 class="modal-title">اضافه  نمودن دیپارتمینت</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="<?=base_url()?>index.php/facultyController/addDepartment">
                    <div class="form-group">
                        <div class="form-group form-md-line-input col-md-4 has-success">
                            <input  type="text" name="name" class="form-control" id="form_control_1" placeholder="نام دیپارتمینت"  required>
                            <label for="form_control_1">نام دیپارتمینت</label>
                        </div>
                          <div class="form-group form-md-line-input col-md-4 has-success">
                                <select class="form-control" name="faculty">
                                    <option <?php if(!empty($Field_data['province']) && $Field_data['faculty'] == 0) echo ' selected '?> value="0">انتخاب  پوهنخی</option>
                                    <?php foreach ($fac as $row) { ?>
                                    <option <?php if(!empty($Field_data['faculty']) && $Field_data['faculty'] == $row->faculty_id) echo ' selected '?> value="<?=$row->faculty_id?>]"><?=$row->faculty_name?></option>
                                    <?php }?>
                                </select>
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_province)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_province?></span>
                                <?php }?>
                                <label for="form_control_1">انتخاب پوهنخًی</label>
                        </div>
                        <br><br>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-circle yellow-gold" align="right" data-dismiss="modal">لغو</button>
                <input type="submit" name="add_roll" class="btn btn-circle green-meadow" value="ثبت" >
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var url="<?php echo base_url(); ?>";
    function delete_record(id){
        var r=confirm("آیا میخواهد که این ریکارد را حذف کنید؟")
        if(r==true)
            window.location=url+"index.php/facultyController/deleteDep?id="+id;
        else
            return false;
    }
</script>     

<!------------------ EDIT DEPARTMENT ------------------>
<div class="modal fade" id="editmodal" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" align="right" data-dismiss="modal" >&times;</button>
                <h4 class="modal-title">ویرایش دیپارتمینت</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="<?=base_url()?>index.php/CategoryController/updateCategory">
                    <div class="form-group">
                        <input type="hidden" name="department_id" id="department_id">
                        <div class="form-group form-md-line-input col-md-4 has-success">
                            <input  type="text" name="department_name" class="form-control" id="department_name" placeholder="دیپارتمینت"  required>
                            <label for="form_control_1">دیپارتمینت</label>
                        </div>
                        <br><br>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-circle yellow-gold" align="right" data-dismiss="modal">لغو</button>
                <input type="submit" name="add_roll" class="btn btn-circle green-meadow" value="ثبت" >
                </form>
            </div>
        </div>
    </div>
</div>  
<script >
   $(document).ready(function(){
     $('.editbtn').on('click',function(){
        $('#editmodal').modal('show');
        $li = $(this).closest('li');

        var data = $li.children("li").map(function(){
            return $(this).text();
        }).get();
        console.log(data);
        
        // $('#department_id').val(data[0]);
        $('#department_name').val(data[0]);

     });
   });
</script>              
