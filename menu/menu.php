<style>
.items-navbar{
	padding-left: 1em;
	padding-right: 1em;
}
</style>

<?php include $_SERVER["DOCUMENT_ROOT"] . '/Inventario/enlaces_sc/enlaces.php'; ?>


<nav class="navbar navbar-expand-lg navbar navbar-light bg-light" style="box-shadow: 0px 2px 11px;">
		<a class=" navbar-brand" href="/inventario/inicio.php">
	<h3 style=" color: #777;font-size: 28px;">INVENTARIO</h3> </a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarNavDropdown">
		<ul class="navbar-nav mr-auto">
			<!--<li class="nav-item">
					<a class="nav-link" href="../turno/registrar-turno.php">Informe</a>
				</li>-->

			<li class="dropdown nav-item items-navbar">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color: #777; text-decoration: none;">Maestros<b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a class="dropdown-item" href="/inventario/proveedor/ver-proveedores.php">Proveedores</a></li>
					<li>
						<hr class="dropdown-divider">
					</li>
					<li><a class="dropdown-item" href="/inventario/area/ver-areas.php">Areas</a></li>
					<li>
						<hr class="dropdown-divider">
					</li>
					<li><a class="dropdown-item" href="/inventario/tipo-dispositivo/ver-tipo-dispositivos.php">Tipo Dispositivo</a></li>
					<li>
						<hr class="dropdown-divider">
					</li>
					<li><a class="dropdown-item" href="/inventario/tipo-activo/ver-tipo-activo.php">Tipo Activo Fijo</a></li>
					<li>
						<hr class="dropdown-divider">
					</li>
					<li><a class="dropdown-item" href="/inventario/localizaciones/ver-localizaciones.php">Localizaciones</a></li>
					<li>
						<hr class="dropdown-divider">
					</li>
					<li><a class="dropdown-item" href="/inventario/activos-fijos/ver-activos-fijos.php">Activos Fijos</a></li>
				</ul>
			</li>

			<li class="nav-item dropdown items-navbar">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color: #777; text-decoration: none;">Activos Fijos<b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a class="dropdown-item" href="/inventario/computadores/ver-computadores.php">Computadores</a></li>
					<li>
						<hr class="dropdown-divider">
					</li>
					<li><a class="dropdown-item" href="/inventario/monitores/ver-monitor.php">Monitores</a></li>
					<li>
						<hr class="dropdown-divider">
					</li>
					<li><a class="dropdown-item" href="/inventario/teclados/ver-teclados.php">Teclados</a></li>
					<li>
						<hr class="dropdown-divider">
					</li>
					<li><a class="dropdown-item" href="/inventario/mouses/ver-mouses.php">Mouse</a></li>
					<li>
						<hr class="dropdown-divider">
					</li>
					<li><a class="dropdown-item" href="/inventario/impresoras/ver_impresoras.php">Impresoras</a></li>
					<li>
						<hr class="dropdown-divider">
					</li>
					<li><a class="dropdown-item" href="/inventario/tablets/ver_tablets.php">Tablets</a></li>
					<li>
						<hr class="dropdown-divider">
					</li>
					<li><a class="dropdown-item" href="/inventario/radio_enlaces/ver_radioenlaces.php">Radio Enlaces</a></li>
					<li>
						<hr class="dropdown-divider">
					</li>
					<li><a class="dropdown-item" href="/inventario/routers/ver_routers.php">Suiches Y Routers</a></li>
				</ul>
			</li>

			
		

			<li class="nav-item items-navbar">
				<a style="padding: 0;" class="nav-link" href="/inventario/direcciones_ip/ver-direcciones-ip.php">Direcciones IP</a>
			</li>


			<li class="nav-item dropdown items-navbar">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color: #777; text-decoration: none;">Facturación<b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a class="dropdown-item" href="/inventario/lineas_productos/ver_lineas_productos.php">Líneas de Productos</a></li>
					<li>
						<hr class="dropdown-divider">
					</li>
					<li><a class="dropdown-item" href="/inventario/catalogo/ver_catalogo.php">Catálogo</a></li>
					<li>
						<hr class="dropdown-divider">
					</li>
					<li><a class="dropdown-item" href="/inventario/factura/ver_factura.php">Facturas</a></li>
					
				</ul>
			</li>

			<li class="nav-item dropdown items-navbar">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color: #777; text-decoration: none;">Informes<b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a class="dropdown-item" href="/inventario/informes/informe_lineas.php">Líneas de Productos</a></li>													
				</ul>
			</li>
		</ul>

		<ul class="nav navbar-nav navbar-right">
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color: #777; text-decoration: none;"><?php echo $usuario; ?> <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a class="dropdown-item" href="../logout.php">Cerrar Sesión</a></li>
				</ul>
			</li>
		</ul>

		
	</div>
</nav>


