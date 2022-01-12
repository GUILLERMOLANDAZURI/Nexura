-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 21-09-2021 a las 19:04:48
-- Versión del servidor: 5.7.35-0ubuntu0.18.04.1
-- Versión de PHP: 7.3.29-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de datos: `prueba_tecnica_dev`
--
CREATE DATABASE IF NOT EXISTS `prueba_tecnica_dev` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `prueba_tecnica_dev`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `areas`
--

DROP TABLE IF EXISTS `areas`;
CREATE TABLE IF NOT EXISTS `areas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `areas`
--

INSERT INTO `areas` (`id`, `nombre`) VALUES
(1, 'Administrativa y Financiera'),
(2, 'Ingeniería'),
(5, 'Desarrollo de Negocio'),
(6, 'Proyectos'),
(7, 'Servicios'),
(8, 'Calidad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

DROP TABLE IF EXISTS `empleado`;
CREATE TABLE IF NOT EXISTS `empleado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sexo` char(1) NOT NULL,
  `area_id` int(11) NOT NULL,
  `boletin` int(11) DEFAULT NULL,
  `descripcion` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `area_id` (`area_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id`, `nombre`, `email`, `sexo`, `area_id`, `boletin`, `descripcion`) VALUES
(3, 'Pedro Pérez', 'pperez@example.co', 'M', 5, 1, 'Hola mundo'),
(4, 'Amalia Bayona', 'abayona@example.co', 'F', 8, 0, 'Para contactar a Amalia Bayona, puede escribir al correo electrónico abayona@example.co');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado_rol`
--

DROP TABLE IF EXISTS `empleado_rol`;
CREATE TABLE IF NOT EXISTS `empleado_rol` (
  `empleado_id` int(11) NOT NULL,
  `rol_id` int(11) NOT NULL,
  KEY `empleado_id` (`empleado_id`),
  KEY `rol_id` (`rol_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleado_rol`
--

INSERT INTO `empleado_rol` (`empleado_id`, `rol_id`) VALUES
(3, 4),
(3, 7),
(3, 2),
(4, 1),
(4, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `nombre`) VALUES
(1, 'Desarrollador'),
(2, 'Analista'),
(3, 'Tester'),
(4, 'Diseñador'),
(5, 'Profesional PMO'),
(6, 'Profesional de servicios'),
(7, 'Auxiliar administrativo'),
(8, 'Codirector');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `empleado_ibfk_1` FOREIGN KEY (`area_id`) REFERENCES `areas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `empleado_rol`
--
ALTER TABLE `empleado_rol`
  ADD CONSTRAINT `empleado_rol_ibfk_1` FOREIGN KEY (`empleado_id`) REFERENCES `empleado` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `empleado_rol_ibfk_2` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
