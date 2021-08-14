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
    <title> Activos fijos </title>
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
            <h1>Activos Fijos</h1>
        </div>
        

        <div class="row tipo">
                <div class="col-md-2">
                <a data-toggle="modal" class="btn btn-primary" href='#registro'> Agregar </a>
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

            <div class="tabla-computadores">
            <table id="example2" class="table display compact table-bordered"  cellpadding='0' $().DataTable();. style="width: 100%;">
                <thead style='color:black; background-color: lightblue'>
                    <th class="text-center">Id</th>
                    <th class="text-center">Activo Fijo</th>
                    <th class="text-center">Tipo Activo</th>
                    <th class="text-center">Localizacion</th>
                    <th class="text-center">Area</th>
                    <th class="text-center">Estado</th>
                        <th class="text-center">Ficha</th>
                        <?php if ($perfil == 3) { ?>
                        <th class="text-center">Editar</th>
                    <?php } ?>
                </thead>
                <tbody>
                    <?php

                    $sql = "SELECT activos_fijos.id, activos_fijos.activo_fijo, tipo_activo.tipo_activo, tipo_activo.id AS tipo_id, localizaciones.localizacion, area.nombre as area, activos_fijos.estado 
                    FROM activos_fijos 
                    INNER JOIN tipo_activo ON activos_fijos.id_tipo_activo = tipo_activo.id  
                    INNER JOIN localizaciones ON activos_fijos.id_localizacion = localizaciones.id 
                    INNER JOIN area ON localizaciones.id_area = area.id ";

                  switch($estados) {
                        case 3:
                            // todos
                            break;
                        case 0:
                                // inactivos
                            $sql = $sql . "WHERE activos_fijos.estado = '0'";
                            break;
                        case 1;
                            // activos
                            $sql = $sql . "WHERE activos_fijos.estado = '1'";
                            break;
                       
                        case 2;
                            // retirados
                            $sql = $sql . "WHERE activos_fijos.estado = '2'";
                            break;
                    }

                    $query = mysqli_query($link, $sql) or die(mysqli_error($link));
                    while ($f = mysqli_fetch_array($query)) {     ?>
                        <tr>
                            <td style=""><span><?php echo $f['id'] ?></span></td>
                            <td style="text-align:left;"><?php echo $f['activo_fijo'] ?></td>
                            <td style="text-align:left;"><?php echo $f['tipo_activo'] ?></td>
                            <td style="text-align:left;"><?php echo $f['localizacion'] ?></td>
                            <td style="text-align:left;"><?php echo $f['area'] ?></td>
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
                                
                                <td class="text-center">
                                <?php if($f['tipo_id']==1){ ?>
                                <a type="button" class="btn btn-secondary btn-sm" style="font-size: 18px;border-radius:5px 15px 15px;" title="Ver Ficha Técnica" href="../computadores/ficha_tecnica_activo.php?id=<?php echo
                                                                                                                    $f['id'];?>"><i class="fas fa-search-plus"></i></a>
                              
                                <?php } if($f['tipo_id']==2){ ?>
                                    <a type="button" class="btn btn-secondary btn-sm" style="font-size: 18px;border-radius:5px 15px 15px;" title="Ver Ficha Técnica" href="../monitores/ficha_tecnica_activo.php?id=<?php echo
                                                                                                                    $f['id'];?>"><i class="fas fa-search-plus"></i></a>
                              
                                <?php } if($f['tipo_id']==3){ ?>
                                <a type="button" class="btn btn-secondary btn-sm" style="font-size: 18px;border-radius:5px 15px 15px;" title="Ver Ficha Técnica" href="../teclados/ficha_tecnica_activo.php?id=<?php echo
                                                                                                                    $f['id'];?>"><i class="fas fa-search-plus"></i></a>
                              
                                <?php }if($f['tipo_id']==4){ ?>
                                <a type="button" class="btn btn-secondary btn-sm" style="font-size: 18px;border-radius:5px 15px 15px;" title="Ver Ficha Técnica" href="../mouses/ficha_tecnica_activo.php?id=<?php echo
                                                                                                                    $f['id'];?>"><i class="fas fa-search-plus"></i></a>
                                <?php }if($f['tipo_id']==5){ ?>
                                <a type="button" class="btn btn-secondary btn-sm" style="font-size: 18px;border-radius:5px 15px 15px;" title="Ver Ficha Técnica" href="../impresoras/ficha_tecnica_activo.php?id=<?php echo
                                                                                                                    $f['id'];?>"><i class="fas fa-search-plus"></i></a>

                                <?php }if($f['tipo_id']==6){ ?>
                                <a type="button" class="btn btn-secondary btn-sm" style="font-size: 18px;border-radius:5px 15px 15px;" title="Ver Ficha Técnica" href="../tablets/ficha_tecnica_activo.php?id=<?php echo
                                                                                                                    $f['id'];?>"><i class="fas fa-search-plus"></i></a>

                                <?php }if($f['tipo_id']==7){ ?>
                                <a type="button" class="btn btn-secondary btn-sm" style="font-size: 18px;border-radius:5px 15px 15px;" title="Ver Ficha Técnica" href="../radio_enlaces/ficha_tecnica_activo.php?id=<?php echo
                                                                                                                    $f['id'];?>"><i class="fas fa-search-plus"></i></a>
                                                                                                                    
                              <?php }if($f['tipo_id']==11){ ?>
                                <a type="button" class="btn btn-secondary btn-sm" style="font-size: 18px;border-radius:5px 15px 15px;" title="Ver Ficha Técnica" href="../routers/ficha_tecnica_activo.php?id=<?php echo
                                                                                                                    $f['id'];?>"><i class="fas fa-search-plus"></i></a>
                              <?php } ?>
                                </td>
                           
                                <?php if ($perfil == 3) { ?>

                                <td class="text-center"> <a href="javascript:void(0);" type="button"
                                onclick="cargar_ajax1('modal_ooo', 'modal_actualizar_activo.php?id=<?= $f['id'] ?>');" title="Modificar Activo Fijo" style="font-size: 18px;border-radius:5px 15px 15px;"
                                data-toggle="modal" data-target="#modal_ooo"class="btn btn-primary btn-sm"> <i class="fas fa-edit"></i>
                               
                                </td>
                                <?php } ?>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            </div>


            <?php //include '../footer.php'; 
            ?>

    </div>
</body>

</html>

<!---------------------------------------------------------------- INICIO MODAL CREAR ACTIVO FIJO ---------------------------------------------------------------->
<div class="modal fade" id="registro">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear Activo Fijo</h5>

            </div>
            <div class="modal-body">
                <form action="registrar-activo-fijo.php" method="post">
                    <div class="form-group">
                        <label for="activo_fijo" class="col-form-label">Activo Fijo</label>
                        <input type="text" class="form-control" id="activo_fijo" name="activo_fijo" maxlength="19" required>
                    </div>
                    <div class="form-group">
                        <label for="tipo_activo" class="col-form-label">Tipo de Activo Fijo</label>

                        <select class="form-select" id="tipo_activo" name="tipo_activo">
                            <?php

                            $sql = "SELECT id, tipo_activo FROM tipo_activo ORDER BY tipo_activo ASC";
                            $query = mysqli_query($link, $sql) or die("Error: " . mysqli_error($link));

                            while ($fila = mysqli_fetch_array($query)) {
                                if ($nombre == $fila['tipo_activo']) { ?>
                                    <option required value="<?php echo $fila['id']; ?>" selected><?php echo $fila['tipo_activo'] ?></option>
                                <?php } else { ?>
                                    <option required value="<?php echo $fila['id']; ?>"><?php echo $fila['tipo_activo']; ?></option>
                                <?php  } ?>
                            <?php  } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="localizacion" class="col-form-label">Localización</label>
                        <select class="form-select" id="localizacion" name="localizacion">
                            <?php

                            $sql = "SELECT id, localizacion FROM localizaciones ORDER BY localizacion";
                            $query = mysqli_query($link, $sql) or die("Error: " . mysqli_error($link));

                            while ($fila = mysqli_fetch_array($query)) {
                                if ($nombre == $fila['localizacion']) { ?>
                                    <option required value="<?php echo $fila['id']; ?>" selected><?php echo $fila['localizacion'] ?></option>
                                <?php } else { ?>
                                    <option required value="<?php echo $fila['id']; ?>"><?php echo $fila['localizacion']; ?></option>
                                <?php  } ?>
                            <?php  } ?>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

</div>

<!----------------------------------------------------------------- FIN MODAL CREAR ----------------------------------------------------------------->


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
        window.location = "ver-activos-fijos.php?estados="+estados;
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
 <!--------------------- FIN MODAL EDITAR------->