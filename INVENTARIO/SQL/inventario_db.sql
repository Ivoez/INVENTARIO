-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-06-2025 a las 23:26:23
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
CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_cabecera_oc` (`param_proveedor` VARCHAR(40), `param_email_usuario` VARCHAR(100), `param_nro` VARCHAR(40), `param_fecha` DATE, OUT `resultado_proceso` INT, OUT `mensaje_proceso` VARCHAR(255))   BEGIN

-- Validación de UNIQUES
    DECLARE existe_nro INT DEFAULT 0;

-- Validación de FKs
    DECLARE existe_proveedor INT DEFAULT 0;
    DECLARE existe_email_usuario INT DEFAULT 0;

-- FKs a insertar
    DECLARE id_proveedor_param INT;
    DECLARE id_usuario_param INT;

    -- Verificar existencia
    SELECT EXISTS(SELECT 1 FROM cabecera_orden_compra WHERE nro_orden_compra = param_nro) INTO existe_nro;
 
    SELECT EXISTS(SELECT 1 FROM proveedor WHERE razon_social_proveedor = param_proveedor) INTO existe_proveedor;
    SELECT EXISTS(SELECT 1 FROM usuario WHERE email_usuario = param_email_usuario) INTO existe_email_usuario;


    -- Validaciones
    IF existe_nro > 0 THEN
        SET resultado_proceso = 0;
        SET mensaje_proceso = 'nro_orden_compra existente';
        
    ELSEIF existe_proveedor = 0 THEN
        SET resultado_proceso = 0;
        SET mensaje_proceso = 'razon_social_proveedor no existente';
	ELSEIF existe_email_usuario = 0 THEN
        SET resultado_proceso = 0;
        SET mensaje_proceso = 'email_usuario no existente'; 
        
    ELSE
        SELECT id_proveedor INTO id_proveedor_param FROM proveedor WHERE razon_social_proveedor = param_proveedor;
        SELECT id_usuario INTO id_usuario_param FROM usuario WHERE email_usuario = param_email_usuario;  
    
        INSERT INTO cabecera_orden_compra (proveedor_id, usuario_responsable_id, nro_orden_compra, fecha_orden_compra)
        VALUES (id_proveedor_param, id_usuario_param, param_nro, param_fecha);

        SET resultado_proceso = 1;
        SET mensaje_proceso = 'Inserción de cabecera de orden de compra correcta';
    END IF;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_categoria_producto` (`param_nombre` VARCHAR(40), OUT `resultado_proceso` INT, OUT `mensaje_proceso` VARCHAR(255))   BEGIN

-- Validación de UNIQUES
    DECLARE existe_nombre INT DEFAULT 0;

    -- Verificar existencia
    SELECT EXISTS(SELECT 1 FROM categoria_producto WHERE nombre_categoria_producto = param_nombre) INTO existe_nombre;

    -- Validaciones
    IF existe_nombre > 0 THEN
        SET resultado_proceso = 0;
        SET mensaje_proceso = 'nombre_categoria_producto existente';
        
    ELSE
        INSERT INTO categoria_producto (nombre_categoria_producto)
        VALUES (param_nombre);

        SET resultado_proceso = 1;
        SET mensaje_proceso = 'Inserción de categoría de producto correcta';
    END IF;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_detalle_oc` (IN `param_nro_cabecera` VARCHAR(40), IN `param_codigo_producto` VARCHAR(60), IN `param_cantidad` INT, OUT `resultado_proceso` INT, OUT `mensaje_proceso` VARCHAR(255))   BEGIN

-- Validación de FKs
    DECLARE existe_cabecera INT DEFAULT 0;
    DECLARE existe_producto INT DEFAULT 0;

-- FKs a insertar
    DECLARE id_cabecera_param INT;
    DECLARE id_producto_param INT;

    -- Verificar existencia
    SELECT EXISTS(SELECT 1 FROM cabecera_orden_compra WHERE nro_orden_compra = param_nro_cabecera) INTO existe_cabecera;
    SELECT EXISTS(SELECT 1 FROM producto WHERE codigo_producto = param_codigo_producto) INTO existe_producto;

    -- Validaciones
    IF existe_cabecera = 0 THEN
        SET resultado_proceso = 0;
        SET mensaje_proceso = 'nro_orden_compra no existente';
    ELSEIF existe_producto = 0 THEN
        SET resultado_proceso = 0;
        SET mensaje_proceso = 'codigo_producto no existente';
        
    ELSEIF param_cantidad IS NULL OR param_cantidad <= 0 THEN
        SET resultado_proceso = 0;
        SET mensaje_proceso = 'cantidad_detalle_orden_compra no válida';      
    ELSE
        SELECT id_cabecera_orden_compra INTO id_cabecera_param FROM cabecera_orden_compra WHERE nro_orden_compra = param_nro_cabecera;
        SELECT id_producto INTO id_producto_param FROM producto WHERE codigo_producto = param_codigo_producto;  
    
        INSERT INTO detalle_orden_compra (cabecera_orden_compra_id, producto_id, cantidad)
        VALUES (id_cabecera_param, id_producto_param, param_codigo, param_cantidad);

        SET resultado_proceso = 1;
        SET mensaje_proceso = 'Inserción de detalle de orden de compra correcta';
    END IF;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_movimiento_stock` (`param_codigo_producto` VARCHAR(60), `param_email_usuario` VARCHAR(100), `param_tipo_movimiento` VARCHAR(20), `param_fecha` DATE, `param_cantidad` INT, OUT `resultado_proceso` INT, OUT `mensaje_proceso` VARCHAR(255))   BEGIN

