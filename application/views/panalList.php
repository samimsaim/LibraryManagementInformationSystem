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
                    <b>لیست  پنل ها</b>
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
                                     <div class="actions">
                    <a class="btn btn-circle green-meadow" href="<?=base_url()?>index.php/mujalaController/index" style="font-size: 16px;">
                        <i class="fa fa-share"></i>برگشت</a>
                    </a>
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
                                   
                                    <th style="text-align: center;">نام پنل</th>
                                    
                                    
                                   
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($result as $row) {?>
                                    <tr>
                                       <td style="text-align: center;"><?=$row->wp_name?></td>
                                      
                                       
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
            window.location=url+"index.php/mujalaController/deletePanal?id="+id;
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
                <h4 class="modal-title">اضافه نمودن  پنل</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="<?=base_url()?>index.php/mujalaController/checkAddPanal">
                    <div class="form-group">
                        <div class="form-group form-md-line-input col-md-6 has-success">
                            <input  type="text" name="name" class="form-control" id="form_control_1" placeholder="نام پنل"  required>
                            <label for="form_control_1">نام پنل</label>
                        </div>
                           <div class="form-group form-md-line-input col-md-6 has-success">
                                <select class="form-control" name="number">
                                    <option <?php if(!empty($Field_data['province']) && $Field_data['faculty'] == 0) echo ' selected '?> value="0">انتخاب  نمبر مجله</option>
                                    <?php foreach ($mag as $row) { ?>
                                    <option <?php if(!empty($Field_data['faculty']) && $Field_data['faculty'] == $row->mag_no) echo ' selected '?> value="<?=$row->mag_no?>]"><?=$row->mag_no?></option>
                                    <?php }?>
                                </select>
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_province)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_province?></span>
                                <?php }?>
                                <label for="form_control_1">انتخاب نمبر مجله</label>
                        </div>
                         
                       
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
                <form method="post" action="<?=base_url()?>index.php/publisherController/updatePublisher">
                    <div class="form-group">
                        <input type="hidden" name="publisher_id" id="publisher_id">
                        <div class="form-group form-md-line-input col-md-4 has-success">
                            <input  type="text" name="wp_name" class="form-control" id="wp_name" placeholder="کتگوری"  required>
                            <label for="form_control_1">نام پابلیشر</label>
                           
                        </div>
                           <div class="form-group form-md-line-input col-md-4 has-success">
                                <select class="form-control" name="mag_no" id="mag_no">
                                    <option <?php if(!empty($Field_data['mag_no']) && $Field_data['mag_no'] == 0) echo ' selected '?> value="0">انتخاب  نمبر مجله</option>
                                    <?php foreach ($mag as $row) { ?>
                                    <option <?php if(!empty($Field_data['faculty']) && $Field_data['mag_no'] == $row->mag_no) echo ' selected '?> value="<?=$row->mag_no?>]"><?=$row->mag_no?></option>
                                    <?php }?>
                                </select>
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_province)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_province?></span>
                                <?php }?>
                                <label for="form_control_1">انتخاب نمبر مجله</label>
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
        
        $('#wp_id').val(data[0]);
        $('#wp_name').val(data[1]);
        $('#mag_no').val(data[2]);

     });
   });
</script>            

                         
