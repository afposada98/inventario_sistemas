<?php
session_start();
include '../base_datos/seguridad.php';
include '../base_datos/conexion_inventario.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <?php include '../enlaces_sc/enlaces.php'; ?>
    <title> Computador </title>
</head>

<body style="padding-bottom: 30px">
    <?php include '../menu/menu.php';     ?>
   
    <?php

    $id = $_GET['id'];

    $sql = "SELECT ft_computador.id, activos_fijos.activo_fijo, localizaciones.localizacion, ft_computador.marca, 
            ft_computador.modelo, ft_computador.serie, ft_computador.parte, ft_computador.service_tag, ft_computador.exp_serv_code, 
            ft_computador.velocidad_procesador, ft_computador.modelo_procesador, ft_computador.disco_duro_1, ft_computador.disco_duro_2, 
            ft_computador.disco_duro_3, ft_computador.ram1_cant, ft_computador.ram1_tipo, ft_computador.ram2_cant, ft_computador.ram2_tipo, 
            ft_computador.ram3_cant, ft_computador.ram3_tipo, ft_computador.ram4_cant, ft_computador.ram4_tipo, proveedores.nombre, ft_computador.factura, 
            ft_computador.valor_compra, ft_computador.fecha_compra, ft_computador.fecha_instalacion, ft_computador.fecha_retiro, tipo_dispositivo.dispositivo, 
            ft_computador.mac_lan, ft_computador.mac_wifi, ft_computador.dominio, ft_computador.estado, ft_computador.observaciones FROM ft_computador 
            INNER JOIN activos_fijos ON ft_computador.id_activo_fijo = activos_fijos.id 
            INNER JOIN localizaciones ON activos_fijos.id_localizacion = localizaciones.id INNER JOIN proveedores 
            ON ft_computador.id_proveedor = proveedores.id INNER JOIN tipo_dispositivo 
            ON ft_computador.tipo_dispositivo = tipo_dispositivo.id WHERE ft_computador.id = '$id'";

    $query = mysqli_query($link, $sql) or die(mysqli_error($link));
    $ficha = mysqli_fetch_array($query);

    //print_r($ficha);

    ?>
    <div class="container">
        <div class="titulos">
            <div class="reedireccion"><a class="salida" href="./ver-activos-fijos.php">X</a></div>
            <div>
                <h1><?php echo $ficha['localizacion']; ?></h1>
            </div>
            <h5>Computador</h5>

        </div>


        <div class="card">
            <div class="row informacion">

                <div class="col-md-3">
                    <div class="contenedor-informacion">
                        <p class="descripcion" for="first-name">Activo fijo:</p>
                        <input type="text" class="form-control" readonly value="<?php echo $ficha['activo_fijo']; ?>">
                    </div>

                    <div class="contenedor-informacion">
                        <p class="descripcion" for="first-name">Parte:</p>
                        <input type="text" class="form-control" readonly value="<?php echo $ficha['parte']; ?>">
                    </div>

                    <div class="contenedor-informacion">
                        <p class="descripcion" for="first-name">Modelo del procesador:</p>
                        <input type="text" class="form-control" readonly value="<?php echo $ficha['modelo_procesador']; ?>">
                    </div>

                    <div class="contenedor-informacion">
                        <p class="descripcion" for="first-name">Proveedor</p>
                        <input type="text" class="form-control" readonly value="<?php echo $ficha['nombre']; ?>">
                    </div>

                    <div class="contenedor-informacion">
                        <p class="descripcion" for="first-name">Fecha Instalacion:</p>
                        <input type="text" class="form-control" readonly value="<?php echo $ficha['fecha_instalacion']; ?>">
                    </div>

                    <div class="contenedor-informacion ultimo">
                        <p class="descripcion" for="first-name">Mac Wifi:</p>
                        <input type="text" class="form-control" readonly value="<?php echo $ficha['mac_wifi']; ?>">
                    </div>
                </div>

                <div class="col-md-3">

                    <div class="contenedor-informacion">
                        <p class="descripcion" for="first-name">Marca:</p>
                        <input type="text" class="form-control" readonly value="<?php echo $ficha['marca']; ?>">
                    </div>

                    <div class="contenedor-informacion">
                        <p class="descripcion" for="first-name">Service tag:</p>
                        <input type="text" class="form-control" readonly value="<?php echo $ficha['service_tag']; ?>">
                    </div>

                    <div class="contenedor-informacion">
                        <p class="descripcion" for="first-name">Disco duro 1:</p>
                        <input type="text" class="form-control" readonly value="<?php echo $ficha['disco_duro_1']; ?>">
                    </div>

                    <div class="contenedor-informacion">
                        <p class="descripcion" for="first-name">Factura:</p>
                        <input type="text" class="form-control" readonly value="<?php echo $ficha['factura']; ?>">
                    </div>

                    <div class="contenedor-informacion">
                        <p class="descripcion" for="first-name">Fecha Retiro:</p>
                        <input type="text" class="form-control" readonly value="<?php echo $ficha['fecha_retiro']; ?>">
                    </div>

                    <div class="contenedor-informacion ultimo">
                        <p class="descripcion" for="first-name">Dominio:</p>
                        <input type="text" class="form-control" readonly value="<?php echo $ficha['dominio']; ?>">
                    </div>


                </div>

                <div class="col-md-3">




                    <div class="contenedor-informacion">
                        <p class="descripcion" for="first-name">Modelo:</p>
                        <input type="text" class="form-control" readonly value="<?php echo $ficha['modelo']; ?>">
                    </div>


                    <div class="contenedor-informacion">
                        <p class="descripcion" for="first-name">Exp serv code:</p>
                        <input type="text" class="form-control" readonly value="<?php echo $ficha['exp_serv_code']; ?>">
                    </div>

                    <div class="contenedor-informacion">
                        <p class="descripcion" for="first-name">Disco duro 2:</p>
                        <input type="text" class="form-control" readonly value="<?php echo $ficha['disco_duro_2']; ?>">
                    </div>

                    <!--<div class="contenedor-informacion">
                        <p class="descripcion" for="first-name">Ram 2 Cantidad:</p>
                        <input type="text" class="form-control" readonly value="<?php //echo $ficha['ram2_cant']; 
                                                                                ?>">
                    </div>-->


                    <!--<div class="contenedor-informacion">
                        <p class="descripcion" for="first-name">Ram 4 Cantidad:</p>
                        <input type="text" class="form-control" readonly value="<?php //echo $ficha['ram4_cant']; 
                                                                                ?>">
                    </div>-->

                    <div class="contenedor-informacion">
                        <p class="descripcion" for="first-name">Valor de la compra:</p>
                        <input type="text" class="form-control" readonly value="<?php echo $ficha['valor_compra']; ?>">
                    </div>

                    <div class="contenedor-informacion">
                        <p class="descripcion" for="first-name">Tipo de Dispositivo:</p>
                        <input type="text" class="form-control" readonly value="<?php echo $ficha['dispositivo']; ?>">
                    </div>

                    <div class="contenedor-informacion ultimo">
                        <p class="descripcion" for="first-name">Estado:</p>
                        <input type="text" class="form-control" readonly value="<?php if ($ficha['estado'] == 1) {
                                                                                    echo 'Activo';
                                                                                } else 
                                                                                if($ficha['estado']==0) {
                                                                                    echo 'Inactivo'; }
                                                                                    else {
                                                                                        echo 'Retirado';                                                                                     
                                                                                } ?>">
                    </div>






                </div>

                <div class="col-md-3">




                    <div class="contenedor-informacion">
                        <p class="descripcion" for="first-name">Serie:</p>
                        <input type="text" class="form-control" readonly value="<?php echo $ficha['serie']; ?>">
                    </div>


                    <div class="contenedor-informacion">
                        <p class="descripcion" for="first-name">Velocidad del procesador:</p>
                        <input type="text" class="form-control" readonly value="<?php echo $ficha['velocidad_procesador']; ?>">
                    </div>

                    <div class="contenedor-informacion">
                        <p class="descripcion" for="first-name">Disco duro 3:</p>
                        <input type="text" class="form-control" readonly value="<?php echo $ficha['disco_duro_3']; ?>">
                    </div>

                    <!--<div class="contenedor-informacion">
                        <p class="descripcion" for="first-name">Ram 2 Tipo:</p>
                        <input type="text" class="form-control" readonly value="<?php //echo $ficha['ram2_tipo']; 
                                                                                ?>">
                    </div>-->

                    <!--<div class="contenedor-informacion">
                        <p class="descripcion" for="first-name">Ram 4 Tipo:</p>
                        <input type="text" class="form-control" readonly value="<?php echo $ficha['ram4_tipo']; ?>">
                    </div>-->

                    <div class="contenedor-informacion">
                        <p class="descripcion" for="first-name">Fecha Compra:</p>
                        <input type="text" class="form-control" readonly value="<?php echo $ficha['fecha_compra']; ?>">
                    </div>

                    <div class="contenedor-informacion">
                        <p class="descripcion" for="first-name">Mac LAN:</p>
                        <input type="text" class="form-control" readonly value="<?php echo $ficha['mac_lan']; ?>">
                    </div>





                </div>

                <!--<div class="col-md-12 form-group" style="margin-bottom: 2em;">
                    <p>Observaciones</p>
                    <textarea type="text" class="col-md-12 form-control" rows="4" readonly value="<?php //echo $ficha['observaciones']; 
                                                                                                    ?>"></textarea>
                </div>-->

                <div class="contenedor-informacion ultimo col-md-12">
                    <p class="descripcion" for="first-name">Observaciones:</p>
                    <textarea type="text" class="form-control" rows="4" readonly><?php echo $ficha['observaciones']; ?></textarea>
                </div>

            </div>
        </div>
        <div class="card">
            <div class="row informacion">
                <div class="col-md-12">
                    <div class="text-center">
                        <h2>Memorias RAM</h2>
                        <table id="" class="table display compact"  style="width: 100%; margin-top: 20px;">
                            <thead style='color:black; background-color: lightblue'>
                                <th class="text-center" style="width: 110px">Memoria RAM</th>
                                <th class="text-center" style="width: 110px">Nombre</th>
                                <th class="text-center" style="width: 110px">Cantidad</th>
                                <th class="text-center" style="width: 110px">Velocidad reloj</th>
                                <th class="text-center" style="width: 110px">Tiempo Señales</th>
                                <th class="text-center" style="width: 110px">Vel reloj</th>
                                <th class="text-center" style="width: 110px">Datos Transf Seg</th>
                                <th class="text-center" style="width: 110px">Nombre Modulo</th>
                                <th class="text-center" style="width: 110px">Max Cap Transf</th>
                            </thead>
                            <tbody>
                                <?php

                                $ram1 = $ficha['ram1_tipo'];
                                $sql = "SELECT ft_computador.id, memoria_ram.nombre_estandar, memoria_ram.velocidad_reloj, memoria_ram.tiempo_señales, 
                                memoria_ram.vel_reloj, memoria_ram.datos_transf_seg, memoria_ram.nom_modulo, memoria_ram.max_cap_transf FROM ft_computador 
                                INNER JOIN memoria_ram ON ft_computador.ram1_tipo = memoria_ram.id_ram WHERE  memoria_ram.id_ram = '$ram1'"; //solucion temporal

                                $query = mysqli_query($link, $sql) or die(mysqli_error($link));
                                $f = mysqli_fetch_array($query)     ?>
                                <tr>
                                    <td class="orden-dato">RAM 1</td>
                                    <td class="orden-dato"><span><?php if (isset($f['nombre_estandar'])) {
                                                                        echo $f['nombre_estandar'];
                                                                    } else {
                                                                        echo "";
                                                                    }  ?></span></td>
                                    <td class="orden-dato"><span><?php if (isset($ficha['ram1_cant'])) {
                                                                        echo  $ficha['ram1_cant'];
                                                                    } else {
                                                                        echo "";
                                                                    }  ?></span></td>
                                    <td class="orden-dato"><span><?php if (isset($f['velocidad_reloj'])) {
                                                                        echo $f['velocidad_reloj'];
                                                                    } else {
                                                                        echo "";
                                                                    }  ?></span></td>
                                    <td class="orden-dato"><span><?php if (isset($f['tiempo_señales'])) {
                                                                        echo $f['tiempo_señales'];
                                                                    } else {
                                                                        echo "";
                                                                    }  ?></span></td>
                                    <td class="orden-dato"><span><?php if (isset($f['vel_reloj'])) {
                                                                        echo $f['vel_reloj'];
                                                                    } else {
                                                                        echo "";
                                                                    }  ?></span></td>
                                    <td class="orden-dato"><span><?php if (isset($f['datos_transf_seg'])) {
                                                                        echo $f['datos_transf_seg'];
                                                                    } else {
                                                                        echo "";
                                                                    }  ?></span></td>
                                    <td class="orden-dato"><span><?php if (isset($f['nom_modulo'])) {
                                                                        echo $f['nom_modulo'];
                                                                    } else {
                                                                        echo "";
                                                                    }  ?></span></td>
                                    <td class="orden-dato"><span><?php if (isset($f['max_cap_transf'])) {
                                                                        echo $f['max_cap_transf'];
                                                                    } else {
                                                                        echo "";
                                                                    }  ?></span></td>


                                </tr>
                                <?php

                                $ram2 = $ficha['ram2_tipo'];
                                $sql2 = "SELECT ft_computador.id, memoria_ram.nombre_estandar, memoria_ram.velocidad_reloj, memoria_ram.tiempo_señales, 
                                memoria_ram.vel_reloj, memoria_ram.datos_transf_seg, memoria_ram.nom_modulo, memoria_ram.max_cap_transf FROM ft_computador 
                                INNER JOIN memoria_ram ON ft_computador.ram2_tipo = memoria_ram.id_ram WHERE  memoria_ram.id_ram = '$ram2'"; //solucion temporal

                                $query2 = mysqli_query($link, $sql2) or die(mysqli_error($link));
                                $f2 = mysqli_fetch_array($query2)     ?>
                                <tr>
                                    <td class="orden-dato">RAM 2</td>
                                    <td class="orden-dato"><span><?php if (isset($f2['nombre_estandar'])) {
                                                                        echo $f2['nombre_estandar'];
                                                                    } else {
                                                                        echo "";
                                                                    }  ?></span></td>
                                    <td class="orden-dato"><span><?php if (isset($ficha['ram2_cant'])) {
                                                                        echo  $ficha['ram2_cant'];
                                                                    } else {
                                                                        echo "";
                                                                    }  ?></span></td>
                                    <td class="orden-dato"><span><?php if (isset($f2['velocidad_reloj'])) {
                                                                        echo $f2['velocidad_reloj'];
                                                                    } else {
                                                                        echo "";
                                                                    }  ?></span></td>
                                    <td class="orden-dato"><span><?php if (isset($f2['tiempo_señales'])) {
                                                                        echo $f2['tiempo_señales'];
                                                                    } else {
                                                                        echo "";
                                                                    }  ?></span></td>
                                    <td class="orden-dato"><span><?php if (isset($f2['vel_reloj'])) {
                                                                        echo $f2['vel_reloj'];
                                                                    } else {
                                                                        echo "";
                                                                    }  ?></span></td>
                                    <td class="orden-dato"><span><?php if (isset($f2['datos_transf_seg'])) {
                                                                        echo $f2['datos_transf_seg'];
                                                                    } else {
                                                                        echo "";
                                                                    }  ?></span></td>
                                    <td class="orden-dato"><span><?php if (isset($f2['nom_modulo'])) {
                                                                        echo $f2['nom_modulo'];
                                                                    } else {
                                                                        echo "";
                                                                    }  ?></span></td>
                                    <td class="orden-dato"><span><?php if (isset($f2['max_cap_transf'])) {
                                                                        echo $f2['max_cap_transf'];
                                                                    } else {
                                                                        echo "";
                                                                    }  ?></span></td>


                                </tr>
                                <?php

                                $ram3 = $ficha['ram3_tipo'];
                                $sql3 = "SELECT ft_computador.id, memoria_ram.nombre_estandar, memoria_ram.velocidad_reloj, memoria_ram.tiempo_señales, 
                                memoria_ram.vel_reloj, memoria_ram.datos_transf_seg, memoria_ram.nom_modulo, memoria_ram.max_cap_transf FROM ft_computador 
                                INNER JOIN memoria_ram ON ft_computador.ram3_tipo = memoria_ram.id_ram WHERE  memoria_ram.id_ram = '$ram3'"; //solucion temporal

                                $query3 = mysqli_query($link, $sql3) or die(mysqli_error($link));
                                $f3 = mysqli_fetch_array($query3)     ?>
                                <tr>
                                    <td class="orden-dato">RAM 3</td>
                                    <td class="orden-dato"><span><?php if (isset($f3['nombre_estandar'])) {
                                                                        echo $f3['nombre_estandar'];
                                                                    } else {
                                                                        echo "";
                                                                    }  ?></span></td>
                                    <td class="orden-dato"><span><?php if (isset($ficha['ram3_cant'])) {
                                                                        echo  $ficha['ram3_cant'];
                                                                    } else {
                                                                        echo "";
                                                                    }  ?></span></td>
                                    <td class="orden-dato"><span><?php if (isset($f3['velocidad_reloj'])) {
                                                                        echo $f3['velocidad_reloj'];
                                                                    } else {
                                                                        echo "";
                                                                    }  ?></span></td>
                                    <td class="orden-dato"><span><?php if (isset($f3['tiempo_señales'])) {
                                                                        echo $f3['tiempo_señales'];
                                                                    } else {
                                                                        echo "";
                                                                    }  ?></span></td>
                                    <td class="orden-dato"><span><?php if (isset($f3['vel_reloj'])) {
                                                                        echo $f3['vel_reloj'];
                                                                    } else {
                                                                        echo "";
                                                                    }  ?></span></td>
                                    <td class="orden-dato"><span><?php if (isset($f3['datos_transf_seg'])) {
                                                                        echo $f3['datos_transf_seg'];
                                                                    } else {
                                                                        echo "";
                                                                    }  ?></span></td>
                                    <td class="orden-dato"><span><?php if (isset($f3['nom_modulo'])) {
                                                                        echo $f3['nom_modulo'];
                                                                    } else {
                                                                        echo "";
                                                                    }  ?></span></td>
                                    <td class="orden-dato"><span><?php if (isset($f3['max_cap_transf'])) {
                                                                        echo $f3['max_cap_transf'];
                                                                    } else {
                                                                        echo "";
                                                                    }  ?></span></td>


                                </tr>


                                <?php 
