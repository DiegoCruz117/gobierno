<?php
require "seguridad.php";
$usuario = $_SESSION['username'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Panel de Solicitudes de Apoyo</title>
  <link rel="stylesheet" href="estilos.css">
</head>
<body>
  <div class="cont_padre_panel ancho">
    <?php 
    include "menudashboard.php"; // Incluye el menú de navegación del dashboard
    ?>
    <div class="cont_panel_derecho">
      <div class="cont_panel_derecho_hijo1">
        <div class="elemento_salir">
          <img src="imagenes/cancelar.png" class="img_cancelar" >
          <a href="salir.php" class="salir">Salir</a>
        </div>
      </div>
      <br> 
      <div class="cont_panel_derecho_hijo2"><br>
        <h2 class="titulo_panel">Solicitudes de Apoyo</h2>
        <!-- <a href="crear_post.php" class="btn_rojo2">Crear Solicitud</a> -->
        <br>
        <table class="tabla_usuarios">
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Teléfono</th>
            <th>tipo de programa</th>
            <th>Identificación</th>
            <th>Ver</th>
            <th>Eliminar</th>
          </tr>
          <?php
          require "conexion.php"; // Conexión a la base de datos

          // Consulta para obtener todas las solicitudes de apoyo
          $todos_datos = "SELECT * FROM solicitudes_apoyo ORDER BY id_solicitud ASC";
          $resultado = mysqli_query($conectar, $todos_datos);
          
          // Bucle para mostrar cada solicitud en una fila de la tabla
          while ($fila = mysqli_fetch_assoc($resultado)) {
          ?>
          <tr>
            <td><?php echo $fila["id_solicitud"]; ?></td>
            <td><?php echo $fila["nombre"]; ?></td>
            <td><?php echo $fila["email"]; ?></td>
            <td><?php echo $fila["telefono"]; ?></td>
            <td><?php echo $fila["tipo_apoyo"]; ?></td>
            <td><?php echo $fila["identificacion"]; ?></td>
            

            <!-- Enlaces para ver, editar y eliminar -->
            <td><a href="ver_post.php?id=<?php echo $fila["id_solicitud"]; ?>"><img src="imagenes/icono_ver.png" class="img_ver"></a></td>

            <td><a href="#" Onclick="validar('eliminar_post.php?id_solicitud=<?php echo $fila["id_solicitud"]; ?>')"><img src="imagenes/icono_eliminar.png" class="img_eliminar"></a></td>
          </tr>
          <?php 
          }
          ?>
        </table>
      </div>
    </div>
  </div>
  <script>
    // Función para confirmar la eliminación de una solicitud
    function validar(url){
      var eliminar = confirm("¿Desea eliminar el registro?");
      if (eliminar == true){
        window.location = url;
      }
    }
  </script>
</body>
</html>
