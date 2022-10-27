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
                    <b>معلومات  کتاب</b>
                </li>
            </ul>
        </div>
        <div class="portlet light ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-social-dribbble font-green"></i>
                    <span class="caption-subject font-green bold uppercase">معلومات عمومی  کتاب</span>
                </div>
                <div class="actions">
                    <a class="btn btn-circle green-meadow" href="<?=base_url()?>index.php/bookController/index" style="font-size: 16px;">
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
                                        <th>عنوان کتاب</th>
                                        <td><?=ucfirst($row->book_title)?></td>
                                    </tr>
                                    <tr>
                                        <th>شماره ثبت</th>
                                        <td><?=ucfirst($row->record_id)?></td>
                                    </tr>
                                   <?php $this->db->where('publisher_id',$row->publisher_id);
                                        $this->db->from('publisher');
                                        $data=$this->db->get()->result();
                                        foreach ($data as $data) {}
                                         ?>
                                    <tr>
                                        <th>نام پابلیشر</th>
                                        <td><?=$data->publisher_name?></td>
                                    </tr>
                                    <tr>
                                        <th>تعداد جلد</th>
                                        <td><?=$row->no_of_volume?></td>
                                    </tr>
                                    <tr>
                                        <th>تعداد صفحه</th>
                                        <td><?=$row->no_of_pages?></td>
                                    </tr>
                                    <?php $this->db->where('procurement_id',$row->procurement_id);
                                        $this->db->from('procurement');
                                        $data=$this->db->get()->result();
                                        foreach ($data as $data) {}
                                         ?>
                                    <tr>
                                        <th>تمویل کننده</th>
                                        <td><?=$data->procurement_name?></td>
                                    </tr>
                                    <?php $this->db->where('category_id',$row->category_id);
                                        $this->db->from('category');
                                        $data=$this->db->get()->result();
                                        foreach ($data as $data) {}
                                         ?>
                                    <tr>
                                        <th>کتگوری</th>
                                        <td><?=$data->category_name?></td>
                                    </tr>
                                     <tr>
                                        <th>چاپ</th>
                                        <td><?=$row->edition?></td>
                                    </tr>
                                    <?php $this->db->where('book_id',$row->book_id);
                                        $this->db->from('book_author');
                                        $dat=$this->db->get()->result();
                                        foreach($dat as $result){}
                                        //  $this->db->where('author_id',$result->author_id);
                                        // $this->db->from('author');
                                        // $data=$this->db->get()->result();
                                        $dat = $this->db->select('*')->from('author')->where('author_id',$result->author_id)->get();
                                            $data=$dat->result();
                                         ?>
                                    <tr>
                                        <th>موًلف</th>
                                        <td><?php foreach($data as $value){
                                            echo $value->author_name;
                                        }
                                        ?>, </td>
                                    </tr>
                                     <tr>
                                        <th>قیمت</th>
                                        <td><?=$row->price?></td>
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







