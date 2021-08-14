<?php
session_start();
include '../base_datos/seguridad.php';
include '../base_datos/conexion_inventario.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>
<LINK REL=StyleSheet HREF="style.css" TITLE="Contemporaneo">


<?php include '../enlaces_sc/enlaces.php'; ?>
    <title> Crear Factura </title>

    
</head>

<body style="padding-bottom: 20px">
    <?php include '../menu/menu.php';     ?>
  
    <div class="container" style="width:80%;">
        <div class="titulos">
            <div class="reedireccion"><a class="salida" href="ver_factura.php">X</a>
            </div>
            <h1>Crear Factura</h1>
        </div>
        <div class="card edicion">

        <form class="formularios" action="registrar_factura.php" method="post">

        <div class="row informacion">

            <div class="form-group col-md-4">
                <label class="descripcion" for="">Número Factura</label>
                <input type="" class="form-control" name="factura" placeholder="" id="">
            </div>

            <div class="form-group col-md-4">
                <label class="descripcion" for="number">Proveedor</label>
                <select class="form-select" id="inputGroupSelect01" name="proveedor" required>
                    <?php

                    $sql = "SELECT id,nombre FROM proveedores WHERE estado=1 ORDER BY nombre ASC";
                    $query = mysqli_query($link, $sql) or die("Error: " . mysqli_error($link));

                    while ($fila = mysqli_fetch_array($query)) { ?>
                            <option required value="<?php echo $fila['id']; ?>" ><?php echo $fila['nombre'] ?></option>
                    <?php  } ?>
                </select>
            </div>
          
            <div class="form-group col-md-4">
                <label class="descripcion" for="number">Fecha Factura</label>
                <input type="date" class="form-control" name="f_factu" placeholder="" id="">
            </div>
<!--

            <div class="form-group col-md-4">
                <label class="descripcion" for="">Estado</label>
                <select type="" class="form-select" name="estado" placeholder="" id="">
                    <option value="1">PAGADA</option>
                    <option value="0">PENDIENTE</option>
                </select>
            </div>
-->

            <div class="col-md-12 form-group" style="margin-bottom: 2em;">
                <label class="descripcion" for="">Observaciones</label>
                <textarea class="col-md-12 form-control" name="observaciones" rows="4" id="" placeholder="Observaciones de la factura"></textarea>
            </div>


            <div class="col-md-12 text-center">
                <button type="submit" style="margin-bottom:20px;" class="btn btn-primary">Guardar</button>
                <a type="button" href="ver_factura.php" style="margin-bottom:20px;" class="btn btn-danger">Cancelar</a>

            </div>
            </div>

        </form>
        </div>
    </div>
</body>

</html>