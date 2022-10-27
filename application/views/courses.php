
            <!--Breadcrumb Banner Area Start-->
            <div class="breadcrumb-banner-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="breadcrumb-text">
                                <h1 class="text-center">کارمندان کتاب خانه</h1>
                                <div class="breadcrumb-bar">
                                    <ul class="breadcrumb text-center">
                                        <li><a href="<?=base_url()?>index.php/mainPageController/index">بازگشت</a></li>
                                        <li>پوهنتون پولی تخنیک</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End of Breadcrumb Banner Area-->

            <!--Search Category Start-->
            <div class="search-category">
                <div class="container">
                    <div class="row">
                  
                    </div>
                </div>
            </div>
            <!--End of Search Category-->
 <br><br><br><br>
            <!--کمپیوتر ساینسs Area Start-->
            <div class="teachers-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-title-wrapper">
                                <div class="section-title">
                                    <h3>کارمندان کتابخانخه</h3>
                                    <p> </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                       <?php foreach ($data as $row) {
                         if($row->aprove==1){
                          ?>
                        <div class="col-lg-3 col-md-6 col-12">
                            <div class="single-teacher-item">
                                <div class="single-teacher-image">
                                    <a href="#"><img  src="<?=base_url().'admin/'.$row->image?>" alt=""></a>
                                </div>
                                <div class="single-teacher-text">
                                    <h3><a href="#"><?=$row->name?></a></h3>
                                    <h4><?=$row->last_name?></h4>
                                    <p><?=$row->email?></p>
                                    <p><?=$row->phone?></p>
                                    <div class="social-links">
                                        <a href="#"><i class="zmdi zmdi-facebook"></i></a>
                                        <a href="#"><i class="zmdi zmdi-twitter"></i></a>
                                        <a href="#"><i class="zmdi zmdi-google-old"></i></a>
                                        <a href="#"><i class="zmdi zmdi-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }}?>
                    </div>
                </div>
            </div>
            <!--End of کمپیوتر ساینسs Area-->

           <script type="text/javascript">
var h1 = document.getElementById("b");  // Get the first <h1> element in the document
var att = document.createAttribute("style");       // Create a "class" attribute
att.value = "color: rgb(134, 188, 66);";
// var att = document.createAttribute("style");
//    att.value = "color:red";
h1.setAttributeNode(att);
//class=""
</script>
