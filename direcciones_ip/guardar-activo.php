<?php  
session_start();
include '../enlaces_sc/enlaces.php';
include ('../base_datos/conexion_inventario.php');

$id = $_POST['id_ip'];
$activo_fijo = $_POST['activo'];

echo '.';

$sql = "UPDATE direcciones_ip SET id_activo_fijo = '$activo_fijo' WHERE id = '$id'";

$resultado = mysqli_query($link, $sql) or die("Error: ".mysqli_error($link));	


if (isset($resultado)){ ?>
	<script>
	Swal.fire({
	icon: 'success',
	title: 'Direccion IP Asignada',
	 confirmButtonText: `Aceptar`,
}).then((result) => {
  if (result.isConfirmed) {
	  
	window.location='ver-direcciones-ip.php';
  } else if (result.isConfirmed == false) {
	window.location='ver-direcciones-ip.php';
  }
})
	</script> 
	<?php

}


?>