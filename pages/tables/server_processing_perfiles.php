<?php
 include "config.php";
if($server == '') {
    include "../config.php";
}if($server == '') {
    include "../../config.php";
}if($server == '') {
    include "../../../config.php";
}
/*
 * DataTables example server-side processing script.
 *
 * Please note that this script is intentionally extremely simply to show how
 * server-side processing can be implemented, and probably shouldn't be used as
 * the basis for a large complex system. It is suitable for simple use cases as
 * for learning.
 *
 * See http://datatables.net/usage/server-side for full details on the server-
 * side processing requirements of DataTables.
 *
 * @license MIT - http://datatables.net/license_mit
 */
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */
 
// DB table to use
$table = 'todos_perfiles_side';
 
// Table's primary key
$primaryKey = 'idusuario';
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array( 'db' => 'nombres',    'dt' => 'nombres' ),
    array( 'db' => 'apellidos',  'dt' => 'apellidos' ),
    array( 'db' => 'cargo',      'dt' => 'cargo' ),
    array( 'db' => 'idusuario',  'dt' => 'idusuario' ),
    array( 'db' => 'correo',     'dt' => 'correo' ),
    array( 'db' => 'cliente',    'dt' => 'cliente' ),
    
);
//$server = '';
//$base = '';
//$user = '';
//$pass = '';
// SQL server connection information

/*
 $server = 'grupo5cero.cempd0h1kkhk.us-west-2.rds.amazonaws.com';
$base = 'db_intranet_tc';
$user = 'root';
$pass = 'raqxek-Bihxaj-5copza';
 */
/*
$sql_details = array(
    'user' => 'usr_intranet_tc',
    'pass' => 'DB_$In+r@n3+#',
    'db'   => 'db_intranet_tc',
    'host' => 'localhost'
);
 */
$sql_details = array(
    'user' => $user,
    'pass' => $pass,
    'db'   => $base,
    'host' => $server
);
/*
$sql_details = array(
    'user' => 'Postvent4',
    'pass' => 'G50Postvent4*',
    'db'   => 'db_intranet_tc',
    'host' => '68.183.98.239'
);
 */
/*
 * Postvent4 
 * G50Postvent4* 
 * db_intranet_tc 
 * 68.183.98.239
*/
/*
$sql_details = array(
    'user' => 'root',
    'pass' => 'raqxek-Bihxaj-5copza',
    'db'   => 'db_intranet_tc',
    'host' => 'grupo5cero.cempd0h1kkhk.us-west-2.rds.amazonaws.com'
); 
*/

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */
 
require( 'ssp.class.php' );
//echo "prueba"; 
if ($_GET['cliente'] == 0) {
     echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
    );  
}else{
    $whereAll = 'idcliente = '.$_GET['cliente'];
    echo json_encode(
        SSP::complex($_GET, $sql_details, $table, $primaryKey, $columns, $whereResult = null, $whereAll)
    );  
}
   

//var_dump(SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns ))  ;