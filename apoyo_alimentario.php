<?php
require "seguridad.php"; // Verificar que el usuario está autenticado
$usuario = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Apoyo Alimenticio</title>
  <link rel="stylesheet" href="apoyos2.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

<!-- Header -->
<header class="header">
  <div class="header-content ancho">
    <div class="header-left">
      <img src="imagenes/icono_email_naranja.png" alt="Icono Email" class="icono-email">
    </div>
    <div class="header-center">
      <h1>Detalles del Apoyo Alimenticio</h1>
    </div>
    <div class="header-right">
      <p class="usuario"><?php echo htmlspecialchars($usuario); ?></p>
    </div>
  </div>
</header>
<br>

<!-- Menú de Navegación -->
<nav class="menu ancho">
    <a href="inicio.php" class="nav-button">Inicio</a>
    <a href="apoyos.php" class="nav-button">Apoyos</a>
    <a href="programas.php" class="nav-button">Programas</a>
    <a href="noticias.php" class="nav-button">Noticias</a>
    <a href="quejas_sugerencias.php" class="nav-button">Quejas y Sugerencias</a>
    <a href="encargado_apoyos.php" class="nav-button">Encargado de Apoyos</a>
    <a href="principal.php" class="nav-button">Administrar</a>
</nav>

<!-- Contenido Principal -->
<main class="container">
  <section class="detalle-apoyo">
    <h2><i class="fas fa-utensils"></i> Apoyo Alimenticio</h2>

    <p>El <strong>Apoyo Alimenticio</strong> está diseñado para proporcionar alimentos esenciales a familias en situación vulnerable del municipio de Mérida. Este programa asegura que las personas más afectadas puedan acceder a una alimentación básica y nutritiva en momentos de crisis.</p>

    <p><strong>Beneficios del Apoyo Alimenticio</strong> <br>
    Este apoyo incluye la distribución de despensas con productos básicos como arroz, frijol, aceite, leche en polvo, cereales y enlatados. Además, en casos especiales, se entregan alimentos frescos como frutas y verduras para mejorar la nutrición de las familias.</p>

    <p><strong>Modalidades del Apoyo Alimenticio:</strong></p>
    <ul>
      <li><strong>Despensa Básica:</strong> Incluye productos de larga duración, como granos, cereales y enlatados.</li>
      <li><strong>Alimentos Frescos:</strong> Para familias con niños pequeños o personas mayores, con productos como frutas, verduras y lácteos.</li>
      <li><strong>Comedores Comunitarios:</strong> Se brindan comidas calientes diarias en diferentes puntos del municipio, principalmente en zonas marginadas.</li>
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
      <li>En caso de familias numerosas, certificado de nacimiento de los hijos.</li>
    </ul>

    <h3>Proceso de solicitud:</h3>
    <p>Para solicitar este apoyo, debes acudir a la oficina de atención ciudadana o registrarte en el portal web oficial. Un equipo evaluará tu solicitud y, de ser aprobada, recibirás la despensa o el acceso a los comedores comunitarios en un plazo de 15 a 30 días hábiles.</p>

    <h3>Más información sobre apoyos alimenticios:</h3>
    <p>El gobierno de Mérida ofrece diferentes tipos de apoyo alimenticio, tanto para familias en crisis como para personas mayores, madres solteras o personas con discapacidad. Para conocer más detalles y otros programas disponibles, visita la <a href="apoyos.php">sección de Apoyos</a>.</p>

    <a href="solicitar_apoyo_alimentario.php" class="btn_detalle">Solicitar Apoyo</a>
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
