<?php
  
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Operaciones {
  
    /* Consultas básicas */
    public function usuario_login($usuario, $password, $idusuario = 0) {
        include "config.php";
        try {

            $conex = mysql_connect($server, $user, $pass);
            if ($conex){
                mysql_select_db($base, $conex);
            $sql = sprintf("select idusuario, last_login from usuarios where usuario = '%s' and password = md5('%s')",
            //$sql = sprintf("select idusuario, idcategoria, usuario, nombres, apellidos, cargo, email, idcliente, last_login from usuarios where usuario = '%s' and password = md5('%s')",
            mysql_real_escape_string($usuario),
            mysql_real_escape_string($password)
            );
            $result = mysql_query($sql);
            if(mysql_num_rows($result) > 0){
                $this->registrar_evento('Login de usuario '.$usuario, $idusuario);
                for($i = 0; $i < mysql_num_rows($result); $i++) {
                    $filas = mysql_fetch_array($result);
                    $arrayretorno[$i] = $filas;
                    unset($filas);
                }
                mysql_close();
                return $arrayretorno;
            } else {
                $this->registrar_evento('Login Fallido, (user:'.$usuario.', pass: '.$password.')', $idusuario);
                mysql_close();
                return null;
            }
            }else{
                return null;
            }
            
        }catch (Exception $ex){
            mysql_close();
            $this->registrar_error('Busqueda de info de usuario: '.$idusuario, $ex, 'usuario_buscar', $idusuario);
            return null; //debe retornar null
            //return $ex;
        }
    }
    
    public function usuario_perfil($idusuario) {
        include "config.php";
        if($server == '') {
            include "../config.php";
        }
        try {
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);
            //$sql = sprintf("select t1.idusuario, t1.idcategoria, t2.nombre as categoria, t1.usuario, t1.nombres, t1.apellidos, concat(t1.nombres,' ',t1.apellidos) as fullname, t1.cargo, t1.email, t1.idcliente, t3.nombre as nombrecliente, t1.idagente, concat(t4.nombres, ' ', t4.apellidos) as agente, t1.last_login from usuarios t1 left join usuarios_categoria t2 on t1.idcategoria = t2.idcategoria left join clientes t3 on t3.idcliente = t1.idcliente left join agentes t4 on t4.idagente = t1.idagente where t1.idusuario = '%d'",
            $sql = sprintf("SELECT t1.idusuario, t1.idcategoria, t2.nombre AS categoria, t1.usuario, t1.nombres, t1.apellidos, CONCAT( t1.nombres,  ' ', t1.apellidos ) AS fullname, t1.cargo, t1.email, t1.idcliente, t3.nombre AS nombrecliente, t1.idagente, CONCAT( t4.nombres,  ' ', t4.apellidos ) AS agente, t1.last_login, t1.idempleado, t1.idnacionalidad1, t5.pais AS nacionalidad1, t1.npasaporte1, t1.pass1fechavenc, t1.idnacionalidad2, t6.pais AS nacionalidad2, t1.npasaporte2, t1.pass2fechavenc, visaamericana, visafechavenc, t1.alternatemail, t1.intracompany, t1.fecharegistro , t1.idresidencia,t7.pais as residencia  FROM usuarios t1 LEFT JOIN usuarios_categoria t2 ON t1.idcategoria = t2.idcategoria LEFT JOIN clientes t3 ON t3.idcliente = t1.idcliente LEFT JOIN agentes t4 ON t4.idagente = t1.idagente LEFT JOIN oper_nacionalidades t5 ON t5.idnacionalidad = t1.idnacionalidad1 LEFT JOIN oper_nacionalidades t6 ON t6.idnacionalidad = t1.idnacionalidad2 LEFT JOIN oper_nacionalidades t7 ON t7.idnacionalidad = t1.idresidencia where t1.idusuario = '%d'", 
            mysql_real_escape_string($idusuario)
            );
            $result = mysql_query($sql);
            if(mysql_num_rows($result) > 0){
                for($i = 0; $i < mysql_num_rows($result); $i++) {
                    $filas = mysql_fetch_array($result);
                    $arrayretorno[$i] = $filas;
                    unset($filas);
                }
                mysql_close();
                $this->registrar_evento('Carga de perfil', $idusuario);
                return $arrayretorno;
            } else {
                $this->registrar_evento('Fallo de carga de perfil, (user:'.$idusuario.')', $idusuario);
                mysql_close();
                return null;
            }
        }catch (Exception $ex){
            mysql_close();
            $this->registrar_error(': '.$idusuario, $ex, 'usuario_buscar', $idusuario);
            return $ex;
        }
    }
   
    public function usuario_autorizaciones($idusuario) {
        include "config.php";
        try {
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);
            $sql = sprintf("SELECT t1.idusuario, t2.email, t1.autonomo, t1.idnivel1, t3.email as email1, t1.idnivel2, t4.email as email2, t1.idnivel3, t5.email as email3, t6.email as mailagente, t2.alternatemail, t2.asistenteemail, t2.copyemail FROM usuarios_autorizaciones t1 left join usuarios t2 on t2.idusuario = t1.idusuario left join usuarios t3 on t3.idusuario = t1.idnivel1 left join usuarios t4 on t4.idusuario = t1.idnivel2 left join usuarios t5 on t5.idusuario = t1.idnivel3 left join agentes t6 on t6.idagente = t2.idagente WHERE t1.idusuario = '%d'",
            mysql_real_escape_string($idusuario)
            );
            $result = mysql_query($sql);
            if(mysql_num_rows($result) > 0){
                for($i = 0; $i < mysql_num_rows($result); $i++) {
                    $filas = mysql_fetch_array($result);
                    $arrayretorno[$i] = $filas;
                    unset($filas);
                }
                mysql_close();
                $this->registrar_evento('Carga de autorizaciones', $idusuario);
                return $arrayretorno;
            } else {
                $this->registrar_evento('Fallo de carga de autorizaciones, (user:'.$idusuario.')', $idusuario);
                mysql_close();
                return null;
            }
        }catch (Exception $ex){
            mysql_close();
            $this->registrar_error(': '.$idusuario, $ex, 'usuario_autorizaciones', $idusuario);
            return $ex;
        }
    }
    
    public function usuario_last_login($idusuario) {
        include "config.php";
        try {
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);
            $sql = sprintf("update usuarios set last_login = now() where idusuario = '%s'",
            mysql_real_escape_string($idusuario)
            );
            $result = mysql_query($sql);
            mysql_close();
            $this->registrar_evento('Actualizacion Last Login', $idusuario);
            return null;
        }catch (Exception $ex){
            mysql_close();
            $this->registrar_error('Error en actualizacion de last login: '.$idusuario, $ex, 'usuario_last_login', $idusuario);
            return $ex;
        }
    }     
    /*********************/
    
    /* Defaults */
    public function Defaults_buscar() {
        include "config.php";
        try {
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);
            $sql = sprintf("select defaultimageuser, defaultimageempresa from info_gral");
            $result = mysql_query($sql);
            if(mysql_num_rows($result) > 0){
                for($i = 0; $i < mysql_num_rows($result); $i++) {
                    $filas = mysql_fetch_array($result);
                    $arrayretorno[$i] = $filas;
                    unset($filas);
                }
                mysql_close();
                $this->registrar_evento('Carga de defaults', $idusuario);
                return $arrayretorno;
            } else {
                $this->registrar_evento('Fallo de carga de defaults, (user:'.$idusuario.')', $idusuario);
                mysql_close();
                return null;
            }
        }catch (Exception $ex){
            mysql_close();
            $this->registrar_error(': '.$idusuario, $ex, 'carrier_buscar', $idusuario);
            return $ex;
        }
    }        
    /*************************/
    
    /* Informacion de Lineas */
    public function carrier_buscar($idcarrier = null) {
        include "config.php";
        try {
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);
            if ($idcarrier == null){
                $sql = sprintf("select idcarrier, codigo, nombre, fechacreacion from oper_carrier order by nombre");
            } else { 
                $sql = sprintf("select idcarrier, codigo, nombre, fechacreacion from oper_carrier where idcarrier = '%s' order by nombre",
                mysql_real_escape_string($idcarrier)
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
                $this->registrar_evento('Carga de carriers', $idusuario);
                return $arrayretorno;
            } else {
                $this->registrar_evento('Fallo de carga de carrier, (user:'.$idusuario.')', $idusuario);
                mysql_close();
                return null;
            }
        }catch (Exception $ex){
            mysql_close();
            $this->registrar_error(': '.$idusuario, $ex, 'carrier_buscar', $idusuario);
            return $ex;
        }
    }        
    /*************************/
        
    /* Informacion de Preferencias de Vuelos */
    public function prefvuelos_buscar($idusuario, $idpref = null) {
        include "config.php";
        try {
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);
            if ($idpref == null){
                $sql = sprintf("select idprefvuelo, nombre from oper_pref_vuelos order by idprefvuelo");
            } else { 
                $sql = sprintf("select idprefvuelo, nombre from oper_pref_vuelos where idprefvuelo = '%d' order by idprefvuelo",
                mysql_real_escape_string($idpref)
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
                $this->registrar_evento('Carga de Preferencias de Vuelo', $idusuario);
                return $arrayretorno;
            } else {
                $this->registrar_evento('Fallo de carga de preferencias de vuelo, (user:'.$idusuario.')', $idusuario);
                mysql_close();
                return null;
            }
        }catch (Exception $ex){
            mysql_close();
            $this->registrar_error(': '.$idusuario, $ex, 'carrier_buscar', $idusuario);
            return $ex;
        }
    }        
    /*************************/
        
    /* Informacion de Agentes */
    public function agentes_buscar($idusuario, $idagente = null) {
        include "config.php";
        try {
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);
            if ($idagente == null){
                $sql = sprintf("SELECT idagente, nombres, apellidos, concat(nombres, ' ', apellidos) As fullname, cargo, email, activo, fechaingreso FROM agentes");
            } else { 
                $sql = sprintf("SELECT idagente, nombres, apellidos, concat(nombres, ' ', apellidos) As fullname, cargo, email, activo, fechaingreso FROM agentes WHERE idagente = '%d'",
                mysql_real_escape_string($idagente)
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
                $this->registrar_evento('Carga de agentes', $idusuario);
                return $arrayretorno;
            } else {
                $this->registrar_evento('Fallo de carga de agentes, (user:'.$idusuario.')', $idusuario);
                mysql_close();
                return null;
            }
        }catch (Exception $ex){
            mysql_close();
            $this->registrar_error(': '.$idusuario, $ex, 'carrier_buscar', $idusuario);
            return $ex;
        }
    }        
    
    public function agentes_registrar($idusuario, $nombres, $apellidos, $cargo, $email, $activo, $fechaingreso ) {
        include "config.php";
        if($server == '') {
            include "../config.php";
        }
        try {
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);
            $sql = sprintf("insert into agentes (nombres, apellidos, cargo, email, activo, fechaingreso) values ('%s', '%s', '%s', '%s', '%d', now())",
            mysql_real_escape_string($nombres),
            mysql_real_escape_string($apellidos),
            mysql_real_escape_string($cargo),
            mysql_real_escape_string($email),
            mysql_real_escape_string($activo),
            mysql_real_escape_string($fechaingreso)
            );
            mysql_query($sql);
            $result = mysql_insert_id();
            mysql_close();
            $this->registrar_evento('Registro de agentes'.$result, $idusuario);
            return $result;
        }catch (Exception $ex){
            mysql_close();
            $this->registrar_error('Error en registro de agentes: '.$idusuario, $ex, 'agentes_registrar', $idusuario);
            return null;
        }        
    }
     
    public function agentes_modificar($idusuario, $idagente, $nombres, $apellidos, $cargo, $email, $activo, $fechaingreso ) {
        include "config.php";
        if($server == '') {
            include "../config.php";
        }

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
            return $result;
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
    
    /* Informacion de ciudades */
    public function ciudades_buscar($idciudad = null, $idusuario = 0) {
        include "config.php";
        try {
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);
            if ($idciudad == null){
                $sql = sprintf("select idciudad, concat(ciudad, ', ', codigo, ' (', iata, ')') As display, ciudad, iata, nombre, pais, codigo, area_code, region from oper_ciudades_meco");
            } else { 
                $sql = sprintf("select idciudad, concat(ciudad, ', ', codigo, ' (', iata, ')') As display, ciudad, iata, nombre, pais, codigo, area_code, region from oper_ciudades_meco where idcarrier = '%d'",
                mysql_real_escape_string($idciudad)
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
                $this->registrar_evento('Carga de ciudades', $idusuario);
                return $arrayretorno;
            } else {
                $this->registrar_evento('Fallo de carga de ciudades, (user:'.$idusuario.')', $idusuario);
                mysql_close();
                return null;
            }
        }catch (Exception $ex){
            mysql_close();
            $this->registrar_error(': '.$idusuario, $ex, 'ciudades_buscar', $idusuario);
            return $ex;
        }
    }
    
    public function ciudades_buscar_display($idciudad = null, $idusuario = 0) {
        include "config.php";
        try {
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);
            if ($idciudad == null){
                $sql = sprintf("select idciudad, concat(ciudad, ', ', codigo) As display from oper_ciudades_meco order by display");
            } else { 
                $sql = sprintf("select idciudad, concat(ciudad, ', ', codigo) As display from oper_ciudades_meco where idcarrier = '%d' order by display",
                mysql_real_escape_string($idciudad)
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
                $this->registrar_evento('Carga de ciudades', $idusuario);
                return $arrayretorno;
            } else {
                $this->registrar_evento('Fallo de carga de ciudades, (user:'.$idusuario.')', $idusuario);
                mysql_close();
                return null;
            }
        }catch (Exception $ex){
            mysql_close();
            $this->registrar_error(': '.$idusuario, $ex, 'ciudades_buscar', $idusuario);
            return $ex;
        }
    }        
    /***************************/  
    
    /* Informacion de nacionalidades */
    public function nacionalidades_buscar($idnacionalidad = null, $idusuario = 0) {
        include "config.php";
        try {
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);
            if ($idnacionalidad == null){
                $sql = sprintf("select idnacionalidad, pais from oper_nacionalidades order by idnacionalidad");
            } else { 
                $sql = sprintf("select idnacionalidad, pais from oper_nacionalidades where idnacionalidad = '%d'",
                mysql_real_escape_string($idnacionalidad)
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
                $this->registrar_evento('Carga de nacionalidades', $idusuario);
                return $arrayretorno;
            } else {
                $this->registrar_evento('Fallo de carga de nacionalidades, (user:'.$idusuario.')', $idusuario);
                mysql_close();
                return null;
            }
        }catch (Exception $ex){
            mysql_close();
            $this->registrar_error(': '.$idusuario, $ex, 'ciudades_buscar', $idusuario);
            return $ex;
        }
    }
    /***************************/
    
    /* Informacion de hoteles */
    public function hoteles_buscar($idhotel = null, $idusuario = 0) {
        include "config.php";
        try {
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);
            if ($idnacionalidad == null){
                $sql = sprintf("select t1.idhotel, t1.idciudad, t2.ciudad, t1.nombre from oper_hoteles t1 inner join oper_ciudades_meco t2 on t2.idciudad = t1.idciudad order by idhotel");
            } else { 
                $sql = sprintf("select t1.idhotel, t1.idciudad, t2.ciudad, t1.nombre from oper_hoteles t1 inner join oper_ciudades_meco t2 on t2.idciudad = t1.idciudad where idhotel = '%d' order by idhotel",
                mysql_real_escape_string($idhotel)
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
                $this->registrar_evento('Carga de hoteles', $idusuario);
                return $arrayretorno;
            } else {
                $this->registrar_evento('Fallo de carga de hoteles, (user:'.$idusuario.')', $idusuario);
                mysql_close();
                return null;
            }
        }catch (Exception $ex){
            mysql_close();
            $this->registrar_error(': '.$idusuario, $ex, 'ciudades_buscar', $idusuario);
            return $ex;
        }
    }
    /***************************/    
    
    /* Informacion de autos */
    public function autos_buscar($idtipoauto = null, $idusuario = 0) {
        include "config.php";
        try {
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);
            if ($idnacionalidad == null){
                $sql = sprintf("select idtipoauto, tipoauto from oper_autos order by idtipoauto");
            } else { 
                $sql = sprintf("select idtipoauto, tipoauto from oper_autos order by idtipoauto where idtipoauto = '%d' order by idtipoauto",
                mysql_real_escape_string($idtipoauto)
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
                $this->registrar_evento('Carga de tipos de auto', $idusuario);
                return $arrayretorno;
            } else {
                $this->registrar_evento('Fallo de carga de tipos de auto, (user:'.$idusuario.')', $idusuario);
                mysql_close();
                return null;
            }
        }catch (Exception $ex){
            mysql_close();
            $this->registrar_error(': '.$idusuario, $ex, 'ciudades_buscar', $idusuario);
            return $ex;
        }
    }
    /***************************/        
    
    /* Informacion de habitaciones */
    public function habitaciones_buscar($idtipohabitacion = null, $idusuario = 0) {
        include "config.php";
        try {
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);
            if ($idnacionalidad == null){
                $sql = sprintf("select idtipohabitacion, tipohabitacion from oper_habitaciones order by idtipohabitacion");
            } else { 
                $sql = sprintf("select idtipohabitacion, tipohabitacion from oper_habitaciones where idtipohabitacion = '%d' order by idtipohabitacion",
                mysql_real_escape_string($idtipohabitacion)
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
                $this->registrar_evento('Carga de tipos de habitacion', $idusuario);
                return $arrayretorno;
            } else {
                $this->registrar_evento('Fallo de carga de tipos de habitacion, (user:'.$idusuario.')', $idusuario);
                mysql_close();
                return null;
            }
        }catch (Exception $ex){
            mysql_close();
            $this->registrar_error(': '.$idusuario, $ex, 'habitaciones_buscar', $idusuario);
            return $ex;
        }
    }
    /***************************/            
    
    /* Informacion de rutas */    
    public function rutas_buscar($idruta = null) {
        include "config.php";
        try {
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);
            if ($idruta == null){
                $sql = sprintf("select idruta, ruta, destino, fechacreacion from oper_rutas");
            } else { 
                $sql = sprintf("select idruta, ruta, destino, fechacreacion from oper_rutas where idruta = '%d'",
                mysql_real_escape_string($idruta)
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
                $this->registrar_evento('Carga de rutas', $idusuario);
                return $arrayretorno;
            } else {
                $this->registrar_evento('Fallo de carga de rutas, (user:'.$idusuario.')', $idusuario);
                mysql_close();
                return null;
            }
        }catch (Exception $ex){
            mysql_close();
            $this->registrar_error(': '.$idusuario, $ex, 'rutas_buscar', $idusuario);
            return $ex;
        }
    }
    
    public function rutas_buscar_display($idruta = null) {
        include "config.php";
        try {
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);
            if ($idruta == null){
                $sql = sprintf("select idruta, ruta from oper_rutas order by ruta");
            } else { 
                $sql = sprintf("select idruta, ruta from oper_rutas where idruta = '%d' order by ruta",
                mysql_real_escape_string($idruta)
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
                $this->registrar_evento('Carga de rutas', $idusuario);
                return $arrayretorno;
            } else {
                $this->registrar_evento('Fallo de carga de rutas, (user:'.$idusuario.')', $idusuario);
                mysql_close();
                return null;
            }
        }catch (Exception $ex){
            mysql_close();
            $this->registrar_error(': '.$idusuario, $ex, 'rutas_buscar', $idusuario);
            return $ex;
        }
    }           
    /************************/
    
    /* Informacion de Categorias */
    public function c_buscar($idcarrier = null) {
        include "config.php";
        try {
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);
            if ($idcarrier == null){
                $sql = sprintf("select idcarrier, codigo, nombre, fechacreacion from oper_carrier order by nombre");
            } else { 
                $sql = sprintf("select idcarrier, codigo, nombre, fechacreacion from oper_carrier where idcarrier = '%s' order by nombre",
                mysql_real_escape_string($idcarrier)
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
                $this->registrar_evento('Carga de carriers', $idusuario);
                return $arrayretorno;
            } else {
                $this->registrar_evento('Fallo de carga de carrier, (user:'.$idusuario.')', $idusuario);
                mysql_close();
                return null;
            }
        }catch (Exception $ex){
            mysql_close();
            $this->registrar_error(': '.$idusuario, $ex, 'carrier_buscar', $idusuario);
            return $ex;
        }
    }        
    /*************************/
    
    /* Informacion de solicitudes */    
    public function solicitud_registrar_main($idusuario, $idcliente, $solicitud, $idcarrier, $idproyecto, $comentario, $comentariohotel, $comentarioauto, $idtiposolicitud, $hotel, $auto, $centrocosto, $proyecto) {
        include "config.php";
        try {
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);
            $sql = sprintf("insert into solicitudes (idcliente, idusuario, solicitud, fechacreacion, idcarrier, idproyecto, comentario, comentariohotel, comentarioauto, idtiposolicitud, flaghotel, flagauto, centrocosto, proyecto) values ('%d', '%d', '%s', now(), '%d', '%d', '%s', '%s', '%s', '%d', '%d', '%d', '%s', '%s')",
            mysql_real_escape_string($idcliente),
            mysql_real_escape_string($idusuario),
            mysql_real_escape_string($solicitud),
            mysql_real_escape_string($idcarrier),
            mysql_real_escape_string($idproyecto),
            mysql_real_escape_string($comentario),
            mysql_real_escape_string($comentariohotel),
            mysql_real_escape_string($comentarioauto),
            mysql_real_escape_string($idtiposolicitud),
            mysql_real_escape_string($hotel),
            mysql_real_escape_string($auto),
            mysql_real_escape_string($centrocosto),
            mysql_real_escape_string($proyecto)
            );
            mysql_query($sql);
            $result = mysql_insert_id();
            mysql_close();
            $this->registrar_evento('Registro de solicitud '.$result, $idusuario);
            return $result;
        }catch (Exception $ex){
            mysql_close();
            $this->registrar_error('Error en registro de solicitud: '.$idusuario, $ex, 'solicitud_registrar', $idusuario);
            return $ex;
        }
    }                
    
    public function solicitud_registrar_detalle($idusuario, $idsolicitud, $fecha_dep, $term_dep, $term_arri, $idprefvuelo) {
        include "config.php";
        try {
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);
            $sql = sprintf("insert into solicitudes_detalle (idsolicitud, fecha_dep, term_dep, term_arri, idprefvuelo) values ('%d', '%s', '%d', '%d', '%d')",
            mysql_real_escape_string($idsolicitud),
            mysql_real_escape_string($fecha_dep),
            mysql_real_escape_string($term_dep),
            mysql_real_escape_string($term_arri),
            mysql_real_escape_string($idprefvuelo)
            );
            $result = mysql_query($sql);
            mysql_close();
            $this->registrar_evento('Registro de detalle de solicitud '.$idreserva, $idusuario);
            return null;
        }catch (Exception $ex){
            mysql_close();
            $this->registrar_error('Error en registro de detalle de solicitud: '.$idusuario, $ex, 'solicitud_registrar_detalle', $idusuario);
            return $ex;
        }
    }                
    
    public function solicitud_registrar_hoteles($idusuario, $idsolicitud, $fecha_entrada, $fecha_salida, $idciudad, $idhotel, $idtipohab) {
        include "config.php";
        try {
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);
            $sql = sprintf("insert into solicitudes_detalle_hoteles (idsolicitud, fecha_entrada, fecha_salida, idciudad, idhotel, idtipohabitacion) values ('%d', '%s', '%s', '%d', '%d', '%d')",
            mysql_real_escape_string($idsolicitud),
            mysql_real_escape_string($fecha_entrada),
            mysql_real_escape_string($fecha_salida),
            mysql_real_escape_string($idciudad),
            mysql_real_escape_string($idhotel),
            mysql_real_escape_string($idtipohab)
            );
            $result = mysql_query($sql);
            mysql_close();
            $this->registrar_evento('Registro de detalle de solicitud '.$idreserva, $idusuario);
            return null;
        }catch (Exception $ex){
            mysql_close();
            $this->registrar_error('Error en registro de detalle de solicitud: '.$idusuario, $ex, 'solicitud_registrar_detalle', $idusuario);
            return $ex;
        }
    }                
    
    public function solicitud_registrar_autos($idusuario, $idsolicitud, $fecha_inicial,  $ciudad_inicial, $fecha_final, $ciudad_final, $idtipoauto) {
        include "config.php";
        try {
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);
            $sql = sprintf("insert into solicitudes_detalle_autos (idsolicitud, fecha_inicial, idciudad_recepcion, fecha_final, idciudad_entrega, idtipoauto) values ('%d', '%s', '%d', '%s', '%d', '%d')",
            mysql_real_escape_string($idsolicitud),
            mysql_real_escape_string($fecha_inicial),
            mysql_real_escape_string($ciudad_inicial),
            mysql_real_escape_string($fecha_final),
            mysql_real_escape_string($ciudad_final),
            mysql_real_escape_string($idtipoauto)
            );
            $result = mysql_query($sql);
            mysql_close();
            $this->registrar_evento('Registro de detalle de solicitud '.$idreserva, $idusuario);
            return null;
        }catch (Exception $ex){
            mysql_close();
            $this->registrar_error('Error en registro de detalle de solicitud: '.$idusuario, $ex, 'solicitud_registrar_detalle', $idusuario);
            return $ex;
        }
    }                
    
    public function solicitud_registrar_oferta($idusuario, $idagente, $idreserva, $valoroferta, $opciones, $detalle, $titulooferta, $fechacreacion = null) {
        include "config.php";
        try {
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);
            $sql = sprintf("insert into reservas_oferta (idoferta, idagente, idusuario, idsolicitud, valoroferta, fechacreacion, opciones, detalle, titulooferta) values ('%d', '%d', '%d', '%d', '%d', now(), '%d', '%s', '%s')",
            mysql_real_escape_string($idreserva),
            mysql_real_escape_string($idagente),
            mysql_real_escape_string($idusuario),
            mysql_real_escape_string($idreserva),
            mysql_real_escape_string($valoroferta),
            mysql_real_escape_string($opciones),
            mysql_real_escape_string($detalle),
            mysql_real_escape_string($titulooferta)
            );
            mysql_query($sql);
//            $result = mysql_insert_id();
            $result = $idreserva;
            mysql_close();
            $this->registrar_evento('Registro de oferta '.$result, $idusuario);
            return $result;
            //return $sql;
        }catch (Exception $ex){
            mysql_close();
            $this->registrar_error('Error en registro de oferta: '.$idusuario, $ex, 'reserva_oferta', $idusuario);
            return null;
        }
    }                

    public function solicitud_registrar_oferta_det($idusuario, $idoferta, $idsolicitud, $idlinea, $valor) {
        include "config.php";
        try {
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);
            $sql = sprintf("insert into reservas_oferta_det (idoferta, idsolicitud, idlinea, valor) values ('%d', '%d', '%d', '%s')",
            mysql_real_escape_string($idoferta),
            mysql_real_escape_string($idsolicitud),
            mysql_real_escape_string($idlinea),
            mysql_real_escape_string($valor)
            );
            mysql_query($sql);
            $result = mysql_insert_id();
            mysql_close();
            $this->registrar_evento('Registro de detalle de oferta '.$result, $idusuario);
            return $result;
        }catch (Exception $ex){
            mysql_close();
            $this->registrar_error('Error en registro de detalle de oferta: '.$idusuario, $ex, 'solicitud_registrar_oferta_det', $idusuario);
            return null;
        }
    }                
    
    public function solicitud_registrar_oferta_detalle($idusuario, $idreserva, $fecha_dep, $fecha_arri, $idcarrier, $term_dep, $term_arri ,$idruta) {
        include "config.php";
        try {
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);
            $sql = sprintf("insert into reservas_detalle (idreserva, fecha_dep, fecha_arri, idcarrier, idruta, term_arri, term_dep) values ('%d', '%s', '%s', '%s', '%d', '%s','%s')",
            mysql_real_escape_string($idreserva),
            mysql_real_escape_string($fecha_dep),
            mysql_real_escape_string($fecha_arri),
            mysql_real_escape_string($idcarrier),
            mysql_real_escape_string($idruta),
            mysql_real_escape_string($term_arri),
            mysql_real_escape_string($term_dep)
            );
            $result = mysql_query($sql);
            mysql_close();
            $this->registrar_evento('Registro de detalle de reserva '.$idreserva, $idusuario);
            return null;
        }catch (Exception $ex){
            mysql_close();
            $this->registrar_error('Error en registro de detalle de reserva: '.$idusuario, $ex, 'reservas_registrar_detalle', $idusuario);
            return $ex;
        }
    }                    
    
    public function solicitud_registrar_autorizacion($idusuario, $idauth, $idsolicitud, $idoferta, $idlinea) {
        include "config.php";
        try {
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);
            $sql = sprintf("update reservas_oferta set autorizada = 1, fecha_auth = now() where idsolicitud = '%d' and idoferta = '%d'",
            mysql_real_escape_string($idsolicitud),
            mysql_real_escape_string($idoferta)
            );
            mysql_query($sql);
            
            $sql = sprintf("update reservas_oferta_det set autorizada = 1 where idoferta = '%d' and idsolicitud = '%d' and idlinea = '%d'",
            mysql_real_escape_string($idoferta),
            mysql_real_escape_string($idsolicitud),
            mysql_real_escape_string($idlinea)
            );
            mysql_query($sql);
            
            mysql_close();
            $this->registrar_evento('Registro de autorizacion de oferta '.$result, $idusuario);
            return 'OK';
        }catch (Exception $ex){
            mysql_close();
            $this->registrar_error('Error en registro de autorizacion de oferta: '.$idusuario, $ex, 'reserva_oferta', $idusuario);
            return null;
        }
    }                
    
    public function solicitud_registrar_confirmacion($idusuario, $idsolicitud, $idoferta) {
        include "config.php";
        try {
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);
            $sql = sprintf("update reservas_oferta set confirmada = 1, fechaconfirmacion = now() where idsolicitud = '%d' and idoferta = '%d'",
            mysql_real_escape_string($idsolicitud),
            mysql_real_escape_string($idoferta)
            );
            mysql_query($sql);
            mysql_close();
            $this->registrar_evento('Registro de confirmacion de oferta '.$result, $idusuario);
            return 'OK';
        }catch (Exception $ex){
            mysql_close();
            $this->registrar_error('Error en registro de confirmacion de oferta: '.$idusuario, $ex, 'reserva_oferta', $idusuario);
            return null;
        }
    }                
    
    public function solicitud_verificar_flags($idoferta, $idusuario) {
    $result = '';
    $flags = '';
    $x = 0;
    $y = 0;
    
    $flags = $this->solicitud_flags_buscar($idoferta, $idusuario);
    
        for($x = 0; $x < count($flags); $x++) {
            ($flags[$x][4] == 1? $y++: null);
        }
        
        if($y == count($flags) && $y > 0) {
            return "true";
        } else {
            return "false";
        }
    }
    
    public function solicitud_verificar_flag_auth($idoferta, $idusuario) {
    $result = '';
    $flags = '';
    $x = 0;
    $y = 0;
    
    $flags = $this->solicitud_flags_buscar($idoferta, $idusuario);
    
        for($x = 0; $x < count($flags); $x++) {
            if($flags[$x][0] == $idoferta && $flags[$x][2] == $idusuario && $flags[$x][4] == 1){
                $y = 1;
            }
        }
        
        if($y == 1) {
            return "true";
        } else {
            return "false";
        }
    }
    
    public function solicitud_registrar_rechazo($idusuario, $idsolicitud, $idoferta, $comentario) {
        include "config.php";
        try {
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);
            $sql = sprintf("update reservas_oferta set rechazada = 1, fecha_rech = now(), motivorechazo = '%s' where idoferta = '%d' and idsolicitud = '%d'",
            mysql_real_escape_string($idoferta),
            mysql_real_escape_string($idsolicitud),
            mysql_real_escape_string($comentario)
            );
            mysql_query($sql);

            $sql = sprintf("INSERT INTO reservas_oferta_rechazadas SELECT * FROM reservas_oferta WHERE idoferta = '%d' and idsolicitud = '%d'",
            mysql_real_escape_string($idoferta),
            mysql_real_escape_string($idsolicitud)
            );                        
            mysql_query($sql);

            $sql = sprintf("INSERT INTO reservas_oferta_det_rechazadas SELECT * FROM reservas_oferta_det WHERE idoferta = '%d' and idsolicitud = '%d'",
            mysql_real_escape_string($idoferta),
            mysql_real_escape_string($idsolicitud)
            );                        
            mysql_query($sql);
            
            $sql = sprintf("INSERT INTO reservas_oferta_flag_rechazadas SELECT * FROM reservas_oferta_flag WHERE idoferta = '%d' and idsolicitud = '%d'",
            mysql_real_escape_string($idoferta),
            mysql_real_escape_string($idsolicitud)
            );                        
            mysql_query($sql);            
            
            $sql = sprintf("DELETE FROM reservas_oferta WHERE idoferta = '%d' and idsolicitud = '%d'",
            mysql_real_escape_string($idoferta),
            mysql_real_escape_string($idsolicitud)
            );                        
            mysql_query($sql);            
            
            $sql = sprintf("DELETE FROM reservas_oferta_det WHERE idoferta = '%d' and idsolicitud = '%d'",
            mysql_real_escape_string($idoferta),
            mysql_real_escape_string($idsolicitud)
            );                        
            mysql_query($sql);
            
            $sql = sprintf("DELETE FROM reservas_oferta_flag WHERE idoferta = '%d' and idsolicitud = '%d'",
            mysql_real_escape_string($idoferta),
            mysql_real_escape_string($idsolicitud)
            );                        
            mysql_query($sql);            
            
            //INSERT INTO ventas_historico SELECT * FROM ventas WHERE 
            mysql_close();
            $this->registrar_evento('Registro de rechazo de oferta '.$result, $idusuario);
            return $sql;
        }catch (Exception $ex){
            mysql_close();
            $this->registrar_error('Error en registro de rechazo de oferta: '.$idusuario, $ex, 'reserva_oferta', $idusuario);
            return null;
        }
    }                    
    
    public function solicitud_registrar_anulado($idusuario, $idsolicitud, $idoferta, $comentario) {
        include "config.php";
        try {
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);

            $sql = sprintf("update solicitudes set anulada = 1, motivoanulacion = '%s', fecha_anulacion = now() where idsolicitud = '%d'",
            mysql_real_escape_string($comentario),
            mysql_real_escape_string($idoferta),
            mysql_real_escape_string($idsolicitud)
            );
            mysql_query($sql);           

            $sql = sprintf("update reservas_oferta set anulada = 1, motivoanulacion = '%s', fecha_anulacion = now() where idoferta = '%d' and idsolicitud = '%d'",
            mysql_real_escape_string($comentario),
            mysql_real_escape_string($idoferta),
            mysql_real_escape_string($idsolicitud)
            );
            mysql_query($sql);

            //INSERT INTO ventas_historico SELECT * FROM ventas WHERE 
            mysql_close();
            $this->registrar_evento('Registro de anulacion solicitud'.$idsolicitud, $idusuario);
            return "OK";
        }catch (Exception $ex){
            mysql_close();
            $this->registrar_error('Error en registro de anulacion: '.$idusuario, $ex, 'solicitud_registrar_anulado', $idusuario);
            return null;
        }
    }                    
    
    public function solicitud_registrar_finish($idusuario, $idsolicitud, $idoferta, $asunto, $detalle, $fechaenvio, $usuario) {
        include "config.php";
        try {
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);
            $sql = sprintf("update reservas_oferta set finish = 1, fecha_finish = now() where idoferta = '%d' and idsolicitud = '%d'",
            mysql_real_escape_string($idoferta),
            mysql_real_escape_string($idsolicitud)
            );
            mysql_query($sql);
            
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);
            $sql = sprintf("insert into reservas_oferta_finish set idsolicitud = '%d', idoferta = '%d', asunto = '%s', detalle = '%s', fechaenvio = '%s', idusuario = '%d'",
            mysql_real_escape_string($idsolicitud),
            mysql_real_escape_string($idoferta),
            mysql_real_escape_string($asunto),
            mysql_real_escape_string($detalle),
            mysql_real_escape_string($fechaenvio),
            mysql_real_escape_string($usuario)
            );
            mysql_query($sql);

            //INSERT INTO ventas_historico SELECT * FROM ventas WHERE 
            mysql_close();
            $this->registrar_evento('Registro de rechazo de oferta '.$result, $idusuario);
            return $sql;
        }catch (Exception $ex){
            mysql_close();
            $this->registrar_error('Error en registro de rechazo de oferta: '.$idusuario, $ex, 'reserva_oferta', $idusuario);
            return null;
        }
    }                    

    public function solicitud_registrar_flag($idusuario, $idoferta, $idlinea, $idusuarioauth) {
        include "config.php";
        try {
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);
            $sql = sprintf("insert into reservas_oferta_flag (idoferta, idlinea, idusuario, autorizado, fecha_auth) values ('%d', '%d', '%d', 0, now())",
            mysql_real_escape_string($idoferta),
            mysql_real_escape_string($idlinea),
            mysql_real_escape_string($idusuarioauth)
            );
            mysql_query($sql);
            $result = mysql_insert_id();
            mysql_close();
            $this->registrar_evento('Registro de detalle de oferta '.$result, $idusuario);
            return $result;
        }catch (Exception $ex){
            mysql_close();
            $this->registrar_error('Error en registro de detalle de oferta: '.$idusuario, $ex, 'solicitud_registrar_oferta_det', $idusuario);
            return null;
        }
    }                
    
    public function solicitud_autorizar_flag_seleccion($idusuario, $idoferta, $idlinea, $comentario) {
        include "config.php";
        try {
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);
            $sql = sprintf("update reservas_oferta_flag set idlinea = '%d', autorizado = 1, comentario = '%s', fecha_auth = now() where idoferta = '%d' and idusuario = '%d'",
            mysql_real_escape_string($idlinea),
            mysql_real_escape_string($comentario),
            mysql_real_escape_string($idoferta),
            mysql_real_escape_string($idusuario)
            );
            mysql_query($sql);
            mysql_close();
            $this->registrar_evento('Registro de autorizacion de oferta por Key'.$result, $idusuario);
            return $sql;
        }catch (Exception $ex){
            mysql_close();
            $this->registrar_error('Error en registro de autorizacion de oferta: '.$idusuario, $ex, 'reserva_oferta', $idusuario);
            return null;
        }
    }                

    public function solicitud_flags_buscar($idoferta, $idusuario) {
        include "config.php";
        try {
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);
            if ($idoferta == 0){
                $sql = sprintf("SELECT t1.idoferta, t1.idlinea, t1.idusuario, CONCAT(t2.nombres, ' ', t2.apellidos) AS nombre, t1.autorizado, t1.fecha_auth FROM reservas_oferta_flag t1 INNER JOIN usuarios t2 ON t2.idusuario = t1.idusuario");
            } else { 
                $sql = sprintf("SELECT t1.idoferta, t1.idlinea, t1.idusuario, CONCAT(t2.nombres, ' ', t2.apellidos) AS nombre, t1.autorizado, t1.fecha_auth FROM reservas_oferta_flag t1 INNER JOIN usuarios t2 ON t2.idusuario = t1.idusuario Where t1.idoferta = '%d'", 
                mysql_real_escape_string($idoferta)
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
                $this->registrar_evento('Carga de reservas', $idusuario);
                return $arrayretorno;
            } else {
                $this->registrar_evento('Fallo de carga de reservas, (user:'.$idusuario.')', $idusuario);
                mysql_close();
                return null;
            }
        }catch (Exception $ex){
            mysql_close();
            $this->registrar_error(': '.$idusuario, $ex, 'rutas_buscar', $idusuario);
            return $ex;
        }
    }     
    
    public function solicitud_buscar($idsolicitud, $idusuario, $ofertadas = null) {
        include "config.php";
        try {
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);
            if ($ofertadas == null) {
                if ($idsolicitud == 0){
                    //$sql = sprintf("SELECT t1.idcliente, t1.idsolicitud, t1.idusuario, t1.fechacreacion, t1.anulada, t2.fecha_arri, t2.fecha_dep, t3.nombre, t2.term_arri, CONCAT( t5.nombre,  ' (', t5.iata,  ')' ) AS nombre_term_arri, t2.term_dep, CONCAT( t6.nombre,  ' (', t6.iata,  ')' ) AS nombre_term_dep, t7.nombre, CONCAT( t8.nombres,  ' ', t8.apellidos ) AS usuario FROM solicitudes t1 LEFT JOIN solicitudes_detalle t2 ON t2.idsolicitud = t1.idsolicitud LEFT JOIN oper_carrier t3 ON t3.codigo = t2.idcarrier LEFT JOIN oper_ciudades t5 ON t5.idciudad = t2.term_arri LEFT JOIN oper_ciudades t6 ON t6.idciudad = t2.term_dep LEFT JOIN clientes t7 ON t7.idcliente = t1.idcliente LEFT JOIN usuarios t8 ON t8.idusuario = t1.idusuario");
                    //$sql = sprintf("select t1.idcliente, t1.idusuario, concat(t3.nombres, ' ', t3.apellidos) as nombreusuario, t1.fechacreacion, t2.fecha_dep, t2.fecha_arri, t2.term_dep, concat(t4.ciudad, ', ', t4.pais, ' (', t4.iata, ')') As ciudad_dep, t2.term_arri, concat(t5.ciudad, ', ', t5.pais, ' (', t5.iata, ')') As ciudad_arri, t2.fecha_dep_1, t2.fecha_arri_1, t2.term_dep_1, concat(t6.ciudad, ', ', t6.pais, ' (', t6.iata, ')') As ciudad_dep_1, t2.term_arri_1, concat(t7.ciudad, ', ', t7.pais, ' (', t7.iata, ')') As ciudad_arri_1, t2.idcarrier, t8.nombre as carrier, t2.idprefvuelo, t9.nombre as preferenciavuelo, t2.idproyecto, t10.nombre as proyecto, t2.idsolicitud, t2.comentario from solicitudes t1 inner join solicitudes_detalle t2 on t1.idsolicitud = t2.idsolicitud inner join usuarios t3 on t1.idusuario = t3.idusuario inner join oper_ciudades t4 on t4.idciudad = t2.term_dep inner join oper_ciudades t5 on t5.idciudad = t2.term_arri inner join oper_ciudades t6 on t6.idciudad = t2.term_dep_1 inner join oper_ciudades t7 on t7.idciudad = t2.term_arri_1 inner join oper_carrier t8 on t8.codigo = t2.idcarrier inner join oper_pref_vuelos t9 on t9.idprefvuelo = t2.idprefvuelo inner join clientes_proyectos t10 on t10.idproyecto = t2.idproyecto");
                    $sql = sprintf("SELECT t1.idsolicitud, t1.idcliente, t2.nombre AS cliente, t1.idusuario, CONCAT( t3.nombres,  ' ', t3.apellidos ) AS usuario, t1.solicitud, t1.fechacreacion, t1.anulada, t1.idcarrier, t4.nombre AS carrier, t1.idproyecto, t5.nombre as proyecto, t1.comentario, t1.comentariohotel, t1.comentarioauto, t1.idtiposolicitud, t1.flaghotel, t1.flagauto, t1.centrocosto, t1.proyecto FROM solicitudes t1 LEFT JOIN clientes t2 ON t2.idcliente = t1.idcliente LEFT JOIN usuarios t3 ON t3.idusuario = t1.idusuario LEFT JOIN oper_carrier t4 ON t4.codigo = t1.idcarrier LEFT JOIN clientes_proyectos t5 on t5.idproyecto = t1.idproyecto");
                } else { 
                    //$sql = sprintf("SELECT t1.idcliente, t1.idsolicitud, t1.idusuario, t1.fechacreacion, t1.anulada, t2.fecha_arri, t2.fecha_dep, t3.nombre, t2.term_arri, CONCAT( t5.nombre,  ' (', t5.iata,  ')' ) AS nombre_term_arri, t2.term_dep, CONCAT( t6.nombre,  ' (', t6.iata,  ')' ) AS nombre_term_dep, t7.nombre, CONCAT( t8.nombres,  ' ', t8.apellidos ) AS usuario FROM solicitudes t1 LEFT JOIN solicitudes_detalle t2 ON t2.idsolicitud = t1.idsolicitud LEFT JOIN oper_carrier t3 ON t3.codigo = t2.idcarrier LEFT JOIN oper_ciudades t5 ON t5.idciudad = t2.term_arri LEFT JOIN oper_ciudades t6 ON t6.idciudad = t2.term_dep LEFT JOIN clientes t7 ON t7.idcliente = t1.idcliente LEFT JOIN usuarios t8 ON t8.idusuario = t1.idusuario Where t1.idsolicitud = '%d'",
                    //$sql = sprintf("select t1.idcliente, t1.idusuario, concat(t3.nombres, ' ', t3.apellidos) as nombreusuario, t1.fechacreacion, t2.fecha_dep, t2.fecha_arri, t2.term_dep, concat(t4.ciudad, ', ', t4.pais, ' (', t4.iata, ')') As ciudad_dep, t2.term_arri, concat(t5.ciudad, ', ', t5.pais, ' (', t5.iata, ')') As ciudad_arri, t2.fecha_dep_1, t2.fecha_arri_1, t2.term_dep_1, concat(t6.ciudad, ', ', t6.pais, ' (', t6.iata, ')') As ciudad_dep_1, t2.term_arri_1, concat(t7.ciudad, ', ', t7.pais, ' (', t7.iata, ')') As ciudad_arri_1, t2.idcarrier, t8.nombre as carrier, t2.idprefvuelo, t9.nombre as preferenciavuelo, t2.idproyecto, t10.nombre as proyecto, t2.idsolicitud, t2.comentario from solicitudes t1 inner join solicitudes_detalle t2 on t1.idsolicitud = t2.idsolicitud inner join usuarios t3 on t1.idusuario = t3.idusuario inner join oper_ciudades t4 on t4.idciudad = t2.term_dep inner join oper_ciudades t5 on t5.idciudad = t2.term_arri inner join oper_ciudades t6 on t6.idciudad = t2.term_dep_1 inner join oper_ciudades t7 on t7.idciudad = t2.term_arri_1 inner join oper_carrier t8 on t8.codigo = t2.idcarrier inner join oper_pref_vuelos t9 on t9.idprefvuelo = t2.idprefvuelo inner join clientes_proyectos t10 on t10.idproyecto = t2.idproyecto Where t1.idsolicitud = '%d'",
                    $sql = sprintf("SELECT t1.idsolicitud, t1.idcliente, t2.nombre AS cliente, t1.idusuario, CONCAT( t3.nombres,  ' ', t3.apellidos ) AS usuario, t1.solicitud, t1.fechacreacion, t1.anulada, t1.idcarrier, t4.nombre AS carrier, t1.idproyecto, t5.nombre as proyecto, t1.comentario, t1.comentariohotel, t1.comentarioauto, t1.idtiposolicitud, t1.flaghotel, t1.flagauto, t1.centrocosto, t1.proyecto FROM solicitudes t1 LEFT JOIN clientes t2 ON t2.idcliente = t1.idcliente LEFT JOIN usuarios t3 ON t3.idusuario = t1.idusuario LEFT JOIN oper_carrier t4 ON t4.codigo = t1.idcarrier LEFT JOIN clientes_proyectos t5 on t5.idproyecto = t1.idproyecto Where t1.idsolicitud = '%d'", 
                    mysql_real_escape_string($idsolicitud)
                    );
                }
            } else {
                $sql = sprintf("SELECT t1.idcliente, t1.idsolicitud, t7.idoferta, t1.idusuario, concat(t8.nombres, ' ', t8.apellidos) As usuario, t1.fechacreacion, t1.anulada, t2.fecha_arri, t2.fecha_dep, t2.idcarrier, t3.nombre, t2.term_arri, CONCAT( t5.nombre,  ' (', t5.iata,  ')' ) AS nombre_term_arri, t2.term_dep, CONCAT( t6.nombre,  ' (', t6.iata,  ')' ) AS nombre_term_dep, t9.nombre, t1.comentariohotel, t1.comentarioauto, t1.idtiposolicitud, t1.flaghotel, t1.flagauto, t1.centrocosto, t1.proyecto FROM solicitudes t1 LEFT JOIN solicitudes_detalle t2 ON t2.idsolicitud = t1.idsolicitud LEFT JOIN oper_carrier t3 ON t3.codigo = t2.idcarrier LEFT JOIN oper_ciudades_meco t5 ON t5.idciudad = t2.term_arri LEFT JOIN oper_ciudades_meco t6 ON t6.idciudad = t2.term_dep LEFT JOIN reservas_oferta t7 ON t7.idsolicitud = t1.idsolicitud left join usuarios t8 on t8.idusuario = t1.idusuario left join clientes t9 on t9.idcliente = t1.idcliente");
            }
            $result = mysql_query($sql);
            if(mysql_num_rows($result) > 0){
                for($i = 0; $i < mysql_num_rows($result); $i++) {
                    $filas = mysql_fetch_array($result);
                    $arrayretorno[$i] = $filas;
                    unset($filas);
                }
                mysql_close();
                $this->registrar_evento('Carga de reservas', $idusuario);
                return $arrayretorno;
            } else {
                $this->registrar_evento('Fallo de carga de reservas, (user:'.$idusuario.')', $idusuario);
                mysql_close();
                return null;
            }
        }catch (Exception $ex){
            mysql_close();
            $this->registrar_error(': '.$idusuario, $ex, 'rutas_buscar', $idusuario);
            return $ex;
        }
    }           
    
    public function solicitud_buscar_detalle($idsolicitud, $idusuario) {
        include "config.php";
        try {
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);
                if ($idsolicitud == 0){
                    //$sql = sprintf("SELECT t1.idcliente, t1.idsolicitud, t1.idusuario, t1.fechacreacion, t1.anulada, t2.fecha_arri, t2.fecha_dep, t3.nombre, t2.term_arri, CONCAT( t5.nombre,  ' (', t5.iata,  ')' ) AS nombre_term_arri, t2.term_dep, CONCAT( t6.nombre,  ' (', t6.iata,  ')' ) AS nombre_term_dep, t7.nombre, CONCAT( t8.nombres,  ' ', t8.apellidos ) AS usuario FROM solicitudes t1 LEFT JOIN solicitudes_detalle t2 ON t2.idsolicitud = t1.idsolicitud LEFT JOIN oper_carrier t3 ON t3.codigo = t2.idcarrier LEFT JOIN oper_ciudades t5 ON t5.idciudad = t2.term_arri LEFT JOIN oper_ciudades t6 ON t6.idciudad = t2.term_dep LEFT JOIN clientes t7 ON t7.idcliente = t1.idcliente LEFT JOIN usuarios t8 ON t8.idusuario = t1.idusuario");
                    //$sql = sprintf("select t1.idcliente, t1.idusuario, concat(t3.nombres, ' ', t3.apellidos) as nombreusuario, t1.fechacreacion, t2.fecha_dep, t2.fecha_arri, t2.term_dep, concat(t4.ciudad, ', ', t4.pais, ' (', t4.iata, ')') As ciudad_dep, t2.term_arri, concat(t5.ciudad, ', ', t5.pais, ' (', t5.iata, ')') As ciudad_arri, t2.fecha_dep_1, t2.fecha_arri_1, t2.term_dep_1, concat(t6.ciudad, ', ', t6.pais, ' (', t6.iata, ')') As ciudad_dep_1, t2.term_arri_1, concat(t7.ciudad, ', ', t7.pais, ' (', t7.iata, ')') As ciudad_arri_1, t2.idcarrier, t8.nombre as carrier, t2.idprefvuelo, t9.nombre as preferenciavuelo, t2.idproyecto, t10.nombre as proyecto, t2.idsolicitud, t2.comentario from solicitudes t1 inner join solicitudes_detalle t2 on t1.idsolicitud = t2.idsolicitud inner join usuarios t3 on t1.idusuario = t3.idusuario inner join oper_ciudades t4 on t4.idciudad = t2.term_dep inner join oper_ciudades t5 on t5.idciudad = t2.term_arri inner join oper_ciudades t6 on t6.idciudad = t2.term_dep_1 inner join oper_ciudades t7 on t7.idciudad = t2.term_arri_1 inner join oper_carrier t8 on t8.codigo = t2.idcarrier inner join oper_pref_vuelos t9 on t9.idprefvuelo = t2.idprefvuelo inner join clientes_proyectos t10 on t10.idproyecto = t2.idproyecto");
                    $sql = sprintf("select t1.idsolicitud, t1.idsegmento, t1.fecha_dep, t1.term_dep, concat(t2.ciudad, ', ', t2.codigo, ' (', t2.iata, ')') As origen, t1.term_arri, concat(t3.ciudad, ', ', t3.codigo, ' (', t3.iata, ')') As destino, t1.idprefvuelo, t4.nombre as prefvuelo from solicitudes_detalle t1 left join oper_ciudades_meco t2 on t2.idciudad = t1.term_dep left join oper_ciudades_meco t3 on t3.idciudad = t1.term_arri left join oper_pref_vuelos t4 on t4.idprefvuelo = t1.idprefvuelo order by idsegmento");
                } else { 
                    //$sql = sprintf("SELECT t1.idcliente, t1.idsolicitud, t1.idusuario, t1.fechacreacion, t1.anulada, t2.fecha_arri, t2.fecha_dep, t3.nombre, t2.term_arri, CONCAT( t5.nombre,  ' (', t5.iata,  ')' ) AS nombre_term_arri, t2.term_dep, CONCAT( t6.nombre,  ' (', t6.iata,  ')' ) AS nombre_term_dep, t7.nombre, CONCAT( t8.nombres,  ' ', t8.apellidos ) AS usuario FROM solicitudes t1 LEFT JOIN solicitudes_detalle t2 ON t2.idsolicitud = t1.idsolicitud LEFT JOIN oper_carrier t3 ON t3.codigo = t2.idcarrier LEFT JOIN oper_ciudades t5 ON t5.idciudad = t2.term_arri LEFT JOIN oper_ciudades t6 ON t6.idciudad = t2.term_dep LEFT JOIN clientes t7 ON t7.idcliente = t1.idcliente LEFT JOIN usuarios t8 ON t8.idusuario = t1.idusuario Where t1.idsolicitud = '%d'",
                    //$sql = sprintf("select t1.idcliente, t1.idusuario, concat(t3.nombres, ' ', t3.apellidos) as nombreusuario, t1.fechacreacion, t2.fecha_dep, t2.fecha_arri, t2.term_dep, concat(t4.ciudad, ', ', t4.pais, ' (', t4.iata, ')') As ciudad_dep, t2.term_arri, concat(t5.ciudad, ', ', t5.pais, ' (', t5.iata, ')') As ciudad_arri, t2.fecha_dep_1, t2.fecha_arri_1, t2.term_dep_1, concat(t6.ciudad, ', ', t6.pais, ' (', t6.iata, ')') As ciudad_dep_1, t2.term_arri_1, concat(t7.ciudad, ', ', t7.pais, ' (', t7.iata, ')') As ciudad_arri_1, t2.idcarrier, t8.nombre as carrier, t2.idprefvuelo, t9.nombre as preferenciavuelo, t2.idproyecto, t10.nombre as proyecto, t2.idsolicitud, t2.comentario from solicitudes t1 inner join solicitudes_detalle t2 on t1.idsolicitud = t2.idsolicitud inner join usuarios t3 on t1.idusuario = t3.idusuario inner join oper_ciudades t4 on t4.idciudad = t2.term_dep inner join oper_ciudades t5 on t5.idciudad = t2.term_arri inner join oper_ciudades t6 on t6.idciudad = t2.term_dep_1 inner join oper_ciudades t7 on t7.idciudad = t2.term_arri_1 inner join oper_carrier t8 on t8.codigo = t2.idcarrier inner join oper_pref_vuelos t9 on t9.idprefvuelo = t2.idprefvuelo inner join clientes_proyectos t10 on t10.idproyecto = t2.idproyecto Where t1.idsolicitud = '%d'",
                    $sql = sprintf("select t1.idsolicitud, t1.idsegmento, t1.fecha_dep, t1.term_dep, concat(t2.ciudad, ', ', t2.codigo, ' (', t2.iata, ')') As origen, t1.term_arri, concat(t3.ciudad, ', ', t3.codigo, ' (', t3.iata, ')') As destino, t1.idprefvuelo, t4.nombre as prefvuelo from solicitudes_detalle t1 left join oper_ciudades_meco t2 on t2.idciudad = t1.term_dep left join oper_ciudades_meco t3 on t3.idciudad = t1.term_arri left join oper_pref_vuelos t4 on t4.idprefvuelo = t1.idprefvuelo Where t1.idsolicitud = '%d' order by idsegmento", 
                    mysql_real_escape_string($idsolicitud)
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
                $this->registrar_evento('Carga de reservas', $idusuario);
                return $arrayretorno;
            } else {
                $this->registrar_evento('Fallo de carga de reservas, (user:'.$idusuario.')', $idusuario);
                mysql_close();
                return null;
            }
        }catch (Exception $ex){
            mysql_close();
            $this->registrar_error(': '.$idusuario, $ex, 'rutas_buscar', $idusuario);
            return $ex;
        }
    }               
    
    public function solicitud_buscar_detalle_hoteles($idsolicitud, $idusuario) {
        include "config.php";
        try {
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);
                if ($idsolicitud == 0){
                    //$sql = sprintf("SELECT t1.idcliente, t1.idsolicitud, t1.idusuario, t1.fechacreacion, t1.anulada, t2.fecha_arri, t2.fecha_dep, t3.nombre, t2.term_arri, CONCAT( t5.nombre,  ' (', t5.iata,  ')' ) AS nombre_term_arri, t2.term_dep, CONCAT( t6.nombre,  ' (', t6.iata,  ')' ) AS nombre_term_dep, t7.nombre, CONCAT( t8.nombres,  ' ', t8.apellidos ) AS usuario FROM solicitudes t1 LEFT JOIN solicitudes_detalle t2 ON t2.idsolicitud = t1.idsolicitud LEFT JOIN oper_carrier t3 ON t3.codigo = t2.idcarrier LEFT JOIN oper_ciudades t5 ON t5.idciudad = t2.term_arri LEFT JOIN oper_ciudades t6 ON t6.idciudad = t2.term_dep LEFT JOIN clientes t7 ON t7.idcliente = t1.idcliente LEFT JOIN usuarios t8 ON t8.idusuario = t1.idusuario");
                    //$sql = sprintf("select t1.idcliente, t1.idusuario, concat(t3.nombres, ' ', t3.apellidos) as nombreusuario, t1.fechacreacion, t2.fecha_dep, t2.fecha_arri, t2.term_dep, concat(t4.ciudad, ', ', t4.pais, ' (', t4.iata, ')') As ciudad_dep, t2.term_arri, concat(t5.ciudad, ', ', t5.pais, ' (', t5.iata, ')') As ciudad_arri, t2.fecha_dep_1, t2.fecha_arri_1, t2.term_dep_1, concat(t6.ciudad, ', ', t6.pais, ' (', t6.iata, ')') As ciudad_dep_1, t2.term_arri_1, concat(t7.ciudad, ', ', t7.pais, ' (', t7.iata, ')') As ciudad_arri_1, t2.idcarrier, t8.nombre as carrier, t2.idprefvuelo, t9.nombre as preferenciavuelo, t2.idproyecto, t10.nombre as proyecto, t2.idsolicitud, t2.comentario from solicitudes t1 inner join solicitudes_detalle t2 on t1.idsolicitud = t2.idsolicitud inner join usuarios t3 on t1.idusuario = t3.idusuario inner join oper_ciudades t4 on t4.idciudad = t2.term_dep inner join oper_ciudades t5 on t5.idciudad = t2.term_arri inner join oper_ciudades t6 on t6.idciudad = t2.term_dep_1 inner join oper_ciudades t7 on t7.idciudad = t2.term_arri_1 inner join oper_carrier t8 on t8.codigo = t2.idcarrier inner join oper_pref_vuelos t9 on t9.idprefvuelo = t2.idprefvuelo inner join clientes_proyectos t10 on t10.idproyecto = t2.idproyecto");
                    $sql = sprintf("SELECT t1.idsolicitud, t1.idsegmento, t1.fecha_entrada, t1.fecha_salida, t1.idciudad, t2.ciudad, t1.idhotel, t3.nombre, t1.idtipohabitacion, t4.tipohabitacion FROM solicitudes_detalle_hoteles t1 LEFT JOIN oper_ciudades_meco t2 ON t2.idciudad = t1.idciudad LEFT JOIN oper_hoteles t3 ON t3.idhotel = t1.idhotel LEFT JOIN oper_habitaciones t4 ON t4.idtipohabitacion = t1.idtipohabitacion order by idsegmento");
                } else { 
                    //$sql = sprintf("SELECT t1.idcliente, t1.idsolicitud, t1.idusuario, t1.fechacreacion, t1.anulada, t2.fecha_arri, t2.fecha_dep, t3.nombre, t2.term_arri, CONCAT( t5.nombre,  ' (', t5.iata,  ')' ) AS nombre_term_arri, t2.term_dep, CONCAT( t6.nombre,  ' (', t6.iata,  ')' ) AS nombre_term_dep, t7.nombre, CONCAT( t8.nombres,  ' ', t8.apellidos ) AS usuario FROM solicitudes t1 LEFT JOIN solicitudes_detalle t2 ON t2.idsolicitud = t1.idsolicitud LEFT JOIN oper_carrier t3 ON t3.codigo = t2.idcarrier LEFT JOIN oper_ciudades t5 ON t5.idciudad = t2.term_arri LEFT JOIN oper_ciudades t6 ON t6.idciudad = t2.term_dep LEFT JOIN clientes t7 ON t7.idcliente = t1.idcliente LEFT JOIN usuarios t8 ON t8.idusuario = t1.idusuario Where t1.idsolicitud = '%d'",
                    //$sql = sprintf("select t1.idcliente, t1.idusuario, concat(t3.nombres, ' ', t3.apellidos) as nombreusuario, t1.fechacreacion, t2.fecha_dep, t2.fecha_arri, t2.term_dep, concat(t4.ciudad, ', ', t4.pais, ' (', t4.iata, ')') As ciudad_dep, t2.term_arri, concat(t5.ciudad, ', ', t5.pais, ' (', t5.iata, ')') As ciudad_arri, t2.fecha_dep_1, t2.fecha_arri_1, t2.term_dep_1, concat(t6.ciudad, ', ', t6.pais, ' (', t6.iata, ')') As ciudad_dep_1, t2.term_arri_1, concat(t7.ciudad, ', ', t7.pais, ' (', t7.iata, ')') As ciudad_arri_1, t2.idcarrier, t8.nombre as carrier, t2.idprefvuelo, t9.nombre as preferenciavuelo, t2.idproyecto, t10.nombre as proyecto, t2.idsolicitud, t2.comentario from solicitudes t1 inner join solicitudes_detalle t2 on t1.idsolicitud = t2.idsolicitud inner join usuarios t3 on t1.idusuario = t3.idusuario inner join oper_ciudades t4 on t4.idciudad = t2.term_dep inner join oper_ciudades t5 on t5.idciudad = t2.term_arri inner join oper_ciudades t6 on t6.idciudad = t2.term_dep_1 inner join oper_ciudades t7 on t7.idciudad = t2.term_arri_1 inner join oper_carrier t8 on t8.codigo = t2.idcarrier inner join oper_pref_vuelos t9 on t9.idprefvuelo = t2.idprefvuelo inner join clientes_proyectos t10 on t10.idproyecto = t2.idproyecto Where t1.idsolicitud = '%d'",
                    $sql = sprintf("SELECT t1.idsolicitud, t1.idsegmento, t1.fecha_entrada, t1.fecha_salida, t1.idciudad, t2.ciudad, t1.idhotel, t3.nombre, t1.idtipohabitacion, t4.tipohabitacion FROM solicitudes_detalle_hoteles t1 LEFT JOIN oper_ciudades_meco t2 ON t2.idciudad = t1.idciudad LEFT JOIN oper_hoteles t3 ON t3.idhotel = t1.idhotel LEFT JOIN oper_habitaciones t4 ON t4.idtipohabitacion = t1.idtipohabitacion Where t1.idsolicitud = '%d' order by idsegmento", 
                    mysql_real_escape_string($idsolicitud)
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
                $this->registrar_evento('Carga de reservas', $idusuario);
                return $arrayretorno;
            } else {
                $this->registrar_evento('Fallo de carga de reservas, (user:'.$idusuario.')', $idusuario);
                mysql_close();
                return null;
            }
        }catch (Exception $ex){
            mysql_close();
            $this->registrar_error(': '.$idusuario, $ex, 'rutas_buscar', $idusuario);
            return $ex;
        }
    }               
    
    public function solicitud_buscar_detalle_autos($idsolicitud, $idusuario) {
        include "config.php";
        try {
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);
                if ($idsolicitud == 0){
                    //$sql = sprintf("SELECT t1.idcliente, t1.idsolicitud, t1.idusuario, t1.fechacreacion, t1.anulada, t2.fecha_arri, t2.fecha_dep, t3.nombre, t2.term_arri, CONCAT( t5.nombre,  ' (', t5.iata,  ')' ) AS nombre_term_arri, t2.term_dep, CONCAT( t6.nombre,  ' (', t6.iata,  ')' ) AS nombre_term_dep, t7.nombre, CONCAT( t8.nombres,  ' ', t8.apellidos ) AS usuario FROM solicitudes t1 LEFT JOIN solicitudes_detalle t2 ON t2.idsolicitud = t1.idsolicitud LEFT JOIN oper_carrier t3 ON t3.codigo = t2.idcarrier LEFT JOIN oper_ciudades t5 ON t5.idciudad = t2.term_arri LEFT JOIN oper_ciudades t6 ON t6.idciudad = t2.term_dep LEFT JOIN clientes t7 ON t7.idcliente = t1.idcliente LEFT JOIN usuarios t8 ON t8.idusuario = t1.idusuario");
                    //$sql = sprintf("select t1.idcliente, t1.idusuario, concat(t3.nombres, ' ', t3.apellidos) as nombreusuario, t1.fechacreacion, t2.fecha_dep, t2.fecha_arri, t2.term_dep, concat(t4.ciudad, ', ', t4.pais, ' (', t4.iata, ')') As ciudad_dep, t2.term_arri, concat(t5.ciudad, ', ', t5.pais, ' (', t5.iata, ')') As ciudad_arri, t2.fecha_dep_1, t2.fecha_arri_1, t2.term_dep_1, concat(t6.ciudad, ', ', t6.pais, ' (', t6.iata, ')') As ciudad_dep_1, t2.term_arri_1, concat(t7.ciudad, ', ', t7.pais, ' (', t7.iata, ')') As ciudad_arri_1, t2.idcarrier, t8.nombre as carrier, t2.idprefvuelo, t9.nombre as preferenciavuelo, t2.idproyecto, t10.nombre as proyecto, t2.idsolicitud, t2.comentario from solicitudes t1 inner join solicitudes_detalle t2 on t1.idsolicitud = t2.idsolicitud inner join usuarios t3 on t1.idusuario = t3.idusuario inner join oper_ciudades t4 on t4.idciudad = t2.term_dep inner join oper_ciudades t5 on t5.idciudad = t2.term_arri inner join oper_ciudades t6 on t6.idciudad = t2.term_dep_1 inner join oper_ciudades t7 on t7.idciudad = t2.term_arri_1 inner join oper_carrier t8 on t8.codigo = t2.idcarrier inner join oper_pref_vuelos t9 on t9.idprefvuelo = t2.idprefvuelo inner join clientes_proyectos t10 on t10.idproyecto = t2.idproyecto");
                    $sql = sprintf("select t1.idsolicitud, t1.idsegmento, t1.fecha_inicial, t1.idciudad_recepcion, t2.ciudad, t1.fecha_final, t1.idciudad_entrega, t3.ciudad, t1.idtipoauto, t4.tipoauto from solicitudes_detalle_autos t1 left join oper_ciudades_meco t2 on t2.idciudad = t1.idciudad_recepcion left join oper_ciudades_meco t3 on t3.idciudad = t1.idciudad_entrega left join oper_autos t4 on t4.idtipoauto = t1.idtipoauto order by idsegmento");
                } else { 
                    //$sql = sprintf("SELECT t1.idcliente, t1.idsolicitud, t1.idusuario, t1.fechacreacion, t1.anulada, t2.fecha_arri, t2.fecha_dep, t3.nombre, t2.term_arri, CONCAT( t5.nombre,  ' (', t5.iata,  ')' ) AS nombre_term_arri, t2.term_dep, CONCAT( t6.nombre,  ' (', t6.iata,  ')' ) AS nombre_term_dep, t7.nombre, CONCAT( t8.nombres,  ' ', t8.apellidos ) AS usuario FROM solicitudes t1 LEFT JOIN solicitudes_detalle t2 ON t2.idsolicitud = t1.idsolicitud LEFT JOIN oper_carrier t3 ON t3.codigo = t2.idcarrier LEFT JOIN oper_ciudades t5 ON t5.idciudad = t2.term_arri LEFT JOIN oper_ciudades t6 ON t6.idciudad = t2.term_dep LEFT JOIN clientes t7 ON t7.idcliente = t1.idcliente LEFT JOIN usuarios t8 ON t8.idusuario = t1.idusuario Where t1.idsolicitud = '%d'",
                    //$sql = sprintf("select t1.idcliente, t1.idusuario, concat(t3.nombres, ' ', t3.apellidos) as nombreusuario, t1.fechacreacion, t2.fecha_dep, t2.fecha_arri, t2.term_dep, concat(t4.ciudad, ', ', t4.pais, ' (', t4.iata, ')') As ciudad_dep, t2.term_arri, concat(t5.ciudad, ', ', t5.pais, ' (', t5.iata, ')') As ciudad_arri, t2.fecha_dep_1, t2.fecha_arri_1, t2.term_dep_1, concat(t6.ciudad, ', ', t6.pais, ' (', t6.iata, ')') As ciudad_dep_1, t2.term_arri_1, concat(t7.ciudad, ', ', t7.pais, ' (', t7.iata, ')') As ciudad_arri_1, t2.idcarrier, t8.nombre as carrier, t2.idprefvuelo, t9.nombre as preferenciavuelo, t2.idproyecto, t10.nombre as proyecto, t2.idsolicitud, t2.comentario from solicitudes t1 inner join solicitudes_detalle t2 on t1.idsolicitud = t2.idsolicitud inner join usuarios t3 on t1.idusuario = t3.idusuario inner join oper_ciudades t4 on t4.idciudad = t2.term_dep inner join oper_ciudades t5 on t5.idciudad = t2.term_arri inner join oper_ciudades t6 on t6.idciudad = t2.term_dep_1 inner join oper_ciudades t7 on t7.idciudad = t2.term_arri_1 inner join oper_carrier t8 on t8.codigo = t2.idcarrier inner join oper_pref_vuelos t9 on t9.idprefvuelo = t2.idprefvuelo inner join clientes_proyectos t10 on t10.idproyecto = t2.idproyecto Where t1.idsolicitud = '%d'",
                    $sql = sprintf("select t1.idsolicitud, t1.idsegmento, t1.fecha_inicial, t1.idciudad_recepcion, t2.ciudad, t1.fecha_final, t1.idciudad_entrega, t2.ciudad, t1.idtipoauto, t4.tipoauto from solicitudes_detalle_autos t1 left join oper_ciudades_meco t2 on t2.idciudad = t1.idciudad_recepcion left join oper_ciudades_meco t3 on t3.idciudad = t1.idciudad_entrega left join oper_autos t4 on t4.idtipoauto = t1.idtipoauto Where t1.idsolicitud = '%d' order by idsegmento", 
                    mysql_real_escape_string($idsolicitud)
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
                $this->registrar_evento('Carga de reservas', $idusuario);
                return $arrayretorno;
            } else {
                $this->registrar_evento('Fallo de carga de reservas, (user:'.$idusuario.')', $idusuario);
                mysql_close();
                return null;
            }
        }catch (Exception $ex){
            mysql_close();
            $this->registrar_error(': '.$idusuario, $ex, 'rutas_buscar', $idusuario);
            return $ex;
        }
    }               
    
    public function solicitud_buscar_oferta($idoferta){
        include "config.php";
        try {
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);
            $sql = sprintf("SELECT t1.idoferta, t1.idsolicitud, t1.idagente, concat(t2.nombres, ' ', t2.apellidos) as nombreagente, t1.fechacreacion, t1.valoroferta, t1.titulooferta, t1.opciones, t1.detalle, t3.idusuario, t1.autorizada, t1.fecha_auth, t1.rechazada, t1.fecha_rech, t1.confirmada, t1.fechaconfirmacion FROM reservas_oferta t1 inner join agentes t2 on t2.idagente = t1.idagente INNER JOIN solicitudes t3 ON t3.idsolicitud = t1.idsolicitud where t1.idoferta = '%d'",
                    mysql_real_escape_string($idoferta)
                    );
            
            $result = mysql_query($sql);
            if(mysql_num_rows($result) > 0){
                for($i = 0; $i < mysql_num_rows($result); $i++) {
                    $filas = mysql_fetch_array($result);
                    $arrayretorno[$i] = $filas;
                    unset($filas);
                }
                mysql_close();
                $this->registrar_evento('Carga de oferta', $idusuario);
                return $arrayretorno;
            } else {
                $this->registrar_evento('Fallo de carga de oferta, (user:'.$idusuario.')', $idusuario);
                mysql_close();
                return null;
            }
        }catch (Exception $ex){
            mysql_close();
            $this->registrar_error(': '.$idusuario, $ex, 'rutas_buscar', $idusuario);
            return $ex;
        }        
    }
    
    public function solicitud_buscar_oferta_det($idoferta){
        include "config.php";
        try {
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);
            $sql = sprintf("SELECT idoferta, idsolicitud, idlinea, valor, autorizada from reservas_oferta_det where idoferta = '%d' order by idlinea",
                    mysql_real_escape_string($idoferta)
                    );
            $result = mysql_query($sql);
            if(mysql_num_rows($result) > 0){
                for($i = 0; $i < mysql_num_rows($result); $i++) {
                    $filas = mysql_fetch_array($result);
                    $arrayretorno[$i] = $filas;
                    unset($filas);
                }
                mysql_close();
                $this->registrar_evento('Carga de oferta', $idusuario);
                return $arrayretorno;
            } else {
                $this->registrar_evento('Fallo de carga de oferta, (user:'.$idusuario.')', $idusuario);
                mysql_close();
                return null;
            }
        }catch (Exception $ex){
            mysql_close();
            $this->registrar_error(': '.$idusuario, $ex, 'rutas_buscar', $idusuario);
            return $ex;
        }        
    }
    
    public function solicitud_buscar_oferta_finish($idsolicitud, $idoferta){
        include "config.php";
        try {
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);
            $sql = sprintf("SELECT t1.idsolicitud, t1.idoferta, t1.asunto, t1.detalle, t1.fechaenvio, t1.idusuario FROM reservas_oferta_finish t1 where t1.idsolicitud = '%d' and idoferta = '%d'",
                    mysql_real_escape_string($idsolicitud),
                    mysql_real_escape_string($idoferta)
                    );
            
            $result = mysql_query($sql);
            if(mysql_num_rows($result) > 0){
                for($i = 0; $i < mysql_num_rows($result); $i++) {
                    $filas = mysql_fetch_array($result);
                    $arrayretorno[$i] = $filas;
                    unset($filas);
                }
                mysql_close();
                $this->registrar_evento('Carga de oferta', $idusuario);
                return $arrayretorno;
            } else {
                $this->registrar_evento('Fallo de carga de oferta, (user:'.$idusuario.')', $idusuario);
                mysql_close();
                return null;
            }
        }catch (Exception $ex){
            mysql_close();
            $this->registrar_error(': '.$idusuario, $ex, 'rutas_buscar', $idusuario);
            return $ex;
        }        
    }

    public function solicitud_modificar_oferta($idusuario, $idagente, $idreserva, $valoroferta, $opciones, $detalle, $titulooferta) {
        include "config.php";
        try {
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);
            $sql = sprintf("update reservas_oferta set autorizada = 0, confirmada = 0, idusuario = '%d', fechacreacion = now(), opciones = '%d', detalle = '%s', titulooferta = '%s' where idoferta = '%d'",
            mysql_real_escape_string($idusuario),
            mysql_real_escape_string($opciones),
            mysql_real_escape_string($detalle),
            mysql_real_escape_string($titulooferta),
            mysql_real_escape_string($idreserva)
            );
            mysql_query($sql);
//            $result = mysql_insert_id();
            $result = $idreserva;
            mysql_close();
            $this->registrar_evento('Registro de modificacion de oferta '.$result, $idusuario);
            return $result;
            //return $sql;
        }catch (Exception $ex){
            mysql_close();
            $this->registrar_error('Error en registro de oferta: '.$idusuario, $ex, 'reserva_oferta', $idusuario);
            return null;
        }
    }
    
    public function solicitud_eliminar_oferta_det($idusuario, $idoferta, $idsolicitud) {
        include "config.php";
        try {
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);
//            $sql = sprintf("insert into reservas_oferta_det (idoferta, idsolicitud, idlinea, valor) values ('%d', '%d', '%d', '%s')",
            $sql = sprintf("delete from reservas_oferta_det where idoferta = '%d' and idsolicitud = '%d'",
            mysql_real_escape_string($idoferta),
            mysql_real_escape_string($idsolicitud)
            );
            mysql_query($sql);
            $result = mysql_insert_id();
            mysql_close();
            $this->registrar_evento('Registro de detalle de oferta '.$result, $idusuario);
            return $result;
        }catch (Exception $ex){
            mysql_close();
            $this->registrar_error('Error en registro de detalle de oferta: '.$idusuario, $ex, 'solicitud_registrar_oferta_det', $idusuario);
            return null;
        }
    }    
    
    public function solicitud_eliminar_flag($idusuario, $idoferta) {
        include "config.php";
        try {
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);
            $sql = sprintf("delete from reservas_oferta_flag where idoferta = '%d')",
            mysql_real_escape_string($idoferta)
            );
            mysql_query($sql);
            $result = mysql_insert_id();
            mysql_close();
            $this->registrar_evento('Eliminar los flags por confirmacion de oferta '.$result, $idusuario);
            return $result;
        }catch (Exception $ex){
            mysql_close();
            $this->registrar_error('Error en eliminar flags: '.$idusuario, $ex, 'solicitud_eliminar_flag', $idusuario);
            return null;
        }
    }                
    
    /************************/
    
    /* Informacion de reservas */       
    public function reservas_buscar($idreserva, $idusuario) {
        include "config.php";
        try {
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);
            if ($idreserva == null){
                $sql = sprintf("SELECT t1.idcliente, t1.idreserva, t1.idusuario, t1.fechacreacion, t1.anulada, t2.fecha_arri, t2.fecha_dep, t2.idcarrier, t3.nombre, t2.idruta, t4.ruta, t2.term_arri, CONCAT( t5.nombre,  ' (', t5.iata,  ')' ) AS nombre_term_arri, t2.term_dep, CONCAT( t6.nombre,  ' (', t6.iata,  ')' ) AS nombre_term_dep FROM reservas t1 LEFT JOIN reservas_detalle t2 ON t2.idreserva = t1.idreserva LEFT JOIN oper_carrier t3 ON t3.idcarrier = t2.idcarrier LEFT JOIN oper_rutas t4 ON t4.idruta = t2.idruta LEFT JOIN oper_ciudades_meco t5 ON t5.idciudad = t2.term_arri LEFT JOIN oper_ciudades_meco t6 ON t6.idciudad = t2.term_dep");
            } else { 
                $sql = sprintf("SELECT t1.idcliente, t1.idreserva, t1.idusuario, t1.fechacreacion, t1.anulada, t2.fecha_arri, t2.fecha_dep, t2.idcarrier, t3.nombre, t2.idruta, t4.ruta, t2.term_arri, CONCAT( t5.nombre,  ' (', t5.iata,  ')' ) AS nombre_term_arri, t2.term_dep, CONCAT( t6.nombre,  ' (', t6.iata,  ')' ) AS nombre_term_dep FROM reservas t1 LEFT JOIN reservas_detalle t2 ON t2.idreserva = t1.idreserva LEFT JOIN oper_carrier t3 ON t3.idcarrier = t2.idcarrier LEFT JOIN oper_rutas t4 ON t4.idruta = t2.idruta LEFT JOIN oper_ciudades_meco t5 ON t5.idciudad = t2.term_arri LEFT JOIN oper_ciudades_meco t6 ON t6.idciudad = t2.term_dep Where t1.idreserva = '%d'",
                mysql_real_escape_string($idreserva)
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
                $this->registrar_evento('Carga de reservas', $idusuario);
                return $arrayretorno;
            } else {
                $this->registrar_evento('Fallo de carga de reservas, (user:'.$idusuario.')', $idusuario);
                mysql_close();
                return null;
            }
        }catch (Exception $ex){
            mysql_close();
            $this->registrar_error(': '.$idusuario, $ex, 'rutas_buscar', $idusuario);
            return $ex;
        }
    }           
    
    public function reservas_buscar_oferta($idreserva){
        
    }
    /************************/

    /* Informacion de presets */       
    public function presets_tipo_buscar($idusuario, $idtipopreset = null) {
        include "config.php";
        try {
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);
            if ($idreserva == null){
                $sql = sprintf("SELECT idtipopreset, titulo FROM presets_tipo");
            } else { 
                $sql = sprintf("SELECT idtipopreset, titulo FROM presets_tipo Where idtipopreset = '%d'",
                mysql_real_escape_string($idtipopreset)
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
                $this->registrar_evento('Carga de presets de usuario', $idusuario);
                return $arrayretorno;
            } else {
                $this->registrar_evento('Fallo de carga de presets, (user:'.$idusuario.')', $idusuario);
                mysql_close();
                return null;
            }
        }catch (Exception $ex){
            mysql_close();
            $this->registrar_error(': '.$idusuario, $ex, 'rutas_buscar', $idusuario);
            return $ex;
        }
    }           
    
    public function presets_buscar($idpreset = 0, $idtipopreset = 0, $idusuario = 0) {
        include "config.php";
        try {
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);
            if ($idreserva == null){
                $sql = sprintf("SELECT t1.idpreset, t1.idtipopreset, t2.titulo as tipopreset, t1.preset FROM presets t1 left join presets_tipo t2 on t2.idtipopreset = t1.idtipopreset");
                            } else { 
                $sql = sprintf("SELECT t1.idcliente, t1.idreserva, t1.idusuario, t1.fechacreacion, t1.anulada, t2.fecha_arri, t2.fecha_dep, t2.idcarrier, t3.nombre, t2.idruta, t4.ruta, t2.term_arri, CONCAT( t5.nombre,  ' (', t5.iata,  ')' ) AS nombre_term_arri, t2.term_dep, CONCAT( t6.nombre,  ' (', t6.iata,  ')' ) AS nombre_term_dep FROM reservas t1 LEFT JOIN reservas_detalle t2 ON t2.idreserva = t1.idreserva LEFT JOIN oper_carrier t3 ON t3.idcarrier = t2.idcarrier LEFT JOIN oper_rutas t4 ON t4.idruta = t2.idruta LEFT JOIN oper_ciudades_meco t5 ON t5.idciudad = t2.term_arri LEFT JOIN oper_ciudades_meco t6 ON t6.idciudad = t2.term_dep Where t1.idreserva = '%d'",
                mysql_real_escape_string($idreserva)
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
                $this->registrar_evento('Carga de reservas', $idusuario);
                return $arrayretorno;
            } else {
                $this->registrar_evento('Fallo de carga de reservas, (user:'.$idusuario.')', $idusuario);
                mysql_close();
                return null;
            }
        }catch (Exception $ex){
            mysql_close();
            $this->registrar_error(': '.$idusuario, $ex, 'rutas_buscar', $idusuario);
            return $ex;
        }
    }           
    
    public function presets_registrar($idtipopreset, $preset) {
        include "config.php";
        try {
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);
            $sql = sprintf("insert into presets (idtipopreset, preset) values ('%d', '%s')",
            mysql_real_escape_string($idtipopreset),
            mysql_real_escape_string($preset)
            );
            $result = mysql_query($sql);
            mysql_close();
            $this->registrar_evento('Registro de preset', $idusuario);
            return "OK";
        }catch (Exception $ex){
            mysql_close();
            $this->registrar_error('Error en registro de preset'.$idusuario, $ex, 'presets_registrar', $idusuario);
            return $ex;
        }
    }                
    
    public function presets_eliminar($idpreset, $idusuario) {
        include "config.php";
        try {
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);
            $sql = sprintf("Delete from presets where idpreset = '%d'",
            mysql_real_escape_string($idpreset)
            );
            $result = mysql_query($sql);
            mysql_close();
            $this->registrar_evento('Eliminar Preset', $idusuario);
            return "OK";
        } catch (Exception $ex) {
            mysql_close();
            $this->registrar_error('Error en eliminar preset '.$idusuario, $ex, 'preset_eliminar', $idusuario);
            return $ex;
        }
    }                
    /************************/
    
    /* Informacion de Usuarios */
    
    public function usuario_buscar($idusuario) {
        include "config.php";
        try {
            //devuelve 35 campos actualmente
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);
            if ($idusuario == null) {
                $sql = sprintf("select t1.idusuario, t1.idcategoria, t2.nombre AS categoria, t1.usuario, t1.nombres, t1.apellidos, CONCAT( t1.nombres,  ' ', t1.apellidos ) AS fullname, t1.cargo, t1.email, t1.idcliente, t3.nombre AS nombrecliente, t1.idagente, t1.contactoemergencia, t1.idnacionalidad1, t1.npasaporte1, t1.pass1fechavenc, t1.idnacionalidad2, t1.npasaporte2, t1.pass2fechavenc, t1.visaamericana, t1.visafechavenc, t1.imagen, t1.idempleado, t1.asignacion, CONCAT( t4.nombres,  ' ', t4.apellidos ) AS agente, t1.last_login, t1.tipovisa, t1.vacunafiebreamarilla, t1.paisemision, t1.fechavencimiento, t1.intracompany, t1.alternatemail, t1.asistenteemail, t1.copyemail, t1.usuario, t1.numeroemergencia from usuarios t1 left join usuarios_categoria t2 on t1.idcategoria = t2.idcategoria left join clientes t3 on t3.idcliente = t1.idcliente left join agentes t4 on t4.idagente = t1.idagente");                
            } else {
                $sql = sprintf("select t1.idusuario, t1.idcategoria, t2.nombre AS categoria, t1.usuario, t1.nombres, t1.apellidos, CONCAT( t1.nombres,  ' ', t1.apellidos ) AS fullname, t1.cargo, t1.email, t1.idcliente, t3.nombre AS nombrecliente, t1.idagente, t1.contactoemergencia, t1.idnacionalidad1, t1.npasaporte1, t1.pass1fechavenc, t1.idnacionalidad2, t1.npasaporte2, t1.pass2fechavenc, t1.visaamericana, t1.visafechavenc, t1.imagen, t1.idempleado, t1.asignacion, CONCAT( t4.nombres,  ' ', t4.apellidos ) AS agente, t1.last_login, t1.tipovisa, t1.vacunafiebreamarilla, t1.paisemision, t1.fechavencimiento, t1.intracompany, t1.alternatemail, t1.asistenteemail, t1.copyemail, t1.usuario, t1.numeroemergencia from usuarios t1 left join usuarios_categoria t2 on t1.idcategoria = t2.idcategoria left join clientes t3 on t3.idcliente = t1.idcliente left join agentes t4 on t4.idagente = t1.idagente where t1.idusuario = '%d'",
                mysql_real_escape_string($idusuario)
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
                $this->registrar_evento('Carga de perfil', $idusuario);
                return $arrayretorno;
            } else {
                $this->registrar_evento('Fallo de carga de perfil, (user:'.$idusuario.')', $idusuario);
                mysql_close();
                return null;
            }
        }catch (Exception $ex){
            mysql_close();
            $this->registrar_error(': '.$idusuario, $ex, 'usuario_buscar', $idusuario);
            return $ex;
        }
    }
    
    public function usuario_buscar_empresa($idempresa = null) {
        include "config.php";
        try {
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);
            if ($idempresa == null) {
                $sql = sprintf("SELECT idusuario, nombres, apellidos , usuario, cargo,email, idcliente FROM usuarios");
            } else { 
              $sql = sprintf("SELECT idusuario, nombres, apellidos , usuario, cargo,email, idcliente FROM usuarios where idcliente = '%d'",
               mysql_real_escape_string($idempresa)
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
                $this->registrar_evento('Carga de perfil', $idusuario);
                return $arrayretorno;
            } else {
                $this->registrar_evento('Fallo de carga de perfil, (user:'.$idusuario.')', $idusuario);
                mysql_close();
                return null;
            }
        }catch (Exception $ex){
            mysql_close();
            $this->registrar_error(': '.$idusuario, $ex, 'usuario_buscar', $idusuario);
            return $ex;
        }
    }    
    
    public function usuario_registrar($idusuario, $categoria, $usuario, $nombres, $apellidos, $cargo, $email, $idcliente, $idagente, $password, $contactoemergencia, $idnacionalidad1, $npasaporte1, $pass1fechavenc, $idnacionalidad2, $npasaporte2, $pass2fechavenc, $visaamericana, $vencimientovisa, $asignacion, $tipovisa, $vacunafiebreamarilla, $emisionvacuna, $vencimientovacuna, $intracompany, $alternatemail, $asistenteemail, $copymail, $numeroemergencia ,$imagen = null) {
        include "../config.php";
        try {
            //Compara si la imagen del usuario viene vacia, llama la tabla info_gral y asigna al perfil la imagen default
            if ($imagen == null){
                $defautls = $this->Defaults_buscar();
                $imagen = $defautls[0][0];
            }            
            
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);
            $sql = sprintf("insert into usuarios (idcategoria, usuario, nombres, apellidos, cargo, email, imagen, idcliente, idagente, password, contactoemergencia, idnacionalidad1, npasaporte1, pass1fechavenc, idnacionalidad2, npasaporte2, pass2fechavenc, visaamericana, visafechavenc, asignacion, tipovisa, vacunafiebreamarilla, paisemision, fechavencimiento, intracompany, alternatemail, asistenteemail, copyemail, numeroemergencia) values ('%d', '%s', '%s', '%s', '%s', '%s', '%s', '%d', '%d', md5('%s'), '%s', '%d', '%s', '%s', '%d', '%s', '%s', '%d', '%s', '%d', '%s', '%d', '%d', '%s', '%d', '%s', '%s', '%s', '%s')",
            mysql_real_escape_string($categoria),
            mysql_real_escape_string($usuario),
            mysql_real_escape_string($nombres),
            mysql_real_escape_string($apellidos),
            mysql_real_escape_string($cargo),
            mysql_real_escape_string($email),
            mysql_real_escape_string($imagen),
            mysql_real_escape_string($idcliente),
            mysql_real_escape_string($idagente),
            mysql_real_escape_string($password),
            mysql_real_escape_string($contactoemergencia), 
            mysql_real_escape_string($idnacionalidad1), 
            mysql_real_escape_string($npasaporte1), 
            mysql_real_escape_string($pass1fechavenc), 
            mysql_real_escape_string($idnacionalidad2), 
            mysql_real_escape_string($npasaporte2), 
            mysql_real_escape_string($pass2fechavenc), 
            mysql_real_escape_string($visaamericana), 
            mysql_real_escape_string($vencimientovisa), 
            mysql_real_escape_string($asignacion),
            mysql_real_escape_string($tipovisa), 
            mysql_real_escape_string($vacunafiebreamarilla),
            mysql_real_escape_string($emisionvacuna),
            mysql_real_escape_string($vencimientovacuna),
            mysql_real_escape_string($intracompany),
            mysql_real_escape_string($alternatemail),
            mysql_real_escape_string($asistenteemail),
            mysql_real_escape_string($copymail),
            mysql_real_escape_string($numeroemergencia)
            );
            mysql_query($sql);
            $result = mysql_insert_id();
            mysql_close();
            $this->registrar_evento('Registro de usuario', $idusuario);
            //return null;
            return $result;
        }catch (Exception $ex){
            mysql_close();
            $this->registrar_error('Error en registro de usuario '.$idusuario, $ex, 'usuario_registrar', $idusuario);
            return $ex;
        }
    }                

    public function usuario_modificar($idusuario, $categoria, $usuario, $nombres, $apellidos, $cargo, $email, $idcliente, $idagente, $password, $contactoemergencia, $idnacionalidad1, $npasaporte1, $pass1fechavenc, $idnacionalidad2, $npasaporte2, $pass2fechavenc, $visaamericana, $vencimientovisa, $asignacion, $tipovisa, $vacunafiebreamarilla, $emisionvacuna, $vencimientovacuna, $intracompany, $alternatemail, $asistenteemail, $copymail, $numeroemergencia, $imagen = null) {
        include "../config.php";
        try {
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);
            if ($imagen == null) {
                $sql = sprintf("update usuarios set idcategoria = '%d', nombres = '%s', apellidos = '%s', cargo = '%s', email= '%s', idcliente = '%d', idagente = '%d', contactoemergencia = '%s', idnacionalidad1 = '%d', npasaporte1 = '%s', pass1fechavenc = '%s', idnacionalidad2 = '%d', npasaporte2 = '%s', pass2fechavenc = '%s', visaamericana = '%d', visafechavenc = '%s', asignacion = '%d', tipovisa = '%s', vacunafiebreamarilla = '%d', paisemision = '%d', fechavencimiento = '%s', intracompany = '%d', alternatemail = '%s', asistenteemail = '%s', copyemail = '%s', numeroemergencia = '%s' WHERE idusuario = '%d'",
                mysql_real_escape_string($categoria),
                mysql_real_escape_string($nombres),
                mysql_real_escape_string($apellidos),
                mysql_real_escape_string($cargo),
                mysql_real_escape_string($email),
                mysql_real_escape_string($idcliente),
                mysql_real_escape_string($idagente),
                mysql_real_escape_string($contactoemergencia), 
                mysql_real_escape_string($idnacionalidad1), 
                mysql_real_escape_string($npasaporte1), 
                mysql_real_escape_string($pass1fechavenc), 
                mysql_real_escape_string($idnacionalidad2), 
                mysql_real_escape_string($npasaporte2), 
                mysql_real_escape_string($pass2fechavenc), 
                mysql_real_escape_string($visaamericana), 
                mysql_real_escape_string($vencimientovisa), 
                mysql_real_escape_string($asignacion),
                mysql_real_escape_string($tipovisa), 
                mysql_real_escape_string($vacunafiebreamarilla),
                mysql_real_escape_string($emisionvacuna),
                mysql_real_escape_string($vencimientovacuna),
                mysql_real_escape_string($intracompany),
                mysql_real_escape_string($alternatemail),
                mysql_real_escape_string($asistenteemail),                        
                mysql_real_escape_string($copymail),                        
                mysql_real_escape_string($numeroemergencia),             
                mysql_real_escape_string($usuario)              
                );                                    
            } else {
                $sql = sprintf("update usuarios set idcategoria = '%d', nombres = '%s', apellidos = '%s', cargo = '%s', email= '%s', imagen = '%s', idcliente = '%d', idagente = '%d', contactoemergencia = '%s', idnacionalidad1 = '%d', npasaporte1 = '%s', pass1fechavenc = '%s', idnacionalidad2 = '%d', npasaporte2 = '%s', pass2fechavenc = '%s', visaamericana = '%d', visafechavenc = '%s', asignacion = '%d', tipovisa = '%s', vacunafiebreamarilla = '%d', paisemision = '%d', fechavencimiento = '%s', intracompany = '%d', alternatemail = '%s', asistenteemail = '%s', copyemail = '%s', numeroemergencia = '%s' WHERE idusuario = '%d'",
                mysql_real_escape_string($categoria),
                mysql_real_escape_string($nombres),
                mysql_real_escape_string($apellidos),
                mysql_real_escape_string($cargo),
                mysql_real_escape_string($email),
                mysql_real_escape_string($imagen),
                mysql_real_escape_string($idcliente),
                mysql_real_escape_string($idagente),
                mysql_real_escape_string($contactoemergencia), 
                mysql_real_escape_string($idnacionalidad1), 
                mysql_real_escape_string($npasaporte1), 
                mysql_real_escape_string($pass1fechavenc), 
                mysql_real_escape_string($idnacionalidad2), 
                mysql_real_escape_string($npasaporte2), 
                mysql_real_escape_string($pass2fechavenc), 
                mysql_real_escape_string($visaamericana), 
                mysql_real_escape_string($vencimientovisa), 
                mysql_real_escape_string($asignacion),
                mysql_real_escape_string($tipovisa), 
                mysql_real_escape_string($vacunafiebreamarilla),
                mysql_real_escape_string($emisionvacuna),
                mysql_real_escape_string($vencimientovacuna),
                mysql_real_escape_string($intracompany),
                mysql_real_escape_string($alternatemail),
                mysql_real_escape_string($asistenteemail),                        
                mysql_real_escape_string($copymail),                                                
                mysql_real_escape_string($numeroemergencia),              
                mysql_real_escape_string($usuario)              
                );                                    
            }
            $result = mysql_query($sql);
            mysql_close();
            $this->registrar_evento('Registro de usuario', $idusuario);
            //return null;
            return $result;
        }catch (Exception $ex){
            mysql_close();
            $this->registrar_error('Error en registro de usuario '.$idusuario, $ex, 'usuario_registrar', $idusuario);
            return $ex;
        }
    }
         
    public function usuario_preset_add($idusuario, $idpreset, $valor){
        include "config.php";
        try {
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);
            $sql = sprintf("insert into usuarios_presets (idusuario, idpreset, valor) values ('%d', '%d', '%s')",
            mysql_real_escape_string($idusuario),
            mysql_real_escape_string($idpreset),
            mysql_real_escape_string($valor)
            );
            $result = mysql_query($sql);
            mysql_close();
            $this->registrar_evento('Registro de preset usuario', $idusuario);
            return null;
        }catch (Exception $ex){
            mysql_close();
            $this->registrar_error('Error en registro de usuario '.$idusuario, $ex, 'usuario_registrar', $idusuario);
            return $ex;
        }
    }
    
    public function usuario_preset_remove($idusuario, $idpreset){
        include "config.php";
        try {
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);
            $sql = sprintf("delete from usuarios_presets where idusuario = '%d' and idpreset = '%d'",
            mysql_real_escape_string($idusuario),
            mysql_real_escape_string($idpreset)
            );
            $result = mysql_query($sql);
            mysql_close();
            $this->registrar_evento('Registro de usuario', $idusuario);
            return null;
        }catch (Exception $ex){
            mysql_close();
            $this->registrar_error('Error en registro de usuario '.$idusuario, $ex, 'usuario_registrar', $idusuario);
            return $ex;
        }
    }

    public function usuario_preset_buscar($idusuario) {
        include "config.php";
        try {
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);
            if ($idusuario == null) {
                $sql = sprintf("select t1.idusuario, t1.idpreset, t2.preset, t1.valor from usuarios_presets t1 left join presets t2 on t1.idpreset = t2.idpreset");                
            } else {
                $sql = sprintf("select t1.idusuario, t1.idpreset, t2.preset, t1.valor from usuarios_presets t1 left join presets t2 on t1.idpreset = t2.idpreset where t1.idusuario = '%d'",
                mysql_real_escape_string($idusuario)
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
                $this->registrar_evento('Carga de perfil', $idusuario);
                return $arrayretorno;
            } else {
                $this->registrar_evento('Fallo de carga de perfil, (user:'.$idusuario.')', $idusuario);
                mysql_close();
                return null;
            }
        }catch (Exception $ex){
            mysql_close();
            $this->registrar_error(': '.$idusuario, $ex, 'usuario_buscar', $idusuario);
            return $ex;
        }
    }
    
    public function usuario_categoria_buscar($idusuario, $idacategoria = null) {
        include "config.php";
        try {
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);
            if ($icategoria == null) {
                $sql = sprintf("SELECT idcategoria, nombre FROM usuarios_categoria");                
            } else {
                $sql = sprintf("SELECT idcategoria, nombre FROM usuarios_categoria WHERE idcategoria = '%d'",
                mysql_real_escape_string($idcategoria)
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
                $this->registrar_evento('Carga de Categorias de usuario', $idusuario);
                return $arrayretorno;
            } else {
                $this->registrar_evento('Fallo de carga de categorias de usuario, (user:'.$idusuario.')', $idusuario);
                mysql_close();
                return null;
            }
        }catch (Exception $ex){
            mysql_close();
            $this->registrar_error(': '.$idusuario, $ex, 'usuario_categoria_buscar', $idusuario);
            return $ex;
        }
    }

    public function usuario_autorizaciones_add($usuario, $idusuario, $autonomo, $idnivel1, $idnivel2, $idnivel3){
        include "config.php";
        try {
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);
            $sql = sprintf("insert into usuarios_autorizaciones (idusuario, autonomo, idnivel1, idnivel2, idnivel3) values ('%d', '%d', '%d', '%d', '%d')",
            mysql_real_escape_string($idusuario),
            mysql_real_escape_string($autonomo),
            mysql_real_escape_string($idnivel1),
            mysql_real_escape_string($idnivel2),
            mysql_real_escape_string($idnivel3)
            );
            $result = mysql_query($sql);
            mysql_close();
            $this->registrar_evento('Registro de notificacion de usuario', $usuario);
            return $sql;
        }catch (Exception $ex){
            mysql_close();
            $this->registrar_error('Error en registro de usuario '.$usuario, $ex, 'usuario_registrar', $usuario);
            return $ex;
        }
    }
    
    public function usuario_autorizaciones_update($usuario, $idusuario, $autonomo, $idnivel1, $idnivel2, $idnivel3){
        include "config.php";
        try {
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);
            $sql = sprintf("update usuarios_autorizaciones set autonomo = '%d', idnivel1 = '%d', idnivel2 = '%d', idnivel3 = '%d' where idusuario = '%d'",
            mysql_real_escape_string($autonomo),
            mysql_real_escape_string($idnivel1),
            mysql_real_escape_string($idnivel2),
            mysql_real_escape_string($idnivel3),
            mysql_real_escape_string($idusuario)
            );
            $result = mysql_query($sql);
            mysql_close();
            $this->registrar_evento('Registro de usuario', $usuario);
            return $sql;
        }catch (Exception $ex){
            mysql_close();
            $this->registrar_error('Error en registro de usuario '.$usuario, $ex, 'usuario_registrar', $usuario);
            return $ex;
        }
    }

    public function usuario_autorizaciones_buscar($idusuario) {
        include "config.php";
        try {
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);
            $sql = sprintf("SELECT t1.idusuario, t2.email, t1.autonomo, t1.idnivel1, t3.email as email1, t1.idnivel2, t4.email as email2, t1.idnivel3, t5.email as email3, t6.email as mailagente FROM usuarios_autorizaciones t1 left join usuarios t2 on t2.idusuario = t1.idusuario left join usuarios t3 on t3.idusuario = t1.idnivel1 left join usuarios t4 on t4.idusuario = t1.idnivel2 left join usuarios t5 on t5.idusuario = t1.idnivel3 left join agentes t6 on t6.idagente = t2.idagente WHERE t1.idusuario = '%d'",
            mysql_real_escape_string($idusuario)
            );
            $result = mysql_query($sql);
            if(mysql_num_rows($result) > 0){
                for($i = 0; $i < mysql_num_rows($result); $i++) {
                    $filas = mysql_fetch_array($result);
                    $arrayretorno[$i] = $filas;
                    unset($filas);
                }
                mysql_close();
                $this->registrar_evento('Carga de autorizaciones', $idusuario);
                return $arrayretorno;
            } else {
                $this->registrar_evento('Fallo de carga de autorizaciones, (user:'.$idusuario.')', $idusuario);
                mysql_close();
                return null;
            }
        }catch (Exception $ex){
            mysql_close();
            $this->registrar_error(': '.$idusuario, $ex, 'usuario_autorizaciones', $idusuario);
            return $ex;
        }
    }    
    
    public function usuario_asignaciones_add($idusuario, $idproyecto, $fechaasignacion, $monto){
        include "config.php";
        try {
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);
            $sql = sprintf("insert into usuarios_asignaciones (idusuario, idproyecto, fechaasignacion, monto) values ('%d', '%d', '%s', '%d')",
            mysql_real_escape_string($idusuario),
            mysql_real_escape_string($idproyecto),
            mysql_real_escape_string($fechaasignacion),
            mysql_real_escape_string($monto)
            );
            $result = mysql_query($sql);
            mysql_close();
            $proyecto = $this->cliente_proyecto_buscar($idproyecto);
            $this->cliente_proyecto_update_saldo($proyecto[0][1], $proyecto[0][0], $proyecto[0][3], $monto);
            $this->registrar_evento('Registro de notificacion de usuario', $usuario);
            return $sql;
        }catch (Exception $ex){
            mysql_close();
            $this->registrar_error('Error en registro de usuario '.$usuario, $ex, 'usuario_registrar', $usuario);
            return $ex;
        }
    }
    
    public function usuario_asignaciones_update($usuario, $idusuario, $autonomo, $idnivel1, $idnivel2, $idnivel3){
        include "config.php";
        try {
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);
            $sql = sprintf("update usuarios_autorizaciones set autonomo = '%d', idnivel1 = '%d', idnivel2 = '%d', idnivel3 = '%d' where idusuario = '%d'",
            mysql_real_escape_string($autonomo),
            mysql_real_escape_string($idnivel1),
            mysql_real_escape_string($idnivel2),
            mysql_real_escape_string($idnivel3),
            mysql_real_escape_string($idusuario)
            );
            $result = mysql_query($sql);
            mysql_close();
            $this->registrar_evento('Registro de usuario', $usuario);
            return $sql;
        }catch (Exception $ex){
            mysql_close();
            $this->registrar_error('Error en registro de usuario '.$usuario, $ex, 'usuario_registrar', $usuario);
            return $ex;
        }
    }

    public function usuario_asignaciones_buscar($idusuario, $idempresa, $idproyecto = null) {
        include "config.php";
        try {
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);
    
            
            $sql = sprintf("SELECT t1.idusuario, t1.idproyecto, t2.nombre, t2.codproyecto, t2.idcliente, t1.monto FROM usuarios_asignaciones t1 inner join clientes_proyectos t2 on t2.idproyecto = t1.idproyecto WHERE t1.idusuario = '%d' and t2.idcliente = '%d'",
            mysql_real_escape_string($idusuario),
            mysql_real_escape_string($idempresa)
            );
            $result = mysql_query($sql);
            if(mysql_num_rows($result) > 0){
                for($i = 0; $i < mysql_num_rows($result); $i++) {
                    $filas = mysql_fetch_array($result);
                    $arrayretorno[$i] = $filas;
                    unset($filas);
                }
                mysql_close();
                $this->registrar_evento('Carga de autorizaciones', $idusuario);
                return $arrayretorno;
            } else {
                $this->registrar_evento('Fallo de carga de autorizaciones, (user:'.$idusuario.')', $idusuario);
                mysql_close();
                return null;
            }
        }catch (Exception $ex){
            mysql_close();
            $this->registrar_error(': '.$idusuario, $ex, 'usuario_autorizaciones', $idusuario);
            return $ex;
        }
    }
    
    public function usuario_grupos_add($nombre, $mail, $idusuario){
        include "config.php";
        try {
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);
            $sql = sprintf("insert into usuarios_grupos (nombre, email) values ('%s', '%s')",
            mysql_real_escape_string($nombre),
            mysql_real_escape_string($mail)
            );
            $result = mysql_query($sql);
            mysql_close();
            $this->registrar_evento('Registro de preset usuario', $idusuario);
            return null;
        }catch (Exception $ex){
            mysql_close();
            $this->registrar_error('Error en registro de usuario '.$idusuario, $ex, 'usuario_registrar', $idusuario);
            return $ex;
        }
    }
    
    public function usuario_grupos_remove($idgrupo, $idusuario){
        include "config.php";
        try {
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);
            $sql = sprintf("delete from usuarios_grupos where idgrupo = '%d'",
            mysql_real_escape_string($idgrupo)
            );
            $result = mysql_query($sql);
            mysql_close();
            $this->registrar_evento('Registro de usuario', $idusuario);
            return null;
        }catch (Exception $ex){
            mysql_close();
            $this->registrar_error('Error en registro de usuario '.$idusuario, $ex, 'usuario_registrar', $idusuario);
            return $ex;
        }
    }

    public function usuario_grupos_buscar($modobusqueda, $valor, $idusuario) {
        include "config.php";
        try {
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);
            
            switch ($modobusqueda) {
                case 0:
                    $sql = sprintf("SELECT t1.idgrupo, t1.nombre, t1.email FROM usuarios_grupos t1");                                    
                    break;
                case 1:
                    $sql = sprintf("SELECT t1.idgrupo, t1.nombre, t1.email FROM usuarios_grupos t1 where t1.idgrupo = '%d'", 
                    mysql_real_escape_string($valor)
                    );                    
                    break;
            }
            
            $result = mysql_query($sql);
            if(mysql_num_rows($result) > 0){
                for($i = 0; $i < mysql_num_rows($result); $i++) {
                    $filas = mysql_fetch_array($result);
                    $arrayretorno[$i] = $filas;
                    unset($filas);
                }
                mysql_close();
                $this->registrar_evento('Carga de grupos', $idusuario);
                return $arrayretorno;
            } else {
                $this->registrar_evento('Fallo de carga de grupos, (user:'.$idusuario.')', $idusuario);
                mysql_close();
                return null;
            }
        }catch (Exception $ex){
            mysql_close();
            $this->registrar_error(': '.$idusuario, $ex, 'usuario_grupos_buscar', $idusuario);
            return $ex;
        }
    }

    
    public function usuario_grupos_det_add($idgrupo, $idusuario, $fechaasignacion, $idusuarioreg){
        include "config.php";
        try {
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);
            $sql = sprintf("insert into usuarios_grupos_detalle (idgrupo, idusuario, fechaasignacion) values ('%d', '%d', now())",
            mysql_real_escape_string($idgrupo),
            mysql_real_escape_string($idusuario)
            );
            $result = mysql_query($sql);
            mysql_close();
            $this->registrar_evento('Registro de preset usuario', $idusuarioreg);
            return null;
        }catch (Exception $ex){
            mysql_close();
            $this->registrar_error('Error en registro de usuario '.$idusuarioreg, $ex, 'usuario_registrar', $idusuario);
            return $ex;
        }
    }
    
    public function usuario_grupos_det_remove($idgrupo, $idusuario, $idusuarioreg){
        include "config.php";
        try {
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);
            $sql = sprintf("delete from usuarios_grupos_detalle where idgrupo = '%d' and idusuario = '%d'",
            mysql_real_escape_string($idgrupo),
            mysql_real_escape_string($idusuario)
            );
            $result = mysql_query($sql);
            mysql_close();
            $this->registrar_evento('Registro de usuario', $idusuarioreg);
            return null;
        }catch (Exception $ex){
            mysql_close();
            $this->registrar_error('Error en registro de usuario '.$idusuarioreg, $ex, 'usuario_registrar', $idusuario);
            return $ex;
        }
    }

    public function usuario_grupos_det_buscar($modobusqueda, $valor, $idusuario) {
        include "config.php";
        try {
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);
            
            switch ($modobusqueda) { //0 = todos los usuarios, 1 = usuarios de grupo especifico, 2 = usuarios que no estan en ese grupo
                case 0:
                    $sql = sprintf("SELECT t1.idgrupo, t1.idusuario, concat(t2.nombres, ' ', t2.apellidos) as nombreusuario, t2.email, t1.fechaasignacion FROM usuarios_grupos_detalle t1 INNER JOIN usuarios t2 on t2.idusuario = t1.idusuario");                                    
                    break;
                case 1:
                    $sql = sprintf("SELECT t1.idgrupo, t1.idusuario, concat(t2.nombres, ' ', t2.apellidos) as nombreusuario, t2.email, t1.fechaasignacion FROM usuarios_grupos_detalle t1 INNER JOIN usuarios t2 on t2.idusuario = t1.idusuario WHERE t1.idgrupo = '%d'", 
                    mysql_real_escape_string($valor)
                    );                    
                    break;
                case 2:
                    $sql = sprintf("SELECT t2.idgrupo, t1.idusuario, CONCAT( t1.nombres,  ' ', t1.apellidos ) AS nombreusuario FROM usuarios t1 LEFT JOIN usuarios_grupos_detalle t2 ON t2.idusuario = t1.idusuario");             
                    break;
            }
            
            $result = mysql_query($sql);
            if(mysql_num_rows($result) > 0){
                for($i = 0; $i < mysql_num_rows($result); $i++) {
                    $filas = mysql_fetch_array($result);
                    $arrayretorno[$i] = $filas;
                    unset($filas);
                }
                mysql_close();
                $this->registrar_evento('Carga de Usuarios de grupos', $idusuario);
                return $arrayretorno;
            } else {
                $this->registrar_evento('Fallo de carga usuarios de grupos, (user:'.$idusuario.')', $idusuario);
                mysql_close();
                return null;
            }
        }catch (Exception $ex){
            mysql_close();
            $this->registrar_error(': '.$idusuario, $ex, 'usuario_grupos_det_buscar', $idusuario);
            return $ex;
        }
    }    
    
    
    public function status_solicitudes($idusuario, $idpararegistro, $tipousuario, $idcliente = null) {
        include "config.php";
        try {
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);
            //$sql = sprintf("SELECT t1.idcliente, t1.idsolicitud, t1.idusuario, t1.fechacreacion, t1.anulada, t2.fecha_arri, t2.fecha_dep, t2.idcarrier, t3.nombre, t2.idcarrier, t4.ruta, t2.term_arri, CONCAT( t5.nombre,  ' (', t5.iata,  ')' ) AS nombre_term_arri, t2.term_dep, CONCAT( t6.nombre,  ' (', t6.iata,  ')' ) AS nombre_term_dep FROM solicitudes t1 LEFT JOIN solicitudes_detalle t2 ON t2.idsolicitud = t1.idsolicitud LEFT JOIN oper_carrier t3 ON t3.idcarrier = t2.idcarrier LEFT JOIN oper_rutas t4 ON t4.idruta = t2.idcarrier LEFT JOIN oper_ciudades t5 ON t5.idciudad = t2.term_arri LEFT JOIN oper_ciudades t6 ON t6.idciudad = t2.term_dep WHERE t1.idusuario = '%d' AND NOT EXISTS (SELECT * FROM reservas_oferta t7 WHERE t7.idsolicitud = t2.idsolicitud)",
            switch($tipousuario){
                case 0:
                    $sql = sprintf("SELECT t1.idcliente, t1.idsolicitud, t1.idusuario, t1.fechacreacion, t1.anulada, t1.idcarrier, t2.nombre as carrier, t1.idproyecto, t3.nombre as proyecto, t8.nombre, concat(t9.nombres, ' ', t9.apellidos) as pasajero FROM solicitudes t1 LEFT JOIN oper_carrier t2 ON t2.codigo = t1.idcarrier LEFT JOIN clientes_proyectos t3 ON t3.idproyecto = t1.idproyecto LEFT JOIN clientes t8 ON t8.idcliente = t1.idcliente LEFT JOIN usuarios t9 on t9.idusuario = t1.idusuario WHERE t1.anulada = 0 and NOT EXISTS (SELECT * FROM reservas_oferta t7 WHERE t7.idsolicitud = t1.idsolicitud)");
                    break;
                case 1:
                    $sql = sprintf("SELECT t1.idcliente, t1.idsolicitud, t1.idusuario, t1.fechacreacion, t1.anulada, t1.idcarrier, t2.nombre as carrier, t1.idproyecto, t3.nombre as proyecto, t8.nombre, concat(t9.nombres, ' ', t9.apellidos) as pasajero FROM solicitudes t1 LEFT JOIN oper_carrier t2 ON t2.codigo = t1.idcarrier LEFT JOIN clientes_proyectos t3 ON t3.idproyecto = t1.idproyecto LEFT JOIN clientes t8 ON t8.idcliente = t1.idcliente LEFT JOIN usuarios t9 on t9.idusuario = t1.idusuario WHERE t1.anulada = 0 and t1.idcliente = '%d' AND NOT EXISTS (SELECT * FROM reservas_oferta t7 WHERE t7.idsolicitud = t1.idsolicitud)",
                        mysql_real_escape_string($idcliente)
                    );      
                    break;
                case 2:
                    $sql = sprintf("SELECT t1.idcliente, t1.idsolicitud, t1.idusuario, t1.fechacreacion, t1.anulada, t1.idcarrier, t2.nombre as carrier, t1.idproyecto, t3.nombre as proyecto, t8.nombre, concat(t9.nombres, ' ', t9.apellidos) as pasajero FROM solicitudes t1 LEFT JOIN oper_carrier t2 ON t2.codigo = t1.idcarrier LEFT JOIN clientes_proyectos t3 ON t3.idproyecto = t1.idproyecto LEFT JOIN clientes t8 ON t8.idcliente = t1.idcliente LEFT JOIN usuarios t9 on t9.idusuario = t1.idusuario WHERE t1.anulada = 0 and t1.idcliente = '%d' AND NOT EXISTS (SELECT * FROM reservas_oferta t7 WHERE t7.idsolicitud = t1.idsolicitud)",
                        mysql_real_escape_string($idusuario)
                    );      
                    break;
                case 3:
                    $sql = sprintf("SELECT t1.idcliente, t1.idsolicitud, t1.idusuario, t1.fechacreacion, t1.anulada, t1.idcarrier, t2.nombre as carrier, t1.idproyecto, t3.nombre as proyecto, t8.nombre, concat(t9.nombres, ' ', t9.apellidos) as pasajero FROM solicitudes t1 LEFT JOIN oper_carrier t2 ON t2.codigo = t1.idcarrier LEFT JOIN clientes_proyectos t3 ON t3.idproyecto = t1.idproyecto LEFT JOIN clientes t8 ON t8.idcliente = t1.idcliente LEFT JOIN usuarios t9 on t9.idusuario = t1.idusuario WHERE t1.anulada = 0 and t1.idusuario = '%d' AND NOT EXISTS (SELECT * FROM reservas_oferta t7 WHERE t7.idsolicitud = t1.idsolicitud)",
                        mysql_real_escape_string($idusuario)
                    );      
                    break;
                case 4:
                    $sql = sprintf("SELECT t1.idcliente, t1.idsolicitud, t1.idusuario, t1.fechacreacion, t1.anulada, t1.idcarrier, t2.nombre AS carrier, t1.idproyecto, t3.nombre AS proyecto, t4.idagente, t8.nombre, concat(t9.nombres, ' ', t9.apellidos) as pasajero FROM solicitudes t1 LEFT JOIN oper_carrier t2 ON t2.codigo = t1.idcarrier LEFT JOIN clientes_proyectos t3 ON t3.idproyecto = t1.idproyecto LEFT JOIN usuarios t4 ON t4.idusuario = t1.idusuario LEFT JOIN clientes t8 ON t8.idcliente = t1.idcliente LEFT JOIN usuarios t9 on t9.idusuario = t1.idusuario WHERE t1.anulada = 0 and t4.idagente = '%d' AND NOT EXISTS (SELECT * FROM reservas_oferta t7 WHERE t7.idsolicitud = t1.idsolicitud) LIMIT 0 , 30)",
                        mysql_real_escape_string($idusuario)
                    );      
                    break;
                case 5:
                    $sql = sprintf("SELECT t1.idcliente, t1.idsolicitud, t1.idusuario, t1.fechacreacion, t1.anulada, t1.idcarrier, t2.nombre as carrier, t1.idproyecto, t3.nombre as proyecto, t8.nombre, concat(t9.nombres, ' ', t9.apellidos) as pasajero FROM solicitudes t1 LEFT JOIN oper_carrier t2 ON t2.codigo = t1.idcarrier LEFT JOIN clientes_proyectos t3 ON t3.idproyecto = t1.idproyecto LEFT JOIN clientes t8 ON t8.idcliente = t1.idcliente LEFT JOIN usuarios t9 on t9.idusuario = t1.idusuario WHERE t1.anulada = 0 and t1.idusuario = '%d' AND NOT EXISTS (SELECT * FROM reservas_oferta t7 WHERE t7.idsolicitud = t1.idsolicitud)",
                        mysql_real_escape_string($idusuario)
                    );
                    break;
            }
            $result = mysql_query($sql);
            if(mysql_num_rows($result) > 0){
                for($i = 0; $i < mysql_num_rows($result); $i++) {
                    $filas = mysql_fetch_array($result);
                    $arrayretorno[$i] = $filas;
                    unset($filas);
                }
                mysql_close();
                $this->registrar_evento('Carga de reservas', $idusuario);
                return $arrayretorno;
            } else {
                $this->registrar_evento('Fallo de carga de reservas, (user:'.$idusuario.')', $idusuario);
                mysql_close();
                return null;
            }
        }catch (Exception $ex){
            mysql_close();
            $this->registrar_error(': '.$idusuario, $ex, 'rutas_buscar', $idusuario);
            return $ex;
        }
    }           
    
    public function status_ofertas($idusuario, $idpararegistro, $tipousuario, $idcliente = null) {
        include "config.php";
        try {
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);
            
            switch($tipousuario){
                case 0:
                    $sql = sprintf("SELECT t1.idoferta, t1.idsolicitud, t1.idagente, t2.idusuario, t1.fechacreacion, t1.valoroferta, t1.titulooferta, t1.opciones, t1.detalle, t3.nombre, t1.idusuario, CONCAT( t4.nombres,  ' ', t4.apellidos ) AS usuario, t1.autorizada, t1.fecha_auth, t1.rechazada, t1.fecha_rech, t1.confirmada, t1.fechaconfirmacion, t1.finish, t1.fecha_finish, 0 as fullflags FROM reservas_oferta t1 INNER JOIN solicitudes t2 ON t2.idsolicitud = t1.idsolicitud INNER JOIN clientes t3 ON t3.idcliente = t2.idcliente INNER JOIN usuarios t4 ON t1.idusuario = t4.idusuario where t2.anulada = 0");
                    break;
                case 1:
                    $sql = sprintf("SELECT t1.idoferta, t1.idsolicitud, t1.idagente, t2.idusuario, t1.fechacreacion, t1.valoroferta, t1.titulooferta, t1.opciones, t1.detalle, t3.nombre, t1.idusuario, CONCAT( t4.nombres,  ' ', t4.apellidos ) AS usuario, t1.autorizada, t1.fecha_auth, t1.rechazada, t1.fecha_rech, t1.confirmada, t1.fechaconfirmacion, t1.finish, t1.fecha_finish, 0 as fullflags FROM reservas_oferta t1 INNER JOIN solicitudes t2 ON t2.idsolicitud = t1.idsolicitud INNER JOIN clientes t3 ON t3.idcliente = t2.idcliente INNER JOIN usuarios t4 ON t1.idusuario = t4.idusuario Where t2.anulada = 0 and t2.idcliente = '%d'",
                        mysql_real_escape_string($idcliente)
                    ); 
                    break;
                case 2:
                    $sql = sprintf("SELECT t1.idoferta, t1.idsolicitud, t1.idagente, t2.idusuario, t1.fechacreacion, t1.valoroferta, t1.titulooferta, t1.opciones, t1.detalle, t3.nombre, t1.idusuario, CONCAT( t4.nombres,  ' ', t4.apellidos ) AS usuario, t1.autorizada, t1.fecha_auth, t1.rechazada, t1.fecha_rech, t1.confirmada, t1.fechaconfirmacion, t1.finish, t1.fecha_finish, 0 as fullflags FROM reservas_oferta t1 INNER JOIN solicitudes t2 ON t2.idsolicitud = t1.idsolicitud INNER JOIN clientes t3 ON t3.idcliente = t2.idcliente INNER JOIN usuarios t4 ON t1.idusuario = t4.idusuario Where t2.anulada = 0 and t2.idcliente = '%d'",
                        mysql_real_escape_string($idusuario)
                    );    
                    break;
                case 3:
                    $sql = sprintf("SELECT t1.idoferta, t1.idsolicitud, t1.idagente, t2.idusuario, t1.fechacreacion, t1.valoroferta, t1.titulooferta, t1.opciones, t1.detalle, t3.nombre, t1.idusuario, CONCAT( t4.nombres,  ' ', t4.apellidos ) AS usuario, t1.autorizada, t1.fecha_auth, t1.rechazada, t1.fecha_rech, t1.confirmada, t1.fechaconfirmacion, t1.finish, t1.fecha_finish, 0 as fullflags FROM reservas_oferta t1 INNER JOIN solicitudes t2 ON t2.idsolicitud = t1.idsolicitud INNER JOIN clientes t3 ON t3.idcliente = t2.idcliente INNER JOIN usuarios t4 ON t1.idusuario = t4.idusuario Where t2.anulada = 0 and t2.idusuario = '%d'",
                        mysql_real_escape_string($idusuario)
                    );     
                    break;
                case 4:
                    $sql = sprintf("SELECT t1.idoferta, t1.idsolicitud, t1.idagente, t2.idusuario, t1.fechacreacion, t1.valoroferta, t1.titulooferta, t1.opciones, t1.detalle, t3.nombre, t1.idusuario, CONCAT( t4.nombres,  ' ', t4.apellidos ) AS usuario, t1.autorizada, t1.fecha_auth, t1.rechazada, t1.fecha_rech, t1.confirmada, t1.fechaconfirmacion, t1.finish, t1.fecha_finish, 0 as fullflags FROM reservas_oferta t1 INNER JOIN solicitudes t2 ON t2.idsolicitud = t1.idsolicitud INNER JOIN clientes t3 ON t3.idcliente = t2.idcliente INNER JOIN usuarios t4 ON t1.idusuario = t4.idusuario Where t2.anulada = 0 and t1.idagente = '%d'",
                        mysql_real_escape_string($idusuario)
                    );      
                    break;
                case 5:
                    $sql = sprintf("SELECT t1.idoferta, t1.idsolicitud, t1.idagente, t2.idusuario, t1.fechacreacion, t1.valoroferta, t1.titulooferta, t1.opciones, t1.detalle, t3.nombre, t1.idusuario, CONCAT( t4.nombres,  ' ', t4.apellidos ) AS usuario, t1.autorizada, t1.fecha_auth, t1.rechazada, t1.fecha_rech, t1.confirmada, t1.fechaconfirmacion, t1.finish, t1.fecha_finish, 0 as fullflags FROM reservas_oferta t1 INNER JOIN solicitudes t2 ON t2.idsolicitud = t1.idsolicitud INNER JOIN clientes t3 ON t3.idcliente = t2.idcliente INNER JOIN usuarios t4 ON t1.idusuario = t4.idusuario Where t2.anulada = 0 and t2.idusuario = '%d'",
                        mysql_real_escape_string($idusuario)
                    );
                    break;
            }
            $result = mysql_query($sql);
            if(mysql_num_rows($result) > 0){
                for($i = 0; $i < mysql_num_rows($result); $i++) {
                    $filas = mysql_fetch_array($result);
                    $arrayretorno[$i] = $filas;
                    unset($filas);
                }
                mysql_close();
                
                //recorre el array llenando el campo fullflags con 1 si tiene las autorizaciones y con 0 si no las tiene
                for($a = 0; $a<count($arrayretorno); $a++){
                    $cuenta = $this->solicitud_verificar_flags($arrayretorno[$a][0], $idusuario);
                    if ($cuenta == "true") {
                        $arrayretorno[$a][20] = 1;
                    } else {
                        $arrayretorno[$a][20] = 0;
                    }
                }    
                
                $this->registrar_evento('Carga de reservas', $idusuario);
                return $arrayretorno;
            } else {
                $this->registrar_evento('Fallo de carga de reservas, (user:'.$idusuario.')', $idusuario);
                mysql_close();
                return null;
            }
        }catch (Exception $ex){
            mysql_close();
            $this->registrar_error(': '.$idusuario, $ex, 'rutas_buscar', $idusuario);
            return $ex;
        }
    }
    
    public function ofertas_rechazadas($idusuario, $idpararegistro, $tipousuario, $idcliente = null) {
        include "config.php";
        try {
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);
            
            switch($tipousuario){
                case 0:
                    $sql = sprintf("SELECT t1.idoferta, t1.idsolicitud, t1.idagente, t2.idusuario, t1.fechacreacion, t1.valoroferta, t1.titulooferta, t1.opciones, t1.detalle, t3.nombre, t1.idusuario, CONCAT( t4.nombres,  ' ', t4.apellidos ) AS usuario, t1.autorizada, t1.fecha_auth, t1.rechazada, t1.fecha_rech, t1.confirmada, t1.fechaconfirmacion, t1.finish, t1.fecha_finish FROM reservas_oferta_rechazadas t1 INNER JOIN solicitudes t2 ON t2.idsolicitud = t1.idsolicitud INNER JOIN clientes t3 ON t3.idcliente = t2.idcliente INNER JOIN usuarios t4 ON t1.idusuario = t4.idusuario");
                    break;
                case 1:
                    $sql = sprintf("SELECT t1.idoferta, t1.idsolicitud, t1.idagente, t2.idusuario, t1.fechacreacion, t1.valoroferta, t1.titulooferta, t1.opciones, t1.detalle, t3.nombre, t1.idusuario, CONCAT( t4.nombres,  ' ', t4.apellidos ) AS usuario, t1.autorizada, t1.fecha_auth, t1.rechazada, t1.fecha_rech, t1.confirmada, t1.fechaconfirmacion, t1.finish, t1.fecha_finish FROM reservas_oferta_rechazadas t1 INNER JOIN solicitudes t2 ON t2.idsolicitud = t1.idsolicitud INNER JOIN clientes t3 ON t3.idcliente = t2.idcliente INNER JOIN usuarios t4 ON t1.idusuario = t4.idusuario Where t2.idcliente = '%d'",
                        mysql_real_escape_string($idcliente)
                    ); 
                    break;
                case 2:
                    $sql = sprintf("SELECT t1.idoferta, t1.idsolicitud, t1.idagente, t2.idusuario, t1.fechacreacion, t1.valoroferta, t1.titulooferta, t1.opciones, t1.detalle, t3.nombre, t1.idusuario, CONCAT( t4.nombres,  ' ', t4.apellidos ) AS usuario, t1.autorizada, t1.fecha_auth, t1.rechazada, t1.fecha_rech, t1.confirmada, t1.fechaconfirmacion, t1.finish, t1.fecha_finish FROM reservas_oferta_rechazadas t1 INNER JOIN solicitudes t2 ON t2.idsolicitud = t1.idsolicitud INNER JOIN clientes t3 ON t3.idcliente = t2.idcliente INNER JOIN usuarios t4 ON t1.idusuario = t4.idusuario Where t2.idcliente = '%d'",
                        mysql_real_escape_string($idusuario)
                    );    
                    break;
                case 3:
                    $sql = sprintf("SELECT t1.idoferta, t1.idsolicitud, t1.idagente, t2.idusuario, t1.fechacreacion, t1.valoroferta, t1.titulooferta, t1.opciones, t1.detalle, t3.nombre, t1.idusuario, CONCAT( t4.nombres,  ' ', t4.apellidos ) AS usuario, t1.autorizada, t1.fecha_auth, t1.rechazada, t1.fecha_rech, t1.confirmada, t1.fechaconfirmacion, t1.finish, t1.fecha_finish FROM reservas_oferta_rechazadas t1 INNER JOIN solicitudes t2 ON t2.idsolicitud = t1.idsolicitud INNER JOIN clientes t3 ON t3.idcliente = t2.idcliente INNER JOIN usuarios t4 ON t1.idusuario = t4.idusuario Where t2.idusuario = '%d'",
                        mysql_real_escape_string($idusuario)
                    );     
                    break;
                case 4:
                    $sql = sprintf("SELECT t1.idoferta, t1.idsolicitud, t1.idagente, t2.idusuario, t1.fechacreacion, t1.valoroferta, t1.titulooferta, t1.opciones, t1.detalle, t3.nombre, t1.idusuario, CONCAT( t4.nombres,  ' ', t4.apellidos ) AS usuario, t1.autorizada, t1.fecha_auth, t1.rechazada, t1.fecha_rech, t1.confirmada, t1.fechaconfirmacion, t1.finish, t1.fecha_finish FROM reservas_oferta_rechazadas t1 INNER JOIN solicitudes t2 ON t2.idsolicitud = t1.idsolicitud INNER JOIN clientes t3 ON t3.idcliente = t2.idcliente INNER JOIN usuarios t4 ON t1.idusuario = t4.idusuario Where t1.idagente = '%d'",
                        mysql_real_escape_string($idusuario)
                    );      
                    break;
                case 5:
                    $sql = sprintf("SELECT t1.idoferta, t1.idsolicitud, t1.idagente, t2.idusuario, t1.fechacreacion, t1.valoroferta, t1.titulooferta, t1.opciones, t1.detalle, t3.nombre, t1.idusuario, CONCAT( t4.nombres,  ' ', t4.apellidos ) AS usuario, t1.autorizada, t1.fecha_auth, t1.rechazada, t1.fecha_rech, t1.confirmada, t1.fechaconfirmacion, t1.finish, t1.fecha_finish FROM reservas_oferta_rechazadas t1 INNER JOIN solicitudes t2 ON t2.idsolicitud = t1.idsolicitud INNER JOIN clientes t3 ON t3.idcliente = t2.idcliente INNER JOIN usuarios t4 ON t1.idusuario = t4.idusuario Where t2.idusuario = '%d'",
                        mysql_real_escape_string($idusuario)
                    );
                    break;
            }
            $result = mysql_query($sql);
            if(mysql_num_rows($result) > 0){
                for($i = 0; $i < mysql_num_rows($result); $i++) {
                    $filas = mysql_fetch_array($result);
                    $arrayretorno[$i] = $filas;
                    unset($filas);
                }
                mysql_close();
                $this->registrar_evento('Carga de reservas', $idusuario);
                return $arrayretorno;
            } else {
                $this->registrar_evento('Fallo de carga de reservas, (user:'.$idusuario.')', $idusuario);
                mysql_close();
                return null;
            }
        }catch (Exception $ex){
            mysql_close();
            $this->registrar_error(': '.$idusuario, $ex, 'rutas_buscar', $idusuario);
            return $ex;
        }
    }
    
    public function status_recientes($idusuario, $idpararegistro, $tipousuario, $idcliente = null) {
        include "config.php";
        try {
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);
            //$sql = sprintf("SELECT t1.idcliente, t1.idsolicitud, t1.idusuario, t1.fechacreacion, t1.anulada, t2.fecha_arri, t2.fecha_dep, t2.idcarrier, t3.nombre, t2.idcarrier, t4.ruta, t2.term_arri, CONCAT( t5.nombre,  ' (', t5.iata,  ')' ) AS nombre_term_arri, t2.term_dep, CONCAT( t6.nombre,  ' (', t6.iata,  ')' ) AS nombre_term_dep FROM solicitudes t1 LEFT JOIN solicitudes_detalle t2 ON t2.idsolicitud = t1.idsolicitud LEFT JOIN oper_carrier t3 ON t3.idcarrier = t2.idcarrier LEFT JOIN oper_rutas t4 ON t4.idruta = t2.idcarrier LEFT JOIN oper_ciudades t5 ON t5.idciudad = t2.term_arri LEFT JOIN oper_ciudades t6 ON t6.idciudad = t2.term_dep Where t1.idusuario = '%d' order by fechacreacion desc limit 0, 5",
            
                        switch($tipousuario){
                case 0:
                    $sql = sprintf("SELECT t1.idcliente, t1.idsolicitud, t1.idusuario, t1.fechacreacion, t1.anulada, t1.idcarrier, t2.nombre as carrier, t1.idproyecto, t3.nombre as proyecto FROM solicitudes t1 LEFT JOIN oper_carrier t2 ON t2.codigo = t1.idcarrier LEFT JOIN clientes_proyectos t3 ON t3.idproyecto = t1.idproyecto where t1.anulada = 0 order by fechacreacion desc limit 0, 5",
                        mysql_real_escape_string($idusuario)
                    );
                    break;
                case 1:
                    $sql = sprintf("SELECT t1.idcliente, t1.idsolicitud, t1.idusuario, t1.fechacreacion, t1.anulada, t1.idcarrier, t2.nombre as carrier, t1.idproyecto, t3.nombre as proyecto FROM solicitudes t1 LEFT JOIN oper_carrier t2 ON t2.codigo = t1.idcarrier LEFT JOIN clientes_proyectos t3 ON t3.idproyecto = t1.idproyecto Where t1.anulada = 0 and t1.idcliente = '%d' order by fechacreacion desc limit 0, 5",
                        mysql_real_escape_string($idcliente)
                    );
                    break;
                case 2:
                    $sql = sprintf("SELECT t1.idcliente, t1.idsolicitud, t1.idusuario, t1.fechacreacion, t1.anulada, t1.idcarrier, t2.nombre as carrier, t1.idproyecto, t3.nombre as proyecto FROM solicitudes t1 LEFT JOIN oper_carrier t2 ON t2.codigo = t1.idcarrier LEFT JOIN clientes_proyectos t3 ON t3.idproyecto = t1.idproyecto Where t1.anulada = 0 and t1.idcliente = '%d' order by fechacreacion desc limit 0, 5",
                        mysql_real_escape_string($idusuario)
                    );
                    break;
                case 3:
                    $sql = sprintf("SELECT t1.idcliente, t1.idsolicitud, t1.idusuario, t1.fechacreacion, t1.anulada, t1.idcarrier, t2.nombre as carrier, t1.idproyecto, t3.nombre as proyecto FROM solicitudes t1 LEFT JOIN oper_carrier t2 ON t2.codigo = t1.idcarrier LEFT JOIN clientes_proyectos t3 ON t3.idproyecto = t1.idproyecto Where t1.anulada = 0 and t1.idusuario = '%d' order by fechacreacion desc limit 0, 5",
                        mysql_real_escape_string($idusuario)
                    );  
                    break;
                case 4:
                    $sql = sprintf("SELECT t1.idcliente, t1.idsolicitud, t1.idusuario, t1.fechacreacion, t1.anulada, t1.idcarrier, t2.nombre AS carrier, t1.idproyecto, t3.nombre AS proyecto, t4.idagente FROM solicitudes t1 LEFT JOIN oper_carrier t2 ON t2.codigo = t1.idcarrier LEFT JOIN clientes_proyectos t3 ON t3.idproyecto = t1.idproyecto LEFT JOIN usuarios t4 ON t4.idcliente = t1.idcliente WHERE t1.anulada = 0 and t1.idagente = '%d' ORDER BY fechacreacion DESC LIMIT 0 , 5",
                        mysql_real_escape_string($idusuario)
                    );      
                    break;
                case 5:
                    $sql = sprintf("SELECT t1.idcliente, t1.idsolicitud, t1.idusuario, t1.fechacreacion, t1.anulada, t1.idcarrier, t2.nombre as carrier, t1.idproyecto, t3.nombre as proyecto FROM solicitudes t1 LEFT JOIN oper_carrier t2 ON t2.codigo = t1.idcarrier LEFT JOIN clientes_proyectos t3 ON t3.idproyecto = t1.idproyecto Where t1.anulada = 0 and t1.idusuario = '%d' order by fechacreacion desc limit 0, 5",
                        mysql_real_escape_string($idusuario)
                    );
                    break;
            }
            
            $result = mysql_query($sql);
            if(mysql_num_rows($result) > 0){
                for($i = 0; $i < mysql_num_rows($result); $i++) {
                    $filas = mysql_fetch_array($result);
                    $arrayretorno[$i] = $filas;
                    unset($filas);
                }
                mysql_close();
                $this->registrar_evento('Carga de reservas', $idusuario);
                return $arrayretorno;
            } else {
                $this->registrar_evento('Fallo de carga de reservas, (user:'.$idusuario.')', $idusuario);
                mysql_close();
                return null;
            }
        }catch (Exception $ex){
            mysql_close();
            $this->registrar_error(': '.$idusuario, $ex, 'rutas_buscar', $idusuario);
            return $ex;
        }
    }      
    
    public function status_autorizaciones($idusuario, $idpararegistro, $idcliente = null, $iduser = null) {
        include "config.php";
        try {
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);
            
            if($idcliente == null and $iduser == null){
                $sql = sprintf("SELECT t1.idoferta, t1.idsolicitud, t1.idagente, t2.idusuario, t1.fechacreacion, t1.valoroferta, t1.titulooferta, t1.opciones, t1.detalle, t3.nombre, t1.idusuario, CONCAT( t4.nombres,  ' ', t4.apellidos ) AS usuario, t1.autorizada, t1.fecha_auth, t1.rechazada, t1.fecha_rech, t1.confirmada, t1.fechaconfirmacion, t1.finish, t1.fecha_finish, 0 AS estado FROM reservas_oferta t1 INNER JOIN solicitudes t2 ON t2.idsolicitud = t1.idsolicitud INNER JOIN clientes t3 ON t3.idcliente = t2.idcliente INNER JOIN usuarios t4 ON t1.idusuario = t4.idusuario where t2.anulada = 0 ");
            } elseif($iduser <> null and $idcliente == null) {
                $sql = sprintf("SELECT t1.idoferta, t1.idsolicitud, t1.idagente, t2.idusuario, t1.fechacreacion, t1.valoroferta, t1.titulooferta, t1.opciones, t1.detalle, t3.nombre, t1.idusuario, CONCAT( t4.nombres,  ' ', t4.apellidos ) AS usuario, t1.autorizada, t1.fecha_auth, t1.rechazada, t1.fecha_rech, t1.confirmada, t1.fechaconfirmacion, t1.finish, t1.fecha_finish, 0 AS estado, t5.idusuario AS autorizador FROM reservas_oferta t1 INNER JOIN solicitudes t2 ON t2.idsolicitud = t1.idsolicitud INNER JOIN clientes t3 ON t3.idcliente = t2.idcliente INNER JOIN usuarios t4 ON t1.idusuario = t4.idusuario INNER JOIN reservas_oferta_flag t5 ON t5.idoferta = t1.idoferta WHERE t1.anulada = 0 AND t5.idusuario = '%d'",
                mysql_real_escape_string($iduser)
                ); 
            } elseif($idcliente <> null and $iduser == null){
                $sql = sprintf("SELECT t1.idoferta, t1.idsolicitud, t1.idagente, t2.idusuario, t1.fechacreacion, t1.valoroferta, t1.titulooferta, t1.opciones, t1.detalle, t3.nombre, t1.idusuario, CONCAT( t4.nombres,  ' ', t4.apellidos ) AS usuario, t1.autorizada, t1.fecha_auth, t1.rechazada, t1.fecha_rech, t1.confirmada, t1.fechaconfirmacion, t1.finish, t1.fecha_finish, 0 AS estado FROM reservas_oferta t1 INNER JOIN solicitudes t2 ON t2.idsolicitud = t1.idsolicitud INNER JOIN clientes t3 ON t3.idcliente = t2.idcliente INNER JOIN usuarios t4 ON t1.idusuario = t4.idusuario Where t1.anulada = 0 and t2.idcliente = '%d'",
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
                //recorre el array llenando el campo estado con 1 si tiene las autorizaciones y con 0 si no las tiene
                for($a = 0; $a<count($arrayretorno); $a++){
                    $cuenta = $this->solicitud_verificar_flags($arrayretorno[$a][0], $idusuario);
                    if ($cuenta == "true") {
                        $arrayretorno[$a][20] = 1;
                    } else {
                        $arrayretorno[$a][20] = 0;
                    }
                }                
                $this->registrar_evento('Carga de estado de ofertas', $idusuario);
                return $arrayretorno;
            } else {
                $this->registrar_evento('Fallo de carga de reservas, (user:'.$idusuario.')', $idusuario);
                mysql_close();
                return null;
            }
        }catch (Exception $ex){
            mysql_close();
            $this->registrar_error(': '.$idusuario, $ex, 'rutas_buscar', $idusuario);
            return $ex;
        }        
    }

    public function seguimiento_Solicitudes($idusuario, $tipobusca, $fechadesde, $fechahasta) {
        include "config.php";
        try {
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);
            //$sql = sprintf("SELECT t1.idcliente, t1.idsolicitud, t1.idusuario, t1.fechacreacion, t1.anulada, t2.fecha_arri, t2.fecha_dep, t2.idcarrier, t3.nombre, t2.idcarrier, t4.ruta, t2.term_arri, CONCAT( t5.nombre,  ' (', t5.iata,  ')' ) AS nombre_term_arri, t2.term_dep, CONCAT( t6.nombre,  ' (', t6.iata,  ')' ) AS nombre_term_dep FROM solicitudes t1 LEFT JOIN solicitudes_detalle t2 ON t2.idsolicitud = t1.idsolicitud LEFT JOIN oper_carrier t3 ON t3.idcarrier = t2.idcarrier LEFT JOIN oper_rutas t4 ON t4.idruta = t2.idcarrier LEFT JOIN oper_ciudades t5 ON t5.idciudad = t2.term_arri LEFT JOIN oper_ciudades t6 ON t6.idciudad = t2.term_dep WHERE t1.idusuario = '%d' AND NOT EXISTS (SELECT * FROM reservas_oferta t7 WHERE t7.idsolicitud = t2.idsolicitud)",
            switch($tipousuario){
                case 0:
                    $sql = sprintf("SELECT t1.idcliente, t1.idsolicitud, t1.idusuario, t1.fechacreacion, t1.anulada, t1.idcarrier, t2.nombre AS carrier, t1.idproyecto, t3.nombre AS proyecto, t7.titulooferta as titulo, t8.nombre, CONCAT( t9.nombres,  ' ', t9.apellidos ) AS pasajero FROM solicitudes t1 LEFT JOIN oper_carrier t2 ON t2.codigo = t1.idcarrier LEFT JOIN clientes_proyectos t3 ON t3.idproyecto = t1.idproyecto LEFT JOIN reservas_oferta t7 ON t7.idsolicitud = t1.idsolicitud LEFT JOIN clientes t8 ON t8.idcliente = t1.idcliente LEFT JOIN usuarios t9 ON t9.idusuario = t1.idusuario WHERE t1.anulada = 0 AND t1.fechacreacion BETWEEN '%s' AND '%s' ORDER BY t1.idsolicitud",
                        mysql_real_escape_string($fechadesde),
                        mysql_real_escape_string($fechahasta)
                    );
                    break;
                case 1:
                    $sql = sprintf("SELECT t1.idcliente, t1.idsolicitud, t1.idusuario, t1.fechacreacion, t1.anulada, t1.idcarrier, t2.nombre as carrier, t1.idproyecto, t3.nombre as proyecto, t8.nombre, concat(t9.nombres, ' ', t9.apellidos) as pasajero FROM solicitudes t1 LEFT JOIN oper_carrier t2 ON t2.codigo = t1.idcarrier LEFT JOIN clientes_proyectos t3 ON t3.idproyecto = t1.idproyecto LEFT JOIN clientes t8 ON t8.idcliente = t1.idcliente LEFT JOIN usuarios t9 on t9.idusuario = t1.idusuario WHERE t1.anulada = 0 and t1.idcliente = '%d' AND NOT EXISTS (SELECT * FROM reservas_oferta t7 WHERE t7.idsolicitud = t1.idsolicitud)",
                        mysql_real_escape_string($idcliente)
                    );      
                    break;
                case 2:
                    $sql = sprintf("SELECT t1.idcliente, t1.idsolicitud, t1.idusuario, t1.fechacreacion, t1.anulada, t1.idcarrier, t2.nombre as carrier, t1.idproyecto, t3.nombre as proyecto, t8.nombre, concat(t9.nombres, ' ', t9.apellidos) as pasajero FROM solicitudes t1 LEFT JOIN oper_carrier t2 ON t2.codigo = t1.idcarrier LEFT JOIN clientes_proyectos t3 ON t3.idproyecto = t1.idproyecto LEFT JOIN clientes t8 ON t8.idcliente = t1.idcliente LEFT JOIN usuarios t9 on t9.idusuario = t1.idusuario WHERE t1.anulada = 0 and t1.idcliente = '%d' AND NOT EXISTS (SELECT * FROM reservas_oferta t7 WHERE t7.idsolicitud = t1.idsolicitud)",
                        mysql_real_escape_string($idusuario)
                    );      
                    break;
                case 3:
                    $sql = sprintf("SELECT t1.idcliente, t1.idsolicitud, t1.idusuario, t1.fechacreacion, t1.anulada, t1.idcarrier, t2.nombre as carrier, t1.idproyecto, t3.nombre as proyecto, t8.nombre, concat(t9.nombres, ' ', t9.apellidos) as pasajero FROM solicitudes t1 LEFT JOIN oper_carrier t2 ON t2.codigo = t1.idcarrier LEFT JOIN clientes_proyectos t3 ON t3.idproyecto = t1.idproyecto LEFT JOIN clientes t8 ON t8.idcliente = t1.idcliente LEFT JOIN usuarios t9 on t9.idusuario = t1.idusuario WHERE t1.anulada = 0 and t1.idusuario = '%d' AND NOT EXISTS (SELECT * FROM reservas_oferta t7 WHERE t7.idsolicitud = t1.idsolicitud)",
                        mysql_real_escape_string($idusuario)
                    );      
                    break;
            }
            $result = mysql_query($sql);
            if(mysql_num_rows($result) > 0){
                for($i = 0; $i < mysql_num_rows($result); $i++) {
                    $filas = mysql_fetch_array($result);
                    $arrayretorno[$i] = $filas;
                    unset($filas);
                }
                mysql_close();
                $this->registrar_evento('Carga de reservas', $idusuario);
                return $arrayretorno;
            } else {
                $this->registrar_evento('Fallo de carga de reservas, (user:'.$idusuario.')', $idusuario);
                mysql_close();
                return null;
            }
        }catch (Exception $ex){
            mysql_close();
            $this->registrar_error(': '.$idusuario, $ex, 'rutas_buscar', $idusuario);
            return $ex;
        }
    }
    
    /***************************/
    
    /* Funciones de Ajuste de Saldos para Asignaciones y Proyectos */

    public function asignaciones_saldo($idusuario, $idasignacion, $valor){
        include "config.php";
        try {
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);
            $sql = sprintf("update usuarios asignaciones set saldo = saldo - '%d' where idusuario = '%d' and idproyecto = '%d'",
                mysql_real_escape_string($valor),
                mysql_real_escape_string($idusuario),
                mysql_real_escape_string($idasignacion)
            );
            $result = mysql_query($sql);
            if(mysql_num_rows($result) > 0){
                for($i = 0; $i < mysql_num_rows($result); $i++) {
                    $filas = mysql_fetch_array($result);
                    $arrayretorno[$i] = $filas;
                    unset($filas);
                }
                mysql_close();
                $this->registrar_evento('Carga de reservas', $idusuario);
                return $arrayretorno;
            } else {
                $this->registrar_evento('Fallo de carga de reservas, (user:'.$idusuario.')', $idusuario);
                mysql_close();
                return null;
            }
        }catch (Exception $ex){
            mysql_close();
            $this->registrar_error(': '.$idusuario, $ex, 'rutas_buscar', $idusuario);
            return $ex;
        }
    }
    
    public function proyectos_saldo($idusuario, $idproyecto, $valor){
        include "config.php";
        try {
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);
            $sql = sprintf("update usuarios asignaciones set saldo = saldo - '%d' where idusuario = '%d' and idproyecto = '%d'",
                mysql_real_escape_string($valor),
                mysql_real_escape_string($idusuario),
                mysql_real_escape_string($idasignacion)
            );
            $result = mysql_query($sql);
            if(mysql_num_rows($result) > 0){
                for($i = 0; $i < mysql_num_rows($result); $i++) {
                    $filas = mysql_fetch_array($result);
                    $arrayretorno[$i] = $filas;
                    unset($filas);
                }
                mysql_close();
                $this->registrar_evento('Carga de reservas', $idusuario);
                return $arrayretorno;
            } else {
                $this->registrar_evento('Fallo de carga de reservas, (user:'.$idusuario.')', $idusuario);
                mysql_close();
                return null;
            }
        }catch (Exception $ex){
            mysql_close();
            $this->registrar_error(': '.$idusuario, $ex, 'rutas_buscar', $idusuario);
            return $ex;
        }
    }    
    
    /***************************************************************/
    
    /* Informacion de Clientes */
    
    public function cliente_buscar($idusuario, $idcliente = null) {
        include "config.php";
        if($server == '') {
            include "../config.php";
        }
        try {
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);
            if ($idcliente == null) {
                $sql = sprintf("SELECT t1.idcliente, t1.idtipocliente, t2.nombre as tipocliente, t1.idcatcliente, t3.nombre as categoriacliente, t1.nombre, t1.telefono, t1.fax, t1.direccion, t1.razonsocial, t1.idfiscal, t1.activo, t1.exento, t1.creacion, t1.observaciones, t1.diascredito, t1.montocredito FROM clientes t1 INNER JOIN clientes_tipo t2 on t2.idtipocliente = t1.idtipocliente INNER JOIN clientes_categoria t3 on t3.idcategoria = t1.idcatcliente ");                
            } else {
                $sql = sprintf("SELECT t1.idcliente, t1.idtipocliente, t2.nombre as tipocliente, t1.idcatcliente, t3.nombre as categoriacliente, t1.nombre, t1.telefono, t1.fax, t1.direccion, t1.razonsocial, t1.idfiscal, t1.activo, t1.exento, t1.creacion, t1.observaciones, t1.diascredito, t1.montocredito FROM clientes t1 INNER JOIN clientes_tipo t2 on t2.idtipocliente = t1.idtipocliente INNER JOIN clientes_categoria t3 on t3.idcategoria = t1.idcatcliente where t1.idcliente = '%d'",
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
                $this->registrar_evento('Carga de perfil', $idusuario);
                return $arrayretorno;
            } else {
                $this->registrar_evento('Fallo de carga de perfil, (user:'.$idusuario.')', $idusuario);
                mysql_close();
                return null;
            }
        }catch (Exception $ex){
            mysql_close();
            $this->registrar_error(': '.$idusuario, $ex, 'usuario_buscar', $idusuario);
            return $ex;
        }
    }
   
    public function cliente_registrar($nombre, $idtipocliente, $idcatcliente, $telefono, $fax, $direccion, $razonsocial, $idfiscal, $activo, $exento, $observaciones, $diascredito, $montocredito, $imagen = null) {
        include "config.php";
        if($server == '') {
            include "../config.php";
        }
        try {
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);
            $sql = sprintf("insert into clientes (nombre, idtipocliente, idcatcliente, telefono, fax, direccion, razonsocial, idfiscal, activo, exento, observaciones, diascredito, montocredito, logo ,creacion) values ('%s', '%d', '%d', '%s', '%s', '%s', '%s', '%s', '%d', '%d', '%s', '%d', '%d', '%s', now())",
            mysql_real_escape_string($nombre),
            mysql_real_escape_string($idtipocliente),
            mysql_real_escape_string($idcatcliente),
            mysql_real_escape_string($telefono),
            mysql_real_escape_string($fax),
            mysql_real_escape_string($direccion),
            mysql_real_escape_string($razonsocial),
            mysql_real_escape_string($idfiscal),
            mysql_real_escape_string($activo),
            mysql_real_escape_string($exento),
            mysql_real_escape_string($observaciones),
            mysql_real_escape_string($diascredito),
            mysql_real_escape_string($montocredito),
            mysql_real_escape_string($imagen)
            );
            mysql_query($sql);
            $result = mysql_insert_id();
            mysql_close();
            $this->registrar_evento('Registro de usuario', $idusuario);
            return $result;
        }catch (Exception $ex){
            mysql_close();
            $this->registrar_error('Error en registro de usuario '.$idusuario, $ex, 'usuario_registrar', $idusuario);
            return $ex;
        }
    }                

    public function cliente_modificar($nombre, $idtipocliente, $idcatcliente, $telefono, $fax, $direccion, $razonsocial, $idfiscal, $activo, $exento, $observaciones, $diascredito, $montocredito, $idcliente, $imagen = null) {
        include "config.php";
        if($server == '') {
            include "../config.php";
        }
        try {
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);
            $sql = sprintf("update clientes set nombre = '%s', idtipocliente = '%d', idcatcliente = '%d', telefono = '%s', fax = '%s', direccion = '%s', razonsocial = '%s', idfiscal = '%d', activo = '%d', exento = '%d', observaciones = '%s', diascredito = '%d', montocredito = '%d', logo = '%s' Where idcliente = '%d'",
            mysql_real_escape_string($nombre),
            mysql_real_escape_string($idtipocliente),
            mysql_real_escape_string($idcatcliente),
            mysql_real_escape_string($telefono),
            mysql_real_escape_string($fax),
            mysql_real_escape_string($direccion),
            mysql_real_escape_string($razonsocial),
            mysql_real_escape_string($idfiscal),
            mysql_real_escape_string($activo),
            mysql_real_escape_string($exento),
            mysql_real_escape_string($observaciones),
            mysql_real_escape_string($diascredito),
            mysql_real_escape_string($montocredito),
            mysql_real_escape_string($imagen),
            mysql_real_escape_string($idcliente)
            );
            $result = mysql_query($sql);
            mysql_close();
            $this->registrar_evento('Modificacion de Clientes', $idusuario);
            return $result;
        }catch (Exception $ex){
            mysql_close();
            $this->registrar_error('Error en Modificacion de Clientes '.$idusuario, $ex, 'cliente_modificar', $idusuario);
            return $ex;
        }
    }

    public function cliente_eliminar($idusuario, $idcliente) {
        include "config.php";
        try {
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);
                $sql = sprintf("Delete from clientes where idcliente = '%d'",
                mysql_real_escape_string($idcliente)
                );                
            $result = mysql_query($sql);
            if(mysql_num_rows($result) > 0){
                for($i = 0; $i < mysql_num_rows($result); $i++) {
                    $filas = mysql_fetch_array($result);
                    $arrayretorno[$i] = $filas;
                    unset($filas);
                }
                mysql_close();
                $this->registrar_evento('Eliminar Cliente', $idusuario);
                return $arrayretorno;
            } else {
                $this->registrar_evento('Fallo de eliminar cliente, (user:'.$idusuario.')', $idusuario);
                mysql_close();
                return null;
            }
        }catch (Exception $ex){
            mysql_close();
            $this->registrar_error(': '.$idusuario, $ex, 'cliente_eliminar', $idusuario);
            return $ex;
        }
    }
    
    public function cliente_add_preset($idusuario, $idpreset, $valor){
        include "config.php";
        try {
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);
            $sql = sprintf("insert usuarios_presets (idusuario, idpreset, valor) values ('%d', '%d', '%s')",
            mysql_real_escape_string($idusuario),
            mysql_real_escape_string($idpreset),
            mysql_real_escape_string($valor)
            );
            $result = mysql_query($sql);
            mysql_close();
            $this->registrar_evento('Registro de preset usuario', $idusuario);
            return null;
        }catch (Exception $ex){
            mysql_close();
            $this->registrar_error('Error en registro de usuario '.$idusuario, $ex, 'usuario_registrar', $idusuario);
            return $ex;
        }
    }
    
    public function cliente_remove_preset($idusuario, $idpreset, $valor){
        include "config.php";
        try {
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);
            $sql = sprintf("insert usuarios_presets (idusuario, idpreset, valor) values ('%d', '%d', '%s')",
            mysql_real_escape_string($idusuario),
            mysql_real_escape_string($idpreset),
            mysql_real_escape_string($valor)
            );
            $result = mysql_query($sql);
            mysql_close();
            $this->registrar_evento('Registro de usuario', $idusuario);
            return null;
        }catch (Exception $ex){
            mysql_close();
            $this->registrar_error('Error en registro de usuario '.$idusuario, $ex, 'usuario_registrar', $idusuario);
            return $ex;
        }
    }

    public function cliente_categoria_buscar($idusuario, $idacategoria = null) {
        include "config.php";
        try {
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);
            if ($icategoria == null) {
                $sql = sprintf("SELECT idcategoria, nombre FROM clientes_categoria");                
            } else {
                $sql = sprintf("SELECT idcategoria, nombre FROM clientes_categoria WHERE idcategoria = '%d'",
                mysql_real_escape_string($idcategoria)
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
                $this->registrar_evento('Carga de Categorias de usuario', $idusuario);
                return $arrayretorno;
            } else {
                $this->registrar_evento('Fallo de carga de categorias de usuario, (user:'.$idusuario.')', $idusuario);
                mysql_close();
                return null;
            }
        }catch (Exception $ex){
            mysql_close();
            $this->registrar_error(': '.$idusuario, $ex, 'usuario_categoria_buscar', $idusuario);
            return $ex;
        }
    }
    
    public function cliente_tipo_buscar($idusuario, $idacategoria = null) {
        include "config.php";
        try {
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);
            if ($icategoria == null) {
                $sql = sprintf("SELECT idtipocliente, nombre FROM clientes_tipo");                
            } else {
                $sql = sprintf("SELECT idtipocliente, nombre FROM clientes_tipo WHERE idtipocliente = '%d'",
                mysql_real_escape_string($idcategoria)
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
                $this->registrar_evento('Carga de Tipo de Clientes', $idusuario);
                return $arrayretorno;
            } else {
                $this->registrar_evento('Fallo de carga de tipos de clientes, (user:'.$idusuario.')', $idusuario);
                mysql_close();
                return null;
            }
        }catch (Exception $ex){
            mysql_close();
            $this->registrar_error(': '.$idusuario, $ex, 'clientes_tipo_buscar', $idusuario);
            return $ex;
        }
    }

    public function cliente_proyecto_buscar($idusuario, $idcliente, $idproyecto = null) {
        include "config.php";
        try {
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);
            if ($idproyecto == null) {
                $sql = sprintf("select t1.idproyecto, t2.idcliente, t2.nombre As cliente, t1.codproyecto, t1.nombre, t1.asignacion, t1.saldo, t1.fecha_inicio, t1.fecha_fin from clientes_proyectos t1 inner join clientes t2 on t2.idcliente = t1.idcliente where t1.idcliente = '%d'",
                        mysql_real_escape_string($idcliente)
                        );                
            } else {
                $sql = sprintf("select t1.idproyecto, t2.idcliente, t2.nombre As cliente, t1.codproyecto, t1.nombre, t1.asignacion, t1.saldo, t1.fecha_inicio, t1.fecha_fin from clientes_proyectos t1 inner join clientes t2 on t2.idcliente = t1.idcliente where t1.idcliente = '%d' and t1.idproyecto = '%d'",
                        mysql_real_escape_string($idcliente),
                        mysql_real_escape_string($idproyecto)
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
                $this->registrar_evento('Carga de proyectos', $idusuario);
                return $arrayretorno;
            } else {
                $this->registrar_evento('Fallo de carga de proyectos, (user:'.$idusuario.')', $idusuario);
                mysql_close();
                return null;
            }
        }catch (Exception $ex){
            mysql_close();
            $this->registrar_error(': '.$idusuario, $ex, 'cliente_proyecto_buscar', $idusuario);
            return $ex;
        }
    }
    
    public function cliente_proyecto_buscar_fast($idproyecto) {
        include "config.php";
        try {
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);
                $sql = sprintf("select t1.idproyecto, t2.idcliente, t2.nombre As cliente, t1.codproyecto, t1.nombre, t1.asignacion, t1.saldo, t1.fecha_inicio, t1.fecha_fin from clientes_proyectos t1 inner join clientes t2 on t2.idcliente = t1.idcliente where t1.idproyecto = '%d'",
                        mysql_real_escape_string($idproyecto)
                        );                
            $result = mysql_query($sql);
            if(mysql_num_rows($result) > 0){
                for($i = 0; $i < mysql_num_rows($result); $i++) {
                    $filas = mysql_fetch_array($result);
                    $arrayretorno[$i] = $filas;
                    unset($filas);
                }
                mysql_close();
                $this->registrar_evento('Carga de proyectos', $idusuario);
                return $arrayretorno;
            } else {
                $this->registrar_evento('Fallo de carga de proyectos, (user:'.$idusuario.')', $idusuario);
                mysql_close();
                return null;
            }
        }catch (Exception $ex){
            mysql_close();
            $this->registrar_error(': '.$idusuario, $ex, 'cliente_proyecto_buscar', $idusuario);
            return $ex;
        }
    }
    
    public function cliente_proyecto_registrar($idcliente, $idproyecto, $codproyecto, $nombre, $asignacion, $idusuario, $saldo, $fechainicio, $fechafin) {
        include "config.php";
        try {
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);
            $sql = sprintf("insert into clientes_proyectos (idcliente, codproyecto, nombre, asignacion, saldo, fecha_inicio, fecha_fin) values ('%d', '%s', '%s', '%d', '%d', '%s', '%s')",
            mysql_real_escape_string($idcliente),
            mysql_real_escape_string($codproyecto),
            mysql_real_escape_string($nombre),
            mysql_real_escape_string($asignacion),
            mysql_real_escape_string($saldo),
            mysql_real_escape_string($fechainicio),
            mysql_real_escape_string($fechafin)
            );
            $result = mysql_query($sql);
            mysql_close();
            $this->registrar_evento('Registro de proyecto', $idusuario);
            return null;
        }catch (Exception $ex){
            mysql_close();
            $this->registrar_error('Error en registro de proyecto '.$idusuario, $ex, 'proyecto_registrar', $idusuario);
            return $ex;
        }
    }                

    public function cliente_proyecto_modificar($idcliente, $idproyecto, $codproyecto, $nombre, $asignacion, $idusuario, $saldo, $fechainicio, $fechafin) {
        include "config.php";
        try {
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);
            $sql = sprintf("update clientes_proyectos set nombre = '%s', asignacion = '%d', fecha_inicio = '%s', fecha_fin = '%s' Where idcliente = '%d' and idproyecto = '%d' and codproyecto = '%s'",
            mysql_real_escape_string($nombre),
            mysql_real_escape_string($asignacion),
            mysql_real_escape_string($fechainicio),
            mysql_real_escape_string($fechafin),
            mysql_real_escape_string($idcliente),
            mysql_real_escape_string($idproyecto),
            mysql_real_escape_string($codproyecto)
            );
            $result = mysql_query($sql);
            mysql_close();
            $this->registrar_evento('Modificacion de Clientes', $idusuario);
            return null;
        }catch (Exception $ex){
            mysql_close();
            $this->registrar_error('Error en Modificacion de Clientes '.$idusuario, $ex, 'cliente_modificar', $idusuario);
            return $ex;
        }
    }

    public function cliente_proyecto_eliminar($idusuario, $idcliente) {
        include "config.php";
        try {
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);
                $sql = sprintf("Delete from clientes where idcliente = '%d'",
                mysql_real_escape_string($idcliente)
                );                
            $result = mysql_query($sql);
            if(mysql_num_rows($result) > 0){
                for($i = 0; $i < mysql_num_rows($result); $i++) {
                    $filas = mysql_fetch_array($result);
                    $arrayretorno[$i] = $filas;
                    unset($filas);
                }
                mysql_close();
                $this->registrar_evento('Eliminar Cliente', $idusuario);
                return $arrayretorno;
            } else {
                $this->registrar_evento('Fallo de eliminar cliente, (user:'.$idusuario.')', $idusuario);
                mysql_close();
                return null;
            }
        }catch (Exception $ex){
            mysql_close();
            $this->registrar_error(': '.$idusuario, $ex, 'cliente_eliminar', $idusuario);
            return $ex;
        }
    }
    
    public function cliente_proyecto_update_saldo($idcliente, $idproyecto, $codproyecto, $valor) {
        include "config.php";
        try {
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);
            $sql = sprintf("update clientes_proyectos set saldo = (saldo - '%d') Where idcliente = '%d' and idproyecto = '%d' and codproyecto = '%s'",
            mysql_real_escape_string($valor),
            mysql_real_escape_string($idcliente),
            mysql_real_escape_string($idproyecto),
            mysql_real_escape_string($codproyecto)
            );
            $result = mysql_query($sql);
            mysql_close();
            $this->registrar_evento('Modificacion de Saldo de Contrato', $idusuario);
            return null;
        }catch (Exception $ex){
            mysql_close();
            $this->registrar_error('Error en Modificacion de Clientes '.$idusuario, $ex, 'cliente_modificar', $idusuario);
            return $ex;
        }
    }
    
    /***************************/
    
    /** Eventos de Mensajeria **/
    
    public function enviar_notificacion($mailto, $mailfrom, $mailsubject, $mailbody, $idusuario, $idreserva){
        try{
            $myemail = $mailto;
            $subject = $mailsubject;
            $message = $mailbody;
            $headers = 'From: '.$mailfrom;
            $envio = mail($myemail, $subject, $message, $headers);
            if ($envio){
                $this->registrar_evento('email notif, reserva '.$idreserva, $idusuario);
                return 'ok';
            } else {
                $this->registrar_error('fallo notif, reserva'.$idreserva, $envio, 'enviar_notificacion', $idusuario);
            }
        } catch (Exception $ex) {
            $this->registrar_error('notif reserva en catch, reserva'.$idreserva, $ex, 'enviar_notificacion', $idusuario);            
            return $ex;
        }    
    }
    
    /***************************/
    
    /** Eventos de registro **/
    public function registrar_evento($descripcion, $idusuario){
        include "config.php";
        if($server == '') {
            include "../config.php";
        }
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
?>