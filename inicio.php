<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página de Inicio - Apoyo Gubernamental</title>
  <link rel="stylesheet" href="css/estilos2.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="icon" type="image/x-icon" href="imagenes/logo_icono.png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        // Toggle el menú al hacer clic en el ícono de usuario
        $(".dropbtn").click(function(event) {
            event.preventDefault();  // Previene el comportamiento predeterminado del enlace
            $("#dropdownMenu").toggle(); // Alterna la visibilidad del menú
        });

        // Cierra el menú si se hace clic fuera de él
        $(document).click(function(event) {
            if (!$(event.target).closest(".dropdown").length) {
                $("#dropdownMenu").hide(); // Oculta el menú
            }
        });
    });
</script>

</head>

<body>
  
<!-- Encabezado -->
<div class="header ancho">
    <div class="header-content">


        
        <div class="header-left"></div>
        
        <div class="header-center">
            <h2>Plataforma de Apoyo Gubernamental</h2>
        </div>
        
          <div class="dropdown">
      <a href="#" class="btn-login dropbtn">
          <i class="fas fa-user"></i>
      </a>
      <div id="dropdownMenu" class="dropdown-content">
          <?php if (isset($_SESSION['username'])): ?>
              <a href="salir.php">Cerrar Sesión</a>
          <?php else: ?>
              <a href="login.php">Iniciar Sesión</a>
          <?php endif; ?>
      </div>
  </div>
    </div>
</div>


<!-- Contenido principal -->
<div class="main-content ancho">
  <!-- Logo y menú -->
  <div class="logo-section">
    <img class="logo" src="imagenes/logo_merida.png" alt="Logo de Mérida">
  </div>
  <?php 
    include "botones_inicio.php"; // Incluye el menú de navegación del dashboard
    ?>
</div>
<br><br>

<div class="container ">  

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