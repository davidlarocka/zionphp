<?php
$motor=$_GET['motor'];
$host=$_GET['host'];
$dbname=$_GET['dbname'];
$user=$_GET['user'];
$passwordword=$_GET['password'];
$create_mysql = 'CREATE TABLE `'.$dbname.'`.`t_usuarios` (
  `id_usuario` int(11) NOT NULL,
  `p_nombre` varchar(45) DEFAULT NULL,
  `p_apellido` varchar(45) DEFAULT NULL,
  `cedula` int(15) DEFAULT NULL,
  `rol` int(15) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `psecreta` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
  );';
$create_postgres = 'CREATE TABLE t_usuarios (
  id_usuario SERIAL,
  p_nombre CHARACTER(15),
  p_apellido CHARACTER(15),
  cedula INTEGER,
  rol INTEGER DEFAULT 0,
  password CHARACTER(200),
  psecreta CHARACTER(200),
  CONSTRAINT id_usuario PRIMARY KEY (id_usuario)
)';
$insert = "INSERT INTO t_usuarios (p_nombre, p_apellido, cedula, rol, password, psecreta) VALUES ('Administrador', 'ZionPHP', '0', '1', '0000', '0000')";
if($motor=="mysql") {
  // Conectamos a la base de datos
  $conexion = mysql_connect($host, $user, $password) or die ("No se pudo conectar a la base de datos.");
  // Armamos la sentencia que creará la nueva base de datos
  $sql = 'CREATE DATABASE IF NOT EXISTS '.$dbname;
  mysql_query($sql, $conexion);
  echo "La base de datos ".$dbname." fue creada satisfactoriamente\n<br/>";
  // Creamos las tablas básicas para el funcionamiento del sistema
  // Creamos la tabla de usuarios
  // Armamos la sentencia que creará la nueva base de datos
  $sql = 'DROP TABLE IF EXISTS `'.$dbname.'`.`t_usuarios`;';
  mysql_query($sql, $conexion);
  $response = mysql_query($create_mysql, $conexion);
  if ($response)
    echo "La tabla usuarios ha sido creada satisfactoriamente";
  else
    echo "No se pudo crear la tabla en la base de datos :'(";
  // Insertar el usuario en la base de datos
  mysql_select_db($dbname) or die ("No se seleccionó la base de datos");
  echo mysql_query($insert, $conexion) ? "Se creó el usuario satisfactoriamente" : "No se pudo crear el usuario :(";
  // Archivos de conexión del Framework
  createScript("mysql");
}

if($motor=="psql") {
  // Conectamos a PostgreSQL
  $connection = "host=".$host." user=".$user." password=".$password."";
  pg_connect($connection);
  // Creamos la base de datos del sistema y sus tablas por defecto
  $sql = 'CREATE DATABASE '.$dbname;
  echo pg_query($response, $sql) ? "La base de datos fue creada exitosamente" : "No se pudo crear la base de datos, revisar el manual de instalación";
  // Creamos la tabla de usuarios
  $dbconnection = "host=".$host." dbname=".$dbname." user=".$user." password=".$password."";
  pg_connect($dbconnection);
  echo pg_query($dbconnection, $create_postgres) ? "La tabla de usuarios fue creada exitosamente" : "No se pudo crear la tabla de usuarios";
  echo pg_query($insert) ? "Usuario administrador creado exitosamente" : "Hubo un problema tratando de crear el usuario administrador";
  createScript("postgres");
}

function createScript($engine) {
  // Creamos el archivo de conexión
  $gestor = fopen("../../framework/db/conexion/conexion1.php", "w") or die ("No se crearon los archivos de conexión");
  // Escribimos el Script PHP
  fwrite($gestor, "<?php\n\$gestorBD=\"".$engine."\";\n\$host=\"".$host."\";\n\$base_datos=\"".$dbname."\";\n\$user=\"".$user."\";\n\$pass=\"".$password."\";\n?>");
  fclose($gestor);
  @chmod ("../../framework/db/conexion/conexion1.php", 0777);
  // Eliminamos los ficheros de instalación
  unlink("ajax.php");
  unlink("probarDB.php");
  unlink("../barra_progreso.gif");
  unlink("../tab.png");
  unlink("../tab2.png");
  unlink("../logo.png");
  unlink("../db-icon.png");
  unlink("../ventana.png");
  $gestor = fopen("../../index.php", "w") or die ("No reescribió el index");
  // Escribimos el Script PHP
  fwrite($gestor, "<?php\n header(\"location:paginas/CU_login\");
  unlink(\"instalador/ajax/crearDB.php\");
  rmdir(\"instalador/ajax\");
  rmdir(\"instalador\");
  ?>");
  fclose($gestor);
  echo "ZionPHP se instaló con éxito";
  echo "<META HTTP-EQUIV='refresh' CONTENT='3; URL=$PHP_SELF'>";
}
?>
