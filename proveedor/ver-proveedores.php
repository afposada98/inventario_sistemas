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
    <title> Proveedores </title>
</head>

<body style="margin-bottom: 20px;">
    <?php include '../menu/menu.php'; 
    

    $sql = "SELECT * FROM proveedores ORDER BY id DESC";
    $query = mysqli_query($link, $sql) or die(mysqli_error($link));?>

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
            <h1>Proveedores</h1>
        </div>


        <!-- <div class="col-md-6">
        
        <a data-toggle="modal"  class="btn btn-primary" href='#modal-id'>Agregar localizacion</a>
        </div>-->
        <div class="col">
            <a data-toggle="modal" class="btn btn-primary" href='#registro' style="margin-top:10px;margin-bottom: 10px;"> Agregar </a>
        </div>
        <div>
            <!-- table table-striped table-bordered tablaSolicitud -->
            <table id="example2" class="table table-bordered table-striped" cellpadding='0' $().DataTable();. style="width: 100%; margin-top: 20px;">
                <thead style='color:black; background-color: lightblue'>
                    <th class="text-center" >Id</th>
                    <th class="text-center" >Nombre</th>
                    <th class="text-center" >Direccion</th>
                    <th class="text-center" >Celular</th>
                    <th class="text-center" >Contacto</th>
                    <th class="text-center" >Estado</th>
                    <?php if ($perfil != 1) { ?>
                        <th class="text-center" style="width:70px !important;">Opciones</th>
                    <?php } ?>
                </thead>
                <tbody>
                    <?php
                    //$Sql =mysqli_query($link, "select * from solicitudes Where estado = 'Sin realizar' AND id_estado = 0 ORDER BY solicitudes.id_solicitud and usuario='$_SESSION[usuario]'");
                  
                    while ($f = mysqli_fetch_array($query)) {     ?>
                        <tr>
                            <td style=""><span><?php echo $f['id'] ?></span></td>
                            <td style="text-align:left;"><?php echo $f['nombre'] ?></td>
                            <td style="text-align:left;"><?php echo $f['direccion'] ?></td>
                            <td style="text-align:left;"><?php echo $f['celular'] ?></td>
                            <td style="text-align:left;"><?php echo $f['contacto'] ?></td>
                            <td class="text-center"> <?php if ($f['estado'] == '1') {?>
                                                    <i  class="fas fa-power-off" style="color:white;background-color:#0f7e55;font-size:15px;padding:10px;border-radius:20px"></i>
                                                    <?php   } else { ?>
                                                        <i  class="fas fa-power-off" style="color:white;background-color:gray;font-size:18px;padding:9px;border-radius:50%"></i>
                                                    <?php } // 05744b  0fa18a
 ?></td>
                            <?php if ($perfil != 1) {
                                 ?>

                                <td style="text-align: center;">
                               
                            <a type="button" class="btn btn-primary btn-sm" title="Modificar Proveedor" style="font-size: 18px;" href="editar-proveedor.php?consecutivo=<?php echo
                                                                                                                    $f['id']; ?>"><i class="fas fa-edit"></i></a>
        
                        </td>
                        </tr>
                    <?php } }?>
                </tbody>
            </table>


            <?php //include '../footer.html'; 
            ?>
</body>

</html>

<!---------------------------------------------------------------- INICIO MODAL AGREGAR PROVEEDOR ---------------------------------------------------------------->
<div class="modal fade" id="registro">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Proveedor</h5>

            </div>
            <div class="modal-body">
                <form class="row g-3" action="crear-proveedor.php" method="POST">
                    <div class="col-md-12">
                        <label for="" class="form-label">Nombre </label>
                        <input type="text" class="form-control" id="nombre" name="nombre">
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-label">Dirección</label>
                        <input type="text" class="form-control" id="direccion" name="direccion" >
                    </div>
                    <div class="col-6">
                        <label for="" class="form-label">Celular</label>
                        <input type="text" class="form-control" id="celular" name="celular" >
                    </div>
                    <div class="col-6">
                        <label for="" class="form-label">Contacto</label>
                        <input type="text" class="form-control" id="contacto" name="contacto" >
                    </div>
                    <div class="col-6">
                        <label for="" class="form-label">Estado</label>
                        <select id="estado" name="estado" class="form-select">
                            <option value="1" selected>Activo</option>
                            <option value="2" >Inactivo</option>
                        </select>
                    </div>


                    <div class="modal-footer">
                        <button type="submit" style="margin-top:15px;" class="btn btn-primary">Agregar</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

</div>

<!----------------------------------------------------------------- FIN MODAL PROVEEDOR----------------------------------------------------------------->
