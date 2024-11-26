    <?php
    require 'conexion.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Validar que todos los campos fueron enviados
        if (empty($_POST['nombre']) || empty($_POST['apellido']) || empty($_POST['correo']) || empty($_POST['contrasena']) || empty($_POST['pregunta']) || empty($_POST['respuesta']) || empty($_POST['fecha'])) {
            echo '<script>alert("Por favor, completa todos los campos."); window.history.back();</script>';
            exit();
        }

        $nombre = mysqli_real_escape_string($conectar, $_POST['nombre']);
        $apellido = mysqli_real_escape_string($conectar, $_POST['apellido']);
        $correo = mysqli_real_escape_string($conectar, $_POST['correo']);
        $contrasena = mysqli_real_escape_string($conectar, $_POST['contrasena']);
        $contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT); // Encriptar la contraseña
        $fecha = mysqli_real_escape_string($conectar, $_POST['fecha']); // Obtener la fecha
        $pregunta = mysqli_real_escape_string($conectar, $_POST['pregunta']);
        $respuesta = mysqli_real_escape_string($conectar, $_POST['respuesta']);

        // Verificar si el correo ya está registrado
        $verificarCorreo = "SELECT * FROM registro WHERE correo = '$correo'";
        $resultadoVerificacion = mysqli_query($conectar, $verificarCorreo);

        if (mysqli_num_rows($resultadoVerificacion) > 0) {
            echo '<script>alert("El correo electrónico ya está registrado. Por favor, usa otro."); window.history.back();</script>';
            exit();
        }

        // Establecer el rol predeterminado
        $rol = 'usuario'; // Asigna el rol de usuario por defecto

        // Insertar en la base de datos incluyendo el rol
        $insertar = "INSERT INTO registro (nombre, apellido, correo, contrasena, pregunta, respuesta, fecha, rol) VALUES ('$nombre', '$apellido', '$correo', '$contrasena', '$pregunta', '$respuesta', '$fecha', '$rol')";

        if (mysqli_query($conectar, $insertar)) {
            echo '<script>alert("Registro exitoso. Por favor, inicia sesión."); window.location.href = "login.php";</script>';
        } else {
            echo '<script>alert("Error en el registro. Intenta de nuevo más tarde."); window.history.back();</script>';
        }

        mysqli_close($conectar);
    }
    ?>
