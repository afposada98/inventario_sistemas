<?php
session_start();
include '../base_datos/seguridad.php';
include '../base_datos/conexion_inventario.php';

$sector = 1;
if (isset($_REQUEST['nombre_estandar']))
    $sector = $_REQUEST['nombre_estandar'];


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <?php include '../enlaces_sc/enlaces.php'; ?>
    <title> Computadores </title>
</head>


<body style="padding-bottom: 10px">
<?php include '../menu/menu.php';     ?>


<div class="container">

        <div class="titulos">
            <div class="reedireccion"><a class="salida" href="../computadores/ver-computadores.php">X</a>
            </div>
            <h1>Crear Computador</h1>
        </div>
<div class="card edicion" style="padding:20px">
        <form class="form" action="registrar-computadores.php" method="post">
        <div class="row informacion" style="background-color:#EFEEF4;border:solid;border-width:2px;border-color:gray;border-radius:0px 0px 15px 15px;">
        
        <div class="col-12"><h2 class="text-center">Datos del Computador</h2></div>

            <div class="form-group col-md-3">
                <label class="descripcion" for="first-name">Activo fijo</label>
                <select class="form-select" id="inputGroupSelect01" name="activoFijo" required>
                    <?php
                    $sql = "SELECT activos_fijos.id, activos_fijos.activo_fijo, activos_fijos.estado FROM activos_fijos WHERE
                    activos_fijos.estado=1 AND activos_fijos.id_tipo_activo=1
                    AND activos_fijos.id NOT IN (SELECT ft_computador.id_activo_fijo from ft_computador)
                    AND activos_fijos.id NOT IN (SELECT ft_monitor.id_activo_fijo FROM ft_monitor)
                    AND activos_fijos.id NOT IN (SELECT ft_teclado.id_activo_fijo FROM ft_teclado)
                    AND activos_fijos.id NOT IN (SELECT ft_mouse.id_activo_fijo FROM ft_mouse)
                    AND activos_fijos.id NOT IN (SELECT ft_impresora.id_activo_fijo FROM ft_impresora)
                    AND activos_fijos.id NOT IN (SELECT ft_radioenlace.id_activo_fijo FROM ft_radioenlace)
                    AND activos_fijos.id NOT IN (SELECT ft_suiche.id_activo_fijo FROM ft_suiche)";
                    $query = mysqli_query($link, $sql) or die("Error: " . mysqli_error($link));

                    while ($fila = mysqli_fetch_array($query)) {?>
                            <option  value="<?php echo $fila['id']; ?>"><?php echo $fila['activo_fijo'] ?></option>
                        <?php  } ?>
                </select>
            </div>

            <div class="form-group col-md-3">
                <label class="descripcion" for="country">Marca</label>
                <input type="text" class="form-control" name="marca" id="country">
            </div>


            <div class="form-group col-md-3">
                <label class="descripcion" for="number">Modelo</label>
                <input type="text" class="form-control" name="modelo" id="number">
            </div>


            <div class="form-group col-md-3">
                <label class="descripcion" for="age">Serie</label>
                <input type="text" class="form-control" name="serie" id="age">
            </div>

            <div class="form-group col-md-3">
                <label class="descripcion" for="age">Parte</label>
                <input type="text" class="form-control" name="parte"  id="age">
            </div>

            <div class="form-group col-md-3">
                <label class="descripcion" for="age">Service</label>
                <input type="text" class="form-control" name="service_tag" id="age">
            </div>

            <div class="form-group col-md-3">
                <label class="descripcion" for="age">Exp Serv Code</label>
                <input type="text" class="form-control" name="exp_serv_code" id="age">
            </div>

            <div class="form-group col-md-3">
                <label class="descripcion" for="">Velocidad del procesador</label>
                <input type="" class="form-control" name="velocidadProcesador" id="">
            </div>

            <div class="form-group col-md-3">
                <label class="descripcion" for="category">Modelo del procesador</label>
                <input type="text" class="form-control" name="modeloProcesador" id="category">
            </div>

            <div class="form-group col-md-3">
                <label class="descripcion" for="education">Disco duro 1</label>
                <input type="text" class="form-control" name="dicoDuroUno" id="education">
            </div>

            <div class="form-group col-md-3">
                <label class="descripcion" for="education">Disco duro 2</label>
                <input type="text" class="form-control" name="dicoDuroDos" id="education">
            </div>

            <div class="form-group col-md-3">
                <label class="descripcion" for="education">Disco duro 3</label>
                <input type="text" class="form-control" name="dicoDuroTres" id="education">
            </div>

            <div class="form-group col-md-4">
                <label class="descripcion" for="last-name">Proveedor</label>
                <select class="form-select" id="inputGroupSelect01" name="proveedor">
                    <?php

                    $sql = "SELECT `id`, `nombre` FROM `proveedores`";
                    $query = mysqli_query($link, $sql) or die("Error: " . mysqli_error($link));

                    while ($fila = mysqli_fetch_array($query)) {                         ?>
                            <option  value="<?php echo $fila['id']; ?>" selected><?php echo $fila['nombre'] ?></option>
                            <option  value="<?php echo $fila['id']; ?>"><?php echo $fila['nombre']; ?></option>
                    <?php  } ?>
                </select>
            </div>

            <div class="form-group col-2">
                <label class="descripcion" for="country">Factura</label>
                <input type="text" class="form-control" name="factura" id="country">
            </div>

            <div class="form-group col-2">
                <label class="descripcion" for="number">Valor computador</label>
                <input type="text" class="form-control" name="valorComputador" id="number">
            </div>

            <div class="form-group col-2">
                <label class="descripcion" for="education">Dominio</label>
                <input type="number" class="form-control" name="dominio"  id="education">
            </div>

            <div class="form-group col-2">
                <label class="descripcion" for="age">Fecha compra</label>
                <input type="date" class="form-control" name="fechaCompra" id="age">
            </div>            

            <div class="form-group col-2">
                <label class="descripcion" for="">Fecha instalación</label>
                <input type="date" class="form-control" name="fechaInstalacion" id="">
            </div>

            <div class="form-group col-2">
                <label class="descripcion">Fecha de retiro</label>
                <input type="date" class="form-control" name="fechaRetiro">
            </div>


            <div class="form-group col-md-2">
                <label class="descripcion" for="education">Tipo dispositivo</label>
                <select class="form-select" id="inputGroupSelect01" name="tipoDispositivo">
                    <?php

                    $sql = "SELECT `id`, `dispositivo` FROM `tipo_dispositivo`";
                    $query = mysqli_query($link, $sql) or die("Error: " . mysqli_error($link));

                    while ($fila = mysqli_fetch_array($query)) {
                        if ($nombre == $fila['dispositivo']) { ?>
                            <option  value="<?php echo $fila['id']; ?>" selected><?php echo $fila['dispositivo'] ?></option>
                        <?php } else { ?>
                            <option  value="<?php echo $fila['id']; ?>"><?php echo $fila['dispositivo']; ?></option>
                        <?php  } ?>
                    <?php  } ?>
                </select>
            </div>

            <div class="form-group col-md-3">
                <label class="descripcion" for="education">Mac Lan</label>
                <input type="text" class="form-control" name="macLan" id="education">
            </div>

            <div class="form-group col-md-3">
                <label class="descripcion" for="education">Mac Wifi</label>
                <input type="text" class="form-control" name="macWifi" id="education">
            </div>

            

            <div class="col-md-12 form-group" style="margin-bottom: 2em;">
                <label class="descripcion" for="">Observaciones</label>
                <textarea class="col-md-12 form-control" name="obsevaciones" rows="3"></textarea>
            </div>
            
        </div>
