<?php  
session_start();
include '../enlaces_sc/enlaces.php';
include '../base_datos/seguridad.php';
include '../base_datos/conexion_inventario.php';

echo '.';

$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$serie = $_POST['serie'];
$tipo= $_POST['tipo'];
$proveedor = $_POST['proveedor'];
$factura = $_POST['factura'];
$f_factura = $_POST['fecha_factura'];
$valor= $_POST['valor'];
$vida_util= $_POST['vida_util'];
$activoFijo = $_POST['activoFijo'];
$observaciones = $_POST['observaciones'];
$vida_util=1;


$sql = "INSERT INTO ft_impresora (id_activo_fijo, marca, modelo, serie, tipo, id_proveedor, factura, f_factura, estado, valor_compra, vida_util, observaciones)
VALUES ('$activoFijo','$marca', '$modelo', '$serie', '$tipo', '$proveedor', '$factura', '$f_factura', 1, '$valor', '$vida_util', '$observaciones')";


$resultado = mysqli_query($link,$sql) or die("Error: ".mysqli_error($link));	

if (isset($resultado)){ ?>
	<script>
	Swal.fire({
	icon: 'success',
	title: 'Impresora Añadida',
	 confirmButtonText: `Aceptar`,
}).then((result) => {
  if (result.isConfirmed) {
	  
	window.location='ver_impresoras.php';
  } else if (result.isConfirmed == false) {
	window.location='ver_impresoras.php';
  }
})
	</script> 

<?php } ?>