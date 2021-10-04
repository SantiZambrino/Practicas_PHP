-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-10-2021 a las 10:43:03
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
  `id_matricula` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `lista_servicios`
--

INSERT INTO `lista_servicios` (`id_servicio`, `tipo_servicio`, `id_matricula`) VALUES
(3, 'Cambio Aceite', NULL),
(4, 'Cambio Ruedas', NULL),
(5, 'Pre-ITV', NULL),
(6, 'Alineación Neumáticos', NULL);

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
  `id_matricula` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `lista_usuario`
--

INSERT INTO `lista_usuario` (`id_usuario`, `nombre`, `apellidos`, `dni`, `telefono`, `email`, `id_matricula`) VALUES
(1, 'Juan', 'Navarro', '12345678X', 123456789, 'asdasd@gmail.com', NULL),
(2, 'Juan', 'Navarro', '12345678X', 123456789, 'asdasd@gmail.com', NULL),
(3, 'Juanfran', 'Montero', '12345678F', 123456789, 'asddfg@gmail.com', NULL),
(4, 'Santi', 'Zambrino', '1234567T', 123456789, 'asdwer@gmail.com', NULL);

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
  `id_servicio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `lista_vehiculos`
--

INSERT INTO `lista_vehiculos` (`id_matricula`, `matricula`, `marca`, `modelo`, `año`, `id_servicio`) VALUES
(1, '1234asd', 'Ford', 'Mondeo', '0000-00-00', NULL),
(2, '3456F', 'Renault', 'Clio', '0000-00-00', NULL),
(3, '1234asd', 'Ford', 'Mondeo', '2012-10-02', NULL),
(4, '3456F', 'Renault', 'Clio', '2015-10-15', NULL),
(5, '1735tgb', 'Land Rover', 'Sport', '2021-09-07', NULL),
(6, '8264gbg', 'Mercedes', 'Clase A', '2021-09-14', NULL),
(7, '1735tgb', 'Land Rover', 'Sport', '2021-09-07', NULL),
(8, '8264gbg', 'Mercedes', 'Clase A', '2021-09-14', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `lista_servicios`
--
ALTER TABLE `lista_servicios`
  ADD PRIMARY KEY (`id_servicio`),
  ADD KEY `fk_matricula_servicios` (`id_matricula`);

--
-- Indices de la tabla `lista_usuario`
--
ALTER TABLE `lista_usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_matricula` (`id_matricula`);

--
-- Indices de la tabla `lista_vehiculos`
--
ALTER TABLE `lista_vehiculos`
  ADD PRIMARY KEY (`id_matricula`),
  ADD KEY `id_servicio` (`id_servicio`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `lista_servicios`
--
ALTER TABLE `lista_servicios`
  MODIFY `id_servicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `lista_usuario`
--
ALTER TABLE `lista_usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `lista_vehiculos`
--
ALTER TABLE `lista_vehiculos`
  MODIFY `id_matricula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `lista_servicios`
--
ALTER TABLE `lista_servicios`
  ADD CONSTRAINT `fk_matricula_servicios` FOREIGN KEY (`id_matricula`) REFERENCES `lista_vehiculos` (`id_matricula`);

--
-- Filtros para la tabla `lista_usuario`
--
ALTER TABLE `lista_usuario`
  ADD CONSTRAINT `lista_usuario_ibfk_1` FOREIGN KEY (`id_matricula`) REFERENCES `lista_vehiculos` (`id_matricula`);

--
-- Filtros para la tabla `lista_vehiculos`
--
ALTER TABLE `lista_vehiculos`
  ADD CONSTRAINT `lista_vehiculos_ibfk_1` FOREIGN KEY (`id_servicio`) REFERENCES `lista_servicios` (`id_servicio`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
