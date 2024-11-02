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
        <h2 class="titulo_panel"> CREAR USUARIOS</h2>
        <br>
        <a href="dashboard_usuarios.php" class="btn_rojo2"><< Regresar</a>
        <br><br>
        <form action="guardar_usuarios.php" method="post" class="form_crear_usuario">
          <input type="text" name="nombre" class="elemento_inp2" placeholder="Nombre(s)" required>
          <br>
          <input type="text" name="apellido" class="elemento_inp2" placeholder="Apellidos" required>
          <br>
          <input type="text" name="correo" class="elemento_inp2" placeholder="Correo electronico" required>
          <br>
          <input type="password" name="contrasena" class="elemento_inp2" placeholder="Contraseña" required>
          <br><br>
          <p class="texto_fecha">Fecha de nacimiento</p>
          <input type="date" name="fecha" class="elemento_inp2" require>
          <br>
          <button class="btn_amarillo2">Registar</button>
       </form>
      </div>
    </div>
  </div>
  
</body>
</html>