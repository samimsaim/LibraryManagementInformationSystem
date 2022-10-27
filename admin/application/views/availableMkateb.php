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
                    <b> مکاتیب موجود</b>
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
                                    <th style="text-align: center;"> شماره مکتوب</th>
                                    <th style="text-align: center;">نوعیت مکتوب</th>
                                    <th style="text-align: center;">شعبه مربوطه</th>
                                    <th style="text-align: center;"> خلاصه مطلب</th>
                                    <th style="text-align: center;">تحریرات</th>
                                  <!--  <th style="text-align: center;">موجود</th> -->
                                  <!--   <th style="text-align: center;">تنظیمات</th> -->

                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $row) {

                                 ?>
                                    <tr>
                                      <td style="text-align: center;"><?=$row->shumara_maktob?></td>
                                       <?php $this->db->where('shumara_maktob',$row->shumara_maktob);
                                      $this->db->from('makateb');
                                      $data=$this->db->get()->result();
                                      foreach ($data as $data) {}
                                       ?>
                                      <td style="text-align: center;"><?=$data->nawyat?></td>
                                       <?php $this->db->where('ID',$row->ID);
                                      $this->db->from('nawyat_maktob');
                                      $data=$this->db->get()->result();
                                      foreach ($data as $data) {}
                                       ?>
                                       <td style="text-align: center;"><?=$data->shuba_name?></td>
                                        <?php $this->db->where('shuba_id',$row->shuba_id);
                                       $this->db->from('shuabat');
                                       $data=$this->db->get()->result();
                                       foreach ($data as $data) {}
                                        ?>

                                        <td style="text-align: center;"><?=$row->khulas_matlab?></td>
                                        <td style="text-align: center;"><?=$row->tahrerat?></td>

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
                        <a href="<?php echo base_url()?>index.php/makatebController/index" class="btn btn-primary">بستن</a>
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
    <script type="text/javascript">
    var url="<?php echo base_url(); ?>";
    function delete_record(id){
        var r=confirm("آیا میخواهد که این ریکارد را حذف کنید؟")
        if(r==true)
            window.location=url+"index.php/makatebController/deletemakateb?id="+id;
        else
            return false;
    }
</script>
