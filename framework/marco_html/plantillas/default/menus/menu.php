<?php 
class menus
{

	function menu2()	//Menú Principal: Administrador
	{
			
		require("modelo/consultasMenus.php");
		$consultasCU_Menus= new consultasMenus();
		$menuDB=$consultasCU_Menus->menusDB();
	print_r($menuDB);
	$estiloCSS="<style type='text/css'>
										

		</style>";
	
	$html_menus.=$estiloCSS;
	//una vez obtenidos armamos el html
	$html_menus.="<ul id='nav'>";
						$i=0;
						foreach($menuDB as $vuelta){
							//id del menu que estamos recorriendo
							$id_menu=$menuDB[$i][0];
							//verificamos si es de nivel 1 los niveles 1
							if( $menuDB[$i][1]==1){
								$html_menus.="<li><a href='".$menuDB[$i][4]."'>".$menuDB[$i][3]."</a>";
								//colocamos los niveles 2 del nivel 2 donde estamos
									$j=0;
									$p=0;
									foreach($menuDB as $vuelta2){
										if( $menuDB[$j][1]==2 && $menuDB[$j][2]==$id_menu ){
											if($p==0){
												$html_menus.="<ul>";
												$p=1;
											}
										
												$html_menus.="<li><a href='".$menuDB[$j][4]."'>".$menuDB[$j][3]."</a></li>";
										
										}
										$j++;
									}
									if($p==1)
									$html_menus.="</ul>";
								$html_menus.="</li>";
							
							} 
							$i++;
						}
		
	
	
	
	
	
	
	//fin del menu			
	$html_menus.="</ul>";
	
	$menu=$html_menus;	
		
		
	return $menu;
	
	}
	function menuInicio()
	{
		
		require("modelo/consultasMenus.php");
		$consultasCU_Menus= new consultasMenus();
		$menuDB=$consultasCU_Menus->menusDB();
	print_r($menuDB);
	$estiloCSS="<style type='text/css'>
										

		</style>";
	
	$html_menus.=$estiloCSS;
	//una vez obtenidos armamos el html
	$html_menus.="<ul id='nav'>";
						$i=0;
						foreach($menuDB as $vuelta){
							//id del menu que estamos recorriendo
							$id_menu=$menuDB[$i][0];
							//verificamos si es de nivel 1 los niveles 1
							if( $menuDB[$i][1]==1){
								$html_menus.="<li><a href=''>".$menuDB[$i][3]."</a>";
								//colocamos los niveles 2 del nivel 2 donde estamos
									$j=0;
									$p=0;
									foreach($menuDB as $vuelta2){
										if( $menuDB[$j][1]==2 && $menuDB[$j][2]==$id_menu ){
											if($p==0){
												$html_menus.="<ul>";
												$p=1;
											}
										
												$html_menus.="<li><a href=''>".$menuDB[$j][3]."</a></li>";
										
										}
										$j++;
									}
									if($p==1)
									$html_menus.="</ul>";
								$html_menus.="</li>";
							
							} 
							$i++;
						}
		
	
	
	
	
	
	
	//fin del menu			
	$html_menus.="</ul>";
	
	$menu=$html_menus;	
		
		
	return $menu;
	
	}
	
}
?>
