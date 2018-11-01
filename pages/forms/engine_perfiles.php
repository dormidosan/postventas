<div class="row">
        <div class="col-md-3">
        <?php  //if ($id <> 0 and $cliente <> 0) {
        $val1 = 1;
        if ( $val1) {    
        //$selcliente = $obj->usua-rio_perfil($cliente);
        ?>
          <!-- Profile Image -->
          
          
    

            <div class="box box-primary">
            <div class="box-body box-profile">
              <!-- img class="profile-user-img img-responsive img-circle" src="../../dist/img/userm-128x128.jpg" alt="User profile picture" -->
              <img class="profile-user-img img-responsive img-circle" alt="User profile picture" id="nclienteimage">
              <h3 class="profile-username text-center"> <span id="ncliente1-2"></span><?php //echo $selcliente[0][6] ?> </h3>

              <p class="text-muted text-center"><span id="ncliente3"></span><?php //echo $selcliente[0][7] ?></p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Sexo</b> <a class="pull-right"><span id="ncliente32"></span><?php //echo $selcliente[0][16] ?></a>
                </li>
                 <li class="list-group-item">
                  <b>Pais residencia</b> <a class="pull-right"><span id="ncliente19"></span><?php //echo $selcliente[0][16] ?></a>
                </li>
                <li class="list-group-item" >
                  <b>Contacto prechequeo</b> <a class="pull-right"><span id="ncliente29"></span><?php //echo $selcliente[0][29] ?></a>
                </li>
                <li class="list-group-item">
                  <b>Numero prechequeo</b> <a class="pull-right"><span id="ncliente30"></span><?php //echo $selcliente[0][17] ?></a>
                </li>
                <li class="list-group-item" style="padding-bottom: 60px;">
                  <b>Contacto emergencia</b> <a class="pull-right"><span id="ncliente5"></span><?php //echo $selcliente[0][29] ?></a>
                </li>
                <li class="list-group-item">
                  <b>Numero emergencia</b> <a class="pull-right"><span id="ncliente6"></span><?php //echo $selcliente[0][17] ?></a>
                </li>
                
              </ul>

              <!-- a href="#" class="btn btn-primary btn-block"><b>Editar Perfil</b></a --> 
              <!-- button type='button' class='btn btn-primary' id='btnEditarPerfil' onclick='editForm()' >Editar Perfil</button -->
              <a type='button'  class='btn btn-primary' id='btnEditarPerfil' target="_blank" >Editar Perfil</a>
              <br>
              <br>
              <form class="form-horizontal" enctype="multipart/form-data" method="POST" name="disablePerfil" id="FrmDisablePerfil" >
               <!--  action="engine/ctrl_perfil.php?id=<-?php echo $id?>" -->
               <button type="submit" id='btnDisablePerfil' class="btn btn-danger"  onclick="return confirm('Esta seguro de inactivar usuario?')" >Inactivar</button>
             </form>
              <!-- a type='button'  class='btn btn-danger' id='btnDisablePerfil'  >NO USAR</a -->
              <button type="submit"  class="btn btn-success" id='btnGuardarPerfil' style="display:none" >Guardar Registro</button>
            </div>
            <!-- /.box-body  -->
          </div>
          <!-- /.box -->
        <?php }else{  ?>
<!--          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="../../dist/img/userm-128x128.jpg" alt="User profile picture">

              <h3 class="profile-username text-center"><span id="ncliente"></span> </h3>

              <p class="text-muted text-center">CARGO</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Nacionalidad</b> <a class="pull-right">El Salvador</a>
                </li>
                <li class="list-group-item">
                  <b>Residencia</b> <a class="pull-right">El Salvador</a>
                </li>
                <li class="list-group-item">
                  <b>Pasaporte</b> <a class="pull-right">A029852364</a>
                </li>
              </ul>
               button type='button' class='btn btn-primary' onclick='readOnlyText(false)' >Editar Perfil</button 
              <a href="#" class="btn btn-primary btn-block"><b>Editar Perfil</b></a >
            </div>
             /.box-body 
          </div>-->
          <!--
          
          POR EL MOMENTO ESTE BLOQUE "ABOUT ME" NO SE VA A USAR
          
          -->
          <?php } ?>
          <!-- About Me Box -->
