-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 09-08-2021 a las 19:10:17
-- Versión del servidor: 5.7.33
-- Versión de PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `helpdesk`
--
CREATE DATABASE IF NOT EXISTS `helpdesk` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `helpdesk`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_cat_roles`
--

DROP TABLE IF EXISTS `t_cat_roles`;
CREATE TABLE `t_cat_roles` (
  `id_rol` int(11) NOT NULL,
  `nombre` varchar(245) NOT NULL,
  `descripcion` varchar(245) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `t_cat_roles`
--

INSERT INTO `t_cat_roles` (`id_rol`, `nombre`, `descripcion`) VALUES
(1, 'cliente', 'Es un cliente'),
(2, 'admin', 'Es Admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_persona`
--

DROP TABLE IF EXISTS `t_persona`;
CREATE TABLE `t_persona` (
  `id_persona` int(11) NOT NULL,
  `paterno` varchar(245) NOT NULL,
  `materno` varchar(245) DEFAULT NULL,
  `nombre` varchar(245) NOT NULL,
  `fecha_nacimiento` varchar(245) NOT NULL,
  `sexo` varchar(2) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `correo` varchar(245) DEFAULT NULL,
  `fechaInsert` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_usuarios`
--

DROP TABLE IF EXISTS `t_usuarios`;
CREATE TABLE `t_usuarios` (
  `id_usuario` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `usuario` varchar(245) NOT NULL,
  `password` varchar(245) NOT NULL,
  `ubicacion` text,
  `fecha_insert` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `t_cat_roles`
--
ALTER TABLE `t_cat_roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `t_persona`
--
ALTER TABLE `t_persona`
  ADD PRIMARY KEY (`id_persona`);

--
-- Indices de la tabla `t_usuarios`
--
ALTER TABLE `t_usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `fkPersona_idx` (`id_persona`),
  ADD KEY `fkRoles_idx` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `t_cat_roles`
--
ALTER TABLE `t_cat_roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `t_persona`
--
ALTER TABLE `t_persona`
  MODIFY `id_persona` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_usuarios`
--
ALTER TABLE `t_usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `t_usuarios`
--
ALTER TABLE `t_usuarios`
  ADD CONSTRAINT `fkPersona` FOREIGN KEY (`id_persona`) REFERENCES `t_persona` (`id_persona`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fkRoles` FOREIGN KEY (`id_rol`) REFERENCES `t_cat_roles` (`id_rol`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
