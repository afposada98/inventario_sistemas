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

<body style="padding-bottom: 20px">
    <?php include '../menu/menu.php';     ?>
   
    <?php

    $id = $_GET['id'];

    $sql = "SELECT  pc.*, activos_fijos.activo_fijo, localizaciones.localizacion,proveedores.nombre AS proveedor,
    tipo_dispositivo.dispositivo, sop.descripcion AS so
            FROM ft_computador AS pc
            INNER JOIN activos_fijos ON pc.id_activo_fijo = activos_fijos.id 
            INNER JOIN s_operativo AS sop ON pc.id_so = sop.id 
            INNER JOIN localizaciones ON activos_fijos.id_localizacion = localizaciones.id
            INNER JOIN proveedores ON pc.id_proveedor = proveedores.id
            INNER JOIN tipo_dispositivo ON pc.tipo_dispositivo = tipo_dispositivo.id
            WHERE pc.id = '$id'";

    $query = mysqli_query($link, $sql) or die(mysqli_error($link));
    $ficha = mysqli_fetch_array($query);

    //print_r($ficha);

    ?>
    <div class="container">
        <div class="titulos">
            <div class="reedireccion"><a class="salida" href="./ver-computadores.php">X</a></div>
            <div>
                <h1><?php echo $ficha['localizacion']; ?></h1>
            </div>
            <h5>Computador</h5>
        </div>


        <div class="card">
            <div class="row informacion">

               
            <div class="form-group col-md-2">
                    <div class="contenedor-informacion">
                        <label class="descripcion">Activo Fijo:</label>
                        <input type="text" name="" class="form-control" value="<?=$ficha['activo_fijo']?>" readonly>
                    </div>
                </div>

                <div class="form-group col-md-2">
                    <div class="contenedor-informacion">
                        <label class="descripcion">Marca:</label>
                        <input type="text" name="marca" class="form-control" value="<?=$ficha['marca']?>" readonly>
                    </div>
                </div>          
            
           
                <div class="form-group col-md">
                    <div class="contenedor-informacion">
                        <label class="descripcion">Modelo:</label>
                        <input type="text" name="modelo" class="form-control" value="<?=$ficha['modelo']?>" readonly>
                    </div>
                </div>

                <div class="form-group col-md-2">
                    <div class="contenedor-informacion">
                        <label class="descripcion">Serie:</label>
                        <input type="text" name="serie" class="form-control" value="<?=$ficha['serie']?>" readonly>
                    </div>
                </div> 
                
                <div class="form-group col-md-2">
                    <div class="contenedor-informacion">
                        <label class="descripcion">Grupo:</label>
                        <input type="text" name="grupo" class="form-control" value="<?=$ficha['grupo']?>" readonly>
                    </div>
                </div>

                <div class="form-group col-md-2">
                    <div class="contenedor-informacion">
                        <label class="descripcion">Nombre Equipo:</label>
                        <input type="text" name="nombre_equipo" class="form-control" value="<?=$ficha['nombre_equipo']?>" readonly>
                    </div>
                </div>

                <div class="form-group col-md-2">
                    <div class="contenedor-informacion">
                        <label class="descripcion">Usuario:</label>
                        <input type="text" name="usuario" class="form-control" value="<?=$ficha['usuario']?>" readonly>
                    </div>
                </div>

                <div class="form-group col-md">
                    <div class="contenedor-informacion">
                        <label class="descripcion">Parte:</label>
                        <input type="text" name="parte" class="form-control" value="<?=$ficha['parte']?>" readonly>
                    </div>
                </div>

                <div class="form-group col-md-2">
                    <div class="contenedor-informacion">
                        <label class="descripcion">Service Tag:</label>
                        <input type="text" name="service_tag" class="form-control" value="<?=$ficha['service_tag']?>" readonly>
                    </div>
                </div>

                <div class="form-group col-md-2">
                    <div class="contenedor-informacion">
                        <label class="descripcion">Exp Serv Code:</label>
                        <input type="text" name="exp_serv_code" class="form-control" value="<?=$ficha['exp_serv_code']?>" readonly>
                    </div>
                </div>

                <div class="form-group col-md-2">
                    <div class="contenedor-informacion">
                        <label class="descripcion">Velocidad del Procesador:</label>
                        <input type="text" name="velocidadProcesador" class="form-control" value="<?=$ficha['velocidad_procesador']?>" readonly>
                    </div>
                </div>

                <div class="form-group col-md-2">
                    <div class="contenedor-informacion">
                        <label class="descripcion">Modelo Procesador:</label>
                        <input type="text" name="modeloProcesador" class="form-control" value="<?=$ficha['modelo_procesador']?>" readonly>
                    </div>
                </div>

                <div class="form-group col-md-2">
                    <div class="contenedor-informacion">
                        <label class="descripcion">Disco Duro 1:</label>
                        <input type="text" name="discoDuroUno" class="form-control" value="<?=$ficha['disco_duro_1']?>" readonly>
                    </div>
                </div>           

                <div class="form-group col-md-2">
                    <div class="contenedor-informacion">
                        <label class="descripcion">Disco Duro 2:</label>
                        <input type="text" name="discoDuroDos" class="form-control" value="<?=$ficha['disco_duro_2']?>" readonly>
                    </div>
                </div>
           
                <div class="form-group col-md-2">
                    <div class="contenedor-informacion">
                        <label class="descripcion">Disco Duro 3:</label>
                        <input type="text" name="discoDuroTres" class="form-control" value="<?=$ficha['disco_duro_3']?>" readonly>
                    </div>
                </div>

                <div class="form-group col-md-2">
                    <div class="contenedor-informacion">
                        <label class="descripcion">Ram Total:</label>
                        <input type="text" name="ram" class="form-control" value="<?=$ficha['total_ram']?>" readonly>
                    </div>
                </div>

                <div class="form-group col-md-2">
                    <div class="contenedor-informacion">
                        <label class="descripcion">Tarjeta Red:</label>
                        <input type="text" name="tarjeta_red" class="form-control" value="<?=$ficha['tarjeta_red']?>" readonly>
                    </div>
                </div>               

                <div class="form-group col-md-2">
                    <div class="contenedor-informacion">
                        <label class="descripcion">Sistema Operativo:</label>
                        <input type="text" name="so" class="form-control" value="<?=$ficha['so']?>" readonly>
                    </div>
                </div>

                <div class="form-group col-md-2">
                    <div class="contenedor-informacion">
                        <label class="descripcion">Arquitectura:</label>
                        <input type="text" name="arquitectura" class="form-control" value="<?=$ficha['arquitectura']?>" readonly>
                    </div>
                </div>

                <div class="form-group col-md-2">
                    <div class="contenedor-informacion">
                        <label class="descripcion">Clasificación:</label>
                        <input type="text" name="clasificacion" class="form-control" value="<?=$ficha['clasificacion']?>" readonly>
                    </div>
                </div>
                
                <div class="form-group col-md-4">
                    <div class="contenedor-informacion">
                        <label class="descripcion">Proveedor:</label>
                        <input type="text" class="form-control" value="<?=$ficha['proveedor']?>" readonly>
                    </div>
                </div> 

                <div class="form-group col-md-2 campos">
                    <div class="contenedor-informacion">
                        <label class="descripcion">Factura:</label>
                        <input type="text" name="factura" class="form-control" value="<?=$ficha['factura']?>" readonly>
                    </div>
                </div>     

                
                <div class="form-group col-md-2 campos">
                    <div class="contenedor-informacion">
                        <label class="descripcion">Valor Compra:</label>
                        <input type="text" name="valorComputador" class="form-control" value="<?=$ficha['valor_compra']?>" readonly>
                    </div>
                </div>

                
                <div class="form-group col-md-2">
                    <div class="contenedor-informacion">
                        <label class="descripcion">Dominio:</label>
                        <input type="text" name="dominio" class="form-control" value="<?=$ficha['dominio']?>" readonly>
                    </div>
                </div>

                 

                <div class="form-group col-md-2">
                    <div class="contenedor-informacion">
                        <label class="descripcion">Fecha Compra:</label>
                        <input type="date" name="fechaCompra" class="form-control" value="<?=$ficha['fecha_compra']?>" readonly>
                    </div>
                </div> 

                  
                <div class="form-group col-md-2">
                    <div class="contenedor-informacion">
                        <label class="descripcion">Fecha Instalación:</label>
                        <input type="date" name="fechaInstalacion" class="form-control" value="<?=$ficha['fecha_instalacion']?>" readonly>
                    </div>
                </div>

                <div class="form-group col-md-2">
                    <div class="contenedor-informacion">
                        <label class="descripcion">Fecha Retiro:</label>
                        <input type="date" name="fechaRetiro" class="form-control" value="<?=$ficha['fecha_retiro']?>" readonly>
                    </div>
                </div> 

                <div class="form-group col-md-2">
                    <div class="contenedor-informacion">
                        <label class="descripcion">Tipo Dispositivo:</label>
                        <input type="text" class="form-control" value="<?=$ficha['dispositivo']?>" readonly>
                    </div>
                </div>

                <div class="form-group col-md-2 campos">
                    <div class="contenedor-informacion">
                        <label class="descripcion">Mac Lan:</label>
                        <input type="text" name="macLan" class="form-control" value="<?=$ficha['mac_lan']?>" readonly>
                    </div>
                </div>

                <div class="form-group col-md-2 campos">
                    <div class="contenedor-informacion">
                        <label class="descripcion">Mac Wifi:</label>
                        <input type="text" name="macWifi" class="form-control" value="<?=$ficha['mac_wifi']?>" readonly>
                    </div>
                </div>

                    <div class="form-group col-md-2">
                        <label class="descripcion" for="first-name">Estado:</label>
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
            <a type="button" href="ver-computadores.php" class="btn btn-danger">Volver Atrás</a>
        </div>
    </div>


</body>

</html>