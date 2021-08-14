<?php
session_start();
include '../base_datos/seguridad.php';
include '../base_datos/conexion_inventario.php';
include '../enlaces_sc/enlaces.php';


if(isset($_POST['inicial'],$_POST['final'])){
  $fecha_inicial=$_POST['inicial'];
  $fecha_final=$_POST['final'];
} else{   
$month = date("Y-m");
$fecha_inicial= $month."-01";
$fecha_final= date("Y-m-t", strtotime($month));
}


//------------- CONSULTA DE LAS LINEAS QUE PERTENECEN A LA CLASE --------------------------

$sql = "SELECT rb.rubro, cl.clase, lp.descripcion as linea , sum(fdet.cantidad) as cant, sum(fdet.subtotal+fdet.iva) as valor 
FROM factura2 as fdet LEFT JOIN catalogo as cat ON fdet.id_catalogo = cat.id_catalogo 
INNER JOIN lineas_producto as lp ON cat.id_linea = lp.id_linea 
INNER JOIN clases as cl ON lp.id_clase = cl.id_clase 
INNER JOIN rubro as rb ON cl.id_rubro = rb.id_rubro
INNER JOIN factura1 as fac ON fdet.id_factura = fac.id_factura
WHERE fac.f_factura BETWEEN '$fecha_inicial' AND '$fecha_final' 
GROUP BY rb.id_rubro, cl.clase, lp.descripcion";

$query = mysqli_query($link, $sql) or die(mysqli_error($link));

include '../menu/menu.php'; 
?>

       
<br>
<div class="cointainer">
<form action="informe_lineas.php" method="POST" name="formulario2" id="formulario2">
        <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-auto" >
                    <label for="nombre2" class="form-label" style="padding-top: 7px;margin-left:30px">Fecha de Factura</label>
                </div>
                <div class="col-sm-2">
                    <input type="date" value="<?=$fecha_inicial ?>" class="form-control" name="inicial" id="inicial">
                </div>
                <div class="col-sm-2">
                    <input type="date" value="<?=$fecha_final ?>" class="form-control" name="final" id="final">
                </div>

            <div class="col-auto">
                <a href="javascript:void(document.forms.formulario2.submit());" type="button" class="btn" style="margin: 0;float:right;background-color:teal;color:white;">
                    <i class="fas fa-sync-alt" style="color: white; margin-right:10px;"></i>Consultar
                </a>
            </div>  
    </form>
</div>

<small>
    <div class="container">
      <table id="example2" class="table table-striped table-bordered" cellpadding='0' $().DataTable();.style="width: 100%; margin-top: 20px;">

        <thead class="table-link" style="background-color:teal;color:white;">
          <tr>
            <th class="text-center" style="width: 20px">
              <h6>Rubro</h6>
            </th>
            <th class="text-center" style="width:100px;">
              <h6>Clase</h6>
            </th>
            <th class="text-center" style="width: 100px;">
              <h6>Línea</h6>
            </th>
            <th class="text-center" style="width: 100px;">
              <h6>Cantidad</h6>
            </th>
            <th class="text-center" style="width: 100px;">
              <h6> Subtotal</h6>
            </th>
          </tr>
        </thead>
        <tbody>
        
          <?php 
          $total=0;
          while ($row = mysqli_fetch_array($query)) {
          $total=$total+$row['valor'];            
          ?>
            <tr>
              <td class="orden-dato;"><?php echo $row['rubro']; ?></td>
              <td class="orden-dato;"><?php echo $row['clase']; ?></td>
              <td class="orden-dato;"><?php echo $row['linea']; ?></td>
              <td class="orden-dato;"><?php echo $row['cant']; ?></td>
              <td class="orden-dato;"><?php echo number_format($row['valor'],2); ?></td>
              </tr>
            <?php  } ?>
            <tr>
              <td colspan="4" style="text-align: right; font-size:18px"><b>Total</b> </td>
              <td> <?php echo number_format($total); ?> </td>
            </tr>
        </tbody>
      </table>
    </div>
</small>
