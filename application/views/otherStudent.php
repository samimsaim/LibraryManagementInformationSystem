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
                    <b>لیست  شاگر های بیرونی</b>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light ">
                    <div class="portlet-title">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6" style=" margin-bottom: -8px;">
                                    <div class="btn-group">
                                        <a  data-toggle="modal" data-target="#myModal" class="btn btn-circle green-meadow">اضافه نمودن<i class="fa fa-plus"></i></a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="btn-group pull-right">

                                        <ul class="dropdown-menu pull-right">
                                            <li>
                                                <a href="javascript:;">
                                                    <i class="fa fa-print"></i> Print </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                    <i class="fa fa-file-pdf-o"></i> Save as PDF </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                    <i class="fa fa-file-excel-o"></i> Export to Excel </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">#</th>
                                    <th style="text-align: center;">نام</th>
                                    <th style="text-align: center;">ولد</th>
                                    <th style="text-align: center;">شماره تماس</th>
                                    <th style="text-align: center;">مرجع</th>
                                    <th style="text-align: center;">تنظیمات</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($student as $row) { ?>
                                    <tr>
                                    <td style="text-align: center;"><?=$row->om_id?></td>
                                    <td style="text-align: center;"><?=$row->name?></td>
                                    <td style="text-align: center;"><?=$row->f_name?></td>
                                    <td style="text-align: center;"><?=$row->phone_no?></td>
                                    <td style="text-align: center;"><?=$row->reference?></td>
                                    <td style="text-align: center;">
                                        
                                        <a type="button" class="btn btn-circle btn-icon-only btn-success editbtn" ><span class="fa fa-pencil"></a>
                                        <a class="btn btn-circle btn-icon-only btn-danger" href="javascript:void(0);" onclick="delete_record(<?=$row->om_id?>);" data-toggle="tooltip" data-placement="top" title="حذف"><span class="fa fa-trash-o"></a>
                                        </td>
                                    </tr>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div><!-- END EXAMPLE TABLE PORTLET-->
            </div>
        </div>
     </div>
   </div>
</div>
<script type="text/javascript">
    var url="<?php echo base_url(); ?>";
    function delete_record(id){
        var r=confirm("آیا میخواهد که این ریکارد را حذف کنید؟")
        if(r==true)
            window.location=url+"index.php/studentController/deleteExStudent?id="+id;
        else
            return false;
    }
</script>
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
                        <a href="<?php echo base_url()?>index.php/studentController/index" class="btn btn-primary">بستن</a>
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
                <h4 class="modal-title">اضافه نمودن  شاگر د بیرونی</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="<?=base_url()?>index.php/studentController/checkAddExStudent">
                    <div class="form-group">
                        <div class="form-group form-md-line-input col-md-6 has-success">
                            <input  type="text" name="name" class="form-control" id="form_control_1" placeholder="نام"  required>
                            <label for="form_control_1">نام</label>
                        </div>
                        
                        <div class="form-group form-md-line-input col-md-6 has-success">
                            <input  type="text" name="fname" class="form-control" id="form_control_1" placeholder="نام پدر"  required>
                            <label for="form_control_1">نام پدرز</label>
                        </div>
                           <div class="form-group form-md-line-input col-md-6 has-success">
                            <input  type="number" name="phone" class="form-control" id="form_control_1" placeholder="شماره تماس"  required>
                            <label for="form_control_1">شماره تماس</label>
                        </div>
                         <div class="form-group form-md-line-input col-md-6 has-success">
                            <input  type="text" name="reference" class="form-control" id="form_control_1" placeholder="مرجع"  required>
                            <label for="form_control_1">مرجع</label>
                        </div>
                        <br><br>
                    </div>
            </div>
            <div class="modal-footer" style="margin-top: 125px;" >
                <button type="button" class="btn btn-circle yellow-gold" align="right" data-dismiss="modal">لغو</button>
                <input type="submit" name="add_roll" class="btn btn-circle green-meadow" value="ثبت" >
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="editmodal" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" align="right" data-dismiss="modal" >&times;</button>
                <h4 class="modal-title">ویرایش  پابلیشر</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="<?=base_url()?>index.php/studentController/updateOthMem">
                    <div class="form-group">
                        <input type="hidden" name="om_id" id="om_id">
                        <div class="form-group form-md-line-input col-md-6 has-success">
                            <input  type="text" name="name" class="form-control" id="name" placeholder="کتگوری"  required>
                            <label for="form_control_1">نام </label>
                           
                        </div>
                         <div class="form-group form-md-line-input col-md-6 has-success">
                            <input  type="text" name="f_name" class="form-control" id="f_name" placeholder="کتگوری"  required>
                             <label for="form_control_1">نام پدر</label>
                         </div>
                          <div class="form-group form-md-line-input col-md-6 has-success">
                            <input  type="number" name="phone_no" class="form-control" id="phon_no" placeholder="شماره تماس"  required>
                             <label for="form_control_1">شماره تماس</label>
                         </div>
                          <div class="form-group form-md-line-input col-md-6 has-success">
                            <input  type="text" name="reference" class="form-control" id="reference" placeholder="مرجع"  required>
                             <label for="form_control_1">مرجع</label>
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
        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function(){
            return $(this).text();
        }).get();
        console.log(data);
        
        $('#om_id').val(data[0]);
        $('#name').val(data[1]);
        $('#f_name').val(data[2]);
        $('#phone_no').val(data[3]);
        $('#reference').val(data[4]);

     });
   });
</script>
                     
