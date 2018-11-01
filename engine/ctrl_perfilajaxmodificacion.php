<?php
include '../secure.php';
include '../classes/class.operaciones.php';

$obj = new Operaciones(True);
$data = array();

$id = $_GET["id"];
$opcion = $_GET["opcion"];
$idusuario = $_SESSION["IDUSUARIO"];
$result = "";




if (( $_GET['opcion'] == 1)) {

  
    $id = $_GET["post_id"];
    
        
    
        include "config.php";
        if($server == '') {
            include "../config.php";
        }
        try {
            //Compara si la imagen del usuario viene vacia, llama la tabla info_gral y asigna al perfil la imagen default
                      
            //update usuarios set nombres = '%s', apellidos = '%s', usuario = '%s',password = md5('%s'), email = '%s', cargo = '%s', activo = '%d' where idusuario = '%d'
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);
            $sql = sprintf("select * from perfil_nacionalidades
                            where id = '%d'",
            mysql_real_escape_string($id)
            );
            $result = mysql_query($sql);
            if(mysql_num_rows($result) > 0){
                for($i = 0; $i < mysql_num_rows($result); $i++) {
                    $filas = mysql_fetch_array($result);
                    $arrayretorno[$i] = $filas;
                    unset($filas);
                }
                mysql_close();
                //$this->registrar_evento('Carga de perfil', $idusuario);
                //return $arrayretorno;
                $result = $arrayretorno;
            }
        }catch (Exception $ex){
            mysql_close();
            $this->registrar_error('Error en registro de perfil_nacionalidad_registrar '.$idusuario, $ex, 'usuario_registrar', $idusuario);
            //return null;
        }      
    

    if($result){
        //$userData = $selcliente->fetch_assoc();
        $data['status'] = 'ok';
        $data['result'] = $result;
    }else{
        $data['status'] = 'err';
        $data['result'] = '';
    }
    //returns data as JSON format
    echo json_encode($data);

    //returns data as JSON format
    //echo "<script>alert('detalle registado nacionalidad'); window.location.href=\"../engine_settings.php?mod=6&action=1&id=" . $idperfil . "\";</script>";
    //exit;
}


if (( $_POST['opcion'] == 2))  {

    
    
        
    $id = $_POST["id"];
    $id_nacionalidad = $_POST['id_nacionalidad'];    
    $pasaporte = $_POST['pasaporte'];
    $tipo = $_POST['tipo'];    
    $fecha_emision = $_POST['fecha_emision'];
    $fecha_expiracion = $_POST['fecha_expiracion'];
    $secuencia = $_POST['secuencia'];

    $result = $obj->perfil_nacionalidad_modificar($id, $id_nacionalidad ,$pasaporte
            ,$tipo ,$fecha_emision , $fecha_expiracion, $secuencia ) ;

    //returns data as JSON format
    if($result){
        //$userData = $selcliente->fetch_assoc();
        $data['status'] = 'ok';
        $data['result'] = $fecha_emision;
    }else{
        $data['status'] = 'err';
        $data['result'] = '';
    }
    //returns data as JSON format
    echo json_encode($data);
}

if (( $_GET['opcion'] == 3)) {

  
    $id = $_GET["post_id"];
    
        
    
        include "config.php";
        if($server == '') {
            include "../config.php";
        }
        try {
            //Compara si la imagen del usuario viene vacia, llama la tabla info_gral y asigna al perfil la imagen default
                      
            //update usuarios set nombres = '%s', apellidos = '%s', usuario = '%s',password = md5('%s'), email = '%s', cargo = '%s', activo = '%d' where idusuario = '%d'
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);
            $sql = sprintf("select * from perfil_visas
                            where id = '%d'",
            mysql_real_escape_string($id)
            );
            $result = mysql_query($sql);
            if(mysql_num_rows($result) > 0){
                for($i = 0; $i < mysql_num_rows($result); $i++) {
                    $filas = mysql_fetch_array($result);
                    $arrayretorno[$i] = $filas;
                    unset($filas);
                }
                mysql_close();
                //$this->registrar_evento('Carga de perfil', $idusuario);
                //return $arrayretorno;
                $result = $arrayretorno;
            }
        }catch (Exception $ex){
            mysql_close();
            $this->registrar_error('Error en registro de perfil_nacionalidad_registrar '.$idusuario, $ex, 'usuario_registrar', $idusuario);
            //return null;
        }      
    

    if($result){
        //$userData = $selcliente->fetch_assoc();
        $data['status'] = 'ok';
        $data['result'] = $result;
    }else{
        $data['status'] = 'err';
        $data['result'] = '';
    }
    //returns data as JSON format
    echo json_encode($data);

    //returns data as JSON format
    //echo "<script>alert('detalle registado nacionalidad'); window.location.href=\"../engine_settings.php?mod=6&action=1&id=" . $idperfil . "\";</script>";
    //exit;
}


