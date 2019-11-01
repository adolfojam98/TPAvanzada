-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-11-2019 a las 04:41:08
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bddtp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mascota`
--

CREATE TABLE `mascota` (
  `id_mascota` int(11) NOT NULL,
  `nombre_mascota` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `foto_mascota` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `mascota`
--

INSERT INTO `mascota` (`id_mascota`, `nombre_mascota`, `foto_mascota`) VALUES
(19, 'patita', '../view/imagenes/fotoMascotas/41_patita.jpg'),
(20, 'negro1', '../view/imagenes/fotoMascotas/41_negro1.jpg'),
(22, 'gary', '../view/imagenes/fotoMascotas/42_gary.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `apellido` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `usuario` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `contrasenia` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fotoPerfil` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `apellido`, `usuario`, `contrasenia`, `fotoPerfil`) VALUES
(41, 'fcyt', 'uader', 'fcytuader', '3bccc90aa05755f993fe5db36e07c2f6', '../view/imagenes/user-default.png'),
(42, 'adolfo', 'martinez', 'adolfojam98', '10b6fcf55b9ec53ea7717aa5c11dfa39', '../view/imagenes/user-default.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_mascota`
--

CREATE TABLE `usuario_mascota` (
  `id_usuario` int(11) DEFAULT NULL,
  `id_mascota` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario_mascota`
--

INSERT INTO `usuario_mascota` (`id_usuario`, `id_mascota`) VALUES
(41, 19),
(41, 20),
(42, 22);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `mascota`
--
ALTER TABLE `mascota`
  ADD PRIMARY KEY (`id_mascota`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario_mascota`
--
ALTER TABLE `usuario_mascota`
  ADD KEY `id_mascota` (`id_mascota`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `mascota`
--
ALTER TABLE `mascota`
  MODIFY `id_mascota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuario_mascota`
--
ALTER TABLE `usuario_mascota`
  ADD CONSTRAINT `usuario_mascota_ibfk_1` FOREIGN KEY (`id_mascota`) REFERENCES `mascota` (`id_mascota`),
  ADD CONSTRAINT `usuario_mascota_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

/*Usuario*/
GRANT SELECT, INSERT, UPDATE, DELETE, FILE ON *.* TO 'fcyt'@'localhost' IDENTIFIED BY PASSWORD '*D00D40028D062E98232FDC7E9E380E1D5783D07F';

GRANT SELECT, INSERT, UPDATE, DELETE ON `bddtp`.* TO 'fcyt'@'localhost';