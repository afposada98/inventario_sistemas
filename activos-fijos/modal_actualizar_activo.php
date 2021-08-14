<?php

include '../base_datos/conexion_inventario.php';

$id = $_REQUEST['id'];

$sql = "SELECT * FROM activos_fijos 
WHERE id = '$id'";

$query = mysqli_query($link, $sql) or die(mysqli_error($link));
$ficha = mysqli_fetch_array($query);
 

?>

<div class="card mx-auto" style="width: 35rem; text-align:center; margin-top:5em;">
 <h5 class="card-header">Activo Fijo: <?=$ficha['activo_fijo'];?></h5>
  <div class="card-body">
    <h5 class="card-title"> Editar</h5> 
    <form action="editar_activo.php" method="POST" class="form-group">
         
            <input type="hidden" name="id" value="<?=$id?>" id="" >
            <input type="hidden" name="tipo_activo" value="<?php echo $ficha['id_tipo_activo'] ?>" id="" >

            <div class="form-group col-md-12">
                        <label for="" class="form-label" style="float:left;">Activo Fijo </label>
                        <input type="text" class="form-control" id="localizacion" value="<?php echo $ficha['activo_fijo'];?>" name="activo_fijo" readonly>
            </div>
            <div class="form-group col-md-12">
            <label for="recipient-name" style="float:left;" class="col-form-label">Localización</label>
            <select class="form-select" id="localizacion" name="localizacion">
                            <?php

                            $sql = "SELECT id, localizacion FROM localizaciones ORDER BY localizacion ASC";
                            $query = mysqli_query($link, $sql) or die("Error: " . mysqli_error($link));

                            while ($f = mysqli_fetch_array($query)) {
                                if ($ficha['id_localizacion'] == $f['id']) { ?>
                                    <option required value="<?php echo $f['id']; ?>" selected><?php echo $f['localizacion'] ?></option>
                                <?php } else { ?>
                                    <option required value="<?php echo $f['id']; ?>"><?php echo $f['localizacion']; ?></option>
                                <?php  } ?>
                            <?php  } ?>
            </select>
            </div>  
       

            <div class="form-group col-md-auto">    
                <label for="estado" style="float:left;"> Estado </label>
                <select class="form-select" name="estado">
                <?php
                    if($ficha['estado']==1){?>
                    <option value="1" selected>Activo </option>
                    <option value="0">Inactivo</option>
                    <option value="2" > Retirado </option>
                <?php } else
                if($ficha['estado']==0) {?>                        
                    <option value="0" selected>Inactivo</option>  
                    <option value="1" > Activo </option>
                    <option value="2" > Retirado </option>

                <?php } else { ?> 
                    <option value="2" selected> Retirado </option>
                    <option value="0" >Inactivo</option>  
                    <option value="1" > Activo </option>
                <?php } ?>                
                </select>
                
            </div>

            <div class="text-center">
                <button class="btn btn-primary" style="margin-top:20px;" type="submit">Modificar</button>
                <button type="button" class="btn btn-danger" style="margin-top:20px;" data-dismiss="modal">Cerrar</button>
            </div>
        </form>    
        </div>

  </div>

</div>