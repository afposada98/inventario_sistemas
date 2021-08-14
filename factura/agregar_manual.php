<?php
session_start();
include '../enlaces_sc/enlaces.php';
include '../base_datos/conexion_inventario.php';
include '../base_datos/seguridad.php';

date_default_timezone_set("America/Bogota");
echo '.';

$id_factura=$_POST['id_factura'];
$id_catalogo=$_POST['id_catalogo'];
$referencia = $_POST['referencia'];
$descripcion=$_POST['descripcion'];
$precio=$_POST['precio'];
$porc_iva=$_POST['iva']/100;
$cantidad=$_POST['cantidad'];
$detalle = $_POST['detalle'];
$fecha_modi=date("Y-m-d-H:i:s");
$subtotal=$precio*$cantidad;
$iva=$porc_iva*$precio;





	$sql = "INSERT INTO factura2 (id_factura,id_catalogo,descripcion,vr_unidad,cantidad,iva,subtotal,detalle,f_modifica,u_modifica)
	 VALUES ('$id_factura','$id_catalogo','$descripcion','$precio','$cantidad','$iva','$subtotal','$detalle','$fecha_modi','$login')";

	$resultado = mysqli_query($link,$sql) or die("Error: ".mysqli_error($link));	

	if (isset($resultado)){ ?>
		<script>
		Swal.fire({
		icon: 'success',
		title: 'Producto Agregado Manualmente',
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