
            <!--End of Google Map Area-->
            <!--Contact Form Area Start-->
            <div class="contact-form-area section-padding">
                <div class="container">
                    <div class="row">
                        <?php $this->db->from('opinion');
                                        $result=$this->db->get()->result();
                                        foreach($result as $row){
                                            if($row->aprove==1){
                                     ?>
                                        <div class="col-md-6">
                                          <div class="about-author"  >

                                            <div class="author-content" >

                                                <div class="post-social-share"  >
                                                    <ul>
                                                        <li>
                                                            <a href="#.">

                                                                <span style="font-size: 20px;  ">نام- <?=$row->name?></span>
                                                            </a>
                                                        </li>
                                                </div>
                                                <div class="clearfix" style="text-align: center;margin-top: 10px; border: 1px solid gray; "></div><div >
                                                <p style=""><span></span><?=$row->detail?>.</p>
                                            </div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        </div>
                                    <?php }}?>
                        <div class="col-lg-8 col-md-12">
                            <h4 class="contact-title">نظریات شما</h4>
                             <form class="login" method="post" action="<?=base_url()?>index.php/mainPageController/checkAddDetail" >
                                                            <p class="form-row form-row-first input-required">

                                                                <input type="text"  placeholder="اسم"   id="username" name="name" class="input-text">
                                                                <div class="form-control-focus"></div>
                                                              <?php if(!empty($error_name)){?>
                                                               <span class="help-block-error" style="color:red;"><?=$error_name?></span>
                                                                <?php }?>
                                                             </p>
                                                            <p class="form-row form-row-last input-required" >

                                                                <input  placeholder="تخلص"  type="text" id="password" name="lname" class="input-text" >
                                                                  <div class="form-control-focus"></div>
                                                              <?php if(!empty($error_lname)){?>
                                                               <span class="help-block-error" style="color:red;"><?=$error_lname?></span>
                                                                <?php }?>
                                                            </p>
                                                            <p class="form-row form-row-last input-required" >

                                                                <input  placeholder="پوهنتون"  type="text" id="password" name="uni" class="input-text" >
                                                                  <div class="form-control-focus"></div>
                                                              <?php if(!empty($error_uni)){?>
                                                               <span class="help-block-error" style="color:red;"><?=$error_uni?></span>
                                                                <?php }?>
                                                            </p>
                                                            <p class="form-row form-row-last input-required" >

                                                                <input placeholder="ایمیل آدرس" type="text"  name="email" class="input-text" >
                                                                  <div class="form-control-focus"></div>
                                                              <?php if(!empty($error_email)){?>
                                                               <span class="help-block-error" style="color:red;"><?=$error_email?></span>
                                                                <?php }?>
                                                            </p>
                                                             <p class="form-row form-row-last input-required" >

                                                                <textarea rows="10" cols="167" type="text" id="password" name="detail" placeholder="نظریات" class="input-text" ></textarea>
                                                                  <div class="form-control-focus"></div>
                                                              <?php if(!empty($error_detail)){?>
                                                               <span class="help-block-error" style="color:red;"><?=$error_detail?></span>
                                                                <?php }?>
                                                            </p>
                                                            <div class="clear"></div>
                                                            <div class="col-md-2">
                                                            <input type="submit" value="ارسال" name="addDetail" class="button-default">
                                                            <div class="clear"></div>
                                                             </div>
                                                        </form>


                            <p class="form-messege"></p>
                        </div>
                    </div>
                </div>
            </div>
            <!--End of Contact Form-->
            <!--Newsletter Area Start-->

             <script type="text/javascript">
var h1 = document.getElementById("e");  // Get the first <h1> element in the document
var att = document.createAttribute("style");       // Create a "class" attribute
att.value = "color: rgb(134, 188, 66);";
// var att = document.createAttribute("style");
//    att.value = "color:red";
h1.setAttributeNode(att);
//class=""
</script>
