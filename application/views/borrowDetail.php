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
                    <a href="<?=base_url()?>index.php/UsersController/index">کتاب</a>
                    <i class="fa fa-angle-left"></i>
                </li>
                <li>
                    <b>معلومات  قرضدار</b>
                </li>
            </ul>
        </div>
        <div class="portlet light ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-social-dribbble font-green"></i>
                    <span class="caption-subject font-green bold uppercase">معلومات عمومی  قرضدار</span>
                </div>
                <div class="actions">
                    <a class="btn btn-circle green-meadow" href="<?=base_url()?>index.php/borrowController/index" style="font-size: 16px;">
                        <i class="fa fa-share"></i>برگشت</a>
                    </a>
                </div>
            </div>
            
                <div class="portlet-body">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="table-scrollable">
                                <?php foreach($data as $row){?>
                                <table class="table table-hover">
                                    <tbody>
                                    <tr>
                                        <?php if($row->type==0){
                                        $this->db->where('student_id',$row->borrower_id);
                                        $this->db->from('student');
                                        $data=$this->db->get()->result();
                                        foreach ($data as $student) {} 
                                        }  else{
                                        $this->db->where('om_id',$row->borrower_id);
                                        $this->db->from('other_member');
                                        $data=$this->db->get()->result();
                                        foreach ($data as $student) {}  
                                        }?>
                                        <th>نام شاگرد</th>
                                        <td><?=ucfirst($student->name)?></td>
                                    </tr>
                                    <tr>
                                        <th>نوعیت شاگرد</th>
                                        <td><?php if($row->type==0) echo "شاگرد داخلی"; else echo "شاگرد بیرونی"; ?></td>
                                    </tr>
                                  
                                    <tr>
                                        <?php 
                                        $this->db->where('book_id',$row->book_id);
                                        $this->db->from('book');
                                        $data=$this->db->get()->result();
                                        foreach ($data as $dat) {} 
                                         ?>
                                        <th>نام کتاب</th>
                                        <td><?=$dat->book_title?></td>
                                    </tr>
                                    <tr>
                                        <th>تاریخ گرفتن کتاب</th>
                                        <td><?=$row->check_in?></td>
                                    </tr>
                                    <tr>
                                        <th>تاریخ برگشت کتاب</th>
                                        <td><?=$row->check_out?></td>
                                    </tr>
                                    
                                    <tr>
                                        <th>ضمانت</th>
                                        <td><?=$row->collateral?></td>
                                    </tr>
                                   
                                    <tr>
                                        <th>شخص ثبت کننده</th>
                                        <td><?=$row->user_name?></td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                    </div>
                    
                </div>
            </div>
            <?php }?>
        </div>
    </div>
</div>







