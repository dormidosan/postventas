<?php

include '../secure.php';
include '../classes/class.operaciones.php';

include "../Config.php";
$Obj = new Operaciones(True);

$id = $_GET["id"];
$Del = $_GET["del"];
$idusuario = $_SESSION["IDUSUARIO"];

if ($Del == 1) {
    $delete = $Obj->usuarios_eliminar($ID, $_SESSION["IDUSUARIO"]);

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
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$email = $_POST['email'];
$intracompany = $_POST['intracompany'];
$clientes = $_POST['clientes'];
$cargo = $_POST['cargo'];
$usuario = $_POST['usuario'];
$password = $_POST['password'];
$contactoemergencia = $_POST['contactoemergencia'];
$numeroemergencia =  $_POST['numeroemergencia'];
$categoria = $_POST['categoria'];
$agente = $_POST['agente'];
$imagen1 = $_FILES['imagen'];


$idnacionalidad1 = $_POST['idnacionalidad1'];
$npasaporte1 = $_POST['npasaporte1'];
$pass1fechavenc = $_POST['pass1fechavenc'];
$idnacionalidad2 = $_POST['idnacionalidad2'];
$npasaporte2 = $_POST['npasaporte2'];
$pass2fechavenc = $_POST['pass2fechavenc'];
$visaamericana = $_POST['visaamericana'];
$tipovisa = $_POST['tipovisa'];
$vencimientovisa = $_POST['vencimientovisa'];
$vacunafiebreamarilla = $_POST['fiebreamarilla'];
$emisionvacuna = $_POST['paisemisionvacuna'];
$vencimientovacuna = $_POST['vencimientovacuna'];

/*
$pass1fechavenc = date("Y-m-d", strtotime($_POST['pass1fechavenc']));
$pass2fechavenc = date("Y-m-d", strtotime($_POST['pass2fechavenc']));
$vencimientovisa = date("Y-m-d", strtotime($_POST['vencimientovisa']));
$vencimientovacuna = date("Y-m-d", strtotime($_POST['vencimientovacuna']));
*/
$alternatemail = $_POST['alternatemail'];
$asistenteemail = $_POST['asistenteemail'];
$copyemail = $_POST['copyemail'];

try {
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
catch (Exception $ex) {
    $errors[] = $ex->getMessage();
}

$result = "";

if (count($errors) == 0) {
    //no se encontraron errores, procede a insretar el registro con imagen
    if ($_SESSION["mttousuarios"] == "N") {
        $result = $Obj->usuario_registrar($idusuario, $categoria, $usuario, $nombres, $apellidos, $cargo, $email, $clientes,$agente, $password, $contactoemergencia, $idnacionalidad1, $npasaporte1, $pass1fechavenc, $idnacionalidad2, $npasaporte2, $pass2fechavenc, $visaamericana, $vencimientovisa, $asignacion, $tipovisa, $vacunafiebreamarilla, $emisionvacuna, $vencimientovacuna, $intracompany, $alternatemail, $asistenteemail, $copyemail,$numeroemergencia, file_get_contents($imagen['tmp_name']));
    } elseif ($_SESSION["mttousuarios"] == "M") {
        $result = $Obj->usuario_modificar($idusuario, $categoria, $id, $nombres, $apellidos, $cargo, $email, $clientes, $agente, $password, $contactoemergencia, $idnacionalidad1, $npasaporte1, $pass1fechavenc, $idnacionalidad2, $npasaporte2, $pass2fechavenc, $visaamericana, $vencimientovisa, $asignacion, $tipovisa, $vacunafiebreamarilla, $emisionvacuna, $vencimientovacuna, $intracompany, $alternatemail, $asistenteemail, $copyemail,$numeroemergencia, file_get_contents($imagen['tmp_name']));
    }
    if ($_SESSION["mttousuarios"] == "N") {
        echo "<script>alert('Usuario registado con imagen'); window.location.href=\"../engine.php?cat=3&action=1&id=".$result."\";</script>";
        //echo "<script>alert('Nuevo Usuario ha sido registrado, debe registrar las autorizaciones del usuario para poder generar solicitudes nuevas'); window.location.href=\"../engine.php?cat=3&action=1&id=".$result."\";</script>";
    } elseif ($_SESSION["mttousuarios"] == "M") {
        echo "<script>alert('Usuario existente ha sido modificado con imagen'); window.location.href=\"../engine.php?cat=1&action=0&id=".$result."\";</script>";
    }
    $imagen1 = "";
    exit;
 } else {
     /*si tiene algun error verifica que solamente sea el que no se subio imagen
      *si es asi, procede a insertar o modificar el registro sin imagen
      */
     if ($errnoimg == 0) {
          if ($_SESSION["mttousuarios"] == "N") {
              //$result = $Obj->usuario_registrar($idusuario, $categoria, $usuario, $nombres, $apellidos, $cargo, $email, $idcliente, $idagente, $password);//proyectos_nuevo($titulo, $fechainicio, $fechafin, $observaciones, $_SESSION['IDUSUARIO']);
              $result = $Obj->usuario_registrar($idusuario, $categoria, $usuario, $nombres, $apellidos, $cargo, $email, $clientes, $agente, $password, $contactoemergencia, $idnacionalidad1, $npasaporte1, $pass1fechavenc, $idnacionalidad2, $npasaporte2, $pass2fechavenc, $visaamericana, $vencimientovisa, $asignacion,  $tipovisa, $vacunafiebreamarilla, $emisionvacuna, $vencimientovacuna, $intracompany, $alternatemail, $asistenteemail, $copyemail,$numeroemergencia);
          } elseif ($_SESSION["mttousuarios"] == "M") {
              $result = $Obj->usuario_modificar($idusuario, $categoria, $id, $nombres, $apellidos, $cargo, $email, $clientes, $agente, $password, $contactoemergencia, $idnacionalidad1, $npasaporte1, $pass1fechavenc, $idnacionalidad2, $npasaporte2, $pass2fechavenc, $visaamericana, $vencimientovisa, $asignacion,  $tipovisa, $vacunafiebreamarilla, $emisionvacuna, $vencimientovacuna, $intracompany, $alternatemail, $asistenteemail, $copyemail,$numeroemergencia);
          }
          if ($_SESSION["mttousuarios"] == "N") {
              echo "<script>alert('Usuario registado sin imagen'); window.location.href=\"../engine.php?cat=3&action=1&id=".$result."\";</script>";
              //echo "<script>alert('Nuevo Usuario ha sido registrado, debe registrar las autorizaciones del usuario para poder generar solicitudes nuevas'); window.location.href=\"../engine.php?cat=3&action=1&id=".$result."\";</script>";
          } elseif ($_SESSION["mttousuarios"] == "M") {
              echo "<script>alert('Usuario existente ha sido modificado sin imagen'); window.location.href=\"../engine.php?cat=1&action=0&id=".$result."\";</script>";
          }
          $imagen1 = "";
          exit;
    }
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