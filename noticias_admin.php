<?php
require "seguridad.php";
$usuario = $_SESSION['username'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Noticias-admin</title>
  <link rel="stylesheet" href="css/estilos.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="icon" type="image/x-icon" href="imagenes/logo_icono.png">

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
        <h2 class="titulo_panel">Noticias</h2>
        <br>
        <a href="crear_noticias.php" class="btn_rojo2"><i class="fa-solid fa-newspaper color_icon4"></i>Nuevo</a>
        <br><br>
        <table class="tabla_usuarios">
          <tr>
            <th>ID</th>
            <th class="fo">Icono</th>
            <th>Titulo</th>
            <th>Fecha</th>
            <th>Ver</th>
            <th>Editar</th>
            <th>Eliminar</th>
          </tr>
          <?php
          require "conexion.php";

          $todos_datos = "SELECT * FROM publicaciones ORDER BY id_noticia ASC";
          $resultado = mysqli_query($conectar,$todos_datos);
          while($fila = mysqli_fetch_assoc($resultado)){
          ?>
          <tr>
            <td><?php echo $fila["id_noticia"]?></td>
            <td> <i class="fas fa-<?php echo $fila['icono']; ?>" style="font-size: 24px;"></i></td>
            <td><?php echo $fila["nombrenoticia"]?></td>
            <td><?php echo $fila["fecha"]?></td>
            
            <td><a href="ver_noticias.php?id_noticia=<?php echo $fila["id_noticia"]; ?>"><img src="imagenes/icono_ver.png" class="img_ver"></a></td>

            <td><a href="editar_post.php?id_noticia=<?php echo $fila["id_noticia"]; ?>"><img src="imagenes/icono_editar.png" class="img_ver"></a></td>

            <td><a href="#" Onclick="validar('eliminar_post.php?id_noticia=<?php echo $fila["id_noticia"]; ?>')"><img src="imagenes/icono_eliminar.png" class="img_eliminar"></a></td>
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