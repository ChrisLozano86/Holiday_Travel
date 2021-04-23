-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-04-2021 a las 21:48:53
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `holiday_travel`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agencias`
--

CREATE TABLE `agencias` (
  `idAgencia` int(11) NOT NULL,
  `razon_social` varchar(100) DEFAULT NULL,
  `nombre_comercial` varchar(100) DEFAULT NULL,
  `rfc` varchar(20) DEFAULT NULL,
  `calle` varchar(100) DEFAULT NULL,
  `num_exterior` varchar(10) DEFAULT NULL,
  `num_interior` varchar(10) DEFAULT NULL,
  `colonia` varchar(50) DEFAULT NULL,
  `municipio` varchar(50) DEFAULT NULL,
  `ciudad` varchar(50) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `cp` varchar(10) DEFAULT NULL,
  `pais` varchar(50) DEFAULT NULL,
  `moneda` varchar(50) DEFAULT NULL,
  `tel1` varchar(20) DEFAULT NULL,
  `tel2` varchar(20) DEFAULT NULL,
  `tel3` varchar(20) DEFAULT NULL,
  `pagina_web` varchar(200) DEFAULT NULL,
  `activo` enum('checked','unchecked') DEFAULT 'checked',
  `clave_back_office` varchar(100) NOT NULL,
  `header_footer` enum('Activo','Inactivo') NOT NULL DEFAULT 'Activo',
  `menu` enum('Activo','Inactivo') NOT NULL DEFAULT 'Activo',
  `logo` enum('Activo','Inactivo') NOT NULL DEFAULT 'Activo',
  `observaciones` text DEFAULT NULL,
  `nombre_contacto` varchar(100) DEFAULT NULL,
  `apellido_paterno` varchar(100) DEFAULT NULL,
  `apellido_materno` varchar(100) DEFAULT NULL,
  `cargo` varchar(50) NOT NULL,
  `sexo` enum('M','F') DEFAULT NULL,
  `tel_directo` varchar(20) NOT NULL,
  `tel_movil` varchar(20) DEFAULT NULL,
  `email_contacto` varchar(100) DEFAULT NULL,
  `email_servidor` varchar(100) DEFAULT NULL,
  `clave` varchar(100) DEFAULT NULL,
  `servidor_smtp` varchar(100) DEFAULT NULL,
  `port_smtp` varchar(100) DEFAULT NULL,
  `fecha_creacion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promociones`
--

CREATE TABLE `promociones` (
  `idPromocion` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `url_imagen1` varchar(200) NOT NULL,
  `descripcion` text NOT NULL,
  `fecha_publicacion` date NOT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT 1,
  `servicio` text NOT NULL,
  `hotel` varchar(50) DEFAULT NULL,
  `precio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `idRol` int(11) NOT NULL,
  `rol` varchar(50) NOT NULL,
  `descripcion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`idRol`, `rol`, `descripcion`) VALUES
(1, 'Super Administrador', 'Control y acceso total a todos los módulos de la plataforma'),
(2, 'Administrador', 'Administrador de todos los módulos del sitio web'),
(3, 'Colaborador', 'Permisos limitados');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `slider`
--

CREATE TABLE `slider` (
  `idSlider` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `url_imagen1` varchar(200) NOT NULL,
  `descripcion` text NOT NULL,
  `fecha_publicacion` date NOT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `slider`
--

INSERT INTO `slider` (`idSlider`, `titulo`, `url_imagen1`, `descripcion`, `fecha_publicacion`, `visible`) VALUES
(3, 'Playa Quieta, Ixtapa', 'uploads/images/20210421190110_slider.jpg', 'Test Description', '2021-04-21', 1),
(6, 'La Marina de Vallarta', 'uploads/images/20210421190030_slider.jpg', 'Test ', '2021-04-21', 1),
(7, 'Riviera Maya, Tulum', 'uploads/images/20210421190100_slider.jpg', 'Esta es la descripcion', '2021-04-21', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(120) NOT NULL,
  `estatus` enum('Activo','Inactivo') NOT NULL DEFAULT 'Activo',
  `token` varchar(200) NOT NULL,
  `idRol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nombre`, `apellido`, `email`, `password`, `estatus`, `token`, `idRol`) VALUES
(1, 'Administrador', 'Holiday Travel', 'admin@admin.com', 'bddcb6194766569e55b134d2f527d377', 'Activo', 'bddcb6194766569e55b134d2f527d377', 1),
(2, 'Sinuhe', 'Chacón', 'admin1@admin.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Activo', '5b024ff815b98e44e1bf7de43d93ef0c', 2),
(4, 'Edmundo', 'Sanchez', 'sigaesanchez@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Activo', 'c021f14cc4368405fbe45d7dd39f5e49', 2);

--
-- Disparadores `usuarios`
--
DELIMITER $$
CREATE TRIGGER `usuarios_AFTER_DELETE` AFTER DELETE ON `usuarios` FOR EACH ROW BEGIN

END
$$
DELIMITER ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `agencias`
--
ALTER TABLE `agencias`
  ADD PRIMARY KEY (`idAgencia`);

--
-- Indices de la tabla `promociones`
--
ALTER TABLE `promociones`
  ADD PRIMARY KEY (`idPromocion`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`idRol`);

--
-- Indices de la tabla `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`idSlider`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD KEY `idRol_idx` (`idRol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `agencias`
--
ALTER TABLE `agencias`
  MODIFY `idAgencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `promociones`
--
ALTER TABLE `promociones`
  MODIFY `idPromocion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `idRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `slider`
--
ALTER TABLE `slider`
  MODIFY `idSlider` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `idRol_idx` FOREIGN KEY (`idRol`) REFERENCES `roles` (`idRol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
