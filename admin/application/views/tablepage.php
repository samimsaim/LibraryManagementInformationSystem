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
                    <b>کتگوری</b>
                </li>
            </ul>
        </div>
    <div class="portlet-body flip-scroll">
      <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light portlet-fit ">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-settings font-red"></i>
                                        <span class="caption-subject font-red sbold uppercase">Editable Table</span>
                                    </div>
                                    <div class="actions">
                                        <div class="btn-group btn-group-devided" data-toggle="buttons">
                                            <label class="btn btn-transparent red btn-outline btn-circle btn-sm active">
                                                <input type="radio" name="options" class="toggle" id="option1">Actions</label>
                                            <label class="btn btn-transparent red btn-outline btn-circle btn-sm">
                                                <input type="radio" name="options" class="toggle" id="option2">Settings</label>
                                        </div>
                                    </div>
                                </div>
                            
                                <div class="portlet-body">
                                    <div class="table-toolbar">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="btn-group">
                                                    <button id="sample_editable_1_new" class="btn green"> Add New
                                                        <i class="fa fa-plus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="btn-group pull-right">
                                                    <button class="btn green btn-outline dropdown-toggle" data-toggle="dropdown">Tools
                                                        <i class="fa fa-angle-down"></i>
                                                    </button>
                                                    <ul class="dropdown-menu pull-right">
                                                        <li>
                                                            <a href="javascript:;"> Print </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;"> Save as PDF </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;"> Export to Excel </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <table  class="table table-bordered" width="100%" >
        <thead>
          <tr>
            <th>ID</th>
            <th style="text-align: center;">کتگوری</th>
            <th style="text-align: center;">تنظیمات</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          foreach ($posts as $post)        
           {            
          ?> 
          <tr style="text-align: center;"> 
            <td ><?php echo $post->category_id; ?></td>
            <td title="Double click to Edit and press Enter to Save" ondblclick="this.contentEditable=true; this.className='inEdit';" onblur="this.contentEditable=false; this.className='';" onkeypress="saveData(event,'<?php echo $post->category_id; ?>',$(this).html() )"><?php echo $post->category_name; ?></td>
            <td style="text-align: center;"> 
             <a class="btn btn-circle btn-danger fa fa-trash-o" href=""></a></span></a></td>
          </tr> 
          <?php                          
            }
          ?>
        </tbody>
      </table>
      </div>
      </div>
      <!-- END EXAMPLE TABLE PORTLET-->
     </div>
  </div>
</div>



<script>
function saveData(e,id,title) {
  if(e.keyCode === 13){
    if (confirm('Are you sure you want to save this thing into the database?')) {
      e.preventDefault();
      $.ajax({
        type: "POST",
        url: "<?php echo base_url('table/savedata')?>",
        data: {  '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
                'category_id': id,
                'category_name' :title,
              },
        success: function(response){ 
          alert(response);
        }
      });
    }  
 }  
}
</script>

               