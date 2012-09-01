<?php 
	print_r($_GET);
	require('modelo/consultas.php');
	$consultasMenus = new consultas();
	
	//exit;
	//tomamos los parametros para ver que componentes tendra el caso de uso que estamos generando
	
	$nombreMenu=$_GET['nombreMenuCU'];
	$tipoMenus=$_GET['tipoMenus'];
	$nombreMenuPadre=$_GET['nombreMenuPadre'];
	
	$url="http://".$_GET['url'];
	
	
	
	//creamos el menu asociado al modulo
	if($tipoMenus=="padre"){
		$nivel=1;
		$id_menu_padre=0;
	}else{
		$nivel=2;
		$id_menu_padre=$nombreMenuPadre;
	}
	
	$descripcion=$nombreMenu;
	$acceso=1;
	$objMenusExistentes	= $consultasMenus->crearMenus($nivel, $id_menu_padre, $descripcion, $url, $acceso);
	echo "se creo el menu correctamente";




?>
