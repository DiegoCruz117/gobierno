<?php
require "seguridad.php";
$usuario = $_SESSION['username'];

// Conexión a la base de datos
require "conexion.php"; 

// Verifica si se envió el formulario para actualizar el estatus
if (isset($_POST['actualizar_estatus'])) {
    // Obtiene los datos enviados
    $id_solicitud = $_POST['id_solicitud'];
    $nuevo_estatus = $_POST['estatus'];

    // Prepara la consulta para actualizar el estatus en la base de datos
    $query_actualizar = "UPDATE solicitudes_apoyo SET estatus = ? WHERE id_solicitud = ?";
    $stmt = mysqli_prepare($conectar, $query_actualizar);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'si', $nuevo_estatus, $id_solicitud);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

    }
}
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
            <th>Estatus</th>
            <th>Acciones</th>
            <th>Ver</th>
            <th>Eliminar</th>

          </tr>
          <?php
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
            <td><?php echo $fila["estatus"]; ?></td>
            <td>
              <!-- Formulario para actualizar estatus -->
              <form method="POST" style="display:inline;">
                <input type="hidden" name="id_solicitud" value="<?php echo $fila["id_solicitud"]; ?>">
                <input type="hidden" name="actualizar_estatus" value="1">
                
                <!-- Botones de estatus -->
                <button type="submit" name="estatus" value="Aceptado" class="btn_estatus aceptado">Aceptado</button>
                <button type="submit" name="estatus" value="Rechazado" class="btn_estatus rechazado">Rechazado</button>
              </form>
            </td>
            <td><a href="ver_post.php?id=<?php echo $fila["id_solicitud"]; ?>"><img src="imagenes/icono_ver.png" class="img_ver"></a></td>
            <td><a href="#" Onclick="validar('borrar_registros.php?id_solicitud=<?php echo $fila["id_solicitud"]; ?>')"><img src="imagenes/icono_eliminar.png" class="img_eliminar"></a></td>
          </tr>
          <?php 
          }
          ?>
        </table>
        <br><br>

        <!-- Tabla para Apoyo Económico -->
        <h3>Apoyo Económico</h3>
        <table class="tabla_usuarios">
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Teléfono</th>
            <th>Tipo de Programa</th>
            <th>Estatus</th>
            <th>Acciones</th>
            <th>Ver</th>
            <th>Eliminar</th>
          </tr>
          <?php
          // Consulta para obtener solicitudes de apoyo económico
          $query_economico = "SELECT * FROM solicitudes_apoyo WHERE tipo_apoyo = 'economico' ORDER BY id_solicitud ASC";
          $resultado_economico = mysqli_query($conectar, $query_economico);
          
          // Bucle para mostrar cada solicitud en una fila de la tabla
          while ($fila = mysqli_fetch_assoc($resultado_economico)) {
          ?>
          <tr>
            <td><?php echo $fila["id_solicitud"]; ?></td>
            <td><?php echo $fila["nombre"]; ?></td>
            <td><?php echo $fila["email"]; ?></td>
            <td><?php echo $fila["telefono"]; ?></td>
            <td><?php echo $fila["tipo_apoyo"]; ?></td>
            <td><?php echo $fila["estatus"]; ?></td>
            <td>
              <!-- Formulario para actualizar estatus -->
              <form method="POST" style="display:inline;">
                <input type="hidden" name="id_solicitud" value="<?php echo $fila["id_solicitud"]; ?>">
                <input type="hidden" name="actualizar_estatus" value="1">
                
                <!-- Botones de estatus -->
                <button type="submit" name="estatus" value="Aceptado" class="btn_estatus aceptado">Aceptado</button>
                <button type="submit" name="estatus" value="Rechazado" class="btn_estatus rechazado">Rechazado</button>
              </form>
            </td>
            <td><a href="ver_post.php?id=<?php echo $fila["id_solicitud"]; ?>"><img src="imagenes/icono_ver.png" class="img_ver"></a></td>
            <td><a href="#" Onclick="validar('borrar_registros.php?id_solicitud=<?php echo $fila["id_solicitud"]; ?>')"><img src="imagenes/icono_eliminar.png" class="img_eliminar"></a></td>
          </tr>
          <?php 
          }
          ?>
        </table>
        <br><br>

        <!-- Tabla para Apoyo Vivienda -->
        <h3>Apoyo Vivienda</h3>
        <table class="tabla_usuarios">
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Teléfono</th>
            <th>Tipo de Programa</th>
            <th>Estatus</th>
            <th>Ver</th>
            <th>Eliminar</th>
            <th>Acciones</th>
          </tr>
          <?php
          // Consulta para obtener solicitudes de apoyo vivienda
          $query_vivienda = "SELECT * FROM solicitudes_apoyo WHERE tipo_apoyo = 'vivienda' ORDER BY id_solicitud ASC";
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
            <td><?php echo $fila["estatus"]; ?></td>
          
            <td>
              <!-- Formulario para actualizar estatus -->
              <form method="POST" style="display:inline;">
                <input type="hidden" name="id_solicitud" value="<?php echo $fila["id_solicitud"]; ?>">
                <input type="hidden" name="actualizar_estatus" value="1">
                
                <!-- Botones de estatus -->
                <button type="submit" name="estatus" value="Aceptado" class="btn_estatus aceptado">Aceptado</button>
                <button type="submit" name="estatus" value="Rechazado" class="btn_estatus rechazado">Rechazado</button>
              </form>
            </td>
            <td><a href="ver_post.php?id=<?php echo $fila["id_solicitud"]; ?>"><img src="imagenes/icono_ver.png" class="img_ver"></a></td>
            <td><a href="#" Onclick="validar('borrar_registros.php?id_solicitud=<?php echo $fila["id_solicitud"]; ?>')"><img src="imagenes/icono_eliminar.png" class="img_eliminar"></a></td>
          </tr>
          <?php 
          }
          ?>
        </table>
        <br><br>
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
