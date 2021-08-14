<?php
session_start();
include '../base_datos/seguridad.php';
include '../base_datos/conexion_inventario.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <?php include '../enlaces_sc/enlaces.php'; ?>
    <title> Direcciones IP </title>
</head>

<?php

if(isset($_REQUEST['tipo_activo'])){
    $tipo_activo=$_REQUEST['tipo_activo'];
}else
$tipo_activo=1;
?>

<body style="margin-bottom: 30px">
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
        <div class="titulos" >
            <h1>Direcciones IP</h1>
        </div>
        <br>


        <!-- <div class="col-md-6">
        
        <a data-toggle="modal"  class="btn btn-primary" href='#modal-id'>Agregar localizacion</a>
        </div>-->

       

        <div class="contenedor-tabla">
            <table id="example2" class="table display compact table-bordered" cellpadding='0' $().DataTable();. style="width: 100%; margin-top: 20px;">
                <thead style='color:black; background-color: lightblue'>
                    <th class="text-center" >Id</th>
                    <th class="text-center" >Direccion IP</th>
                    <th class="text-center" >Activo Fijo</th>
                    <th class="text-center" >Tipo Activo</th>
                    <th class="text-center" >Localización </th>
                    <?php if ($perfil == 3) { ?>
                    <th class="text-center" >Opciones </th>
                    <?php } ?>
                </thead>
                <tbody>
                    <?php
                    // WHERE tipo_activo.id = '$tipo_activo'
                    //$Sql =mysqli_query($link, "select * from solicitudes Where estado = 'Sin realizar' AND id_estado = 0 ORDER BY solicitudes.id_solicitud and usuario='$_SESSION[usuario]'");
                    $sql = "SELECT direcciones_ip.id, direcciones_ip.direccion_ip,direcciones_ip.id_activo_fijo, activos_fijos.activo_fijo, tipo_activo.tipo_activo,
                    localizaciones.localizacion FROM direcciones_ip
                    LEFT JOIN activos_fijos ON direcciones_ip.id_activo_fijo = activos_fijos.id 
                    LEFT JOIN tipo_activo ON activos_fijos.id_tipo_activo = tipo_activo.id
                    LEFT JOIN localizaciones ON activos_fijos.id_localizacion = localizaciones.id";
                    $query = mysqli_query($link, $sql) or die(mysqli_error($link));
                    while ($f = mysqli_fetch_array($query)) {     ?>
                        <tr>
                            <td style="width: 5%;"><span><?php echo $f['id'] ?></span></td>
                            <td style="text-align:left;"><?php echo $f['direccion_ip'] ?></td>
                            <td style="text-align:left;"><?php echo $f['activo_fijo'] ?></td>
                            <td style="text-align:left;"><?php echo $f['tipo_activo'] ?></td>
                            <td style="text-align:left;"><?php echo $f['localizacion'] ?></td>

                            <?php if ($perfil != 1) { ?>

                            <!--<td><a style="color: black;" href="#" id="del-<?php ?>// echo $f["id"]; ?>" ><i class="fas fa-plus"></i></a>-->
                            <td class="text-center" style="vertical-align:middle;"> <?php if($f['id_activo_fijo']==0){ ?>
                            <a style="color: green;font-size: 20px;" href="agregar-activo.php?id=<?php echo $f["id"]; ?>"><i class="fas fa-plus"></i></a>
                            
                            <?php } else { ?>
                                <a style="color: purpple;font-size:20px;" href="agregar-activo.php?id=<?php echo $f["id"]; ?>"><i class="far fa-edit"></i></a>
                                <a title="Desvincular Direccion ip" href="#" style="font-size: 20px;color:crimson" onclick="ConfirmDelete(<?php echo $f['id']?>)">
                                <i class="fas fa-trash-alt"></i>
                                </a>
                            <?php } ?>                                
                           
                            </td>

                                
                            <?php } ?>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
    </div>
</body>
            <?php include '../footer.php'; 
            ?>

</html>

<script type="text/javascript">
  function ConfirmDelete(id,dire) {
    Swal.fire({
      title: '¿Estás seguro que desea desvincular la dirección ip?',    
      icon: 'warning',
      showCancelButton: true,
      cancelButtonText: 'No',
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si'
    }).then((result) => {
      if (result.isConfirmed) {
        eliminarIp(id);
      } else {       
        swal.showInputError("error");
        return false;
      }
    })
  }

  

    function eliminarIp(id){
                var datos = { "id":id};
                var url = 'desvincular_ip.php';
                
                $.ajax({
                    data: datos,
                    url: url,
                    type: 'POST',
                    success: function(response) {
                        Swal.fire({
                            title: 'Direccion IP Desvinculada',
                            icon: 'success',                         
                            confirmButtonText: 'Continuar'
                        }).then((result) => {
                            if(result){
                            window.location='ver-direcciones-ip.php';
                            } else {
                                swal.showInputError("error");
                            }
                        });
                          
                        },
                        error: function (error) {                           
                           
                        }
                })

            }
  
</script>