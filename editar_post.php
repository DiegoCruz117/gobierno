<?php
require "seguridad.php";
$usuario = $_SESSION['username'];
$id_noticia = $_GET['id_noticia'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="estilos.css">
  <script src="ckeditor/ckeditor.js"></script>
  <link rel="icon" type="image/x-icon" href="imagenes/logo_icono.png">
</head>
<body>
  <div class="cont_padre_panel ancho">
    <?php 
    include "menudashboard.php";
    ?>
    <?php
          require "conexion.php";
          $vernoticia = "SELECT * FROM publicaciones WHERE id_noticia = '$id_noticia'";
          $resultado = mysqli_query($conectar, $vernoticia);

          $fila = $resultado -> fetch_array();
    ?>
    <div class="cont_panel_derecho">
      <div class="cont_panel_derecho_hijo1">
        <div class="elemento_salir">
          <img src="imagenes/cancelar.png" class="img_cancelar" >
          <a href="salir.php" class="salir">Salir</a>
        </div>
      </div>
      <br>
      <div class="cont_panel_derecho_hijo2">
        <h2 class="titulo_panel"> EDITAR POST</h2>
        <br>
        <a href="noticias_admin.php" class="btn_rojo2"><< Regresar</a>
        <br><br>
        <form action="guardar_noticias_editar.php" method="post" class="form_crear_usuario" enctype="multipart/form-data">
          <input type="text" name="nombrenoticia" class="elemento_inp2" placeholder="Nombre de evento o noticia" required value="<?php echo $fila['nombrenoticia'];?>">
          <br>
          <input type="date" name="fecha" class="elemento_inp2" value="<?php echo $fila['fecha'];?>">
          <br>
          <textarea name="descripcioncorta" placeholder="Descripcion Noticia(corta)" class="elemento_inp2 textdesc" ><?php echo $fila['descripcioncorta']; ?></textarea>
          <br>

          <?php if (!empty($fila['ruta'])): ?>
            <p class="dato">Imagen actual</p>
            <img src="<?php echo $fila['ruta']; ?>" class="img_noticia">
          <?php endif; ?>
          <p class="texto_fecha">Agregar Foto:</p>
          <input type="file" name="foto_noticia" class="elemento_inp2" value="">
          <br>
          <p class="texto_fecha">Descripcion larga de la notica: </p>
          <textarea class="elemento_inp2" name="editor1" id="editor1"><?php echo $fila['descripcionlarga']; ?></textarea>
          <br>
          <script>
            CKEDITOR.replace('editor1');
          </script>
          <!-- hidden -->
          <input type="hidden" name="id_noticia" value="<?php echo $fila['id_noticia'];?>">
          <button class="btn_amarillo2">Registar</button>
       </form>
      </div>
    </div>
  </div>
  
</body>
</html>