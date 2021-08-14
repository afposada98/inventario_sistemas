<?php
session_start();
include '../enlaces_sc/enlaces.php';
include '../base_datos/conexion_inventario.php';

$id=$_POST['id'];
$activo_fijo=$_POST['activo_fijo'];
$localizacion=$_POST['localizacion'];
$tipo_activo=$_POST['tipo_activo'];
$estado=$_POST['estado'];
echo '.';



	$sql = "UPDATE activos_fijos SET activo_fijo='$activo_fijo',id_localizacion='$localizacion', estado='$estado'
	WHERE id='$id'";

	$resultado = mysqli_query($link,$sql) or die("Error: ".mysqli_error($link));	


	if($tipo_activo==1){
		$sql="SELECT ft_computador.id FROM ft_computador WHERE ft_computador.id_activo_fijo='$id'";
		$query=mysqli_query($link,$sql) or die(mysqli_error($link));	
		$result=mysqli_fetch_array($query);
		$new_id=$result['id'];
		$sql2="UPDATE ft_computador SET estado='$estado' WHERE id='$new_id'";
		$resultado2 = mysqli_query($link,$sql2) or die("Error: ".mysqli_error($link));
	}
	if($tipo_activo==2){
		$sql="SELECT ft_monitor.id FROM ft_monitor WHERE ft_monitor.id_activo_fijo='$id'";
		$query=mysqli_query($link,$sql) or die(mysqli_error($link));	
		$result=mysqli_fetch_array($query);
		$new_id=$result['id'];
		$sql2="UPDATE ft_monitor SET estado='$estado' WHERE id='$new_id'";
		$resultado2 = mysqli_query($link,$sql2) or die("Error: ".mysqli_error($link));
	}
	if($tipo_activo==3){
		$sql="SELECT ft_teclado.id FROM ft_teclado WHERE ft_teclado.id_activo_fijo='$id'";
		$query=mysqli_query($link,$sql) or die(mysqli_error($link));	
		$result=mysqli_fetch_array($query);
		$new_id=$result['id'];
		$sql2="UPDATE ft_teclado SET estado='$estado' WHERE id='$new_id'";
		$resultado2 = mysqli_query($link,$sql2) or die("Error: ".mysqli_error($link));
	}
	if($tipo_activo==4){
			$sql="SELECT ft_mouse.id FROM ft_mouse WHERE ft_mouse.id_activo_fijo='$id'";
		$query=mysqli_query($link,$sql) or die(mysqli_error($link));	
		$result=mysqli_fetch_array($query);
		$new_id=$result['id'];
		$sql2="UPDATE ft_mouse SET estado='$estado' WHERE id='$new_id'";
		$resultado2 = mysqli_query($link,$sql2) or die("Error: ".mysqli_error($link));
	} 
	if($tipo_activo==5){
		$sql="SELECT ft_impresora.id FROM ft_impresora WHERE ft_impresora.id_activo_fijo='$id'";
		$query=mysqli_query($link,$sql) or die(mysqli_error($link));	
		$result=mysqli_fetch_array($query);
		$new_id=$result['id'];
		$sql2="UPDATE ft_impresora SET estado='$estado' WHERE id='$new_id'";
		$resultado2 = mysqli_query($link,$sql2) or die("Error: ".mysqli_error($link));
	}
	if($tipo_activo==6){
		$sql="SELECT ft_tablet.id FROM ft_tablet WHERE ft_tablet.id_activo_fijo='$id'";
		$query=mysqli_query($link,$sql) or die(mysqli_error($link));	
		$result=mysqli_fetch_array($query);
		$new_id=$result['id'];
		$sql2="UPDATE ft_tablet SET estado='$estado' WHERE id='$new_id'";
		$resultado2 = mysqli_query($link,$sql2) or die("Error: ".mysqli_error($link));
	}
	if($tipo_activo==7){
		$sql="SELECT ft_radioenlace.id FROM ft_radioenlace WHERE ft_radioenlace.id_activo_fijo='$id'";
		$query=mysqli_query($link,$sql) or die(mysqli_error($link));	
		$result=mysqli_fetch_array($query);
		$new_id=$result['id'];
		$sql2="UPDATE ft_radioenlace SET estado='$estado' WHERE id='$new_id'";
		$resultado2 = mysqli_query($link,$sql2) or die("Error: ".mysqli_error($link));
	}
	if($tipo_activo==11){
		$sql="SELECT ft_suiche.id FROM ft_suiche WHERE ft_suiche.id_activo_fijo='$id'";
		$query=mysqli_query($link,$sql) or die(mysqli_error($link));	
		$result=mysqli_fetch_array($query);
		$new_id=$result['id'];
		$sql2="UPDATE ft_suiche SET estado='$estado' WHERE id='$new_id'";
		$resultado2 = mysqli_query($link,$sql2) or die("Error: ".mysqli_error($link));
	}
	
	if (isset($resultado)){ ?>
		<script>
		Swal.fire({
		icon: 'success',
		title: 'Activo Fijo Actualizado',
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
	
	}


?>