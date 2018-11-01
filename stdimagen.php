<?php
include "secure.php" ;
require "config.php";

$cat = $_GET["cat"];
$ID = $_GET["ID"];

  try {
          $query = "";
         switch ($cat) {
             case 1:
                 $query = sprintf("select imagen from perfiles where idusuario = %d", $ID);
                 break;
             case 2:
                 $query = sprintf("select logo from clientes where idcliente = %d", $ID);
                 break;
             case 3:
                 $query = sprintf("select foto from usuarios where idusuario = %d", $ID);
                 break;
             
             case 4:
                 
                 break;                
         }
      
          $conex = mysql_connect($server, $user, $pass);
          mysql_select_db($base, $conex);
          $result = mysql_query($query, $conex);

          if (mysql_num_rows($result) == 0) {
            throw new Exception('La imagen para el ID especificado no se encontro');
          }

          $image = mysql_fetch_array($result);
          $imagen = $image[0];
          mysql_close();
          }
          catch (Exception $ex) {
            mysql_close();
            exit;
          }

          header("Content-type: image/jpeg");
          try {
              echo $imagen;
          } catch (Exception $ex) {
             echo 'No se encontro una imagen valida para mostrar';
          }
          
          
?>