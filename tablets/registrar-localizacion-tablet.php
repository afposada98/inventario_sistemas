<?php  
session_start();
include '../enlaces_scripts/enlaces.php';
include '../base_datos/seguridad.php';
include ('../base_datos/conexion_inventario.php');

$id_activo = $_REQUEST['activo_fijo'];
$localizacion = $_REQUEST['localizacion'];

$sql = "UPDATE activos_fijos SET id_localizacion = '$localizacion' WHERE id = '$id_activo'";

$resultado = mysqli_query($link, $sql) or die("Error: ".mysqli_error($link));	

echo "."; 

if($resultado) { 

	echo "<script>

	Swal.fire({
		icon: 'success',
		title: 'Se Trasladó la Tablet',
		confirmButtonText: `Aceptar`,
	}).then((result) => {

		if (result.isConfirmed) {
			window.location = 'ver_tablets.php';
		} else if (result.isConfirmed == false) {
		window.location = 'ver_tablets.php';
		}
	})
</script>";


} else {

	echo "<script>

	Swal.fire({
		icon: 'error',
		title: 'No se pudo trasladar la tablet',
		confirmButtonText: `Aceptar`,
	}).then((result) => {

		if (result.isConfirmed) {
			window.location = 'ver_tablets.php';
		} else if (result.isConfirmed == false) {
		window.location = 'ver_tablets.php';
		}
	})
</script>";
	
}
?>