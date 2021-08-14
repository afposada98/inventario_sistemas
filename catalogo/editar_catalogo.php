<?php
session_start();
include '../enlaces_sc/enlaces.php';
include '../base_datos/conexion_inventario.php';

$id=$_POST['id'];
$descripcion=$_POST['descripcion'];
$referencia=$_POST['referencia'];
$iva=$_POST['iva'];
$linea=$_POST['linea'];
$estado=$_POST['estado'];
echo '.';
	

	$sql = "UPDATE catalogo SET descripcion='$descripcion', id_linea='$linea', referencia='$referencia', porc_iva='$iva', estado='$estado'
	WHERE id_catalogo='$id'";

	$resultado = mysqli_query($link,$sql) or die("Error: ".mysqli_error($link));	

	if (isset($resultado)){ ?>
		<script>
		Swal.fire({
		icon: 'success',
		title: 'Catálogo Actualizado',
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