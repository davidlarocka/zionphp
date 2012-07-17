<?php 
class menus
{

	function menu1()
	{
		$menu='<ul id="nav" class="dropdown dropdown-horizontal">
		<li class="first"><a href="../CU_inicio">Inicio</a></li>
		<li  class=""><a href="./" class="dir">Gestionar</a>
			<ul>
				<li class="last"><a href="./">mi cuenta</a></li>
			</ul>
		</li>
		
		<!--
		<li  class=""><a href="./" class="dir">Documentos</a>
			<ul>
				<li class="first"><a href="../CU_solicitarDocumento/">Solicitud de Documentos</a></li>
				<li class="last"><a href="../CU_consultarSolicitudes">Consultar de Solicitudes</a></li>
				
			</ul>
		</li>
		-->
		
		<li class=""><a href="../CU_login/cerrarSesion.php">Cerrar</a></li>	
		<li class="dir last">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</li>
				</ul>';
				return $menu;
	}
	function menu2()	//Menú Principal: Administrador
	{
		$menu='<ul id="nav" class="dropdown dropdown-horizontal">
				   <li class="first">
						<a href="../CU_inicio">
							<b>Inicio</b>
						</a>
					</li>
					<li class=""><a href="./" class="dir"><b>Usuarios</b></a>
						<ul>
							<li class="first"><a href="../CU_gestionarUsuario/">Gestionar Usuarios</a></li>
						</ul>
					</li>
					<li class=""><a href="./" class="dir"><b>Datos Propietarios</b></a>
						<ul>
							<li class="first"><a href="../CU_asignarVehiculo/">Asignar Vehículo</a></li>
						</ul>
					</li>
					<li class=""><a href="./" class="dir"><b>Registro de Acceso</b></a>
						<ul>
							<li class="first"><a href="../CU_accesoInterno/">Acceso Interno</a></li>
							<li class="first"><a href="../CU_accesoVisitante/">Acceso Visitante</a></li>
						</ul>
					</li>
					<li class=""><a href="./" class="dir"><b>Puestos x Dependencia</b></a>	
						<ul>
							<li class="first"><a href="../CU_asignarCantidadPuestos/">Asignar Cantidad</a></li>
						</ul>
					</li>
					<li class=""><a href="./" class="dir"><b>Incidencias</b></a>	
						<ul>
							<li class="first"><a href="../CU_registrarIncidencia/">Registrar Incidencias</a></li>
							<li class="first"><a href="../CU_consultarIncidencia/">Consultar Incidencias</a></li>
						</ul>
					</li>
					<li class=""><a href="../CU_login/cerrarSesion.php"><b>Cerrar</b></a></li>	
					<li class="dir last">&nbsp;</li>
				</ul>';
				return $menu;
	
	}
	function menuInicio()
	{
		$menu='';
		return $menu;
		
	}
	function menuRegistro()
	{
		$menu='<ul id="nav" class="dropdown dropdown-horizontal">
						<li class="first"><a href="../CU_login/">Inicio</a></li>
						<li class="dir last"><br/></li>
					</ul>';
		return $menu;
		
	}		
}
?>
