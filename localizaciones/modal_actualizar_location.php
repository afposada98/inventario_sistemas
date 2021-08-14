<?php

include '../base_datos/conexion_inventario.php';

$id = $_REQUEST['id'];

$sql = "SELECT * FROM localizaciones 
WHERE localizaciones.id = '$id'";

$query = mysqli_query($link, $sql) or die(mysqli_error($link));
$ficha = mysqli_fetch_array($query);
 

?>

<div class="card mx-auto" style="width: 40rem; text-align:center; margin-top:5em;">
 <h5 class="card-header"><?=$ficha['localizacion'];?></h5>
  <div class="card-body">
    <h5 class="card-title"> Editar Localización</h5> 
    <form action="editar-localizacion.php" method="POST" class="form-group">
         
            <input type="hidden" name="id" value="<?=$id?>" id="" >


            <div class="col-md-12">
                        <label for="" class="form-label" style="float:left;">Localización </label>
                        <input type="text" class="form-control" id="localizacion" value="<?php echo $ficha['localizacion'];?>" name="localizacion">
            </div>
            <div class="col-md-12">
            <label for="recipient-name" style="float:left;" class="col-form-label">Area</label>
            <select class="form-select" id="inputGroupSelect01" name="area">
                            <?php

                            $sql = "SELECT id, nombre FROM area ORDER BY nombre ASC";
                            $query = mysqli_query($link, $sql) or die("Error: " . mysqli_error($link));

                            while ($f = mysqli_fetch_array($query)) {
                                if ($ficha['id_area'] == $f['id']) { ?>
                                    <option required value="<?php echo $f['id']; ?>" selected><?php echo $f['nombre'] ?></option>
                                <?php } else { ?>
                                    <option required value="<?php echo $f['id']; ?>"><?php echo $f['nombre']; ?></option>
                                <?php  } ?>
                            <?php  } ?>
            </select>
            </div>  

            <div class="col-md-12">    
                    <label for="estado" style="float: left;margin-top:10px;"> Estado </label>
                    <select class="form-select" name="estado">
                    <?php
                     if($ficha['estado']==1){?>
                        <option value="1" selected>Activo </option>
                        <option value="0">Inactivo</option>
                    <?php } else {?>
                        <option value="0" selected>Inactivo</option>  
                        <option value="1" > Activo </option>  
                    <?php } ?>                 
                    </select>
                    
                    </div>
  
            <div class="text-center">
            <button class="btn btn-primary" style="margin-top:20px;" type="submit">Modificar</button>
            <button type="button" class="btn btn-danger "style="margin-top:20px;" data-dismiss="modal">Cerrar</button>

        </form>    
        </div>

  </div>
  <div class="card-footer">

  </div>
</div>