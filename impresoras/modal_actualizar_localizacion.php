<?php

include '../base_datos/conexion_inventario.php';
 
$id_impresora = $_REQUEST['id'];


$sql = "SELECT ft_impresora.id_activo_fijo, activos_fijos.activo_fijo FROM ft_impresora INNER JOIN activos_fijos ON 
        ft_impresora.id_activo_fijo = activos_fijos.id WHERE ft_impresora.id = '$id_impresora'";

$query = mysqli_query($link, $sql) or die(mysqli_error($link));
$ficha = mysqli_fetch_array($query);
 
$id_activo_fijo = $ficha['id_activo_fijo'];
$activo_fijo = $ficha['activo_fijo'];

$sql1 = "SELECT localizaciones.id, localizaciones.localizacion FROM activos_fijos INNER JOIN localizaciones 
        ON activos_fijos.id_localizacion = localizaciones.id WHERE activos_fijos.id = '$id_activo_fijo'";

$query1 = mysqli_query($link, $sql1) or die(mysqli_error($link));
$ficha1 = mysqli_fetch_array($query1);

$id_localizacion = $ficha1['id'];
$localizacion = $ficha1['localizacion']; 

?>

<div class="card mx-auto" style="width: 25rem; text-align:center; margin-top:5em;">
 <h5 class="card-header"><?=$activo_fijo?></h5>
  <div class="card-body">
    <h5 class="card-title">Elige la nueva localización</h5>
 
    <form action="registrar-localizacion-impresora.php" class="form-group">
            <div>
            <input type="hidden" name="activo_fijo" value="<?=$id_activo_fijo?>" id="" >
            
            <select class="form-select" id="inputGroupSelect01" name="localizacion" style="margin-bottom: 1em;">
                    <?php

                    $sql = "SELECT `id`, `localizacion` FROM `localizaciones`";
                    $query = mysqli_query($link, $sql) or die("Error: " . mysqli_error($link));

                    while ($fila = mysqli_fetch_array($query)) {
                        if ($fila['id'] == $id_localizacion) { ?>
                            <option required value="<?php echo $fila['id']; ?>" selected><?php echo $fila['localizacion'] ?></option>
                        <?php } else { ?>
                            <option required value="<?php echo $fila['id']; ?>"><?php echo $fila['localizacion']; ?></option>
                        <?php  } ?>
                    <?php  } ?>
                </select>
            </div>
            <button class="btn btn-primary" type="submit">Asignar</button>
        </form>    
 
  </div>
  <div class="card-footer">
    
  </div>
</div>