<!--          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">About Me</h3>
            </div>
             /.box-header 
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

              <p class="text-muted">
                B.S. in Computer Science from the University of Tennessee at Knoxville
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

              <p class="text-muted">Malibu, California</p>

              <hr>

              <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

              <p>
                <span class="label label-danger">UI Design</span>
                <span class="label label-success">Coding</span>
                <span class="label label-info">Javascript</span>
                <span class="label label-warning">PHP</span>
                <span class="label label-primary">Node.js</span>
              </p>

              <hr>

              <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
            </div>
             /.box-body 
          </div>-->
          <!-- /.box -->
          
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li id="liperfil" class="active"> <a href="#perfil" data-toggle="tab">Perfil</a></li>
              <!-- li id="liotrosdatos"><a href="#otrosdatos" data-toggle="tab">Otros datos</a></li -->
              <li id="liimagenes">            <a href="#imagenes" data-toggle="tab">Imagenes</a></li>
              <li id="licomentarios">      <a href="#comentarios" data-toggle="tab">Comentarios</a></li>
              <!-- li id="litimeline">            <a href="#timeline" data-toggle="tab">Lineas de tiempo</a></li -->
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="perfil">


            <?php  //if ($id <> 0 and $cliente <> 0) {
            //if ( $cliente <> 0) {
            if ( $val1) {   
               ?>
            <form class="form-horizontal">
               <!-- div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Nombres</label>
                  <div class="col-sm-4">
                     <input type="text"  value="<?php //echo $selcliente[0][4] ?>" class="form-control" id="selcliente1" placeholder="Nombres"  >
                  </div>
                  <label for="inputEmail" class="col-sm-2 control-label">Apellidos</label>
                  <div class="col-sm-4">
                     <input type="text" value="<?php //echo $selcliente[0][5] ?>" class="form-control" id="selcliente2" placeholder="Apellidos">
                  </div>
               </div>
               <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Cargo</label>
                  <div class="col-sm-4">
                     <input type="text" value="<?php //echo $selcliente[0][7] ?>" class="form-control" id="selcliente3" placeholder="Cargo">
                  </div>
                  <label for="inputExperience" class="col-sm-2 control-label">Email</label>
                  <div class="col-sm-4">
                    <input type="text" value="<?php //echo $selcliente[0][8] ?>" class="form-control" id="selcliente4" placeholder="Email">
                  </div>
               </div>
               <hr>
               <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Contacto emergencia</label>
                  <div class="col-sm-4">
                     <input type="text" value="<?php //echo $selcliente[0][3] ?>" class="form-control" id="selcliente5" placeholder="Contacto emergencia">
                  </div>
                  <label for="inputExperience" class="col-sm-2 control-label">Numero emergencia</label>
                  <div class="col-sm-4">
                    <input type="text" value="<?php //echo $selcliente[0][2] ?>" class="form-control" id="selcliente6" placeholder="Categoria">
                  </div>
               </div>
              
               <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Vacuna fiebre amarilla</label>
                  <div class="col-sm-3">
                     <input type="text" value="<?php //echo $selcliente[0][10] ?>" class="form-control" id="selcliente7" placeholder="cliente">
                  </div>
                  <label for="inputExperience" class="col-sm-1 control-label">Pais emision</label>
                  <div class="col-sm-2">
                    <input type="text" value="<?php //echo $selcliente[0][12] ?>" class="form-control" id="selcliente8" placeholder="Agente">
                  </div>
                  <label for="inputName" class="col-sm-2 control-label">Fecha vencimiento</label>
                  <div class="col-sm-2">
                     <input type="text" value="<?php //echo $selcliente[0][14] ?>" class="form-control" id="selcliente9" placeholder="ID">
                  </div>
               </div>
               <hr>
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">IntraCompany</label>
                  <div class="col-sm-4">
                     <input type="text" value="<?php //echo $selcliente[0][29] ?>" class="form-control" id="selcliente11" placeholder="Residencia">
                  </div>
                  <label for="inputExperience" class="col-sm-2 control-label">Categoria</label>
                  <div class="col-sm-4">
                    <input type="text" value="<?php //echo $selcliente[0][27] ?>" class="form-control" id="selcliente12" placeholder="registro">
                  </div>
               </div>
               <hr>
               <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Cliente</label>
                  <div class="col-sm-4">
                     <input type="text" value="<?php //echo $selcliente[0][29] ?>" class="form-control" id="selcliente14" placeholder="Residencia">
                  </div>
                  <label for="inputExperience" class="col-sm-2 control-label">Agente</label>
                  <div class="col-sm-4">
                    <input type="text" value="<?php //echo $selcliente[0][27] ?>" class="form-control" id="selcliente16" placeholder="registro">
                  </div>
               </div> 
               <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Residencia</label>
                  <div class="col-sm-4">
                     <input type="text" value="<?php //echo $selcliente[0][29] ?>" class="form-control" id="selcliente18" placeholder="Residencia">
                  </div>
                  <label for="inputExperience" class="col-sm-2 control-label">Ciudad</label>
                  <div class="col-sm-4">
                    <input type="text" value="<?php //echo $selcliente[0][27] ?>" class="form-control" id="selcliente20" placeholder="registro">
                  </div>
               </div -->
               <div class="form-group">
                  <label for="inputName" class="col-sm-3 control-label">Fecha nacimiento</label>
                  <div class="col-sm-3">
                     <input type="text" value="<?php //echo $selcliente[0][29] ?>" class="form-control" id="selcliente27" placeholder="Fecha nacimiento">
                  </div>
                  <label for="inputExperience" class="col-sm-3 control-label">Lugar nacimiento</label>
                  <div class="col-sm-3">
                    <input type="text" value="<?php //echo $selcliente[0][27] ?>" class="form-control" id="selcliente28" placeholder="Lugar nacimiento">
                  </div>
               </div> 
               <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Correo copia</label>
                  <div class="col-sm-4">
                     <input type="text" value="<?php //echo $selcliente[0][29] ?>" class="form-control" id="selcliente24" placeholder="Correo copia">
                  </div>
                  <label for="inputExperience" class="col-sm-2 control-label">Correo asistente</label>
                  <div class="col-sm-4">
                    <input type="text" value="<?php //echo $selcliente[0][27] ?>" class="form-control" id="selcliente23" placeholder="Correo asistente">
                  </div>
               </div> 
               <hr>               
               <div class="form-group">
                <label for="inputVacunaFiebreAmarilla" class="col-sm-2 control-label">Vacuna Fiebre Amarilla</label>
                <div class="col-sm-1">
                    <input type="text" value="<?php //echo $selcliente[0][29] ?>" class="form-control" id="selcliente7" placeholder=""  style="padding-left: 1px;">
                </div>
                <label for="inputPaisEmision" class="col-sm-2 control-label">Pais Emision Vacuna</label>
                <div class="col-sm-3">
                    <input type="text" value="<?php //echo $selcliente[0][29] ?>" class="form-control" id="selcliente9" placeholder="Pais">
                </div>
                <label for="inputVencimientoVacuna" class="col-sm-2 control-label">Vencimiento de Vacuna</label>
                <div class="col-sm-2">
                    <input type="text" value="<?php //echo $selcliente[0][29] ?>" class="form-control" id="selcliente10" placeholder="Vencimiento">
                </div>
            </div>
               <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Tipo asiento</label>
                  <div class="col-sm-2">
                     <input type="text" value="<?php //echo $selcliente[0][29] ?>" class="form-control" id="selcliente25" placeholder="Tipo asiento">
                  </div>
                  <label for="inputExperience" class="col-sm-3 control-label">Comentarios asiento</label>
                  <div class="col-sm-5">
                    <input type="text" value="<?php //echo $selcliente[0][27] ?>" class="form-control" id="selcliente26" placeholder="Comentarios de asiento">
                  </div>
               </div>
               <hr>
               <div class="form-group">
                   <div class="col-sm-12">
                  <table id="example5" class="table table-sm table-bordered">
                    <caption>Nacionalidades</caption>
                    <thead>
                    <tr>
                      <th>Pais</th>
                      <th>Documento</th>          
                      <th>Fecha Expedicion</th>
                      <th>Fecha Vencimiento</th>
                      <th>Secuencia pasaporte</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php   
                      //$selclientes = $obj->perfil_buscar_empresa($id);
                      //if ($id <> 0 or $id == 0) {
                      if (true) {
                        for($i = 0; $i < 2; $i++){
                         echo "<tr>";
                         echo "<td>".$nacionalidades[$i][0]."</td>";
                         echo "<td>".$nacionalidades[$i][1]."</td>";
                         echo "<td>".$nacionalidades[$i][1]."</td>";
                         echo "<td>".$nacionalidades[$i][0]."</td>";
                         echo "<td>".$nacionalidades[$i][1]."</td>";
                         echo "</tr>";   
                        }
                         }?>

                    </tbody>
                    <!-- tfoot>
                    <tr>
                      <th>Pais</th>
                      <th>Documento</th>          
                      <th>Expedicion</th>
                      <th>Vencimiento</th>
                    </tr>
                    </tfoot -->
                  </table>
               </div> 
                    </div> 
               <hr>
               <div class="form-group">
                   <div class="col-sm-12">
                  <table id="example6" class="table table-sm table-bordered">
                    <caption>Visas</caption>
                    <thead>
                    <tr>
                      <th>Pais visa</th>
                      <th>Pasaporte visado</th>          
                      <th>Tipo visa</th>
                      <th>Numero visa</th>
                      <th>Expiración visa</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php   
                      //$selclientes = $obj->perfil_buscar_empresa($id);
                      //if ($id <> 0 or $id == 0) {
                      if (true) {
                        for($i = 0; $i < 2; $i++){
                         echo "<tr>";
                         echo "<td>".$nacionalidades[$i][0]."</td>";
                         echo "<td>".$nacionalidades[$i][1]."</td>";
                         echo "<td>".$nacionalidades[$i][1]."</td>";
                         echo "<td>".$nacionalidades[$i][0]."</td>";
                         echo "<td>".$nacionalidades[$i][0]."</td>";
                         echo "</tr>";   
                        }
                         }?>

                    </tbody>
                    <!-- tfoot>
                    <tr>
                      <th>Pais</th>
                      <th>Documento</th>          
                      <th>Expedicion</th>
                      <th>Vencimiento</th>
                    </tr>
                    </tfoot -->
                  </table>
               </div> 
                    </div> 
               <hr>
               <div class="form-group">
                   <div class="col-sm-12">
                  <table id="example7" class="table table-sm table-bordered">
                    <caption>Viajeros frecuentes</caption>
                    <thead>
                    <tr>
                      <th>Carrier</th>
                      <th>Numero</th>          
                      <th>Comentario</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php   
                      //$selclientes = $obj->perfil_buscar_empresa($id);
                      //if ($id <> 0 or $id == 0) {
                      if (true) {
                        for($i = 0; $i < 2; $i++){
                         echo "<tr>";
                         echo "<td>".$nacionalidades[$i][0]."</td>";
                         echo "<td>".$nacionalidades[$i][1]."</td>";
                         echo "<td>".$nacionalidades[$i][1]."</td>";
                         echo "</tr>";   
                        }
                         }?>

                    </tbody>
                    <!-- tfoot>
                    <tr>
                      <th>Pais</th>
                      <th>Documento</th>          
                      <th>Expedicion</th>
                      <th>Vencimiento</th>
                    </tr>
                    </tfoot -->
                  </table>
               </div> 
                    </div> 

               




            </form>
            <?php }else{  ?>
            <form class="form-horizontal">
               <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label"> Nombre completo</label>
                  
                  <div class="col-sm-10">
                     <input type="email" class="form-control" id="inputName" placeholder="Nombre completo">
                  </div>
               </div>
               <div class="form-group">
                  <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                  <div class="col-sm-10">
                     <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                  </div>
               </div>
               <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Agente</label>
                  <div class="col-sm-10">
                     <input type="text" class="form-control" id="inputName" placeholder="Agente">
                  </div>
               </div>
               <div class="form-group">
                  <label for="inputExperience" class="col-sm-2 control-label">Categoria</label>
                  <div class="col-sm-10">
                     <input type="text"  class="form-control" id="inputExperience" placeholder="Categoria">
                  </div>
               </div>
               <div class="form-group">
                  <label for="inputSkills" class="col-sm-2 control-label">Visa americana</label>
                  <div class="col-sm-10">
                     <input type="text" class="form-control" id="inputSkills" placeholder="Visa americana">
                  </div>
               </div>
            </form>
            <?php } ?>


              </div>
              <!-- /.tab-pane -->
              
              <?php //TABS NUEVOS ?>
              <div class="tab-pane" id="otrosdatos">
                  <div class="form-horizontal">
                      <div class="form-group">
                        <div class="col-sm-8">
                           <div class="row">
                              <label for="inputName" class="col-sm-3 control-label">Nacionalidad 1</label>
                              <div class="col-sm-4">
                                 <input type="text" value="<?php //echo $selcliente[0][16] ?>" class="form-control" id="selcliente16" placeholder="Nacionalidad">
                              </div>
                              <label for="inputExperience" class="col-sm-2 control-label">Pasaporte</label>
                              <div class="col-sm-3">
                                 <input type="text" value="<?php //echo $selcliente[0][17] ?>" class="form-control" id="selcliente17" placeholder="Pasaporte">
                              </div>
                           </div>
                        </div>
                        <div class="col-sm-4">
                           <div class="row">
                              <label for="inputName" class="col-sm-5 control-label">Vencimiento</label>
                              <div class="col-sm-7">
                                 <input type="text" value="<?php //echo $selcliente[0][18] ?>" class="form-control" id="selcliente18" placeholder="Vencimiento">
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="col-sm-8">
                           <div class="row">
                              <label for="inputName" class="col-sm-3 control-label">Nacionalidad 2</label>
                              <div class="col-sm-4">
                                 <input type="text" value="<?php //echo $selcliente[0][20] ?>" class="form-control" id="selcliente20" placeholder="Nacionalidad">
                              </div>
                              <label for="inputExperience" class="col-sm-2 control-label">Pasaporte</label>
                              <div class="col-sm-3">
                                 <input type="text" value="<?php //echo $selcliente[0][21] ?>" class="form-control" id="selcliente21" placeholder="Pasaporte">
                              </div>
                           </div>
                        </div>
                        <div class="col-sm-4">
                           <div class="row">
                              <label for="inputName" class="col-sm-5 control-label">Vencimiento</label>
                              <div class="col-sm-7">
                                 <input type="text" value="<?php //echo $selcliente[0][22] ?>" class="form-control" id="selcliente22" placeholder="Vencimiento">
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
              </div>
               
               <?php //TABS NUEVOS ?>
              <div class="tab-pane" id="comentarios">
                <!-- The timeline -->
                <ul class="timeline timeline-inverse">
                  <!-- timeline time label -->
                  <li class="time-label">
                        <span class="bg-red">
                          10 Sep. 2018
                        </span>
                  </li>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-comments bg-purple"></i>

                    <div class="timeline-item">
