<?php 
class marcohtml
{
	function html($tituloPagina,$Nmenu,$mensaje)
	{

		require('../../framework/marco_html/plantillas/benzion/menus/menu.php');		
		$Objmenus=new menus();
		$menu=$Objmenus->$Nmenu();
		
		///URL actual de la página
		$host = $_SERVER['HTTP_HOST'];
		$self = $_SERVER['PHP_SELF'];
		$query = !empty($_SERVER['QUERY_STRING']) ? $_SERVER['QUERY_STRING'] : null;
		$url = !empty($query) ? "http://$host$self?$query" : "http://$host$self";
		$url=str_replace("index.php","",$url);
		
		$plantillaHtml='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html>
  <head>
    <title></title>
    <link rel="stylesheet" type="text/css" media="screen" href="../../framework/marco_html/plantillas/benzion/css/style.css">
    <link rel="stylesheet" type="text/css" href="../../framework/marco_html/plantillas/benzion/css/tool-tip.css" />
    <link rel="stylesheet" href="../../framework/marco_html/plantillas/benzion/css/menu.css" type="text/css">
  </head>
  <body>
	<center><div class="ventana">
		<div>
			<div class="banner"></div>
			<!-- div id="tool-tip">
				<!--ul class="tt-links">
					<li><a class="tt-gplus" href="#"><span>Google Plus</span></a></li>
					<li><a class="tt-twitter" href="#"><span>Twitter</span></a></li>
					<li><a class="tt-dribbble" href="#"><span>Dribbble</span></a></li>
					<li><a class="tt-facebook" href="#"><span>Facebook</span></a></li>
					<li><a class="tt-linkedin" href="#"><span>LinkedIn</span></a></li>
					<li><a class="tt-forrst" href="#"><span>Forrst</span></a></li>
				</ul>
			</div -->
			<!--div class="tool-tip">
			
			</div -->
		</div -->
			<br/><br/><br/><br/><br/><br/><br/>
		<div style="border-radius:10px;">
			<div id=""><br/><br/><br/></div>
			<div id="contenido" style="color:white;text-align:left;">
				'.$menu.'
				'.$mensaje.'
				
				
				
			</div>
		</div>
	</div>
	</center>
	   <br/><p align="center"><font color="black"><b>ZionPHP V1.0<br/>Proyecto de Software Libre</b></font>
		    </p>	
  </body>
</html>';
	echo $plantillaHtml;
	}
	
}
?>
