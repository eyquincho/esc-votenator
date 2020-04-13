-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-04-2020 a las 18:56:41
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ESC`
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
(2, 'Suecia', 'SWE', 'John Lundvik', 'Too Late For Love', 'https://youtube.com/watch?v=YKR2GiorZuQ'),
(3, 'Malta', 'MAL', 'Michela', 'Chameleon', 'https://youtube.com/watch?v=mRwLt9HCjbk'),
(4, 'Suecia', 'SWE', 'John Lundvik', 'Too Late For Love', 'https://youtube.com/watch?v=YKR2GiorZuQ'),
(5, 'Malta', 'MAL', 'Michela', 'Chameleon', 'https://youtube.com/watch?v=mRwLt9HCjbk'),
(6, 'Suecia', 'SWE', 'John Lundvik', 'Too Late For Love', 'https://youtube.com/watch?v=YKR2GiorZuQ'),
(7, 'Malta', 'MAL', 'Michela', 'Chameleon', 'https://youtube.com/watch?v=mRwLt9HCjbk'),
(8, 'Suecia', 'SWE', 'John Lundvik', 'Too Late For Love', 'https://youtube.com/watch?v=YKR2GiorZuQ'),
(9, 'Malta', 'MAL', 'Michela', 'Chameleon', 'https://youtube.com/watch?v=mRwLt9HCjbk'),
(10, 'Suecia', 'SWE', 'John Lundvik', 'Too Late For Love', 'https://youtube.com/watch?v=YKR2GiorZuQ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `esc_puntuaciones`
--

CREATE TABLE `esc_puntuaciones` (
  `id` int(6) UNSIGNED NOT NULL,
  `juez` varchar(30) NOT NULL,
  `grupo` varchar(30) NOT NULL,
  `1` int(2) NOT NULL DEFAULT '0',
  `2` int(2) NOT NULL DEFAULT '0',
  `3` int(2) NOT NULL DEFAULT '0',
  `4` int(2) NOT NULL DEFAULT '0',
  `5` int(2) NOT NULL DEFAULT '0',
  `6` int(2) NOT NULL DEFAULT '0',
  `7` int(2) NOT NULL DEFAULT '0',
  `8` int(2) NOT NULL DEFAULT '0',
  `9` int(2) NOT NULL DEFAULT '0',
  `10` int(2) NOT NULL DEFAULT '0',
  `11` int(2) NOT NULL DEFAULT '0',
  `12` int(2) NOT NULL DEFAULT '0',
  `13` int(2) NOT NULL DEFAULT '0',
  `14` int(2) NOT NULL DEFAULT '0',
  `15` int(2) NOT NULL DEFAULT '0',
  `16` int(2) NOT NULL DEFAULT '0',
  `17` int(2) NOT NULL DEFAULT '0',
  `18` int(2) NOT NULL DEFAULT '0',
  `19` int(2) NOT NULL DEFAULT '0',
  `20` int(2) NOT NULL DEFAULT '0',
  `21` int(2) NOT NULL DEFAULT '0',
  `22` int(2) NOT NULL DEFAULT '0',
  `23` int(2) NOT NULL DEFAULT '0',
  `24` int(2) NOT NULL DEFAULT '0',
  `25` int(2) NOT NULL DEFAULT '0',
  `26` int(2) NOT NULL DEFAULT '0',
  `27` int(2) NOT NULL DEFAULT '0',
  `28` int(2) NOT NULL DEFAULT '0',
  `29` int(2) NOT NULL DEFAULT '0',
  `30` int(2) NOT NULL DEFAULT '0',
  `31` int(2) NOT NULL DEFAULT '0',
  `32` int(2) NOT NULL DEFAULT '0',
  `33` int(2) NOT NULL DEFAULT '0',
  `34` int(2) NOT NULL DEFAULT '0',
  `35` int(2) NOT NULL DEFAULT '0',
  `36` int(2) NOT NULL DEFAULT '0',
  `37` int(2) NOT NULL DEFAULT '0',
  `38` int(2) NOT NULL DEFAULT '0',
  `39` int(2) NOT NULL DEFAULT '0',
  `40` int(2) NOT NULL DEFAULT '0',
  `41` int(2) NOT NULL DEFAULT '0',
  `42` int(2) NOT NULL DEFAULT '0',
  `43` int(2) NOT NULL DEFAULT '0',
  `44` int(2) NOT NULL DEFAULT '0',
  `45` int(2) NOT NULL DEFAULT '0',
  `46` int(2) NOT NULL DEFAULT '0',
  `47` int(2) NOT NULL DEFAULT '0',
  `48` int(2) NOT NULL DEFAULT '0',
  `49` int(2) NOT NULL DEFAULT '0',
  `50` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Indices de la tabla `esc_puntuaciones`
--
ALTER TABLE `esc_puntuaciones`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `esc_grupos`
--
ALTER TABLE `esc_grupos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT de la tabla `esc_puntuaciones`
--
ALTER TABLE `esc_puntuaciones`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
