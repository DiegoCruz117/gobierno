<?php
require "seguridad.php";
$usuario = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Testimonios - Apoyo Gubernamental</title>
  <link rel="stylesheet" href="estilos2.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
  
<!-- Encabezado -->
<div class="header ancho">
    <div class="header-content">
        <div class="header-left">
        </div>
        <div class="header-center">
            <h2>Testimonios de Beneficiarios</h2>
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

<!-- Contenido principal -->
<div class="main-content ancho">
  <?php 
    include "botones_inicio.php"; // Incluye el menú de navegación del dashboard
    ?>
</div>
<br><br>

<div class="container">  

  <!-- Sección de testimonios -->
  <section class="testimonios ancho">
    <h2>Lo que dicen nuestros beneficiarios</h2>

    <h3>Apoyo Económico</h3>
    <div class="testimonio">
      <blockquote>"Gracias al apoyo económico, pude comprar útiles escolares para mis hijos."</blockquote>
      <p>- María López, Mérida</p>
    </div>
    <div class="testimonio">
      <blockquote>"El apoyo financiero me ayudó a iniciar un pequeño negocio y salir adelante."</blockquote>
      <p>- Pedro Martínez, Tizimin</p>
    </div>
    <br>
    <h3>Ayuda Alimentaria</h3>
    <div class="testimonio">
      <blockquote>"Las despensas que recibí fueron un alivio durante momentos difíciles."</blockquote>
      <p>- Ana García, Mérida</p>
    </div>
    <div class="testimonio">
      <blockquote>"El programa de ayuda alimentaria nos permitió tener alimentos suficientes en casa."</blockquote>
      <p>- José Ramírez, Progreso</p>
    </div>
    <br>
    <h3>Apoyo para Vivienda</h3>
    <div class="testimonio">
      <blockquote>"El apoyo para vivienda me ayudó a mejorar las condiciones de mi hogar."</blockquote>
      <p>- Laura Fernández, Mérida</p>
    </div>
    <div class="testimonio">
      <blockquote>"Gracias a este programa, pude rehabilitar mi casa después de los daños por la tormenta."</blockquote>
      <p>- Carlos López, Valladolid</p>
    </div>

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
