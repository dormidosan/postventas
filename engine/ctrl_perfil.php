<?php
/*CARGAR LOS PERFILES DE UN CLIENTE EN ESPECIAL*/

include '../secure.php';
include '../classes/class.operaciones.php';

include "../Config.php";
$Obj = new Operaciones(True);

$id = $_GET["id"];
$idusuario = $_SESSION["IDUSUARIO"];
$action = $_GET["action"];

$errors = array();
$clientes = $_POST['clientes'];

$result = "";

if ($action == 1) {
      
     $result = $Obj->perfil_disable($idusuario,$id);
     
     echo "<script>alert('Usuario actualizado'); window.location.href=\"../engine.php\";</script>";

    exit;
}

if ($result == "") {
    //no se encontraron errores, procede a insretar el registro con imagen
    
        $result = $Obj->perfil_buscar_empresa($clientes);
    echo "<script>window.location.href=\"../engine.php?mod=5&id=".$clientes."\";</script>";

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