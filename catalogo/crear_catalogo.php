<?php  
session_start();
include '../enlaces_sc/enlaces.php';
include '../base_datos/conexion_inventario.php';

$linea = $_POST['linea'];
$descripcion = $_POST['descripcion'];
$referencia = $_POST['referencia'];
$iva = $_POST['iva'];

echo '.';

$sql = "INSERT INTO catalogo (id_linea, descripcion,referencia,porc_iva, estado) VALUES ( '$linea', '$descripcion', '$referencia', '$iva', '1')";

$resultado = mysqli_query($link,$sql) or die("Error: ".mysqli_error($link));	

if (isset($resultado)){ ?>
	<script>
	Swal.fire({
	icon: 'success',
	title: 'Catálogo Creado',
	 confirmButtonText: `Aceptar`,
}).then((result) => {
  if (result.isConfirmed) {
	  
	window.location='ver_catalogo.php';
  } else if (result.isConfirmed == false) {
	window.location='ver_catalogo.php';
  }
})
	</script> 
	<?php

}

?>