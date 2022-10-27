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
                    <b>مکاتیب تعقیبی</b>
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
<div>
<div>
    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
        <thead>
            <tr>
                <th style="text-align: center;">شماره مکتوب</th>
                <th style="text-align: center;">نوعیت مکتوب</th>
                <th style="text-align: center;">شماره وارده</th>
                <th style="text-align: center;">قید وارده</th>
                <th style="text-align: center;">تنظیمات</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $row ) { ?>
            <tr>
                <td style="text-align: center;"><?=$dat->shumara_maktob?></td>
                    <?php $this->db->where('ID',$row->ID);
                    $this->db->from('nawyat_maktob');
                    $data=$this->db->get()->result();
                    foreach ($data as $dat) {}
                     ?>
                    <td style="text-align: center;"><?=$dat->nawyat?></td>

                    <td style="text-align: center;"><?=$shumara_nawyat_maktob?></td>
                    <td style="text-align: center;"><?=$qaid_warda?></td>

            <?php }?>
        </tbody>
    </table>
  </div>
