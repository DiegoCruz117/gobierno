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
        <h2 class="titulo_panel"> VER ENCARGADOS</h2>
        <br>
        <a href="encargados_admin.php" class="btn_rojo2 anima"><i class="fa-regular fa-circle-left color_icon4"></i>Regresar</a>
        <!-- <a href="encargados_admin.php" class="btn_rojo2"><< Regresar</a> -->
        <br><br>
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
        <div class="contenedor_ver_usuarios datos margen">
          <h3 class="up">Datos generales</h3>
            <div class="nombre4">
              <label class="campo">Nombre Completo</label><br>
              <p class="dato"><?php echo htmlspecialchars($fila['nombres'] . ' ' . $fila['apellidos']); ?></p>
            </div>
          <!-- <hr> -->
          <div class="nombre5">
              <label class="campo">Edad</label><br>
              <p class="dato"><?php echo htmlspecialchars($fila['edad']); ?></p>
            </div>
          <!-- <hr> -->
          <div class="nombre5">
              <label class="campo">Sexo</label><br>
              <p class="dato"><?php echo htmlspecialchars($fila['sexo']); ?></p>
            </div>
          <!-- <hr> -->
        </div>

        <div class="contenedor_ver_usuarios datos2 margen">
          <h3 class="up1">Apoyo Asiganado</h3>
            <div class="nombre2">
              <label class="campo">Nombre del apoyo</label><br>
              <p class="dato"><?php echo htmlspecialchars($fila['nombre_programa']); ?></p>
            </div>
        </div>

        <div class="contenedor_ver_usuarios datos3 margen">
          <h3 class="up3">Contacto</h3>
            <div class="nombre3">
              <label class="campo">Correo</label><br>
              <p class="dato"><?php echo htmlspecialchars($fila['correo']); ?></p>
            </div>
          <!-- <hr> -->
            <div class="nombre1">
              <label class="campo">Teléfono</label><br>
              <p class="dato"><?php echo htmlspecialchars($fila['numero_tel']); ?></p>
            </div>
        </div>
        <br><br>
        <a class="btn_rojo3" href="editar_encargados.php?id_encargados=<?php echo $fila["id_encargados"]; ?>">Editar Post</a>
      </div>
    </div>
  </div>
</body>
</html>
