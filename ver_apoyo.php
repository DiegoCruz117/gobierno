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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
        <h2 class="titulo_panel"> VER APOYOS</h2>
        <br>
        <a href="apoyo_admin.php" class="btn_rojo2 anima"><i class="fa-regular fa-circle-left color_icon4"></i>Regresar</a>
        <br><br>
        <?php
        require "conexion.php";
        $id_apoyos = $_GET['id_apoyos'];

        $verusuario = "SELECT * FROM crear_apoyos WHERE id_apoyos = '$id_apoyos'";

        $resultado = mysqli_query($conectar, $verusuario);

        // Verificar si hay resultados
        if (!$resultado) {
            die("Error en la consulta: " . mysqli_error($conectar));
        }

        $fila = mysqli_fetch_assoc($resultado);
        ?>
        <div class="contenedor_ver_usuarios datos5 margen">
          <h3 class="up2">Datos generales</h3>
          <div class="nombre2">
            <label class="campo">Nombre del programa</label><br>
            <p class="dato">
              <i class="fas fa-<?php echo htmlspecialchars($fila['icono_apoyos']); ?>" style="font-size: 24px;"></i> <span class="derecha"><?php echo htmlspecialchars($fila['nombre_programa']); ?></span>
            </p>
          </div>
          <br>
          <div class="nombre2">
            <label class="campo">Fecha de creación</label><br>
            <p class="dato"><?php echo htmlspecialchars($fila['fecha_programa']); ?></p>
          </div>
        </div>
        <div class="contenedor_ver_usuarios datos4 margen">
          <h3 class="up2">Breve descripción</h3>
            <div class="nombre2">
              <p class="dato"><?php echo htmlspecialchars($fila['descripcioncorta']); ?></p>
            </div>
        </div>
        <br><br>
        <div class="contenedor_ver_usuarios datos1 margen">
          <h3 class="up4">Descripción completa</h3>
            <div class="nombre2">
            <p class="dato"><?php echo htmlspecialchars($fila['descripcionlarga']); ?></p>
            </div>
        </div>
        <br>
        <a class="btn_rojo3" href="editar_apoyo.php?id_apoyo=<?php echo $fila["id_apoyos"]; ?>">Editar apoyo</a>
      </div>
    </div>
  </div>
</body>
</html>