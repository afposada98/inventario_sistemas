<?php
session_start();
include '../base_datos/seguridad.php';
include '../base_datos/conexion_inventario.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <?php include '../enlaces_sc/enlaces.php'; ?>
    <title> Mouse </title>
</head>

<body style="padding-bottom: 20px">
    <?php include '../menu/menu.php';   

    $id = $_GET['id'];

    $sql = "SELECT ft_mouse.id, activos_fijos.activo_fijo, localizaciones.localizacion, ft_mouse.marca, ft_mouse.modelo, 
    ft_mouse.serie, ft_mouse.factura, ft_mouse.fecha_compra, ft_mouse.tipo_conector, proveedores.nombre, ft_mouse.estado, ft_mouse.observaciones 
    FROM ft_mouse INNER JOIN activos_fijos ON ft_mouse.id_activo_fijo = activos_fijos.id INNER JOIN localizaciones ON 
    activos_fijos.id_localizacion = localizaciones.id INNER JOIN proveedores ON ft_mouse.id_proveedor = proveedores.id WHERE ft_mouse.id = '$id'";
    $query = mysqli_query($link, $sql) or die(mysqli_error($link));
    $ficha = mysqli_fetch_array($query);

    //print_r($ficha);

    ?>
    <div class="container">
        <div class="titulos">
            <div class="reedireccion"><a class="salida" href="./ver-activos-fijos.php">X</a></div>
            <div>
                <h1><?php echo $ficha['localizacion']; ?></h1>
            </div>
            <h5>Mouse</h5>
        </div>


        <div class="card">
            <div class="row informacion">

                <div class="form-group col-md-3">
                    <label class="descripcion" for="first-name">Activo fijo:</label>
                    <input type="text" class="form-control" readonly value="<?php echo $ficha['activo_fijo']; ?>">
                </div>

                <div class="form-group col-md-3">
                    <label class=" descripcion" for="first-name">localizacion:</label>
                    <input type="text" class="form-control" readonly value="<?php echo $ficha['localizacion']; ?>">
                </div>

                <div class="form-group col-md-2">
                    <label class=" descripcion" for="first-name">Marca:</label>
                    <input type="text" class="form-control" readonly value="<?php echo $ficha['marca']; ?>">
                </div>

                <div class="form-group col-md-2">
                    <label class=" descripcion" for="first-name">Serie:</label>
                    <input type="text" class="form-control" readonly value="<?php echo $ficha['serie']; ?>">
                </div>

                <div class="form-group col-md-2">
                    <label class=" descripcion" for="first-name">Modelo:</label>
                    <input type="text" class="form-control" readonly value="<?php echo $ficha['modelo']; ?>">
                </div>

                <div class="form-group col-md-3">
                    <label class=" descripcion" for="first-name">Proveedor:</label>
                    <input type="text" class="form-control" readonly value="<?php echo $ficha['nombre']; ?>">
                </div>  

                <div class="form-group col-md-3">
                    <label class=" descripcion" for="first-name">Factura</label>
                    <input type="text" class="form-control" readonly value="<?php echo $ficha['factura']; ?>">
                </div>

                <div class="form-group col-md-2">
                    <label class=" descripcion" for="first-name">Fecha de la compra</label>
                    <input type="text" class="form-control" readonly value="<?php echo $ficha['fecha_compra']; ?>">
                </div>

                <div class="form-group col-md-2">
                    <label class=" descripcion" for="first-name">Conector</label>
                    <input type="text" class="form-control" readonly value="<?php echo $ficha['tipo_conector']; ?>">
                </div>

                <div class="form-group col-md-2">
                    <label class=" descripcion" for="first-name">Estado:</label>
                    <input type="text" class="form-control" readonly value="<?php if ($ficha['estado'] == 1) {
                                                                                    echo 'Activo';
                                                                                } else 
                                                                                if($ficha['estado']==0) {
                                                                                    echo 'Inactivo'; }
                                                                                    else {
                                                                                        echo 'Retirado';                                                                                     
                                                                                } ?>">
                </div>



                <div class="form-group ultimo col-md-12">
                    <label class="descripcion" for="first-name">Observaciones:</label>
                    <textarea type="text" class="form-control" rows="4" readonly><?php echo $ficha['observaciones']; ?></textarea>
                </div>

                <div class="text-center">
                    <a type="button" href="ver-activos-fijos.php" style="margin-top:10px;" class="btn btn-danger">Volver Atrás</a>
                </div>

            </div>
        </div>
    </div>
    

</body>

</html>