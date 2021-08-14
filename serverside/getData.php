<?php 
// Database connection info 
$dbDetails = array( 
    'host' => 'localhost', 
    'user' => 'root', 
    'pass' => 'CP69775WD', 
    'db'   => 'inventario' 
); 
 
// DB table to use 
$table = 'facturas'; 
/* $Table = "( 
      SELECT a.id AS crmid, b.name 
      FROM forms a 
      INNER JOIN users b ON a.agent_id = b.id 
    ) table"; */
 
// Table's primary key 
$primaryKey = 'id_factura'; 
 
// Array of database columns which should be read and sent back to DataTables. 
// The `db` parameter represents the column name in the database.  
// The `dt` parameter represents the DataTables column identifier. 

$columns = array( 
    array( 'db' => 'id_factura', 'dt' => 0 ),
    array( 'db' => 'factura', 'dt' => 1 ), 
    array( 'db' => 'nombre', 'dt'  => 2 ), 
    array( 'db' => 'f_factura', 'dt' => 3 ), 
); 
 
// Include SQL query processing class 
require ('ssp.class.php'); 
 
// Output data as json format 
echo json_encode( 
    SSP::simple( $_GET, $dbDetails, $table, $primaryKey, $columns ) 
);

?>