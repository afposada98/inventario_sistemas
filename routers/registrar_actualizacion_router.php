<?php  
session_start();
include '../enlaces_sc/enlaces.php';
include '../base_datos/conexion_inventario.php';

echo '.';

$id = $_REQUEST['id_router'];
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$serie = $_POST['serie'];
$puertos = $_POST['puertos'];
$velocidad = $_POST['velocidad'];
$banda = $_POST['banda'];
$mac = $_POST['mac'];
$firmware = $_POST['firmware'];
$proveedor = $_POST['proveedor'];
$factura = $_POST['factura'];
$fecha_factura = $_POST['fecha_factura'];
$vr_compra = $_POST['vr_compra'];
$observaciones = $_POST['observaciones'];
$estado = $_REQUEST['estado'];
$activoFijo = $_POST['id_activo'];


$sql = "UPDATE ft_suiche SET  marca = '$marca', modelo = '$modelo', serie = '$serie', puertos = '$puertos', velocidad = '$velocidad',
banda = '$banda', direccion_mac = '$mac', version_firmware = '$firmware', id_proveedor = '$proveedor', factura = '$factura',
f_factura = '$fecha_factura', valor='$vr_compra', observaciones = '$observaciones', estado='$estado' WHERE id = '$id'";
$resultado = mysqli_query($link, $sql) or die("Error: ".mysqli_error($link));

$sql2="UPDATE activos_fijos SET activos_fijos.estado='$estado' WHERE activos_fijos.id='$activoFijo'";
$resultado_activo_fijo= mysqli_query($link,$sql2) or die ("Error: ".mysqli_error($link));

if (isset($resultado)){ ?>
	<script>
	Swal.fire({
	icon: 'success',
	title: 'Suiche/Router Modificado',
	 confirmButtonText: `Aceptar`,
}).then((result) => {
  if (result.isConfirmed) {
	  
	window.location='ver_routers.php';
  } else if (result.isConfirmed == false) {
	window.location='ver_routers.php';
  }
})
	</script> 

	<?php } ?>