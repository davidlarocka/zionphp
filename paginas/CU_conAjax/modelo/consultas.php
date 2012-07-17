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
				
			
	//============================================================================
	//============Busca todos los tipos de documentos
	//============================================================================
		function selectSolicitudesUsuario($id_usuario,$tipo_titular){
		//traemos la clase db_consultas que contiene los metodos y atributos que interactian con el modelo
			require ("../../../framework/db/class_db.php");
			//hecemos una instancia de db consultas
			//traemos todas las funcionalidades de la clase bd_consultas
			$conexionDB= new db_consultas();
			//le decimos que se va a conectar a esta cadena de conexion
			$conexionDB->cadenaConexion="conexion/conexion.php";
			//aki indicamos una cadena de conexion distinta a la indicada en la configuracion
			//$conexionDB->cadenaConexion="conexion/conexion2.php";
		//======== armar la consulta =============================			
					
			//indicamos los campos a consultar EN UN ARREGLO
			$campos=array("id_solicitud"         //1
						
						  ); 
			//indicamos la tabla donde vamos a buscar los campos EN UN ARREGLO
			$tablas=array("t_solicitud"
						  );
			//indicamos la condicion donde vamos a buscar los campos EN UN ARREGLO
			$condicion=array("id_usuario=$id_usuario",
							"id_tipo_titular=$tipo_titular"
			
			);
							
			$groupBy=array();
			$ordenBy="";
			$limit="";
			//devolvemos los resultados de la consulta
			return $respuesta=$conexionDB->select($campos,$tablas,$condicion);
			}
			//insertar nueva solicitud
			function insertNuevaSolicitud($id_usuario,$tipo_titular){
			//traemos la clase db_consultas que contiene los metodos y atributos que interactian con el modelo
				require ("../../../framework/db/class_db.php");
				//hecemos una instancia de db consultas
				//traemos todas las funcionalidades de la clase bd_consultas
				$conexionDB= new db_consultas();
				//le decimos que se va a conectar a esta cadena de conexion
				$conexionDB->cadenaConexion="conexion/conexion.php";
				//aki indicamos una cadena de conexion distinta a la indicada en la configuracion
				//$conexionDB->cadenaConexion="conexion/conexion2.php";
			//======== armar la consulta =============================			
						
				//indicamos los campos a consultar EN UN ARREGLO
				$campos=array(       
							  "id_usuario",  //1
							  "id_tipo_titular",
							  "fecha_solicitud"
							  ); 
				//indicamos la tabla donde vamos a buscar los campos EN UN ARREGLO
				$tablas=array("t_solicitud"
							  );
							  
				//indicamos la condicion donde vamos a buscar los campos EN UN ARREGLO
				$values=array($id_usuario,
							  $tipo_titular,
							  "2012-05-07"
				
				);
								
				$groupBy=array();
				$ordenBy="";
				$limit="";
				//devolvemos los resultados de la consulta
				return $respuesta=$conexionDB->insert($campos,$tablas,$values);
			}
			
			
			
	}	

?>
