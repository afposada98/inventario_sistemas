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
    <title> Monitores </title>
</head>

<body style="margin-bottom: 20px;">
    <?php include '../menu/menu.php';     ?>
    <script>
        $(document).ready(function() {
            $('#example2').DataTable({
                "order": [
                    [0, "asc"]
                ]
            });
        });
    </script>
    <div class="container">
        <div class="titulos">
            <h1>Monitores</h1>
        </div>

        <div class="row tipo">
                <div class="col-md-2">
                    <a class="btn btn-primary" href="./crear-monitores.php"> Agregar </a>
                </div>

                <div class="col-md-10" style="text-align: right;">
                    <div style="display: inline-block; margin:0.3em;">
                        <label for="">Activos</label>

                        <?php if ($estados == 1) { ?>

                            <input value='1' checked type="radio" aria-label="Radio button for following text input">

                        <?php } else { ?>

                            <input  value='1' onclick="validar(1)" type="radio" aria-label="Radio button for following text input">

                        <?php } ?>
                    </div>
                    <div style="display: inline-block; margin:0.3em;">
                        <label for="">Inactivos</label>

                        <?php if ($estados == 0) { ?>

                            <input  value='0' checked type="radio" aria-label="Radio button for following text input">

                        <?php } else { ?>

                            <input  value='0' onclick="validar(0)" type="radio" aria-label="Radio button for following text input">

                        <?php } ?>
                    </div>

                    <div style="display: inline-block; margin:0.3em;">
                        <label for="">Retirados</label>

                        <?php if ($estados == 2) { ?>

                            <input  checked type="radio" aria-label="Radio button for following text input">

                        <?php } else { ?>

                            <input  onclick="validar(2)" type="radio" aria-label="Radio button for following text input">

                        <?php } ?>
                    </div>

                    <div style="display: inline-block; margin:0.3em;">
                        <label for="">Todos</label>

                        <?php if ($estados == 3) { ?>

                            <input value='3' checked type="radio" aria-label="Radio button for following text input">

                        <?php } else { ?>

                            <input value='3' onclick="validar(3)" type="radio" aria-label="Radio button for following text input">

                        <?php } ?>
                    </div>                    

                </div>


            </div>

                <?php 
                   $sql = "SELECT ft_monitor.id, activos_fijos.activo_fijo,  area.nombre, localizaciones.localizacion, ft_monitor.marca, ft_monitor.modelo, ft_monitor.tipo_pantalla, 
                   ft_monitor.tamaño, ft_monitor.resolucion, ft_monitor.serie, ft_monitor.estado FROM ft_monitor LEFT JOIN activos_fijos ON 
                   ft_monitor.id_activo_fijo = activos_fijos.id LEFT JOIN localizaciones ON activos_fijos.id_localizacion = localizaciones.id LEFT JOIN area ON localizaciones.id_area = area.id ";

               switch($estados) {
                        case 3:
                            // todos
                            break;
                        case 0:
                                // inactivos
                            $sql = $sql . "WHERE ft_monitor.estado = '0'";
                            break;
                        case 1;
                            // activos
                            $sql = $sql . "WHERE ft_monitor.estado = '1'";
                            break;
                       
                        case 2;
                            // retirados
                            $sql = $sql . "WHERE ft_monitor.estado = '2'";
                            break;
                    }

           $query = mysqli_query($link, $sql) or die(mysqli_error($link));
           ?>
        

        <div class="container">
            <table id="example2" class="table display compact table-bordered"  cellpadding='0' $().DataTable();. style="width: 100%;">
                <thead style='color:black; background-color: lightblue'>
                    <th class="text-center">Id</th>
                    <th class="text-center">Activo Fijo</th>
                    <th class="text-center">Area</th>
                    <th class="text-center">Localización</th>
                    <th class="text-center">Marca</th>
                    <th class="text-center">Modelo</th>
                    <th class="text-center">Tamaño</th>
                    <th class="text-center">Resolución</th>
                    <th class="text-center">Estado</th>
                    <th class="text-center">Ver</th>
                    <?php if ($perfil == 3) { ?>
                    <th class="text-center">Traslado</th>
                        <th class="text-center" >Editar</th>
                    <?php } ?>
                </thead>
                <tbody>
                    <?php
                 
                    while ($f = mysqli_fetch_array($query)) { ?>
                        <tr>
                            <td class="orden-dato"><span><?php echo $f['id'] ?></span></td>
                            <td class="orden-dato"> <?php echo $f['activo_fijo'] ?> </td>
                            <td class="orden-dato"><?php echo $f['nombre'] ?></td>
                            <td class="orden-dato"> <?php echo $f['localizacion'] ?></td>
                            <td class="orden-dato"><?php echo $f['marca'] ?></td>
                            <td class="orden-dato"><?php echo $f['modelo'] ?></td>
                            <td class="orden-dato"><?php echo $f['tamaño'] ?></td>
                            <td class="orden-dato"><?php echo $f['resolucion'] ?></td>
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
                                    <a class="btn btn-secondary btn-sm" type="button" href="ficha-tecnica-monitor.php?id=<?php echo $f['id'] ?>" style="font-size: 17px;border-radius:8px 3px;"><i class="fas fa-search"></i></a>
                                </td>

                                <?php if ($perfil == 3) { ?>


                                <td class="text-center" style="vertical-align: middle;"><a type="button" class="btn  btn-sm" style="font-size: 17px;border-radius: 8px 3px;color: white; background-color: blueviolet;" href="javascript:void(0);" onclick="cargar_ajax1('modal_ooo', 'modal_actualizar_localizacion.php?id=<?= $f['id'] ?>');" data-toggle="modal" data-target="#modal_ooo" />
                                    <i class="fas fa-random"></i>
                                </td>

                                <td class="text-center" style="vertical-align: middle;">
                                <a class="btn btn-primary btn-sm" type="button" href="editar-monitor.php?id=<?php echo $f['id'] ?>" style="font-size: 17px;border-radius:8px 3px;"><i class="fas fa-edit"></i></a>
                                </td>

                            <?php } ?>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
</body>

</html>

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
    window.location = "ver-monitor.php?estados="+estados;
}
</script>