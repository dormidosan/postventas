<?php

include 'secure.php';
include 'classes/class.operaciones.php';

include "config.php";
$Obj = new Operaciones(True);


/*RECUPERA PERFILES DE LA TABLA TEMPORAL*/

$perfiles = $Obj->perfiles_temp_buscar();

$resultperfil = 0;
$resultnacionalidad = 0;
$resultvisas = 0;

$val = 0;
$val1 = 0;
$val2 = 0;
$val3 = 0;
$val4 = 0;
$fechanacimiento = '20180101';
$mesnacimiento = 0;
$dianacimiento = 0;

$fechaemision = '20180101';
$fechavencimiento = 0;
$mesvencimiento = 0;
$diavencimiento = 0;

/*ajusta el campo de residencia*/
$residencia = '';

/*obtiene el campo de nacionalidad*/
$nacionalidad = '';


for($i = 0; $i < count($perfiles); $i++) {
    /*ajusta el campo de residencia*/

    /*ajusta el campo de residencia*/
    //$val = $perfiles[$i][11]; //este valor original tomaba el valor del campo lugar de nacimiento para definir nacionalidad
    //$val = $perfiles[$i][2]; //Viene de la columna Nacionalidad 11
//    $val1 = substr($val,0,strpos($val,',')); //Val1 tomaba el valor de cortar despues de la coma en la columna fecha de nacimiento
    //$val1 = substr($val,0,strpos($val,',')); //Val1 contiene el valor del campo Lugar de nacimiento
//    $val3 = substr($val,strpos($val,',') + 2, strlen($val)) ; //En este punto corta ese valor de Lugar de Nacimiento después de la coma para 
    //echo $val1;
    //$val3 = $val;
    //$val2 = $Obj->ciudades_temp_buscar(trim($val1), trim($val3));
    //echo $val2[0][0];
    //echo $val3;
    //$val4 = $Obj->paises_temp_buscar(trim($val3));
    $val4 = $Obj->paises_temp_buscar(trim($perfiles[$i][2]));
    echo $val4[0][0];
    /*obtiene el campo de nacionalidad*/
//    echo 'asignaciones ok';
    
    if($perfiles[$i][10] == 0) {
           
    } else {
//        echo "mes: ".$perfiles[$i][9];
        if(strlen($perfiles[$i][9]) == 1) {
            $mesnacimiento = '0'.$perfiles[$i][9];
        } else {
            $mesnacimiento = $perfiles[$i][9];
        }
//        echo "dia: ".$perfiles[$i][8];
        if(strlen($perfiles[$i][8]) == 1) {
            $dianacimiento = '0'.$perfiles[$i][8];
        } else {
            $dianacimiento = $perfiles[$i][8];
        }
    
        $fechanacimiento = $perfiles[$i][10].$mesnacimiento.$dianacimiento;
    }
    
    if($perfiles[$i][7] == 0) {
           
    } else {
        //echo "mes: ".$perfiles[$i][6];
        if(strlen($perfiles[$i][6]) == 1) {
            $mesvencimiento = '0'.$perfiles[$i][6];
        } else {
            $mesvencimiento = $perfiles[$i][6];
        }
        //echo "dia: ".$perfiles[$i][5];
        if(strlen($perfiles[$i][5]) == 1) {
            $diavencimiento = '0'.$perfiles[$i][5];
        } else {
            $diavencimiento = $perfiles[$i][5];
        }
    
        $fechavencimiento = $perfiles[$i][7].$mesvencimiento.$diavencimiento;
    }
     
    try
    {
        
        //$resultperfil = $Obj->usuario_registrar(1, $perfiles[$i][1], '', '', '', $perfiles[$i][18], $perfiles[$i][19], 0, 0, '', 0, 0, $perfiles[$i][21], 0, $val4[0][0], $val2[0][0], '', '', '', $perfiles[$i][20], '', $fechanacimiento, $val3);
          $resultperfil = $Obj->usuario_registrar(1               , $perfiles[$i][1], ''          , ''    , ''    , $perfiles[$i][18]  , $perfiles[$i][19], 0                    , 0           , ''               , 0            , 0           , $perfiles[$i][21], 0        , $val4[0][0]  , ''       , ''            , ''             , ''        , $perfiles[$i][20], ''                , $fechanacimiento, $perfiles[$i][11], $perfiles[$i][18] , $perfiles[$i][19]);
        //$resultperfil = $Obj->usuario_registrar($_SESSION[''][0], $nombres        , '$apellidos', $cargo, $email, $contactoemergencia, $numeroemergencia, $vacunafiebreamarilla, $paisemision, $fechavencimiento, $intracompany, $idcategoria, $idclientes      , $idagente, $idresidencia, $idciudad, $alternatemail, $asistenteemail, $copyemail, $idasiento       , $comentarioasiento, $fechanacimiento, $lugarnacimiento);
        //$re = $Obj->usuario_registrar($idusuario, $nombres, $apellidos, $cargo, $email, $contactoemergencia, $numeroemergencia, $vacunafiebreamarilla, $paisemision, $fechavencimiento, $intracompany, $idcategoria, $idclientes, $idagente, $idresidencia, $idciudad, $alternatemail, $asistenteemail, $copyemail, $idasiento, $comentarioasiento, $fechanacimiento,                                        $lugarnacimiento, $contactoprechequeo, $numeroprechequeo, $codigoarea, $imagen);          
        $resultnacionalidad = $Obj->perfil_nacionalidad_registrar($val4[0][0], $resultperfil, $perfiles[$i][4], '', $fechaemision, $fechavencimiento, $perfiles[$i][13]);
        echo 'idperfil: '.$resultperfil.' ';
        echo 'idnacionalidad: '.$resultnacionalidad.' ';


        if ( (strlen($perfiles[$i][15]) > 1 ) ||  (strlen($perfiles[$i][22]) > 1 )) {
            $resultvisas = $Obj->perfil_visas_registrar($resultperfil, $resultnacionalidad, 227, '', $perfiles[$i][15], $perfiles[$i][16], $perfiles[$i][14], $perfiles[$i][22]);
            //echo 'idvisa: '.$resultvisas.' ';
            echo ' VISA='.$resultperfil.'-'. $resultnacionalidad.'-'. '227'. ''. $perfiles[$i][15].'-'. $perfiles[$i][16].'-'. $perfiles[$i][14].'-'. $perfiles[$i][22].'=VISA ' ;
        }
    echo "----";
    //$resultrg = $Obj->registrar_evento('Registro persona '.$perfiles[$i][1], '999');
    } catch (Exception $ex) {
       //$Obj->registrar_error('Error en registro de usuario '.$resultperfil, $ex, 'proceso', 'xx');
        //echo $ex;
        echo 'error visa';
    }
       
}

