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
$nombres = (empty($_POST['nombres'])) ? '-' : $_POST['nombres'];
$apellidos = (empty($_POST['apellidos'])) ? '-' : $_POST['apellidos'];
$cargo = (empty($_POST['cargo'])) ? '-' : $_POST['cargo'];
$email = (empty($_POST['email'])) ? '-' : $_POST['email'];
$contactoemergencia = (empty($_POST['contactoemergencia'])) ? '-' : $_POST['contactoemergencia'];
$numeroemergencia = (empty($_POST['numeroemergencia'])) ? '-' :  $_POST['numeroemergencia'];

$vacunafiebreamarilla = (empty($_POST['vacunafiebreamarilla'])) ? '0' : $_POST['vacunafiebreamarilla'];
$paisemision = (empty($_POST['paisemision'])) ? '0' : $_POST['paisemision'];
$fechavencimiento = (empty($_POST['fechavencimiento'])) ? '0000-00-00' : $_POST['fechavencimiento'];

$imagen1 =  $_FILES['imagen'];

$intracompany = (empty($_POST['intracompany'])) ? '0' : $_POST['intracompany'];
$idcategoria = (empty($_POST['idcategoria'])) ? '0' : $_POST['idcategoria'];

$idclientes = (empty($_POST['idcliente'])) ? '0' : $_POST['idcliente'];
$idagente = (empty($_POST['idagente'])) ? '0' : $_POST['idagente'];



$idresidencia = (empty($_POST['idresidencia'])) ? '0' : $_POST['idresidencia'];
$idciudad = (empty($_POST['idciudad'])) ? '0' : $_POST['idciudad'];

$alternatemail = (empty($_POST['alternatemail'])) ? '-' : $_POST['alternatemail'];
$asistenteemail = (empty($_POST['asistenteemail'])) ? '-' : $_POST['asistenteemail'];
$copyemail = (empty($_POST['copyemail'])) ? '-' : $_POST['copyemail'];
//$fecha_registro;
$idasiento = (empty($_POST['idasiento'])) ? '-' : $_POST['idasiento'];
$comentarioasiento = (empty($_POST['comentarioasiento'])) ? '-' : $_POST['comentarioasiento'];

$fechanacimiento = (empty($_POST['fechanacimiento'])) ? '-' : $_POST['fechanacimiento'];
$lugarnacimiento = (empty($_POST['lugarnacimiento'])) ? '-' : $_POST['lugarnacimiento'];

$contactoprechequeo = (empty($_POST['contactoprechequeo'])) ? '-' : $_POST['contactoprechequeo'];
$numeroprechequeo = (empty($_POST['numeroprechequeo'])) ? '-' : $_POST['numeroprechequeo'];
$codigoarea = (empty($_POST['codigoarea'])) ? '-' : $_POST['codigoarea'];

$sexo = (empty($_POST['sexo'])) ? '-' : $_POST['sexo'];

