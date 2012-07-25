<?php 

/*=================================================================	
//=========FICHA DEL CASO DE USO	
//=================================================================		
	*SISTEMA VERSION: 0.0.1
	*CASO DE USO:registrar usuario
	*CREADO POR:
	*CORREO ELECTRONICO:
	*ULTIMO MANTENIMIENTO:              POR:  

//=================================================================	*/
	
	
	// incluimos las clases necesarias para que corra la aplicacion
		//clase que trae las consultas de este caso de uso
		require("modelo/consultas.php");
		//archivo que trae las validaciones particulares de este caso de uso
		//require("js/validaciones.js");
		require("ajax/ajax.php");
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
$rol=$_SESSION['rol'];
$id_usuario=$_SESSION['id_usuario'];


	if ($rol==1) {
		//mostrar toda la lista
		$objResConsulta=$consultasCU_registrarUsuario->listarTodosLosUsuario();
		$datos=count($objResConsulta);
				
	}
	else
	{
			
	}
	
//=================================================================		
//==========ARMAR LA SALIDA =======================================		
//=================================================================		
		
	//llenamos el mensaje que estara dentro de nuestro marco html de salida	

	if ($rol==1) {
			//mostrar toda la lista
			$mensaje.='
			<div id="contenedor">
			<table>
			<tr class="encabezadoTabla">
				<td> <b>Nº&nbsp;&nbsp;</b> 
				</td>
				<td> <b>Cédula&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b> 
				</td>
				<td> <b>Nombres &nbsp;&nbsp;&nbsp;&nbsp;</b>
				</td>
				<td > <b>Apellidos &nbsp;&nbsp;&nbsp;&nbsp;</b>
				</td>
				<td> <b>Rol&nbsp;&nbsp;&nbsp;&nbsp;</b>
				</td>
				<td> <b>Estatus&nbsp;&nbsp;&nbsp;&nbsp;</b>
				</td>
				<td> <b>Fecha Registro&nbsp;&nbsp;&nbsp;&nbsp;</b>
				</td>
				<td> <b>Acciones </b>
				</td>
			</tr>
			';
			
			//defino el color de la primera fila
			$colorTR="#FFFFFF";
			
			//ciclo para listar los usuarios
			for($i=0;$i<$datos;$i++){
				//cambiar de color 
				if($colorTR=="#FFFFFF"){
					$colorTR="#F5F5FF";
					
				}else{
					$colorTR="#FFFFFF";
				}
				
				
				
				$mensaje.='
			<tr bgcolor="'.$colorTR.'">
				<td>'.$objResConsulta[$i][0].'
					<input type="hidden"  value="'.$objResConsulta[$i][0].'" id="id_usuario'.$objResConsulta[$i][0].'" name="id_usuario'.$objResConsulta[$i][0].'"  />
				</td>
				<td>'.$objResConsulta[$i][1].'</td> 
				<td>'.$objResConsulta[$i][2].'</td>
				<td>'.$objResConsulta[$i][3].'</td>';
				
				if ($objResConsulta[$i][4]=='1'){
					$objResConsulta[$i][4]='Administrador';
				}
				else {
					$objResConsulta[$i][4]='Usuario Restringido';
					}
				
				$mensaje.='
				<td>'.$objResConsulta[$i][4].'</td>';
				
				if ($objResConsulta[$i][7]=='1'){
					$objResConsulta[$i][7]='Activo';
				}
				else {
					$objResConsulta[$i][7]='Inactivo';
					}
				
				$mensaje.='
				<td align="center">'.$objResConsulta[$i][7].'</td>
				<td align="center">'.$objResConsulta[$i][6].'</td>
				
				<td align="center"> 

					<img src="images/editar.gif" id="editar'.$objResConsulta[$i][0].'" name="editar'.$objResConsulta[$i][0].'" onclick="llamarInterfazEditar(id_usuario'.$objResConsulta[$i][0].'.value)" alt="editar" width="15px" height="15px" />
					<img src="images/cross.png" id="deshabilitar'.$objResConsulta[$i][0].'" name="deshabilitar'.$objResConsulta[$i][0].'" onclick="llamarInterfazDeshabilitar(id_usuario'.$objResConsulta[$i][0].'.value)" alt="deshabilitar" width="15px" height="15px" />
				
				</td>
			</tr>
				';
			}	
				
				
				
			$mensaje.='
		</table>
		</div>
		';
		$mensaje.='
			<br/>
				<p align="center"><input type="button" value="Nuevo" onclick="llamarInterfazNuevoUsuario()" /></p>
					
				';
		
		}
		else 
		{
			$mensaje.='
			<div id="contenedor"> </div>
			<script type="text/javascript">
						llamarInterfazEditar('.$id_usuario.');
					</script>';
			
			}


//=================================================================			
//===========MUESTRA EN PANTALLA DE RESULTADOS (SALIDA)============
//=================================================================			
		$html->salidaFinal($tituloPagina="Registro de Usuario",$Nmenu="menu2",$mensaje);

		
?>
