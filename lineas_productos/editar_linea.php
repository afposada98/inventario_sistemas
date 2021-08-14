<?php
session_start();
include '../enlaces_sc/enlaces.php';
include '../base_datos/conexion_inventario.php';

$id=$_POST['id'];
$descripcion=$_POST['descripcion'];
$clase=$_POST['clase'];
$estado=$_POST['estado'];
echo '.';



	$sql = "UPDATE lineas_producto SET descripcion='$descripcion', id_clase='$clase', estado='$estado' WHERE 
    id_linea='$id'";

	$resultado = mysqli_query($link,$sql) or die("Error: ".mysqli_error($link));	

	if (isset($resultado)){ ?>
		<script>
		Swal.fire({
		icon: 'success',
		title: 'Línea de Producto Actualizada',
		 confirmButtonText: `Aceptar`,
	}).then((result) => {
	  if (result.isConfirmed) {
		  
		window.location='ver_lineas_productos.php';
	  } else if (result.isConfirmed == false) {
		window.location='ver_lineas_productos.php';
	  }
	})
		</script> 
		<?php
	
	}


?>