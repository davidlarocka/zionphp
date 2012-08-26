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
		
		<div style="border-radius:10px;">
			<div class="menu">
				<table border="0" width="100%">
					<tr>
						<td width="80%">
							<img src="images/logo.png" width="385px" height="50px" />
						</td>
						<td>
							 <img src="images/sql.png" width="40px" height="40px" class="sql" />	
							 <img src="images/php.png" width="40px" height="40px" class="sql" />
							 <a href="../paginas/CU_login" target="_blank"><img src="images/ir.png" width="100px" height="40px" class="sql" /></a>
						</td>
					</tr>
				</table>
				
				   
				
					
												    

			</div>
			<div id="contenido" style="color:white;text-align:left;">
							
				 <ul id="navCU"><br/>
				        <li><a href="#">Gestores</a><br/>
				            <ul>
				                <li><a href="#" style="color:black;">Modulos</a>
									<ul>
				                        <li><a onclick="mostrarOpcionesCU()" href="#"><span>Nuevo</span></a></li>
				                        <li><a href="#">Editar</a></li>
				                    </ul>
				                </li>
				                
				                <li><a href="#" style="color:black;">Conexiones BD</a>
				                    <ul>
				                        <li><a href="#">Nueva</a></li>
				                        <li><a href="#">Editar Existente</a></li>
				                    </ul>
				                </li>
				            </ul>
				        </li>
				       
				      
						
				    </ul>
				
				<table border="0">
					<tr height="200px">
						<td colspan="2">
							
						    <div id="contenedor" name="contenedor"  class="visor_sucesos" onmousedown="dragStart(event), this.id" >
								<img src="images/php.png" width="20px" height="20px" class="sql" />
								<img src="images/min.png" width="20px" height="20px" class="sql" onclick="minimizar()"/>
								<img src="images/max.png" width="23px" height="23px" class="sql" onclick="maximizar()"/>
								<br/>
								ZionPHP Dice: Hola! Bonito dia no?<br/>
							</div> 	
					
					 
						<div id="area_opciones" >
							
							</div>	
						</td>
						
					</tr>
					<tr height="20px">
						<td width="600px">
							
						
						</td>
						<td>
						
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

