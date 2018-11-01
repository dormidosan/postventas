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

$errors = array();
$nombres = $_POST['nombres4'];
$apellidos = $_POST['apellidos4'];
$usuario = $_POST['usuario4'];
$password = $_POST['password4'];
$email = $_POST['email4'];
$cargo = $_POST['cargo_sysuser4'];
//$foto = $_POST['apellidos3'];
$activo = $_POST['sysuser_activo4'];




$result = "";

if (1) {
    //no se encontraron errores, procede a insretar el registro con imagen
    
    if ($_SESSION["mttosysusers"] == "N") {
             $result = $Obj->sysusers_registrar($idusuario, $nombres, $apellidos, $usuario, $password, $email, $cargo, $foto, $activo );
    } elseif ($_SESSION["mttosysusers"] == "M") {
        
       $result = $Obj->sysusers_modificar($idusuario, $id , $nombres, $apellidos, $usuario, $password, $email, $cargo,        $activo );
    }

    if ($_SESSION["mttosysusers"] == "N") {
        echo "<script>alert('Usuario de sistema registado'); window.location.href=\"../engine_settings.php?mod=5&id=".$result."\";</script>";
        //echo "<script>alert('Nuevo Usuario ha sido registrado, debe registrar las autorizaciones del usuario para poder generar solicitudes nuevas'); window.location.href=\"../engine.php?cat=3&action=1&id=".$result."\";</script>";
    } elseif ($_SESSION["mttosysusers"] == "M") {
        echo "<script>alert('Usuario de sistema existente ha sido modificado'); window.location.href=\"../engine_settings.php?mod=5&id=".$result."\";</script>";
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