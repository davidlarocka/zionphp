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
		$cedula=$_GET['cedula'];
		$nombres=$_GET['nombres'];
		$apellidos=$_GET['apellidos'];
		$clave=md5($_GET['clave']);
		//esto garantiza que un usuario no puede cambiar su rol a administrador
		if ($_SESSION ['rol']==2){
			$rol=2;
			}
		else if($_SESSION ['rol']==1){
			$rol=$_GET['rol'];
			}
		//instanciamos una consulta
		$consultasCU_editar= new consultas();
		
		
	//actualiza todos los datos
		if($_GET['clave']!="")
		$objDatosUsuario=$consultasCU_editar->actualizarDatosUsuario($id_usuario, $cedula, $nombres, $apellidos, $rol, $clave);
	//buscar los tipos de documentos que puede solicitar el alumno
		if($_GET['clave']=="")
		$objDatosUsuario=$consultasCU_editar->actualizarDatosUsuarioNoClave($id_usuario, $cedula, $nombres, $apellidos, $rol);	
//=================================================================		
//==========ARMAR MENSAJE =========================================		
//=================================================================		
		echo "Datos Actualizados con Exito!";
	
?>
