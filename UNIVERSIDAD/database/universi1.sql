-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-05-2025 a las 15:57:44
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
-- Base de datos: `universi1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera`
--

CREATE TABLE `carrera` (
  `idCarrera` int(10) UNSIGNED NOT NULL,
  `nombreCarrera` varchar(55) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  `tipoCarrera` enum('Grado','Posgrado','Curso') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera_archivos`
--

CREATE TABLE `carrera_archivos` (
  `idCarreraArchivo` int(10) UNSIGNED NOT NULL,
  `CarreraID` int(10) UNSIGNED NOT NULL,
  `rutaArchivo` varchar(255) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `fechaSubida` datetime DEFAULT current_timestamp(),
  `activo` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(10) UNSIGNED NOT NULL,
  `NombreUsuario` varchar(60) NOT NULL,
  `ContraUsuario` varchar(60) NOT NULL,
  `Nombre` varchar(40) NOT NULL,
  `Apellido` varchar(40) NOT NULL,
  `DNI` varchar(8) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `tipoUsuario` enum('admin','Alumno','Profesor') NOT NULL DEFAULT 'Alumno',
  `telefono` varchar(15) NOT NULL,
  `fotoDePerfil` varchar(255) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  `CarreraID` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `NombreUsuario`, `ContraUsuario`, `Nombre`, `Apellido`, `DNI`, `Email`, `tipoUsuario`, `telefono`, `fotoDePerfil`, `activo`, `CarreraID`) VALUES
(1, 'admin123', '123123', 'adminNombre', 'adminApellido', '24424242', 'admin@gmail.com', 'admin', '2424242', 'img/', 1, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrera`
--
ALTER TABLE `carrera`
  ADD PRIMARY KEY (`idCarrera`);

--
-- Indices de la tabla `carrera_archivos`
--
ALTER TABLE `carrera_archivos`
  ADD PRIMARY KEY (`idCarreraArchivo`),
  ADD KEY `CarreraID` (`CarreraID`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `CarreraID` (`CarreraID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrera`
--
ALTER TABLE `carrera`
  MODIFY `idCarrera` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `carrera_archivos`
--
ALTER TABLE `carrera_archivos`
  MODIFY `idCarreraArchivo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrera_archivos`
--
ALTER TABLE `carrera_archivos`
  ADD CONSTRAINT `carrera_archivos_ibfk_1` FOREIGN KEY (`CarreraID`) REFERENCES `carrera` (`idCarrera`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`CarreraID`) REFERENCES `carrera` (`idCarrera`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
