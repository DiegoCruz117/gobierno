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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

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
        <h2 class="titulo_panel">Programas de Apoyos</h2>
        <br>
        <a href="crear_programa_apoyos.php" class="btn_rojo2"">Crear POST</a>
        <br><br>
        <table class="tabla_usuarios">
          <tr>
            <th>ID</th>
            <th class="fo">Icono</th>
            <th>Tipo de programa</th>
            <th>fechas</th>
            <th>Ver</th>
            <th>Editar</th>
            <th>Eliminar</th>
          </tr>
          <?php
          require "conexion.php";

          $todos_datos = "SELECT * FROM crear_apoyos ORDER BY id_apoyos  ASC";
          $resultado = mysqli_query($conectar,$todos_datos);
          while($fila = mysqli_fetch_assoc($resultado)){
          ?>
          <tr>
            <td><?php echo $fila["id_apoyos"]?></td>
            <td> <i class="fas fa-<?php echo $fila['icono_apoyos']; ?>" style="font-size: 24px;"></i></td>
            <td><?php echo $fila["nombre_programa"]?></td>
            <td><?php echo $fila["fecha_programa"]?></td>
            
            <td><a href="ver_noticias.php?id_apoyos=<?php echo $fila["id_apoyos"]; ?>"><img src="imagenes/icono_ver.png" class="img_ver"></a></td>

            <td><a href="editar_post.php?id_apoyos=<?php echo $fila["id_apoyos"]; ?>"><img src="imagenes/icono_editar.png" class="img_ver"></a></td>

            <td><a href="#" Onclick="validar('eliminar_post.php?id_apoyos=<?php echo $fila["id_apoyos"]; ?>')"><img src="imagenes/icono_eliminar.png" class="img_eliminar"></a></td>
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