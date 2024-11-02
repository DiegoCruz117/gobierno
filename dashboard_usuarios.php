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
</head>
<body>
  <div class="cont_padre_panel ancho">
    <?php 
    include "menudashboard.php";
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
        <a href="crear_usuario.php" class="btn_azul">Crear Usuarios</a>
        <br><br>
        <table class="tabla_usuarios">
          <tr>
            <th>ID</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Email</th>
            <th>Fecha de nacimiento</th>
            <th>Ver</th>
            <th>Editar</th>
            <th>Eliminar</th>
          </tr>
          <?php
          require "conexion.php";

          $todos_datos = "SELECT * FROM registro ORDER BY id ASC";
          $resultado = mysqli_query($conectar,$todos_datos);
          while($fila = mysqli_fetch_assoc($resultado)){
          ?>
          <tr>
            <td> <?php echo $fila["id"];?></td>
            <td><?php echo $fila["nombre"];?></td>
            <td><?php echo $fila["apellido"];?></td>
            <td><?php echo $fila["correo"];?></td>
            <td><?php echo $fila["fecha"];?></td>
            <td><a href="ver_usuario.php?id=<?php echo $fila["id"]; ?>"><img src="imagenes/icono_ver.png" class="img_ver"></a></td>
            <td><a href="editar_usuario.php?id=<?php echo $fila["id"]; ?>"><img src="imagenes/icono_editar.png" class="img_modificar"></a></td>
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