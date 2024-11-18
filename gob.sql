-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-11-2024 a las 06:00:20
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
-- Base de datos: `gob`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificaciones`
--

CREATE TABLE `calificaciones` (
  `id_encargado` int(11) NOT NULL,
  `encargado` varchar(255) NOT NULL,
  `proyecto` varchar(255) NOT NULL,
  `rating` tinyint(4) NOT NULL,
  `comentario` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `calificaciones`
--

INSERT INTO `calificaciones` (`id_encargado`, `encargado`, `proyecto`, `rating`, `comentario`, `fecha`, `id`) VALUES
(69, 'mono gallina', 'FINANCIERO APOYO', 1, '1', '2024-11-18 04:43:49', 0),
(70, 'emanuel  padilla', 'FINANCIERO APOYO', 3, 'Emanuel quesadilla', '2024-11-18 04:44:35', 0),
(71, 'chris gomez', 'Alimentación Apoyo', 1, '1', '2024-11-18 04:48:04', 0),
(72, 'chris gomez', 'Alimentación Apoyo', 3, '3', '2024-11-18 04:48:38', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `crear_apoyos`
--

CREATE TABLE `crear_apoyos` (
  `id_apoyos` int(11) NOT NULL,
  `icono_apoyos` varchar(50) DEFAULT NULL,
  `nombre_programa` varchar(100) DEFAULT NULL,
  `fecha_programa` date DEFAULT NULL,
  `descripcioncorta` text DEFAULT NULL,
  `descripcionlarga` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `crear_apoyos`
--

INSERT INTO `crear_apoyos` (`id_apoyos`, `icono_apoyos`, `nombre_programa`, `fecha_programa`, `descripcioncorta`, `descripcionlarga`) VALUES
(1, 'hand-holding-usd', 'FINANCIERO APOYO', '2024-10-30', '123', '<p>456</p>\r\n'),
(2, '', 'Alimentación Apoyo', '2024-11-04', '123', '<p>4456</p>\r\n');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `crear_encargados`
--

CREATE TABLE `crear_encargados` (
  `id_encargados` int(11) NOT NULL,
  `nombres` varchar(100) DEFAULT NULL,
  `apellidos` varchar(100) DEFAULT NULL,
  `id_apoyos` int(11) NOT NULL,
  `correo` varchar(80) DEFAULT NULL,
  `numero_tel` varchar(10) DEFAULT NULL,
  `edad` date DEFAULT NULL,
  `sexo` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `crear_encargados`
--

INSERT INTO `crear_encargados` (`id_encargados`, `nombres`, `apellidos`, `id_apoyos`, `correo`, `numero_tel`, `edad`, `sexo`) VALUES
(1, 'mono', 'gallina', 1, 'mono@gmail.com', '9988234765', '2024-11-11', 'Femenino'),
(2, 'emanuel ', 'padilla', 1, 'ema@gmail.com', '9988001122', '2024-11-11', 'Masculino'),
(3, 'chris', 'gomez', 2, 'c@gmai.com', '9981290763', '2006-01-01', 'Otro'),
(4, 'holaq', 'dasd', 2, 'dasdasd@adsdas.com', '9847582903', '2000-11-11', 'Otro');

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
(2, 'Nuevos programas de apoyo 2024', '2024-06-05', 'El gobierno ha anunciado nuevos programas para apoyar a comunidades afectadas por la crisis económica global.', '<p>En 2024, varios programas de apoyo social est&aacute;n en marcha en M&eacute;xico, con planes para expandirse en 2025. Destacan tres nuevas iniciativas anunciadas por Claudia Sheinbaum, pr&oacute;xima presidenta de M&eacute;xico:</p>\r\n\r\n<ol>\r\n	<li>\r\n	<p><strong>Apoyo para Mujeres de 60 a 64 a&ntilde;os</strong>: Este programa brindar&aacute; un apoyo bimestral de aproximadamente la mitad de la pensi&oacute;n actual para adultos mayores, beneficiando a mujeres en ese rango de edad. El registro comenz&oacute; en octubre de 2024 y continuar&aacute; en etapas.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Beca Universal para Estudiantes de Educaci&oacute;n B&aacute;sica</strong>: Esta beca beneficiar&aacute; a ni&ntilde;os en escuelas p&uacute;blicas, desde preescolar hasta secundaria. El proceso de inscripci&oacute;n se realizar&aacute; en los planteles educativos, asegurando que los estudiantes reciban el apoyo econ&oacute;mico de manera directa.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Programa de Salud Casa por Casa</strong>: Este proyecto busca atender a adultos mayores a trav&eacute;s de visitas m&eacute;dicas domiciliarias, con el objetivo de ofrecer seguimiento en salud y realizar diagn&oacute;sticos preventivos</p>\r\n	</li>\r\n</ol>\r\n', 'fotos/2024-11-07-02-21-00_', 'newspaper'),
(4, 'Convenio con instituciones educativas', '2024-11-09', 'Se firmó un convenio con varias universidades para proporcionar becas a estudiantes de bajos recursos.', '<h3>Convenio con Instituciones Educativas de M&eacute;rida, Yucat&aacute;n</h3>\r\n\r\n<p><strong>Se firm&oacute; un convenio con varias universidades para proporcionar becas a estudiantes de bajos recursos.</strong> Este programa tiene como objetivo brindar acceso a la educaci&oacute;n superior a j&oacute;venes en situaci&oacute;n econ&oacute;mica desfavorable, promoviendo as&iacute; su desarrollo personal y profesional en beneficio de la comunidad de M&eacute;rida, Yucat&aacute;n.</p>\r\n\r\n<h4>Universidades Participantes:</h4>\r\n\r\n<ul>\r\n	<li><strong>Universidad Aut&oacute;noma de Yucat&aacute;n (UADY)</strong></li>\r\n	<li><strong>Universidad Marista de M&eacute;rida</strong></li>\r\n	<li><strong>Universidad An&aacute;huac Mayab</strong></li>\r\n	<li><strong>Universidad Modelo</strong></li>\r\n	<li><strong>Tecnol&oacute;gico de M&eacute;rida</strong></li>\r\n</ul>\r\n\r\n<h4>Requisitos para Aplicar:</h4>\r\n\r\n<ol>\r\n	<li><strong>Residencia</strong> en M&eacute;rida, Yucat&aacute;n.</li>\r\n	<li><strong>Condici&oacute;n socioecon&oacute;mica</strong>: Estar en situaci&oacute;n de vulnerabilidad econ&oacute;mica (documentada).</li>\r\n	<li><strong>Rendimiento acad&eacute;mico</strong>: Promedio m&iacute;nimo de 8.0 (o equivalente) en el &uacute;ltimo a&ntilde;o cursado.</li>\r\n	<li><strong>Compromiso</strong>: Disposici&oacute;n para realizar actividades de servicio social o voluntariado en su comunidad.</li>\r\n</ol>\r\n\r\n<h4>Documentaci&oacute;n Necesaria:</h4>\r\n\r\n<ul>\r\n	<li><strong>Comprobante de estudios</strong> (historial acad&eacute;mico actualizado).</li>\r\n	<li><strong>Comprobante de ingresos</strong> familiares (declaraci&oacute;n de ingresos o carta laboral).</li>\r\n	<li><strong>Carta de motivaci&oacute;n</strong> donde el estudiante exprese sus razones para solicitar la beca y c&oacute;mo esta beneficiar&aacute; su desarrollo.</li>\r\n	<li><strong>Identificaci&oacute;n oficial</strong> del solicitante y de sus padres o tutores (si es menor de edad).</li>\r\n</ul>\r\n\r\n<h4>Proceso de Aplicaci&oacute;n:</h4>\r\n\r\n<ol>\r\n	<li><strong>Registro en L&iacute;nea</strong>: Completar el formulario de solicitud en la plataforma.</li>\r\n	<li><strong>Carga de Documentos</strong>: Adjuntar la documentaci&oacute;n necesaria en formato PDF.</li>\r\n	<li><strong>Revisi&oacute;n de Solicitud</strong>: La solicitud ser&aacute; evaluada por el comit&eacute; de becas de la instituci&oacute;n seleccionada.</li>\r\n	<li><strong>Entrevista</strong>: Los candidatos preseleccionados ser&aacute;n contactados para una entrevista virtual o presencial.</li>\r\n	<li><strong>Notificaci&oacute;n</strong>: Los resultados ser&aacute;n enviados al correo electr&oacute;nico registrado en un plazo de 30 d&iacute;as h&aacute;biles.</li>\r\n</ol>\r\n\r\n<h4>Beneficios de la Beca:</h4>\r\n\r\n<ul>\r\n	<li><strong>Cobertura de matr&iacute;cula</strong> parcial o total, dependiendo de la universidad.</li>\r\n	<li><strong>Apoyo en materiales</strong> o recursos educativos adicionales (libros, software, etc.).</li>\r\n	<li><strong>Oportunidades de desarrollo</strong> a trav&eacute;s de programas de mentor&iacute;a y actividades extracurriculares.</li>\r\n</ul>\r\n\r\n<p>Este convenio simboliza el esfuerzo conjunto entre el gobierno y las universidades de M&eacute;rida para transformar el futuro de j&oacute;venes yucatecos, impulsando su acceso a una educaci&oacute;n superior de calidad.</p>\r\n', 'fotos/2024-11-10-01-23-25_', 'handshake');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE `registro` (
  `id` int(11) NOT NULL,
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
(5, 'd', '1', 'diego@gmail', '$2y$10$pJUeYO/IHp6WLu.QwQCs2u2nrDhSBc6K/oaQgmCoXx/pr7ismK1s.', '2024-10-29', 'lugar_nacimiento', 'merida', 'administrador'),
(6, 'Christian', 'Gomez', 'christiangomez@hotmail.com', '$2y$10$xh54WMiQm9jmHel0ft5dXOlAn8udOlZ6TxTxTTPDQlauUMPf7dNRm', '2024-11-01', NULL, NULL, 'usuario');

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
-- Indices de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD PRIMARY KEY (`id_encargado`),
  ADD KEY `id` (`id`);

--
-- Indices de la tabla `crear_apoyos`
--
ALTER TABLE `crear_apoyos`
  ADD PRIMARY KEY (`id_apoyos`);

--
-- Indices de la tabla `crear_encargados`
--
ALTER TABLE `crear_encargados`
  ADD PRIMARY KEY (`id_encargados`),
  ADD KEY `id_apoyos` (`id_apoyos`);

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
-- AUTO_INCREMENT de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  MODIFY `id_encargado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT de la tabla `crear_apoyos`
--
ALTER TABLE `crear_apoyos`
  MODIFY `id_apoyos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `crear_encargados`
--
ALTER TABLE `crear_encargados`
  MODIFY `id_encargados` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  MODIFY `id_noticia` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `registro`
--
ALTER TABLE `registro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `solicitudes_apoyo`
--
ALTER TABLE `solicitudes_apoyo`
  MODIFY `id_solicitud` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `crear_encargados`
--
ALTER TABLE `crear_encargados`
  ADD CONSTRAINT `encargados-apoyos` FOREIGN KEY (`id_apoyos`) REFERENCES `crear_apoyos` (`id_apoyos`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
