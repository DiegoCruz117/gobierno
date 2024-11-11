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
        <h2 class="titulo_panel"> VER POSTS</h2>
        <br>
        <a href="encargados_admin.php" class="btn_rojo2"><< Regresar</a>
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
        <div class="contenedor_ver_usuarios">
          <p class="campo">Nombre(s)</p>
          <p class="dato"><?php echo htmlspecialchars($fila['nombres']); ?></p>
          <hr>
        </div>
        <div class="contenedor_ver_usuarios">
          <p class="campo">Apellidos</p>
          <p class="dato"><?php echo htmlspecialchars($fila['apellidos']); ?></p>
          <hr>
        </div>
        <div class="contenedor_ver_usuarios">
          <p class="campo">Encargado de programa</p>
          <p class="dato"><?php echo htmlspecialchars($fila['nombre_programa']); ?></p>
          <hr>
        </div>
        <div class="contenedor_ver_usuarios">
          <p class="campo">Correo</p>
          <p class="dato"><?php echo htmlspecialchars($fila['correo']); ?></p>
          <hr>
        </div>
        <div class="contenedor_ver_usuarios">
          <p class="campo">Celular</p>
          <p class="dato"><?php echo htmlspecialchars($fila['numero_tel']); ?></p>
          <hr>
        </div>
        <div class="contenedor_ver_usuarios">
          <p class="campo">Edad</p>
          <p class="dato"><?php echo htmlspecialchars($fila['edad']); ?></p>
          <hr>
        </div>
        <div class="contenedor_ver_usuarios">
          <p class="campo">Sexo</p>
          <p class="dato"><?php echo htmlspecialchars($fila['sexo']); ?></p>
          <hr>
        </div>
        <br>
        <a class="btn_rojo3" href="editar_post.php?id_encargados=<?php echo $fila["id_encargados"]; ?>">Editar Post</a>
      </div>
    </div>
  </div>
</body>
</html>
