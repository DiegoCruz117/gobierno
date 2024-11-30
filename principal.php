<?php
require "seguridad.php";
$usuario = $_SESSION['username'];

// Crear la cookie con el nombre de usuario
$nombre_cookie = "usuario";
$valor_cookie = $usuario; // Usar el nombre de usuario de la sesión como valor de la cookie
$duracion = time() + (86400 * 30); // Cookie válida por 30 días
$ruta = "/"; // La cookie estará disponible en todo el sitio

// Establecer la cookie
setcookie($nombre_cookie, $valor_cookie, $duracion, $ruta);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="css/estilos.css">
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
        <h2 class="titulo_panel">Panel Administrativo</h2>
      </div>
    </div>
  </div>
  
</body>
</html>