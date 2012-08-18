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

echo "ZionPHP Dice: Ejecutando... <br/>";
			
	
	// archivo de configuracion del sistema
	// creamos el archivo de conexion
	echo "ZionPHP Dice: Abriendo Archivo... <br/>";
	$nombreArchivo="../../../configuracion.php";
	
	$lineas = file($nombreArchivo)or die("ZionPHP Dice: ocurrio un error mientras intentaba comentar los SQL :-( <br/>");
	$i=1;
	
	//se pasea por todas las lineas para armar un archivo nuevo
	foreach($lineas as $valor)
	{
			
			
			$archivo.=$lineas[$i];
			$i++;
	}
	//echo $archivo;
	//reemplazamos el parametro $mostrarConsultasSQL="no"; por $mostrarConsultasSQL="si";
	$archivo_nuevo=str_replace("\$mostrarConsultasSQL=\"si\";","\$mostrarConsultasSQL=\"no\";",$archivo);
	
	echo "ZionPHP Dice: Escribiendo Archivo... <br/>";
	//reescribimos el archivo
	file_put_contents($nombreArchivo, "<?php \n".$archivo_nuevo)or die("ZionPHP Dice: ocurrio un error mientras intentaba comentar los SQL :-(");
	echo "<br/>ZionPHP Dice: Se comentaron Todos los SQL...<br/>
		Done.
	";
	
?>
