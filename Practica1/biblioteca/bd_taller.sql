-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-11-2021 a las 13:15:06
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_taller`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista_servicios`
--

CREATE TABLE `lista_servicios` (
  `id_servicio` int(11) NOT NULL,
  `tipo_servicio` varchar(30) NOT NULL,
  `descripcion` varchar(250) DEFAULT NULL,
  `id_matricula` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `lista_servicios`
--

INSERT INTO `lista_servicios` (`id_servicio`, `tipo_servicio`, `descripcion`, `id_matricula`) VALUES
(14, 'Cambio de Ruedas', 'Se le han cambiado las ruedas.', 31),
(17, 'Frenos Liquido', 'funciona', 2),
(18, 'cambio de discos de frenado', 'sustitucion de discos de freno', 3),
(19, 'Cambio Energia', 'Se le han cambiado los paneles solares.', 32),
(23, 'Cambio de filtros', 'sustitución de filtros del vehículo.', 32);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista_usuario`
--

CREATE TABLE `lista_usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellidos` varchar(30) NOT NULL,
  `dni` varchar(9) NOT NULL,
  `telefono` int(9) NOT NULL,
  `email` varchar(40) NOT NULL,
  `contrasena` varchar(50) DEFAULT NULL,
  `id_admin` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `lista_usuario`
--

INSERT INTO `lista_usuario` (`id_usuario`, `nombre`, `apellidos`, `dni`, `telefono`, `email`, `contrasena`, `id_admin`) VALUES
(1, 'juan', 'navarro', '12345678a', 123456789, 'juan@gmail.com', 'a94652aa97c7211ba8954dd15a3cf838', 1),
(2, 'santi', 'zambrino', '12345678s', 987654321, 'santi@gmail.com', 'ae1d4b431ead52e5ee1788010e8ec110', 1),
(16, 'juanfran', 'montero', '12345678j', 695945152, 'juanfran@gmail.com', '9c2f8920e876deb1ffe2555bce37efc8', 2),
(34, 'Prueba', 'Prueba Prueba', '12345678p', 12345678, 'prueba@prueba.com', 'c893bad68927b457dbed39460e6afd62', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista_vehiculos`
--

CREATE TABLE `lista_vehiculos` (
  `id_matricula` int(11) NOT NULL,
  `matricula` varchar(10) NOT NULL,
  `marca` varchar(20) NOT NULL,
  `modelo` varchar(20) NOT NULL,
  `año` date NOT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `lista_vehiculos`
--

INSERT INTO `lista_vehiculos` (`id_matricula`, `matricula`, `marca`, `modelo`, `año`, `id_usuario`) VALUES
(1, '1234ukh', 'Peugot', '306', '2021-09-14', 2),
(2, '3456fwd', 'Renault', 'Clio', '2014-10-14', 2),
(3, '1234asd', 'Ford', 'Mondeo', '2012-10-02', 1),
(31, '9999ppp', 'BMW', 'Serie 3', '2021-10-04', 16),
(32, '2222ppp', 'Tesla', 'Models X', '2021-10-04', 16),
(41, '1234DLR', 'Renault', 'Twingo', '1999-02-10', 16);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `lista_servicios`
--
ALTER TABLE `lista_servicios`
  ADD PRIMARY KEY (`id_servicio`),
  ADD KEY `id_matricula` (`id_matricula`);

--
-- Indices de la tabla `lista_usuario`
--
ALTER TABLE `lista_usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `lista_vehiculos`
--
ALTER TABLE `lista_vehiculos`
  ADD PRIMARY KEY (`id_matricula`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `lista_servicios`
--
ALTER TABLE `lista_servicios`
  MODIFY `id_servicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `lista_usuario`
--
ALTER TABLE `lista_usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `lista_vehiculos`
--
ALTER TABLE `lista_vehiculos`
  MODIFY `id_matricula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `lista_servicios`
--
ALTER TABLE `lista_servicios`
  ADD CONSTRAINT `lista_servicios_ibfk_1` FOREIGN KEY (`id_matricula`) REFERENCES `lista_vehiculos` (`id_matricula`);

--
-- Filtros para la tabla `lista_vehiculos`
--
ALTER TABLE `lista_vehiculos`
  ADD CONSTRAINT `lista_vehiculos_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `lista_usuario` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
