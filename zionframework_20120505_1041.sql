-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.1.62-0ubuntu0.11.10.1


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema zionframework
--

CREATE DATABASE IF NOT EXISTS zionframework;
USE zionframework;

--
-- Definition of table `zionframework`.`t_documentos`
--

DROP TABLE IF EXISTS `zionframework`.`t_documentos`;
CREATE TABLE  `zionframework`.`t_documentos` (
  `id_documento` int(11) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `contenido` varchar(3000) NOT NULL,
  PRIMARY KEY (`id_documento`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zionframework`.`t_documentos`
--

/*!40000 ALTER TABLE `t_documentos` DISABLE KEYS */;
LOCK TABLES `t_documentos` WRITE;
INSERT INTO `zionframework`.`t_documentos` VALUES  (4,'',''),
 (3,'Certificado de Buena Conducta','html'),
 (2,'Solvencia Biblioteca','html'),
 (1,'Carta de Tramitación de Titulo','html'),
 (0,'Constancia de Estudio','html de la constancia de estudio');
UNLOCK TABLES;
/*!40000 ALTER TABLE `t_documentos` ENABLE KEYS */;


--
-- Definition of table `zionframework`.`t_solicitud`
--

DROP TABLE IF EXISTS `zionframework`.`t_solicitud`;
CREATE TABLE  `zionframework`.`t_solicitud` (
  `id_solicitud` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_documento` int(11) DEFAULT NULL,
  `fecha_solicitud` date NOT NULL,
  PRIMARY KEY (`id_solicitud`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zionframework`.`t_solicitud`
--

/*!40000 ALTER TABLE `t_solicitud` DISABLE KEYS */;
LOCK TABLES `t_solicitud` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `t_solicitud` ENABLE KEYS */;


--
-- Definition of table `zionframework`.`t_usuarios`
--

DROP TABLE IF EXISTS `zionframework`.`t_usuarios`;
CREATE TABLE  `zionframework`.`t_usuarios` (
  `idt_usuario` int(11) NOT NULL,
  `p_nombre` varchar(45) DEFAULT NULL,
  `p_apellido` varchar(45) DEFAULT NULL,
  `cedula` int(15) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idt_usuario`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zionframework`.`t_usuarios`
--

/*!40000 ALTER TABLE `t_usuarios` DISABLE KEYS */;
LOCK TABLES `t_usuarios` WRITE;
INSERT INTO `zionframework`.`t_usuarios` VALUES  (0,'david','garcia',20301220,'123456');
UNLOCK TABLES;
/*!40000 ALTER TABLE `t_usuarios` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
