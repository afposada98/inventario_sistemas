<?php
session_start();
include '../base_datos/seguridad.php';
include '../base_datos/conexion_inventario.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>
<?php include '../enlaces_sc/enlaces.php'; ?>
    <title> Tipo de activos </title>
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
            <h1>Tipo de Activos</h1>
        </div>

        <div class="col">
            <a data-toggle="modal" class="btn btn-primary" href='#registro' style="margin:8px;"> Agregar </a>
        </div>

            <!-- table table-striped table-bordered tablaSolicitud -->
            <table id="example2" class="table display compact table-bordered" cellpadding='0' $().DataTable();. style="width: 100%;">
                <thead style='color:black; background-color: lightblue'>
                    <th class="text-center" >Id</th>
                    <th class="text-center">Tipo de activo</th>
                    <th class="text-center" >Maneja IP</th>
                    <th class="text-center" >Estado</th>
                    <?php if ($perfil != 1) { ?>
                        <th class="text-center" >Opciones</th>
                    <?php } ?>
                </thead>
                <tbody>
                    <?php
                    //$Sql =mysqli_query($link, "select * from solicitudes Where estado = 'Sin realizar' AND id_estado = 0 ORDER BY solicitudes.id_solicitud and usuario='$_SESSION[usuario]'");
                    $sql = "SELECT * FROM tipo_activo";
                    $query = mysqli_query($link, $sql) or die(mysqli_error($link));
                    while ($f = mysqli_fetch_array($query)) {     ?>
                        <tr>
                            <td><span><?php echo $f['id'] ?></span></td>
                            <td><?php echo $f['tipo_activo'] ?></td>
                            <td><?php if($f['maneja_ip']==1){
                                echo "SI";
                            }else {
                                echo "NO";
                            } ?>                            
                            </td>
                            <td class="text-center">
                            <?php if ($f['estado'] == '1') { ?>
                                    <i class="fas fa-power-off" style="color:white;background-color:#0f7e55;font-size:15px;padding:10px;border-radius:20px"></i>
                                <?php   } else { ?>
                                    <i class="fas fa-power-off" style="color:white;background-color:gray;font-size:18px;padding:9px;border-radius:50%"></i>
                                <?php } ?>
                            
                            </td>
                            <?php if ($perfil != 1) { ?>

                                <td>
                                
                                </td>                                

                                <?php } ?>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

            <?php //include '../footer.html'; 
            ?>
    </div>
</body>

</html>

<!---------------------------------------------------------------- INICIO MODAL CREAR  ---------------------------------------------------------------->
<div class="modal fade" id="registro">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Tipo de Activo Fijo</h5>

            </div>
            <div class="modal-body">
                <form class="row g-3" action="crear-tipo-activo.php" method="POST">
                    <div class="col-md-6">
                        <label for="" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre">
                    </div>

                    <div class="col-6">
                        <label for="" class="form-label">Estado</label>
                        <select id="estado" name="estado" class="form-select">
                            <option value="1" selected>Activo</option>
                            <option value="2">Inactivo</option>
                        </select>
                    </div>


                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Agregar</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

</div>

<!----------------------------------------------------------------- FIN MODAL CREAR  ----------------------------------------------------------------->

