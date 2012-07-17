<?php


	require("../../modelo/consultas.php");
	//archivo que trae las validaciones particulares de este caso de uso
	//require("../../js/validaciones.js");
	require("../ajax.php");
	//clase que trae el marco html
	
//=================================================================		
//==========LOGICA DE NEGOCIOS ====================================		
//=================================================================
		
		$cedula=$_GET['cedula'];
		$nombres=$_GET['nombres'];
		$apellidos=$_GET['apellidos'];
		$rol=$_GET['rol'];
		$clave=$_GET['clave'];
		$psecreta=$_GET['psecreta'];
		$rsecreta=$_GET['rsecreta'];
		$fecha_registro=date('Y-m-d');
		//instanciamos una consulta
		$consultasCU_nuevoUsuario= new consultas();
		print_r($_GET);
		
	//buscar los tipos de documentos que puede solicitar el alumno
		$objDatosUsuario=$consultasCU_nuevoUsuario->registrarUsuario($cedula, $nombres, $apellidos, $rol, $clave, $rsecreta, $fecha_registro, $psecreta);
//=================================================================		
//==========ARMAR MENSAJE =========================================		
//=================================================================		
		echo "Usuario Creado con Exito!";
	
?>
