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
		function verificarUsuario($cedula){
		//traemos la clase db_consultas que contiene los metodos y atributos que interactian con el modelo
			require ("../../framework/db/class_db.php");
			//hecemos una instancia de db consultas
			//nos conectamos a la base de datos y traemos todas las funcionalidades de la clase bd_consultas
			$conexionDB= new db_consultas();
			//$conexionDB->cadenaConexion="conexion/conexion.php";
			//aki indicamos una cadena de conexion distinta a la indicada en la configuracion
			$conexionDB->cadenaConexion="conexion/conexion1.php";
		//======== armar la consulta =============================			
					
			//indicamos los campos a consultar EN UN ARREGLO
			$campos=array("cedula"          //1
						  
						  	
						  ); 
			//indicamos la tabla donde vamos a buscar los campos EN UN ARREGLO
			$tablas=array("t_usuarios"
						  );
			//indicamos la condicion donde vamos a buscar los campos EN UN ARREGLO
			$condicion=array("cedula=$cedula"
			
			);
							
			$groupBy=array();
			$ordenBy="";
			$limit="";
			//devolvemos los resultados de la consulta
			return $respuesta=$conexionDB->select($campos,$tablas,$condicion,$groupBy);
			}	
			
		
			function registrarUsuario($login, $cedula, $nombres, $apellidos, $rol, $clave, $rsecreta, $fecha_registro, $psecreta){
			//traemos la clase db_consultas que contiene los metodos y atributos que interactian con el modelo
			
				require ("../../../../framework/db/class_db.php");
				//hecemos una instancia de db consultas
				//traemos todas las funcionalidades de la clase bd_consultas
				$conexionDB= new db_consultas();
				//le decimos que se va a conectar a esta cadena de conexion
				//$conexionDB->cadenaConexion="conexion/conexion.php";
				//aki indicamos una cadena de conexion distinta a la indicada en la configuracion
				$conexionDB->cadenaConexion="conexion/conexion1.php";
			
			//======== armar la consulta =============================			
						
				//indicamos los campos a consultar EN UN ARREGLO
				$campos=array(
							  "user_login",
							  "cedula",	//0
							  "nombres", 	//1 
							  "apellidos",	//2
							  "rol",		//3
							  "clave",		//4
							  "rsecreta",	//5
							  "fecha_registro", //6
							  "id_psecreta" //7
							  
							  ); 
				//indicamos la tabla donde vamos a buscar los campos EN UN ARREGLO
				$tablas=array("	t_usuarios" 
							  );
							  
				//indicamos la condicion donde vamos a buscar los campos EN UN ARREGLO
				$values=array($login, $cedula, $nombres, $apellidos, $rol, $clave, $rsecreta, $fecha_registro, $psecreta);
								
			
				//devolvemos los resultados de la consulta
				return $respuesta=$conexionDB->insert($campos,$tablas,$values);
				
			}
			function listarTodosLosUsuario(){
			//traemos la clase db_consultas que contiene los metodos y atributos que interactian con el modelo
			require ("../../framework/db/class_db.php");
			//hecemos una instancia de db consultas
			//nos conectamos a la base de datos y traemos todas las funcionalidades de la clase bd_consultas
			$conexionDB= new db_consultas();
			//$conexionDB->cadenaConexion="conexion/conexion.php";
			//aki indicamos una cadena de conexion distinta a la indicada en la configuracion
			$conexionDB->cadenaConexion="conexion/conexion1.php";
		//======== armar la consulta =============================			
					
			//indicamos los campos a consultar EN UN ARREGLO
			$campos=array( "id_usuario",	//0
						   "cedula",        //1
						  "nombres",		//2
						  "apellidos",		//3
						  "rol",			//4
						  "clave",			//5
						  "fecha_registro",	//6
						  "estatus" //7
						  	
						  ); 
			//indicamos la tabla donde vamos a buscar los campos EN UN ARREGLO
			$tablas=array("t_usuarios"
						  );
			//indicamos la condicion donde vamos a buscar los campos EN UN ARREGLO
			$condicion=array();
							
			$groupBy=array();
			$ordenBy=array("id_usuario");
			$limit="";
			//devolvemos los resultados de la consulta
			return $respuesta=$conexionDB->select($campos,$tablas,$condicion,$groupBy,$ordenBy);	
				
			}
			
			
			
			function listarUsuarioRestringido($id_usuario){
			//traemos la clase db_consultas que contiene los metodos y atributos que interactian con el modelo
			require ("../../framework/db/class_db.php");
			//hecemos una instancia de db consultas
			//nos conectamos a la base de datos y traemos todas las funcionalidades de la clase bd_consultas
			$conexionDB= new db_consultas();
			//$conexionDB->cadenaConexion="conexion/conexion.php";
			//aki indicamos una cadena de conexion distinta a la indicada en la configuracion
			$conexionDB->cadenaConexion="conexion/conexion1.php";
		//======== armar la consulta =============================			
					
			//indicamos los campos a consultar EN UN ARREGLO
			$campos=array( "id_usuario",	//0
						   "cedula",        //1
						  "nombres",		//2
						  "apellidos",		//3
						  "rol",			//4
						  "clave",			//5
						  "fecha_registro"	//6
						  	
						  ); 
			//indicamos la tabla donde vamos a buscar los campos EN UN ARREGLO
			$tablas=array("t_usuarios"
						  );
			//indicamos la condicion donde vamos a buscar los campos EN UN ARREGLO
			$condicion=array("id_usuario=$id_usuario");
							
			$groupBy=array();
			$ordenBy="";
			$limit="";
			//devolvemos los resultados de la consulta
			return $respuesta=$conexionDB->select($campos,$tablas,$condicion,$groupBy);	
			
			}
			
			
			
			function buscarDatosUsuario($id_usuario){
				//traemos la clase db_consultas que contiene los metodos y atributos que interactian con el modelo
			require ("../../../../framework/db/class_db.php");
			//hecemos una instancia de db consultas
			//nos conectamos a la base de datos y traemos todas las funcionalidades de la clase bd_consultas
			$conexionDB= new db_consultas();
			//$conexionDB->cadenaConexion="conexion/conexion.php";
			//aki indicamos una cadena de conexion distinta a la indicada en la configuracion
			$conexionDB->cadenaConexion="conexion/conexion1.php";
		//======== armar la consulta =============================			
					
			//indicamos los campos a consultar EN UN ARREGLO
			$campos=array( "id_usuario",	//0
						   "cedula",        //1
						  "nombres",		//2
						  "apellidos",		//3
						  "rol",			//4
						  "clave",			//5
						  "fecha_registro"	//6
						  	
						  ); 
			//indicamos la tabla donde vamos a buscar los campos EN UN ARREGLO
			$tablas=array("t_usuarios"
						  );
			//indicamos la condicion donde vamos a buscar los campos EN UN ARREGLO
			$condicion=array("id_usuario=$id_usuario");
							
			$groupBy=array();
			$ordenBy="";
			$limit="";
			//devolvemos los resultados de la consulta
			return $respuesta=$conexionDB->select($campos,$tablas,$condicion,$groupBy);	
			}
			//buscar las preguntas secretas
			
			function buscarPreguntasSecretas(){
				//traemos la clase db_consultas que contiene los metodos y atributos que interactian con el modelo
			require ("../../../../framework/db/class_db.php");
			//hecemos una instancia de db consultas
			//nos conectamos a la base de datos y traemos todas las funcionalidades de la clase bd_consultas
			$conexionDB= new db_consultas();
			//$conexionDB->cadenaConexion="conexion/conexion.php";
			//aki indicamos una cadena de conexion distinta a la indicada en la configuracion
			$conexionDB->cadenaConexion="conexion/conexion1.php";
		//======== armar la consulta =============================			
					
			//indicamos los campos a consultar EN UN ARREGLO
			$campos=array( "id_psecreta",	//0
						   "pregunta"       //1
						
						  	
						  ); 
			//indicamos la tabla donde vamos a buscar los campos EN UN ARREGLO
			$tablas=array("t_psecretas"
						  );
			//indicamos la condicion donde vamos a buscar los campos EN UN ARREGLO
			$condicion=array();
							
			$groupBy=array();
			$ordenBy="";
			$limit="";
			//devolvemos los resultados de la consulta
			return $respuesta=$conexionDB->select($campos,$tablas,$condicion,$groupBy);	
			}
			
			
			function actualizarDatosUsuario($id_usuario, $cedula, $nombres, $apellidos, $rol, $clave){
				//traemos la clase db_consultas que contiene los metodos y atributos que interactian con el modelo
			require ("../../../../framework/db/class_db.php");
			//hecemos una instancia de db consultas
			//nos conectamos a la base de datos y traemos todas las funcionalidades de la clase bd_consultas
			$conexionDB= new db_consultas();
			//$conexionDB->cadenaConexion="conexion/conexion.php";
			//aki indicamos una cadena de conexion distinta a la indicada en la configuracion
			$conexionDB->cadenaConexion="conexion/conexion1.php";
		//======== armar la consulta =============================			
					
			//indicamos los campos a consultar EN UN ARREGLO
			$set=array(
						  "cedula='$cedula'",        //1
						  "nombres='$nombres'",		//2
						  "apellidos='$apellidos'",		//3
						  "rol='$rol'",			//4
						  "clave='$clave'"		//5
						  
						  	
						  ); 
			//indicamos la tabla donde vamos a buscar los campos EN UN ARREGLO
			$tablas=array("t_usuarios"
						  );
			//indicamos la condicion donde vamos a buscar los campos EN UN ARREGLO
			$condicion=array("id_usuario=$id_usuario");
							
			
			//devolvemos los resultados de la consulta
			return $respuesta=$conexionDB->update($tablas, $set, $condicion);	
			}
		
			function actualizarDatosUsuarioNoClave($id_usuario, $cedula, $nombres, $apellidos, $rol){
				//traemos la clase db_consultas que contiene los metodos y atributos que interactian con el modelo
			require ("../../../../framework/db/class_db.php");
			//hecemos una instancia de db consultas
			//nos conectamos a la base de datos y traemos todas las funcionalidades de la clase bd_consultas
			$conexionDB= new db_consultas();
			//$conexionDB->cadenaConexion="conexion/conexion.php";
			//aki indicamos una cadena de conexion distinta a la indicada en la configuracion
			$conexionDB->cadenaConexion="conexion/conexion1.php";
		//======== armar la consulta =============================			
					
			//indicamos los campos a consultar EN UN ARREGLO
			$set=array(
						  "cedula='$cedula'",        //1
						  "nombres='$nombres'",		//2
						  "apellidos='$apellidos'",		//3
						  "rol='$rol'"			//4
						 		//5
						  
						  	
						  ); 
			//indicamos la tabla donde vamos a buscar los campos EN UN ARREGLO
			$tablas=array("t_usuarios"
						  );
			//indicamos la condicion donde vamos a buscar los campos EN UN ARREGLO
			$condicion=array("id_usuario=$id_usuario");
							
			
			//devolvemos los resultados de la consulta
			return $respuesta=$conexionDB->update($tablas, $set, $condicion);	
			}
			
			function cambiarEstatus($id_usuario){
				//traemos la clase db_consultas que contiene los metodos y atributos que interactian con el modelo
			require ("../../../../framework/db/class_db.php");
			//hecemos una instancia de db consultas
			//nos conectamos a la base de datos y traemos todas las funcionalidades de la clase bd_consultas
			$conexionDB= new db_consultas();
			//$conexionDB->cadenaConexion="conexion/conexion.php";
			//aki indicamos una cadena de conexion distinta a la indicada en la configuracion
			$conexionDB->cadenaConexion="conexion/conexion1.php";
		//======== armar la consulta =============================			
					
			//indicamos los campos a consultar EN UN ARREGLO
			$set=array(
						  "estatus=2"   //1
						  				  	
						  ); 
			//indicamos la tabla donde vamos a buscar los campos EN UN ARREGLO
			$tablas=array("t_usuarios"
						  );
			//indicamos la condicion donde vamos a buscar los campos EN UN ARREGLO
			$condicion=array("id_usuario=$id_usuario");
							
			
			//devolvemos los resultados de la consulta
			return $respuesta=$conexionDB->update($tablas, $set, $condicion);	
			}

				
			
	}	

?>
