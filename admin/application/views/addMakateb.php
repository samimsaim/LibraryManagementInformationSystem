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
                    <a href="<?=base_url()?>index.php/studentController/index">عرایض</a>
                    <i class="fa fa-angle-left"></i>
                </li>
                <li>
                    <b>اضافه کردن عریضه</b>
                </li>
            </ul>
        </div>
        <div class="portlet light ">
            <div class="portlet-title">
                <div class="caption font-green-haze">
                    <i class="icon-user font-green-haze"></i>
                    <span class="caption-subject bold uppercase">اضافه کردن   مکاتیب</span>
                </div>
                <div class="actions">
                    <a class="btn btn-circle btn-green green-meadow" href="<?=base_url()?>index.php/makatebController/index" style="font-size: 16px;">
                        <i class="fa fa-share"></i>برگشت</a>
                    </a>
                </div>
            </div>
                              <form class="form-horizontal" method="post" action="<?=base_url()?>index.php/makatebController/checkAddMakateb" enctype="multipart/form-data">
                    <div class="form-body">
                    <div class="row">
                        <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_shomaraiMaktob)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold;">شماره  مکتوب*</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="shomaraiMaktob" value="<?php if (!empty($Field_data['recordNumber'])) echo $Field_data['recordNumber']; ?>" placeholder="">
                                <div class="form-control-focus"></div>
                                <?php if(!empty($error_shomaraiMaktob)){?>
                                <span class="help-block-error" style="color:red;"><?=$error_shomaraiMaktob?></span>
                                <?php }?>
                            </div>
                        </div>

                        <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_date)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold">تاریخ ثبت*</label>
                            <div class="col-md-9">
                                <input type="date" style="text-align: right;" class="form-control" name="date" value="<?php if (!empty($Field_data['date'])) echo $Field_data['date']; ?>" placeholder="۱۳۹۸/۳/۲">
                                <div class="form-control-focus"></div>
                                <?php if(!empty($error_date)){?>
                                <span class="help-block-error" style="color:red;"><?=$error_date?></span>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                                     <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_shuba)) echo 'has-error' ?>">
                                                 <label class="col-md-3 control-label" style="font-weight: bold">شعبه مربوطه*</label>
                                                     <div class="col-md-9">
                                                       <select class="form-control" name="shuba" >
                                                       <option <?php if(!empty($Field_data['publisher']) && $Field_data['publisher'] == 0) echo ' selected '?> value="0">شعبه مربوطه</option>
                                                       <?php $this->db->from('shuabat');
                                                             $data=$this->db->get()->result();
                                                             foreach ($data as $row) {
                                                        ?>
                                                        <option <?php if(!empty($Field_data['publisher']) && $Field_data['publisher'] == $tran->translator_id) echo ' selected '?> value="<?=$row->shuba_id?>"><?=$row->shuba_name?></option>
                                                          <?php }?>
                                              </select>
                                              <div class="form-control-focus"> </div>
                                             <?php if(!empty($error_shuba)){?>
                                               <span class="help-block-error" style="color:red;"><?=$error_shuba?></span>
                                             <?php }?>
                                          </div>
                                      </div>
                          <div class="row">            
                        <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_mursal)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold">مرسل*</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="mursal" value="<?php if (!empty($Field_data['edition'])) echo $Field_data['edition']; ?>" placeholder="">
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_mursal)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_mursal?></span>
                                <?php }?>
                            </div>
                        </div>

                        </div>
                        <div class="row">
                        <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_typeOfMaktob)) echo 'has-error' ?>">
                        <label class="col-md-3 control-label" style="font-weight: bold">نوعیت مکتوب*</label>
                         <div class="col-md-9">
                       <select class="form-control" name="typeOfMaktob" >
                        <option <?php if(!empty($Field_data['publisher']) && $Field_data['publisher'] == 0) echo ' selected '?> value="0">صادره/وارده/تعقیبی</option>
                        <?php $this->db->from('nawyat_maktob');
                              $data=$this->db->get()->result();
                              foreach ($data as $row) {
                         ?>
                        <option <?php if(!empty($Field_data['publisher']) && $Field_data['publisher'] == $tran->translator_id) echo ' selected '?> value="<?=$row->ID?>"><?=$row->nawyat?></option>
                  <?php }?>
              </select>
              <div class="form-control-focus"> </div>
              <?php if(!empty($error_typeOfMaktob)){?>
                  <span class="help-block-error" style="color:red;"><?=$error_typeOfMaktob?></span>
              <?php }?>
          </div>
      </div>

                                                       
                       <div class="row">                                 
                        <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_mursalAlai)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold">مرسل الیه*</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="mursalAlai" value="<?php if (!empty($Field_data['valuemNumber'])) echo $Field_data['valuemNumber']; ?>" placeholder="">
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_mursalAlai)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_mursalAlai?></span>
                                <?php }?>
                            </div>
                        </div>
                      </div>
                               <div class="row">
                                      <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_mulahezat)) echo 'has-error' ?>">
                                            <label class="col-md-3 control-label" style="font-weight: bold;">ملاحظات*</label>
                                                <div class="col-md-9">
                                                        <input type="text" class="form-control" name="mulahezat" value="<?php if (!empty($Field_data['recordNumber'])) echo $Field_data['recordNumber']; ?>" placeholder="">
                                                        <div class="form-control-focus"></div>
                                                        <?php if(!empty($error_mulahezat)){?>
                                                        <span class="help-block-error" style="color:red;"><?=$error_mulahezat?></span>
                                                        <?php }?>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                   <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_khulasMatlab)) echo 'has-error' ?>">
                                                       <label class="col-md-3 control-label" style="font-weight: bold;">خلص مطلب*</label>
                                                       <div class="col-md-9">
                                                           <input type="text" class="form-control" name="khulasMatlab" value="<?php if (!empty($Field_data['recordNumber'])) echo $Field_data['recordNumber']; ?>" placeholder="">
                                                           <div class="form-control-focus"></div>
                                                           <?php if(!empty($error_khulasMatlab)){?>
                                                           <span class="help-block-error" style="color:red;"><?=$error_khulasMatlab?></span>
                                                           <?php }?>
                                                       </div>
                                                   </div>
                      <div class="row">
                      <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_bakhsheTahrerat)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold">تحریرات*</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="bakhsheTahrerat" value="<?php if (!empty($Field_data['price'])) echo $Field_data['price']; ?>" placeholder="">
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_bakhsheTahrerat)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_bakhsheTahrerat?></span>
                                <?php }?>
                            </div>
                        </div>
                           <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_hedayat)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold">هدایات*</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="hedayat" value="<?php if (!empty($Field_data['price'])) echo $Field_data['price']; ?>" placeholder="">
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_hedayat)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_hedayat?></span>
                                <?php }?>
                            </div>
                        </div>
                      </div>
                      <div class="row">
                       <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_dosyaArchive)) echo 'has-error' ?>">
                                                 <label class="col-md-3 control-label" style="font-weight: bold">دوسیه آرشیف*</label>
                                                     <div class="col-md-9">
                                                       <select class="form-control" name="dosyaArchive" >
                                                       <option <?php if(!empty($Field_data['publisher']) && $Field_data['publisher'] == 0) echo ' selected '?> value="0">دوسیه آرشیف</option>
                                                       <?php $this->db->from('dosya_archive');
                                                             $data=$this->db->get()->result();
                                                             foreach ($data as $row) {
                                                        ?>
                                                        <option <?php if(!empty($Field_data['publisher']) && $Field_data['publisher'] == $tran->translator_id) echo ' selected '?> value="<?=$row->dosya_id?>"><?=$row->dosya_name?></option>
                                                          <?php }?>
                                              </select>
                                              <div class="form-control-focus"> </div>
                                             <?php if(!empty($error_dosyaArchive)){?>
                                               <span class="help-block-error" style="color:red;"><?=$error_dosyaArchive?></span>
                                             <?php }?>
                                          </div>
                                      </div>
                           <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_ejraat)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold">اجرات*</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="ejraat" value="<?php if (!empty($Field_data['price'])) echo $Field_data['price']; ?>" placeholder="">
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_ejraat)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_ejraat?></span>
                                <?php }?>
                            </div>
                        </div>
                      </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-2 col-md-10">
                                <a href="<?=base_url()?>index.php/makatebController/index" class="btn btn-circle yellow-gold">لغو</a>
                                <input type="submit" name="addMaktob" class="btn btn-circle green-meadow" value="ذخیره"/>
                            </div>
                        </div>
                    </div>
                </form>
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
           window.location=url+"index.php/makatebController/deletemakateb?id="+id;
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
                       <a href="<?php echo base_url()?>index.php/makatebController/index" class="btn btn-circle green-meadow">بستن</a>
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
