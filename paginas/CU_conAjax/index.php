
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
		//require("js/validaciones.php");
		//clase que trae el marco html
		//require("ajax/ajax.php");
		//clase que trae el marco html
		
		require ("../../framework/marco_html/html.php");
		session_start();
//=================================================================			

		//hacemos una instancia del marco html
		$html = new Html();
		
		//instanciamos una consulta
		$consultasCU_solicitud= new consultas();
			require("../../framework/db/classdbPG.php");
			$ObjDbPG = new bd();
			define("conect","../../framework/db/CX_APLI0000_SIS_V10");	
			$conector=$ObjDbPG->classdb(conect);
			$conector=$ObjDbPG->conectar();
			$parametros=array();
			/*$parametros[0]=0;
			$parametros[1]=1;
			$parametros[2]=2;*/
			$consulta=$ObjDbPG->SELECT("public.sw_obtener_tipo_titular",$parametros);
			$consulta2=$ObjDbPG->SELECT("public.sw_obtener_tipo_solicitante",$parametros);
		

	$datos=pg_fetch_array($consulta);

	$datos1=explode(",",$datos[0]);

	/*CONSULTAR TITULAR*/	
	$ComboTitular="<select id='titular' name='titular'>
	<option value='0'>Seleccione...</option>";
	
	foreach($datos1 as $clave => $valor)
	{

		$datos2=explode("@",$datos1[$clave]);
		//echo $datos2[0]." ".$datos2[1]."<br />";
		$reemplazar=array('"',"{","}");
		$datosID=str_replace($reemplazar,"",$datos2[0]);
		$datosN=str_replace($reemplazar,"",$datos2[1]);
		$ComboTitular.="<option value='".$datosID."'>".$datosN."</option>";
	}	
	$ComboTitular.="</select>";
	
	/*CONSULTAR SOLICITANTE*/
	$datos=pg_fetch_array($consulta2);
	$datos1=explode("\",\"",$datos[0]);
	$ComboSolicitante='<select id="solicitante" name="solicitante">
	<option value="0">Seleccione...</option>';
	//creamos un select 

		foreach($datos1 as $clave => $valor)
			{
				$datos2=explode("@",$datos1[$clave]);
				$reemplazar=array("\"{","\"}","}","{","\"");
				$datosID=str_replace($reemplazar,"",$datos2[0]);
				$datosN=str_replace($reemplazar," ",$datos2[1]);
				$ComboSolicitante.="<option value='".$datosID."'>".$datosN."</option>";
			}	
	$ComboSolicitante.="</select>";
	
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
//=================================================================		
//==========ARMAR LA SALIDA ====================================		
//=================================================================		
	
		
	//llenamos el mensaje que estara dentro de nuestro marco html de salida	
		
		$mensaje="
		<form action='../CU_obtenerRecaudos/index.php' name='formularioSolicitud1' id='formularioSolicitud1' method='POST'>
				<table border='0' align='center' bgcolor='#CDEAF4'>
					<tr height='10%'>
						<td style='background:#CCC' align='center' colspan='2'>
							<i>Certificación Internacional <b>".date("d-m-Y")."</b></i>
						</td>
					</tr>	
					<tr>
						<td align='right'>
							Seleccione tipo de Titular:
						</td>
						<td align='left'>
							".$ComboTitular."
						</td>
					</tr>
					<tr>
						<td align='right'>
							Seleccione tipo de Solicitante:
						</td>
						<td align='left'>
							".$ComboSolicitante."
						</td>
					</tr>
					<tr>
						<td align='center'>
							<input type='button' value='Siguiente --->' onclick='validarSolicitud()' />
						</td>
					</tr>					
				  </table>
		</form>";
				  

//=================================================================			
//===========MUESTRA EN PANTALLA DE RESULTADOS (SALIDA)============
//=================================================================			
		$html->salidaFinal($titulopagina="Iniciar Solicitud",$menu="menu2",$mensaje);
	

?>
