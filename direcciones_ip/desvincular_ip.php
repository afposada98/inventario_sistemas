<?php
include '../enlaces_sc/enlaces.php';
include ('../base_datos/conexion_inventario.php');

if($_POST['id']) {

    $id = $_POST['id'];

    $sql = "UPDATE direcciones_ip SET id_activo_fijo=0 WHERE id='$id'";

    $query = mysqli_query($link, $sql) or die(mysqli_error($link));  
}
?>