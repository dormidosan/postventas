<?php
//here we check whether a register is being inserted or modified
if ($_SESSION["mttousuarios"] == "N") {
    ?>                            
    <!-- div class="<?PHP //echo ( $cat == 1 )? ' active tab-pane': 'tab-pane';  ?>" id="usuariosGeneral" -->    
    <div class="active tab-pane" id="usuariosGeneral">    
        <form class="form-horizontal" enctype="multipart/form-data" method="POST" name="reserva1" action="engine/ctrl_usuarios.php?id=<?php echo $id ?>">    
            <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label" style="color: red">*Nombre</label>
                <div class="col-sm-4">
                    <input type="text" required class="form-control" id="inputNombre" name="nombres" placeholder="nombres"  />
                </div>
                <label for="inputApellidos" class="col-sm-2 control-label" style="color: red">*Apellido</label>
                <div class="col-sm-4">
                    <input type="text" required class="form-control" id="inputNombre" name="apellidos" placeholder="apellidos" />
                </div>
            </div>

            <div class="form-group">
                <label for="inputCargo" class="col-sm-2 control-label">Cargo</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="inputCargo" name="cargo" placeholder="cargo"  />
                </div>  
                <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-4">
                    <input type="email" class="form-control" id="inputemail" name="email" placeholder="email" />
                </div>
            </div>

            <div class="form-group">
                <label for="inputContactoPrechequeo" class="col-sm-2 control-label">Persona de Contacto</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="inputContactoPrechequeo" name="contactoprechequeo" placeholder="Persona de Contacto" />
                </div>
                <label for="inputNumeroPrechequeo" class="col-sm-2 control-label">Telefono Persona de Contacto</label>
                <div class="col-sm-1" >
                    <input type="tel" class="form-control" id="inputCodigoArea" name="codigoarea" placeholder="+0000" />
                </div>   
                <div class="col-sm-3">
                    <input type="tel" class="form-control" id="inputNumeroPrechequeo" name="numeroprechequeo" placeholder="Telefono " />
                </div>                                
            </div>  

            <div class="form-group" style="display: none;">
                <label for="inputContactoEmergencia" class="col-sm-2 control-label">Contacto Emergencia</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="inputContactoEmergencia" name="contactoemergencia" placeholder="Contacto emergencia" />
                </div>
                <label for="inputNumeroEmergencia" class="col-sm-2 control-label">Numero Emergencia</label>
                <div class="col-sm-4">
                    <input type="tel" class="form-control" id="inputNumeroEmergencia" name="numeroemergencia" placeholder="Numero emergencia" />
                </div>                                
            </div>   

            <div class="form-group">
                <label for="inputSexo" class="col-sm-2 control-label" style="color: red">*Sexo</label>
                <div class="col-sm-4">
                    <select name="sexo" size="1" maxlength="2" placeholder="sexo" class="form-control" id="inputSexo" required>
                        <option value ='' selected="selected"></option>
                        
                            <option value = "m">Masculino</option>
                            <option value = "f">Femenino</option>                    
                        
                    </select>
                </div>
                <label for="inputVacunaFiebreAmarilla" class="col-sm-2 control-label">Vacuna Fiebre Amarilla</label>
                <div class="col-sm-4">
                    <select name="vacunafiebreamarilla" size="1" maxlength="2" placeholder="fiebre amarilla" class="form-control" id="inputVacunaFiebreAmarilla" style="padding-left: 1px;">
                        <option value ='' selected="selected"></option>
                        
                            <option value = "0">No</option>
                            <option value = "1">Si</option>                    
                        
                    </select>
                </div>
            </div>   

            <div class="form-group">
                <label for="inputPaisEmision" class="col-sm-2 control-label">Pais Emision Vacuna</label>
                <div class="col-sm-4">
                    <select name="paisemision" size="1" maxlength="2" placeholder="pais emision vacuna" class="form-control" id="inputPaisEmision">
                        <option value ='' selected="selected"></option>
                        <?php
                        for ($n = 0; $n < count($nacionalidades); $n++) {
                            
                                echo '<option value =' . $nacionalidades[$n][0] . '>' . $nacionalidades[$n][1] . '</option>';
                            
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
                        <input type="text" class="form-control pull-right datepicker" id="datepicker4" name="fechavencimiento" placeholder="fecha vencimiento" >
                    </div>
                </div>
            </div>

            <hr>
            <div class="form-group">
                <label for="inputIntraCompany" class="col-sm-2 control-label">IntraCompany</label>
                <div class="col-sm-4">
                    <select name="intracompany" size="1" maxlength="2" class="form-control" id="inputIntraCompany">
                        <option value ='' selected="selected"></option>
                        
                            <option value ='0'>No</option>;
                            <option value ='1'>Si</option>;    
                                                                   
                    </select>
                </div>
                <label for="inputTipoUsuario" class="col-sm-2 control-label">Tipo Usuario</label>
                <div class="col-sm-4">
                    <select name="idcategoria"  size="1" maxlength="2" placeholder="categoria" class="form-control" id="inputTipoUsuario">
                        <option value ='' selected="selected"></option>
                        <?php
                        for ($t = 0; $t < count($categorias); $t++) {
                            
                                echo '<option value =' . $categorias[$t][0] . '>' . $categorias[$t][1] . '</option>';
                            
                        }
                        ?>                                                
                    </select>                        
                </div>

            </div>

            <div class="form-group">
                <label for="inputEmpresa" class="col-sm-2 control-label">Empresa</label>
                <div class="col-sm-4">
                    <select name="idcliente"  size="1" maxlength="2" class="form-control" id="inputCliente">
                        <option value ='' selected="selected"></option>
                        <?php
                        for ($c = 0; $c < count($clientes); $c++) {
                            
                                echo '<option value =' . $clientes[$c][0] . '>' . $clientes[$c][5] . '</option>';
                            
                        }
                        ?>                                                
                    </select>
                </div>   
                <label for="inputAgenteAsignado" class="col-sm-2 control-label">Agente Asignado</label>
                <div class="col-sm-4">
                    <select name="idagente"  size="1" maxlength="2" class="form-control" id="inputAgenteAsignado">
                        <option value ='' selected="selected"></option>
                        <?php
                        for ($a = 0; $a < count($agentes); $a++) {
                            
                                echo '<option value =' . $agentes[$a][0] . '>' . $agentes[$a][3] . '</option>';
                            
                        }
                        ?>
                    </select>                                                            
                </div>  

            </div>
            <div class="form-group"> 
                <label for="inputSegundaNacionalidad" class="col-sm-2 control-label">Pais residencia</label>
                <div class="col-sm-4">
                    <select name="idresidencia" size="1" maxlength="2" placeholder="Pais residencia" class="form-control" id="inputResidencia"  onchange="cambiarCiudades()">
                        <option value ='' selected="selected"></option>
                        <?php
                        for ($n2 = 0; $n2 < count($nacionalidades); $n2++) {
                            
                                echo '<option value =' . $nacionalidades[$n2][0] . '>' . $nacionalidades[$n2][1] . '</option>';
                            
                        }
                        ?>
                    </select>                        
                </div>

                <label for="inputSegundaNacionalidad" class="col-sm-2 control-label" style="display: none;">Ciudad residencia</label>
                <div class="col-sm-4" style="display: none;">
                    <select name="idciudad" size="1" maxlength="2" placeholder="Ciudad residencia" class="form-control" id="inputCiudad" >
                        <option value ='' selected="selected"></option>
                        <?php
                        for ($n2 = 0; $n2 < 100; $n2++) {
                            
                                //echo '<option value =' . $ciudades[$n2][0] . '>' . $ciudades[$n2][1] . '</option>';
                            
                        }
                        ?>
                    </select>                        
                </div>          

            </div>                                    
            <div class="form-group">
                <label for="inputCorreoAlternativo" class="col-sm-2 control-label">Correo Alternativo</label>
                <div class="col-sm-4">
                    <input type="email" class="form-control" id="inputalternatemail" name="alternatemail" placeholder="correo alternativo"/>
                </div>
                <label for="inputCorreoAsistente" class="col-sm-2 control-label">Correo Asistente</label>
                <div class="col-sm-4">
                    <input type="email" class="form-control" id="inputasistenteemail" name="asistenteemail" placeholder="Correo asistente" />
                </div>
            </div>                            

            <div class="form-group">
                <label for="inputCorreoCopia" class="col-sm-2 control-label">Correo de Copia</label>
                <div class="col-sm-4">
                    <input type="email" class="form-control" id="inputCopyemail" name="copyemail" placeholder="correo de copia" />
                </div>
            </div>   

            <hr>

            <div class="form-group">
                <label for="inputCorreoAlternativo" class="col-sm-2 control-label">Tipo asiento</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="inputIdasiento" name="idasiento" placeholder="Tipo asiento" />
                </div>
                <label for="inputCorreoAsistente" class="col-sm-2 control-label">Comentario asiento</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="inputComentarioasiento" name="comentarioasiento" placeholder="Comentario asiento" />
                </div>
            </div>   

            <div class="form-group">
                <label for="inputCorreoAlternativo" class="col-sm-2 control-label" style="color: red">*Fecha nacimiento</label>
                <div class="col-sm-4">
                    <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" required class="form-control pull-right datepicker2" id="datepicker5" name="fechanacimiento" placeholder="fecha nacimiento" >
                    </div>
                </div>
                <label for="inputCorreoAsistente"class="col-sm-2 control-label" style="color: red">*Lugar nacimiento</label>
                <div class="col-sm-4">
                    <input type="text" required class="form-control" id="inputLugarnacimiento" name="lugarnacimiento" placeholder="Lugar nacimiento" />
                </div>


            </div> 

            <div class="form-group">


            </div>





            <div class="form-group">


            </div>   

            <div class="form-group">

                <label for="inputFoto" class="col-sm-2 control-label">Foto:</label><a class='btn btn-primary' href="stdimagen.php?cat=1&ID=<?php echo $id ?>" target="_blank">Imagen actual</a><!--                                        <label for="inputFoto" class="col-sm-2 control-label">Fotografia</label>-->
                <div class="col-sm-4">
                    <div id ="textbox">
                        <input type="hidden" value="Buscar..."/>
                        <input name="imagen" type="file" accept="image/*" />
                    </div>
                </div>
            </div>
            <hr>    
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10"> 
                    <button type="submit" class="btn btn-danger">Guardar Registro</button>                              
                </div>
            </div>   
        </form>

    </div>    

    <div class="tab-pane" id="nacionalidades" >

        <!-- div class="form-group">
            <label for="inputNacionalidad" class="col-sm-2 control-label">Nacionalidad</label>
            <div class="col-sm-10">
                <select name="idnacionalidad1" size="1" maxlength="2" placeholder="primera nacionalidad" class="form-control" id="inputNacionalidad">
        <?php
        //for($n = 0; $n < count($nacionalidades); $n++){
        //    echo '<option value ='.$nacionalidades[$n][0].'>'.$nacionalidades[$n][1].'</option>';
        //}
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
                  <input type="text" lang="en-001" class="form-control pull-right datepicker" id="datepicker" name="pass1fechavenc" placeholder="fecha vencimiento">
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="inputSegundaNacionalidad" class="col-sm-2 control-label">Segunda Nacionalidad</label>
            <div class="col-sm-10">
                <select name="idnacionalidad2" size="1" maxlength="2" placeholder="segunda nacionalidad" class="form-control" id="inputSegundaNacionalidad">
        <?php
        //for($n2 = 0; $n2 < count($nacionalidades); $n2++){
        //    echo '<option value ='.$nacionalidades[$n2][0].'>'.$nacionalidades[$n2][1].'</option>';
        //}
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
                  <input type="text" class="form-control pull-right datepicker" id="datepicker2" name="pass2fechavenc" placeholder="fecha vencimiento">
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
                  <input type="text" class="form-control pull-right datepicker" id="datepicker3" name="vencimientovisa" placeholder="fecha vencimiento">
                </div>
            </div>
            <label for="inputVacunaFiebreAmarilla" class="col-sm-2 control-label">Vacuna Fiebre Amarilla</label>
            <div class="col-sm-4">
                <select name="fiebreamarilla" size="1" maxlength="2" placeholder="fiebre amarilla" class="form-control" id="inputVacunaFiebreAmarilla" >
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
        //for($n = 0; $n < count($nacionalidades); $n++){
        //    echo '<option value ='.$nacionalidades[$n][0].'>'.$nacionalidades[$n][1].'</option>';
        //}
        ?>
            </select>
            </div>
            <label for="inputVencimientoVacuna" class="col-sm-2 control-label">Vencimiento de Vacuna</label>
            <div class="col-sm-4">
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right datepicker" id="datepicker4" name="vencimientovacuna" placeholder="fecha vencimiento">
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
        </div -->                                                            

    </div>

    <div class="tab-pane" id="visas" >

    </div>   
    <div class="tab-pane" id="infoViajes">

    </div>   

    <?php
} else if ($_SESSION["mttousuarios"] == "M" ) {
    $selperfil = $obj->perfiles_buscar($id);
    $selperfil_nacionalidades = $obj->perfil_buscar_nacionalidades($id);
    $selperfil_visas = $obj->perfil_buscar_visas($id);
    $selperfil_carriers = $obj->perfil_buscar_carriers($id);
    unset($ciudades);
    $ciudades = $obj->ciudades_pais_buscar($selperfil[0][18]);
    
    ?>

    <div class="active tab-pane" id="usuariosGeneral">    
        <form class="form-horizontal" enctype="multipart/form-data" method="POST" name="reserva1" action="engine/ctrl_usuarios.php?id=<?php echo $id ?>">
            <?php
            include 'forms_engine_usuarios/general_form.php';
            ?>  
            <hr>    
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10"> 
                    <button type="submit" class="btn btn-danger">Guardar Registro</button>                              
                </div>
            </div>    
        </form>

    </div>    

    <div class="tab-pane" id="nacionalidades">
        <form class="form-horizontal" enctype="multipart/form-data" method="POST" name="reserva1"> <!--  action="engine/ctrl_usuarios_detalles.php?opcion=1&id=<?php echo $id ?>" -->
            <?php
            include 'forms_engine_usuarios/nacionalidades_form.php';
            ?>
            <hr>    
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10"> 
                    <button type='button' class='btn btn-danger' onclick='guardarNacionalidad("<?php echo $selperfil[0][0] ?>")' >
                    Guardar Nuevo Registro
                    </button>
                    <!-- button type="submit" class="btn btn-danger">Guardar Registro</button -->
                </div>
            </div>    
        </form>
    </div>

    <div class="tab-pane" id="visas">
        <form class="form-horizontal" enctype="multipart/form-data" method="POST" name="reserva1"> <!--action="engine/ctrl_usuarios_detalles.php?opcion=2&id=<?php echo $id ?>" -->
            <?php
            include 'forms_engine_usuarios/visas_form.php';
            ?>
            <hr>    
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10"> 
                    <button type='button' class='btn btn-danger' onclick='guardarVisa("<?php echo $selperfil[0][0] ?>")' >
                    Guardar Nuevo Registro
                    </button>                             
                </div>
            </div>    
        </form>

    </div>   
    <div class="tab-pane" id="infoViajes">
        <form class="form-horizontal" enctype="multipart/form-data" method="POST" name="reserva1"> <!-- action="engine/ctrl_usuarios_detalles.php?opcion=3&id=<?php echo $id ?>" -->
            <?php
            include 'forms_engine_usuarios/carriers_form.php';
            ?>
            <hr>    
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10"> 
                    <button type='button' class='btn btn-danger' onclick='guardarCarrier("<?php echo $selperfil[0][0] ?>")' >
                    Guardar Nuevo Registro
                    </button> 
                </div>
            </div>    
        </form>

    </div>   

    <?php
}
?> 
