<div class="form-group">
    <label for="inputName" class="col-sm-2 control-label" style="color: red">*Nombre</label>
    <div class="col-sm-4">
        <input type="text" required class="form-control" id="inputNombre" name="nombres" placeholder="nombres" value="<?php echo $selperfil[0][1] ?>" />
    </div>
    <label for="inputApellidos" class="col-sm-2 control-label" style="color: red">*Apellido</label>
    <div class="col-sm-4">
        <input type="text" required class="form-control" id="inputNombre" name="apellidos" placeholder="apellidos" value="<?php echo $selperfil[0][2] ?>"/>
    </div>
</div>

<div class="form-group">
    <label for="inputCargo" class="col-sm-2 control-label">Cargo</label>
    <div class="col-sm-4">
        <input type="text" class="form-control" id="inputCargo" name="cargo" placeholder="cargo" value="<?php echo $selperfil[0][3] ?>" />
    </div>  
    <label for="inputEmail" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-4">
        <input type="email" class="form-control" id="inputemail" name="email" placeholder="email" value="<?php echo $selperfil[0][4] ?>"/>
    </div>
</div>
<div class="form-group">
    <label for="inputContactoPrechequeo" class="col-sm-2 control-label">Persona de Contacto</label>
    <div class="col-sm-4">
        <input type="text" class="form-control" id="inputContactoPrechequeo" name="contactoprechequeo" placeholder="Persona de Contacto" value="<?php echo $selperfil[0][29] ?>"/>
    </div>
    <label for="inputNumeroPrechequeo" class="col-sm-2 control-label">Telefono Persona de Contacto</label>
    <div class="col-sm-1"  >
        <input type="tel" class="form-control" id="inputCodigoArea" name="codigoarea" placeholder="+0000"  value="<?php echo $selperfil[0][31] ?>" />
    </div> 
    <div class="col-sm-3">
        <input type="tel" class="form-control" id="inputNumeroPrechequeo" name="numeroprechequeo" placeholder="Telefono" value="<?php echo $selperfil[0][30] ?>" />
    </div>                                
</div> 
<div class="form-group" style="display: none;">
    <label for="inputContactoEmergencia" class="col-sm-2 control-label">Contacto Emergencia</label>
    <div class="col-sm-4">
        <input type="text" class="form-control" id="inputContactoEmergencia" name="contactoemergencia" placeholder="Contacto emergencia" value="<?php echo $selperfil[0][5] ?>"/>
    </div>
    <label for="inputNumeroEmergencia" class="col-sm-2 control-label">Numero Emergencia</label>
    <div class="col-sm-4">
        <input type="tel" class="form-control" id="inputNumeroEmergencia" name="numeroemergencia" placeholder="numero emergencia" value="<?php echo $selperfil[0][6] ?>"/>
    </div>                                
</div>   

<div class="form-group">
    <label for="inputSexo" class="col-sm-2 control-label" style="color: red">*Sexo</label>
    <div class="col-sm-4">
        <select name="sexo" size="1" maxlength="2" placeholder="sexo" class="form-control" id="inputSexo" >
            <option value ='' selected="selected"></option>
                <?php if ($selperfil[0][32] == '' || $selperfil[0][32] == '-') { ?>
                <option value ='' selected="selected"></option>
                <option value = "m">Masculino</option>
                <option value = "f">Femenino</option>                    
                <?php } elseif ($selperfil[0][32] == 'm') { ?>
                    <option value = "m" selected="selected">Masculino</option>
                    <option value = "f">Femenino</option>   
                                       
                <?php } else { ?>
                    <option value = "m">Masculino</option>
                    <option value = "f" selected="selected">Femenino</option>                  
                <?php } ?>
                                    

        </select>
    </div>
    <label for="inputVacunaFiebreAmarilla" class="col-sm-2 control-label">Vacuna Fiebre Amarilla</label>
    <div class="col-sm-4">
        <select name="vacunafiebreamarilla" size="1" maxlength="2" placeholder="fiebre amarilla" class="form-control" id="inputVacunaFiebreAmarilla" style="padding-left: 1px;">
            
            <?php if ($selperfil[0][7] == '') { ?>
                <option value ='' selected="selected"></option>
                <option value = "0">No</option>
                <option value = "1">Si</option>                    
            <?php } elseif ($selperfil[0][7] == 1) { ?>
                <option value = "0">No</option>
                <option value = "1" selected="selected">Si</option>                    
            <?php } else { ?>
                <option value = "0" selected="selected">No</option>
                <option value = "1">Si</option>                    
            <?php } ?>
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
                if ($selperfil[0][8] == $nacionalidades[$n][0]) {
                    echo '<option value =' . $nacionalidades[$n][0] . ' selected="selected">' . $nacionalidades[$n][1] . '</option>';
                } else {
                    echo '<option value =' . $nacionalidades[$n][0] . '>' . $nacionalidades[$n][1] . '</option>';
                }
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
            <input type="text" class="form-control pull-right datepicker" id="datepicker4" name="fechavencimiento" placeholder="fecha vencimiento" value="<?php echo $selperfil[0][10] ?>">
        </div>
    </div>
