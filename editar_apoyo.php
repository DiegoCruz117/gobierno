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
<script>
    // Variable para marcar si hubo cambios en el formulario
    let isFormEdited = false;

    // Función que se ejecuta cuando hay cambios en un campo
    function handleInputChange() {
      isFormEdited = true; // Cambiar el estado cuando hay un cambio
    }

    // Función que valida si se debe enviar el formulario
    function validateForm(event) {
      if (!isFormEdited) {
        event.preventDefault(); // Si no hubo cambios, prevenir el envío del formulario
        alert("Por favor edite algún campo antes de guardar.");
      }
    }

    // Asignar eventos a los campos de formulario
    window.onload = function() {
      // Seleccionar todos los campos que deseas monitorear
      const inputs = document.querySelectorAll("input, textarea");
      
      inputs.forEach(input => {
        input.addEventListener('input', handleInputChange); // Detectar cambios
      });
      
      // Asignar la validación al enviar el formulario
      const form = document.querySelector("form");
      form.addEventListener('submit', validateForm);
    };
  </script>
  <div class="cont_padre_panel ancho">
    <?php
      include "menudashboard.php";
      require "conexion.php";
      $id_apoyos = $_GET['id_apoyos'];

      // Consulta con INNER JOIN para obtener datos de 'crear_encargados' y 'crear_apoyos'
      $verusuario = "SELECT * FROM crear_apoyos WHERE id_apoyos = '$id_apoyos'";

$resultado = mysqli_query($conectar, $verusuario);

// Verificar si hay resultados
if (!$resultado) {
die("Error en la consulta: " . mysqli_error($conectar));
}
$fila = mysqli_fetch_assoc($resultado);
    ?>
    <div class="cont_panel_derecho">
      <div class="cont_panel_derecho_hijo1">
        <div class="elemento_salir">
          <img src="imagenes/cancelar.png" class="img_cancelar">
          <a href="salir.php" class="salir">Salir</a>
        </div>
      </div>
      <br>
      <div class="cont_panel_derecho_hijo2">
        <h2 class="titulo_panel">Editar programas de Apoyos</h2>
        <br>
        <a href="apoyo_admin.php" class="btn_rojo2 anima"><i class="fa-regular fa-circle-left color_icon4"></i>Regresar</a>
        <br><br>
        <form action="guardar_apoyos_editar.php" method="post" class="form_crear_usuario" enctype="multipart/form-data">

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
    <input type="hidden" name="id_apoyos" value="<?php echo $fila['id_apoyos']; ?>">
      <div class="datos">
          <div class="nombre">
              <label for="">Nombre del programa <span class="requerido">*</span></label>
              <input type="text" name="nombre_programa" class="elemento_inp1" placeholder="Nombre del programa" value="<?php echo $fila['nombre_programa'];?>" required>
          </div>

          <div class="nombre">
              <label for="">Fecha </label>
              <input type="date" name="fecha_programa" class="elemento_inp1" value="<?php echo $fila['fecha_programa'];?>" disabled>
          </div>
      </div>
          <label>Breve descripción <span class="requerido">*</span></label>
          <textarea name="descripcioncorta" placeholder="Descripcion Corta" class="elemento_inp2 textdesc"><?php echo $fila['descripcioncorta'];?></textarea>
          <br>
          <p class="texto_fecha">Descripción larga de la noticia: <span class="requerido">*</span></p>
          <textarea class="elemento_inp2" name="editor1" id="editor1"><?php echo $fila['descripcionlarga'];?></textarea>
          <br>
          <script>
            CKEDITOR.replace('editor1');
          </script>
          <button class="btn_amarillo2">Actualizar datos</button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
