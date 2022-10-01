-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 01, 2022 at 08:11 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE IF NOT EXISTS `categoria` (
  `IdCategoria` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(50) DEFAULT NULL,
  `IdEstado` tinyint(1) DEFAULT '1',
  `FechaCreacion` date DEFAULT NULL,
  PRIMARY KEY (`IdCategoria`),
  KEY `FK_estado` (`IdEstado`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categoria`
--

INSERT INTO `categoria` (`IdCategoria`, `Descripcion`, `IdEstado`, `FechaCreacion`) VALUES
(1, 'Matrimonial', 2, '2022-09-21'),
(2, 'Doble', 1, '2022-09-17'),
(26, 'Individual', 1, '2022-10-01');

-- --------------------------------------------------------

--
-- Table structure for table `detalle_venta`
--

DROP TABLE IF EXISTS `detalle_venta`;
CREATE TABLE IF NOT EXISTS `detalle_venta` (
  `IdDetalleVenta` int(11) NOT NULL,
  `IdVenta` int(11) DEFAULT NULL,
  `IdProducto` int(11) DEFAULT NULL,
  `Cantidad` int(11) DEFAULT NULL,
  `SubTotal` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`IdDetalleVenta`),
  KEY `FK__DETALLE_V__IdVen__4CA06362` (`IdVenta`),
  KEY `FK__DETALLE_V__IdPro__4D94879B` (`IdProducto`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detalle_venta`
--

INSERT INTO `detalle_venta` (`IdDetalleVenta`, `IdVenta`, `IdProducto`, `Cantidad`, `SubTotal`) VALUES
(1, 1, 8, 1, '4.50'),
(2, 1, 5, 4, '8.00');

-- --------------------------------------------------------

--
-- Table structure for table `estado`
--

DROP TABLE IF EXISTS `estado`;
CREATE TABLE IF NOT EXISTS `estado` (
  `IdEstado` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(50) DEFAULT NULL,
  `FechaCreacion` date NOT NULL,
  PRIMARY KEY (`IdEstado`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `estado`
--

INSERT INTO `estado` (`IdEstado`, `Descripcion`, `FechaCreacion`) VALUES
(1, 'Activo', '2022-09-26'),
(2, 'Inactivo', '2022-09-26');

-- --------------------------------------------------------

--
-- Table structure for table `estado_habitacion`
--

DROP TABLE IF EXISTS `estado_habitacion`;
CREATE TABLE IF NOT EXISTS `estado_habitacion` (
  `IdEstadoHabitacion` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(50) DEFAULT NULL,
  `IdEstado` tinyint(1) DEFAULT '1',
  `FechaCreacion` date DEFAULT NULL,
  PRIMARY KEY (`IdEstadoHabitacion`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `estado_habitacion`
--

INSERT INTO `estado_habitacion` (`IdEstadoHabitacion`, `Descripcion`, `IdEstado`, `FechaCreacion`) VALUES
(1, 'Disponible', 1, '2022-09-22'),
(2, 'Ocupado', 1, '2022-09-22'),
(3, 'Limpieza', 1, '2022-09-28'),
(9, 'En refacciÃ³n', 1, '2022-10-01');

-- --------------------------------------------------------

--
-- Table structure for table `estado_recepcion`
--

DROP TABLE IF EXISTS `estado_recepcion`;
CREATE TABLE IF NOT EXISTS `estado_recepcion` (
  `IdEstadoRecepcion` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(50) DEFAULT NULL,
  `IdEstado` int(11) DEFAULT NULL,
  `FechaCreacion` date DEFAULT NULL,
  PRIMARY KEY (`IdEstadoRecepcion`),
  KEY `Estado` (`IdEstado`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `estado_recepcion`
--

INSERT INTO `estado_recepcion` (`IdEstadoRecepcion`, `Descripcion`, `IdEstado`, `FechaCreacion`) VALUES
(1, 'Reservado', 1, '2022-09-27'),
(2, 'Pendiente de Pago', 1, '2022-09-27'),
(3, 'Anulado', 1, '2022-09-27');

-- --------------------------------------------------------

--
-- Table structure for table `estado_venta`
--

DROP TABLE IF EXISTS `estado_venta`;
CREATE TABLE IF NOT EXISTS `estado_venta` (
  `IdEstadoVenta` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(50) NOT NULL,
  `IdEstado` int(11) NOT NULL,
  `FechaCreacion` date NOT NULL,
  PRIMARY KEY (`IdEstadoVenta`),
  KEY `IdEstado` (`IdEstado`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `estado_venta`
--

INSERT INTO `estado_venta` (`IdEstadoVenta`, `Descripcion`, `IdEstado`, `FechaCreacion`) VALUES
(1, 'Por pagar', 2, '2022-09-28'),
(2, 'Pagado', 1, '2022-09-27'),
(4, 'Anulado', 2, '2022-09-27'),
(6, 'otro', 1, '2022-10-01');

-- --------------------------------------------------------

--
-- Table structure for table `habitacion`
--

DROP TABLE IF EXISTS `habitacion`;
CREATE TABLE IF NOT EXISTS `habitacion` (
  `IdHabitacion` int(11) NOT NULL AUTO_INCREMENT,
  `Numero` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `Detalle` varchar(100) DEFAULT NULL,
  `Precio` decimal(10,2) DEFAULT NULL,
  `IdEstadoHabitacion` int(11) DEFAULT NULL,
  `IdPiso` int(11) DEFAULT NULL,
  `IdCategoria` int(11) DEFAULT NULL,
  `IdEstado` tinyint(1) DEFAULT '1',
  `FechaCreacion` date DEFAULT NULL,
  PRIMARY KEY (`IdHabitacion`),
  KEY `FK__HABITACIO__IdEst__300424B4` (`IdEstadoHabitacion`),
  KEY `FK__HABITACIO__IdPis__30F848ED` (`IdPiso`),
  KEY `FK__HABITACIO__IdCat__31EC6D26` (`IdCategoria`),
  KEY `FK_estado` (`IdEstado`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `habitacion`
--

INSERT INTO `habitacion` (`IdHabitacion`, `Numero`, `Detalle`, `Precio`, `IdEstadoHabitacion`, `IdPiso`, `IdCategoria`, `IdEstado`, `FechaCreacion`) VALUES
(1, '1', 'WIFI + BAÃ‘O + TV + CABLE', '70.00', 3, 1, 3, 1, '2022-09-22'),
(2, '2', 'WIFI + BAÃ‘O + TV + CABLE', '80.00', 3, 3, 3, 2, '2022-09-23'),
(3, '3', 'BAÃ‘O + TV + CABLE', '60.00', 1, 1, 3, 1, '2022-09-22'),
(4, '4', 'WIFI + BAÃ‘O + TV + CABLE', '80.00', 2, 1, 2, 1, '2022-09-22'),
(5, '5', 'WIFI + BAÃ‘O', '50.00', 1, 1, 3, 1, '2022-09-22'),
(6, '6', 'WIFI + BAÃ‘O + TV 4K + CABLE', '80.00', 3, 2, 3, 1, '2022-09-22'),
(7, '7', 'WIFI + BAÃ‘O + TV 4K + CABLE', '90.00', 2, 2, 26, 1, '2022-09-22'),
(8, '8', 'WIFI + BAÃ‘O + TV + CABLE', '70.00', 1, 2, 3, 1, '2022-09-22'),
(9, '9', 'WIFI + BAÃ‘O + TV + CABLE', '80.00', 1, 2, 2, 1, '2022-09-22'),
(10, '10', 'WIFI + BAÃ‘O + TV + CABLE', '70.00', 1, 2, 3, 1, '2022-09-22'),
(11, '10', 'WIFI + BAÃ‘O + TV 4K + CABLE', '500.00', 2, 2, 1, 1, '2022-09-30'),
(12, '11', 'WIFI + BAÃ‘O + TV 4K + CABLE', '150.00', 2, 2, 2, 2, '2022-09-30'),
(13, '13', 'WIFI + BAÃ‘O + TV 4K + CABLE', '120.00', 2, 2, 2, 1, '2022-09-22'),
(14, '14', 'WIFI + BAÃ‘O + TV + CABLE', '85.00', 1, 3, 2, 1, '2022-09-22'),
(15, '15', 'WIFI + BAÃ‘O + TV + CABLE', '75.00', 1, 3, 3, 1, '2022-09-22'),
(16, '15', 'test nuevo', '150.00', 3, 2, 29, 1, '2022-09-30'),
(18, '12', 'cambiando el detalle de la hab', '150.00', 3, 1, 2, 1, '2022-10-01'),
(19, '13', 'es una nueva hab', '150.00', 1, 1, 2, 1, '2022-10-01');

-- --------------------------------------------------------

--
-- Table structure for table `persona`
--

DROP TABLE IF EXISTS `persona`;
CREATE TABLE IF NOT EXISTS `persona` (
  `IdPersona` int(11) NOT NULL AUTO_INCREMENT,
  `Documento` varchar(15) DEFAULT NULL,
  `Nombre` varchar(50) DEFAULT NULL,
  `Apellido` varchar(50) DEFAULT NULL,
  `Correo` varchar(50) DEFAULT NULL,
  `Clave` varchar(50) DEFAULT NULL,
  `IdTipoPersona` int(11) DEFAULT NULL,
  `IdEstado` tinyint(1) DEFAULT '1',
  `FechaCreacion` date DEFAULT NULL,
  `IdTipoDocumento` int(12) DEFAULT NULL,
  PRIMARY KEY (`IdPersona`),
  KEY `IdTipoPersona` (`IdTipoPersona`),
  KEY `IdEstado` (`IdEstado`),
  KEY `IdTipoDocumento` (`IdTipoDocumento`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `persona`
--

INSERT INTO `persona` (`IdPersona`, `Documento`, `Nombre`, `Apellido`, `Correo`, `Clave`, `IdTipoPersona`, `IdEstado`, `FechaCreacion`, `IdTipoDocumento`) VALUES
(18, '42777710', 'Davico', 'Rosado De la Cruz', 'drosado1901@gmail.com', '123', 1, 1, '2022-10-01', 2),
(19, '61465', 'Christian ', 'Curo', 'ccuro@gmail.com', '123', 1, 2, '2022-10-01', 2),
(20, '6164646', 'Paul', 'Orellana', 'porellana@gmail.com', NULL, 23, 1, '2022-10-01', 1),
(26, '6146514646', 'Remigio', 'Morales', 'remigio@yahoo.com', NULL, 23, 1, '2022-10-01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `piso`
--

DROP TABLE IF EXISTS `piso`;
CREATE TABLE IF NOT EXISTS `piso` (
  `IdPiso` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(50) DEFAULT NULL,
  `IdEstado` tinyint(1) DEFAULT '1',
  `FechaCreacion` date DEFAULT NULL,
  PRIMARY KEY (`IdPiso`),
  KEY `FK_estado` (`IdEstado`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `piso`
--

INSERT INTO `piso` (`IdPiso`, `Descripcion`, `IdEstado`, `FechaCreacion`) VALUES
(1, 'Primero', 2, '2022-09-22'),
(2, 'Segundo', 1, '2022-09-22'),
(3, 'Tercero', 1, '2022-09-22');

-- --------------------------------------------------------

--
-- Table structure for table `producto`
--

DROP TABLE IF EXISTS `producto`;
CREATE TABLE IF NOT EXISTS `producto` (
  `IdProducto` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) DEFAULT NULL,
  `Detalle` varchar(100) DEFAULT NULL,
  `Precio` decimal(10,2) DEFAULT NULL,
  `Cantidad` int(11) DEFAULT NULL,
  `IdEstado` tinyint(1) DEFAULT '1',
  `FechaCreacion` date DEFAULT NULL,
  PRIMARY KEY (`IdProducto`),
  KEY `FK_estado` (`IdEstado`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `producto`
--

INSERT INTO `producto` (`IdProducto`, `Nombre`, `Detalle`, `Precio`, `Cantidad`, `IdEstado`, `FechaCreacion`) VALUES
(1, 'GALLETAS DORAS', 'NINGUNA', '0.70', 50, 1, '2022-09-22'),
(2, 'REFRESCO POCMAS', '350 ML', '1.50', 80, 1, '2022-09-22'),
(3, 'CHOCOLATE DMX', '50 GRM', '0.80', 60, 1, '2022-09-22'),
(4, 'PAPAS DORADAS', '150 GRM', '2.60', 20, 1, '2022-09-22'),
(5, 'REFRESCO OXA', '300 ML', '2.00', 26, 1, '2022-09-22'),
(6, 'CIGARRILLOS DEM', '10 UNID', '3.50', 55, 1, '2022-09-22'),
(7, 'AGUA LIFE', '250 ML', '3.00', 45, 1, '2022-09-22'),
(8, 'GASEOSA ALMOADA', '350 ML', '4.50', 29, 1, '2022-09-22'),
(9, 'CEREALES PANDA', 'NIN', '2.70', 40, 1, '2022-09-22'),
(10, 'SHAMPOO GH xxx', '200 ML', '2.50', 20, 1, '2022-09-22'),
(12, 'Chocolate sublime', '50gr', '15.00', 50, 1, '2022-09-27');

-- --------------------------------------------------------

--
-- Table structure for table `recepcion`
--

DROP TABLE IF EXISTS `recepcion`;
CREATE TABLE IF NOT EXISTS `recepcion` (
  `IdRecepcion` int(11) NOT NULL,
  `IdCliente` int(11) DEFAULT NULL,
  `IdHabitacion` int(11) DEFAULT NULL,
  `FechaEntrada` datetime DEFAULT NULL,
  `FechaSalida` datetime(6) DEFAULT NULL,
  `FechaSalidaConfirmacion` datetime(6) DEFAULT NULL,
  `PrecioInicial` decimal(10,2) DEFAULT NULL,
  `Adelanto` decimal(10,2) DEFAULT NULL,
  `PrecioRestante` decimal(10,2) DEFAULT NULL,
  `TotalPagado` decimal(10,2) DEFAULT '0.00',
  `CostoPenalidad` decimal(10,2) DEFAULT '0.00',
  `Observacion` varchar(500) DEFAULT NULL,
  `IdEstadoRecepcion` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`IdRecepcion`),
  KEY `FK__RECEPCION__IdCli__4316F928` (`IdCliente`),
  KEY `FK__RECEPCION__IdHab__440B1D61` (`IdHabitacion`),
  KEY `IdEstado` (`IdEstadoRecepcion`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recepcion`
--

INSERT INTO `recepcion` (`IdRecepcion`, `IdCliente`, `IdHabitacion`, `FechaEntrada`, `FechaSalida`, `FechaSalidaConfirmacion`, `PrecioInicial`, `Adelanto`, `PrecioRestante`, `TotalPagado`, `CostoPenalidad`, `Observacion`, `IdEstadoRecepcion`) VALUES
(1, 8, 1, '2022-09-22 00:00:00', '2022-09-25 00:00:00.000000', '2022-09-22 16:09:04.793000', '280.00', '0.00', '280.00', '280.00', '0.00', '', 1),
(2, 7, 6, '2022-09-22 00:00:00', '2022-09-22 00:00:00.000000', '2022-09-22 16:15:12.383000', '80.00', '0.00', '80.00', '80.00', '0.00', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tipo_documento`
--

DROP TABLE IF EXISTS `tipo_documento`;
CREATE TABLE IF NOT EXISTS `tipo_documento` (
  `IdTipoDocumento` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(50) DEFAULT NULL,
  `IdEstado` int(11) NOT NULL,
  `FechaCreacion` date NOT NULL,
  PRIMARY KEY (`IdTipoDocumento`),
  KEY `FK_tipo_documento` (`IdEstado`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipo_documento`
--

INSERT INTO `tipo_documento` (`IdTipoDocumento`, `Descripcion`, `IdEstado`, `FechaCreacion`) VALUES
(1, 'DNI', 1, '2022-09-27'),
(2, 'Pasaporte', 1, '2022-09-26'),
(5, 'Carnet de extranjeria', 2, '2022-10-01'),
(7, 'tujrti', 1, '2022-10-01');

-- --------------------------------------------------------

--
-- Table structure for table `tipo_persona`
--

DROP TABLE IF EXISTS `tipo_persona`;
CREATE TABLE IF NOT EXISTS `tipo_persona` (
  `IdTipoPersona` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `IdEstado` tinyint(1) DEFAULT '1',
  `FechaCreacion` date DEFAULT NULL,
  PRIMARY KEY (`IdTipoPersona`),
  KEY `FK_Estado` (`IdEstado`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipo_persona`
--

INSERT INTO `tipo_persona` (`IdTipoPersona`, `Descripcion`, `IdEstado`, `FechaCreacion`) VALUES
(1, 'Administrador', 1, '2022-09-22'),
(2, 'Empleado', 2, '2022-09-22'),
(3, 'Cliente', 1, '2022-10-01');

-- --------------------------------------------------------

--
-- Table structure for table `venta`
--

DROP TABLE IF EXISTS `venta`;
CREATE TABLE IF NOT EXISTS `venta` (
  `IdVenta` int(11) NOT NULL AUTO_INCREMENT,
  `IdRecepcion` int(11) DEFAULT NULL,
  `Total` decimal(4,2) DEFAULT NULL,
  `IdEstadoVenta` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdVenta`),
  KEY `FK__VENTA__IdRecepci__49C3F6B7` (`IdRecepcion`),
  KEY `IdEstadoVenta` (`IdEstadoVenta`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `venta`
--

INSERT INTO `venta` (`IdVenta`, `IdRecepcion`, `Total`, `IdEstadoVenta`) VALUES
(1, 1, '13.00', 2),
(2, 1, '15.00', 1),
(3, 1, '50.00', 2),
(4, 1, '50.00', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
