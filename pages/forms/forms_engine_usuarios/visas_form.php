<div class="form-group">
    <label for="inputNacionalidad" class="col-sm-2 control-label">Pais pasaporte</label>
    <div class="col-sm-4">
        <select name="idnacionalidad" size="1" maxlength="2" placeholder="pais pasaporte" class="form-control" id="inputVISANacionalidad">
            <?php
            for ($n = 0; $n < count($selperfil_nacionalidades); $n++) {
                echo '<option value =' . $selperfil_nacionalidades[$n][0] . '>' . $selperfil_nacionalidades[$n][1] . ' * P ' . $selperfil_nacionalidades[$n][3] . ' * S ' . $selperfil_nacionalidades[$n][8] . '</option>';
            }
            ?>
        </select>                        
    </div>
    <label for="inputPaisVisa" class="col-sm-2 control-label">Pais VISA</label>
    <div class="col-sm-4">
        <select name="idpaisvisa" size="1" maxlength="2" placeholder="pais visa" class="form-control" id="inputVISAPaisVisa">
            <?php
            for ($n = 0; $n < count($nacionalidades); $n++) {
                echo '<option value =' . $nacionalidades[$n][0] . '>' . $nacionalidades[$n][1] . '</option>';
            }
            ?>
        </select>                        
    </div>
</div>
<div class="form-group">
    <label for="inputPasaporte" class="col-sm-2 control-label">Numero VISA</label>
    <div class="col-sm-4">
        <input type="text" class="form-control" id="inputVISAVisa" name="visa" placeholder="numero VISA" />
    </div>
    <label for="inputPasaporte2" class="col-sm-2 control-label">Tipo VISA</label>
    <div class="col-sm-4">
        <input type="text" class="form-control" id="inputVISATipo" name="tipo" placeholder="tipo VISA" />
    </div>

</div>

<div class="form-group">

    <label for="inputFechaEmision" class="col-sm-2 control-label">Fecha emisión</label>
    <div class="col-sm-4">
        <div class="input-group date">
            <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
            </div>
            <input type="text" class="form-control pull-right datepicker" id="inputVISAEmision" name="fecha_emision" placeholder="fecha emision" >
        </div>
    </div>
    <label for="inputFechaExpiracion" class="col-sm-2 control-label">Fecha expiración</label>
    <div class="col-sm-4">
        <div class="input-group date">
            <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
            </div>
            <input type="text" lang="en-001" class="form-control pull-right datepicker" id="inputVISAExpiracion" name="fecha_expiracion" placeholder="fecha expiracion" >
        </div>
    </div>
</div>  
<div class="form-group">

    <label for="inputComentario" class="col-sm-2 control-label">Comentario</label>
    <div class="col-sm-4">
        <input type="text" class="form-control" id="inputVISAComentario" name="comentario" placeholder="Comentario" />
    </div>
    
</div>  

<table id="tablePerfilVisas" class="table table-sm table-bordered">
    <caption>Visas</caption>
    <thead>
        <tr>
            <th>Pais visa</th>
            <th>Pasaporte visado</th>          
            <th>Tipo visa</th>
            <th>Numero visa</th>
            <th>Fecha emisión</th>          
            <th>Fecha expiración</th>
            <th>Comentario</th>
        </tr>
    </thead>
    <tbody>
        <?php
        //$selclientes = $obj->perfil_buscar_empresa($id);
        //if ($id <> 0 or $id == 0) {
        if (true) {
            for ($i = 0; $i < count($selperfil_visas); $i++) {
                echo "<tr>";
                echo "<td>" . $selperfil_visas[$i][3] . "</td>";
                echo "<td>" . $selperfil_visas[$i][2] . "</td>";
                echo "<td>" . $selperfil_visas[$i][4] . "</td>";
                echo "<td>" . $selperfil_visas[$i][5] . "</td>";
                echo "<td>" . $selperfil_visas[$i][6] . "</td>";
                echo "<td>" . $selperfil_visas[$i][7] . "</td>";
                echo "<td>" . $selperfil_visas[$i][10] . "</td>";
                echo "<td>";
                echo "<button type='button' class='btn btn-warning' onclick='modificarVisa(". $selperfil_visas[$i][0] .")' >Modificar</button>";
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
<div class="modal fade" id="perfilVisa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document" id="perfilusuariodialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Visa</h4>
            </div>
            <div class="modal-body">
                
                <div class="row">
                    
                    <div class="col-md-12">
                        
                        <div class="form-group">
                            
                            <label for="inputNacionalidad" class="col-sm-2 control-label">Pais pasaporte</label>
                            <div class="col-sm-4">
                                <select name="idnacionalidad" size="1" maxlength="2" placeholder="pais pasaporte" class="form-control" id="inputVISANacionalidadMod">
                                    <?php
                                    for ($n = 0; $n < count($selperfil_nacionalidades); $n++) {
                                        echo '<option value =' . $selperfil_nacionalidades[$n][0] . '>' . $selperfil_nacionalidades[$n][1] . ' - ' . $selperfil_nacionalidades[$n][3] . ' - ' . $selperfil_nacionalidades[$n][2] . '</option>';
                                    }
                                    ?>
                                </select>                        
                            </div>
                            <label for="inputPaisVisa" class="col-sm-2 control-label">Pais VISA</label>
                            <div class="col-sm-4">
                                <select name="idpaisvisa" size="1" maxlength="2" placeholder="pais visa" class="form-control" id="inputVISAPaisVisaMod">
                                    <?php
                                    for ($n = 0; $n < count($nacionalidades); $n++) {
                                        echo '<option value =' . $nacionalidades[$n][0] . '>' . $nacionalidades[$n][1] . '</option>';
                                    }
                                    ?>
                                </select>                        
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPasaporte" class="col-sm-2 control-label">Numero VISA</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="inputVISAVisaMod" name="visa" placeholder="numero VISA" />
                            </div>
                            <label for="inputPasaporte2" class="col-sm-2 control-label">Tipo VISA</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="inputVISATipoMod" name="tipo" placeholder="tipo VISA" />
                            </div>

                        </div>

                        <div class="form-group">

                            <label for="inputFechaEmision" class="col-sm-2 control-label">Fecha emisión</label>
                            <div class="col-sm-4">
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right datepicker" id="inputVISAEmisionMod" name="fecha_emision" placeholder="fecha emision" >
                                </div>
                            </div>
                            <label for="inputFechaExpiracion" class="col-sm-2 control-label">Fecha expiración</label>
                            <div class="col-sm-4">
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" lang="en-001" class="form-control pull-right datepicker" id="inputVISAExpiracionMod" name="fecha_expiracion" placeholder="fecha expiracion" >
                                </div>
                            </div>
                        </div>
                        <div class="form-group">

                            <label for="inputComentario" class="col-sm-2 control-label">Comentario</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="inputVISAComentarioMod" name="comentario" placeholder="Comentario" />
                            </div>
    
                        </div>  
                        
                        
                        <input type="hidden"  class="form-control" id="inputVISAIdMod" name="id"  >
                        <input type="hidden"  class="form-control" id="idVISAPerfil" name="idperfil"  >
                    <hr>    
                    <div class="form-group">
                        <div class="col-sm-6"> 
                            <button type='button' class='btn btn-warning' onclick='guardarVisaMod()' >
                            Guardar Registro
                            </button>
                            <!-- button type="submit" class="btn btn-danger">Guardar Registro</button -->
                        </div>
                        <div class="col-sm-6"> 
                            <button type='button' class='btn btn-danger' onclick='guardarVisaModInactivo()' >
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