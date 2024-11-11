<?php
require "seguridad.php";
$usuario = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Panel de Usuarios</title>
  <link rel="stylesheet" href="estilos.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
  <div class="cont_padre_panel ancho">
    <?php
    include "menudashboard.php";
    require "conexion.php";
    ?>
    <div class="cont_panel_derecho">
      <div class="cont_panel_derecho_hijo1">
        <div class="elemento_salir">
          <img src="imagenes/cancelar.png" class="img_cancelar" >
          <a href="salir.php" class="salir">Salir</a>
        </div>
      </div>
      <br>
      <div class="cont_panel_derecho_hijo2">
        <h2 class="titulo_panel">Usuarios</h2>
        <br>
        <a href="crear_usuario.php" class="btn_azul"><i class="fa-solid fa-user-plus color_icon4"></i>Nuevo</a>
        <br><br>

        <!-- Tabla para usuarios con rol de Alcance -->
        <!-- <h3>Alcande</h3>
        <table class="tabla_usuarios">
          <tr>
            <th>ID</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Email</th>
            <th>Rol</th>

          </tr>
          <?php
          // $query_alcance = "SELECT * FROM registro WHERE rol = 'alcalde' AND id != 33 ORDER BY id ASC";
          // $resultado_alcance = mysqli_query($conectar, $query_alcance);
          // while ($fila = mysqli_fetch_assoc($resultado_alcance)) {
          ?>
          <tr>
            <td><?php echo $fila["id"]; ?></td>
            <td><?php echo $fila["nombre"]; ?></td>
            <td><?php echo $fila["apellido"]; ?></td>
            <td><?php echo $fila["correo"]; ?></td>
            <td><?php echo $fila["rol"]; ?></td>
          </tr>
          <?php
          // }
          ?>
        </table><br> -->

        <!-- Tabla para usuarios con rol de Administrador -->
        <!-- <h3>Administradores</h3>
        <table class="tabla_usuarios">
          <tr>
            <th>ID</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Email</th>
            <th>Rol</th>
            <th>Eliminar</th>
          </tr>
          <?php
          // $query_admin = "SELECT * FROM registro WHERE rol = 'administrador' AND id != 33 ORDER BY id ASC";
          // $resultado_admin = mysqli_query($conectar, $query_admin);
          // while ($fila = mysqli_fetch_assoc($resultado_admin)) {
          ?>
          <tr>
            <td><?php echo $fila["id"]; ?></td>
            <td><?php echo $fila["nombre"]; ?></td>
            <td><?php echo $fila["apellido"]; ?></td>
            <td><?php echo $fila["correo"]; ?></td>
            <td><?php echo $fila["rol"]; ?></td>
            <td><a href="#" Onclick="validar('borra.php?id=<?php echo $fila["id"]; ?>')"><img src="imagenes/icono_eliminar.png" class="img_eliminar"></a></td>
          </tr>
          <?php
          // }
          ?>
        </table><br> -->

        <!-- Tabla para usuarios con rol de Usuario -->
        <!-- <h3>Usuarios</h3> -->
        <table class="tabla_usuarios">
          <tr>
            <th>ID</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Email</th>
            <!-- <th>Rol</th> -->
            <th>Eliminar</th>
          </tr>
          <?php
          $query_usuarios = "SELECT * FROM registro WHERE rol = 'usuario' AND id != 33 ORDER BY id ASC";
          $resultado_usuarios = mysqli_query($conectar, $query_usuarios);
          while ($fila = mysqli_fetch_assoc($resultado_usuarios)) {
          ?>
          <tr>
            <td><?php echo $fila["id"]; ?></td>
            <td><?php echo $fila["nombre"]; ?></td>
            <td><?php echo $fila["apellido"]; ?></td>
            <td><?php echo $fila["correo"]; ?></td>
            <!-- <td><?php echo $fila["rol"]; ?></td> -->
            <td><a href="#" Onclick="validar('borra.php?id=<?php echo $fila["id"]; ?>')"><img src="imagenes/icono_eliminar.png" class="img_eliminar"></a></td>
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
