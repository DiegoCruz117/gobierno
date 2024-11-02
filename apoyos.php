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
  
<div class="header ancho">
    <div class="header-left">
        <img src="imagenes/icono_email_naranja.png" alt="">
    </div>
    <div class="header-center">
        <h2>Apoyos Gubernamentales</h2>
    </div>
    <div class="header-right">
        <p class="info-usuario"><?php echo htmlspecialchars($usuario); ?></p>
    </div>
</div>
<br>
<div class="main-content ancho">
  <nav class="menu">
  <a href="inicio.php" class="nav-button">Inicio</a>
    <a href="apoyos.php" class="nav-button">Apoyos</a>
    <a href="programas.php" class="nav-button">Programas</a>
    <a href="noticias.php" class="nav-button">Noticias</a>
    <a href="quejas_sugerencias.php" class="nav-button">Quejas y Sugerencias</a>
    <a href="encargado_apoyos.php" class="nav-button">Encargado de Apoyos</a>
    <a href="principal.php" class="nav-button">Administrar</a>
  </nav>
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
