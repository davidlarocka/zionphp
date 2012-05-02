<?php 
	//definimos la clase html
	
	
	
	class Html {
		
			function marco ($mensaje){
				
				require ("menus/menusUsuario.php");
				
				echo '<center><table border="1" width="90%" height="100%" aling="center">
						  <tr height="20%">
							  <td> 
							  encabezado
							  </td>
						  </tr>
						  <tr height="10%" >
							  <td> 
							  '.$menu_admin.'
							  </td>
						  </tr>
						   <tr height="70%" >
							  <td> 
								'.$mensaje.'
							  </td>
						  </tr>
					  </table></center>';
				
				
			}
		
		
	}


?>
