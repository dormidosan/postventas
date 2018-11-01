<?php
   include 'secure.php';
   include 'classes/class.operaciones.php';
   //*************************PENDIENTE********************
   //cargar las categorias
   //cargar los clientes
   //cargar los agentes
   //******************************************************
   
   $obj = new Operaciones(True);
   //$usuarios = $obj->perfiles_buscar(null);    
   $categorias = $obj->usuario_categoria_buscar($_SESSION['USERDAT'][0]);
   //$clientes = $obj->cliente_buscar($_SESSION['USERDAT'][0]);
   $agentes = $obj->agentes_buscar($_SESSION['USERDAT'][0]);
   //$nacionalidades = $obj->nacionalidades_buscar(null, $_SESSION['USERDAT'][0]);
   $tipo_cliente = $obj->cliente_tipo_buscar($_SESSION['USERDAT'][0]);
   $categoria_cliente = $obj->cliente_categoria_buscar($_SESSION['USERDAT'][0]);
   
   
   $action = 0;
   
   $cat = $_GET['cat'];
   $action = $_GET['action'];
   $id = $_GET['id'];
   
   if ($cat <> 2 && $cat <> 3 ) {
     $cat = 1;
   }
   
   if ($action == 0) {
       $_SESSION["mttousuarios"] = "N";
   } else {
       $_SESSION["mttousuarios"] = "M";
   }
   
   ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Configuracion de Agentes
      </h1>
      <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
         <li><a href="#">Examples</a></li>
         <li class="active">User profile</li>
      </ol>
   </section>
   <!-- Main content -->
   <section class="content">
      <div class="row">
         <?php 
            //        Aqui se llama la columna de perfil, haciendo referencia en todo momento al perfil personal del usuario logueado
                    //include 'pages/elements/columnProfile.php';
                    ?>
         <!-- /.col -->
         <div class="col-md-12">
            <div class="nav-tabs-custom">
               <ul class="nav nav-tabs">
                  <!-- li  class="<?PHP //echo ( $cat == 1 )? 'active': ''; ?>"><a href="#usuarios" data-toggle="tab">Clientes</a></li -->
                  <!--li><a href="#grupos" data-toggle="tab">Grupos</a></li -->
                  <!-- li  class="<?PHP //echo ( $cat == 2 )? 'active': ''; ?>"><a href="#clientes" data-toggle="tab">Empresas</a></li -->
                  <li  class='active'><a href="#agentes" data-toggle="tab">Agentes</a></li>
               </ul>
               <div class="tab-content">
                  <!-- ************************************************************************************************************ -->
                  <!-- ****************************************   tab-panel   ***************************************************** -->
                  <!-- ************************************************************************************************************ -->              
                  <div class='tab-pane' id="usuarios">
                     <!--<div class="col-xs-12">-->
                     <div class="box">
                        <div class="box-header">
                           <h3 class="box-title">Clientes Registrados en el sistema</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                           <table id="example2" class="table table-bordered table-hover">
                              <thead>
                                 <tr>
                                    <th>Nombres</th>
                                    <th>Apellidos</th>
                                    <th>Usuario</th>
                                    <th></th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <!-- ?php
                                    for($i = 0; $i < count($usuarios); $i++){
                                     echo "<tr>";
                                     echo "<td>".$usuarios[$i][4]."</td>";
                                     echo "<td>".$usuarios[$i][5]."</td>";
                                     echo "<td>".$usuarios[$i][3]."</td>";
                                     echo "<td>";
                                     //echo "<a href='engine_settings.php?mod=8&cat=1&action=1&id=".$usuarios[$i][0]."'>Editar</a>";
                                     echo "<a  class='btn btn-warning' href='engine_settings.php?mod=8&cat=1&action=1&id=".$usuarios[$i][0]."'  >Editar</a>";
                                     echo "</td>";
                                     echo "</tr>";   
                                    }
                                    ?--> 
                              </tbody>
                              <tfoot>
                                 <tr>
                                    <th>Nombres</th>
                                    <th>Apellidos</th>
                                    <th>Usuario</th>
                                    <th></th>
                                 </tr>
                              </tfoot>
                           </table>
                        </div>
                        <!-- /.box-body -->
                     </div>
                     <!--</div>-->
                     <?php //En esta parte se muestran los campos para editar un cliente o registrar uno nuevo ?>
                     <h4 class="box-title">Informacion del cliente</h4>
                     <form class="form-horizontal" enctype="multipart/form-data" method="POST" name="reserva1" action="engine/ctrl_usuarios.php?id=<?php echo $id?>">
                        <div class="nav-tabs-custom">
                           <ul class="nav nav-tabs">
                              <li class="active"><a href="#usuariosGeneral" data-toggle="tab">General</a></li>
                              <li><a href="#usuariosInfoViajes" data-toggle="tab">Informacion de Viaje</a></li>
                              <!-- li><a href="#usuariosAcercaDe" data-toggle="tab">Autorizaciones</a></li -->
                           </ul>
                           <div class="tab-content">
                              <?php 
                                 //include 'pages/forms/engine_usuarios.php';
                                 ?>
                           </div>
                        </div>
                        <?php 
                                //here we check whether a register is being inserted or modified
                            if ($_SESSION["mttousuarios"] == "N" || ($_SESSION["mttousuarios"] == "M" && $cat == 1) ) {
                            ?>

                        <div class="form-group">
                           <div class="col-sm-offset-2 col-sm-10">
                              <button type="submit" class="btn btn-danger">Guardar Registro</button>
                              <?php
                                 if($_SESSION["mttousuarios"] == "M") {
                                     //Enables Change Password button if modifying an user
                                 //echo "<a href='engine_settings.php?mod=2&cat=1&action=1&id=".$usuarios[$i][0]."' class='btn btn-warning'>Cambiar Password</a>";    
                                 
                                 }
                                 ?>
                           </div>
                        </div>
                         <?php
                            }
                            ?> 

                     </form>
                     <!-- form class="form-horizontal" enctype="multipart/form-data" method="POST" name="reserva" action="engine/ctrl_usuarios.php?id=<-?php echo $id?>" -->
                  </div>
                  <!-- /.tab-pane -->
                  <!-- ************************************************************************************************************ -->
                  <!-- ****************************************   tab-panel   ***************************************************** -->
                  <!-- ************************************************************************************************************ -->
                  <!-- /.tab-pane -->
                  <div class='tab-pane' id="clientes">
                     <!--<div class="col-xs-12">-->
                     <div class="box">
                        <div class="box-header">
                           <h3 class="box-title">Empresas Registradas en el sistema</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                           <table id="example3" class="table table-bordered table-hover">
                              <thead>
                                 <tr>
                                    <th>Nombre</th>
                                    <th>Razon social</th>
                                    <th>ID fiscal</th>
                                    <th></th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <!-- ?php
                                    for($i = 0; $i < count($clientes); $i++){
                                     echo "<tr>";
                                     echo "<td>".$clientes[$i][5]."</td>";
                                     echo "<td>".$clientes[$i][9]."</td>";
                                     echo "<td>".$clientes[$i][10]."</td>";
                                     echo "<td>"; 
                                     //echo "<a href='engine_settings.php?mod=8&cat=2&action=1&id=".$clientes[$i][0]."'>Editar</a>";
                                     echo "<a  class='btn btn-warning' href='engine_settings.php?mod=8&cat=2&action=1&id=".$clientes[$i][0]."'  >Editar</a>";
                                     echo "</td>";
                                     echo "</tr>";   
                                    }
                                    ? --> 
                              </tbody>
                              <tfoot>
                                 <tr>
                                    <th>Nombre</th>
                                    <th>Razon social</th>
                                    <th>ID fiscal</th>
                                    <th></th>
                                 </tr>
                              </tfoot>
                           </table>
                        </div>
                        <!-- /.box-body -->
                     </div>
                     <!--</div>-->
                     <?php //En esta parte se muestran los campos para editar un cliente o registrar uno nuevo ?>
                     <h4 class="box-title">Informacion de la empresa</h4>
                     <form class="form-horizontal" enctype="multipart/form-data" method="POST" name="reserva2" action="engine/ctrl_clientes.php?id=<?php echo $id?>">
                        <div class="nav-tabs-custom">
                           <ul class="nav nav-tabs">
                              <li class="active"><a href="#usuariosGeneral" data-toggle="tab">General</a></li>
                              <!--li><a href="#usuariosInfoViajes" data-toggle="tab">Informacion de Viaje</a></li -->
                              <!-- li><a href="#usuariosAcercaDe" data-toggle="tab">Autorizaciones</a></li -->
                           </ul>
                           <div class="tab-content">
                              <?php 
                                 //include 'pages/forms/engine_clientes.php';
                                 ?>
                           </div>
                        </div>
                        <?php 
                                //here we check whether a register is being inserted or modified
                            if ($_SESSION["mttousuarios"] == "N" || ($_SESSION["mttousuarios"] == "M" && $cat == 2) ) {
                            ?>
                        <div class="form-group">
                           <div class="col-sm-offset-2 col-sm-10">
                              <button type="submit" class="btn btn-danger">Guardar Registro</button>
                              <?php
                                 if($_SESSION["mttousuarios"] == "X") {
                                     //Enables Change Password button if modifying an user
                                 //echo "<a href='engine_settings.php?mod=2&cat=1&action=1&id=".$clientes[$i][0]."' class='btn btn-warning'>Cambiar Password</a>";    
                                 
                                 }
                                 ?>
                           </div>
                        </div>
                        <?php
                            }
                            ?> 
                     </form>
                     <!--INSERTAR FORMULARIO DE EDICION-->
                     <!--INSERTAR FORMULARIO DE EDICION-->             
                  </div>
                  <!-- ************************************************************************************************************ -->
                  <!-- ****************************************   tab-panel   ***************************************************** -->
                  <!-- ************************************************************************************************************ -->
                  <!-- /.tab-pane -->
                  <div class='active tab-pane' id="agentes">
                     <!--<div class="col-xs-12">-->
                     <div class="box">
                        <div class="box-header">
                           <h3 class="box-title">Agentes Registrados en el sistema</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                           <table id="example4" class="table table-bordered table-hover">
                              <thead>
                                 <tr>
                                    <th>Nombre</th>
                                    <th>Cargos</th>
                                    <th>Email</th>
                                    <th></th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php
                                    for($i = 0; $i < count($agentes); $i++){
                                     echo "<tr>";
                                     echo "<td>".$agentes[$i][3]."</td>";
                                     echo "<td>".$agentes[$i][4]."</td>";
                                     echo "<td>".$agentes[$i][5]."</td>";
                                     echo "<td>"; 
                                     //echo "<a href='engine_settings.php?mod=8&cat=2&action=1&id=".$clientes[$i][0]."'>Editar</a>";
                                     echo "<a  class='btn btn-warning' href='engine_settings.php?mod=8&cat=3&action=1&id=".$agentes[$i][0]."'>Editar</a>";
                                     echo "</td>";
                                     //echo "<td><a href='engine_settings.php?mod=8&cat=3&action=1&id=".$agentes[$i][0]."'>Editar</a></td>";
                                     echo "</tr>";   
                                    }
                                    ?> 
                              </tbody>
                              <tfoot>
                                 <tr>
                                    <th>Nombre</th>
                                    <th>Cargos</th>
                                    <th>Email</th>
                                    <th></th>
                                 </tr>
                              </tfoot>
                           </table>
                        </div>
                        <!-- /.box-body -->
                     </div>
                     <!--</div>-->
                     <?php //En esta parte se muestran los campos para editar un cliente o registrar uno nuevo ?>
                     <h4 class="box-title">Informacion del agente</h4>
                     <!-- form class="form-horizontal" enctype="multipart/form-data" method="POST" name="reserva" action="engine/ctrl_usuarios.php?id=<-?php echo $id?>" -->
                     <form class="form-horizontal" enctype="multipart/form-data" method="POST" name="reserva3" action="engine/ctrl_agentes.php?id=<?php echo $id?>">
                        <div class="nav-tabs-custom">
                           <ul class="nav nav-tabs">
                              <li class="active"><a href="#agentesGeneral" data-toggle="tab">General</a></li>
                              <!--li><a href="#usuariosInfoViajes" data-toggle="tab">Informacion de Viaje</a></li -->
                              <!-- li><a href="#usuariosAcercaDe" data-toggle="tab">Autorizaciones</a></li -->
                           </ul>
                           <div class="tab-content">
                              <?php 
                                 include 'pages/forms/engine_agentes.php';
                                 ?>
                           </div>
                        </div>
                        <?php 
                                //here we check whether a register is being inserted or modified
                            if ($_SESSION["mttousuarios"] == "N" || ($_SESSION["mttousuarios"] == "M" ) ) {
                            ?>
                        <div class="form-group">
                           <div class="col-sm-offset-2 col-sm-10">
                              <button type="submit" class="btn btn-danger">Guardar Agente</button>
                              <?php
                                 if($_SESSION["mttousuarios"] == "X") {
                                     //Enables Change Password button if modifying an user
                                 echo "<a href='engine_settings.php?mod=2&cat=1&action=1&id=".$agentes[$i][0]."' class='btn btn-warning'>Cambiar Password</a>";    
                                 
                                 }
                                 ?>
                           </div>
                        </div>
                         <?php
                            }
                            ?> 
                     </form>
                     <!--INSERTAR FORMULARIO DE EDICION-->
                     <!--INSERTAR FORMULARIO DE EDICION-->
                  </div>
                  <!-- /.tab-pane -->              
               </div>
               <!-- /.tab-content -->
            </div>
            <!-- /.nav-tabs-custom -->
         </div>
         <!-- /.col -->
      </div>
      <!-- /.row -->
   </section>
   <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- page script -->
