<?php

include '../base_datos/conexion_inventario.php';

$id = $_REQUEST['id'];

$sql = "SELECT * FROM catalogo
WHERE id_catalogo = '$id'";

$query = mysqli_query($link, $sql) or die(mysqli_error($link));
$ficha = mysqli_fetch_array($query);
 

?>

<div class="card mx-auto" style="width: 45rem;  margin-top:5em;">
 <h5 class="card-header"><?=$ficha['descripcion'];?></h5>
  <div class="card-body">
    <h5 class="card-title"> Editar Catálogo</h5>
    <form action="editar_catalogo.php" method="POST" class="form-group">
    <br>
         
            <input type="hidden" name="id" value="<?=$id?>" id="" >

            <div class="row">
            <div class="form-group col-md-12">
                        <label for="" class="form-label" >Descripción</label>
                        <input type="text" class="form-control" id="descripcion" value="<?php echo $ficha['descripcion'];?>" name="descripcion">
            </div>
            <div class="form-group col-md-4">
                <label for="recipient-name"  class="form-label">Línea </label>
                <select class="form-select" id="inputGroupSelect01" name="linea">
                            <?php

                            $sql = "SELECT id_linea,descripcion FROM lineas_producto WHERE estado=1 ORDER BY descripcion ASC";
                            $query = mysqli_query($link, $sql) or die("Error: " . mysqli_error($link));

                            while ($f = mysqli_fetch_array($query)) {
                                if ($ficha['id_linea'] == $f['id_linea']) { ?>
                                    <option required value="<?php echo $f['id_linea']; ?>" selected><?php echo $f['descripcion'] ?></option>
                                <?php } else { ?>
                                    <option required value="<?php echo $f['id_linea']; ?>"><?php echo $f['descripcion']; ?></option>
                                <?php  } ?>
                            <?php  } ?>
                </select>
            </div>  

            <div class="form-group col-md-3">
                        <label for="" class="form-label">Referencia </label>
                        <input type="text" class="form-control" id="referencia" name="referencia" value="<?php echo $ficha['referencia']; ?>" >
            </div>

            <div class="form-group col-md-2">
                        <label for="" class="form-label">Iva </label>
                        <input type="number" class="form-control" id="iva" name="iva" step="0.01" value="<?php echo $ficha['porc_iva']; ?>" >
            </div>

            <div class="form-group col-md-3">    
                    <label for="estado" > Estado </label>
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

  </div>
  <div class="card-footer">

  <div class="text-center">
            <button class="btn btn-primary" type="submit">Modificar</button>
            <button type="button" class="btn btn-danger " data-dismiss="modal">Cerrar</button>

            </div>

  </div>
</div>