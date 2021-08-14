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
$proveedor = $_POST['proveedor'];
$factura = $_POST['factura'];
$fecha_compra = $_POST['fecha_compra'];
$tipo_conector = $_POST['tipo_conector'];
$observaciones = $_POST['observaciones'];

 

$sql = "INSERT INTO ft_mouse (id_activo_fijo, marca, modelo, serie, factura, fecha_compra, tipo_conector, id_proveedor, 
estado, observaciones) VALUES ('$activoFijo', '$marca', '$modelo', '$serie',  '$factura', '$fecha_compra',  '$tipo_conector', 
'$proveedor',  '1', '$observaciones')";

$resultado = mysqli_query($link,$sql) or die("Error: ".mysqli_error($link));	

if (isset($resultado)){ ?>
	<script>
	Swal.fire({
	icon: 'success',
	title: 'Mouse Creado',
	 confirmButtonText: `Aceptar`,
}).then((result) => {
  if (result.isConfirmed) {
	  
	window.location='ver-mouses.php';
  } else if (result.isConfirmed == false) {
	window.location='ver-mouses.php';
  }
})
	</script> 

	<?php } ?>