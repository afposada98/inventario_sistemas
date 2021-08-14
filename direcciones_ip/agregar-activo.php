<?php
session_start();
include '../base_datos/seguridad.php';
include '../base_datos/conexion_inventario.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>
<?php include '../enlaces_sc/enlaces.php'; ?>
    <title> Direcciones IP </title>
</head>

<?php
    $id_direccion = $_GET['id'];


/*
if(isset($_REQUEST['tipo_activo'])){
    $tipo_activo=$_REQUEST['tipo_activo'];
}else
    $tipo_activo=1;
*/

?>

<body style="padding-bottom: 20px">
    <?php include '../menu/menu.php';     ?>
    
   
    <?php
        $sql = "SELECT direcciones_ip.direccion_ip,direcciones_ip.id_activo_fijo, activos_fijos.id_tipo_activo FROM direcciones_ip 
        LEFT JOIN activos_fijos ON direcciones_ip.id_activo_fijo = activos_fijos.id WHERE direcciones_ip.id = '$id_direccion'";
        $query = mysqli_query($link, $sql) or die(mysqli_error($link));
        $ficha = mysqli_fetch_array($query);

       $ip=$ficha['direccion_ip'];
       $id_activo=$ficha['id_activo_fijo'];       

    /*****************/

    ?>
    <div class="container" style="width:50%;">
        <div class="titulos">
            <div class="reedireccion"><a class="salida" href="./ver-direcciones-ip.php">X</a>
            </div>
            <h1> IP <?php echo $ip; ?></h1>
        </div>        
            <div class="card edicion">

            <form action="guardar-activo.php" class="form-group" method="post">
                <input type="hidden" name="id_ip" value="<?php echo $id_direccion ?>" id="">

          <div class="row informacion">
          <div class="form-group col-md-12">
              <label for="tipo_activo" class="col-form-label">Tipo de Activo Fijo</label>

              <select class="form-select" id="tipo" name="tipo">
                <option value="0" selected>Seleccione...</option>

                  <?php

                  $sql = "SELECT id, tipo_activo FROM tipo_activo WHERE maneja_ip=1 ORDER BY tipo_activo ASC";
                  $query = mysqli_query($link, $sql) or die("Error: " . mysqli_error($link));

                  while ($fila = mysqli_fetch_array($query)) { ?>
                          <option value="<?php echo $fila['id']; ?>"><?php echo $fila['tipo_activo']; ?></option>
                  <?php  } ?>
              </select>
          </div>

      <div class="form-group col-md-12">
          <label for="last-name">Asignar el activo fijo</label>
          <select class="form-select" id="activo" name="activo" required>
              <?php

              $sql = "SELECT activos_fijos.id, activos_fijos.activo_fijo
               FROM activos_fijos";
              $query = mysqli_query($link, $sql) or die("Error: " . mysqli_error($link));

              while ($fila = mysqli_fetch_array($query)) {
                  if ($fila['id'] == $ficha['id_activo_fijo']) { ?>
                      <option value="<?php echo $fila['id']; ?>" selected><?php echo $fila['activo_fijo'];?></option>
                  <?php } }?>
          </select>
      </div>
      </div>
          <div class="text-center">
          <button class="btn btn-primary"  type="submit">Editar</button>
          <a type="button" href="ver-direcciones-ip.php"  class="btn btn-danger">Cancelar</a>
          </div>
      </form>

</div>
        </div>




    </div>
</body>

</html>


<script language="javascript">
	$(document).ready(function(){
		$("#tipo").on('change', function () {
			$("#tipo option:selected").each(function () {
				var tipo = $(this).val();
				$.post("direcciones.php", { tipo: tipo }, function(data) {
					$("#activo").html(data);
				});			
			});
	   });
	});
</script>