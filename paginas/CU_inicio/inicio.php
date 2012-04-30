
<?php 
	// incluimos las clases necesarias para que corra la aplicacion
		//clase que trae las consultas de este caso de uso
		require("modelo/consultas.php");
		
		//clase que trae el marco html
		require ("../../class/marco_html/html.php");
		//hacemos una instancia del marco html
		$html = new Html();
		
		//instanciamos una consulta
		$selecionarNombre= new consultas();
		
		$respuesta=$selecionarNombre->consultarNombre();
		
		print_r( $respuesta);
		
		
	
		//$html->marco($mensaje);
	

?>
