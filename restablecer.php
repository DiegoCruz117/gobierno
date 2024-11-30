<?php
require 'conexion.php';

if (isset($_GET['correo'])) {
    $correo = $_GET['correo'];
} else {
    echo '<script>alert("Acceso no autorizado."); window.location.href = "login.php";</script>';
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Restablecer Contraseña</title>
    <link rel="stylesheet" href="css/estilo.css">
    <script>
        function validarContrasena() {
            const contrasena = document.querySelector('input[name="contrasena"]').value;
            const confirmarContrasena = document.querySelector('input[name="confirmar_contrasena"]').value;

            if (contrasena.length < 6 || contrasena.length > 15) {
                alert('La contraseña debe tener entre 6 y 15 caracteres.');
                return false;
            }

            if (contrasena !== confirmarContrasena) {
                alert('Las contraseñas no coinciden. Por favor, verifica.');
                return false;
            }

            return true;
        }

    </script>
</head>
<body>
    <div class="container">
        <div class="form_wrapper">
            <h2 class="titulo">Restablecer Contraseña</h2>
            <form action="guardar_contrasena.php" method="POST" class="formulario" onsubmit="return validarContrasena()">
                <div class="input_group">
                    <label for="contrasena" class="label">Nueva Contraseña: *</label>
                    <input type="password" placeholder="Min 6, Max 15" name="contrasena" id="contrasena" class="input" minlength="6" maxlength="15" required>
                </div>
                <div class="input_group">
                    <label for="confirmar_contrasena" class="label">Confirmar Contraseña: *</label>
                    <input type="password" placeholder="Min 6, Max 15" name="confirmar_contrasena" id="confirmar_contrasena" class="input" minlength="6" maxlength="15" required>
                </div>

                <input type="hidden" name="correo" value="<?php echo htmlspecialchars($correo); ?>">

                <div class="button_group">
                    <button type="submit" class="btn_crear">Restablecer Contraseña</button>
                </div>
                <div class="button_group">
                    <a href="login.php" class="btn_regresar3">Regresar</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>