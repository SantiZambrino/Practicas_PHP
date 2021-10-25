-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-10-2021 a las 14:43:28
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
-- Estructura de tabla para la tabla `lista_usuario`
--

CREATE TABLE `lista_usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellidos` varchar(30) NOT NULL,
  `dni` varchar(9) NOT NULL,
  `telefono` int(9) NOT NULL,
  `email` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `lista_usuario`
--

INSERT INTO `lista_usuario` (`id_usuario`, `nombre`, `apellidos`, `dni`, `telefono`, `email`) VALUES
(1, 'juan', 'navarro', '12345678a', 123456789, 'juan@gmail.com'),
(2, 'santi', 'zambrino', '87654321a', 987654321, 'santi@gmail.com'),
(16, 'juanfran', 'montero', '12345678j', 695945152, 'juanfran@gmail.com'),
(19, 'Prueba', 'Prueba Prueba', '99999999p', 695945152, 'prueba@prueba.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `lista_usuario`
--
ALTER TABLE `lista_usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `lista_usuario`
--
ALTER TABLE `lista_usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
