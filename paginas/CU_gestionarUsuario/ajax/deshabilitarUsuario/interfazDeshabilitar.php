<?php


	require("../../modelo/consultas.php");
	//archivo que trae las validaciones particulares de este caso de uso
	//require("../../js/validaciones.js");
	require("../ajax.php");
	//clase que trae el marco html
		session_start();
//=================================================================		
//==========LOGICA DE NEGOCIOS ====================================		
//=================================================================
		
		$id_usuario=$_GET['id_usuario'];
	
	
		$rol=$_SESSION['rol'];
		//instanciamos una consulta
		$consultasCU_editar= new consultas();
		
		
	//buscar los tipos de documentos que puede solicitar el alumno
		$objDatosUsuario=$consultasCU_editar->buscarDatosUsuario($id_usuario);
//=================================================================		
//==========ARMAR MENSAJE =========================================		
//=================================================================		
			$mensaje='
			<div align="center"><b><i>Modifique sus Datos</i></b></div>		 
					<form name="form_login" id="form_login" action="" method="post">
						<table class="tabla" border="0" bgcolor="white">
							<tr>
								<td align="left">
									Cédula
								</td>
								<td>
									<input type="hidden" id="id_usuario" name="id_usuario" value="'.$objDatosUsuario[0][0].'" />
									<input type="text" tabindex="1"onkeypress="return validar_numero(event);" maxlength="8" id="cedula" name="cedula" value="'.$objDatosUsuario[0][1].'"readonly="yes"/>

								</td>
							</tr>
							
							<tr>
								<td align="left">
									Nombre
								</td>
								<td>
									<input type="text" tabindex="2" name="nombres" id="nombres" font style="text-transform: uppercase" value="'.$objDatosUsuario[0][2].'"readonly="yes" />
								</td>
						 	</tr>
							
						 	<tr>
								<td align="left">
									Apellido
								</td>
								<td>
									<input type="text" tabindex="3" name="apellidos" id="apellidos" font style="text-transform: uppercase" value="'.$objDatosUsuario[0][3].'"readonly="yes"/>
								</td>
						 	</tr>
							
							<tr>
								<td align="left">
									Clave
								</td>
								<td>
									<input type="password" tabindex="4" name="clave" id="clave" maxlength="15" value="'.$objDatosUsuario[0][5].'" readonly="yes" />
								</td>
							</tr>';
							
							
							if($rol==1){
								
								
							$mensaje.='
							<tr>
								<td align="left">
									Nivel de Usuario
								</td>
								<td>';
									if($objDatosUsuario[0][4]==1){
										$default[0]="1";
										$default[1]="Administrador (Rol Actual)";
										$default2[0]="2";
										$default2[1]="Usuario";
										
									}
									else{
										$default[0]="2";
										$default[1]="Usuario (Rol Actual)";
										$default2[0]="1";
										$default2[1]="Administrador";
									}
									
									
										$mensaje.=	'<select id="rol" name="rol" readonly="yes">
											<option value="'.$default[0].'">'.$default[1].'</option>
											<option value="'.$default2[0].'">'.$default2[1].'</option>
										
										</select>'; 
								}
								else
								{
										$mensaje.=	'<input type="hidden" id="rol" name="rol" value="2"> ';
								}	 
								$mensaje.='</td>
							</tr>
							
							<tr>
								<td align="center" colspan="2">
									<br/>
									<input type="button" tabindex="6" value="Deshabilitar"onclick="llamarCambiarEstatus()"/>
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
