<?php
session_start();
include '../enlaces_sc/enlaces.php';
include ("../base_datos/conexion_inventario.php");

$id = $_GET['id'];
echo '.';

/*$sql1="DELETE FROM detalle_solicitudes WHERE id_solicitud = '".$id_solicitud."' ";
$resultado1 = mysqli_query($link,$sql1) or die("Error: ".mysqli_error($link));*/

$sql="UPDATE activos_fijos SET estado = 0 WHERE id = $id";
$resultado = mysqli_query($link,$sql) or die("Error :".mysqli_error($link));

if (isset($resultado)){ ?>
    <script>
    Swal.fire({
    icon: 'success',
    title: 'Activo Fijo Deshabilitado',
     confirmButtonText: `Aceptar`,
}).then((result) => {
  if (result.isConfirmed) {
      
    window.location='ver-activos-fijos.php';
  } else if (result.isConfirmed == false) {
    window.location='ver-activos-fijos.php';
  }
})
    </script> 
    <?php

}

?>
