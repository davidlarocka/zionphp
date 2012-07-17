<?php


	require("../modelo/consultas.php");
		//archivo que trae las validaciones particulares de este caso de uso
	require("../js/validaciones.php");
	require("ajax.php");
	//clase que trae el marco html
	session_start();
//=================================================================		
//==========LOGICA DE NEGOCIOS ====================================		
//=================================================================
		
		$tipo_Documento=$_GET['tipoDocumento'];
		$id_usuario=$_GET['id_usuario'];
		
	//instanciamos una consulta
		$consultasCU_solicitarNuevoDocumento= new consultas();
		
		
	//buscar los tipos de documentos que puede solicitar el alumno
		$id_usuario=$_SESSION['idt_usuario'];
		$objNuevaSolicitud=$consultasCU_solicitarNuevoDocumento->insertNuevaSolicitud($id_usuario,$tipo_Documento);
			
			
	//
		
	
?>
