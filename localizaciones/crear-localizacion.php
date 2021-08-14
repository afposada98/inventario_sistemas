<?php  
session_start();
include '../enlaces_sc/enlaces.php';
include '../base_datos/conexion_inventario.php';

$area = $_POST['area'];
$localizacion = $_POST['localizacion'];
echo '.';

$sql = "INSERT INTO localizaciones (id_area, localizacion, estado) VALUES ( '$area', '$localizacion', '1')";

$resultado = mysqli_query($link,$sql) or die("Error: ".mysqli_error($link));	

if (isset($resultado)){ ?>
	<script>
	Swal.fire({
	icon: 'success',
	title: 'Localización Creada',
	 confirmButtonText: `Aceptar`,
}).then((result) => {
  if (result.isConfirmed) {
	  
	window.location='ver-localizaciones.php';
  } else if (result.isConfirmed == false) {
	window.location='ver-localizaciones.php';
  }
})
	</script> 
	<?php

}

?>