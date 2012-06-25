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

//datos pernitentes al proyecto
$nombreSistema=$_GET['nombre_sis'];
$nombreArchivo=$_GET['acronimo'];
$admin=$_GET['admin'];
$clave_admin=$_GET['clave_admin'];

//datos pertienetes a la BD
$motor=$_GET['motor'];
$servidor=$_GET['server'];
$baseDatos=$_GET['nombre_bd'];
$usuario=$_GET['user'];
$pass=$_GET['pass'];
$insert = "INSERT INTO t_usuarios (user_login,p_nombre, p_apellido, cedula, rol, password, psecreta) VALUES ('".$admin."', 'Administrador', 'ZionPHP', '0', '1', '".$clave_admin."', '0000')";				

	if($motor=="mysql"){
		// Conectamos a la base de datos
		$conexion= mysql_connect($servidor, $usuario, $pass)or die ("no se pudo conectar");

		// armamos la sentencia que creara la nueva base de datos
		$sql = 'CREATE DATABASE IF NOT EXISTS '.$baseDatos;
		 $respuestaQUERY=mysql_query($sql, $conexion);
		   
			echo "La base de datos <font='#227324'>".$baseDatos."</font> fue creada satisfactoriamente\n <br/>";
		//creamos las tablas basicas para el funcionamiento del sistema

			// creamos la tabla de usuarios
				// armamos la sentencia que creara la nueva base de datos
			$sql ='DROP TABLE IF EXISTS `'.$baseDatos.'`.`t_usuarios`;';
			$respuestaQUERY=mysql_query($sql, $conexion);
			
			$sql = 'CREATE TABLE  `'.$baseDatos.'`.`t_usuarios` (
					  `id_usuario` int(11) NOT NULL,
					  `user_login` varchar(45) DEFAULT NULL,
					  `p_nombre` varchar(45) DEFAULT NULL,
					  `p_apellido` varchar(45) DEFAULT NULL,
					  `cedula` int(15) DEFAULT NULL,
					  `rol` int(15) DEFAULT NULL,
					  `password` varchar(50) DEFAULT NULL,
					  `psecreta` varchar(45) DEFAULT NULL,
					  PRIMARY KEY (`id_usuario`)
					) ;';
			$respuestaQUERY=mysql_query($sql, $conexion);
			if($respuestaQUERY==false)
				echo "no se crearon las tablas :(<br/>";
			if($respuestaQUERY==true)
				echo "todas las tablas fueron creadas<br/>";	
			
			// insertar
			mysql_select_db($baseDatos)or die ("no se seleccionó la base de datos");
			$respuestaQUERY=mysql_query($insert, $conexion);
			if($respuestaQUERY==false)
				echo "no se insertó el usuario<br/>";
			if($respuestaQUERY==true)
				echo "se insertó el usuario<br/>";	
			
			
			
			
			// archivo de configuracion del sistema
			// creamos el archivo de conexion
			$gestor1 = fopen("../../configuracion.php", "w") or die ("no se creo el archivo de configuracion"); 
			// escribimos el script php
			fwrite($gestor1, "<?php\n\$cadenaConexionGlobal=\"conexion/conexion1.php\";\n\$plantilla=\"default\";\n\$nombreSistema=\"".$nombreSistema."\";\n\$nombreArchivo=\"".$nombreArchivo."\";?>"); 
			fclose($gestor1); 	
			@chmod ("../../configuracion.php",0777); 
			
			// archivos de conexion del sistema
			// creamos el archivo de conexion
			$gestor = fopen("../../framework/db/conexion/conexion1.php", "w") or die ("no se crearon los archivos de Conexion"); 
			// escribimos el script php
			fwrite($gestor, "<?php\n\$gestorBD=\"mysql\";\n\$servidor=\"".$servidor."\";\n\$base_datos=\"".$baseDatos."\";\n\$usuario=\"".$usuario."\";\n\$pass=\"".$pass."\";\n?>"); 
			fclose($gestor); 	
			@chmod ("../../framework/db/conexion/conexion1.php",0777); 
			
			
			// eliminamos los ficheros de instalacion	
			unlink("ajax.php");
			unlink("probarDB.php");	
			unlink("../barra_progreso.gif");
			unlink("../tab.png");
			unlink("../tab2.png");
			unlink("../logo.png");
			unlink("../db-icon.png");
			unlink("../ventana.png");	
			unlink("../siguiente.png");	
			$gestor = fopen("../../index.php", "w") or die ("no reescribio el index"); 
			// escribimos el script php
			fwrite($gestor, "<?php\n header(\"location:paginas/CU_login\");
								unlink(\"instalador/ajax/crearDB.php\");
								rmdir(\"instalador/ajax\");
								rmdir(\"instalador\");
								
			?>"); 
			fclose($gestor); 
			echo "ZionPHP se Instaló con exito";

			echo "<a href=''><img src='ir.png' /></a>";
		}
	if($motor=="psql"){
		//conectamos a postgres
		$conn_string = "host=".$servidor."  user=".$usuario." password=".$pass."";
		$dbcon = pg_connect($conn_string);
		//creamos la base de datos del sistema y sus tablas default
		$sql = 'CREATE DATABASE '.$baseDatos;
		$respuestaQUERY=pg_query($dbcon, $sql);
		if ($respuestaQUERY==false){
			echo "no se creo la base de datos, ver manuel de instalacionz<br/>";
		}else{
			echo "La base de datos <font='#227324'>".$baseDatos."</font> fue creada satisfactoriamente\n <br/>";
		}	
		
		//creamos las tables
		$conn_string = "host=".$servidor." dbname=".$baseDatos." user=".$usuario." password=".$pass."";
		$dbcon = pg_connect($conn_string);
		$sql = 'CREATE TABLE t_usuarios
					(
						  id_usuario SERIAL,
						  user_login varchar(45),
						  p_nombre varchar(45),
						  p_apellido varchar(45),
						  cedula integer,
						  rol integer DEFAULT 0,
						  password varchar(45),
						  psecreta varchar(200),
						  CONSTRAINT id_usuario PRIMARY KEY (id_usuario)
					 )';
		$respuestaQUERY=pg_query($dbcon, $sql);
		if ($respuestaQUERY==false){
			echo "no se crearon las TABLAS, ver manuel de instalacion<br/>";
		}else{
			echo "las tablas fueron creadas con exito<br/>";
		}
		$insertResult = pg_query($insert);
		if ($insertResult) {
			echo "Usuario administrador creado exitosamente<br/>";
		} else {
			echo "Hubo un problema tratando de crear el usuario administrador.<br/>";
		}
		// archivo de configuracion del sistema
			// creamos el archivo de conexion
			$gestor1 = fopen("../../configuracion.php", "w") or die ("no se creo el archivo de configuracion"); 
			// escribimos el script php
			fwrite($gestor1, "<?php\n\$cadenaConexionGlobal=\"conexion/conexion1.php\";\n\$plantilla=\"default\";\n\$nombreSistema=\"".$nombreSistema."\";\n\$nombreArchivo=\"".$nombreArchivo."\";?>"); 
			fclose($gestor1); 	
			@chmod ("../../configuracion.php",0777); 
		
		// archivos de conexion del framework
			// creamos el archivo de conexion
			$gestor = fopen("../../framework/db/conexion/conexion1.php", "w") or die ("no se crearon los archivos de Conexion"); 
			// escribimos el script php
			fwrite($gestor, "<?php\n\$gestorBD=\"postgres\";\n\$servidor=\"".$servidor."\";\n\$base_datos=\"".$baseDatos."\";\n\$usuario=\"".$usuario."\";\n\$pass=\"".$pass."\";\n\n?>"); 
			fclose($gestor); 	
			@chmod ("../../framework/db/conexion/conexion1.php",0777); 
		
			// eliminamos los ficheros de instalacion	
			unlink("ajax.php");
			unlink("probarDB.php");	
			unlink("../barra_progreso.gif");
			unlink("../tab.png");
			unlink("../tab2.png");
			unlink("../logo.png");
			unlink("../db-icon.png");
			unlink("../ventana.png");	
			unlink("../siguiente.png");	
			unlink("../ir.png");	
			$gestor = fopen("../../index.php", "w") or die ("no reescribio el index"); 
			// escribimos el script php
			fwrite($gestor, "<?php\n header(\"location:paginas/CU_login\");
								unlink(\"instalador/ajax/crearDB.php\");
								rmdir(\"instalador/ajax\");
								rmdir(\"instalador\");
								
			?>"); 
			fclose($gestor); 
			echo "ZionPHP se Instaló con exito";

			echo "<a href=''><img src='ir.png' /></a>";
		
			
	}
	
	
	
	
	
?>
