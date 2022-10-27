<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="<?=base_url()?>mainpage/index">صفحه اصلی</a>
                    <i class="fa fa-angle-left"></i>
                </li>
                <li>
                    <b>مکاتیب صادره</b>
                </li>
            </ul>
        </div>
    <div class="portlet-body flip-scroll">
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light ">
                <div class="portlet-title">
                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-6" style=" margin-bottom: -8px;">
                                <div class="btn-group">
                                    <a type="button" class="btn btn-circle green-meadow btn-sm" data-toggle="modal" data-target="#myModal">اضافه نمودن<i class="fa fa-plus"></i></a>
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

<th style="text-align: center;">شماره مکتوب</th>
<th style="text-align: center;">شماره صادره</th>
<th style="text-align: center;">تاریخ ثبت</th>
  <th style="text-align: center;">خلاصه مطلب</th>
<th style="text-align: center;">تنظیمات</th>
</tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $row) { ?>
                                <tr>
                                 <td style="text-align: center;"><?=$row->author_id?></td>
                                 <td style="text-align: center;"><?=$row->author_name?></td>
                                 <td style="text-align: center;"><?=$row->create_at?></td>
                                 <td style="text-align: center;"><?=$row->update_at?></td>
                                 <td style="text-align: center;">
                                 <a type="button" class="btn btn-circle btn-icon-only btn-success editbtn" ><span class="fa fa-pencil"></a>
                                 <a class="btn btn-circle btn-icon-only btn-danger" href="javascript:void(0);" onclick="delete_record(<?=$row->author_id?>);" data-toggle="tooltip" data-placement="top" title="حذف"><span class="fa fa-trash-o"></a>
                                </td>
                                </tr>
                              <?php }?>
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<!--
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" align="right" data-dismiss="modal" >&times;</button>
                <h4 class="modal-title">اضافه نمودن  نویسنده</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="<?=base_url()?>index.php/authorController/addAuthor">
                    <div class="form-group">
                        <div class="form-group form-md-line-input col-md-4 has-success">
                            <input  type="text" name="name" class="form-control" id="form_control_1" placeholder="نام نویسنده"  required>
                            <label for="form_control_1">نام نوسنده</label>
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
                        <a href="<?php echo base_url()?>index.php/authorController/index" class="btn btn-circle green-meadow">بستن</a>
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
<div class="modal fade" id="editmodal" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" align="right" data-dismiss="modal" >&times;</button>
                <h4 class="modal-title">ویرایش نویسنده</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="<?=base_url()?>index.php/authorController/updateAuthor">
                    <div class="form-group">
                        <input type="hidden" name="author_id" id="author_id">
                        <div class="form-group form-md-line-input col-md-4 has-success">
                            <input  type="text" name="author" class="form-control" id="author_name" placeholder="کتگوری"  required>
                            <label for="form_control_1">نویسنده</label>
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

        $('#author_id').val(data[0]);
        $('#author_name').val(data[1]);

     });
   });
</script>        -->

<script type="text/javascript">
    var url="<?php echo base_url(); ?>";
    function delete_record(id){
        var r=confirm("آیا میخواهد که این ریکارد را حذف کنید؟")
        if(r==true)
            window.location=url+"index.php/authorController/deleteAuthor?id="+id;
        else
            return false;
    }
</script>
