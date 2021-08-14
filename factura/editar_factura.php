<?php
session_start();
include '../base_datos/seguridad.php';
include '../base_datos/conexion_inventario.php';

$id_factura='';
if(isset($_REQUEST['id'])){
    $id_factura=$_REQUEST['id'];
}



$sql = "SELECT f.id_factura, f.factura, f.f_factura, f.id_proveedor, f.estado FROM factura1 AS f
WHERE id_factura = '$id_factura'";




$query = mysqli_query($link, $sql) or die(mysqli_error($link));
$ficha = mysqli_fetch_array($query);


?>

<!DOCTYPE html>
<html lang="es">

<head>
<LINK REL=StyleSheet HREF="style.css" TITLE="Contemporaneo">


<?php include '../enlaces_sc/enlaces.php'; ?>
    <title> Crear Factura </title>

    
</head>

<body style="padding-bottom: 20px">
    <?php include '../menu/menu.php';     ?>
  
    <div class="container">
        <div class="titulos">
            <div class="reedireccion"><a class="salida" href="./ver_factura.php">X</a>
            </div>
            <h1>Factura No. <?php echo $ficha['factura']; ?> </h1>
        </div>
        <div class="card edicion">

        <form action="editar2_factura.php" method="post" name="formulario" id="formulario">

        <div class="row informacion">

            <input type="hidden" value="<?php echo $ficha['id_factura']; ?>" name="id_factura">

            <div class="form-group col-md-4">
                <label class="descripcion" for="">Número Factura</label>
                <input type="" class="form-control" name="factura" value="<?php echo $ficha['factura']; ?>" placeholder="">
            </div>

            <div class="form-group col-md-4">
                <label class="descripcion" for="number">Proveedor</label>
                <select class="form-select" id="inputGroupSelect01" name="proveedor" required>
                    <?php

                    $sql = "SELECT id,nombre FROM proveedores WHERE estado=1 ORDER BY nombre ASC";
                    $query = mysqli_query($link, $sql) or die("Error: " . mysqli_error($link));

                    while ($fila = mysqli_fetch_array($query)) {
                        if($ficha['id_proveedor']==$fila['id']){ ?>
                            <option required value="<?php echo $fila['id']; ?>" selected ><?php echo $fila['nombre'] ?></option>
                    <?php  } else { ?>
                        <option required value="<?php echo $fila['id']; ?>" ><?php echo $fila['nombre'] ?></option>
                    <?php } } ?>

                </select>
            </div>
          

            <div class="form-group col-md-4">
                <label class="descripcion" for="number">Fecha Factura</label>
                <input type="date" class="form-control" name="f_factu" value="<?php echo $ficha['f_factura']; ?>" >
            </div>

<!--
            <div class="form-group col-md-6">					
                    <label class="descripcion" for="estado"> Estado </label>
                    <select class="form-select" name="estado">
                    < ?php
                     if($ficha['estado']==1){?>
                        <option value="1" selected>PAGADA </option>
                        <option value="0">PENDIENTE</option>
                    < ?php } else {?>
                        <option value="0" selected>PENDIENTE</option>  
                        <option value="1" > PAGADA </option>  
                    < ?php } ?>                 
                    </select>
                    
                    </div>

