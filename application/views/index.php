
            <!--Slider Area Start-->
            <div class="slider-area">
                <div class="preview-2">
                    <div id="nivoslider" class="slides">
                        <img src="<?=base_url()?>assets/img/slider/1.jpg" alt="" title="#slider-1-caption1" />
                        <img src="<?=base_url()?>assets/img/slider/2.jpg" alt="" title="#slider-1-caption2" />
                    </div>
                    <div id="slider-1-caption1" class="nivo-html-caption nivo-caption">
                        <div class="banner-content slider-1">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="text-content-wrapper">
                                            <div class="text-content">
                                                <h1 class="title1 wow fadeInUp" data-wow-duration="2000ms" data-wow-delay="0s"> پوهنتون پولی‎تخنیک کابل<br>مقاصد:</h1>
                                                <p class="sub-title wow fadeInUp d-none d-lg-block" data-wow-duration="2900ms" data-wow-delay=".5s"> معیاری ساختن ومعاصرسازی متداوم تمام عرصه های كاری پوهنتون<br>رشد علوم انجنیری برمبنای جدید ترین دست اورد های علوم وفنون جهان <br> ، ایجاد رشته ها وپوهنحی های جدید وتربیه كادرهای علمی، انجنیری شایسته ومجرب مطابق به نیازهای کشورو<br> وفادار به ارزش های انسانی اسلامی و میهنی نظر به مطالبات ومعیار های عصروزمان.</p>
                                                <div class="banner-readmore wow fadeInUp" data-wow-duration="3600ms" data-wow-delay=".6s">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="slider-1-caption2" class="nivo-html-caption nivo-caption">
                        <div class="banner-content slider-2">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="text-content-wrapper">
                                            <div class="text-content slide-2">
                                                <h1 class="title1 wow rotateInDownLeft" data-wow-duration="1000ms" data-wow-delay="0s">دیدگاه<br> پوهنتون پولی‎تخنیک کابل</h1>
                                                <p class="sub-title wow rotateInDownLeft d-none d-lg-block" data-wow-duration="1800ms" data-wow-delay="0s"> دیدگاه ماایجاد یك سیستم تحصیلات عالی تخصصی انجنیری كه ازنظر كمی وكیفی نه تنها<br> نیازهای توسعه وپیشرفت افغانستان را نظربه مطالبات معاصر جوابده باشد، بلكه با معیارهای<br> اكادمیك پوهنتون های منطقه و جهان رقابت نماید.</p>
                                                <div class="banner-readmore wow rotateInDownLeft" data-wow-duration="1800ms" data-wow-delay="0s">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End of Slider Area-->
            <!--About Area Start-->

            <!--End of About Area-->
            <!--Course Area Start-->
        <!--  <?php  include 'news.php' ?> -->
            <!--End of Course Area-->

            <!--Latest News Area Start-->
            <div class="latest-area section-padding bg-white">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-title-wrapper">
                                <div class="section-title">
                                    <h3> در  باره ما</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php foreach($result as $key){
                             if($key->aprove==1){
                         ?>
                        <div class="col-lg-6 col-md-12 col-12">
                            <div class="single-latest-item">
                                <div class="single-latest-image">
                                    <a href="#"><img src="<?=base_url().'admin/'.$key->image?>" alt=""></a>
                                </div>
                                <div class="single-latest-text">
                                    <h3><a href="#"><?=$key->username?></a></h3>

                                    <p><?=$key->phone?></p>
                                    <p><?=$key->email?></p>

                                </div>
                            </div>
                        </div>
                    <?php }}?>
                    </div>
                </div>
            </div>
            <!--End of Latest News Area-->
            <!--Online Product Area Start-->
            <div class="product-area section-bottom-padding bg-white">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-title-wrapper">
                                <div class="section-title">
                                    <h1>کتاب ها</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                     <?php
                      $i=0;
                      foreach($data['book'] as $row){
                    
                       ?>
                        <div class="col-lg-3 col-md-6" style="margin-top: 20px;">
                            <div class="single-product-item">
                                <div class="single-product-image" >
                                    <a href="#"><img style="height:200px;" src="<?=base_url().'admin/'.$row->image?>" alt=""></a>
                                </div>
                                <div class="single-product-text">

                                     <br><br><br><br>
                                    <div class="product-price" >
                                        <div class="single-item-rating" style="margin-left:60px;">
                                          <p style="text-align:right;">عنوان: <?=$row->book_title?></p>
                                          <p style="text-align:right;">تعداد جلد: <?=$row->no_of_volume?></p>
                                          <p style="text-align:right;">چاپ: <?=$row->edition?></p>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    <?php  }?>

                    </div>
                    <div class="button-bottom" style="margin-top: 30px;">
                        <a href="<?=base_url()?>index.php/mainPageController/book" class="button-default">بیشتر</a>
                    </div>
                </div>
            </div>
            <!--End of Online Product Area-->
            <!--Testimonial Area Start-->

            <!--End of Testimonial Area-->
            <!--Event Area Start-->
         <!--  <?php  include 'elanat.php'  ?> -->
            <!--End of Event Area-->


            <script type="text/javascript">
var h1 = document.getElementById("a");  // Get the first <h1> element in the document
var att = document.createAttribute("style");       // Create a "class" attribute
att.value = "color: rgb(134, 188, 66);";
// var att = document.createAttribute("style");
//    att.value = "color:red";
h1.setAttributeNode(att);
//class=""
</script>
