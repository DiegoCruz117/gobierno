<?php
require "seguridad.php";
$usuario = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Apoyos Gubernamentales</title>
  <link rel="stylesheet" href="apoyo.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
  
<!-- Encabezado -->
<div class="header ancho">
    <div class="header-content">
        <div class="header-left">
        </div>
        <div class="header-center">
            <h2> Programas de Apoyo Gubernamental</h2>
        </div>
        <div class="header-right">
            <?php if (!isset($_SESSION['username'])): // Si no hay usuario logueado ?>
                <a href="login.php" class="btn-login">
                    <i class="fas fa-sign-in-alt"></i> 
                </a>
            <?php else: // Si hay usuario logueado ?>
                <a href="salir.php" class="btn-logout">
                    <i class="fas fa-sign-out-alt"></i> 
                </a>
            <?php endif; ?>
        </div>
    </div>
</div>

<br>
<div class="main-content ancho">
<?php 
    include "botones_inicio.php"; // Incluye el menú de navegación del dashboard
    ?>
</div>

<div class="container">
  <section class="apoyos">
    <h2>Programas de Apoyos</h2>

    <div class="programa">
      <h3><i class="fas fa-hand-holding-usd"></i> Programa de Apoyo Económico</h3>
      <p>Este programa proporciona asistencia económica a familias en situación de vulnerabilidad para cubrir sus necesidades básicas.</p>
    </div>

    <div class="programa">
      <h3><i class="fas fa-utensils"></i> Programa de Ayuda Alimentaria</h3>
      <p>Ofrecemos despensas y alimentos a comunidades de bajos recursos para combatir la inseguridad alimentaria.</p>
    </div>

    <div class="programa">
      <h3><i class="fas fa-home"></i> Programa de Mejoramiento de Vivienda</h3>
      <p>Este programa busca rehabilitar y mejorar las condiciones de vivienda de familias afectadas por desastres naturales.</p>
    </div>

    <div class="programa">
      <h3><i class="fas fa-graduation-cap"></i> Programa de Becas Educativas</h3>
      <p>Con el objetivo de apoyar a estudiantes de bajos recursos, este programa ofrece becas para educación primaria, secundaria y media superior.</p>
    </div>

    <div class="programa">
      <h3><i class="fas fa-heartbeat"></i> Programa de Salud Comunitaria</h3>
      <p>Brindamos servicios de salud preventiva y atención médica gratuita a comunidades marginadas.</p>
    </div>
    
  </section>
</div>

<div class="container">
  <section class="apoyos">
    <h2>Listado de Apoyos Disponibles</h2>

    <div class="apoyo">
      <h3><i class="fas fa-hand-holding-usd"></i> Apoyo Económico </h3>
      <p>Este apoyo está dirigido a familias de bajos recursos para cubrir necesidades básicas durante la pandemia.</p>
      <a href="apoyo_economico.php" class="btn_detalle">Ver Detalles</a>
    </div>

    <div class="apoyo">
      <h3><i class="fas fa-utensils"></i> Apoyo Alimentario</h3>
      <p>Provisión de despensas mensuales a comunidades rurales y urbanas en situación de vulnerabilidad alimentaria.</p>
      <a href="apoyo_alimentario.php" class="btn_detalle">Ver Detalles</a>
    </div>

    <div class="apoyo">
      <h3><i class="fas fa-home"></i> Apoyo para Vivienda</h3>
      <p>Rehabilitación de viviendas dañadas por desastres naturales, incluyendo techos y estructuras básicas.</p>
      <a href="apoyo_vivienda.php" class="btn_detalle">Ver Detalles</a>
    </div>

  </section>
</div>

<footer class="footer ancho">
  <p>© 2024 Plataforma de Apoyo Gubernamental | Todos los derechos reservados.</p>
  <div class="social-icons">
    <a href="#"><i class="fab fa-facebook-f"></i></a>
    <a href="#"><i class="fab fa-twitter"></i></a>
    <a href="#"><i class="fab fa-instagram"></i></a>
  </div>
</footer>

</body>
</html>
