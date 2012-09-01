<?php
 
   //leemos todos los casos de uso que estn el la carpeta paginas
if ($gestor = opendir('../../../paginas')) {
    $i=0;
    while (false !== ($entrada = readdir($gestor))) {
        $CU[$i]=$entrada;
		$i++;
    }
	
    closedir($gestor);
}
	echo "<b>Seleccione el Modulo que desea editar:</b>";
   $comboCU.="<select id='casosDeUso'>";
   //armamos el combo con los casos de uso
	foreach($CU as $valor){
		$comboCU.="<option value='".$valor."'>".$valor."</option>";
	}
	
	$comboCU.="</select>";
   echo $comboCU;

	
?>

<br/>
<br/>
<input type="button" value="eliminar" onclick="eliminarCU(casosDeUso.value)">
