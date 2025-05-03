-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-05-2025 a las 16:00:33
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inventario`
--
CREATE DATABASE IF NOT EXISTS `inventario` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci;
USE `inventario`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cabecera_orden_compra`
--

CREATE TABLE `cabecera_orden_compra` (
  `id_cabecera_orden_compra` int(11) NOT NULL,
  `nro_orden_compra` varchar(40) NOT NULL,
  `usuario_responsable_id` int(11) NOT NULL,
  `fecha_orden_compra` date DEFAULT current_timestamp(),
  `fecha_hora_creacion` datetime NOT NULL DEFAULT current_timestamp(),
  `fecha_hora_ult_modificacion` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_producto`
--

CREATE TABLE `categoria_producto` (
  `id_categoria_producto` int(11) NOT NULL,
  `nombre_categoria_producto` varchar(40) NOT NULL,
  `estado_categoria_producto_id` int(11) NOT NULL,
  `fecha_hora_creacion` datetime NOT NULL DEFAULT current_timestamp(),
  `fecha_hora_ult_modificacion` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_orden_compra`
--

CREATE TABLE `detalle_orden_compra` (
  `id_detalle_orden_compra` int(11) NOT NULL,
  `cabecera_orden_compra_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `cantidad_detalle_orden_compra` decimal(16,4) NOT NULL,
  `fecha_hora_creacion` datetime NOT NULL DEFAULT current_timestamp(),
  `fecha_hora_ult_modificacion` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `egreso_producto`
--

CREATE TABLE `egreso_producto` (
  `id_egreso_producto` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `cantidad_egreso` decimal(16,4) NOT NULL,
  `fecha_egreso` date NOT NULL DEFAULT current_timestamp(),
  `usuario_responsable_id` int(11) NOT NULL,
  `fecha_hora_creacion` datetime NOT NULL DEFAULT current_timestamp(),
  `fecha_hora_ult_modificacion` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `id_empleado` int(11) NOT NULL,
  `nombre_empleado` varchar(30) NOT NULL,
  `apellido_empleado` varchar(30) NOT NULL,
  `fecha_nacimiento_empleado` date NOT NULL,
  `edad` int(11) GENERATED ALWAYS AS (timestampdiff(YEAR,`fecha_nacimiento_empleado`,curdate())) VIRTUAL,
  `grupo_sanguineo_id` int(11) DEFAULT NULL,
  `DNI_empleado` varchar(10) NOT NULL,
  `email_personal_empleado` varchar(40) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `estado_empleado_id` int(11) NOT NULL,
  `fecha_alta_empleado` date DEFAULT NULL,
  `fecha_baja_empleado` date DEFAULT NULL,
  `fecha_hora_creacion` datetime NOT NULL DEFAULT current_timestamp(),
  `fecha_hora_ult_modificacion` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_categoria_producto`
--

CREATE TABLE `estado_categoria_producto` (
  `id_estado_categoria_producto` int(11) NOT NULL,
  `nombre_estado_categoria_producto` varchar(29) NOT NULL,
  `fecha_hora_creacion` datetime NOT NULL DEFAULT current_timestamp(),
  `fecha_hora_ult_modificacion` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_empleado`
--

CREATE TABLE `estado_empleado` (
  `id_estado_empleado` int(11) NOT NULL,
  `nombre_estado_empleado` varchar(20) NOT NULL,
  `fecha_hora_creacion` datetime NOT NULL DEFAULT current_timestamp(),
  `fecha_hora_ult_modificacion` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_producto`
--

CREATE TABLE `estado_producto` (
  `id_estado_producto` int(11) NOT NULL,
  `nombre_estado_producto` varchar(20) NOT NULL,
  `fecha_hora_creacion` datetime NOT NULL DEFAULT current_timestamp(),
  `fecha_hora_ult_modificacion` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_proveedor`
--

CREATE TABLE `estado_proveedor` (
  `id_estado_proveedor` int(11) NOT NULL,
  `nombre_estado_proveedor` varchar(20) NOT NULL,
  `fecha_hora_creacion` int(11) NOT NULL DEFAULT current_timestamp(),
  `fecha_hora_ult_modificacion` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo_sanguineo`
--

CREATE TABLE `grupo_sanguineo` (
  `id_grupo_sanguineo` int(11) NOT NULL,
  `incial_grupo_sanguineo` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historico_costo_producto`
--

CREATE TABLE `historico_costo_producto` (
  `fecha_hora_hist_costo` datetime NOT NULL DEFAULT current_timestamp(),
  `producto_id` int(11) NOT NULL,
  `usuario_responsable_id` int(11) NOT NULL,
  `precio_costo_producto` decimal(16,4) NOT NULL,
  `fecha_hora_ult_modificacion` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historico_precio_producto`
--

CREATE TABLE `historico_precio_producto` (
  `fecha_hora_hist_precio` datetime NOT NULL DEFAULT current_timestamp(),
  `producto_id` int(11) NOT NULL,
  `usuario_responsable_id` int(11) NOT NULL,
  `precio_venta_producto` decimal(16,4) NOT NULL,
  `fecha_hora_ult_modificacion` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingreso_producto`
--

CREATE TABLE `ingreso_producto` (
  `id_ingreso_producto` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `cantidad_ingreso` decimal(16,4) NOT NULL,
  `fecha_ingreso` date NOT NULL DEFAULT current_timestamp(),
  `usuario_responsable_id` int(11) NOT NULL,
  `fecha_hora_creacion` datetime NOT NULL DEFAULT current_timestamp(),
  `fecha_hora_ult_modificacion` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL,
  `proveedor_id` int(11) NOT NULL,
  `categoria_producto_id` int(11) NOT NULL,
  `tipo_unidad_id` int(11) NOT NULL,
  `codigo_producto` varchar(60) NOT NULL,
  `nombre_producto` varchar(60) NOT NULL,
  `cantidad_stock_producto` decimal(16,4) NOT NULL,
  `precio_venta_producto` decimal(16,4) NOT NULL,
  `precio_costo_producto` decimal(16,4) NOT NULL,
  `estado_producto_id` int(11) NOT NULL,
  `fecha_hora_creacion` datetime NOT NULL DEFAULT current_timestamp(),
  `fecha_hora_ult_modificacion` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id_proveedor` int(11) NOT NULL,
  `razon_social_proveedor` varchar(40) NOT NULL,
  `CUIT_proveedor` varchar(15) NOT NULL,
  `direccion_proveedor` varchar(60) NOT NULL,
  `telefono_proveedor` varchar(40) NOT NULL,
  `email_personal_proveedor` varchar(40) NOT NULL,
  `estado_proveedor_id` int(11) NOT NULL,
  `fecha_hora_creacion` datetime NOT NULL DEFAULT current_timestamp(),
  `fecha_hora_ult_modificacion` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_unidad`
--

CREATE TABLE `tipo_unidad` (
  `id_tipo_unidad` int(11) NOT NULL,
  `nombre_tipo_unidad` varchar(20) NOT NULL,
  `fecha_hora_creacion` datetime NOT NULL DEFAULT current_timestamp(),
  `fecha_hora_ult_modificacion` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id_tipo_usuario` int(11) NOT NULL,
  `nombre_tipo_usuario` varchar(15) NOT NULL,
  `fecha_hora_creacion` datetime NOT NULL DEFAULT current_timestamp(),
  `fecha_hora_ult_modificacion` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(20) NOT NULL,
  `pass_usuario` varchar(15) NOT NULL,
  `email_usuario` varchar(40) NOT NULL,
  `avatar_usuario` varchar(150) DEFAULT NULL,
  `tipo_usuario_id` int(10) NOT NULL,
  `fecha_hora_creacion` datetime NOT NULL DEFAULT current_timestamp(),
  `fecha_hora_ult_modificacion` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cabecera_orden_compra`
--
ALTER TABLE `cabecera_orden_compra`
  ADD PRIMARY KEY (`id_cabecera_orden_compra`),
  ADD UNIQUE KEY `unique_nro_orden_compra` (`nro_orden_compra`),
  ADD KEY `FK_cabecera_orden_compra_usuario` (`usuario_responsable_id`);

--
-- Indices de la tabla `categoria_producto`
--
ALTER TABLE `categoria_producto`
  ADD PRIMARY KEY (`id_categoria_producto`),
  ADD UNIQUE KEY `unique_nombre_categoria_producto` (`nombre_categoria_producto`),
  ADD KEY `FK_categoria_producto_estado_categoria_producto` (`estado_categoria_producto_id`);

--
-- Indices de la tabla `detalle_orden_compra`
--
ALTER TABLE `detalle_orden_compra`
  ADD PRIMARY KEY (`id_detalle_orden_compra`),
  ADD KEY `FK_detalle_orden_compra_cabecera` (`cabecera_orden_compra_id`),
  ADD KEY `FK_detalle_orden_compra_producto` (`producto_id`);

--
-- Indices de la tabla `egreso_producto`
--
ALTER TABLE `egreso_producto`
  ADD PRIMARY KEY (`id_egreso_producto`),
  ADD KEY `FK_egreso_producto_producto` (`producto_id`),
  ADD KEY `FK_egreso_producto_usuario` (`usuario_responsable_id`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id_empleado`),
  ADD UNIQUE KEY `unique_dni_empleado` (`DNI_empleado`),
  ADD UNIQUE KEY `unique_email_personal_empleado` (`email_personal_empleado`),
  ADD KEY `FK_empleado_usuario` (`usuario_id`),
  ADD KEY `FK_empleado_estado_empleado` (`estado_empleado_id`),
  ADD KEY `FK_empleado_grupo_sanguineo` (`grupo_sanguineo_id`);

--
-- Indices de la tabla `estado_categoria_producto`
--
ALTER TABLE `estado_categoria_producto`
  ADD PRIMARY KEY (`id_estado_categoria_producto`),
  ADD UNIQUE KEY `unique_nombre_estado_categoria_producto` (`nombre_estado_categoria_producto`) USING BTREE;

--
-- Indices de la tabla `estado_empleado`
--
ALTER TABLE `estado_empleado`
  ADD PRIMARY KEY (`id_estado_empleado`),
  ADD UNIQUE KEY `unique_nombre_estado_empleado` (`nombre_estado_empleado`);

--
-- Indices de la tabla `estado_producto`
--
ALTER TABLE `estado_producto`
  ADD PRIMARY KEY (`id_estado_producto`),
  ADD UNIQUE KEY `unique_nombre_estado_producto` (`nombre_estado_producto`);

--
-- Indices de la tabla `estado_proveedor`
--
ALTER TABLE `estado_proveedor`
  ADD PRIMARY KEY (`id_estado_proveedor`),
  ADD UNIQUE KEY `unique_nombre_estado_proveedor` (`id_estado_proveedor`);

--
-- Indices de la tabla `grupo_sanguineo`
--
ALTER TABLE `grupo_sanguineo`
  ADD PRIMARY KEY (`id_grupo_sanguineo`),
  ADD UNIQUE KEY `unique_inicial_grupo_sanguineo` (`id_grupo_sanguineo`);

--
-- Indices de la tabla `historico_costo_producto`
--
ALTER TABLE `historico_costo_producto`
  ADD PRIMARY KEY (`fecha_hora_hist_costo`,`producto_id`),
  ADD KEY `FK_historico_costo_producto_producto` (`producto_id`),
  ADD KEY `FK_historico_costo_producto_usuario` (`usuario_responsable_id`);

--
-- Indices de la tabla `historico_precio_producto`
--
ALTER TABLE `historico_precio_producto`
  ADD PRIMARY KEY (`fecha_hora_hist_precio`,`producto_id`),
  ADD KEY `FK_historico_precio_producto_producto` (`producto_id`),
  ADD KEY `FK_historico_precio_producto_usuario` (`usuario_responsable_id`);

--
-- Indices de la tabla `ingreso_producto`
--
ALTER TABLE `ingreso_producto`
  ADD PRIMARY KEY (`id_ingreso_producto`),
  ADD KEY `FK_ingreso_producto_producto` (`producto_id`),
  ADD KEY `FK_ingreso_producto_usuario` (`usuario_responsable_id`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`),
  ADD UNIQUE KEY `unique_nombre_producto` (`nombre_producto`),
  ADD UNIQUE KEY `unique_codigo_producto` (`codigo_producto`),
  ADD KEY `FK_producto_proveedor` (`proveedor_id`),
  ADD KEY `FK_producto_categoria` (`categoria_producto_id`),
  ADD KEY `FK_producto_estado_producto` (`estado_producto_id`),
  ADD KEY `FK_producto_tipo_unidad` (`tipo_unidad_id`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id_proveedor`),
  ADD UNIQUE KEY `unique_email_personal_proveedor` (`email_personal_proveedor`),
  ADD UNIQUE KEY `unique_telefono_proveedor` (`telefono_proveedor`),
  ADD UNIQUE KEY `unique_direccion_proveedor` (`direccion_proveedor`),
  ADD UNIQUE KEY `unique_cuit_proveedor` (`CUIT_proveedor`),
  ADD UNIQUE KEY `unique_razon_social_proveedor` (`razon_social_proveedor`),
  ADD KEY `FK_proveedor_estado_proveedor` (`estado_proveedor_id`);

--
-- Indices de la tabla `tipo_unidad`
--
ALTER TABLE `tipo_unidad`
  ADD PRIMARY KEY (`id_tipo_unidad`),
  ADD UNIQUE KEY `unique_nombre_tipo_unidad` (`nombre_tipo_unidad`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id_tipo_usuario`),
  ADD UNIQUE KEY `unique_nombre_tipo_usuario` (`id_tipo_usuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `unique_nombre_usuario` (`nombre_usuario`),
  ADD UNIQUE KEY `unique_email_usuario` (`email_usuario`),
  ADD KEY `FK_usuario_tipo_usuario` (`tipo_usuario_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cabecera_orden_compra`
--
ALTER TABLE `cabecera_orden_compra`
  MODIFY `id_cabecera_orden_compra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `categoria_producto`
--
ALTER TABLE `categoria_producto`
  MODIFY `id_categoria_producto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_orden_compra`
--
ALTER TABLE `detalle_orden_compra`
  MODIFY `id_detalle_orden_compra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `egreso_producto`
--
ALTER TABLE `egreso_producto`
  MODIFY `id_egreso_producto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `id_empleado` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estado_categoria_producto`
--
ALTER TABLE `estado_categoria_producto`
  MODIFY `id_estado_categoria_producto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estado_empleado`
--
ALTER TABLE `estado_empleado`
  MODIFY `id_estado_empleado` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estado_producto`
--
ALTER TABLE `estado_producto`
  MODIFY `id_estado_producto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estado_proveedor`
--
ALTER TABLE `estado_proveedor`
  MODIFY `id_estado_proveedor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `grupo_sanguineo`
--
ALTER TABLE `grupo_sanguineo`
  MODIFY `id_grupo_sanguineo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ingreso_producto`
--
ALTER TABLE `ingreso_producto`
  MODIFY `id_ingreso_producto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_unidad`
--
ALTER TABLE `tipo_unidad`
  MODIFY `id_tipo_unidad` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id_tipo_usuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cabecera_orden_compra`
--
ALTER TABLE `cabecera_orden_compra`
  ADD CONSTRAINT `FK_cabecera_orden_compra_usuario` FOREIGN KEY (`usuario_responsable_id`) REFERENCES `usuario` (`id_usuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `categoria_producto`
--
ALTER TABLE `categoria_producto`
  ADD CONSTRAINT `FK_categoria_producto_estado_categoria_producto` FOREIGN KEY (`estado_categoria_producto_id`) REFERENCES `estado_categoria_producto` (`id_estado_categoria_producto`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalle_orden_compra`
--
ALTER TABLE `detalle_orden_compra`
  ADD CONSTRAINT `FK_detalle_orden_compra_cabecera` FOREIGN KEY (`cabecera_orden_compra_id`) REFERENCES `cabecera_orden_compra` (`id_cabecera_orden_compra`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_detalle_orden_compra_producto` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id_producto`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `egreso_producto`
--
ALTER TABLE `egreso_producto`
  ADD CONSTRAINT `FK_egreso_producto_producto` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id_producto`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_egreso_producto_usuario` FOREIGN KEY (`usuario_responsable_id`) REFERENCES `usuario` (`id_usuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `FK_empleado_estado_empleado` FOREIGN KEY (`estado_empleado_id`) REFERENCES `estado_empleado` (`id_estado_empleado`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_empleado_grupo_sanguineo` FOREIGN KEY (`grupo_sanguineo_id`) REFERENCES `grupo_sanguineo` (`id_grupo_sanguineo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_empleado_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `historico_costo_producto`
--
ALTER TABLE `historico_costo_producto`
  ADD CONSTRAINT `FK_historico_costo_producto_producto` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id_producto`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_historico_costo_producto_usuario` FOREIGN KEY (`usuario_responsable_id`) REFERENCES `usuario` (`id_usuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `historico_precio_producto`
--
ALTER TABLE `historico_precio_producto`
  ADD CONSTRAINT `FK_historico_precio_producto_producto` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id_producto`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_historico_precio_producto_usuario` FOREIGN KEY (`usuario_responsable_id`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `ingreso_producto`
--
ALTER TABLE `ingreso_producto`
  ADD CONSTRAINT `FK_ingreso_producto_producto` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id_producto`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_ingreso_producto_usuario` FOREIGN KEY (`usuario_responsable_id`) REFERENCES `usuario` (`id_usuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `FK_producto_categoria` FOREIGN KEY (`categoria_producto_id`) REFERENCES `categoria_producto` (`id_categoria_producto`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_producto_estado_producto` FOREIGN KEY (`estado_producto_id`) REFERENCES `estado_producto` (`id_estado_producto`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_producto_proveedor` FOREIGN KEY (`proveedor_id`) REFERENCES `proveedor` (`id_proveedor`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_producto_tipo_unidad` FOREIGN KEY (`tipo_unidad_id`) REFERENCES `tipo_unidad` (`id_tipo_unidad`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD CONSTRAINT `FK_proveedor_estado_proveedor` FOREIGN KEY (`estado_proveedor_id`) REFERENCES `estado_proveedor` (`id_estado_proveedor`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `FK_usuario_tipo_usuario` FOREIGN KEY (`tipo_usuario_id`) REFERENCES `tipo_usuario` (`id_tipo_usuario`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
