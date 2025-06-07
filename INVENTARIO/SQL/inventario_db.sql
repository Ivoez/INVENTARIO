-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-06-2025 a las 18:25:17
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
-- Base de datos: `inventario_db`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_usuario` (IN `param_nombre_usuario` VARCHAR(20), IN `param_pass_usuario` VARCHAR(255), IN `param_email_usuario` VARCHAR(100), IN `param_avatar_usuario` VARCHAR(150), IN `param_tipo_usuario` VARCHAR(15), IN `param_estado_usuario` VARCHAR(20), OUT `resultado_proceso` INT, OUT `mensaje_proceso` VARCHAR(255))   BEGIN

    DECLARE existe_nombre_usuario INT;
    DECLARE existe_email_usuario INT;
    DECLARE existe_avatar_usuario INT;
    
    DECLARE existe_tipo_usuario INT;
    DECLARE existe_estado_usuario INT;
    
    DECLARE id_tipo_usuario_param INT;
    DECLARE id_estado_usuario_param INT;

    -- Verificar existencia en base de datos
    SELECT EXISTS(SELECT 1 FROM usuario WHERE nombre_usuario = param_nombre_usuario) INTO existe_nombre_usuario;
    SELECT EXISTS(SELECT 1 FROM usuario WHERE email_usuario = param_email_usuario) INTO existe_email_usuario;
    SELECT EXISTS(SELECT 1 FROM usuario WHERE avatar_usuario = param_avatar_usuario) INTO existe_avatar_usuario;
    
    SELECT EXISTS(SELECT 1 FROM tipo_usuario WHERE nombre_tipo_usuario = param_tipo_usuario) INTO existe_tipo_usuario;
    SELECT EXISTS(SELECT 1 FROM estado_usuario WHERE nombre_estado_usuario = param_estado_usuario) INTO existe_estado_usuario;



    -- Validaciones
    IF existe_nombre_usuario > 0 THEN
        SET resultado_proceso = 0;
        SET mensaje_proceso = 'nombre_usuario existente';
    ELSEIF existe_email_usuario > 0 THEN
        SET resultado_proceso = 0;
        SET mensaje_proceso = 'email_usuario existente';
    ELSEIF existe_avatar_usuario > 0 THEN
        SET resultado_proceso = 0;
        SET mensaje_proceso = 'avatar_usuario existente';
    ELSEIF param_tipo_usuario IS NOT NULL AND existe_tipo_usuario = 0 THEN
        SET resultado_proceso = 0;
        SET mensaje_proceso = 'nombre_tipo_usuario incorrecto';   
    ELSEIF param_estado_usuario IS NOT NULL AND existe_estado_usuario = 0 THEN
        SET resultado_proceso = 0;
        SET mensaje_proceso = 'nombre_estado_usuario incorrecto';
    ELSE
    	SELECT id_tipo_usuario INTO id_tipo_usuario_param FROM tipo_usuario WHERE nombre_tipo_usuario = COALESCE(param_tipo_usuario, 'Usuario');
        SELECT id_estado_usuario INTO id_estado_usuario_param FROM estado_usuario WHERE nombre_estado_usuario = COALESCE(param_estado_usuario, 'Activo');
    
        INSERT INTO usuario (nombre_usuario, pass_usuario, email_usuario, avatar_usuario, tipo_usuario_id, estado_usuario_id)
        VALUES (param_nombre_usuario, aes_encrypt(param_pass_usuario, 'keyword'), param_email_usuario,  COALESCE(NULLIF(param_avatar_usuario, ''), 'default.png'), id_tipo_usuario_param, id_estado_usuario_param);

        SET resultado_proceso = 1;
        SET mensaje_proceso = 'Inserción de usuario correcta';
    END IF;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `list_estado_empleado` ()   BEGIN
    SELECT nombre_estado_empleado
    FROM estado_empleado;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `list_estado_producto` ()   BEGIN
    SELECT nombre_estado_producto
    FROM estado_producto;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `list_estado_proveedor` ()   BEGIN
    SELECT nombre_estado_proveedor
    FROM estado_proveedor;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `list_estado_usuario` ()   BEGIN
    SELECT nombre_estado_usuario
    FROM estado_usuario;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `list_tipo_usuario` ()   BEGIN
    SELECT nombre_tipo_usuario FROM tipo_usuario;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `login` (IN `param_nombre_usuario` VARCHAR(20), IN `param_pass_usuario` VARCHAR(255), OUT `param_nombre_tipo_usuario` VARCHAR(15), OUT `resultado_proceso` INT, OUT `mensaje_proceso` VARCHAR(255))   BEGIN

    DECLARE existe_nombre_usuario INT;
    DECLARE pass_usuario_buscado VARCHAR(255);
    DECLARE id_tipo_usuario_buscado INT;  
    DECLARE nombre_tipo_usuario_buscado VARCHAR(20);
    
    -- Verificar existencia en base de datos
    SELECT EXISTS(SELECT 1 FROM usuario WHERE nombre_usuario = param_nombre_usuario) INTO existe_nombre_usuario;
    
    -- Validaciones
    IF existe_nombre_usuario < 1 THEN
        SET resultado_proceso = 0;
        SET mensaje_proceso = 'nombre_usuario no existente';
    ELSE
        SELECT aes_decrypt(pass_usuario, 'keyword') INTO pass_usuario_buscado FROM usuario WHERE nombre_usuario = param_nombre_usuario;
        IF pass_usuario_buscado <> param_pass_usuario THEN
        	SET resultado_proceso = 0;
        	SET mensaje_proceso = 'pass_usuario incorrecta';
        ELSE
        	SELECT tipo_usuario_id INTO id_tipo_usuario_buscado 
            	FROM usuario 
                	WHERE nombre_usuario = param_nombre_usuario;
            SELECT IFNULL(nombre_tipo_usuario, 'Desconocido') INTO nombre_tipo_usuario_buscado
            	FROM tipo_usuario
                	WHERE id_tipo_usuario = id_tipo_usuario_buscado;
        	SET resultado_proceso = 1;
        	SET mensaje_proceso = 'Login correcto';
            SET param_nombre_tipo_usuario = nombre_tipo_usuario_buscado;
        END IF; 
    END IF;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cabecera_orden_compra`
