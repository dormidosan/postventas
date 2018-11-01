

<?php 
   //here we check whether a register is being inserted or modified
   if ($_SESSION["mttousuarios"] == "N") {
   ?>
<div class="active tab-pane" id="clientesGeneral">
   <div class="form-group">
      <label for="inputName" class="col-sm-2 control-label">Nombre</label>
      <div class="col-sm-4">
         <input type="text" class="form-control" id="nombres2" name="nombres2" placeholder="nombres" />
      </div>
      <label for="inputEmpresa" class="col-sm-2 control-label">Tipo Cliente</label>
      <div class="col-sm-4">
         <select name="tipo_cliente2"  size="1" maxlength="2" class="form-control" id="tipo_cliente2">
         <?php 
            for($c = 0; $c < count($tipo_cliente); $c++){
                echo '<option value ='.$tipo_cliente[$c][0].'>'.$tipo_cliente[$c][1].'</option>';
            }
            ?>
         </select>
      </div>
   </div>
   <div class="form-group">
      <label for="inputEmpresa" class="col-sm-2 control-label">Catergoria</label>
      <div class="col-sm-4">
         <select name="categoria_cliente2"  size="1" maxlength="2" class="form-control" id="categoria_cliente2">
         <?php 
            for($c = 0; $c < count($categoria_cliente); $c++){
                echo '<option value ='.$categoria_cliente[$c][0].'>'.$categoria_cliente[$c][1].'</option>';
            }
            ?>
         </select>
      </div>
      <label for="inputUsuario" class="col-sm-2 control-label">Direccion</label>
      <div class="col-sm-4">
         <input type="text" class="form-control" id="direccion2" name="direccion2" placeholder="Direccion" />
      </div>
   </div>
   <hr>
   <div class="form-group">
      <label for="inputNumeroEmergencia" class="col-sm-2 control-label">Telefono</label>
      <div class="col-sm-4">
         <input type="tel" class="form-control" id="telefono2" name="telefono2" placeholder="Numero telefono" />
      </div>
      <label for="inputNumeroEmergencia" class="col-sm-2 control-label">Fax</label>
      <div class="col-sm-4">
         <input type="tel" class="form-control" id="fax2" name="fax2" placeholder="Fax" />
      </div>
   </div>
   <div class="form-group">
      <label for="inputUsuario" class="col-sm-2 control-label">Razon social</label>
      <div class="col-sm-4">
         <input type="text" class="form-control" id="razon_social2" name="razon_social2" placeholder="Razon social" />
      </div>
      <label for="inputPassword" class="col-sm-2 control-label">Numero fiscal</label>
      <div class="col-sm-4">
         <input type="text" class="form-control" id="numero_fiscal2" name="numero_fiscal2" placeholder="Numero fiscal" />
      </div>
   </div>
   <hr>
   <div class="form-group">
      <label for="inputUsuario" class="col-sm-2 control-label">Exento</label>
      <div class="col-sm-4">
         <select name="exento2" size="1" maxlength="2" class="form-control" id="exento2">
            <option value = "1">Si</option>
            <option value = "0">No</option>
         </select>
      </div>
      <label for="inputNumeroEmergencia" class="col-sm-2 control-label">Dias de credito</label>
      <div class="col-sm-4">
         <input type="number" step="1" class="form-control" id="dias_credito2" name="dias_credito2" placeholder="Dias credito" />
      </div>
   </div>
   <div class="form-group">
      <label for="inputUsuario" class="col-sm-2 control-label">Monto de credito</label>
      <div class="col-sm-4">
         <input type="number" min="0.00" step="0.01"  lang="en-001" class="form-control" id="monto_credito2" name="monto_credito2" placeholder="Monto credito" />
      </div>
      <label for="inputIntraCompany" class="col-sm-2 control-label">Activo</label>
      <div class="col-sm-4">
         <select name="cliente_activo2" size="1" maxlength="2" class="form-control" id="cliente_activo2">
            <option value = "1">Si</option>
            <option value = "0">No</option>
         </select>
      </div>
   </div>
   <div class="form-group">
      <label for="inputName" class="col-sm-2 control-label">Observaciones</label>
      <div class="col-sm-10">
         <input type="text" class="form-control" id="observaciones2" name="observaciones2" placeholder="Observaciones" />
      </div>
   </div>
</div>
<div class="tab-pane" id="clientesInfoViajes">
</div>
<div class="tab-pane" id="clientesAcercaDe">
</div>
<?php    
   } else if($_SESSION["mttousuarios"] == "M") {
       $selcliente = $obj->cliente_buscar($_SESSION['USERDAT'][0],$id);
       
   ?>
<div class="active tab-pane" id="clientesGeneral">
   <div class="form-group">
      <label for="inputName" class="col-sm-2 control-label">Nombre</label>
      <div class="col-sm-4">
         <input type="text" class="form-control" id="nombres2" name="nombres2" placeholder="nombres" value="<?php echo $selcliente[0][5] ?>" />
      </div>
      <label for="inputEmpresa" class="col-sm-2 control-label">Tipo Cliente</label>
      <div class="col-sm-4">
         <select name="tipo_cliente2"  size="1" maxlength="2" class="form-control" id="tipo_cliente2">
         <?php 
             for($t = 0; $t < count($tipo_cliente); $t++){
                 if($selcliente[0][1] == $tipo_cliente[$t][0]) {
                     echo '<option value ='.$tipo_cliente[$t][0].' selected="selected">'.$tipo_cliente[$t][1].'</option>';
                 } else {
                     echo '<option value ='.$tipo_cliente[$t][0].'>'.$tipo_cliente[$t][1].'</option>';
                 }
             }
         ?> 
         </select>
      </div>
   </div>
   <div class="form-group">
      <label for="inputEmpresa" class="col-sm-2 control-label">Catergoria</label>
      <div class="col-sm-4">
         <select name="categoria_cliente2"  size="1" maxlength="2" class="form-control" id="categoria_cliente2">
  
            <?php 
             for($t = 0; $t < count($categoria_cliente); $t++){
                 if($selcliente[0][3] == $categoria_cliente[$t][0]) {
                     echo '<option value ='.$categoria_cliente[$t][0].' selected="selected">'.$categoria_cliente[$t][1].'</option>';
                 } else {
                     echo '<option value ='.$categoria_cliente[$t][0].'>'.$categoria_cliente[$t][1].'</option>';
                 }
             }
         ?> 
         </select>
      </div>
      <label for="inputUsuario" class="col-sm-2 control-label">Direccion</label>
      <div class="col-sm-4">
         <input type="text" class="form-control" id="direccion2" name="direccion2" placeholder="Direccion" value="<?php echo $selcliente[0][8] ?>" />
      </div>
   </div>
   <hr>
   <div class="form-group">
      <label for="inputNumeroEmergencia" class="col-sm-2 control-label">Telefono</label>
      <div class="col-sm-4">
         <input type="tel" class="form-control" id="telefono2" name="telefono2" placeholder="Numero telefono" value="<?php echo $selcliente[0][6] ?>" />
      </div>
      <label for="inputNumeroEmergencia" class="col-sm-2 control-label">Fax</label>
      <div class="col-sm-4">
         <input type="tel" class="form-control" id="fax2" name="fax2" placeholder="Fax" value="<?php echo $selcliente[0][7] ?>" />
      </div>
   </div>
   <div class="form-group">
      <label for="inputUsuario" class="col-sm-2 control-label">Razon social</label>
      <div class="col-sm-4">
         <input type="text" class="form-control" id="razon_social2" name="razon_social2" placeholder="Razon social" value="<?php echo $selcliente[0][9] ?>" />
      </div>
      <label for="inputPassword" class="col-sm-2 control-label">Numero fiscal</label>
      <div class="col-sm-4">
         <input type="text" class="form-control" id="numero_fiscal2" name="numero_fiscal2" placeholder="Numero fiscal" value="<?php echo $selcliente[0][10] ?>" />
      </div>
   </div>
   <hr>
   <div class="form-group">
      <label for="inputUsuario" class="col-sm-2 control-label">Exento</label>
      <div class="col-sm-4">
         <select name="exento2" size="1" maxlength="2" class="form-control" id="exento2">
         <?php if($selcliente[0][12] == 0) { ?>
             <option value ='0' selected="selected">No</option>;
             <option value ='1'>Si</option>;    
         <?php } else { ?>
             <option value ='0'>No</option>;
             <option value ='1' selected="selected">Si</option>;    
         <?php } ?>  
         </select>
      </div>
      <label for="inputNumeroEmergencia" class="col-sm-2 control-label">Dias de credito</label>
      <div class="col-sm-4">
         <input type="number" step="1" class="form-control" id="dias_credito2" name="dias_credito2" placeholder="Dias credito" value="<?php echo $selcliente[0][15] ?>" />
      </div>
   </div>
   <div class="form-group">
      <label for="inputUsuario" class="col-sm-2 control-label">Monto de credito</label>
      <div class="col-sm-4">
         <input type="number" min="0.00" step="0.01"  lang="en-001" class="form-control" id="monto_credito2" name="monto_credito2" placeholder="Monto credito" value="<?php echo $selcliente[0][16] ?>" />
      </div>
      <label for="inputIntraCompany" class="col-sm-2 control-label">Activo</label>
      <div class="col-sm-4">
         <select name="cliente_activo2" size="1" maxlength="2" class="form-control" id="cliente_activo2">
         <?php if($selcliente[0][11] == 0) { ?>
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
      <label for="inputName" class="col-sm-2 control-label">Observaciones</label>
      <div class="col-sm-10">
         <input type="text" class="form-control" id="observaciones2" name="observaciones2" placeholder="Observaciones" value="<?php echo $selcliente[0][14] ?>" />
      </div>
   </div>
</div>
<div class="tab-pane" id="clientesInfoViajes">
</div>
<div class="tab-pane" id="clientesAcercaDe">
</div>
<?php
   }
   ?>

