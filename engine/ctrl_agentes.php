<?php

include '../secure.php';
include '../classes/class.operaciones.php';

include "../Config.php";
$Obj = new Operaciones(True);

$id = $_GET["id"];
$Del = $_GET["del"];
$idusuario = $_SESSION["IDUSUARIO"];
if ($Del == 1) {
    $delete = $Obj->agentes_eliminar($ID, $_SESSION["IDUSUARIO"]);

    if ($delete == "OK") {
        echo "<script>alert('Proyecto Eliminado'); window.location.href=\"../engine.php?cat=1&action=0&id=0\";</script>";
    } else {
        echo "<script>alert('Proyecto no pudo ser eliminado'); window.location.href=\"../engine.php?cat=1&action=0&id=0\";</script>";
    }
    exit;
}

function assertValidUpload($code) {
    if($code == UPLOAD_ERR_OK) {
        return;
    }

    switch ($code) {
        case UPLOAD_ERR_INI_SIZE:
        case UPLOAD_ERR_FORM_SIZE:
            $msg = "El archivo es demasiado grande";
            $errnoimg = 1;
            break;
        case UPLOAD_ERR_PARTIAL:
            $msg = "El archivo se subio parcialmente";
            $errnoimg = 1;
            break;
        case UPLOAD_ERR_NO_FILE:
            $msg = "Ninguna imagen fue subida";
            $errnoimg = 0;
            break;
        case UPLOAD_ERR_NO_TMP_DIR:
            $msg = "No se pudo encontrar el directorio de origen";
            $errnoimg = 1;
            break;
        case UPLOAD_ERR_CANT_WRITE:
            $msg = "No se pudo escribir el archivo";
            $errnoimg = 1;
            break;
        case UPLOAD_ERR_EXTENSION:
            $msg = "No se pudo procesar la extension del archivo";
            $errnoimg = 1;
            break;
        default:
            $msg = "Error desconocido";
            $errnoimg = 1;
    }
    throw new Exception($msg);
}

$errors = array();
$nombres = $_POST['nombres3'];
$apellidos = $_POST['apellidos3'];
$cargo = $_POST['cargo_agente3'];
$email = $_POST['email3'];
$activo = $_POST['agente_activo3'];

try {
    try {
        
    } catch (Exception $e) {
        //cuando es paquete nuevo hace obligatorio que cargue una imagen
         if (!array_key_exists('imagen', $_FILES)) {
            throw new Exception("No se encontro ninguna imagen");
        }
               
        //Asigna los valores de los parametros pasados, incluida la imagen a las variables
       
        $imagen = $imagen1; //$_FILES['imagen'];
        
        //Verifica que el archivo se subio correctamente
        assertValidUpload($imagen['error']);

        if(!is_uploaded_file($imagen['tmp_name'])) {
            throw new Exception("El archivo no fue subido");
        }
       
        $info = getImageSize($imagen['tmp_name']);
        if(!$info){
            throw new Exception("El archivo subido no es una imagen");
        }   
    }
             
    }
catch (Exception $ex) {
    $errors[] = $ex->getMessage();
}

$result = "";

if (count($errors) == 0) {
    //no se encontraron errores, procede a insretar el registro con imagen
    
    if ($_SESSION["mttousuarios"] == "N") {
        $result = $Obj->agentes_registrar($idusuario, $nombres, $apellidos, $cargo, $email, $activo,$fecha_registro);
    } elseif ($_SESSION["mttousuarios"] == "M") {
        
        $result = $Obj->agentes_modificar($idusuario, $id, $nombres, $apellidos, $cargo, $email, $activo,$fecha_registro);
    }

    if ($_SESSION["mttousuarios"] == "N") {
        echo "<script>alert('Agente registado'); window.location.href=\"../engine_settings.php?mod=8&id=".$result."\";</script>";
        //echo "<script>alert('Nuevo Usuario ha sido registrado, debe registrar las autorizaciones del usuario para poder generar solicitudes nuevas'); window.location.href=\"../engine.php?cat=3&action=1&id=".$result."\";</script>";
    } elseif ($_SESSION["mttousuarios"] == "M") {
        echo "<script>alert('Agente existente ha sido modificado'); window.location.href=\"../engine_settings.php?mod=8&id=0\";</script>";
    }
    $imagen1 = "";
    exit;
 } 
?>
<html>
    <head>
        <title>Error</title>
    </head>
    <body>
        <div>
            <p>
                The following errors occurred:
            </p>

            <ul>
                <?php foreach ($errors as $error) { ?>
                    <li>
                        <?php echo htmlSpecialChars($error) ?>
                    </li>
                <?php } ?>
            </ul>

            <p>
                <a href="../engine.php">Try again</a>
            </p>
        </div>
    </body>
</html>