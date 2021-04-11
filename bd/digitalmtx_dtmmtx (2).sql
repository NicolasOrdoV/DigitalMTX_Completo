-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-04-2021 a las 05:40:48
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
-- Base de datos: `digitalmtx_dtmmtx`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dtm_auditoria`
--

CREATE TABLE `dtm_auditoria` (
  `id_au` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `hora` varchar(20) DEFAULT NULL,
  `nombre_cliente` varchar(50) DEFAULT NULL,
  `identificacion_cliente` varchar(50) DEFAULT NULL,
  `telefono_cliente` varchar(50) DEFAULT NULL,
  `consecutivo` varchar(20) DEFAULT NULL,
  `direccion_cliente` varchar(50) DEFAULT NULL,
  `correo_cliente` varchar(50) DEFAULT NULL,
  `observacion_cliente` text DEFAULT NULL,
  `observacion_equipo` text DEFAULT NULL,
  `fecha_pactada` date DEFAULT NULL,
  `tecnico_asignado` varchar(50) DEFAULT NULL,
  `monto` bigint(20) DEFAULT NULL,
  `monto_final` bigint(20) DEFAULT NULL,
  `codigo_producto` int(11) DEFAULT NULL,
  `tipo_servicio` varchar(50) DEFAULT NULL,
  `serie` varchar(50) DEFAULT NULL,
  `tipo_equipo` varchar(50) DEFAULT NULL,
  `marca` varchar(50) DEFAULT NULL,
  `modelo` text DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `fecha_tec` date DEFAULT NULL,
  `hora_tec` date DEFAULT NULL,
  `informe_tercero` text DEFAULT NULL,
  `nombre_tercero` varchar(100) DEFAULT NULL,
  `orden_tercero` varchar(50) DEFAULT NULL,
  `monto_tercero` varchar(50) DEFAULT NULL,
  `observacion_razon_tercero` text DEFAULT NULL,
  `id_empleado_fk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `dtm_auditoria`
--
ALTER TABLE `dtm_auditoria`
  ADD PRIMARY KEY (`id_au`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `dtm_auditoria`
--
ALTER TABLE `dtm_auditoria`
  MODIFY `id_au` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
