<?php
//===============================CONTENIDO FICHERO REPORTE==================================================//
$contenidoConsultas.="<?php\n/*=================================================================\n";
$contenidoConsultas.="//=========FICHA DE LA ClASE\n//=================================================================\n";
$contenidoConsultas.="	*SISTEMA VERSION: 1.0\n";    
$contenidoConsultas.="   *CLASE:consultas.php\n";
$contenidoConsultas.="   *DESCRIPCION:".$descripcionModulo." \n";     
$contenidoConsultas.="   *CREADO POR: \"desarrollador\"	*CORREO ELECTRONICO: \n";    
$contenidoConsultas.="   *FECHA CREACION: ".date('d-m-Y')." \n";   
$contenidoConsultas.="   *FECHA ULTIMO MANTENIMIENTO:              POR: \n";
$contenidoConsultas.="//=================================================================	*/ \n";     
$contenidoConsultas.="	class consultas{\n";
$contenidoConsultas.="		function selectDeEjemplo(){\n";
$contenidoConsultas.="		  //traemos la clase db_consultas que contiene los metodos y atributos que interactian con el modelo\n";
$contenidoConsultas.="		  require (\"../../framework/db/class_db.php\");\n";
$contenidoConsultas.="        //con esta instancia nos conectamos a la base de datos y traemos todas las funcionalidades de la clase bd_consultas\n";
$contenidoConsultas.="        \$conexionDB= new db_consultas();\n";
$contenidoConsultas.="        //aki indicamos una cadena de conexion distinta a la indicada en la configuracion\n";
$contenidoConsultas.="        //\$conexionDB->cadenaConexion= \"conexion/conexion1.php \";\n";
$contenidoConsultas.="		  //======== armar la consulta =============================\n\n";
$contenidoConsultas.="		    	//indicamos los campos a consultar EN UN ARREGLO\n";
$contenidoConsultas.="		    	\$campos=array(\"\");\n";
$contenidoConsultas.="			    //indicamos la tabla donde vamos a buscar los campos EN UN ARREGLO\n";
$contenidoConsultas.="		    	\$tablas=array(\"\");\n";
$contenidoConsultas.="			    //indicamos la condicion donde vamos a buscar los campos EN UN ARREGLO\n";
$contenidoConsultas.="				\$condicion=array(\"\");\n";
$contenidoConsultas.="				//indicamos el agrupar por \n";
$contenidoConsultas.="				\$groupBy=array();\n";
$contenidoConsultas.="				//indicamos el ordenar por \n";
$contenidoConsultas.="				\$orderBy=\"\";\n";
$contenidoConsultas.="				//indicamos el limite \n";
$contenidoConsultas.="				\$limit=\"\";\n";
$contenidoConsultas.="           //devolvemos los resultados de la consulta al controlador\n";
$contenidoConsultas.="			  return \$respuesta=\$conexionDB->select(\$campos,\$tablas,\$condicion,\$groupBy,\$orderBy);\n";
$contenidoConsultas.="	    }\n";
$contenidoConsultas.="	}\n";
$contenidoConsultas.="?>";
//===============================CONTENIDO FICHERO REPORTE==================================================//
$contenidoReporte.="<?php\n";
$contenidoReporte.="require(\"../../../framework/librerias/MPDF52/mpdf.php\");\n";

if($consultas=="true")
	$contenidoReporte.="require(\"../modelo/consultas.php\");\n";
if($consultas=="true")
	$contenidoReporte.="\$objConsultasReporte = new consultas();\n";	
$contenidoReporte.="\$mensaje=\"Hola Mundo!, Reporte\";\n\n\n";
$contenidoReporte.="\$mpdf=new mPDF();\n";
$contenidoReporte.="\$mpdf->WriteHTML(utf8_encode(\$mensaje));\n";
$contenidoReporte.="\$mpdf->Output();\n"; 
$contenidoReporte.="exit;\n";
$contenidoReporte.="?>\n";

//===============================INDEX CONTROLADOR==================================================//
$contenidoIndex.="<?php\n/*=================================================================\n";
$contenidoIndex.="//=========FICHA DEL CASO DE USO\n//=================================================================\n";
$contenidoIndex.="	*SISTEMA VERSION: 1.0\n";    
$contenidoIndex.="   *CASO DE USO: \n";
$contenidoIndex.="   *DESCRIPCION: \n";     
$contenidoIndex.="   *CREADO POR: \"desarrollador\"	*CORREO ELECTRONICO: \n";    
$contenidoIndex.="   *FECHA CREACION: ".date('d-m-Y')." \n";   
$contenidoIndex.="   *FECHA ULTIMO MANTENIMIENTO:              POR: \n";
$contenidoIndex.="//=================================================================	*/ \n\n";  
$contenidoIndex.="  // incluimos las clases necesarias para que corra la aplicacion\n";
$contenidoIndex.="    //clase que trae las consultas de este caso de uso\n";

if($consultas=="true")
	$contenidoIndex.="    require(\"modelo/consultas.php\");\n";

$contenidoIndex.="    require (\"../../framework/marco_html/html.php\");\n";
$contenidoIndex.="    session_start();\n";
$contenidoIndex.="//=================================================================\n";
$contenidoIndex.="//hacemos una instancia del marco html\n";
$contenidoIndex.="  \$html = new Html();\n";

if($consultas=="true")
	$contenidoIndex.="//instanciamos una consulta\n";
if($consultas=="true")
	$contenidoIndex.="  \$consultasCU_inicio= new consultas();\n";
$contenidoIndex.="//=================================================================\n";
$contenidoIndex.=" //==========LOGICA DE NEGOCIOS ===================================\n";
$contenidoIndex.="//=================================================================\n\n\n\n";



$contenidoIndex.="//=================================================================\n";
$contenidoIndex.="//==========ARMAR SALIDA (VISTA) ==================================\n";
$contenidoIndex.="//=================================================================\n\n\n";

$contenidoIndex.="    \$mensaje=\"<br/><p><font color='#3B3B3B'>Armar salida html aqui</font></p>\";\n\n";

$contenidoIndex.="//=================================================================\n";
$contenidoIndex.="//==========MUESTRA EN PANTALLA DE RESULTADOS (SALIDA) ============\n";
$contenidoIndex.="//=================================================================\n\n\n\n";
$contenidoIndex.="  \$html->salidaFinal(\$tituloPagina=\"\",\$menu=\"menu2\",\$mensaje);\n";
$contenidoIndex.=" ?>";
?>
