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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <script src="ckeditor/ckeditor.js"></script>
</head>
<body>
  <div class="cont_padre_panel ancho">
    <?php include "menudashboard.php";
    require "conexion.php";
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
                        <label for="">Nombre(s) <span class="requerido">*</span></label> <br>
                        <input type="text" name="nombres" class="elemento_inp1" placeholder="Nombre(s)" required>
                    </div>

                    <div class="nombre">
                        <label for="">Apellidos <span class="requerido">*</span></label> <br>
                        <input type="text" name="apellidos" class="elemento_inp1" placeholder="Apellidos" required>
                    </div>
                </div>

                <div class="datos">
                    <div class="nombre">
                        <label for="">Edad <span class="requerido">*</span></label>
                        <input type="date" name="edad" class="elemento_inp1" required>
                    </div>

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

                <label">Apoyo <span class="requerido">*</span></label>
                <select name="id_apoyos" class="elemento_inp2" required>
                    <option selected disabled value="">Selecciona un apoyo</option>
                    <?php
                    $resultado = $conectar->QUERY("SELECT * FROM crear_apoyos");
                    while ($fila = $resultado->fetch_array()) {
                        ?>
                        <option value="<?php echo $fila['id_apoyos'] ?>"><?php echo $fila['nombre_programa'] ?></option>
                    <?php
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
                        <label for="">Correo <span class="requerido">*</span></label>
                        <input type="email" name="correo" class="elemento_inp1" placeholder="Ejemplo (999 999 9999)" required>
                    </div>

                    <div class="nombre">
                        <label for="">Teléfono <span class="requerido">*</span></label>
                        <input type="tel" name="numero_tel" class="elemento_inp1" placeholder="Ejemplo (999 999 9999)" required>
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