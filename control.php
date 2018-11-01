<?php
include "config.php";
include "classes/class.operaciones.php";
$oper = new Operaciones(True);

$user = $_POST['usuario'];
$pass = $_POST['password'];
$bandera =  true;
if($user == "" or $pass == ""){
    $bandera = false;
    echo "<script>alert('No puede dejar los campos de Usuario y Password en blanco'); window.location.href=\"logout.php\";</script>";
}else{    
   $log = $oper->usuario_login($user, $pass); 
   //echo "<script>alert('SI'); window.location.href=\"logout.php\";</script>";
}
if ($bandera == true ) {
    
  if (count($log) <> 0 || $log <> null )    {
    session_start();
    if(isset($_SESSION["G50_Intranet"])){
        //echo "La sesion ya está abierta";
        echo "<script>alert('Este usuario ya tiene una sesion abierta en este navegador'); window.location.href=\"engine.php\";</script>";
    }
    $_SESSION["G50_Intranet"] = 1;
    $_SESSION["G50_IT_USERDAT"] = $log[0];
    
//    $sqllast = $oper->usuario_last_login($_SESSION["G50_IT_USERDAT"][0]);
//    if ($sqllast != null) {
//        echo "<script>alert('No se pudo actualizar la ultima visita'); window.location.href=\"logout.php\";</script>";
//    }
    //echo "<script>alert('No ha, ".$log[0][0]."'); window.location.href=\"logout.php\";</script>";
    header("Location: engineload.php?id=".$log[0][0]);
} else {
    echo "<script>alert('No hay coincidencia entre usuario y password, ".$log[0]."'); window.location.href=\"logout.php\";</script>";
}  
}

?>
