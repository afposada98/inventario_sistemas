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

<body style="padding-bottom: 20px">
    <?php include '../menu/menu.php';     ?>
  
    <?php

    $id = $_GET['id'];

    $sql = "SELECT ft_impresora.*, proveedores.nombre, localizaciones.localizacion, activos_fijos.activo_fijo FROM ft_impresora INNER JOIN 
    proveedores ON ft_impresora.id_proveedor = proveedores.id INNER JOIN activos_fijos ON ft_impresora.id_activo_fijo = activos_fijos.id INNER JOIN 
    localizaciones ON activos_fijos.id_localizacion = localizaciones.id WHERE ft_impresora.id = $id";

    $query = mysqli_query($link, $sql) or die(mysqli_error($link));
    $ficha = mysqli_fetch_array($query);


    ?>
    <div class="container">
        <div class="titulos">
            <div class="reedireccion" style="text-align: right;"><a class="salida" href="ver-activos-fijos.php">X</a></div>
            <h1><?php echo $ficha['localizacion']; ?></h1>
            <h5>Monitor</h5>
        </div>


        <div class="card">
            <div class="row informacion">
            
                <div class="form-group col-md-2">
                        <p class="descripcion" for="first-name">Activo:</p>
                        <input type="text" class="form-control" readonly value="<?php echo $ficha['activo_fijo']; ?>">
                </div>

                <div class="form-group col-md-2">
                        <p class="descripcion" for="first-name">Marca:</p>
                        <input type="text" class="form-control" readonly value="<?php echo $ficha['marca']; ?>">
                </div>

                <div class="form-group col-md-2">
                        <p class="descripcion" for="first-name">Modelo:</p>
                        <input type="text" class="form-control" readonly value="<?php echo $ficha['modelo']; ?>">
                </div>

                <div class="form-group col-md-2">
                        <p class="descripcion" for="first-name">Serie:</p>
                        <input type="text" class="form-control" readonly value="<?php echo $ficha['serie']; ?>">
                </div>

                <div class="form-group col-md-2">
                        <p class="descripcion" for="first-name">Tipo:</p>
                        <input type="text" class="form-control" readonly value="<?php echo $ficha['tipo']; ?>">
                </div>

                <div class="form-group col-md-2">
                        <p class="descripcion" for="first-name">Factura:</p>
                        <input type="text" class="form-control" readonly value="<?php echo $ficha['factura']; ?>">
                </div>

                <div class="form-group col-md-4">
                        <p class="descripcion" for="first-name">Proveedor:</p>
                        <input type="text" class="form-control" readonly value="<?php echo $ficha['nombre']; ?>">
                </div>

                <div class="form-group col-md-2">
                        <p class="descripcion" for="first-name">Fecha factura:</p>
                        <input type="text" class="form-control" readonly value="<?php echo $ficha['f_factura']; ?>">
                </div> 

                <div class="form-group col-md-2">
                        <p class="descripcion" for="first-name">localizacion:</p>
                        <input type="text" class="form-control" readonly value="<?php echo $ficha['localizacion']; ?>">
                </div>              

                <div class="form-group col-md-2">
                        <p class="descripcion" for="first-name">Valor Compra:</p>
                        <input type="text" class="form-control" readonly value="<?php echo $ficha['valor_compra']; ?>">
                </div>

                <div class="form-group col-md-1">
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

                <div class="form-group col-md-1">
                        <p class="descripcion" for="first-name">Vida Útil:</p>
                        <input type="text" class="form-control" readonly value="<?php echo $ficha['vida_util']; ?>">
                </div>


                <div class="form-group col-md-12">
                        <p class="descripcion" class="descripcion" for="first-name">Observaciones:</p>
                        <textarea type="text" class="form-control"  rows="3" readonly><?php echo $ficha['observaciones']; ?></textarea>
                </div>

                <div class="text-center">
                    <a type="button" href="ver-activos-fijos.php" class="btn btn-danger">Volver Atrás</a>
                </div>

            </div>
        </div>
       

    </div>

</body>

</html>