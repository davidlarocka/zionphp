<?php
$motor=$_GET['motor'];
$servidor=$_GET['server'];
$usuario=$_GET['user'];
$pass=$_GET['pass'];

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
					echo "Conexion Exitosa <br/><p align='center'><input type='button' value='Instalar base de datos' onclick=\" crearDB(server.value, user.value, pass.value, nombre_bd.value, gestor_bd.value, nombre_sis.value, acronimo.value)\"></p>
		";	
			}

		}else{
			
		echo "ERROR: Servicio Mysql se encuentra detenido";
		}
	}
	if($motor=="psql"){
		
		//tratamos de conectar a postgres
		$conn_string = "host=".$servidor."  user=".$usuario." password=".$pass."";
		$dbcon = pg_connect($conn_string);
		$versionCliente=pg_version();
			if($dbcon==false){
					echo "no hay conexion a postgres";
			}else{
					
					echo "version del cliente PostgreSQL: ".$versionCliente['client']."<br/>";
					echo "conexion exitosa<p align='center'><input type='button' value='Instalar' onclick=\" crearDB(server.value, user.value, pass.value, nombre_bd.value, gestor_bd.value, nombre_sis.value, acronimo.value)\">";
			}
			
	}
?>
