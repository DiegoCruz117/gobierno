<?php
require "seguridad.php";
$usuario = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Noticias Gubernamentales</title>
  <link rel="stylesheet" href="noticias.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

<div class="header ancho">
    <div class="header-left">
        <img src="imagenes/icono_email_naranja.png" alt="Icono de email" class="icono-email">
    </div>
    <div class="header-center">
        <h2>Noticias Gubernamentales</h2>
    </div>
    <div class="header-right">
        <p class="info-usuario"><?php echo htmlspecialchars($usuario); ?></p>
    </div>
</div>

<div class="main-content ancho">
  <nav class="menu">
    <a href="inicio.php" class="nav-button">Inicio</a>
    <a href="apoyos.php" class="nav-button">Apoyos</a>
    <a href="programas.php" class="nav-button">Programas</a>
    <a href="noticias.php" class="nav-button active">Noticias</a>
    <a href="quejas_sugerencias.php" class="nav-button">Quejas y Sugerencias</a>
    <a href="encargado_apoyos.php" class="nav-button">Encargado de Apoyos</a>
    <a href="principal.php" class="nav-button">Administrar</a>
  </nav>
</div>

<div class="container ancho">
  <section class="noticias">
    <h2>Últimas Noticias</h2>

    <div class="noticia">
      <h3><i class="fas fa-newspaper"></i> Nuevos programas de apoyo 2024</h3>
      <p>El gobierno ha anunciado nuevos programas para apoyar a comunidades afectadas por la crisis económica global.</p>
      <a href="#" class="btn_detalle">Leer más</a>
    </div>

    <div class="noticia">
      <h3><i class="fas fa-handshake"></i> Convenio con instituciones educativas</h3>
      <p>Se firmó un convenio con varias universidades para proporcionar becas a estudiantes de bajos recursos.</p>
      <a href="#" class="btn_detalle">Leer más</a>
    </div>

    <div class="noticia">
      <h3><i class="fas fa-bullhorn"></i> Nueva Iniciativa de Educación</h3>
      <p>El gobierno anuncia un nuevo programa para mejorar la calidad educativa en las zonas rurales, con el objetivo de reducir la brecha educativa.</p>
      <a href="noticia_educacion.php" class="btn_detalle">Leer Más</a>
    </div>

    <div class="noticia">
      <h3><i class="fas fa-calendar-alt"></i> Campaña de Vacunación</h3>
      <p>Se inicia una nueva campaña de vacunación para combatir enfermedades prevenibles. Se recomienda a la población acudir a sus centros de salud más cercanos.</p>
      <a href="noticia_vacunacion.php" class="btn_detalle">Leer Más</a>
    </div>

    <div class="noticia">
      <h3><i class="fas fa-comments"></i> Espacio de Quejas y Sugerencias</h3>
      <p>El gobierno habilita un nuevo canal para recibir quejas y sugerencias de la ciudadanía, fomentando la participación y transparencia.</p>
      <a href="noticia_quejas.php" class="btn_detalle">Leer Más</a>
    </div>

  </section>
</div>

<footer class="footer ancho">
  <p>© 2024 Plataforma de Noticias Gubernamentales | Todos los derechos reservados.</p>
  <div class="social-icons">
    <a href="#"><i class="fab fa-facebook-f"></i></a>
    <a href="#"><i class="fab fa-twitter"></i></a>
    <a href="#"><i class="fab fa-instagram"></i></a>
  </div>
</footer>

</body>
</html>
