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
        <h2 class="titulo_panel"> VER USUARIOS</h2>
        <br>
        <a href="dashboard_usuarios.php" class="btn_rojo2"><< Regresar</a>
        <br><br>
        <?php
        require "conexion.php";
        $id_usuario = $_GET['id'];

        $verusuario = "SELECT * FROM registro WHERE id = '$id_usuario'";
        $resultado = mysqli_query($conectar, $verusuario);

        $fila = $resultado -> fetch_array();
        ?>
        <div class="contenedor_ver_usuarios">
          <p class="campo">Nombre del usuario</p>
          <p class="dato"><?php echo $fila ["nombre"]?>  <?php echo $fila['apellido']?></p>
          <hr>
        </div>
        <div class="contenedor_ver_usuarios">
          <p class="campo">Email</p>
          <p class="dato"><?php echo $fila['correo']?></p>
          <hr>
        </div>
        <div class="contenedor_ver_usuarios">
          <p class="campo">Fecha de nacimiento</p>
          <p class="dato"><?php echo $fila['fecha']?></p>
          <hr>
        </div>
        <div class="contenedor_ver_usuarios">
          <p class="campo">Contraseña</p>
          <p class="dato"><?php echo $fila['contrasena']?></p>
          <hr>
        </div>
        <br>
        <a href="editar_usuario.php?id=<?php echo $fila['id'];?>"class="btn_rojo3">Editar Usuario</a>
      </div>
      
    </div>
  </div>
  
</body>
</html>