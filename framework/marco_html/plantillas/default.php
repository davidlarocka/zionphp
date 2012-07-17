<?php 
class marcohtml
{
	function html($tituloPagina,$Nmenu,$mensaje)
	{

		require('../../framework/marco_html/menus/menu.php');		
		$Objmenus=new menus();
		$menu=$Objmenus->$Nmenu();
		
		///URL actual de la página
		$host = $_SERVER['HTTP_HOST'];
		$self = $_SERVER['PHP_SELF'];
		$query = !empty($_SERVER['QUERY_STRING']) ? $_SERVER['QUERY_STRING'] : null;
		$url = !empty($query) ? "http://$host$self?$query" : "http://$host$self";
		$url=str_replace("index.php","",$url);
		
		$plantillaHtml='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
			<title>'.$tituloPagina.'</title>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<link rel="shortcut icon" type="image/x-icon" href="../../framework/marco_html/libreriaMenus/css/dropdown/themes/vimeo.com/images/favicon.ico" />
			<link href="../../framework/marco_html/libreriaMenus/css/dropdown/themes/vimeo.com/helper.css" media="screen" rel="stylesheet" type="text/css" />
			<link href="../../framework/marco_html/libreriaMenus/css/dropdown/dropdown.css" media="screen" rel="stylesheet" type="text/css" />
			<link href="../../framework/marco_html/libreriaMenus/css/dropdown/themes/vimeo.com/default.css" media="screen" rel="stylesheet" type="text/css" />
			<link href="../../framework/marco_html/libreriaMenus/css/dropdown/themes/vimeo.com/default.advanced.css" media="screen" rel="stylesheet" type="text/css" />
			<link href="../../framework/marco_html/css/estilos.css" media="screen" rel="stylesheet" type="text/css" />
			<script type="text/javascript" src="../../framework/librerias/prototype.js"></script>
			<script type="text/javascript" src="../../framework/librerias/incluir.js"></script>
			<script type="text/javascript" src="'.$url.'js/validaciones.js"></script>
		</head>
		<body bgcolor="white">			
			<table style="height:700px;min-height:700px;margin:0 auto" border="0" width="900px" align="center" bgcolor="#F5F5FF">
				<tr>
					<td valign="top" height="10px"> 
						<img src="../../framework/marco_html/imagenes/corazon_venezolano.png" alt="logo.png" width="100%" height="45px"/>
					</td>
				</tr>
				<tr>
					<td valign="top" height="10px"> 
						<img src="../../framework/marco_html/imagenes/logosis.png" alt="logo.png" width="100%" height="100px"/>
					</td>
				</tr>
				<tr height="10px">
					<td> 
						'.$menu.'
					</td>
				</tr>
				<tr>
					<td align="center"> 
						'.$mensaje.'
					</td>
				</tr>
			 </table>
		</body>
	</html>';
	echo $plantillaHtml;
	}
	
}
?>
