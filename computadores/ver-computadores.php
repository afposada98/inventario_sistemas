<?php
session_start();
include '../base_datos/seguridad.php';
include '../base_datos/conexion_inventario.php';


$estados = 1;
if(isset($_REQUEST['estados'])){
    $estados = $_REQUEST['estados'];
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
<script type="text/javascript"> (function() { var css = document.createElement("link"); css.href = "https://use.fontawesome.com/releases/v5.1.0/css/all.css"; css.rel = "stylesheet"; css.type = "text/css"; document.getElementsByTagName("head")[0].appendChild(css); })(); </script>

    <?php include '../enlaces_sc/enlaces.php'; ?>
    <title> Computadores </title>
</head>

<body style="padding-bottom: 20px">
    <?php include '../menu/menu.php';     ?>

    <div class="container-fluid">
        <div class="titulos">
            <h1>Computadores</h1>
        </div>

        <?php
        if (isset($_POST['submit']) == false) {
            $contenedor_estado = '1';
        } else {
            $contenedor_estado = $_POST['estado_computador'];
        }
        ?>


        <div class="row tipo">
                <div class="col-md-2">
                    <a class="btn btn-primary" href="./crear-computadores.php"> Agregar </a>
                </div>

                <div class="col-md-10" style="text-align: right;">
                    <div style="display: inline-block; margin:0.3em;">
                        <label for="">Activos</label>

                        <?php if ($estados == 1) { ?>

                            <input name="estado_computador" value='1' checked type="radio" aria-label="Radio button for following text input">

                        <?php } else { ?>

                            <input name="estado_computador" value='1' onclick="validar(1)" type="radio" aria-label="Radio button for following text input">

                        <?php } ?>
                    </div>
                    <div style="display: inline-block; margin:0.3em;">
                        <label for="">Inactivos</label>

                        <?php if ($estados == 0) { ?>

                            <input name="estado_computador" value='0' checked type="radio" aria-label="Radio button for following text input">

                        <?php } else { ?>

                            <input name="estado_computador" value='0' onclick="validar(0)" type="radio" aria-label="Radio button for following text input">

                        <?php } ?>
                    </div>

                    <div style="display: inline-block; margin:0.3em;">
                        <label for="">Retirados</label>

                        <?php if ($estados == 2) { ?>

                            <input name="estado_computador"  checked type="radio" aria-label="Radio button for following text input">

                        <?php } else { ?>

                            <input name="estado_computador"  onclick="validar(2)" type="radio" aria-label="Radio button for following text input">

                        <?php } ?>
                    </div>

                    <div style="display: inline-block; margin:0.3em;">
                        <label for="">Todos</label>

                        <?php if ($estados == 3) { ?>

                            <input name="estado_computador" value='3' checked type="radio" aria-label="Radio button for following text input">

                        <?php } else { ?>

                            <input name="estado_computador" value='3' onclick="validar(3)" type="radio" aria-label="Radio button for following text input">

                        <?php } ?>
                    </div>                    

                </div>


            </div>

        <div class="container-fluid">
            <table id="example2" class="table display compact table-bordered"  cellpadding='0' $().DataTable();. style="width: 100%; margin-top: 20px;">
                <thead style='color:black; background-color: lightblue'>
                    <th class="text-center" >Id</th>
                    <th class="text-center" >Activo Fijo</th>
                    <th class="text-center" >Area</th>
                    <th class="text-center" >Localización</th>
                    <th class="text-center" >Marca</th>
                    <th class="text-center" >Modelo</th>
                    <th class="text-center" >Procesador</th>
                    <th class="text-center" >RAM</th>
                    <th class="text-center" >Disco Duro</th>
                    <th class="text-center">Estado</th>
                    <th class="text-center">Ver</th>
                    <?php if ($perfil == 3) { ?>
                    <th class="text-center">Traslado</th>
                    <th class="text-center" style="background-color:#b1ffb12e;">Editar</th>
                    <?php } ?>

                </thead>
                <tbody>
                    <?php

                    $sql = "SELECT ft_computador.id, activos_fijos.activo_fijo, ft_computador.marca, area.nombre, localizaciones.localizacion, ft_computador.modelo, ft_computador.velocidad_procesador, 
                                ft_computador.ram1_cant, ft_computador.disco_duro_1, ft_computador.estado FROM ft_computador LEFT JOIN activos_fijos ON ft_computador.id_activo_fijo = activos_fijos.id 
                                LEFT JOIN localizaciones ON activos_fijos.id_localizacion = localizaciones.id LEFT JOIN area ON localizaciones.id_area = area.id ";
                    
                    
                    switch($estados) {
                        case 3:
                            // todos
                            break;
                        case 0:
                                // inactivos
                            $sql = $sql . "WHERE ft_computador.estado = '0'";
                            break;
                        case 1;
                            // activos
                            $sql = $sql . "WHERE ft_computador.estado = '1'";
                            break;
                       
                        case 2;
                            // retirados
                            $sql = $sql . "WHERE ft_computador.estado = '2'";
                            break;
                    }

                    $query = mysqli_query($link, $sql) or die(mysqli_error($link));
                    while ($f = mysqli_fetch_array($query)) {     ?>
                        <tr>
                            <td><span><?php echo $f['id'] ?></span></td>
                            <td><?php echo $f['activo_fijo'] ?></td>
                            <td><?php echo $f['nombre'] ?></td>
                            <td><?php echo $f['localizacion'] ?></td>
                            <td><?php echo $f['marca'] ?></td>
                            <td><?php echo $f['modelo'] ?></td>
                            <td><?php echo $f['velocidad_procesador'] ?></td>
                            <td><?php echo $f['ram1_cant'] ?></td>
                            <td><?php echo $f['disco_duro_1'] ?></td>

                                <td class="text-center" style="vertical-align: middle;">
                                <?php if ($f['estado'] == 1) {?>
                                                    <i  class="fas fa-power-off" style="color:white;background-color:#0f7e55;font-size:15px;padding:10px;border-radius:20px"></i>
                                                    <?php   } else 
                                      if($f['estado']== 0) { ?>
                                                        <i  class="fas fa-power-off" style="color:white;background-color:gray;font-size:18px;padding:9px;border-radius:50%"></i>
                                                    <?php } else {?>
                                                        <i  class="fas fa-times-circle" style="color:white;background-color:#e31f11;font-size:18px;padding:9px;border-radius:50%"></i>
                                                    <?php } ?>
                                </td>

                                <td class="text-center" style="vertical-align: middle;">
                                    <a class="btn btn-secondary btn-sm" type="button" href="ficha-tecnica-computador.php?id=<?php echo $f['id'] ?>" style="font-size: 17px;border-radius:8px 3px;"><i class="fas fa-search"></i></a>
                                </td>

                                <?php if ($perfil == 3) { ?>

                                <td class="text-center" style="vertical-align: middle;"><a type="button" class="btn  btn-sm" style="font-size: 17px;border-radius: 8px 3px;color: white; background-color: blueviolet;" href="javascript:void(0);" onclick="cargar_ajax1('modal_ooo', 'modal_actualizar_localizacion.php?id=<?= $f['id'] ?>');" data-toggle="modal" data-target="#modal_ooo" />
                                    <i class="fas fa-random"></i>
                                </td>

                                <td class="text-center" style="vertical-align: middle;">
                                    <a class="btn btn-primary btn-sm" type="button" href="editar-computador.php?id=<?php echo $f['id'] ?>" style="font-size: 17px;border-radius:8px 3px;"><i class="fas fa-edit"></i></a>
                                </td>

                            <?php } ?>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>

<!---------------------------------------------------------------- INICIO MODAL CREAR LOCACLIZACION ---------------------------------------------------------------->
<div class="modal fade" id="modal-id">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Localizacion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="registro-localizacion.php" method="post">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">campo1:</label>
                        <input type="text" class="form-control" id="recipient-name">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">campo2:</label>
                        <textarea class="form-control" id="message-text"></textarea>
                    </div>
                    <input type="hidden" value="<?php echo $_SESSION['id']; ?>" name="id">
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
            </div>
        </div>
    </div>

</div>
<!----------------------------------------------------------------- FIN MODAL CREAR TIPO_ACTIVO ----------------------------------------------------------------->



<script>
    $(document).ready(function() {
        $('#example2').DataTable({
            "order": [
                [0, "asc"]
            ]
        });
    });
</script>

<!-- Modal para cambiar la localizacion de un activo fijo de un computador -->
<script type="text/javascript">
    function cargar_ajax1(div, url) {

        $.post(
            url,
            function(resp) {
                $("#" + div + "").html(resp);
            }
        );
    }
</script>


<!-- Alerta para dar de baja a un computador -->
<!-- <script>
    function mensaje_desactivar(id_pc) {

        Swal.fire({
            title: 'Dar de Baja',
            text: "Justifique el motivo",
            icon: 'question',
            input: 'text',
            showCancelButton: true,
            cancelButtonText: 'No',
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si'
        }).then((result) => {

            if (result.isConfirmed, result.value) {

                window.location = "cambiar_estado.php?id=" + id_pc + "&justificacion=" + result.value;

            } else if (result.value === "") {
                Swal.fire({
                    icon: 'error',
                    title: 'Debe escribir el motivo',
                    confirmButtonText: `Aceptar`,
                }).then((result) => {
                    return false;
                })

            } else {
                return false;
            }
        })

    }
</script> -->

<!-- <script>
    function mensaje_activar(id_pc) {

        Swal.fire({
            title: '¿Habilitar  Teclado <br>'+id_pc +'?',
            icon: 'question',
            //input: 'text',
            showCancelButton: true,
            cancelButtonText: 'No',
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si'
        }).then((result) => {

            if (result.isConfirmed, result.value) {

                window.location = "activar_computador.php?id=" + id_pc;

            } else if (result.value === "") {
                Swal.fire({
                    icon: 'error',
                    title: 'Debe escribir el motivo',
                    confirmButtonText: `Aceptar`,
                }).then((result) => {
                    return false;
                })

            } else {
                return false;
            }
        })

    }
</script>
 -->







<!-- Inicio Modal Actualizar Localizacion -->
<div class="modal fade" id="modal_ooo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"> ... </h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
            </div>
        </div>
    </div>
</div>
<!-- Fin Modal Actuaizar Localizacion -->


<script>

function validar(estados){
    window.location = "ver-computadores.php?estados="+estados;
}
</script>