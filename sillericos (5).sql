-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-09-2018 a las 17:43:21
-- Versión del servidor: 10.1.35-MariaDB
-- Versión de PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sillericos`
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
(5, 'Trajes', 1),
(6, 'Camisas', 1),
(7, 'Pantalon', 1),
(8, 'Sport', 1),
(9, 'Corbatas', 1),
(10, 'Sacos', 1),
(11, 'Gato', 1),
(12, 'TV', 1),
(13, 'Categoria de prueba', 0),
(14, 'prueba categoria 1', 0),
(15, 'Sucursal de prueba', 1);

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
(1, 'Marengo', 1),
(2, 'Azul', 1),
(3, 'Rosado', 0),
(4, 'Rosado', 1),
(5, 'Plata', 0);

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

--
-- Volcado de datos para la tabla `movimientos`
--

INSERT INTO `movimientos` (`idmovimiento`, `idproducto`, `idSucOrigen`, `idSucDestino`, `fecha`) VALUES
(1, 1, 1, 2, '2018-09-08'),
(2, 2, 2, 3, '2018-09-08');

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
  `descripcion` text CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idproducto`, `fechaCod`, `codigo`, `idtalla`, `idtela`, `precio`, `idcolor`, `idcategoria`, `idsucursal`, `estado`, `descripcion`) VALUES
(1, '2018-06-01', 'ptl-0002', 4, 1, '1220.00', 4, 5, 4, 1, ''),
(2, '2018-07-01', '8', 1, 5, '100.00', 1, 7, 3, 1, ''),
(3, '2018-07-01', '9', 1, 5, '100.00', 1, 7, 3, 1, ''),
(4, '2018-07-01', '10', 1, 5, '100.00', 1, 7, 3, 1, ''),
(5, '2018-07-01', '11', 1, 5, '100.00', 1, 7, 3, 1, ''),
(6, '2018-07-01', '12', 1, 5, '100.00', 1, 7, 3, 1, ''),
(7, '2018-07-01', '13', 1, 5, '100.00', 1, 7, 3, 1, ''),
(8, '2018-07-01', '14', 1, 5, '100.00', 1, 7, 3, 1, '');

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
(1, 'Arce', 'av. arce', 1),
(2, 'Genaro', 'Genaro Sangines', 1),
(3, 'Zona Sur', 'Calacoto', 1),
(4, 'Capitan', 'Capitan Ravelo', 1),
(5, 'Categoria ', 'alguna direccion que ni existe', 0),
(6, 'Categoria de prueba', 'alguna direccion que ni existe', 0);

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
(1, 's/t', 0),
(2, '55', 1),
(3, '54', 1),
(4, '53', 1);

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
(1, 'B Angelo', '', 1),
(2, 'Barrigton100', '', 1),
(3, 'Barrington', '', 1),
(5, 'Bonino', '', 1),
(6, 'COLOM', '', 1),
(7, 'Colom Sillerico', '', 1),
(8, 'Colom/100', '', 1),
(9, 'Don Manuel', '', 1),
(10, 'Espanol', '', 1),
(11, 'Espanol Sillerico', '', 1),
(12, 'Fibratex', '', 1),
(13, 'Gold', '', 1),
(14, 'italiana', '', 1),
(15, 'Lanitex', '', 1),
(16, 'Microfibra', '', 1),
(17, 'Paylana', '', 1),
(18, 'Tasmani 120', '', 1),
(19, 'Tropical cardif', '', 1),
(20, 'Tropical espanol', '', 1),
(21, 'Vitali', '', 1),
(22, 'Kaki', '', 1),
(23, 's/t', '', 1),
(35, 'Nuevo Tela de Prueba', '', 1);

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
(1, 'admin@gmail.com', 'admin@gmail.com', '$2y$10$dq.wWUmdui8v.0poUIKFq.RumObsXA/9KqOCXHgrdSmv3ucLWn15G', 'admin', 'mTnZ0NX7eVPuXjtLWGB1SxpOOsPDXDsLDkl50SwuUQRH4jDGt9X7mslgxSO1', '2018-05-16 11:23:57', '2018-09-11 05:37:45'),
(2, 'user@user.com', 'user@user.com', '$2y$12$/wYR2/ioCcCgswhMO2RoCubTF01.EwU4VWj66mk9NJOVZcXvU9gKe', 'user', 'Ryy9aQTk6fc1TOYLlfKSsyypxpfTEMgIeScnFQCnPmBEyK97UOfoPNWT9Z10', '2018-05-16 11:25:17', '2018-09-07 05:21:21'),
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

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `fechaVenta`, `tipoDoc`, `numDoc`, `docHistorial`, `cliente`, `idproducto`, `costoVenta`, `saldo`, `ingreso`, `estado`) VALUES
(3, '2018-07-01', 0, 12, '', 'Aker', 1, '1000', '0', '1000', 1),
(4, '2018-07-02', 0, 23, '', 'Gael', 4, '1500', '500', '1000', 1);

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
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `idcategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `color`
--
ALTER TABLE `color`
  MODIFY `idcolor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `movimientos`
--
ALTER TABLE `movimientos`
  MODIFY `idmovimiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idproducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `sucursales`
--
ALTER TABLE `sucursales`
  MODIFY `idsucursales` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tallas`
--
ALTER TABLE `tallas`
  MODIFY `idtalla` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `telas`
--
ALTER TABLE `telas`
  MODIFY `idtela` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
