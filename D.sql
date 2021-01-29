-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.1.25-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win32
-- HeidiSQL Versión:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para integrador
CREATE DATABASE IF NOT EXISTS `integrador` /*!40100 DEFAULT CHARACTER SET latin1 COLLATE latin1_bin */;
USE `integrador`;

-- Volcando estructura para tabla integrador.clinica
CREATE TABLE IF NOT EXISTS `clinica` (
  `cli_Id` int(11) NOT NULL AUTO_INCREMENT,
  `cli_Nombre` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `cli_Direc` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `cli_Telefono` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `cli_Prop` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `cli_Correo` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `cli_Fax` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `cli_PagWeb` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `cli_FecCrea` date DEFAULT NULL,
  `cli_FecMod` date DEFAULT NULL,
  `cli_Estado` bit(1) DEFAULT NULL,
  PRIMARY KEY (`cli_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- Volcando datos para la tabla integrador.clinica: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `clinica` DISABLE KEYS */;
INSERT INTO `clinica` (`cli_Id`, `cli_Nombre`, `cli_Direc`, `cli_Telefono`, `cli_Prop`, `cli_Correo`, `cli_Fax`, `cli_PagWeb`, `cli_FecCrea`, `cli_FecMod`, `cli_Estado`) VALUES
	(4, 'Clinica 2', 'Milagro', '0999863952', 'Propietario', 'asdasda@hotmail.com', '092854155666666', 'www.ejemplo.com', '2018-01-23', '2018-01-31', b'1');
/*!40000 ALTER TABLE `clinica` ENABLE KEYS */;

-- Volcando estructura para tabla integrador.enfermedades
CREATE TABLE IF NOT EXISTS `enfermedades` (
  `cie_Id` int(11) NOT NULL AUTO_INCREMENT,
  `cie_Codigo` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `cie_Descripcion` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `cie_Sintomas` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `cie_Tratamiento` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `cie_FecCrea` date DEFAULT NULL,
  `cie_FecMod` date DEFAULT NULL,
  `cie_Estado` bit(1) DEFAULT NULL,
  PRIMARY KEY (`cie_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- Volcando datos para la tabla integrador.enfermedades: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `enfermedades` DISABLE KEYS */;
INSERT INTO `enfermedades` (`cie_Id`, `cie_Codigo`, `cie_Descripcion`, `cie_Sintomas`, `cie_Tratamiento`, `cie_FecCrea`, `cie_FecMod`, `cie_Estado`) VALUES
	(8, 'C1', 'Enfermedad', 'Muchos', 'Tratamiento', '2018-01-27', '2018-01-31', b'1');
/*!40000 ALTER TABLE `enfermedades` ENABLE KEYS */;

-- Volcando estructura para tabla integrador.fichamedica
CREATE TABLE IF NOT EXISTS `fichamedica` (
  `fm_Id` int(11) NOT NULL AUTO_INCREMENT,
  `pac_Id` int(11) DEFAULT NULL,
  `fm_FicCod` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `fm_Antecedentes` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `fm_MedicAct` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `fm_FecCrea` date DEFAULT NULL,
  `fm_FecMod` date DEFAULT NULL,
  `fm_Estado` bit(1) DEFAULT NULL,
  PRIMARY KEY (`fm_Id`),
  KEY `pac_Id` (`pac_Id`),
  CONSTRAINT `FK_fichamedica_paciente` FOREIGN KEY (`pac_Id`) REFERENCES `paciente` (`pac_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- Volcando datos para la tabla integrador.fichamedica: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `fichamedica` DISABLE KEYS */;
INSERT INTO `fichamedica` (`fm_Id`, `pac_Id`, `fm_FicCod`, `fm_Antecedentes`, `fm_MedicAct`, `fm_FecCrea`, `fm_FecMod`, `fm_Estado`) VALUES
	(46, 8, '877', 'ijshiodjsiod\r\nsfasfds\r\nsdfds', 'fsdfdsf', '2018-01-29', '2018-01-30', b'1'),
	(47, 5, 'e', 'asdasdas', 'hbnj', '2018-01-31', '2018-01-31', b'0');
/*!40000 ALTER TABLE `fichamedica` ENABLE KEYS */;

-- Volcando estructura para tabla integrador.paciente
CREATE TABLE IF NOT EXISTS `paciente` (
  `pac_Id` int(11) NOT NULL AUTO_INCREMENT,
  `pac_Cedula` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `pac_Nombre` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `pac_Apellido` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `pac_Direccion` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `pac_Sexo` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `pac_Telefono` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `pac_TipoSangre` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `pac_FecNac` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `pac_Edad` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `pac_Email` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `pac_FecCrea` date DEFAULT NULL,
  `pac_FecMod` date DEFAULT NULL,
  `pac_Estado` bit(1) DEFAULT NULL,
  `pac_Foto` varchar(500) COLLATE latin1_bin DEFAULT NULL,
  PRIMARY KEY (`pac_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- Volcando datos para la tabla integrador.paciente: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `paciente` DISABLE KEYS */;
INSERT INTO `paciente` (`pac_Id`, `pac_Cedula`, `pac_Nombre`, `pac_Apellido`, `pac_Direccion`, `pac_Sexo`, `pac_Telefono`, `pac_TipoSangre`, `pac_FecNac`, `pac_Edad`, `pac_Email`, `pac_FecCrea`, `pac_FecMod`, `pac_Estado`, `pac_Foto`) VALUES
	(5, '0928541556', 'Jake', 'Peralta', 'Milagro', 'Masculino', '0999863952', 'sad', '2018-01-18', '12', 'asd@hotmail.com', '2018-01-26', '2018-01-31', b'0', '../../../img/paciente/644901.png'),
	(8, '092854111', 'Elizabeth', 'Olsen', ' Milagro', 'Masculino', '0999863955', '+a', '2002-07-17', '15', 'asd@hotmail.com', '2018-01-26', '2018-01-31', b'0', '../../../img/paciente/4474060-elizabeth-olsen-wallpapers.jpg'),
	(10, '0928541556', 'Pepa', 'Pig', 'gugugugg', 'Femenino', '0985543678', '+o', '2018-01-30', '0', 'pepa@hotmail.com', '2018-01-31', '2018-01-31', b'0', '../../../img/paciente/descarga.jpg');
/*!40000 ALTER TABLE `paciente` ENABLE KEYS */;

-- Volcando estructura para tabla integrador.profesional
CREATE TABLE IF NOT EXISTS `profesional` (
  `pro_Id` int(11) NOT NULL AUTO_INCREMENT,
  `pro_Cedula` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `pro_Nombre` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `pro_Apellido` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `pro_Direccion` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `pro_Sexo` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `pro_Email` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `pro_Especialidad` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `pro_FecCrea` date DEFAULT NULL,
  `pro_FecMod` date DEFAULT NULL,
  `pro_Estado` bit(1) DEFAULT NULL,
  `pro_Foto` varchar(500) COLLATE latin1_bin DEFAULT NULL,
  PRIMARY KEY (`pro_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- Volcando datos para la tabla integrador.profesional: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `profesional` DISABLE KEYS */;
INSERT INTO `profesional` (`pro_Id`, `pro_Cedula`, `pro_Nombre`, `pro_Apellido`, `pro_Direccion`, `pro_Sexo`, `pro_Email`, `pro_Especialidad`, `pro_FecCrea`, `pro_FecMod`, `pro_Estado`, `pro_Foto`) VALUES
	(25, '0928541556', 'Adam', 'Sandler', 'Miami', 'Masculino', 'terry@hotmail.com', 'Cirujano', '2018-01-28', '2018-01-31', b'1', '../../../img/profesional/e9926820b9e37283_thumb_temp_image881416727459.jpg'),
	(26, '0928541556', 'Terry', 'Crews', 'Miami', 'Masculino', 'terry@hotmail.com', 'Medico General', '2018-01-28', '2018-01-31', b'0', '../../../img/profesional/207312.jpg'),
	(27, '0928541556', 'Doctor', 'House', 'Miamo', 'Masculino', 'terry@hotmail.com', 'Doctor', '2018-01-28', '2018-01-31', b'1', '../../../img/profesional/02_Jun_2012_14_26_08_house1.jpg'),
	(28, '0928541556', 'Doctor', 'Strange', 'Miamo', 'Masculino', 'terry@hotmail.com', 'Doctor', '2018-01-28', '2018-01-31', b'0', '../../../img/profesional/iWkgUdBf.jpg'),
	(29, '0928541556', 'Pepito', 'Piguave', 'Miamo', 'Masculino', 'terry@hotmail.com', 'Veterinario', '2018-01-28', '2018-01-31', b'1', '../../../img/profesional/doctor-sonriendo-con-estetoscopio_1154-36.jpg'),
	(30, '0928541556', 'Carlita', 'Piguave', 'Miami', 'Femenino', 'terry@hotmail.com', 'Enfermera', '2018-01-28', '2018-01-31', b'0', '../../../img/profesional/doctor_467179149-56b08aaf3df78cf772cf9262.jpg');
/*!40000 ALTER TABLE `profesional` ENABLE KEYS */;

-- Volcando estructura para tabla integrador.servicio
CREATE TABLE IF NOT EXISTS `servicio` (
  `ser_Id` int(11) NOT NULL AUTO_INCREMENT,
  `ser_Descripcion` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `ser_Precio` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `ser_FecCrea` date DEFAULT NULL,
  `ser_FecMod` date DEFAULT NULL,
  `ser_Estado` bit(1) DEFAULT NULL,
  PRIMARY KEY (`ser_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- Volcando datos para la tabla integrador.servicio: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `servicio` DISABLE KEYS */;
INSERT INTO `servicio` (`ser_Id`, `ser_Descripcion`, `ser_Precio`, `ser_FecCrea`, `ser_FecMod`, `ser_Estado`) VALUES
	(8, 'Servicio1', '14', '2018-01-24', '2018-01-24', b'1'),
	(10, 'Prostitucion', '2,2', '2018-01-28', '2018-01-28', b'1'),
	(11, 'consulta', '25', '2018-01-31', '2018-01-31', b'1');
/*!40000 ALTER TABLE `servicio` ENABLE KEYS */;

-- Volcando estructura para tabla integrador.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `password` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `nombre` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `apellido` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- Volcando datos para la tabla integrador.usuario: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
