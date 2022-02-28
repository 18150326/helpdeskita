-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: b1o04dzhm1guhvmjcrwb-mysql.services.clever-cloud.com:3306
-- Generation Time: Feb 28, 2022 at 06:36 AM
-- Server version: 8.0.22-13
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `b1o04dzhm1guhvmjcrwb`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_cat_mantenimiento`
--

CREATE TABLE `t_cat_mantenimiento` (
  `id_mantenimiento` int NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t_cat_mantenimiento`
--

INSERT INTO `t_cat_mantenimiento` (`id_mantenimiento`, `descripcion`) VALUES
(1, 'interno'),
(2, 'externo');

-- --------------------------------------------------------

--
-- Table structure for table `t_cat_roles`
--

CREATE TABLE `t_cat_roles` (
  `id_rol` int NOT NULL,
  `nombre` varchar(245) NOT NULL,
  `descripcion` varchar(245) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `t_cat_roles`
--

INSERT INTO `t_cat_roles` (`id_rol`, `nombre`, `descripcion`) VALUES
(1, 'cliente', 'Es un cliente'),
(2, 'admin', 'Es Admin');

-- --------------------------------------------------------

--
-- Table structure for table `t_encargados`
--

CREATE TABLE `t_encargados` (
  `id_encargado` int NOT NULL,
  `nombre` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t_encargados`
--

INSERT INTO `t_encargados` (`id_encargado`, `nombre`) VALUES
(1, 'I.S.C José Roberto Aguilera Fernández'),
(2, 'Angel');

-- --------------------------------------------------------

--
-- Table structure for table `t_persona`
--

CREATE TABLE `t_persona` (
  `id_persona` int NOT NULL,
  `paterno` varchar(245) NOT NULL,
  `materno` varchar(245) DEFAULT NULL,
  `nombre` varchar(245) NOT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `correo` varchar(245) DEFAULT NULL,
  `fechaInsert` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_reportes`
--

CREATE TABLE `t_reportes` (
  `id_reporte` int NOT NULL,
  `id_usuario` int NOT NULL,
  `folio` int NOT NULL,
  `area_solicitante` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nombre_solicitante` text NOT NULL,
  `fecha_elaboracion` text NOT NULL,
  `descripcion` text NOT NULL,
  `estado` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_reportes_finalizados`
--

CREATE TABLE `t_reportes_finalizados` (
  `id_reporte_finalizado` int NOT NULL,
  `id_reporte` int NOT NULL,
  `id_mantenimiento` int NOT NULL,
  `tipo_servicio` text NOT NULL,
  `asignado` text NOT NULL,
  `fecha_realizacion` text NOT NULL,
  `trabajo_realizado` text NOT NULL,
  `verificado_liberado` text NOT NULL,
  `fecha_verificado` text NOT NULL,
  `aprobado` text NOT NULL,
  `fecha_aprobado` text NOT NULL,
  `firma_verificacion` int NOT NULL DEFAULT '1',
  `documento_recogido` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_usuarios`
--

CREATE TABLE `t_usuarios` (
  `id_usuario` int NOT NULL,
  `id_rol` int NOT NULL,
  `id_persona` int NOT NULL,
  `usuario` varchar(245) NOT NULL,
  `password` varchar(245) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `ubicacion` text,
  `fecha_insert` varchar(45) DEFAULT NULL,
  `Estado` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_cat_mantenimiento`
--
ALTER TABLE `t_cat_mantenimiento`
  ADD PRIMARY KEY (`id_mantenimiento`);

--
-- Indexes for table `t_cat_roles`
--
ALTER TABLE `t_cat_roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indexes for table `t_persona`
--
ALTER TABLE `t_persona`
  ADD PRIMARY KEY (`id_persona`);

--
-- Indexes for table `t_reportes`
--
ALTER TABLE `t_reportes`
  ADD PRIMARY KEY (`id_reporte`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `t_reportes_finalizados`
--
ALTER TABLE `t_reportes_finalizados`
  ADD PRIMARY KEY (`id_reporte_finalizado`),
  ADD KEY `folio` (`id_reporte`),
  ADD KEY `id_mantenimiento` (`id_mantenimiento`);

--
-- Indexes for table `t_usuarios`
--
ALTER TABLE `t_usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `fkPersona_idx` (`id_persona`),
  ADD KEY `fkRoles_idx` (`id_rol`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_cat_roles`
--
ALTER TABLE `t_cat_roles`
  MODIFY `id_rol` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t_persona`
--
ALTER TABLE `t_persona`
  MODIFY `id_persona` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_reportes`
--
ALTER TABLE `t_reportes`
  MODIFY `id_reporte` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_reportes_finalizados`
--
ALTER TABLE `t_reportes_finalizados`
  MODIFY `id_reporte_finalizado` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_usuarios`
--
ALTER TABLE `t_usuarios`
  MODIFY `id_usuario` int NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `t_reportes`
--
ALTER TABLE `t_reportes`
  ADD CONSTRAINT `t_reportes_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `t_usuarios` (`id_usuario`);

--
-- Constraints for table `t_reportes_finalizados`
--
ALTER TABLE `t_reportes_finalizados`
  ADD CONSTRAINT `t_reportes_finalizados_ibfk_1` FOREIGN KEY (`id_reporte`) REFERENCES `t_reportes` (`id_reporte`),
  ADD CONSTRAINT `t_reportes_finalizados_ibfk_2` FOREIGN KEY (`id_mantenimiento`) REFERENCES `t_cat_mantenimiento` (`id_mantenimiento`);

--
-- Constraints for table `t_usuarios`
--
ALTER TABLE `t_usuarios`
  ADD CONSTRAINT `t_usuarios_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `t_cat_roles` (`id_rol`),
  ADD CONSTRAINT `t_usuarios_ibfk_2` FOREIGN KEY (`id_persona`) REFERENCES `t_persona` (`id_persona`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
