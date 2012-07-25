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
	include ("../../configuracion.php");
		//verifican si se van a mostrar errores al ejecutar el codigo
		if($mostrarErroresPHP=="si")
		error_reporting(E_ALL); 
		if($mostrarErroresPHP=="si")
		$erro=ini_set("display_errors", 1);
		if($mostrarErroresPHP=="si")
		echo "<font color='#FF0000'> Reporte de Errores codigo PHP: </font><br/>";
		
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
				// se instancia el marco HTML
				$plantilla=new marcohtml();
				
				//desplegamos los ErroresPHP en el codigo
				
				//se verifica si el usuario puede acceder sin loguearse al CU
				if($_SERVER["REQUEST_URI"]=="/".$nombreArchivo."/paginas/CU_login/" or 
				   $_SERVER["REQUEST_URI"]=="/".$nombreArchivo."/paginas/CU_login/index.php" or //excepcion 1
				  
				   $_SERVER["REQUEST_URI"]=="/".$nombreArchivo."/paginas/CU_registrarUsuario/" or 
				   $_SERVER["REQUEST_URI"]=="/".$nombreArchivo."/paginas/CU_registrarUsuario/index.php" //excepcion 2
				   ){
						$salidahtml=$plantilla->html($tituloPagina,$Nmenu,$mensaje);
						exit;
					
				 }		
				//se verifica que no se pueda acceder por la url haciendo puente
				if($_SESSION['cedula']==""){
						print_r($_SESSION);
						$mensaje='
						
							Acceso denegado!!!<br/> Debe iniciar Sesion con un usuario válido
							<br/>
						<input type="button" tabindex="6" value="Regresar" onclick="location.href =\'../CU_login/index.php\'" />
						
						';
						$salidahtml=$plantilla->html($tituloPagina,"menuInicio",$mensaje);
						
				}
				else
				{
					
						$salidahtml=$plantilla->html($tituloPagina,$Nmenu,$mensaje);
				}
			}
	}
?>
