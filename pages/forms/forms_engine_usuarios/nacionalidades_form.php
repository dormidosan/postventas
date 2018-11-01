<div class="form-group">
    <label for="inputNacionalidad" class="col-sm-2 control-label">*Nacionalidad</label>
    <div class="col-sm-4">
        <select name="idnacionalidad" required size="1" maxlength="2" placeholder="primera nacionalidad" class="form-control" id="inputNACNacionalidad">
            <?php
            for ($n = 0; $n < count($nacionalidades); $n++) {
                echo '<option value =' . $nacionalidades[$n][0] . '>' . $nacionalidades[$n][1] . '</option>';
            }
            ?>
        </select>                        
    </div>
    <label for="inputPasaporte" class="col-sm-2 control-label">Secuencia Pasaporte</label>
    <div class="col-sm-4">
        <input type="text"  class="form-control" id="inputNACSecuencia" name="secuencia" placeholder="secuencia pasaporte" />
    </div>
</div>
<div class="form-group">
    <label for="inputPasaporte" class="col-sm-2 control-label">*Numero Pasaporte</label>
    <div class="col-sm-4">
        <input type="text" required class="form-control" id="inputNACPasaporte" name="pasaporte" placeholder="numero pasaporte" />
    </div>
    <label for="inputPasaporte2" class="col-sm-2 control-label">*Tipo Pasaporte</label>
    <div class="col-sm-4">
        <input type="text" required class="form-control" id="inputNACPasaporteTipo" name="tipo" placeholder="tipo pasaporte" />
    </div>

</div>

<div class="form-group">

    <label for="inputFechaEmision" class="col-sm-2 control-label">*Fecha emisión</label>
    <div class="col-sm-4">
        <div class="input-group date">
            <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
            </div>
            <input type="text" required class="form-control pull-right datepicker" id="inputNACEmision" name="fecha_emision" placeholder="fecha emision" >
        </div>
    </div>
    <label for="inputFechaExpiracion" class="col-sm-2 control-label">*Fecha expiración</label>
    <div class="col-sm-4">
        <div class="input-group date">
            <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
            </div>
            <input type="text" required lang="en-001" class="form-control pull-right datepicker" id="inputNACExpiracion" name="fecha_expiracion" placeholder="fecha expiracion" >
        </div>
    </div>
</div>                                

<table id="tablePerfilNacionalidades" class="table table-sm table-bordered">
    <caption>Nacionalidades</caption>
    <thead>
        <tr>
            <th>Pais</th>
            <th>Documento</th>  
            <th>Tipo</th>
            <th>Fecha Expedicion</th>
            <th>Fecha Vencimiento</th>
            <th>Secuencia pasaporte</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
        //$selclientes = $obj->perfil_buscar_empresa($id);
        //if ($id <> 0 or $id == 0) {
        if (true) {
            for ($i = 0; $i < count($selperfil_nacionalidades); $i++) {
                echo "<tr>";
                echo "<td>" . $selperfil_nacionalidades[$i][1] . "</td>";
                echo "<td>" . $selperfil_nacionalidades[$i][3] . "</td>";
                echo "<td>" . $selperfil_nacionalidades[$i][4] . "</td>";
                echo "<td>" . $selperfil_nacionalidades[$i][5] . "</td>";
                echo "<td>" . $selperfil_nacionalidades[$i][6] . "</td>";
                echo "<td>" . $selperfil_nacionalidades[$i][8] . "</td>";
                echo "<td>";
                echo "<button type='button' class='btn btn-warning' onclick='modificarNacionalidad(". $selperfil_nacionalidades[$i][0] .")' >Modificar</button>";
                echo "</td>";
                echo "</tr>";
            }
        }
        ?>

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

 <div class="modal fade" id="perfilNacionalidad" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document" id="perfilusuariodialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Nacionalidad</h4>
            </div>
            <div class="modal-body">
                
                <div class="row">
                    
                    <div class="col-md-12">
                        <div class="form-group">
                        <label for="inputNacionalidad" class="col-sm-2 control-label">*Nacionalidad</label>
                        <div class="col-sm-4">
                            <select name="idnacionalidad" required size="1" maxlength="2" placeholder="primera nacionalidad" class="form-control" id="inputNACNacionalidadMod">
                                <?php
                                for ($n = 0; $n < count($nacionalidades); $n++) {
                                    echo '<option value =' . $nacionalidades[$n][0] . '>' . $nacionalidades[$n][1] . '</option>';
                                }
                                ?>
                            </select>                        
                        </div>
                        <label for="inputPasaporte" class="col-sm-2 control-label">Secuencia Pasaporte</label>
                        <div class="col-sm-4">
                            <input type="text"  class="form-control" id="inputNACSecuenciaMod" name="secuencia" placeholder="secuencia pasaporte" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPasaporte" class="col-sm-2 control-label">*Numero Pasaporte</label>
                        <div class="col-sm-4">
                            <input type="text" required class="form-control" id="inputNACPasaporteMod" name="pasaporte" placeholder="numero pasaporte" />
                        </div>
                        <label for="inputPasaporte2" class="col-sm-2 control-label">*Tipo Pasaporte</label>
                        <div class="col-sm-4">
                            <input type="text" required class="form-control" id="inputNACPasaporteTipoMod" name="tipo" placeholder="tipo pasaporte" />
                        </div>

                    </div>

                    <div class="form-group">

                        <label for="inputFechaEmision" class="col-sm-2 control-label">*Fecha emisión</label>
                        <div class="col-sm-4">
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" required class="form-control pull-right datepicker" id="inputNACEmisionMod" name="fecha_emision" placeholder="fecha emision" >
                            </div>
                        </div>
                        <label for="inputFechaExpiracion" class="col-sm-2 control-label">*Fecha expiración</label>
                        <div class="col-sm-4">
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" required lang="en-001" class="form-control pull-right datepicker" id="inputNACExpiracionMod" name="fecha_expiracion" placeholder="fecha expiracion" >
                            </div>
                        </div>
                    </div>   
                        <input type="hidden"  class="form-control" id="inputNACIdMod" name="id"  >
                        <input type="hidden"  class="form-control" id="idNACPerfil" name="idperfil"  >
                    <hr>    
                    <div class="form-group">
                        <div class="col-sm-6"> 
                            <button type='button' class='btn btn-warning' onclick='guardarNacionalidadMod()' >
                            Guardar Registro
                            </button>
                            <!-- button type="submit" class="btn btn-danger">Guardar Registro</button -->
                        </div>
                        <div class="col-sm-6"> 
                            <button type='button' class='btn btn-danger' onclick='guardarNacionalidadModInactivo()' >
                            Inactivar Registro(Fuera de uso)
                            </button>
                            <!-- button type="submit" class="btn btn-danger">Guardar Registro</button -->
                        </div>
                    </div>  
                  
                </div>
              </div>
            </div>
            <div class="modal-footer">
                
            </div>
        </div>
    </div>
</div>


