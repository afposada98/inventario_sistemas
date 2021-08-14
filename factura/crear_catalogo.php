<?php  
session_start();
include '../enlaces_sc/enlaces.php';
include '../base_datos/conexion_inventario.php';
include '../base_datos/seguridad.php';


$linea = $_POST['linea'];
$descripcion = $_POST['descripcion'];
$referencia = $_POST['referencia'];
$iva_porce = $_POST['iva'];
$iva_valor = $_POST['iva']/100;
$id_factura = $_POST['id_factura'];
$precio = $_POST['precio'];
$cantidad = $_POST['cantidad'];
$detalle = $_POST['detalle'];
$fecha_modifica=date("Y-m-d-H:i:s");




echo '.';

$sql = "INSERT INTO catalogo (id_linea,descripcion,referencia,porc_iva, estado) VALUES ( '$linea', '$descripcion', '$referencia', '$iva_porce', '1')";
$resultado = mysqli_query($link,$sql) or die("Error: ".mysqli_error($link));
$last_id = mysqli_insert_id($link);
	
$sql2 = "SELECT * FROM factura2 WHERE id_detalle='$last_id'";
$query2 = mysqli_query($link, $sql2) or die("Error: " . mysqli_error($link));
$fila = mysqli_fetch_array($query2);

if($precio!="" && $cantidad!=""){

	$iva_final=$precio*$iva_valor;
	$subtotal=$cantidad*$precio;

	$sql3="INSERT INTO factura2 (id_factura,id_catalogo,descripcion,cantidad,vr_unidad,iva,subtotal,detalle,f_modifica,u_modifica)
	VALUES ('$id_factura','$last_id','$descripcion','$cantidad','$precio','$iva_final','$subtotal','$detalle','$fecha_modifica','$login')";
	$resultado2 = mysqli_query($link,$sql3) or die("Error: ".mysqli_error($link));

}

if (isset($resultado)){ ?>
	<script>
	Swal.fire({
	icon: 'success',
	title: 'Catálogo Creado',
	 confirmButtonText: `Aceptar`,
}).then((result) => {
  if (result.isConfirmed) {
	  
	window.location='editar_factura.php?id=<?=$id_factura?>';
  } else if (result.isConfirmed == false) {
	window.location='editar_factura.php?id=<?=$id_factura?>';
  }
})
	</script> 
	<?php

}

?>