</div>


<div class="form-group">
    <label for="inputIntraCompany" class="col-sm-2 control-label">IntraCompany</label>
    <div class="col-sm-4">
        <select name="intracompany" size="1" maxlength="2" class="form-control" id="inputIntraCompany">
            <?php if ($selperfil[0][11] == '') { ?>
                <option value ='' selected="selected"></option>
                <option value = "0">No</option>
                <option value = "1">Si</option>                    
            <?php } elseif ($selperfil[0][11] == 1) { ?>
                <option value = "0">No</option>
                <option value = "1" selected="selected">Si</option>                    
            <?php } else { ?>
                <option value = "0" selected="selected">No</option>
                <option value = "1">Si</option>                    
            <?php } ?>

                                              
        </select>
    </div>
    <label for="inputTipoUsuario" class="col-sm-2 control-label">Tipo Usuario</label>
    <div class="col-sm-4">
        <select name="idcategoria"  size="1" maxlength="2" placeholder="categoria" class="form-control" id="inputTipoUsuario">
            <option value ='' selected="selected"></option>
            <?php
            for ($t = 0; $t < count($categorias); $t++) {
                if ($selperfil[0][12] == $categorias[$t][0]) {
                    echo '<option value =' . $categorias[$t][0] . ' selected="selected">' . $categorias[$t][1] . '</option>';
                } else {
                    echo '<option value =' . $categorias[$t][0] . '>' . $categorias[$t][1] . '</option>';
                }
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
                if ($selperfil[0][14] == $clientes[$c][0]) {
                    echo '<option value =' . $clientes[$c][0] . ' selected="selected">' . $clientes[$c][5] . '</option>';
                } else {
                    echo '<option value =' . $clientes[$c][0] . '>' . $clientes[$c][5] . '</option>';
                }
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
                if ($selperfil[0][16] == $agentes[$a][0]) {
                    echo '<option value =' . $agentes[$a][0] . ' selected="selected">' . $agentes[$a][3] . '</option>';
                } else {
                    echo '<option value =' . $agentes[$a][0] . '>' . $agentes[$a][3] . '</option>';
                }
            }
            ?>
        </select>                                                            
    </div>  

