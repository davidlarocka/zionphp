<?php 
 
   
   require('../../framework/marco_html/menus/menu.php');
   $plantillaHtml.= '
   
		<head>
			<link rel="shortcut icon" type="image/x-icon" href="../../framework/marco_html/libreriaMenus/css/dropdown/themes/vimeo.com/images/favicon.ico" />
			<link href="../../framework/marco_html/libreriaMenus/css/dropdown/themes/vimeo.com/helper.css" media="screen" rel="stylesheet" type="text/css" />

			<!-- Beginning of compulsory code below -->
	
			<link href="../../framework/marco_html/libreriaMenus/css/dropdown/dropdown.css" media="screen" rel="stylesheet" type="text/css" />
			<link href="../../framework/marco_html/libreriaMenus/css/dropdown/themes/vimeo.com/default.advanced.css" media="screen" rel="stylesheet" type="text/css" />
		
		</head>
		<body bgcolor="#B9B9B9">			
					<center><table border="0" width="60%" height="90%" aling="center" bgcolor="#EDEDED">
						  <tr height="15%">
							  <td> 
							  
							 <img src="../../framework/marco_html/imagenes/logosis.png"  alt"logo.png" width="100%" height="150px"/>
							 
							
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
