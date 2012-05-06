<?php 
   $menu_admin='<!-- Beginning of compulsory code below -->

<ul id="nav" class="dropdown dropdown-horizontal">
	<li class="first"><a href="./">Inicio</a></li>
	<li class="dir">Acerca de Zi&oacute;nPHP
		<ul>
			<li class="first"><a href="./">Historia</a></li>
			
			<li  class="last"><a href="./" class="dir">Comunidad</a>
				<ul>
					<li class="first"><a href="./">CUFM</a></li>
					<li><a href="./">MPPRIJ</a></li>
					<li><a href="./">CNTI</a></li>
					<li class="last"><a href="./">OVI</a></li>
					
				</ul>
			</li>	
		</ul>
	</li>
	<li class="dir last"><br/>
	</li>
</ul>
';
   
   
   $plantillaHtml.= '
   
		<head>
			<link rel="shortcut icon" type="image/x-icon" href="../../framework/marco_html/libreriaMenus/css/dropdown/themes/vimeo.com/images/favicon.ico" />
			<link href="../../framework/marco_html/libreriaMenus/css/dropdown/themes/vimeo.com/helper.css" media="screen" rel="stylesheet" type="text/css" />

			<!-- Beginning of compulsory code below -->
	
			<link href="../../framework/marco_html/libreriaMenus/css/dropdown/dropdown.css" media="screen" rel="stylesheet" type="text/css" />
			<link href="../../framework/marco_html/libreriaMenus/css/dropdown/themes/vimeo.com/default.advanced.css" media="screen" rel="stylesheet" type="text/css" />
		
		</head>
		<body bgcolor="#B9B9B9">			
					<center><table border="0" width="90%" height="100%" aling="center" bgcolor="white">
						  <tr height="15%">
							  <td> 
							  
							 <img src="../../framework/marco_html/imagenes/logosis.png"  alt"logo.png" width="100%" height="200px"/>
							 
							
							  </td>
						  </tr>
						  <tr height="5%" >
							  <td> 
							  '.$menu_admin.'
							  </td>
						  </tr>
						   <tr height="75%" >
							  <td> 
								'.$mensaje.'
							  </td>
						  </tr>
					  </table><br/><br/><br/>
					  
					</center>
     </body>'
     ;
     
     

?>
