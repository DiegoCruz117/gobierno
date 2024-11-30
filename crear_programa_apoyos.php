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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
        <h2 class="titulo_panel">Crear programas de Apoyos</h2>
        <br>
        <a href="apoyo_admin.php" class="btn_rojo2 anima"><i class="fa-regular fa-circle-left color_icon4"></i>Regresar</a>
        <br><br>
        <form action="guardar_programas_apoyos.php" method="post" class="form_crear_usuario" enctype="multipart/form-data">

<!-- Menú de selección de íconos personalizado -->
<div class="custom-select">
    <label for="">Ícono <span class="requerido">*</span></label>
    <div class="select-selected" onclick="toggleSelect()">
    <i class="fas fa-file-invoice"></i></i> Selecciona un ícono
    </div>
    <div class="select-items">
        <div onclick="selectIcon('hand-holding-usd', 'fas fa-hand-holding-usd')"><i class="fas fa-hand-holding-usd"></i> Apoyo Financiero</div>
        <div onclick="selectIcon('utensils', 'fas fa-utensils')"><i class="fas fa-utensils"></i> Alimentación</div>
        <div onclick="selectIcon('home', 'fas fa-home')"><i class="fas fa-home"></i> Vivienda</div>
        <div onclick="selectIcon('graduation-cap', 'fas fa-graduation-cap')"><i class="fas fa-graduation-cap"></i> Educación</div>
        <div onclick="selectIcon('heartbeat', 'fas fa-heartbeat')"><i class="fas fa-heartbeat"></i> Salud</div>
    </div>
</div>

<!-- Campo oculto para almacenar el valor del ícono seleccionado -->
<input type="hidden" name="icono_apoyos" value="">

<script>
    function toggleSelect() {
        document.querySelector(".select-items").classList.toggle("show");
    }

    function selectIcon(value, iconClass) {
        // Cambia el texto y el ícono mostrado en el elemento seleccionado
        const selected = document.querySelector(".select-selected");
        selected.innerHTML = `<i class="${iconClass}"></i> ${value.charAt(0).toUpperCase() + value.slice(1)}`;

        // Guarda el valor del ícono seleccionado en el campo oculto
        document.querySelector("input[name='icono_apoyos']").value = value;

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
      <div class="datos">
          <div class="nombre">
              <label for="">Nombre del programa <span class="requerido">*</span></label>
              <input type="text" name="nombre_programa" class="elemento_inp1" placeholder="Nombre del programa" required>
          </div>

          <div class="nombre">
              <label for="fecha_programa">Fecha de creacion<span class="requerido">*</span></label>
              <input type="date" name="fecha_programa" class="elemento_inp1" required id="fecha_programa">
          </div>

          <script>
              // Obtener la fecha actual en formato adecuado para el campo de tipo date
              const hoy = new Date().toISOString().split('T')[0];
              document.getElementById("fecha_programa").setAttribute("min", hoy);
          </script>

          
      </div>
          <label>Breve descripción <span class="requerido">*</span></label>
          <textarea name="descripcioncorta" placeholder="Descripcion Corta" class="elemento_inp2 textdesc"></textarea>
          <br>
          <p class="texto_fecha">Descripción larga de la noticia: <span class="requerido">*</span></p>
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
