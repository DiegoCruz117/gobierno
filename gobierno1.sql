-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-12-2024 a las 00:15:44
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
-- Base de datos: `gobierno1`
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
(92, 'emanuel  padilla', 'FINANCIERO APOYO', 3, 'a,s a,sbdasb', '2024-11-19 18:42:16', 0),
(93, 'holaq dasd', 'Alimentación Apoyo', 2, 'por gay', '2024-11-19 18:44:26', 0),
(94, 'chris gomez', 'Alimentación Apoyo', 1, '', '2024-11-19 20:37:24', 0),
(95, 'emanuel  padilla', 'FINANCIERO APOYO', 5, 'Comentario opcional', '2024-11-19 20:38:26', 0),
(96, 'emanuel  padilla', 'FINANCIERO APOYO', 2, '1234\n', '2024-11-30 00:23:17', 0),
(97, 'chris gomez', 'Alimentación Apoyo', 2, '152', '2024-11-30 00:24:46', 0),
(98, 'mono gallina', 'FINANCIERO APOYO', 2, 'hOLA', '2024-11-30 00:26:59', 0),
(99, 'mono gallina', 'FINANCIERO APOYO', 1, 'hOLA', '2024-11-30 00:27:51', 0),
(100, 'mono gallina', 'FINANCIERO APOYO', 1, '123', '2024-11-30 00:28:45', 0),
(101, 'emanuel  padilla', 'FINANCIERO APOYO', 1, '123', '2024-11-30 19:54:04', 0);

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
(7, 'Nuevos programas de apoyo 2024', '2024-11-18', 'El gobierno ha anunciado nuevos programas para apoyar a comunidades afectadas por la crisis económica global.', '<p>El 2024 llega con buenas noticias para las familias y comunidades m&aacute;s vulnerables, ya que se han anunciado una serie de programas de apoyo que buscan transformar vidas y generar oportunidades en diversos sectores. Aqu&iacute; te presentamos los detalles:</p>\r\n\r\n<h4><strong>Apoyo Alimentario Sustentable</strong></h4>\r\n\r\n<p>Este programa tiene como objetivo garantizar la seguridad alimentaria de las familias m&aacute;s necesitadas mediante la entrega de canastas b&aacute;sicas, que ahora incluir&aacute;n productos frescos y de cooperativas locales. Adem&aacute;s, se fomentar&aacute; la creaci&oacute;n de huertos urbanos, ofreciendo talleres sobre nutrici&oacute;n y cultivo sostenible.</p>\r\n\r\n<h4><strong>Becas Universitarias para J&oacute;venes</strong></h4>\r\n\r\n<p>Con el prop&oacute;sito de impulsar la educaci&oacute;n superior, se han firmado convenios con universidades nacionales e internacionales para ofrecer becas completas y parciales. Este programa estar&aacute; enfocado en carreras con alta demanda, como tecnolog&iacute;a, ciencias y humanidades, asegurando una preparaci&oacute;n de calidad para las futuras generaciones.</p>\r\n\r\n<h4><strong>Impulso al Emprendimiento</strong></h4>\r\n\r\n<p>Para quienes buscan iniciar o fortalecer sus negocios, se lanzar&aacute; un programa de incentivos que incluye fondos de inversi&oacute;n, capacitaciones y asesor&iacute;as personalizadas. Este a&ntilde;o, el &eacute;nfasis estar&aacute; en proyectos sostenibles y digitales, con el apoyo de mentores especializados en innovaci&oacute;n.</p>\r\n\r\n<h4><strong>Vivienda Digna para Todos</strong></h4>\r\n\r\n<p>Conscientes de la importancia de un hogar seguro, se implementar&aacute; un programa para la construcci&oacute;n de viviendas ecol&oacute;gicas, dise&ntilde;adas con materiales sostenibles y sistemas de energ&iacute;a renovable. Este apoyo tambi&eacute;n incluye cr&eacute;ditos accesibles para remodelaci&oacute;n o adquisici&oacute;n de viviendas.</p>\r\n', 'fotos/2024-11-18-03-50-28_2024-11-17-11-57-11_Nuevos-programas-de-apoyo-2024.png', 'newspaper'),
(9, 'Convenio con instituciones educativas', '2024-11-22', 'Se firmó un convenio con varias universidades para proporcionar becas a estudiantes de bajos recursos.', '<p>Esta ma&ntilde;ana tuvo lugar la firma de un Convenio Marco de colaboraci&oacute;n, entre la Universidad Modelo y el TecNM Campus M&eacute;rida.</p>\r\n\r\n<p>El importante documento, por el cual sumar&aacute;n fortalezas ambas instituciones de Educaci&oacute;n Superior tuvo lugar en el Centro de Innovaci&oacute;n del edificio de Ingenier&iacute;a de la Universidad Modelo. Por la Universidad Modelo, el Rector Ing. Carlos Sauri Duch, el director General de la Universidad Modelo Carlos Sauri Quintal y por el TecNM Campus M&eacute;rida el director, el M.C. Jos&eacute; Antonio Canto Esquivel.</p>\r\n\r\n<p>El objetivo del Convenio es: Formalizar la alianza Institucional entre ambas casas de estudio de nivel superior con gran posicionamiento regional, que permitan intercambiar talento, infraestructura y experiencia, para complementar y potencializar el trabajo acad&eacute;mico y de vinculaci&oacute;n, orientado a un mejor servicio educativo a las y los j&oacute;venes universitarios.</p>\r\n\r\n<p>Canto Esquivel refiri&oacute;, que la Universidad Modelo y la instituci&oacute;n a su cargo mantienen estrechos v&iacute;nculos de colaboraci&oacute;n, desde tiempo atr&aacute;s, compartiendo personal docente as&iacute; como la realizaci&oacute;n de programas acad&eacute;micos en los que participan las comunidades acad&eacute;micas y estudiantiles de ambas instituciones. Agreg&oacute; que, corresponde ahora establecer proyectos espec&iacute;ficos que abonen a la educaci&oacute;n superior para impactar positivamente el desarrollo estatal y regional.</p>\r\n\r\n<p>En ese orden de ideas, el director del TecNM Campus M&eacute;rida, se&ntilde;al&oacute; que la alianza que se establece a trav&eacute;s del Convenio se orientar&aacute; a tres cometidos iniciales:</p>\r\n\r\n<p>El primero entre la Escuela de Comunicaci&oacute;n y la Escuela de Dise&ntilde;o Gr&aacute;fico de la Universidad Modelo con el departamento de Comunicaci&oacute;n y Difusi&oacute;n del TecNM Campus M&eacute;rida, con el prop&oacute;sito de realizar proyectos relacionados con la imagen Institucional de tal manera que se potencialice el posicionamiento de nuestra instituci&oacute;n.</p>\r\n\r\n<p>El segundo compartir el uso de la C&aacute;mara Gesell de la Universidad Modelo, para el desarrollo de proyectos de Mercadotecnia por parte del Centro de Desarrollo de Negocios -en estructuraci&oacute;n- as&iacute; como recibir asesor&iacute;a para la construcci&oacute;n de una propia.</p>\r\n\r\n<p>El tercer cometido, se refiere al proyecto de arborizaci&oacute;n del &aacute;rea de estacionamiento para contribuir al objetivo de Educaci&oacute;n Sustentable, para cuyo efecto se contar&aacute; con el apoyo de especialistas de la Universidad Modelo y de la Unidad de Desarrollo Sustentable del Ayuntamiento de M&eacute;rida.</p>\r\n\r\n<p>Estos &uacute;ltimos dos impactan directamente al Campus Poniente de nuestra Instituci&oacute;n.</p>\r\n\r\n<p>En adici&oacute;n a estas iniciativas, se trabajar&aacute; en proyectos relacionados con la infraestructura con la que disponen ambas instituciones educativas, para promover visitas de pr&aacute;cticas entre estudiantes de carreras de Ingenier&iacute;a afines.</p>\r\n\r\n<p>Seguidamente, se procedi&oacute; a la firma del Convenio Marco de Colaboraci&oacute;n Acad&eacute;mica, Cient&iacute;fica, Tecnol&oacute;gica y de Investigaci&oacute;n entre la Universidad Modelo y el TecNM Campus M&eacute;rida.</p>\r\n\r\n<p>Por su parte, el rector de la Universidad Modelo Ing. Carlos Sauri Duch, en su mensaje, se&ntilde;al&oacute; que hist&oacute;ricamente, ha sido protagonista del desarrollo durante su gesti&oacute;n administrativa en ambas instituciones, lo cual le ha dado mucha satisfacci&oacute;n y experiencias. Mencion&oacute; que las alianzas sostenidas han cumplido con el prop&oacute;sito de brindar servicios educativos de excelencia y ello es algo que se propicia al trabajar en equipo. Refiri&oacute; tambi&eacute;n que, la labor conjunta beneficiar&aacute; a las y los estudiantes en formaci&oacute;n, en cada instancia en su respectivo &aacute;mbito.</p>\r\n\r\n<p>#TodosSomosTecNM</p>\r\n', 'fotos/2024-11-18-04-38-14_Convenio con instituciones educativas.png', 'handshake'),
(10, 'Nueva Iniciativa de Educación', '2024-11-29', 'El gobierno anuncia un nuevo programa para mejorar la calidad educativa en las zonas rurales, con el objetivo de reducir la brecha educativa.', '<h3><strong>Beca Rita Cetina: Apoyo Monetario Escolar para el Futuro de M&eacute;xico</strong></h3>\r\n\r\n<p>El Gobierno de M&eacute;xico ha puesto en marcha una nueva iniciativa: la <strong>Beca Rita Cetina</strong>, dise&ntilde;ada para garantizar que ning&uacute;n estudiante abandone sus estudios por falta de recursos econ&oacute;micos. Este programa busca fortalecer el acceso a la educaci&oacute;n en niveles b&aacute;sicos, beneficiando inicialmente a estudiantes de secundaria y con planes de expansi&oacute;n hacia primaria y preescolar.</p>\r\n\r\n<h3><strong>&iquest;Cu&aacute;l es el monto de la Beca Rita Cetina para 2025?</strong></h3>\r\n\r\n<ul>\r\n	<li><strong>Monto Base</strong>: $1,900 pesos bimestrales por familia.</li>\r\n	<li><strong>Adicional por estudiante de secundaria</strong>: $700 pesos bimestrales por cada hijo en este nivel.</li>\r\n</ul>\r\n\r\n<p><strong>Ejemplos</strong>:</p>\r\n\r\n<ul>\r\n	<li>Una familia con <strong>2 estudiantes en secundaria</strong> recibir&aacute; $2,600 pesos bimestrales.</li>\r\n	<li>Una familia con <strong>3 estudiantes en secundaria</strong> obtendr&aacute; $3,300 pesos bimestrales.</li>\r\n</ul>\r\n\r\n<p>El programa tiene como objetivo beneficiar inicialmente a <strong>5.6 millones de estudiantes de secundaria</strong> y expandirse hasta alcanzar <strong>21.4 millones de alumnos de educaci&oacute;n b&aacute;sica</strong> en el futuro.</p>\r\n\r\n<h3><strong>Fechas de inscripci&oacute;n</strong></h3>\r\n\r\n<ul>\r\n	<li><strong>Inicio</strong>: Lunes 11 de noviembre de 2024.</li>\r\n	<li><strong>Cierre</strong>: Mi&eacute;rcoles 18 de diciembre de 2024.</li>\r\n</ul>\r\n\r\n<h3><strong>Requisitos para el registro</strong></h3>\r\n\r\n<h4><strong>Documentos del estudiante</strong></h4>\r\n\r\n<ol>\r\n	<li>Acta de nacimiento legible.</li>\r\n	<li>CURP actualizada.</li>\r\n	<li>Comprobante de estudios (credencial escolar, constancia de inscripci&oacute;n o boleta).</li>\r\n</ol>\r\n\r\n<h4><strong>Documentos del padre, madre o tutor</strong></h4>\r\n\r\n<ol>\r\n	<li>Identificaci&oacute;n oficial vigente.</li>\r\n	<li>CURP.</li>\r\n	<li>Comprobante de domicilio (no mayor a 6 meses).</li>\r\n	<li>Acta de nacimiento del tutor.</li>\r\n</ol>\r\n\r\n<h3><strong>&iquest;C&oacute;mo inscribirse?</strong></h3>\r\n\r\n<p>El registro ser&aacute; completamente en l&iacute;nea. Aseg&uacute;rate de tener todos los documentos requeridos en formato digital y cumplir con las fechas establecidas para evitar retrasos en el proceso.</p>\r\n\r\n<p><strong>&iexcl;Aprovecha esta oportunidad para asegurar la educaci&oacute;n de tus hijos con la Beca Rita Cetina!</strong></p>\r\n', 'fotos/2024-11-18-04-42-05_f960x540-655491_729566_5050.png', 'bullhorn'),
(11, 'Campaña de Vacunación', '2025-02-04', 'Se inicia una nueva campaña de vacunación para combatir enfermedades prevenibles. Se recomienda a la población acudir a sus centros de salud más cercanos.', '<p>Se aplicar&aacute;n m&aacute;s de 36 millones de dosis contra influenza y aproximadamente 22 millones contra COVID-19</p>\r\n\r\n<p>&middot; Se emplear&aacute;n vacunas contra influenza tetravalentes fabricadas en M&eacute;xico que cuentan con los m&aacute;s altos est&aacute;ndares de calidad reconocidos por Cofepris, FDA, y ENA</p>\r\n\r\n<p>Ciudad de M&eacute;xico, 15 de octubre de 2024.- El secretario de Salud, David Kershenobich Stalnikowitz, inaugur&oacute; la Campa&ntilde;a Nacional de Vacunaci&oacute;n contra Influenza y COVID-19 para la Temporada Invernal 2024-2025, en compa&ntilde;&iacute;a de los directores generales de instituciones p&uacute;blicas de salud como IMSS-Bienestar, Instituto Mexicano del Seguro Social (IMSS) e Instituto de Seguridad y Servicios Sociales de los Trabajadores del Estado (Issste).</p>\r\n\r\n<p>Durante la ceremonia inaugural, Kershenobich Stalnikowitz inform&oacute; que la actual administraci&oacute;n federal tiene el compromiso de que M&eacute;xico produzca cada vez m&aacute;s vacunas. Puso como ejemplo la vacuna tetravalente contra la influenza, la cual ya es producida en territorio mexicano.</p>\r\n\r\n<p>Estas vacunas, adem&aacute;s, cuentan con autorizaciones no solamente de la Comisi&oacute;n Federal para la Protecci&oacute;n contra Riesgos Sanitarios (Cofepris) de M&eacute;xico, sino tambi&eacute;n de la Agencia de Alimentos y Medicamentos de Estados Unidos (FDA, por sus siglas en ingl&eacute;s) y de la Agencia Europea de Medicamentos (EMA, tambi&eacute;n por sus siglas en ingl&eacute;s).</p>\r\n\r\n<p>El secretario Kershenobich se&ntilde;al&oacute; que la presidenta de M&eacute;xico, Claudia Sheinbaum Pardo, tiene muy clara la importancia que representa la prevenci&oacute;n y la atenci&oacute;n primaria a la salud, as&iacute; como la atenci&oacute;n a las comorbilidades, las cuales est&aacute;n consideradas en el dise&ntilde;o e implementaci&oacute;n de la actual campa&ntilde;a nacional de vacunaci&oacute;n.</p>\r\n\r\n<p>Destac&oacute; la importancia que tiene la vacunaci&oacute;n al se&ntilde;alar que, gracias a ella, en la actualidad contamos con una esperanza de vida pr&aacute;cticamente del doble de tiempo que hace 100 a&ntilde;os, y destac&oacute; que la presente campa&ntilde;a de vacunaci&oacute;n inicia muy a tiempo porque a&uacute;n no comienza la temporada invernal y ya se est&aacute; actuando con objeto de adelantarnos a la aparici&oacute;n de las infecciones.</p>\r\n\r\n<p>Por su parte, el subsecretario de Prevenci&oacute;n y Promoci&oacute;n de la Salud, Ramiro L&oacute;pez Elizalde, inform&oacute; que en esta campa&ntilde;a se aplicar&aacute;n m&aacute;s de 36 millones de dosis de la vacuna contra la influenza y aproximadamente 22 millones de dosis de la vacuna contra COVID-19 en todo el pa&iacute;s, adem&aacute;s de que se impulsar&aacute; la vacunaci&oacute;n contra neumococo para personas adultas mayores de 60 a&ntilde;os.</p>\r\n', 'fotos/2024-11-18-05-06-09_post_WhatsApp_Image_2024-10-14_at_5.03.59_PM.jpeg', 'calendar-alt'),
(12, 'Espacio de Quejas y Sugerencias', '2025-01-03', 'El gobierno habilita un nuevo canal para recibir quejas y sugerencias de la ciudadanía, fomentando la participación y transparencia.', '<p><strong>&iexcl;Tu opini&oacute;n es clave para construir un mejor gobierno!</strong> 🗣️✨</p>\r\n\r\n<p>Con el compromiso de fomentar una administraci&oacute;n p&uacute;blica m&aacute;s abierta, participativa y cercana a la ciudadan&iacute;a, el Gobierno de [Nombre de la Entidad] anuncia la apertura de un <strong>nuevo canal oficial</strong> para recibir <strong>quejas y sugerencias</strong>. Este espacio est&aacute; dise&ntilde;ado para que t&uacute;, como ciudadano, puedas expresar tus inquietudes, compartir tus ideas y contribuir activamente al desarrollo de nuestra comunidad.</p>\r\n\r\n<p>🔍 <strong>&iquest;Por qu&eacute; habilitamos este canal?</strong><br />\r\nNuestro objetivo es escuchar directamente a los ciudadanos y ciudadanas, entender sus necesidades y preocupaciones, y trabajar juntos para encontrar soluciones que beneficien a todos. Este es un paso m&aacute;s hacia la construcci&oacute;n de un gobierno que pone a las personas en el centro de sus decisiones, promoviendo la <strong>transparencia</strong>, la <strong>rendici&oacute;n de cuentas</strong> y la <strong>confianza mutua</strong>.</p>\r\n\r\n<p>📩 <strong>&iquest;C&oacute;mo puedes participar?</strong></p>\r\n\r\n<ul>\r\n	<li><strong>Quejas:</strong> Si has detectado irregularidades, deficiencias o cualquier aspecto que consideres necesario mejorar en los servicios o programas p&uacute;blicos, comp&aacute;rtelo con nosotros.</li>\r\n	<li><strong>Sugerencias:</strong> Si tienes ideas, propuestas o iniciativas que puedan contribuir a mejorar la calidad de vida en nuestra comunidad, &iexcl;tambi&eacute;n queremos escucharlas!</li>\r\n</ul>\r\n\r\n<p>📋 <strong>&iquest;D&oacute;nde enviar tus comentarios?</strong></p>\r\n\r\n<ol>\r\n	<li><strong>Correo electr&oacute;nico:</strong> Env&iacute;a un mensaje detallado a [correo@ejemplo.com].</li>\r\n	<li><strong>Formulario en l&iacute;nea:</strong> Completa el formulario disponible en nuestro sitio web oficial: <a href=\"#\" rel=\"noopener\">www.ejemplo.com/participacion-ciudadana</a>.</li>\r\n	<li><strong>L&iacute;nea telef&oacute;nica:</strong> Llama al [n&uacute;mero] y habla con uno de nuestros representantes.</li>\r\n	<li><strong>Oficinas de Atenci&oacute;n Ciudadana:</strong> Ac&eacute;rcate a nuestras oficinas en [direcci&oacute;n] y llena el formato f&iacute;sico.</li>\r\n</ol>\r\n\r\n<p>💡 <strong>Compromiso de respuesta</strong><br />\r\nGarantizamos que todas las quejas y sugerencias ser&aacute;n evaluadas por nuestro equipo especializado. En un plazo m&aacute;ximo de [X d&iacute;as h&aacute;biles], recibir&aacute;s una respuesta clara y, cuando sea posible, una soluci&oacute;n o seguimiento concreto.</p>\r\n\r\n<p>📢 <strong>&iexcl;Hagamos la diferencia juntos!</strong><br />\r\nEste canal es m&aacute;s que una herramienta; es un compromiso de nuestro gobierno para trabajar mano a mano con la ciudadan&iacute;a, construir una comunidad m&aacute;s justa y fortalecer los lazos de confianza entre las autoridades y la poblaci&oacute;n. Cada opini&oacute;n cuenta y tiene el potencial de generar un impacto positivo.</p>\r\n\r\n<p>#GobiernoAbierto #Participaci&oacute;nCiudadana #TuVozCuenta #Transparencia #CompromisoConLaComunidad</p>\r\n', 'fotos/2024-11-18-05-09-22_Buzon-de-quejas-y-sugerencias-empresa.jpg', 'comments');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `quejas_sugerencias`
--

