<?php  
session_start();
include '../enlaces_sc/enlaces.php';
include '../base_datos/seguridad.php';
include '../base_datos/conexion_inventario.php';

echo '.';

$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$serie = $_POST['serie'];
$puertos= $_POST['puertos'];
$proveedor = $_POST['proveedor'];
$factura = $_POST['factura'];
$f_factura = $_POST['fecha_factura'];
$valor= $_POST['valor'];
$velocidad= $_POST['velocidad'];
$activoFijo = $_POST['activoFijo'];
$observaciones = $_POST['observaciones'];
$banda = $_POST['banda'];
$firmware = $_POST['firmware'];
$mac = $_POST['mac'];
$vida_util=1;


$sql = "INSERT INTO ft_radioenlace (id_activo_fijo, marca, modelo, serie, puertos, banda, velocidad, version_firmware, id_proveedor, factura, f_factura, estado, valor, observaciones, direccion_mac)
VALUES ('$activoFijo','$marca', '$modelo', '$serie', '$puertos', '$banda', '$velocidad', '$firmware', '$proveedor', '$factura', '$f_factura', 1, '$valor', '$observaciones','$mac')";


$resultado = mysqli_query($link,$sql) or die("Error: ".mysqli_error($link));	

if (isset($resultado)){ ?>
	<script>
	Swal.fire({
	icon: 'success',
	title: 'Radioenlace Creado',
	 confirmButtonText: `Aceptar`,
}).then((result) => {
  if (result.isConfirmed) {
	  
	window.location='ver_radioenlaces.php';
  } else if (result.isConfirmed == false) {
	window.location='ver_radioenlaces.php';
  }
})
	</script> 

<?php } ?>