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
        <br>
        <h2 class="titulo_panel">Encargados de Apoyos</h2>
        <br>
        <a href="crear_encargados.php" class="btn_rojo2"><i class="fa-solid fa-address-card color_icon4"></i>Nuevo</a>
        <br><br>
        <table class="tabla_usuarios">
          <tr>
            <th>Nombre(s)</th>
            <th>Apellidos</th>
            <th>Encargado de programa</th>
            <th>Celular</th>
            <th colspan="3"></th>
          </tr>
          <?php
          require "conexion.php";

          $consulta = "SELECT
              ce.*,
              ca.nombre_programa
            FROM crear_encargados ce
            INNER JOIN crear_apoyos ca
            ON ce.id_apoyos = ca.id_apoyos
            ORDER BY ce.id_encargados ASC";

          $resultado = mysqli_query($conectar, $consulta);
          while($fila = mysqli_fetch_assoc($resultado)){
          ?>
          <tr>
            <td><?php echo $fila["nombres"]?></td>
            <td><?php echo $fila['apellidos']; ?></td>
            <td><?php echo $fila["nombre_programa"]?></td> <!-- Cambiado de id_apoyos a nombre_programa -->
            <td><?php echo $fila["numero_tel"]?></td>

            <td>
              <a href="ver_encargados.php?id_encargados=<?php echo $fila["id_encargados"]; ?>">
                <i class="fa-solid fa-eye size_icon color_icon1"></i>
              </a>
            </td>

            <td>
              <a href="editar_encargados.php?id_encargados=<?php echo $fila["id_encargados"]; ?>">
                <i class="fa-solid fa-pen-to-square size_icon color_icon2"></i>
              </a>
            </td>

            <td>
              <a href="#" onclick="validar('eliminar_encargados.php?id_encargados=<?php echo $fila['id_encargados']; ?>')">
                <i class="fa-solid fa-trash color size_icon color_icon3"></i>
              </a>
            </td>
          </tr>
          <?php
          }
          ?>
        </table>
      </div>
    </div>
  </div>
  <script>
    function validar(url){
      var eliminar = confirm("¿Desea eliminar el registro?");
      if(eliminar == true){
        window.location = url;
      }
    }
  </script>
</body>
</html>