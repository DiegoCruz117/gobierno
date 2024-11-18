<?php
// Inicia la sesión
session_start();

// Verifica si el parámetro id_noticia está presente
if (!isset($_GET['id_noticia'])) {
    echo "Error: No se especificó una noticia.";
    exit;
}

// Obtiene el ID de la noticia desde el parámetro GET
$id_noticia = intval($_GET['id_noticia']); // Convierte a entero para mayor seguridad

// Incluye el archivo de conexión a la base de datos
include "conexion.php";

// Consulta para obtener los detalles de la noticia
$verNoticia = "SELECT * FROM publicaciones WHERE id_noticia = ?";
$stmt = $conectar->prepare($verNoticia);
$stmt->bind_param("i", $id_noticia);
$stmt->execute();
$resultado = $stmt->get_result();

// Verifica si se encontró la noticia
if ($resultado->num_rows === 0) {
    echo "No se encontró la noticia.";
    exit;
}

// Obtiene los datos de la noticia
$fila = $resultado->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $fila["nombrenoticia"]; ?> - Detalles</title>
  <link rel="stylesheet" href="noticias.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="icon" type="image/x-icon" href="imagenes/logo_icono.png">
</head>
<body>

<div class="header ancho">
<h3 class="titulo_noticia"><i class="fas fa-newspaper"><?php echo $fila['icono']; ?></i> <?php echo $fila['nombrenoticia']; ?></h3>
</div>

<div class="detalle-noticia ancho">
    <div class="contenido-noticia">
        <div class="imagen-noticia">
        <img class="fotopromo" src="<?php echo $fila['ruta']; ?>" alt="Imagen de la Noticia">
        </div>

        <div class="text2">
            
        <p><span class="texto-destacado">Descripción Detallada:</span> <?php echo $fila["descripcionlarga"]; ?></p>

        <a href="noticias.php" class="btn-volver"><< Volver a Noticias</a>
        </div>
    </div>
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
