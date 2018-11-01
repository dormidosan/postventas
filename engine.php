<!DOCTYPE html>
<html>
  <?php
  require "secure.php";
  $mod = $_GET['mod'];
  $cat = $_GET['cat'];
  $action = $_GET['action'];
  $id = $_GET['id'];
  $session_value = (isset($_SESSION["G50_IT_USERDAT"]))?$_SESSION["G50_IT_USERDAT"][0]:'';
  
  if ($mod == 6){
      include 'engine_header_calendar.php';
  } else {
      include 'engine_header.php';
  }
  ?>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

    <?php
        include 'engine_user_menu.php';
        include 'engine_modules_menu.php';
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
//                include 'pages/dashboard.php';
                include 'pages/perfil.php';
                break;
            case 1:
                header("Location: http://beta.travelcore.network/engine_settings.php?mod=0");
                exit();
//                include 'pages/calendar.php';
                break;
            case 2:
                include 'global.php';
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
                include 'pages/perfil.php';
                break;
            case 6:
                include 'pages/calendario.php';
                break;
            default:
//                include 'pages/dashboard.php';
                include 'pages/perfil.php';
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
    <?php
        if($mod == 6) {
            include 'engine_scripts_calendar.php';
        } else {
            include 'engine_scripts.php';
        }
    ?>
    
  </body>
  
</html>



