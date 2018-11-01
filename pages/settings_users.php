<?php
   include 'secure.php';
   include 'classes/class.operaciones.php';
   //*************************PENDIENTE********************
   //cargar las categorias
   //cargar los clientes
   //cargar los agentes
   //******************************************************
   
   $obj = new Operaciones(True);
   //$perfiles = $obj->perfiles_buscar_side(null);    
   $categorias = $obj->usuario_categoria_buscar($_SESSION['USERDAT'][0]);
   $clientes = $obj->cliente_buscar($_SESSION['USERDAT'][0]);
   $agentes = $obj->agentes_buscar($_SESSION['USERDAT'][0]);
   $nacionalidades = $obj->nacionalidades_buscar(null, $_SESSION['USERDAT'][0]);   
   //$ciudades = $obj->ciudades_buscar_display(null, $_SESSION['USERDAT'][0]);
   $tipo_cliente = $obj->cliente_tipo_buscar($_SESSION['USERDAT'][0]);
   $categoria_cliente = $obj->cliente_categoria_buscar($_SESSION['USERDAT'][0]);
   $carriers = $obj->carrier_buscar(null);
   
  
   
   $action = 0;
   
   $action = $_GET['action'];
   $id = $_GET['id'];
   
   
   
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
         Configuracion de Perfiles
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
                  <li  class='active'><a href="#usuarios" data-toggle="tab">Perfiles</a></li>
                  <!--li><a href="#grupos" data-toggle="tab">Grupos</a></li -->
                  <!--li  class="<?PHP //echo ( $cat == 2 )? 'active': ''; ?>"><a href="#clientes" data-toggle="tab">Empresas</a></li -->
                  <!-- li  class="<?PHP //echo ( $cat == 3 )? 'active': ''; ?>"><a href="#agentes" data-toggle="tab">Agentes</a></li -->
               </ul>
               <div class="tab-content">
                  <!-- ************************************************************************************************************ -->
                  <!-- ****************************************   tab-panel   ***************************************************** -->
                  <!-- ************************************************************************************************************ -->              
                  <div class='active tab-pane' id="usuarios">
                     <!--<div class="col-xs-12">-->
                     <div class="box">
                        <div class="box-header">
                           <h3 class="box-title">Perfiles Registrados en el sistema</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                           <!-- table id="example2" class="table table-bordered table-hover">
                              <thead>
                                 <tr>
                                    <th>Nombres</th>
                                    <th>Apellidos</th>
                                    <th>Cargo</th>
                                    <th></th>
                                 </tr>
                              </thead>
                              <tbody -->
                                 <!--?php
                                    for($i = 0; $i < count($perfiles); $i++){
                                     echo "<tr>";
                                     echo "<td>".$perfiles[$i][1]."</td>";
                                     echo "<td>".$perfiles[$i][2]."</td>";
                                     echo "<td>".$perfiles[$i][3]."</td>";
                                     echo "<td>";
                                     //echo "<a href='engine_settings.php?mod=6&cat=1&action=1&id=".$perfiles[$i][0]."'>Editar</a>";
                                     echo "<a  class='btn btn-warning' href='engine_settings.php?mod=6&action=1&id=".$perfiles[$i][0]."'  >Editar</a>";
                                     echo "</td>";
                                     echo "</tr>";   
                                    }
                                    ? --> 
                              <!-- /tbody>
                              <tfoot>
                                 <tr>
                                    <th>Nombres</th>
                                    <th>Apellidos</th>
                                    <th>Cargo</th>
                                    <th></th>
                                 </tr>
                              </tfoot>
                           </table -->
                              
                            <table id="usertablessp" class="table table-bordered table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Nombres</th>
                                        <th>Apellidos</th>
                                        <th>Cargo</th>
                                        <th>Empresa</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Nombres</th>
                                        <th>Apellidos</th>
                                        <th>Cargo</th>
                                        <th>Empresa</th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.box-body -->
                     </div>
                     <!--</div>-->
                     <?php //En esta parte se muestran los campos para editar un cliente o registrar uno nuevo ?>
                     <h4 class="box-title" id="infoPerfil">Informacion del perfil</h4>
                     
                        <div class="nav-tabs-custom">
                           <ul class="nav nav-tabs">
                              <li class="active"><a href="#usuariosGeneral" data-toggle="tab">General</a></li>
                              <li><a href="#nacionalidades" data-toggle="tab" style="<?PHP echo ( $_SESSION["mttousuarios"] == "N" )? 'display: none;': ''; ?>" >Nacionalidades</a></li>
                              <li>
                                <a href="#visas"  onclick="<?PHP echo ( $_SESSION["mttousuarios"] == "N" )? '':'updateDropDown('.$id.')'; ?>" data-toggle="tab" style="<?PHP echo ( $_SESSION["mttousuarios"] == "N" )? 'display: none;': ''; ?>" >Visas</a>
                              </li>
                              <li><a href="#infoViajes" data-toggle="tab" style="<?PHP echo ( $_SESSION["mttousuarios"] == "N" )? 'display: none;': ''; ?>" >Viajero frecuente</a></li>
                              <!-- li><a href="#usuariosAcercaDe" data-toggle="tab">Autorizaciones</a></li  "onclick='updateDropDown(".<?php echo $selperfil[0][0] ?>")'" -->
                           </ul>
                           <div class="tab-content">
                              <?php 
                                 include 'pages/forms/engine_usuarios.php';
                                 ?>
                           </div>
                        </div>
                       

                        
                         

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
                                 <?php
                                    for($i = 0; $i < count($clientes); $i++){
                                     echo "<tr>";
                                     echo "<td>".$clientes[$i][5]."</td>";
                                     echo "<td>".$clientes[$i][9]."</td>";
                                     echo "<td>".$clientes[$i][10]."</td>";
                                     echo "<td>"; 
                                     //echo "<a href='engine_settings.php?mod=6&cat=2&action=1&id=".$clientes[$i][0]."'>Editar</a>";
                                     echo "<a  class='btn btn-warning' href='engine_settings.php?mod=6&cat=2&action=1&id=".$clientes[$i][0]."'  >Editar</a>";
                                     echo "</td>";
                                     echo "</tr>";   
                                    }
                                    ?> 
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
                                 echo "<a href='engine_settings.php?mod=2&cat=1&action=1&id=".$clientes[$i][0]."' class='btn btn-warning'>Cambiar Password</a>";    
                                 
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
                  <div class='tab-pane' id="agentes">
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
                                     //echo "<a href='engine_settings.php?mod=6&cat=2&action=1&id=".$clientes[$i][0]."'>Editar</a>";
                                     echo "<a  class='btn btn-warning' href='engine_settings.php?mod=6&cat=3&action=1&id=".$agentes[$i][0]."'>Editar</a>";
                                     echo "</td>";
                                     //echo "<td><a href='engine_settings.php?mod=6&cat=3&action=1&id=".$agentes[$i][0]."'>Editar</a></td>";
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
                                 //include 'pages/forms/engine_agentes.php';
                                 ?>
                           </div>
                        </div>
                        <?php 
                                //here we check whether a register is being inserted or modified
                            if ($_SESSION["mttousuarios"] == "N" || ($_SESSION["mttousuarios"] == "M" && $cat == 3) ) {
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
       "lengthChange": true,
       "searching": true,
       "ordering": true,
       "info": true,
       "autoWidth": true,
       "lengthMenu": [[5, 10], [5, 10]]
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
       "lengthChange": false,
       "searching": false,
       "ordering": true,
       "info": true,
       "autoWidth": false,
       "pageLength": 5
     });
     //Date picker
     /*
     $('#datepicker4').datepicker({
       autoclose: true,
       dateFormat: 'yyyy-mm-dd',
       format:      'yyyy-mm-dd',
       startDate: '2010-01-01'
     });
        
     */
     $('.datepicker').datepicker({
       autoclose: true,
       dateFormat: 'yyyy-mm-dd',
       format:      'yyyy-mm-dd',
       startDate: '2000-01-01'
     });
     
     $('.datepicker2').datepicker({
       autoclose: true,
       dateFormat: 'yyyy-mm-dd',
       format:      'yyyy-mm-dd',
       startDate: '1950-01-01'
     });    
     
     /*var inputCiudad = document.getElementById("inputCiudad");
     inputCiudad.readonly = true;*/
     //document.getElementById("inputCiudad").readOnly = true; 
     //$("#inputCiudad option").remove();
     //echo "<td>";
     //echo "<a  class='btn btn-warning' href='engine_settings.php?mod=6&action=1&id=".$perfiles[$i][0]."'  >Editar</a>";
     //echo "</td>";
     
     $('#usertablessp').DataTable( {
        "language": {     
        "processing": "Buscando...",
        "emptyTable": "No se encontraron datos.",
        "search":           "Buscar coincidencia:",
        "lengthMenu":       "Mostrar _MENU_ filas",
        "info":             "Mostrando _START_ de _END_ de _TOTAL_ filas",
        "infoEmpty":        "Mostrando 0 de 0 de 0 filas",
        "infoFiltered":     "(filtrado de un total de _MAX_ filas)",
        "paginate": {
            "first":        "Primero",
            "previous":     "Anterior",
            "next":         "Siguiente",
            "last":         "Ultimo"
            }
        },
        "processing": true,
        "serverSide": true,
        "searching": true,
        "lengthMenu": [[5, 10], [5, 10]],
        //"ajax": "../pages/tables/server_processing.php",
        //"columns": [{data: "idusuario"}, {data: "nombres"}, {data: "apellidos"}, {data: "cargo"}, {data: "btn"}],
        "columns": [{data: "nombres"}, {data: "apellidos"}, {data: "cargo"},{data: "cliente"}, {data: "btn"}],
        "ajax": {
            'url': "../pages/tables/server_processing_mantto.php",
            'dataSrc': function (json) { //esta de aca es la que hace la magia
                var dataJson = new Array();
                for (var i = 0, ien = json.data.length; i < ien; i++) {
                    // var editUser = '<a class="" href="user_edit.php?id=' + json.data[i].admin + '">'+json.data[i].nombre+'</a>'
                    var action = "<a  class='btn btn-warning' href='engine_settings.php?mod=6&action=1&id=" + json.data[i].idusuario + "'  >Editar</a>";
                    dataJson.push({
                        //'idusuario': json.data[i].idusuario,
                        'nombres':  json.data[i].nombres,
                        'apellidos': json.data[i].apellidos,
                        'cargo': json.data[i].cargo,
                        'cliente': json.data[i].cliente,
                        'btn': action
                    });
                }
                return dataJson;
            },
            'data': function (d) {
            },
        }
    } );
     
     });

    function cambiarCiudades() {
    var pais = document.getElementById("inputResidencia").value;
    cambiarCiudadesSelect(pais);
    //alert(ciudad);
    $("#inputCiudad option").remove();
    }
   function cambiarCiudadesSelect(post_id) {
       var $dropdown = $("#inputCiudad");
       $.ajax({
            type: 'GET',
            url:'../engine/ctrl_perfilajax.php',
            dataType: "json",
            data:{'post_id':post_id,'opcion':5},
            success:function(data){
                if(data.status == 'ok'){
                    //alert(data.result[0]);
                   // $("#inputCiudad option").remove();
                    //$dropdown.option.remove();
                    $.each(data.result, function() {
                      $dropdown.append($("<option />").val(this[0]).text(this[1] +' - '+ this[3]));
                  
                  });
                }else{
                    //$('.user-content').slideUp();
                    //alert("User not found...");
                } 
            }
        });    
   }

