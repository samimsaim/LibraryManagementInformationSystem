

            <!--End of Google Map Area-->
            <!--Contact Form Area Start-->
            <div style="margin-top: 100px;" class="contact-form-area section-padding">
                <div class="container">
                    <div class="row">
                       <div class="col-lg-4 col-md-12">
                             <div class="top-info" style="margin-bottom: 25px;">
                             <h4><i class="fa fa-fax" aria-hidden="true"></i> شماره تماس</h4>
                            </div>
                            <div class="contact-text">
                                <?php foreach($data as $row){ ?>
                                <p><span class="c-text"><?=$row->phone?></span><span class="c-icon"><i class="zmdi zmdi-phone"></i></span></p>
                               <?php }?>

                            </div>

                        </div>
                         <div class="col-lg-4 col-md-12">
                             <div class="top-info" style="margin-bottom: 25px;">
                             <h4><i class="fa fa-map-marker" aria-hidden="true"></i> آدرس کتابخانه</h4>
                            </div>

                            <div class="contact-text">
                                <?php foreach($data as $row){ ?>
                                <p><span class="c-icon"><i class="zmdi zmdi-pin"></i></span><span class="c-text"><?=$row->address?><br>
                                    </span></p>
                                <?php }?>
                            </div>
                            <div id="myMap" style='position:relative;width:600px;height:400px;'></div>

                        </div>
                          <div class="col-lg-4 col-md-12">
                             <div class="top-info" style="margin-bottom: 25px;">
                               <h4><i class="fa fa-envelope" aria-hidden="true"></i> ایمیل آدرس</h4>
                            </div>
                            <div class="contact-text">
                               <?php foreach($data as $row){ ?>
                                <p><span class="c-text"><?=$row->email?></span><span class="c-icon"><i class="zmdi zmdi-email"></i></span></p>
                                <?php }?>
                            </div>

                        </div>
                        <div class="col-lg-8 col-md-12">

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
<script type='text/javascript' src='https://www.bing.com/api/maps/mapcontrol?callback=GetMap&key=Asg07BNlNb4qmAHocHpHooyDSNZHxokDHh9E1ml15vmTE1kfBSFTipbDQSP8dx55' async defer></script>

<script src="<?=base_url()?>assets/js/script.js"></script>
