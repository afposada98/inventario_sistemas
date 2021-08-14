<?php
session_start();
include '../base_datos/seguridad.php';
include '../base_datos/conexion_inventario.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <?php include '../enlaces_sc/enlaces.php'; ?>
    <title> Radioenlaces </title>
</head>

<body style="padding-bottom: 30px">
    <?php include '../menu/menu.php';

    $id = $_GET['id'];

    $sql = "SELECT ft_radioenlace.*, activos_fijos.activo_fijo FROM ft_radioenlace INNER JOIN activos_fijos 
    ON activos_fijos.id=ft_radioenlace.id_activo_fijo WHERE ft_radioenlace.id = $id";

    $query = mysqli_query($link, $sql) or die(mysqli_error($link));
    $ficha = mysqli_fetch_array($query);

    //print_r($ficha);

    ?>

    <div class="container">
        <div class="titulos">
            <div class="reedireccion" style="text-align: right;"><a class="salida" href="ver_radioenlaces.php">X</a>
            </div>
            <h1>Editar Radio Enlace</h1>
        </div>
        <!--Formulario de edición-->
        <div class="card edicion">

            <form  action="registrar_actualizacion_radioenlace.php" method="post">

            <div class="row informacion">
                                
                    <input type="hidden" name="id_router" value="<?=$ficha['id']?>" id="">
                    <input type="hidden" name="id_activo" value="<?=$ficha['id_activo_fijo']?>" id="">

                    <div class="form-group col-md-2">
                                <label class="descripcion" for="first-name">Activo Fijo:</label>
                            <input type="text" name="" class="form-control" value="<?php echo $ficha['activo_fijo']; ?>" readonly>
                    </div>

                    <div class="form-group col-md-2">
                            <label class="descripcion" for="first-name">Marca:</label>
                            <input type="text" class="form-control" name="marca" value="<?php echo $ficha['marca']; ?>">
                    </div>

                    <div class="form-group col-md-2">
                            <label class="descripcion" for="first-name">Modelo:</label>
                            <input type="text" class="form-control" name="modelo" value="<?php echo $ficha['modelo']; ?>">
                    </div>

                    <div class="form-group col-md-2">
                            <label class="descripcion" for="first-name">Serie:</label>
                            <input type="text" class="form-control" name="serie" value="<?php echo $ficha['serie']; ?>">
                    </div>

                    <div class="form-group col-md-2">
                            <label class="descripcion" for="first-name">Puertos:</label>
                            <input type="text" class="form-control" name="puertos" value="<?php echo $ficha['puertos']; ?>">
                    </div>

                    <div class="form-group col-md-2">
                                <label class="descripcion" for="first-name">Velocidad:</label>
                                <input type="text" class="form-control" name="velocidad" value="<?php echo $ficha['velocidad']; ?>">
                    </div>                 

                    <div class="form-group col-md-2">
                            <label class="descripcion" for="first-name">Referencia:</label>
                            <input type="text" class="form-control" name="referencia" value="<?php echo $ficha['referencia']; ?>">
                    </div>  
                    
                    <div class="form-group col-md-2">
                            <label class="descripcion" for="first-name">MAC:</label>
                            <input type="text" class="form-control" name="mac" value="<?php echo $ficha['direccion_mac']; ?>">
                    </div>
                    
                    <div class="form-group col-md-2">
                            <label class="descripcion" for="first-name">Firmware:</label>
                            <input type="text" class="form-control" name="firmware" value="<?php echo $ficha['version_firmware']; ?>">
                    </div>

                    <div class="form-group col-md-2">
                            <label class="descripcion" for="first-name">Factura:</label>
                            <input type="text" class="form-control" name="factura" value="<?php echo $ficha['factura']; ?>">
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
                        <input type="date" name="fecha_factura" class="form-control" id="fecha_factura" value="<?php echo $ficha['f_factura']; ?>">
                    </div>
            
                    <div class="form-group col-md-2">
                        <label class="descripcion" for="first-name">Valor Compra:</label>
                        <input type="number" name="vr_compra" class="form-control" value="<?php echo $ficha['valor']; ?>">
                    </div>   
                    
                    <div class="form-group col-md-2">
                        <label class="descripcion" for="first-name">Nombre:</label>
                        <input type="text" name="nombre" class="form-control" value="<?php echo $ficha['nombre']; ?>">
                    </div> 

                    <div class="form-group col-md-2">
                        <label class="descripcion" for="first-name">Estado:</label>
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
                        <label class="descripcion" for="first-name">Observaciones:</label>
                        <textarea type="text" class="form-control" name="observaciones" style="margin-bottom: 15px;" rows="3"><?php echo $ficha['observaciones']; ?></textarea>
                    </div>
                </div>

                    <div class="col-md-12 text-center">
                        <button type="submit" style="margin-bottom:20px;" class="btn btn-primary">Modificar</button>
                        <a type="button" href="ver_radioenlaces.php" style="margin-bottom:20px;" class="btn btn-danger">Cancelar</a>
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