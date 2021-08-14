<?php 

include '../enlaces_sc/enlaces.php';
include '../base_datos/conexion_inventario.php';

echo '.';

if (isset($_REQUEST['id'])){
    $id=$_REQUEST['id'];
}

$sql="SELECT id FROM ft_suiche WHERE ft_suiche.id_activo_fijo='$id'";


$resultado = mysqli_query($link,$sql) or die("Error: ".mysqli_error($link));	
$f = mysqli_fetch_array($resultado);

if($f==NULL){
  $pc=''; } 
else
  $pc=$f['id'];

if($f==NULL){ ?>
    <script>
    Swal.fire({
    icon: 'error',
    title: 'Activo Fijo No Asignado Todavía',
     confirmButtonText: `Aceptar`,
}).then((result) => {
  if (result.isConfirmed) {
      
    window.location='../activos-fijos/ver-activos-fijos.php';
  }
  })
    </script>

    
 <?php } else {
    echo "<script>window.location='../activos-fijos/ficha-tecnica-router.php?id=$pc'</script>";
}

?>