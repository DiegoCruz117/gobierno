<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Testimonios - Apoyo Gubernamental</title>
  <link rel="stylesheet" href="estilos2.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="carousel.js"></script>
  <link rel="icon" type="image/x-icon" href="imagenes/logo_icono.png">
</head>
<body>
<!-- Encabezado -->
<div class="header ancho">
    <div class="header-content">
        <div class="header-left"></div>
        <div class="header-center">
            <h2>Testimonios de Beneficiarios</h2>
        </div>
        <div class="header-right">
            <?php if (!isset($_SESSION['username'])): ?>
                <a href="login.php" class="btn-login">
                    <i class="fas fa-sign-in-alt"></i> Iniciar sesión
                </a>
            <?php else: ?>
                <a href="salir.php" class="btn-logout">
                    <i class="fas fa-sign-out-alt"></i> Salir
                </a>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Contenido principal -->
<div class="main-content ancho">
  <?php include "botones_inicio.php"; ?> <!-- Incluye el menú de navegación del dashboard -->
</div>

<!-- Sección de Calificación -->
<div class="container2 ancho">
    <h1>Calificar a Encargados de Apoyos</h1>

    <div class="carousel-wrapper">
        <!-- Botón para desplazarse hacia la izquierda -->
        <button class="carousel-btn left-btn" onclick="moveCarousel(-1)">
            <i class="fas fa-chevron-left"></i>
        </button>

        <!-- Contenedor del carrusel -->
        <div class="carousel ancho">
            <?php
            require "conexion.php";

            // Consulta para obtener los datos
            $calificacion = "SELECT * FROM crear_encargados
                             INNER JOIN crear_apoyos
                             ON crear_encargados.id_apoyos = crear_apoyos.id_apoyos";
            $resultado = mysqli_query($conectar, $calificacion);

            // Verificar que existan registros
            if ($resultado && mysqli_num_rows($resultado) > 0) {
                while ($fila = mysqli_fetch_assoc($resultado)) {
                    ?>
                    <div class="encargado">
                        <i class="fa-solid fa-user photo-icon"></i>
                        <h3>Encargado: <?php echo htmlspecialchars($fila['nombres'] . ' ' . $fila['apellidos']); ?></h3>
                        <p>Proyecto: <?php echo htmlspecialchars($fila['nombre_programa']); ?></p>
                        <p>Descripción: <?php echo htmlspecialchars($fila['descripcioncorta']); ?></p>
                        <form action="calificar_apoyo.php" method="GET">
                            <input type="hidden" name="id_encargados" value="<?php echo $fila['id_encargados']; ?>">
                            <button type="submit" class="btn-view-more">Calificar</button>
                        </form>
                    </div>
                    <?php
                }
            } else {
                echo "<p>No se encontraron encargados para mostrar.</p>";
            }
            ?>
        </div>

        <!-- Botón para desplazarse hacia la derecha -->
        <button class="carousel-btn right-btn" onclick="moveCarousel(1)">
            <i class="fas fa-chevron-right"></i>
        </button>
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
