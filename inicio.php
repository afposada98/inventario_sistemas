<?php
session_start();
$tipo = $_SESSION['P06'];
$ruta_inventario = $_SESSION['RUTA_INVENTARIO'];
include './base_datos/seguridad.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Inventario</title>
    <?php include './enlaces_scripts/enlaces.php'; ?>


	<!--Cerrar Pestaña -->
	<!-- <script type="text/javascript">
		function Cerrar() {
			window.opener = this;
			window.close();
		}
	</script>	 -->
</head>

<body>
	<header>
	<?php 
		require './menu/menu.php'; 
	?>
	</header>

<!-- 	<div class="container" style="position:relative; min-height:80vh;">
 -->	</div>
	<?php include 'footer.php'; 
            ?>

	
</body>

</html>