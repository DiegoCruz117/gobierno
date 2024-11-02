<?php
// require "seguridad.php";
// $usuario = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página de Inicio - Apoyo Gubernamental</title>
  <link rel="stylesheet" href="estilos2.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
  
<!-- Encabezado -->
<div class="header ancho">
    <div class="header-content">
        <div class="header-left">
            <img src="imagenes/icono_email_naranja.png" alt="Icono de Email" class="icono-email">
        </div>
        <div class="header-center">
            <h2>Plataforma de Apoyo Gubernamental</h2>
        </div>
        <div class="header-right">
            <a href="login.php" class="btn-login">Iniciar Sesión</a>
        </div>
    </div>
</div>

<!-- Contenido principal -->
<div class="main-content ancho">
  <!-- Logo y menú -->
  <div class="logo-section">
    <img class="logo" src="imagenes/logo_merida.png" alt="Logo de Mérida">
  </div>
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
<br><br>
<!-- Contenido de la página -->
<div class="container ">
  <!-- Slider de Imágenes -->
  <!-- <section class="slider">
    <div class="slider-content">
      <img src="imagenes/ayuda1.jpg" alt="Apoyo Económico">
      <img src="imagenes/ayuda2.jpg" alt="Apoyo Alimentario">
      <img src="imagenes/ayuda3.jpg" alt="Apoyo para Vivienda">
      <img src="imagenes/ayuda4.jpg" alt="Asistencia Médica">
    </div>
  </section> -->

  <!-- Sección de informes -->
  <section class="informes ancho ">
    <h2>Informes Recientes de Ayudas</h2>
    <div class="informe">
      <h3><i class="fas fa-hand-holding-usd"></i> Apoyo Económico - Septiembre 2024</h3>
      <p>En septiembre, más de 500 familias recibieron apoyo económico para cubrir necesidades básicas.</p>
    </div>

    <div class="informe">
      <h3><i class="fas fa-utensils"></i> Ayuda Alimentaria - Agosto 2024</h3>
      <p>Durante agosto, se proporcionaron más de 2,000 despensas a comunidades rurales con alta vulnerabilidad alimentaria.</p>
    </div>
      <h3><i class="fas fa-home"></i> Apoyo para Vivienda - Junio 2024</h3>
      <p>En junio se rehabilitaron más de 100 viviendas afectadas por desastres naturales.</p>
    </div>
    
  </section>

  <!-- Sección de noticias -->
  <section class="noticias ancho">
    <h2>Noticias Recientes</h2>
    <article class="noticia">
      <h3><i class="fas fa-newspaper"></i> Nuevos programas de apoyo 2024</h3>
      <p>El gobierno ha anunciado nuevos programas para apoyar a comunidades afectadas por la crisis económica global.</p>
      <a href="#" class="btn_detalle">Leer más</a>
    </article>
    <article class="noticia">
      <h3><i class="fas fa-handshake"></i> Convenio con instituciones educativas</h3>
      <p>Se firmó un convenio con varias universidades para proporcionar becas a estudiantes de bajos recursos.</p>
      <a href="#" class="btn_detalle">Leer más</a>
    </article>
  </section>

  <!-- Sección de testimonios -->
  <section class="testimonios ancho">
    <h2>Testimonios de Beneficiarios</h2>
    <div class="testimonio">
      <blockquote>"Gracias al apoyo económico, pude comprar útiles escolares para mis hijos."</blockquote>
      <p>- María López, Mérida</p>
    </div>
    <div class="testimonio">
      <blockquote>"El programa de asistencia médica me permitió acceder a una cirugía que no podía costear."</blockquote>
      <p>- Juan Pérez, Valladolid</p>
    </div>
  </section>

  <!-- Botón de contacto rápido -->
  <div class="contacto-rapido">
    <a href="contacto.php"><i class="fas fa-envelope"></i></a>
  </div>
</div>

<!-- Footer -->
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