<!--                      <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>-->

                      <h3 class="timeline-header"><a href="#">PostVenta</a> Comento este perfil</h3>

                      <div class="timeline-body">
                        Pasajero solicito cambio de asiento
                        de pasillo a ventana y comida vegetariana
                      </div>
                      
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <!-- timeline item -->
                  <li class="time-label">
                        <span class="bg-red">
                          12 Sep. 2018
                        </span>
                  </li>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-comments bg-purple"></i>

                    <div class="timeline-item">
                      <!--<span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>-->

                      <h3 class="timeline-header"><a href="#">PostVenta</a> Comento este perfil</h3>

                      <div class="timeline-body">
                        Se envio prechequeo a asistente por peticion
                        del pasajero
                        
                      </div>
                      
                    </div>
                  </li>
                  <!-- END timeline item -->
                  
                  
                  <!-- timeline item -->
                  <li class="time-label">
                        <span class="bg-red">
                          17 Sep. 2018
                        </span>
                  </li>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-comments bg-purple"></i>

                    <div class="timeline-item">
                      <!--<span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>-->

                      <h3 class="timeline-header"><a href="#">PostVenta</a> Comento este perfil</h3>

                      <div class="timeline-body">
                        Pasajero solicito actualizacion de viajero frecuente
                        AV #q48723847
                        
                      </div>
                      
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <li>
                    <i class="fa fa-clock-o bg-gray"></i>
                  </li>
                  
                </ul>
