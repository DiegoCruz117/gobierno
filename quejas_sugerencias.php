<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quejas y Sugerencias - Apoyo Gubernamental</title>
  <link rel="stylesheet" href="css/estilos2.css">
  <link rel="stylesheet" href="css/estilos21.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="icon" type="image/x-icon" href="imagenes/logo_icono.png">
</head>
<body>

<!-- Encabezado -->
<div class="header ancho">
    <div class="header-content">
        <div class="header-left">
        </div>
        <div class="header-center">
            <h2>Quejas y Sugerencias</h2>
        </div>
        <div class="header-right">
            <?php if (!isset($_SESSION['username'])): ?>
                <a href="login.php" class="btn-login">
                    <i class="fas fa-sign-in-alt"></i>
                </a>
            <?php else: ?>
                <a href="salir.php" class="btn-logout">
                    <i class="fas fa-sign-out-alt"></i>
                </a>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Contenido principal -->
<div class="main-content ancho">
  <?php include "botones_inicio.php"; ?>
</div>
<br><br>

<div class="container">

  <!-- Sección de Quejas y Sugerencias -->
  <section class="quejas-sugerencias ancho">
    <h2>Queremos escuchar tus comentarios</h2>
    <p>Tu opinión es importante para mejorar nuestros programas y servicios.</p>

    <form action="procesar_quejas.php" method="POST" enctype="multipart/form-data" class="form-quejas">
  <label for="tipo">Tipo de Comentario:</label>
  <select name="tipo" id="tipo" required>
    <option value="">Seleccione...</option>
    <option value="queja">Queja</option>
    <option value="sugerencia">Sugerencia</option>
  </select>

  <label for="mensaje">Mensaje:</label>
  <textarea name="mensaje" id="mensaje" rows="5" placeholder="Escribe aquí tu comentario..." required></textarea>
<!-- 
  <label for="imagen">Adjuntar Imagen (opcional):</label>
  <input type="file" name="imagen" id="imagen" accept="image/*"> -->

  <button type="submit" class="btn-enviar">Enviar</button>
</form>


  <!-- Botón de contacto rápido -->
  <div class="contacto-rapido">
    <a href="contacto.php"><i class="fas fa-envelope"></i></a>
  </div>
</div>
<br><br>
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
