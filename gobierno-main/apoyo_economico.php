<?php
require "seguridad.php"; // Verificar que el usuario está autenticado
$usuario = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Apoyo Económico</title>
  <link rel="stylesheet" href="apoyos2.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

<!-- Encabezado -->
<div class="header ancho">
    <h1>Detalles del Apoyo para Economico </h1>
</div>


<!-- Contenido Principal -->
<main class="container">
  <section class="detalle-apoyo">
    <h2><i class="fas fa-hand-holding-usd"></i> Apoyo Económico</h2>

    <p>El <strong>Apoyo Económico</strong> está dirigido a familias en situación vulnerable en el municipio de Mérida. Proporciona un subsidio financiero para cubrir necesidades básicas durante tiempos de crisis. Este apoyo se ha diseñado para ayudar a las familias a enfrentar situaciones de emergencia económica, asegurando que tengan acceso a lo esencial como alimentación, salud y educación.</p>

    <p><strong>Modalidades del Apoyo Económico:</strong></p>
    <ul>
      <li><strong>Subsidio de Emergencia:</strong> Un monto único para cubrir gastos urgentes en alimentación, vivienda o salud.</li>
      <li><strong>Becas y Apoyos Educativos:</strong> Ayuda económica para estudiantes de familias de bajos recursos, desde nivel básico hasta superior.</li>
      <li><strong>Apoyos para Vivienda:</strong> Subsidios destinados a mejoras o rehabilitación de viviendas, especialmente en zonas rurales o marginadas.</li>
      <li><strong>Programas para Madres Solteras:</strong> Apoyos específicos para cubrir necesidades de madres solteras y facilitar su acceso a oportunidades educativas o laborales.</li>
    </ul>

    <h3>Requisitos para solicitar este apoyo:</h3>
    <ul>
      <li>Ser mayor de 18 años.</li>
      <li>Residir en el municipio de Mérida.</li>
      <li>Identificación oficial vigente (INE, pasaporte).</li>
    </ul>

    <h3>Documentación requerida:</h3>
    <ul>
      <li>Copia de identificación oficial.</li>
      <li>Comprobante de domicilio no mayor a 3 meses.</li>
    </ul>

    <h3>Proceso de solicitud:</h3>
    <p>Para solicitar este apoyo, debes acudir a la oficina de atención ciudadana o registrarte en el portal web oficial. La solicitud será revisada por un equipo especializado, y se evaluará tu situación. De ser aprobado, recibirás el subsidio en un plazo de 30 días hábiles. Además, se recomienda mantener actualizada tu información de contacto para facilitar la comunicación.</p>

    <h3>Más información sobre apoyos económicos en Mérida:</h3>
    <p>El gobierno de Mérida ofrece diferentes programas de apoyo económico que incluyen subsidios para la alimentación, educación y salud. Estos programas están diseñados para apoyar a las familias más necesitadas y fomentar el bienestar social. Para más detalles sobre otros apoyos, visita la <a href="apoyos.php">sección de Apoyos</a>.</p>

    <a href="solicitar_apoyo_economico.php" class="btn_detalle">Solicitar Apoyo</a>
    <a href="apoyos.php" class="btn_volver">Volver al listado de Apoyos</a>
  </section>
</main>

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
