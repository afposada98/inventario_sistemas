<!DOCTYPE html>
<html lang="en">

<head>
	
	<meta charset="UTF-8">
	<title>Login</title>
	<?php include './enlaces_scripts/enlaces.php'; ?>

	<script>
		function validar() {
			if (document.formulario.login.value == "" || document.password.value == "") {
				alert("Todos los Campos deben ser Diligenciados.");
				return false;
			} else
				return true;
		}

		function volver() {
			document.location = ('http://intranet/cpalmira/');
		}

		function contrasena() {
			document.location = ('enviar.html');
		}
	</script>

	<style>
		.imBackground {
			position: fixed;
			margin: 0px;
			padding: 0px;
			border: none;
			width: 1264px;
			height: 948px;
			max-height: none;
			width: 100%;
			max-width: 100%;
			z-index: -999999;
			left: 0px;
			top: 0;
		}

		body {
			background-color: steelblue;
		}
	</style>

</head>

<body>
	<div class="top-content">
		<!-- Top menu -->
		<nav style="background: transparent; border-color: transparent;" class="navbar navbar-inverse navbar-no-bg" role="navigation"></nav>
		<!--<img class="imBackground" src="./img/se.jpg" >-->
	</div>
	<div class="">
		<div class="container  ">
			<div class="row ">
				<h1 class="col-md-12 col-sm-12" style="text-align:center; color: #edf0f7; margin-bottom:45px;"> SISTEMA DE INVENTARIO </h1>

				<div class="col-center animated" style="visibility: visible; animation-name: fadeInUp; background-color: #eee;  box-shadow: 0px 2px 17px; border-radius: 5px; width: 32.666667% !important; float: none;  margin-left: auto;  margin-right: auto;">
					<div class="form-top text-center" style="padding: 1px 20px 1px 25px;background: #eee; margin-top: 30px;">
						<div class="form-top-left">
							<h2>Iniciar Sesión</h2>
						</div>
						<div class="form-top-right">
							<span aria-hidden="true" class="typcn typcn-pencil"></span>
						</div>
					</div>
					<div class="form-bottom" style="overflow: hidden; border-radius: 5px; padding: 5px 25px 20px 25px; background: #eee;">
						<form role="form" name="formulario" action="page/validacion.php" method="post">
							<div class="form-group">
								<label class="sr-only" for="form-first-name">login</label>
								<input type="text" name="login" required="required" autofocus placeholder="Login..." class="form-first-name form-control" id="form-first-name">
							</div>
							<div class="form-group">
								<label class="sr-only" for="form-last-name">Password</label>
								<input type="password" required="required" name="password" placeholder="password..." class="form-last-name form-control" id="form-last-name">
							</div>
							<div class=" row ">
								<div class=" col-md-12 text-center">
									<button type="submit" class="btn btn-info btn-xs float" id="btnLogin">Aceptar</button>
									<button type="button" class="btn btn-xs btn-info " onclick="volver();">Volver</button>
								</div>
							</div>

						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>