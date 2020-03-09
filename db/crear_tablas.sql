-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 17-05-2019 a las 19:51:02
-- Versión del servidor: 5.6.41-84.1
-- Versión de PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `koiora_eurovision`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `esc_grupos`
--

CREATE TABLE `esc_grupos` (
  `ID` int(11) NOT NULL,
  `id_grupo` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_grupo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `creacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `esc_participantes`
--

CREATE TABLE `esc_participantes` (
  `id` int(2) NOT NULL,
  `pais` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `iso3` varchar(3) COLLATE utf8_spanish_ci NOT NULL,
  `artista` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `cancion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `video` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `esc_participantes`
--

INSERT INTO `esc_participantes` (`id`, `pais`, `iso3`, `artista`, `cancion`, `video`) VALUES
(1, 'Malta', 'MAL', 'Michela', 'Chameleon', 'https://youtube.com/watch?v=mRwLt9HCjbk'),
(2, 'Suecia', 'SWE', 'John Lundvik', 'Too Late For Love', 'https://youtube.com/watch?v=YKR2GiorZuQ');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `esc_grupos`
--
ALTER TABLE `esc_grupos`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `esc_participantes`
--
ALTER TABLE `esc_participantes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `esc_grupos`
--
ALTER TABLE `esc_grupos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
