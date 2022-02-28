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

--
-- Dumping data for table `t_persona`
--

INSERT INTO `t_persona` (`id_persona`, `paterno`, `materno`, `nombre`, `telefono`, `correo`, `fechaInsert`) VALUES
(38, 'Ignacio', 'Zaragoza', 'Pedr', '4498765452', 'asjdbi123@gmail.com', '2022-02-16'),
(39, 'Logan', 'Ignacio', 'Carlos', '4497894565', 'askdnoands123@gmail.com', '2022-02-18'),
(40, 'Alonso', 'Cruz', 'Carlos', '12345678998', 'askdno1231@gmail.com', '2022-02-19'),
(41, 'Cruz', 'Dominguez', 'Iván Alejandro', '1234567895', 'aosdknaodq12@gmail.com', '2022-02-18'),
(42, 'Paredes', 'Martinez', 'Fabian', '4449888888', 'correo@correo.com', '2022-02-25');

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

--
-- Dumping data for table `t_reportes`
--

INSERT INTO `t_reportes` (`id_reporte`, `id_usuario`, `folio`, `area_solicitante`, `nombre_solicitante`, `fecha_elaboracion`, `descripcion`, `estado`) VALUES
(55, 41, 23, 'Sistemas', 'Uriel', '2022-02-19', 'No está funcionando ayudaaaa', 3),
(57, 41, 24, 'Idiomas', 'María', '2022-02-20', 'Hubo un problema con uno de los equipos ', 3),
(58, 41, 25, 'Tics', 'Iván', '2022-02-13', 'Errores con la platanforma de pago', 3),
(59, 41, 26, 'Tics', 'Iván', '2022-02-13', 'Fallas en los equipos de computo LRC', 1),
(60, 43, 27, 'Química', 'Iván', '2022-02-22', 'Qué onda Alex xd', 1),
(61, 43, 28, 'Ciencias Basicas', 'Luis', '2022-02-25', 'cable de red dañado', 3);

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

--
-- Dumping data for table `t_reportes_finalizados`
--

INSERT INTO `t_reportes_finalizados` (`id_reporte_finalizado`, `id_reporte`, `id_mantenimiento`, `tipo_servicio`, `asignado`, `fecha_realizacion`, `trabajo_realizado`, `verificado_liberado`, `fecha_verificado`, `aprobado`, `fecha_aprobado`, `firma_verificacion`, `documento_recogido`) VALUES
(33, 55, 1, 'Interno', 'Pedro', '2022-02-19', 'Se buscó a través del manual cómo solucionar el problema que se vió presente', 'Yael', '2022-02-20', '1', '2022-02-21', 2, 2),
(37, 57, 1, 'Manual', 'Ignacio', '', 'Se inspeccionó el material además de los posibles fallos', 'Yael', '2022-02-19', '1', '2022-02-20', 2, 2),
(38, 61, 1, 'Físico', 'Pedro', '2022-02-25', 'Cambio del cable de red', 'Luis', '2022-02-25', '1', '2022-02-25', 2, 2),
(39, 58, 1, 'digital', 'juan', '2022-02-25', 'instalación de un nuevo software', 'Lic. María Delgado', '2022-02-25', '1', '2022-02-25', 1, 1);

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
-- Dumping data for table `t_usuarios`
--

INSERT INTO `t_usuarios` (`id_usuario`, `id_rol`, `id_persona`, `usuario`, `password`, `ubicacion`, `fecha_insert`, `Estado`) VALUES
(40, 2, 38, 'admin', 'QVFIMlh5L3JyS3FzdjR5K0QwODVXZz09', 'Sistemas', '2022-02-16', 1),
(41, 1, 39, 'soraxurix', 'ck1TTUM3ZHp0dmlERmY1bnJUbkEwUT09', 'Sistemas Cómputo', '2022-02-18', 1),
(42, 2, 40, 'oclivus', 'ck1TTUM3ZHp0dmlERmY1bnJUbkEwUT09', 'Sistemas', '2022-02-19', 1),
(43, 1, 41, 'Alex', 'aTFTR3Y4Mm9WQlZLRU5kSFMyZUZiQT09', 'Sistemas', '2022-02-18', 1),
(44, 1, 42, 'R1H3F4', 'ck1TTUM3ZHp0dmlERmY1bnJUbkEwUT09', 'Administración Gerencial', '2022-02-25', 1);

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
  MODIFY `id_persona` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `t_reportes`
--
ALTER TABLE `t_reportes`
  MODIFY `id_reporte` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `t_reportes_finalizados`
--
ALTER TABLE `t_reportes_finalizados`
  MODIFY `id_reporte_finalizado` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `t_usuarios`
--
ALTER TABLE `t_usuarios`
  MODIFY `id_usuario` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

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
