-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-10-2017 a las 01:40:34
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `delphi`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto`
--

CREATE TABLE IF NOT EXISTS `proyecto` (
  `idProyecto` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(45) NOT NULL,
  `Descripcion` varchar(255) NOT NULL,
  `Fecha_Creacion` date NOT NULL,
  `Fecha_Limite` date NOT NULL,
  `Hora_Limite` time NOT NULL,
  `Estado` int(11) NOT NULL,
  PRIMARY KEY (`idProyecto`),
  UNIQUE KEY `Nombre` (`Nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto_usuarios`
--

CREATE TABLE IF NOT EXISTS `proyecto_usuarios` (
  `Proyecto_idProyecto` int(11) NOT NULL,
  `Usuarios_idUsuarios` int(11) NOT NULL,
  PRIMARY KEY (`Proyecto_idProyecto`,`Usuarios_idUsuarios`),
  KEY `Usuarios_idUsuarios` (`Usuarios_idUsuarios`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultados`
--

CREATE TABLE IF NOT EXISTS `resultados` (
  `idResultados` int(11) NOT NULL AUTO_INCREMENT,
  `Tareas_idTareas` int(11) NOT NULL,
  `Usuarios_idUsuarios` int(11) NOT NULL,
  `Temporal` int(11) NOT NULL,
  `Final` int(11) NOT NULL,
  PRIMARY KEY (`idResultados`),
  KEY `Usuarios_idUsuarios` (`Usuarios_idUsuarios`),
  KEY `Tareas_idTareas` (`Tareas_idTareas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareas`
--

CREATE TABLE IF NOT EXISTS `tareas` (
  `idTareas` int(11) NOT NULL AUTO_INCREMENT,
  `Proyecto_idProyecto` int(11) NOT NULL,
  `Descripcion_Tareas` varchar(255) NOT NULL,
  `Peso` int(11) DEFAULT NULL,
  `Resultado_Final` int(11) DEFAULT NULL,
  PRIMARY KEY (`idTareas`),
  KEY `Proyecto_idProyecto` (`Proyecto_idProyecto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `idUsuarios` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(45) NOT NULL,
  `Contrasena` varchar(45) NOT NULL,
  `Tipo` int(11) NOT NULL,
  PRIMARY KEY (`idUsuarios`),
  UNIQUE KEY `Nombre` (`Nombre`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuarios`, `Nombre`, `Contrasena`, `Tipo`) VALUES
(1, 'Administrador', 'admin', 1),
(3, 'alejandra', '123', 2);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `proyecto_usuarios`
--
ALTER TABLE `proyecto_usuarios`
  ADD CONSTRAINT `proyecto_usuarios_ibfk_1` FOREIGN KEY (`Proyecto_idProyecto`) REFERENCES `proyecto` (`idProyecto`),
  ADD CONSTRAINT `proyecto_usuarios_ibfk_2` FOREIGN KEY (`Usuarios_idUsuarios`) REFERENCES `usuarios` (`idUsuarios`);

--
-- Filtros para la tabla `resultados`
--
ALTER TABLE `resultados`
  ADD CONSTRAINT `resultados_ibfk_1` FOREIGN KEY (`Usuarios_idUsuarios`) REFERENCES `usuarios` (`idUsuarios`),
  ADD CONSTRAINT `resultados_ibfk_2` FOREIGN KEY (`Tareas_idTareas`) REFERENCES `tareas` (`idTareas`);

--
-- Filtros para la tabla `tareas`
--
ALTER TABLE `tareas`
  ADD CONSTRAINT `tareas_ibfk_1` FOREIGN KEY (`Proyecto_idProyecto`) REFERENCES `proyecto` (`idProyecto`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
