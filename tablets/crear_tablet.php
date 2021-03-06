<?php
session_start();
include '../base_datos/seguridad.php';
include '../base_datos/conexion_inventario.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>
<?php include '../enlaces_sc/enlaces.php'; ?>
    <title> Tablet </title>
</head>

<body style="padding-bottom: 20px">
    <?php include '../menu/menu.php';?>
   
    <div class="container" style="width:100%;">
        <div class="titulos">
            <div class="reedireccion" ><a class="salida" href="./ver_tablets.php">X</a>
            </div>
            <h1>Crear Tablet</h1>
        </div>
        <div class="card edicion">

        <form action="registrar_tablet.php" method="post">

            <div class="row informacion">

                <div class="form-group col-md-2">
                        <label class="descripcion">Activo:</label>
                        <select class="form-select" id="inputGroupSelect01" name="activoFijo" required>
                            <?php

                            $sql = "SELECT activos_fijos.id, activos_fijos.activo_fijo, activos_fijos.estado FROM activos_fijos WHERE
                            activos_fijos.estado=1 AND activos_fijos.id_tipo_activo=6
                            AND activos_fijos.id NOT IN (SELECT ft_computador.id_activo_fijo from ft_computador)
                            AND activos_fijos.id NOT IN (SELECT ft_monitor.id_activo_fijo FROM ft_monitor)
                            AND activos_fijos.id NOT IN (SELECT ft_teclado.id_activo_fijo FROM ft_teclado)
                            AND activos_fijos.id NOT IN (SELECT ft_mouse.id_activo_fijo FROM ft_mouse)
                            AND activos_fijos.id NOT IN (SELECT ft_impresora.id_activo_fijo FROM ft_impresora)
                            AND activos_fijos.id NOT IN (SELECT ft_tablet.id_activo_fijo FROM ft_tablet)
                            AND activos_fijos.id NOT IN (SELECT ft_radioenlace.id_activo_fijo FROM ft_radioenlace)
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

                <div class="form-group col-md-2">
                        <label class="descripcion">Marca:</label>
                        <input type="text" name="marca" class="form-control">
                </div>

                <div class="form-group col-md-2">
                        <label class="descripcion">Modelo:</label>
                        <input type="text" name="modelo" class="form-control">
                </div>

                <div class="form-group col-md-2">
                        <label class="descripcion">Serie:</label>
                        <input type="text" name="serie" class="form-control">
                </div>

                <div class="form-group col-md-4">
                        <label class="descripcion">Proveedor:</label>
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
                
                <div class="form-group col-md">
                        <label class="descripcion">Memoria:</label>
                        <input type="text" name="memoria" class="form-control">
                </div>              

                <div class="form-group col-md">
                        <label class="descripcion">Ram Total:</label>
                        <input type="text" name="ram" class="form-control">
                </div>

                <div class="form-group col-md">
                        <label class="descripcion">Bateria (mAh):</label>
                        <input type="text" name="bateria" class="form-control">
                </div>

                <div class="form-group col-md">
                        <label class="descripcion">Factura:</label>
                        <input type="text" name="factura" class="form-control">
                </div>

                <div class="form-group col-md">
                        <label class="descripcion">Fecha Factura:</label>
                        <input type="date" name="fecha_factura" class="form-control">
                </div>              
                
                <div class="form-group col-md">
                        <label class="descripcion">Valor:</label>
                        <input type="number" name="valor" class="form-control">
                </div> 
                
                <div class="form-group col-md">
                        <label class="descripcion">MAC:</label>
                        <input type="text" name="mac" class="form-control">
                </div>  
                 
                <div class="form-group col-md">
                        <label class="descripcion">Cel:</label>
                        <input type="text" name="cel" class="form-control">
                </div>  

                <!-- 
                <div class="form-group col-md-2 ">
                        <label class="descripcion">Vida ??til:</label>
                        <input type="text" name="vida_util" class="form-control">
                </div>
                -->
                <div class="form-group col-md-12" >
                        <label class="descripcion" for="first-name">Observaciones:</label>
                        <textarea type="text" name="observaciones" class="form-control" rows="3"></textarea>
                </div>

                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a type="button" href="ver_tablets.php" class="btn btn-danger">Cancelar</a>
                </div>
            </div>
              

        </form>
        </div>

    </div>
</body>

</html>