<?php
   include 'secure.php';
   include 'classes/class.operaciones.php';
   //*************************PENDIENTE********************
   //cargar las categorias
   //cargar los clientes
   //cargar los agentes
   //******************************************************
   
   $obj = new Operaciones(True);
   //$perfil = $obj->perfil-es_buscar(null);    
   $categorias = $obj->usuario_categoria_buscar($_SESSION['USERDAT'][0]);
   $clientes = $obj->cliente_buscar($_SESSION['USERDAT'][0]);
   $agentes = $obj->agentes_buscar($_SESSION['USERDAT'][0]);
   $nacionalidades = $obj->nacionalidades_buscar(null, $_SESSION['USERDAT'][0]);
   $tipo_cliente = $obj->cliente_tipo_buscar($_SESSION['USERDAT'][0]);
   $categoria_cliente = $obj->cliente_categoria_buscar($_SESSION['USERDAT'][0]);
   
   
   $action = 0;
   
   $cat = $_GET['cat'];
   $action = $_GET['action'];
   $id = $_GET['id'];
   $cliente = $_GET['cliente'];
   
   if ($cat <> 2 && $cat <> 3 ) {
     $cat = 1;
   }
   
   if ($action == 0) {
       $_SESSION["mttousuarios"] = "N";
   } else {
       $_SESSION["mttousuarios"] = "M";
   }
   
   ?>
<style>
.modal-lg {
	/* width: 1500px !important; */
        max-width: 85% !important;
      width: 85% !important;
}

</style>
    
    
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

    <h1>
       <?php 
          if ($id){
            for ($c = 0; $c < count($clientes); $c++){
              if ($clientes[$c][0] == $id){
                echo $clientes[$c][5];
                }
              }
            }else
            {
            echo "Todos los clientes";
            }

               
        ?>
    </h1>

      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Perfiles</a></li>
        <li class="active">Perfil de usuario </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="box">
    <div class="box-header">
        <div class="col-sm-5">
            <h3 class="box-title">Buscar Perfiles Registrados para el cliente:</h3>
            
        </div>
        

        <form class="form-horizontal" enctype="multipart/form-data" method="POST" name="reserva2"  action="engine/ctrl_perfil.php?id=<?php echo $id?>" >
       <div class="col-sm-5">
          <select name="clientes"  size="1" maxlength="2" class="form-control" id="inputCliente">
          <?php 
                echo "<option value =''>Todos los clientes</option>";
             for($c = 0; $c < count($clientes); $c++){
                 echo '<option value ='.$clientes[$c][0].'>'.$clientes[$c][5].'</option>';
             }
             ?>
          </select>

       </div>
      <div class="col-sm-2">
             <button type="submit" class="btn btn-success"  >Cargar Perfiles</button>
          </div>
    </form>
    <!-- onclick='cambiarEmpresa()' -->


          

      
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <!-- table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Nombre</th>
          <th>Apellido</th>          
          <th>Cargo</th>
          <th>Correo</th>
          <th>Cliente</th>
          <th></th>
        </tr>
        </thead>
        <tbody >
          <-?php   
          $selclientes = $obj->perfil_buscar_empresa($id);
          //if ($id <> 0 or $id == 0) {
          if (true) {
            for($i = 0; $i < count($selclientes); $i++){
             echo "<tr>";
             echo "<td>".$selclientes[$i][1]."</td>";
             echo "<td>".$selclientes[$i][2]."</td>";
             echo "<td>".$selclientes[$i][3]."</td>";
             echo "<td>".$selclientes[$i][4]."</td>";
             echo "<td>".$selclientes[$i][6]."</td>";
             echo "<td>"; 
             //href='engine.php?mod=5&id=".$id."&cliente=".$selclientes[$i][0]."'
             //<button type="button" class="btn btn-success" onclick='mostrarModal()' >Ver Perfil</button>
             //"<a  class='btn btn-success' onclick='mostrarModal()' >Ver Perfil</a>";
             echo "<button type='button' class='btn btn-success' onclick='mostrarModal(".$selclientes[$i][0].")' >Ver Perfil</button>";
             echo "</td>";
             echo "</tr>";   
            }
             }?->
               
        </tbody>
        <tfoot>
        <tr>
          <th>Nombre</th>
          <th>Apellido</th>          
          <th>Cargo</th>
          <th>Correo</th>
          <th>Cliente</th>
          <th></th>
        </tr>
        </tfoot>
      </table -->
      <table id="perfiltablessp" class="table table-bordered table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Nombres</th>
                                        <th>Apellidos</th>
                                        <th>Cargo</th>
                                        <th>Correo</th>
                                        <th>Cliente</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>                                        
                                        <th>Nombres</th>
                                        <th>Apellidos</th>
                                        <th>Cargo</th>
                                        <th>Correo</th>
                                        <th>Cliente</th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                            </table>  
        
    </div>
    <!-- /.box-body -->
  </div>        
        
    

    </section>
    <!-- /.content -->
  </div>
  <div class="modal fade" id="perfilesusuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document" id="perfilusuariodialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Detalle de Perfil</h4>
            </div>
            <div class="modal-body">
                <?php 
                include 'pages/forms/engine_perfiles.php';
                ?>
            </div>
            <div class="modal-footer">
                
            </div>
        </div>
    </div>
