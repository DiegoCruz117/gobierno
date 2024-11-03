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
        <br>
        
        <!-- Tabla para Apoyo Alimentario -->
        <h3>Apoyo Alimentario</h3>
        <table class="tabla_usuarios">
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Teléfono</th>
            <th>Tipo de Programa</th>
            <th>Ver</th>
            <th>Eliminar</th>
          </tr>
          <?php
          require "conexion.php"; // Conexión a la base de datos

          // Consulta para obtener solicitudes de apoyo alimentario
          $query_alimentario = "SELECT * FROM solicitudes_apoyo WHERE tipo_apoyo = 'Alimentario' ORDER BY id_solicitud ASC";
          $resultado_alimentario = mysqli_query($conectar, $query_alimentario);
          
          // Bucle para mostrar cada solicitud en una fila de la tabla
          while ($fila = mysqli_fetch_assoc($resultado_alimentario)) {
          ?>
          <tr>
            <td><?php echo $fila["id_solicitud"]; ?></td>
            <td><?php echo $fila["nombre"]; ?></td>
            <td><?php echo $fila["email"]; ?></td>
            <td><?php echo $fila["telefono"]; ?></td>
            <td><?php echo $fila["tipo_apoyo"]; ?></td>
            <td><a href="ver_post.php?id=<?php echo $fila["id_solicitud"]; ?>"><img src="imagenes/icono_ver.png" class="img_ver"></a></td>
            <td><a href="#" Onclick="validar('eliminar_post.php?id_solicitud=<?php echo $fila["id_solicitud"]; ?>')"><img src="imagenes/icono_eliminar.png" class="img_eliminar"></a></td>
          </tr>
          <?php 
          }
          ?>
        </table>
        <br><br>
        <!-- Tabla para Apoyo Vivienda -->
        <h3>Apoyo Economico</h3>
        <table class="tabla_usuarios">
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Teléfono</th>
            <th>Tipo de Programa</th>
            <th>Ver</th>
            <th>Eliminar</th>
          </tr>
          <?php
          // Consulta para obtener solicitudes de apoyo vivienda
          $query_vivienda = "SELECT * FROM solicitudes_apoyo WHERE tipo_apoyo = 'economico' ORDER BY id_solicitud ASC";
          $resultado_vivienda = mysqli_query($conectar, $query_vivienda);
          
          // Bucle para mostrar cada solicitud en una fila de la tabla
          while ($fila = mysqli_fetch_assoc($resultado_vivienda)) {
          ?>
          <tr>
            <td><?php echo $fila["id_solicitud"]; ?></td>
            <td><?php echo $fila["nombre"]; ?></td>
            <td><?php echo $fila["email"]; ?></td>
            <td><?php echo $fila["telefono"]; ?></td>
            <td><?php echo $fila["tipo_apoyo"]; ?></td>
            <td><a href="ver_post.php?id=<?php echo $fila["id_solicitud"]; ?>"><img src="imagenes/icono_ver.png" class="img_ver"></a></td>
            <td><a href="#" Onclick="validar('eliminar_post.php?id_solicitud=<?php echo $fila["id_solicitud"]; ?>')"><img src="imagenes/icono_eliminar.png" class="img_eliminar"></a></td>
          </tr>
          <?php 
          }
          ?>
        </table>
        <br><br>
        <!-- Tabla para Apoyo Educativo -->
        <h3>Apoyo Vivienda</h3>
        <table class="tabla_usuarios">
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Teléfono</th>
            <th>Tipo de Programa</th>
            <th>Ver</th>
            <th>Eliminar</th>
          </tr>
          <?php
          // Consulta para obtener solicitudes de apoyo educativo
          $query_educativo = "SELECT * FROM solicitudes_apoyo WHERE tipo_apoyo = 'vivienda' ORDER BY id_solicitud ASC";
          $resultado_educativo = mysqli_query($conectar, $query_educativo);
          
          // Bucle para mostrar cada solicitud en una fila de la tabla
          while ($fila = mysqli_fetch_assoc($resultado_educativo)) {
          ?>
          <tr>
            <td><?php echo $fila["id_solicitud"]; ?></td>
            <td><?php echo $fila["nombre"]; ?></td>
            <td><?php echo $fila["email"]; ?></td>
            <td><?php echo $fila["telefono"]; ?></td>
            <td><?php echo $fila["tipo_apoyo"]; ?></td>
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
