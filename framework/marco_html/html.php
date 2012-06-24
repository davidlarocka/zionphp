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
		
			function salidaFinal ($tituloPagina,$Nmenu,$mensaje)
			{
				//traemos la configuracion para ver que plantilla usa
				require ("../../configuracion.php");
				//traemos la configuracion para ver que plantilla usa
				$urlPlantilla='plantillas/'.$plantilla.'.php';
				
				//buscamos que plantilla estamos utilizando
				try{
				require ($urlPlantilla);
				}catch (Exception $e){
				echo "no se configuro la plantilla, por favor indique una plantilla valida en el archivo de configuracion";	
				}

				
				
	//====================================================================================			
	// excepciones de session: contiene una lista de url donde no hace falta estar auntentificado para ver el CU		
	//====================================================================================			
				$plantilla=new marcohtml();
				if($_SERVER["REQUEST_URI"]==$nombreArchivo."/sistema/paginas/CU_login/" or 
				   $_SERVER["REQUEST_URI"]==$nombreArchivo."/sistema/paginas/CU_login/index.php" or //excepcion 1
				   
				   $_SERVER["REQUEST_URI"]==$nombreArchivo."/sistema/paginas/CU_registrarUsuario/" or 
				   $_SERVER["REQUEST_URI"]==$nombreArchivo."/sistema/paginas/CU_registrarusuario/index.php" //excepcion 2
				   ){
					session_destroy();
					$salidahtml=$plantilla->html($Nmenu,$mensaje);
					exit;
					
				 }		
				$salidahtml=$plantilla->html($tituloPagina,$Nmenu,$mensaje);

			}
	}
?>
