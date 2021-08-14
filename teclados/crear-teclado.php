<?php
session_start();
include '../base_datos/seguridad.php';
include '../base_datos/conexion_inventario.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <?php include '../enlaces_sc/enlaces.php'; ?>
    <title> Teclados </title>
</head>

<body style="padding-bottom: 20px">
    <?php include '../menu/menu.php';     ?>
  
    <div class="container">
        <div class="titulos">
            <div class="reedireccion"><a class="salida" href="../teclados/ver-teclados.php">X</a>
            </div>
            <h1>Crear Teclado</h1>
        </div>
        <div class="card edicion">

        <form class="row informacion" action="registrar-teclado.php" method="post">


            <div class="form-group col-md-3">
                <label class="descripcion" for="number">Activo fijo</label>
                <select class="form-select" id="inputGroupSelect01" name="activoFijo" required>
                    <?php

                    $sql = "SELECT activos_fijos.id, activos_fijos.activo_fijo, activos_fijos.estado FROM activos_fijos WHERE
                    activos_fijos.estado=1 AND activos_fijos.id_tipo_activo=3
                    AND activos_fijos.id NOT IN (SELECT ft_computador.id_activo_fijo from ft_computador)
                    AND activos_fijos.id NOT IN (SELECT ft_monitor.id_activo_fijo FROM ft_monitor)
                    AND activos_fijos.id NOT IN (SELECT ft_teclado.id_activo_fijo FROM ft_teclado)
                    AND activos_fijos.id NOT IN (SELECT ft_mouse.id_activo_fijo FROM ft_mouse)
                    AND activos_fijos.id NOT IN (SELECT ft_impresora.id_activo_fijo FROM ft_impresora)
                    AND activos_fijos.id NOT IN (SELECT ft_suiche.id_activo_fijo FROM ft_suiche)";
                    $query = mysqli_query($link, $sql) or die("Error: " . mysqli_error($link));

                    while ($fila = mysqli_fetch_array($query)) {
                        if ($nombre == $fila['activo_fijo']) { ?>
                            <option required value="<?php echo $fila['id']; ?>" selected><?php echo $fila['activo_fijo'] ?></option>
                        <?php } else { ?>
                            <option required value="<?php echo $fila['id']; ?>"><?php echo $fila['activo_fijo']; ?></option>
                        <?php  } ?>
                    <?php  } ?>
                </select>
            </div>


            <div class="form-group col-md-3">
                <label class="descripcion" for="">Marca</label>
                <input type="" class="form-control" name="marca" placeholder="Marca del teclado" id="">
            </div>

            <div class="form-group col-md-3">
                <label class="descripcion" for="number">Modelo</label>
                <input type="text" class="form-control" name="modelo" placeholder="Modelo del teclado" id="number">
            </div>

            <div class="form-group col-md-3">
                <label class="descripcion" for="number">Serie</label>
                <input type="text" class="form-control" name="serie" placeholder="Serie del teclado" id="number">
            </div>




            <div class="form-group col-md-3">
                <label class="descripcion" for="last-name">Proveedor</label>
                <select class="form-select" id="inputGroupSelect01" name="proveedor">
                    <?php

                    $sql = "SELECT `id`, `nombre` FROM `proveedores`";
                    $query = mysqli_query($link, $sql) or die("Error: " . mysqli_error($link));

                    while ($fila = mysqli_fetch_array($query)) {
                        if ($nombre == $fila['nombre']) { ?>
                            <option required value="<?php echo $fila['id']; ?>" selected><?php echo $fila['nombre'] ?></option>
                        <?php } else { ?>
                            <option required value="<?php echo $fila['id']; ?>"><?php echo $fila['nombre']; ?></option>
                        <?php  } ?>
                    <?php  } ?>
                </select>
            </div>



            <div class="form-group col-md-3">
                <label class="descripcion" for="country">Factura</label>
                <input type="text" class="form-control" name="factura" placeholder="Factura del teclado" id="country">
            </div>

            <div class="form-group col-md-3">
                <label class="descripcion" for="country">Fecha de la compra</label>
                <input type="date" class="form-control" name="fecha_compra" placeholder="Fecha de la compra del teclado" id="country">
            </div>

            <div class="form-group col-md-3">
                <label class="descripcion" for="">Tipo de conector</label>
                <select type="" class="form-select" name="tipo_conector" placeholder="Tipo de conector del teclado" id="">
                    <option value="USB">USB</option>
                    <option value="PS2">PS2</option>
                </select>
            </div>

            


            <div class="col-md-12 form-group">
                <label class="descripcion" for="">Observaciones</label>
                <textarea class="col-md-12 form-control" name="observaciones" rows="3" id="" placeholder="Observaciones del equipo"></textarea>
            </div>


            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a type="button" href="ver-teclados.php" class="btn btn-danger">Cancelar</a>

            </div>
            </div>

        </form>
        </div>
    </div>
</body>

</html>