<?php
session_start();
include '../base_datos/seguridad.php';
include '../base_datos/conexion_inventario.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>
<script type="text/javascript"> (function() { var css = document.createElement("link"); css.href = "https://use.fontawesome.com/releases/v5.1.0/css/all.css"; css.rel = "stylesheet"; css.type = "text/css"; document.getElementsByTagName("head")[0].appendChild(css); })(); </script>

<?php include '../enlaces_sc/enlaces.php'; ?>
    <title> Localicaciones </title>
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
    <div class="container" style="width:100%;">
        <div class="titulos">
            <h1>Localizaciones</h1>
        </div>


        <div class="col">
            <a data-toggle="modal" class="btn btn-primary" href='#registro' style="margin-bottom:10px;margin-top:10px;"> Agregar </a>
        </div>

        <div>
            <table id="example2" class="table display compact table-bordered" cellpadding='0' $().DataTable();>
                <thead style='color:black; background-color: lightblue'>
                    <th class="text-center">Id</th>
                    <th class="text-center">Area</th>
                    <th class="text-center">Localizacion</th>
                    <th class="text-center">Estado</th>
                    <?php if ($perfil != 1) { ?>
                        <th class="text-center">Editar</th>
                    <?php } ?>
                </thead>
                <tbody>
                    <?php
                    //$Sql =mysqli_query($link, "select * from solicitudes Where estado = 'Sin realizar' AND id_estado = 0 ORDER BY solicitudes.id_solicitud and usuario='$_SESSION[usuario]'");
                    $sql = "SELECT localizaciones.id, area.nombre, localizaciones.localizacion, localizaciones.estado, localizaciones.id FROM localizaciones INNER JOIN area ON localizaciones.id_area = area.id";
                    $query = mysqli_query($link, $sql) or die(mysqli_error($link));
                    while ($f = mysqli_fetch_array($query)) {     ?>
                        <tr>
                            <td style=""><span><?php echo $f['id'] ?></span></td>
                            <td style="text-align:left;"><?php echo $f['nombre'] ?></td>
                            <td style="text-align:left;"><?php echo $f['localizacion'] ?></td>
                            <td class="text-center">
                            <?php if ($f['estado'] == '1') { ?>
                                    <i class="fas fa-power-off" style="color:white;background-color:#0f7e55;font-size:15px;padding:10px;border-radius:20px"></i>
                                <?php   } else { ?>
                                    <i class="fas fa-power-off" style="color:white;background-color:gray;font-size:18px;padding:9px;border-radius:50%"></i>
                                <?php } ?>
                            </td>
                            <?php if ($perfil != 1) { ?>

                                <td class="text-center"> <a href="javascript:void(0);" type="button"
                                 onclick="cargar_ajax1('modal_ooo', 'modal_actualizar_location.php?id=<?= $f['id'] ?>');" title="Modificar Proveedor" style="font-size: 18px;border-radius:5px 15px 15px;"
                                  data-toggle="modal" data-target="#modal_ooo"class="btn btn-primary btn-sm"> <i class="fas fa-edit"></i>
                               
                                </td>
                                <?php } ?>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>


            <?php //include '../footer.html'; 
            ?>
</body>

</html>

<!---------------------------------------------------------------- INICIO MODAL CREAR LOCACLIZACION ---------------------------------------------------------------->
<div class="modal fade"  id="registro">

    <div class="modal-dialog">
        <div class="modal-content" style="width: 40rem;">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Localización</h5>

            </div>
            <div class="modal-body">
                <form class="row g-3" action="crear-localizacion.php" method="POST">                   
                    
                    <div class="col-12">
                        <label for="recipient-name" class="col-form-label">Area</label>

                            <select class="form-select" id="inputGroupSelect01" name="area">
                                <?php

                                $sql = "SELECT id, nombre FROM area";
                                $query = mysqli_query($link, $sql) or die("Error: " . mysqli_error($link));

                                while ($fila = mysqli_fetch_array($query)) {
                                    if ($nombre == $fila['nombre']) { ?>
                                        <option required value="<?php echo $fila['id']; ?>" selected><?php echo $fila['nombre'] ?></option>
                                    <?php } else { ?>
                                        <option required value="<?php echo $fila['id']; ?>"><?php echo $fila['nombre']; ?></option>
                                    <?php  } ?>
                                <?php  } ?>
                            </select>

                    </div>

                    <div class="col-md-12">
                        <label for="" class="form-label" style="margin-top:5px;">Localización </label>
                        <input type="text" class="form-control" id="localizacion" name="localizacion" required>
                    </div>


                    <div class="modal-footer">
                        <button type="submit" style="margin-top:15px;" class="btn btn-primary">Agregar</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

</div>
 
<!----------------------------------------------------------------- FIN MODAL CREAR  ----------------------------------------------------------------->

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
<!------------------------------------------ MODAL EDITAR ------------------>
<div class="modal" id="modal_ooo" tabindex="1" data-dismiss="modal" role="dialog" aria-labelledby="myModalLabel">
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


<!----- FIN -->


