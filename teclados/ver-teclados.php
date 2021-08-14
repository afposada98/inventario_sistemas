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

<?php include '../enlaces_sc/enlaces.php'; ?>
    <title> Teclados </title>
</head>

<body style="padding-bottom: 20px">
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
            <h1>Teclados</h1>
        </div>

        <div class="row tipo">
                <div class="col-md-2">
                    <a class="btn btn-primary" href="./crear-teclado.php"> Agregar </a>
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


        <div class="container">
            <table id="example2" class="table display compact table-bordered"  cellpadding='0' $().DataTable();. style="width: 100%; margin-top: 20px;">
                <thead style='color:black; background-color: lightblue'>
                    <th class="text-center">Id</th>
                    <th class="text-center">Activo Fijo</th>
                    <th class="text-center">Area</th>
                    <th class="text-center">Localización</th>
                    <th class="text-center">Marca</th>
                    <th class="text-center">Modelo</th>
                    <th class="text-center">Serie</th>
                    <th class="text-center">Tipo de conector</th>
                    <th class="text-center">Estado</th>
                    <th class="text-center" >Ver</th>
                    <?php if ($perfil != 1) { ?>
                        <th class="text-center" style="width: 110px">Traslado</th>
                        <th class="text-center" style="width:70px !important;">Editar</th>
                    <?php } ?>
                </thead>
                <tbody>
                    <?php

                    /* $sql = "SELECT ft_teclado.id, activos_fijos.activo_fijo, localizaciones.localizacion, ft_teclado.marca, ft_teclado.modelo, ft_teclado.serie, 
                            ft_teclado.tipo_conector, ft_teclado.estado FROM ft_teclado LEFT JOIN activos_fijos ON 
                            ft_teclado.id_activo_fijo = activos_fijos.id  LEFT JOIN localizaciones ON activos_fijos.id_localizacion = localizaciones.id "; */

                    $sql = "SELECT ft_teclado.id, activos_fijos.activo_fijo, area.nombre, localizaciones.localizacion, ft_teclado.marca, 
                            ft_teclado.modelo, ft_teclado.serie, ft_teclado.tipo_conector, ft_teclado.estado FROM ft_teclado 
                            LEFT JOIN activos_fijos ON ft_teclado.id_activo_fijo = activos_fijos.id LEFT JOIN localizaciones 
                            ON activos_fijos.id_localizacion = localizaciones.id LEFT JOIN area ON localizaciones.id_area = area.id ";
                    switch($estados) {
                        case 3:
                            // todos
                            break;
                        case 0:
                                // inactivos
                            $sql = $sql . "WHERE ft_teclado.estado = '0'";
                            break;
                        case 1;
                            // activos
                            $sql = $sql . "WHERE ft_teclado.estado = '1'";
                            break;
                       
                        case 2;
                            // retirados
                            $sql = $sql . "WHERE ft_teclado.estado = '2'";
                            break;
                    }

                    $query = mysqli_query($link, $sql) or die(mysqli_error($link));
                    while ($f = mysqli_fetch_array($query)) {    ?>
                        <tr>
                            <td class="orden-dato"><span><?php echo $f['id'] ?></span></td>
                            <td class="orden-dato"><?php echo $f['activo_fijo'] ?> </td>
                            <td class="orden-dato"><?php echo $f['nombre'] ?></td>
                            <td class="orden-dato"><?php echo $f['localizacion'] ?></td>
                            <td class="orden-dato"><?php echo $f['marca'] ?></td>
                            <td class="orden-dato"><?php echo $f['modelo'] ?></td>
                            <td class="orden-dato"><?php echo $f['serie'] ?></td>
                            <td class="orden-dato"><?php echo $f['tipo_conector'] ?></td>
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
                                    <a class="btn btn-secondary btn-sm" type="button" href="ficha-tecnica-teclado.php?id=<?php echo $f['id'] ?>" style="font-size: 17px;border-radius:8px 3px;"><i class="fas fa-search"></i></a>
                                </td>


                                <?php if ($perfil != 1) { ?>
                              

                                <td class="text-center" style="vertical-align: middle;"><a type="button" class="btn  btn-sm" style="font-size: 17px;border-radius: 8px 3px;color: white; background-color: blueviolet;" href="javascript:void(0);" onclick="cargar_ajax1('modal_ooo', 'modal_actualizar_localizacion.php?id=<?= $f['id'] ?>');" data-toggle="modal" data-target="#modal_ooo" />
                                    <i class="fas fa-random"></i>
                                </td>

                                <td class="text-center" style="vertical-align: middle;">
                                <a class="btn btn-primary btn-sm" type="button" href="editar-teclado.php?id=<?php echo $f['id'] ?>" style="font-size: 17px;border-radius:8px 3px;"><i class="fas fa-edit"></i></a>
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


<!-- Alerta para dar de baja a un computador -->
<script>
    function mensaje_desactivar(id_teclado) {

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

                window.location = "desactivar-teclado.php?id=" + id_teclado + "&justificacion=" + result.value;

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

function ConfirmActive(id) {
    Swal.fire({
      title: '¿Habilitar  Teclado <br>'+id+'?',
      icon: 'warning',
      showCancelButton: true,
      cancelButtonText: 'No',
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location = "activar_teclado.php?id="+id; 
      } else {       
        swal.showInputError("No se pudo habilitar");
        return false;
      }
    })
  }
</script>




<script type="text/javascript">
    function cargar_ajax1(div, url) {

        $.post(
            url,
            function(resp) {
                $("#" + div + "").html(resp);
            }
        );
    }


    
function validar(estados){
    window.location = "ver-teclados.php?estados="+estados;
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


