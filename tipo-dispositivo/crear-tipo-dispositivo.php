<?php
session_start();
include '../enlaces_sc/enlaces.php';
include '../base_datos/conexion_inventario.php';


$nombre=$_POST['nombre'];
$estado=$_POST['estado'];
echo '.';



	$sql = "INSERT INTO tipo_dispositivo (dispositivo,estado) VALUES ('$nombre','$estado')";

	$resultado = mysqli_query($link,$sql) or die("Error: ".mysqli_error($link));	

	if (isset($resultado)){ ?>
		<script>
		Swal.fire({
		icon: 'success',
		title: 'Tipo de Dispositivo Creado',
		 confirmButtonText: `Aceptar`,
	}).then((result) => {
	  if (result.isConfirmed) {
		  
		window.location='ver-tipo-dispositivos.php';
	  } else if (result.isConfirmed == false) {
		window.location='ver-tipo-dispositivos.php';
	  }
	})
		</script> 
		<?php
	
	}


?>