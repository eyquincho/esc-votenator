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
  `artista` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `cancion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `video` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `esc_participantes`
--

INSERT INTO `esc_participantes` (`id`, `pais`, `artista`, `cancion`, `video`) VALUES
(1, 'Malta', 'Michela', 'Chameleon', 'https://youtube.com/watch?v=mRwLt9HCjbk'),
(9, 'Suecia', 'John Lundvik', 'Too Late For Love', 'https://youtube.com/watch?v=YKR2GiorZuQ'),
(8, 'Macedonia del Norte', 'Tamara Todevska', 'Proud', 'https://youtube.com/watch?v=3A65lXLNZfk'),
(7, 'San Marino', 'Serhat', 'Say Na Na Na', 'https://youtube.com/watch?v=_BWHL5I-E-A'),
(6, 'Dinamarca', 'Leonora', 'Love is Forever', 'https://youtube.com/watch?v=HVvAzwiV0hw'),
(4, 'Alemania', 'S!sters', 'Sister', 'https://youtube.com/watch?v=xEZwgjP9HPw'),
(3, 'Republica Checa', 'Lake Malawi', 'Friend of a friend', 'https://www.youtube.com/watch?v=8-HR-L4QY0g'),
(2, 'Albania', 'Jonida Maliqi', 'Ktheju tolkës', 'https://youtube.com/watch?v=OQFbA7yfzjo'),
(5, 'Rusia', 'Sergey Lazarev', 'Scream', 'https://youtube.com/watch?v=wCKHUldGcEI'),
(10, 'Eslovenia', 'Zala Kralj & Gasper Santi', 'Sebi', 'https://youtube.com/watch?v=wnA0doOsGDY'),
(11, 'Chipre', 'Tamta', 'Replay', 'https://youtube.com/watch?v=3jCAyvVJVFw'),
(12, 'Paises Bajos', 'Duncan Laurence', 'Arcade', 'https://youtube.com/watch?v=0F_FrLDpt30'),
(13, 'Grecia', 'Katerine Duska', 'Better Love', 'https://youtube.com/watch?v=gPHOFq4hoIU'),
(14, 'Israel', 'Kobi Marimi', 'Home', 'https://youtube.com/watch?v=wEZRK8KIkKc'),
(15, 'Noruega', 'KEiiNO', 'Spirit in the Sky', 'https://youtube.com/watch?v=yKoEt0-9ujA'),
(16, 'Reino Unido', 'Michael RIce', 'Bigger Than Us', 'https://youtube.com/watch?v=dDFFMdnNgYg'),
(17, 'Islandia', 'Hatari', 'Hatrio mun sigra', 'https://youtube.com/watch?v=U1HNhA-7OEU'),
(18, 'Estonia', 'Victor Crone', 'Storm', 'https://youtube.com/watch?v=1-7NFt8EAe0'),
(19, 'Bielorrusia', 'ZENA', 'Like it', 'https://youtube.com/watch?v=6IxL8uvArVg'),
(20, 'Azerbaiyan', 'Chingiz', 'Truth', 'https://youtube.com/watch?v=DJFtbYsn6eY'),
(21, 'Francia', 'Bilal Hassani', 'Roi', 'https://youtube.com/watch?v=nvKyGQ8fzuY'),
(22, 'Italia', 'Mahmood', 'Soldi', 'https://youtube.com/watch?v=Va-JXIhsYD0'),
(23, 'Serbia', 'Nevena Bozovic', 'Kruna', 'https://youtube.com/watch?v=_ZlGaTtWCWI'),
(24, 'Suiza', 'Luca Hanni', 'She got me', 'https://youtube.com/watch?v=zEGgKQf1cws'),
(25, 'Australia', 'Kate Miller-Keidke', 'Zero Gravity', 'https://youtube.com/watch?v=m3WF2AsxLB8'),
(26, 'España', 'Miki', 'La venda', 'https://youtube.com/watch?v=vMBRFLBRStA');

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
