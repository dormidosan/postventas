<?php

include '../classes/class.operaciones.php';

$obj = new Operaciones(True);
$data = array();
$post_id = $_GET['post_id'];
$opcion = $_GET['opcion'];

if(!empty($post_id) and ($opcion == 1) ){
  
    //require "secure.php";
   
    //database details
    
   //$selcliente = $obj->perfil_completo($post_id);
   $selcliente = $obj->perfiles_buscar($post_id);
    //create connection and select DB
    //$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
    //if($db->connect_error){
     //   die("Unable to connect database: " . $db->connect_error);
    //}
    
    //get user data from the database
    //$selcliente = $db->query("SELECT * FROM users WHERE id = {$_POST['user_id']}");
    if($selcliente){
        //$userData = $selcliente->fetch_assoc();
        $data['status'] = 'ok';
        $data['result'] = $selcliente;
    }else{
        $data['status'] = 'err';
        $data['result'] = '';
    }
    //returns data as JSON format
    echo json_encode($data);
}
if(!empty($post_id) and ($opcion == 2)){
    $arrayretorno = $obj->perfil_buscar_nacionalidades($post_id);
    
    if($arrayretorno){
        $data['status'] = 'ok';
        $data['result'] = $arrayretorno;
    }else{
        $data['status'] = 'err';
        $data['result'] = '';
    }
    //returns data as JSON format
    echo json_encode($data);
}

if(!empty($post_id) and ($opcion == 3)){
    $arrayretorno = $obj->perfil_buscar_visas($post_id);
        
    if($arrayretorno){
        $data['status'] = 'ok';
        $data['result'] = $arrayretorno;
    }else{
        $data['status'] = 'err';
        $data['result'] = '';
    }
    //returns data as JSON format
    echo json_encode($data);
}
if(!empty($post_id) and ($opcion == 4)){
    $arrayretorno = $obj->perfil_buscar_carriers($post_id);
       
    if($arrayretorno){
        $data['status'] = 'ok';
        $data['result'] = $arrayretorno;
    }else{
        $data['status'] = 'err';
        $data['result'] = '';
    }
    //returns data as JSON format
    echo json_encode($data);
}

if(!empty($post_id) and ($opcion == 5)){
    $arrayretorno = $obj->ciudades_pais_buscar($post_id);
       
    if($arrayretorno){
        $data['status'] = 'ok';
        $data['result'] = $arrayretorno;
    }else{
        $data['status'] = 'err';
        $data['result'] = '';
    }
    //returns data as JSON format
    echo json_encode($data);
}

?>