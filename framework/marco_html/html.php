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
    along with Foobar.  If not, see <http://www.gnu.org/licenses/>. 
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
	

//definimos la clase html	
	class Html {
		
			function marco ($mensaje){
				
				require ("menus/menusUsuario.php");
				
				
				//imprime la plantilla
				echo '<center><table border="1" width="90%" height="100%" aling="center">
						  <tr height="20%">
							  <td> 
							 <img src="../../framework/marco_html/imagenes/logo.png"  alt"logo.png" width="20%" height="100%"/>
							  </td>
						  </tr>
						  <tr height="10%" >
							  <td> 
							  '.$menu_admin.'
							  </td>
						  </tr>
						   <tr height="70%" >
							  <td> 
								'.$mensaje.'
							  </td>
						  </tr>
					  </table></center>';
				
				
			}
		
		
	}


?>
