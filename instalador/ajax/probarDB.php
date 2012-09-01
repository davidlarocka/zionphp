<?php
error_reporting(0);
$motor=$_GET['motor'];
$servidor=$_GET['server'];
$nombre_bd=$_GET['nombre_bd'];
$usuario=$_GET['user'];
$pass=$_GET['pass'];
$usar_crear_db=$_GET['usar_crear_db'];

//print_r($_GET); 
//chequeamos si vamos a crear una nueva base de datos o vamos a utilizar una base de datos existente
if($usar_crear_db=="crear"){


	//cuando el motor es mysql	
	if($motor=="mysql"){	
		$estadoCliente=mysql_get_client_info();
		//si esta instalado mysql entonces dice la version
		if($estadoCliente==true){
			echo "version del cliente de mysql: ".mysql_get_client_info();

			$link =  mysql_connect($servidor, $usuario, $pass);

			//verifica si se conecto
			if($link==false){
					echo "parametros invalidos para la conexion";
				}else{
					echo "Conexion Exitosa <br/><p align='center'><input type='button' value='Instalar base de datos' onclick=\" crearDB(server.value, 
																																		user.value,
																																		pass.value, 
																																		nombre_bd.value, 
																																		gestor_bd.value, 
																																		nombre_sis.value, 
																																		acronimo.value, 
																																		admin.value, 
																																		clave_admin.value,
																																		usar_crear_db.value)\" /></p>
		";	
			}

		}else{
			
		echo "ERROR: Servicio Mysql se encuentra detenido";
		}
	}
	if($motor=="psql"){
		
		//tratamos de conectar a postgres
		$conn_string = "host=".$servidor."  user=".$usuario." password=".$pass."";
			try{
				$dbcon = pg_connect($conn_string);
			}catch(Exception $e){
				echo "Fallo al intentar conectar al servidor especificado :(";
			}
			
		
		$versionCliente=pg_version();
			if($dbcon==false){
					echo "<font color='#E63232'><b>no hay conexion a postgres!</b></font>, revise nuevamente los parametros para crear la conexion y la base de datos";
			}else{
					
					echo "<font color='#42AD17'><b>version del cliente PostgreSQL:</b></font> ".$versionCliente['client']."<br/>";
					echo "conexion exitosa<p align='center'><input type='button' value='Instalar' onclick=\" crearDB(server.value, 
																													 user.value, 
																													 pass.value, 
																													 nombre_bd.value, 
																													 gestor_bd.value, 
																													 nombre_sis.value, 
																													 acronimo.value, 
																													 admin.value, 
																													 clave_admin.value, 
																													 usar_crear_db.value)\" />";
			}
			
	}
}
//cuando vamos a usar una base de datos existente comprobamos que la misma exista en realidad
else if($usar_crear_db=="usar"){
	
	//cuando el motor es mysql	
	if($motor=="mysql"){	
		$estadoCliente=mysql_get_client_info();
		//si esta instalado mysql entonces dice la version
		if($estadoCliente==true){
			//echo "version del cliente de mysql: ".mysql_get_client_info();

			$link =  mysql_connect($servidor, $usuario, $pass);
			$link2 =  mysql_select_db($nombre_bd);
			

			//verifica si se conecto
			if($link==false){
					echo "<font color='#A52A2A'>parametros invalidos para la conexion</font>";
				}else{
					if($link2==false)
						echo "
						<b><font color='#000000'>Se conectó a MYSQL de Manera Satisfactoria,<br/></font>
						<font color='#000000'>Sin embargo la base de datos especificada no existe</font>, ¿Desea que ZionPHP la Cree?</b>
						<input type='button' value='Si, Instalar Sistema creando una nueva BD' onclick=\" crearDB(server.value, 
																												  user.value, 
																												  pass.value,
																												  nombre_bd.value, 
																												  gestor_bd.value, 
																												  nombre_sis.value, 
																												  acronimo.value, 
																												  admin.value, 
																												  clave_admin.value, 
																												  'crear')\" /><input type='button' value='no'/>";
					else
					    echo "<b><font color='#126812'>Conexion Exitosa </font><b><br/><p align='center'><input type='button' value='Instalar base de datos' onclick=\" crearDB(server.value, 
																																												user.value, 
																																												pass.value, 
																																												nombre_bd.value, 
																																												gestor_bd.value, 
																																												nombre_sis.value, 
																																												acronimo.value, 
																																												admin.value, 
																																												clave_admin.value, 
																																												usar_crear_db.value)\" /></p>";
			}

		}else{
			
		echo "ERROR: Servicio Mysql se encuentra detenido";
		}
	}
	if($motor=="psql"){
		
		$conn_string = "host=".$servidor." dbname=".$nombre_bd." user=".$usuario." password=".$pass."";
		
		//tratamos de conectar a postgres
			try{
				$dbcon = pg_connect($conn_string);
			}catch(Exception $e){
				echo "Fallo al intentar conectar al servidor especificado :(";
			}
			
		
		$versionCliente=pg_version();
			if($dbcon==false){
					echo "<font color='#E63232'><b>no hay conexion a postgres!</b></font>, revise nuevamente los parametros para crear la conexion y la base de datos";
			}else{
					
					echo "<font color='#42AD17'><b>version del cliente PostgreSQL:</b></font> ".$versionCliente['client']."<br/>";
					echo "conexion exitosa<p align='center'><input type='button' value='Instalar' onclick=\" crearDB(server.value, 
																													 user.value, 
																													 pass.value, 
																													 nombre_bd.value, 
																													 gestor_bd.value, 
																													 nombre_sis.value, 
																													 acronimo.value, 
																													 admin.value, 
																													 clave_admin.value, 
																													 usar_crear_db.value)\" />";
			}
			
	}
	
}
?>
