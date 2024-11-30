<?php
require "seguridad.php";
require "conexion.php";
// include "seguridad.php";

// Verifica si ya hay encargados calificados guardados en la sesión
if (!isset($_SESSION['calificados'])) {
    $_SESSION['calificados'] = [];
}

// Obtén el ID del encargado desde el parámetro GET
$id_encargados = $_GET['id_encargados'] ?? null;

// Verifica si el encargado ya fue calificado
if ($id_encargados && in_array($id_encargados, $_SESSION['calificados'])) {
    echo "<script>
            alert('Este encargado ya ha sido calificado.');
            window.location.href = 'inicio.php';
        </script>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Testimonios - Apoyo Gubernamental</title>
  <link rel="stylesheet" href="css/estilos2.css">
  <link rel="stylesheet" href="cc/apoyo.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
<br>
<!-- Contenido principal -->
<div class="main-content ancho">
  <?php include "botones_inicio.php"; ?> <!-- Incluye el menú de navegación del dashboard -->
</div>
<br>

<!-- Sección de Calificación -->
<div class="container apoyos ancho">
  <h1>Calificar a Encargados de Apoyos</h1>

  <?php
    // Consulta para obtener los datos del encargado
    if ($id_encargados) {
        $calificacion = "SELECT * FROM crear_encargados 
                         INNER JOIN crear_apoyos 
                         ON crear_encargados.id_apoyos = crear_apoyos.id_apoyos 
                         WHERE id_encargados = '$id_encargados'";
        $resultado = mysqli_query($conectar, $calificacion);
        $fila = $resultado->fetch_array();
    }
  ?>
    <?php if ($fila): ?>
    <div>
        <h3>Encargado: <?php echo htmlspecialchars($fila['nombres'] . ' ' . $fila['apellidos']); ?></h3>
        <p>Proyecto: <span class="derecha"><?php echo htmlspecialchars($fila['nombre_programa']); ?></span></p>
        <p>Descripción: <?php echo htmlspecialchars($fila['descripcioncorta']); ?></p>

        <!-- Sistema de estrellas -->
        <div class="stars">
            <i class="fas fa-star" data-value="1"></i>
            <i class="fas fa-star" data-value="2"></i>
            <i class="fas fa-star" data-value="3"></i>
            <i class="fas fa-star" data-value="4"></i>
            <i class="fas fa-star" data-value="5"></i>
        </div>

        <!-- Formulario para guardar calificación -->
        <form action="guardar_calificacion.php" method="POST">
    <input type="hidden" name="id_encargado" value="<?php echo $id_encargados; ?>">
    <input type="hidden" name="encargado" value="<?php echo htmlspecialchars($fila['nombres'] . ' ' . $fila['apellidos']); ?>">
    <input type="hidden" name="proyecto" value="<?php echo htmlspecialchars($fila['nombre_programa']); ?>">
    <input type="hidden" name="rating" class="rating-input">
    <textarea name="comentario" class="comment-box" placeholder="Deja tu comentario..." required></textarea>
    <button type="submit" class="rate-btn">Calificar</button>
</form>


    </div>
    <?php else: ?>
        <p>No se encontró información sobre el encargado.</p>
    <?php endif; ?>
    <br><br>
</div>


<script>
$(document).ready(function() {
    // Marcar las estrellas al hacer clic
    $(".stars i").click(function() {
        var rating = $(this).data("value"); // Usamos data-value para obtener el valor de la estrella
        $(this).parent().children("i").removeClass("rated"); // Resetear las estrellas
        $(this).prevAll().addClass("rated"); // Rellenar las estrellas hasta la seleccionada
        $(this).addClass("rated"); // Marcar la estrella seleccionada

        // Actualizar el valor en el campo oculto del formulario
        $("input[name='rating']").val(rating); // Aquí se actualiza el campo 'rating' con el valor correcto
    });
});
</script>

<br><br><br>


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
