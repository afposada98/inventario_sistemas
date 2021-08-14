<!-- get tipo de ram -->
<?php

	include '../base_datos/conexion_inventario.php';

	$ram3_ddr = $_POST['id_ram3_ddr'];

    $queryM = "SELECT memoria_ram.id_ram, memoria_ram.nombre_estandar, tipo_memoria_ram.tipo_ddr_ram FROM memoria_ram INNER JOIN tipo_memoria_ram ON memoria_ram.id_tipo_ram = tipo_memoria_ram.id_tipo_ram 
	WHERE tipo_memoria_ram.id_tipo_ram = $ram3_ddr";
    

	$resultadoM = mysqli_query($link, $queryM);
	
	$html= "<option value='0'>Seleccione ...</option>";
	
	while($rowM = mysqli_fetch_array ($resultadoM)) {
		$html = $html . "<option value='".$rowM['id_ram']."'>".$rowM['nombre_estandar']."</option>";
	}
	
	echo $html;
	
?>