<?php //parte del proyecto de farmacia

include("../base_datos/conexion.php");

if(isset($_GET["opt"]) && $_GET["opt"]=="area"){
	$link = Conectarse2();
	$link->query("insert into procesos(name) value (\"$_POST[name]\")");
	
	setcookie("areasadd",1);
	header("Location: nuevo_combo.php");
}
else if(isset($_GET["opt"]) && $_GET["opt"]=="estantante"){
	$link = Conectarse2();
	$link->query("insert into sectores(name,id_proceso) value (\"$_POST[name]\",$_POST[id_proceso])");
	setcookie("estantesadd",1);
	header("Location: nuevo_combo.php");
}
else if(isset($_GET["opt"]) && $_GET["opt"]=="instrumento"){
	$link = Conectarse2();
	$link->query("insert into equipos(name,id_sector) value (\"$_POST[name]\",$_POST[id_sector])");
	setcookie("instrumentosadd",1);
	header("Location: nuevo_combo.php");
}
else if(isset($_GET["opt"]) && $_GET["opt"]=="all"){
	$link = Conectarse2();
	$link->query("insert into combo(id_proceso,id_sector,id_equipo) value ($_POST[id_proceso],$_POST[id_sector],$_POST[id_equipo])");
	setcookie("comboadd",1);
	header("Location: index.php");
}
?>