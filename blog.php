<?php
require "seguridad.php";
$usuario = $_SESSION['username'];

// Conexión a la base de datos
require "conexion.php";

// Verifica si se envió el formulario para actualizar el estatus
if (isset($_POST['actualizar_estatus'])) {
    // Obtiene los datos enviados
    $id_solicitud = $_POST['id_solicitud'];
    $nuevo_estatus = $_POST['estatus'];

    // Prepara la consulta para actualizar el estatus en la base de datos
    $query_actualizar = "UPDATE solicitudes_apoyo SET estatus = ? WHERE id_solicitud = ?";
    $stmt = mysqli_prepare($conectar, $query_actualizar);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'si', $nuevo_estatus, $id_solicitud);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="imagenes/logo_icono.png">
  <title>Panel de Solicitudes de Apoyo</title>
  <link rel="stylesheet" href="css/estilos.css">
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
        <h2 class="titulo_panel">Solicitudes de Apoyo</h2>
        <br>

        <!-- Pestañas -->
        <div class="tab">
          <div class="tablinks" id="tabApoyoAlimentario" onclick="openTab(event, 'ApoyoAlimentario')">Apoyo Alimentario</div>
          <div class="tablinks" id="tabApoyoEconomico" onclick="openTab(event, 'ApoyoEconomico')">Apoyo Económico</div>
          <div class="tablinks" id="tabApoyoVivienda" onclick="openTab(event, 'ApoyoVivienda')">Apoyo Vivienda</div>
        </div>

        <!-- Contenido de las Pestañas -->
        <div id="ApoyoAlimentario" class="tab-content">
          <br>
          <?php include "tabla_alimentario.php" ?>
        </div>

        <div id="ApoyoEconomico" class="tab-content">
          <br>
          <?php include "tabla_economico.php" ?>
        </div>

        <div id="ApoyoVivienda" class="tab-content">
          <br>
          <?php include "tabla_vivienda.php" ?>
        </div>
      </div>
    </div>
  </div>

  <script>
    function openTab(evt, tabName) {
      var i, tabcontent, tablinks;
      tabcontent = document.getElementsByClassName("tab-content");

      // Ocultar todas las pestañas
      for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
        tabcontent[i].classList.remove("active");
      }

      tablinks = document.getElementsByClassName("tablinks");

      // Eliminar la clase activa de todas las pestañas
      for (i = 0; i < tablinks.length; i++) {
        tablinks[i].classList.remove("active");
      }

      // Mostrar la pestaña seleccionada
      document.getElementById(tabName).style.display = "block";
      document.getElementById(tabName).classList.add("active");

      // Marcar la pestaña seleccionada como activa
      evt.currentTarget.classList.add("active");

      // Guardar la pestaña activa en el almacenamiento local
      localStorage.setItem("activeTab", tabName);
    }

    // Al cargar la página, verificar si hay una pestaña guardada en el almacenamiento local
    window.onload = function() {
      var activeTab = localStorage.getItem("activeTab");

      if (activeTab) {
        var tabcontent = document.getElementsByClassName("tab-content");
        var tablinks = document.getElementsByClassName("tablinks");

        // Ocultar todas las pestañas
        for (var i = 0; i < tabcontent.length; i++) {
          tabcontent[i].style.display = "none";
          tabcontent[i].classList.remove("active");
        }

        // Eliminar la clase activa de todos los enlaces de pestaña
        for (var i = 0; i < tablinks.length; i++) {
          tablinks[i].classList.remove("active");
        }

        // Mostrar la pestaña activa
        document.getElementById(activeTab).style.display = "block";
        document.getElementById(activeTab).classList.add("active");

        // Agregar la clase activa al enlace correspondiente para mantener el estilo visual
        for (var i = 0; i < tablinks.length; i++) {
          if (tablinks[i].id === "tab" + activeTab) {
            tablinks[i].classList.add("active");
          }
        }
      } else {
        // Si no hay una pestaña guardada, mostrar la primera pestaña por defecto
        document.getElementsByClassName("tablinks")[0].click();
      }
    }
  </script>

</body>
</html>