$result = "";

if (count($errors) == 0) {
    //no se encontraron errores, procede a insretar el registro con imagen
//    
//    if ($_SESSION["mttousuarios"] == "N") {
//        $result = $Obj->cliente_registrar($nombre, $idtipocliente, $idcatcliente, $telefono, $fax, $direccion, $razonsocial, $idfiscal, $activo, $exento, $observaciones, $diascredito, $montocredito);
//    } elseif ($_SESSION["mttousuarios"] == "M") {
//        
//        $result = $Obj->cliente_modificar($nombre, $idtipocliente, $idcatcliente, $telefono, $fax, $direccion, $razonsocial, $idfiscal, $activo, $exento, $observaciones, $diascredito, $montocredito, $id) ;
//    }
//
//    if ($_SESSION["mttousuarios"] == "N") {
//        echo "<script>alert('Cliente registado'); window.location.href=\"../engine_settings.php?mod=7&id=".$result."\";</script>";
//        //echo "<script>alert('Nuevo Usuario ha sido registrado, debe registrar las autorizaciones del usuario para poder generar solicitudes nuevas'); window.location.href=\"../engine.php?cat=3&action=1&id=".$result."\";</script>";
//    } elseif ($_SESSION["mttousuarios"] == "M") {
//        echo "<script>alert('Cliente existente ha sido modificado'); window.location.href=\"../engine_settings.php?mod=7&id=".$result."\";</script>";
//    }
//    $imagen1 = "";
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