-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-11-2024 a las 00:38:25
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
-- Estructura de tabla para la tabla `publicaciones`
--

CREATE TABLE `publicaciones` (
  `id_noticia` int(5) NOT NULL,
  `nombrenoticia` varchar(200) DEFAULT NULL,
  `fecha` varchar(150) DEFAULT NULL,
  `descripcioncorta` text DEFAULT NULL,
  `descripcionlarga` text DEFAULT NULL,
  `ruta` varchar(100) DEFAULT NULL,
  `icono` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `publicaciones`
--

INSERT INTO `publicaciones` (`id_noticia`, `nombrenoticia`, `fecha`, `descripcioncorta`, `descripcionlarga`, `ruta`, `icono`) VALUES
(2, 'Nuevos programas de apoyo 2024', '2024-06-05', 'El gobierno ha anunciado nuevos programas para apoyar a comunidades afectadas por la crisis económica global.', '<p>En 2024, varios programas de apoyo social est&aacute;n en marcha en M&eacute;xico, con planes para expandirse en 2025. Destacan tres nuevas iniciativas anunciadas por Claudia Sheinbaum, pr&oacute;xima presidenta de M&eacute;xico:</p>\r\n\r\n<ol>\r\n	<li>\r\n	<p><strong>Apoyo para Mujeres de 60 a 64 a&ntilde;os</strong>: Este programa brindar&aacute; un apoyo bimestral de aproximadamente la mitad de la pensi&oacute;n actual para adultos mayores, beneficiando a mujeres en ese rango de edad. El registro comenz&oacute; en octubre de 2024 y continuar&aacute; en etapas.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Beca Universal para Estudiantes de Educaci&oacute;n B&aacute;sica</strong>: Esta beca beneficiar&aacute; a ni&ntilde;os en escuelas p&uacute;blicas, desde preescolar hasta secundaria. El proceso de inscripci&oacute;n se realizar&aacute; en los planteles educativos, asegurando que los estudiantes reciban el apoyo econ&oacute;mico de manera directa.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Programa de Salud Casa por Casa</strong>: Este proyecto busca atender a adultos mayores a trav&eacute;s de visitas m&eacute;dicas domiciliarias, con el objetivo de ofrecer seguimiento en salud y realizar diagn&oacute;sticos preventivos</p>\r\n	</li>\r\n</ol>\r\n', 'fotos/2024-11-07-02-21-00_', 'newspaper');

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
(3, 'mono', 'gallina', 'mono@gmail.com', '$2y$10$ej4TrOzgNz49slmNvFNdK.nnd5P.fThCOaPboaJGYSX1jK2FsHBXG', '2003-04-10', 'lugar_nacimiento', 'merida', 'usuario'),
(4, 'emmauel', 'dzib', 'emma@gmail.com', '$2y$10$fz2ButIql7uVcl1EJTbZIecbT8pxv9kl6y39aRT/30VQ712N3ntcK', '1997-02-03', 'nombre_mascota', 'tito', 'usuario');

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
  `estatus` enum('Aceptado','Rechazado','En Revisión') NOT NULL DEFAULT 'En Revisión',
  `municipio` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `solicitudes_apoyo`
--

INSERT INTO `solicitudes_apoyo` (`id_solicitud`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `direccion`, `estado_civil`, `ocupacion`, `ingresos`, `seguro_medico`, `nivel_educativo`, `tipo_vivienda`, `descripcion`, `mayor_edad`, `residencia`, `nacionalidad`, `ingresos_menores`, `identificacion_vigente`, `identificacion`, `comprobante_domicilio`, `consentimiento`, `terminos`, `fecha_solicitud`, `informe_danos`, `documentacion_terreno`, `tipo_apoyo`, `estatus`, `municipio`) VALUES
(1, 'dasdasd', '2024-10-14', 'as23423', '4fds@fdsf', 'fsdfsdf', 'casado', 'fsdfs', 32332.00, 'no', 'bachillerato', 'prestada', 'fsdfsdfsdf', 1, 1, 1, 1, 1, 'expo ia .pdf', 'Evaluaciขn bimestral 1 chris.pdf', 1, 1, '2024-11-04 01:00:13', '', '', 'alimentario', 'En Revisión', NULL),
(2, 'dasda', '2024-10-23', '98908098098', 'adad@fsdf', 'sdfsdfsdf', 'divorciado', 'fsdfsdf', 0.00, 'si', 'bachillerato', 'rentada', 'sfdfsdf', 1, 1, 1, 1, 1, '20210531222741_IMG_0627.JPG', 'Captura de pantalla 2024-10-22 203359.png', 1, 1, '2024-11-04 01:05:37', '', '', 'economico', 'En Revisión', NULL),
(4, 'christian isaac rodriguez gomez ', '2001-03-03', '9981290785', 'chris@gmail.com', 'dadadasd', 'soltero', 'sexologo', 0.00, 'no', 'universidad', 'propia', 'adasdasd', 1, 1, 0, 0, 1, 'Equipo 4.pdf', 'equipo wachipatos .pdf', 1, 1, '2024-11-04 01:57:13', 'Evaluación bimestral 1.pdf', 'Reporte bimestral 1.pdf', 'vivienda', 'Aceptado', NULL),
(8, 'kimberly', '2001-08-09', '9998152664', 'kim@gmail.com', 'ncjabsjasbdakjd', 'divorciado', 'trabajadora', 0.00, 'no', 'bachillerato', 'propia', 'muy mala', 1, 1, 1, 1, 1, 'Evaluaciขn bimestral 1 una hoja.pdf', 'Evaluaciขn bimestral 1 chris.pdf', 1, 1, '2024-11-05 23:51:29', 'Reporte bimestral 1 chris.pdf', 'Evaluaciขn bimestral 1 una hoja.pdf', 'economico', 'Aceptado', NULL),
(9, 'emanuel gallina ', '1998-05-05', '9998258501', 'ema@gmail.com', 'dadsadasd', 'casado', 'adadada', 0.00, 'si', 'bachillerato', 'prestada', 'dsadasdad', 1, 1, 1, 1, 1, 'Evaluaciขn bimestral 1 chris.pdf', 'Evaluaciขn bimestral 1 una hoja.pdf', 1, 1, '2024-11-05 18:33:27', 'Evaluaciขn bimestral 1 chris.pdf', 'Evaluaciขn bimestral 1 una hoja.pdf', 'vivienda', 'En Revisión', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD PRIMARY KEY (`id_noticia`);

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
-- AUTO_INCREMENT de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  MODIFY `id_noticia` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `registro`
--
ALTER TABLE `registro`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `solicitudes_apoyo`
--
ALTER TABLE `solicitudes_apoyo`
  MODIFY `id_solicitud` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
