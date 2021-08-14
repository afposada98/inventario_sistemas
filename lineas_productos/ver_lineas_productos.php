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
    <title> Líneas de Productos </title>
</head>

<body >
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
            <h1>Líneas de Productos</h1>
        </div>
        
        <div class="row" style="margin-bottom:15px;margin-top:15px;">
                <div class="col-md-2">
                <a data-toggle="modal" class="btn btn-primary" href='#registro'> Agregar </a>
                </div>  

        </div>

                <?php 
                   $sql = "SELECT lineas_producto.*, clases.clase FROM lineas_producto INNER JOIN clases ON 
                   clases.id_clase=lineas_producto.id_clase";
            

           $query = mysqli_query($link, $sql) or die(mysqli_error($link));
           ?>
        

        <div class="contenedor-tabla">
            <table id="example2" class="table display compact table-bordered"  cellpadding='0' $().DataTable();. style="width: 100%;">
                <thead style='color:black; background-color: lightblue'>
                    <th class="text-center" >Id</th>
                    <th class="text-center" >Clase</th>
                    <th class="text-center" >Descripción</th>
                    <th class="text-center" >Estado</th>
                    <?php if ($perfil != 1) { ?>
                        <th class="text-center" >Editar</th>
                    <?php } ?>
                </thead>
                <tbody>
                    <?php
                 
                    while ($f = mysqli_fetch_array($query)) { ?>
                        <tr>
                            <td class="orden-dato"><span><?php echo $f['id_linea'] ?></span></td>
                            <td class="orden-dato"><?php echo $f['clase'] ?></td>
                            <td class="orden-dato"><?php echo $f['descripcion'] ?></td>
                            <td class="text-center" style="vertical-align: middle;">
                                <?php if ($f['estado'] == 1) {?>
                                                    <i  class="fas fa-power-off" style="color:white;background-color:#0f7e55;font-size:15px;padding:10px;border-radius:20px"></i>
                                                    <?php   } else {?>
                                                        <i  class="fas fa-times-circle" style="color:white;background-color:#e31f11;font-size:18px;padding:9px;border-radius:50%"></i>
                                                    <?php } ?>
                                </td>
                                <?php if ($perfil != 1) { ?> 
                                <td class="text-center"> <a href="javascript:void(0);" type="button"
                                onclick="cargar_ajax1('modal_ooo', 'modal_modificar_linea.php?id=<?= $f['id_linea'] ?>');" title="Modificar Línea" style="font-size: 18px;border-radius:5px 15px 15px;"
                                data-toggle="modal" data-target="#modal_ooo"class="btn btn-primary btn-sm"> <i class="fas fa-edit"></i>                               
                                </td>

                            <?php } ?>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
</body>

</html>

<!---------------------------------------------------------------- INICIO MODAL CREAR LOCACLIZACION ---------------------------------------------------------------->
<div class="modal fade" id="registro">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Línea de Producto</h5>

            </div>
            <div class="modal-body">
                <form class="row g-3" action="crear_linea_producto.php" method="POST">                   
                    
                    <div class="col-12">
                        <label for="recipient-name" class="col-form-label">Clase</label>

                            <select class="form-select" id="clase" name="clase">
                                <?php

                                $sql = "SELECT id_clase,clase FROM clases WHERE estado=1 ORDER BY clase ASC";
                                $query = mysqli_query($link, $sql) or die("Error: " . mysqli_error($link));

                                while ($fila = mysqli_fetch_array($query)) { ?>
                                        <option required value="<?php echo $fila['id_clase']; ?>" ><?php echo $fila['clase'] ?></option>                                  
                                <?php  } ?>
                            </select>

                    </div>

                    <div class="col-md-12">
                        <label for="" class="form-label" style="margin-top:5px;">Descripción </label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion" required>
                    </div>


                    <div class="modal-footer">
                        <button type="submit"  class="btn btn-primary">Agregar</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>

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