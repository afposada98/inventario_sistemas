<?php  
session_start();
include '../enlaces_sc/enlaces.php';
include '../base_datos/seguridad.php';
include '../base_datos/conexion_inventario.php';

echo '.';

$id=$_POST['id'];
$activoFijo = $_POST['id_activo_fijo'];
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$serie = $_POST['serie'];
$parte	 = $_POST['parte'];
$grupo = $_POST['grupo'];
$nombre_equipo = $_POST['nombre_equipo'];
$usuario = $_POST['usuario'];
$service_tag = $_POST['service_tag'];
$exp_serv_code = $_POST['exp_serv_code'];
$velocidadProcesador = $_POST['velocidadProcesador'];
$modeloProcesador = $_POST['modeloProcesador'];
$discoDuroUno = $_POST['discoDuroUno'];
$discoDuroDos = $_POST['discoDuroDos'];
$discoDuroTres = $_POST['discoDuroTres'];
$ram1_cant = $_POST['ram1_cant'];
$ram2_cant = $_POST['ram2_cant'];
$ram3_cant = $_POST['ram3_cant'];
$ram4_cant = $_POST['ram4_cant'];
$ram = $_POST['ram'];
$proveedor = $_POST['proveedor'];
$arquitectura = $_POST['arquitectura'];
$so = $_POST['so'];
$clasificacion = $_POST['clasificacion'];
$factura = $_POST['factura'];
$valorComputador = $_POST['valorComputador'];
$fechaCompra = $_POST['fechaCompra'];
$fechaInstalacion = $_POST['fechaInstalacion'];
$fechaRetiro = $_POST['fechaRetiro'];
$tipoDispositivo = $_POST['tipoDispositivo'];
$macLan = $_POST['macLan'];
$macWifi = $_POST['macWifi'];
$dominio = $_POST['dominio'];
$obsevaciones = preg_replace("/'/","''",$_POST['observacion']);
$estado=$_POST['estado'];

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

$sql = "UPDATE ft_computador SET marca='$marca', modelo='$modelo', serie='$serie',
parte='$parte', service_tag='$service_tag', exp_serv_code='$exp_serv_code', velocidad_procesador='$velocidadProcesador',grupo='$grupo',
modelo_procesador='$modeloProcesador', disco_duro_1='$discoDuroUno', disco_duro_2='$discoDuroDos', disco_duro_3='$discoDuroTres',
ram1_cant='$ram1_cant', ram1_tipo='$ram1_tipo', ram2_cant='$ram2_cant', ram2_tipo='$ram2_tipo', ram3_cant='$ram3_cant',
ram3_tipo='$ram3_tipo', ram4_cant='$ram4_cant', ram4_tipo='$ram4_tipo',id_proveedor='$proveedor', factura='$factura',
valor_compra='$valorComputador', fecha_compra='$fechaCompra', fecha_instalacion='$fechaInstalacion', fecha_retiro='$fechaRetiro',
tipo_dispositivo='$tipoDispositivo', mac_lan='$macLan', mac_wifi='$macWifi', dominio='$dominio', observaciones='$obsevaciones',
nombre_equipo='$nombre_equipo', usuario='$usuario',total_ram='$ram',tarjeta_red='$tarjeta_red',id_so='$so',arquitectura='$arquitectura'
,clasificacion='$clasificacion',estado='$estado' WHERE id='$id'";
$resultado = mysqli_query($link,$sql) or die("Error: ".mysqli_error($link));	


$sql2="UPDATE activos_fijos SET activos_fijos.estado='$estado' WHERE activos_fijos.id='$activoFijo'";
$resultado_activo_fijo= mysqli_query($link,$sql2) or die ("Error: ".mysqli_error($link));


if ($resultado>0){ ?>
	<script>
	Swal.fire({
	icon: 'success',
	title: 'Computador Modificado',
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