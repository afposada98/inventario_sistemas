<?php  
session_start();
include '../base_datos/seguridad.php';
include ('../base_datos/conexion_inventario.php');
include '../enlaces_sc/enlaces.php';

$id_activo = $_REQUEST['activo_fijo'];
$localizacion = $_REQUEST['localizacion'];

echo '.';
/* echo $id_activo. " " . $localizacion;
exit(); */


$sql = "UPDATE activos_fijos SET id_localizacion = '$localizacion' WHERE id = '$id_activo'";

$resultado = mysqli_query($link, $sql) or die("Error: ".mysqli_error($link));	


if (isset($resultado)){ ?>
	<script>
	Swal.fire({
	icon: 'success',
	title: 'Localización Actualizada',
	 confirmButtonText: `Aceptar`,
}).then((result) => {
  if (result.isConfirmed) {
	  
	window.location='ver-computadores.php';
  } else if (result.isConfirmed == false) {
	window.location='ver-computadores.php';
  }
}) 
	</script> 

<?php 
}
?>