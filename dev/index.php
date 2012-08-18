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

//verificamos si está habilitado el modulo de desarrollador
if($moduloDesarrollador=="si"){	

?>
<html>
  <head>
    <title></title>
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/tool-tip.css" />
    <link rel="stylesheet" href="css/menu.css" type="text/css">
  </head>
  <body>
	<center><div class="ventana">
		<div>
			<div class="banner"></div>
			<!-- div id="tool-tip">
				<!--ul class="tt-links">
					<li><a class="tt-gplus" href="#"><span>Google Plus</span></a></li>
					<li><a class="tt-twitter" href="#"><span>Twitter</span></a></li>
					<li><a class="tt-dribbble" href="#"><span>Dribbble</span></a></li>
					<li><a class="tt-facebook" href="#"><span>Facebook</span></a></li>
					<li><a class="tt-linkedin" href="#"><span>LinkedIn</span></a></li>
					<li><a class="tt-forrst" href="#"><span>Forrst</span></a></li>
				</ul>
			</div -->
			<!--div class="tool-tip">
			
			</div -->
		</div -->
			<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
		<div style="border-radius:10px;">
			<div class="menu">
				    <ul id="nav"><br/><br/><br/>
				    <!--    <li class="current"><a href="#">Inicio</a></li>
				        <li><a href="#">Tutoriales de ZIONPHP</a>
				            <ul>
				                <li><a href="#">Basicos</a>
									<ul>
				                        <li><a href="#">Instalacion</a></li>
				                        <li><a href="#">MI primer Modulo</a></li>
				                    </ul>
				                </li>
				                
				                <li><a href="#">Intermedios</a>
				                    <ul>
				                        <li><a href="#">jQuery</a></li>
				                        <li><a href="#">JS</a></li>
				                    </ul>
				                </li>
				            </ul>
				        </li>
				        <li><a href="#">Codigos|Clases|Plantillas</a>
				            <ul>
				                <li><a href="#">Por categoria</a>
				                    <ul>
				                        <li><a href="#">PHP</a></li>
				                        <ul>
				                        	<li><a href="#">Otros</a></li>	
				                        </ul>
				                    </ul>
				                </li>
				            </ul>
				        </li>
				        <li><a href="#">Descargar</a></li>
						<li><a href="#">&nbsp;</a></li>
						<li><a href="#">&nbsp;</a></li>
						<li><a href="#">&nbsp;</a></li> -->
						
				    </ul>
						
			</div>
			<div id="contenido" style="color:white;text-align:left;">
				
				 <ul id="navCU"><br/>
				        <li><a href="#">Gestores</a><br/>
				            <ul>
				                <li><a href="#">Casos de Uso</a>
									<ul>
				                        <li><a onclick="mostrarOpcionesCU()" href="#"><span>Nuevo</span></a></li>
				                        <li><a href="#">Editar</a></li>
				                    </ul>
				                </li>
				                
				                <li><a href="#">Conexiones BD</a>
				                    <ul>
				                        <li><a href="#">Nueva</a></li>
				                        <li><a href="#">Editar Existente</a></li>
				                    </ul>
				                </li>
				            </ul>
				        </li>
				       
				      
						
				    </ul>
				
				<table border="0">
					<tr height="300px">
						<td>
							<div id="area_opciones" >
							
							</div>	
						
						
						</td>
						<td><b>Visor de Sucesos</b><br/>
							<div id="contenedor" name="contenedor"  class="visor_sucesos">
								ZionPHP Dice: Hola! Bonito dia no?<br/>
							</div> 	

						
						</td>
					</tr>
					<tr height="20px">
						<td width="600px">
							
						
						</td>
						<td><b>Debug</b>
							<ul class="tt-links">
								<li><div id="sql"><a class="tt-SQL" onclick="comentarSQL()" href="#"><span>Comentar SQL</span></a></div></li>
							
								<li><div id="php"><a class="tt-twitter" onclick="mostrarErroresPHP()" href="#"><span>Mostrar/Ocultar Errores PHP</span></a></div></li>
					
							</ul>
						
						</td>
					</tr>
				</table>
				
				
				
				
			</div>
		</div>
	</div>
	</center>
	   <br/><p align="center"><font color="black"><b>ZionPHP V1.0<br/>Proyecto de Software Libre</b></font>
		    </p>	
  </body>
</html>
<?php 
}else{
echo "Acceso Denegado!!!";	
	
}
?>

