-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-02-2019 a las 17:17:13
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sillpkae_sillericos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `idcategoria` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `condicion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`idcategoria`, `nombre`, `condicion`) VALUES
(1, 'Camisas', 1),
(2, 'Traje', 1),
(3, 'Pantalon', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `color`
--

CREATE TABLE `color` (
  `idcolor` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `color`
--

INSERT INTO `color` (`idcolor`, `nombre`, `estado`) VALUES
(1, 'Lila punto', 1),
(2, 'Celeste lila', 1),
(3, 'Blanco linea', 1),
(4, 'Celeste', 1),
(5, 'Lila Claro', 1),
(6, 'Azul', 1),
(7, 'Plomo', 1),
(8, 'Blanco diseño', 1),
(9, 'Azul estrella', 1),
(10, 'Guindo punto', 1),
(11, 'Plomo cuadro', 1),
(12, 'Celeste punto', 1),
(13, 'Celeste linea', 1),
(14, 'Verde Agua', 1),
(15, 'Azul cuadro', 1),
(16, 'Crema', 1),
(17, 'Blanco', 1),
(18, 'Azul', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descuentos`
--

CREATE TABLE `descuentos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `porcentaje` int(11) NOT NULL,
  `lote` varchar(15) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `descuentos`
--

INSERT INTO `descuentos` (`id`, `nombre`, `porcentaje`, `lote`) VALUES
(1, '', 40, '2022019_211250');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientos`
--

CREATE TABLE `movimientos` (
  `idmovimiento` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL,
  `idSucOrigen` int(11) NOT NULL,
  `idSucDestino` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idproducto` int(11) NOT NULL,
  `fechaCod` date NOT NULL,
  `codigo` varchar(15) CHARACTER SET latin1 NOT NULL,
  `idtalla` int(11) NOT NULL,
  `idtela` int(11) NOT NULL,
  `precio` decimal(11,2) NOT NULL,
  `idcolor` int(11) NOT NULL,
  `idcategoria` int(11) NOT NULL,
  `idsucursal` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `lote` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idproducto`, `fechaCod`, `codigo`, `idtalla`, `idtela`, `precio`, `idcolor`, `idcategoria`, `idsucursal`, `estado`, `lote`, `descripcion`) VALUES