/* ******************************************************** */
/* ********************NACIONALIDADES********************** */
/* ******************************************************** */
    function guardarNacionalidad(post_id) {

    var idnacionalidad = document.getElementById("inputNACNacionalidad").value;
    var pasaporte = document.getElementById("inputNACPasaporte").value;
    var tipo = document.getElementById("inputNACPasaporteTipo").value;
    var fecha_emision = document.getElementById("inputNACEmision").value;
    var fecha_expiracion = document.getElementById("inputNACExpiracion").value;
    var secuencia = document.getElementById("inputNACSecuencia").value;
      $.ajax({
            type: 'POST',
            url:'../engine/ctrl_usuarios_detalles.php',
            dataType: "json",
            data:{
            'post_id':post_id,
            'opcion':1,
            'idnacionalidad':idnacionalidad,
            'pasaporte':pasaporte,
            'tipo':tipo,
            'fecha_emision':fecha_emision,
            'fecha_expiracion':fecha_expiracion,
            'secuencia':secuencia},
            success:function(data){
                if(data.status == 'ok'){
                  mostarTablasPerfilNacionalidad(post_id);
                  //alert(data.status);
                  alert('Registro guardado');
                    
                  //updateDropDown(post_id);
                  
                }else{
                    //$('.user-content').slideUp();
                    //alert("User not found...");
                    alert('No se almaceno el registro');
                } 
            }
        });
        
     document.getElementById("inputNACNacionalidad").value = "";
     document.getElementById("inputNACPasaporte").value= "";
     document.getElementById("inputNACPasaporteTipo").value= "";
     document.getElementById("inputNACEmision").value= "";
     document.getElementById("inputNACExpiracion").value= "";
     document.getElementById("inputNACSecuencia").value= "";
      }

