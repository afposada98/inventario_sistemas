<?php
session_start();
include '../base_datos/seguridad.php';
include '../base_datos/conexion_inventario.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <?php include '../enlaces_sc/enlaces.php'; ?>
    <title> Teclado </title>
</head>

<body style="padding-bottom: 30px">
    <?php include '../menu/menu.php';     ?>
    
    <?php

    $id = $_GET['id'];

    $sql = "SELECT ft_teclado.id, activos_fijos.activo_fijo, localizaciones.localizacion, ft_teclado.marca, ft_teclado.modelo, 
    ft_teclado.serie, ft_teclado.factura, ft_teclado.fecha_compra, ft_teclado.tipo_conector, proveedores.nombre, ft_teclado.estado, ft_teclado.observaciones 
    FROM ft_teclado INNER JOIN activos_fijos ON ft_teclado.id_activo_fijo = activos_fijos.id INNER JOIN localizaciones ON 
    activos_fijos.id_localizacion = localizaciones.id INNER JOIN proveedores ON ft_teclado.id_proveedor = proveedores.id WHERE ft_teclado.id = '$id'";
    $query = mysqli_query($link, $sql) or die(mysqli_error($link));
    $ficha = mysqli_fetch_array($query);

    //print_r($ficha);

    ?>
    <div style="margin-right:2em; margin-left:2em;">
        <div class="titulos">
            <div class="reedireccion" style="text-align: right;"><a class="salida" style=" text-decoration:none;" href="./ver-activos-fijos.php">X</a></div>
            <div>
                <h1><?php echo $ficha['localizacion']; ?></h1>
            </div>
            <h5>Teclado</h5>
        </div>

        <div class="card">
            <div class="row informacion">

                <div class="contenedor-informacion col-md-2">
                    <p class="descripcion" for="first-name">Activo fijo:</p>
                    <input type="text" class="form-control" readonly value="<?php echo $ficha['activo_fijo']; ?>">
                </div>


                <div class="contenedor-informacion col-md-2">
                    <p class="descripcion" for="first-name">Marca:</p>
                    <input type="text" class="form-control" readonly value="<?php echo $ficha['marca']; ?>">
                </div>

                <div class="contenedor-informacion col-md-2">
                    <p class="descripcion" for="first-name">Serie:</p>
                    <input type="text" class="form-control" readonly value="<?php echo $ficha['serie']; ?>">
                </div>

                <div class="contenedor-informacion col-md-2">
                    <p class="descripcion" for="first-name">Fecha de la compra</p>
                    <input type="text" class="form-control" readonly value="<?php echo $ficha['fecha_compra']; ?>">
                </div>

                <div class="contenedor-informacion ultimo col-md-4">
                    <p class="descripcion" for="first-name">Proveedor:</p>
                    <input type="text" class="form-control" readonly value="<?php echo $ficha['nombre']; ?>">
                </div>





                <div class="contenedor-informacion col-md-4">
                    <p class="descripcion" for="first-name">localizacion:</p>
                    <input type="text" class="form-control" readonly value="<?php echo $ficha['localizacion']; ?>">
                </div>

                <div class="contenedor-informacion col-md-2">
                    <p class="descripcion" for="first-name">Modelo:</p>
                    <input type="text" class="form-control" readonly value="<?php echo $ficha['modelo']; ?>">
                </div>

                <div class="contenedor-informacion col-md-2">
                    <p class="descripcion" for="first-name">Factura</p>
                    <input type="text" class="form-control" readonly value="<?php echo $ficha['factura']; ?>">
                </div>

                <div class="contenedor-informacion col-md-2">
                    <p class="descripcion" for="first-name">tipo del conector</p>
                    <input type="text" class="form-control" readonly value="<?php echo $ficha['tipo_conector']; ?>">
                </div>

                <div class="contenedor-informacion ultimo col-md-2">
                    <p class="descripcion" for="first-name">Estado:</p>
                    <input type="text" class="form-control" readonly value="<?php if ($ficha['estado'] == 1) {
                                                                                    echo 'Activo';
                                                                                } else 
                                                                                if($ficha['estado']==0) {
                                                                                    echo 'Inactivo'; }
                                                                                    else {
                                                                                        echo 'Retirado';                                                                                     
                                                                                } ?>">
                </div>



                <div class="contenedor-informacion ultimo col-md-12">
                    <p class="descripcion" for="first-name">Observaciones:</p>
                    <textarea type="text" class="form-control" rows="4" readonly><?php echo $ficha['observaciones']; ?></textarea>
                </div>

            </div>
        </div>
        <div class="text-center">
            <a type="button" href="ver-activos-fijos.php" style="margin:10px;" class="btn btn-danger">Volver Atrás</a>
        </div>
    </div>


</body>

</html>