<?php
session_start();
include '../base_datos/seguridad.php';
include '../base_datos/conexion_inventario.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>
<?php include '../enlaces_sc/enlaces.php'; ?>
    <title> Impresora </title>
</head>

<body style="padding-bottom: 30px">
    <?php include '../menu/menu.php';?>
   
    <div class="container">
        <div class="titulos">
            <div class="reedireccion" style="text-align: right;"><a class="salida" style=" text-decoration:none;" href="/ver_impresora.php">X</a>
            </div>
            <h1>Crear Impresora</h1>
        </div>
        <!--Formulario para crear monitores-->
        <div class="card" style="border-width:5px; border-color:steelblue; border-radius:0px 0px 15px 15px; background-color:whitesmoke">

        <form action="registrar_impresora.php" method="post">


            <div class="row informacion">

            <div class="form-group col-md-3">
                        <label class="descripcion">Activo:</label>
                        <select class="form-select" id="inputGroupSelect01" name="activoFijo" required>
                            <?php

                            $sql = "SELECT activos_fijos.id, activos_fijos.activo_fijo, activos_fijos.estado FROM activos_fijos WHERE
                            activos_fijos.estado=1 AND activos_fijos.id_tipo_activo=5
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
                        <label class="descripcion">Tipo:</label>
                        <input type="text" name="tipo" class="form-control">
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

                <div class="form-group col-md-6">
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

                <div class="form-group col-md-2">
                        <label class="descripcion">Factura:</label>
                        <input type="text" name="factura" class="form-control">
                </div>


                <div class="form-group col-md-2">
                        <label class="descripcion">Fecha Factura:</label>
                        <input type="date" name="fecha_factura" class="form-control">
                </div>
              
                
                <div class="form-group col-md-2">
                        <label class="descripcion">Valor:</label>
                        <input type="number" name="valor" class="form-control">
                </div>                

                <!-- 
                <div class="form-group col-md-2 ">
                        <label class="descripcion">Vida Útil:</label>
                        <input type="text" name="vida_util" class="form-control">
                </div>
                -->
                <div class="form-group col-md-12" >
                        <label class="descripcion" for="first-name">Observaciones:</label>
                        <textarea type="text" name="observaciones" class="form-control" rows="3"></textarea>
                </div>
            </div>

                <div class="col-md-12 text-center">
                    <button type="submit" style="margin-bottom:20px;" class="btn btn-primary">Guardar</button>
                    <a type="button" href="ver_impresoras.php" style="margin-bottom:20px;" class="btn btn-danger">Cancelar</a>
                </div>

        </form>
        </div>

    </div>
</body>

</html>