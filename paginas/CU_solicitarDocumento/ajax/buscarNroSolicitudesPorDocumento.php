<?php


	require("../modelo/consultas.php");
		//archivo que trae las validaciones particulares de este caso de uso
	require("../js/validaciones.php");
	//clase que trae el marco html
	session_start();
//=================================================================		
//==========LOGICA DE NEGOCIOS ====================================		
//=================================================================
		
	//instanciamos una consulta
		$consultasCU_documentos= new consultas();
		
		
	//buscar los tipos de documentos que puede solicitar el alumno
		$id_usuario=$_SESSION['idt_usuario'];
		$objDocumentos=$consultasCU_documentos->selectSolicitudesUsuario($id_usuario);
		
		foreach($objDocumentos as $valor)
			$i++;
			
		echo "tienes ".$i." solicitudes en el mes actual";	
		
	
	
?>
