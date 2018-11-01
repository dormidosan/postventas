<?php
include '../secure.php';
include '../classes/class.operaciones.php';

$obj = new Operaciones(True);
$data = array();

$id = $_GET["id"];
$opcion = $_GET["opcion"];
$idusuario = $_SESSION["IDUSUARIO"];
$result = "";




if (( $_POST['opcion'] == 1)) {

    $idnacionalidad = $_POST['idnacionalidad'];
    $idperfil = $_POST["post_id"];
    $pasaporte = $_POST['pasaporte'];
    $tipo = $_POST['tipo'];
    $fecha_emision = $_POST['fecha_emision'];
    $fecha_expiracion = $_POST['fecha_expiracion'];
    $secuencia = $_POST['secuencia'];
    

    $result = $obj->perfil_nacionalidad_registrar($idnacionalidad, $idperfil, $pasaporte,
            $tipo, $fecha_emision, $fecha_expiracion,$secuencia);

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

    $idperfil = $_POST["post_id"];
    $idnacionalidad = $_POST['idnacionalidad'];
    $idpaisvisa = $_POST['idpaisvisa'];
    $tipo = $_POST['tipo'];
    $visa = $_POST['visa'];    
    $fecha_emision = $_POST['fecha_emision'];
    $fecha_expiracion = $_POST['fecha_expiracion'];
    $comentario = $_POST['comentario'];


    $result = $obj->perfil_visas_registrar($idperfil, $idnacionalidad, $idpaisvisa, $tipo,
            $visa, $fecha_emision, $fecha_expiracion,$comentario);

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

if (( $_POST['opcion'] == 3)) {

    $idperfil = $_POST["post_id"];
    $idcarrier = $_POST['idcarrier'];
    $numero = $_POST['numero'];
    $fecha_emision = $_POST['fecha_emision'];
    $fecha_expiracion = $_POST['fecha_expiracion'];
    $millas = $_POST['millas'];
    $comentario = $_POST['comentario'];


    $result = $obj->perfil_carrier_registrar($idperfil, $idcarrier, $numero, $fecha_emision,
            $fecha_expiracion, $millas, $comentario);


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