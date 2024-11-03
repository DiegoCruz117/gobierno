<?php
require "seguridad.php"; // Verifica que el usuario está autenticado
$usuario = htmlspecialchars($_SESSION['username']); // Escapa el nombre de usuario para evitar XSS
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Apoyo para Vivienda</title>
  <link rel="stylesheet" href="apoyos2.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

<!-- Encabezado -->
  <div class="header ancho">
    <h1>Detalles del Apoyo para Vivienda</h1>
</div>

<!-- Contenido Principal -->
<div class="container">
  <section class="detalle-apoyo">
    <h2><i class="fas fa-home"></i> Apoyo para Vivienda</h2>

    <p>
      El <strong style="color: var(--color1);">Apoyo para Vivienda</strong> tiene como objetivo mejorar las condiciones de vida de familias en situación vulnerable. 
      A través de este programa, se ofrecen subsidios para la rehabilitación de viviendas afectadas por desastres naturales o para aquellas que se encuentran en condiciones insalubres.
      Además, se brinda asistencia para la construcción de viviendas nuevas en terrenos regularizados.
    </p>

    <h3>Tipos de Apoyo para Vivienda:</h3>
    <ul>
      <li><strong>Rehabilitación de viviendas:</strong> Para familias cuya vivienda ha sufrido daños parciales o totales por fenómenos naturales como huracanes, terremotos o inundaciones.</li>
      <li><strong>Construcción de nuevas viviendas:</strong> Apoyo a quienes necesitan construir una vivienda digna desde cero, siempre y cuando cuenten con un terreno regularizado.</li>
      <li><strong>Mejoramiento de condiciones básicas:</strong> Se proporcionan recursos para mejorar instalaciones de agua potable, electricidad o saneamiento básico en viviendas rurales o urbanas marginadas.</li>
    </ul>

    <h3>Requisitos para solicitar este apoyo:</h3>
    <ul>
      <li>Ser mayor de 18 años.</li>
      <li>Residir en el municipio de Mérida.</li>
      <li>Demostrar la situación de vulnerabilidad o daños a la vivienda.</li>
      <li>Identificación oficial vigente (INE, pasaporte).</li>
    </ul>

    <h3>Documentación requerida:</h3>
    <ul>
      <li>Copia de identificación oficial.</li>
      <li>Comprobante de domicilio no mayor a 3 meses.</li>
      <li>Informe técnico de daños en la vivienda (en caso de rehabilitación).</li>
      <li>Presupuesto estimado de la rehabilitación o construcción.</li>
      <li>Título de propiedad o documentación legal del terreno (en caso de construcción).</li>
    </ul>

    <h3>Proceso de solicitud:</h3>
    <p>
      Para solicitar este apoyo, debes acudir a la oficina de atención ciudadana o registrarte en el portal web oficial. 
      Tu situación será evaluada por un equipo técnico, y se realizará una inspección de la vivienda para determinar el tipo de apoyo necesario. 
      Si la solicitud es aprobada, el subsidio o los materiales serán entregados en un plazo de 30 a 45 días hábiles.
    </p>

    <h3>Más información sobre el programa:</h3>
    <p>
      El gobierno de Mérida cuenta con diferentes opciones de apoyo en materia de vivienda, orientadas a mejorar la calidad de vida de los ciudadanos. 
      Estos programas incluyen asistencia técnica, entrega de materiales y recursos financieros. Para más detalles sobre otros apoyos, visita la <a href="apoyos.php">sección de Apoyos</a>.
    </p>

    <div class="btn-container">
      <a href="solicitar_apoyo_vivienda.php" class="btn_detalle">Solicitar Apoyo</a>
      <a href="apoyos.php" class="btn_volver">Volver al listado de Apoyos</a>
    </div>
  </section>
</div> 

<!-- Footer -->
<footer class="footer">
  <p>© 2024 Plataforma de Apoyo Gubernamental | Todos los derechos reservados.</p>
  <div class="social-icons">
    <a href="#"><i class="fab fa-facebook-f"></i></a>
    <a href="#"><i class="fab fa-twitter"></i></a>
    <a href="#"><i class="fab fa-instagram"></i></a>
  </div>
</footer>

</body>
</html>
