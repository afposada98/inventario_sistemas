<?php  
session_start();
include '../enlaces_sc/enlaces.php';
include '../base_datos/conexion_inventario.php';

$activo_fijo = rtrim($_POST['activo_fijo']);
$tipo_activo = $_POST['tipo_activo'];
$localizacion = $_POST['localizacion'];

echo '.';

$sqlc = "SELECT * FROM activos_fijos WHERE activo_fijo = '$activo_fijo'";

$queryc = mysqli_query($link, $sqlc) or die(mysqli_error($link));
$respuesta = mysqli_fetch_array($queryc);

if (isset($respuesta['activo_fijo']) ){ ?>
<script>
	Swal.fire({
		icon: 'error',
		title: 'El activo fijo ya existe',
		 confirmButtonText: `Aceptar`,
	}).then((result) => {
	  if (result.isConfirmed) {
		  
		window.location='ver-activos-fijos.php';
	  } else if (result.isConfirmed == false) {
		window.location='ver-activos-fijos.php';
	  }
	})
</script>

<?php
} if (isset($respuesta['activo_fijo']) == false) {

	$sql = "INSERT INTO activos_fijos ( activo_fijo, id_tipo_activo, id_localizacion, estado) VALUES ('$activo_fijo', 
	'$tipo_activo', '$localizacion',  '1')";

	$resultado = mysqli_query($link,$sql) or die("Error: ".mysqli_error($link));	

	if($resultado > 0) { ?>
		<script>
		Swal.fire({
		icon: 'success',
		title: 'Activo Fijo Creado',
		 confirmButtonText: `Aceptar`,
	}).then((result) => {
	  if (result.isConfirmed) {
		  
		window.location='ver-activos-fijos.php';
	  } else if (result.isConfirmed == false) {
		window.location='ver-activos.fijos.php';
	  }
	})
		</script> 
	
	<?php } else {     
	echo "<script>alert('Error al crear.'); window.history.back(-1);</script>";    
	}
}

/*
$sql = "INSERT INTO activos_fijos (id, activo_fijo, id_tipo_activo, id_localizacion, estado) VALUES (NULL, '$activo_fijo', 
'$tipo_activo', '$localizacion',  '1')";

$resultado = mysqli_query($link,$sql) or die("Error: ".mysqli_error($link));	

if($resultado > 0) {
	echo "<script>alert('Creacion exitosa.'); window.history.back(-1);</script>"; 
} else {     
	echo "<script>alert('Error al crear.'); window.history.back(-1);</script>";    
}*/
?>