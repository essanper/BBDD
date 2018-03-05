-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-05-2017 a las 01:06:14
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `proyectofinal`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuenta`
--

CREATE TABLE IF NOT EXISTS `cuenta` (
  `NombreCuenta` varchar(20) NOT NULL,
  `PassCuenta` varchar(10) NOT NULL,
  `NombrePersonaje` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cuenta`
--

INSERT INTO `cuenta` (`NombreCuenta`, `PassCuenta`, `NombrePersonaje`) VALUES
('Dattate', '1qa2ws', 'eltop1'),
('Julio12', 'ijnuhb1', 'ErMoreno6'),
('Kokoro', '0pñ9ol', 'MenosMal'),
('MasimuDuti', '3ed4rf', 'Insinuoso'),
('MuseodelPrado', 'ijnuhb1', 'Papasito'),
('Olimpo1', 'qwerty123', 'erChico'),
('Shenuti', 'qwe789', 'Insuperabl'),
('Tambor', '123zxc', 'Aiuda'),
('Tertuliano', '95162a', 'Monaco'),
('Yukiteru', 'asd456', 'Rompedor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encuentran`
--

CREATE TABLE IF NOT EXISTS `encuentran` (
  `IDMazmorra` varchar(5) NOT NULL DEFAULT '',
  `NombreMonstruo` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `encuentran`
--

INSERT INTO `encuentran` (`IDMazmorra`, `NombreMonstruo`) VALUES
('852', 'Bruja Deprimida'),
('MF5', 'Cuerpo Escombro'),
('09I', 'Leproso'),
('789', 'Lider Cazarecompensa'),
('KD2', 'Lider Orco Deprimido'),
('LA1', 'Montaraz'),
('MH5', 'Orco Deprimido'),
('MJ7', 'Perdino'),
('MO0', 'Reina Bruja Deprimida'),
('PO2', 'Yunque');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `IDItems` varchar(5) NOT NULL,
  `Nivelitem` int(3) NOT NULL,
  `NombreItem` varchar(25) NOT NULL,
  `TipoItem` enum('Armadura','Arma') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `items`
--

INSERT INTO `items` (`IDItems`, `Nivelitem`, `NombreItem`, `TipoItem`) VALUES
('123', 9, 'Túnica de Nirgano', 'Armadura'),
('456', 1, 'Zapatos de Mercurio', 'Armadura'),
('87U', 70, 'Espada de Hades', 'Arma'),
('HB2', 10, 'Escudo de Espartaco', 'Armadura'),
('HO2', 22, 'Casco Elegante', 'Armadura'),
('JI1', 50, 'Espada Venenosa', 'Arma'),
('TR3', 6, 'Arco de Cupido', 'Arma'),
('TR4', 2, 'Pechera Poderosa', 'Armadura'),
('UI1', 67, 'Lanza de Fuego', 'Arma'),
('YU8', 5, 'Martillo de Thor', 'Arma');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mazmorra`
--

CREATE TABLE IF NOT EXISTS `mazmorra` (
  `nivelMazmorra` int(3) NOT NULL,
  `IDMazmorra` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mazmorra`
--

INSERT INTO `mazmorra` (`nivelMazmorra`, `IDMazmorra`) VALUES
(9, '09I'),
(5, '789'),
(4, '852'),
(3, 'KD2'),
(6, 'LA1'),
(1, 'MF5'),
(7, 'MH5'),
(2, 'MJ7'),
(8, 'MO0'),
(10, 'PO2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `monstruos`
--

CREATE TABLE IF NOT EXISTS `monstruos` (
  `NombreMonstruo` varchar(50) NOT NULL,
  `NivelMonstruo` int(3) NOT NULL,
  `PuntosMonstruo` int(5) NOT NULL,
  `JefeMonstruo` varchar(50) DEFAULT NULL,
  `EsJefe` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `monstruos`
--

INSERT INTO `monstruos` (`NombreMonstruo`, `NivelMonstruo`, `PuntosMonstruo`, `JefeMonstruo`, `EsJefe`) VALUES
('Bruja Deprimida', 69, 69, 'Reina Bruja Deprimida', 'No'),
('Cuerpo Escombro', 20, 20, NULL, 'No'),
('Leproso', 98, 98, NULL, 'No'),
('Lider Cazarecompensa', 121, 1200, NULL, 'Si'),
('Lider Orco Deprimido', 2, 4, NULL, 'Si'),
('Montaraz', 1, 1, NULL, 'No'),
('Orco Deprimido', 2, 2, 'Lider Orco Deprimido', 'No'),
('Perdino', 4, 4, NULL, 'No'),
('Reina Bruja Deprimida', 69, 120, NULL, 'Si'),
('Yunque', 3, 3, NULL, 'No');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personajes`
--

CREATE TABLE IF NOT EXISTS `personajes` (
  `NombrePersonaje` varchar(10) NOT NULL,
  `NivelPersonaje` varchar(3) NOT NULL DEFAULT '1',
  `PuntosPersonaje` int(20) NOT NULL,
  `IDMazmorra` varchar(5) DEFAULT NULL,
  `IDItems` varchar(5) DEFAULT NULL,
  `FechaPuntuacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `personajes`
--

INSERT INTO `personajes` (`NombrePersonaje`, `NivelPersonaje`, `PuntosPersonaje`, `IDMazmorra`, `IDItems`, `FechaPuntuacion`) VALUES
('Aiuda', '54', 5424, 'LA1', 'TR3', '2017-05-11 02:31:04'),
('eltop1', '20', 2192, '852', '456', '2017-05-11 02:31:04'),
('erChico', '82', 8989, 'MF5', 'JI1', '2017-05-11 02:31:04'),
('ErMoreno6', '33', 3891, 'PO2', '123', '2017-05-11 02:31:04'),
('Insinuoso', '45', 4209, 'KD2', 'UI1', '2017-05-11 02:31:04'),
('Insuperabl', '104', 10424, 'MO0', 'HO2', '2017-05-11 02:31:04'),
('MenosMal', '12', 2312, '789', 'YU8', '2017-05-11 02:31:04'),
('Monaco', '50', 5078, '09I', '87U', '2017-05-11 02:31:04'),
('Papasito', '1', 20, 'MJ7', 'TR4', '2017-05-11 02:31:04'),
('Rompedor', '74', 7457, 'MH5', 'HB2', '2017-05-11 02:31:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiran`
--

CREATE TABLE IF NOT EXISTS `tiran` (
  `IDItems` varchar(5) NOT NULL DEFAULT '',
  `NombreMonstruo` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tiran`
--

INSERT INTO `tiran` (`IDItems`, `NombreMonstruo`) VALUES
('UI1', 'Lider Cazarecompensa'),
('456', 'Lider Orco Deprimido'),
('87U', 'Reina Bruja Deprimida');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cuenta`
--
ALTER TABLE `cuenta`
 ADD PRIMARY KEY (`NombreCuenta`), ADD KEY `fk1_Cuenta` (`NombrePersonaje`);

--
-- Indices de la tabla `encuentran`
--
ALTER TABLE `encuentran`
 ADD PRIMARY KEY (`IDMazmorra`,`NombreMonstruo`), ADD KEY `fk2_ENCUENTRAN` (`NombreMonstruo`);

--
-- Indices de la tabla `items`
--
ALTER TABLE `items`
 ADD PRIMARY KEY (`IDItems`);

--
-- Indices de la tabla `mazmorra`
--
ALTER TABLE `mazmorra`
 ADD PRIMARY KEY (`IDMazmorra`);

--
-- Indices de la tabla `monstruos`
--
ALTER TABLE `monstruos`
 ADD PRIMARY KEY (`NombreMonstruo`), ADD KEY `fk_reflexiva` (`JefeMonstruo`);

--
-- Indices de la tabla `personajes`
--
ALTER TABLE `personajes`
 ADD PRIMARY KEY (`NombrePersonaje`), ADD KEY `fk1_Personajes` (`IDMazmorra`), ADD KEY `fk2_Personajes` (`IDItems`);

--
-- Indices de la tabla `tiran`
--
ALTER TABLE `tiran`
 ADD PRIMARY KEY (`IDItems`,`NombreMonstruo`), ADD KEY `fk2_ENCUENTRAN` (`NombreMonstruo`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cuenta`
--
ALTER TABLE `cuenta`
ADD CONSTRAINT `cuenta_ibfk_1` FOREIGN KEY (`NombrePersonaje`) REFERENCES `personajes` (`NombrePersonaje`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `encuentran`
--
ALTER TABLE `encuentran`
ADD CONSTRAINT `encuentran_ibfk_1` FOREIGN KEY (`IDMazmorra`) REFERENCES `mazmorra` (`IDMazmorra`),
ADD CONSTRAINT `encuentran_ibfk_2` FOREIGN KEY (`NombreMonstruo`) REFERENCES `monstruos` (`NombreMonstruo`);

--
-- Filtros para la tabla `monstruos`
--
ALTER TABLE `monstruos`
ADD CONSTRAINT `monstruos_ibfk_1` FOREIGN KEY (`JefeMonstruo`) REFERENCES `monstruos` (`NombreMonstruo`);

--
-- Filtros para la tabla `personajes`
--
ALTER TABLE `personajes`
ADD CONSTRAINT `personajes_ibfk_1` FOREIGN KEY (`IDMazmorra`) REFERENCES `mazmorra` (`IDMazmorra`),
ADD CONSTRAINT `personajes_ibfk_2` FOREIGN KEY (`IDItems`) REFERENCES `items` (`IDItems`);

--
-- Filtros para la tabla `tiran`
--
ALTER TABLE `tiran`
ADD CONSTRAINT `tiran_ibfk_1` FOREIGN KEY (`IDItems`) REFERENCES `items` (`IDItems`),
ADD CONSTRAINT `tiran_ibfk_2` FOREIGN KEY (`NombreMonstruo`) REFERENCES `monstruos` (`NombreMonstruo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
