
<?php 
/*=================================================================	
//=========FICHA DEL CASO DE USO	
//=================================================================		
	*FRAMEWORK VERSION: 0.0.1
	*CASO DE USO:
	*CREADO POR:
	* CORREO ELECTRONICO:
	*ULTIMO MANTENIMIENTO:              POR:  

//=================================================================	*/
	
	
	// incluimos las clases necesarias para que corra la aplicacion
		//clase que trae las consultas de este caso de uso
		require("modelo/consultas.php");
		
		//clase que trae el marco html
		require ("../../class/marco_html/html.php");

//=================================================================			

		//hacemos una instancia del marco html
		$html = new Html();
		
		//instanciamos una consulta
		$selecionarNombre= new consultas();
		
//=================================================================		
//==========LOGICA DE NEGOCIOS ====================================		
//=================================================================
		
		$respuesta=$selecionarNombre->consultarNombre();
		
		$mensaje.=$respuesta;
		
//=================================================================			
//===========MUESTRA EN PANTALLA DE RESULTADOS (SALIDA)============
//=================================================================			
		$html->marco($mensaje);
	

?>
