-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 28-01-2019 a las 22:12:48
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `PA_proyecto_final`
--
CREATE DATABASE IF NOT EXISTS `PA_proyecto_final` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;
USE `PA_proyecto_final`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`usuario_id`) VALUES
(1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`usuario_id`) VALUES
(2),
(3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foro`
--

CREATE TABLE `foro` (
  `id` int(11) NOT NULL,
  `titulo` varchar(60) COLLATE utf8_spanish2_ci NOT NULL,
  `etiqueta` varchar(60) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `foro`
--

INSERT INTO `foro` (`id`, `titulo`, `etiqueta`) VALUES
(1, 'foro principal', 'varios'),
(2, 'titulo nuevo', 'nueva etiqueta'),
(3, 'foro3', 'nueva etiqueta'),
(4, 'foro4', 'nueva etiqueta'),
(5, 'foro5', 'nueva etiqueta'),
(6, 'foro6', 'nueva etiqueta'),
(7, 'foro7', 'nueva etiqueta'),
(8, 'foro8', 'nueva etiqueta'),
(9, 'foro9', 'nueva etiqueta'),
(10, 'foro10', 'nueva etiqueta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gestionesForos`
--

CREATE TABLE `gestionesForos` (
  `usuario_id` int(11) NOT NULL,
  `foro_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `gestionesForos`
--

INSERT INTO `gestionesForos` (`usuario_id`, `foro_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensaje`
--

CREATE TABLE `mensaje` (
  `id` int(11) NOT NULL,
  `foro_id` int(11) NOT NULL,
  `autor_id` int(11) NOT NULL,
  `mensaje` varchar(250) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `mensaje`
--

INSERT INTO `mensaje` (`id`, `foro_id`, `autor_id`, `mensaje`) VALUES
(3, 1, 3, '¿hola que tal estáis?'),
(4, 1, 3, 'mensaje que se añade');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promocion`
--

CREATE TABLE `promocion` (
  `id` int(11) NOT NULL,
  `creador_id` int(11) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `titulo` varchar(21) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` varchar(1000) COLLATE utf8_spanish2_ci NOT NULL,
  `descuento` int(11) NOT NULL,
  `foto` varchar(500) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `promocion`
--

INSERT INTO `promocion` (`id`, `creador_id`, `fecha_inicio`, `fecha_fin`, `titulo`, `descripcion`, `descuento`, `foto`) VALUES
(2, 1, '2019-01-25', '2019-01-30', 'promo', 'promo', 10, ''),
(3, 1, '2019-01-25', '2019-02-14', 'Sorteo entradas rey l', 'que te lo has creído tu ', 0, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Rol`
--

CREATE TABLE `Rol` (
  `id` int(11) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `Rol`
--

INSERT INTO `Rol` (`id`, `estado`) VALUES
(0, 1),
(1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguro`
--

CREATE TABLE `seguro` (
  `n_poliza` int(11) NOT NULL,
  `cobertura` varchar(500) COLLATE utf8_spanish2_ci NOT NULL,
  `importe` int(11) NOT NULL,
  `max_asegurado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `seguro`
--

INSERT INTO `seguro` (`n_poliza`, `cobertura`, `importe`, `max_asegurado`) VALUES
(1, 'robo, accidente,', 10000, 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `rol_id` int(1) NOT NULL,
  `foto` varchar(500) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `nombre` varchar(16) COLLATE utf8_spanish2_ci NOT NULL,
  `apellido1` varchar(60) COLLATE utf8_spanish2_ci NOT NULL,
  `apellido2` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `correo` varchar(60) COLLATE utf8_spanish2_ci NOT NULL,
  `contrasenha` varchar(60) COLLATE utf8_spanish2_ci NOT NULL,
  `telefono` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `rol_id`, `foto`, `nombre`, `apellido1`, `apellido2`, `correo`, `contrasenha`, `telefono`) VALUES
(1, 0, NULL, 'admin', '', '', 'admin@admin', 'admin', NULL),
(2, 1, NULL, 'oscar', 'Gomez Gonzalez', '', 'oscar@gmail.es', 'oscar', 620988324),
(3, 1, NULL, 'german', 'alejo', 'paquete', 'geralejo@gmail.com', 'german ', 666987652);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valoracion`
--

CREATE TABLE `valoracion` (
  `id` int(11) NOT NULL,
  `creador_id` int(11) NOT NULL,
  `conductor_id` int(11) NOT NULL,
  `viaje_id` int(11) NOT NULL,
  `valoracion` int(3) NOT NULL,
  `comentarios` varchar(500) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `valoracion`
--

INSERT INTO `valoracion` (`id`, `creador_id`, `conductor_id`, `viaje_id`, `valoracion`, `comentarios`) VALUES
(1, 1, 2, 4, 10, 'tonto el que lo lea'),
(2, 2, 3, 4, 10, 'tonto el que lo lea'),
(3, 2, 3, 4, 5, 'hola que tal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE `vehiculo` (
  `matricula` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `propietario_id` int(11) NOT NULL,
  `marca` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `modelo` varchar(40) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `vehiculo`
--

INSERT INTO `vehiculo` (`matricula`, `propietario_id`, `marca`, `modelo`) VALUES
('SE0866CP', 3, 'marca ', 'modelo'),
('se0866DP', 2, 'opel', 'mierda');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viaje`
--

CREATE TABLE `viaje` (
  `id` int(11) NOT NULL,
  `conductor_id` int(11) NOT NULL,
  `vehiculo_id` varchar(11) COLLATE utf8_spanish2_ci NOT NULL,
  `seguro_id` int(11) DEFAULT NULL,
  `origen` varchar(60) COLLATE utf8_spanish2_ci NOT NULL,
  `destino` varchar(60) COLLATE utf8_spanish2_ci NOT NULL,
  `capacidad` int(11) NOT NULL,
  `descripcion` varchar(500) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `precio` float NOT NULL,
  `fecha` date NOT NULL,
  `hora_salida` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `viaje`
--

INSERT INTO `viaje` (`id`, `conductor_id`, `vehiculo_id`, `seguro_id`, `origen`, `destino`, `capacidad`, `descripcion`, `precio`, `fecha`, `hora_salida`) VALUES
(2, 2, 'se0866DP', 1, 'sevilla', 'madrid', 4, NULL, 0, '0000-00-00', '00:00:00'),
(4, 2, 'se0866DP', 1, 'sevilla', 'madrid', 4, 'descripcion aleatoria', 30, '2019-01-30', '21:13:00'),
(5, 2, 'se0866DP', 1, 'sevilla', 'madrid', 4, 'descripcion aleatoria', 30, '2019-01-30', '21:13:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viajerosClientes`
--

CREATE TABLE `viajerosClientes` (
  `cliente_id` int(11) NOT NULL,
  `viaje_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `viajerosClientes`
--

INSERT INTO `viajerosClientes` (`cliente_id`, `viaje_id`) VALUES
(2, 2),
(3, 2),
(3, 4);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD KEY `admin_ibfk_1` (`usuario_id`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`usuario_id`);

--
-- Indices de la tabla `foro`
--
ALTER TABLE `foro`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `gestionesForos`
--
ALTER TABLE `gestionesForos`
  ADD KEY `gestionesForos_ibfk_1` (`foro_id`),
  ADD KEY `gestionesForos_ibfk_2` (`usuario_id`);

--
-- Indices de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  ADD PRIMARY KEY (`id`),
  ADD KEY `autor_id` (`autor_id`),
  ADD KEY `mensaje_ibfk_2` (`foro_id`);

--
-- Indices de la tabla `promocion`
--
ALTER TABLE `promocion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `promocion_ibfk_1` (`creador_id`);

--
-- Indices de la tabla `Rol`
--
ALTER TABLE `Rol`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `seguro`
--
ALTER TABLE `seguro`
  ADD PRIMARY KEY (`n_poliza`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_ibfk_2` (`rol_id`);

--
-- Indices de la tabla `valoracion`
--
ALTER TABLE `valoracion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `viaje_id` (`viaje_id`),
  ADD KEY `valoracion_ibfk_2` (`conductor_id`),
  ADD KEY `valoracion_ibfk_3` (`creador_id`);

--
-- Indices de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD PRIMARY KEY (`matricula`),
  ADD UNIQUE KEY `matricula` (`matricula`),
  ADD KEY `vehiculo_ibfk_1` (`propietario_id`);

--
-- Indices de la tabla `viaje`
--
ALTER TABLE `viaje`
  ADD PRIMARY KEY (`id`),
  ADD KEY `conductor_id` (`conductor_id`),
  ADD KEY `seguro_id` (`seguro_id`),
  ADD KEY `viaje_ibfk_4` (`vehiculo_id`);

--
-- Indices de la tabla `viajerosClientes`
--
ALTER TABLE `viajerosClientes`
  ADD KEY `cliente_id` (`cliente_id`),
  ADD KEY `viaje_id` (`viaje_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `foro`
--
ALTER TABLE `foro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `promocion`
--
ALTER TABLE `promocion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `seguro`
--
ALTER TABLE `seguro`
  MODIFY `n_poliza` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `valoracion`
--
ALTER TABLE `valoracion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `viaje`
--
ALTER TABLE `viaje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `gestionesForos`
--
ALTER TABLE `gestionesForos`
  ADD CONSTRAINT `gestionesForos_ibfk_1` FOREIGN KEY (`foro_id`) REFERENCES `foro` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gestionesForos_ibfk_2` FOREIGN KEY (`usuario_id`) REFERENCES `admin` (`usuario_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `mensaje`
--
ALTER TABLE `mensaje`
  ADD CONSTRAINT `mensaje_ibfk_1` FOREIGN KEY (`autor_id`) REFERENCES `cliente` (`usuario_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mensaje_ibfk_2` FOREIGN KEY (`foro_id`) REFERENCES `foro` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `promocion`
--
ALTER TABLE `promocion`
  ADD CONSTRAINT `promocion_ibfk_1` FOREIGN KEY (`creador_id`) REFERENCES `admin` (`usuario_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`rol_id`) REFERENCES `Rol` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `valoracion`
--
ALTER TABLE `valoracion`
  ADD CONSTRAINT `valoracion_ibfk_1` FOREIGN KEY (`viaje_id`) REFERENCES `viaje` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `valoracion_ibfk_2` FOREIGN KEY (`conductor_id`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `valoracion_ibfk_3` FOREIGN KEY (`creador_id`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD CONSTRAINT `vehiculo_ibfk_1` FOREIGN KEY (`propietario_id`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `viaje`
--
ALTER TABLE `viaje`
  ADD CONSTRAINT `viaje_ibfk_1` FOREIGN KEY (`conductor_id`) REFERENCES `cliente` (`usuario_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `viaje_ibfk_3` FOREIGN KEY (`seguro_id`) REFERENCES `seguro` (`n_poliza`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `viaje_ibfk_4` FOREIGN KEY (`vehiculo_id`) REFERENCES `vehiculo` (`matricula`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `viajerosClientes`
--
ALTER TABLE `viajerosClientes`
  ADD CONSTRAINT `viajerosClientes_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`usuario_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `viajerosClientes_ibfk_2` FOREIGN KEY (`viaje_id`) REFERENCES `viaje` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
