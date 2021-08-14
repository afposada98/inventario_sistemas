<?php

include '../base_datos/conexion_inventario.php';

$id_detalle = $_REQUEST['id_detalle'];
$id_factura = $_REQUEST['id_factura'];

$sql = "SELECT factura2.*, catalogo.descripcion as nombre FROM factura2 INNER JOIN catalogo ON catalogo.id_catalogo=factura2.id_catalogo
WHERE id_detalle = '$id_detalle'";

$query = mysqli_query($link, $sql) or die(mysqli_error($link));
$ficha = mysqli_fetch_array($query);
 

?>

<div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" >
                <h5 class="modal-title w-100 text-center" id="exampleModalLabel" style=""><?php echo $ficha['nombre'] ?></h5>

            </div>
            <div class="modal-body">
                <form class="row g-3" action="editar_producto.php" method="post">

                <input type="hidden" name="id_detalle" value="<?php echo $id_detalle; ?>">
                <input type="hidden" name="id_factura" value="<?php echo $id_factura; ?>">


                <div class="form-group">
                        <label for="tipo_activo" class="col-form-label">Catálogo</label>

                        <select class="form-select" id="catalogo" name="catalogo">
                            <?php

                            $sql = "SELECT id_catalogo, descripcion FROM catalogo ORDER BY descripcion ASC";
                            $query = mysqli_query($link, $sql) or die("Error: " . mysqli_error($link));

                            while ($fila = mysqli_fetch_array($query)) {
                                if ($ficha['id_catalogo'] == $fila['id_catalogo']) { ?>
                                    <option required value="<?php echo $fila['id_catalogo']; ?>" selected><?php echo $fila['descripcion'] ?></option>
                                <?php } else { ?>
                                    <option required value="<?php echo $fila['id_catalogo']; ?>"><?php echo $fila['descripcion']; ?></option>
                                <?php  } ?>
                            <?php  } ?>
                        </select>
                    </div>

                    <!--
                    <div class="form-group col-md-12">
                        <label for="activo_fijo" class="col-form-label">Descripción</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo $ficha['descripcion'] ?>" maxlength="120">
                    </div>
                    -->

                    <div class="form-group col-6">
                        <label for="localizacion" class="col-form-label">Precio</label>
                        <input type="number" class="form-control" value="<?php echo $ficha['vr_unidad'];?>" id="valor" name="valor" min="0">
                    </div> 

                    <div class="form-group col-6">
                        <label for="localizacion" class="col-form-label">Cantidad</label>
                        <input type="number" class="form-control" value="<?php echo $ficha['cantidad'];?>" id="cantidad" name="cantidad" min="0">
                    </div>   
                    
                    <div class="form-group col-12">
                        <label for="localizacion" class="col-form-label">Detalle</label>
                        <input type="text" class="form-control" value="<?php echo rtrim($ficha['detalle']);?>" id="detalle" name="detalle">
                    </div>                                    

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Modificar</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
