<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include "secure.php";
require "classes/class.operaciones.php";

$oper = new Operaciones(true);
$oper->registrar_evento('Logout de usuario '.$_SESSION["USERDAT"][0], $_SESSION["USERDAT"][0]);
session_start();
session_destroy();
header("Location: index.php");
?>

