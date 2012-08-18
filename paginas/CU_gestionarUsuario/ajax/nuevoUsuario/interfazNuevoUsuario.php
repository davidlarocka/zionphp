<?php


	require("../../modelo/consultas.php");
	//archivo que trae las validaciones particulares de este caso de uso
	//require("../../js/validaciones.js");
	require("../ajax.php");
	//clase que trae el marco html
	
//=================================================================		
//==========LOGICA DE NEGOCIOS ====================================		
//=================================================================
		
		//$id_usuario=$_GET['id_usuario'];
		//instanciamos una consulta
		$consultasCU_nuevoUsuario= new consultas();
		
		
	//buscar las preguntas secretas de la base de datos
		$objPreguntas=$consultasCU_nuevoUsuario->buscarPreguntasSecretas();
		$datosPreguntas=count($objPreguntas);
//=================================================================		
//==========ARMAR MENSAJE =========================================		
//=================================================================		
			$mensaje='
			<div align="center"><b><i>Ingrese sus Datos</i></b></div>		 
					<form name="form_login" id="form_login" action="" method="post">
						<table class="tabla" border="0" bgcolor="white">
							<tr>
								<td align="left">
									Cédula
								</td>
								<td>
									<input type="hidden" id="id_usuario" name="id_usuario" value="" />
									<input type="text" tabindex="1"onkeypress="return validar_numero(event);" maxlength="8" id="cedula" name="cedula" value=""/>

								</td>
							</tr>
							<tr>
								<td align="left">
									User Login
								</td>
								<td>
									<input type="text" tabindex="2" name="login" id="login" font style="text-transform: uppercase" value="" />
								</td>
						 	</tr>
							<tr>
								<td align="left">
									Nombre
								</td>
								<td>
									<input type="text" tabindex="2" name="nombres" id="nombres" font style="text-transform: uppercase" value="" />
								</td>
						 	</tr>
							
						 	<tr>
								<td align="left">
									Apellido
								</td>
								<td>
									<input type="text" tabindex="3" name="apellidos" id="apellidos" font style="text-transform: uppercase" value=""/>
								</td>
						 	</tr>
							
							<tr>
								<td align="left">
									Clave
								</td>
								<td>
									<input type="password" tabindex="4" name="clave" id="clave" maxlength="15" value="" />
								</td>
							</tr>
							
							<tr>
								<td align="left">
									Nivel de Usuario
								</td>
								<td>';
						
									$default[0]="1";
									$default[1]="Administrador";
									$default2[0]="2";
									$default2[1]="Usuario";
									
								
									$default[0]="2";
									$default[1]="Usuario";
									$default2[0]="1";
									$default2[1]="Administrador";
								
								
							$mensaje.=	'<select id="rol" name="rol">
										<option value="'.$default[0].'">'.$default[1].'</option>
								  		<option value="'.$default2[0].'">'.$default2[1].'</option>
								  	
									</select> 
								</td>
								
							</tr>
							<tr>
								<td align="left">
									Pregunta Secreta
								</td>
								<td>';
						
								
								
								
							$mensaje.=	'<select id="psecreta" name="psecreta">';

										
										for($i=0;$i<$datosPreguntas;$i++){
											$mensaje.='<option value="'.$objPreguntas[$i][0].'">'.$objPreguntas[$i][1].'</option>';
										}

								  	
									$mensaje.='</select>
								</td>
								
							</tr>
							<tr>
								<td align="left">
									Respuesta Secreta
								</td>
								<td>
						
								
									<input type="text" tabindex="3" name="rsecreta" id="rsecreta" font style="text-transform: uppercase" value=""/>
							
								</td>
								
							</tr>
							<tr>
								<td align="center" colspan="2">
									<br/>
									<input type="button" tabindex="6" value="Guardar" onclick="validarTodosLosCamposNuevousuario()" />
									<input type="button" tabindex="6" value="Regresar" onclick="location.href =\'../CU_gestionarUsuario/index.php\'" />
								</td>
							</tr>	
					
					</table>
 				</form>
				<div id="contenedor2">
				
				</div>	
				';
			
	echo $mensaje;
		
	
?>
