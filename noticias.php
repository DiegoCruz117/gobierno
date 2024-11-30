<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Noticias Gubernamentales</title>
  <link rel="stylesheet" href="css/noticias.css">
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

    <?php
    include "conexion.php";
    $todos_datos = "SELECT * FROM publicaciones ORDER BY id_noticia";
    $resultado = mysqli_query($conectar, $todos_datos);
    while ($fila = mysqli_fetch_assoc($resultado)) {
  ?>
    <div class="noticia">
    <h3> <i class="fas fa-<?php echo $fila['icono']; ?>" style="font-size: 24px;"></i> <?php echo $fila['nombrenoticia']; ?></h3>
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
