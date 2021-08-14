<?php  
session_start();
include '../enlaces_sc/enlaces.php';
include '../base_datos/seguridad.php';
include '../base_datos/conexion_inventario.php';

date_default_timezone_set("America/Bogota");
echo '.';

$factura = $_POST['factura'];
$proveedor = $_POST['proveedor'];
$f_factu = $_POST['f_factu'];
$observaciones = $_POST['observaciones'];
$fecha_grabado=date("Y-m-d-H:i:s");



 

$sql = "INSERT INTO factura1 (factura, f_factura, id_proveedor, estado, comentarios,f_grabado,u_grabado)
VALUES ('$factura', '$f_factu', '$proveedor', 1, '$observaciones','$fecha_grabado','$login')";

$resultado = mysqli_query($link,$sql) or die("Error: ".mysqli_error($link));	

$last_id = mysqli_insert_id($link);

if (isset($resultado)){ ?>
	<script>
	Swal.fire({
	icon: 'success',
	title: 'Factura Creada',
	 confirmButtonText: `Aceptar`,
}).then((result) => {
  if (result.isConfirmed) {
	  
	window.location='editar_factura.php?id=<?=$last_id;?>';
  } else if (result.isConfirmed == false) {
	window.location='editar_factura.php';
  }
})
	</script> 

	<?php } ?>