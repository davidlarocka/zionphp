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
	function menu2()
	{
		$menu='<ul id="nav" class="dropdown dropdown-horizontal">
				   <li class="first">
						<a href="../CU_inicio">
							Inicio
						</a>
					</li>
					<li class=""><a href="./" class="dir">Solicitud</a>
						<ul>
							<li class="first"><a href="../CU_iniciarSolicitud/">Iniciar Solicitud</a></li>
						</ul>
					</li>
					<li class=""><a href="./" class="dir">Recaudos</a>
						<ul>
							<li class="first"><a href="../CU_mostrarRecaudos/">Mostrar Recaudos</a></li>
						</ul>
					</li>
					<li class=""><a href="./" class="dir">Ingesar Informacion de los Recaudos</a>
						<ul>
							<li class="first"><a href="../CU_mostrarInformacionRecaudos/">Mostrar Informacion Recaudos</a></li>
						</ul>
					</li>
					<li class=""><a href="../CU_login/cerrarSesion.php">Cerrar</a></li>	
					<li class="dir last">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</li>
				</ul>';
				return $menu;
	
	}
	function menuInicio()
	{
		$menu='<ul id="nav" class="dropdown dropdown-horizontal">
						<li class="first"><a href="../CU_registrarUsuario/">Registrate</a></li>
						<li class="dir last"><br/></li>
					</ul>';
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
