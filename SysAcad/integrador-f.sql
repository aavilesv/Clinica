-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.5.24-log - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para integrador1
CREATE DATABASE IF NOT EXISTS `integrador1` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `integrador1`;

-- Volcando estructura para tabla integrador1.cabconsulta
CREATE TABLE IF NOT EXISTS `cabconsulta` (
  `idCabConsulta` int(11) NOT NULL AUTO_INCREMENT,
  `PRO_Id` int(11) DEFAULT '0',
  `PAC_Id` int(11) DEFAULT NULL,
  `CLI_Id` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `observacion` mediumtext,
  `sala` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idCabConsulta`),
  KEY `FK_cabconsulta_profesional` (`PRO_Id`),
  KEY `FK_cabconsulta_paciente` (`PAC_Id`),
  KEY `FK_cabconsulta_clinica` (`CLI_Id`),
  CONSTRAINT `FK_cabconsulta_clinica` FOREIGN KEY (`CLI_Id`) REFERENCES `clinica` (`CLI_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_cabconsulta_paciente` FOREIGN KEY (`PAC_Id`) REFERENCES `paciente` (`PAC_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_cabconsulta_profesional` FOREIGN KEY (`PRO_Id`) REFERENCES `profesional` (`PRO_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla integrador1.cabconsulta: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `cabconsulta` DISABLE KEYS */;
INSERT INTO `cabconsulta` (`idCabConsulta`, `PRO_Id`, `PAC_Id`, `CLI_Id`, `fecha`, `hora`, `observacion`, `sala`) VALUES
	(70, 7, 18, 1, '2018-02-08', '15:00:00', 'Reajuste a los braquets', 'Sala 9'),
	(71, 6, 16, 1, '0000-00-00', '00:00:00', '', 'Sala 1'),
	(72, 6, 16, 1, '0000-00-00', '00:00:00', '', 'Sala 1'),
	(73, 10, 16, 2, '2018-02-09', '15:00:00', 'ajuste de los braquets', 'Sala 7');
/*!40000 ALTER TABLE `cabconsulta` ENABLE KEYS */;

-- Volcando estructura para tabla integrador1.cargo
CREATE TABLE IF NOT EXISTS `cargo` (
  `CAR_Id` int(11) NOT NULL AUTO_INCREMENT,
  `CAR_Nombre` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `CAR_Estado` bit(1) DEFAULT NULL,
  PRIMARY KEY (`CAR_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- Volcando datos para la tabla integrador1.cargo: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `cargo` DISABLE KEYS */;
INSERT INTO `cargo` (`CAR_Id`, `CAR_Nombre`, `CAR_Estado`) VALUES
	(1, 'Odontologo', b'1'),
	(2, 'Ginecologo', b'1'),
	(3, 'Medico General', b'1');
/*!40000 ALTER TABLE `cargo` ENABLE KEYS */;

-- Volcando estructura para tabla integrador1.cita
CREATE TABLE IF NOT EXISTS `cita` (
  `CIT_Id` int(11) NOT NULL AUTO_INCREMENT,
  `PAC_Id` int(11) DEFAULT NULL,
  `PRO_Id` int(11) DEFAULT NULL,
  `CIT_Fecha` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `CIT_Turno` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `CIT_Duracion` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `CIT_Estado` bit(1) DEFAULT NULL,
  PRIMARY KEY (`CIT_Id`),
  KEY `PAC_Id` (`PAC_Id`),
  KEY `PRO_Id` (`PRO_Id`),
  CONSTRAINT `FK_cita_paciente` FOREIGN KEY (`PAC_Id`) REFERENCES `paciente` (`PAC_Id`),
  CONSTRAINT `FK_cita_profesional` FOREIGN KEY (`PRO_Id`) REFERENCES `profesional` (`PRO_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- Volcando datos para la tabla integrador1.cita: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `cita` DISABLE KEYS */;
INSERT INTO `cita` (`CIT_Id`, `PAC_Id`, `PRO_Id`, `CIT_Fecha`, `CIT_Turno`, `CIT_Duracion`, `CIT_Estado`) VALUES
	(1, 16, 6, '2018-01-16', '2', '15 Minutos', b'0'),
	(2, 16, 7, '2018-01-17', '3', '15 Minutos', b'0'),
	(3, 18, 8, '2018-02-01', '4', '30 Minutos', b'0'),
	(4, 18, 10, '2018-03-01', '1', '45 Minutos', b'1'),
	(5, 18, 8, '2018-01-01', '20', '15 Minutos', b'0'),
	(6, 16, 6, '2018-02-04', '22:22', '30 Minutos', b'0'),
	(7, 16, 6, '2018-01-16', '2', '15 Minutos', b'0'),
	(8, 16, 7, '2018-01-17', '3', '15 Minutos', b'0');
/*!40000 ALTER TABLE `cita` ENABLE KEYS */;

-- Volcando estructura para tabla integrador1.clinica
CREATE TABLE IF NOT EXISTS `clinica` (
  `CLI_Id` int(11) NOT NULL AUTO_INCREMENT,
  `CLI_Nombre` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `CLI_Direc` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `CLI_Ruc` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `CLI_Prop` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `CLI_Correo` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `CLI_PagWeb` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `CLI_Estado` bit(1) DEFAULT NULL,
  `CLI_Foto` varchar(500) COLLATE latin1_bin DEFAULT NULL,
  PRIMARY KEY (`CLI_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- Volcando datos para la tabla integrador1.clinica: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `clinica` DISABLE KEYS */;
INSERT INTO `clinica` (`CLI_Id`, `CLI_Nombre`, `CLI_Direc`, `CLI_Ruc`, `CLI_Prop`, `CLI_Correo`, `CLI_PagWeb`, `CLI_Estado`, `CLI_Foto`) VALUES
	(1, 'Divino Nino', NULL, NULL, NULL, NULL, NULL, NULL, '../../../../fotosClinicas/colorful-hard-nylon-goat-bristle-dental-polishing.jpg'),
	(2, 'San carlos', NULL, NULL, NULL, NULL, NULL, NULL, '../../../../fotosClinicas/clinica.png');
/*!40000 ALTER TABLE `clinica` ENABLE KEYS */;

-- Volcando estructura para tabla integrador1.comtbcab_compra
CREATE TABLE IF NOT EXISTS `comtbcab_compra` (
  `idCompra` int(11) NOT NULL AUTO_INCREMENT,
  `idProveedor` int(11) NOT NULL,
  `empleado` varchar(30) COLLATE latin1_bin NOT NULL,
  `numeroOrden` varchar(15) COLLATE latin1_bin NOT NULL,
  `f_compra` date NOT NULL,
  `subTotal` double DEFAULT NULL,
  `iva` double DEFAULT NULL,
  `total` double DEFAULT NULL,
  PRIMARY KEY (`idCompra`),
  KEY `idProveedor` (`idProveedor`),
  CONSTRAINT `comtbcab_compra_ibfk_1` FOREIGN KEY (`idProveedor`) REFERENCES `comtbproveedor` (`idProveedor`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- Volcando datos para la tabla integrador1.comtbcab_compra: ~11 rows (aproximadamente)
/*!40000 ALTER TABLE `comtbcab_compra` DISABLE KEYS */;
INSERT INTO `comtbcab_compra` (`idCompra`, `idProveedor`, `empleado`, `numeroOrden`, `f_compra`, `subTotal`, `iva`, `total`) VALUES
	(1, 1, 'Juan', '0003', '0000-00-00', 16.32, 1.96, 18.28),
	(2, 1, 'Juan', '0003', '0000-00-00', 44.82, 5.38, 50.2),
	(3, 1, 'Juan', '0003', '0000-00-00', 17.15, 2.06, 19.21),
	(8, 1, 'Juan', '0003', '0000-00-00', 8.58, 1.03, 9.61),
	(9, 1, 'Juan', 'CP009', '2018-02-15', 2.2, 0.26, 2.46),
	(10, 1, 'Juan', 'CP0010', '2018-02-15', 11.86, 1.42, 13.28),
	(11, 1, 'Juan', 'CP0011', '2018-02-15', 0.25, 0.03, 0.28),
	(12, 1, 'Juan', 'CP0012', '2018-02-15', 0.25, 0.03, 0.28),
	(13, 1, 'jvinuezam', 'CP0013', '2018-02-15', 0.92, 0.11, 1.03),
	(14, 1, 'jvinuezam', 'CP0014', '2018-02-16', 25.95, 3.11, 29.06),
	(15, 1, 'jvinuezam', 'CP0015', '2018-02-16', 1.2, 0.14, 1.34);
/*!40000 ALTER TABLE `comtbcab_compra` ENABLE KEYS */;

-- Volcando estructura para tabla integrador1.comtbcab_devolucion
CREATE TABLE IF NOT EXISTS `comtbcab_devolucion` (
  `idDevolucion` int(11) NOT NULL AUTO_INCREMENT,
  `numeroOrden` varchar(13) COLLATE latin1_bin NOT NULL,
  `nomProveedor` varchar(50) COLLATE latin1_bin NOT NULL,
  `f_devolucion` date NOT NULL,
  `empleado` varchar(50) COLLATE latin1_bin NOT NULL,
  `descripcion` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  PRIMARY KEY (`idDevolucion`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- Volcando datos para la tabla integrador1.comtbcab_devolucion: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `comtbcab_devolucion` DISABLE KEYS */;
INSERT INTO `comtbcab_devolucion` (`idDevolucion`, `numeroOrden`, `nomProveedor`, `f_devolucion`, `empleado`, `descripcion`) VALUES
	(1, '0003', '', '0000-00-00', 'Juan', 'Productos en mal estado'),
	(2, 'DV002', '', '0000-00-00', 'Juan', ''),
	(3, 'DV003', 'Sana', '2018-02-15', 'jvinuezam', '');
/*!40000 ALTER TABLE `comtbcab_devolucion` ENABLE KEYS */;

-- Volcando estructura para tabla integrador1.comtbcab_kardex
CREATE TABLE IF NOT EXISTS `comtbcab_kardex` (
  `idKardex` int(11) NOT NULL AUTO_INCREMENT,
  `idProducto` int(11) NOT NULL,
  `u_medida` varchar(30) COLLATE latin1_bin NOT NULL,
  `minUnidad` int(11) NOT NULL,
  `maxUnidad` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `valorUnitario` varchar(10) COLLATE latin1_bin NOT NULL,
  PRIMARY KEY (`idKardex`),
  KEY `idProducto` (`idProducto`),
  CONSTRAINT `comtbcab_kardex_ibfk_1` FOREIGN KEY (`idProducto`) REFERENCES `comtbproducto` (`idProducto`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- Volcando datos para la tabla integrador1.comtbcab_kardex: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `comtbcab_kardex` DISABLE KEYS */;
INSERT INTO `comtbcab_kardex` (`idKardex`, `idProducto`, `u_medida`, `minUnidad`, `maxUnidad`, `stock`, `valorUnitario`) VALUES
	(1, 1, '1', 1, 1, 1, '1');
/*!40000 ALTER TABLE `comtbcab_kardex` ENABLE KEYS */;

-- Volcando estructura para tabla integrador1.comtbdet_compra
CREATE TABLE IF NOT EXISTS `comtbdet_compra` (
  `idCompra` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` double NOT NULL,
  KEY `idProducto` (`idProducto`),
  KEY `idCompra` (`idCompra`),
  CONSTRAINT `comtbdet_compra_ibfk_1` FOREIGN KEY (`idProducto`) REFERENCES `comtbproducto` (`idProducto`),
  CONSTRAINT `comtbdet_compra_ibfk_2` FOREIGN KEY (`idCompra`) REFERENCES `comtbcab_compra` (`idCompra`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- Volcando datos para la tabla integrador1.comtbdet_compra: ~11 rows (aproximadamente)
/*!40000 ALTER TABLE `comtbdet_compra` DISABLE KEYS */;
INSERT INTO `comtbdet_compra` (`idCompra`, `idProducto`, `cantidad`, `precio`) VALUES
	(9, 5, 4, 0.55),
	(10, 1, 4, 0.92),
	(10, 5, 4, 0.55),
	(10, 7, 2, 3),
	(11, 2, 1, 0.25),
	(12, 2, 1, 0.25),
	(13, 1, 1, 0.92),
	(14, 4, 6, 1.7),
	(14, 5, 9, 0.55),
	(14, 6, 9, 1.2),
	(15, 6, 1, 1.2);
/*!40000 ALTER TABLE `comtbdet_compra` ENABLE KEYS */;

-- Volcando estructura para tabla integrador1.comtbdet_devolucion
CREATE TABLE IF NOT EXISTS `comtbdet_devolucion` (
  `idDevolucion` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` double DEFAULT NULL,
  KEY `idProducto` (`idProducto`),
  KEY `idDevolucion` (`idDevolucion`),
  CONSTRAINT `comtbdet_devolucion_ibfk_1` FOREIGN KEY (`idProducto`) REFERENCES `comtbproducto` (`idProducto`),
  CONSTRAINT `comtbdet_devolucion_ibfk_2` FOREIGN KEY (`idDevolucion`) REFERENCES `comtbcab_devolucion` (`idDevolucion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- Volcando datos para la tabla integrador1.comtbdet_devolucion: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `comtbdet_devolucion` DISABLE KEYS */;
INSERT INTO `comtbdet_devolucion` (`idDevolucion`, `idProducto`, `cantidad`, `precio`) VALUES
	(3, 1, 1, 0.92),
	(3, 2, 1, 0.25);
/*!40000 ALTER TABLE `comtbdet_devolucion` ENABLE KEYS */;

-- Volcando estructura para tabla integrador1.comtbproducto
CREATE TABLE IF NOT EXISTS `comtbproducto` (
  `idProducto` int(11) NOT NULL AUTO_INCREMENT,
  `nombreProd` varchar(70) COLLATE latin1_bin NOT NULL,
  `f_venc` date NOT NULL,
  `f_elab` date NOT NULL,
  `precio` double NOT NULL,
  `stock` int(11) NOT NULL,
  `imagen` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `estado` int(1) NOT NULL,
  PRIMARY KEY (`idProducto`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- Volcando datos para la tabla integrador1.comtbproducto: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `comtbproducto` DISABLE KEYS */;
INSERT INTO `comtbproducto` (`idProducto`, `nombreProd`, `f_venc`, `f_elab`, `precio`, `stock`, `imagen`, `estado`) VALUES
	(1, 'Paracetamol', '2022-02-05', '2018-02-05', 0.915, 3, 'paracetamol.png', 1),
	(2, 'Finalin', '2018-02-24', '2015-02-01', 0.25, 1, 'finalin.jpg', 1),
	(3, 'Redoxon', '2020-08-24', '2018-02-05', 0.75, 0, 'redoxon.jpg', 1),
	(4, 'Ensure Advanced', '2020-07-30', '2014-07-02', 1.7, 1, 'ensure advance.jpg', 1),
	(5, 'Albendazol', '2019-09-25', '2015-09-25', 0.55, 1, 'albendazol.jpg', 1),
	(6, 'LemonFlu', '2022-11-23', '2017-11-24', 1.2, 7, 'lemonflu.jpg', 1),
	(7, 'Neurobion', '2020-07-25', '2016-07-14', 3, 2, 'neurobion.jpg', 1),
	(8, 'Pharmaton', '2022-10-01', '2016-10-01', 3.25, 0, 'pharmaton.jpg', 1);
/*!40000 ALTER TABLE `comtbproducto` ENABLE KEYS */;

-- Volcando estructura para tabla integrador1.comtbproveedor
CREATE TABLE IF NOT EXISTS `comtbproveedor` (
  `idProveedor` int(11) NOT NULL AUTO_INCREMENT,
  `ruc` varchar(15) COLLATE latin1_bin NOT NULL,
  `razonSocial` varchar(50) COLLATE latin1_bin NOT NULL,
  `telefono` varchar(10) COLLATE latin1_bin NOT NULL,
  `email` varchar(30) COLLATE latin1_bin NOT NULL,
  `direccion` varchar(50) COLLATE latin1_bin NOT NULL,
  `imagen` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `estado` int(1) NOT NULL,
  PRIMARY KEY (`idProveedor`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- Volcando datos para la tabla integrador1.comtbproveedor: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `comtbproveedor` DISABLE KEYS */;
INSERT INTO `comtbproveedor` (`idProveedor`, `ruc`, `razonSocial`, `telefono`, `email`, `direccion`, `imagen`, `estado`) VALUES
	(1, '09533535353', 'Sana Sana', '0956848578', 'sana@email.com', 'Guayaquil', 'anlogo5.jpg', 1),
	(2, '09885272778', 'Be produfarmacos', '095368685', 'be@email.com', 'Guayaquil', 'be.jpg', 1),
	(3, '1251893571001', 'Sedesa', '042729569', 'sedesa@email.com', 'Guayaquil', 'sedesa.png', 0);
/*!40000 ALTER TABLE `comtbproveedor` ENABLE KEYS */;

-- Volcando estructura para tabla integrador1.consulta
CREATE TABLE IF NOT EXISTS `consulta` (
  `CON_Id` int(11) NOT NULL AUTO_INCREMENT,
  `PRO_Id` int(11) DEFAULT NULL,
  `ENF_Id` int(11) DEFAULT NULL,
  `FIC_Id` int(11) DEFAULT NULL,
  `CIT_Id` int(11) DEFAULT NULL,
  `CON_Diagnostico` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `CON_Receta` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `CON_Trat` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `idKardex` int(11) DEFAULT NULL,
  `CON_Estado` bit(1) DEFAULT NULL,
  `CON_Parte` int(11) DEFAULT NULL,
  `CON_Pulsa` int(11) DEFAULT NULL,
  `CON_RRespi` int(11) DEFAULT NULL,
  `CON_Temp` int(11) DEFAULT NULL,
  `CON_Altura` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `CON_Peso` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `CON_Imc` int(11) DEFAULT NULL,
  `CON_Fecha` date DEFAULT NULL,
  `CON_Edad` int(11) DEFAULT NULL,
  PRIMARY KEY (`CON_Id`),
  KEY `PRO_Id` (`PRO_Id`),
  KEY `ENF_Id` (`ENF_Id`),
  KEY `FIC_Id` (`FIC_Id`),
  KEY `idKardex` (`idKardex`),
  KEY `FK_consulta_cita` (`CIT_Id`),
  CONSTRAINT `FK_consulta_cita` FOREIGN KEY (`CIT_Id`) REFERENCES `cita` (`CIT_Id`),
  CONSTRAINT `FK_consulta_comtbcab_kardex` FOREIGN KEY (`idKardex`) REFERENCES `comtbcab_kardex` (`idKardex`),
  CONSTRAINT `FK_consulta_enfermedades` FOREIGN KEY (`ENF_Id`) REFERENCES `enfermedades` (`ENF_Id`),
  CONSTRAINT `FK_consulta_fichamedica` FOREIGN KEY (`FIC_Id`) REFERENCES `fichamedica` (`FIC_Id`),
  CONSTRAINT `FK_consulta_profesional` FOREIGN KEY (`PRO_Id`) REFERENCES `profesional` (`PRO_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- Volcando datos para la tabla integrador1.consulta: ~19 rows (aproximadamente)
/*!40000 ALTER TABLE `consulta` DISABLE KEYS */;
INSERT INTO `consulta` (`CON_Id`, `PRO_Id`, `ENF_Id`, `FIC_Id`, `CIT_Id`, `CON_Diagnostico`, `CON_Receta`, `CON_Trat`, `idKardex`, `CON_Estado`, `CON_Parte`, `CON_Pulsa`, `CON_RRespi`, `CON_Temp`, `CON_Altura`, `CON_Peso`, `CON_Imc`, `CON_Fecha`, `CON_Edad`) VALUES
	(1, 10, 1, 1, 8, 'ddd', 'dfdfd', 'ddfdf', 1, b'1', 1, 1, 1, 1, '1', '1', 1, '2018-12-13', NULL),
	(2, 10, 1, 1, 7, 'ddd', 'dfdfd', 'ddfdf', 1, b'1', 1, 1, 1, 1, '1', '1', 1, '2018-12-13', NULL),
	(3, 10, 1, 1, 2, 'ddd', 'dfdfd', 'ddfdf', 1, b'1', 1, 1, 1, 1, '1', '1', 1, '2018-12-13', NULL),
	(4, 10, 1, 1, 6, 'ddd', 'dfdfd', 'ddfdf', 1, b'1', 1, 1, 1, 1, '1', '1', 1, '2018-12-13', NULL),
	(5, 10, 1, 1, 1, 'ddd', 'dfdfd', 'ddfdf', 1, b'1', 1, 1, 1, 1, '1', '1', 1, '2018-12-13', NULL),
	(6, 10, 1, 1, 1, 'ddd', 'dfdfd', 'ddfdf', 1, b'1', 1, 1, 1, 1, '1', '1', 1, '2018-12-13', NULL),
	(7, 10, 1, 1, 1, 'ddd', 'dfdfd', 'ddfdf', 1, b'1', 1, 1, 1, 1, '1', '1', 1, '2018-12-13', NULL),
	(8, 10, 1, 1, 8, 'ddd', 'dfdfd', 'ddfdf', 1, b'1', 1, 1, 1, 1, '1', '1', 1, '2018-12-13', NULL),
	(9, 10, 1, 1, 1, 'ddd', 'dfdfd', 'ddfdf', 1, b'1', 1, 1, 1, 1, '1', '1', 1, '2018-12-13', NULL),
	(10, 10, 1, 1, 1, 'ddd', 'dfdfd', 'ddfdf', 1, b'1', 1, 1, 1, 1, '1', '1', 1, '2018-12-13', NULL),
	(11, 10, 1, 1, 1, 'ddd', 'dfdfd', 'ddfdf', 1, b'1', 1, 1, 1, 1, '1', '1', 1, '2018-12-13', NULL),
	(12, 10, 1, 1, 1, 'ddd', 'dfdfd', 'ddfdf', 1, b'1', 1, 1, 1, 1, '1', '1', 1, '2018-12-13', NULL),
	(13, 10, 1, 1, 1, 'ddd', 'dfdfd', 'ddfdf', 1, b'1', 1, 1, 1, 1, '1', '1', 1, '2018-12-13', NULL),
	(14, 10, 1, 1, 1, 'ddd', 'dfdfd', 'ddfdf', 1, b'1', 1, 1, 1, 1, '1', '1', 1, '2018-12-13', NULL),
	(15, 10, 1, 1, 1, 'ddd', 'dfdfd', 'ddfdf', 1, b'1', 1, 1, 1, 1, '1', '1', 1, '2018-12-13', NULL),
	(16, 10, 1, 1, 1, 'ddd', 'dfdfd', 'ddfdf', 1, b'1', 1, 1, 1, 1, '1', '1', 1, '2018-12-13', NULL),
	(17, 10, 1, 1, 1, 'ddd', 'dfdfd', 'ddfdf', 1, b'1', 1, 1, 1, 1, '1', '1', 1, '2018-12-13', NULL),
	(18, 10, 1, 1, 1, 'ddd', 'dfdfd', 'ddfdf', 1, b'1', 1, 1, 1, 1, '1', '1', 1, '2018-12-13', NULL),
	(19, 10, 1, 1, 1, 'ddd', 'dfdfd', 'ddfdf', 1, b'1', 1, 1, 1, 1, '1', '1', 1, '2018-12-13', NULL);
/*!40000 ALTER TABLE `consulta` ENABLE KEYS */;

-- Volcando estructura para tabla integrador1.detalle_insumos
CREATE TABLE IF NOT EXISTS `detalle_insumos` (
  `idCabConsulta` int(11) DEFAULT NULL,
  `idInsumos` int(11) DEFAULT NULL,
  KEY `FK_detalle_insumos_cabconsulta` (`idCabConsulta`),
  KEY `FK_detalle_insumos_insumos` (`idInsumos`),
  CONSTRAINT `FK_detalle_insumos_cabconsulta` FOREIGN KEY (`idCabConsulta`) REFERENCES `cabconsulta` (`idCabConsulta`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_detalle_insumos_insumos` FOREIGN KEY (`idInsumos`) REFERENCES `insumos` (`idInsumos`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla integrador1.detalle_insumos: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `detalle_insumos` DISABLE KEYS */;
INSERT INTO `detalle_insumos` (`idCabConsulta`, `idInsumos`) VALUES
	(72, 19),
	(70, 10),
	(73, 14),
	(73, 12),
	(73, 6);
/*!40000 ALTER TABLE `detalle_insumos` ENABLE KEYS */;

-- Volcando estructura para tabla integrador1.enfermedades
CREATE TABLE IF NOT EXISTS `enfermedades` (
  `ENF_Id` int(11) NOT NULL AUTO_INCREMENT,
  `ENF_Codigo` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `ENF_Descripcion` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `ENF_Estado` bit(1) DEFAULT NULL,
  PRIMARY KEY (`ENF_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- Volcando datos para la tabla integrador1.enfermedades: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `enfermedades` DISABLE KEYS */;
INSERT INTO `enfermedades` (`ENF_Id`, `ENF_Codigo`, `ENF_Descripcion`, `ENF_Estado`) VALUES
	(1, '15468', 'AH1N1', b'1'),
	(2, '15486', 'VIH', b'1');
/*!40000 ALTER TABLE `enfermedades` ENABLE KEYS */;

-- Volcando estructura para tabla integrador1.faccabfac
CREATE TABLE IF NOT EXISTS `faccabfac` (
  `FACCabId` int(11) NOT NULL AUTO_INCREMENT,
  `FACabFec` date DEFAULT NULL,
  `FACCabDes` decimal(10,0) DEFAULT NULL,
  `FACCabSubtotal` decimal(10,0) DEFAULT NULL,
  `FACCabIva` int(11) DEFAULT NULL,
  `FACCabTotal` double DEFAULT NULL,
  `FACCabTipCli` varchar(50) DEFAULT NULL,
  `FACCabCliId` int(11) DEFAULT NULL,
  `FACCabUsuCrea` int(11) DEFAULT NULL,
  `FACCabFecCrea` datetime DEFAULT NULL,
  `FACCabUsuMod` int(11) DEFAULT NULL,
  `FACCabFecMod` datetime DEFAULT NULL,
  `FACCabEst` bit(1) DEFAULT NULL,
  PRIMARY KEY (`FACCabId`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla integrador1.faccabfac: ~11 rows (aproximadamente)
/*!40000 ALTER TABLE `faccabfac` DISABLE KEYS */;
INSERT INTO `faccabfac` (`FACCabId`, `FACabFec`, `FACCabDes`, `FACCabSubtotal`, `FACCabIva`, `FACCabTotal`, `FACCabTipCli`, `FACCabCliId`, `FACCabUsuCrea`, `FACCabFecCrea`, `FACCabUsuMod`, `FACCabFecMod`, `FACCabEst`) VALUES
	(1, '2018-02-08', 6, 5, 12, 5.26, 'Cliente', 5, 0, '2018-02-08 10:58:40', 0, '0000-00-00 00:00:00', b'1'),
	(2, '2018-02-08', 6, 7, 12, 6.84, 'Cliente', 5, 0, '2018-02-08 10:59:16', 0, '0000-00-00 00:00:00', b'1'),
	(3, '2018-02-08', 6, 2, 12, 2.11, 'Paciente', 3, 0, '2018-02-08 14:39:49', 0, '0000-00-00 00:00:00', b'1'),
	(4, '2018-02-08', 6, 2, 12, 2.11, 'Cliente', 5, 0, '2018-02-08 14:45:08', 0, '0000-00-00 00:00:00', b'1'),
	(5, '2018-02-08', 6, 3, 12, 3.16, 'Paciente', 3, 0, '2018-02-08 14:46:32', 0, '0000-00-00 00:00:00', b'1'),
	(6, '2018-02-08', 6, 2, 12, 2.11, 'Cliente', 4, 0, '2018-02-08 14:47:29', 0, '0000-00-00 00:00:00', b'1'),
	(7, '2018-02-08', 6, 3, 12, 3.16, 'Cliente', 4, 0, '2018-02-08 14:48:09', 0, '0000-00-00 00:00:00', b'1'),
	(8, '2018-02-08', 6, 3, 12, 3.16, 'Paciente', 3, 0, '2018-02-08 14:49:47', 0, '0000-00-00 00:00:00', b'1'),
	(9, '2018-02-15', 6, 8, 12, 8.11, 'Cliente', 4, 0, '2018-02-15 18:05:52', 0, '0000-00-00 00:00:00', b'1'),
	(10, '2018-02-15', 6, 1, 12, 0.96, 'Cliente', 4, 0, '2018-02-15 18:22:42', 0, '0000-00-00 00:00:00', b'1'),
	(11, '2018-02-15', 6, 2, 12, 2.53, 'Paciente', 3, 0, '2018-02-15 19:16:22', 0, '0000-00-00 00:00:00', b'1');
/*!40000 ALTER TABLE `faccabfac` ENABLE KEYS */;

-- Volcando estructura para tabla integrador1.faccliente
CREATE TABLE IF NOT EXISTS `faccliente` (
  `FACCliId` int(11) NOT NULL AUTO_INCREMENT,
  `FACCliNombre` varchar(50) NOT NULL DEFAULT '0',
  `FACCliApellido` varchar(50) NOT NULL DEFAULT '0',
  `FACCliCedula` varchar(10) NOT NULL,
  `FACCliDireccion` varchar(50) NOT NULL DEFAULT '0',
  `FACCliCelular` varchar(50) NOT NULL DEFAULT '0',
  `FACCliEmail` varchar(50) NOT NULL DEFAULT '0',
  `FACCliUsuarioCrea` varchar(50) DEFAULT '0',
  `FACCliUsuaModif` varchar(50) DEFAULT '0',
  `FACCliEstado` bit(1) DEFAULT NULL,
  `FACCliFechaCrea` date DEFAULT NULL,
  `FACCliFechaFechaUltima` date DEFAULT NULL,
  PRIMARY KEY (`FACCliId`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla integrador1.faccliente: ~9 rows (aproximadamente)
/*!40000 ALTER TABLE `faccliente` DISABLE KEYS */;
INSERT INTO `faccliente` (`FACCliId`, `FACCliNombre`, `FACCliApellido`, `FACCliCedula`, `FACCliDireccion`, `FACCliCelular`, `FACCliEmail`, `FACCliUsuarioCrea`, `FACCliUsuaModif`, `FACCliEstado`, `FACCliFechaCrea`, `FACCliFechaFechaUltima`) VALUES
	(4, 'Maria', 'Vera', '43545', 'asdff', '46468', 'jbuibiu', '0', '0', b'1', NULL, NULL),
	(5, 'mirian', 'Vera', '5488', 'qwer', '46468', 'jbuibiu', '0', '0', b'1', NULL, NULL),
	(6, 'Jorge', 'Vera', 'mm', 'rtertg', 'f', 'rt', '0', '0', b'1', '0000-00-00', '0000-00-00'),
	(7, 'jfgij', 'frij', 'fringt', 'rtertg', 'kerfg', 'derg', '0', '0', b'0', '0000-00-00', '0000-00-00'),
	(8, 'mgb', 'dfg', '34562345', 'dfgh', '345345', 'fgb', '', '', b'0', '0000-00-00', '0000-00-00'),
	(9, 'mgb', 'dfg', '34562345', 'dfgh', '345345', 'fgb', '', '', b'0', '0000-00-00', '0000-00-00'),
	(10, 'defg', 'edr', '3234567646', 'rgthy', '2345', '345', '', '', b'0', '0000-00-00', '0000-00-00'),
	(11, 'Jose Bolivar', 'Cardenas', '0958892630', '5454', '0981196007', '5454', '', '', b'1', '0000-00-00', '0000-00-00'),
	(12, 'Marco', 'Cardenas', '0321215465', 'masas', 'jhjhjh', 'jhj', '', '', b'0', '0000-00-00', '0000-00-00');
/*!40000 ALTER TABLE `faccliente` ENABLE KEYS */;

-- Volcando estructura para tabla integrador1.facdetfac
CREATE TABLE IF NOT EXISTS `facdetfac` (
  `FACDetId` int(11) NOT NULL AUTO_INCREMENT,
  `FACCabId` int(11) NOT NULL DEFAULT '0',
  `IdProducto` int(11) NOT NULL DEFAULT '0',
  `FACDetCantidad` int(11) NOT NULL,
  `FACDetPrecio` double NOT NULL,
  `FACDetEstado` bit(1) NOT NULL,
  PRIMARY KEY (`FACDetId`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla integrador1.facdetfac: ~14 rows (aproximadamente)
/*!40000 ALTER TABLE `facdetfac` DISABLE KEYS */;
INSERT INTO `facdetfac` (`FACDetId`, `FACCabId`, `IdProducto`, `FACDetCantidad`, `FACDetPrecio`, `FACDetEstado`) VALUES
	(1, 1, 5, 1, 3, b'1'),
	(2, 1, 4, 1, 2, b'1'),
	(3, 2, 4, 1, 2, b'1'),
	(4, 2, 5, 1, 3, b'1'),
	(5, 2, 6, 1, 1.5, b'1'),
	(6, 3, 4, 1, 2, b'1'),
	(7, 4, 4, 1, 2, b'1'),
	(8, 5, 5, 1, 3, b'1'),
	(9, 6, 4, 1, 2, b'1'),
	(10, 7, 5, 1, 3, b'1'),
	(11, 8, 5, 1, 3, b'1'),
	(12, 9, 5, 11, 0.55, b'1'),
	(13, 10, 1, 1, 0.915, b'1'),
	(14, 11, 6, 2, 1.2, b'1');
/*!40000 ALTER TABLE `facdetfac` ENABLE KEYS */;

-- Volcando estructura para tabla integrador1.fichamedica
CREATE TABLE IF NOT EXISTS `fichamedica` (
  `FIC_Id` int(11) NOT NULL AUTO_INCREMENT,
  `PAC_Id` int(11) DEFAULT NULL,
  `FIC_Antecedentes` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `FIC_Alergias` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `FIC_Tratamiento` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `FIC_Familiares` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `FIC_Codigo` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `FIC_Estado` bit(1) DEFAULT NULL,
  PRIMARY KEY (`FIC_Id`),
  KEY `PAC_Id` (`PAC_Id`),
  CONSTRAINT `FK_fichamedica_paciente` FOREIGN KEY (`PAC_Id`) REFERENCES `paciente` (`PAC_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- Volcando datos para la tabla integrador1.fichamedica: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `fichamedica` DISABLE KEYS */;
INSERT INTO `fichamedica` (`FIC_Id`, `PAC_Id`, `FIC_Antecedentes`, `FIC_Alergias`, `FIC_Tratamiento`, `FIC_Familiares`, `FIC_Codigo`, `FIC_Estado`) VALUES
	(1, 18, 'Ataques cardiacos', 'Vacunas', 'No automedicarse', 'No registra', '1234', b'1'),
	(2, 17, 'No registra', 'A la Marihuana', 'Consumir poco', 'No registra', '4567', b'1'),
	(3, 16, 'Diabetes', 'Al mani', 'Comer mani', 'Todos Muertos', '45782', b'1');
/*!40000 ALTER TABLE `fichamedica` ENABLE KEYS */;

-- Volcando estructura para tabla integrador1.fotopieza
CREATE TABLE IF NOT EXISTS `fotopieza` (
  `idFotoPieza` int(11) NOT NULL AUTO_INCREMENT,
  `FotoFecha` date DEFAULT NULL,
  `FotoObservacion` mediumtext,
  PRIMARY KEY (`idFotoPieza`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla integrador1.fotopieza: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `fotopieza` DISABLE KEYS */;
/*!40000 ALTER TABLE `fotopieza` ENABLE KEYS */;

-- Volcando estructura para tabla integrador1.insumos
CREATE TABLE IF NOT EXISTS `insumos` (
  `idInsumos` int(11) NOT NULL AUTO_INCREMENT,
  `Insumoscol` varchar(100) DEFAULT NULL,
  `fotoInsumo` mediumtext,
  `estado` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`idInsumos`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla integrador1.insumos: ~22 rows (aproximadamente)
/*!40000 ALTER TABLE `insumos` DISABLE KEYS */;
INSERT INTO `insumos` (`idInsumos`, `Insumoscol`, `fotoInsumo`, `estado`) VALUES
	(1, 'Cauchos Abrasivos ', '../../../../fotosInsumos/insumo.jpg', NULL),
	(2, 'Agujas Dentales', NULL, NULL),
	(3, ' Cemento', NULL, NULL),
	(4, 'Cepillo', NULL, NULL),
	(5, 'Cera', NULL, NULL),
	(6, 'Coronas De Acero Para Diferentes Piezas ', NULL, NULL),
	(7, ' Cubetas Para Colocar Flúor ', NULL, NULL),
	(8, 'Elastómeros (Material De Impresión) ', NULL, NULL),
	(9, 'Escobillas Para Pulido ', NULL, NULL),
	(10, 'Hidroxiapatita', NULL, NULL),
	(11, 'Eyector De Saliva (Cánula Descartable) ', NULL, NULL),
	(12, ' Hilo Dental Con Cera ', NULL, NULL),
	(13, ' Hilo Dental  Sin Cera ', NULL, NULL),
	(14, ' Lijas', NULL, NULL),
	(15, 'Manguera De Uso Dental ', NULL, NULL),
	(16, ' Módulos Elásticos De Separación ', NULL, NULL),
	(17, ' Siliconas', NULL, NULL),
	(18, 'Adhesivos para prótesis Dental ', NULL, NULL),
	(19, ' Limpiadores para Prótesis Dental y Productos de Ortodoncia ', NULL, NULL),
	(20, 'Aplicadores de Sustancias Odontológicas ', NULL, NULL),
	(21, 'Hilo retractor ', NULL, NULL),
	(22, 'Embalador para hilo de retracción ', NULL, NULL);
/*!40000 ALTER TABLE `insumos` ENABLE KEYS */;

-- Volcando estructura para tabla integrador1.manpaciente
CREATE TABLE IF NOT EXISTS `manpaciente` (
  `PACID` int(11) DEFAULT NULL,
  `PACNombre` varchar(50) DEFAULT NULL,
  `PACCiudad` varchar(50) DEFAULT NULL,
  `PACApellido` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla integrador1.manpaciente: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `manpaciente` DISABLE KEYS */;
INSERT INTO `manpaciente` (`PACID`, `PACNombre`, `PACCiudad`, `PACApellido`) VALUES
	(4, 'carlos', 'naranjit', 'Vera'),
	(3, 'juan', 'bucay', 'Pino');
/*!40000 ALTER TABLE `manpaciente` ENABLE KEYS */;

-- Volcando estructura para tabla integrador1.medico
CREATE TABLE IF NOT EXISTS `medico` (
  `idMedico` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idMedico`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla integrador1.medico: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `medico` DISABLE KEYS */;
/*!40000 ALTER TABLE `medico` ENABLE KEYS */;

-- Volcando estructura para tabla integrador1.paciente
CREATE TABLE IF NOT EXISTS `paciente` (
  `PAC_Id` int(11) NOT NULL AUTO_INCREMENT,
  `PAC_Cedula` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `PAC_Nombre` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `PAC_Apellido` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `PAC_Sexo` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `PAC_Telefono` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `PAC_FecNac` date DEFAULT NULL,
  `PAC_Edad` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `PAC_Ciudad` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `PAC_TipSangre` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `PAC_NumReg` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `PAC_Estado` bit(1) DEFAULT NULL,
  `PAC_Foto` varchar(500) COLLATE latin1_bin DEFAULT NULL,
  PRIMARY KEY (`PAC_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- Volcando datos para la tabla integrador1.paciente: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `paciente` DISABLE KEYS */;
INSERT INTO `paciente` (`PAC_Id`, `PAC_Cedula`, `PAC_Nombre`, `PAC_Apellido`, `PAC_Sexo`, `PAC_Telefono`, `PAC_FecNac`, `PAC_Edad`, `PAC_Ciudad`, `PAC_TipSangre`, `PAC_NumReg`, `PAC_Estado`, `PAC_Foto`) VALUES
	(16, '0923341556', 'Alexis', 'Tabara', 'Masculino', '0994463952', '1997-02-05', '20', 'Milagro', '+O', 'A1', b'1', '../../../img/paciente/descarga.jpg'),
	(17, '0932443222', 'Nicol', 'Prieto', 'Femenino', '0934349452', '1997-01-18', '20', 'Milagro', '+O', 'A1', b'1', '../../../img/paciente/Alicia2-e1463755525205.jpg'),
	(18, '0940366339', 'Carlos', 'Rodriguez', 'Masculino', '0905544555', '1993-03-11', '24', 'Simon Bolivar', '+O', 'C1', b'1', '../../../img/paciente/1-930x901.jpg'),
	(19, '0958892630', 'Bolivar', 'Cardenas', 'Masculino', '0981196007', '2018-02-13', '21', 'San Carlos', '+O', 'C5', b'1', '../../../img/paciente/Alicia2-e1463755525205.jpg');
/*!40000 ALTER TABLE `paciente` ENABLE KEYS */;

-- Volcando estructura para tabla integrador1.piezadental
CREATE TABLE IF NOT EXISTS `piezadental` (
  `idPiezaDental` int(11) NOT NULL AUTO_INCREMENT,
  `PiezaDentacol` varchar(50) DEFAULT NULL,
  `idTipoPieza` int(11) DEFAULT NULL,
  `idEstPieza` int(11) DEFAULT NULL,
  `idFotoPieza` int(11) DEFAULT NULL,
  `idUbicacionBucal` int(11) DEFAULT NULL,
  PRIMARY KEY (`idPiezaDental`),
  KEY `FK_piezadental_tipopieza` (`idTipoPieza`),
  KEY `FK_piezadental_estadopieza` (`idEstPieza`),
  KEY `FK_piezadental_fotopieza` (`idFotoPieza`),
  KEY `FK_piezadental_ubicacionbucal` (`idUbicacionBucal`),
  CONSTRAINT `FK_piezadental_estadopieza` FOREIGN KEY (`idEstPieza`) REFERENCES `estadopieza` (`idEstPieza`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_piezadental_fotopieza` FOREIGN KEY (`idFotoPieza`) REFERENCES `fotopieza` (`idFotoPieza`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_piezadental_tipopieza` FOREIGN KEY (`idTipoPieza`) REFERENCES `tipopieza` (`idTipoPieza`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_piezadental_ubicacionbucal` FOREIGN KEY (`idUbicacionBucal`) REFERENCES `ubicacionbucal` (`idUbicacionBucal`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla integrador1.piezadental: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `piezadental` DISABLE KEYS */;
/*!40000 ALTER TABLE `piezadental` ENABLE KEYS */;

-- Volcando estructura para tabla integrador1.profesional
CREATE TABLE IF NOT EXISTS `profesional` (
  `PRO_Id` int(11) NOT NULL AUTO_INCREMENT,
  `CAR_ID` int(11) NOT NULL DEFAULT '0',
  `PRO_Cedula` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `PRO_Nombre` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `PRO_Apellido` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `PRO_Direccion` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `PRO_Telefono` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `PRO_Estado` bit(1) DEFAULT NULL,
  `PRO_Foto` varchar(500) COLLATE latin1_bin DEFAULT NULL,
  PRIMARY KEY (`PRO_Id`),
  KEY `CAR_ID` (`CAR_ID`),
  CONSTRAINT `FK_profesional_cargo` FOREIGN KEY (`CAR_ID`) REFERENCES `cargo` (`CAR_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- Volcando datos para la tabla integrador1.profesional: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `profesional` DISABLE KEYS */;
INSERT INTO `profesional` (`PRO_Id`, `CAR_ID`, `PRO_Cedula`, `PRO_Nombre`, `PRO_Apellido`, `PRO_Direccion`, `PRO_Telefono`, `PRO_Estado`, `PRO_Foto`) VALUES
	(1, 1, '0928541556', 'Sheldon', 'Cooper', 'Milagro', '0999863952', b'1', '../../../img/profesional/510460_1.jpg'),
	(2, 2, '0928541556', 'Leonar', 'Hostated', 'Milagro', '0999863952', b'1', '../../../img/profesional/Young-Doctor-2.jpg'),
	(3, 3, '0928541556', 'Wolowits', 'Cootrapali', 'Milagro', '0999863952', b'1', '../../../img/profesional/consultorios-medicos.jpg'),
	(6, 1, '0999832423', 'Wladimir ', 'Delgado', 'Guayaquil', '0993233952', b'1', '../../../img/profesional/510460_1.jpg'),
	(7, 2, '0999863232', 'Genesis', 'Tábara', 'Milagro', '0999863323', b'1', '../../../img/profesional/Young-Doctor-2.jpg'),
	(8, 1, '12445558886', 'Juanjo', 'PujarTeago', 'USA', '00545585', b'1', '../../../img/profesional/consultorios-medicos.jpg'),
	(10, 2, '8457552222', 'Maria', 'Dolores A la H Pita', 'Groenlandia', '52545555', b'1', NULL);
/*!40000 ALTER TABLE `profesional` ENABLE KEYS */;

-- Volcando estructura para tabla integrador1.segmodulo
CREATE TABLE IF NOT EXISTS `segmodulo` (
  `idModulo` int(4) NOT NULL AUTO_INCREMENT,
  `modNombre` varchar(50) DEFAULT NULL,
  `modDescripcion` varchar(50) DEFAULT NULL,
  `modFoto` varchar(50) DEFAULT NULL,
  `codigo` varchar(100) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL,
  `modPadre` int(11) DEFAULT NULL,
  `estado` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`idModulo`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla integrador1.segmodulo: ~19 rows (aproximadamente)
/*!40000 ALTER TABLE `segmodulo` DISABLE KEYS */;
INSERT INTO `segmodulo` (`idModulo`, `modNombre`, `modDescripcion`, `modFoto`, `codigo`, `color`, `modPadre`, `estado`) VALUES
	(1, 'Seguridad', 'Grupo Seguridad', ' fa-lock', 'Apps/main/vista/seguridad.php', 'primary', 0, 0),
	(2, 'Odontologia', 'Odontologia', 'fa-flask', 'Apps/main/vista/ortodoncia.php', 'green', 0, 0),
	(3, 'Farmacia', 'Compra y venta', 'fa-plus-square-o  ', 'Apps/main/vista/farmacia.php', 'red', 0, 0),
	(4, 'Proveedores', 'Grupo proveedores', 'fa-ambulance', 'Apps/seguridad/farmacia/vista/ListarProveedor.php', 'primary', 3, 1),
	(5, 'Productos', 'Nuevos Productos', 'fa-stethoscope', 'Apps/seguridad/Farmacia/Vista/ListarProducto.php', 'red', 3, 1),
	(6, 'Compras', 'Nuevas Compras', 'fa-shopping-cart', 'Apps/seguridad/Farmacia/Vista/ListarCompra.php', 'green', 3, 1),
	(7, 'Devoluciones', 'Nuevas Deoluciones', 'fa-history', 'Apps/seguridad/Farmacia/Vista/ListarDevolucion.php', 'yellow', 3, 1),
	(8, 'Factura', 'Grupo Facturas', 'fa-file-text-o', 'Apps/seguridad/modulo/Factura/Vista/ListarFacturas.php', 'success', 3, 1),
	(9, 'Clientes', 'Grupo Clientes', 'fa-github', 'Apps/seguridad/modulo/Factura/Vista/ListarCliente.php', 'warnig', 3, 1),
	(10, 'Insumos', 'Grupo Insumos', 'fa-stethoscope', 'Apps/seguridad/ortodoncia/vista/ListarInsumos.php', 'green', 2, 1),
	(11, 'Clinica', 'Herramientas', 'fa-hospital-o', 'Apps/seguridad/ortodoncia/vista/ListarClinicas.php', 'primary', 2, 1),
	(12, 'Consulta', 'Grupo Consulta', 'fa-bell', 'Apps/seguridad/ortodoncia/vista/ListarConsultas.php', 'red', 2, 1),
	(13, 'Usuario', 'Grupo Usuario', 'fa-users', 'Apps/seguridad/usuario/vista/ListarUsuarios.php', 'primary', 1, 1),
	(14, 'Permisos', 'Asignacion', 'fa-unlock-alt', 'Apps/Seguridad/permisos/vista/ListarPermisos.php', 'green', 1, 1),
	(15, 'Roles', 'Muestra Roles', 'fa-retweet', 'Apps/Seguridad/rol/Vista/Listarroles.php', 'red', 1, 1),
	(16, 'Modulos', 'Muestra Modulos', 'fa-inbox', 'Apps/Seguridad/modulos/vista/listamodulos.php', 'yellow', 1, 1),
	(17, 'Historia Clinica', 'Grupos Resgistros', 'fa-medkit', 'Apps/seguridad/HistoriaClinica/Vista/ListarUsuariosCitas.php', 'yellow', 0, 0),
	(18, 'Citas', 'Grupo Citas', 'fa-calendar-o  ', 'Apps/Seguridad/Cita/Vista/ListarCita.php', 'red', 0, 0),
	(19, 'Consultas', 'Grupon Consultas', 'fa-expand', 'Apps/Seguridad/Consulta/Vista/ListarConsulta.php', 'primary', 0, 0);
/*!40000 ALTER TABLE `segmodulo` ENABLE KEYS */;

-- Volcando estructura para tabla integrador1.segpermiso
CREATE TABLE IF NOT EXISTS `segpermiso` (
  `idPermiso` int(4) NOT NULL AUTO_INCREMENT,
  `idModulo` int(4) DEFAULT NULL,
  `qqq` varchar(50) DEFAULT NULL,
  `crear` int(1) DEFAULT NULL,
  `modificar` int(1) DEFAULT NULL,
  `consultar` int(1) DEFAULT NULL,
  `eliminar` int(1) DEFAULT NULL,
  PRIMARY KEY (`idPermiso`),
  KEY `FK_segpermiso_segmodulo` (`idModulo`),
  CONSTRAINT `FK_segpermiso_segmodulo` FOREIGN KEY (`idModulo`) REFERENCES `segmodulo` (`idModulo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla integrador1.segpermiso: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `segpermiso` DISABLE KEYS */;
INSERT INTO `segpermiso` (`idPermiso`, `idModulo`, `qqq`, `crear`, `modificar`, `consultar`, `eliminar`) VALUES
	(1, 1, 'nada', 1, 1, 1, 1),
	(2, 2, 'quien', 1, 1, 1, 1);
/*!40000 ALTER TABLE `segpermiso` ENABLE KEYS */;

-- Volcando estructura para tabla integrador1.segrol
CREATE TABLE IF NOT EXISTS `segrol` (
  `idRol` int(11) NOT NULL AUTO_INCREMENT,
  `rolDescripcion` varchar(50) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  PRIMARY KEY (`idRol`),
  UNIQUE KEY `Índice 2` (`rolDescripcion`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla integrador1.segrol: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `segrol` DISABLE KEYS */;
INSERT INTO `segrol` (`idRol`, `rolDescripcion`, `estado`) VALUES
	(1, 'administrador', 1),
	(2, 'odontologo', 1),
	(3, 'ginecologo', 1),
	(4, 'pediatra', 1),
	(43, 'Psicologia', 1);
/*!40000 ALTER TABLE `segrol` ENABLE KEYS */;

-- Volcando estructura para tabla integrador1.segusuario
CREATE TABLE IF NOT EXISTS `segusuario` (
  `idLogin` int(4) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `usuLogin` varchar(50) DEFAULT NULL,
  `usuClave` varchar(50) DEFAULT NULL,
  `usuNombre` varchar(100) DEFAULT NULL,
  `usuApellido` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `idRol` int(11) DEFAULT NULL,
  `last_session` datetime DEFAULT NULL,
  `foto` varchar(200) DEFAULT NULL,
  `token` varchar(40) NOT NULL DEFAULT '0',
  `token_usuClave` varchar(200) DEFAULT NULL,
  `usuClave_request` int(11) NOT NULL,
  `activacion` int(11) NOT NULL,
  PRIMARY KEY (`idLogin`),
  KEY `FK_segusuario_segrol` (`idRol`),
  CONSTRAINT `FK_segusuario_segrol` FOREIGN KEY (`idRol`) REFERENCES `segrol` (`idRol`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=115 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla integrador1.segusuario: ~9 rows (aproximadamente)
/*!40000 ALTER TABLE `segusuario` DISABLE KEYS */;
INSERT INTO `segusuario` (`idLogin`, `usuLogin`, `usuClave`, `usuNombre`, `usuApellido`, `email`, `idRol`, `last_session`, `foto`, `token`, `token_usuClave`, `usuClave_request`, `activacion`) VALUES
	(0054, 'ealcivarg', '123', 'Erick', 'Alcivar', 'bolo1234@live.com', 1, '2018-02-09 00:34:16', '../../../../fotos/foto_2016512162614.jpg', '0', 'c6d58aa945dfa61d036170b5c90761a0', 1, 0),
	(0055, 'larcec', '1234', 'Luis', 'Arce', 'jorgefk_@hotmail.com', 2, '2018-02-09 19:25:52', '../../../../fotos/foto_201617154031.JPG', '0', 'aae558264f88eabeb1555fff244eb27d', 1, 0),
	(0056, 'wurgilesd', '123', 'Wilmer', 'Urgiles', 'stemensooh@gmail.comx', 3, '2018-02-02 02:09:20', '../../../../fotos/foto_2016524153610.jpg', '0', '', 1, 0),
	(0057, 'atorrese', '123', 'Angel', 'Torres', 'stemensooh@gmail.com', 3, '2018-02-02 04:30:47', '../../../../fotos/foto_2016126161038.jpg', '0', '788873c009fc8c1e53658850245ed942', 1, 0),
	(0058, 'lpalmaa', '123', 'Lady', 'Palma', 'jcardenasp2@unemi.edu.ec', 43, '2018-02-15 18:01:38', '../../../../fotos/foto_20151027151735.JPG', '0', '', 1, 0),
	(0060, 'jvinuezam', '123', 'Jorge', 'Vinueza', 'marco5284@hotmail.com', 1, '2018-02-15 20:41:31', '../../../../fotos/foto_2016831142828.jpg', '0', '', 1, 0),
	(0112, 'daniel', '123', 'Daniel', 'Vera', 'bolo1234@live.com', 2, NULL, '../../../../fotos/usuario.png', '0', NULL, 0, 0),
	(0113, 'jremacher2', '123', 'Jiren', 'El Gris', 'bolo1234@live.com', 2, NULL, '../../../../fotos/usuario.png', '0', NULL, 0, 0),
	(0114, 'ksjsjksjf', '123', 'kjkjkj', 'kjkj', 'blo@k.com', 2, NULL, '../../../../fotos/usuario.png', '0', NULL, 0, 0);
/*!40000 ALTER TABLE `segusuario` ENABLE KEYS */;

-- Volcando estructura para tabla integrador1.seg_rolmodulo
CREATE TABLE IF NOT EXISTS `seg_rolmodulo` (
  `idRolMod` int(11) NOT NULL AUTO_INCREMENT,
  `idRol` int(11) DEFAULT NULL,
  `idModulo` int(11) DEFAULT NULL,
  `nuevo` tinyint(4) DEFAULT NULL,
  `modificar` tinyint(4) DEFAULT NULL,
  `eliminar` tinyint(4) DEFAULT NULL,
  `visualizar` tinyint(4) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  PRIMARY KEY (`idRolMod`),
  KEY `FK_seg_rolmodulo_segrol` (`idRol`),
  KEY `FK_seg_rolmodulo_segmodulo` (`idModulo`),
  CONSTRAINT `FK_seg_rolmodulo_segmodulo` FOREIGN KEY (`idModulo`) REFERENCES `segmodulo` (`idModulo`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_seg_rolmodulo_segrol` FOREIGN KEY (`idRol`) REFERENCES `segrol` (`idRol`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla integrador1.seg_rolmodulo: ~10 rows (aproximadamente)
/*!40000 ALTER TABLE `seg_rolmodulo` DISABLE KEYS */;
INSERT INTO `seg_rolmodulo` (`idRolMod`, `idRol`, `idModulo`, `nuevo`, `modificar`, `eliminar`, `visualizar`, `estado`) VALUES
	(1, 1, 1, 1, 1, 1, 1, 1),
	(2, 1, 2, 1, 1, 1, 1, 1),
	(3, 1, 3, 1, 1, 1, 1, 1),
	(4, 3, 4, 1, 1, 1, 1, 1),
	(5, 1, 17, 1, 1, 1, 1, 1),
	(6, 1, 18, 1, 1, 1, 1, 1),
	(7, 1, 19, 1, 1, 1, 1, 1),
	(8, 2, 19, 0, 1, 0, 0, 1),
	(9, 2, 2, 0, 0, 1, 1, 1),
	(10, 43, 2, 0, 0, 1, 1, 1);
/*!40000 ALTER TABLE `seg_rolmodulo` ENABLE KEYS */;

-- Volcando estructura para tabla integrador1.tipopieza
CREATE TABLE IF NOT EXISTS `tipopieza` (
  `idTipoPieza` int(11) NOT NULL AUTO_INCREMENT,
  `TipIncisivo` varchar(50) DEFAULT NULL,
  `TipCanino` varchar(50) DEFAULT NULL,
  `TipPremolar` varchar(50) DEFAULT NULL,
  `TipMolar` varchar(50) DEFAULT NULL,
  `TipCodigo` int(11) DEFAULT NULL,
  `TipEstado` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`idTipoPieza`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla integrador1.tipopieza: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tipopieza` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipopieza` ENABLE KEYS */;

-- Volcando estructura para tabla integrador1.tratamiento
CREATE TABLE IF NOT EXISTS `tratamiento` (
  `TRA_Id` int(11) NOT NULL AUTO_INCREMENT,
  `TRA_desc_tra` int(11) DEFAULT NULL,
  `idKardex` int(11) DEFAULT NULL,
  `CON_Id` int(11) DEFAULT NULL,
  PRIMARY KEY (`TRA_Id`),
  KEY `FK_tratamiento_comtbcab_kardex` (`idKardex`),
  KEY `FK_tratamiento_consulta` (`CON_Id`),
  CONSTRAINT `FK_tratamiento_comtbcab_kardex` FOREIGN KEY (`idKardex`) REFERENCES `comtbcab_kardex` (`idKardex`),
  CONSTRAINT `FK_tratamiento_consulta` FOREIGN KEY (`CON_Id`) REFERENCES `consulta` (`CON_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla integrador1.tratamiento: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tratamiento` DISABLE KEYS */;
/*!40000 ALTER TABLE `tratamiento` ENABLE KEYS */;

-- Volcando estructura para tabla integrador1.ubicacionbucal
CREATE TABLE IF NOT EXISTS `ubicacionbucal` (
  `idUbicacionBucal` int(11) NOT NULL AUTO_INCREMENT,
  `UbicNombre` varchar(50) DEFAULT NULL,
  `UbicSupDerecha` varchar(50) DEFAULT NULL,
  `UbicSupIzquierda` varchar(50) DEFAULT NULL,
  `UbicInfDerecha` varchar(50) DEFAULT NULL,
  `UbicInfIzquierda` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idUbicacionBucal`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla integrador1.ubicacionbucal: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `ubicacionbucal` DISABLE KEYS */;
/*!40000 ALTER TABLE `ubicacionbucal` ENABLE KEYS */;

-- Volcando estructura para tabla integrador1.ubicacionpieza
CREATE TABLE IF NOT EXISTS `ubicacionpieza` (
  `idUbicacionPieza` int(11) NOT NULL AUTO_INCREMENT,
  `pieza` int(11) DEFAULT NULL,
  PRIMARY KEY (`idUbicacionPieza`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla integrador1.ubicacionpieza: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `ubicacionpieza` DISABLE KEYS */;
/*!40000 ALTER TABLE `ubicacionpieza` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
