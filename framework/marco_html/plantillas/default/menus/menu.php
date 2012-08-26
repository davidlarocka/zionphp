<?php 
/*=================================================================	
//=========FICHA DE LA ClASE	
//=================================================================		
	*SISTEMA VERSION: 0.0.1
	*CLASE:menu.php
	*DESCRIPCION:clase donde se arma el menu del sistema trayendo los parametros de la base de datos, asi como los permisos
	*CREADO POR: TSU David García
	*CORREO ELECTRONICO: davidlarocka@gmail.com
	*FECHA CREACION: 18-08-2012
	*FECHA ULTIMO MANTENIMIENTO:              POR:  

//=================================================================	*/	
class menus
{

	function menu2()
	{
	if($_SESSION['rol']=="")
		$_SESSION['rol']="0";
	//instanciamos a la clase que realizara la consulta para traer el menu y sus items		
	require("modelo/consultasMenus.php");
	$consultasCU_Menus= new consultasMenus();
	//este metodo realiza la consulta
	$menuDB=$consultasCU_Menus->menusDB();
	
	//una vez obtenidos armamos el html del menu que el servidor enviara como respuesta
	$html_menus.="<ul id='nav' class='dropdown dropdown-horizontal'>
				  <li class='first'><a href=''><br/></a></li>";
						$i=0;
						
						//revisamos item por item que esta en la tabla menus de la base de datos
						foreach($menuDB as $vuelta){
							//verificamos que el usuario tenga acceso a este item 
							if($_SESSION['rol']==$menuDB[$i][5]){
							
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
							
							}
						$i++;
						}
		
	
	
	
	
	
	
	//fin del menu			
	$html_menus.="<li class='dir last'>&nbsp;</li></ul>";
	
	$menu=$html_menus;	
		
		
	return $menu;
	
	}
	
	
}
?>

