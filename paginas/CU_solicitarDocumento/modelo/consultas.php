<?php 
/*=================================================================	
//=========FICHA DE LA ClASE	
//=================================================================		
	*SISTEMA VERSION: 0.0.1
	*CLASE:class_db.php
	*DESCRIPCION:clase donde se establecen los parametros de las consultas 
	*CREADO POR: "desarrollador"
	*CORREO ELECTRONICO: 
	*FECHA CREACION: 
	*FECHA ULTIMO MANTENIMIENTO:              POR:  

//=================================================================	*/	
	class consultas{
	// estos metodos son hechos por el desarrollador
		function selectDocumentos(){
		//traemos la clase db_consultas que contiene los metodos y atributos que interactian con el modelo
			require ("../../framework/db/class_db.php");
			//hecemos una instancia de db consultas
			//nos conectamos a la base de datos y traemos todas las funcionalidades de la clase bd_consultas
			$conexionDB= new db_consultas();
			
			//aki indicamos una cadena de conexion distinta a la indicada en la configuracion
			//$conexionDB->cadenaConexion="conexion/conexion2.php";
		//======== armar la consulta =============================			
					
			//indicamos los campos a consultar EN UN ARREGLO
			$campos=array("descripcion"         //1
						
						  ); 
			//indicamos la tabla donde vamos a buscar los campos EN UN ARREGLO
			$tablas=array("t_documentos"
						  );
			//indicamos la condicion donde vamos a buscar los campos EN UN ARREGLO
			$condicion=array(""
			
			);
							
			$groupBy=array();
			$ordenBy="";
			$limit="";
			//devolvemos los resultados de la consulta
			return $respuesta=$conexionDB->select($campos,$tablas,$condicion);
			}
				
			
	}	

?>
