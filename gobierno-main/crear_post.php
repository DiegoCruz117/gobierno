<?php
require "seguridad.php";
$usuario = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario de Apoyo Gubernamental</title>
  <link rel="stylesheet" href="estilos.css">
  <script src="ckeditor/ckeditor.js"></script>
</head>
<body>
  <div class="cont_padre_panel ancho">
    <?php 
    include "menudashboard.php"; // Incluye el menú de navegación del dashboard
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
        <h2 class="titulo_panel">Formulario de Apoyo Gubernamental</h2>
        <br>
        <a href="blog.php" class="btn_rojo2"><< Regresar</a>
        <br><br>
        <form action="procesar_apoyo.php" method="post" class="form_crear_usuario" enctype="multipart/form-data">
          
          <!-- Información Personal -->
          <h3>Información Personal</h3>
          
          <input type="text" name="nombre" class="elemento_inp2" placeholder="Nombre Completo" required>
          <br>
          <input type="date" name="fecha_nacimiento" class="elemento_inp2" required>
          <br>
          <input type="tel" name="telefono" class="elemento_inp2" placeholder="Teléfono de Contacto" required>
          <br>
          <input type="email" name="email" class="elemento_inp2" placeholder="Correo Electrónico" required>
          <br>
          <input type="text" name="direccion" class="elemento_inp2" placeholder="Dirección" required>
          <br>

          <!-- Información Socioeconómica -->
          <h3>Información Socioeconómica</h3>
          <input type="text" name="ocupacion" class="elemento_inp2" placeholder="Ocupación" required>
          <br>
          <input type="number" name="ingresos" class="elemento_inp2" placeholder="Ingresos Mensuales" required>
          <br>
          <input type="number" name="dependientes" class="elemento_inp2" placeholder="Número de Dependientes" required>
          <br>
          <select name="seguro_medico" class="elemento_inp2" required>
            <option value="" disabled selected>¿Cuenta con seguro médico?</option>
            <option value="si">Sí</option>
            <option value="no">No</option>
          </select>
          <br>
          <select name="nivel_educativo" class="elemento_inp2" required>
            <option value="" disabled selected>Nivel Educativo</option>
            <option value="primaria">Primaria</option>
            <option value="secundaria">Secundaria</option>
            <option value="bachillerato">Bachillerato</option>
            <option value="universidad">Universidad</option>
          </select>
          <br>

          <!-- Tipo de Apoyo Solicitado -->
          <h3>Tipo de Apoyo Solicitado</h3>
          <select name="tipo_apoyo" class="elemento_inp2" required>
            <option value="" disabled selected>Seleccione el tipo de apoyo</option>
            <option value="economico">Apoyo Económico</option>
            <option value="alimentario">Apoyo Alimentario</option>
            <option value="vivienda">Apoyo para Vivienda</option>
            <option value="medico">Asistencia Médica</option>
            <option value="otros">Otros</option>
          </select>
          <br>
          <textarea name="descripcion" placeholder="Describa su situación" class="elemento_inp2 textdesc" required></textarea>
          <br>

          <!-- Documentación Adjunta -->
          <h3>Documentación Adjunta</h3>
          <p>Subir CURP:</p>
          <input type="file" name="curp" class="elemento_inp2" accept=".pdf,.jpg,.jpeg,.png"  required>
          <br>
          <p>Subir INE:</p>
          <input type="file" name="ine" class="elemento_inp2" accept=".pdf,.jpg,.jpeg,.png" required>
          <br>
          <p>Subir Comprobante de Domicilio:</p>
          <input type="file" name="comprobante" class="elemento_inp2" accept=".pdf,.jpg,.jpeg,.png" required>
          <br>

          <!-- Consentimiento -->
          <h3>Consentimiento</h3>
          <input type="checkbox" name="consentimiento" required> Autorizo la verificación de la información.<br>
          <input type="checkbox" name="terminos" required> Acepto los términos y condiciones.<br>

          <!-- Botones -->
           <br>
          <button class="btn_amarillo2" type="submit">Enviar Solicitud</button>

        </form>
      </div>
    </div>
  </div>
  
</body>
</html>
