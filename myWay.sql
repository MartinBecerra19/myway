-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.1.37-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win32
-- HeidiSQL Versión:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para myway
CREATE DATABASE IF NOT EXISTS `myway` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `myway`;

-- Volcando estructura para tabla myway.album
CREATE TABLE IF NOT EXISTS `album` (
  `CodAlbum` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(25) NOT NULL,
  `Puntuación` int(11) NOT NULL,
  PRIMARY KEY (`CodAlbum`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla myway.album: ~0 rows (aproximadamente)
DELETE FROM `album`;
/*!40000 ALTER TABLE `album` DISABLE KEYS */;
/*!40000 ALTER TABLE `album` ENABLE KEYS */;

-- Volcando estructura para tabla myway.albumimagenes
CREATE TABLE IF NOT EXISTS `albumimagenes` (
  `CodAlbumImagen` int(11) NOT NULL AUTO_INCREMENT,
  `CodigoAlbum` int(11) NOT NULL,
  `CodigoImagen` int(11) NOT NULL,
  PRIMARY KEY (`CodAlbumImagen`),
  KEY `CodigoAlbum` (`CodigoAlbum`),
  KEY `CodigoImagen` (`CodigoImagen`),
  CONSTRAINT `albumimagenes_ibfk_1` FOREIGN KEY (`CodigoAlbum`) REFERENCES `album` (`CodAlbum`) ON DELETE NO ACTION,
  CONSTRAINT `albumimagenes_ibfk_2` FOREIGN KEY (`CodigoImagen`) REFERENCES `imagenes` (`CodImagen`) ON DELETE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla myway.albumimagenes: ~0 rows (aproximadamente)
DELETE FROM `albumimagenes`;
/*!40000 ALTER TABLE `albumimagenes` DISABLE KEYS */;
/*!40000 ALTER TABLE `albumimagenes` ENABLE KEYS */;

-- Volcando estructura para tabla myway.camino
CREATE TABLE IF NOT EXISTS `camino` (
  `CodCamino` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(25) NOT NULL,
  `CodigoExterno` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`CodCamino`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla myway.camino: ~0 rows (aproximadamente)
DELETE FROM `camino`;
/*!40000 ALTER TABLE `camino` DISABLE KEYS */;
INSERT INTO `camino` (`CodCamino`, `Nombre`, `CodigoExterno`) VALUES
	(1, 'Frances', '');
/*!40000 ALTER TABLE `camino` ENABLE KEYS */;

-- Volcando estructura para tabla myway.compostela
CREATE TABLE IF NOT EXISTS `compostela` (
  `CodCompostela` int(11) NOT NULL AUTO_INCREMENT,
  `CodigoQR` varchar(50) NOT NULL,
  `NombreExpedidor` varchar(50) NOT NULL,
  PRIMARY KEY (`CodCompostela`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla myway.compostela: ~0 rows (aproximadamente)
DELETE FROM `compostela`;
/*!40000 ALTER TABLE `compostela` DISABLE KEYS */;
/*!40000 ALTER TABLE `compostela` ENABLE KEYS */;

-- Volcando estructura para tabla myway.compostelaviaje
CREATE TABLE IF NOT EXISTS `compostelaviaje` (
  `CodCompostelaViaje` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` datetime NOT NULL,
  `CodigoCompostela` int(11) NOT NULL,
  `CodigoViaje` int(11) NOT NULL,
  PRIMARY KEY (`CodCompostelaViaje`),
  KEY `CodigoCompostela` (`CodigoCompostela`),
  KEY `CodigoViaje` (`CodigoViaje`),
  CONSTRAINT `compostelaviaje_ibfk_1` FOREIGN KEY (`CodigoCompostela`) REFERENCES `compostela` (`CodCompostela`) ON DELETE NO ACTION,
  CONSTRAINT `compostelaviaje_ibfk_2` FOREIGN KEY (`CodigoViaje`) REFERENCES `viaje` (`CodViaje`) ON DELETE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla myway.compostelaviaje: ~0 rows (aproximadamente)
DELETE FROM `compostelaviaje`;
/*!40000 ALTER TABLE `compostelaviaje` DISABLE KEYS */;
/*!40000 ALTER TABLE `compostelaviaje` ENABLE KEYS */;

-- Volcando estructura para tabla myway.imagenes
CREATE TABLE IF NOT EXISTS `imagenes` (
  `CodImagen` int(11) NOT NULL AUTO_INCREMENT,
  `Ruta` varchar(255) NOT NULL,
  `Geolocalizacion` varchar(255) NOT NULL,
  `Puntuacion` int(11) NOT NULL,
  `Nombre` varchar(25) NOT NULL,
  `Descripcion` varchar(255) NOT NULL,
  PRIMARY KEY (`CodImagen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla myway.imagenes: ~0 rows (aproximadamente)
DELETE FROM `imagenes`;
/*!40000 ALTER TABLE `imagenes` DISABLE KEYS */;
/*!40000 ALTER TABLE `imagenes` ENABLE KEYS */;

-- Volcando estructura para tabla myway.objetivo
CREATE TABLE IF NOT EXISTS `objetivo` (
  `CodObjetivo` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`CodObjetivo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla myway.objetivo: ~0 rows (aproximadamente)
DELETE FROM `objetivo`;
/*!40000 ALTER TABLE `objetivo` DISABLE KEYS */;
/*!40000 ALTER TABLE `objetivo` ENABLE KEYS */;

-- Volcando estructura para tabla myway.objetivoviaje
CREATE TABLE IF NOT EXISTS `objetivoviaje` (
  `CodObjetivoCamino` int(11) NOT NULL AUTO_INCREMENT,
  `CodigoObjetivo` int(11) NOT NULL,
  `CodigoViaje` int(11) NOT NULL,
  `Cumplido` varchar(25) NOT NULL,
  PRIMARY KEY (`CodObjetivoCamino`),
  KEY `CodigoObjetivo` (`CodigoObjetivo`),
  KEY `CodigoViaje` (`CodigoViaje`),
  CONSTRAINT `objetivoviaje_ibfk_1` FOREIGN KEY (`CodigoObjetivo`) REFERENCES `objetivo` (`CodObjetivo`) ON DELETE NO ACTION,
  CONSTRAINT `objetivoviaje_ibfk_2` FOREIGN KEY (`CodigoViaje`) REFERENCES `viaje` (`CodViaje`) ON DELETE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla myway.objetivoviaje: ~0 rows (aproximadamente)
DELETE FROM `objetivoviaje`;
/*!40000 ALTER TABLE `objetivoviaje` DISABLE KEYS */;
/*!40000 ALTER TABLE `objetivoviaje` ENABLE KEYS */;

-- Volcando estructura para tabla myway.parada
CREATE TABLE IF NOT EXISTS `parada` (
  `CodParada` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(25) NOT NULL,
  `Km` int(11) NOT NULL,
  `Orden` int(11) NOT NULL,
  `CodigoCamino` int(11) NOT NULL,
  PRIMARY KEY (`CodParada`),
  KEY `CodigoCamino` (`CodigoCamino`),
  CONSTRAINT `parada_ibfk_1` FOREIGN KEY (`CodigoCamino`) REFERENCES `camino` (`CodCamino`) ON DELETE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla myway.parada: ~37 rows (aproximadamente)
DELETE FROM `parada`;
/*!40000 ALTER TABLE `parada` DISABLE KEYS */;
INSERT INTO `parada` (`CodParada`, `Nombre`, `Km`, `Orden`, `CodigoCamino`) VALUES
	(1, 'SaintJeanPied de Port-Ron', 785, 1, 1),
	(2, 'Somport-Jaca', 752, 2, 1),
	(3, 'Roncesvalles-Zubiri', 733, 3, 1),
	(4, 'Jaca-Arrés', 712, 4, 1),
	(5, 'Zubiri-Pamplona/Iruña', 692, 5, 1),
	(6, 'Arrés-Ruesta', 688, 6, 1),
	(7, 'Pamplona/Iruña-Puente la ', 666, 7, 1),
	(8, 'Ruesta-Sangüesa', 661, 8, 1),
	(9, 'Puente la Reina/Gares - E', 644, 9, 1),
	(10, 'Sangüesa-Monreal', 616, 10, 1),
	(11, 'Estella/Lizarra-Torres de', 587, 11, 1),
	(12, 'Monreal-Puente la Reina-G', 566, 12, 1),
	(13, 'Torres del Río-Logroño', 544, 13, 1),
	(14, 'Logroño-Nájera', 523, 14, 1),
	(15, 'Najera-Sto. Domingo de la', 516, 15, 1),
	(16, 'Sto. Domingo de la Calzad', 492, 16, 1),
	(17, 'Belorado-Agés', 472, 17, 1),
	(18, 'Agés-Burgos', 461, 18, 1),
	(19, 'Burgos-Hontanas', 452, 19, 1),
	(20, 'Hontanas-Boadilla del Cam', 424, 20, 1),
	(21, 'Boadilla del Camino-Carri', 399, 21, 1),
	(22, 'Carrión de los Condes-Ter', 372, 22, 1),
	(23, 'Terradillos de los Templa', 342, 23, 1),
	(24, 'El Burgo Ranero-León', 305, 24, 1),
	(25, 'León-San Martín del Camin', 279, 25, 1),
	(26, 'San Martín del Camino-Ast', 255, 26, 1),
	(27, 'Astorga-Foncebadón', 229, 27, 1),
	(28, 'Foncebadón-Ponferrada', 202, 28, 1),
	(29, 'Ponferrada-Villafranca de', 178, 29, 1),
	(30, 'Villafranca del Bierzo-O ', 150, 30, 1),
	(31, 'O Cebreiro-Triacastela', 129, 31, 1),
	(32, 'Triacastela-Sarria', 110, 32, 1),
	(33, 'Sarria-Portomarín', 88, 33, 1),
	(34, 'Portomarín-Palas de Rei', 63, 34, 1),
	(35, 'Palas de Rei-Arzúa', 35, 35, 1),
	(36, 'Arzúa-Pedrouzo', 16, 36, 1),
	(37, 'Pedrouzo-Santiago de Comp', 0, 37, 1);
/*!40000 ALTER TABLE `parada` ENABLE KEYS */;

-- Volcando estructura para tabla myway.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `CodUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(50) NOT NULL,
  `Pass` varchar(50) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `Telefono` varchar(255) DEFAULT NULL,
  `Direccion` varchar(255) DEFAULT NULL,
  `Pais` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`CodUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla myway.usuario: ~0 rows (aproximadamente)
DELETE FROM `usuario`;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`CodUsuario`, `Username`, `Pass`, `Nombre`, `Telefono`, `Direccion`, `Pais`, `Email`) VALUES
	(4, 'martinbb19', '123', 'Martin', '664130130', 'Carlos Maside 2', 'EspaÃ±a', 'martin@gmail.com');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

-- Volcando estructura para tabla myway.viaje
CREATE TABLE IF NOT EXISTS `viaje` (
  `CodViaje` int(11) NOT NULL AUTO_INCREMENT,
  `CodigoUsuario` int(11) NOT NULL,
  `CodigoCamino` int(11) NOT NULL,
  PRIMARY KEY (`CodViaje`),
  KEY `CodigoUsuario` (`CodigoUsuario`),
  KEY `CodigoCamino` (`CodigoCamino`),
  CONSTRAINT `viaje_ibfk_1` FOREIGN KEY (`CodigoUsuario`) REFERENCES `usuario` (`CodUsuario`) ON DELETE NO ACTION,
  CONSTRAINT `viaje_ibfk_2` FOREIGN KEY (`CodigoCamino`) REFERENCES `camino` (`CodCamino`) ON DELETE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla myway.viaje: ~0 rows (aproximadamente)
DELETE FROM `viaje`;
/*!40000 ALTER TABLE `viaje` DISABLE KEYS */;
/*!40000 ALTER TABLE `viaje` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
