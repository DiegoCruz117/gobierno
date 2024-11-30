<?php
    require "seguridad.php";
    if (!isset($_SESSION["autentificado"]) || $_SESSION["autentificado"] != "SI") {
        header("Location: login.php");
        exit();
    }
    
    // Obtén el ID del usuario
    $user_id = $_SESSION['user_id'];
    $correo = $_SESSION['correo'];
    $usuario = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Perfil</title>
  <link rel="stylesheet" href="css/noticias.css">
  <link rel="stylesheet" href="css/estilos.css">
  <link rel="stylesheet" href="css/perfil.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="icon" type="image/x-icon" href="imagenes/logo_icono.png">
</head>
<body>
    <div class="header ancho">
        <div class="header-content">
            <div class="header-left">
            </div>
            <div class="header-center">
                <h2>Mi perfil</h2>
            </div>
            <div class="header-right">
                <?php if (!isset($_SESSION['username'])): // Si no hay usuario logueado ?>
                    <a href="login.php" class="btn-login">
                        <i class="fas fa-sign-in-alt"></i>
                    </a>
                <?php else: // Si hay usuario logueado ?>
                    <a href="salir.php" class="btn-logout">
                        <i class="fas fa-sign-out-alt"></i>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <br>

    <div class="main-content ancho">
    <?php
        include "botones_inicio.php"; // Incluye el menú de navegación del dashboard
        ?>
    </div>

    <div class="cont_padre ancho">
        <?php
            include "botones_perfil.php";
            require "conexion.php";

            $verusuario = "SELECT * FROM solicitudes_apoyo WHERE email = '$correo'";

            $resultado = mysqli_query($conectar, $verusuario);

            // Verificar si hay resultados
            if (!$resultado) {
                die("Error en la consulta: " . mysqli_error($conectar));
            }

            $fila = mysqli_fetch_assoc($resultado);
        ?>

        <div class="cont_der">
            <table class="tabla_usuarios">
                <tr>
                    <th>Folio</th>
                    <th>Fecha de solicitud</th>
                    <th>Tipo de Programa</th>
                    <th>Estatus</th>
                </tr>
                <?php
                $resultado_economico = mysqli_query($conectar, $verusuario);
                while ($fila = mysqli_fetch_assoc($resultado_economico)) {
                ?>
                    <tr>
                        <td><?php echo $fila["id_solicitud"]; ?></td>
                        <td><?php echo $fila["fecha_solicitud"];?></td>
                        <td><?php echo $fila["tipo_apoyo"]; ?></td>
                        <td><?php echo $fila["estatus"]; ?></td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>

    </div>
    <footer class="footer ancho">
        <p>© 2024 Plataforma de Apoyo Gubernamental | Todos los derechos reservados.</p>
        <div class="social-icons">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
        </div>
    </footer>
</body>
</html>