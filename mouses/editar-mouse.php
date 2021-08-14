<?php
session_start();
include '../base_datos/seguridad.php';
include '../base_datos/conexion_inventario.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <?php include '../enlaces_sc/enlaces.php'; ?>
    <title> Mouse </title>
</head>

<body style="padding-bottom: 20px">
    <?php include '../menu/menu.php';     ?>

    <?php
    $id = $_GET['id'];

    $sql = "SELECT * FROM ft_mouse  WHERE id = '$id'";
    $query = mysqli_query($link, $sql) or die(mysqli_error($link));
    $ficha = mysqli_fetch_array($query);
    //print_r($ficha);
    ?>

    <div class="container">
        <div class="titulos">
            <div class="reedireccion"><a class="salida" href="../mouses/ver-mouses.php">X</a>
            </div>
            <h1>Editar Mouse</h1>
        </div>
        <!--Formulario para crear monitores-->
        <div class="card edicion">
        <form class="row informacion" action="registrar-actualizacion-mouse.php" method="post">

            <input type="text" name="id" hidden value="<?php echo $ficha['id']; ?>">

            <div class="form-group col-md-3">
                            <?php
                            $sql1 = "SELECT id, activo_fijo FROM activos_fijos ";
                            $sql2 = "SELECT activos_fijos.id, activos_fijos.activo_fijo, activos_fijos.estado FROM activos_fijos WHERE
                activos_fijos.estado=1 AND activos_fijos.id_tipo_activo=4
                AND activos_fijos.id NOT IN (SELECT ft_computador.id_activo_fijo from ft_computador)
                AND activos_fijos.id NOT IN (SELECT ft_monitor.id_activo_fijo FROM ft_monitor)
                AND activos_fijos.id NOT IN (SELECT ft_teclado.id_activo_fijo FROM ft_teclado)
                AND activos_fijos.id NOT IN (SELECT ft_mouse.id_activo_fijo FROM ft_mouse)";

                            $query1 = mysqli_query($link, $sql1);
                            $query2 = mysqli_query($link, $sql2);
                            ?>
                            <label class="descripcion" for="ram1_ddr">Activo Fijo</label>
                            <select class="form-select" name="activoFijo" required>
                                <?php while ($fila = mysqli_fetch_array($query1)) {
                                    if ($fila['id'] == $ficha['id_activo_fijo']) { ?>
                                        <option value="<?php echo $fila['id']; ?>" selected><?php echo $fila['activo_fijo']; ?></option>
                                    <?php } else { while ($fila2 = mysqli_fetch_array($query2)) { ?>
                                        <option value="<?php echo $fila2['id']; ?>"><?php echo $fila2['activo_fijo']; ?></option>

                                <?php }}
                                } ?>
                            </select>
             </div>


            <div class="form-group col-md-3">
                <label class="descripcion" for="">Marca</label>
                <input type="" class="form-control" name="marca"  value="<?php echo $ficha['marca']; ?>"  id="">
            </div>

            <div class="form-group col-md-2">
                <label class="descripcion" for="number">Modelo</label>
                <input type="text" class="form-control" name="modelo"  value="<?php echo $ficha['modelo']; ?>"  id="number">
            </div>

            <div class="form-group col-md-2">
                <label class="descripcion" for="number">Serie</label>
                <input type="text" class="form-control" name="serie"  value="<?php echo $ficha['serie']; ?>"  id="number">
            </div>
            
            <div class="form-group col-md-2">
                <label class="descripcion" for="country">Factura</label>
                <input type="text" class="form-control" name="factura"  value="<?php echo $ficha['factura']; ?>"  id="country">
            </div>

            <div class="form-group col-md-6">
                <label class="descripcion" for="last-name">Proveedor</label>
                <select required id="lname" name="proveedor" class="form-select">
                    <?php
                    $sql = "SELECT id, nombre FROM proveedores;";
                    $query = mysqli_query($link, $sql);

                    while ($fila = mysqli_fetch_array($query)) {
                        if ($ficha['id_proveedor'] == $fila['id']) { ?>
                            <option selected value="<?php echo $fila['id']; ?>"> <?php echo $fila['nombre']; ?>
                            </option>
                        <?php } else { ?>
                            <option value="<?php echo $fila['id']; ?>"> <?php echo $fila['nombre']; ?></option>
                    <?php }
                    } ?>
                </select>
            </div>

            <div class="form-group col-md-2">
                <label class="descripcion" for="country">Fecha de la compra</label>
                <input type="date" class="form-control" name="fecha_compra"  value="<?php echo $ficha['fecha_compra']; ?>"  id="country">
            </div>

            <div class="form-group col-md-2">
                <label class="descripcion" for="">Tipo de conector</label>
                <select class="form-select" class="form-control" name="tipo_conector" id="">
                    <?php                    

                    if ($ficha['tipo_conector'] == "USB") { ?>
                        <option selected value="USB">USB</option>
                        <option value="PS2">PS2</option>
                    <?php } else { ?>
                        <option value="USB">USB</option>
                        <option selected value="PS2">PS2</option>

                    <?php } ?>

                </select>
            </div>         

            <div class="form-group col-md-2">    
                    <label class="descripcion" for="estado"> Estado </label>
                    <select class="form-select" name="estado">
                    <?php
                     if($ficha['estado']==1){?>
                        <option value="1" selected>Activo </option>
                        <option value="0">Inactivo</option>
                        <option value="2" > Retirado </option>
                    <?php } else
                    if($ficha['estado']==0) {?>                        
                        <option value="0" selected>Inactivo</option>  
                        <option value="1" > Activo </option>
                        <option value="2" > Retirado </option>

                    <?php } else { ?> 
                        <option value="2" selected> Retirado </option>
                        <option value="0" >Inactivo</option>  
                        <option value="1" > Activo </option>
                    <?php } ?>                
                    </select>
                    
                </div>

            <div class="col-md-12 form-group" >
                <label class="descripcion" for="">Observaciones</label>
                <textarea class="col-md-12 form-control" name="observaciones" rows="4" id="" placeholder="Observaciones del equipo"><?php echo $ficha['observaciones']; ?></textarea>
            </div>


            <div class="col-md-12 text-center">
                <button type="submit"  class="btn btn-primary">Modificar</button>
                <a type="button" href="ver-mouses.php" class="btn btn-danger">Cancelar</a>

            </div>

        </form>
        </div>

    </div>
</body>

</html>