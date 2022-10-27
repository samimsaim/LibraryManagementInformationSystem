
</body>
<!-- BEGIN CORE PLUGINS -->
      <!--BEGINING OF PAGINATION TABLE FROM HERER-->
    <script src="<?=base_url()?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?=base_url()?>assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
    <script src="<?=base_url()?>assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
    <script src="<?=base_url()?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src="<?=base_url()?>assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
    <script src="<?=base_url()?>assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
    <script src="<?=base_url()?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="<?=base_url()?>assets/global/scripts/datatable.js" type="text/javascript"></script>
    <script src="<?=base_url()?>assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
    <script src="<?=base_url()?>assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <script src="<?=base_url()?>assets/global/plugins/echarts/echarts.js" type="text/javascript"></script>
    <!-- BEGIN THEME GLOBAL SCRIPTS -->
    <script src="<?=base_url()?>assets/global/scripts/app.min.js" type="text/javascript"></script>
    <!-- END THEME GLOBAL SCRIPTS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="<?=base_url()?>assets/pages/scripts/charts-echarts.min.js" type="text/javascript"></script>
    <script src="<?=base_url()?>assets/pages/scripts/table-datatables-responsive.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <script src="<?=base_url();?>assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
    <script src="<?=base_url();?>assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>
    <!-- BEGIN THEME LAYOUT SCRIPTS -->
    <script src="<?=base_url()?>assets/layouts/layout2/scripts/layout.min.js" type="text/javascript"></script>
    <script src="<?=base_url()?>assets/layouts/layout2/scripts/demo.min.js" type="text/javascript"></script>
    <script src="<?=base_url()?>assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->
        <script src="<?=base_url()?>assets/code/highcharts.js"></script>
<script src="<?=base_url()?>assets/code/modules/data.js"></script>
<script src="<?=base_url()?>assets/code/modules/exporting.js"></script>

    <script>

        function sleep(milliseconds){
            var start = new Date().getTime();
            for(var i = 0 ; i < 1e7;i++){
                if((new Date().getTime() - start ) > milliseconds){
                    break;
                }
            }
        }

        <?php if(isset($_SESSION["moment"])){?>
            $(document).ready(function(){
                setInterval(function(){
                    $.ajax({
                        type: "POST",
                        url: "<?=base_url();?>index.php/attendanceController/setAttendanceFirst",
                        data: {moment:"<?=$_SESSION["moment"]?>",devName:"door_1"},
                        dataType: "JSON",
                        success: function(data) {
                        },
                        error: function(err) {
                        }
                    });
                },5000);
                sleep(2000);
                setInterval(function(){
                    $.ajax({
                        type: "POST",
                        url: "<?=base_url();?>index.php/attendanceController/setAttendanceSecond",
                        data: {moment:"<?=$_SESSION["moment"]?>",devName:"door_2"},
                        dataType: "JSON",
                        success: function(data) {
                        },
                        error: function(err) {
                        }
                    });
                },5000);
            });
        <?php }?>
    </script>
</html>