-->


           
            </div>        
        <div class="card">
            <div class="row" style="margin-top:10px;">
            <div class="col-md-5"></div>
            <div class="col-md">
                        <h2>Productos</h2>
            </div>
            <div class="col-md-1" style="margin-right: 35px;"><a title="Agregar Producto del Catálogo" data-toggle="modal" class="btn btn-sm" href='#agregar' style="background-color:teal;color:white;"> <i class="fas fa-cart-plus" style="font-size: 25px;"></i> Producto</a>
            </div>
            <div class="col-md-1" style="margin-right: 25px;"><a title="Agregar Producto al Catálogo" data-toggle="modal" class="btn btn-sm" style="background-color: slateblue;color: white;" href='#agregar_catalogo'> <i class="fas fa-plus-square" style=" font-size:25px;"></i> Catálogo</a>
            </div>
            <div class="col-md-1" style="margin-right: 25px;"><a title="Agregar Producto con Descripción Manual" data-toggle="modal" class="btn btn-sm" href='#agregar_manual' style="background-color:dodgerblue;color:white;"> <i class="fas fa-keyboard" style="font-size:25px;color:white;"></i> Manual</a>
            </div>
                <div class="col-md-12">
                    <small>
                        <table id="" class="table display compact table-bordered"  style="width: 100%;">
                            <thead style='color:black; background-color: lightgrey'>
                                <th class="text-center" >Descripción</th>
                                <th class="text-center" >Referencia</th>
                                <th class="text-center" >Cantidad</th>
                                <th class="text-center" >Precio</th>
                                <th class="text-center" >Iva </th>
                                <th class="text-center" >Sub-total</th>
                                <th class="text-center" >Detalle</th>
                                <th class="text-center" >Acciones</th>

                            </thead>
                            <tbody>
                                <?php
                                $subtotal=0;
                                $iva=0;
                                $sql = "SELECT f.*,catalogo.porc_iva, catalogo.referencia FROM factura2 AS f
                                LEFT JOIN catalogo ON catalogo.id_catalogo=f.id_catalogo 
                                WHERE id_factura='$id_factura' ORDER BY id_detalle ASC"; //solucion temporal

                                $query = mysqli_query($link, $sql) or die(mysqli_error($link));
                                while ($f = mysqli_fetch_array($query)){ 
                                    $subtotal=$subtotal+$f['subtotal']; 
                                    $iva=$iva+$f['iva'];
                                    ?>
                                <tr>
                                    <td class="orden-dato"><?php echo $f['descripcion'] ?></td>
                                    <td class="orden-dato"><?php echo $f['referencia']; ?></td>
                                    <td class="orden-dato"><?php echo $f['cantidad'] ?></td>
                                    <td class="orden-dato"><?php echo number_format($f['vr_unidad'])." $" ?></td>
                                    <td class="orden-dato"><?php echo number_format($f['porc_iva'])." %" ?></td>
                                    <td class="orden-dato"><?php echo number_format($f['subtotal'])." $" ?></td>
                                    <td class="orden-dato"><?php echo ($f['detalle']); ?></td>
                                    <td class="text-center" style="vertical-align: middle;">
                                        <a href="javascript:void(0);" type="button"
                                            onclick="cargar_ajax1('modal_ooo', 'modal_modificar_producto.php?id_detalle=<?=$f['id_detalle']?>&&id_factura=<?=$id_factura?>');" title="Modificar Producto"
                                            data-toggle="modal" data-target="#modal_ooo"class="btn btn-primary btn-sm"> <i class="fas fa-edit"></i>
                                        </a>                     
                                
                                        <a style="margin: 0; font-size:15px" title="Eliminar Producto"
                                        class="btn btn-danger btn-sm" onclick="ConfirmDelete(<?php echo $f['id_detalle']?>,<?php echo $id_factura ?>)">
                                        <i class="fas fa-trash-alt" style="color: white;"></i>
                                        </a>
                                    </td>
                                </tr >

                                <?php }                                
                                $total=$subtotal+$iva;
                                ?>

                                <tr>
                                    <td colspan="5" style="text-align: end; font-size: 13px;"><h6><b> SUB-TOTAL </b></h6></td>
                                    <td colspan="3"><h6><?php echo number_format($subtotal,2);?> $  </h6></td>
                                </tr>
                                <tr>
                                    <td colspan="5" style="text-align: end; font-size: 13px;"><h6><b> IVA</b></h6></td>
                                    <td colspan="3"><h6><?php echo number_format($iva,2);?> $  </h6></td>
                                </tr>
                                <tr>
                                    <td colspan="5" style="text-align: end;" ><h6><b> TOTAL </b></h6></td>
                                    <td colspan="3"><h6><b><?php echo number_format($total,2);?> $ </b> </h6></td>
                                </tr>
                            </tbody>
                        </table>
                    </small>
                </div>
            </div>
        </div>     

            <div class="col-md-12 text-center">
                <a href="javascript:void(document.forms.formulario.submit());" type="submit" style="margin-right:10px;" class="btn btn-primary">Guardar</button>
                <a type="button" href="ver_factura.php" style="margin-top:20px;margin-bottom:20px;" class="btn btn-danger">Volver Atrás</a>
            </div>
        </div>

        </form>


    </div>
