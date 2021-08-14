<?php  
session_start();
include '../enlaces_sc/enlaces.php';
include '../base_datos/seguridad.php';
include '../base_datos/conexion_inventario.php';

echo '.';

$activoFijo = $_POST['activoFijo'];
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$serie = $_POST['serie'];
$parte = $_POST['parte'];
$service_tag = $_POST['service_tag'];
$exp_serv_code = $_POST['exp_serv_code'];
$velocidadProcesador = $_POST['velocidadProcesador'];
$modeloProcesador = $_POST['modeloProcesador'];
$dicoDuroUno = $_POST['dicoDuroUno'];
$dicoDuroDos = $_POST['dicoDuroDos'];
$dicoDuroTres = $_POST['dicoDuroTres'];
$ram1_cant = $_POST['ram1_cant'];
$ram2_cant = $_POST['ram2_cant'];
$ram3_cant = $_POST['ram3_cant'];
$ram4_cant = $_POST['ram4_cant'];
$proveedor = $_POST['proveedor'];
$factura = $_POST['factura'];
$valorComputador = $_POST['valorComputador'];
$fechaCompra = $_POST['fechaCompra'];
$fechaInstalacion = $_POST['fechaInstalacion'];
$fechaRetiro = $_POST['fechaRetiro'];
$tipoDispositivo = $_POST['tipoDispositivo'];
$macLan = $_POST['macLan'];
$macWifi = $_POST['macWifi'];
$dominio = $_POST['dominio'];
$obsevaciones = $_POST['obsevaciones'];

	if(isset($_POST['ram1_tipo'])) {
	$ram1_tipo = $_POST['ram1_tipo']; } 
	else $ram1_tipo='';

	if(isset($_POST['ram2_tipo'])) {
		$ram2_tipo = $_POST['ram2_tipo']; } 
		else $ram2_tipo='';	
	
	if(isset($_POST['ram3_tipo'])) {
		$ram3_tipo = $_POST['ram3_tipo']; } 
		else $ram3_tipo='';

	if(isset($_POST['ram4_tipo'])) {
		$ram4_tipo = $_POST['ram4_tipo']; } 
		else $ram4_tipo='';

$sql = "INSERT INTO ft_computador (id_activo_fijo, marca, modelo, serie, parte, service_tag, exp_serv_code, velocidad_procesador,
modelo_procesador, disco_duro_1, disco_duro_2, disco_duro_3, ram1_cant, ram1_tipo, ram2_cant, ram2_tipo, ram3_cant, ram3_tipo, ram4_cant, ram4_tipo,
id_proveedor, factura, valor_compra, fecha_compra, fecha_instalacion, fecha_retiro, tipo_dispositivo, mac_lan, mac_wifi, dominio, 
estado, observaciones) VALUES ('$activoFijo', '$marca', '$modelo', '$serie', '$parte', '$service_tag', '$exp_serv_code', 
'$velocidadProcesador', '$modeloProcesador', '$dicoDuroUno', '$dicoDuroDos', '$dicoDuroTres', '$ram1_cant', '$ram1_tipo', '$ram2_cant', '$ram2_tipo', 
'$ram3_cant', '$ram3_tipo', '$ram4_cant', '$ram4_tipo', '$proveedor', '$factura','$valorComputador', '$fechaCompra', '$fechaInstalacion',
'$fechaRetiro', '$tipoDispositivo', '$macLan', '$macWifi', '$dominio', '1', '$obsevaciones')";

$resultado = mysqli_query($link,$sql) or die("Error: ".mysqli_error($link));	


if ($resultado>0){ ?>
	<script>
	Swal.fire({
	icon: 'success',
	title: 'Computador Creado',
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