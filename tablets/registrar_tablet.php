<?php  
session_start();
include '../enlaces_sc/enlaces.php';
include '../base_datos/seguridad.php';
include '../base_datos/conexion_inventario.php';

echo '.';

$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$serie = $_POST['serie'];
$memoria= $_POST['memoria'];
$ram= $_POST['ram'];
$mac = $_POST['mac'];
$cel= $_POST['cel'];
$proveedor = $_POST['proveedor'];
$factura = $_POST['factura'];
$f_factura = $_POST['fecha_factura'];
$valor= $_POST['valor'];
$bateria= $_POST['bateria'];
$activoFijo = $_POST['activoFijo'];
$observaciones = $_POST['observaciones'];


$sql = "INSERT INTO ft_tablet (id_activo_fijo, marca, modelo, serie, memoria_interna, ram, mac, cel, bateria, id_proveedor, factura, f_factura, valor, estado, observaciones)
    VALUES ('$activoFijo','$marca', '$modelo', '$serie', '$memoria', '$ram', '$mac', '$cel', '$bateria', '$proveedor', '$factura', '$f_factura', '$valor', 1, '$observaciones')";


$resultado = mysqli_query($link,$sql) or die("Error: ".mysqli_error($link));	

if (isset($resultado)){ ?>
	<script>
	Swal.fire({
	icon: 'success',
	title: 'Tablet Añadida',
	 confirmButtonText: `Aceptar`,
}).then((result) => {
  if (result.isConfirmed) {	  
	window.location='ver_tablets.php';
  } else if (result.isConfirmed == false) {
	window.location='ver_tablets.php';
  }
})
	</script> 

<?php } ?>