</body>

</html>


<!---------------------------------------------------------------- INICIO MODAL AGREGAR PRODUCTO ---------------------------------------------->
<div class="modal fade" id="agregar_2">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Producto</h5>

            </div>
            <div class="modal-body">
                <form class="row g-3" action="agregar_producto.php" method="post">

                <input type="hidden" name="id_factura" value="<?php echo $id_factura; ?>">


                <div class="form-group">
                        <label class="descripcion" for="tipo_activo" class="col-form-label">Catálogo</label>

                        <select class="form-select" id="catalogo" name="catalogo">
                            <?php

                            $sql = "SELECT id_catalogo, descripcion FROM catalogo ORDER BY descripcion ASC";
                            $query = mysqli_query($link, $sql) or die("Error: " . mysqli_error($link));

                            while ($fila = mysqli_fetch_array($query)) { ?>
                                    <option required value="<?php echo $fila['id_catalogo']; ?>" selected><?php echo $fila['descripcion'] ?></option>
                            <?php  } ?>
                        </select>
                    </div>
                    <!--
                    <div class="form-group col-md-12">
                        <label class="descripcion" for="activo_fijo" class="col-form-label">Referencia</label>
                        <input type="text" class="form-control" id="descripcion" name="referencia" maxlength="30">
                    </div>
                    -->

                    <div class="form-group col-6">
                        <label class="descripcion" for="localizacion" class="col-form-label">Precio</label>
                        <input type="number" class="form-control" value="<?php echo number_format(0,2);?>" id="valor" name="valor" min="0" max="99999999" required>
                    </div> 

                    <div class="form-group col-6">
                        <label class="descripcion" for="localizacion" class="col-form-label">Cantidad</label>
                        <input type="number" class="form-control" id="cantidad" name="cantidad" min="0" required>
                    </div>    

                    <div class="form-group col-12">
                        <label class="descripcion" for="localizacion" class="col-form-label">Detalle</label>
                        <input type="text" class="form-control" id="detalle" name="detalle">
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

<!----------------------------------------------------------------- FIN MODAL AGREGAR ----------------------------------------------->

<!---------------------------------------------------------------- INICIO MODAL AGREGAR CATALOGO ---------------------------------------------->
<div class="modal fade" id="agregar_catalogo" >

    <div class="modal-dialog" style="max-width: 900px;">
        <div class="modal-content" >
            <div class="modal-header" style="background-color: gainsboro;">
                <h5 class="modal-title text-center w-100" id="exampleModalLabel">Agregar Catálogo</h5>

            </div>
            <div class="modal-body">
                <form class="row" action="crear_catalogo.php" method="POST">  

                    <input type="hidden" name="id_factura" value="<?php echo $id_factura; ?>">                
                    
                

                    <div class="form-group col-md-9">
                        <label class="descripcion" for="" class="form-label" style="margin-top:5px;">Descripción </label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion" maxlength="120" required>
                    </div>

                    <div class="form-group col-md-3">
                        <label class="descripcion" for="" class="form-label">Referencia </label>
                        <input type="text" class="form-control" id="referencia" name="referencia" maxlength="20" >
                    </div>

                    
                    <div class="form-group col-md-2">
                        <label class="descripcion" for="" class="form-label">Precio </label>
                        <input type="number" class="form-control" id="precio" name="precio" >
                    </div>

                    <div class="form-group col-md-2">
                        <label class="descripcion" for="" class="form-label">Iva(%) </label>
                        <input type="number" class="form-control" id="iva" name="iva" step="0.1" >
                    </div>

                    <div class="form-group col-md-2">
                        <label class="descripcion" for="" class="form-label">Cantidad </label>
                        <input type="number" class="form-control" id="cantidad" name="cantidad" step="1" >
                    </div>

                    <div class="form-group col-6">
                        <label class="descripcion" for="recipient-name" class="col-form-label">Línea</label>

                            <select class="form-select" id="linea" name="linea">
                                <?php

                                $sql = "SELECT id_linea,descripcion FROM lineas_producto INNER JOIN clases ON clases.id_clase=lineas_producto.id_clase 
                                WHERE lineas_producto.estado=1 AND clases.editable=0 ORDER BY descripcion ASC";
                                $query = mysqli_query($link, $sql) or die("Error: " . mysqli_error($link));

                                while ($fila = mysqli_fetch_array($query)) { ?>
                                        <option required value="<?php echo $fila['id_linea']; ?>" ><?php echo $fila['descripcion'] ?></option>                                  
                                <?php  } ?>
                            </select>

                    </div>

                    <div class="form-group col-md-12">
                        <label class="descripcion" for="" class="form-label">Detalle </label>
                        <input type="text" class="form-control" id="detalle" name="detalle" >
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
<!----------------------------------------------------------------- FIN MODAL AGREGAR ----------------------------------------------->

