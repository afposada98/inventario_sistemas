<?php
session_start();
include '../base_datos/seguridad.php';
include '../base_datos/conexion_inventario.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <?php include '../enlaces_sc/enlaces.php'; ?>
    <title> Impresoras </title>
</head>

<body style="padding-bottom: 20px">
    <?php include '../menu/menu.php';

    $id = $_GET['id'];

    $sql = "SELECT ft_impresora.*, activos_fijos.activo_fijo FROM ft_impresora INNER JOIN activos_fijos 
    ON activos_fijos.id=ft_impresora.id_activo_fijo WHERE ft_impresora.id = $id";

    $query = mysqli_query($link, $sql) or die(mysqli_error($link));
    $ficha = mysqli_fetch_array($query);

    //print_r($ficha);

    ?>

    <div class="container">
        <div class="titulos">
            <div class="reedireccion" style="text-align: right;"><a class="salida" style=" text-decoration:none;" href="ver_impresoras.php">X</a>
            </div>
            <h1>Editar Impresora</h1>
        </div>
        <!--Formulario para crear monitores-->
        <div class="card edicion">

            <form action="registrar-actualizacion-impresora.php" method="post">

                <div class="row informacion">

                <input type="hidden" name="id_impresora" value="<?=$ficha['id']?>" id="">
                <input type="hidden" name="id_activo" value="<?=$ficha['id_activo_fijo']?>" id="">



                <div class="col-md-2">
                        <label class="descripcion" for="first-name">Activo Fijo:</label>
                        <input type="text" name="" class="form-control" value="<?php echo $ficha['activo_fijo']; ?>" readonly>
                    </div>


                    <div class="col-md-2">
                        <label class="descripcion" for="first-name">Marca:</label>
                        <input type="text" name="marca" class="form-control" value="<?php echo $ficha['marca']; ?>">
                    </div>

                    <div class="form-group col-md-2">
                        <label class="descripcion" for="first-name">Modelo:</label>
                        <input type="text" name="modelo" class="form-control" value="<?php echo $ficha['modelo']; ?>">
                    </div>

                    <div class="form-group col-md-2">
                        <label class="descripcion" for="first-name">Serie:</label>
                        <input type="text" name="serie" class="form-control" value="<?php echo $ficha['serie']; ?>">
                    </div>

                    <div class="form-group col-md-2">
                        <label class="descripcion" for="first-name">Tipo:</label>
                        <input type="text" name="tipo" class="form-control" value="<?php echo $ficha['tipo']; ?>">
                    </div>

                    <div class="form-group col-md-2">
                        <label class="descripcion" for="first-name">Factura:</label>
                        <input type="text" name="factura" class="form-control" value="<?php echo $ficha['factura']; ?>">
                    </div>

                    <div class="form-group col-md-4">
                        <div class="contenedor-informacion ">
                            <label class="descripcion">Proveedor:</label>
                            <select class="form-select" id="inputGroupSelect01" name="proveedor">
                                <?php

                                $sql = "SELECT id, nombre FROM proveedores";
                                $query = mysqli_query($link, $sql) or die("Error: " . mysqli_error($link));

                                while ($fila = mysqli_fetch_array($query)) {
                                    if ($ficha['id_proveedor'] == $fila['id']) { ?>
                                        <option required value="<?php echo $fila['id']; ?>" selected><?php echo $fila['nombre'] ?></option>
                                    <?php } else { ?>
                                        <option required value="<?php echo $fila['id']; ?>"><?php echo $fila['nombre']; ?></option>
                                    <?php  } ?>
                                <?php  } ?>
                            </select>
                        </div>
                    </div>


                    <div class="form-group col-md-2">
                        <label class="descripcion" for="first-name">Fecha factura:</label>
                        <input type="date" name="fecha_factura" class="form-control" id="fecha_factura" onchange="calcularVida()" value="<?php echo $ficha['f_factura']; ?>">
                    </div>
            
                    <div class="form-group col-md-2">
                        <label class="descripcion" for="first-name">Valor Compra:</label>
                        <input type="number" name="vr_compra" class="form-control" value="<?php echo $ficha['valor_compra']; ?>">
                    </div>              

                    <div class="form-group col-md-2">
                        <label class="descripcion" for="first-name">Vida Útil:</label>
                        <input type="text" class="form-control" value="<?php echo $ficha['vida_util']; ?>" readonly>
                    </div>

                    <div class="form-group col-md campos">    
                        <label class="descripcion" for="estado"> Estado </label>
                        <select class="form-select" name="estado">
                            <?php
                            if($ficha['estado']==1){?>
                                <option value="1" selected>Activo </option>
                                <option value="0">Inactivo</option>
                                <option value="2" > Retirado </option>
                        <?php } else
                            if($ficha['estado']==0) {?>                        
                                <option value="0" selected>Inactivo</option>  
                                <option value="1" > Activo </option>
                                <option value="2" > Retirado </option>

                        <?php } else { ?> 
                                <option value="2" selected> Retirado </option>
                                <option value="0" >Inactivo</option>  
                                <option value="1" > Activo </option>
                        <?php } ?>                
                         </select>
                    
                    </div>


                    <div class="form-group col-md-12">
                        <label class="descripcion" class="descripcion" for="first-name">Observaciones:</label>
                        <textarea type="text" class="form-control" name="observaciones" style="margin-bottom: 15px;" rows="3"><?php echo $ficha['observaciones']; ?></textarea>
                    </div>

                </div>

                <div class="col-md-12 text-center">
                    <button type="submit" style="margin-bottom:20px;" class="btn btn-primary">Modificar</button>
                    <a type="button" href="ver_impresoras.php" style="margin-bottom:20px;" class="btn btn-danger">Cancelar</a>

                </div>

            </form>



        </div>
</body>

</html>

<script>
    function calcularVida(){
        var fecha = document.getElementById('fecha_factura').value;
        var fecha_fin = new Date();
        var fecha_fin = fecha_fin.getTime();
        var fecha_inicio = fecha.getTime();
        alert (fecha_inicio);
    }

</script>