<?php
require "seguridad.php";
$usuario = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="css/estilos.css">
  <!-- Incluye Font Awesome para los íconos -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="icon" type="image/x-icon" href="imagenes/logo_icono.png">
</head>
<body>
  <div class="cont_padre_panel ancho">
    <?php include "menudashboard.php"; ?>
    <div class="cont_panel_derecho">
      <div class="cont_panel_derecho_hijo1">
        <div class="elemento_salir">
          <img src="imagenes/cancelar.png" class="img_cancelar">
          <a href="salir.php" class="salir">Salir</a>
        </div>
      </div>
      <br>
      <div class="cont_panel_derecho_hijo2">
        <h2 class="titulo_panel"> VER POSTS</h2>
        <br>
        <a href="noticias_admin.php" class="btn_rojo2"><< Regresar</a>
        <br><br>
        <?php
        require "conexion.php";
        $id_noticia = $_GET['id_noticia'];

        $verusuario = "SELECT * FROM publicaciones WHERE id_noticia = '$id_noticia'";
        $resultado = mysqli_query($conectar, $verusuario);

        $fila = $resultado->fetch_array();
        ?>
        <div class="contenedor_ver_usuarios">
          <p class="campo">Ícono</p>
          <!-- Mostrar el ícono utilizando el valor guardado en la base de datos -->
          <i class="fas fa-<?php echo $fila['icono']; ?>" style="font-size: 24px;"></i>
          <hr>
        </div>
        <div class="contenedor_ver_usuarios">
          <p class="campo">Título Post</p>
          <p class="dato"><?php echo $fila["nombrenoticia"]; ?></p>
          <hr>
        </div>
        <div class="contenedor_ver_usuarios">
          <p class="campo">Imagen del post</p>
          <img src="<?php echo $fila['ruta']; ?>" class="img_noticia">
          <hr>
        </div>
        <div class="contenedor_ver_usuarios">
          <p class="campo">Fecha del post</p>
          <p class="dato"><?php echo $fila['fecha']; ?></p>
          <hr>
        </div>
        <div class="contenedor_ver_usuarios">
          <p class="campo">Descripción</p>
          <p class="dato"><?php echo $fila['descripcioncorta']; ?></p>
          <hr>
        </div>
        <br>
        <a class="btn_rojo3" href="editar_post.php?id_noticia=<?php echo $fila["id_noticia"]; ?>">Editar Post</a>
      </div>
    </div>
  </div>
</body>
</html>
