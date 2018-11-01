<?php
    require "secure.php"; //seguridad requerida
    include "config.php";
    include "classes/class.operaciones.php";
    
    //recibe el id del usuario logueado
    $id = $_GET['id'];
    $oper = new Operaciones(True);

    $profile = $oper->usuario_datos($id); //llama el contenido de la tabla del perfil del usuario
    $_SESSION["G50_IT_USERDAT"] = $profile[0]; //item cero del array de sesion es el perfil del usuario
           
    $defaults = $oper->Defaults_buscar($iduser);
    $_SESSION["AyD_TC_DEFAULTS"] = $defaults[0];
    
    $sqllast = $oper->usuario_last_login($id);
    //echo "<script>alert('No se pudo actualizar la ultima visita'".$profile[0][2]."); window.location.href=\"logout.php\";</script>";    
    if ($sqllast != null) {
        //Actualiza la ultima visita del usuario
        echo "<script>alert('No se pudo actualizar la ultima visita'); window.location.href=\"logout.php\";</script>";
    }
    //echo "mensaje".$profile[0][1]."mensaje";
    header("Location: engine.php");
?>