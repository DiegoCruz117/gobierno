<?php
require "seguridad.php"; // Verificar que el usuario está autenticado
$usuario = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Testimonios - Apoyo Gubernamental</title>
  <link rel="stylesheet" href="estilos2.css">
  <link rel="stylesheet" href="apoyo.css">
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
<div class="container apoyos">
  <h1>Calificar a Encargados de Apoyos</h1>

  <?php
    require "conexion.php";

    // Consulta para obtener los datos
    $id_encargados = $_GET['id_encargados'];
    $calificacion = "SELECT * FROM crear_encargados INNER JOIN crear_apoyos ON crear_encargados.id_apoyos = crear_apoyos.id_apoyos WHERE id_encargados = '$id_encargados'";
    $resultado = mysqli_query($conectar, $calificacion);
    $fila = $resultado->fetch_array();

  ?>
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
        <form action="" method="POST">
            <input type="hidden" name="encargado" value="<?php echo ($fila['nombres'] . ' ' . $fila['apellidos']); ?>">
            <input type="hidden" name="proyecto" value="<?php echo ($fila['nombre_programa']); ?>">
            <input type="hidden" name="rating" class="rating-input">
            <textarea name="comentario" class="comment-box" placeholder="Deja tu comentario..." required></textarea>
            <button type="submit" class="rate-btn">Calificar</button>
        </form>

    </div>
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

    // Manejo del envío del formulario
    $(".rate-btn").click(function(e) {
        e.preventDefault(); // Prevenir el comportamiento predeterminado del botón

        // Obtener los valores del formulario
        var form = $(this).closest("form");
        var encargado = form.find("input[name='encargado']").val();
        var proyecto = form.find("input[name='proyecto']").val();
        var rating = form.find("input[name='rating']").val(); // Obtener el valor de rating desde el campo oculto
        var comentario = form.find(".comment-box").val();

        if (rating > 0) {
            // Enviar datos por AJAX
            $.ajax({
                url: 'guardar_calificacion.php', // Archivo PHP para guardar los datos
                type: 'POST',
                data: {
                    encargado: encargado,
                    proyecto: proyecto,
                    rating: rating,
                    comentario: comentario
                },
                success: function() {
                    alert('Registro exitoso');
                    window.location.href = "inicio.php";  // Mostrar la respuesta del servidor
                    // Opcional: limpiar el formulario
                    form.find(".comment-box").val("");
                    form.find(".stars i").removeClass("rated");
                    form.find("input[name='rating']").val(""); // Limpiar el campo 'rating'
                },
                error: function(xhr, status, error) {
                    alert('Hubo un error al guardar la calificación. Intenta nuevamente.');
                }
            });
        } else {
            alert("Por favor, califica a la persona con al menos 1 estrella.");
        }
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
