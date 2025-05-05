-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-05-2025 a las 05:33:59
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

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
  `descripcionMuestra` varchar(100) NOT NULL,
  `rutaImagenMuestra` varchar(200) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  `tipoCarrera` enum('Grado','Posgrado','Curso') NOT NULL,
  `descripcionCompletaSideBar` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `carrera`
--

INSERT INTO `carrera` (`idCarrera`, `nombreCarrera`, `descripcionMuestra`, `rutaImagenMuestra`, `activo`, `tipoCarrera`, `descripcionCompletaSideBar`) VALUES
(1, 'Introducción a la Programación', 'Curso básico para aprender lógica y estructuras fundamentales.', 'curso_desarrolloWeb.jpg', 1, 'Curso', 'Este curso intensivo te brinda una formación integral en tecnologías de desarrollo web, desde los fundamentos del frontend hasta las habilidades avanzadas del backend. Aprenderás a construir sitios y aplicaciones web modernas, dinámicas y escalables utilizando herramientas y lenguajes actuales del mercado laboral, como HTML5, CSS3, JavaScript, React, Node.js y bases de datos como MySQL y MongoDB.\r\n\r\nEl programa incluye prácticas reales, trabajo en proyectos colaborativos y una introducción al despliegue de aplicaciones en la nube. Al finalizar, estarás preparado para integrarte a equipos de desarrollo como programador junior o emprender tus propios proyectos digitales.\r\n\r\nDuración: 6 meses (modalidad híbrida)\r\nRequisitos: Conocimientos básicos de informática\r\nCertificación: Avalada por la Universidad Tecnológica Nacional'),
(2, 'Ingeniería en Sistemas', 'Formamos profesionales capaces de diseñar, desarrollar e implementar soluciones tecnológicas innovad', 'IngenieriaDeSistemas.jpg', 1, 'Grado', 'La carrera de Ingeniería en Sistemas Informáticos brinda una sólida formación en programación, arquitectura de software, bases de datos, redes y seguridad informática. A lo largo de la cursada, el estudiante adquiere competencias para analizar problemas reales, diseñar sistemas eficientes y liderar proyectos tecnológicos. Con un enfoque práctico y actualizado, el plan de estudios prepara a los futuros ingenieros para enfrentar los desafíos del mundo digital, integrando conocimientos técnicos con habilidades de gestión, innovación y trabajo en equipo. Al egresar, el profesional estará capacitado para desempeñarse tanto en empresas del sector público como privado, o emprender sus propios desarrollos tecnológicos.'),
(3, 'Especialización en Robótica y Automatización Inteligent', 'Capacitación avanzada en sistemas robóticos, automatización y tecnologías inteligentes para la indus', 'Lic-Robotica.jpg', 1, 'Posgrado', 'La Especialización en Robótica y Automatización Inteligente está diseñada para profesionales que buscan profundizar sus conocimientos en el diseño, programación y control de sistemas robóticos. El programa abarca áreas clave como visión artificial, inteligencia artificial aplicada, sensores, actuadores y sistemas embebidos. A través de proyectos prácticos y trabajo interdisciplinario, el estudiante adquiere competencias para implementar soluciones automatizadas en sectores como la industria, salud, agro y servicios. Esta formación de postgrado responde a la creciente demanda de expertos capaces de liderar procesos de transformación digital en entornos productivos, con una visión ética e innovadora del desarrollo tecnológico.');

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
(1, 'admin123', '123123', 'adminNombre', 'adminApellido', '24424242', 'admin@gmail.com', 'admin', '2424242', 'img/', 1, NULL),
(2, 'Ariel123', 'Ariel123321', 'Ariel', 'Nuñez', '42442442', 'ArielN@gmail.com', 'admin', '4242424', 'Ruta/Avatar', 1, NULL),
(3, 'Fran', '123321', 'Francisco', 'Apellido', '24242424', 'fran@gmail.com', 'Alumno', '4435343', 'img/', 1, NULL),
(4, 'Maria', 'FFF123', 'Maria', 'Apellido', '123141', 'Maria@gmail.com', 'Profesor', '124124', 'img/', 1, NULL);

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
  MODIFY `idCarrera` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `carrera_archivos`
--
ALTER TABLE `carrera_archivos`
  MODIFY `idCarreraArchivo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
