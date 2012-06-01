
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
		require("js/validaciones.php");
		//clase que trae el marco html
		require ("../../framework/marco_html/html.php");
		session_start();
//=================================================================			

		//hacemos una instancia del marco html
		$html = new Html();
		
		//instanciamos una consulta
		$consultasCU_inicio= new consultas();
		
//=================================================================		
//==========LOGICA DE NEGOCIOS ====================================		
//=================================================================
	
		//invocamos una consulta
		//$respuesta=$selecionarNombre->consultarNombre();
		//print_r($respuesta);
	$cedula=$_POST["usuario"];	
	
	if (isset($_POST["usuario"])){
		//consultamos si el usuario exite en la base de datos y asignamos el resultado a una variable usuario
		$objUsuario=$consultasCU_inicio->login($cedula);
		echo "pass--> ".$objUsuario[0][1];
		echo "pass post ".$_POST['password'];
		//revisamos que el usuario y la clave sean validos
		if(($objUsuario[0][0]!=$_POST["usuario"])){
			
			//si el usuario no existe redireccionamos al inicio
		   echo	'<script  type="text/javascript">
						alert("Usuario Invalido");
						var pagina="index.php";
						location.href=pagina;
						
				</script>';
			exit;	
						
		}
		else if(($objUsuario[0][0]==$_POST["usuario"]) && ($objUsuario[0][1]!=$_POST["password"]) ){
			
			echo '<script  type="text/javascript">
						alert("clave invalida");
						var pagina="index.php";
						location.href=pagina;
						
				</script>';
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
			$_SESSION['p_apellido']=$objUsuario[0][7];
			echo '<script  type="text/javascript">
						var pagina="../CU_inicio/index.php";
						location.href=pagina;
						
				</script>';
			exit;	
		
		}
		
		
		
	}	
	
	
		
		
//=================================================================		
//==========ARMAR LA SALIDA ====================================		
//=================================================================		
	
		
	//llenamos el mensaje que estara dentro de nuestro marco html de salida	
/*
		$mensaje.="<center><h2>Zion<font color='#159B15'>P</font><font color='#DED91B'>H</font><font color='#FF0000'>P</font> 
				   <font color='#000000'>dice: Hola Mundo! </font></h2></center><br/>";	
*/

/*
		$mensaje.="el nombre de la comision es: ".$respuesta[0][0];
*/

 //armamos un formulario

 
		$mensaje.='
		<center>
				<form name="form_login" id="form_login" action="" method="post">
					
					
			<table border="0" align="center">
				<tr>
					<td>  
						<p align="center"><img src="imagenes/candado.png" width="60px" height="70px"/></p><br/><br/>
						<p align="right">
						Usuario<input type="text" name="usuario" id="usuario" /><br/><br/>
						Clave<input type="password" name="password" id="password" /></p><br/><br/>
						<p align="center"><input type="button" value="Entrar" onclick="validarCampos()" /></p><br/><br/>
						
					 
					 </td>
				</tr>
			
				<tr>
					
					<td><p align="center"> <a href="#"> Olvidaste tu Clave? </a>  </p>	
					</td>
				</tr>
			</table>	
			   
			   
			   
			   
					
				 </form>
		</center>';
		
		
//=================================================================			
//===========MUESTRA EN PANTALLA DE RESULTADOS (SALIDA)============
//=================================================================			
		$html->salidaFinal($tituloPagina="Inicio de sesión",$Nmenu="MenuInicio",$mensaje);
?>