function updateDropDown(post_id){
   //alert('No se almaceno el registro');


      var $dropdown = $("#inputVISANacionalidad");
        $.ajax({
            type: 'GET',
            url:'../engine/ctrl_perfilajax.php',
            dataType: "json",
            data:{'post_id':post_id,'opcion':2},
            success:function(data){
                if(data.status == 'ok'){
                  //alert('SI se almaceno el registro');
                    //alert(data.result[0]);
                     $("#inputVISANacionalidad option").remove();
                    //$dropdown.option.remove();
                    $.each(data.result, function() {
                      $dropdown.append($("<option />").val(this[0]).text(this[1] +' P# '+ this[3] +' S# '+ this[8]));
                  
                  });
                    
/*    
                    $.each(data.result, function(idx, elem){
                        table5.append("<tr>" + 
                                      "<td>"+elem[1]+"</td>"+
                                      "<td>"+elem[3]+"</td>"+
                                      "<td>"+elem[4]+"</td>"+
                                      "<td>"+elem[5]+"</td>"+
                                      "<td>"+elem[6]+"</td>"+
                                      "</tr>");
                    });
*/
                }else{
                  $("#inputVISANacionalidad option").remove();  
                  //alert('No se almaceno el registro');
                    //$('.user-content').slideUp();
                    //alert("User not found...");
                } 
            }
        });  
          
  }


