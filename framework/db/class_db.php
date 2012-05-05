|<?php 
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
    along with zionPHP 1.0.  If not, see <http://www.gnu.org/licenses/>. 
*/
/*=================================================================	
//=========FICHA TECNICA DE LA CLASE	

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
	*CORREO ELECTRONICO: davidlarocka@gmail.com
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
				echo "parametros conexion: ".$servidor." ".$usuario." ".$base_datos." ".$pass."<br/><br/>";
				//construimos la conexion para mysql
				$conexion[0]=mysql_connect($servidor,$usuario,$pass) or die ("murio la conexion a la base de datos :(");
				$conexion[1]=mysql_select_db($base_datos);
				//devuelve el resultado
				
				return $conexion;
				}

			// a este select le pasamos como parametros los campos a buscar, la tabla o tablas y de ser necesario la condicion...
			function select($atributo, $tabla, $condicion){
				
				//se conecta a la base de datos
					$conexion=$this->conectar();
					$nro_atributos=-1;
					//armamos la sentencia en lenguaje SQL
					$SQL='SELECT ';
					
							
					//indicamos los campos a consultar
						
					foreach($atributo as $valor){
					//incluimos el campo que toca en el buble a la consulta SQL
						$SQL.= $valor;
						//ponemos una coma para separar campo por campo y respetar la sintaxsis del lenguaje SQL
						$SQL.=', ';
						$nro_atributos++;
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
					//indicamos la condicion
					$SQL.=" WHERE ";
					foreach($condicion as $valor){
					//incluimos el campo que toca en el buble a la consulta SQL
						$SQL.= $valor;
						//ponemos una coma para separar campo por campo y respetar la sintaxsis del lenguaje SQL
						$SQL.=' AND ';
					}
					//eliminamos el ultimo AND que nos enbasura la sentencia
					$SQL=substr($SQL,0,-5);
					
					//cerramos la sentencia SQL
					$SQL.= ';'; 	   
				
				echo $SQL;
				
					//exit;
					//aki hacemos el select	
					$resultado=mysql_query($SQL)or die("no se realizo la consulta");
					//ordenamos en un arreglo lo que nos trae
					$i=0;
	//cuando arregla no trae todos los resultados				
					
					while($row=mysql_fetch_array($resultado)){
						
						for($j=0;$j<=$nro_atributos;$j++){	
							
							$res[$i][$j]=$row[$j];
						
						
							
						}
					$i++;		
					}	
					return $res;				
			}
	}
?>
