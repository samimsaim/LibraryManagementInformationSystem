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
                    <b>عرایض</b>
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
                                        <a href="<?php echo base_url()?>index.php/araizController/addAraiz" class="btn btn-circle green-meadow">اضافه نمودن<i class="fa fa-plus"></i></a>
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

                                    <th style="text-align: center;">شماره عریضه</th>
                                      <th style="text-align: center;">شماره مکتوب</th>
                                    <th style="text-align: center;">نوعیت مکتوب</th>
                                    <th style="text-align: center;">خلاصه مطلب</th>
                                    <th style="text-align: center;">اجرات</th>
                                    <th style="text-align: center;">تنظیمات</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $row) { ?>
                                    <tr>
                                        <td style="text-align: center;"><?=$row->shumara_ariza?></td>
                                        <td style="text-align: center;"><?=$row->shumara_maktob?></td>
                                        <?php $this->db->where('ID',$row->ID_nwyat_maktob);
                                              $this->db->from('nawyat_maktob');
                                              $NM=$this->db->get()->result();
                                              foreach($NM as $nn){
                                         ?>
                                        <td style="text-align: center;"><?=$nn->nawyat?></td>
                                    <?php }?>
                                        <td style="text-align: center;"><?=$row->khulas_matlab?></td>
                                        <td style="text-align: center;"><?=$row->ejraat?></td>
                                        <td style="text-align: center;">
                                         <a href="<?=base_url()?>index.php/araizController/araizDetail?id=<?=$row->shumara_ariza?>" class="btn btn-circle btn-icon-only  green-jungle"><span class="glyphicon glyphicon-eye-open "></a>
                                        <a class="btn btn-circle btn-icon-only btn-success" href="<?=base_url()?>index.php/araizController/editaraiz?id=<?=$row->shumara_ariza?>"><span class="fa fa-pencil"></a>
                                         <a class="btn btn-circle btn-icon-only btn-danger" href="javascript:void(0);" onclick="delete_record(<?=$row->shumara_ariza?>);" data-toggle="tooltip" data-placement="top" title="حذف"><span class="fa fa-trash-o"></span></a>
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
            window.location=url+"index.php/araizController/deleteAraiz?id="+id;
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
                        <h4 class="modal-title" style="color:<?php if(isset($Type) && $Type == 'success')echo '#000000';else echo 'red';?>;font-weight: bold"><?php if(isset($Type) && $Type == 'success') echo 'موفقانه!';elseif(isset($Type) && $Type =='failed') echo 'متاسفانه!'?></h4>
                    </div>
                    <div class="modal-body">
                        <p style="color:<?php if(isset($Type) && $Type == 'success')echo 'green';else echo 'red';?>;font-size: 20px"><?=$Message?></p>
                    </div>
                    <div class="modal-footer">
                        <a href="<?php echo base_url()?>index.php/araizController/index" class="btn btn-circle green-meadow">بستن</a>
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
