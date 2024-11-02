<?php
session_start();

if(isset($_SESSION['autentificado'])== "SI"){ {
    header("Location: principal.php");
}

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="estilo.css">
</head>
<body>

    <div class="cont_registrar">
        <h1 class="titulo">Regístrate</h1>
            <div class="sub_cont_iniciar">
                <form action="recibir.php" method="post">
                <input type="text" name="nombre" placeholder="Nombre(s) *" class="caja" required><br>
                <input type="text" name="apellido" placeholder="Apellidos *" class="caja" required><br>
                <input type="email" name="correo" placeholder="Correo electrónico *" class="caja" required><br>
                <input type="password" name="contrasena" placeholder="Contraseña * (mínimo 6 caracteres)" class="caja" minlength="6" maxlength="15" required><br>
                <p class="fecha">Fecha de nacimiento *</p>
                <input type="date" name="fecha" class="caja" required><br>
                <!-- Pregunta de seguridad -->
                <label for="pregunta">Elige una pregunta de seguridad: *</label>
                <select name="pregunta" required>
                    <option value="nombre_mascota">¿Cómo se llama tu primera mascota?</option>
                    <option value="lugar_nacimiento">¿En qué ciudad naciste?</option>
                    <option value="escuela_primaria">¿Cómo se llama tu escuela primaria?</option>
                </select><br>
                <!-- Respuesta a la pregunta de seguridad -->
                <input type="text" name="respuesta" placeholder="Respuesta *" class="caja" required><br>
                <input type="submit" value="Registrar" class="btn_crear"><br>
                <a href="login.php" class="btn_regresar">Regresar</a><br>
                </form>
            </div>
    </div>
    <script>
        function validarFormulario() {
            const contrasena = document.querySelector('input[name="contrasena"]').value;
            if (contrasena.length < 6 || contrasena.length > 15) {
                alert('La contraseña debe tener entre 6 y 15 caracteres.');
                return false;
            }
            return true;
        }
    </script>
</body>
</html>
