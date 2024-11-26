
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio de Sesión</title>
  <link rel="stylesheet" href="estilos.css">
  <link rel="icon" type="image/x-icon" href="imagenes/logo_icono.png">
</head>
<body>
<br><br>
    <div class="img_logo"><img src="imagenes/logo.jpg" class="img_logo"></div>
    <div class="cont_login">
        <form action="autentificar.php" method="post">
            <?php
            // Verifica si hay un error en el inicio de sesión
            $errorusuario = isset($_GET["errorusuario"]) ? $_GET["errorusuario"] : null;
            if ($errorusuario == "SI") {
                echo '<h3 class="aviso_error">Datos incorrectos</h3><br><br>';
            } else {
                echo '<h3 class="aviso_exito">¡Bienvenido! Inicia sesión para continuar.</h3><br>';
            }
            ?>
            <input type="text" name="correo" required class="elemento_inp" placeholder="Correo electrónico">
            <br>
            <input type="password" name="contrasena" required class="elemento_inp" placeholder="Contraseña">
            <br>
            <input type="submit" value="Iniciar Sesión" class="btn_login">
            <?php
            // Si hay error, muestra solo el botón de recuperar contraseña
            if ($errorusuario == "SI") {
                echo '<a href="recuperar_contrasena.php" class="bton_contra">Recuperar Contraseña</a>';
            }
            // Si no hay error, muestra solo el botón de crear cuenta
            else {
                echo '<a href="crear_usuario_login.php" class="btn_crear">Crear cuenta</a>';
                ?>
                <br><br><br>
                <p class="recuperar_contra">¿Has olvidado tu contraseña? <a href="recuperar_contrasena.php">Haz click aquí</a></p>
            <?php
            }
            ?>
        </form>
    </div>
    <br><br>
</body>
</html>
