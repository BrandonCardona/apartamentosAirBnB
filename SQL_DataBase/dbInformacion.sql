-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-05-2023 a las 03:19:11
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbinformacion`
--
CREATE DATABASE IF NOT EXISTS `dbinformacion` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `dbinformacion`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apartamento`
--
-- Creación: 14-05-2023 a las 00:36:00
--

CREATE TABLE `apartamento` (
  `id_apartamento` int(11) NOT NULL,
  `alias` varchar(50) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `cantidadCamas` int(11) NOT NULL,
  `capacidad` int(11) NOT NULL,
  `precioDia` double NOT NULL,
  `cantDiasAlquilado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `apartamento`
--

INSERT INTO `apartamento` (`id_apartamento`, `alias`, `direccion`, `cantidadCamas`, `capacidad`, `precioDia`, `cantDiasAlquilado`) VALUES
(1, 'Chucuni', 'El sur', 2, 4, 15000, 5),
(6, 'La estacion', 'Salado', 3, 6, 8000, 15),
(9, 'VIP', 'Terraza', 4, 6, 100000, 35),
(20, 'La casa blanca', 'Ibague', 2, 4, 3000, 28),
(21, 'Apartacho', 'Ricaurte', 3, 6, 1000, 19);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--
-- Creación: 14-05-2023 a las 00:36:00
-- Última actualización: 15-05-2023 a las 01:18:39
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `numeroDocumento` varchar(50) NOT NULL,
  `ciudadOrigen` varchar(50) NOT NULL,
  `numAcompaniantes` int(11) NOT NULL,
  `cantDiasAlquilado` int(11) NOT NULL,
  `fechaInicial` date DEFAULT NULL,
  `fechaFinal` date DEFAULT NULL,
  `idApartamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `nombre`, `numeroDocumento`, `ciudadOrigen`, `numAcompaniantes`, `cantDiasAlquilado`, `fechaInicial`, `fechaFinal`, `idApartamento`) VALUES
(1, 'Brandon', '1111', 'Medellin ', 4, 8, '2023-05-03', '2023-05-11', 20),
(2, 'Tino', '11001', 'Choco', 2, 20, '2023-05-01', '2023-05-21', 9),
(3, 'Fabian', '1111', 'Ibagueto', 1, 15, '2023-05-01', '2023-05-16', 9),
(25, 'Hammer', '111011', 'Bogota', 2, 15, '2023-05-01', '2023-05-16', 6),
(26, 'Juan', '1101111', 'Medellin', 1, 12, '2023-05-01', '2023-05-13', 20),
(30, 'Mario', '10111011', 'Madrid', 4, 5, '2023-05-01', '2023-05-06', 1),
(31, 'Jose', '110111', 'Ibague', 1, 8, '2023-05-01', '2023-05-09', 20),
(87, 'Steven', '12', '1212', 1212, 16, '2023-05-01', '2023-05-17', 21),
(88, 'Luigi', '2323', '23232', 2323, 3, '2023-05-20', '2023-05-23', 21);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `apartamento`
--
ALTER TABLE `apartamento`
  ADD PRIMARY KEY (`id_apartamento`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idApartamento` (`idApartamento`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `apartamento`
--
ALTER TABLE `apartamento`
  MODIFY `id_apartamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`idApartamento`) REFERENCES `apartamento` (`id_apartamento`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