function mostarTablasPerfilNacionalidad(post_id){
      var table5 = $("#tablePerfilNacionalidades tbody");
        $("#tablePerfilNacionalidades tbody tr").remove();
        $.ajax({
            type: 'GET',
            url:'../engine/ctrl_perfilajax.php',
            dataType: "json",
            data:{'post_id':post_id,'opcion':2},
            success:function(data){
                if(data.status == 'ok'){
                    //alert(data.result[0]);
                    
                    $.each(data.result, function(idx, elem){
                        table5.append("<tr>" + 
                                      "<td>"+elem[1]+"</td>"+
                                      "<td>"+elem[3]+"</td>"+
                                      "<td>"+elem[4]+"</td>"+
                                      "<td>"+elem[5]+"</td>"+
                                      "<td>"+elem[6]+"</td>"+
                                      "<td>"+elem[8]+"</td>"+
                                      "<td>"+
                                      "<button type='button' class='btn btn-warning' "+
                                      "onclick='modificarNacionalidad("+elem[0]+")' >Modificar</button>"+
                                      "</td>"+
                                      "</tr>");
                    });
                }else{
                    //$('.user-content').slideUp();
                    //alert("User not found...");
                } 
            }
        });    
  }


/* ******************************************************** */
/* ***********************VISAS**************************** */
/* ******************************************************** */
  function guardarVisa(post_id) {

    var idnacionalidad = document.getElementById("inputVISANacionalidad").value;
    var idpaisvisa = document.getElementById("inputVISAPaisVisa").value;
    var tipo = document.getElementById("inputVISATipo").value;
    var visa = document.getElementById("inputVISAVisa").value;
    var fecha_emision = document.getElementById("inputVISAEmision").value;
    var fecha_expiracion = document.getElementById("inputVISAExpiracion").value;
    var comentario = document.getElementById("inputVISAComentario").value;
      $.ajax({
            type: 'POST',
            url:'../engine/ctrl_usuarios_detalles.php',
            dataType: "json",
            data:{
            'post_id':post_id,
            'opcion':2,
            'idnacionalidad':idnacionalidad,
            'idpaisvisa':idpaisvisa,
            'tipo':tipo,
            'visa':visa,
            'fecha_emision':fecha_emision,
            'fecha_expiracion':fecha_expiracion,
            'comentario':comentario},
            success:function(data){
                if(data.status == 'ok'){
                  mostarTablasPerfilVisa(post_id);
                  alert('Registro guardado');
                    
                  
                }else{
                    //$('.user-content').slideUp();
                    //alert("User not found...");
                    alert('No se almaceno el registro');
                } 
            }
        });
    document.getElementById("inputVISANacionalidad").value = "";
    document.getElementById("inputVISAPaisVisa").value = "";
    document.getElementById("inputVISATipo").value = "";
    document.getElementById("inputVISAVisa").value = "";
    document.getElementById("inputVISAEmision").value = "";
    document.getElementById("inputVISAExpiracion").value = "";
    document.getElementById("inputVISAComentario").value = "";
      }
  function mostarTablasPerfilVisa(post_id){
      var table6 = $("#tablePerfilVisas tbody");
        $("#tablePerfilVisas tbody tr").remove();
        $.ajax({
            type: 'GET',
            url:'../engine/ctrl_perfilajax.php',
            dataType: "json",
            data:{'post_id':post_id,'opcion':3},
            success:function(data){
                if(data.status == 'ok'){
                    //alert(data.result[0]);                    
                    $.each(data.result, function(idx, elem){
                        table6.append("<tr>" + 
                                      "<td>"+elem[3]+"</td>"+
                                      "<td>"+elem[2]+"</td>"+
                                      "<td>"+elem[4]+"</td>"+
                                      "<td>"+elem[5]+"</td>"+
                                      "<td>"+elem[6]+"</td>"+
                                      "<td>"+elem[7]+"</td>"+
                                      "<td>"+elem[10]+"</td>"+
                                      "<td>"+
                                      "<button type='button' class='btn btn-warning' "+
                                      "onclick='modificarVisa("+elem[0]+")' >Modificar</button>"+
                                      "</td>"+
                                      "</tr>");
                    });
                }else{
                    //$('.user-content').slideUp();
                    //alert("User not found...");
                } 
            }
        });    
  }

