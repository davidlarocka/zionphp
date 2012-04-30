<?php 
	
	
		
	
	//definimos la clase html
	
	
	
	
	class db_consultas {
		
			
		
			//atributos
			var $cadenaConexion;	

			function conectar(){
			
				 // se verifica que no se alla expecificado una conexion diferente a la de la configuracion global 	
				if($this->cadenaConexion==""){
					require ("../../configuracion.php");
					
					$this->cadenaConexion=$cadenaConexionGlobal;
					require($this->cadenaConexion);
					
				}else{
					require($this->cadenaConexion);		
				}
				
				//construimos la conexion para mysql
				$conexion[0]=mysql_connect($servidor,$usuario,$pass) or die ("murio la conexion a la base de datos");
				$conexion[1]=mysql_select_db($base_datos);	
					//echo $server;
					//echo $baseDatos;
				
				
			}

			
			// a este select le pasamos como parametros los campos a buscar, la tabla o tablas y de ser necesario la condicion...
			function select($atributo, $tabla){
				
				//se conecta a la base de datos
					$conexion=$this->conectar();
					
					
					$SQL="SELECT $atributo[0] 
						  FROM $tabla[0] ;";
					
				//aki hacemos el select	
					$resultado=mysql_query($SQL) or die("no se realizo la consulta");
					//ordenamos en un arreglo lo que nos trae
						$i=0;
						while($row=mysql_fetch_array($resultado)){
							$res[$i]=$row[0];
							$i++;							
						}	
					
				
				
				return $res;				
				
				
				
			}
		
		
	}


?>
