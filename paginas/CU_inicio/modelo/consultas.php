<?php 

//clase que trae las conexiones y consultas a la base de datos
	
		
		
		/* si queremos que se conecte a otra cadena de conexion diferente a la establecida en el archivo de configuracion simplemente
			le indicamos la ruta de los parametros de conexion 
		*/
			//$conexionDB->cadenaConexion="../conexion/conexion.php";
			
		class consultas{
			
				
				
				function consultarNombre(){
					require ("../../class/db/class_db.php");
		
					//hecemos una instancia de db consultas
					$conexionDB= new db_consultas();
					
					
					
					//nos conectamos a la base de datos y traemos todas las funcionalidades de la clase bd_consultas
					
					//indicamos los campos a consultar
					$campos=array("nombre");
					
					//indicamos la tabla donde vamos a buscar los campos
					$tablas=array("admin");
					
					$respuesta=$conexionDB->select($campos,$tablas);
					
						return $respuesta;
					
				}
				
			
		}	

?>