</div>
<div class="form-group"> 
    <label for="inputSegundaNacionalidad" class="col-sm-2 control-label" >Pais residencia</label>
    <div class="col-sm-4">
        <select name="idresidencia" size="1" maxlength="2" placeholder="Pais residencia" class="form-control" id="inputResidencia" onchange="cambiarCiudades()">
            <option value ='' selected="selected"></option>
            <?php
            for ($n2 = 0; $n2 < count($nacionalidades); $n2++) {
                if ($selperfil[0][18] == $nacionalidades[$n2][0]) {
                    echo '<option value =' . $nacionalidades[$n2][0] . ' selected="selected">' . $nacionalidades[$n2][1] . '</option>';
                } else {
                    echo '<option value =' . $nacionalidades[$n2][0] . '>' . $nacionalidades[$n2][1] . '</option>';
                }
            }
            ?>
        </select>                        
    </div>

    <label for="inputSegundaNacionalidad" class="col-sm-2 control-label" style="display: none;">Ciudad residencia</label>
    <div class="col-sm-4" style="display: none;">
        <select name="idciudad" size="1" maxlength="2" placeholder="Ciudad residencia" class="form-control" id="inputCiudad" >
            <option value ='' selected="selected"></option>
            <?php
            for ($n2 = 0; $n2 < count($ciudades); $n2++) {
                if ($selperfil[0][20] == $ciudades[$n2][0]) {
                    echo '<option value =' . $ciudades[$n2][0] . ' selected="selected">' . $ciudades[$n2][1] . '</option>';
                } else {
                    echo '<option value =' . $ciudades[$n2][0] . '>' . $ciudades[$n2][1] . '</option>';
                }
            }
            ?>
        </select>                        
    </div>          

</div>                                    
<div class="form-group">
    <label for="inputCorreoAlternativo" class="col-sm-2 control-label">Correo Alternativo</label>
    <div class="col-sm-4">
        <input type="text" class="form-control" id="inputalternatemail" name="alternatemail" placeholder="correo alternativo" value="<?php echo $selperfil[0][22] ?>"/>
    </div>
    <label for="inputCorreoAsistente" class="col-sm-2 control-label">Correo Asistente</label>
    <div class="col-sm-4">
        <input type="text" class="form-control" id="inputasistenteemail" name="asistenteemail" placeholder="Correo asistente" value="<?php echo $selperfil[0][23] ?>"/>
    </div>
</div>                            

<div class="form-group">
    <label for="inputCorreoCopia" class="col-sm-2 control-label">Correo de Copia</label>
    <div class="col-sm-4">
        <input type="text" class="form-control" id="inputCopyemail" name="copyemail" placeholder="correo de copia" value="<?php echo $selperfil[0][24] ?>"/>
    </div>
</div>   



<div class="form-group">
    <label for="inputCorreoAlternativo" class="col-sm-2 control-label">Tipo asiento</label>
    <div class="col-sm-4">
        <input type="text" class="form-control" id="inputIdasiento" name="idasiento" placeholder="Tipo asiento" value="<?php echo $selperfil[0][25] ?>"/>
    </div>
    <label for="inputCorreoAsistente" class="col-sm-2 control-label">Comentario asiento</label>
    <div class="col-sm-4">
        <input type="text" class="form-control" id="inputComentarioasiento" name="comentarioasiento" placeholder="Comentario asiento" value="<?php echo $selperfil[0][26] ?>"/>
    </div>
</div>   

<div class="form-group">
    <label for="inputCorreoAlternativo" class="col-sm-2 control-label" style="color: red">*Fecha nacimiento</label>
    <div class="col-sm-4">
        <div class="input-group date">
            <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
            </div>
            <input type="text" required class="form-control pull-right datepicker" id="datepicker5" name="fechanacimiento" placeholder="fecha nacimiento" value="<?php echo $selperfil[0][27] ?>">
        </div>
    </div>
    <label for="inputCorreoAsistente" class="col-sm-2 control-label" style="color: red">*Lugar nacimiento</label>
    <div class="col-sm-4">
        <input type="text" required class="form-control" id="inputLugarnacimiento" name="lugarnacimiento" placeholder="Lugar nacimiento"  value="<?php echo $selperfil[0][28] ?>"  / >
    </div>


</div> 

<div class="form-group">


</div>





<div class="form-group">


</div>   

<div class="form-group">

    <label for="inputFoto" class="col-sm-2 control-label">Foto:</label><a class='btn btn-primary'  href="stdimagen.php?cat=1&ID=<?php echo $id ?>" target="_blank">Imagen actual</a><!--                                        <label for="inputFoto" class="col-sm-2 control-label">Fotografia</label>-->
    <div class="col-sm-4">
        <div id ="textbox">
            <input type="hidden" value="Buscar..."/>
            <input name="imagen" type="file"/>
        </div>
    </div>
</div>  