/* ******************************************************** */
/* *********************Carriers*************************** */
/* ******************************************************** */
function guardarCarrier(post_id) {

    var idcarrier = document.getElementById("inputCarrCarrier").value;
    var numero = document.getElementById("inputCarrNumero").value;
    var fecha_emision = document.getElementById("inputCarrEmision").value;
    var fecha_expiracion = document.getElementById("inputCarrExpiracion").value;
    var millas = document.getElementById("inputCarrMillas").value;
    var comentario = document.getElementById("inputCarrComentario").value;
      $.ajax({
            type: 'POST',
            url:'../engine/ctrl_usuarios_detalles.php',
            dataType: "json",
            data:{
            'post_id':post_id,
            'opcion':3,
            'idcarrier':idcarrier,
            'numero':numero,
            'fecha_emision':fecha_emision,
            'fecha_expiracion':fecha_expiracion,
            'millas':millas,
            'comentario':comentario},
            success:function(data){
                if(data.status == 'ok'){
                  mostarTablasPerfilCarrier(post_id);
                  alert('Registro guardado');
                    
                  
                }else{
                    //$('.user-content').slideUp();
                    //alert("User not found...");
                    alert('No se almaceno el registro');
                } 
            }
        });
      }
  function mostarTablasPerfilCarrier(post_id){
      var table7 = $("#tablePerfilCarriers tbody");
        $("#tablePerfilCarriers tbody tr").remove();
        $.ajax({
            type: 'GET',
            url:'../engine/ctrl_perfilajax.php',
            dataType: "json",
            data:{'post_id':post_id,'opcion':4},
            success:function(data){
                if(data.status == 'ok'){
                    //alert(data.result[0]);
                    
                    $.each(data.result, function(idx, elem){
                        table7.append("<tr>" + 
                                      "<td>"+elem[2]+"</td>"+
                                      "<td>"+elem[3]+"</td>"+
                                      "<td>"+elem[6]+"</td>"+
                                      "<td>"+elem[7]+"</td>"+
                                      "<td>"+elem[4]+"</td>"+
                                      "<td>"+elem[5]+"</td>"+
                                      "<td>"+
                                      "<button type='button' class='btn btn-warning' "+
                                      "onclick='modificarCarrier("+elem[0]+")' >Modificar</button>"+
                                      "</td>"+
                                      "</tr>");
                    });
                }else{
                    //$('.user-content').slideUp();
                    //alert("User not found...");
                } 
            }
        });    
  }
  
  function modificarNacionalidad(post_id) { 
    $.ajax({
            type: 'GET',
            url:'../engine/ctrl_perfilajaxmodificacion.php',
            dataType: "json",
            data:{'post_id':post_id,'opcion':1},
            success:function(data){
                if(data.status == 'ok'){
                    document.getElementById("inputNACIdMod").value = data.result[0][0];
                    selectItemByValue(document.getElementById("inputNACNacionalidadMod"),data.result[0][1]);
                    document.getElementById("idNACPerfil").value = data.result[0][2];
                    document.getElementById("inputNACSecuenciaMod").value = data.result[0][7];
                    document.getElementById("inputNACPasaporteMod").value = data.result[0][3];
                    document.getElementById("inputNACPasaporteTipoMod").value = data.result[0][4];
                    document.getElementById("inputNACEmisionMod").value = data.result[0][5];
                    document.getElementById("inputNACExpiracionMod").value = data.result[0][6];
                    $("#perfilNacionalidad").modal('show');                    
                }else{
                } 
            }
        });   
      }
      
    function selectItemByValue(elmnt, value){

        for(var i=0; i < elmnt.options.length; i++)
        {
          if(elmnt.options[i].value === value) {
            elmnt.selectedIndex = i;
            break;
          }
        }
      }
      
