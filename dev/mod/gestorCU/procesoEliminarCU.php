<?php 
	print_r($_GET); 
	require('modelo/consultas.php');
	$casosDeUso=$_GET['casosDeUso'];
////////borrar directorio
//Eliminar el Caso de Uso
function rrmdir($dir) {
   if (is_dir($dir)) {
     $objects = scandir($dir);
     foreach ($objects as $object) {
       if ($object != "." && $object != "..") {
         if (filetype($dir."/".$object) == "dir") rrmdir($dir."/".$object); else unlink($dir."/".$object);
       }
     }
     reset($objects);
     $res=rmdir($dir);
     if($res==true)
		echo $dir."Eliminado De forma correcta";
   }
 }

$dir='../../../paginas/'.$casosDeUso;
rrmdir($dir);




?>