</div>
  <!-- /.content-wrapper -->
 
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>

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
    $("#example5").DataTable({
      "paging": false,
      "lengthChange": true,
      "searching": false,
      "ordering": false,
      "info": false,
      "autoWidth": true
    });
    $("#example6").DataTable({
      "paging": false,
      "lengthChange": true,
      "searching": false,
      "ordering": false,
      "info": false,
      "autoWidth": true
    });
    $("#example7").DataTable({
      "paging": false,
      "lengthChange": true,
      "searching": false,
      "ordering": false,
      "info": false,
      "autoWidth": true
    });
    
    /*
    $('#perfiltablessp').DataTable( {
        "processing": true,
        "serverSide": true,
        "searching": true,
        "lengthMenu": [[5, 10], [5, 10]],
        //"ajax": "../pages/tables/server_processing.php",
        //"columns": [{data: "idusuario"}, {data: "nombres"}, {data: "apellidos"}, {data: "cargo"}, {data: "btn"}],
        "columns": [ {data: "nombres"}, {data: "apellidos"}, {data: "cargo"},{data: "correo"},{data: "cliente"}, {data: "btn"}],
        "ajax": {
            'url': "../pages/tables/server_processing_perfiles.php?cliente=0",
            'dataSrc': function (json) { //esta de aca es la que hace la magia
                var dataJson = new Array();
                for (var i = 0, ien = json.data.length; i < ien; i++) {
                    // var editUser = '<a class="" href="user_edit.php?id=' + json.data[i].admin + '">'+json.data[i].nombre+'</a>'
                    //var action = "<a  class='btn btn-warning' href='engine_settings.php?mod=6&action=1&id=" + json.data[i].idusuario + "'  >Editar</a>";
                    var action = "<button type='button' class='btn btn-success' onclick='mostrarModal(" + json.data[i].idusuario + ")' >Ver Perfil</button>"
                    dataJson.push({
                        //'idusuario': json.data[i].idusuario,
                        'nombres':  json.data[i].nombres,
                        'apellidos': json.data[i].apellidos,
                        'cargo': json.data[i].cargo,
                        'correo': json.data[i].correo,
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
    */
   var urlParams = new URLSearchParams(window.location.search);
   if(urlParams.has('id')){
      var cliente = urlParams.get('id')
        if (cliente == null) {
            cambiarEmpresaTabla(0); 
        }else{
        cambiarEmpresaTabla(cliente);    
        } 
   }else{
        cambiarEmpresaTabla(0);    
    } 
    
    
    
    
  });
  
  function cambiarEmpresaTabla(inputCliente){
      $('#perfiltablessp').DataTable( {
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
        "searchDelay": 1500,
        "serverSide": true,
        "searching": true,
        "lengthMenu": [[5, 10], [5, 10]],
        //"ajax": "../pages/tables/server_processing.php",
        //"columns": [{data: "idusuario"}, {data: "nombres"}, {data: "apellidos"}, {data: "cargo"}, {data: "btn"}],
        "columns": [ {data: "nombres"}, {data: "apellidos"}, {data: "cargo"},{data: "correo"},{data: "cliente"}, {data: "btn"}],
        "ajax": {
            'url': "../pages/tables/server_processing_perfiles.php?cliente=" + inputCliente,
            'dataSrc': function (json) { //esta de aca es la que hace la magia
                var dataJson = new Array();
                for (var i = 0, ien = json.data.length; i < ien; i++) {
                    // var editUser = '<a class="" href="user_edit.php?id=' + json.data[i].admin + '">'+json.data[i].nombre+'</a>'
                    //var action = "<a  class='btn btn-warning' href='engine_settings.php?mod=6&action=1&id=" + json.data[i].idusuario + "'  >Editar</a>";
                    var action = "<button type='button' class='btn btn-success' onclick='mostrarModal(" + json.data[i].idusuario + ")' >Ver Perfil</button>"
                    dataJson.push({
                        //'idusuario': json.data[i].idusuario,
                        'nombres':  json.data[i].nombres,
                        'apellidos': json.data[i].apellidos,
                        'cargo': json.data[i].cargo,
                        'correo': json.data[i].correo,
                        'cliente': json.data[i].cliente,
                        'btn': action
                    });
                }
                return dataJson;
            },
            'data': function (d) {
            },
            error: function(){  // error handling
                    $('#perfiltablessp').html("");
                    //$(".employee-grid-error").html("");
                    //$("#employee-grid").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                    $('#perfiltablessp').append('<tbody class="perfiltablessp"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                    //$("#employee-grid_processing").css("display","none");
 
                },
        }
    } );
  }
  /*
   function cambiarEmpresa(){
    var inputCliente = document.getElementById("inputCliente").value;
     cambiarEmpresaTabla(inputCliente)
  }
  */
  function readOnlyText(estado){
      /*
    document.getElementById("selcliente1").readOnly = estado; 
    document.getElementById("selcliente2").readOnly = estado; 
    document.getElementById("selcliente3").readOnly = estado; 
    document.getElementById("selcliente4").readOnly = estado; 
    document.getElementById("selcliente5").readOnly = estado; 
    document.getElementById("selcliente6").readOnly = estado; 
    document.getElementById("selcliente7").readOnly = estado; 
    document.getElementById("selcliente8").readOnly = estado; 
    document.getElementById("selcliente9").readOnly = estado; 
    document.getElementById("selcliente11").readOnly = estado; 
    document.getElementById("selcliente12").readOnly = estado; 
    document.getElementById("selcliente14").readOnly = estado; 
    document.getElementById("selcliente16").readOnly = estado; 
    document.getElementById("selcliente18").readOnly = estado; 
    document.getElementById("selcliente20").readOnly = estado; 
    document.getElementById("selcliente22").readOnly = estado; 
        */
    document.getElementById("selcliente7").readOnly = estado; 
    document.getElementById("selcliente9").readOnly = estado; 
    document.getElementById("selcliente10").readOnly = estado; 
    document.getElementById("selcliente23").readOnly = estado; 
    document.getElementById("selcliente24").readOnly = estado; 
    //document.getElementById("selcliente10").readOnly = estado; 
    
    document.getElementById("selcliente25").readOnly = estado; 
    document.getElementById("selcliente26").readOnly = estado; 
    document.getElementById("selcliente27").readOnly = estado; 
    document.getElementById("selcliente28").readOnly = estado; 
    
  }
  
  function editForm(){
      
    readOnlyText(false);
    /*Todos los elementos del formulario ahora son editables*/
    document.getElementById("btnEditarPerfil").style.display = 'none';
    document.getElementById("btnGuardarPerfil").style.display = 'block';
     
  }
  
 $(document).ready(function(){
      readOnlyText(true);
      
    /*  
    $('#getUser').on('click',function(){
        var user_id = $('#user_id').val();
        $.ajax({
            method:'POST',
            url:'getData.php',
            dataType: "json",
            data:{user_id:user_id},
            success:function(data){
                if(data.status == 'ok'){
                    $('#userName').text(data.result.name);
                    $('#userEmail').text(data.result.email);
                    $('#userPhone').text(data.result.phone);
                    $('#userCreated').text(data.result.created);
                    $('.user-content').slideDown();
                }else{
                    $('.user-content').slideUp();
                    alert("User not found...");
                } 
            }
        });
        
    });
    */
    /*mostrarModal();*/
    $('#perfilesusuario').on('hidden.bs.modal', function () {
        // do something…
        //alert("funciona");
        
        /* REGRESAR ELEMENTOS A SU FORMA ORIGINAL*/
        readOnlyText(true);
        /*Todos los elementos del formulario ya NO  son editables*/
        //document.getElementById("btnEditarPerfil").style.display = 'block';
        //document.getElementById("btnGuardarPerfil").style.display = 'none';
        
        $("#otrosdatos").attr('class', 'tab-pane');
        $("#comentarios").attr('class', 'tab-pane');
        $("#imagenes").attr('class', 'tab-pane');
        //$("#timeline").attr('class', 'tab-pane');
        $("#perfil").attr('class', 'active tab-pane');
        
        $("#liotrosdatos").attr('class', '');
        $("#licomentarios").attr('class', '');
        $("#liimagenes").attr('class', '');
        //$("#litimeline").attr('class', '');
        $("#liperfil").attr('class', 'active');
        
        
        
        //alert("funciona");
    });
});


     function mostrarModal(post_id) {
      
      //var post_id = $(this).attr("id");
      //alert(post_id)
    //document.getElementById("btnEditarPerfil").style.display = 'block';
    //document.getElementById("btnGuardarPerfil").style.display = 'none';
    //$("#btnEditarPerfil").attr('href', 'engine_settings.php?mod=6&action=1&id='+post_id);
    document.getElementById("btnEditarPerfil").href = 'engine_settings.php?mod=6&action=1&id=' + post_id + '#infoPerfil';
    document.getElementById("FrmDisablePerfil").action = 'engine/ctrl_perfil.php?action=1&id=' + post_id;
    document.getElementById("nclienteimage").src = 'stdimagen.php?cat=1&ID=' + post_id ;
    mostarDatosPerfil(post_id);

    mostarTablasPerfil(post_id);
    
      //PASO FINAL
    $("#perfilesusuario").modal('show');

      }
      
