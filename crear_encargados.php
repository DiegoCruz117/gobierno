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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="icon" type="image/x-icon" href="imagenes/logo_icono.png">
  <script src="ckeditor/ckeditor.js"></script>
</head>
<body>
  <div class="cont_padre_panel ancho">
    <?php include "menudashboard.php";
    require "conexion.php";
    if (!$conectar) {
      die("Error al conectar a la base de datos: " . $conectar->connect_error);
    }
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
        <h2 class="titulo_panel">Alta encargados</h2>
        <br>
        <a href="encargados_admin.php" class="btn_rojo2 anima"><i class="fa-regular fa-circle-left color_icon4"></i>Regresar</a>
        <br><br>
        <div class="cont_form">
            <form action="guardar_encargados_admin.php" method="post" class="form_crear_usuario" enctype="multipart/form-data">
                <div class="centro">
                    <label class="titulo1">Datos Personales</label>
                </div>
                <hr class="corte">
                <div class="datos">
                <div class="nombre">
                <label for="nombres">Nombre(s) <span class="requerido">*</span></label><br>
                <input type="text" name="nombres" class="elemento_inp1" placeholder="Nombre(s)" required id="nombres">
                <p id="nombreError" style="color: red; display: none;">El campo Nombre(s) solo debe contener letras y espacios.</p>
                </div>


                <div class="nombre">
                    <label for="apellidos">Apellidos <span class="requerido">*</span></label><br>
                    <input type="text" name="apellidos" class="elemento_inp1" placeholder="Apellidos" required id="apellidos">
                    <p id="apellidoError" style="color: red; display: none;">El campo Apellidos solo debe contener letras y espacios.</p>
                </div>

                </div>

                <div class="datos">

                <div class="nombre">
                    <label for="edad">Fecha de Nacimiento<span class="requerido">*</span></label>
                    <input type="date" name="edad" class="elemento_inp1" required id="edad" max="">
                </div>

                <script>
                    // Obtener la fecha actual en formato adecuado para el campo de tipo date
                    const hoy = new Date().toISOString().split('T')[0];
                    document.getElementById("edad").setAttribute("max", hoy);
                </script>



                    <div class="nombre">
                        <label for="">Sexo <span class="requerido">*</span></label>
                        <select name="sexo" class="elemento_inp1" required>
                            <option selected disabled value="">Selecciona una opción</option>
                            <option value="Masculino">Masculino</option>
                            <option value="Femenino">Femenino</option>
                            <option value="Otro">Otro</option>
                            <option value="No especificado">Prefiero no decirlo</option>
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
                    $stmt = $conectar->prepare("SELECT id_apoyos, nombre_programa FROM crear_apoyos");
                    $stmt->execute();
                    $resultado = $stmt->get_result();
                    while ($fila = $resultado->fetch_assoc()) {
                        echo "<option value='{$fila['id_apoyos']}'>{$fila['nombre_programa']}</option>";
                    }
                    $stmt->close();
                    ?>
                </select>
                <br><br>
                <div class="centro">
                    <label class="titulo1">Contacto</label>
                    <hr class="corte">
                </div>
                <div class="datos">
                    <div class="nombre">
                        <label for="">Correo <span class="requerido">*</span></label>
                        <input type="email" name="correo" class="elemento_inp1" placeholder="Ejemplo (correo@ejemplo.com)" required>
                    </div>
                    <div class="nombre">
                        <label for="numero_tel">Teléfono <span class="requerido">*</span></label>
                        <input type="tel" name="numero_tel" class="elemento_inp1" placeholder="Ejemplo (9999999999)" required pattern="[0-9]{10}" title="El teléfono debe tener 10 dígitos numéricos">
                    </div>
                </div>
                <button class="btn_amarillo2">Registrar</button>
            </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
