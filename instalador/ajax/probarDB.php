<?php
$motor=$_GET['motor'];
$host=$_GET['host'];
$user=$_GET['user'];
$password=$_GET['password'];
// Cuando el motor es MySQL
if($motor=="mysql") {
  // Si está instalado MySQL entonces muestra la versión
  echo "Versión del cliente de MySQL: ".mysql_get_client_info() or die ("ERROR: Servicio MySQL se encuentra detenido");
  echo mysql_connect($host, $user, $password) ? "Conexión Exitosa <br/><p align='center'><input type='button' value='Instalar base de datos' onclick=\" crearDB(server.value, user.value, pass.value, nombre_bd.value, gestor_bd.value)\"></p>" : "Parámetros inválidos para la conexión";
}

if($motor=="psql") {
  // Tratamos de conectar a PostgreSQL
  $connection = "host=".$host."  user=".$user." password=".$password."";
  $version = pg_version();
  echo pg_connect($connection) ? "Versión del cliente de PostgreSQL: ".$version['client']."<br/>Conexión exitosa<p align='center'><input type='button' value='Instalar' onclick=\" crearDB(server.value, user.value, pass.value, nombre_bd.value, gestor_bd.value)\">" : "No hay conexión a PostgreSQL";
}
?>
