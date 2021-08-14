<?php
session_start();
include '../base_datos/seguridad.php';
include '../menu/menu.php';
include '../base_datos/conexion_inventario.php';
include '../enlaces_sc/enlaces.php';


$nombre = $_SESSION['usuario'];

$consecutivo = $_REQUEST['consecutivo'];
$sql = "SELECT * FROM proveedores WHERE id ='$consecutivo'";
$query = mysqli_query($link, $sql) or die("Error:" . mysqli_error($link));
$f1 = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">

<head meta name="viewport" content="width=device-width, initial-scale=1">

	<div class="container">
		<div class="titulos">
			<h1 class="TituloCrear">Editar Proveedor</h1>
		</div>
	</div>

	<title>Editar</title>
</head>
<body>
	<div class="container" style="margin-top:10px; width:1024px;background-color: whitesmoke;">

		<div class="row">
			<form class="form" name="form1" method="POST" action="editar-proveedor2.php" >
				
				<div class="row informacion">

				<input type="hidden" name="consecutivo" value="<?php echo $f1['id']; ?>">

					<div class="form-group col-md-6">
						<label class="descripcion" for="first-name">Nombre:</label>
						<input type="text" class="form-control" name="nombre" value="<?php echo $f1['nombre']; ?>">
                    </div>


					<div class="form-group col-md-6">
						<label class="descripcion" for="first-name">Direccion:</label>
						<input type="text" class="form-control" name="direccion" value="<?php echo $f1['direccion']; ?>">
                    </div>


					<div class="form-group col-md-4">
						<label class="descripcion" for="first-name">Celular:</label>
						<input type="text" class="form-control" name="celular" value="<?php echo $f1['celular']; ?>">
                    </div>

					<div class="form-group col-md-4">
						<label class="descripcion" for="first-name">Contacto:</label>
						<input type="text" class="form-control" name="contacto" value="<?php echo $f1['contacto']; ?>">
                    </div>

					<div class="form-group col-md-4">					
                    <label class="descripcion" for="estado"> Estado </label>
                    <select class="form-select" name="estado">
                    <?php
                     if($f1['estado']==1){?>
                        <option value="1" selected>Activo </option>
                        <option value="0">Inactivo</option>
                    <?php } else {?>
                        <option value="0" selected>Inactivo</option>  
                        <option value="1" > Activo </option>  
                    <?php } ?>                 
                    </select>
                    
                    </div>

					<div class="text-center">
						<button type="submit" class="btn btn-primary">Modificar</button>
						<a type="button" href="ver-proveedores.php" class="btn btn-danger">Cancelar</a>
					</div>					
				</div>
				
			</form>
		</div>

		<?php

		//print_r($f1);


		?>
	</div>
</body>

</html>