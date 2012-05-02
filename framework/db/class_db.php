<?php 
/*=================================================================	
//=========FICHA DE LA ClASE	
//=================================================================		
	*FRAMEWORK VERSION: 0.0.1
	*CLASE:class_db.php
	*DESCRIPCION:esta clase contiene los atributos y metodos necesario para conectarse a cualquier base de datos de
				 nuestro aplicativo.
				 tambien contiene la logica para realizar las cuatro operaciones principales de base de datos
				  -Select
				  -Insert
				  -Update
				  -Delete
	*CREADO POR: TSU David Garcia
	* CORREO ELECTRONICO: davidlarocka@gmail.com
	*FECHA CREACION: 1 DE MAYO DE 2012
	*FECHA ULTIMO MANTENIMIENTO:              POR:  

//=================================================================	*/	
	class db_consultas {
			
			//atributos
			var $cadenaConexion;	
       //===========METODOS========================================
       //==========================================================
			function conectar(){
		        // se verifica que no se alla expecificado una conexion diferente a la de la configuracion global 	
				if($this->cadenaConexion==""){
					require ("../../configuracion.php");
					/*le asignamos al atributo cadenaConexion de esta clase el parametro de la conexion establecido en el archivo
					 coniguracion.php*/
					$this->cadenaConexion=$cadenaConexionGlobal;
					require($this->cadenaConexion);
				}
				else{
					/*si el desarrollador especifica una conexion diferente a la de la configuracion al momente de 
					hacer una nueva instancia de db_consultas entonces esa es la que se usa*/
					require($this->cadenaConexion);
				}
				
				//construimos la conexion para mysql
				$conexion[0]=mysql_connect($servidor,$usuario,$pass) or die ("murio la conexion a la base de datos");
				$conexion[1]=mysql_select_db($base_datos);
				//devuelve el resultado
				return $conexion;
				}

			// a este select le pasamos como parametros los campos a buscar, la tabla o tablas y de ser necesario la condicion...
			function select($atributo, $tabla){
				
				//se conecta a la base de datos
					$conexion=$this->conectar();
					
					//armamos la sentencia en lenguaje SQL
					$SQL='SELECT ';
					
							
					//indicamos los campos a consultar
							
					foreach($atributo as $valor){
					//incluimos el campo que toca en el buble a la consulta SQL
						$SQL.= $valor;
						//ponemos una coma para separar campo por campo y respetar la sintaxsis del lenguaje SQL
						$SQL.=', ';
					}	
					//eliminamos la ultima coma que quedo en el ciclo como basura(esto borra los dos ultimos caracteres de la cadena... la coma y el espacio )
					$SQL=substr($SQL,0,-2);
					//from
					$SQL.=  ' FROM ';
					//indicamos las tablas a consultar
					foreach($tabla as $valor){
					//incluimos el campo que toca en el buble a la consulta SQL
						$SQL.= $valor;
						//ponemos una coma para separar campo por campo y respetar la sintaxsis del lenguaje SQL
						$SQL.=', ';
					}	
					//eliminamos la ultima coma que quedo en el ciclo como basura(esto borra los dos ultimos caracteres de la cadena... la coma y el espacio )
					$SQL=substr($SQL,0,-2);  
					//cerramos la sentencia SQL
					$SQL.= ';'; 	   
				//	echo $SQL;
					//exit;
					//aki hacemos el select	
					$resultado=mysql_query($SQL)or die("no se realizo la consulta");
					//ordenamos en un arreglo lo que nos trae
					$i=0;
	//CONTINUAR AKIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIII
	//cuando arregla no trae todos los resultados				
					
					while($row=mysql_fetch_array($resultado)){
							$res[$i]=$row[0];
							$i++;
					}	
					return $res;				
			}
	}
?>