/*
$pass1fechavenc = date("Y-m-d", strtotime($_POST['pass1fechavenc']));
$pass2fechavenc = date("Y-m-d", strtotime($_POST['pass2fechavenc']));
$vencimientovisa = date("Y-m-d", strtotime($_POST['vencimientovisa']));
$vencimientovacuna = date("Y-m-d", strtotime($_POST['vencimientovacuna']));
*/


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
        $result1 = "11";
        $result = $Obj->usuario_registrar($idusuario,
                                          $nombres ,$apellidos ,$cargo ,$email ,$contactoemergencia ,
                                          $numeroemergencia ,$vacunafiebreamarilla ,$paisemision ,
                                          $fechavencimiento ,$intracompany ,$idcategoria ,$idclientes ,
                                          $idagente ,$idresidencia ,$idciudad ,$alternatemail ,
                                          $asistenteemail ,$copyemail ,$idasiento,$comentarioasiento ,
                                          $fechanacimiento,$lugarnacimiento,$contactoprechequeo,$numeroprechequeo,$codigoarea,$sexo,
                                          file_get_contents($imagen['tmp_name']));
    } elseif ($_SESSION["mttousuarios"] == "M") {
        $result1 = "22";
        $result = $Obj->usuario_modificar($idusuario,$id,
                                          $nombres ,$apellidos ,$cargo ,$email ,$contactoemergencia ,
                                          $numeroemergencia ,$vacunafiebreamarilla ,$paisemision ,
                                          $fechavencimiento ,$intracompany ,$idcategoria ,$idclientes ,
                                          $idagente ,$idresidencia ,$idciudad ,$alternatemail ,
                                          $asistenteemail ,$copyemail ,$idasiento,$comentarioasiento ,
                                          $fechanacimiento,$lugarnacimiento,$contactoprechequeo,$numeroprechequeo,$codigoarea,$sexo,
                                          file_get_contents($imagen['tmp_name']));
    }
    if ($_SESSION["mttousuarios"] == "N") {
        //echo "<script>alert('Usuario registado con imagen'); window.location.href=\"../engine_settings.php?mod=6&id=".$result."\";</script>";
        echo "<script>alert('Usuario registado con imagen'); window.location.href=\"../engine_settings.php?mod=6&action=1&id=".$result."#infoPerfil\";</script>";
        //echo "<script>alert('Nuevo Usuario ha sido registrado, debe registrar las autorizaciones del usuario para poder generar solicitudes nuevas'); window.location.href=\"../engine.php?cat=3&action=1&id=".$result."\";</script>";
        //'engine_settings.php?mod=6&action=1&id=' + post_id + '#infoPerfil'
    } elseif ($_SESSION["mttousuarios"] == "M") {
        echo "<script>alert('Usuario existente ha sido modificado con imagen'); window.location.href=\"../engine_settings.php?mod=6&id=".$result."\";</script>";
    }
    $imagen1 = "";
    exit;
 } else {
     /*si tiene algun error verifica que solamente sea el que no se subio imagen
      *si es asi, procede a insertar o modificar el registro sin imagen
      */
     if ($errnoimg == 0) {
          if ($_SESSION["mttousuarios"] == "N") {
              $result1 = "33";
              //$result = $Obj->usuario_registrar($idusuario, $categoria, $usuario, $nombres, $apellidos, $cargo, $email, $idcliente, $idagente, $password);//proyectos_nuevo($titulo, $fechainicio, $fechafin, $observaciones, $_SESSION['IDUSUARIO']);
              $result = $Obj->usuario_registrar($idusuario,
                                          $nombres ,$apellidos ,$cargo ,$email ,$contactoemergencia ,
                                          $numeroemergencia ,$vacunafiebreamarilla ,$paisemision ,
                                          $fechavencimiento ,$intracompany ,$idcategoria ,$idclientes ,
                                          $idagente ,$idresidencia ,$idciudad ,$alternatemail ,
                                          $asistenteemail ,$copyemail ,$idasiento,$comentarioasiento ,
                                          $fechanacimiento,$lugarnacimiento,$contactoprechequeo,$numeroprechequeo,$codigoarea,$sexo);
          } elseif ($_SESSION["mttousuarios"] == "M") {
              $result1 = "444";
              //$result = $Obj->usuario_modificar($idusuario, $categoria, $id, $nombres, $apellidos, $cargo, $email, $clientes, $agente, $password, $contactoemergencia, $idnacionalidad1, $npasaporte1, $pass1fechavenc, $idnacionalidad2, $npasaporte2, $pass2fechavenc, $visaamericana, $vencimientovisa, $asignacion,  $tipovisa, $vacunafiebreamarilla, $emisionvacuna, $vencimientovacuna, $intracompany, $alternatemail, $asistenteemail, $copyemail,$numeroemergencia);
              $result = $Obj->usuario_modificar($idusuario,$id,
                                          $nombres ,$apellidos ,$cargo ,$email ,$contactoemergencia ,
                                          $numeroemergencia ,$vacunafiebreamarilla ,$paisemision ,
                                          $fechavencimiento ,$intracompany ,$idcategoria ,$idclientes ,
                                          $idagente ,$idresidencia ,$idciudad ,$alternatemail ,
                                          $asistenteemail ,$copyemail ,$idasiento,$comentarioasiento ,
                                          $fechanacimiento,$lugarnacimiento,$contactoprechequeo,$numeroprechequeo,$codigoarea,$sexo);
          }
          if ($_SESSION["mttousuarios"] == "N") {
              //echo "<script>alert('Usuario registado sin imagen'); window.location.href=\"../engine_settings.php?mod=6&id=".$result."\";</script>";
              echo "<script>alert('Usuario registado sin imagen'); window.location.href=\"../engine_settings.php?mod=6&action=1&id=".$result."#infoPerfil\";</script>";
              //echo "<script>alert('Nuevo Usuario ha sido registrado, debe registrar las autorizaciones del usuario para poder generar solicitudes nuevas'); window.location.href=\"../engine.php?cat=3&action=1&id=".$result."\";</script>";
          } elseif ($_SESSION["mttousuarios"] == "M") {
              echo "<script>alert('Usuario existente ha sido modificado sin imagen'); window.location.href=\"../engine_settings.php?mod=6&id=".$result."\";</script>";
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