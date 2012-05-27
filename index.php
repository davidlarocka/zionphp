

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
	*CLASE:
	*CREADO POR: TSU David García
	* CORREO ELECTRONICO:davidlarocka@gmail.com
	* FECHA CREACION: 1 DE MAYO DE 2012
	*ULTIMO MANTENIMIENTO:              POR:  

//=================================================================	*/

require ("instalador/ajax/ajax.php");

?>
<body bgcolor="#1A1A1A">
<table align="center" border="0" bgcolor="white" style="width:95%; height:100%;">
	<tr><td>
<?php	
echo "<p align='center'><img src='instalador/logo.png'  /><br/>";	
echo "<center><b>Instalador</b></center>";
echo "<center><img src='instalador/barra_progreso.gif' /><br/><br/></center>";
?>

<table align="center" border="0" style="width:80%;">
	<tr>
		<td style="background-image:url(instalador/tab.png);height:40px;">
			<p align="left"> <b>Datos del Sistema</b><br/></p>
		</td>
		<td style="background-image:url(instalador/tab2.png);height:40px;">
			<p align="left"> <b>Base de Datos</b><br/></p>
		</td>
	</tr>
	<tr>
		<td width="30%">
			<p align="right">
				<form name="crear" id="crear" method="post" action="">
				
					<br/>Nombre del Sistema<input type="text" id="nombre_sis" /><br/>
										Acronimo<input type="text" id="acronimo" /><br/>
			</p>
		</td>
		<td>
		
					 <p align="left"> Gestor de Base de Datos<select id="gestor_bd" ></p>
							<option value="mysql">Mysql</option>
							<option value="psql">Postgresql</option>
						</select>
						Nombre de la base de datos<input type="text" id="nombre_bd" /><br/><br/>
						Servidor<input type="text" id="server" />
						Usuario<input type="text" id="user" />
						Password<input type="password" id="pass" /><br/>
									<input type="button" value="Comprobar conexion" onclick="comprobarConexion(server.value, user.value, pass.value)"><div id="contenedor"></div>
									
									<br/>	
		</td>
	</tr>
	
</table>
</td></tr>
</table>
</body>
