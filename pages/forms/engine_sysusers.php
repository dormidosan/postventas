 <?php 
                                //here we check whether a register is being inserted or modified
                            if ($_SESSION["mttosysusers"] == "N") {
                            ?>
                            
                                <div class="active tab-pane" id="agentesGeneral">    

                                    <div class="form-group">
                                        <label for="inputName" class="col-sm-2 control-label">Nombres</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="inputNombre" name="nombres4" placeholder="nombres" />
                                        </div>
                                        <label for="inputApellidos" class="col-sm-2 control-label">Apellidos</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="inputNombre" name="apellidos4" placeholder="apellidos" />
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="inputName" class="col-sm-2 control-label">Usuario</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="inputNombre" name="usuario4" placeholder="usuario" />
                                        </div>
                                        <label for="inputApellidos" class="col-sm-2 control-label">Password</label>
                                        <div class="col-sm-4">
                                            <input type="password" class="form-control" id="inputNombre" name="password4" placeholder="password" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                                        <div class="col-sm-4">
                                            <input type="email" class="form-control" id="inputemail" name="email4" placeholder="email" />
                                        </div>
                                        <label for="inputEmpresa" class="col-sm-2 control-label">Cargo</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="inputNombre" name="cargo_sysuser4" placeholder="Cargo del agente" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                                                    
                                        <label for="inputIntraCompany" class="col-sm-2 control-label">Activo</label>
                                        <div class="col-sm-4">
                                            <select name="sysuser_activo4" size="1" maxlength="2" class="form-control" id="inputIntraCompany">
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
                            } else if($_SESSION["mttosysusers"] == "M") {
                                $sysuser = $obj->sysusers_buscar($_SESSION["IDUSUARIO"],$id);
                                
                            ?>

                                <div class="active tab-pane" id="agentesGeneral">    

                                    <div class="form-group">
                                        <label for="inputName" class="col-sm-2 control-label">Nombres</label>
                                        <div class="col-sm-4">
                                            <input type="text"  class="form-control" id="inputNombre" name="nombres4"  value="<?php echo $sysuser[0][1] ?>" placeholder="nombres" />
                                        </div>
                                        <label for="inputApellidos" class="col-sm-2 control-label">Apellidos</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="inputNombre" name="apellidos4" value="<?php echo $sysuser[0][2] ?>" placeholder="apellidos" />
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="inputName" class="col-sm-2 control-label">Usuario</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="inputNombre" name="usuario4" value="<?php echo $sysuser[0][4] ?>"  placeholder="usuario" />
                                        </div>
                                        <label for="inputApellidos" class="col-sm-2 control-label">Password</label>
                                        <div class="col-sm-4">
                                            <input type="password" class="form-control" id="inputNombre" name="password4" value="<?php //echo $sysuser[0][5] ?>"  placeholder="password" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                                        <div class="col-sm-4">
                                            <input type="email" class="form-control" id="inputemail" name="email4" value="<?php echo $sysuser[0][6] ?>"  placeholder="email" />
                                        </div>
                                        <label for="inputEmpresa" class="col-sm-2 control-label">Cargo</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="inputNombre" name="cargo_sysuser4" value="<?php echo $sysuser[0][7] ?>"  placeholder="Cargo del agente" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                                                    
                                        <label for="inputIntraCompany" class="col-sm-2 control-label">Activo</label>
                                        <div class="col-sm-4">                                                                          
                                            <select name="sysuser_activo4" size="1" maxlength="2" class="form-control" id="exento2">
                                            <?php if($sysuser[0][9] == 0) { ?>
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