-- Validación de FKs
    DECLARE existe_producto INT DEFAULT 0;
    DECLARE existe_email_usuario INT DEFAULT 0;

-- FKs a insertar
    DECLARE id_producto_param INT;
    DECLARE id_usuario_param INT;
    

    -- Verificar existencia
    SELECT EXISTS(SELECT 1 FROM producto WHERE codigo_producto = param_codigo_producto) INTO existe_producto;
    SELECT EXISTS(SELECT 1 FROM usuario WHERE email_usuario = param_email_usuario) INTO existe_email_usuario;

    -- Validaciones
    IF existe_producto = 0 THEN
        SET resultado_proceso = 0;
        SET mensaje_proceso = 'codigo_producto no existente';
	ELSEIF existe_email_usuario = 0 THEN
        SET resultado_proceso = 0;
        SET mensaje_proceso = 'email_usuario no existente'; 

    ELSEIF param_tipo_movimiento NOT IN ('Entrada', 'Salida') THEN
        SET resultado_proceso = 0;
        SET mensaje_proceso = 'tipo de movimiento incorrecto';
    ELSEIF param_cantidad IS NULL OR param_cantidad <= 0 THEN
        SET resultado_proceso = 0;
        SET mensaje_proceso = 'cantidad no válida';        
        
    ELSE
        SELECT id_producto INTO id_producto_param FROM producto WHERE codigo_producto = param_codigo_producto;
        SELECT id_usuario INTO id_usuario_param FROM usuario WHERE email_usuario = param_email_usuario;      

        INSERT INTO movimiento_stock (producto_id, usuario_responsable_id, fecha_movimiento, cantidad)
        VALUES (id_producto_param, id_usuario_param, param_fecha, CASE WHEN param_tipo_movimiento = 'Salida' THEN param_cantidad * -1 ELSE param_cantidad END);

        SET resultado_proceso = 1;
        SET mensaje_proceso = 'Inserción de movimiento de stock correcta';
    END IF;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_producto` (IN `param_proveedor` VARCHAR(40), IN `param_categoria` VARCHAR(40), IN `param_codigo` VARCHAR(60), IN `param_nombre` VARCHAR(60), IN `param_cantidad_stock` INT, IN `param_costo` DECIMAL(16,4), IN `param_estado_producto` VARCHAR(20), OUT `resultado_proceso` INT, OUT `mensaje_proceso` VARCHAR(255))   BEGIN

-- Validación de UNIQUES
    DECLARE existe_codigo INT DEFAULT 0;
    DECLARE existe_nombre INT DEFAULT 0;

-- Validación de FKs
    DECLARE existe_proveedor INT DEFAULT 0;
    DECLARE existe_categoria INT DEFAULT 0;
    DECLARE existe_estado_producto INT DEFAULT 0;

-- FKs a insertar
    DECLARE id_proveedor_param INT;
    DECLARE id_categoria_param INT;
    DECLARE id_estado_producto_param INT;

    -- Verificar existencia
    SELECT EXISTS(SELECT 1 FROM producto WHERE codigo_producto = param_codigo) INTO existe_codigo;
    SELECT EXISTS(SELECT 1 FROM producto WHERE nombre_producto = param_nombre) INTO existe_nombre;
 
    SELECT EXISTS(SELECT 1 FROM proveedor WHERE razon_social_proveedor = param_proveedor) INTO existe_proveedor;
    SELECT EXISTS(SELECT 1 FROM categoria_producto WHERE nombre_categoria_producto = param_categoria) INTO existe_categoria;
    SELECT EXISTS(SELECT 1 FROM estado_producto WHERE nombre_estado_producto = param_estado_producto) INTO existe_estado_producto;

    -- Validaciones
    IF existe_codigo > 0 THEN
        SET resultado_proceso = 0;
        SET mensaje_proceso = 'codigo_producto existente';
    ELSEIF existe_nombre > 0 THEN
        SET resultado_proceso = 0;
        SET mensaje_proceso = 'nombre_producto existente';
        
    ELSEIF existe_proveedor = 0 THEN
        SET resultado_proceso = 0;
        SET mensaje_proceso = 'razon_social_proveedor no existente';
	ELSEIF existe_categoria = 0 THEN
        SET resultado_proceso = 0;
        SET mensaje_proceso = 'nombre_categoria_producto no existente'; 
    ELSEIF param_estado_producto IS NOT NULL AND existe_estado_producto = 0 THEN
        SET resultado_proceso = 0;
        SET mensaje_proceso = 'nombre_estado_producto incorrecto';
        
    ELSEIF param_cantidad_stock < 0 THEN
        SET resultado_proceso = 0;
        SET mensaje_proceso = 'cantidad_stock no válida';
    ELSEIF param_costo IS NULL OR param_costo <= 0 THEN
        SET resultado_proceso = 0;
        SET mensaje_proceso = 'precio_costo_producto no válido';
        
    ELSE
        SELECT id_proveedor INTO id_proveedor_param FROM proveedor WHERE razon_social_proveedor = param_proveedor;
        SELECT id_categoria_producto INTO id_categoria_param FROM categoria_producto WHERE nombre_categoria_producto = param_categoria;  
        SELECT id_estado_producto INTO id_estado_producto_param FROM estado_producto WHERE nombre_estado_producto = COALESCE(param_estado_producto, 'Activo');
    
        INSERT INTO producto (proveedor_id, categoria_producto_id, codigo_producto, nombre_producto, cantidad_stock_producto, precio_costo_producto, estado_producto_id)
        VALUES (id_proveedor_param, id_categoria_param, param_codigo, param_nombre, param_cantidad_stock, param_costo, id_estado_producto_param);

        SET resultado_proceso = 1;
        SET mensaje_proceso = 'Inserción de producto correcta';
    END IF;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_proveedor` (IN `param_razon_social` VARCHAR(40), IN `param_CUIT` VARCHAR(15), IN `param_direccion` VARCHAR(60), IN `param_telefono` VARCHAR(40), IN `param_email` VARCHAR(40), IN `param_estado_proveedor` VARCHAR(20), OUT `resultado_proceso` INT, OUT `mensaje_proceso` VARCHAR(255))   BEGIN

