<?php

/*
 * Plataforma de reporteria de WebService.
 */

/**
 * Description of reporteria
 *
 * @author ArteyDesarrollo
 */
class Reporteria {
    
    public function tiempos_respuesta($idusuario, $idcliente = null) {
        include "config.php";
        try {
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);
            if ($idcliente == null){
                $sql = sprintf("SELECT t1.idsolicitud, t4.nombre as cliente, t1.fechacreacion, t2.fechacreacion, TIMEDIFF(t2.fechacreacion, t1.fechacreacion) as tiempo1, t2.fecha_auth, TIMEDIFF(t2.fecha_auth, t2.fechacreacion) as tiempo2, '' as boleto, concat(t3.nombres, ' ', t3.apellidos) as pasajero, t5.nombre as centrocosto, concat(t6.nombres, ' ', t6.apellidos) as agente from solicitudes t1 inner join reservas_oferta t2 on t2.idsolicitud = t1.idsolicitud inner join usuarios t3 on t3.idusuario = t1.idusuario inner join clientes t4 on t4.idcliente = t1.idcliente left join clientes_proyectos t5 on t5.idproyecto = t1.idproyecto inner join agentes t6 on t6.idagente = t2.idagente");
            } else { 
                $sql = sprintf("SELECT t1.idsolicitud, t4.nombre as cliente, t1.fechacreacion, t2.fechacreacion, TIMEDIFF(t2.fechacreacion, t1.fechacreacion) as tiempo1, t2.fecha_auth, TIMEDIFF(t2.fecha_auth, t2.fechacreacion) as tiempo2, '' as boleto, concat(t3.nombres, ' ', t3.apellidos) as pasajero, t5.nombre as centrocosto, concat(t6.nombres, ' ', t6.apellidos) as agente from solicitudes t1 inner join reservas_oferta t2 on t2.idsolicitud = t1.idsolicitud inner join usuarios t3 on t3.idusuario = t1.idusuario inner join clientes t4 on t4.idcliente = t1.idcliente left join clientes_proyectos t5 on t5.idproyecto = t1.idproyecto inner join agentes t6 on t6.idagente = t2.idagente WHERE t1.idcliente = '%d'",
                mysql_real_escape_string($idcliente)
                );
            }
            $result = mysql_query($sql);
            if(mysql_num_rows($result) > 0){
                for($i = 0; $i < mysql_num_rows($result); $i++) {
                    $filas = mysql_fetch_array($result);
                    $arrayretorno[$i] = $filas;
                    unset($filas);
                }
                mysql_close();
                $this->registrar_evento('Reporte tiempos de respuesta', $idusuario);
                return $arrayretorno;
            } else {
                $this->registrar_evento('Fallo de carga de reporte tiempos de respuesta, (user:'.$idusuario.')', $idusuario);
                mysql_close();
                return null;
            }
        }catch (Exception $ex){
            mysql_close();
            $this->registrar_error(': '.$idusuario, $ex, 'carrier_buscar', $idusuario);
            return $ex;
        }
    }        
    
    public function tiempos_respuesta_centro_costo($idusuario, $idcliente = null) {
        include "config.php";
        try {
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);
            $sql = sprintf("SELECT 
t1.centrocosto,
SEC_TO_TIME(AVG(TIME_TO_SEC(t1.tiempo1))) as respuestaagente, 
SEC_TO_TIME(AVG(TIME_TO_SEC(t1.tiempo2))) as respuestaautoriza, 
count(*) as ntransacciones
FROM VTiemposRespuesta t1
group by t1.centrocosto
order by t1.centrocosto
",
            mysql_real_escape_string($nombres)
            );
            mysql_query($sql);
            $result = mysql_insert_id();
            mysql_close();
            $this->registrar_evento('Registro de agentes'.$result, $idusuario);
            return $sql;
        }catch (Exception $ex){
            mysql_close();
            $this->registrar_error('Error en registro de agentes: '.$idusuario, $ex, 'agentes_registrar', $idusuario);
            return null;
        }        
    }
     
    public function agentes_modificar($idusuario, $idagente, $nombres, $apellidos, $cargo, $email, $activo, $fechaingreso ) {
        include "config.php";
        try {
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);
            $sql = sprintf("update agentes set nombres = '%s', apellidos = '%s', cargo = '%s', email = '%s', activo = '%d', fechaingreso = '%s' where idagente = '%d'",
            mysql_real_escape_string($nombres),
            mysql_real_escape_string($apellidos),
            mysql_real_escape_string($cargo),
            mysql_real_escape_string($email),
            mysql_real_escape_string($activo),
            mysql_real_escape_string($fechaingreso),
            mysql_real_escape_string($idagente)
            );
            mysql_query($sql);
            $result = mysql_insert_id();
            mysql_close();
            $this->registrar_evento('modificacion de agente '.$result, $idusuario);
            return $sql;
        }catch (Exception $ex){
            mysql_close();
            $this->registrar_error('Error en modificacion de agente: '.$idusuario, $ex, 'agentes_modificar', $idusuario);
            return null;
        }        
    }    
    
    public function agentes_eliminar($idusuario, $idagente) {
        include "config.php";
        try {
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);
            $sql = sprintf("delete from agentes where idagente = '%d'",
            mysql_real_escape_string($idagente)
            );
            mysql_query($sql);
            $result = mysql_insert_id();
            mysql_close();
            $this->registrar_evento('eliminar agente '.$result, $idusuario);
            return $sql;
        }catch (Exception $ex){
            mysql_close();
            $this->registrar_error('Error en eliminar agente: '.$idusuario, $ex, 'agentes_eliminar', $idusuario);
            return null;
        }        
    }        
    
    /*************************/
    
    

    /** Eventos de registro **/
    public function registrar_evento($descripcion, $idusuario){
        include "config.php";
        try{
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);
            $sql =  sprintf("insert into operacionesrg (descripcion, idusuario, fecha) values ('%s', '%d', now())",
                mysql_real_escape_string($descripcion),
                mysql_real_escape_string($idusuario)
            );
            $query = mysql_query($sql, $conex);
            mysql_close();
            if($query ==1){
                return "OK";                
            }else{
                return mysql_errno();
            }
        } catch(Exception $ex) {
            mysql_close();
            return $ex;
        }
    }
    
    public function registrar_error($descripcion, $path, $rutina, $idusuario){
        include "config.php";
        try{
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);
            $sql =  sprintf("insert into operacionesex (descripcion, path, rutina, idusuario, fecha) values ('%s', '%s', '%s', %d, now())",
                mysql_real_escape_string($descripcion),
                mysql_real_escape_string($path),
                mysql_real_escape_string($rutina),
                mysql_real_escape_string($idusuario)
            );
            $query = mysql_query($sql, $conex);
            if($query ==1){
                return "OK";
            }else{
                return mysql_errno();
            }
        } catch(Exception $ex) {
            mysql_close();
            return $ex;
        }
    }
    /*************************/    
    
    
}