<!-- jQuery 2.2.3 -->
<script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<!--<script src="../../bootstrap/js/bootstrap.min.js"></script>-->
<!-- DataTables -->
<!--<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
   <script src="../../plugins/datatables/dataTables.bootstrap.min.js"></script>-->
<!-- SlimScroll -->
<!--<script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>-->
<!-- FastClick -->
<!--<script src="../../plugins/fastclick/fastclick.js"></script>-->
<!-- AdminLTE App -->
<!--<script src="../../dist/js/app.min.js"></script>-->
<!-- AdminLTE for demo purposes -->
<!--<script src="../../dist/js/demo.js"></script>-->
<!-- bootstrap datepicker -->
<!--<script src="../../plugins/datepicker/bootstrap-datepicker.js"></script>-->
<!-- page script -->
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
     $('#example3').DataTable({
       "paging": true,
       "lengthChange": false,
       "searching": false,
       "ordering": true,
       "info": true,
       "autoWidth": false,
       "pageLength": 5
     });
      $('#example4').DataTable({
       "paging": true,
       "lengthChange": true,
       "searching": true,
       "ordering": true,
       "info": true,
       "autoWidth": true,
       "lengthMenu": [[5, 10], [5, 10]]
     });
     //Date picker
     $('#datepicker').datepicker({
       autoclose: true,
       dateFormat: 'yyyy-mm-dd',
       format:      'yyyy-mm-dd',
       startDate: '2010-01-01'
     });
     $('#datepicker2').datepicker({
       autoclose: true,
       dateFormat: 'yyyy-mm-dd',
       format:      'yyyy-mm-dd',
       startDate: '2010-01-01'
     });
     $('#datepicker3').datepicker({
       autoclose: true,
       dateFormat: 'yyyy-mm-dd',
       format:      'yyyy-mm-dd',
       startDate: '2010-01-01'
     });
     $('#datepicker4').datepicker({
       autoclose: true,
       dateFormat: 'yyyy-mm-dd',
       format:      'yyyy-mm-dd',
       startDate: '2010-01-01'
     });
     });
</script>

