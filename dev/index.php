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
	*FRAMEWORK VERSION: 1.0
	*CLASE: dev 
	*CREADO POR: TSU David García
	* CORREO ELECTRONICO:davidlarocka@gmail.com
	* FECHA CREACION: 24 DE j DE 2012
	*ULTIMO MANTENIMIENTO:              POR:  

//=================================================================	*/
//requerimos modulos de funciones de desarrollador
	require ("mod/ajax.php");
//requerimos configuracion
	require ("../configuracion.php");


	

?>
<head>
	<title>
		ZionPHP v1.0
	</title>
</head>
<body bgcolor="#1A1A1A">
<br/>
<div id="sombra" style="background:#BFBFBF;padding-top: 3px;padding-bottom: 3px;">	

	<p align='left'>
	<div style="background:#000108;width:1255px;">
					<img src='mod/imagenes/logo.png'  height='100px' width="500px" />
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					
					<img src='mod/imagenes/tools.png'  height='100px' width="100px" />
	</div>
	</p>
<table align="center" border="0" style="width:98%;min-height:500px;height:500px;background:white;border-collapse:collapse;border-radius:30px; color:black;">
	
	<tr>
		<td width="30%" id="td_sis" valign="top">
			<p align="right">
				<form name="crear" id="crear" method="post" action="">
					<br/>
					<br/>&nbsp;&nbsp;Version del Framework: <b>V1.0</b><br/>
						 &nbsp;&nbsp;Nombre del Sistema: <b><?php echo $nombreSistema ?></b><br/>
						 &nbsp;&nbsp;Acronimo del Sistema: <b><?php echo $nombreArchivo ?><br/></b>
						
		
			</p>
			
			<div id="contenedor_acciones" name="contenedor_acciones" style="background:white;width:300px;height:300px;margin-left:30px">
			<h3><font color="#0A0000"><br/>&nbsp;&nbsp;&nbsp;Acciones<br/><h3><font/>
				<img src='mod/imagenes/comentarSQL.png'  height='60px' width="120px" onclick="comentarSQL()"/>
				<img src='mod/imagenes/ocultarSQL.png'  height='60px' width="120px" onclick="descomentarSQL()"/>
			
			</div>
		</td>
		<td  id="td_consola" valign="top">
			<p align="right">
				<br/>
				<br/>
				<p align="left"><h3>Visor de Sucesos</h3></p>
				<div id="contenedor" name="contenedor" style="background:black;width:500px;height:300px;color:white;overflow-y:scroll;">
				ZionPHP Dice: Hola! Bonito dia no?<br/>
				</div> 		
			
			</p>
		</td>
		
	</tr>
	
</table>
<br/>

</div>

<?php
  include('footer.html')
?>
</body>
