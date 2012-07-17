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
		
		//instanciamos una consulta
		$consultasCU_deshabilitar= new consultas();
		
		
	//buscar los tipos de documentos que puede solicitar el alumno
		$objDatosUsuario=$consultasCU_deshabilitar->cambiarEstatus($id_usuario);
//=================================================================		
//==========ARMAR MENSAJE =========================================		
//=================================================================		
		echo "Datos Actualizados con Exito!";
	
?>
