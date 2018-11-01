<!DOCTYPE html>
<html>
  <?php
  require "secure.php";
  $mod = $_GET['mod'];
  $cat = $_GET['cat'];
  $action = $_GET['action'];
  $id = $_GET['id'];
  
    include 'engine_header.php';
  ?>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

    <?php
        include 'engine_user_menu.php';
        include 'engine_settings_modules_menu.php';
    ?>
    <!-- Content Wrapper. Contains switch to display content or modules -->

    <!-- Switch Options order
        0- Dashboard
        1- Settings
        2- Mailbox
        3- Compose Mail
        4- Read Mail
      
    -->
    
    <?php
    try{
        switch ($mod) {
            case 0:
                include 'pages/settings_users.php';
                break;
            case 1:
                //include 'pages/settings_users.php';
                //include 'pages/settings_user.php';
//                include 'pages/calendar.php';
                break;
            case 2:
                include 'pages/settings_users_password.php';
                break;
//            case 2:
//                include 'pages/mailbox/mailbox.php';
//                break;
            case 3:
                include 'pages/mailbox/compose.php';
                break;
            case 4:
                include 'pages/mailbox/read-mail.php';
                break;
            case 5:
                include 'pages/sysuser.php';
                break;
            case 6:
                include 'pages/settings_users.php';
                break;
            case 7:
                include 'pages/settings_companies.php';
                break;
            case 8:
                include 'pages/settings_agents.php';
                break;
            
            default:
                include 'pages/dashboard.php';
                break;
        }
    } catch (Exception $ex) {

    }   
        
    ?>

    <!-- End of Content Wrapper. End of Switch -->

    <?php 
      include 'engine_footer.php';
      include 'engine_layout_settings.php';
    ?>

    <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>    
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="plugins/morris/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/knob/jquery.knob.js"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <!--<script src="dist/js/demo.js"></script>-->
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard2.js"></script>         

     <!-- ChartJS 1.0.1 -->
    <script src="plugins/chartjs/Chart.min.js"></script>
    <script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
    
    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });

  });
</script>
  </body>
</html>
