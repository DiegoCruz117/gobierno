-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-10-2024 a las 07:05:49
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
  `respuesta` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `registro`
--

INSERT INTO `registro` (`id`, `nombre`, `apellido`, `correo`, `contrasena`, `fecha`, `pregunta`, `respuesta`) VALUES
(13, 'Christian', 'Gomez', 'christiangomez@hotmail.com', '$2y$10$bXxAt2pnAzZcHXJSrKtZtus6MI074G/8ioaJCgVn7W7z4E281/6ha', '2024-06-10', NULL, NULL),
(22, 'chris', 'gomez', '1@1', '$2y$10$b2xp6tE84aCKDYjkGXZu.eclsZRXPvaUsXu.FUdWEFGoDIphLng0y', '2024-10-09', 'lugar_nacimiento', '$2y$10$Ts91a2c0aXkTPWDIe8IJGunm3HM6jeOxvmHYTdEUA9.'),
(25, '1', '2', '2@2', '$2y$10$o2bj2pcx6VBsOLjnpfRsbuQ0G.pOHfPtIx71ZBpTrzrJzvTUrSHgu', '2024-10-22', 'lugar_nacimiento', '$2y$10$yT07emhztZi8JLN8tgvuzOJQbiEI/i4GgcV77mrsVKp'),
(26, 'chris', 'gomez', '3@3', '$2y$10$2KIJeIGaFZXl6wZsF0v1QOoEh0IS.lp9XRFQBYRwduILm4IvkQozi', '2024-10-17', 'nombre_mascota', 'dogo'),
(28, '1', '1', '5@5', '$2y$10$/RrSoiZmJRAPAI6NGH6yJ.ocwDaJAyNxEf/nbcoNlHTXCh2/ax3h2', '2024-10-16', 'lugar_nacimiento', 'cancun'),
(29, 'chris', 'rodriguez', 'chris@gmail.com', '$2y$10$1yKPQ.NwoB.vNDaOTAqHnee6wQnFFy3ze855vp2lT.JO512/92Hwu', '2024-10-02', 'lugar_nacimiento', 'cancun'),
(30, 'Emmanuel', 'Dzib', 'Emma@gmail.com', '$2y$10$fFA23aKdE5V.ukqpFHTvPOQaKCgPccVMEpMsZ1RAR4AgrzLxPKLWi', '1997-02-03', 'lugar_nacimiento', 'Merida'),
(31, 'Emiliano', 'euan', 'emiieuan@hotmail.com', '$2y$10$NsXsZnGn0c3X.U4wLLxMseXoD5TUvScJXXsoTBqOnLv01IT4WJUum', '2024-10-21', 'escuela_primaria', 'juan n alvarez'),
(32, 'emili', 'ea', 'christiangomez@hotmail', '1234', '2024-10-17', 'nombre_mascota', 'pulga');

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
  `tipo_apoyo` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `solicitudes_apoyo`
--

INSERT INTO `solicitudes_apoyo` (`id_solicitud`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `direccion`, `estado_civil`, `ocupacion`, `ingresos`, `seguro_medico`, `nivel_educativo`, `tipo_vivienda`, `descripcion`, `mayor_edad`, `residencia`, `nacionalidad`, `ingresos_menores`, `identificacion_vigente`, `identificacion`, `comprobante_domicilio`, `consentimiento`, `terminos`, `fecha_solicitud`, `informe_danos`, `documentacion_terreno`, `tipo_apoyo`) VALUES
(7, 'dasdasd', '2024-10-14', 'as23423', '4fds@fdsf', 'fsdfsdf', 'casado', 'fsdfs', 32332.00, 'no', 'bachillerato', 'prestada', 'fsdfsdfsdf', 1, 1, 1, 1, 1, 'expo ia .pdf', 'Evaluaciขn bimestral 1 chris.pdf', 1, 1, '2024-10-24 03:11:43', '', '', 'alimentario'),
(8, 'dasda', '2024-10-23', '98908098098', 'adad@fsdf', 'sdfsdfsdf', 'divorciado', 'fsdfsdf', 0.00, 'si', 'bachillerato', 'rentada', 'sfdfsdf', 1, 1, 1, 1, 1, '20210531222741_IMG_0627.JPG', 'Captura de pantalla 2024-10-22 203359.png', 1, 1, '2024-10-24 04:25:38', '', '', 'economico'),
(9, 'dasd', '2024-10-23', 'fghf', '1@1', 'hfhf', 'divorciado', 'dad', 0.00, 'si', 'bachillerato', 'rentada', 'adsada', 1, 1, 1, 1, 1, 'Captura de pantalla 2024-10-22 203359.png', 'Captura de pantalla 2024-10-22 203359.png', 1, 1, '2024-10-24 04:38:07', '', '', 'economico');

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
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `solicitudes_apoyo`
--
ALTER TABLE `solicitudes_apoyo`
  MODIFY `id_solicitud` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
