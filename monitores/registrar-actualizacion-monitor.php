<?php  
session_start();
include '../enlaces_sc/enlaces.php';
include '../base_datos/conexion_inventario.php';

echo '.';

$id = $_REQUEST['id_monitor'];
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$serie = $_POST['serie'];
$tipo_pantalla = $_POST['tipo_pantalla'];
$tamaño = $_POST['tamaño'];
$conex_vga = $_POST['conex_vga'];
$conex_hdmi = $_POST['conex_hdmi'];
$conex_dvi = $_POST['conex_dvi_d'];
$conex_dp = $_POST['conex_dp'];
$resolucion = $_POST['resolucion'];
$service_tag = $_POST['service_tag'];
$express_service_code = $_POST['express_service_code'];
$proveedor = $_POST['proveedor'];
$factura = $_POST['factura'];
$fecha_compra = $_POST['fecha_compra'];
$activoFijo = $_POST['activoFijo'];
$observaciones = $_POST['observaciones'];
$estado = $_REQUEST['estado'];




$sql = "UPDATE ft_monitor SET id_activo_fijo = '$activoFijo', marca = '$marca', modelo = '$modelo', tipo_pantalla = '$tipo_pantalla', tamaño = '$tamaño', 
		conex_vga = '$conex_vga', conex_hdmi = '$conex_hdmi', conex_dvi_d = '$conex_dvi', conex_dp = '$conex_dp', resolucion = '$resolucion', serie = '$serie', 
		service_tag = '$service_tag', express_service_code = '$express_service_code', id_proveedor = '$proveedor', factura = '$factura', 
		fecha_compra = '$fecha_compra', observaciones = '$observaciones',estado='$estado' WHERE id = '$id'";

$resultado = mysqli_query($link, $sql) or die("Error: ".mysqli_error($link));	

$sql2="UPDATE activos_fijos SET activos_fijos.estado='$estado' WHERE activos_fijos.id='$activoFijo'";
$resultado_activo_fijo= mysqli_query($link,$sql2) or die ("Error: ".mysqli_error($link));

if (isset($resultado)){ ?>
	<script>
	Swal.fire({
	icon: 'success',
	title: 'Monitor Actualizado',
	 confirmButtonText: `Aceptar`,
}).then((result) => {
  if (result.isConfirmed) {
	  
	window.location='ver-monitor.php';
  } else if (result.isConfirmed == false) {
	window.location='ver-monitor.php';
  }
})
	</script> 

	<?php } ?>