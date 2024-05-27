-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-05-2024 a las 23:27:45
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
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `id` int(11) NOT NULL,
  `dni` varchar(9) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `apellido` varchar(100) DEFAULT NULL,
  `fechaNacimiento` date DEFAULT NULL,
  `telefono` varchar(100) DEFAULT NULL,
  `codigoPostal` varchar(5) DEFAULT NULL,
  `idEmpresa` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `username` varchar(8) DEFAULT NULL,
  `password` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id`, `dni`, `nombre`, `apellido`, `fechaNacimiento`, `telefono`, `codigoPostal`, `idEmpresa`, `email`, `username`, `password`) VALUES
(1, '33247568Z', 'Toni', 'Oller', NULL, '678234567', '', 1, 'toni.oller@upc.edu', 'toniFoap', 'toniFoap'),
(4, '98954545H', 'Juan', 'Lopez', NULL, '123456789', '', 1, 'juan.lopez@upc.edu', 'juanFoap', 'juanFoap'),
(5, '32456778Z', 'Ikram', 'Baghiel', NULL, '321654987', '', 2, 'ikram.baghiel@upc.edu', 'ikranFoa', 'ikramFoa'),
(6, '3246333Z', 'Isabel', 'Navarrina', NULL, '60085763', '', 0, 'isabel.navarrina@gmail.com', 'beluFoap', 'beluFoap'),
(7, '33246334H', 'Isabel', 'Navarrina Martínez', '1961-07-08', '600857253', '01118', 1, 'beluca.navarrina@gmail.com', 'inavarri', ''),
(9, '38045230X', 'Jesus', 'Consuegra', '1985-05-08', '600857253', '00085', 1, 'jesus@gmail.com', 'jesusC', ''),
(12, '33246333B', 'Luisa', 'Martínez', '1970-12-29', '600857253', '00085', 1, 'luisa@gmail.com', 'luisaNM', 'luisaA_');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dni` (`dni`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