<!---------------------------------------------------------------- INICIO MODAL AGREGAR MANUAL ---------------------------------------------->
<div class="modal fade" id="agregar_manual" >

    <div class="modal-dialog" style="max-width: 900px;">
        <div class="modal-content">
            <div class="modal-header" style="background-color: gainsboro;">
                <h5 class="modal-title text-center w-100" id="exampleModalLabel">Agregar Producto Manualmente</h5>
            </div>
            <div class="modal-body">
                <form class="row" action="agregar_manual.php" method="POST">

                    <input type="hidden" name="id_factura" value="<?php echo $id_factura; ?>">

                    <div class="form-group col-md-9">
                        <label class="descripcion" for="" class="form-label" style="margin-top:5px;">Descripción </label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion" maxlength="120" required>
                    </div>

                    <div class="form-group col-md-3">
                        <label class="descripcion" for="" class="form-label">Referencia </label>
                        <input type="text" class="form-control" id="referencia" name="referencia" maxlength="20">
                    </div>
                    
                    <div class="form-group col-md-2">
                        <label class="descripcion" for="" class="form-label">Precio </label>
                        <input type="number" class="form-control" id="precio" min="0" name="precio" required>
                    </div>

                    <div class="form-group col-md-2">
                        <label class="descripcion" for="" class="form-label">Iva(%) </label>
                        <input type="number" class="form-control" id="iva" min="0" name="iva" step="0.1" required>
                    </div>

                    <div class="form-group col-md-2">
                        <label class="descripcion" for="" class="form-label">Cantidad </label>
                        <input type="number" class="form-control" id="cantidad" name="cantidad" step="1" min="0" required>
                    </div>

                    <div class="form-group col-6">
                        <label class="descripcion" for="recipient-name" class="col-form-label">Línea</label>
                            <select class="form-select" id="id_catalogo" name="id_catalogo">
                                <?php

                                $sql = "SELECT lineas_producto.id_linea, lineas_producto.descripcion,ct.id_catalogo 
                                FROM lineas_producto 
                                INNER JOIN clases ON clases.id_clase=lineas_producto.id_clase 
                                INNER JOIN catalogo AS ct ON ct.id_linea=lineas_producto.id_linea 
                                WHERE lineas_producto.estado=1 AND clases.editable=1 ORDER BY descripcion ASC";
                                $query = mysqli_query($link, $sql) or die("Error: " . mysqli_error($link));

                                while ($fila = mysqli_fetch_array($query)) { ?>
                                        <option required value="<?php echo $fila['id_catalogo']; ?>" ><?php echo $fila['descripcion'] ?></option>                                  
                                <?php  } ?>
                            </select>
                    </div>

                    <div class="form-group col-md-12">
                        <label class="descripcion" for="" class="form-label">Detalle </label>
                        <input type="text" class="form-control" id="detalle" name="detalle">
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
<!----------------------------------------------------------------- FIN MODAL AGREGAR ----------------------------------------------->


