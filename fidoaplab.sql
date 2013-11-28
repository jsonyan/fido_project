-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 11-09-2013 a las 23:44:58
-- Versión del servidor: 5.5.20
-- Versión de PHP: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `fidoaplab`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad`
--

CREATE TABLE IF NOT EXISTS `actividad` (
  `id_actividad` int(11) NOT NULL AUTO_INCREMENT,
  `administrador_id` int(10) NOT NULL,
  `nombre_actividad` varchar(100) DEFAULT NULL,
  `tipo_actividad` varchar(100) DEFAULT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `foto_actividad` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_actividad`),
  KEY `administrador_id` (`administrador_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `actividad`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE IF NOT EXISTS `administrador` (
  `id_administrador` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(10) NOT NULL,
  `cargo` varchar(30) DEFAULT NULL,
  `otro_cargo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_administrador`),
  KEY `usuario_id` (`usuario_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id_administrador`, `usuario_id`, `cargo`, `otro_cargo`) VALUES
(1, 1, 'Presidente', 'Coordinador de Adopciones');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adoptado`
--

CREATE TABLE IF NOT EXISTS `adoptado` (
  `id_adoptado` int(11) NOT NULL AUTO_INCREMENT,
  `administrador_id` int(10) NOT NULL,
  `id_adoptante` int(10) NOT NULL,
  `animal_id` varchar(10) NOT NULL,
  `evaluacion_id` int(10) DEFAULT NULL,
  `fecha_adopcion` date DEFAULT NULL,
  PRIMARY KEY (`id_adoptado`),
  KEY `usuario_id` (`id_adoptante`),
  KEY `evaluacion_id` (`evaluacion_id`),
  KEY `animal_id` (`animal_id`),
  KEY `administrador_id` (`administrador_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `adoptado`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adoptante`
--

CREATE TABLE IF NOT EXISTS `adoptante` (
  `id_adoptante` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(10) NOT NULL,
  PRIMARY KEY (`id_adoptante`),
  KEY `usuario_id` (`usuario_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `adoptante`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `animal`
--

CREATE TABLE IF NOT EXISTS `animal` (
  `id_animal` varchar(10) NOT NULL,
  `administrador_id` int(10) NOT NULL,
  `nombre_animal` varchar(40) NOT NULL,
  `sexo_animal` varchar(10) NOT NULL,
  `motivo_entrada` text,
  `especie` varchar(50) NOT NULL,
  `raza` varchar(50) NOT NULL,
  `tamano` varchar(20) NOT NULL,
  `color` varchar(20) DEFAULT NULL,
  `edad` int(10) DEFAULT NULL,
  `fecha_reg_animal` datetime DEFAULT '0000-00-00 00:00:00',
  `fecha_nacimiento` date DEFAULT NULL,
  `esterilizado` tinyint(1) NOT NULL,
  `caracteristicas` text NOT NULL,
  `estado_encontrado` text,
  `fecha_muerte` date DEFAULT NULL,
  `motivo_muerte` text,
  `direccion_encontrado` varchar(200) DEFAULT NULL,
  `encontrado_por` text,
  `adoptable` tinyint(1) DEFAULT NULL,
  `revision_medica` tinyint(1) NOT NULL DEFAULT '0',
  `foto_animal` varchar(200) DEFAULT NULL,
  `en_seguimiento` int(11) NOT NULL,
  PRIMARY KEY (`id_animal`),
  KEY `administrador_id` (`administrador_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcar la base de datos para la tabla `animal`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `animal_perdido`
--

CREATE TABLE IF NOT EXISTS `animal_perdido` (
  `id_perdido` int(10) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(10) NOT NULL,
  `nombre_animal` varchar(20) NOT NULL,
  `sexo_animal` varchar(10) NOT NULL,
  `especie` varchar(20) DEFAULT NULL,
  `raza` varchar(20) DEFAULT NULL,
  `tamano` varchar(20) NOT NULL,
  `color` varchar(20) DEFAULT NULL,
  `edad` int(10) DEFAULT NULL,
  `fecha_perdida` date DEFAULT NULL,
  `fecha_comunicado` date NOT NULL,
  `direccion_perdida` varchar(100) DEFAULT NULL,
  `caracteristicas_perdida` text,
  `foto_perdido` varchar(40) DEFAULT NULL,
  `fecha_encontrado` date DEFAULT NULL,
  `direccion_encontrado` varchar(100) DEFAULT NULL,
  `caracteristicas_encontrado` text,
  PRIMARY KEY (`id_perdido`),
  KEY `usuario_id` (`usuario_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `animal_perdido`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asigna_actividad`
--

CREATE TABLE IF NOT EXISTS `asigna_actividad` (
  `id_asignacion_a` int(11) NOT NULL AUTO_INCREMENT,
  `voluntario_id` int(10) NOT NULL,
  `administrador_id` int(10) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  PRIMARY KEY (`id_asignacion_a`),
  KEY `administrador_id` (`administrador_id`),
  KEY `voluntario_id` (`voluntario_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `asigna_actividad`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asigna_seguimiento`
--

CREATE TABLE IF NOT EXISTS `asigna_seguimiento` (
  `id_asignacion` int(11) NOT NULL AUTO_INCREMENT,
  `voluntario_id` int(10) NOT NULL,
  `administrador_id` int(10) NOT NULL,
  `animal_id` varchar(10) NOT NULL,
  `caso` varchar(200) NOT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `monto` int(11) NOT NULL,
  `tareas` text NOT NULL,
  PRIMARY KEY (`id_asignacion`),
  KEY `voluntario_id` (`voluntario_id`),
  KEY `administrador_id` (`administrador_id`),
  KEY `animal_id` (`animal_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `asigna_seguimiento`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `casa_temporal`
--

CREATE TABLE IF NOT EXISTS `casa_temporal` (
  `id_casa_temporal` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(10) NOT NULL,
  `animal_id` varchar(10) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  PRIMARY KEY (`id_casa_temporal`),
  KEY `usuario_id` (`usuario_id`),
  KEY `animal_id` (`animal_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `casa_temporal`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `denuncia`
--

CREATE TABLE IF NOT EXISTS `denuncia` (
  `id_maltrato` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `asunto` varchar(100) NOT NULL,
  `descripcion` text,
  `maltratado` text,
  `fecha_registro` datetime NOT NULL,
  `leido` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_maltrato`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `denuncia`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `donante`
--

CREATE TABLE IF NOT EXISTS `donante` (
  `id_donante` int(10) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(10) NOT NULL,
  PRIMARY KEY (`id_donante`),
  KEY `usuario_id` (`usuario_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `donante`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluacion`
--

CREATE TABLE IF NOT EXISTS `evaluacion` (
  `id_evaluacion` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(100) NOT NULL,
  `animal_id` varchar(20) NOT NULL,
  `tipo_vivienda` varchar(100) NOT NULL,
  `permite_animal1` varchar(50) DEFAULT NULL,
  `jardin` varchar(50) DEFAULT NULL,
  `patio` varchar(50) DEFAULT NULL,
  `terraza` varchar(50) DEFAULT NULL,
  `duplex` varchar(50) DEFAULT NULL,
  `su_vivienda_es` varchar(100) NOT NULL,
  `no_propio` varchar(20) DEFAULT NULL,
  `propietario` varchar(100) DEFAULT NULL,
  `fono_propietario` varchar(50) NOT NULL,
  `nro_persona` varchar(50) NOT NULL,
  `ninos` varchar(20) NOT NULL,
  `nro_ninos` varchar(50) DEFAULT NULL,
  `edad_ninos` varchar(100) DEFAULT NULL,
  `dia` varchar(30) NOT NULL,
  `noche` varchar(30) NOT NULL,
  `cadena` varchar(30) DEFAULT NULL,
  `motivo_cadena` text,
  `deacuerdo_esterilizado` varchar(10) NOT NULL,
  `otros_animales` varchar(10) NOT NULL,
  `nperro` int(20) DEFAULT '0',
  `nhp` int(20) DEFAULT '0',
  `nmp` int(20) DEFAULT '0',
  `edad_perro` varchar(100) DEFAULT NULL,
  `raza_perro` varchar(100) DEFAULT NULL,
  `ngato` int(20) DEFAULT '0',
  `nhg` int(20) DEFAULT '0',
  `nmg` int(20) DEFAULT '0',
  `edad_gato` varchar(100) DEFAULT NULL,
  `raza_gato` varchar(100) DEFAULT NULL,
  `otros_animales2` text,
  `estan_esterilizado` varchar(10) DEFAULT NULL,
  `porque` text,
  `estos_son` varchar(50) DEFAULT NULL,
  `con_veterinario` varchar(20) DEFAULT NULL,
  `dir_veterinario` text,
  `ya_adopto` varchar(30) NOT NULL,
  `donde_adopto` text,
  `comentario` text,
  `fecha_solicitud` datetime NOT NULL,
  `leido` tinyint(1) NOT NULL,
  `aceptado` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_evaluacion`),
  KEY `usuario_id` (`usuario_id`),
  KEY `animal_id` (`animal_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `evaluacion`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ficha_medica`
--

CREATE TABLE IF NOT EXISTS `ficha_medica` (
  `id_ficha` int(11) NOT NULL AUTO_INCREMENT,
  `veterinario_id` int(10) NOT NULL,
  `animal_id` varchar(10) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `motivo_consulta` text NOT NULL,
  `diagnostico` text NOT NULL,
  `tratamiento` text NOT NULL,
  `vacunas` text NOT NULL,
  PRIMARY KEY (`id_ficha`),
  KEY `veterinario_id` (`veterinario_id`),
  KEY `animal_id` (`animal_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `ficha_medica`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `participa`
--

CREATE TABLE IF NOT EXISTS `participa` (
  `id_participa` int(10) NOT NULL AUTO_INCREMENT,
  `actividad_id` int(10) NOT NULL,
  `usuario_id` int(10) NOT NULL,
  PRIMARY KEY (`id_participa`),
  KEY `actividad_id` (`actividad_id`),
  KEY `usuario_id` (`usuario_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `participa`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `register_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `rol` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `register_date`, `rol`) VALUES
(1, 'aplab@gmail.com', '$2a$08$qsDcqf/br7ZzESGw6wt0Zui/YGn0Q84BYndvqiTHXTPg39jbBJ9ua', '2013-09-11 19:32:22', 'administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `ci` int(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `red_social` varchar(200) DEFAULT NULL,
  `telefono` int(50) DEFAULT NULL,
  `celular` int(50) DEFAULT NULL,
  `fecha_registro` datetime DEFAULT '0000-00-00 00:00:00',
  `ciudad` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `ocupacion` varchar(50) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `foto` varchar(150) DEFAULT NULL,
  `latitud` varchar(40) NOT NULL,
  `longitud` varchar(40) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellidos`, `ci`, `email`, `red_social`, `telefono`, `celular`, `fecha_registro`, `ciudad`, `direccion`, `ocupacion`, `fecha_nacimiento`, `foto`, `latitud`, `longitud`) VALUES
(1, 'aplab', 'aplab', 123456789, 'aplab@gmail.com', 'aplab', 2, 75812803, '2013-09-11 19:32:22', 'La Paz', 'Z Ballivian Nro 1092', 'Abogada', '1999-05-06', 'anonimo.jpg', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `veterinario`
--

CREATE TABLE IF NOT EXISTS `veterinario` (
  `id_veterinario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(10) NOT NULL,
  `matricula_profesional` varchar(20) NOT NULL,
  PRIMARY KEY (`id_veterinario`),
  KEY `usuario_id` (`usuario_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `veterinario`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `voluntario`
--

CREATE TABLE IF NOT EXISTS `voluntario` (
  `id_voluntario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(10) NOT NULL,
  `estado` varchar(100) NOT NULL,
  `aceptado` tinyint(1) DEFAULT '0',
  `tipo_ayuda` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_voluntario`),
  KEY `usuario_id` (`usuario_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `voluntario`
--

