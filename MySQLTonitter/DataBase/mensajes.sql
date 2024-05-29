-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-05-2024 a las 01:06:52
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `test`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL DEFAULT current_timestamp(),
  `idUser` int(11) NOT NULL,
  `titulo` varchar(30) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `imagenURL` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`id`, `fecha`, `idUser`, `titulo`, `descripcion`, `imagenURL`) VALUES
(1, '2024-05-29', 7, 'Alquilo apartamento en Olivell', 'Vecinos de Olivella Informació', '.\\imgComentarios\\Gato en Belen.jpg'),
(2, '2024-05-29', 7, 'Alquilo apartamento en Olivell', 'Vecinos de Olivella Informació', '.\\imgComentarios\\GatoenBelen.jpg'),
(4, '2024-05-29', 7, 'Alquilo apartamento en Olivell', 'Vecinos de Olivella Informació', '.\\imgComentarios\\GatoenBelen.jpg'),
(5, '2024-05-29', 6, 'Taylor Switf en Barcelona!!', 'Vecinos de Olivella Informació', '.\\imgComentarios\\foto3.jpg'),
(6, '2024-05-29', 9, 'Cine de Sant Pere de Ribes', 'No os perdais la Peli que hace', '.\\imgComentarios\\foto4.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUser` (`idUser`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD CONSTRAINT `mensajes_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `personas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
