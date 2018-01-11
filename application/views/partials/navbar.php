<div class='navbar navbar-default navbar-fixed-top' role='navigation'>
	<div class='container'>
		<div class='navbar-header'>
			<button type='button' class='navbar-toggle' data-toggle='collapse' data-target='.navbar-collapse'>
				<span class='sr-only'>Toggle navigation</span>
				<span class='icon-bar'></span>
				<span class='icon-bar'></span>
				<span class='icon-bar'></span>
			</button>
			<a class='navbar-brand' href="<?=base_url('home')?>" title = 'Página principal'><img alt='Brand' src="<?=base_url('resources/img/ico.ico')?>"></a>
		</div>
		<div class='navbar-collapse collapse'>
			<ul class='nav navbar-nav'>
				<li><a href='#'>Catálogos <span class='caret'></span></a>
					<ul class='dropdown-menu'>
						<li><a href="<?=base_url('prefijo-de-os')?>">Secuencias</a></li>
						<li><a href="<?=base_url('catalogo-de-niveles')?>">Niveles</a></li>
						<li><a href='#'>Proyectos</a></li>
						<li><a href='#'>Estados de OS</a></li>
						<li><a href='#'>Estados de tareas</a></li>
						<li><a href='#'>Tipo de comentarios</a></li>
						<li><a href='#'>Tipo de servicios</a></li>
						<li role='separator' class='divider'></li>
						<li><a href="<?=base_url('catalogo-de-marcas-de-dispositivos')?>">Marcas de dispositivos</a></li>
						<li><a href="<?=base_url('catalogo-de-modelos-de-dispositivos')?>">Modelos de dispositivos</a></li>
						<li><a href='#'>Tipo de dispositivos</a></li>
					</ul>
				</li>
				<li><a href='#'>Administrar <span class='caret'></span></a>
					<ul class='dropdown-menu'>
						<li><a href='#'>Oficinas</a></li>
						<li><a href='#'>Centros de trabajo</a></li>
						<li><a href='#'>Inventario</a></li>
						<li role='separator' class='divider'></li>
						<li><a href="<?=base_url('catalogo-de-marcas-de-camionetas')?>">Camionetas</a></li>
						<li><a href='#'>Marcas de camionetas</a></li>
						<li><a href='#'>Modelos de camionetas</a></li>
						<li role='separator' class='divider'></li>
						<li><a href='#'>Perfiles de usuario</a></li>
						<li><a href='#'>Usuarios</a></li>
					</ul>
				</li>
				<li><a href='#'>Reportes <span class='caret'></span></a>
					<ul class='dropdown-menu'>
						<li><a href='#'>Servicios interno <span class='caret'></span></a>
							<ul class='dropdown-menu'>
								<li><a href='#'>Nueva orden interno</a></li>
								<li><a href='#'>Nueva orden externa</a></li>
								<li><a href='#'>Asignación de ordenes</a></li>
								<li><a href='#'>Ordenes en proceso</a></li>
								<li><a href='#'>Ordenes finalizadas</a></li>
								<li><a href='#'>historial de ordenes</a></li>
							</ul>
						</li>
						<li><a href='#'>Servicios externos <span class='caret'></span></a>
							<ul class='dropdown-menu'>
								<li><a href='#'>Folios por CT</a></li>
								<li><a href='#'>Folios con detalle CT</a></li>
							</ul>
						</li>
						<li><a href='#'>Globales <span class='caret'></span></a>
							<ul class='dropdown-menu'>
								<li><a href='#'>Evaluación de servicios</a></li>
								<li><a href='#'>Reporte por proyecto</a></li>
								<li><a href='#'>Reporte de actividades</a></li>
								<li><a href='#'>Reporte general de equipamiento</a></li>
								<li><a href='#'>Equipamiento por CT</a></li>
								<li><a href='#'>Resumen de servicios por técnico</a></li>
								<li><a href='#'>Reporte detallado de servicios por técnico</a></li>
								<li><a href='#'>Reporte de inventario de CT</a></li>
							</ul>
						</li>
					</ul>
				</li>
			</ul>
			<ul class='nav navbar-nav navbar-right'>
				<li><a href='#'>Default</a></li>
				<li><a href='#'>Usuario <span class='caret'></span></a>
					<ul class='dropdown-menu'>
						<li><a href='#'>Action</a></li>
						<li><a href='#'>Another action</a></li>
						<li><a href = "<?=base_url('login/logout')?>"> Salir</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</div>

