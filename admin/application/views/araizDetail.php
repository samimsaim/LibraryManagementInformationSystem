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
                    <a href="<?=base_url()?>index.php/studentController/index">عرایض</a>
                    <i class="fa fa-angle-left"></i>
                </li>
                <li>
                    <b>معلومات عرایض</b>
                </li>
            </ul>
        </div>
        <div class="portlet light ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-social-dribbble font-green"></i>
                    <span class="caption-subject font-green bold uppercase">معلومات عمومی عرایض</span>
                </div>
                <div class="actions">
                    <a class="btn btn-circle green-meadow" href="<?=base_url()?>index.php/araizController/index" style="font-size: 16px;">
                        <i class="fa fa-share"></i>برگشت</a>
                    </a>
                </div>
            </div>
             <?php foreach ($araiz as $row) {} ?>
             <?php foreach ($makateb as $MaktobNu) {} ?>
                <div class="portlet-body">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="table-scrollable">
                               
                                <table class="table table-hover">
                                    <tbody>
                                   <tr>
                                        <th>شماره عریضه</th>
                                        <td><?=$row->shumara_ariza?></td>
                                    </tr>
                                    <tr>
                                        <th>نوعیت مکتوب</th>
                                        <?php $this->db->where('ID',$row->ID_nwyat_maktob);
                                              $this->db->from('nawyat_maktob');
                                              $naweatMaktob=$this->db->get()->result();
                                              foreach ($naweatMaktob as $NM) {}
                                         ?>
                                        <td><?=$NM->nawyat?></td>
                                    </tr>
                                    <tr>
                                        <th>شماره مکتوب</th>
                                        <td><?=$row->shumara_maktob?></td>
                                    </tr>
                                     <tr>
                                        <th>نمبر صادره</th>
                                        <td><?=$row->sadra_number?></td>
                                    </tr>
                                   
                                    <tr>
                                        <th>مرسل</th>
                                        <td><?=$row->mursal?></td>
                                    </tr>
                                    <tr>
                                        <th>مرسل الیه</th>
                                        <td><?=$row->mursal_elai?></td>
                                    </tr>
                                     <tr>
                                        <th>تاریخ</th>
                                        <td><?=$row->date?></td>
                                    </tr>
                                    <tr>
                                        <th>خلاصخ مطلب</th>
                                        <td><?=$row->khulas_matlab?></td>
                                    </tr>
                                   <!--  <tr>
                                        <th>اجرات</th>
                                        <td><?=$row->ejraat?></td>
                                    </tr> -->
                                    <tr>
                                        <th>ملاحظات</th>
                                        <td><?=$row->mulahezat?></td>
                                    </tr>
                                    <tr>
                                        <th>دوسیه آرشیف</th>
                                         <?php $this->db->where('dosya_id',$row->ID_dosya_archive);
                                              $this->db->from('dosya_archive');
                                              $archive=$this->db->get()->result();
                                              foreach ($archive as $arch) {} 
                                         ?>
                                        <td><?=$arch->dosya_name?></td>
                                    </tr>
                                     <tr>
                                        <th>اجرات</th>
                                         <?php $this->db->where('ejraat_id',$row->id_ejrat);
                                              $this->db->from('ejraat_result');
                                              $ejraat=$this->db->get()->result();
                                              foreach ($ejraat as $ejr) {} 
                                         ?>
                                        <td><?=$ejr->result?></td>
                                    </tr>
                                    <tr>
                                        <th>تحریرات</th>
                                        <td><?=$row->tahrerat?></td>
                                    </tr>
                                   
                                    
                                     
                                 


                                    </tbody>
                                </table>
                            </div>
                    </div>
                  
                </div>
            </div>
          
        </div>
    </div>
</div>
