<?php
   include 'secure.php';
   include 'classes/class.operaciones.php';
   //*************************PENDIENTE********************
   //cargar las categorias
   //cargar los clientes
   //cargar los agentes
   //******************************************************
   
   $obj = new Operaciones(True);
   $sysusers = $obj->sysusers_buscar($_SESSION["IDUSUARIO"],null);    

   $id = $_GET['id'];
   $cliente = $_GET['cliente'];

   if ($action == 0) {
       $_SESSION["mttosysusers"] = "N";
   } else {
       $_SESSION["mttosysusers"] = "M";
   }
   
   ?>
<style>
.modal-lg {
	/* width: 1500px !important; */
        /*max-width: 80% !important;*/
      /*width: 80% !important;*/
}

</style>
    
    
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

    <h1>
        Configuracion de Usuarios del sistema
    </h1>

      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">sysuser</a></li>
        <li class="active">Mantenimiento </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="box">
    <div class="box-header">
        <div class="col-sm-5">
            <h3 class="box-title">Mantenimiento usuarios del sistema</h3>
            
        </div>

    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Usuario</th>
          <th>Cargo</th>
          <th>Correo</th>
          <th></th>
        </tr>
        </thead>
        <tbody>
                                 <?php
                                    for($i = 0; $i < count($sysusers); $i++){
                                     echo "<tr>";
                                     echo "<td>".$sysusers[$i][1]."</td>";
                                     echo "<td>".$sysusers[$i][2]."</td>";
                                     echo "<td>".$sysusers[$i][4]."</td>";
                                     echo "<td>".$sysusers[$i][7]."</td>";
                                     echo "<td>".$sysusers[$i][6]."</td>";
                                     echo "<td>";
                                     //echo "<a href='engine_settings.php?mod=1&cat=1&action=1&id=".$usuarios[$i][0]."'>Editar</a>";
                                     echo "<a  class='btn btn-warning' href='engine_settings.php?mod=5&action=1&id=".$sysusers[$i][0]."'  >Editar</a>";
                                     echo "</td>";
                                     echo "</tr>";   
                                    }
                                    ?> 
                              </tbody>
        <tfoot>
        <tr>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Usuario</th>
          <th>Cargo</th>
          <th>Correo</th>
          <th></th>
        </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.box-body -->
  </div>        
       


    <?php //En esta parte se muestran los campos para editar un cliente o registrar uno nuevo ?>
    <h4 class="box-title">Informacion del usuario del sistema</h4>
    <form class="form-horizontal" enctype="multipart/form-data" method="POST" name="reserva2" action="engine/ctrl_sysusers.php?id=<?php echo $id?>">
       <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
             <li class="active"><a href="#usuariosGeneral" data-toggle="tab">General</a></li>
             <!--li><a href="#usuariosInfoViajes" data-toggle="tab">Informacion de Viaje</a></li -->
             <!-- li><a href="#usuariosAcercaDe" data-toggle="tab">Autorizaciones</a></li -->
          </ul>
          <div class="tab-content">
             <?php 
                include 'pages/forms/engine_sysusers.php';
                ?>
          </div>
       </div>
       <?php 
          //here we check whether a register is being inserted or modified
          if ($_SESSION["mttousuarios"] == "N" || ($_SESSION["mttousuarios"] == "M" ) ) {
          ?>
       <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
             <button type="submit" class="btn btn-danger">Guardar Registro</button>
             <?php
                if($_SESSION["mttousuarios"] == "X") {
                    //Enables Change Password button if modifying an user
                echo "<a href='engine_settings.php?mod=2&action=1&id=".$clientes[$i][0]."' class='btn btn-warning'>Cambiar Password</a>";    

                }
                ?>
          </div>
       </div>
       <?php
          }
          ?> 
    </form>

      

    </section>
    <!-- /.content -->
  </div>

  <!-- /.content-wrapper -->
 
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "lengthMenu": [[5, 10], [5, 10]]
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
    });
  });
  



 
</script>

