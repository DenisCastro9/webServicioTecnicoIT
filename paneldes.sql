-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 11-06-2022 a las 04:31:50
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `paneldes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `areas`
--

CREATE TABLE IF NOT EXISTS `areas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `areas`
--

INSERT INTO `areas` (`id`, `nombre`) VALUES
(1, 'Administracion'),
(2, 'Contabilidad'),
(3, 'Recursos Humanos'),
(4, 'Marketing'),
(5, 'Produccion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE IF NOT EXISTS `estados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`id`, `nombre`) VALUES
(1, 'Iniciado'),
(2, 'En proceso'),
(3, 'Finalizado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidencias`
--

CREATE TABLE IF NOT EXISTS `incidencias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fechaActual` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_prioridad` int(11) NOT NULL,
  `id_estado` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `incidencias`
--

INSERT INTO `incidencias` (`id`, `titulo`, `descripcion`, `id_usuario`, `fechaActual`, `id_prioridad`, `id_estado`) VALUES
(1, 'El monitor no enciende', 'Al encender el equipo, el monitor no enciende ni visualiza luz en el mismo', 1, '2022-06-11 02:10:29', 1, 1),
(2, 'El sistema se vuelve lento', 'Al ingresar al sistema y comenzar a trabajar, noto lentitud en la carga de las paginas.', 4, '2022-06-11 01:14:59', 2, 3),
(3, 'Impresora sin tinta', 'La impresora esta quedandose sin tinta', 2, '2022-06-11 02:50:03', 2, 1),
(4, 'Solicitud de acceso a registros', 'Necesito acceder al registro de datos de los empleados, el sistema me indica acceso denegado', 2, '2022-06-11 02:50:57', 3, 2),
(5, 'Solicitud de cambio de teclado', 'El teclado actual contiene varias teclas sin funcionar, solicito uno nuevo', 2, '2022-06-11 02:50:10', 3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `niveles`
--

CREATE TABLE IF NOT EXISTS `niveles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `niveles`
--

INSERT INTO `niveles` (`id`, `nombre`) VALUES
(1, 'Administrador'),
(2, 'Usuario Normal'),
(6, 'Tecnico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prioridades`
--

CREATE TABLE IF NOT EXISTS `prioridades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `prioridades`
--

INSERT INTO `prioridades` (`id`, `nombre`) VALUES
(1, 'Alta'),
(2, 'Media'),
(3, 'Baja');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `imagen` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `clave` varchar(40) NOT NULL,
  `id_nivel` int(11) NOT NULL,
  `fechaAcceso` timestamp NULL DEFAULT NULL,
  `activo` int(1) NOT NULL,
  `id_area` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `imagen`, `email`, `clave`, `id_nivel`, `fechaAcceso`, `activo`, `id_area`) VALUES
(1, 'Vir', 'Vega', 'team-2', 'viro@gmail.com', '202cb962ac59075b964b07152d234b70', 2, '2022-06-11 04:20:12', 1, 4),
(2, 'Mara', 'Rodriguez', 'team-3', 'mara@gmail.com', '202cb962ac59075b964b07152d234b70', 2, '2022-06-11 04:18:10', 1, 3),
(3, 'Tomas', 'Vera', 'team-1', 'tomas@gmail.com', '202cb962ac59075b964b07152d234b70', 6, '2022-06-11 04:21:26', 1, 5),
(4, 'Martina', 'Lopez', 'sue', 'martina@gmail.com', '202cb962ac59075b964b07152d234b70', 1, '2022-06-11 04:20:26', 1, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
