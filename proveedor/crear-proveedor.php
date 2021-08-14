<?php
session_start();
include '../enlaces_sc/enlaces.php';
include '../base_datos/conexion_inventario.php';


$nombre=$_POST['nombre'];
$direccion=$_POST['direccion'];
$celular=$_POST['celular'];
$contacto=$_POST['contacto'];
$estado=$_POST['estado'];
echo '.';



	$sql = "INSERT INTO proveedores (nombre,direccion,celular,contacto,estado) VALUES ('$nombre', 
	'$direccion', '$celular','$contacto','$estado')";

	$resultado = mysqli_query($link,$sql) or die("Error: ".mysqli_error($link));	

	if (isset($resultado)){ ?>
		<script>
		Swal.fire({
		icon: 'success',
		title: 'Proveedor Creado',
		 confirmButtonText: `Aceptar`,
	}).then((result) => {
	  if (result.isConfirmed) {
		  
		window.location='ver-proveedores.php';
	  } else if (result.isConfirmed == false) {
		window.location='ver-proveedores.php';
	  }
	})
		</script> 
		<?php
	
	}


?>