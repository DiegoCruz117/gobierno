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
  <link rel="stylesheet" href="estilos.css">
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
    ?>
   <?php
        require "conexion.php";
        $id_encargados = $_GET['id_encargados'];

        // Consulta con INNER JOIN para obtener datos de 'crear_encargados' y 'crear_apoyos'
        $verusuario = "SELECT ce.*, ca.nombre_programa
                       FROM crear_encargados ce
                       INNER JOIN crear_apoyos ca ON ce.id_apoyos = ca.id_apoyos
                       WHERE ce.id_encargados = '$id_encargados'";

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
          <img src="imagenes/cancelar.png" class="img_cancelar" >
          <a href="salir.php" class="salir">Salir</a>
        </div>
      </div>
      <br>
      <div class="cont_panel_derecho_hijo2">
        <h2 class="titulo_panel"> EDITAR ENCARGADOS</h2>
        <br>
        <a href="encargados_admin.php" class="btn_rojo2 anima"><i class="fa-regular fa-circle-left color_icon4"></i>Regresar</a>
        <!-- <a href="encargados_admin.php" class="btn_rojo2"><< Regresar</a> -->
        <br><br>
        <form action="guardar_encargados_editar.php" method="post" class="form_crear_usuario" enctype="multipart/form-data">
        <div class="centro">
                    <label class="titulo1">Datos Personales</label>
                </div>

                <hr class="corte">
                <div class="datos">
                    <div class="nombre">
                        <label for="">Nombre(s) <span class="requerido">*</span></label> <br>
                        <input type="hidden" name="id_encargados" value="<?php echo $fila['id_encargados']; ?>">
                        <input type="text" name="nombres" class="elemento_inp1" placeholder="Nombre(s)" required value="<?php echo $fila['nombres'];?>">
                    </div>

                    <div class="nombre">
                        <label for="">Apellidos <span class="requerido">*</span></label> <br>
                        <input type="text" name="apellidos" class="elemento_inp1" placeholder="Apellidos" required value="<?php echo $fila['apellidos'];?>">
                    </div>
                </div>

                <div class="datos">
                    <div class="nombre">
                        <label for="">Fecha de nacimiento</label>
                        <input type="date" name="edad" class="elemento_inp1" disabled value="<?php echo $fila['edad'];?>">
                    </div>

                    <div class="nombre">
                    <label for="">Sexo</label>
                    <select name="sexo" class="elemento_inp1">
                        <option selected disabled value="">Selecciona una opción</option>
                        <option value="Masculino" <?php echo ($fila['sexo'] == 'Masculino') ? 'selected' : ''; ?>>Masculino</option>
                        <option value="Femenino" <?php echo ($fila['sexo'] == 'Femenino') ? 'selected' : ''; ?>>Femenino</option>
                        <option value="Otro" <?php echo ($fila['sexo'] == 'Otro') ? 'selected' : ''; ?>>Otro</option>
                        <option value="No especificado" <?php echo ($fila['sexo'] == 'No especificado') ? 'selected' : ''; ?>>Prefiero no decirlo</option>
                    </select>
                </div>

                </div>

                <br>
                <div class="centro">
                    <label class="titulo1">Encargado</label>
                    <hr class="corte">
                </div>

                <label>Apoyo <span class="requerido">*</span></label>
                <select name="id_apoyos" class="elemento_inp2" required>
                    <option selected disabled value="">Selecciona un apoyo</option>
                    <?php
                    // Consulta para obtener todos los apoyos disponibles
                    $verApoyos = "SELECT id_apoyos, nombre_programa FROM crear_apoyos";
                    $resultado_apoyos = mysqli_query($conectar, $verApoyos);

                    // Verificar que la consulta fue exitosa
                    if ($resultado_apoyos) {
                        while ($fila_apoyo = mysqli_fetch_array($resultado_apoyos)) {
                            // Verificar si el apoyo actual coincide con el seleccionado en la base de datos
                            $selected = ($fila['id_apoyos'] == $fila_apoyo['id_apoyos']) ? 'selected' : '';
                            echo "<option value='" . $fila_apoyo['id_apoyos'] . "' $selected>" . $fila_apoyo['nombre_programa'] . "</option>";
                        }
                    } else {
                        echo "<option value=''>Error al cargar apoyos</option>";
                    }
                    ?>
                </select>


                <br><br>

                <div class="centro">
                    <label class="titulo1">Contacto</label>
                    <hr class="corte">
                </div>
                <div class="datos">
                    <div class="nombre">
                        <label for="">Correo <span class="requerido"></span></label>
                        <input type="email" name="correo" class="elemento_inp1" placeholder="Ejemplo@dominio" disabled value="<?php echo $fila['correo'];?>">
                    </div>

                    <div class="nombre">
                        <label for="">Teléfono <span class="requerido">*</span></label>
                        <input type="tel" name="numero_tel" class="elemento_inp1" placeholder="Ejemplo (999 999 9999)" required value="<?php echo $fila['numero_tel'];?>">
                    </div>
                </div>
          <button class="btn_amarillo2">Registar</button>
       </form>
      </div>
    </div>
  </div>
  
</body>
</html>