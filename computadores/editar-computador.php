<?php
session_start();
include '../base_datos/seguridad.php';
include '../base_datos/conexion_inventario.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <?php include '../enlaces_sc/enlaces.php'; ?>
    <title> Editar Computador </title>
</head>

<body style="padding-bottom: 20px">
    <?php include '../menu/menu.php';     ?>
 
    <?php

    $id = $_GET['id'];

    $sql = "SELECT pc.*, activos_fijos.activo_fijo, localizaciones.localizacion, so.descripcion AS s_operativo
        FROM ft_computador AS pc
        INNER JOIN activos_fijos ON pc.id_activo_fijo = activos_fijos.id 
        INNER JOIN localizaciones ON activos_fijos.id_localizacion = localizaciones.id 
        INNER JOIN proveedores ON pc.id_proveedor = proveedores.id 
        INNER JOIN s_operativo AS so ON so.id=pc.id_so
        WHERE pc.id = '$id'";

    $query = mysqli_query($link, $sql) or die(mysqli_error($link));
    $ficha = mysqli_fetch_array($query);
    //print_r($ficha);

    ?>
<div class="container">
        <div class="titulos">
        <div class="reedireccion"><a class="salida" href="./ver-computadores.php">X</a></div>
            <div>
                <h1 class="text-center" ><?php echo $ficha['localizacion']; ?></h1>
            </div>
            <h6>Editar Computador</h6>

        </div>


        <div class="card edicion" style="padding:20px">
            <form action="editar-computador2.php" method="post">
            <div class="row informacion" style="background-color:#EFEEF4;border:solid;border-color:gray;border-width:2px;border-radius:15px;">

                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="hidden" name="id_activo_fijo" value="<?php echo $ficha['id_activo_fijo']; ?>">

                    
                    <div class="col-12" style="margin-bottom:10px;"><h2 class="text-center">Datos del Computador</h2></div>
                    

                <div class="form-group col-md-2">
                    <div class="contenedor-informacion">
                        <label class="descripcion">Activo Fijo:</label>
                        <input type="text" name="" class="form-control" value="<?=$ficha['activo_fijo']?>" readonly>
                    </div>
                </div>

                <div class="form-group col-md-2">
                    <div class="contenedor-informacion">
                        <label class="descripcion">Marca:</label>
                        <input type="text" name="marca" class="form-control" value="<?=$ficha['marca']?>">
                    </div>
                </div>          
            
           
                <div class="form-group col-md">
                    <div class="contenedor-informacion">
                        <label class="descripcion">Modelo:</label>
                        <input type="text" name="modelo" class="form-control" value="<?=$ficha['modelo']?>">
                    </div>
                </div>

                <div class="form-group col-md-2">
                    <div class="contenedor-informacion">
                        <label class="descripcion">Serie:</label>
                        <input type="text" name="serie" class="form-control" value="<?=$ficha['serie']?>">
                    </div>
                </div> 
                
                <div class="form-group col-md-2">
                    <div class="contenedor-informacion">
                        <label class="descripcion">Grupo:</label>
                        <input type="text" name="grupo" class="form-control" value="<?=$ficha['grupo']?>">
                    </div>
                </div>

                <div class="form-group col-md-2">
                    <div class="contenedor-informacion">
                        <label class="descripcion">Nombre Equipo:</label>
                        <input type="text" name="nombre_equipo" class="form-control" value="<?=$ficha['nombre_equipo']?>">
                    </div>
                </div>

                <div class="form-group col-md-2">
                    <div class="contenedor-informacion">
                        <label class="descripcion">Usuario:</label>
                        <input type="text" name="usuario" class="form-control" value="<?=$ficha['usuario']?>">
                    </div>
                </div>

                <div class="form-group col-md">
                    <div class="contenedor-informacion">
                        <label class="descripcion">Parte:</label>
                        <input type="text" name="parte" class="form-control" value="<?=$ficha['parte']?>">
                    </div>
                </div>

                <div class="form-group col-md-2">
                    <div class="contenedor-informacion">
                        <label class="descripcion">Service Tag:</label>
                        <input type="text" name="service_tag" class="form-control" value="<?=$ficha['service_tag']?>">
                    </div>
                </div>

                <div class="form-group col-md-2">
                    <div class="contenedor-informacion">
                        <label class="descripcion">Exp Serv Code:</label>
                        <input type="text" name="exp_serv_code" class="form-control" value="<?=$ficha['exp_serv_code']?>">
                    </div>
                </div>

                <div class="form-group col-md-2">
                    <div class="contenedor-informacion">
                        <label class="descripcion">Velocidad del Procesador:</label>
                        <input type="text" name="velocidadProcesador" class="form-control" value="<?=$ficha['velocidad_procesador']?>">
                    </div>
                </div>

                <div class="form-group col-md-2">
                    <div class="contenedor-informacion">
                        <label class="descripcion">Modelo Procesador:</label>
                        <input type="text" name="modeloProcesador" class="form-control" value="<?=$ficha['modelo_procesador']?>">
                    </div>
                </div>

                <div class="form-group col-md-2">
                    <div class="contenedor-informacion">
                        <label class="descripcion">Disco Duro 1:</label>
                        <input type="text" name="discoDuroUno" class="form-control" value="<?=$ficha['disco_duro_1']?>">
                    </div>
                </div>           

                <div class="form-group col-md-2">
                    <div class="contenedor-informacion">
                        <label class="descripcion">Disco Duro 2:</label>
                        <input type="text" name="discoDuroDos" class="form-control" value="<?=$ficha['disco_duro_2']?>">
                    </div>
                </div>
           
                <div class="form-group col-md-2">
                    <div class="contenedor-informacion">
                        <label class="descripcion">Disco Duro 3:</label>
                        <input type="text" name="discoDuroTres" class="form-control" value="<?=$ficha['disco_duro_3']?>">
                    </div>
                </div>

                <div class="form-group col-md-2">
                    <div class="contenedor-informacion">
                        <label class="descripcion">Ram Total:</label>
                        <input type="text" name="ram" class="form-control" value="<?=$ficha['total_ram']?>">
                    </div>
                </div>

                <div class="form-group col-md-2">
                    <div class="contenedor-informacion">
                        <label class="descripcion">Tarjeta Red:</label>
                        <input type="text" name="tarjeta_red" class="form-control" value="<?=$ficha['tarjeta_red']?>">
                    </div>
                </div>               

                <div class="form-group col-md-2">
                        <?php
                        $sql1 = "SELECT id, descripcion FROM s_operativo WHERE estado=1";

                        $query1 = mysqli_query($link, $sql1);
                        ?>
                        <label class="descripcion" for="ram1_ddr">Sistema Operativo</label>
                        <select class="form-select" name="so">
                            <?php while ($fila = mysqli_fetch_array($query1)) {
                                if ($fila['id'] == $ficha['id_so']) { ?>
                                    <option value="<?php echo $fila['id']; ?>" selected><?php echo $fila['descripcion']; ?></option>
                                <?php } else { ?>
                                <option value="<?php echo $fila['id']; ?>"><?php echo $fila['descripcion']; ?></option>

                            <?php }}  ?>
                        </select>
                    </div>

                <div class="form-group col-md-2">
                    <div class="contenedor-informacion">
                        <label class="descripcion">Arquitectura:</label>
                        <input type="text" name="arquitectura" class="form-control" value="<?=$ficha['arquitectura']?>">
                    </div>
                </div>

                <div class="form-group col-md-2">
                    <div class="contenedor-informacion">
                        <label class="descripcion">Clasificación:</label>
                        <input type="text" name="clasificacion" class="form-control" value="<?=$ficha['clasificacion']?>">
                    </div>
                </div>
                
                <div class="form-group col-md-4 campos">
                    <?php
                    $sql1 = "SELECT id, nombre FROM proveedores ORDER BY nombre ASC";
                    $query1 = mysqli_query($link, $sql1);
                    ?>
                    <label class="descripcion" for="proveedores">Proveedores</label>
                    <select class="form-select" name="proveedor">
                        <option value="0">Seleccione ...</option>
                            <?php while ($fila = mysqli_fetch_array($query1)) {
                                if ($fila['id'] == $ficha['id_proveedor']) { ?>
                                <option value="<?php echo $fila['id']; ?>" selected><?php echo $fila['nombre']; ?></option>
                            <?php } else ?>
                            <option value="<?php echo $fila['id']; ?>"><?php echo $fila['nombre']; ?></option>

                        <?php }  ?>
                    </select>
                </div>  

                <div class="form-group col-md-2 campos">
                    <div class="contenedor-informacion">
                        <label class="descripcion">Factura:</label>
                        <input type="text" name="factura" class="form-control" value="<?=$ficha['factura']?>">
                    </div>
                </div>     

                
                <div class="form-group col-md-2 campos">
                    <div class="contenedor-informacion">
                        <label class="descripcion">Valor Compra:</label>
                        <input type="text" name="valorComputador" class="form-control" value="<?=$ficha['valor_compra']?>">
                    </div>
                </div>

                
                <div class="form-group col-md-2">
                    <div class="contenedor-informacion">
                        <label class="descripcion">Dominio:</label>
                        <input type="text" name="dominio" class="form-control" value="<?=$ficha['dominio']?>">
                    </div>
                </div>

                 

                <div class="form-group col-md-2">
                    <div class="contenedor-informacion">
                        <label class="descripcion">Fecha Compra:</label>
                        <input type="date" name="fechaCompra" class="form-control" value="<?=$ficha['fecha_compra']?>">
                    </div>
                </div> 

                  
                <div class="form-group col-md-2">
                    <div class="contenedor-informacion">
                        <label class="descripcion">Fecha Instalación:</label>
                        <input type="date" name="fechaInstalacion" class="form-control" value="<?=$ficha['fecha_instalacion']?>">
                    </div>
                </div>

                  <div class="form-group col-md-2">
                    <div class="contenedor-informacion">
                        <label class="descripcion">Fecha Retiro:</label>
                        <input type="date" name="fechaRetiro" class="form-control" value="<?=$ficha['fecha_retiro']?>">
                    </div>
                </div> 

                <div class="form-group col-md-2">
                        <?php
                        $sql1 = "SELECT id, dispositivo FROM tipo_dispositivo";

                        $query1 = mysqli_query($link, $sql1);
                        ?>
                        <label class="descripcion" for="ram1_ddr">Tipo de Dispositivo</label>
                        <select class="form-select" name="tipoDispositivo">
                            <?php while ($fila = mysqli_fetch_array($query1)) {
                                if ($fila['id'] == $ficha['tipo_dispositivo']) { ?>
                                    <option value="<?php echo $fila['id']; ?>" selected><?php echo $fila['dispositivo']; ?></option>
                                <?php } else { ?>
                                <option value="<?php echo $fila['id']; ?>"><?php echo $fila['dispositivo']; ?></option>

                            <?php }}  ?>
                        </select>
                    </div>

                    

                <div class="form-group col-md-2 campos">
                    <div class="contenedor-informacion">
                        <label class="descripcion">Mac Lan:</label>
                        <input type="text" name="macLan" class="form-control" value="<?=$ficha['mac_lan']?>">
                    </div>
                </div>

                <div class="form-group col-md-2 campos">
                    <div class="contenedor-informacion">
                        <label class="descripcion">Mac Wifi:</label>
                        <input type="text" name="macWifi" class="form-control" value="<?=$ficha['mac_wifi']?>">
                    </div>
                </div>

                <div class="form-group col-md-2">
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
                            <textarea type="text" name="observacion" class="form-control" rows="4"><?=$ficha['observaciones']?></textarea>
                    </div>
            </div> 
                    <br>
                <div class="row" style="background-color:#EFEEF4;padding:0px;border:solid;border-width:2px;border-radius:10px;border-color:gray ">
                    <!-- RAM 1 -->
                    <div class="col-12" style="margin-bottom:10px"><h2 class="text-center">Memorias Ram</h2></div>
                    <div class="form-group col-md-4">
                        <?php
                        $sql1 = "SELECT * FROM tipo_memoria_ram ORDER BY id_tipo_ram ASC";
                        $query1 = mysqli_query($link, $sql1);
                        ?>
                        <label class="descripcion" for="ram1_ddr">RAM 1 DDR</label>
                        <select class="form-select" name="id_ram1_ddr" id="id_ram1_ddr">
                            <option value="0">Seleccione ...</option>
                            <?php while ($fila = mysqli_fetch_array($query1)) { ?>
                                <option value="<?php echo $fila['id_tipo_ram']; ?>"><?php echo $fila['tipo_ddr_ram']; ?></option>
                            <?php }  ?>
                        </select>
                    </div>


                    <div class="form-group col-md-4">
                        <?php
                        $sql1 = "SELECT id_ram, nombre_estandar FROM memoria_ram ORDER BY id_tipo_ram ASC";
                        $query1 = mysqli_query($link, $sql1);
                        ?>
                        <label class="descripcion" for="ram1_ddr">RAM 1 TIPO</label>
                        <select class="form-select" name="ram1_tipo" id="id_ram1">
                            <option value="0">Seleccione ...</option>
                            <?php while ($fila = mysqli_fetch_array($query1)) {
                                if ($fila['id_ram'] == $ficha['ram1_tipo']) { ?>
                                    <option value="<?php echo $fila['id_ram']; ?>" selected><?php echo $fila['nombre_estandar']; ?></option>
                                <?php } ?>
                            <?php  } ?>
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label class="descripcion" for="education">RAM 1 cantidad</label>
                        <input type="text" class="form-control" name="ram1_cant" value="<?php echo $ficha['ram1_cant']; ?>" placeholder="Cantidad de RAM" id="education">
                    </div>


                    <!-- RAM 2 -->
                    <div class="form-group col-md-4">
                        <?php
                        $sql1 = "SELECT * FROM tipo_memoria_ram ORDER BY id_tipo_ram ASC";
                        $query1 = mysqli_query($link, $sql1);
                        ?>
                        <label class="descripcion" for="ram2_ddr">RAM 2 DDR</label>
                        <select class="form-select" name="id_ram2_ddr" id="id_ram2_ddr">
                            <option value="0">Seleccione ...</option>
                            <?php while ($fila = mysqli_fetch_array($query1)) { ?>
                                <option value="<?php echo $fila['id_tipo_ram']; ?>"><?php echo $fila['tipo_ddr_ram']; ?></option>
                            <?php } ?>
                        </select>
                    </div>


                    <div class="form-group col-md-4">
                        <?php
                        $sql1 = "SELECT id_ram, nombre_estandar FROM memoria_ram ORDER BY id_tipo_ram ASC";
                        $query1 = mysqli_query($link, $sql1);
                        ?>
                        <label class="descripcion" for="ram1_ddr">RAM 2 TIPO</label>
                        <select class="form-select" name="ram2_tipo" id="id_ram2">
                            <option value="0">Seleccione ...</option>
                            <?php while ($fila = mysqli_fetch_array($query1)) {
                                if ($fila['id_ram'] == $ficha['ram2_tipo']) { ?>
                                    <option value="<?php echo $fila['id_ram']; ?>" selected><?php echo $fila['nombre_estandar']; ?></option>
                                <?php } ?>
                            <?php  } ?>
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label class="descripcion" for="education">RAM 2 cantidad</label>
                        <input type="text" class="form-control" value="<?php echo $ficha['ram2_cant']; ?>" name="ram2_cant" placeholder="Cantidad de RAM" id="education">
                    </div>

                    <!-- RAM 3 -->
                    <div class="form-group col-md-4">
                        <?php
                        $sql1 = "SELECT * FROM tipo_memoria_ram ORDER BY id_tipo_ram ASC";
                        $query1 = mysqli_query($link, $sql1);
                        ?>
                        <label class="descripcion" for="ram3_ddr">RAM 3 DDR</label>
                        <select class="form-select" name="id_ram3_ddr" id="id_ram3_ddr">
                            <option value="0">Seleccione ...</option>
                            <?php while ($fila = mysqli_fetch_array($query1)) { ?>
                                <option value="<?php echo $fila['id_tipo_ram']; ?>"><?php echo $fila['tipo_ddr_ram']; ?></option>
                            <?php } ?>
                        </select>
                    </div>


                    <div class="form-group col-md-4">
                        <?php
                        $sql1 = "SELECT id_ram, nombre_estandar FROM memoria_ram ORDER BY id_tipo_ram ASC";
                        $query1 = mysqli_query($link, $sql1);
                        ?>
                        <label class="descripcion" for="ram1_ddr">RAM 3 TIPO</label>
                        <select class="form-select" name="ram3_tipo" id="id_ram3">
                            <option value="0">Seleccione ...</option>
                            <?php while ($fila = mysqli_fetch_array($query1)) {
                                if ($fila['id_ram'] == $ficha['ram3_tipo']) { ?>
                                    <option value="<?php echo $fila['id_ram']; ?>" selected><?php echo $fila['nombre_estandar']; ?></option>
                                <?php } ?>
                            <?php  } ?>
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label class="descripcion" for="education">RAM 3 cantidad</label>
                        <input type="text" class="form-control" name="ram3_cant" value="<?php echo $ficha['ram3_cant']; ?>" placeholder="Cantidad de RAM" id="education">
                    </div>

                    <!-- RAM 4 -->
                    <div class="form-group col-md-4">
                        <?php
                        $sql1 = "SELECT * FROM tipo_memoria_ram ORDER BY id_tipo_ram ASC";
                        $query1 = mysqli_query($link, $sql1);
                        ?>
                        <label class="descripcion" for="ram4_ddr">RAM 4 DDR</label>
                        <select class="form-select" name="id_ram4_ddr" id="id_ram4_ddr">
                            <option value="0">Seleccione ...</option>
                            <?php while ($fila = mysqli_fetch_array($query1)) { ?>
                                <option value="<?php echo $fila['id_tipo_ram']; ?>"><?php echo $fila['tipo_ddr_ram']; ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <?php
                        $sql1 = "SELECT id_ram, nombre_estandar FROM memoria_ram ORDER BY id_tipo_ram ASC";
                        $query1 = mysqli_query($link, $sql1);?>
                        <label class="descripcion" for="ram1_ddr">RAM 4 TIPO</label>
                        <select class="form-select" name="ram4_tipo" id="id_ram4">
                            <option value="0">Seleccione ...</option>
                            <?php while ($fila = mysqli_fetch_array($query1)) {
                                if ($fila['id_ram'] == $ficha['ram4_tipo']) { ?>
                                    <option value="<?php echo $fila['id_ram']; ?>" selected><?php echo $fila['nombre_estandar']; ?></option>
                                <?php } ?>
                            <?php  } ?>
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label class="descripcion" for="education">RAM 4 cantidad</label>
                        <input type="text" class="form-control" name="ram4_cant" value="<?php echo $ficha['ram4_cant']; ?>" placeholder="Cantidad de RAM" id="education">
                    </div>




                    <!--<div class="col-md-12 form-group" style="margin-bottom: 2em;">
                    <p>Observaciones</p>
                    <textarea type="text" class="col-md-12 form-control" rows="4"  value="<?php //echo $ficha['observaciones']; 
                                                                                            ?>"></textarea>
                </div>-->

                   


                </div>
                <div class="text-center" style="margin-top:20px;">
                    <button type="submit" class="btn btn-primary">Modificar</button>
                    <a type="button" href="ver-computadores.php" class="btn btn-danger">Cancelar</a>
                </div>
            </form>
        </div>

    </div>


</body>

</html>


<!-- RAM 1 -->
<script language="javascript">
    $(document).ready(function() {
        $("#id_ram1_ddr").on('change', function() {
            $("#id_ram1_ddr option:selected").each(function() {
                var id_ram1_ddr = $(this).val();
                $.post("get-tipos-ram1.php", {
                    id_ram1_ddr: id_ram1_ddr
                }, function(data) {
                    $("#id_ram1").html(data);
                });
            });
        });
    });
</script>


<!-- RAM 2 -->
<script language="javascript">
    $(document).ready(function() {
        $("#id_ram2_ddr").on('change', function() {
            $("#id_ram2_ddr option:selected").each(function() {
                var id_ram2_ddr = $(this).val();
                $.post("get-tipos-ram2.php", {
                    id_ram2_ddr: id_ram2_ddr
                }, function(data) {
                    $("#id_ram2").html(data);
                });
            });
        });
    });
</script>

<!-- RAM 3 -->
<script language="javascript">
    $(document).ready(function() {
        $("#id_ram3_ddr").on('change', function() {
            $("#id_ram3_ddr option:selected").each(function() {
                var id_ram3_ddr = $(this).val();
                $.post("get-tipos-ram3.php", {
                    id_ram3_ddr: id_ram3_ddr
                }, function(data) {
                    $("#id_ram3").html(data);
                });
            });
        });
    });
</script>

<!-- RAM 4 -->
<script language="javascript">
    $(document).ready(function() {
        $("#id_ram4_ddr").on('change', function() {
            $("#id_ram4_ddr option:selected").each(function() {
                var id_ram4_ddr = $(this).val();
                $.post("get-tipos-ram4.php", {
                    id_ram4_ddr: id_ram4_ddr
                }, function(data) {
                    $("#id_ram4").html(data);
                });
            });
        });
    });
</script>