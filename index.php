<?php
/* 
 * This file is part of ZionPHP.
 *
 * ZionPHP is free software you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * ZionPHP is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with ZionPHP. If not, see <http://www.gnu.org/licenses/>.
 */

/*=================================================================	
//=========FICHA TECNICA DE LA CLASE	
//=================================================================
	*FRAMEWORK VERSION: 0.0.1
	*CLASE: instalador
	*CREADO POR: TSU David García
	* CORREO ELECTRONICO:davidlarocka@gmail.com
	* FECHA CREACION: 27 DE MAYO DE 2012
	*ULTIMO MANTENIMIENTO:              POR:  

//=================================================================	*/
//requerimos el instalador 
	require ("instalador/ajax/ajax.php");
	include("i18n/i18n.php");

//verificamos el nombre de la carpeta raiz
	$urlServer=$_SERVER["REQUEST_URI"];
	$nombreArchivo=preg_replace("[/]", "", $urlServer);

?>
<head>
	<title>
		ZionPHP v1.0
	</title>
</head>
<body style="background:url(instalador/bgbody.jpg);">
<br/>
<center>
<div id="sombra" style="padding-top: 30px;padding-bottom: 3px; width:900px; border-radius:30px; background:url(instalador/fondo_consola.png);">	

<table align="center" border="0" style="width:99.5%; height:550px;">
	<tr><td>
<?php	
//echo "<p align='left'><img src='instalador/logo.png'  height='100px' /></p>";	

?>

<table align="center" border="0" style="width:80%;">
	<tr>
		<p align="center"><img src="zionphp-logo.png" alt="zion" height="100px" width="280px"/></p>
		<td style="background-image:url(instalador/tab2.png);height:40px;">
			<p align="center"> <b><font color="#FFFFFF">Datos del Sistema</font></b><img src="instalador/ventana.png" width="32px" height="35px"/><br/></p>
		</td>
		<td style="background-image:url(instalador/tab2.png);height:40px;">
			<p align="center"> <b><font color="#FFFFFF">Base de Datos por Defecto<img src="instalador/db-icon.png" width="32px" height="35px"/></font></b><br/></p>
		</td>
	</tr>
	<tr>
		<td width="30%" id="td_sis">
			<p align="right">
				<form name="crear" id="crear" method="post" action="">
				
					<br/><b>Nombre del Sistema</b><br/><input type="text" id="nombre_sis" /><br/><br/>
						<b> Carpeta Raiz</b><br/><input type="text" id="acronimo" value="<?php echo $nombreArchivo ?>" readonly /><br/><br/>
						 <b>Super Administrador</b><br/><input type="text" id="admin" value="" /><br/><br/>
						 <b>Password</b> <br/><input type="password" id="clave_admin" value="" />
							
						 <br/>
						 <p align="center"><img src="instalador/siguiente.png" alt="siguiente" onclick="mostrar_td('td_bd', 'td_sis')" width="50px" height="50px" />
						 </p>
						 <br/>
			
			</p>
		</td>
		<td id="td_bd" style="display:none;text-align:right;">
		
					 <p align="left"> 
					 <br/>
					
					  </p>
					  <select id="usar_crear_db">
					
							<option value="crear">Crear Base de datos </option>
							<option value="usar">Usar Base de Datos Existente</option>
						</select>
					   
					   <b>Motor<select id="gestor_bd" >
					
							<option value="mysql">MySQL</option>
							<option value="psql">Postgresql <img src="ksks" /></option>
						</select>
						<br/>
						<br/>
						Nombre de la base de datos<input type="text" id="nombre_bd" value="<?php echo $nombreArchivo ?>" /><br/><br/>
						Servidor<input type="text" id="server" /><br/><br/>
						Usuario<input type="text" id="user" /><br/><br/>
						Password</b><input type="password" id="pass" /><br/>
									<br/><input type="button" value="Comprobar conexion" onclick="comprobarConexion(server.value, user.value, pass.value, gestor_bd.value, usar_crear_db.value, nombre_bd.value )"><div id="contenedor"></div>
								
										
		</td>
	</tr>
	
</table>
<p align="right"><i><b>Vamos a si&oacute;n, Somos libres!...</b></i> </p>
</td></tr>
</table>
</div>
</center>
<?php
  include('footer.php')
?>
</body>
