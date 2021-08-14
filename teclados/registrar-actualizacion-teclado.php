<?php  
session_start();
include '../enlaces_sc/enlaces.php';
include '../base_datos/conexion_inventario.php';

echo '.';

$id = $_POST['id'];
$activoFijo = $_POST['activoFijo'];
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$serie = $_POST['serie'];
$proveedor = $_POST['proveedor'];
$tipo_conector = $_POST['tipo_conector'];
$factura = $_POST['factura'];
$fecha_compra = $_POST['fecha_compra'];
$tipo_conector = $_POST['tipo_conector'];
$observaciones = $_POST['observaciones'];
$estado = $_POST['estado'];


 

$sql = $sql = "UPDATE ft_teclado SET id_activo_fijo = '$activoFijo', marca = '$marca', modelo = '$modelo', serie = '$serie', factura = '$factura',
factura = '$factura', fecha_compra = '$fecha_compra', tipo_conector = '$tipo_conector', id_proveedor = '$proveedor', observaciones = '$observaciones'
,estado='$estado' WHERE id = '$id'";

$resultado = mysqli_query($link,$sql) or die("Error: ".mysqli_error($link));	

$sql2="UPDATE activos_fijos SET activos_fijos.estado='$estado' WHERE activos_fijos.id='$activoFijo'";
$resultado_activo_fijo= mysqli_query($link,$sql2) or die ("Error: ".mysqli_error($link));


if (isset($resultado)){ ?>
	<script>
	Swal.fire({
	icon: 'success',
	title: 'Teclado Actualizado',
	 confirmButtonText: `Aceptar`,
}).then((result) => {
  if (result.isConfirmed) {
	  
	window.location='ver-teclados.php';
  } else if (result.isConfirmed == false) {
	window.location='ver-teclados.php';
  }
})
	</script> 

	<?php } ?>