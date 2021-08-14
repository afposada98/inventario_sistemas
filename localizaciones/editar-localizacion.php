<?php
session_start();
include '../enlaces_sc/enlaces.php';
include '../base_datos/conexion_inventario.php';

$id=$_POST['id'];
$localizacion=$_POST['localizacion'];
$area=$_POST['area'];
$estado=$_POST['estado'];
echo '.';



	$sql = "UPDATE localizaciones SET localizacion='$localizacion', id_area='$area', estado='$estado' WHERE 
    id='$id'";

	$resultado = mysqli_query($link,$sql) or die("Error: ".mysqli_error($link));	

	if (isset($resultado)){ ?>
		<script>
		Swal.fire({
		icon: 'success',
		title: 'Localización Actualizada',
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