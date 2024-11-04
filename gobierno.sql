-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-11-2024 a las 02:57:49
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
-- Base de datos: `gobierno`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE `registro` (
  `id` int(4) NOT NULL,
  `nombre` varchar(25) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `contrasena` varchar(255) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `pregunta` varchar(50) DEFAULT NULL,
  `respuesta` varchar(50) DEFAULT NULL,
  `rol` varchar(20) DEFAULT 'usuario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `registro`
--

INSERT INTO `registro` (`id`, `nombre`, `apellido`, `correo`, `contrasena`, `fecha`, `pregunta`, `respuesta`, `rol`) VALUES
(1, 'Cecilia Anunciación ', 'Patrón Laviada', 'cecilia.patron@merida.gob.mx', '$2y$10$eXbRtR9D1ECQpEHNbBp/w.7Fxl7D5OAsS9BlVRkBAQlTPCqTbv5rS', '2024-11-05', NULL, NULL, 'alcalde'),
(2, 'christian ', 'gomez', 'christiangomez@hotmail.com', '$2y$10$4NrvnlmxaB.UVqqtWz6/GecORQteVI7LBS4pXbCtgZZ/cZWY5BWce', '2001-06-08', NULL, NULL, 'administrador'),
(3, 'mono', 'gallina', 'mono@gmail.com', '$2y$10$ej4TrOzgNz49slmNvFNdK.nnd5P.fThCOaPboaJGYSX1jK2FsHBXG', '2003-04-10', 'lugar_nacimiento', 'merida', 'usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes_apoyo`
--

CREATE TABLE `solicitudes_apoyo` (
  `id_solicitud` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `estado_civil` varchar(20) DEFAULT NULL,
  `ocupacion` varchar(100) DEFAULT NULL,
  `ingresos` decimal(10,2) DEFAULT NULL,
  `seguro_medico` enum('si','no') DEFAULT NULL,
  `nivel_educativo` varchar(50) DEFAULT NULL,
  `tipo_vivienda` varchar(50) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `mayor_edad` tinyint(1) DEFAULT NULL,
  `residencia` tinyint(1) DEFAULT NULL,
  `nacionalidad` tinyint(1) DEFAULT NULL,
  `ingresos_menores` tinyint(1) DEFAULT NULL,
  `identificacion_vigente` tinyint(1) DEFAULT NULL,
  `identificacion` varchar(250) DEFAULT NULL,
  `comprobante_domicilio` varchar(250) DEFAULT NULL,
  `consentimiento` tinyint(1) DEFAULT NULL,
  `terminos` tinyint(1) DEFAULT NULL,
  `fecha_solicitud` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `informe_danos` varchar(250) DEFAULT NULL,
  `documentacion_terreno` varchar(250) DEFAULT NULL,
  `tipo_apoyo` varchar(250) DEFAULT NULL,
  `estatus` enum('Aceptado','Rechazado','En Revisión') NOT NULL DEFAULT 'En Revisión'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `solicitudes_apoyo`
--

INSERT INTO `solicitudes_apoyo` (`id_solicitud`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `direccion`, `estado_civil`, `ocupacion`, `ingresos`, `seguro_medico`, `nivel_educativo`, `tipo_vivienda`, `descripcion`, `mayor_edad`, `residencia`, `nacionalidad`, `ingresos_menores`, `identificacion_vigente`, `identificacion`, `comprobante_domicilio`, `consentimiento`, `terminos`, `fecha_solicitud`, `informe_danos`, `documentacion_terreno`, `tipo_apoyo`, `estatus`) VALUES
(1, 'dasdasd', '2024-10-14', 'as23423', '4fds@fdsf', 'fsdfsdf', 'casado', 'fsdfs', 32332.00, 'no', 'bachillerato', 'prestada', 'fsdfsdfsdf', 1, 1, 1, 1, 1, 'expo ia .pdf', 'Evaluaciขn bimestral 1 chris.pdf', 1, 1, '2024-11-04 01:00:13', '', '', 'alimentario', 'En Revisión'),
(2, 'dasda', '2024-10-23', '98908098098', 'adad@fsdf', 'sdfsdfsdf', 'divorciado', 'fsdfsdf', 0.00, 'si', 'bachillerato', 'rentada', 'sfdfsdf', 1, 1, 1, 1, 1, '20210531222741_IMG_0627.JPG', 'Captura de pantalla 2024-10-22 203359.png', 1, 1, '2024-11-04 01:05:37', '', '', 'economico', 'En Revisión'),
(4, 'christian isaac rodriguez gomez ', '2001-03-03', '9981290785', 'chris@gmail.com', 'dadadasd', 'soltero', 'sexologo', 0.00, 'no', 'universidad', 'propia', 'adasdasd', 1, 1, 0, 0, 1, 'Equipo 4.pdf', 'equipo wachipatos .pdf', 1, 1, '2024-11-04 01:57:13', 'Evaluación bimestral 1.pdf', 'Reporte bimestral 1.pdf', 'vivienda', 'Aceptado');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `registro`
--
ALTER TABLE `registro`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `solicitudes_apoyo`
--
ALTER TABLE `solicitudes_apoyo`
  ADD PRIMARY KEY (`id_solicitud`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `registro`
--
ALTER TABLE `registro`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `solicitudes_apoyo`
--
ALTER TABLE `solicitudes_apoyo`
  MODIFY `id_solicitud` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
