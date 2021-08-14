<?php
session_start();
include '../base_datos/seguridad.php';
include '../base_datos/conexion_inventario.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>
<?php include '../enlaces_sc/enlaces.php'; ?>
    <title> Monitores </title>
</head>

<body style="padding-bottom: 20px">
    <?php include '../menu/menu.php';     ?>
   
    <div class="container">
        <div class="titulos">
            <div class="reedireccion"><a class="salida" href="../monitores/ver-monitor.php">X</a>
            </div>
            <h1>Crear Monitor</h1>
        </div>
        <!--Formulario para crear monitores-->
        <div class="card edicion">

        <form class="row informacion" action="registrar-monitor.php" method="post">



            <div class="form-group col-md-3">
                    <div class="contenedor-informacion">
                        <label class="descripcion">Activo:</label>
                        <select class="form-select" id="inputGroupSelect01" name="activoFijo" required>
                            <?php

                            $sql = "SELECT activos_fijos.id, activos_fijos.activo_fijo, activos_fijos.estado FROM activos_fijos WHERE
                            activos_fijos.estado=1 AND activos_fijos.id_tipo_activo=2
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
                </div>

                <div class="form-group col-md-3">
                    <div class="contenedor-informacion">
                        <label class="descripcion">Marca:</label>
                        <input type="text" name="marca" class="form-control">
                    </div>
                </div>

                <div class="form-group col-md-3">
                    <div class="contenedor-informacion">
                        <label class="descripcion">Modelo:</label>
                        <input type="text" name="modelo" class="form-control">
                    </div>
                </div>

                <div class="form-group col-md-3">
                    <div class="contenedor-informacion">
                        <label class="descripcion">Serie:</label>
                        <input type="text" name="serie" class="form-control">
                    </div>
                </div>

                <div class="form-group col-md-3">
                    <div class="contenedor-informacion">
                        <label class="descripcion">Tipo de pantalla:</label>
                        <input type="text" name="tipo_pantalla" class="form-control">
                    </div>
                </div>


                <div class="form-group col-md-3">
                    <div class="contenedor-informacion ">
                        <label class="descripcion">Tamaño:</label>
                        <input type="text" name="tamaño" class="form-control">
                    </div>
                </div>


                <div class="form-group col-md-3">
                    <div class="contenedor-informacion">
                        <label class="descripcion">Conexión VGA:</label>
                        <select class="form-select" name="conex_vga" id="">
                            <option value="1">Si</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                </div>


                <div class="form-group col-md-3">
                    <div class="contenedor-informacion">
                        <label class="descripcion">Conexión HDMI:</label>
                        <select class="form-select" name="conex_hdmi" id="">
                            <option value="1">Si</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                </div>


                <div class="form-group col-md-3">
                    <div class="contenedor-informacion">
                        <label class="descripcion">Conexión DVI-D:</label>
                        <select class="form-select" name="conex_dvi_d" id="">
                            <option value="1">Si</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                </div>

                <div class="form-group col-md-3">
                    <div class="contenedor-informacion">
                        <label class="descripcion">Conexión DP:</label>
                        <select class="form-select" name="conex_dp" id="">
                            <option value="1">Si</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                </div>

                <div class="form-group col-md-3">
                    <div class="contenedor-informacion">
                        <label class="descripcion">Resolución:</label>
                        <input type="text" class="form-control" name="resolucion">
                    </div>
                </div>


                <div class="form-group col-md-3 campos">
                    <div class="contenedor-informacion">
                        <label class="descripcion">Service Tag:</label>
                        <input type="text" name="service_tag" class="form-control">
                    </div>
                </div>


                <div class="form-group col-md-3">
                    <div class="contenedor-informacion">
                        <label class="descripcion">Express Service Code:</label>
                        <input type="text" name="express_service_code" class="form-control">
                    </div>
                </div>


                <div class="form-group col-md-3">
                    <div class="contenedor-informacion ">
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
                </div>


                <div class="form-group col-md-3">
                    <div class="contenedor-informacion">
                        <label class="descripcion">Factura:</label>
                        <input type="text" name="factura" class="form-control">
                    </div>
                </div>


                <div class="form-group col-md-3">
                    <div class="contenedor-informacion">
                        <label class="descripcion">Fecha de la compra:</label>
                        <input type="date" name="fecha_compra" class="form-control">
                    </div>
                </div>


              

                <div class="form-group col-md-12" >
                        <label class="descripcion" for="first-name">Observaciones:</label>
                        <textarea type="text" name="observaciones" class="form-control" rows="3"></textarea>
                </div>

                
            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a type="button" href="ver-monitor.php" class="btn btn-danger">Cancelar</a>
            </div>
            
        </form>
        </div>

    </div>
</body>

</html>