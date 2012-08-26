<?php
//===============================CONTENIDO FICHERO REPORTE==================================================//
$tipoMenu=$_GET['tipoMenu'];

	require('modelo/consultas.php');
	$consultasMenus = new consultas();
	//consultamos los menus de los casos de usos creados ya
	$objMenusExistentes	= $consultasMenus->menusDB();
	print_r($objMenusExistentes);
	$n=count($objMenusExistentes);

if($tipoMenu=="padre"){
	echo "<br/>Nombre de Menu: <input type='text' id='nombreMenuCU' value='' />
							   <input type='hidden' id='nombreMenuPadre' value='0' />";	
}
if($tipoMenu=="sub"){
	echo "<br/>Nombre de Menu: <input type='text' id='nombreMenuCU' value='' /><br/>";
	$select.= "<br/>Es Item de: <select  id='nombreMenuPadre'>";	
	
	for($i=0;$i<$n;$i++){
		if($objMenusExistentes[$i][1]==1){
			$select.="<option value='".$objMenusExistentes[$i][0]."'>".$objMenusExistentes[$i][3]."</option>"; 
		}
	}	   
	$select.="</select>";
	echo $select;	
}
?>
