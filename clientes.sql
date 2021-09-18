-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-08-2021 a las 21:10:30
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `clientes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_cmv_tipo_cuenta`
--

CREATE TABLE `cat_cmv_tipo_cuenta` (
  `id_cuenta` int(50) NOT NULL,
  `nombre_cuenta` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `cat_cmv_tipo_cuenta`
--

INSERT INTO `cat_cmv_tipo_cuenta` (`id_cuenta`, `nombre_cuenta`) VALUES
(1, 'Ahorro1'),
(2, 'Ahorro2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_cmv_cliente`
--

CREATE TABLE `tbl_cmv_cliente` (
  `id_cliente` int(50) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `apellido_paterno` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `apellido_materno` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `rfc` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `curp` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_alta` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_cmv_cliente`
--

INSERT INTO `tbl_cmv_cliente` (`id_cliente`, `nombre`, `apellido_paterno`, `apellido_materno`, `rfc`, `curp`, `fecha_alta`) VALUES
(1, 'Hassan', 'Ruiz', 'Carranza', 'RUH860416R22', 'RUCH860416HMNZRS01', '2021-07-01 11:39:24.000000'),
(2, 'Jose', 'Martinez', 'Carranza', 'RUH860416R23', 'RUCH860416HMNZRS02', '2021-08-01 12:44:50.000000'),
(3, 'Julio', 'Soto', 'Zamora', 'RUH860416R24', 'RUCH860416HMNZRS04', '2021-08-08 21:54:14.000000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_cmv_cliente_cuenta`
--

CREATE TABLE `tbl_cmv_cliente_cuenta` (
  `id_cliente_cuenta` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_cuenta` int(11) NOT NULL,
  `saldo_actual` decimal(10,0) NOT NULL,
  `fecha_contratacion` datetime NOT NULL,
  `fecha_ultimo_movimiento` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_cmv_cliente_cuenta`
--

INSERT INTO `tbl_cmv_cliente_cuenta` (`id_cliente_cuenta`, `id_cliente`, `id_cuenta`, `saldo_actual`, `fecha_contratacion`, `fecha_ultimo_movimiento`) VALUES
(1, 1, 1, '1000', '2021-08-23 01:24:48', '2021-08-23 01:24:48'),
(2, 2, 2, '3001', '2021-08-23 01:24:48', '2021-08-23 01:24:48'),
(3, 1, 2, '1500', '2021-08-23 20:01:57', '2021-08-23 20:01:57'),
(4, 3, 1, '1700', '2021-08-23 20:05:10', '2021-08-23 20:05:10'),
(5, 3, 2, '1700', '2021-08-23 20:05:10', '2021-08-23 20:05:10');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cat_cmv_tipo_cuenta`
--
ALTER TABLE `cat_cmv_tipo_cuenta`
  ADD PRIMARY KEY (`id_cuenta`);

--
-- Indices de la tabla `tbl_cmv_cliente`
--
ALTER TABLE `tbl_cmv_cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `tbl_cmv_cliente_cuenta`
--
ALTER TABLE `tbl_cmv_cliente_cuenta`
  ADD PRIMARY KEY (`id_cliente_cuenta`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_cuenta` (`id_cuenta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cat_cmv_tipo_cuenta`
--
ALTER TABLE `cat_cmv_tipo_cuenta`
  MODIFY `id_cuenta` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbl_cmv_cliente`
--
ALTER TABLE `tbl_cmv_cliente`
  MODIFY `id_cliente` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `tbl_cmv_cliente_cuenta`
--
ALTER TABLE `tbl_cmv_cliente_cuenta`
  MODIFY `id_cliente_cuenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_cmv_cliente_cuenta`
--
ALTER TABLE `tbl_cmv_cliente_cuenta`
  ADD CONSTRAINT `tbl_cmv_cliente_cuenta_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `tbl_cmv_cliente` (`id_cliente`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_cmv_cliente_cuenta_ibfk_2` FOREIGN KEY (`id_cuenta`) REFERENCES `cat_cmv_tipo_cuenta` (`id_cuenta`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
