<?php  
session_start();
include '../enlaces_sc/enlaces.php';
include '../base_datos/conexion_inventario.php';

echo '.';


$id_activo = $_REQUEST['activo_fijo'];
$localizacion = $_REQUEST['localizacion'];


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
	  
	window.location='ver-mouses.php';
  } else if (result.isConfirmed == false) {
	window.location='ver-mouses.php';
  }
})
	</script> 

	<?php } ?>