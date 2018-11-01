<?php

session_start();
if($_SESSION["G50_Intranet"] != 1){
    header("Location: http://postventa.mytravelcore.com");
    exit();
}
?>