CREATE TABLE `quejas_sugerencias` (
  `id` int(11) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `mensaje` varchar(2500) NOT NULL,
  `ruta` varchar(2500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `quejas_sugerencias`
--

INSERT INTO `quejas_sugerencias` (`id`, `tipo`, `mensaje`, `ruta`) VALUES
(1, 'queja', '123', ''),
(2, 'queja', 'Hola', 'fotos/2024-11-19-06-33-49_'),
(3, 'sugerencia', 'Sugerencia1', 'fotos/2024-11-19-06-34-55_'),
(4, 'queja', 'Queja1', ''),
(5, 'queja', 'klgsdfklgdflksgjfd_', ''),
(6, 'queja', 'No hay papel en el baño, me ando surando, no mames ', ''),
(7, 'queja', 'El integrante de mi equipo (Ragde), no hace nada', ''),
(8, 'sugerencia', 'Que no le muevan al ora después de las 11pm (sale mal)', ''),
(9, 'queja', 'wrsfa', ''),
(10, 'sugerencia', '123', ''),
(11, 'queja', '123', '');

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
(1, 'Cecilia Anunciación ', 'Patrón Laviada', 'cecilia.patron@merida.gob.mx', '$2y$10$eXbRtR9D1ECQpEHNbBp/w.7Fxl7D5OAsS9BlVRkBAQlTPCqTbv5rS', '2024-11-05', NULL, NULL, 'alcalde'),
(2, 'Christian Isaac', 'gomez', 'christiangomez@hotmail.com', '$2y$10$4NrvnlmxaB.UVqqtWz6/GecORQteVI7LBS4pXbCtgZZ/cZWY5BWce', '2001-06-08', NULL, NULL, 'administrador'),
(3, 'mono', 'gallina', 'mono@gmail.com', '$2y$10$ej4TrOzgNz49slmNvFNdK.nnd5P.fThCOaPboaJGYSX1jK2FsHBXG', '2003-04-10', 'lugar_nacimiento', 'merida', 'usuario'),
(4, 'Emmauel', 'Dzib', 'emma@gmail.com', '$2y$10$fz2ButIql7uVcl1EJTbZIecbT8pxv9kl6y39aRT/30VQ712N3ntcK', '1997-02-03', 'nombre_mascota', 'tito', 'usuario'),
(5, 'Diego Augusto', 'Cruz Rivero', 'diego.cruz@gmail.com', '$2y$10$f7ZffvdvtIm8PhEsfVopsuN8rWxyIm0SIzX6.tM5Ef1FvgiO97o0u', '2002-05-30', 'nombre_mascota', 'Nino', 'usuario');

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
(9, 'emanuel gallina ', '1998-05-05', '9998258501', 'ema@gmail.com', 'dadsadasd', 'casado', 'adadada', 0.00, 'si', 'bachillerato', 'prestada', 'dsadasdad', 1, 1, 1, 1, 1, 'Evaluaciขn bimestral 1 chris.pdf', 'Evaluaciขn bimestral 1 una hoja.pdf', 1, 1, '2024-11-05 18:33:27', 'Evaluaciขn bimestral 1 chris.pdf', 'Evaluaciขn bimestral 1 una hoja.pdf', 'vivienda', 'En Revisión', NULL),
(10, '', '0000-00-00', '9991654321', '', 'Dirección 1', 'soltero', 'Estudiante', 0.00, 'si', 'bachillerato', 'rentada', 'Situación 1', 1, 1, 1, 1, 1, 'El good.pdf', '2.1 Análisis Estado-Espacio-Operador EEO. Parte 1.pdf', 1, 1, '2024-11-30 18:33:10', '', '', 'economico', 'En Revisión', NULL),
(11, 'mono gallina', '2003-04-10', '9993651321', 'mono@gmail.com', 'Dirección 2', 'soltero', 'dfasdfad', 0.00, 'no', 'secundaria', 'rentada', 'EwefWEF', 1, 1, 1, 1, 1, 'Equipo6_Analisis_EEO.pdf', 'El good.pdf', 1, 1, '2024-11-30 18:49:23', '', '', 'economico', 'En Revisión', NULL),
(12, 'emmauel dzib', '1997-02-03', '9991231654', 'emma@gmail.com', 'Dirección 3', 'soltero', 'Didi', 0.00, 'si', 'bachillerato', 'propia', 'Situación 3', 1, 1, 1, 1, 1, '2.1 Análisis Estado-Espacio-Operador EEO. Parte 1.pdf', 'El good.pdf', 1, 1, '2024-11-30 19:15:42', '', '', 'economico', 'En Revisión', NULL),
(17, 'Diego Augusto Cruz Rivero', '2002-05-30', '9998215612', 'diego.cruz@gmail.com', 'Dirección de apoyo económico', 'soltero', 'Estudiante', 0.00, 'si', 'primaria', 'propia', 'Situación apoyo económico', 1, 1, 1, 1, 1, 'El good.pdf', 'Equipo6_Analisis_EEO.pdf', 1, 1, '2024-11-30 22:55:44', '', '', 'economico', 'Rechazado', NULL),
(18, 'Diego Augusto Cruz Rivero', '2002-05-30', '9998215612', 'diego.cruz@gmail.com', 'Dirección de apoyo alimentario', 'viudo', 'Ocupación de apoyo alimentario', 0.00, 'si', 'primaria', 'propia', 'Situación apoyo alimentario', 1, 1, 1, 1, 1, '2.1 Análisis Estado-Espacio-Operador EEO. Parte 1.pdf', 'Equipo6_Analisis_EEO.pdf', 1, 1, '2024-11-30 22:55:35', '', '', 'Alimentario', 'Aceptado', NULL),
(19, 'Diego Augusto Cruz Rivero', '2002-05-30', '9998215612', 'diego.cruz@gmail.com', 'Dirección de apoyo vivienda', 'divorciado', 'Ocupación de apoyo vivienda', 0.00, 'no', 'secundaria', 'rentada', 'Situación apoyo vivienda', 1, 1, 1, 1, 1, 'El good.pdf', '2.1 Análisis Estado-Espacio-Operador EEO. Parte 1.pdf', 1, 1, '2024-11-30 22:55:45', 'Equipo6_Analisis_EEO.pdf', 'Carta_de_Acpetacion_Joel_Cauich.pdf', 'vivienda', 'Rechazado', NULL);

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
-- Indices de la tabla `quejas_sugerencias`
--
ALTER TABLE `quejas_sugerencias`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id_encargado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT de la tabla `crear_apoyos`
--
ALTER TABLE `crear_apoyos`
  MODIFY `id_apoyos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `crear_encargados`
--
ALTER TABLE `crear_encargados`
  MODIFY `id_encargados` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  MODIFY `id_noticia` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `quejas_sugerencias`
--
ALTER TABLE `quejas_sugerencias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `registro`
--
ALTER TABLE `registro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `solicitudes_apoyo`
--
ALTER TABLE `solicitudes_apoyo`
  MODIFY `id_solicitud` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

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
