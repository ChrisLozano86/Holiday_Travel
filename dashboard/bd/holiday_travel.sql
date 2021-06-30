-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-06-2021 a las 03:01:23
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
  `activo` enum('Si','No') DEFAULT 'Si',
  `clave_back_office` varchar(100) NOT NULL,
  `header_footer` enum('Activo','Inactivo') NOT NULL DEFAULT 'Activo',
  `menu` enum('Activo','Inactivo') NOT NULL DEFAULT 'Activo',
  `logo` varchar(200) DEFAULT NULL,
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
  `fecha_creacion` date DEFAULT NULL,
  `rnt` varchar(20) DEFAULT 'No',
  `markup_operadora` int(11) DEFAULT 0,
  `comision_agencia` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago_reservaciones`
--

CREATE TABLE `pago_reservaciones` (
  `idPagoReserva` int(11) NOT NULL,
  `idReserva` int(11) NOT NULL,
  `fecha_pago` datetime DEFAULT NULL,
  `referencia` varchar(100) DEFAULT NULL,
  `forma_pago` varchar(100) DEFAULT NULL,
  `monto` decimal(10,2) DEFAULT NULL,
  `tipo_cambio` decimal(10,2) DEFAULT 1.00,
  `descripcion` varchar(200) DEFAULT NULL,
  `creado_por` varchar(50) DEFAULT NULL,
  `categoria_pago` enum('1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promociones`
--

CREATE TABLE `promociones` (
  `idPromocion` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `url_imagen1` varchar(200) NOT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `fecha_publicacion` date NOT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT 1,
  `servicio` text DEFAULT NULL,
  `hotel` varchar(50) DEFAULT NULL,
  `precio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservaciones`
--

CREATE TABLE `reservaciones` (
  `idReserva` int(11) NOT NULL,
  `idAgencia` int(11) NOT NULL,
  `markup_operadora` int(11) DEFAULT NULL,
  `comision_agencia` int(11) DEFAULT NULL,
  `precio_neto` decimal(10,2) DEFAULT NULL,
  `titular` varchar(200) NOT NULL,
  `fecha_reservacion` date NOT NULL,
  `broker` varchar(100) NOT NULL,
  `clave` varchar(50) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `destino` varchar(100) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `moneda` varchar(50) NOT NULL DEFAULT 'MXN',
  `estatus_servicio` varchar(20) NOT NULL DEFAULT 'OK',
  `pago_operadora` enum('No Pagado','Pagado') NOT NULL DEFAULT 'No Pagado',
  `pago_agencia` enum('No Pagado','Pagado') NOT NULL DEFAULT 'No Pagado',
  `fecha_limite` date NOT NULL,
  `fecha_notificacion` date NOT NULL,
  `estatus_notificacion` tinyint(1) NOT NULL DEFAULT 0,
  `estatus_reserva` enum('Activa','Cancelada') NOT NULL DEFAULT 'Activa',
  `saldo_restante` decimal(10,2) DEFAULT NULL,
  `saldo_restanteO` decimal(10,2) DEFAULT NULL
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
(3, 'Colaborador administrativo', 'Permisos limitados a módulos definidos por el administrador'),
(4, 'Colaborador de diseño', 'Permisos limitados a módulos para diseño del sitio web');

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
(1, 'Soporte', 'Holiday Travel', 'soporte@htop.com.mx', '9b412514e83ca55cabf81b68fd0b2a83', 'Activo', '9b412514e83ca55cabf81b68fd0b2a83', 1),
(2, 'Sinuhe', 'Chacón', 'sinuhe.chacon@htop.com.mx', '824ff5c24e2077f10b1f95893a576150', 'Activo', '824ff5c24e2077f10b1f95893a576150', 2),
(4, 'Edmundo', 'Sanchez', 'edmundo.sanchez@htop.com.mx', 'fda1d9125ffc6512c974638cf9a5bc6b', 'Activo', 'fda1d9125ffc6512c974638cf9a5bc6b', 2),
(5, 'Luis Fernando', 'Hernández', 'luis.hernandez@htop.com.mx', '16adcd1b84c8cff504a243ffa6c94282', 'Activo', '16adcd1b84c8cff504a243ffa6c94282', 3),
(6, 'Dummy', 'Daa', 'a@a.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Activo', 'd10ca8d11301c2f4993ac2279ce4b930', 3);

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
-- Indices de la tabla `pago_reservaciones`
--
ALTER TABLE `pago_reservaciones`
  ADD PRIMARY KEY (`idPagoReserva`),
  ADD KEY `idPagoReserva` (`idReserva`);

--
-- Indices de la tabla `promociones`
--
ALTER TABLE `promociones`
  ADD PRIMARY KEY (`idPromocion`);

--
-- Indices de la tabla `reservaciones`
--
ALTER TABLE `reservaciones`
  ADD PRIMARY KEY (`idReserva`),
  ADD KEY `id_agencia` (`idAgencia`);

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
  MODIFY `idAgencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `pago_reservaciones`
--
ALTER TABLE `pago_reservaciones`
  MODIFY `idPagoReserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT de la tabla `promociones`
--
ALTER TABLE `promociones`
  MODIFY `idPromocion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `reservaciones`
--
ALTER TABLE `reservaciones`
  MODIFY `idReserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `idRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `slider`
--
ALTER TABLE `slider`
  MODIFY `idSlider` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pago_reservaciones`
--
ALTER TABLE `pago_reservaciones`
  ADD CONSTRAINT `idPagoReserva` FOREIGN KEY (`idReserva`) REFERENCES `reservaciones` (`idReserva`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `reservaciones`
--
ALTER TABLE `reservaciones`
  ADD CONSTRAINT `id_agencia` FOREIGN KEY (`idAgencia`) REFERENCES `agencias` (`idAgencia`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `idRol_idx` FOREIGN KEY (`idRol`) REFERENCES `roles` (`idRol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
