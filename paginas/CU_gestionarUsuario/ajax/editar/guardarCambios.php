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
		$clave=$_GET['clave'];
		
		if ($_SESSION ['rol']==2){
			$rol=2;
			}
		else if($_SESSION ['rol']==1){
			$rol=$_GET['rol'];
			}
		//instanciamos una consulta
		$consultasCU_editar= new consultas();
		
		
	//buscar los tipos de documentos que puede solicitar el alumno
		$objDatosUsuario=$consultasCU_editar->actualizarDatosUsuario($id_usuario, $cedula, $nombres, $apellidos, $rol, $clave);
//=================================================================		
//==========ARMAR MENSAJE =========================================		
//=================================================================		
		echo "Datos Actualizados con Exito!";
	
?>
