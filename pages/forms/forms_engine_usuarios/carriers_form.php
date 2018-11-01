<div class="form-group">
    <label for="inputNacionalidad" class="col-sm-2 control-label">Carrier</label>
    <div class="col-sm-4">
        <select name="idcarrier" size="1" maxlength="2" placeholder="carrier" class="form-control" id="inputCarrCarrier">
            <?php
            for ($n = 0; $n < count($carriers); $n++) {
                echo '<option value =' . $carriers[$n][0] . '>' . $carriers[$n][2] . ' - ' . $carriers[$n][1] . '</option>';
            }
            ?>
        </select>                        
    </div>
    <label for="inputPasaporte" class="col-sm-2 control-label">Numero viajero frecuente</label>
    <div class="col-sm-4">
        <input type="text" class="form-control" id="inputCarrNumero" name="numero" placeholder="numero viajero" />
    </div>
</div>


<div class="form-group">

    <label for="inputFechaEmision" class="col-sm-2 control-label">Fecha emisión</label>
    <div class="col-sm-4">
        <div class="input-group date">
            <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
            </div>
            <input type="text" class="form-control pull-right datepicker" id="inputCarrEmision" name="fecha_emision" placeholder="fecha emision" >
        </div>
    </div>
    <label for="inputFechaExpiracion" class="col-sm-2 control-label">Fecha expiración</label>
    <div class="col-sm-4">
        <div class="input-group date">
            <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
            </div>
            <input type="text" lang="en-001" class="form-control pull-right datepicker" id="inputCarrExpiracion" name="fecha_expiracion" placeholder="fecha expiracion" >
        </div>
    </div>
</div>  
<div class="form-group">
    <label for="inputPasaporte" class="col-sm-2 control-label">Millas</label>
    <div class="col-sm-4">
        <input type="text" class="form-control" id="inputCarrMillas" name="millas" placeholder="numero millas" />
    </div>
    <label for="inputPasaporte2" class="col-sm-2 control-label">Comentario</label>
    <div class="col-sm-4">
        <input type="text" class="form-control" id="inputCarrComentario" name="comentario" placeholder="Comentario" />
    </div>

</div>
<table id="tablePerfilCarriers" class="table table-sm table-bordered">
    <caption>Viajeros frecuentes</caption>
    <thead>
        <tr>
            <th>Carrier</th>
            <th>Numero</th>          
            <th>Millas</th>
            <th>Comentario</th>
            <th>Fecha emisión</th>          
            <th>Fecha expiración</th>
        </tr>
    </thead>
    <tbody>
        <?php
        //$selclientes = $obj->perfil_buscar_empresa($id);
        //if ($id <> 0 or $id == 0) {
        if (true) {
            for ($i = 0; $i < count($selperfil_carriers); $i++) {
                echo "<tr>";
                echo "<td>" . $selperfil_carriers[$i][2] . "</td>";
                echo "<td>" . $selperfil_carriers[$i][3] . "</td>";
                echo "<td>" . $selperfil_carriers[$i][6] . "</td>";
                echo "<td>" . $selperfil_carriers[$i][7] . "</td>";
                echo "<td>" . $selperfil_carriers[$i][4] . "</td>";
                echo "<td>" . $selperfil_carriers[$i][5] . "</td>";
                echo "<td>";
                echo "<button type='button' class='btn btn-warning' onclick='modificarCarrier(". $selperfil_carriers[$i][0] .")' >Modificar</button>";
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


 <div class="modal fade" id="perfilCarrier" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document" id="perfilusuariodialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Carrier</h4>
            </div>
            <div class="modal-body">
                
                <div class="row">
                    
                    <div class="col-md-12">
                        <div class="form-group">
                        <label for="inputNacionalidad" class="col-sm-2 control-label">Carrier</label>
                        <div class="col-sm-4">
                            <select name="idcarrier" size="1" maxlength="2" placeholder="carrier" class="form-control" id="inputCarrCarrierMod">
                                <?php
                                for ($n = 0; $n < count($carriers); $n++) {
                                    echo '<option value =' . $carriers[$n][0] . '>' . $carriers[$n][2] . ' - ' . $carriers[$n][1] . '</option>';
                                }
                                ?>
                            </select>                        
                        </div>
                        <label for="inputPasaporte" class="col-sm-2 control-label">Numero viajero frecuente</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="inputCarrNumeroMod" name="numero" placeholder="numero viajero" />
                        </div>
                    </div>


                    <div class="form-group">

                        <label for="inputFechaEmision" class="col-sm-2 control-label">Fecha emisión</label>
                        <div class="col-sm-4">
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control pull-right datepicker" id="inputCarrEmisionMod" name="fecha_emision" placeholder="fecha emision" >
                            </div>
                        </div>
                        <label for="inputFechaExpiracion" class="col-sm-2 control-label">Fecha expiración</label>
                        <div class="col-sm-4">
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" lang="en-001" class="form-control pull-right datepicker" id="inputCarrExpiracionMod" name="fecha_expiracion" placeholder="fecha expiracion" >
                            </div>
                        </div>
                    </div>  
                    <div class="form-group">
                        <label for="inputPasaporte" class="col-sm-2 control-label">Millas</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="inputCarrMillasMod" name="millas" placeholder="numero millas" />
                        </div>
                        <label for="inputPasaporte2" class="col-sm-2 control-label">Comentario</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="inputCarrComentarioMod" name="comentario" placeholder="Comentario" />
                        </div>

                    </div>
                        <input type="hidden"  class="form-control" id="inputCarrIdMod" name="id"  >
                        <input type="hidden"  class="form-control" id="idCarrPerfil" name="idperfil"  >
                    <hr>    
                    <div class="form-group">
                        <div class="col-sm-6">  
                            <button type='button' class='btn btn-warning' onclick='guardarCarrierMod()' >
                            Guardar Registro
                            </button>
                            <!-- button type="submit" class="btn btn-danger">Guardar Registro</button -->
                        </div>
                        <div class="col-sm-6"> 
                            <button type='button' class='btn btn-danger' onclick='guardarCarrierModInactivo()' >
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