function mostarDatosPerfil(post_id){
      $.ajax({
            type: 'GET',
            url:'../engine/ctrl_perfilajax.php',
            dataType: "json",
            data:{'post_id':post_id,'opcion':1},
            success:function(data){
                if(data.status == 'ok'){
                    //alert(data.result[0]);
                    
                    $('#ncliente1-2').text(data.result[0][1] + " " + data.result[0][2] );
                    $('#ncliente3').text(data.result[0][3]);
                    
                    if (data.result[0][32] == 'm') {
                        $('#ncliente32').text("Masculino");
                    } else if (data.result[0][32] == 'f') {
                        $('#ncliente32').text("Femenino");
                    }else{
                        $('#ncliente32').text("No almacenado");
                    }
                    
                    $('#ncliente19').text(data.result[0][19]);
                    $('#ncliente5').text(data.result[0][5]);
                    $('#ncliente6').text(data.result[0][6]);

                    $('#ncliente29').text(data.result[0][29]);
                    $('#ncliente30').text(data.result[0][30]);
                    /*
                    document.getElementById("selcliente1").value = data.result[0][1]; //nombre
                    document.getElementById("selcliente2").value = data.result[0][2]; //apellido
                    document.getElementById("selcliente3").value = data.result[0][3]; //cargo
                    document.getElementById("selcliente4").value = data.result[0][4]; //email
                    document.getElementById("selcliente5").value = data.result[0][5];
                    document.getElementById("selcliente6").value = data.result[0][6];
                    document.getElementById("selcliente7").value = data.result[0][7];
                    document.getElementById("selcliente8").value = data.result[0][8]; //categoria
                    document.getElementById("selcliente9").value = data.result[0][9]; //cliente
                    document.getElementById("selcliente11").value = data.result[0][11];
                    document.getElementById("selcliente12").value = data.result[0][12];
                    document.getElementById("selcliente14").value = data.result[0][14];
                    document.getElementById("selcliente16").value = data.result[0][16]; //agente
                    document.getElementById("selcliente18").value = data.result[0][18];
                    document.getElementById("selcliente20").value = data.result[0][20];
                    document.getElementById("selcliente22").value = data.result[0][22];
            */
                    if (data.result[0][7] == 1) {
                        document.getElementById("selcliente7").value = "SI";
                    } else {
                        document.getElementById("selcliente7").value = "NO";
                    }
                    //document.getElementById("selcliente7").value = data.result[0][7];
                    document.getElementById("selcliente9").value = data.result[0][9];
                    document.getElementById("selcliente10").value = data.result[0][10];
                    
                    
                    document.getElementById("selcliente23").value = data.result[0][23];
                    document.getElementById("selcliente24").value = data.result[0][24];
                    //document.getElementById("selcliente10").value = data.result[0][10];
                    
                    
                    document.getElementById("selcliente25").value = data.result[0][25];
                    document.getElementById("selcliente26").value = data.result[0][26];
                    document.getElementById("selcliente27").value = data.result[0][27];
                    document.getElementById("selcliente28").value = data.result[0][28];
                    
                    
                    if (data.result[0][23] == '0') {
                       /*  document.getElementById("selcliente23").value = 'NO';   */
                    }else{
                         /*document.getElementById("selcliente23").value = 'SI';   */
                    }
                    
                    
                    
                    
                    //$('#userEmail').text(data.result.email);
                   // $('#userPhone').text(data.result.phone);
                    //$('#userCreated').text(data.result.created);
                    //$('.user-content').slideDown();
                }else{
                    //$('.user-content').slideUp();
                    alert("User not found...");
                } 
            }
        });
    
  }

  function mostarTablasPerfil(post_id){
      var table5 = $("#example5 tbody");
        var table6 = $("#example6 tbody");
        var table7 = $("#example7 tbody");
        $("#example5 tbody tr").remove();
        $("#example6 tbody tr").remove();
        $("#example7 tbody tr").remove();
        $.ajax({
            type: 'GET',
            url:'../engine/ctrl_perfilajax.php',
            dataType: "json",
            data:{'post_id':post_id,'opcion':2},
            success:function(data){
                if(data.status == 'ok'){
                    //alert(data.result[0]);
                    
                    $.each(data.result, function(idx, elem){
                        table5.append("<tr><td>"+elem[1]+"</td><td>"+elem[3]+"</td><td>"+elem[5]+"</td><td>"+elem[6]+"</td><td>"+elem[8]+"</td></tr>");
                    });
                }else{
                    //$('.user-content').slideUp();
                    //alert("User not found...");
                } 
            }
        });
        
        $.ajax({
            type: 'GET',
            url:'../engine/ctrl_perfilajax.php',
            dataType: "json",
            data:{'post_id':post_id,'opcion':3},
            success:function(data){
                if(data.status == 'ok'){
                    //alert(data.result[0]);
                    
                    $.each(data.result, function(idx, elem){
                        table6.append("<tr><td>"+elem[3]+"</td><td>"+elem[2]+"</td><td>"+elem[4]+"</td><td>"+elem[5]+"</td><td>"+elem[7]+"</td></tr>");
                    });
                }else{
                    //$('.user-content').slideUp();
                    //alert("User not found...");
                } 
            }
        });
        
        $.ajax({
            type: 'GET',
            url:'../engine/ctrl_perfilajax.php',
            dataType: "json",
            data:{'post_id':post_id,'opcion':4},
            success:function(data){
                if(data.status == 'ok'){
                    //alert(data.result[0]);
                    
                    $.each(data.result, function(idx, elem){
                        table7.append("<tr><td>"+elem[2]+"</td><td>"+elem[3]+"</td><td>"+elem[7]+"</td></tr>");
                    });
                }else{
                    //$('.user-content').slideUp();
                    //alert("User not found...");
                } 
            }
        });
    
  }
 
</script>

