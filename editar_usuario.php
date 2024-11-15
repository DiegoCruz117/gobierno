<?php
require "seguridad.php";
$usuario = $_SESSION['username'];

$id = $_GET['id'];
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
    <?php
          require "conexion.php";
          $verusuario = "SELECT * FROM registro WHERE id = '$id'";
          $resultado = mysqli_query($conectar, $verusuario);
          $fila = $resultado -> fetch_array();
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
        <h2 class="titulo_panel"> EDITAR USUARIO</h2>
        <a href="dashboard_usuarios.php" class="btn_rojo2"><< Regresar</a>
        <br><br>
        
        <form action="guardar_usuarios_editar.php" method="post" class="form_crear_usuario">
          <input type="text" name="nombre" class="elemento_inp2" placeholder="Nombre(s)" required value="<?php echo $fila['nombre'];?>">
          <br>
          <input type="text" name="apellido" class="elemento_inp2" placeholder="Apellido" required value="<?php echo $fila['apellido'];?>">
          <br>
          <input type="text"  class="elemento_inp2" placeholder="Correo electronico" required value="<?php echo $fila['correo'];?>" disabled>
          <br>
          <input type="text" name="contrasena" class="elemento_inp2" placeholder="Contraseña" required value="<?php echo $fila['contrasena'];?>">
          <br><br>
          <p class="texto_fecha">Fecha de nacimiento</p>
          <input type="date" name="fecha" class="elemento_inp2" value="<?php echo $fila['fecha'];?>">

          <!-- hidden -->
           <input type="hidden" name="id" value="<?php echo $fila['id'];?>">
           <input type="hidden" name="correo" value="<?php echo $fila['correo'];?>">
          <br>
          <button class="btn_amarillo2">Editar</button>
       </form>
      </div>
  </div>
  
</body>
</html>