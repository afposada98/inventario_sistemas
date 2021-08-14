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
    <title> Catálogo </title>
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
    <div style="margin-left:3em; margin-right: 3em; margin-bottom: 7em;">
        <div class="titulos">
            <h1>Catálogo</h1>
        </div>



        <div class="row" style="margin-bottom:15px;margin-top:15px;">
                <div class="col-md-2">
                <a data-toggle="modal" class="btn btn-primary" href='#registro'> Agregar </a>
                </div>  

        </div>

                <?php 
                   $sql = "SELECT catalogo.*, lineas_producto.descripcion as linea FROM catalogo INNER JOIN lineas_producto ON 
                   lineas_producto.id_linea=catalogo.id_linea";
            

                $query = mysqli_query($link, $sql) or die(mysqli_error($link));
           ?>
        

        <div class="contenedor-tabla">
            <table id="example2" class="table display compact table-bordered"  cellpadding='0' $().DataTable();. style="width: 100%;">
                <thead style='color:black; background-color: lightblue'>
                    <th class="text-center" >Id</th>
                    <th class="text-center" >Línea Producto</th>
                    <th class="text-center" >Descripción</th>
                    <th class="text-center" >Referencia</th>
                    <th class="text-center" >Iva</th>
                    <th class="text-center" >Estado</th>
                    <?php if ($perfil != 1) { ?>
                        <th class="text-center" >Editar</th>
                    <?php } ?>
                </thead>
                <tbody>
                    <?php
                 
                    while ($f = mysqli_fetch_array($query)) { ?>
                        <tr>
                            <td class="orden-dato"><span><?php echo $f['id_catalogo'] ?></span></td>
                            <td class="orden-dato"><?php echo $f['linea'] ?></td>
                            <td class="orden-dato"><?php echo $f['descripcion'] ?></td>
                            <td class="orden-dato"><?php echo $f['referencia'] ?></td>
                            <td class="orden-dato"><?php echo $f['porc_iva'] ?></td>

                            <td class="text-center" style="vertical-align: middle;">
                                <?php if ($f['estado'] == 1) {?>
                                                    <i  class="fas fa-power-off" style="color:white;background-color:#0f7e55;font-size:15px;padding:10px;border-radius:20px"></i>
                                                    <?php   } else {?>
                                                        <i  class="fas fa-times-circle" style="color:white;background-color:#e31f11;font-size:18px;padding:9px;border-radius:50%"></i>
                                                    <?php } ?>
                                </td>
                                <?php if ($perfil != 1) { ?> 
                                <td class="text-center"> <a href="javascript:void(0);" type="button"
                                onclick="cargar_ajax1('modal_ooo', 'modal_modificar_catalogo.php?id=<?= $f['id_catalogo'] ?>');" title="Modificar Catálogo" style="font-size: 18px;border-radius:5px 15px 15px;"
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

<!---------------------------------------------------------------- INICIO MODAL CREAR CATALOGO ---------------------------------------------------------------->
<div class="modal fade" id="registro">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Catálogo</h5>

            </div>
            <div class="modal-body">
                <form class="row" action="crear_catalogo.php" method="POST">                   
                    
                    <div class="form-group col-12">
                        <label for="recipient-name" class="descripcion">Línea</label>

                            <select class="form-select" id="linea" name="linea">
                                <?php

                                $sql = "SELECT id_linea,descripcion FROM lineas_producto WHERE estado=1 ORDER BY descripcion ASC";
                                $query = mysqli_query($link, $sql) or die("Error: " . mysqli_error($link));

                                while ($fila = mysqli_fetch_array($query)) { ?>
                                        <option required value="<?php echo $fila['id_linea']; ?>" ><?php echo $fila['descripcion'] ?></option>                                  
                                <?php  } ?>
                            </select>
                    </div>

                    <div class="form-group col-md-12">
                        <label for="" class="descripcion">Descripción </label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="" class="descripcion">Referencia </label>
                        <input type="text" class="form-control" id="referencia" name="referencia">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="" class="descripcion">Iva </label>
                        <input type="number" class="form-control" id="iva" name="iva" step="0.01" >
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Agregar</button>
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


<!-- Inicio Modal Editar Catálogo -->
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


