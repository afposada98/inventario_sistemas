<?php
session_start();
include '../base_datos/conexion_inventario.php';
include '../enlaces_sc/enlaces.php';

$id_factura=$_REQUEST['id_factura'];

$id_detalle=0;
if(isset($_REQUEST['id_detalle'])){
    $id_detalle=$_REQUEST['id_detalle'];
}

echo '.';


$sql = "DELETE FROM factura2 WHERE id_detalle='$id_detalle'";

$resultado = mysqli_query($link,$sql) or die("Error: ".mysqli_error($link));	


if (isset($resultado)){ ?>
    <script>
    Swal.fire({
    icon: 'success',
    title: 'Producto Eliminado',
     confirmButtonText: `Aceptar`,
}).then((result) => {
  if (result.isConfirmed) {
      
    window.location='editar_factura.php?id=<?=$id_factura?>';
  } else if (result.isConfirmed == false) {
    window.location='ver_factura.php';
  }
})
    </script> 
    <?php

}


?>