<?php  
session_start();
include '../base_datos/seguridad.php';
include '../base_datos/conexion_inventario.php';
include '../enlaces_scripts/enlaces.php';

$activoFijo = $_POST['activoFijo'];
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$serie = $_POST['serie'];
$proveedor = $_POST['proveedor'];
$factura = $_POST['factura'];
$fecha_compra = $_POST['fecha_compra'];
$tipo_conector = $_POST['tipo_conector'];
$observaciones = $_POST['observaciones'];

 

$sql = "INSERT INTO ft_teclado (id, id_activo_fijo, marca, modelo, serie, factura, fecha_compra, tipo_conector, id_proveedor, 
estado, observaciones) VALUES (NULL, '$activoFijo', '$marca', '$modelo', '$serie',  '$factura', '$fecha_compra',  '$tipo_conector', 
'$proveedor',  '1', '$observaciones')";

$resultado = mysqli_query($link,$sql) or die("Error: ".mysqli_error($link));	

echo ".";

if($resultado) { 

	echo "<script>

	Swal.fire({
		icon: 'success',
		title: 'Se registró el teclado',
		confirmButtonText: `Aceptar`,
	}).then((result) => {

		if (result.isConfirmed) {
			window.location = 'ver-teclados.php';
		} else if (result.isConfirmed == false) {
		window.location = 'ver-teclados.php';
		}
	})
</script>";

} else {

	
	echo "<script>

	Swal.fire({
		icon: 'error',
		title: 'Error al registrar el teclado',
		confirmButtonText: `Aceptar`,
	}).then((result) => {

		if (result.isConfirmed) {
			window.location = 'ver-teclados.php';
		} else if (result.isConfirmed == false) {
		window.location = 'ver-teclados.php';
		}
	})
</script>";
	

}


?>