--

CREATE TABLE `cabecera_orden_compra` (
  `id_cabecera_orden_compra` int(11) NOT NULL,
  `nro_orden_compra` varchar(40) NOT NULL,
  `usuario_responsable_id` int(11) NOT NULL,
  `fecha_orden_compra` date DEFAULT NULL,
  `proveedor_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_producto`
--

CREATE TABLE `categoria_producto` (
  `id_categoria_producto` int(11) NOT NULL,
  `nombre_categoria_producto` varchar(40) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_orden_compra`
--

CREATE TABLE `detalle_orden_compra` (
  `id_detalle_orden_compra` int(11) NOT NULL,
  `cabecera_orden_compra_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `cantidad_detalle_orden_compra` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
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
  `DNI_empleado` varchar(10) NOT NULL,
  `email_personal_empleado` varchar(40) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `estado_empleado_id` int(11) NOT NULL,
  `fecha_alta_empleado` date DEFAULT NULL,
  `fecha_baja_empleado` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_empleado`
--

CREATE TABLE `estado_empleado` (
  `id_estado_empleado` int(11) NOT NULL,
  `nombre_estado_empleado` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `estado_empleado`
--

INSERT INTO `estado_empleado` (`id_estado_empleado`, `nombre_estado_empleado`, `created_at`, `updated_at`) VALUES
(1, 'Activo', '2025-05-17 00:39:54', '2025-05-17 00:39:54'),
(2, 'Inactivo', '2025-05-17 00:39:54', '2025-05-17 00:39:54'),
(3, 'Suspendido', '2025-05-17 00:39:54', '2025-05-17 00:39:54'),
(4, 'En Licencia', '2025-05-17 00:39:54', '2025-05-17 00:39:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_producto`
--

CREATE TABLE `estado_producto` (
  `id_estado_producto` int(11) NOT NULL,
  `nombre_estado_producto` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `estado_producto`
--

INSERT INTO `estado_producto` (`id_estado_producto`, `nombre_estado_producto`, `created_at`, `updated_at`) VALUES
(1, 'Activo', '2025-05-17 00:42:55', '2025-05-17 00:42:55'),
(2, 'Inactivo', '2025-05-17 00:42:55', '2025-05-17 00:42:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_proveedor`
--

CREATE TABLE `estado_proveedor` (
  `id_estado_proveedor` int(11) NOT NULL,
  `nombre_estado_proveedor` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `estado_proveedor`
--

INSERT INTO `estado_proveedor` (`id_estado_proveedor`, `nombre_estado_proveedor`, `created_at`, `updated_at`) VALUES
(1, 'Activo', '2025-05-17 00:41:55', '2025-05-17 00:41:55'),
(2, 'Inactivo', '2025-05-17 00:41:55', '2025-05-17 00:41:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_usuario`
--

CREATE TABLE `estado_usuario` (
  `id_estado_usuario` int(11) NOT NULL,
  `nombre_estado_usuario` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `estado_usuario`
--

INSERT INTO `estado_usuario` (`id_estado_usuario`, `nombre_estado_usuario`, `created_at`, `updated_at`) VALUES
(1, 'Activo', '2025-05-16 23:18:38', '2025-05-16 23:18:38'),
(2, 'Inactivo', '2025-05-16 23:18:38', '2025-05-16 23:18:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimiento_stock`
--

CREATE TABLE `movimiento_stock` (
  `id_movimiento_stock` int(11) NOT NULL,
  `fecha_movimiento` datetime NOT NULL,
  `producto_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `usuario_responsable_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL,
  `proveedor_id` int(11) NOT NULL,
  `categoria_producto_id` int(11) NOT NULL,
  `codigo_producto` varchar(60) NOT NULL,
  `nombre_producto` varchar(60) NOT NULL,
  `cantidad_stock_producto` int(11) NOT NULL,
  `precio_venta_producto` decimal(16,4) NOT NULL,
  `precio_costo_producto` decimal(16,4) NOT NULL,
  `estado_producto_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id_tipo_usuario` int(11) NOT NULL,
  `nombre_tipo_usuario` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id_tipo_usuario`, `nombre_tipo_usuario`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', '2025-05-17 00:48:37', '2025-05-17 00:48:37'),
(2, 'Usuario', '2025-05-17 00:48:37', '2025-05-17 00:48:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(20) NOT NULL,
  `pass_usuario` varchar(255) NOT NULL,
  `email_usuario` varchar(100) NOT NULL,
  `avatar_usuario` varchar(150) DEFAULT '''default.png''',
  `tipo_usuario_id` int(10) NOT NULL,
  `estado_usuario_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre_usuario`, `pass_usuario`, `email_usuario`, `avatar_usuario`, `tipo_usuario_id`, `estado_usuario_id`, `created_at`, `updated_at`) VALUES
(1, 'usuario1', 'contra12345', 'email@email.com', '/ruta/avatar/image.jpg', 2, 1, '2025-05-17 18:51:36', '2025-05-17 18:51:36'),
(2, 'fdgdfgdfgd', '$2y$10$3rbv4pqKfwOk2QsTgI3P3.jL4CKe8rG/EpBl3frNj10nmwPup60OW', 'dfgdfgdfg@sdfsd.com', 'dfgdfgdfgdfg', 2, 1, '2025-05-31 01:52:11', '2025-05-31 01:52:11'),
(3, 'fsdfsdfsdf', '$2y$10$Lxc67O2mVLEzjRU9AZF5ruQx5nLwDObQ7eZkmqMMHj.ZmCTkaeZsm', 'sdfsdf@sdff.comnisdfsd', 'default.png', 1, 1, '2025-05-31 02:17:07', '2025-05-31 02:17:07'),
(4, 'ghukhjkhj', '$2y$10$wDNaqftrhQlXtOl05XW74uO.b.P37ZTrtnWZPZ91WSspZl8vrGKXS', 'gilgastonmar@gmail.com', 'gfgggggff', 2, 1, '2025-06-06 22:54:44', '2025-06-06 22:54:44'),
(5, 'sdfffff', '$2y$10$NjtKk7V6wd5fNNLVngOWfeXYPNKGOqP/.1fZ/K5VEgbW0x4MXA68e', 'df333hjsd@bgud.com', 'wuyiwuywi7826872', 2, 1, '2025-06-06 23:23:56', '2025-06-06 23:23:56'),
(14, 'xfcbxcbxcbxc', '$2y$10$oHjfu1m0AI5fgNJQUky8cepM5lpGAlttqxRQccmTY6JllF/UJ2PwW', 'vxcv@asedf.com', 'default.png', 2, 1, '2025-06-07 00:11:57', '2025-06-07 00:11:57'),
(15, 'marceleta', '$2y$10$37llO.AYisKDqW4B3XOFXeJhT27GRmRoQh34Eq/ydyiU306BT4.AS', 'asdasda@sdofjhsd.com', 'default.png', 2, 1, '2025-06-07 00:52:41', '2025-06-07 00:52:41'),
(16, 'assdasdasd', '$2y$10$BQevAjG0xfJdl1ZnAMhfUu38yrVa3EVZcA686J53QQlWJeaZ8LJC2', 'asdasd@fsedrjnfs.conm', 'default.png', 2, 1, '2025-06-07 00:53:53', '2025-06-07 00:53:53'),
(17, 'marcela123', '$2y$10$owvFHkBTfT0hI0c03Oj6Oe1l/dl3KonojahgC2ORBkUVrJdk.pYSK', 'marce@gmail.com', 'default.png', 2, 1, '2025-06-07 13:53:44', '2025-06-07 13:53:44'),
(18, 'merli1234', '^#?/??Y?HDm?ŷՒz}?4?\nA?Ňk)J??vŀ??Z??:`u? ??[?Mu?͹1K^??', 'merli@gmail.com', 'default.png', 2, 1, '2025-06-07 16:05:36', '2025-06-07 16:05:36');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cabecera_orden_compra`
--
ALTER TABLE `cabecera_orden_compra`
  ADD PRIMARY KEY (`id_cabecera_orden_compra`),
  ADD UNIQUE KEY `unique_nro_orden_compra` (`nro_orden_compra`),
  ADD KEY `FK_orden_compra_proveedor` (`proveedor_id`),
  ADD KEY `FK_orden_compra_usuario` (`usuario_responsable_id`);

--
-- Indices de la tabla `categoria_producto`
--
ALTER TABLE `categoria_producto`
  ADD PRIMARY KEY (`id_categoria_producto`),
  ADD UNIQUE KEY `unique_nombre_categoria_producto` (`nombre_categoria_producto`);

--
-- Indices de la tabla `detalle_orden_compra`
--
ALTER TABLE `detalle_orden_compra`
  ADD PRIMARY KEY (`id_detalle_orden_compra`),
  ADD KEY `FK_detalle_cabecera` (`cabecera_orden_compra_id`),
  ADD KEY `FK_detalle_producto` (`producto_id`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id_empleado`),
  ADD UNIQUE KEY `unique_dni_empleado` (`DNI_empleado`),
  ADD UNIQUE KEY `unique_email_personal_empleado` (`email_personal_empleado`),
  ADD KEY `FK_empleado_usuario` (`usuario_id`),
  ADD KEY `FK_empleado_estado_empleado` (`estado_empleado_id`);

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
  ADD UNIQUE KEY `unique_nombre_estado_proveedor` (`nombre_estado_proveedor`);

--
-- Indices de la tabla `estado_usuario`
--
ALTER TABLE `estado_usuario`
  ADD PRIMARY KEY (`id_estado_usuario`),
  ADD UNIQUE KEY `unique_nombre_estado_usuario` (`nombre_estado_usuario`);

--
-- Indices de la tabla `movimiento_stock`
--
ALTER TABLE `movimiento_stock`
  ADD PRIMARY KEY (`id_movimiento_stock`),
  ADD KEY `FK_movimiento_stock_producto` (`producto_id`),
  ADD KEY `FK_movimiento_usuario` (`usuario_responsable_id`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`),
  ADD UNIQUE KEY `unique_nombre_producto` (`nombre_producto`),
  ADD UNIQUE KEY `unique_codigo_producto` (`codigo_producto`),
  ADD KEY `FK_producto_proveedor` (`proveedor_id`),
  ADD KEY `FK_producto_categoria` (`categoria_producto_id`),
  ADD KEY `FK_producto_estado_producto` (`estado_producto_id`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id_proveedor`),
  ADD UNIQUE KEY `unique_email_personal_empleado` (`email_personal_proveedor`),
  ADD UNIQUE KEY `unique_telefono_proveedor` (`telefono_proveedor`),
  ADD UNIQUE KEY `unique_direccion_proveedor` (`direccion_proveedor`),
  ADD UNIQUE KEY `unique_cuit_proveedor` (`CUIT_proveedor`),
  ADD UNIQUE KEY `unique_razon_social_proveedor` (`razon_social_proveedor`),
  ADD KEY `FK_proveedor_estado_proveedor` (`estado_proveedor_id`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id_tipo_usuario`),
  ADD UNIQUE KEY `unique_nombre` (`id_tipo_usuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `unique_nombre_usuario` (`nombre_usuario`),
  ADD UNIQUE KEY `unique_email_usuario` (`email_usuario`),
  ADD KEY `FK_usuario_tipo_usuario` (`tipo_usuario_id`),
  ADD KEY `FK_usuario_estado_usuario` (`estado_usuario_id`);

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
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `id_empleado` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estado_empleado`
--
ALTER TABLE `estado_empleado`
  MODIFY `id_estado_empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `estado_producto`
--
ALTER TABLE `estado_producto`
  MODIFY `id_estado_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `estado_proveedor`
--
ALTER TABLE `estado_proveedor`
  MODIFY `id_estado_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `estado_usuario`
--
ALTER TABLE `estado_usuario`
  MODIFY `id_estado_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `movimiento_stock`
--
ALTER TABLE `movimiento_stock`
  MODIFY `id_movimiento_stock` int(11) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id_tipo_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cabecera_orden_compra`
--
ALTER TABLE `cabecera_orden_compra`
  ADD CONSTRAINT `FK_orden_compra_proveedor` FOREIGN KEY (`proveedor_id`) REFERENCES `proveedor` (`id_proveedor`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_orden_compra_usuario` FOREIGN KEY (`usuario_responsable_id`) REFERENCES `usuario` (`id_usuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalle_orden_compra`
--
ALTER TABLE `detalle_orden_compra`
  ADD CONSTRAINT `FK_detalle_cabecera` FOREIGN KEY (`cabecera_orden_compra_id`) REFERENCES `cabecera_orden_compra` (`id_cabecera_orden_compra`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_detalle_producto` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id_producto`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `FK_empleado_estado_empleado` FOREIGN KEY (`estado_empleado_id`) REFERENCES `estado_empleado` (`id_estado_empleado`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_empleado_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `movimiento_stock`
--
ALTER TABLE `movimiento_stock`
  ADD CONSTRAINT `FK_movimiento_stock_producto` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id_producto`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_movimiento_usuario` FOREIGN KEY (`usuario_responsable_id`) REFERENCES `usuario` (`id_usuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `FK_producto_categoria` FOREIGN KEY (`categoria_producto_id`) REFERENCES `categoria_producto` (`id_categoria_producto`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_producto_estado_producto` FOREIGN KEY (`estado_producto_id`) REFERENCES `estado_producto` (`id_estado_producto`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_producto_proveedor` FOREIGN KEY (`proveedor_id`) REFERENCES `proveedor` (`id_proveedor`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD CONSTRAINT `FK_proveedor_estado_proveedor` FOREIGN KEY (`estado_proveedor_id`) REFERENCES `estado_proveedor` (`id_estado_proveedor`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `FK_usuario_estado_usuario` FOREIGN KEY (`estado_usuario_id`) REFERENCES `estado_usuario` (`id_estado_usuario`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_usuario_tipo_usuario` FOREIGN KEY (`tipo_usuario_id`) REFERENCES `tipo_usuario` (`id_tipo_usuario`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