<!--                <ul class="list-inline">
                    <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
                    <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
                    </li>
                    <li class="pull-right">
                      <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
                        (5)</a></li>
                </ul>
                -->
                <form role="form">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Insertar comentario</label>
                      <input class="form-control input-sm" type="text" placeholder="Type a comment">
                    </div>
                    
                  </div>
                  <!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Guardar Comentario</button>
                  </div>
                </form>
              </div>
               <?php //TABS NUEVOS ?>
              <div class="tab-pane" id="imagenes">
                <div class="form-horizontal">
                      
                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                        <!--<img class="img-circle img-bordered-sm" src="../../dist/img/userm-128x128.jpg" alt="User Image">-->
                            <!--<span class="username">-->
                              <br>
                              <a href="#">Multimedia asociada al perfil</a>
                              <!--<a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>-->
                            <!--</span>-->
                        <!--<span class="description">Posted 5 photos - 5 days ago</span>-->
                      </div>
                      <!-- /.user-block -->
                      <div class="row margin-bottom">
                        <div class="col-sm-6">
                          <img class="img-responsive" src="../../dist/img/photo1.png" alt="Photo">
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                          <div class="row">
                            <div class="col-sm-6">
                              <img class="img-responsive" src="../../dist/img/photo2.png" alt="Photo">
                              <br>
                              <img class="img-responsive" src="../../dist/img/photo3.jpg" alt="Photo">
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-6">
                              <img class="img-responsive" src="../../dist/img/photo4.jpg" alt="Photo">
                              <br>
                              <img class="img-responsive" src="../../dist/img/photo1.png" alt="Photo">
                            </div>
                            <!-- /.col -->
                          </div>
                          <!-- /.row -->
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->

    <!--                  <ul class="list-inline">
                        <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
                        <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
                        </li>
                        <li class="pull-right">
                          <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
                            (5)</a></li>
                      </ul>

                      <input class="form-control input-sm" type="text" placeholder="Type a comment">-->
                    </div>
                    <!-- /.post -->
                </div>
              </div>
               <?php //TABS NUEVOS ?>
               <div class="tab-pane" id="timeline">
                <!-- The timeline -->
                <ul class="timeline timeline-inverse">
                  <!-- timeline time label -->
                  <li class="time-label">
                        <span class="bg-red">
                          10 Sep. 2018
                        </span>
                  </li>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-comments bg-purple"></i>

                    <div class="timeline-item">
