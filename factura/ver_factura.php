   


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
    <title> Facturas </title>
</head>

<body style="margin-bottom: 20px;" >
    <?php include '../menu/menu.php';     ?>
    <script>
        $(document).ready(function() {
            $('#example2').DataTable({
                "order": [
                    [0, "asc"]
                ],
                "processing": true,
                "serverSide": true,                    

                "ajax": "../serverside/getData.php", 
                "columnDefs": [{
                        "width": "15%",
                        "targets": -1,
                        "defaultContent": "<div class='text-center'><button title='Ver Detalle Factura' class='btn btnVer' style='background-color:cornflowerblue;color:white;padding:7px;'> <i class='fas fa-search'></i></button> <?php if ($perfil == 3) { ?> <button title='Modificar Factura' class='btn  btnEditar' style='background-color:teal;color:white;padding:7px;'> <i class='fas fa-pencil-alt'></i> <?php } ?> </div>"
                    }],
            });
        });
    </script>
    <div class="container">
        <div class="titulos">
            <h1>Facturas</h1>
        </div>



        <div class="row informacion">
                <div class="col-md-2">
                <a class="btn btn-primary" href="./crear_factura.php"> Agregar </a>
                </div> 
        </div>

                <?php 
                   $sql = "SELECT factura1.*, proveedores.nombre FROM factura1 INNER JOIN proveedores ON 
                   proveedores.id=factura1.id_proveedor";
            

           $query = mysqli_query($link, $sql) or die(mysqli_error($link));
           ?>
        

        <div class="contenedor-tabla">
            <table id="example2" class="table display compact table-bordered"  cellpadding='0' $().DataTable();. style="width: 100%;">
                <thead style='color:black; background-color: lightblue'>
                    <th class="text-center" >Id</th>
                    <th class="text-center" >Código</th>
                    <th class="text-center" >Proveedor</th>
                    <th class="text-center" >Fecha Factura</th>
                    <th class="text-center" >Opciones</th>                   
                </thead>
                <!-- <tbody>
                    < ?php
                 
                    while ($f = mysqli_fetch_array($query)) { ?>
                        <tr>
                            <td class="orden-dato"><span>< ?php echo $f['id_factura'] ?></span></td>
                            <td class="orden-dato">< ?php echo $f['factura'] ?></td>
                            <td class="orden-dato">< ?php echo $f['nombre'] ?></td>
                            <td class="orden-dato">< ?php echo $f['f_factura'] ?></td>
                            <td class="text-center" style="vertical-align: middle;">
                                < ?php if ($f['estado'] == 1) {?>
                                                    <i  class="fas fa-check" style="color:green;background-color:white;font-size:22px;padding:10px;border-radius:20px"></i>
                                                    < ?php   } else {?>
                                                        <i  class="fas fa-exclamation-triangle" style="color:#DF4E18;background-color:white;font-size:22px;padding:9px;border-radius:50%"></i>
                                                    < ?php } ?>
                                </td>
                                <td class="text-center" style="vertical-align: middle;">
                                <a type="button" class="btn btn-secondary btn-sm" style="font-size: 18px;border-radius:5px 15px 15px;"
                                title="Ver Factura" href="ver_detalle_factura.php?id=< ?php echo $f['id_factura'];?>"><i class="fas fa-search-plus"></i></a>
                                </td>
                                < ?php if ($perfil != 1) { ?> 
                                    <td class="text-center" style="vertical-align: middle;">
                                <a class="btn btn-primary btn-sm" type="button" title="Modificar Factura" href="editar_factura.php?id=< ?php echo $f['id_factura'] ?>" style="font-size: 17px;border-radius:8px 3px;"><i class="fas fa-edit"></i></a>
                                </td>

                            < ?php } ?>
                        </tr>
                    < ?php } ?>
                </tbody> -->
            </table>
        </div>
</body>

</html>

        <script>  //TRAE EL ID DEL REGISTRO SELECCIONADO PARA EDITARLO O VERLO COMPLETO
            $(document).on("click", ".btnEditar", function() {  //EDITAR
                id = parseInt($(this).closest('tr').find('td:eq(0)').text());
                window.location='editar_factura.php?id='+id;
            });

            $(document).on("click", ".btnVer", function(){  //CONSULTAR
                id=parseInt($(this).closest('tr').find('td:eq(0)').text());
                window.location='ver_detalle_factura.php?id='+id;
            }); 
        </script>



