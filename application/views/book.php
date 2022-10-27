


<br><br><br><br>
    <div class="course-area section-padding bg-white">
                <div class="container">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="section-title-wrapper" >
                                <div class="section-title" >
                                    <h3>کتاب ها</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                      <div class="row" id="result" >
                      </div>
                        <div class="col-md-12 col-sm-12 text-center" style="margin-right: 500px; margin-top: 100px;">
                                   <?php echo $data['pagination'];?>

                        </div>
                    </div>
                </div>
            </div>

                 <script type="text/javascript">
var h1 = document.getElementById("c");  // Get the first <h1> element in the document
var att = document.createAttribute("style");       // Create a "class" attribute
att.value = "color: rgb(134, 188, 66);";
// var att = document.createAttribute("style");
//    att.value = "color:red";
h1.setAttributeNode(att);
//class=""
</script>
 <script src="<?=base_url()?>assets/jquery-3.3.1.min.js"></script>
  <script src="<?=base_url()?>assets/bootstrap.min.js"></script>
  <link href="<?=base_url()?>assets/bootstrap.css" rel="stylesheet" />
<script>
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"<?php echo base_url(); ?>index.php/mainPageController/fetch",
   method:"POST",
   data:{query:query},
   success:function(data){
    $('#result').html(data);
   }
  })
 }

 $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});
</script>