<!------------------------------------------------------ ELIMINAR PRODUCTO -------------------------------------->
<script type="text/javascript">
  function ConfirmDelete(id_detalle,id_factura) {
    Swal.fire({
      title: '¿Quitar Producto de esta Factura?',
      icon: 'warning',
      showCancelButton: true,
      cancelButtonText: 'No',
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location = "eliminar_producto.php?id_detalle="+id_detalle+"&id_factura="+id_factura;
      } else {       
        swal.showInputError("error");
        return false;
      }
    })
  }
</script>
<!---------------------------------------------------------------------------------------------------------------->

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

 <script>
  function cargar_ajax1(div, url) {

$.post(
    url,
    function(resp) {
        $("#" + div + "").html(resp);
    }
);
}
 </script>

 <!--------------------------------------- MODAL AGREGAR PRODUCTO CON TABLA---------------------------------->

<div class="modal fade" id="agregar">    

<div class="modal-dialog" style="max-width: 70rem;">

    <div class="modal-content">       
        
        <div class="modal-header" style="background-color: gainsboro;">
            <h5 class="modal-title text-center col-12" id="exampleModalLabel">Agregar Producto del Catálogo</h5>

        </div>
        
        <div class="modal-body">
        <script>
        $(document).ready(function() {
        $('#example2').DataTable({
            "order": [
                [0, "asc"]
            ]
        });
        });
        </script>
        <div style="margin-bottom: 7em;">
            <?php 
               $sql = "SELECT catalogo.*, lp.descripcion as linea, cl.id_clase 
               FROM catalogo 
               INNER JOIN lineas_producto AS lp ON lp.id_linea=catalogo.id_linea 
               INNER JOIN clases as cl ON cl.id_clase=lp.id_clase 
               WHERE cl.editable=0";
        

            $query = mysqli_query($link, $sql) or die(mysqli_error($link));
            ?>
    <small>
        <div class="contenedor-tabla">
            <table id="example2" class="table "  cellpadding='0' $().DataTable();. style="width: 100%;">
            <thead style='color:black; background-color: lightblue'>
                <th class="text-center" >Id</th>
                <th class="text-center" >Línea</th>
                <th class="text-center" >Descripción</th>
                <th class="text-center" >Referencia</th>
                <th class="text-center" >IVA</th>
                <th class="text-center" >Cant.</th>
                <th class="text-center" >Precio</th>
                <th class="text-center" >Detalle</th>
                <th class="text-center" >Opciones</th>  
            </thead>
            <tbody>
                <?php
             
                while ($f = mysqli_fetch_array($query)) { ?>
                    <tr>   
                    <form method="POST" action="agregar_producto.php">                 
                    <input type="hidden" name="id_factura" value="<?php echo $id_factura; ?>">
                    <input type="hidden" name="catalogo" value="<?php echo $f['id_catalogo']; ?>">
                        <td class="text-center"><span><?php echo $f['id_catalogo'] ?></span></td>
                        <td><?php echo $f['linea'] ?></td>
                        <td style="width: 240px;"><?php echo $f['descripcion'] ?></td> 
                        <td class="text-center"><?php echo $f['referencia'] ?></td> 
                        <td class="text-center"><?php echo $f['porc_iva']." %" ?></td> 
                        <td class="text-center" style="vertical-align: middle;"><input type="number" style="max-width: 60px;" min="1" name="cantidad" required></td>                      
                        <td class="text-center" style="vertical-align: middle;"><input type="number" style="max-width: 100px;" min="0" max="99999999" name="valor" required></td> 
                        <td class="text-center" style="vertical-align: middle;"><input type="text"  style="max-width: 100px;" maxlength="100px" name="detalle"></td>                                           
                      <td class="text-center" style="vertical-align: middle;" ><button class="btn btn-primary" type="submit"><i class="fas fa-plus" ></i></button></td>
                      </form>

                    </tr>
                <?php } ?>
            </tbody>
            </table>
        </div>

        </div>
    </div>

    </div>
</div>
</div>
</small>

<!---------------------------------------------------------------------------------------------------------------->
