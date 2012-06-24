<?php
/*copyright:This file is part of zionPHP 1.0

    zionPHP 1.0 is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    zionPHP 1.0 is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with  zionPHP 1.0.  If not, see <http://www.gnu.org/licenses/>. 
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

//verificamos el nombre de la carpeta raiz
	$urlServer=$_SERVER["REQUEST_URI"];
	$nombreArchivo=ereg_replace("[/]", "", $urlServer);

?>
<body bgcolor="#1A1A1A">
<table align="center" border="0" bgcolor="white" style="width:95%; height:90%;">
	<tr><td>
<?php	
echo "<p align='center'><img src='instalador/logo.png'  /><br/>";	
echo "<center><b>Instalador</b></center>";
echo "<center><img src='instalador/barra_progreso.gif' /><br/><br/></center>";
?>

<table align="center" border="0" style="width:80%;">
	<tr>
		<td style="background-image:url(instalador/tab.png);height:40px;">
			<p align="center"> <b>Datos del Sistema</b><img src="instalador/ventana.png" width="32px" height="35px"/><br/></p>
		</td>
		<td style="background-image:url(instalador/tab2.png);height:40px;">
			<p align="center"> <b><font color="#FFFFFF">Base de Datos <img src="instalador/db-icon.png" width="32px" height="35px"/></font></b><br/></p>
		</td>
	</tr>
	<tr>
		<td width="30%">
			<p align="right">
				<form name="crear" id="crear" method="post" action="">
				
					<br/>Nombre del Sistema<br/><input type="text" id="nombre_sis" /><br/><br/>
						 Acronimo<br/><input type="text" id="acronimo" value="<?php echo $nombreArchivo ?>" /><br/><br/>
						 Super Administrador<br/><input type="text" id="admin" value="" /><br/><br/>
						 Password <br/><input type="password" id="clave_admin" value="" />
							
						 <br/><br/><br/><br/><br/><br/><br/>
			
			</p>
		</td>
		<td>
		
					 <br/><p align="left"> Gestor de Base de Datos<select id="gestor_bd" ><br/><br/></p>
							<option value="mysql">Mysql</option>
							<option value="psql">Postgresql</option>
						</select><br/><br/>
						Nombre de la base de datos<input type="text" id="nombre_bd" value="<?php echo $nombreArchivo ?>" /><br/><br/>
						Servidor<input type="text" id="server" /><br/><br/>
						Usuario<input type="text" id="user" /><br/><br/>
						Password<input type="password" id="pass" /><br/><br/>
									<br/><input type="button" value="Comprobar conexion" onclick="comprobarConexion(server.value, user.value, pass.value, gestor_bd.value)"><div id="contenedor"></div>
									
									<br/>	
		</td>
	</tr>
	
</table>
</td></tr>
</table>
<p align="center"> <b><font color="#FFFFFF" size="2px">Framework oficial del Ministerio del Poder Popular para Relaciones Interiores y Justicia<br/>Software libre bajo licencia GNU GPLv3</font></b><br/></p>
</body>
