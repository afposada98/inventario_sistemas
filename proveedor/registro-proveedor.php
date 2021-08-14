<?php  
session_start();
include '../base_datos/seguridad.php';
include '../base_datos/conexion_inventario.php';

$nombre = $_POST['nombre'];
$direccion = $_POST['direccion'];
$celular = $_POST['celular'];

$sql = "INSERT INTO proveedores (id, nombre, direccion, celular) VALUES (NULL, '$nombre', '$direccion', '$celular')";

$resultado = mysqli_query($link,$sql) or die("Error: ".mysqli_error($link));	

if($resultado > 0) {
	echo "<script>alert('Creacion exitosa.'); window.history.back(-1);</script>"; 
} else {     
	echo "<script>alert('Error al crear.'); window.history.back(-1);</script>";    
}
?>