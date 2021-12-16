-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-12-2021 a las 07:16:21
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.11

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_cat_roles`
--

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

CREATE TABLE `t_persona` (
  `id_persona` int(11) NOT NULL,
  `paterno` varchar(245) NOT NULL,
  `materno` varchar(245) DEFAULT NULL,
  `nombre` varchar(245) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `sexo` varchar(2) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `correo` varchar(245) DEFAULT NULL,
  `fechaInsert` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `t_persona`
--

INSERT INTO `t_persona` (`id_persona`, `paterno`, `materno`, `nombre`, `fecha_nacimiento`, `sexo`, `telefono`, `correo`, `fechaInsert`) VALUES
(1, 'Gonzales', 'Paredes', 'Juan', '0000-00-00', 'M', '7951347610', 'prueba@gmail.com', '2021-11-27'),
(2, 'Pasillas', 'Sierra', 'Martin', '0000-00-00', 'M', '4751247935', 'prueba@gmail.com', '2021-11-27'),
(3, 'ramirez', 'calvillo', 'ivonne', '1999-04-30', 'F', '9897134', 'correo@correo.com', '2021-11-28'),
(4, 'prueba1', 'prueba1', 'prueba1', '2021-11-30', 'M', '111111', 'correo2@correo.com', '2021-11-30'),
(5, 'prueba123', 'prueba123', 'prueba123', '0000-00-00', 'F', '11', 'correo.com', '0000-00-00'),
(6, 'prueba3', 'prueba3', 'prueba3', '0000-00-00', 'F', '1', 'correo3@correo.com', '2021-12-15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_usuarios`
--

CREATE TABLE `t_usuarios` (
  `id_usuario` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `usuario` varchar(245) NOT NULL,
  `password` varchar(245) NOT NULL,
  `ubicacion` text DEFAULT NULL,
  `fecha_insert` varchar(45) DEFAULT NULL,
  `Estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `t_usuarios`
--

INSERT INTO `t_usuarios` (`id_usuario`, `id_rol`, `id_persona`, `usuario`, `password`, `ubicacion`, `fecha_insert`, `Estado`) VALUES
(1, 2, 1, 'GoPa', 'abcd', 'cc', '01/10/2021', 1),
(2, 1, 2, 'pasi', 'abcd', 'inv', '01/10/2021', 1),
(3, 1, 3, 'usu', '12345', 'cc', '2021-11-28', 1),
(4, 1, 4, 'prueba1', '12345', 'cd', '2021-11-30', 1),
(5, 1, 5, 'usu', '12345', 'a', '2021-12-11', 1),
(6, 2, 6, 'abcd', '12345', 'en su casa', '2021-12-13', 1);

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
  MODIFY `id_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `t_usuarios`
--
ALTER TABLE `t_usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
