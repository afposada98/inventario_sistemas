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
    <?php include '../menu/menu.php';      

    $id = $_GET['id'];

    $sql = "SELECT * FROM ft_monitor WHERE id = $id";

    $query = mysqli_query($link, $sql) or die(mysqli_error($link));
    $ficha = mysqli_fetch_array($query);

    //print_r($ficha);

    ?>

    <div class="container">
        <div class="titulos">            
            <div class="reedireccion"><a class="salida" href="../monitores/ver-monitor.php">X</a></div>
            <h1>Editar Monitor</h1>
        </div>
        <!--Formulario para crear monitores-->
        <div class="card edicion">

        <form class="row informacion" action="registrar-actualizacion-monitor.php" method="post">

            <input type="hidden" name="id_monitor" value="<?=$ficha['id']?>" id="">
            
            <div class="form-group col-md-3">
                            <?php
                            $sql1 = "SELECT id, activo_fijo FROM activos_fijos ";
                            $sql2 = "SELECT activos_fijos.id, activos_fijos.activo_fijo, activos_fijos.estado FROM activos_fijos WHERE
                activos_fijos.estado=1 AND activos_fijos.id_tipo_activo=2
                AND activos_fijos.id NOT IN (SELECT ft_computador.id_activo_fijo from ft_computador)
                AND activos_fijos.id NOT IN (SELECT ft_monitor.id_activo_fijo FROM ft_monitor)
                AND activos_fijos.id NOT IN (SELECT ft_teclado.id_activo_fijo FROM ft_teclado)
                AND activos_fijos.id NOT IN (SELECT ft_mouse.id_activo_fijo FROM ft_mouse)";

                            $query1 = mysqli_query($link, $sql1);
                            $query2 = mysqli_query($link, $sql2);
                            ?>
                            <label class="descripcion" for="activo">Activo Fijo</label>
                            <select class="form-select" name="activoFijo" required>
                                <?php while ($fila = mysqli_fetch_array($query1)) {
                                    if ($fila['id'] == $ficha['id_activo_fijo']) { ?>
                                        <option value="<?php echo $fila['id']; ?>" selected><?php echo $fila['activo_fijo']; ?></option>
                                    <?php } else { while ($fila2 = mysqli_fetch_array($query2)) { ?>
                                        <option value="<?php echo $fila2['id']; ?>"><?php echo $fila2['activo_fijo']; ?></option>

                                <?php }}
                                } ?>
                            </select>
             </div>


                <div class="form-group col-md-3">
                    <div class="contenedor-informacion">
                        <label class="descripcion">Marca:</label>
                        <input type="text" name="marca" class="form-control" value="<?=$ficha['marca']?>">
                    </div>
                </div>

                <div class="form-group col-md-3">
                    <div class="contenedor-informacion">
                        <label class="descripcion">Modelo:</label>
                        <input type="text" name="modelo" class="form-control" value="<?=$ficha['modelo']?>">
                    </div>
                </div>

                <div class="form-group col-md-3">
                    <div class="contenedor-informacion">
                        <label class="descripcion">Serie:</label>
                        <input type="text" name="serie" class="form-control" value="<?=$ficha['serie']?>">
                    </div>
                </div>

                <div class="form-group col-md-3">
                    <div class="contenedor-informacion">
                        <label class="descripcion">Tipo de pantalla:</label>
                        <input type="text" name="tipo_pantalla" class="form-control" value="<?=$ficha['tipo_pantalla']?>">
                    </div>
                </div>


                <div class="form-group col-md-3">
                    <div class="contenedor-informacion ">
                        <label class="descripcion">Tamaño:</label>
                        <input type="text" name="tamaño" class="form-control" value="<?=$ficha['tamaño']?>">
                    </div>
                </div>


                

                <div class="form-group col-md-3">
                    <div class="contenedor-informacion">
                        <label class="descripcion">Resolución:</label>
                        <input type="text" class="form-control" name="resolucion" value="<?=$ficha['resolucion']?>">
                    </div>
                </div>



                <div class="form-group col-md-3 ">
                    <div class="contenedor-informacion">
                        <label class="descripcion">Express Service Code:</label>
                        <input type="text" name="express_service_code" class="form-control" value="<?=$ficha['express_service_code']?>">
                    </div>
                </div>
                
                <div class="form-group col-md-3 ">
                    <div class="contenedor-informacion">
                        <label class="descripcion">Service Tag:</label>
                        <input type="text" name="service_tag" class="form-control" value="<?=$ficha['service_tag']?>">
                    </div>
                </div>



                <div class="form-group col-md-3">
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


                <div class="form-group col-md-3" >
                    <div class="contenedor-informacion" >
                        <label class="descripcion">Factura:</label>
                        <input type="text" name="factura" class="form-control" value="<?=$ficha['factura']?>">
                    </div>
                </div>


                <div class="form-group col-sm">
                    <div class="contenedor-informacion">
                        <label class="descripcion">Fecha Compra:</label>
                        <input type="date" name="fecha_compra" class="form-control" value="<?php echo $ficha['fecha_compra']; ?>">
                    </div>
                </div>

                <div class="form-group col-md">
                    <div class="contenedor-informacion">
                        <label class="descripcion">VGA:</label>
                        <select class="form-select" name="conex_vga" id="">
                            <?php if($ficha['conex_vga']==1){?>
                            <option value="1" selected>Si</option>
                            <option value="0">No</option>
                            <?php } else { ?>
                            <option value="1" >Si</option>
                            <option value="0" selected>No</option>
                            <?php } ?>
                        </select>
                    </div>
                </div>


                <div class="form-group col-md campos">
                    <div class="contenedor-informacion">
                        <label class="descripcion">HDMI:</label>
                        <select class="form-select" name="conex_hdmi" id="">
                        <?php if($ficha['conex_hdmi']==1){?>
                            <option value="1" selected>Si</option>
                            <option value="0">No</option>
                            <?php } else { ?>
                            <option value="1" >Si</option>
                            <option value="0" selected>No</option>
                            <?php } ?>
                        </select>
                    </div>
                </div>


                <div class="form-group col-md campos">
                    <div class="contenedor-informacion">
                        <label class="descripcion">DVI-D:</label>
                        <select class="form-select" name="conex_dvi_d" id="">
                        <?php if($ficha['conex_dvi_d']==1){?>
                            <option value="1" selected>Si</option>
                            <option value="0">No</option>
                            <?php } else { ?>
                            <option value="1" >Si</option>
                            <option value="0" selected>No</option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group col-md campos">
                    <div class="contenedor-informacion">
                        <label class="descripcion">DP:</label>
                        <select class="form-select" name="conex_dp" id="">
                        <?php if($ficha['conex_dp']==1){?>
                            <option value="1" selected>Si</option>
                            <option value="0">No</option>
                            <?php } else { ?>
                            <option value="1" >Si</option>
                            <option value="0" selected>No</option>
                            <?php } ?>
                        </select>
                    </div>
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
                        <label class="descripcion" for="first-name">Observaciones:</label>
                        <textarea type="text" name="observaciones" class="form-control" rows="4"><?=$ficha['observaciones']?></textarea>
                </div>

            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Modificar</button>
                <a type="button" href="ver-monitor.php" class="btn btn-danger">Cancelar</a>
            </div>

        </form>



    </div>
</body>

</html>