(1, '2018-10-29', '5110', 1, 1, '250.00', 1, 1, 1, 1, '2022019_21146', ''),
(2, '2018-10-29', '5106', 2, 1, '250.00', 1, 1, 1, 1, '2022019_21146', ''),
(3, '2018-10-29', '5105', 2, 1, '250.00', 1, 1, 1, 1, '2022019_21146', ''),
(4, '2018-10-29', '5090', 3, 1, '250.00', 1, 1, 1, 1, '2022019_21146', ''),
(5, '2018-10-29', '5086', 3, 1, '250.00', 1, 1, 1, 1, '2022019_21146', ''),
(6, '2018-10-29', '5095', 4, 1, '250.00', 1, 1, 1, 1, '2022019_21146', ''),
(7, '2018-10-29', '5096', 4, 1, '250.00', 1, 1, 1, 1, '2022019_21146', ''),
(8, '2018-10-29', '5082', 5, 1, '250.00', 1, 1, 1, 1, '2022019_21146', ''),
(9, '2018-10-29', '5085', 5, 1, '250.00', 1, 1, 1, 1, '2022019_21146', ''),
(10, '2018-10-29', '5079', 6, 1, '250.00', 1, 1, 1, 1, '2022019_21146', ''),
(11, '2018-10-29', '5173', 1, 1, '250.00', 2, 1, 1, 1, '2022019_21146', ''),
(12, '2018-10-29', '5176', 2, 1, '250.00', 2, 1, 1, 1, '2022019_21146', ''),
(13, '2018-10-29', '5175', 2, 1, '250.00', 2, 1, 1, 1, '2022019_21146', ''),
(14, '2018-10-29', '5184', 3, 1, '250.00', 2, 1, 1, 1, '2022019_21146', ''),
(15, '2018-10-29', '5186', 3, 1, '250.00', 2, 1, 1, 1, '2022019_21146', ''),
(16, '2018-10-29', '5190', 4, 1, '250.00', 2, 1, 1, 1, '2022019_21146', ''),
(17, '2018-10-29', '5189', 4, 1, '250.00', 2, 1, 1, 1, '2022019_21146', ''),
(18, '2018-10-29', '5193', 4, 1, '250.00', 2, 1, 1, 1, '2022019_21146', ''),
(19, '2018-10-29', '5195', 5, 1, '250.00', 2, 1, 1, 1, '2022019_21146', ''),
(20, '2018-11-23', '5232', 1, 2, '250.00', 3, 1, 1, 1, '2022019_211250', ''),
(21, '2018-11-23', '5233', 2, 2, '250.00', 3, 1, 1, 1, '2022019_211250', ''),
(22, '2018-11-23', '5234', 3, 2, '250.00', 3, 1, 1, 1, '2022019_211250', ''),
(23, '2018-11-23', '5235', 3, 2, '250.00', 3, 1, 1, 1, '2022019_211250', ''),
(24, '2018-11-23', '5236', 3, 2, '250.00', 3, 1, 1, 1, '2022019_211250', ''),
(25, '2018-11-23', '5299', 4, 2, '250.00', 3, 1, 1, 1, '2022019_211250', ''),
(26, '2018-11-23', '5237', 4, 2, '250.00', 3, 1, 1, 1, '2022019_211250', ''),
(27, '2018-11-23', '5134', 3, 2, '250.00', 4, 1, 1, 1, '2022019_211250', ''),
(28, '2018-11-23', '5135', 3, 2, '250.00', 4, 1, 1, 1, '2022019_211250', ''),
(29, '2018-11-23', '5157', 3, 2, '250.00', 4, 1, 1, 1, '2022019_211250', ''),
(30, '2018-11-23', '5150', 3, 2, '250.00', 5, 1, 1, 1, '2022019_211250', ''),
(31, '2018-11-23', '5152', 3, 2, '250.00', 5, 1, 1, 1, '2022019_211250', ''),
(32, '2018-11-23', '5156', 3, 2, '250.00', 5, 1, 1, 1, '2022019_211250', ''),
(33, '2018-11-23', '5154', 4, 2, '250.00', 5, 1, 1, 1, '2022019_211250', ''),
(34, '2018-11-23', '5224', 1, 2, '250.00', 3, 1, 1, 1, '2022019_211250', ''),
(35, '2018-11-23', '5225', 1, 2, '250.00', 3, 1, 1, 1, '2022019_211250', ''),
(36, '2018-11-23', '5218', 2, 2, '250.00', 3, 1, 1, 1, '2022019_211250', ''),
(37, '2018-11-23', '5326', 4, 2, '250.00', 3, 1, 1, 1, '2022019_211250', ''),
(38, '2018-11-23', '5329', 6, 2, '250.00', 3, 1, 1, 1, '2022019_211250', ''),
(39, '2018-11-23', '5217', 2, 2, '250.00', 3, 1, 1, 1, '2022019_211250', ''),
(40, '2018-11-23', '5216', 3, 2, '250.00', 3, 1, 1, 1, '2022019_211250', ''),
(41, '2018-11-23', '5215', 4, 2, '250.00', 3, 1, 1, 1, '2022019_211250', ''),
(42, '2017-12-04', '4809', 1, 2, '250.00', 8, 1, 1, 1, '2022019_211250', ''),
(43, '2017-12-04', '4811', 1, 2, '250.00', 8, 1, 1, 1, '2022019_211250', ''),
(44, '2017-12-04', '4808', 1, 2, '250.00', 8, 1, 1, 1, '2022019_211250', ''),
(45, '2017-12-04', '4823', 3, 2, '250.00', 8, 1, 1, 1, '2022019_211250', ''),
(46, '2017-12-04', '4827', 3, 2, '250.00', 8, 1, 1, 1, '2022019_211250', ''),
(47, '2017-12-04', '4829', 3, 2, '250.00', 8, 1, 1, 1, '2022019_211250', ''),
(48, '2017-12-04', '4832', 4, 2, '250.00', 8, 1, 1, 1, '2022019_211250', ''),
(49, '2017-12-04', '4830', 4, 2, '250.00', 8, 1, 1, 1, '2022019_211250', ''),
(50, '2017-12-04', '4688', 2, 2, '250.00', 6, 1, 1, 1, '2022019_211250', ''),
(51, '2017-12-04', '4679', 3, 2, '250.00', 6, 1, 1, 1, '2022019_211250', ''),
(52, '2017-12-04', '4675', 4, 2, '250.00', 6, 1, 1, 1, '2022019_211250', ''),
(53, '2017-12-04', '4528', 1, 2, '250.00', 11, 1, 1, 1, '2022019_211250', ''),
(54, '2017-12-04', '4530', 3, 2, '250.00', 11, 1, 1, 1, '2022019_211250', ''),
(55, '2017-12-04', '4531', 4, 2, '250.00', 11, 1, 1, 1, '2022019_211250', ''),
(56, '2017-12-04', '4522', 2, 2, '250.00', 11, 1, 1, 1, '2022019_211250', ''),
(57, '2017-12-04', '4527', 1, 2, '250.00', 11, 1, 1, 1, '2022019_211250', ''),
(58, '2017-12-05', '4859', 5, 1, '250.00', 12, 1, 1, 1, '2022019_211250', ''),
(59, '2017-12-05', '7852', 4, 1, '250.00', 12, 1, 1, 1, '2022019_211250', ''),
(60, '2017-12-05', '4861', 3, 1, '250.00', 12, 1, 1, 1, '2022019_211250', ''),
(61, '2017-12-05', '4845', 2, 1, '250.00', 12, 1, 1, 1, '2022019_211250', ''),
(62, '2017-12-05', '4851', 2, 1, '250.00', 12, 1, 1, 1, '2022019_211250', ''),
(63, '2017-11-30', '4725', 4, 2, '250.00', 10, 1, 1, 1, '2022019_211250', ''),
(64, '2017-11-30', '4721', 4, 2, '250.00', 10, 1, 1, 1, '2022019_211250', ''),
(65, '2017-11-30', '4723', 4, 2, '250.00', 10, 1, 1, 1, '2022019_211250', ''),
(66, '2017-11-30', '4730', 3, 2, '250.00', 10, 1, 1, 1, '2022019_211250', ''),
(67, '2017-11-30', '4739', 2, 2, '250.00', 10, 1, 1, 1, '2022019_211250', ''),
(68, '2017-11-30', '4738', 2, 2, '250.00', 10, 1, 1, 1, '2022019_211250', ''),
(69, '2017-11-30', '4734', 2, 2, '250.00', 10, 1, 1, 1, '2022019_211250', ''),
(70, '2017-11-30', '4383', 2, 2, '250.00', 9, 1, 1, 1, '2022019_211250', ''),
(71, '2017-11-30', '4388', 2, 2, '250.00', 9, 1, 1, 1, '2022019_211250', ''),
(72, '2017-11-30', '4387', 2, 2, '250.00', 9, 1, 1, 1, '2022019_211250', ''),
(73, '2017-11-30', '4376', 3, 2, '250.00', 9, 1, 1, 1, '2022019_211250', ''),
(74, '2017-11-30', '4372', 3, 2, '250.00', 9, 1, 1, 1, '2022019_211250', ''),
(75, '2017-11-30', '4382', 1, 2, '250.00', 9, 1, 1, 1, '2022019_211250', ''),
(76, '2017-11-30', '4380', 1, 2, '250.00', 9, 1, 1, 1, '2022019_211250', ''),
(77, '2017-11-30', '4381', 1, 2, '250.00', 9, 1, 1, 1, '2022019_211250', ''),
(78, '2017-11-30', '4375', 3, 2, '250.00', 9, 1, 1, 1, '2022019_211250', ''),
(79, '2017-11-30', '4394', 4, 2, '250.00', 9, 1, 1, 1, '2022019_211250', ''),
(80, '2017-11-30', '4391', 4, 2, '250.00', 9, 1, 1, 1, '2022019_211250', ''),
(81, '2017-11-30', '4389', 4, 2, '250.00', 9, 1, 1, 1, '2022019_211250', ''),
(82, '2018-10-29', '5143', 4, 2, '250.00', 13, 1, 1, 1, '2022019_211250', ''),
(83, '2018-10-29', '5137', 4, 2, '250.00', 13, 1, 1, 1, '2022019_211250', ''),
(84, '2018-10-29', '5140', 3, 2, '250.00', 13, 1, 1, 1, '2022019_211250', ''),
(85, '2018-10-29', '5145', 4, 2, '250.00', 13, 1, 1, 1, '2022019_211250', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursales`
--

CREATE TABLE `sucursales` (
  `idsucursales` int(11) NOT NULL,
  `nombre` varchar(50) CHARACTER SET latin1 NOT NULL,
  `direccion` varchar(150) CHARACTER SET latin1 NOT NULL,
  `condicion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `sucursales`
--

INSERT INTO `sucursales` (`idsucursales`, `nombre`, `direccion`, `condicion`) VALUES
(1, 'Zona Sur', 'San miguel', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tallas`
--

CREATE TABLE `tallas` (
  `idtalla` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tallas`
--

INSERT INTO `tallas` (`idtalla`, `nombre`, `estado`) VALUES
(1, '15', 1),
(2, '15.5', 1),
(3, '16', 1),
(4, '16.5', 1),
(5, '17', 1),
(6, '17.5', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telas`
--

CREATE TABLE `telas` (
  `idtela` int(11) NOT NULL,
  `nombre` varchar(50) CHARACTER SET latin1 NOT NULL,
  `descripcion` varchar(150) CHARACTER SET latin1 NOT NULL,
  `condicion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `telas`
--

INSERT INTO `telas` (`idtela`, `nombre`, `descripcion`, `condicion`) VALUES
(1, 'Creditex', '', 1),
(2, 'TXC', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` enum('admin','user') COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `type`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin@gmail.com', 'admin@gmail.com', '$2y$10$dq.wWUmdui8v.0poUIKFq.RumObsXA/9KqOCXHgrdSmv3ucLWn15G', 'admin', 'QLBTUi0owOPzsTRHKqnF0RLLEcoqaOSyTYBsV8Shko0iRO4DGm4i1MmVKMHj', '2018-05-16 11:23:57', '2019-02-07 00:38:57'),
(2, 'user@user.com', 'user@user.com', '$2y$12$/wYR2/ioCcCgswhMO2RoCubTF01.EwU4VWj66mk9NJOVZcXvU9gKe', 'user', 'GIQVrEyiOOyHD41zuheYGpHlQrj3gApqMor3fQGjN2AI2AKonuJiDoCip3FE', '2018-05-16 11:25:17', '2019-02-07 00:41:40'),
(3, 'pruebaAdmin', 'pruebaAdmin@gmail.com', '$2y$10$WkfGy8/gBpraFnFng.qjzu8j9Wrb4UcOnuBjYcmbqd7tXxSI4uwBS', 'admin', 'Ur6bp6fW0jKt3qYJl1p4ZsxOuOUQPXhat7HlwLapD2nXM872L2a5oew6ikvq', '2018-05-17 04:00:00', '2018-05-17 04:41:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `fechaVenta` date NOT NULL,
  `tipoDoc` int(11) NOT NULL,
  `numDoc` int(11) NOT NULL,
  `docHistorial` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `cliente` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `idproducto` int(11) NOT NULL,
  `costoVenta` decimal(11,0) NOT NULL,
  `saldo` decimal(11,0) NOT NULL,
  `ingreso` decimal(11,0) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventasaldo`
--

CREATE TABLE `ventasaldo` (
  `id` int(11) NOT NULL,
  `idventa` int(11) NOT NULL,
  `ingreso` decimal(11,0) NOT NULL,
  `fecha` date NOT NULL,
  `tipoDoc` int(11) NOT NULL,
  `numDoc` int(11) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `ventas_detalle`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `ventas_detalle` (
`id` int(11)
,`fechaVenta` date
,`ingreso` decimal(11,0)
,`codigo` varchar(15)
,`categoria` varchar(50)
,`color` varchar(50)
,`sucursal` varchar(50)
,`talla` varchar(50)
,`tela` varchar(50)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `ventas_detalle`
--
DROP TABLE IF EXISTS `ventas_detalle`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ventas_detalle`  AS  select `v`.`id` AS `id`,`v`.`fechaVenta` AS `fechaVenta`,`v`.`ingreso` AS `ingreso`,`p`.`codigo` AS `codigo`,`c`.`nombre` AS `categoria`,`cl`.`nombre` AS `color`,`s`.`nombre` AS `sucursal`,`t`.`nombre` AS `talla`,`tl`.`nombre` AS `tela` from ((((((`productos` `p` join `ventas` `v` on((`v`.`idproducto` = `p`.`idproducto`))) join `categorias` `c` on((`c`.`idcategoria` = `p`.`idcategoria`))) join `color` `cl` on((`cl`.`idcolor` = `p`.`idcolor`))) join `sucursales` `s` on((`s`.`idsucursales` = `p`.`idsucursal`))) join `tallas` `t` on((`t`.`idtalla` = `p`.`idtalla`))) join `telas` `tl` on((`tl`.`idtela` = `p`.`idtela`))) where (`v`.`estado` = 1) ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`idcategoria`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`idcolor`);

--
-- Indices de la tabla `descuentos`
--
ALTER TABLE `descuentos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `lote` (`lote`);

--
-- Indices de la tabla `movimientos`
--
ALTER TABLE `movimientos`
  ADD PRIMARY KEY (`idmovimiento`),
  ADD KEY `idproducto` (`idproducto`),
  ADD KEY `idSucOrigen` (`idSucOrigen`),
  ADD KEY `idSucDestino` (`idSucDestino`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idproducto`),
  ADD KEY `idcategoria` (`idcategoria`),
  ADD KEY `idtela` (`idtela`),
  ADD KEY `idsucursal` (`idsucursal`),
  ADD KEY `idtalla` (`idtalla`),
  ADD KEY `idcolor` (`idcolor`);

--
-- Indices de la tabla `sucursales`
--
ALTER TABLE `sucursales`
  ADD PRIMARY KEY (`idsucursales`);

--
-- Indices de la tabla `tallas`
--
ALTER TABLE `tallas`
  ADD PRIMARY KEY (`idtalla`);

--
-- Indices de la tabla `telas`
--
ALTER TABLE `telas`
  ADD PRIMARY KEY (`idtela`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idproducto` (`idproducto`);

--
-- Indices de la tabla `ventasaldo`
--
ALTER TABLE `ventasaldo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idventa` (`idventa`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `idcategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `color`
--
ALTER TABLE `color`
  MODIFY `idcolor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `descuentos`
--
ALTER TABLE `descuentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `movimientos`
--
ALTER TABLE `movimientos`
  MODIFY `idmovimiento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idproducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT de la tabla `sucursales`
--
ALTER TABLE `sucursales`
  MODIFY `idsucursales` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tallas`
--
ALTER TABLE `tallas`
  MODIFY `idtalla` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `telas`
--
ALTER TABLE `telas`
  MODIFY `idtela` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ventasaldo`
--
ALTER TABLE `ventasaldo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `movimientos`
--
ALTER TABLE `movimientos`
  ADD CONSTRAINT `movimientos_ibfk_1` FOREIGN KEY (`idproducto`) REFERENCES `productos` (`idproducto`),
  ADD CONSTRAINT `movimientos_ibfk_2` FOREIGN KEY (`idSucOrigen`) REFERENCES `sucursales` (`idsucursales`),
  ADD CONSTRAINT `movimientos_ibfk_3` FOREIGN KEY (`idSucDestino`) REFERENCES `sucursales` (`idsucursales`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`idcategoria`) REFERENCES `categorias` (`idcategoria`),
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`idtela`) REFERENCES `telas` (`idtela`),
  ADD CONSTRAINT `productos_ibfk_3` FOREIGN KEY (`idsucursal`) REFERENCES `sucursales` (`idsucursales`),
  ADD CONSTRAINT `productos_ibfk_4` FOREIGN KEY (`idtalla`) REFERENCES `tallas` (`idtalla`),
  ADD CONSTRAINT `productos_ibfk_5` FOREIGN KEY (`idcolor`) REFERENCES `color` (`idcolor`);

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`idproducto`) REFERENCES `productos` (`idproducto`);

--
-- Filtros para la tabla `ventasaldo`
--
ALTER TABLE `ventasaldo`
  ADD CONSTRAINT `ventasaldo_ibfk_1` FOREIGN KEY (`idventa`) REFERENCES `ventas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
