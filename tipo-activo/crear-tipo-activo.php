<?php
session_start();
include '../enlaces_sc/enlaces.php';
include '../base_datos/conexion_inventario.php';


$nombre=$_POST['nombre'];
$estado=$_POST['estado'];
echo '.';



	$sql = "INSERT INTO tipo_activo (tipo_activo,estado) VALUES ('$nombre','$estado')";

	$resultado = mysqli_query($link,$sql) or die("Error: ".mysqli_error($link));	

	if (isset($resultado)){ ?>
		<script>
		Swal.fire({
		icon: 'success',
		title: 'Tipo de Activo Fijo Creado',
		 confirmButtonText: `Aceptar`,
	}).then((result) => {
	  if (result.isConfirmed) {
		  
		window.location='ver-tipo-activo.php';
	  } else if (result.isConfirmed == false) {
		window.location='ver-tipo-activo.php';
	  }
	})
		</script> 
		<?php
	
	}


?>