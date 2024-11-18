<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Noticias Gubernamentales</title>
  <link rel="stylesheet" href="noticias.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="icon" type="image/x-icon" href="imagenes/logo_icono.png">
</head>
<body>
  
<div class="header ancho">
    <div class="header-content">
        <div class="header-left">
        </div>
        <div class="header-center">
            <h2> Apoyo Gubernamental</h2>
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
</div><br>

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
<br>

<div class="container ancho">
  <section class="noticias">
    <h2>Últimas Noticias</h2>

    <?php
    include "conexion.php";
    $todos_datos = "SELECT * FROM publicaciones ORDER BY id_noticia";
    $resultado = mysqli_query($conectar, $todos_datos);
    while ($fila = mysqli_fetch_assoc($resultado)) {
  ?>
    <div class="noticia">
    <h3><i class="fas fa-newspaper"><?php echo $fila['icono']; ?></i> <?php echo $fila['nombrenoticia']; ?></h3>
      <p><?php echo $fila['descripcioncorta']; ?></p>
      <a href="noticias_info.php?id_noticia=<?php echo $fila["id_noticia"]; ?>" class="btn_detalle">Leer más</a><br>
    </div>
  <?php } ?>

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
