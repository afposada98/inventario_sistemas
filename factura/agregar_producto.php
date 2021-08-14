<?php
session_start();
include '../enlaces_sc/enlaces.php';
include '../base_datos/conexion_inventario.php';
include '../base_datos/seguridad.php';

date_default_timezone_set("America/Bogota");
echo '.';

$id_factura=$_POST['id_factura'];
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





	$sql = "INSERT INTO factura2 (id_factura,id_catalogo,descripcion,vr_unidad,cantidad,iva,subtotal,detalle,f_modifica,u_modifica)
	 VALUES ('$id_factura','$catalogo','$descripcion','$valor','$cantidad','$iva','$subtotal','$detalle','$fecha_modi','$login')";

	$resultado = mysqli_query($link,$sql) or die("Error: ".mysqli_error($link));	

	if (isset($resultado)){ ?>
		<script>
		Swal.fire({
		icon: 'success',
		title: 'Producto Agregado',
		 confirmButtonText: `Aceptar`,
	}).then((result) => {
	  if (result.isConfirmed) {
		  
		window.location='editar_factura.php?id=<?=$id_factura?>';
	  } else if (result.isConfirmed == false) {
		window.location='ver_factura.php?id=<?=$id_factura?>';
	  }
	})
		</script> 
		<?php
	
	}


?>