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
  <!-- Incluye Font Awesome para los íconos -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
        <!-- <a href="encargados_admin.php" class="btn_rojo2"><< Regresar</a> -->
        <br><br>
        <?php
        require "conexion.php";
        $id_apoyos = $_GET['id_apoyos'];

        // Consulta con INNER JOIN para obtener datos de 'crear_encargados' y 'crear_apoyos'
        $verusuario = "SELECT * FROM crear_apoyos ORDER BY id_apoyos ASC";

        $resultado = mysqli_query($conectar, $verusuario);

        // Verificar si hay resultados
        if (!$resultado) {
            die("Error en la consulta: " . mysqli_error($conectar));
        }

        $fila = mysqli_fetch_assoc($resultado);
        ?>
        <div class="contenedor_ver_usuarios">
          <p class="campo">Ícono</p>
          <p class="dato"><?php echo htmlspecialchars($fila['icono_apoyos']); ?></p>
          <hr>
        </div>
        <div class="contenedor_ver_usuarios">
          <p class="campo">Nombre programa</p>
          <p class="dato"><?php echo htmlspecialchars($fila['nombre_programa']); ?></p>
          <hr>
        </div>
        <div class="contenedor_ver_usuarios">
          <p class="campo">Fecha</p>
          <p class="dato"><?php echo htmlspecialchars($fila['fecha_programa']); ?></p>
          <hr>
        </div>
        <div class="contenedor_ver_usuarios">
          <p class="campo">Corta</p>
          <p class="dato"><?php echo htmlspecialchars($fila['descripcioncorta']); ?></p>
          <hr>
        </div>
        <div class="contenedor_ver_usuarios">
          <p class="campo">Larga</p>
          <p class="dato"><?php echo htmlspecialchars($fila['descripcionlarga']); ?></p>
          <hr>
        </div>
        <br>
        <a class="btn_rojo3" href="editar_apoyo.php?id_apoyo=<?php echo $fila["id_apoyos"]; ?>">Editar apoyo</a>
      </div>
    </div>
  </div>
</body>
</html>