function guardarNacionalidadMod() {
    
    var id = document.getElementById("inputNACIdMod").value;
    var id_perfil = document.getElementById("idNACPerfil").value; 
    var id_nacionalidad = document.getElementById("inputNACNacionalidadMod").value;
    var secuencia = document.getElementById("inputNACSecuenciaMod").value;
    var pasaporte = document.getElementById("inputNACPasaporteMod").value;
    var tipo = document.getElementById("inputNACPasaporteTipoMod").value;
    var fecha_emision = document.getElementById("inputNACEmisionMod").value;
    var fecha_expiracion = document.getElementById("inputNACExpiracionMod").value;
    $.ajax({
            type: 'POST',
            url:'../engine/ctrl_perfilajaxmodificacion.php',
            dataType: "json",
            data:{
            'id':id,
            'opcion':2,
            'id_nacionalidad':id_nacionalidad,
            'secuencia':secuencia,
            'pasaporte':pasaporte,
            'tipo':tipo,
            'fecha_emision':fecha_emision,
            'fecha_expiracion':fecha_expiracion},
            success:function(data){
                if(data.status == 'ok'){
                  mostarTablasPerfilNacionalidad(id_perfil);
                  alert('Registro guardado');
                    
                  $("#perfilNacionalidad").modal('hide');
                }else{
                    //$('.user-content').slideUp();
                    //alert("User not found...");
                    alert('No se almaceno el registro');
                } 
            }
        });         
}


    
function modificarVisa(post_id) { 
    $.ajax({
            type: 'GET',
            url:'../engine/ctrl_perfilajaxmodificacion.php',
            dataType: "json",
            data:{'post_id':post_id,'opcion':3},
            success:function(data){
                if(data.status == 'ok'){
                    document.getElementById("inputVISAIdMod").value = data.result[0][0];                 
                    document.getElementById("idVISAPerfil").value = data.result[0][1];
                    
                    selectItemByValue(document.getElementById("inputVISANacionalidadMod"),data.result[0][2]);
                    selectItemByValue(document.getElementById("inputVISAPaisVisaMod"),data.result[0][3]);
                    
                    document.getElementById("inputVISAVisaMod").value = data.result[0][5];
                    document.getElementById("inputVISATipoMod").value = data.result[0][4];
                    document.getElementById("inputVISAEmisionMod").value = data.result[0][6];
                    document.getElementById("inputVISAExpiracionMod").value = data.result[0][7];
                    document.getElementById("inputVISAComentarioMod").value = data.result[0][9];
                    $("#perfilVisa").modal('show');                    
                }else{
                } 
            }
        });   
      }    

