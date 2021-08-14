<?php

include '../base_datos/conexion_inventario.php';

$id = $_REQUEST['id'];

$sql = "SELECT * FROM lineas_producto
WHERE id_linea = '$id'";

$query = mysqli_query($link, $sql) or die(mysqli_error($link));
$ficha = mysqli_fetch_array($query);
 

?>

<div class="card mx-auto" style="width: 25rem; text-align:center; margin-top:5em;">
 <h5 class="card-header"><?=$ficha['descripcion'];?></h5>
  <div class="card-body">
    <h6 class="card-title"> Editar Línea de Producto</h6> 
    <form action="editar_linea.php" method="POST" class="form-group">
         
            <input type="hidden" name="id" value="<?=$id?>" id="" >


            <div class="col-md-12">
                        <label for="" class="form-label" style="float:left;">Descripción</label>
                        <input type="text" class="form-control" id="descripcion" value="<?php echo $ficha['descripcion'];?>" name="descripcion">
            </div>
            <div class="col-md-12">
            <label for="recipient-name" style="float:left;" class="col-form-label">Clase</label>
            <select class="form-select" id="inputGroupSelect01" name="clase">
                            <?php

                            $sql = "SELECT id_clase,clase FROM clases WHERE estado=1 ORDER BY clase ASC";
                            $query = mysqli_query($link, $sql) or die("Error: " . mysqli_error($link));

                            while ($f = mysqli_fetch_array($query)) {
                                if ($ficha['id_clase'] == $f['id_clase']) { ?>
                                    <option required value="<?php echo $f['id_clase']; ?>" selected><?php echo $f['clase'] ?></option>
                                <?php } else { ?>
                                    <option required value="<?php echo $f['id_clase']; ?>"><?php echo $f['clase']; ?></option>
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
  
          

        </form>    
        </div>

        <div class="card-footer">

        <div class="text-center">
            <button class="btn btn-primary" type="submit">Modificar</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>

</div>

  </div>
 
</div>