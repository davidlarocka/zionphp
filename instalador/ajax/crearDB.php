<?php
$motor=$_GET['motor'];
$servidor=$_GET['server'];
$baseDatos=$_GET['nombre_bd'];
$usuario=$_GET['user'];
$pass=$_GET['pass'];

	if($motor=="mysql"){
		//conextamos a la base de datos
		$conexion= mysql_connect($servidor, $usuario, $pass)or die ("no se pudo conectar");

		// armamos la sentencia que creara la nueva base de datos
		$sql = 'CREATE DATABASE IF NOT EXISTS '.$baseDatos;
		 $respuestaQUERY=mysql_query($sql, $conexion);
		   
			echo "La base de datos ".$baseDatos." fue creada satisfactoriamente\n <br/>";
		//creamos las tablas basicas para el funcionamiento del sistema

			// creamos la tabla de usuarios
				// armamos la sentencia que creara la nueva base de datos
			$sql ='DROP TABLE IF EXISTS `'.$baseDatos.'`.`t_usuarios`;';
			$respuestaQUERY=mysql_query($sql, $conexion);
			
			$sql = 'CREATE TABLE  `'.$baseDatos.'`.`t_usuarios` (
					  `id_usuario` int(11) NOT NULL,
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
				echo "no se crearon las tablas :(";
			if($respuestaQUERY==true)
				echo "todas las tablas fueron creadas";	
			
			// insertar
			 $insert = "INSERT INTO t_usuarios (p_nombre, p_apellido, cedula, rol, password, psecreta) VALUES ('Administrador', 'ZionPHP', '0', '1', '0000', '0000')";				
			mysql_select_db($baseDatos)or die ("no se seleccionó la base de datos");
			$respuestaQUERY=mysql_query($insert, $conexion);
			if($respuestaQUERY==false)
				echo "no se insertó el usuario";
			if($respuestaQUERY==true)
				echo "se insertó el usuario";	
			
			
			// archivos de conexion del framework
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
			$gestor = fopen("../../index.php", "w") or die ("no reescribio el index"); 
			// escribimos el script php
			fwrite($gestor, "<?php\n header(\"location:paginas/CU_login\");
								unlink(\"instalador/ajax/crearDB.php\");
								rmdir(\"instalador/ajax\");
								rmdir(\"instalador\");
								
			?>"); 
			fclose($gestor); 
			echo "ZionPHP se Instaló con exito";

			echo "<META HTTP-EQUIV='refresh' CONTENT='5; URL=$PHP_SELF'>";
		}
	if($motor=="psql"){
		//conectamos a postgres
		$conn_string = "host=".$servidor."  user=".$usuario." password=".$pass."";
		$dbcon = pg_connect($conn_string);
		//creamos la base de datos del sistema y sus tablas default
		$sql = 'CREATE DATABASE '.$baseDatos;
		$respuestaQUERY=pg_query($dbcon, $sql);
		if ($respuestaQUERY==false){
			echo "no se creo la base de datos, ver manuel de instalacion";
		}else{
			echo "la base de datos fue creada con exito";
		}	
		
		//creamos las tables
		$conn_string = "host=".$servidor." dbname=".$baseDatos." user=".$usuario." password=".$pass."";
		echo $conn_string;
		$dbcon = pg_connect($conn_string);
		$sql = 'CREATE TABLE t_usuarios
					(
						  id_usuario integer NOT NULL,
						  p_nombre character(15),
						  p_apellido character(15),
						  cedula integer,
						  rol integer DEFAULT 0,
						  password character(200),
						  psecreta character(200),
						  CONSTRAINT id_usuario PRIMARY KEY (id_usuario)
					 )';
		$respuestaQUERY=pg_query($dbcon, $sql);
		if ($respuestaQUERY==false){
			echo "no se crearon las TABLAS, ver manuel de instalacion";
		}else{
			echo "las tablas fueron creadas con exito";
		}
		// archivos de conexion del framework
			// creamos el archivo de conexion
			$gestor = fopen("../../framework/db/conexion/conexion1.php", "w") or die ("no se crearon los archivos de Conexion"); 
			// escribimos el script php
			fwrite($gestor, "<?php\n\$gestorBD=\"postgres\";\n\$servidor=\"".$servidor."\";\n\$base_datos=\"".$baseDatos."\";\n\$usuario=\"".$usuario."\";\n\$pass=\"".$pass."\";\n?>"); 
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
			$gestor = fopen("../../index.php", "w") or die ("no reescribio el index"); 
			// escribimos el script php
			fwrite($gestor, "<?php\n header(\"location:paginas/CU_login\");
								unlink(\"instalador/ajax/crearDB.php\");
								rmdir(\"instalador/ajax\");
								rmdir(\"instalador\");
								
			?>"); 
			fclose($gestor); 
			echo "ZionPHP se Instaló con exito";

			echo "<META HTTP-EQUIV='refresh' CONTENT='5; URL=$PHP_SELF'>";
		
			
	}
	
	
	
	
	
?>
