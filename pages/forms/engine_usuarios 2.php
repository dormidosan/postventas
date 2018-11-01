                       <?php 
                                //here we check whether a register is being inserted or modified
                            if ($_SESSION["mttousuarios"] == "N") {
                            ?>
                            
                                <div class="<?PHP echo ( $cat == 1 )? ' active tab-pane': 'tab-pane'; ?>" id="usuariosGeneral">    

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
                                        <label for="inputIntraCompany" class="col-sm-2 control-label">IntraCompany</label>
                                        <div class="col-sm-4">
                                            <select name="intracompany" size="1" maxlength="2" class="form-control" id="inputIntraCompany">
                                                <option value = "0">No</option>
                                                <option value = "1">Si</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputEmpresa" class="col-sm-2 control-label">Empresa</label>
                                        <div class="col-sm-4">

                                            <select name="clientes"  size="1" maxlength="2" class="form-control" id="inputCliente">
                                            <?php 
                                                for($c = 0; $c < count($clientes); $c++){
                                                    echo '<option value ='.$clientes[$c][0].'>'.$clientes[$c][5].'</option>';
                                                }
                                            ?>
                                            </select>

                                        </div>                                
                                        <label for="inputCargo" class="col-sm-2 control-label">Cargo</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="inputNombre" name="cargo" placeholder="cargo" />
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

                                    <div class="form-group">
                                        <label for="inputContactoEmergencia" class="col-sm-2 control-label">Contacto Emergencia</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="inputContactoEmergencia" name="contactoemergencia" placeholder="Contacto emergencia" />
                                        </div>
                                        <label for="inputNumeroEmergencia" class="col-sm-2 control-label">Numero Emergencia</label>
                                        <div class="col-sm-4">
                                            <input type="tel" class="form-control" id="inputNumeroEmergencia" name="numeroemergencia" placeholder="numero emergencia" />
                                        </div>                                
                                    </div>    

                                    <div class="form-group">
                                        <label for="inputTipoUsuario" class="col-sm-2 control-label">Tipo Usuario</label>
                                        <div class="col-sm-4">
                                            <select name="categoria"  size="1" maxlength="2" placeholder="categoria" class="form-control" id="inputTipoUsuario">
                                                <?php 
                                                    for($t = 0; $t < count($categorias); $t++){
                                                        echo '<option value ='.$categorias[$t][0].'>'.$categorias[$t][1].'</option>';
                                                    }
                                                ?>
                                            </select>                        
                                        </div>
                                        <label for="inputAgenteAsignado" class="col-sm-2 control-label">Agente Asignado</label>
                                        <div class="col-sm-4">
                                            <select name="agente"  size="1" maxlength="2" class="form-control" id="inputAgenteAsignado">
                                                <?php 
                                                    for($a = 0; $a < count($agentes); $a++){
                                                        echo '<option value ='.$agentes[$a][0].'>'.$agentes[$a][3].'</option>';
                                                    }
                                                ?>
                                            </select>                                                            
                                        </div>                                
                                    </div>   

                                    <div class="form-group">
                                        <label for="inputFoto" class="col-sm-2 control-label">Fotografia</label>
                                        <div class="col-sm-4">
                                            <div id ="textbox">
                                                <input type="hidden" value="Buscar..."/>
                                                <input name="imagen" type="file"/>
                                            </div>
                                        </div>
                                    </div>      

                                </div>    

                                <div class="tab-pane" id="nacionalidades">

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
                                              <input type="text" lang="en-001" class="form-control pull-right" id="datepicker" name="pass1fechavenc" placeholder="fecha vencimiento">
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
                                              <input type="text" class="form-control pull-right" id="datepicker3" name="vencimientovisa" placeholder="fecha vencimiento">
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
                                              <input type="text" class="form-control pull-right" id="datepicker4" name="vencimientovacuna" placeholder="fecha vencimiento">
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

                                <div class="tab-pane" id="visas">

                                </div>   
                                <div class="tab-pane" id="infoViajes">

                                </div>   
                             
                            <?php    
                            } else if($_SESSION["mttousuarios"] == "M" && $cat == 1) {
                                $selperfil = $obj->perfiles_buscar($id);
                                
                            ?>

                                <div class="active tab-pane" id="usuariosGeneral">    

                                    <div class="form-group">
                                        <label for="inputName" class="col-sm-2 control-label">Nombres</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="inputNombre" name="nombres" placeholder="nombres" value="<?php echo $selperfil[0][1] ?>" />
                                        </div>
                                        <label for="inputApellidos" class="col-sm-2 control-label">Apellidos</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="inputNombre" name="apellidos" placeholder="apellidos" value="<?php echo $selperfil[0][2] ?>"/>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="inputCargo" class="col-sm-2 control-label">Cargo</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="inputCargo" name="cargo" placeholder="cargo" value="<?php echo $selperfil[0][7] ?>" />
                                        </div>  
                                        <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                                        <div class="col-sm-4">
                                            <input type="email" class="form-control" id="inputemail" name="email" placeholder="email" value="<?php echo $selperfil[0][8] ?>"/>
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
                                        <label for="inputVacunaFiebreAmarilla" class="col-sm-2 control-label">Vacuna Fiebre Amarilla</label>
                                        <div class="col-sm-1">
                                            <select name="fiebreamarilla" size="1" maxlength="2" placeholder="fiebre amarilla" class="form-control" id="inputVacunaFiebreAmarilla">
                                                <?php if($selperfil[0][27] == 0) { ?>
                                                    <option value = "0" selected="selected">No</option>
                                                    <option value = "1">Si</option>                    
                                                <?php } else { ?>
                                                    <option value = "0">No</option>
                                                    <option value = "1" selected="selected">Si</option>                    
                                                <?php }?>
                                            </select>
                                        </div>
                                        <label for="inputPaisEmision" class="col-sm-2 control-label">Pais Emision Vacuna</label>
                                        <div class="col-sm-3">
                                        <select name="paisemisionvacuna" size="1" maxlength="2" placeholder="paisemisionvacuna" class="form-control" id="inputPaisEmision">
                                            <?php 
                                                for($n = 0; $n < count($nacionalidades); $n++){
                                                    if($selperfil[0][28] == $nacionalidades[$n][0]) {
                                                        echo '<option value ='.$nacionalidades[$n][0].' selected="selected">'.$nacionalidades[$n][1].'</option>';
                                                    } else {
                                                        echo '<option value ='.$nacionalidades[$n][0].'>'.$nacionalidades[$n][1].'</option>';
                                                    }
                                                }
                                            ?>
                                        </select>
                                        </div>
                                        <label for="inputVencimientoVacuna" class="col-sm-2 control-label">Vencimiento de Vacuna</label>
                                        <div class="col-sm-2">
                                            <div class="input-group date">
                                              <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                              </div>
                                              <input type="text" class="form-control pull-right" id="datepicker4" name="vencimientovacuna" placeholder="fecha vencimiento" value="<?php echo $selperfil[0][29] ?>">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="form-group">
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
                                    <div class="form-group"> 
                                        <label for="inputSegundaNacionalidad" class="col-sm-2 control-label">Pais residencia</label>
                                        <div class="col-sm-6">
                                            <select name="idresidencia" size="1" maxlength="2" placeholder="Pais residencia" class="form-control" id="idresidencia" >
                                                <?php 
                                                    for($n2 = 0; $n2 < count($nacionalidades); $n2++){
                                                        if($selperfil[0][16] == $nacionalidades[$n2][0]) {
                                                            echo '<option value ='.$nacionalidades[$n2][0].' selected="selected">'.$nacionalidades[$n2][1].'</option>';
                                                        }else {
                                                            echo '<option value ='.$nacionalidades[$n2][0].'>'.$nacionalidades[$n2][1].'</option>';
                                                        }
                                                    }
                                                ?>
                                            </select>                        
                                        </div>
                                        <label for="inputSegundaNacionalidad" class="col-sm-2 control-label">Ciudad residencia</label>
                                        <div class="col-sm-6">
                                            <select name="idciudad" size="1" maxlength="2" placeholder="Ciudad residencia" class="form-control" id="idciudad" >
                                                <?php 
                                                    for($n2 = 0; $n2 < count($nacionalidades); $n2++){
                                                        if($selperfil[0][16] == $nacionalidades[$n2][0]) {
                                                            echo '<option value ='.$nacionalidades[$n2][0].' selected="selected">'.$nacionalidades[$n2][1].'</option>';
                                                        }else {
                                                            echo '<option value ='.$nacionalidades[$n2][0].'>'.$nacionalidades[$n2][1].'</option>';
                                                        }
                                                    }
                                                ?>
                                            </select>                        
                                        </div>
                                        
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="inputCorreoAlternativo" class="col-sm-2 control-label">Correo Alternativo</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="inputNombre" name="alternatemail" placeholder="correo alternativo" value="<?php echo $selperfil[0][31] ?>"/>
                                        </div>
                                        <label for="inputCorreoAsistente" class="col-sm-2 control-label">Correo Asistente</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="inputNombre" name="asistenteemail" placeholder="asistenteemail" value="<?php echo $selperfil[0][32] ?>"/>
                                        </div>
                                    </div>                            

                                    <div class="form-group">
                                        <label for="inputCorreoCopia" class="col-sm-2 control-label">Correo de Copia</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="inputNombre" name="copyemail" placeholder="correo de copia" value="<?php echo $selperfil[0][33] ?>"/>
                                        </div>
                                    </div>   
                                    
                                    

                                    <div class="form-group">
                                        
                                        
                                    </div>

                                    <div class="form-group">
                                                                     
                                                                      
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
                                        
                                                                      
                                    </div>   

                                    <div class="form-group">

                                        <label for="inputFoto" class="col-sm-2 control-label">Foto:</label><a href="stdimagen.php?cat=1&ID=<?php echo $id ?>" target="_blank">Imagen actual</a><!--                                        <label for="inputFoto" class="col-sm-2 control-label">Fotografia</label>-->
                                        <div class="col-sm-4">
                                            <div id ="textbox">
                                                <input type="hidden" value="Buscar..."/>
                                                <input name="imagen" type="file"/>
                                            </div>
                                        </div>
                                    </div>      

                                </div>    

                                <div class="tab-pane" id="nacionalidades">

                                    <div class="form-group">
                                        <label for="inputNacionalidad" class="col-sm-2 control-label">Nacionalidad</label>
                                        <div class="col-sm-10">
                                            <select name="idnacionalidad1" size="1" maxlength="2" placeholder="primera nacionalidad" class="form-control" id="inputNacionalidad">
                                                <?php 
                                                    for($n = 0; $n < count($nacionalidades); $n++){
                                                        if ($selperfil[0][13] == $nacionalidades[$n][0]) {
                                                            echo '<option value ='.$nacionalidades[$n][0].' selected="selected">'.$nacionalidades[$n][1].'</option>';
                                                        } else {
                                                            echo '<option value ='.$nacionalidades[$n][0].'>'.$nacionalidades[$n][1].'</option>';
                                                        }
                                                    }
                                                ?>
                                            </select>                        
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputPasaporte" class="col-sm-2 control-label">Pasaporte</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="inputPasaporte" name="npasaporte1" placeholder="pasaporte" value="<?php echo $selperfil[0][14] ?>"/>
                                        </div>
                                        <label for="inputVencimientoPasaporte" class="col-sm-2 control-label">Vencimiento Pasaporte</label>
                                        <div class="col-sm-4">
                                            <div class="input-group date">
                                              <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                              </div>
                                              <input type="text" lang="en-001" class="form-control pull-right" id="datepicker" name="pass1fechavenc" placeholder="fecha vencimiento" value="<?php echo $selperfil[0][15] ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputSegundaNacionalidad" class="col-sm-2 control-label">Segunda Nacionalidad</label>
                                        <div class="col-sm-10">
                                            <select name="idnacionalidad2" size="1" maxlength="2" placeholder="segunda nacionalidad" class="form-control" id="inputSegundaNacionalidad" >
                                                <?php 
                                                    for($n2 = 0; $n2 < count($nacionalidades); $n2++){
                                                        if($selperfil[0][16] == $nacionalidades[$n2][0]) {
                                                            echo '<option value ='.$nacionalidades[$n2][0].' selected="selected">'.$nacionalidades[$n2][1].'</option>';
                                                        }else {
                                                            echo '<option value ='.$nacionalidades[$n2][0].'>'.$nacionalidades[$n2][1].'</option>';
                                                        }
                                                    }
                                                ?>
                                            </select>                        
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputPasaporte2" class="col-sm-2 control-label">Pasaporte</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="inputPasaporte" name="npasaporte2" placeholder="pasaporte" value="<?php echo $selperfil[0][17] ?>"/>
                                        </div>
                                        <label for="inputVencimientoPasaporte2" class="col-sm-2 control-label">Vencimiento Pasaporte</label>
                                        <div class="col-sm-4">
                                            <div class="input-group date">
                                              <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                              </div>
                                              <input type="text" class="form-control pull-right" id="datepicker2" name="pass2fechavenc" placeholder="fecha vencimiento" value="<?php echo $selperfil[0][18] ?>">
                                            </div>
                                        </div>
                                    </div>                                

                                    <div class="form-group">
                                        <label for="inputVisaAmericana" class="col-sm-2 control-label">Visa Americana</label>
                                        <div class="col-sm-4">
                                            <select name="visaamericana" size="1" maxlength="2" placeholder="visa americana" class="form-control" id="inputVisaAmericana" value="<?php echo $selperfil[0][19] ?>">
                                                <?php if($selperfil == 0) { ?>
                                                    <option value ='0' selected="selected">No</option>;
                                                    <option value ='1'>Si</option>;    
                                                <?php } else { ?>
                                                    <option value ='0'>No</option>;
                                                    <option value ='1' selected="selected">Si</option>;    
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <label for="inputTipoVisa" class="col-sm-2 control-label">Tipo Visa</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="inputPasaporte" name="tipovisa" placeholder="tipo de visa" value="<?php echo $selperfil[0][26] ?>"/>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputVencimientoVisa" class="col-sm-2 control-label">Vencimiento de Visa</label>
                                        <div class="col-sm-4">
                                            <div class="input-group date">
                                              <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                              </div>
                                              <input type="text" class="form-control pull-right" id="datepicker3" name="vencimientovisa" placeholder="fecha vencimiento" value="<?php echo $selperfil[0][20] ?>">
                                            </div>
                                        </div>
                                        
                                    </div>                                

                                    

                                                                                             

                                </div>

                                <div class="tab-pane" id="visas">

                                </div>   
                                <div class="tab-pane" id="infoViajes">

                                </div>   
                             
                            <?php
                            }
                            ?> 
