-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-10-2021 a las 09:53:05
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
  `descripcion` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `lista_servicios`
--

INSERT INTO `lista_servicios` (`id_servicio`, `tipo_servicio`, `descripcion`) VALUES
(3, 'Cambio Aceite', NULL),
(4, 'Cambio Ruedas', NULL),
(5, 'Pre-ITV', NULL),
(6, 'Alineación Neumáticos', NULL),
(7, 'Cambio Aceite', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `lista_servicios`
--
ALTER TABLE `lista_servicios`
  ADD PRIMARY KEY (`id_servicio`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `lista_servicios`
--
ALTER TABLE `lista_servicios`
  MODIFY `id_servicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