-- Validación UNIQUES
    DECLARE existe_razon_social INT DEFAULT 0;
    DECLARE existe_CUIT INT DEFAULT 0;
    DECLARE existe_direccion INT DEFAULT 0;
    DECLARE existe_telefono INT DEFAULT 0;
    DECLARE existe_email INT DEFAULT 0;
    
-- Validación FKs    
    DECLARE existe_estado_proveedor INT DEFAULT 0;
    
-- FKS a insertar    
    DECLARE id_estado_proveedor_param INT;

    -- Verificar existencia en base de datos
    SELECT EXISTS(SELECT 1 FROM proveedor WHERE razon_social_proveedor = param_razon_social) INTO existe_razon_social;
    SELECT EXISTS(SELECT 1 FROM proveedor WHERE CUIT_proveedor = param_CUIT) INTO existe_CUIT;
    SELECT EXISTS(SELECT 1 FROM proveedor WHERE direccion_proveedor = param_direccion) INTO existe_direccion;
    SELECT EXISTS(SELECT 1 FROM proveedor WHERE telefono_proveedor = param_telefono) INTO existe_telefono;
    SELECT EXISTS(SELECT 1 FROM proveedor WHERE email_personal_proveedor = param_email) INTO existe_email;
 
    SELECT EXISTS(SELECT 1 FROM estado_proveedor WHERE nombre_estado_proveedor = param_estado_proveedor) INTO existe_estado_proveedor;



    -- Validaciones
    IF existe_razon_social > 0 THEN
        SET resultado_proceso = 0;
        SET mensaje_proceso = 'razon_social_proveedor existente';
    ELSEIF existe_CUIT > 0 THEN
        SET resultado_proceso = 0;
        SET mensaje_proceso = 'CUIT_proveedor existente';
    ELSEIF existe_direccion > 0 THEN
        SET resultado_proceso = 0;
        SET mensaje_proceso = 'direccion_proveedor existente';
	ELSEIF existe_telefono > 0 THEN
        SET resultado_proceso = 0;
        SET mensaje_proceso = 'telefono_proveedor existente';
	ELSEIF existe_email > 0 THEN
        SET resultado_proceso = 0;
        SET mensaje_proceso = 'email_personal_proveedor existente';
        
    ELSEIF param_estado_proveedor IS NOT NULL AND existe_estado_proveedor = 0 THEN
        SET resultado_proceso = 0;
        SET mensaje_proceso = 'nombre_estado_proveedor incorrecto';
    ELSE
        SELECT id_estado_proveedor INTO id_estado_proveedor_param FROM estado_proveedor WHERE nombre_estado_proveedor = COALESCE(param_estado_proveedor, 'Activo');
    
        INSERT INTO proveedor (razon_social_proveedor, CUIT_proveedor, direccion_proveedor, telefono_proveedor, email_personal_proveedor, estado_proveedor_id)
        VALUES (param_razon_social, param_CUIT, param_direccion, param_telefono, param_email, id_estado_proveedor_param);

        SET resultado_proceso = 1;
        SET mensaje_proceso = 'Inserción de proveedor correcta';
    END IF;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_usuario` (IN `param_nombre_usuario` VARCHAR(100), IN `param_apellido_usuario` VARCHAR(100), IN `param_DNI_usuario` VARCHAR(11), IN `param_pass_usuario` VARCHAR(255), IN `param_email_usuario` VARCHAR(100), IN `param_avatar_usuario` VARCHAR(150), IN `param_tipo_usuario` VARCHAR(15), IN `param_estado_usuario` VARCHAR(20), OUT `resultado_proceso` INT, OUT `mensaje_proceso` VARCHAR(255))   BEGIN

    DECLARE existe_DNI_usuario INT DEFAULT 0;
    DECLARE existe_email_usuario INT DEFAULT 0;
    DECLARE existe_avatar_usuario INT DEFAULT 0;
    
    DECLARE existe_tipo_usuario INT DEFAULT 0;
    DECLARE existe_estado_usuario INT DEFAULT 0;
    
    DECLARE id_tipo_usuario_param INT;
    DECLARE id_estado_usuario_param INT;

    -- Verificar existencia en base de datos
    SELECT EXISTS(SELECT 1 FROM usuario WHERE DNI_usuario = param_DNI_usuario) INTO existe_DNI_usuario;
    SELECT EXISTS(SELECT 1 FROM usuario WHERE email_usuario = param_email_usuario) INTO existe_email_usuario;
    SELECT EXISTS(SELECT 1 FROM usuario WHERE avatar_usuario = param_avatar_usuario) INTO existe_avatar_usuario;
    
    SELECT EXISTS(SELECT 1 FROM tipo_usuario WHERE nombre_tipo_usuario = param_tipo_usuario) INTO existe_tipo_usuario;
    SELECT EXISTS(SELECT 1 FROM estado_usuario WHERE nombre_estado_usuario = param_estado_usuario) INTO existe_estado_usuario;



    -- Validaciones
    IF existe_DNI_usuario > 0 THEN
        SET resultado_proceso = 0;
        SET mensaje_proceso = 'DNI_usuario existente';
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
    
        INSERT INTO usuario (nombre_usuario, apellido_usuario, DNI_usuario, pass_usuario, email_usuario, avatar_usuario, tipo_usuario_id, estado_usuario_id)
        VALUES (param_nombre_usuario, param_apellido_usuario, param_DNI_usuario, aes_encrypt(param_pass_usuario, 'keyword'), param_email_usuario,  COALESCE(NULLIF(param_avatar_usuario, ''), 'default.png'), id_tipo_usuario_param, id_estado_usuario_param);

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

CREATE DEFINER=`root`@`localhost` PROCEDURE `list_proveedores` (`param_razon_social` VARCHAR(40), `param_email` VARCHAR(40), `param_estado_proveedor` VARCHAR(20), OUT `resultado_proceso` INT, OUT `mensaje_proceso` VARCHAR(255))   BEGIN

-- Validación de valores a buscar
    DECLARE existe_razon_social INT DEFAULT 0;
    DECLARE existe_email INT DEFAULT 0;
    DECLARE existe_estado INT DEFAULT 0;

    -- Verificar existencia
    SELECT EXISTS(SELECT 1 FROM proveedor WHERE razon_social_proveedor = param_razon_social) INTO existe_razon_social;
    SELECT EXISTS(SELECT 1 FROM proveedor WHERE email_personal_proveedor = param_email) INTO existe_email;
	SELECT EXISTS(SELECT 1 FROM estado_proveedor WHERE nombre_estado_proveedor = param_estado_proveedor) INTO existe_estado;

    -- Validaciones
    IF param_razon_social IS NOT NULL AND existe_razon_social = 0 THEN  
        SET resultado_proceso = 0;
        SET mensaje_proceso = 'razon_social_proveedor no existente';
    ELSEIF param_email IS NOT NULL AND existe_email = 0 THEN
        SET resultado_proceso = 0;
        SET mensaje_proceso = 'email_personal_proveedor no existente';
    ELSEIF param_estado_proveedor IS NOT NULL AND existe_estado = 0 THEN
        SET resultado_proceso = 0;
        SET mensaje_proceso = 'nombre_estado_proveedor no existente';
        
    -- Listados
        ELSEIF param_razon_social IS NOT NULL THEN 
    	SET resultado_proceso = 1;
        SET mensaje_proceso = 'Proveedor por razon social devuelto';
        SELECT  
            p.razon_social_proveedor,
        	p.email_personal_proveedor,
            p.CUIT_proveedor,
            p.direccion_proveedor,
            p.telefono_proveedor,
            ep.nombre_estado_proveedor
            	FROM proveedor p
                	INNER JOIN estado_proveedor ep ON p.estado_proveedor_id = ep.nombre_estado_proveedor
                    	WHERE p.razon_social_proveedor = param_razon_social;
                        
    ELSEIF param_email IS NOT NULL THEN 
    	SET resultado_proceso = 1;
        SET mensaje_proceso = 'Proveedor por email devuelto';
        SELECT 
            p.razon_social_proveedor,
        	p.email_personal_proveedor,
            p.CUIT_proveedor,
            p.direccion_proveedor,
            p.telefono_proveedor,
            ep.nombre_estado_proveedor
            	FROM proveedor p
                	INNER JOIN estado_proveedor ep ON p.estado_proveedor_id = ep.nombre_estado_proveedor
                    	WHERE p.email_personal_proveedor = param_email;
         
	ELSEIF param_estado_proveedor IS NOT NULL THEN
    	SET resultado_proceso = 1;
        SET mensaje_proceso = 'Proveedor por estado de proveedor devueltos';
        SELECT
            p.razon_social_proveedor,
        	p.email_personal_proveedor,
            p.CUIT_proveedor,
            p.direccion_proveedor,
            p.telefono_proveedor,
            ep.nombre_estado_proveedor
            	FROM proveedor p
                	INNER JOIN estado_proveedor ep ON p.estado_proveedor_id = ep.nombre_estado_proveedor
                    	WHERE ep.nombre_estado_proveedor = param_estado_proveedor;
                        
      ELSEIF param_razon_social IS NULL AND param_email IS NULL AND param_estado_proveedor THEN
      	SET resultado_proceso = 1;
        SET mensaje_proceso = 'Listado de proveedores devuelto';
        SELECT
            p.razon_social_proveedor,
        	p.email_personal_proveedor,
            p.CUIT_proveedor,
            p.direccion_proveedor,
            p.telefono_proveedor,
            ep.nombre_estado_proveedor
            	FROM proveedor p
                	INNER JOIN estado_proveedor ep ON p.estado_proveedor_id = ep.nombre_estado_proveedor;
                    
      ELSE
      	SET resultado_proceso = 0;
        SET mensaje_proceso = 'Error desconocido al generar el listado de proveedores';
      
    END IF;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `list_tipo_usuario` ()   BEGIN
    SELECT nombre_tipo_usuario FROM tipo_usuario;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `list_usuarios` (IN `param_email` VARCHAR(100), IN `param_tipo_usuario` VARCHAR(15), IN `param_estado_usuario` VARCHAR(20), OUT `resultado_proceso` INT, OUT `mensaje_proceso` VARCHAR(255))   BEGIN

-- Validación de valores a buscar
    DECLARE existe_email INT DEFAULT 0;
    DECLARE existe_tipo INT DEFAULT 0;
    DECLARE existe_estado INT DEFAULT 0;

    -- Verificar existencia
    SELECT EXISTS(SELECT 1 FROM usuario WHERE email_usuario = param_email) INTO existe_email;
    SELECT EXISTS(SELECT 1 FROM tipo_usuario WHERE nombre_tipo_usuario = param_tipo_usuario) INTO existe_tipo;
	SELECT EXISTS(SELECT 1 FROM estado_usuario WHERE nombre_estado_usuario = param_estado_usuario) INTO existe_estado;

    -- Validaciones
    IF param_email IS NOT NULL AND existe_email = 0 THEN  
        SET resultado_proceso = 0;
        SET mensaje_proceso = 'email_usuario no existente';
    ELSEIF param_tipo_usuario IS NOT NULL AND existe_tipo = 0 THEN
        SET resultado_proceso = 0;
        SET mensaje_proceso = 'nombre_tipo_usuario no existente';
    ELSEIF param_estado_usuario IS NOT NULL AND existe_estado = 0 THEN
        SET resultado_proceso = 0;
        SET mensaje_proceso = 'nombre_estado_usuario no existente';
        
    -- Listados
    ELSEIF param_email IS NOT NULL THEN 
    	SET resultado_proceso = 1;
        SET mensaje_proceso = 'Usuario por email devuelto';
        SELECT 
        	u.email_usuario,
            u.nombre_usuario,
            u.apellido_usuario,
            u.DNI_usuario,
            u.avatar_usuario,
            tu.nombre_tipo_usuario,
            eu.nombre_estado_usuario
            	FROM usuario u
                    INNER JOIN tipo_usuario tu ON u.tipo_usuario_id = tu.nombre_tipo_usuario
                	INNER JOIN estado_usuario eu ON u.estado_usuario_id = eu.nombre_estado_usuario
                    	WHERE u.email_usuario = param_email;
                        
	ELSEIF param_tipo_usuario IS NOT NULL THEN
    	SET resultado_proceso = 1;
        SET mensaje_proceso = 'Usuarios por tipo de usuario devueltos';
        SELECT 
        	u.email_usuario, 
            u.nombre_usuario,
            u.apellido_usuario,
            u.DNI_usuario,
            u.avatar_usuario,
            tu.nombre_tipo_usuario,
            eu.nombre_estado_usuario
            	FROM usuario u
                    INNER JOIN tipo_usuario tu ON u.tipo_usuario_id = tu.nombre_tipo_usuario
                	INNER JOIN estado_usuario eu ON u.estado_usuario_id = eu.nombre_estado_usuario
                    	WHERE tu.nombre_tipo_usuario = param_tipo_usuario;
                        
	ELSEIF param_estado_usuario IS NOT NULL THEN
    	SET resultado_proceso = 1;
        SET mensaje_proceso = 'Usuarios por estado de usuario devueltos';
        SELECT 
        	u.email_usuario, 
            u.nombre_usuario,
            u.apellido_usuario,
            u.DNI_usuario,
            u.avatar_usuario,
            tu.nombre_tipo_usuario,
            eu.nombre_estado_usuario
            	FROM usuario u
                    INNER JOIN tipo_usuario tu ON u.tipo_usuario_id = tu.nombre_tipo_usuario
                	INNER JOIN estado_usuario eu ON u.estado_usuario_id = eu.nombre_estado_usuario
                    	WHERE eu.nombre_estado_usuario = param_estado_usuario;
                        
      ELSEIF param_email IS NULL AND param_tipo_usuario IS NULL AND param_estado_usuario THEN
      	SET resultado_proceso = 1;
        SET mensaje_proceso = 'Listado de usuarios devuelto';
        SELECT 
        	u.email_usuario, 
            u.nombre_usuario,
            u.apellido_usuario,
            u.DNI_usuario,
            u.avatar_usuario,
            tu.nombre_tipo_usuario,
            eu.nombre_estado_usuario
            	FROM usuario u
                    INNER JOIN tipo_usuario tu ON u.tipo_usuario_id = tu.nombre_tipo_usuario
                	INNER JOIN estado_usuario eu ON u.estado_usuario_id = eu.nombre_estado_usuario;
                    
      ELSE
      	SET resultado_proceso = 0;
        SET mensaje_proceso = 'Error desconocido al generar el listado de usuarios';
      
    END IF;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `login` (IN `param_email_usuario` VARCHAR(100), IN `param_pass_usuario` VARCHAR(255), OUT `param_nombre_tipo_usuario` VARCHAR(15), OUT `resultado_proceso` INT, OUT `mensaje_proceso` VARCHAR(255))   BEGIN

    DECLARE existe_email_usuario INT;
    DECLARE pass_usuario_buscado VARCHAR(255);
    DECLARE id_tipo_usuario_buscado INT;  
    DECLARE nombre_tipo_usuario_buscado VARCHAR(20);
    
    -- Verificar existencia en base de datos
    SELECT EXISTS(SELECT 1 FROM usuario WHERE email_usuario = param_email_usuario) INTO existe_email_usuario;
    
    -- Validaciones
    IF existe_email_usuario < 1 THEN
        SET resultado_proceso = 0;
        SET mensaje_proceso = 'email_usuario no existente';
    ELSE
        SELECT aes_decrypt(pass_usuario, 'keyword') INTO pass_usuario_buscado FROM usuario WHERE email_usuario = param_email_usuario;
        IF pass_usuario_buscado <> param_pass_usuario THEN
        	SET resultado_proceso = 0;
        	SET mensaje_proceso = 'pass_usuario incorrecta';
        ELSE
        	SELECT tipo_usuario_id INTO id_tipo_usuario_buscado 
            	FROM usuario 
                	WHERE email_usuario = param_email_usuario;
            SELECT IFNULL(nombre_tipo_usuario, 'nombre_tipo_usuario con error') INTO nombre_tipo_usuario_buscado
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
  `fecha_movimiento` date NOT NULL,
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
  `cantidad_stock_producto` int(11) NOT NULL DEFAULT 0,
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
  `nombre_usuario` varchar(100) NOT NULL,
  `apellido_usuario` varchar(100) NOT NULL,
  `DNI_usuario` varchar(11) NOT NULL,
  `pass_usuario` varbinary(255) NOT NULL,
  `email_usuario` varchar(100) NOT NULL,
  `avatar_usuario` varchar(150) DEFAULT '''default.png''',
  `tipo_usuario_id` int(10) NOT NULL,
  `estado_usuario_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
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
  ADD UNIQUE KEY `unique_email_usuario` (`email_usuario`),
  ADD UNIQUE KEY `unique_dni_usuario` (`DNI_usuario`),
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
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

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
