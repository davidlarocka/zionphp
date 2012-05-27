<?php
$servidor=$_GET['server'];
$usuario=$_GET['user'];
$pass=$_GET['pass'];

$estadoCliente=mysql_get_client_info();
//si esta instalado mysql entonces dice la version
if($estadoCliente==true){
	echo "version del cliente de mysql: ".mysql_get_client_info();

	$link =  mysql_connect($servidor, $usuario, $pass);

	//verifica si se conecto
	if($link==false){
			echo "parametros invalidos para la conexion";
		}else{
			echo "Conexion Exitosa <br/><p align='center'><input type='button' value='Instalar' onclick=\" crearDB(server.value, user.value, pass.value, nombre_bd.value)\"></p>
";	
	}

}else{
	
echo "ERROR: Servicio Mysql se encuentra detenido";
}


?>
