
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
		require("ajax/ajax.php");
		//clase que trae el marco html
		
		require ("../../framework/marco_html/html.php");
		session_start();
//=================================================================			

		//hacemos una instancia del marco html
		$html = new Html();
		
		//instanciamos una consulta
		$consultasCU_documentos= new consultas();
		
//=================================================================		
//==========LOGICA DE NEGOCIOS ====================================		
//=================================================================
	
	//buscar los tipos de documentos que puede solicitar el alumno
	
		$objDocumentos=$consultasCU_documentos->selectDocumentos();
		
	$ComboDocumentos.="<Select id='documentos' name='documentos' onchange='buscarSolicitudesHechas(\"this.value\")'>";
	//creamos un select 
	foreach($objDocumentos as $valor){
			$ComboDocumentos.="<option value='".$valor[0]."'>".$valor[0]."</option>";
	}	
	$ComboDocumentos.="</Select>";	
		
//=================================================================		
//==========ARMAR LA SALIDA ====================================		
//=================================================================		
	
		
	//llenamos el mensaje que estara dentro de nuestro marco html de salida	

		$mensaje.="<table border='1' width='50%' height='80%' align='center'>
					<tr height='10%'>
						<td>
							Solicitud de Documentos
						</td>
						
					</tr>	
					<tr>
						<td>
						<center>Seleccione Documento:".$ComboDocumentos."</center>
						<div id='contenedor'></div>
						</td>
						
					</tr>
				  </table>";	
		
		


//=================================================================			
//===========MUESTRA EN PANTALLA DE RESULTADOS (SALIDA)============
//=================================================================			
		$html->salidaFinal($mensaje);
	

?>
