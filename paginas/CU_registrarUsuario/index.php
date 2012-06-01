
<?php 
/*=================================================================	
//=========FICHA DEL CASO DE USO	
//=================================================================		
	*SISTEMA VERSION: 0.0.1
	*CASO DE USO:registrar usuario
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
		$consultasCU_registrarUsuario= new consultas();
		
//=================================================================		
//==========LOGICA DE NEGOCIOS ====================================		
//=================================================================
	

	
	if (isset($_POST["cedula"])){
	$cedula=$_POST["cedula"];
	$password=$_POST["password"];

	$correo=$_POST["correo"];
	$psecreta=$_POST["p_secreta"];
		//consultamos si el usuario exite en la base de datos 
		
		$objUsuario=$consultasCU_registrarUsuario->verificarUsuario($cedula);
		if($objUsuario[0][0]!=""){
			
			$mensaje.="<div align='center'><b>¡Alerta!</b></br>Esta cédula pertenece a un usuario ya registrado</div>";
			
		}else{
		
		//$objUsuarioRegistrar=$consultasCU_registrarUsuario->registrarusuario($cedula, $password, $p_nombre, $p_apellido, $seccion, $carrera  );
		$objUsuarioRegistrar=$consultasCU_registrarUsuario->registrarusuario($cedula, $password, $correo, $psecreta);
		$mensaje.="<center><b>Registro satisfactorio!!</b>,<a href='../CU_login/'> Ir al login</a></center>";
		
		
		}	
		
			
		
						
		}else{
//=================================================================		
//==========ARMAR LA SALIDA ====================================		
//=================================================================		
	
		
	//llenamos el mensaje que estara dentro de nuestro marco html de salida	
	
		$mensaje='<div align="center"><b><i>Ingresa Tus Datos</i></b></div>
					<form name="form_login" id="form_login" action="" method="post">
						<table class="tabla" border="0" bgcolor="#CDEAF4">
							<tr>
								<td align="right">
									Cédula
								</td>
								<td>
									<input type="text" name="cedula" id="cedula" />
								</td>
							</tr>
							<tr>
								<td align="right">
									Correo
								</td>
								<td>
									<input type="text" name="correo" id="correo" />
								</td>
						 	</tr>
							<tr>
								<td align="right">
									Clave
								</td>
								<td>
									<input type="password" name="password" id="password" />
								</td>
							</tr>
							<tr>
								<td align="right">
									Pregunta Secreta
								</td>
								<td>
									<input type="text" name="p_secreta" id="p_secreta" />
								</td>
							</tr>
							<tr>
								<td align="center" colspan="2">
									<b>Escribe letras y/o números de este recuadro</b>
								</td>
							</tr>
							<tr>
								<td align="center" colspan="2">
										<img src="../../framework/librerias/captcha/captcha.php" width="100" height="30" alt="captcha" /><br/>	<input name="code" id="code" type="text" size="12" maxlength="7"/>
									
								</td>
							</tr>
							<tr>
								<td align="center" colspan="2">
									<input type="button" value="Registrar" onclick="validarTodosLosCampos()" />
								</td>
							</tr>	
					
					</table>
 				</form>
					
				';
				
}				

//=================================================================			
//===========MUESTRA EN PANTALLA DE RESULTADOS (SALIDA)============
//=================================================================			
		$html->salidaFinal($tituloPagina="Registro de Usuario",$Nmenu="menuRegistro",$mensaje);
	

?>
