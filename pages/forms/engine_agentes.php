 <?php 
                                //here we check whether a register is being inserted or modified
                            if ($_SESSION["mttousuarios"] == "N") {
                            ?>
                            
                                <div class="active tab-pane" id="agentesGeneral">    

                                    <div class="form-group">
                                        <label for="inputName" class="col-sm-2 control-label">Nombres</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="inputNombre" name="nombres3" placeholder="nombres" />
                                        </div>
                                        <label for="inputApellidos" class="col-sm-2 control-label">Apellidos</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="inputNombre" name="apellidos3" placeholder="apellidos" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                                        <div class="col-sm-4">
                                            <input type="email" class="form-control" id="inputemail" name="email3" placeholder="email" />
                                        </div>
                                        <label for="inputEmpresa" class="col-sm-2 control-label">Cargo</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="inputNombre" name="cargo_agente3" placeholder="Cargo del agente" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                                                    
                                        <label for="inputIntraCompany" class="col-sm-2 control-label">Activo</label>
                                        <div class="col-sm-4">
                                            <select name="agente_activo3" size="1" maxlength="2" class="form-control" id="inputIntraCompany">
                                                <option value = "0">No</option>
                                                <option value = "1">Si</option>
                                            </select>
                                        </div>                              
                                    </div>

</div>  
                                <div class="tab-pane" id="agentesInfoViajes">

                                </div>

                                <div class="tab-pane" id="agentesAcercaDe">

                                </div>                             
                             
                            <?php    
                            } else if($_SESSION["mttousuarios"] == "M") {
                                $selagente = $obj->agentes_buscar($_SESSION['USERDAT'][0],$id);
                                
                            ?>

                                <div class="active tab-pane" id="agentesGeneral">    

                                    <div class="form-group">
                                        <label for="inputName" class="col-sm-2 control-label">Nombres </label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="inputNombre3" name="nombres3" placeholder="nombres" value="<?php echo $selagente[0][1] ?>" />
                                        </div>
                                        <label for="inputApellidos" class="col-sm-2 control-label">Apellidos</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="inputapellido3" name="apellidos3" placeholder="apellidos" value="<?php echo $selagente[0][2] ?>" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                                        <div class="col-sm-4">
                                            <input type="email" class="form-control" id="inputemail3" name="email3" placeholder="email" value="<?php echo $selagente[0][5] ?>" />
                                        </div>
                                        <label for="inputEmpresa" class="col-sm-2 control-label">Cargo</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="inputCargo3" name="cargo_agente3" placeholder="Cargo del agente" value="<?php echo $selagente[0][4] ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                                                    
                                        <label for="inputIntraCompany" class="col-sm-2 control-label">Activo</label>
                                        <div class="col-sm-4">
                                            <select name="agente_activo3" size="1" maxlength="2" class="form-control" id="inputActivo3">
                                                <?php if($selagente[0][6] == 0) { ?>
                                                    <option value ='0' selected="selected">No</option>;
                                                    <option value ='1'>Si</option>;    
                                                <?php } else { ?>
                                                    <option value ='0'>No</option>;
                                                    <option value ='1' selected="selected">Si</option>;    
                                                <?php } ?>                                                
                                            </select>
                                        </div>                              
                                    </div>
</div> 

                                <div class="tab-pane" id="agentesInfoViajes">

                                </div>

                                <div class="tab-pane" id="agentesAcercaDe">

                                </div>   
                              
                            <?php
                            }
                            ?> 