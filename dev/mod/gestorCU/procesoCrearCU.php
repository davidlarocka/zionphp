<?php 
	//print_r($_GET);
	require('modelo/consultas.php');
	$consultasMenus = new consultas();
	
	
	//tomamos los parametros para ver que componentes tendra el caso de uso que estamos generando
	$nombreCU=$_GET['nombreCU'];
	$consultas=$_GET['consultas'];
	$reportes=$_GET['reportes'];
	$ajax=$_GET['ajax'];
	$descripcionModulo=$_GET['descripcionModulo'];
	$nombreMenuCU=$_GET['nombreMenuCU'];
	$tipoMenus=$_GET['tipoMenus'];
	$nombreMenuPadre=$_GET['nombreMenuPadre'];
	
	require('contenidoFicheros.php');
	
	$rutaCrear="../../../paginas/CU_".$nombreCU;
	mkdir($rutaCrear,0777) or die ("no se pudo crear el modulo"); 
	chmod($rutaCrear,0777) or die ("so se pudieron dar privilegios publicos");
	//==============CREAR CONSULTAS========================//
	//primero verificamos si hay que crear consultas en este caso de uso
	if($consultas=="true"){
		//creamos la carpeta
		$rutaCrear="../../../paginas/CU_".$nombreCU."/modelo";
    	mkdir($rutaCrear,0777)or die ("no se pudo crear el modulo"); 
	    chmod($rutaCrear,0777)or die ("so se pudieron dar privilegios publicos");
		
		//creamos el fichero que contendra el modelo con las clases para realizar las consultas de ese caso de uso
		$rutaCrearFichero=$rutaCrear."/consultas.php";
		$gestor = fopen($rutaCrearFichero, "w") or die ("no se crearon los archivos de Conexion"); 
		// escribimos el script php
		fwrite($gestor, $contenidoConsultas); 
		fclose($gestor); 	
		chmod ($rutaCrearFichero,0777); 
	}
		//==============CREAR REPORTES========================//
	if($reportes=="true"){
		//creamos la carpeta
		$rutaCrear="../../../paginas/CU_".$nombreCU."/reportes";
    	mkdir($rutaCrear,0777)or die ("no se pudo crear el modulo"); 
	    chmod($rutaCrear,0777)or die ("so se pudieron dar privilegios publicos");
		
		//creamos el fichero que contendra el modelo con las clases para realizar las consultas de ese caso de uso
		$rutaCrearFichero=$rutaCrear."/reporte1.php";
		$gestor = fopen($rutaCrearFichero, "w") or die ("no se crearon los archivos de Reportes"); 
		// escribimos el script php
		fwrite($gestor, $contenidoReporte); 
		fclose($gestor); 	
		chmod ($rutaCrearFichero,0777); 
	}
	//==============CREAR INDEX CONTROLADOR========================//
	
	$rutaCrearFichero="../../../paginas/CU_".$nombreCU."/index.php";
	$gestor = fopen($rutaCrearFichero, "w") or die ("no se creo el archivo index controlador"); 
		// escribimos el script php
		fwrite($gestor, $contenidoIndex); 
		fclose($gestor); 	
		chmod ($rutaCrearFichero,0777);
	
	//creamos el menu asociado al modulo
	if($tipoMenus=="padre"){
		$nivel=1;
		$id_menu_padre=0;
	}else{
		$nivel=2;
		$id_menu_padre=$nombreMenuPadre;
	}
	
	$descripcion=$nombreMenuCU;
	$url="../CU_".$nombreCU;
	$acceso=1;
	$objMenusExistentes	= $consultasMenus->crearMenus($nivel, $id_menu_padre, $descripcion, $url, $acceso);
	echo "se creo el caso de uso correctamente";




?>
