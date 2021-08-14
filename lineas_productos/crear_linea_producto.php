<?php  
session_start();
include '../enlaces_sc/enlaces.php';
include '../base_datos/conexion_inventario.php';

$clase = $_POST['clase'];
$descripcion = $_POST['descripcion'];
echo '.';

$sql = "INSERT INTO lineas_producto (id_clase, descripcion, estado) VALUES ( '$clase', '$descripcion', '1')";

$resultado = mysqli_query($link,$sql) or die("Error: ".mysqli_error($link));	

if (isset($resultado)){ ?>
	<script>
	Swal.fire({
	icon: 'success',
	title: 'Línea de Producto Creada',
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