function guardarVisaMod() {
    
    var id = document.getElementById("inputVISAIdMod").value;
    var id_perfil = document.getElementById("idVISAPerfil").value; 
    
    var id_nacionalidad = document.getElementById("inputVISANacionalidadMod").value;
    var id_pais_visa = document.getElementById("inputVISAPaisVisaMod").value;
    var visa = document.getElementById("inputVISAVisaMod").value;
    var tipo = document.getElementById("inputVISATipoMod").value;
    var fecha_emision = document.getElementById("inputVISAEmisionMod").value;
    var fecha_expiracion = document.getElementById("inputVISAExpiracionMod").value;
    var comentario =    document.getElementById("inputVISAComentarioMod").value;
    $.ajax({
            type: 'POST',
            url:'../engine/ctrl_perfilajaxmodificacion.php',
            dataType: "json",
            data:{
            'id':id,
            'opcion':4,
            'id_nacionalidad':id_nacionalidad,
            
            'id_pais_visa':id_pais_visa,
            'visa':visa,
            'tipo':tipo,
            'fecha_emision':fecha_emision,
            'fecha_expiracion':fecha_expiracion,
            'comentario':comentario},
            success:function(data){
                if(data.status == 'ok'){
                  mostarTablasPerfilVisa(id_perfil);
                  alert('Registro guardado');
                    
                  $("#perfilVisa").modal('hide');
                }else{
                    //$('.user-content').slideUp();
                    //alert("User not found...");
                    alert('No se almaceno el registro');
                } 
            }
        });         
}



function modificarCarrier(post_id) { 
    $.ajax({
            type: 'GET',
            url:'../engine/ctrl_perfilajaxmodificacion.php',
            dataType: "json",
            data:{'post_id':post_id,'opcion':5},
            success:function(data){
                if(data.status == 'ok'){
                    document.getElementById("inputCarrIdMod").value = data.result[0][0];                 
                    document.getElementById("idCarrPerfil").value = data.result[0][1];
                    
                    selectItemByValue(document.getElementById("inputCarrCarrierMod"),data.result[0][2]);
                    
                    document.getElementById("inputCarrNumeroMod").value = data.result[0][3];
                    document.getElementById("inputCarrEmisionMod").value = data.result[0][4];
                    document.getElementById("inputCarrExpiracionMod").value = data.result[0][5];
                    document.getElementById("inputCarrMillasMod").value = data.result[0][6];
                    document.getElementById("inputCarrComentarioMod").value = data.result[0][7];
                    $("#perfilCarrier").modal('show');                    
                }else{
                } 
            }
        });   
      }    
 
