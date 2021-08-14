<?php
session_start();
include '../enlaces_sc/enlaces.php';
include ('../base_datos/conexion_inventario.php');

//$asignado = $_SESSION['id'];

//$personal = $_SESSION['usuario'];
$id = $_POST['consecutivo'];
$nombre = $_POST['nombre'];
$direccion = $_POST['direccion'];
$celular = $_POST['celular'];
$contacto = $_POST['contacto'];
$estado = $_POST['estado'];

echo '.';

$sql = "UPDATE proveedores SET nombre = '$nombre', direccion = '$direccion', celular = '$celular',
 contacto= '$contacto', estado='$estado' WHERE id = '$id'";

$resultado = mysqli_query($link, $sql) or die("Error: ".mysqli_error($link));	



if (isset($resultado)){ ?>
    <script>
    Swal.fire({
    icon: 'success',
    title: 'Proveedor Modificado',
     confirmButtonText: `Aceptar`,
}).then((result) => {
  if (result.isConfirmed) {
      
    window.location='ver-proveedores.php';
  } else if (result.isConfirmed == false) {
    window.location='ver-proveedores.php';
  }
})
    </script> 
    <?php

}
?>