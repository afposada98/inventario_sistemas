<?php
session_start();
include '../base_datos/seguridad.php';
include '../base_datos/conexion_inventario.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <?php include '../enlaces_sc/enlaces.php'; ?>
    <title> Monitor </title>
</head>

<body style="padding-bottom: 20px">
    <?php include '../menu/menu.php';     ?>
  
    <?php

    $id = $_GET['id'];

    $sql = "SELECT ft_monitor.*, proveedores.nombre, localizaciones.localizacion, activos_fijos.activo_fijo FROM ft_monitor INNER JOIN 
    proveedores ON ft_monitor.id_proveedor = proveedores.id INNER JOIN activos_fijos ON ft_monitor.id_activo_fijo = activos_fijos.id INNER JOIN 
    localizaciones ON activos_fijos.id_localizacion = localizaciones.id WHERE ft_monitor.id = $id";

    $query = mysqli_query($link, $sql) or die(mysqli_error($link));
    $ficha = mysqli_fetch_array($query);


    ?>
    <div class="container">
        <div class="titulos">
            <div class="reedireccion"><a class="salida" href="./ver-activos-fijos.php">X</a></div>
            <h1><?php echo $ficha['localizacion']; ?></h1>
            <h5>Monitor</h5>
        </div>


        <div class="card">
            <div class="row informacion">
            
                <div class="col-md-3">
                    <div class="contenedor-informacion">
                        <label class="descripcion" for="first-name">Activo:</label>
                        <input type="text" class="form-control" readonly value="<?php echo $ficha['activo_fijo']; ?>">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="contenedor-informacion">
                        <label class="descripcion" for="first-name">Marca:</label>
                        <input type="text" class="form-control" readonly value="<?php echo $ficha['marca']; ?>">
                    </div>
                </div>


                <div class="col-md-3">
                    <div class="contenedor-informacion">
                        <label class="descripcion" for="first-name">Modelo:</label>
                        <input type="text" class="form-control" readonly value="<?php echo $ficha['modelo']; ?>">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="contenedor-informacion">
                        <label class="descripcion" for="first-name">Serie:</label>
                        <input type="text" class="form-control" readonly value="<?php echo $ficha['serie']; ?>">
                    </div>
                </div>

               


                <div class="col-md-3">
                    <div class="contenedor-informacion">
                        <label class="descripcion" for="first-name">Resolución:</label>
                        <input type="text" class="form-control" readonly value="<?php echo $ficha['resolucion']; ?>">
                    </div>
                </div>


                <div class="col-md-3">
                    <div class="contenedor-informacion">
                        <label class="descripcion" for="first-name">Service Tag:</label>
                        <input type="text" class="form-control" readonly value="<?php echo $ficha['service_tag']; ?>">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="contenedor-informacion">
                        <label class="descripcion" for="first-name">Express Service Code:</label>
                        <input type="text" class="form-control" readonly value="<?php echo $ficha['express_service_code']; ?>">
                    </div>
                </div>


                <div class="col-md-3">
                    <div class="contenedor-informacion ">
                        <label class="descripcion" for="first-name">Proveedor:</label>
                        <input type="text" class="form-control" readonly value="<?php echo $ficha['nombre']; ?>">
                    </div>
                </div>


                <div class="col-md-3">
                    <div class="contenedor-informacion">
                        <label class="descripcion" for="first-name">Factura:</label>
                        <input type="text" class="form-control" readonly value="<?php echo $ficha['factura']; ?>">
                    </div>
                </div>


                <div class="col-md-3">
                    <div class="contenedor-informacion">
                        <label class="descripcion" for="first-name">Fecha compra:</label>
                        <input type="text" class="form-control" readonly value="<?php echo $ficha['fecha_compra']; ?>">
                    </div>
                </div>               

                <div class="col-md-3">
                    <div class="contenedor-informacion">
                        <label class="descripcion" for="first-name">localizacion:</label>
                        <input type="text" class="form-control" readonly value="<?php echo $ficha['localizacion']; ?>">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="contenedor-informacion">
                        <label class="descripcion" for="first-name">Estado:</label>
                        <input type="text" class="form-control" readonly value="<?php if ($ficha['estado'] == 1) {
                                                                                    echo 'Activo';
                                                                                } else 
                                                                                if($ficha['estado']==0) {
                                                                                    echo 'Inactivo'; }
                                                                                    else {
                                                                                        echo 'Retirado';                                                                                     
                                                                                } ?>">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="contenedor-informacion">
                        <label class="descripcion" for="first-name">Tipo de pantalla:</label>
                        <input type="text" class="form-control" readonly value="<?php echo $ficha['tipo_pantalla']; ?>">
                    </div>
                </div>


                <div class="col-md-2">
                    <div class="contenedor-informacion ">
                        <label class="descripcion" for="first-name">Tamaño:</label>
                        <input type="text" class="form-control" readonly value="<?php echo $ficha['tamaño']; ?>">
                    </div>
                </div>


                <div class="col-md-2">
                    <div class="contenedor-informacion">
                        <label class="descripcion" for="first-name">Conexión VGA:</label>
                        <input type="text" class="form-control" readonly value="<?php if ($ficha['conex_vga'] == 1) {
                                                                                    echo "Si";
                                                                                } else {
                                                                                    echo "No";
                                                                                } ?>">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="contenedor-informacion">
                        <label class="descripcion" for="first-name">HDMI:</label>
                        <input type="text" class="form-control" readonly value="<?php if ($ficha['conex_hdmi'] == 1) {
                                                                                    echo "Si";
                                                                                } else {
                                                                                    echo "No";
                                                                                } ?>">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="contenedor-informacion">
                        <label class="descripcion" for="first-name">DVI-D:</label>
                        <input type="text" class="form-control" readonly value="<?php if ($ficha['conex_dvi_d'] == 1) {
                                                                                    echo "Si";
                                                                                } else {
                                                                                    echo "No";
                                                                                } ?>">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="contenedor-informacion">
                        <label class="descripcion" for="first-name">DP:</label>
                        <input type="text" class="form-control" readonly value="<?php if ($ficha['conex_dp'] == 1) {
                                                                                    echo "Si";
                                                                                } else {
                                                                                    echo "No";
                                                                                } ?>">
                    </div>
                </div>


                <div class="col-md-12">
                        <label class="descripcion" class="descripcion" for="first-name">Observaciones:</label>
                        <textarea type="text" class="form-control" rows="3" readonly><?php echo $ficha['observaciones']; ?></textarea>
                    
                </div>
            </div>
        </div>
        <div class="text-center">
            <a type="button" href="ver-activos-fijos.php" style="margin:10px;" class="btn btn-danger">Volver Atrás</a>
        </div>

    </div>

</body>

</html>