function guardarCarrierMod() {
    
    var id = document.getElementById("inputCarrIdMod").value;
    var id_perfil = document.getElementById("idCarrPerfil").value; 
    
    var id_carrier = document.getElementById("inputCarrCarrierMod").value;
    var numero = document.getElementById("inputCarrNumeroMod").value;
    var fecha_emision = document.getElementById("inputCarrEmisionMod").value;
    var fecha_expiracion = document.getElementById("inputCarrExpiracionMod").value;
    var millas = document.getElementById("inputCarrMillasMod").value;
    var comentario = document.getElementById("inputCarrComentarioMod").value;
    $.ajax({
            type: 'POST',
            url:'../engine/ctrl_perfilajaxmodificacion.php',
            dataType: "json",
            data:{
            'id':id,
            'opcion':6,
            'id_carrier':id_carrier,
            
            'numero':numero,
            'fecha_emision':fecha_emision,
            'fecha_expiracion':fecha_expiracion,
            'millas':millas,
            'comentario':comentario},
            success:function(data){
                if(data.status == 'ok'){
                  mostarTablasPerfilCarrier(id_perfil);
                  alert('Registro guardado');
                    
                  $("#perfilCarrier").modal('hide');
                }else{
                    //$('.user-content').slideUp();
                    //alert("User not found...");
                    alert('No se almaceno el registro');
                } 
            }
        });         
}
/* inactivaciones */
function guardarNacionalidadModInactivo() {
    
    var id = document.getElementById("inputNACIdMod").value;
    var id_perfil = document.getElementById("idNACPerfil").value; 
    //confirm("¿Desea continuar?");
     if (confirm("-Se eliminará el pasaporte seleccionado. \n\n-Tenga en cuenta, que no debe tener VISAS asociadas.\n\n¿Desea continuar?")) {
         $.ajax({
            type: 'POST',
            url:'../engine/ctrl_perfilajaxmodificacion.php',
            dataType: "json",
            data:{
            'id':id,
            'opcion':7},
            success:function(data){
                if(data.status == 'ok'){
                  mostarTablasPerfilNacionalidad(id_perfil);
                  alert('Registro guardado');
                    
                  $("#perfilNacionalidad").modal('hide');
                }else{
                    //$('.user-content').slideUp();
                    //alert("User not found...");
                    alert('No se almaceno el registro');
                } 
            }
        });  
     }
           
}
 function guardarVisaModInactivo(){
     var id = document.getElementById("inputVISAIdMod").value;
     var id_perfil = document.getElementById("idVISAPerfil").value; 
     //confirm("¿Desea continuar?");
     if (confirm("¿Desea continuar?")) {
        $.ajax({
                type: 'POST',
                url:'../engine/ctrl_perfilajaxmodificacion.php',
                dataType: "json",
                data:{
                'id':id,
                'opcion':8},
                success:function(data){
                    if(data.status == 'ok'){
                      mostarTablasPerfilVisa(id_perfil);
                      alert('Registro Eliminado');

                      $("#perfilVisa").modal('hide');
                    }else{
                        //$('.user-content').slideUp();
                        //alert("User not found...");
                        alert('No se almaceno el registro');
                    } 
                }
            }); 
       }
     
 }

function guardarCarrierModInactivo() {
    
    var id = document.getElementById("inputCarrIdMod").value;
    var id_perfil = document.getElementById("idCarrPerfil").value; 
    
    if (confirm("¿Desea continuar?")) {
        $.ajax({
            type: 'POST',
            url:'../engine/ctrl_perfilajaxmodificacion.php',
            dataType: "json",
            data:{
            'id':id,
            'opcion':9},
            success:function(data){
                if(data.status == 'ok'){
                  mostarTablasPerfilCarrier(id_perfil);
                  alert('Registro Eliminado');
                    
                  $("#perfilCarrier").modal('hide');
                }else{
                    //$('.user-content').slideUp();
                    //alert("User not found...");
                    alert('No se almaceno el registro');
                } 
            }
        }); 
    }
            
}

</script>