//if(isset($_POST['ram4_tipo']))
$ram4 = $ficha['ram4_tipo']; 
//else $ram4='';
$sql4 = "SELECT ft_computador.id, memoria_ram.nombre_estandar, memoria_ram.velocidad_reloj, memoria_ram.tiempo_señales, 
memoria_ram.vel_reloj, memoria_ram.datos_transf_seg, memoria_ram.nom_modulo, memoria_ram.max_cap_transf FROM ft_computador 
INNER JOIN memoria_ram ON ft_computador.ram4_tipo = memoria_ram.id_ram WHERE  memoria_ram.id_ram = '$ram4'"; //solucion temporal

$query4 = mysqli_query($link, $sql4) or die(mysqli_error($link));
$f4 = mysqli_fetch_array($query4)  

                                ?>
                                <tr>
                                    <td class="orden-dato">RAM 4</td>
                                    <td class="orden-dato"><span><?php if (isset($f4['nombre_estandar'])) {
                                                                        echo $f4['nombre_estandar'];
                                                                    } else {
                                                                        echo "";
                                                                    }  ?></span></td>
                                    <td class="orden-dato"><span><?php if (isset($ficha['ram4_cant'])) {
                                                                        echo  $ficha['ram4_cant'];
                                                                    } else {
                                                                        echo "";
                                                                    }  ?></span></td>
                                    <td class="orden-dato"><span><?php if (isset($f4['velocidad_reloj'])) {
                                                                        echo $f4['velocidad_reloj'];
                                                                    } else {
                                                                        echo "";
                                                                    }  ?></span></td>
                                    <td class="orden-dato"><span><?php if (isset($f4['tiempo_señales'])) {
                                                                        echo $f4['tiempo_señales'];
                                                                    } else {
                                                                        echo "";
                                                                    }  ?></span></td>
                                    <td class="orden-dato"><span><?php if (isset($f4['vel_reloj'])) {
                                                                        echo $f4['vel_reloj'];
                                                                    } else {
                                                                        echo "";
                                                                    }  ?></span></td>
                                    <td class="orden-dato"><span><?php if (isset($f4['datos_transf_seg'])) {
                                                                        echo $f4['datos_transf_seg'];
                                                                    } else {
                                                                        echo "";
                                                                    }  ?></span></td>
                                    <td class="orden-dato"><span><?php if (isset($f4['nom_modulo'])) {
                                                                        echo $f4['nom_modulo'];
                                                                    } else {
                                                                        echo "";
                                                                    }  ?></span></td>
                                    <td class="orden-dato"><span><?php if (isset($f4['max_cap_transf'])) {
                                                                        echo $f4['max_cap_transf'];
                                                                    } else {
                                                                        echo "";
                                                                    }  ?></span></td>


                                </tr>



                            </tbody>
                        </table>

                       
                    </div>
                </div>
                
            </div>
        </div><br>
        <div class="text-center">
            <a type="button" href="ver-activos-fijos.php" class="btn btn-danger">Volver Atrás</a>
        </div>
    </div>


</body>

</html>