
<?php 
/*=================================================================	
//=========FICHA DEL CASO DE USO	
//=================================================================		
	*SISTEMA VERSION: 0.0.1
	*CASO DE USO:
	*CREADO POR:
	* CORREO ELECTRONICO:
	*ULTIMO MANTENIMIENTO:              POR:  

//=================================================================	*/
	
	
	// incluimos las clases necesarias para que corra la aplicacion
		//clase que trae las consultas de este caso de uso
		require("modelo/consultas.php");
		//archivo que trae las validaciones particulares de este caso de uso
		//require("js/validaciones.js");
		//clase que trae el marco html
		require ("../../framework/marco_html/html.php");
		session_start();
//=================================================================			

		//hacemos una instancia del marco html
		$html = new Html();
		
		//instanciamos una consulta
		$consultasCU_recuperarLogin= new consultas();
		
//=================================================================		
//==========LOGICA DE NEGOCIOS ====================================		
//=================================================================
	
		//invocamos una consulta
		//$respuesta=$selecionarNombre->consultarNombre();
		//print_r($respuesta);
		
		
	
	
	if (isset($_POST["cedula"])){
		$cedula=$_POST["cedula"];	
		//consultamos si el usuario exite en la base de datos y asignamos el resultado a una variable usuario
		$objUsuario=$consultasCU_recuperarLogin->login($cedula);
		
		//revisamos que el usuario y la clave sean validos
		if(($objUsuario[0][0]!=$_POST["usuario"])){
			
			//si el usuario no existe redireccionamos al inicio
		   echo	'<script type="text/javascript">
						alert("El Usuario no esta Registrado");
						var pagina="index.php";
						location.href=pagina;
						
				</script>';
			exit;	
						
		}
		else if(($objUsuario[0][0]==$_POST["usuario"]) && ($objUsuario[0][1]!=$_POST["password"]) ){
			
			echo '<script  type="text/javascript">
						alert("clave Invalida");
						var pagina="index.php";
						location.href=pagina;
						
				</script>';
			exit;	
		}
		else if( md5( $_POST[ 'code' ] ) != $_SESSION[ 'key' ] ) {

    
	   echo "<script> 
			  alert('Error al Introducir el Codigo de la Imagen!');
	
			  var pagina='index.php';
			  function redireccionar() 
			  { 
			 	 location.href=pagina;
			  } 
			  setTimeout ('redireccionar()', 0);
			  </script>";
			exit;
			
			}
		else if(($objUsuario[0][0]==$_POST["usuario"]) && ($objUsuario[0][1]==$_POST["password"]) ){
			
			//iniciamos la session 
			
			
			$_SESSION['usuario']=$objUsuario[0][2];
			$_SESSION['password']=$objUsuario[0][1];
			$_SESSION['cedula']=$objUsuario[0][0];
			$_SESSION['idt_usuario']=$objUsuario[0][3];
			$_SESSION['rol']=$objUsuario[0][4];
			$_SESSION['seccion']=$objUsuario[0][5];
			$_SESSION['carrera']=$objUsuario[0][6];
			
			
			echo '<script  type="text/javascript">
						var pagina="../CU_recuperarLogin/index.php";
						location.href=pagina;
						
				</script>';
			exit;	
		
		}
	}	
	
//=================================================================		
//==========ARMAR LA SALIDA ====================================		
//=================================================================		

 
		$mensaje='<form name="form_clave" id="form_clave" action="" method="post">
					<table class="tabla" align="center">
						<tr>
							<td> Cedula </td>
							<td> <input type="text" name="cedula" id="cedula"/>	</td>
						</tr>
						<tr>
							<td> Pregunta Secreta </td>
							<td> <input type="text" name="psecreta" id="psrecrete"/>	</td>
						</tr>
						<tr>
							<td> Respuesta</td>
							<td> <input type="text" name="respuesta" id="respuesta"/>	</td>
						</tr>
						<tr>
							<td colspan="2" align="center">
								<input type="button" value="Enviar" onclick="validarCampos()"/>
							</td>
						</tr>
					</table>	
		 		</form>';
		
		


//=================================================================			
//===========MUESTRA EN PANTALLA DE RESULTADOS (SALIDA)============
//=================================================================			
		$html->salidaFinal($titulopagina="Recuperar Clave",$nMenu="menuRegistro",$mensaje);
	

?>
