<?php  
session_start();
include '../enlaces_sc/enlaces.php';
include '../base_datos/seguridad.php';
include '../base_datos/conexion_inventario.php';

date_default_timezone_set("America/Bogota");
echo '.';

$id_factura=$_POST['id_factura'];
$id_detalle=$_POST['id_detalle'];
$catalogo=$_POST['catalogo'];
//$descripcion=$_POST['descripcion'];
$valor=$_POST['valor'];
$cantidad=$_POST['cantidad'];
$detalle = $_POST['detalle'];
$fecha_modi=date("Y-m-d-H:i:s");


$sql_catalogo = "SELECT * FROM catalogo
WHERE id_catalogo = '$catalogo'";
$query = mysqli_query($link, $sql_catalogo) or die(mysqli_error($link));
$ficha = mysqli_fetch_array($query);

$subtotal=$_POST['cantidad']*$_POST['valor'];
$iva=$subtotal*$ficha['porc_iva'];
$iva=$iva/100;
$descripcion=$ficha['descripcion'];


 

$sql = "UPDATE factura2 SET id_catalogo='$catalogo', descripcion='$descripcion', cantidad='$cantidad', vr_unidad='$valor',
iva='$iva', retenciones=0, subtotal='$subtotal', detalle='$detalle', f_modifica='$fecha_modi', u_modifica='$login' WHERE id_detalle='$id_detalle'";

$resultado = mysqli_query($link,$sql) or die("Error: ".mysqli_error($link));	

$last_id = mysqli_insert_id($link);

if (isset($resultado)){ ?>
	<script>
	Swal.fire({
	icon: 'success',
	title: 'Producto Modificado',
	 confirmButtonText: `Aceptar`,
}).then((result) => {
  if (result.isConfirmed) {
	  
	window.location='editar_factura.php?id=<?=$id_factura?>';
  } else if (result.isConfirmed == false) {
	window.location='ver_factura.php';
  }
})
	</script> 

	<?php } ?>