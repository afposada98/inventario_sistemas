<?php  
session_start();
include '../enlaces_sc/enlaces.php';
include '../base_datos/seguridad.php';
include '../base_datos/conexion_inventario.php';

echo '.';

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



$sql = "INSERT INTO ft_monitor (id, marca, modelo, tipo_pantalla, tamaño, conex_vga, conex_hdmi, conex_dvi_d, conex_dp, resolucion, serie, service_tag,
express_service_code, id_proveedor, factura, fecha_compra, estado, id_activo_fijo, observaciones ) VALUES (NULL, '$marca', '$modelo', '$tipo_pantalla',
'$tamaño', '$conex_vga', '$conex_hdmi', '$conex_dvi', '$conex_dp', '$resolucion', '$serie', '$service_tag', '$express_service_code', '$proveedor', '$factura', 
'$fecha_compra', '1', '$activoFijo', '$observaciones')";


$resultado = mysqli_query($link,$sql) or die("Error: ".mysqli_error($link));	

if (isset($resultado)){ ?>
	<script>
	Swal.fire({
	icon: 'success',
	title: 'Monitor Creado',
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