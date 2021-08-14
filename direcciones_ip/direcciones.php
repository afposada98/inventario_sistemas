<?php
    require '../base_datos/conexion_inventario.php';    
	
	$activo_id = $_POST['tipo'];

	$queryM = "SELECT activos_fijos.id,activos_fijos.activo_fijo, localizaciones.localizacion FROM activos_fijos 
    INNER JOIN localizaciones ON localizaciones.id=activos_fijos.id_localizacion
    WHERE id_tipo_activo='$activo_id'
	AND activos_fijos.id NOT IN (SELECT direcciones_ip.id_activo_fijo from direcciones_ip)";

	$resultadoM = mysqli_query($link, $queryM);
	
	$html= "<option value='0'>Seleccione...</option>";
	
    while ($fila = mysqli_fetch_array($resultadoM)) {
		$html =$html."<option value='".$fila['id']."'>".$fila['activo_fijo']."</option>";
    }
	echo $html;	
?>