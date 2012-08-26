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
$clave_admin=md5 ($_GET['clave_admin']); //clave encriptada
$fecha=date('Y-m-d');

//datos pertienetes a la BD
$motor=$_GET['motor'];
$servidor=$_GET['server'];
$baseDatos=$_GET['nombre_bd'];
$usuario=$_GET['user'];
$pass=$_GET['pass'];


$insert = "INSERT INTO t_usuarios (user_login,nombres, apellidos, cedula, rol, clave, id_psecreta, rsecreta, fecha_registro, fecha_expiracion  ) VALUES ('".$admin."', 'Administrador', 'ZionPHP', '0', '1', '".$clave_admin."', '1', 'zionphp', '".$fecha."', '2222-12-31' )";				

	if($motor=="mysql"){
		// Conectamos a la base de datos
		$conexion= mysql_connect($servidor, $usuario, $pass)or die ("no se pudo conectar");

		// armamos la sentencia que creara la nueva base de datos
		$sql = 'CREATE DATABASE IF NOT EXISTS '.$baseDatos;
		$respuestaQUERY=mysql_query($sql, $conexion);
			if($respuestaQUERY==false)
				echo "no se creó la base de datos :(<br/>";
			if($respuestaQUERY==true)
				echo "La base de datos <font color='#227324'>".$baseDatos."</font> fue creada satisfactoriamente\n <br/>";
				
		//creamos las tablas basicas para el funcionamiento del sistema

			// creamos la tabla de usuarios
				// armamos la sentencia que creara la nueva base de datos
			$sql ='DROP TABLE IF EXISTS `'.$baseDatos.'`.`t_usuarios`;';
			$respuestaQUERY=mysql_query($sql, $conexion);
			
			$sql = 'CREATE TABLE  `'.$baseDatos.'`.`t_usuarios` (
					  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
					  `user_login` varchar(45) DEFAULT NULL,
					  `nombres` varchar(45) DEFAULT NULL,
					  `apellidos` varchar(45) DEFAULT NULL,
					  `email` varchar(45) DEFAULT NULL,
					  `cedula` int(15) DEFAULT NULL,
					  `rol` int(15) DEFAULT NULL,
					  `clave` varchar(50) DEFAULT NULL,
					  `id_psecreta` int(2) DEFAULT NULL,
					  `rsecreta` varchar(45) DEFAULT NULL,
					  `fecha_registro` date DEFAULT NULL,
					  `fecha_expiracion` date DEFAULT NULL,
					  `estatus` int(2) DEFAULT 1,
					  PRIMARY KEY (`id_usuario`)
					) ;';
			$respuestaQUERY=mysql_query($sql, $conexion);
			if($respuestaQUERY==false)
				echo "no se crearon las tablas usuarios :(<br/>";
			if($respuestaQUERY==true)
				echo "todas las tablas usuarios fueron creadas<br/>";
			$sql = 'CREATE TABLE `'.$baseDatos.'`.`t_psecretas` (
						`id_psecreta` int(11) NOT NULL AUTO_INCREMENT,
						 `pregunta` varchar(150),
						 PRIMARY KEY (`id_psecreta`)
					);';
			$respuestaQUERY=mysql_query($sql, $conexion);
			if($respuestaQUERY==false)
				echo "no se crearon las tablas pregunta secreta :(<br/>";
			if($respuestaQUERY==true)
				echo "todas las tablas pregunta secreta fueron creadas<br/>";		
				
				
					
			
			// insertar usuario 
			mysql_select_db($baseDatos)or die ("no se seleccionó la base de datos");
			$respuestaQUERY=mysql_query($insert, $conexion);
			if($respuestaQUERY==false)
				echo "no se insertó el usuario<br/>";
			if($respuestaQUERY==true)
				echo "se insertó el usuario<br/>";	
			
			//se crea la tabla menus
			
			$sql ='CREATE TABLE  `'.$baseDatos.'`.`menus` (
					  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
					  `nivel` int(11) NOT NULL,
					  `id_menu_padre` int(11) NOT NULL,
					  `descripcion` varchar(30) NOT NULL,
					  `url` varchar(100) NOT NULL,
					  `acceso` int(11) NOT NULL ,
					  `orden` int(3),
					  PRIMARY KEY (`id_menu`)
				  );';
			
			$respuestaQUERY=mysql_query($sql, $conexion);
			if($respuestaQUERY==false)
				echo "no se crearon las tablas menus :(<br/>";
			if($respuestaQUERY==true)
				echo "todas las tablas menus fueron creadas<br/>";
				
			//insertamos los menus default
			$sql ='INSERT INTO `'.$baseDatos.'`.`menus` (id_menu, nivel, id_menu_padre, descripcion, url, acceso  ) VALUES  
				 (1,1,0,\'Inicio\',\'../CU_inicio\',1),
				 (2,1,0,\'Usuarios\',\'\',1),
				 (3,2,2,\'todos\',\'../CU_gestionarUsuario\',1),
				 (4,1,0,\'Registrate\',\'../CU_registrarUsuario\',0),
				 (5,1,0,\'Log In\',\'../CU_login\',0),
				 (6,1,0,\'Salir\',\'../CU_login/cerrarSession.php\',1);';	
			$respuestaQUERY=mysql_query($sql, $conexion);
			if($respuestaQUERY==false)
				echo "no se insertaron los menus default :(<br/>";
			if($respuestaQUERY==true)
				echo "todos los menus fueron creados con exito<br/>";	
			
			// archivo de configuracion del sistema
			// creamos el archivo de conexion
			$gestor1 = fopen("../../configuracion.php", "w") or die ("no se creo el archivo de configuracion"); 
			// escribimos el script php
			fwrite($gestor1, "<?php\n\$cadenaConexionGlobal=\"conexion/conexion1.php\";\n\$plantilla=\"benzion\";\n\$nombreSistema=\"".$nombreSistema."\";\n\$nombreArchivo=\"".$nombreArchivo."\";//despliega los errores del sistema en el codigo php\n\$mostrarErroresPHP=\"no\"; //si=muestra errores  no=no muestra errores\n//despliega las consultas sql \n\$mostrarConsultasSQL=\"no\"; //si=muestra errores  no=no muestra errores \n\$moduloDesarrollador=\"no\"; //si=habilita modulo de desarrollador  no=desabilita modulo de desarrollador\n\n?>"); 
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
			unlink("../ir.png");	
			unlink("../irsis.png");	
			unlink("../bgbody.jpg");
			unlink("../fondo_consola.png");	
			$gestor = fopen("../../index.php", "w") or die ("no reescribio el index"); 
			// escribimos el script php
			fwrite($gestor, "<?php\n header(\"location:paginas/CU_login\");
								unlink(\"instalador/ajax/crearDB.php\");
								rmdir(\"instalador/ajax\");
								rmdir(\"instalador\");						
							?>"); 
			fclose($gestor); 
			echo "ZionPHP se Instaló con exito";

			echo "<p align='right'><a href=''>Ir al Sistema</a></p>";
		}
		
		
	//=============================POSTGRESQL ==============================================//
	//======================================================================================//	
	
	if($motor=="psql"){
		//conectamos a postgres
		$conn_string = "host=".$servidor."  user=".$usuario." password=".$pass."";
		$dbcon = pg_connect($conn_string);
		//creamos la base de datos del sistema y sus tablas default
		$sql = 'CREATE DATABASE '.$baseDatos;
		$respuestaQUERY=pg_query($dbcon, $sql);
		if ($respuestaQUERY==false){
			echo "no se creo la base de datos, ver manual de instalacionz<br/>";
		}else{
			echo "La base de datos <font color='#227324'>".$baseDatos."</font> fue creada satisfactoriamente\n <br/>";
		}	
		
		//conectamos a la base de datos recien creada
		$conn_string = "host=".$servidor." dbname=".$baseDatos." user=".$usuario." password=".$pass."";
		$dbcon = pg_connect($conn_string);
		if ($dbcon ==false){
			echo "no se pudo conectar a la base de datos :( <br/>";
		}else{
			echo "se conectó a la base de datos <font color='#227324'>".$baseDatos."</font> satisfactoriamente\n <br/>";
		}
		//creamos las tables
		$sql = 'CREATE TABLE t_usuarios
					(
						  id_usuario SERIAL,
						  user_login character varying(45),
						  nombres character varying(45),
						  apellidos character varying(45),
						  email character varying(45),
						  cedula integer,
						  rol integer DEFAULT 0,
						  clave character varying(45),
						  id_psecreta integer DEFAULT 0,
						  rsecreta character varying(45) DEFAULT NULL,
						  fecha_registro date DEFAULT NULL,
						  fecha_expiracion date DEFAULT \'2222-12-31\',
						  estatus integer DEFAULT \'1\',
						  CONSTRAINT id_usuario PRIMARY KEY (id_usuario)
					 )';
		$respuestaQUERY=pg_query($dbcon, $sql);
		if ($respuestaQUERY==false){
			echo "no se crearon las TABLAS de usuario, ver manual de instalacion<br/>";
		}else{
			echo "las tablas de usuarios fueron creadas con exito<br/>";
		}
		
		
		
		
		$insertResult = pg_query($insert);
		if ($insertResult) {
			echo "Usuario administrador creado exitosamente<br/>";
		} else {
			echo "Hubo un problema tratando de crear el usuario administrador.<br/>";
		}
		
		//crear tablas para los menus
		//se crea la tabla menus	
			$sql ='CREATE TABLE  menus (
					  id_menu SERIAL,
					  nivel integer,
					  id_menu_padre integer,
					  descripcion character varying(50),
					  url character varying(150),
					  acceso integer,
					  orden integer,
					  CONSTRAINT id_menu PRIMARY KEY (id_menu)
				  );';
		$respuestaQUERY=pg_query($dbcon, $sql);
		if ($respuestaQUERY==false){
			echo "no se crearon las TABLAS de los menus, ver manual de instalacion<br/>";
		}else{
			echo "las tablas de los menus fueron creadas con exito<br/>";
		}
		
		//insertamos los menus default
			$sql ='INSERT INTO menus (nivel, id_menu_padre, descripcion, url, acceso  ) VALUES  (1,0,\'Inicio\',\'../CU_inicio\',1),
				 (1,0,\'Usuarios\',\'\',1),
				 (2,2,\'todos\',\'../CU_gestionarUsuario\',1),
				 (1,0,\'Registrate\',\'../CU_registrarUsuario\',0),
				 (1,0,\'Log In\',\'../CU_login\',0),
				 (1,0,\'Salir\',\'../CU_login/cerrarSession.php\',1);';	
		
		$respuestaQUERY=pg_query($dbcon, $sql);
		if ($respuestaQUERY==false){
			echo "Hubo problemas tratando de insertar menus default<br/>";
		}else{
			echo "los menus fueron creados con exito<br/>";
		}
		
		// archivo de configuracion del sistema
			// creamos el archivo de conexion
			$gestor1 = fopen("../../configuracion.php", "w") or die ("no se creo el archivo de configuracion"); 
			// escribimos el script php
			fwrite($gestor1, "<?php\n\$cadenaConexionGlobal=\"conexion/conexion1.php\";\n\$plantilla=\"benzion\";\n\$nombreSistema=\"".$nombreSistema."\";\n\$nombreArchivo=\"".$nombreArchivo."\";//despliega los errores del sistema en el codigo php\n\$mostrarErroresPHP=\"no\"; //si=muestra errores  no=no muestra errores\n//despliega las consultas sql \n\$mostrarConsultasSQL=\"no\"; //si=muestra errores  no=no muestra errores \n\$moduloDesarrollador=\"no\"; //si=habilita modulo de desarrollador  no=desabilita modulo de desarrollador\n\n?>"); 
			fclose($gestor1); 	
			@chmod ("../../configuracion.php",0777); 
		
		// archivos de conexion del framework
			// creamos el archivo de conexion
			$gestor = fopen("../../framework/db/conexion/conexion1.php", "w") or die ("no se crearon los archivos de Conexion"); 
			// escribimos el script php
			fwrite($gestor, "<?php\n\$gestorBD=\"postgres\";\n\$servidor=\"".$servidor."\";\n\$base_datos=\"".$baseDatos."\";\n\$usuario=\"".$usuario."\";\n\$pass=\"".$pass."\";\n	\n?>"); 
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
			unlink("../irsis.png");
			unlink("../bgbody.jpg");
			unlink("../fondo_consola.png");	
			$gestor = fopen("../../index.php", "w") or die ("no reescribio el index"); 
			// escribimos el script php
			fwrite($gestor, "<?php\n header(\"location:paginas/CU_login\");
								unlink(\"instalador/ajax/crearDB.php\");
								rmdir(\"instalador/ajax\");
								rmdir(\"instalador\");
								
			?>"); 
			fclose($gestor); 
			echo "ZionPHP se Instaló con exito";

			echo "<p align='right'><a href=''>ir al sistema</a></p>";
		
			
	}
	
	
	
	
	
?>