<!--                      <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>-->

                      <h3 class="timeline-header"><a href="#">PostVenta</a> Comento este perfil</h3>

                      <div class="timeline-body">
                        Pasajero solicito cambio de asiento
                        de pasillo a ventana y comida vegetariana
                      </div>
                      
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <!-- timeline item -->
                  <li class="time-label">
                        <span class="bg-red">
                          12 Sep. 2018
                        </span>
                  </li>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-comments bg-purple"></i>

                    <div class="timeline-item">
                      <!--<span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>-->

                      <h3 class="timeline-header"><a href="#">PostVenta</a> Comento este perfil</h3>

                      <div class="timeline-body">
                        Se envio prechequeo a asistente por peticion
                        del pasajero
                        
                      </div>
                      
                    </div>
                  </li>
                  <!-- END timeline item -->
                  
                  
                  <!-- timeline item -->
                  <li class="time-label">
                        <span class="bg-red">
                          17 Sep. 2018
                        </span>
                  </li>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-comments bg-purple"></i>

                    <div class="timeline-item">
                      <!--<span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>-->

                      <h3 class="timeline-header"><a href="#">PostVenta</a> Comento este perfil</h3>

                      <div class="timeline-body">
                        Pasajero solicito actualizacion de viajero frecuente
                        AV #q48723847
                        
                      </div>
                      
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <li>
                    <i class="fa fa-clock-o bg-gray"></i>
                  </li>
                  
                </ul>
<!--                <ul class="list-inline">
                    <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
                    <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
                    </li>
                    <li class="pull-right">
                      <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
                        (5)</a></li>
                </ul>
                -->
                <form role="form">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Insertar comentario</label>
                      <input class="form-control input-sm" type="text" placeholder="Type a comment">
                    </div>
                    
                  </div>
                  <!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Guardar Comentario</button>
                  </div>
                </form>
                
                
                
                
              </div>
              
              
              
              <!-- /.tab-pane -->

              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->