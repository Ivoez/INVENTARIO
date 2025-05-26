-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-05-2025 a las 03:27:45
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
-- Base de datos: `universidadcompleta`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera`
--

CREATE TABLE `carrera` (
  `idCarrera` int(11) NOT NULL,
  `nombreCarrera` varchar(55) NOT NULL,
  `descripcionMuestra` varchar(255) NOT NULL,
  `rutaImagenMuestra` varchar(255) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  `tipoCarrera` enum('Grado','Posgrado','Curso') NOT NULL,
  `descripcionCompletaSideBar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera_archivos`
--

CREATE TABLE `carrera_archivos` (
  `idCarreraArchivo` int(11) NOT NULL,
  `CarreraID` int(11) NOT NULL,
  `rutaArchivo` varchar(255) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `fechaSubida` datetime DEFAULT current_timestamp(),
  `activo` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripcionmateria`
--

CREATE TABLE `inscripcionmateria` (
  `idInscripcion` int(11) NOT NULL,
  `idAlumno` int(11) NOT NULL,
  `idMateriaCarrera` int(11) NOT NULL,
  `fechaInscripcion` datetime DEFAULT current_timestamp(),
  `activo` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE `materia` (
  `idMateria` int(11) NOT NULL,
  `nombreMateria` varchar(100) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materiadictado`
--

CREATE TABLE `materiadictado` (
  `id` int(11) NOT NULL,
  `idMateria` int(11) NOT NULL,
  `idCarrera` int(11) NOT NULL,
  `idProfesor` int(11) NOT NULL,
  `cuatrimestre` int(11) NOT NULL,
  `turno` enum('Mañana','Tarde','Noche') NOT NULL,
  `DiaCursada` varchar(50) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia_archivos`
--

CREATE TABLE `materia_archivos` (
  `idMateriaArchivo` int(11) NOT NULL,
  `MateriaID` int(11) NOT NULL,
  `rutaArchivo` varchar(255) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  `fechaSubido` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `NombreUsuario` varchar(60) NOT NULL,
  `ContraUsuario` varchar(60) NOT NULL,
  `Nombre` varchar(40) NOT NULL,
  `Apellido` varchar(40) NOT NULL,
  `DNI` varchar(8) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `tipoUsuario` enum('Alumno','Profesor','admin') NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `fotoDePerfil` varchar(255) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  `CarreraID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Indices de la tabla `inscripcionmateria`
--
ALTER TABLE `inscripcionmateria`
  ADD PRIMARY KEY (`idInscripcion`),
  ADD KEY `idAlumno` (`idAlumno`),
  ADD KEY `idMateriaCarrera` (`idMateriaCarrera`);

--
-- Indices de la tabla `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`idMateria`);

--
-- Indices de la tabla `materiadictado`
--
ALTER TABLE `materiadictado`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idMateria` (`idMateria`),
  ADD KEY `idCarrera` (`idCarrera`),
  ADD KEY `idProfesor` (`idProfesor`);

--
-- Indices de la tabla `materia_archivos`
--
ALTER TABLE `materia_archivos`
  ADD PRIMARY KEY (`idMateriaArchivo`),
  ADD KEY `MateriaID` (`MateriaID`);

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
  MODIFY `idCarrera` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `carrera_archivos`
--
ALTER TABLE `carrera_archivos`
  MODIFY `idCarreraArchivo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inscripcionmateria`
--
ALTER TABLE `inscripcionmateria`
  MODIFY `idInscripcion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `materia`
--
ALTER TABLE `materia`
  MODIFY `idMateria` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `materiadictado`
--
ALTER TABLE `materiadictado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `materia_archivos`
--
ALTER TABLE `materia_archivos`
  MODIFY `idMateriaArchivo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrera_archivos`
--
ALTER TABLE `carrera_archivos`
  ADD CONSTRAINT `carrera_archivos_ibfk_1` FOREIGN KEY (`CarreraID`) REFERENCES `carrera` (`idCarrera`);

--
-- Filtros para la tabla `inscripcionmateria`
--
ALTER TABLE `inscripcionmateria`
  ADD CONSTRAINT `inscripcionmateria_ibfk_1` FOREIGN KEY (`idAlumno`) REFERENCES `usuario` (`idUsuario`),
  ADD CONSTRAINT `inscripcionmateria_ibfk_2` FOREIGN KEY (`idMateriaCarrera`) REFERENCES `materiadictado` (`id`);

--
-- Filtros para la tabla `materiadictado`
--
ALTER TABLE `materiadictado`
  ADD CONSTRAINT `materiadictado_ibfk_1` FOREIGN KEY (`idMateria`) REFERENCES `materia` (`idMateria`),
  ADD CONSTRAINT `materiadictado_ibfk_2` FOREIGN KEY (`idCarrera`) REFERENCES `carrera` (`idCarrera`),
  ADD CONSTRAINT `materiadictado_ibfk_3` FOREIGN KEY (`idProfesor`) REFERENCES `usuario` (`idUsuario`);

--
-- Filtros para la tabla `materia_archivos`
--
ALTER TABLE `materia_archivos`
  ADD CONSTRAINT `materia_archivos_ibfk_1` FOREIGN KEY (`MateriaID`) REFERENCES `materia` (`idMateria`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`CarreraID`) REFERENCES `carrera` (`idCarrera`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
