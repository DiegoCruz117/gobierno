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
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
<div class="container2">
  <h1>Calificar a Encargados de Apoyos</h1>

  <!-- Loop de Encargados -->
  <?php 
    $encargados = [
        ['nombre' => 'Juan Pérez', 'proyecto' => 'Apoyo Económico', 'descripcion' => 'Responsable de coordinar la distribución de recursos financieros para las familias necesitadas en Mérida.'],
        ['nombre' => 'María García', 'proyecto' => 'Ayuda Alimentaria', 'descripcion' => 'A cargo de organizar y entregar despensas en comunidades rurales con alta vulnerabilidad alimentaria.'],
        ['nombre' => 'Luis Martínez', 'proyecto' => 'Apoyo para Vivienda', 'descripcion' => 'Supervisa los programas de rehabilitación y construcción de viviendas para familias afectadas por desastres naturales.']
    ];

    foreach ($encargados as $encargado): 
  ?>
    <div class="encargado">
      <h3>Encargado: <?php echo $encargado['nombre']; ?></h3>
      <p>Proyecto: <?php echo $encargado['proyecto']; ?></p>
      <p>Descripción: <?php echo $encargado['descripcion']; ?></p>

      <!-- Sistema de estrellas -->
      <div class="stars" data-encargado="<?php echo $encargado['nombre']; ?>">
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
      </div>

      <!-- Caja de comentarios -->
      <textarea class="comment-box" placeholder="Deja tu comentario..."></textarea>

      <button class="rate-btn" data-encargado="<?php echo $encargado['nombre']; ?>">Calificar</button>
    </div>
  <?php endforeach; ?>
</div>

<script>
$(document).ready(function() {
    // Marcar las estrellas al hacer clic
    $(".stars i").click(function() {
        var encargado = $(this).parent().data("encargado");
        var rating = $(this).index() + 1; // Índice de la estrella seleccionada
        $(this).parent().children("i").removeClass("rated"); // Resetear las estrellas
        $(this).prevAll().addClass("rated"); // Rellenar las estrellas hasta la seleccionada
        $(this).addClass("rated"); // Marcar la estrella seleccionada

        // Guardar internamente la calificación
        $(this).parent().data("rating", rating);
    });

    // Enviar calificación y comentario cuando se haga clic en el botón
    $(".rate-btn").click(function() {
        var encargado = $(this).data("encargado");
        var rating = $(this).parent().find(".stars").data("rating"); // Obtener la calificación
        var comentario = $(this).parent().find(".comment-box").val(); // Obtener el comentario
        var usuario_id = $(this).data("usuario-id"); // Suponiendo que tienes el usuario_id en el botón o algún elemento

        if (rating > 0) {
            // Verificar que el usuario no haya calificado antes
            $.ajax({
                url: 'guardar_calificacion.php', // Apunta al archivo PHP que procesará los datos
                type: 'POST',
                data: {
                    encargado: encargado,
                    rating: rating,
                    comentario: comentario,
                    usuario_id: usuario_id // Enviar el usuario_id
                },
                success: function(response) {
                    if (response === "Ya has calificado a este encargado.") {
                        alert(response); // Mostrar el mensaje de que ya calificó
                    } else {
                        alert('¡Calificación guardada exitosamente!');
                        // Limpiar los campos después de enviar (opcional)
                        $(this).parent().find(".comment-box").val(""); // Limpiar comentario
                        $(this).parent().find(".stars i").removeClass("rated"); // Limpiar estrellas
                    }
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
