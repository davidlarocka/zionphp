<?php 
//print_r($_POST);

/*=================================================================	
//=========FICHA DEL CASO DE USO	
//=================================================================		
	*SISTEMA VERSION: 0.0.1
	*CASO DE USO:
	*CREADO POR:
	*CORREO ELECTRONICO:
	*ULTIMO MANTENIMIENTO:              POR:  

//=================================================================	*/
	// incluimos las clases necesarias para que corra la aplicacion
	//clase que trae las consultas de este caso de uso
	require("modelo/consultas.php");
	//archivo que trae las validaciones particulares de este caso de uso
	require("js/validaciones.php");
	//clase que trae el marco html
	require ("../../framework/marco_html/html.php");
	
	//print_r($_SESSION);
//=================================================================			

	//hacemos una instancia del marco html
	$html = new Html();
	
	//instanciamos una consulta
	$consultasCU_inicio= new consultas();
		
//=================================================================		
//==========LOGICA DE NEGOCIOS ====================================		
//=================================================================
	
	//invocamos una consulta
	$cedula=$_POST["cedula"];	
	$clave=md5($_POST["clave"]);
	$rol=$_POST["rol"];
	
	
	if (isset($_POST["cedula"]))
	{
		
		//echo "Esta es la cedula->".$cedula;
	
		//consultamos si el usuario exite en la base de datos y asignamos el resultado a una variable usuario
		$objUsuario=$consultasCU_inicio->login($cedula);
		
		if(($objUsuario[0][1]!=$_POST["cedula"]))
		{
			
			//si el usuario no existe redireccionamos al inicio
		   echo	'<script type="text/javascript">
						alert("Usuario Invalido");
						var pagina="index.php";
						location.href=pagina;
						
				</script>';
			exit;
						
		}
		else if(($objUsuario[0][1]==$_POST["cedula"]) && ($objUsuario[0][2]!=$clave) ){
			echo "clave diferente";
			echo '<script  type="text/javascript">
						alert("clave invalida");
						var pagina="index.php";
						location.href=pagina;
						
				</script>';
			exit;	
		}
		else if(($objUsuario[0][1]==$_POST["cedula"]) && ($objUsuario[0][2]==$clave) )
			{
				
				if ($objUsuario[0][4]==2){
					echo '<script  type="text/javascript">
						alert("Usuario Inactivo!");
						var pagina="index.php";
						location.href=pagina;
						
						</script>';
					exit;	
					};
			//iniciamos la session 
			session_start();
			$_SESSION['cedula']=$objUsuario[0][1];
			$_SESSION['clave']=$objUsuario[0][2];
			$_SESSION['id_usuario']=$objUsuario[0][0];
			$_SESSION['rol']=$objUsuario[0][3];
		
			
			echo '<script  type="text/javascript">
						var pagina="../CU_inicio/index.php";
						location.href=pagina;
						
				</script>';
			
			exit;	
		
		}

	}	
	else
	{
	
//=================================================================		
//==========ARMAR LA SALIDA ====================================		
//=================================================================		
	
//llenamos el mensaje que estara dentro de nuestro marco html de salida	

 //armamos un formulario

 
	$mensaje.='
		<center>
			<form name="form_login" id="form_login" action="" method="post">
					
			<table border="0" align="center">
				<tr>
					<td>  
						<p align="center"><img src="imagenes/inicio_de_sesion.gif" width="60px" height="70px"/></p><br/><br/>
						<p align="right">
						Cédula<input type="text"  name="cedula" id="cedula" /><br/><br/>
						Clave<input type="password"  maxlength="15" name="clave" id="clave" /></p><br/><br/>
						<p align="center"><input type="button" value="Entrar" onclick="validarCamposVacios()"/></p><br/><br/>
					</td>
				</tr>
			
				<tr>
					<td> <p align="center"> <a href="CU_recuperarLogin"> Olvidaste tu Clave?</a> </p>	
					</td>
				</tr>
			</table>	
			</form>
		</center>';
		
	}
		
//=================================================================			
//===========MUESTRA EN PANTALLA DE RESULTADOS (SALIDA)============
//=================================================================			
		$html->salidaFinal($tituloPagina="Inicio de sesión",$Nmenu="menuInicio",$mensaje);
?>