if (( $_POST['opcion'] == 4))  {      
        
    $id = $_POST["id"];
    $id_nacionalidad = $_POST['id_nacionalidad'];  
    $id_pais_visa = $_POST['id_pais_visa'];  
    $visa = $_POST['visa'];
    $tipo = $_POST['tipo'];    
    $fecha_emision = $_POST['fecha_emision'];
    $fecha_expiracion = $_POST['fecha_expiracion'];
    $comentario = $_POST['comentario'];

    $result = $obj->perfil_visa_modificar($id, $id_nacionalidad ,$id_pais_visa,$visa
            ,$tipo ,$fecha_emision , $fecha_expiracion,$comentario ) ;

    //returns data as JSON format
    if($result){
        //$userData = $selcliente->fetch_assoc();
        $data['status'] = 'ok';
        $data['result'] = $fecha_emision;
    }else{
        $data['status'] = 'err';
        $data['result'] = '';
    }
    //returns data as JSON format
    echo json_encode($data);
}


if (( $_GET['opcion'] == 5)) {

  
    $id = $_GET["post_id"];
    
        
    
        include "config.php";
        if($server == '') {
            include "../config.php";
        }
        try {
            //Compara si la imagen del usuario viene vacia, llama la tabla info_gral y asigna al perfil la imagen default
                      
            //update usuarios set nombres = '%s', apellidos = '%s', usuario = '%s',password = md5('%s'), email = '%s', cargo = '%s', activo = '%d' where idusuario = '%d'
            $conex = mysql_connect($server, $user, $pass);
            mysql_select_db($base, $conex);
            $sql = sprintf("select * from perfil_viajero_frecuente
                            where id = '%d'",
            mysql_real_escape_string($id)
            );
            $result = mysql_query($sql);
            if(mysql_num_rows($result) > 0){
                for($i = 0; $i < mysql_num_rows($result); $i++) {
                    $filas = mysql_fetch_array($result);
                    $arrayretorno[$i] = $filas;
                    unset($filas);
                }
                mysql_close();
                //$this->registrar_evento('Carga de perfil', $idusuario);
                //return $arrayretorno;
                $result = $arrayretorno;
            }
        }catch (Exception $ex){
            mysql_close();
            $this->registrar_error('Error en registro de perfil_nacionalidad_registrar '.$idusuario, $ex, 'usuario_registrar', $idusuario);
            //return null;
        }      
    

    if($result){
        //$userData = $selcliente->fetch_assoc();
        $data['status'] = 'ok';
        $data['result'] = $result;
    }else{
        $data['status'] = 'err';
        $data['result'] = '';
    }
    //returns data as JSON format
    echo json_encode($data);

    //returns data as JSON format
    //echo "<script>alert('detalle registado nacionalidad'); window.location.href=\"../engine_settings.php?mod=6&action=1&id=" . $idperfil . "\";</script>";
    //exit;
}


if (( $_POST['opcion'] == 6))  {      
        
    $id = $_POST["id"];
    $id_carrier = $_POST['id_carrier'];  
    $numero = $_POST['numero'];  
    $fecha_emision = $_POST['fecha_emision'];
    $fecha_expiracion = $_POST['fecha_expiracion'];    
    $millas = $_POST['millas'];
    $comentario = $_POST['comentario'];

    $result = $obj->perfil_carrier_modificar($id, $id_carrier ,$numero,$fecha_emision,$fecha_expiracion ,$millas , $comentario ) ;

    //returns data as JSON format
    if($result){
        //$userData = $selcliente->fetch_assoc();
        $data['status'] = 'ok';
        $data['result'] = $fecha_emision;
    }else{
        $data['status'] = 'err';
        $data['result'] = '';
    }
    //returns data as JSON format
    echo json_encode($data);
}

// INACTIVAS

if (( $_POST['opcion'] == 7))  {      
        
    $id = $_POST["id"];

    $result = $obj->perfil_nacionalidad_inactivar($id) ;

    //returns data as JSON format
    if($result){
        //$userData = $selcliente->fetch_assoc();
        $data['status'] = 'ok';
        $data['result'] = $result;
    }else{
        $data['status'] = 'err';
        $data['result'] = '';
    }
    //returns data as JSON format
    echo json_encode($data);
}

if (( $_POST['opcion'] == 8))  {      
        
    $id = $_POST["id"];

    $result = $obj->perfil_visa_inactivar($id) ;

    //returns data as JSON format
    if($result){
        //$userData = $selcliente->fetch_assoc();
        $data['status'] = 'ok';
        $data['result'] = $result;
    }else{
        $data['status'] = 'err';
        $data['result'] = '';
    }
    //returns data as JSON format
    echo json_encode($data);
}

if (( $_POST['opcion'] == 9))  {      
        
    $id = $_POST["id"];

    $result = $obj->perfil_carrier_inactivar($id) ;

    //returns data as JSON format
    if($result){
        //$userData = $selcliente->fetch_assoc();
        $data['status'] = 'ok';
        $data['result'] = $result;
    }else{
        $data['status'] = 'err';
        $data['result'] = '';
    }
    //returns data as JSON format
    echo json_encode($data);
}
?>