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
		
	//instanciamos una consulta
		$consultasCU_documentos= new consultas();
		
		
	//buscar los tipos de documentos que puede solicitar el alumno
		$id_usuario=$_SESSION['idt_usuario'];
		$objDocumentos=$consultasCU_documentos->selectSolicitudesUsuario($id_usuario,$tipo_Documento);
			
			foreach($objDocumentos as $valor)
				$i++;
				
			if($i!=""){
				
				echo "tienes ".$i." solicitudes en el mes actual";	
				//si alcanza un maximo de 3 solicitudes al mes no puede realizar una nueva solicitud
				if($i<3){
					echo "<input type='button' value='Solicitar' onclick='solicitarNuevo(\"".$tipo_Documento."\",\"".$id_usuario."\");' />";
				}else{
					echo "<br/><font color='red'>No puedes realizar mas solicitudes por este mes</font>";
				}
					
			}else{
				echo "No ha solicitado este tipo de Documento este mes";
				echo "<br/>
					
					<input type='button' value='Solicitar' onclick='solicitarNuevo(\"".$tipo_Documento."\",\"".$id_usuario."\");' />
				";
				
					
			}
	//
		
	
?>
