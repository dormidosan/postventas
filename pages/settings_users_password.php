<?php

include 'secure.php';
include 'classes/class.operaciones.php';
//*************************PENDIENTE********************
//cargar las categorias
//cargar los clientes
//cargar los agentes
//******************************************************

$obj = new Operaciones(True);
$usuarios = $obj->usuario_buscar(null);    
$categorias = $obj->usuario_categoria_buscar($_SESSION['USERDAT'][0]);
$clientes = $obj->cliente_buscar($_SESSION['USERDAT'][0]);
$agentes = $obj->agentes_buscar($_SESSION['USERDAT'][0]);
$nacionalidades = $obj->nacionalidades_buscar(null, $_SESSION['USERDAT'][0]);

$action = 0;

$cat = $_GET['cat'];
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
        Cambio de Password
      </h1>
      <!--ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">User profile</li>
      </ol-->
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
              <li class="active"><a href="#usuarios" data-toggle="tab">Usuarios</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="usuarios">
                 <!--<div class="col-xs-12">-->
                    <div class="box">
                      <div class="box-header">
                        <h3 class="box-title">Usuarios Registrados en el sistema</h3>
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
                          </tr>

                            <?php
                                for($i = 0; $i < count($usuarios); $i++){
                                 echo "<tr>";
                                 echo "<td>".$usuarios[$i][4]."</td>";
                                 echo "<td>".$usuarios[$i][5]."</td>";
                                 echo "<td>".$usuarios[$i][3]."</td>";
                                 echo "<td><a href='engine.php?mod=1&cat=1&action=1&id=".$usuarios[$i][0]."'>Editar</a></td>";
                                 echo "</tr>";   
                                }
                            ?> 
                          
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
                 
                 <h4 class="box-title">Informacion del usuario</h4>
                 
                 <form class="form-horizontal" enctype="multipart/form-data" method="POST" name="reserva" action="engine/ctrl_usuarios.php?id=<?php echo $id?>">
                 
                     <div class="nav-tabs-custom">
                         <ul class="nav nav-tabs">
                             <li class="active"><a href="#usuariosGeneral" data-toggle="tab">General</a></li>
                             <li><a href="#usuariosInfoViajes" data-toggle="tab">Informacion de Viaje</a></li>
                             <li><a href="#usuariosAcercaDe" data-toggle="tab">Autorizaciones</a></li>
                         </ul>

                         <div class="tab-content">
                             
                            <?php 
                                //here we check whether a register is being inserted or modified
                            if ($_SESSION["mttousuarios"] == "N") {
                            ?>
                            
                                <div class="active tab-pane" id="usuariosGeneral">    

                                    <div class="form-group">
                                        <label for="inputName" class="col-sm-2 control-label">Nombres</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="inputNombre" name="nombres" placeholder="nombres" />
                                        </div>
                                        <label for="inputApellidos" class="col-sm-2 control-label">Apellidos</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="inputNombre" name="apellidos" placeholder="apellidos" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                                        <div class="col-sm-4">
                                            <input type="email" class="form-control" id="inputemail" name="email" placeholder="email" />
                                        </div>
                                        <label for="inputUsuario" class="col-sm-2 control-label">Usuario</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="inputUsuario" name="usuario" placeholder="usuario" />
                                        </div>
                                    </div>

                                    
                                    <div class="form-group">
                                        <label for="inputUsuario" class="col-sm-2 control-label">Usuario</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="inputUsuario" name="usuario" placeholder="usuario" />
                                        </div>
                                        <label for="inputPassword" class="col-sm-2 control-label">Password</label>
                                        <div class="col-sm-4">
                                            <input type="password" class="form-control" id="inputPassword" name="password" placeholder="password" />
                                        </div>
                                    </div>   

                                </div>    

                                <div class="tab-pane" id="usuariosInfoViajes">

                                    <div class="form-group">
                                        <label for="inputNacionalidad" class="col-sm-2 control-label">Nacionalidad</label>
                                        <div class="col-sm-10">
                                            <select name="idnacionalidad1" size="1" maxlength="2" placeholder="primera nacionalidad" class="form-control" id="inputNacionalidad">
                                            <?php 
                                                for($n = 0; $n < count($nacionalidades); $n++){
                                                    echo '<option value ='.$nacionalidades[$n][0].'>'.$nacionalidades[$n][1].'</option>';
                                                }
                                            ?>
                                            </select>                        
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputPasaporte" class="col-sm-2 control-label">Pasaporte</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="inputPasaporte" name="npasaporte1" placeholder="pasaporte" />
                                        </div>
                                        <label for="inputVencimientoPasaporte" class="col-sm-2 control-label">Vencimiento Pasaporte</label>
                                        <div class="col-sm-4">
                                            <div class="input-group date">
                                              <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                              </div>
                                              <input type="text" class="form-control pull-right" id="datepicker" name="pass1fechavenc" placeholder="fecha vencimiento">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputSegundaNacionalidad" class="col-sm-2 control-label">Segunda Nacionalidad</label>
                                        <div class="col-sm-10">
                                            <select name="idnacionalidad2" size="1" maxlength="2" placeholder="segunda nacionalidad" class="form-control" id="inputSegundaNacionalidad">
                                                <?php 
                                                    for($n2 = 0; $n2 < count($nacionalidades); $n2++){
                                                        echo '<option value ='.$nacionalidades[$n2][0].'>'.$nacionalidades[$n2][1].'</option>';
                                                    }
                                                ?>
                                            </select>                        
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputPasaporte2" class="col-sm-2 control-label">Pasaporte</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="inputPasaporte" name="npasaporte2" placeholder="pasaporte" />
                                        </div>
                                        <label for="inputVencimientoPasaporte2" class="col-sm-2 control-label">Vencimiento Pasaporte</label>
                                        <div class="col-sm-4">
                                            <div class="input-group date">
                                              <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                              </div>
                                              <input type="text" class="form-control pull-right" id="datepicker2" name="pass2fechavenc" placeholder="fecha vencimiento">
                                            </div>
                                        </div>
                                    </div>                                

                                    <div class="form-group">
                                        <label for="inputVisaAmericana" class="col-sm-2 control-label">Visa Americana</label>
                                        <div class="col-sm-4">
                                            <select name="visaamericana" size="1" maxlength="2" placeholder="visa americana" class="form-control" id="inputVisaAmericana">
                                                <option value = "0">No</option>
                                                <option value = "1">Si</option>
                                            </select>
                                        </div>
                                        <label for="inputTipoVisa" class="col-sm-2 control-label">Tipo Visa</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="inputPasaporte" name="tipovisa" placeholder="tipo de visa" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputVencimientoVisa" class="col-sm-2 control-label">Vencimiento de Visa</label>
                                        <div class="col-sm-4">
                                            <div class="input-group date">
                                              <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                              </div>
                                              <input type="text" class="form-control pull-right" id="datepickervisa" name="vencimientovisa" placeholder="fecha vencimiento">
                                            </div>
                                        </div>
                                        <label for="inputVacunaFiebreAmarilla" class="col-sm-2 control-label">Vacuna Fiebre Amarilla</label>
                                        <div class="col-sm-4">
                                            <select name="fiebreamarilla" size="1" maxlength="2" placeholder="fiebre amarilla" class="form-control" id="inputVacunaFiebreAmarilla">
                                                <option value = "0">No</option>
                                                <option value = "1">Si</option>
                                            </select>
                                        </div>
                                    </div>                                

                                    <div class="form-group">
                                        <label for="inputPaisEmision" class="col-sm-2 control-label">Pais Emision Vacuna</label>
                                        <div class="col-sm-4">
                                        <select name="paisemisionvacuna" size="1" maxlength="2" placeholder="paisemisionvacuna" class="form-control" id="inputPaisEmision">
                                            <?php 
                                                for($n = 0; $n < count($nacionalidades); $n++){
                                                    echo '<option value ='.$nacionalidades[$n][0].'>'.$nacionalidades[$n][1].'</option>';
                                                }
                                            ?>
                                        </select>
                                        </div>
                                        <label for="inputVencimientoVacuna" class="col-sm-2 control-label">Vencimiento de Vacuna</label>
                                        <div class="col-sm-4">
                                            <div class="input-group date">
                                              <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                              </div>
                                              <input type="text" class="form-control pull-right" id="datepickervacuna" name="vencimientovacuna" placeholder="fecha vencimiento">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputCorreoAlternativo" class="col-sm-2 control-label">Correo Alternativo</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="inputNombre" name="alternatemail" placeholder="correo alternativo" />
                                        </div>
                                        <label for="inputCorreoAsistente" class="col-sm-2 control-label">Correo Asistente</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="inputNombre" name="asistenteemail" placeholder="asistenteemail" />
                                        </div>
                                    </div>                            

                                    <div class="form-group">
                                        <label for="inputCorreoCopia" class="col-sm-2 control-label">Correo de Copia</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="inputNombre" name="copyemail" placeholder="correo de copia" />
                                        </div>
                                    </div>                                                            

                                </div>

                                <div class="tab-pane" id="usuariosAcercaDe">

                                </div>                             
                             
                            <?php    
                            } else if($_SESSION["mttousuarios"] == "M") {
                                $selperfil = $obj->usuario_buscar($id);
                                
                            ?>

                                <div class="active tab-pane" id="usuariosGeneral">    

                                    <div class="form-group">
                                        <label for="inputName" class="col-sm-2 control-label">Nombres</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="inputNombre" name="nombres" placeholder="nombres" value="<?php echo $selperfil[0][4] ?>" />
                                        </div>
                                        <label for="inputApellidos" class="col-sm-2 control-label">Apellidos</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="inputNombre" name="apellidos" placeholder="apellidos" value="<?php echo $selperfil[0][5] ?>"/>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                                        <div class="col-sm-4">
                                            <input type="email" class="form-control" id="inputemail" name="email" placeholder="email" value="<?php echo $selperfil[0][8] ?>"/>
                                        </div>
                                        <label for="inputIntraCompany" class="col-sm-2 control-label">IntraCompany</label>
                                        <div class="col-sm-4">
                                            <select name="intracompany" size="1" maxlength="2" class="form-control" id="inputIntraCompany">
                                                <?php if($selperfil[0][30] == 0) { ?>
                                                    <option value ='0' selected="selected">No</option>;
                                                    <option value ='1'>Si</option>;    
                                                <?php } else { ?>
                                                    <option value ='0'>No</option>;
                                                    <option value ='1' selected="selected">Si</option>;    
                                                <?php } ?>                                                
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputEmpresa" class="col-sm-2 control-label">Empresa</label>
                                        <div class="col-sm-4">
                                            <select name="clientes"  size="1" maxlength="2" class="form-control" id="inputCliente">
                                                <?php 
                                                    for($c = 0; $c < count($clientes); $c++){
                                                        if ($selperfil[0][9] == $clientes[$c][0]) {
                                                            echo '<option value ='.$clientes[$c][0].' selected="selected">'.$clientes[$c][5].'</option>';
                                                        } else {
                                                            echo '<option value ='.$clientes[$c][0].'>'.$clientes[$c][5].'</option>';
                                                        }
                                                    }
                                                ?>                                                
                                            </select>
                                        </div>                                
                                        <label for="inputCargo" class="col-sm-2 control-label">Cargo</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="inputCargo" name="cargo" placeholder="cargo" value="<?php echo $selperfil[0][7] ?>" />
                                        </div>                                
                                    </div>

                                    <div class="form-group">
                                        <label for="inputUsuario" class="col-sm-2 control-label">Usuario</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="inputUsuario" name="usuario" placeholder="usuario" value="<?php echo $selperfil[0][34] ?>" />
                                        </div>
                                        <label for="inputPassword" class="col-sm-2 control-label">Password</label>
                                        <div class="col-sm-4">
                                            <input type="password" class="form-control" id="inputPassword" name="password" placeholder="password" />
                                        </div>
                                    </div>   

                                    <div class="form-group">
                                        <label for="inputContactoEmergencia" class="col-sm-2 control-label">Contacto Emergencia</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="inputContactoEmergencia" name="contactoemergencia" placeholder="Contacto emergencia" value="<?php echo $selperfil[0][12] ?>"/>
                                        </div>
                                        <label for="inputNumeroEmergencia" class="col-sm-2 control-label">Numero Emergencia</label>
                                        <div class="col-sm-4">
                                            <input type="tel" class="form-control" id="inputNumeroEmergencia" name="numeroemergencia" placeholder="numero emergencia" value="<?php echo $selperfil[0][35] ?>"/>
                                        </div>                                
                                    </div>    

                                    <div class="form-group">
                                        <label for="inputTipoUsuario" class="col-sm-2 control-label">Tipo Usuario</label>
                                        <div class="col-sm-4">
                                            <select name="categoria"  size="1" maxlength="2" placeholder="categoria" class="form-control" id="inputTipoUsuario">
                                                <?php 
                                                    for($t = 0; $t < count($categorias); $t++){
                                                        if($selperfil[0][1] == $categorias[$t][0]) {
                                                            echo '<option value ='.$categorias[$t][0].' selected="selected">'.$categorias[$t][1].'</option>';
                                                        } else {
                                                            echo '<option value ='.$categorias[$t][0].'>'.$categorias[$t][1].'</option>';
                                                        }
                                                    }
                                                ?>                                                
                                            </select>                        
                                        </div>
                                        <label for="inputAgenteAsignado" class="col-sm-2 control-label">Agente Asignado</label>
                                        <div class="col-sm-4">
                                            <select name="agente"  size="1" maxlength="2" class="form-control" id="inputAgenteAsignado">
                                                <?php 
                                                    for($a = 0; $a < count($agentes); $a++){
                                                        if ($selperfil[0][11] == $agentes[$a][0]) {
                                                            echo '<option value ='.$agentes[$a][0].' selected="selected">'.$agentes[$a][3].'</option>';
                                                        } else {
                                                            echo '<option value ='.$agentes[$a][0].'>'.$agentes[$a][3].'</option>';
                                                        }
                                                    }
                                                ?>
                                            </select>                                                            
                                        </div>                                
                                    </div>   

                                </div>    

                            <?php
                            }
                            ?> 

                         </div>
                     </div>

                     <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-danger">Cambiar Password</button>
                            <a href="engine_settings.php?mod=1" class="btn btn-warning">Cancelar</a>
                        </div>
                     </div>
                 </form>                     
                 
              </div>
          
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
    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });
    });
</script>

