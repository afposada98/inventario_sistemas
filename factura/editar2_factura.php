<?php  
session_start();
include '../enlaces_sc/enlaces.php';
include '../base_datos/seguridad.php';
include '../base_datos/conexion_inventario.php';

date_default_timezone_set("America/Bogota");
echo '.';

$id=$_POST['id_factura'];
$factura = $_POST['factura'];
$proveedor = $_POST['proveedor'];
$f_factu = $_POST['f_factu'];
$observaciones = $_POST['observaciones'];
$fecha_modifica=date("Y-m-d-H:i:s");

 

$sql = "UPDATE factura1 SET factura='$factura', id_proveedor='$proveedor', f_factura='$f_factu',
comentarios='$observaciones', f_modifica='$fecha_modifica', u_modifica='$login' WHERE id_factura='$id'";

$resultado = mysqli_query($link,$sql) or die("Error: ".mysqli_error($link));	

$last_id = mysqli_insert_id($link);

if (isset($resultado)){ ?>
	<script>
	Swal.fire({
	icon: 'success',
	title: 'Factura Modificada',
	 confirmButtonText: `Aceptar`,
}).then((result) => {
  if (result.isConfirmed) {
	  
	window.location='ver_factura.php';
  } else if (result.isConfirmed == false) {
	window.location='ver_factura.php';
  }
})
	</script> 

	<?php } ?>