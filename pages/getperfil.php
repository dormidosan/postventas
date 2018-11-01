<?php
include '../classes/class.operaciones.php';
//echo $_GET['post_id'];
/*
if(empty($_GET['post_id'])){
    echo "el1 ".$_GET['post_id'];
}
*/
if(!empty($_GET['post_id'])){
    $obj = new Operaciones(True);
    $data = array();
    //require "secure.php";
   
    //database details
    
   $selcliente = $obj->usuario_perfil($_GET['post_id']);
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
?>