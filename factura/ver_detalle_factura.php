<?php
session_start();
include '../base_datos/seguridad.php';
include '../base_datos/conexion_inventario.php';

$id_factura='';
if(isset($_REQUEST['id'])){
    $id_factura=$_REQUEST['id'];
}



$sql = "SELECT factura1.*,proveedores.nombre as proveedor
FROM factura1 INNER JOIN proveedores ON proveedores.id=factura1.id_proveedor
WHERE id_factura = '$id_factura'";

$query = mysqli_query($link, $sql) or die(mysqli_error($link));
$ficha = mysqli_fetch_array($query);

$estado='';
if($ficha['estado']==1)
    $estado='PAGADA';
else 
    $estado='PENDIENTE';


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
            <div class="reedireccion" style="text-align: right;"><a class="salida" style=" text-decoration:none;color:white;" href="./ver_factura.php">X</a>
            </div>
            <h1>Factura No. <?php echo $ficha['factura']; ?> </h1>
        </div>
        <div class="card edicion">

        <form action="editar2_factura.php" method="post" name="formulario" id="formulario">

        <div class="row informacion">

            <input type="hidden" value="<?php echo $ficha['id_factura']; ?>" name="id_factura">

            <div class="form-group col-md-6">
                <label for="">Nro. Factura</label>
                <input readonly type="" class="form-control" name="factura" value="<?php echo $ficha['factura']; ?>" placeholder="" id="">
            </div>

            <div class="form-group col-md-6">
                <label for="">Proveedor</label>
                <input readonly type="" class="form-control" name="proveedor" value="<?php echo $ficha['proveedor']; ?>" placeholder="" id="">
            </div>
          

            <div class="form-group col-md-6">
                <label for="number">Fecha Factura</label>
                <input readonly type="date" class="form-control" name="f_factu" value="<?php echo $ficha['f_factura']; ?>"  id="">
            </div>
          

            <div class="form-group col-md-6">
                <label for="country">Estado</label>
                <input  readonly type="text" class="form-control" name="estado" value="<?php echo $estado;?>" placeholder="" id="">
            </div>           

        </div>

        </form>

        
        <div class="card">
            <div class="row" style="margin-top:5px;">
            <div class="col-md-5"></div>
            <div class="col-md-7">
                        <h2>Productos</h2>
            </div>
              
                <div class="col-md-12">

                    <small>
                        <table id="" class="table display compact table-bordered"  style="width: 100%; ">
                            <thead style='color:black; background-color: lightgrey'>
                                <th class="text-center" >Descripción</th>
                                <th class="text-center" >Referencia</th>
                                <th class="text-center" >Valor (U))</th>
                                <th class="text-center" >Cantidad</th>
                                <th class="text-center" >Iva</th>
                                <th class="text-center" >Detalle</th>
                                <th class="text-center" >Sub-total</th>
                            </thead>
                            <tbody>
                                <?php
                                $subtotal=0;
                                $iva=0;
                                $sql = "SELECT f.*,catalogo.porc_iva, catalogo.descripcion as catalogo FROM factura2 AS f
                                LEFT JOIN catalogo ON catalogo.id_catalogo=f.id_catalogo 
                                WHERE id_factura='$id_factura' ORDER BY id_detalle ASC"; //solucion temporal

                                $query = mysqli_query($link, $sql) or die(mysqli_error($link));
                                while ($f = mysqli_fetch_array($query)){ 
                                    $subtotal=$subtotal+$f['subtotal']; 
                                    $iva=$iva+$f['iva']; 
                                    ?>
                                <tr>
                                <td class="orden-dato"><?php echo $f['descripcion'] ?></td>
                                    <td class="orden-dato"><?php echo ""; ?></td>
                                    <td class="orden-dato"><?php echo number_format($f['vr_unidad'])." $" ?></td>
                                    <td class="orden-dato"><?php echo $f['cantidad'] ?></td>
                                    <td class="orden-dato"><?php echo number_format($f['porc_iva'])." %" ?></td>
                                    <td class="orden-dato"><?php echo ($f['detalle']); ?></td>
                                    <td class="orden-dato"><?php echo number_format($f['subtotal'])." $" ?></td>                   

                                </tr >

                                <?php }                                
                                $total=$subtotal+$iva;
                                ?>
                                <tr>
                                    <td colspan="6" style="text-align: end; font-size: 13px;"><h6><b> SUB-TOTAL </b></h6></td>
                                    <td colspan="2"><h6><?php echo number_format($subtotal,2);?> $  </h6></td>
                                </tr>
                                <tr>
                                    <td colspan="6" style="text-align: end; font-size: 13px;"><h6><b> IVA</b></h6></td>
                                    <td colspan="2"><h6><?php echo number_format($iva,2);?> $  </h6></td>
                                </tr>
                                <tr>
                                    <td colspan="6" style="text-align: end;" ><h6><b> TOTAL </b></h6></td>
                                    <td colspan="2"><h6><b><?php echo number_format($total,2);?> $ </b> </h6></td>
                                </tr>
                            </tbody>
                        </table>
</small>
                </div>
            </div>
        </div>

            <div class="col-md-12 text-center">
                <a type="button" href="ver_factura.php" style="margin-top:20px;margin-bottom:20px;" class="btn btn-danger">Volver Atrás</a>

            </div>
        </div>

    </div>
</body>

</html>
