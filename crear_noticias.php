<?php
require "seguridad.php";
$usuario = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Crear-Noticias</title>
  <link rel="stylesheet" href="estilos.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="icon" type="image/x-icon" href="imagenes/logo_icono.png">
  <script src="ckeditor/ckeditor.js"></script>
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
        <h2 class="titulo_panel">Crear Noticias</h2>
        <br>
        <a href="noticias_admin.php" class="btn_rojo2"><< Regresar</a>
        <br><br>
        <form action="guardar_noticias.php" method="post" class="form_crear_usuario" enctype="multipart/form-data">

          <!-- Menú de selección de íconos personalizado -->
          <div class="custom-select" >
            <div class="select-selected" onclick="toggleSelect()">
            <i class="fas fa-file-invoice"></i> Selecciona un ícono
            </div>
            <div class="select-items">
            <div onclick="selectIcon('hand-holding-usd', 'fas fa-hand-holding-usd')"><i class="fas fa-hand-holding-usd"></i> Apoyo Financiero</div>
              <div onclick="selectIcon('newspaper', 'fas fa-newspaper')"><i class="fas fa-newspaper"></i> Noticias</div>
              <div onclick="selectIcon('handshake', 'fas fa-handshake')"><i class="fas fa-handshake"></i> Acuerdos</div>
              <div onclick="selectIcon('bullhorn', 'fas fa-bullhorn')"><i class="fas fa-bullhorn"></i> Anuncios</div>
              <div onclick="selectIcon('calendar-alt', 'fas fa-calendar-alt')"><i class="fas fa-calendar-alt"></i> Calendario</div>
              <div onclick="selectIcon('comments', 'fas fa-comments')"><i class="fas fa-comments"></i> Comentarios</div>
            </div>
          </div>

          <!-- Campo oculto para almacenar el valor del ícono seleccionado -->
          <input type="hidden" name="icono" value="">

          <script>
            function toggleSelect() {
                document.querySelector(".select-items").classList.toggle("show");
            }

            function selectIcon(value, iconClass) {
                // Cambia el texto y el ícono mostrado en el elemento seleccionado
                const selected = document.querySelector(".select-selected");
                selected.innerHTML = `<i class="${iconClass}"></i> ${value.charAt(0).toUpperCase() + value.slice(1)}`;

                // Guarda el valor del ícono seleccionado en el campo oculto
                document.querySelector("input[name='icono']").value = value;

                // Oculta el menú de opciones
                document.querySelector(".select-items").classList.remove("show");
            }

            // Cierra el menú desplegable si se hace clic fuera de él
            window.onclick = function(event) {
                if (!event.target.matches('.select-selected')) {
                    document.querySelectorAll(".select-items").forEach(dropdown => dropdown.classList.remove('show'));
                }
            };
          </script>
<br>
          <!-- Otros campos del formulario -->
          <input type="text" name="nombrenoticia" class="elemento_inp2" placeholder="Nombre de evento o noticia" required>
          <br>
          <input type="date" name="fecha" class="elemento_inp2" id="fecha" required>
          <script>
            // Obtén la fecha actual en formato yyyy-mm-dd
            const today = new Date().toISOString().split('T')[0];

            // Asigna la fecha mínima al campo de fecha
            document.getElementById('fecha').setAttribute('min', today);
          </script>

          <br>
          <textarea name="descripcioncorta" placeholder="Descripcion Noticia (corta)" class="elemento_inp2 textdesc"></textarea>
          <br>
          <p class="texto_fecha">Agregar Foto:</p>
          <input type="file" name="foto_noticia" class="elemento_inp2">
          <br>
          <p class="texto_fecha">Descripción larga de la noticia: </p>
          <textarea class="elemento_inp2" name="editor1" id="editor1"></textarea>
          <br>
          <script>
            CKEDITOR.replace('editor1');
          </script>
          <button class="btn_amarillo2">Registrar</button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