<br>
        <div class="row informacion" style="background-color:#EFEEF4;border:solid;border-width:2px;border-radius:10px;border-color:gray ">
        <div class="col-12" style="margin-bottom:10px"><h2 class="text-center">Memorias Ram</h2></div>

            <!-- RAM 1 -->
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
                    <?php } ?>
                </select>
            </div>


            <div class="form-group col-md-4">
                <label class="descripcion" for="id_ram1">RAM 1 tipo</label>
                <select id="id_ram1" name="ram1_tipo" class="form-select"></select>
            </div>

            <div class="form-group col-md-4">
                <label class="descripcion" for="education">RAM 1 cantidad</label>
                <input type="text" class="form-control" name="ram1_cant" id="education">
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
                <label class="descripcion" for="id_ram2">RAM 2 tipo</label>
                <select  id="id_ram2" name="ram2_tipo" class="form-select"></select>
            </div>

            <div class="form-group col-md-4">
                <label class="descripcion" for="education">RAM 2 cantidad</label>
                <input type="text" class="form-control" name="ram2_cant" id="education">
            </div>

            <!-- RAM 3 -->
            <div class="form-group col-md-4">
                <?php
                $sql1 = "SELECT * FROM tipo_memoria_ram ORDER BY id_tipo_ram ASC";
                $query1 = mysqli_query($link, $sql1);
                ?>
                <label class="descripcion" for="ram3_ddr">RAM 3 DDR</label>
                <select  class="form-select" name="id_ram3_ddr" id="id_ram3_ddr">
                    <option value="0">Seleccione ...</option>
                    <?php while ($fila = mysqli_fetch_array($query1)) { ?>
                        <option value="<?php echo $fila['id_tipo_ram']; ?>"><?php echo $fila['tipo_ddr_ram']; ?></option>
                    <?php } ?>
                </select>
            </div>


            <div class="form-group col-md-4">
                <label class="descripcion" for="id_ram3">RAM 3 tipo</label>
                <select  id="id_ram3" name="ram3_tipo" class="form-select"></select>
            </div>

            <div class="form-group col-md-4">
                <label class="descripcion" for="education">RAM 3 cantidad</label>
                <input type="text" class="form-control" name="ram3_cant" id="education">
            </div>

            <!-- RAM 4 -->
            <div class="form-group col-md-4">
                <?php
                $sql1 = "SELECT * FROM tipo_memoria_ram ORDER BY id_tipo_ram ASC";
                $query1 = mysqli_query($link, $sql1);
                ?>
                <label class="descripcion" for="ram4_ddr">RAM 4 DDR</label>
                <select  class="form-select" name="id_ram4_ddr" id="id_ram4_ddr">
                    <option value="0">Seleccione ...</option>
                    <?php while ($fila = mysqli_fetch_array($query1)) { ?>
                        <option value="<?php echo $fila['id_tipo_ram']; ?>"><?php echo $fila['tipo_ddr_ram']; ?></option>
                    <?php } ?>
                </select>
            </div>


            <div class="form-group col-md-4">
                <label class="descripcion" for="id_ram4">RAM 4 tipo</label>
                <select  id="id_ram4" name="ram4_tipo" class="form-select"></select>
            </div>

            <div class="form-group col-md-4">
                <label class="descripcion" for="education">RAM 4 cantidad</label>
                <input type="text" class="form-control" name="ram4_cant" id="education">
            </div>
            
            </div>

            <div class="col-md-12 text-center" style="margin-top:20px;">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a type="button" class="btn btn-danger" href="ver-computadores.php"> Volver </a>
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